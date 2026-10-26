<?php
/**
 * Lean output for pages drawn by this plugin's custom templates.
 *
 * These pages hide Betheme's Slider Revolution banner and the theme footer with
 * CSS, but the theme still rendered both and the browser still downloaded their
 * markup and scripts (plus Elementor's, since the original pages were built
 * with Elementor). Nothing on these pages uses them, so on these pages only:
 *   - the Slider Revolution banner is not rendered and its CSS/JS are not loaded;
 *   - the theme's hidden <footer id="Footer"> is removed (the plugin's own footer stays);
 *   - Elementor / Essential Addons CSS and JS are not loaded (custom templates only;
 *     standard blog posts keep them because their content may be Elementor markup).
 * The visible page is unchanged. Every other page on the site is untouched.
 *
 * Rollback: define( 'INFOMETRY_CT_LEAN_PAGES', false ); in wp-config.php.
 *
 * @package Infometry_Custom_Templates
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * How lean the current request can be: 'template' for custom-template pages,
 * 'blog' for premium blog posts, '' for every other page.
 */
function infometry_ct_lean_mode() {
	static $mode = null;
	if ( null !== $mode ) {
		return $mode;
	}

	$mode = '';
	if ( is_admin() || ( defined( 'INFOMETRY_CT_LEAN_PAGES' ) && ! INFOMETRY_CT_LEAN_PAGES ) ) {
		return $mode;
	}

	$checks = array(
		'home', 'conversa', 'informatica', 'google_connectors', 'google_drive', 'snowflake_native_apps',
		'asana_fdp', 'asana_case_study', 'asana_architecture', 'insurance_snowflake', 'sunrise_case_study',
		'dematic_case_study', 'dematic_finance', 'conns', 'expedia', 'belk', 'tellus', 'codexis', 'navis',
	);
	foreach ( $checks as $check ) {
		$function = 'infometry_ct_should_use_' . $check . '_template';
		if ( function_exists( $function ) && call_user_func( $function ) ) {
			$mode = 'template';
			return $mode;
		}
	}

	if ( function_exists( 'infometry_ct_use_premium_blog' ) && infometry_ct_use_premium_blog() ) {
		$mode = 'blog';
	}

	return $mode;
}

/** Skip rendering the Slider Revolution banner (it is never shown on these pages). */
function infometry_ct_lean_skip_rev_slider( $output, $tag ) {
	if ( '' !== infometry_ct_lean_mode() && in_array( $tag, array( 'rev_slider', 'rev_slider_vc' ), true ) ) {
		return '';
	}
	return $output;
}
add_filter( 'pre_do_shortcode_tag', 'infometry_ct_lean_skip_rev_slider', 10, 2 );

/** Remove an element and everything nested in it, matching its own closing tag. */
function infometry_ct_lean_drop_element( $html, $opening, $tag ) {
	if ( ! preg_match( $opening, $html, $match, PREG_OFFSET_CAPTURE ) ) {
		return $html;
	}
	$start = $match[0][1];

	if ( ! preg_match_all( '#<' . $tag . '\b|</' . $tag . '\s*>#i', $html, $tags, PREG_OFFSET_CAPTURE, $start ) ) {
		return $html;
	}

	$depth = 0;
	foreach ( $tags[0] as $found ) {
		$depth += ( '/' === $found[0][1] ) ? -1 : 1;
		if ( 0 === $depth ) {
			$end = $found[1] + strlen( $found[0] );
			return substr( $html, 0, $start ) . substr( $html, $end );
		}
	}

	return $html;
}

/** Drop the hidden theme slider wrapper and theme footer from the finished page. */
function infometry_ct_lean_filter_html( $html ) {
	if ( ! is_string( $html ) || false === strpos( $html, '</html>' ) ) {
		return $html;
	}

	// Match the opening tags whatever their attribute order or spacing (cache and
	// optimisation plugins may rewrite them).
	$html = infometry_ct_lean_drop_element( $html, '#<div\s[^>]*class="mfn-main-slider mfn-rev-slider"#i', 'div' );
	$html = infometry_ct_lean_drop_element( $html, '#<footer\s[^>]*id="Footer"#i', 'footer' );
	return $html;
}

