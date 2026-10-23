<?php
/**
 * Centralized premium template for standard WordPress posts.
 *
 * Every published standard post that uses the default post template is rendered
 * through templates/single-post-premium.php. Nothing is written to the database:
 * the stored content is only post-processed at render time (heading ids, one H1
 * per page, responsive tables). The theme header, navigation and footer are
 * reused through get_header() / get_footer(); Betheme's single-post "intro"
 * banner (which prints a second H1) is removed from the header output. SEO meta
 * and schema stay with Yoast; this template adds none.
 *
 * Rollback, from fastest to slowest:
 *   1. define( 'INFOMETRY_CT_PREMIUM_BLOG', false ); in wp-config.php
 *   2. add_filter( 'infometry_ct_premium_blog_enabled', '__return_false' );
 *   3. git revert the commit that added this file.
 * Editors can compare with the legacy layout on any post via ?ifb-legacy=1
 * (only while logged in, so visitors and crawlers always get one version).
 *
 * @package Infometry_Custom_Templates
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'INFOMETRY_CT_PREMIUM_BLOG_TEMPLATE', 'templates/single-post-premium.php' );

/** Decide whether the current request should use the premium post template. */
function infometry_ct_use_premium_blog() {
	static $use = null;
	if ( null !== $use ) {
		return $use;
	}

	$use = false;
	if ( ! is_singular( 'post' ) ) {
		return $use;
	}

	if ( defined( 'INFOMETRY_CT_PREMIUM_BLOG' ) && ! INFOMETRY_CT_PREMIUM_BLOG ) {
		return $use;
	}

	$post_id = get_queried_object_id();

	// Respect posts deliberately assigned another template (e.g. Elementor Canvas).
	if ( '' !== (string) get_page_template_slug( $post_id ) ) {
		return $use;
	}

	if ( isset( $_GET['ifb-legacy'] ) && is_user_logged_in() ) { // phpcs:ignore WordPress.Security.NonceVerification.Recommended
		return $use;
	}

	$use = (bool) apply_filters( 'infometry_ct_premium_blog_enabled', true, $post_id );
	return $use;
}

/** Route standard posts to the premium template. */
function infometry_ct_premium_blog_template( $template ) {
	if ( ! infometry_ct_use_premium_blog() ) {
		return $template;
	}

	$plugin_template = INFOMETRY_CT_PATH . INFOMETRY_CT_PREMIUM_BLOG_TEMPLATE;
	return is_readable( $plugin_template ) ? $plugin_template : $template;
}
add_filter( 'template_include', 'infometry_ct_premium_blog_template', PHP_INT_MAX );

/** Scope styles to premium posts and drop Betheme's intro-layout class. */
function infometry_ct_premium_blog_body_class( $classes ) {
	if ( ! infometry_ct_use_premium_blog() ) {
		return $classes;
	}

	$classes   = array_values( array_diff( $classes, array( 'single-template-intro', 'template-slider' ) ) );
	$classes[] = 'infometry-premium-blog';
	return $classes;
}
add_filter( 'body_class', 'infometry_ct_premium_blog_body_class', 20 );

/** Load the blog stylesheet and table-of-contents script only on premium posts. */
function infometry_ct_premium_blog_assets() {
	if ( ! infometry_ct_use_premium_blog() ) {
		return;
	}

	$css_path = INFOMETRY_CT_PATH . 'assets/css/blog-post.css';
	$js_path  = INFOMETRY_CT_PATH . 'assets/js/blog-post.js';

	wp_enqueue_style(
		'infometry-blog-fonts',
		'https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600;700;800&family=Roboto:wght@500;600;700;800;900&display=swap',
		array(),
		null
	);
	wp_enqueue_style( 'infometry-blog-post', INFOMETRY_CT_URL . 'assets/css/blog-post.css', array( 'infometry-blog-fonts' ), is_readable( $css_path ) ? (string) filemtime( $css_path ) : INFOMETRY_CT_VERSION );
	wp_enqueue_script( 'infometry-blog-post', INFOMETRY_CT_URL . 'assets/js/blog-post.js', array(), is_readable( $js_path ) ? (string) filemtime( $js_path ) : INFOMETRY_CT_VERSION, true );
}
add_action( 'wp_enqueue_scripts', 'infometry_ct_premium_blog_assets', 20 );

/**
 * Render the theme header without Betheme's single-post intro banner.
 *
 * The intro block holds a second H1 and the old banner; everything else in the
 * header (navigation, sticky bar, wp_head output) is kept untouched.
 */
