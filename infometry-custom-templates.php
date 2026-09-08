<?php
/**
 * Plugin Name: Infometry Custom Templates
 * Description: Provides isolated Infometry homepage and INFOFISCUS Conversa page templates.
 * Version: 2.1.17
 * Author: Infometry
 * Text Domain: infometry-custom-templates
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'INFOMETRY_CT_VERSION', '2.1.17' );
define( 'INFOMETRY_CT_PATH', plugin_dir_path( __FILE__ ) );
define( 'INFOMETRY_CT_URL', plugin_dir_url( __FILE__ ) );
define( 'INFOMETRY_CT_HOME_TEMPLATE', 'templates/page-home-design-test.php' );
define( 'INFOMETRY_CT_CONVERSA_TEMPLATE', 'templates/page-infofiscus-conversa.php' );
define( 'INFOMETRY_CT_CONVERSA_FORM_ID', 379751 );
define( 'INFOMETRY_CT_HOME_META_TITLE', 'Enterprise Data Analytics & AI Solutions | Infometry' );
define( 'INFOMETRY_CT_HOME_META_DESCRIPTION', 'Explore Infometry’s data analytics, AI, cloud data, integration, Snowflake, Databricks, and pre-built solutions designed to accelerate enterprise transformation.' );

/**
 * Keep the live homepage SEO metadata aligned across WordPress and common SEO plugins.
 */
function infometry_ct_home_meta_title( $title ) {
	return infometry_ct_should_use_home_template() ? INFOMETRY_CT_HOME_META_TITLE : $title;
}
add_filter( 'pre_get_document_title', 'infometry_ct_home_meta_title', 99 );
add_filter( 'wpseo_title', 'infometry_ct_home_meta_title', 99 );
add_filter( 'wpseo_opengraph_title', 'infometry_ct_home_meta_title', 99 );
add_filter( 'wpseo_twitter_title', 'infometry_ct_home_meta_title', 99 );
add_filter( 'rank_math/frontend/title', 'infometry_ct_home_meta_title', 99 );
add_filter( 'aioseo_title', 'infometry_ct_home_meta_title', 99 );

function infometry_ct_home_meta_description( $description ) {
	return infometry_ct_should_use_home_template() ? INFOMETRY_CT_HOME_META_DESCRIPTION : $description;
}
add_filter( 'wpseo_metadesc', 'infometry_ct_home_meta_description', 99 );
add_filter( 'wpseo_opengraph_desc', 'infometry_ct_home_meta_description', 99 );
add_filter( 'wpseo_twitter_description', 'infometry_ct_home_meta_description', 99 );
add_filter( 'rank_math/frontend/description', 'infometry_ct_home_meta_description', 99 );
add_filter( 'aioseo_description', 'infometry_ct_home_meta_description', 99 );

/**
 * WordPress core has no metadata description filter, so emit one only when an SEO
 * plugin is not responsible for the page head.
 */
function infometry_ct_home_meta_description_fallback() {
	if ( ! infometry_ct_should_use_home_template() ) {
		return;
	}

	$seo_plugin_active = defined( 'WPSEO_VERSION' ) || defined( 'RANK_MATH_VERSION' ) || defined( 'AIOSEO_VERSION' ) || class_exists( 'SEOPress\Core\Hooks' );
	if ( $seo_plugin_active ) {
		return;
	}

	printf( '<meta name="description" content="%s" />\n', esc_attr( INFOMETRY_CT_HOME_META_DESCRIPTION ) );
}
add_action( 'wp_head', 'infometry_ct_home_meta_description_fallback', 1 );

/**
 * Return the exact FAQ copy rendered on the Conversa page.
 *
 * Keeping the visible FAQ and its structured data on one source prevents
 * schema text from drifting away from the page content.
 *
 * @return array
 */
