<?php
/**
 * Small SEO fixes that have no visible effect on any page.
 *
 *   - Home page: Yoast's WebPage schema used the page's stored SEO title and
 *     description (a copy of the Conversa page), while the <title> and Open Graph
 *     tags already use the home values. The schema now matches them.
 *   - /advanced-analytics-2/ (an older duplicate of /advanced-analytics/ that
 *     canonicalised to itself) redirects permanently to /advanced-analytics/.
 *     This can later move to the Redirection plugin; remove it here if so.
 *
 * @package Infometry_Custom_Templates
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/** Home page WebPage schema: same name and description as its title and meta tags. */
function infometry_ct_home_webpage_schema( $data ) {
	if ( ! function_exists( 'infometry_ct_should_use_home_template' ) || ! infometry_ct_should_use_home_template() ) {
		return $data;
	}

	if ( defined( 'INFOMETRY_CT_HOME_META_TITLE' ) ) {
		$data['name'] = INFOMETRY_CT_HOME_META_TITLE;
	}
	if ( defined( 'INFOMETRY_CT_HOME_META_DESCRIPTION' ) ) {
		$data['description'] = INFOMETRY_CT_HOME_META_DESCRIPTION;
	}
	return $data;
}
add_filter( 'wpseo_schema_webpage', 'infometry_ct_home_webpage_schema', 20 );

/** Permanent redirects for retired duplicate URLs. */
function infometry_ct_retired_url_redirects() {
	if ( empty( $_SERVER['REQUEST_URI'] ) ) {
		return;
	}

	$redirects = array(
		'/advanced-analytics-2' => '/advanced-analytics/',
	);

	$path = untrailingslashit( (string) wp_parse_url( wp_unslash( $_SERVER['REQUEST_URI'] ), PHP_URL_PATH ) );
	if ( isset( $redirects[ $path ] ) ) {
		wp_safe_redirect( home_url( $redirects[ $path ] ), 301, 'Infometry Custom Templates' );
		exit;
	}
}
add_action( 'template_redirect', 'infometry_ct_retired_url_redirects', 1 );