/**
 * Buffer the page on lean requests. Priority 50: after WP Rocket starts its own
 * optimisation buffer (so this filter sees the theme's original markup) and before
 * the plugin's route renderers (priority 99).
 */
function infometry_ct_lean_start_buffer() {
	if ( '' !== infometry_ct_lean_mode() ) {
		ob_start( 'infometry_ct_lean_filter_html' );
	}
}
add_action( 'template_redirect', 'infometry_ct_lean_start_buffer', 50 );

/** Stop loading assets that nothing on these pages uses. */
function infometry_ct_lean_dequeue_assets() {
	$mode = infometry_ct_lean_mode();
	if ( '' === $mode ) {
		return;
	}

	$scripts = array( 'tp-tools', 'revmin' );
	$styles  = array( 'rs-plugin-settings' );
	$prefix_scripts = array();
	$prefix_styles  = array();

	if ( 'template' === $mode ) {
		$scripts        = array_merge( $scripts, array( 'jquery-numerator', 'swiper' ) );
		$styles         = array_merge( $styles, array( 'swiper', 'e-swiper' ) );
		$prefix_scripts = array( 'elementor-', 'eael-' );
		$prefix_styles  = array( 'elementor-', 'widget-', 'eael-' );
	}

	foreach ( $scripts as $handle ) {
		wp_dequeue_script( $handle );
	}
	foreach ( $styles as $handle ) {
		wp_dequeue_style( $handle );
	}

	$queues = array(
		array( wp_scripts(), $prefix_scripts, 'wp_dequeue_script' ),
		array( wp_styles(), $prefix_styles, 'wp_dequeue_style' ),
	);
	foreach ( $queues as $queue ) {
		list( $registry, $prefixes, $dequeue ) = $queue;
		if ( ! $prefixes ) {
			continue;
		}
		foreach ( (array) $registry->queue as $handle ) {
			foreach ( $prefixes as $prefix ) {
				if ( 0 === strpos( $handle, $prefix ) ) {
					call_user_func( $dequeue, $handle );
				}
			}
		}
	}
}
/**
 * Case-study banners paint their artwork as a CSS background on desktop, so the
 * browser only discovers the image after the stylesheet is parsed. Preloading it
 * (desktop widths only, where it is used) lets the banner paint sooner.
 */
function infometry_ct_lean_preload_hero() {
	if ( 'template' !== infometry_ct_lean_mode() ) {
		return;
	}

	$heroes = array(
		'asana_fdp'          => 'case-studies/asana-fdp-banner-art-v2.jpg',
		'asana_case_study'   => 'case-studies/asana-fdp-banner-art-v2.jpg',
		'belk'               => 'case-studies/belk/belk-hero.jpg',
		'codexis'            => 'case-studies/codexis/codexis-hero-v2.jpg',
		'conns'              => 'case-studies/conns/conns-hero.jpg',
		'navis'              => 'case-studies/navis/navis-hero.jpg',
		'dematic_case_study' => 'case-studies/dematic/dematic-hero-v3.jpg',
		'dematic_finance'    => 'case-studies/dematic-finance/dematic-finance-hero-v5.jpg',
		'expedia'            => 'case-studies/expedia/expedia-hero.jpg',
		'tellus'             => 'case-studies/tellus/tellus-hero.jpg',
	);
	foreach ( $heroes as $check => $image ) {
		$function = 'infometry_ct_should_use_' . $check . '_template';
		if ( function_exists( $function ) && call_user_func( $function ) && is_readable( INFOMETRY_CT_PATH . 'assets/images/' . $image ) ) {
			printf(
				'<link rel="preload" as="image" href="%s" media="(min-width: 1025px)" fetchpriority="high">' . "\n",
				esc_url( INFOMETRY_CT_URL . 'assets/images/' . $image )
			);
			return;
		}
	}
}
add_action( 'wp_head', 'infometry_ct_lean_preload_hero', 1 );

add_action( 'wp_enqueue_scripts', 'infometry_ct_lean_dequeue_assets', 9999 );
add_action( 'wp_print_styles', 'infometry_ct_lean_dequeue_assets', 9999 );
add_action( 'wp_print_scripts', 'infometry_ct_lean_dequeue_assets', 9999 );
add_action( 'wp_print_footer_scripts', 'infometry_ct_lean_dequeue_assets', 1 );