function infometry_ct_get_conversa_faqs() {
	return array(
		array( 'question' => 'What is a conversational analytics platform?', 'answer' => 'It is an AI-driven analytics system that lets users ask data questions in everyday language and immediately get governed answers without dashboards or manual SQL.' ),
		array( 'question' => 'How does a conversational analytics platform work?', 'answer' => 'It understands intent with natural language processing, maps the question to a governed semantic model, runs optimized queries on connected data, and returns charts, numbers, and plain-English summaries.' ),
		array( 'question' => 'Is Conversa secure?', 'answer' => 'Yes. Conversa is designed for enterprise security with role-based access, governed definitions, auditability, and query execution against approved enterprise data sources.' ),
		array( 'question' => 'What data sources does Conversa support?', 'answer' => 'Conversa can connect to modern cloud and hybrid data platforms including Snowflake, BigQuery, Redshift, Azure Synapse, Oracle, PostgreSQL, SQL Server, and similar structured data stores.' ),
		array( 'question' => 'Can conversational analytics handle complex business questions?', 'answer' => 'Yes. It can support multi-step, business-specific questions and follow-up analysis grounded in live enterprise data and semantic definitions.' ),
		array( 'question' => 'Does conversational analytics respect role-based access?', 'answer' => 'Yes. Users only see the data they are authorized to access, with permissions aligned to enterprise security policies.' ),
		array( 'question' => 'Can conversational analytics replace dashboards?', 'answer' => 'It complements dashboards. Dashboards remain useful for recurring monitoring, while Conversa helps users investigate new questions and explore data faster.' ),
		array( 'question' => 'What makes INFOFISCUS Conversa different?', 'answer' => 'Conversa combines natural language queries, direct warehouse access, semantic governance, SQL transparency, document intelligence, and business-friendly answers in one enterprise platform.' ),
	);
}

/**
 * Expose both plugin templates in the WordPress page-template selector.
 *
 * @param array $templates Available page templates.
 * @return array
 */
function infometry_ct_register_page_template( $templates ) {
	$templates[ INFOMETRY_CT_HOME_TEMPLATE ]     = __( 'Home Design Test', 'infometry-custom-templates' );
	$templates[ INFOMETRY_CT_CONVERSA_TEMPLATE ] = __( 'INFOFISCUS Conversa Product', 'infometry-custom-templates' );

	return $templates;
}
add_filter( 'theme_page_templates', 'infometry_ct_register_page_template' );

/**
 * Resolve the original page ID for normal, preview, revision, and autosave requests.
 *
 * @return int
 */
function infometry_ct_get_current_page_id() {
	$page_id = get_queried_object_id();

	if ( is_preview() && isset( $_GET['preview_id'] ) ) {
		$preview_id = absint( wp_unslash( $_GET['preview_id'] ) );
		if ( $preview_id ) {
			$page_id = $preview_id;
		}
	}

	if ( ! $page_id && isset( $GLOBALS['post']->ID ) ) {
		$page_id = absint( $GLOBALS['post']->ID );
	}

	$revision_parent = $page_id ? wp_is_post_revision( $page_id ) : false;
	if ( $revision_parent ) {
		$page_id = (int) $revision_parent;
	}

	$autosave_parent = $page_id ? wp_is_post_autosave( $page_id ) : false;
	if ( $autosave_parent ) {
		$page_id = (int) $autosave_parent;
	}

	return (int) $page_id;
}

/**
 * Check whether a page has selected a particular plugin template.
 *
 * @param string $template_slug Template slug.
 * @return bool
 */
function infometry_ct_should_use_template( $template_slug ) {
	$page_id = infometry_ct_get_current_page_id();

	if ( ! $page_id || 'page' !== get_post_type( $page_id ) ) {
		return false;
	}

	return $template_slug === get_page_template_slug( $page_id );
}

/**
 * Decide whether the homepage template is active.
 *
 * @return bool
 */
function infometry_ct_should_use_home_template() {
	return infometry_ct_should_use_template( INFOMETRY_CT_HOME_TEMPLATE );
}

/**
 * Decide whether the Conversa product template is active.
 *
 * @return bool
 */
function infometry_ct_should_use_conversa_template() {
	return infometry_ct_should_use_template( INFOMETRY_CT_CONVERSA_TEMPLATE );
}

/**
 * Load the selected template from this plugin without modifying BeTheme.
 *
 * @param string $template Resolved template path.
 * @return string
 */
