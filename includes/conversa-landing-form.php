<?php
/**
 * Lead form for the INFOFISCUS Conversa ads landing page.
 *
 * Self-contained on purpose: it does not use WPForms, so no existing form, its
 * fields or its notifications are affected. Each request is:
 *   - saved as a private "Landing Leads" entry in WP admin (kept even if email fails);
 *   - emailed through wp_mail() (the site's normal mail setup) to the same
 *     recipients as the Conversa demo form; see infometry_ct_landing_lead_recipients().
 *
 * Spam protection without nonces (the page is cached by Varnish, so a nonce
 * would go stale): a hidden honeypot field, a minimum time on the page, and a
 * per-IP limit.
 *
 * @package Infometry_Custom_Templates
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! defined( 'INFOMETRY_CT_LANDING_LEAD_EMAIL' ) ) {
	define( 'INFOMETRY_CT_LANDING_LEAD_EMAIL', 'info@infometry.net' );
}

/**
 * Send landing leads to the same people as the Conversa demo form.
 *
 * Read-only: takes the notification recipients saved on WPForms form 379751
 * (the Conversa demo form) without changing that form. {admin_email} is the
 * only smart tag used for recipients; anything unreadable falls back to
 * INFOMETRY_CT_LANDING_LEAD_EMAIL.
 *
 * @return string[] Email addresses.
 */
function infometry_ct_landing_lead_recipients() {
	$to   = array();
	$form = defined( 'INFOMETRY_CT_CONVERSA_FORM_ID' ) ? get_post( INFOMETRY_CT_CONVERSA_FORM_ID ) : null;
	$data = $form ? json_decode( $form->post_content, true ) : null;

	if ( is_array( $data ) && ! empty( $data['settings']['notification_enable'] ) && ! empty( $data['settings']['notifications'] ) && is_array( $data['settings']['notifications'] ) ) {
		foreach ( $data['settings']['notifications'] as $notification ) {
			if ( empty( $notification['email'] ) ) {
				continue;
			}
			$list = str_replace( '{admin_email}', get_option( 'admin_email' ), (string) $notification['email'] );
			foreach ( preg_split( '/[,;\s]+/', $list ) as $address ) {
				$address = sanitize_email( $address );
				if ( is_email( $address ) ) {
					$to[] = strtolower( $address );
				}
			}
		}
	}

	if ( ! $to ) {
		$to[] = INFOMETRY_CT_LANDING_LEAD_EMAIL;
	}

	return array_values( array_unique( apply_filters( 'infometry_ct_landing_lead_email', $to ) ) );
}

/** Private post type that keeps a copy of every landing-page lead. */
function infometry_ct_register_landing_leads() {
	register_post_type(
		'infometry_lead',
		array(
			'labels'              => array(
				'name'          => __( 'Landing Leads', 'infometry-custom-templates' ),
				'singular_name' => __( 'Landing Lead', 'infometry-custom-templates' ),
			),
			'public'              => false,
			'publicly_queryable'  => false,
			'exclude_from_search' => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_rest'        => false,
			'menu_icon'           => 'dashicons-email-alt',
			'supports'            => array( 'title', 'editor' ),
			'capability_type'     => 'post',
			'capabilities'        => array( 'create_posts' => 'do_not_allow' ),
			'map_meta_cap'        => true,
		)
	);
}
add_action( 'init', 'infometry_ct_register_landing_leads' );

/**
 * Send the visitor back to the form with a status (used when JavaScript is off).
 *
 * @param string $status ok or error.
 */
function infometry_ct_landing_lead_redirect( $status ) {
	$back = wp_get_referer();
	if ( ! $back ) {
		$back = home_url( '/infofiscus-conversa-landing-page/' );
	}
	$back = remove_query_arg( 'icl_lead', $back );
	wp_safe_redirect( add_query_arg( 'icl_lead', $status, $back ) . '#icl-demo' );
	exit;
}

/**
 * Finish a request: JSON for the page script, a redirect otherwise.
 *
 * On success the JSON tells the page script where to send the visitor, and the
 * no-JavaScript path redirects there directly; errors return to the form.
 *
 * @param bool   $ok      Whether the lead was accepted.
 * @param string $message Message for the visitor.
 */
