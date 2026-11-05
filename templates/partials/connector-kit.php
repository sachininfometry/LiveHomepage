<?php
/**
 * Shared helpers for the Google connector product pages (Sheets, Drive), which
 * share assets/css/google-sheets-connector.css and its .igs-* design system.
 *
 * @package Infometry_Custom_Templates
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'infometry_ct_igs_img' ) ) {
	/** Image tag with intrinsic dimensions read from the plugin file. */
	function infometry_ct_igs_img( $url, $alt, $class = '' ) {
		$dims = @getimagesize( str_replace( INFOMETRY_CT_URL, INFOMETRY_CT_PATH, $url ) ); // phpcs:ignore WordPress.PHP.NoSilencedErrors.Discouraged
		printf(
			'<img%s src="%s" alt="%s"%s loading="lazy" decoding="async">',
			$class ? ' class="' . esc_attr( $class ) . '"' : '',
			esc_url( $url ),
			esc_attr( $alt ),
			$dims ? sprintf( ' width="%d" height="%d"', $dims[0], $dims[1] ) : ''
		);
	}
}