function infometry_ct_load_page_template( $template ) {
	if ( infometry_ct_should_use_home_template() ) {
		$plugin_template = INFOMETRY_CT_PATH . INFOMETRY_CT_HOME_TEMPLATE;
		if ( is_readable( $plugin_template ) ) {
			return $plugin_template;
		}
	}

	if ( infometry_ct_should_use_conversa_template() ) {
		$plugin_template = INFOMETRY_CT_PATH . INFOMETRY_CT_CONVERSA_TEMPLATE;
		if ( is_readable( $plugin_template ) ) {
			return $plugin_template;
		}
	}

	return $template;
}
add_filter( 'page_template', 'infometry_ct_load_page_template', PHP_INT_MAX );
add_filter( 'template_include', 'infometry_ct_load_page_template', PHP_INT_MAX );

/**
 * Add page-specific body classes for safely scoped styling.
 *
 * @param array $classes Existing body classes.
 * @return array
 */
function infometry_ct_body_classes( $classes ) {
	if ( infometry_ct_should_use_home_template() ) {
		$classes[] = 'infometry-home-test-page';
	}

	if ( infometry_ct_should_use_conversa_template() ) {
		$classes[] = 'infometry-conversa-product-page';
	}

	return array_unique( $classes );
}
add_filter( 'body_class', 'infometry_ct_body_classes' );

/**
 * Add Conversa entities to Yoast's existing graph without duplicating its
 * WebSite or Organization entities.
 *
 * @param array  $graph   Yoast schema graph.
 * @param object $context Yoast meta-tags context.
 * @return array
 */
function infometry_ct_add_conversa_schema( $graph, $context ) {
	if ( ! infometry_ct_should_use_conversa_template() ) {
		return $graph;
	}

	$canonical       = ! empty( $context->canonical ) ? (string) $context->canonical : (string) get_permalink();
	$canonical       = trailingslashit( $canonical );
	$software_id     = $canonical . '#softwareapplication';
	$faq_id          = $canonical . '#faq';
	$organization_id = trailingslashit( home_url( '/' ) ) . '#organization';
	$existing_types  = array();
	$existing_ids    = array();

	foreach ( $graph as $piece ) {
		if ( ! is_array( $piece ) ) {
			continue;
		}

		if ( isset( $piece['@id'] ) ) {
			$existing_ids[] = (string) $piece['@id'];
		}

		if ( isset( $piece['@type'] ) ) {
			$piece_types    = (array) $piece['@type'];
			$existing_types = array_merge( $existing_types, $piece_types );
		}
	}

	if ( ! in_array( $software_id, $existing_ids, true ) && ! in_array( 'SoftwareApplication', $existing_types, true ) ) {
		$graph[] = array(
			'@type'               => 'SoftwareApplication',
			'@id'                 => $software_id,
			'name'                => 'INFOFISCUS Conversa',
			'url'                 => $canonical,
			'description'         => 'AI-powered conversational analytics platform that lets teams query enterprise data in plain English. Turn questions into SQL and get instant insights without searching through dashboards.',
			'applicationCategory' => 'BusinessApplication',
			'operatingSystem'     => 'Windows, macOS',
			'image'               => INFOMETRY_CT_URL . 'assets/images/infofiscus-conversa-logo.png',
			'publisher'           => array( '@id' => $organization_id ),
			'mainEntityOfPage'    => array( '@id' => $canonical ),
		);
	}

	if ( ! in_array( $faq_id, $existing_ids, true ) && ! in_array( 'FAQPage', $existing_types, true ) ) {
		$faq_entities = array();

		foreach ( infometry_ct_get_conversa_faqs() as $faq ) {
			$faq_entities[] = array(
				'@type'          => 'Question',
				'name'           => $faq['question'],
				'acceptedAnswer' => array(
					'@type' => 'Answer',
					'text'  => $faq['answer'],
				),
			);
		}

		$graph[] = array(
			'@type'      => 'FAQPage',
			'@id'        => $faq_id,
			'url'        => $canonical . '#icp-faq',
			'isPartOf'   => array( '@id' => $canonical ),
			'mainEntity' => $faq_entities,
		);
	}

	return $graph;
}
add_filter( 'wpseo_schema_graph', 'infometry_ct_add_conversa_schema', 20, 2 );