function infometry_ct_premium_blog_header() {
	ob_start();
	get_header();
	$header = (string) ob_get_clean();

	echo infometry_ct_strip_intro_block( $header ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- theme header markup.
}

/**
 * Remove Betheme's <div id="Intro"> block (and everything nested in it) from markup.
 * Matches the block's own closing tag by counting nested divs, so it does not
 * depend on what follows the block. Returns the markup unchanged if not found.
 */
function infometry_ct_strip_intro_block( $html ) {
	$start = strpos( $html, '<div id="Intro"' );
	if ( false === $start ) {
		return $html;
	}

	if ( ! preg_match_all( '#<div\b|</div\s*>#i', $html, $tags, PREG_OFFSET_CAPTURE, $start ) ) {
		return $html;
	}

	$depth = 0;
	foreach ( $tags[0] as $tag ) {
		$depth += ( '<' === $tag[0][0] && '/' !== $tag[0][1] ) ? 1 : -1;
		if ( 0 === $depth ) {
			$end = $tag[1] + strlen( $tag[0] );
			return substr( $html, 0, $start ) . substr( $html, $end );
		}
	}

	return $html;
}

/** Normalise text for loose title comparisons. */
function infometry_ct_blog_norm( $text ) {
	return preg_replace( '/[^a-z0-9]+/', '', strtolower( html_entity_decode( wp_strip_all_tags( (string) $text ), ENT_QUOTES, 'UTF-8' ) ) );
}

/**
 * Post-process rendered content for display only (the database is untouched).
 *
 * - The hero owns the page's only H1: a leading content H1 that repeats the
 *   title is dropped; any other H1 is shown as an H2.
 * - H2/H3 headings get stable ids for the table of contents.
 * - Tables are wrapped so they scroll sideways on small screens.
 * - Reports whether the content opens with its own banner image.
 *
 * @return array { html, toc, opens_with_image }
 */
function infometry_ct_blog_prepare_content( $html, $title ) {
	$title_norm = infometry_ct_blog_norm( $title );
	$first_h1   = true;

	$html = preg_replace_callback(
		'#<h1(\s[^>]*)?>(.*?)</h1>#is',
		static function ( $m ) use ( $title_norm, &$first_h1 ) {
			$text_norm = infometry_ct_blog_norm( $m[2] );
			$is_first  = $first_h1;
			$first_h1  = false;
			if ( $is_first && '' !== $text_norm && '' !== $title_norm && ( $text_norm === $title_norm || 0 === strpos( $title_norm, substr( $text_norm, 0, 25 ) ) || 0 === strpos( $text_norm, substr( $title_norm, 0, 25 ) ) ) ) {
				return '';
			}
			return '<h2' . ( isset( $m[1] ) ? $m[1] : '' ) . '>' . $m[2] . '</h2>';
		},
		$html
	);

	$toc  = array();
	$used = array();
	$html = preg_replace_callback(
		'#<h([23])(\s[^>]*)?>(.*?)</h\1>#is',
		static function ( $m ) use ( &$toc, &$used ) {
			$attrs = isset( $m[2] ) ? $m[2] : '';
			$text  = trim( html_entity_decode( wp_strip_all_tags( $m[3] ), ENT_QUOTES, 'UTF-8' ) );
			if ( '' === $text ) {
				return $m[0];
			}

			if ( preg_match( '#\sid=(["\'])(.*?)\1#i', $attrs, $id_match ) ) {
				$id = $id_match[2];
			} else {
				$base = sanitize_title( $text );
				$base = '' !== $base ? $base : 'section';
				$id   = $base;
				$n    = 2;
				while ( isset( $used[ $id ] ) ) {
					$id = $base . '-' . $n++;
				}
				$attrs .= ' id="' . esc_attr( $id ) . '"';
			}
			$used[ $id ] = true;
			$toc[]       = array(
				'level' => (int) $m[1],
				'id'    => $id,
				'text'  => $text,
			);

			return '<h' . $m[1] . $attrs . '>' . $m[3] . '</h' . $m[1] . '>';
		},
		$html
	);

	$html = preg_replace( '#<table\b.*?</table>#is', '<div class="ifb-table-wrap">$0</div>', $html );

	$lead             = ltrim( preg_replace( '#<!--.*?-->#s', '', $html ) );
	$opens_with_image = (bool) preg_match( '#^(<div[^>]*>\s*)*(<p[^>]*>\s*)?(<a[^>]*>\s*)?<(img|figure)\b#i', $lead );

	return array(
		'html'             => $html,
		'toc'              => $toc,
		'opens_with_image' => $opens_with_image,
	);
}

/** Primary category: Yoast primary term, else the first category other than the generic "Blog". */
function infometry_ct_blog_primary_category( $post_id ) {
	$primary = (int) get_post_meta( $post_id, '_yoast_wpseo_primary_category', true );
	if ( $primary ) {
		$term = get_term( $primary, 'category' );
		if ( $term && ! is_wp_error( $term ) ) {
			return $term;
		}
	}

	$categories = get_the_category( $post_id );
	foreach ( $categories as $category ) {
		if ( 'blog' !== $category->slug ) {
			return $category;
		}
	}
	return $categories ? $categories[0] : null;
}

/** Up to three related posts: same primary category first, then the latest posts. */
function infometry_ct_blog_related_posts( $post_id, $category ) {
	$args = array(
		'post_type'           => 'post',
		'post_status'         => 'publish',
		'posts_per_page'      => 3,
		'post__not_in'        => array( $post_id ),
		'ignore_sticky_posts' => true,
		'no_found_rows'       => true,
	);

	$posts = array();
	if ( $category ) {
		$posts = get_posts( $args + array( 'cat' => $category->term_id ) );
	}

	if ( count( $posts ) < 3 ) {
		$exclude = array_merge( array( $post_id ), wp_list_pluck( $posts, 'ID' ) );
		$more    = get_posts( array_merge( $args, array( 'posts_per_page' => 3 - count( $posts ), 'post__not_in' => $exclude ) ) );
		$posts   = array_merge( $posts, $more );
	}

	return $posts;
}

/** Estimated reading time in minutes. */
function infometry_ct_blog_reading_time( $html ) {
	$words = str_word_count( wp_strip_all_tags( $html ) );
	return max( 1, (int) ceil( $words / 220 ) );
}