function infometry_ct_landing_lead_respond( $ok, $message ) {
	$thank_you = apply_filters( 'infometry_ct_landing_lead_thankyou_url', 'https://www.infometry.net/thank-you/' );

	if ( ! empty( $_POST['icl_ajax'] ) ) { // phpcs:ignore WordPress.Security.NonceVerification.Missing
		$payload = array( 'ok' => $ok, 'message' => $message );
		if ( $ok ) {
			$payload['redirect'] = $thank_you;
		}
		wp_send_json( $payload, $ok ? 200 : 400 );
	}

	if ( $ok ) {
		// Known, hardcoded destination (not user input); wp_redirect so it works
		// even when the thank-you page is on the production host, not staging.
		wp_redirect( $thank_you ); // phpcs:ignore WordPress.Security.SafeRedirect.wp_redirect_wp_redirect
		exit;
	}

	infometry_ct_landing_lead_redirect( 'error' );
}

/** Handle a lead submitted from the landing page. */
function infometry_ct_handle_landing_lead() {
	// phpcs:disable WordPress.Security.NonceVerification.Missing -- cached public page; see file header.
	$field = static function ( $key, $max = 200 ) {
		return isset( $_POST[ $key ] ) ? mb_substr( sanitize_text_field( wp_unslash( $_POST[ $key ] ) ), 0, $max ) : '';
	};

	// Bots fill the hidden field or submit instantly: pretend success, store nothing.
	$started = absint( $field( 'icl_t', 20 ) );
	if ( '' !== $field( 'icl_website' ) || ! $started || ( time() - $started ) < 3 ) {
		infometry_ct_landing_lead_respond( true, 'Thank you. Our analytics team will connect with you to schedule a time.' );
	}

	$name    = $field( 'icl_name', 120 );
	$email   = sanitize_email( $field( 'icl_email', 160 ) );
	$company = $field( 'icl_company', 160 );
	$phone   = $field( 'icl_phone', 40 );
	$url     = isset( $_POST['icl_url'] ) ? esc_url_raw( wp_unslash( $_POST['icl_url'] ) ) : '';
	// phpcs:enable

	if ( '' === $name || '' === $company || ! is_email( $email ) ) {
		infometry_ct_landing_lead_respond( false, 'Please enter your full name, a valid company email and your company.' );
	}

	$ip  = isset( $_SERVER['HTTP_CF_CONNECTING_IP'] ) ? sanitize_text_field( wp_unslash( $_SERVER['HTTP_CF_CONNECTING_IP'] ) ) : ( isset( $_SERVER['REMOTE_ADDR'] ) ? sanitize_text_field( wp_unslash( $_SERVER['REMOTE_ADDR'] ) ) : '' );
	$key = 'icl_lead_' . md5( $ip );
	$hit = (int) get_transient( $key );
	if ( $hit >= 5 ) {
		infometry_ct_landing_lead_respond( false, 'Too many requests. Please try again later or email info@infometry.net.' );
	}
	set_transient( $key, $hit + 1, HOUR_IN_SECONDS );

	$rows = array(
		'Full name'      => $name,
		'Company email'  => $email,
		'Company'        => $company,
		'Contact number' => '' !== $phone ? $phone : 'Not provided',
		'Landing URL'    => '' !== $url ? $url : 'Not provided',
		'Submitted'      => wp_date( 'Y-m-d H:i T' ),
	);
	$text = '';
	$html = '<h2>New demo request: INFOFISCUS Conversa ads landing page</h2><table cellpadding="6" style="border-collapse:collapse">';
	foreach ( $rows as $label => $value ) {
		$text .= $label . ': ' . $value . "\n";
		$html .= '<tr><th align="left" style="border-bottom:1px solid #ddd">' . esc_html( $label ) . '</th><td style="border-bottom:1px solid #ddd">' . esc_html( $value ) . '</td></tr>';
	}
	$html .= '</table>';

	wp_insert_post(
		array(
			'post_type'    => 'infometry_lead',
			'post_status'  => 'private',
			'post_title'   => $name . ' (' . $company . ')',
			'post_content' => $text,
		)
	);

	$set_html = static function () {
		return 'text/html';
	};
	add_filter( 'wp_mail_content_type', $set_html );
	wp_mail(
		infometry_ct_landing_lead_recipients(),
		'Conversa demo request (ads landing page): ' . $name . ', ' . $company,
		$html,
		array( 'Reply-To: ' . $name . ' <' . $email . '>' )
	);
	remove_filter( 'wp_mail_content_type', $set_html );

	infometry_ct_landing_lead_respond( true, 'Thank you. Our analytics team will connect with you to schedule a time.' );
}
add_action( 'admin_post_nopriv_infometry_landing_lead', 'infometry_ct_handle_landing_lead' );
add_action( 'admin_post_infometry_landing_lead', 'infometry_ct_handle_landing_lead' );