/**
 * Set production-safe labels on the existing WPForms name field.
 *
 * @param array $properties Rendered field properties.
 * @param array $field      WPForms field data.
 * @param array $form_data  WPForms form data.
 * @return array
 */
function infometry_ct_conversa_name_field_properties( $properties, $field, $form_data ) {
	if (
		INFOMETRY_CT_CONVERSA_FORM_ID !== absint( $form_data['id'] )
		|| 0 !== absint( $field['id'] )
	) {
		return $properties;
	}

	if ( isset( $properties['inputs']['first']['sublabel']['value'] ) ) {
		$properties['inputs']['first']['sublabel']['value'] = __( 'First Name', 'infometry-custom-templates' );
	}

	if ( isset( $properties['inputs']['last']['sublabel']['value'] ) ) {
		$properties['inputs']['last']['sublabel']['value'] = __( 'Last Name', 'infometry-custom-templates' );
	}

	return $properties;
}
add_filter( 'wpforms_field_properties_name', 'infometry_ct_conversa_name_field_properties', 10, 3 );

/**
 * Keep the Conversa form on-page after a successful AJAX submission.
 *
 * @param array $form_data Processed WPForms form data.
 * @return array
 */
function infometry_ct_conversa_ajax_confirmation( $form_data ) {
	if ( INFOMETRY_CT_CONVERSA_FORM_ID !== absint( $form_data['id'] ) ) {
		return $form_data;
	}

	$form_data['settings']['ajax_submit'] = '1';

	if ( ! empty( $form_data['settings']['confirmations'] ) && is_array( $form_data['settings']['confirmations'] ) ) {
		foreach ( $form_data['settings']['confirmations'] as &$confirmation ) {
			$confirmation['type']    = 'message';
			$confirmation['message'] = esc_html__( 'Thank you. Your interactive demo is opening in a new tab.', 'infometry-custom-templates' );
		}
		unset( $confirmation );
	}

	return $form_data;
}
add_filter( 'wpforms_frontend_form_data', 'infometry_ct_conversa_ajax_confirmation' );
add_filter( 'wpforms_process_before_form_data', 'infometry_ct_conversa_ajax_confirmation' );

/**
 * Add the custom scheduling fields inside the existing WPForms form.
 *
 * @param array   $form_data Processed WPForms form data.
 * @param WP_Post $form      WPForms form post.
 */
function infometry_ct_render_conversa_form_fields( $form_data, $form ) {
	if (
		! infometry_ct_should_use_conversa_template()
		|| INFOMETRY_CT_CONVERSA_FORM_ID !== absint( $form_data['id'] )
	) {
		return;
	}
	?>
	<div class="icp-demo-form-head">
		<strong><?php esc_html_e( 'Request your personalized demo', 'infometry-custom-templates' ); ?></strong>
		<p><?php esc_html_e( 'Share your details and our analytics team will connect with you.', 'infometry-custom-templates' ); ?></p>
	</div>
	<div class="icp-form-row icp-demo-preferences">
		<label>
			<?php esc_html_e( 'Demo Date', 'infometry-custom-templates' ); ?>
			<input type="hidden" name="infometry_conversa[preferred_demo_date]" data-icp-demo-date value="">
			<input type="text" data-icp-demo-date-display readonly required>
		</label>
		<label>
			<?php esc_html_e( 'Demo Time', 'infometry-custom-templates' ); ?> <span>*</span>
			<input type="time" name="infometry_conversa[preferred_demo_time]" data-icp-demo-time required>
		</label>
		<label>
			<?php esc_html_e( 'Time Zone', 'infometry-custom-templates' ); ?> <span>*</span>
			<select name="infometry_conversa[preferred_demo_timezone]" data-icp-demo-timezone required>
				<option value="America/New_York"><?php esc_html_e( 'Eastern Time (ET)', 'infometry-custom-templates' ); ?></option>
				<option value="America/Chicago"><?php esc_html_e( 'Central Time (CT)', 'infometry-custom-templates' ); ?></option>
				<option value="America/Denver"><?php esc_html_e( 'Mountain Time (MT)', 'infometry-custom-templates' ); ?></option>
				<option value="America/Phoenix"><?php esc_html_e( 'Arizona Time (MST)', 'infometry-custom-templates' ); ?></option>
				<option value="America/Los_Angeles"><?php esc_html_e( 'Pacific Time (PT)', 'infometry-custom-templates' ); ?></option>
				<option value="America/Anchorage"><?php esc_html_e( 'Alaska Time (AKT)', 'infometry-custom-templates' ); ?></option>
				<option value="Pacific/Honolulu"><?php esc_html_e( 'Hawaii Time (HT)', 'infometry-custom-templates' ); ?></option>
			</select>
		</label>
	</div>
	<label class="icp-demo-company">
		<?php esc_html_e( 'Company', 'infometry-custom-templates' ); ?>
		<input type="text" name="infometry_conversa[company]" autocomplete="organization">
	</label>
	<?php
}
add_action( 'wpforms_frontend_output', 'infometry_ct_render_conversa_form_fields', 10, 2 );

/**
 * Include the custom schedule fields in the existing WPForms notification.
 *
 * WPForms Lite sends notifications but does not store entries, so appending
 * these values to the normal notification keeps every submitted field together.
 *
 * @param array $email           Notification attributes.
 * @param array $fields          Processed WPForms fields.
 * @param array $entry           Raw entry data.
 * @param array $form_data       Processed form data.
 * @param int   $notification_id Notification ID.
 * @return array
 */
function infometry_ct_add_conversa_fields_to_notification( $email, $fields, $entry, $form_data, $notification_id ) {
	if ( INFOMETRY_CT_CONVERSA_FORM_ID !== absint( $form_data['id'] ) ) {
		return $email;
	}

	$details = isset( $_POST['infometry_conversa'] ) && is_array( $_POST['infometry_conversa'] )
		? wp_unslash( $_POST['infometry_conversa'] )
		: array();

	$date    = isset( $details['preferred_demo_date'] ) ? sanitize_text_field( $details['preferred_demo_date'] ) : '';
	$time    = isset( $details['preferred_demo_time'] ) ? sanitize_text_field( $details['preferred_demo_time'] ) : '';
	$timezone = isset( $details['preferred_demo_timezone'] ) ? sanitize_text_field( $details['preferred_demo_timezone'] ) : '';
	$company = isset( $details['company'] ) ? sanitize_text_field( $details['company'] ) : '';

	$extra = '<h3>' . esc_html__( 'Demo preferences', 'infometry-custom-templates' ) . '</h3>';
	$extra .= '<p><strong>' . esc_html__( 'Preferred Demo Date:', 'infometry-custom-templates' ) . '</strong> ' . esc_html( $date ?: 'Not provided' ) . '<br>';
	$extra .= '<strong>' . esc_html__( 'Preferred Demo Time:', 'infometry-custom-templates' ) . '</strong> ' . esc_html( $time ?: 'Not provided' ) . '<br>';
	$extra .= '<strong>' . esc_html__( 'US Time Zone:', 'infometry-custom-templates' ) . '</strong> ' . esc_html( $timezone ?: 'Not provided' ) . '<br>';
	$extra .= '<strong>' . esc_html__( 'Company:', 'infometry-custom-templates' ) . '</strong> ' . esc_html( $company ?: 'Not provided' ) . '</p>';

	$email['message'] .= $extra;

	return $email;
}
add_filter( 'wpforms_entry_email_atts', 'infometry_ct_add_conversa_fields_to_notification', 10, 5 );

/**
 * Identify Cloudways' temporary application hostname.
 *
 * The production reCAPTCHA key is valid on infometry.net but Google rejects it
 * on the temporary cloudwaysapps.com hostname used for staging previews.
 *
 * @return bool
 */
function infometry_ct_is_cloudways_staging_host() {
	$host = isset( $_SERVER['HTTP_HOST'] ) ? strtolower( sanitize_text_field( wp_unslash( $_SERVER['HTTP_HOST'] ) ) ) : '';
	$host = preg_replace( '/:\d+$/', '', $host );

	return $host && (
		'cloudwaysapps.com' === $host
		|| '.cloudwaysapps.com' === substr( $host, -18 )
	);
}

/**
 * Do not initialize the production reCAPTCHA key on the Cloudways preview.
 *
 * @param bool $disabled Whether CAPTCHA assets are disabled.
 * @return bool
 */
function infometry_ct_disable_staging_recaptcha( $disabled ) {
	if ( infometry_ct_is_cloudways_staging_host() && infometry_ct_should_use_conversa_template() ) {
		return true;
	}

	return $disabled;
}
add_filter( 'wpforms_frontend_recaptcha_disable', 'infometry_ct_disable_staging_recaptcha' );

/**
 * Match frontend CAPTCHA behavior during WPForms processing on staging.
 *
 * @param bool  $bypass    Whether CAPTCHA verification is bypassed.
 * @param array $entry     Raw entry data.
 * @param array $form_data Processed form data.
 * @return bool
 */
function infometry_ct_bypass_staging_recaptcha( $bypass, $entry, $form_data ) {
	if (
		infometry_ct_is_cloudways_staging_host()
		&& INFOMETRY_CT_CONVERSA_FORM_ID === absint( $form_data['id'] )
	) {
		return true;
	}

	return $bypass;
}
add_filter( 'wpforms_process_bypass_captcha', 'infometry_ct_bypass_staging_recaptcha', 10, 3 );

/**
 * Print critical Conversa overrides before cached/minified assets load.
 */
function infometry_ct_print_conversa_critical_css() {
	if ( ! infometry_ct_should_use_conversa_template() ) {
		return;
	}
	?>
	<style id="infometry-conversa-critical-css">
		body.infometry-conversa-product-page #Footer,
		body.infometry-conversa-product-page #Footer_wrapper,
		body.infometry-conversa-product-page .mfn-footer,
		body.infometry-conversa-product-page footer#Footer,
		body.infometry-conversa-product-page #mfn-rev-slider,
		body.infometry-conversa-product-page .mfn-rev-slider,
		body.infometry-conversa-product-page rs-module-wrap,
		body.infometry-conversa-product-page .forcefullwidth_wrapper_tp_banner,
		body.infometry-conversa-product-page .rev_slider_wrapper,
		body.infometry-conversa-product-page [id^="rev_slider_"][id$="_wrapper"],
		body.infometry-conversa-product-page [id^="rev_slider_"][id$="_forcefullwidth"] {
			display: none !important;
			height: 0 !important;
			min-height: 0 !important;
			padding: 0 !important;
			margin: 0 !important;
			overflow: hidden !important;
		}
		body.infometry-conversa-product-page .infometry-conversa-product .icp-product-footer {
			display: block !important;
			height: auto !important;
			min-height: 0 !important;
			overflow: hidden;
		}
		body.infometry-conversa-product-page .infometry-conversa-product .icp-shell {
			width: min(100% - 64px, 1400px);
		}
		body.infometry-conversa-product-page .infometry-conversa-product .icp-hero-grid {
			grid-template-columns: minmax(520px, .82fr) minmax(660px, 1.18fr);
			gap: 72px;
			padding-top: 126px;
		}
		body.infometry-conversa-product-page .infometry-conversa-product .icp-hero h1 {
			max-width: 640px;
		}
		@media (max-width: 1280px) {
			body.infometry-conversa-product-page .infometry-conversa-product .icp-hero-grid {
				grid-template-columns: 1fr;
			}
		}
		@media (max-width: 860px) {
			body.infometry-conversa-product-page .infometry-conversa-product .icp-shell {
				width: min(100% - 32px, 1180px);
			}
			body.infometry-conversa-product-page .infometry-conversa-product .icp-hero-grid {
				gap: 34px;
				padding-top: 118px;
			}
		}
	</style>
	<?php
}
add_action( 'wp_head', 'infometry_ct_print_conversa_critical_css', 1 );

/**
 * Enqueue isolated assets only for the currently selected plugin template.
 */
function infometry_ct_enqueue_assets() {
	$use_home     = infometry_ct_should_use_home_template();
	$use_conversa = infometry_ct_should_use_conversa_template();

	if ( ! $use_home && ! $use_conversa ) {
		return;
	}

	if ( $use_home ) {
		$css_path    = INFOMETRY_CT_PATH . 'assets/css/home-design-test.css';
		$js_path     = INFOMETRY_CT_PATH . 'assets/js/home-design-test.js';
		$css_version = is_readable( $css_path ) ? (string) filemtime( $css_path ) : INFOMETRY_CT_VERSION;
		$js_version  = is_readable( $js_path ) ? (string) filemtime( $js_path ) : INFOMETRY_CT_VERSION;

		wp_enqueue_style(
			'infometry-home-google-fonts',
			'https://fonts.googleapis.com/css2?family=Montserrat:wght@700;800&family=Open+Sans:wght@400;500;600;700;800&family=Roboto:wght@500;600;700;800&display=swap',
			array(),
			null
		);

		wp_enqueue_style(
			'infometry-home-design-test',
			INFOMETRY_CT_URL . 'assets/css/home-design-test.css',
			array( 'infometry-home-google-fonts' ),
			$css_version
		);

		wp_enqueue_script(
			'infometry-home-design-test',
			INFOMETRY_CT_URL . 'assets/js/home-design-test.js',
			array(),
			$js_version,
			true
		);
	}

	if ( $use_conversa ) {
		$css_path    = INFOMETRY_CT_PATH . 'assets/css/infofiscus-conversa.css';
		$js_path     = INFOMETRY_CT_PATH . 'assets/js/infofiscus-conversa.js';
		$css_version = is_readable( $css_path ) ? (string) filemtime( $css_path ) : INFOMETRY_CT_VERSION;
		$js_version  = is_readable( $js_path ) ? (string) filemtime( $js_path ) : INFOMETRY_CT_VERSION;

		wp_enqueue_style(
			'infometry-conversa-google-fonts',
			'https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600;700;800&family=Roboto:wght@400;500;600;700;800;900&display=swap',
			array(),
			null
		);

		wp_enqueue_style(
			'infometry-infofiscus-conversa',
			INFOMETRY_CT_URL . 'assets/css/infofiscus-conversa.css',
			array( 'infometry-conversa-google-fonts' ),
			$css_version
		);

		wp_enqueue_script(
			'infometry-infofiscus-conversa',
			INFOMETRY_CT_URL . 'assets/js/infofiscus-conversa.js',
			array(),
			$js_version,
			true
		);
	}
}
add_action( 'wp_enqueue_scripts', 'infometry_ct_enqueue_assets', 20 );

/**
 * Preconnect only on pages that request the custom Google Fonts stylesheets.
 *
 * @param array  $urls          Existing resource hints.
 * @param string $relation_type Resource-hint relationship.
 * @return array
 */
function infometry_ct_font_resource_hints( $urls, $relation_type ) {
	if (
		'preconnect' !== $relation_type
		|| ( ! infometry_ct_should_use_home_template() && ! infometry_ct_should_use_conversa_template() )
	) {
		return $urls;
	}

	$existing_hrefs = array_map(
		static function ( $url ) {
			return is_array( $url ) && isset( $url['href'] ) ? $url['href'] : $url;
		},
		$urls
	);

	if ( ! in_array( 'https://fonts.googleapis.com', $existing_hrefs, true ) ) {
		$urls[] = 'https://fonts.googleapis.com';
	}

	if ( ! in_array( 'https://fonts.gstatic.com', $existing_hrefs, true ) ) {
		$urls[] = array(
			'href'        => 'https://fonts.gstatic.com',
			'crossorigin' => 'anonymous',
		);
	}

	return $urls;
}
add_filter( 'wp_resource_hints', 'infometry_ct_font_resource_hints', 10, 2 );
