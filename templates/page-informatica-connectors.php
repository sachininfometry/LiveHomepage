<?php
/**
 * Template Name: Informatica Connectors Product
 * Template Post Type: page
 *
 * @package Infometry_Custom_Templates
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

$contact_url = home_url( '/contact-us/' );
$connectors  = array(
	array( 'type' => 'drive', 'title' => 'Google Drive Connector', 'short' => 'Google Drive', 'copy' => 'Seamlessly move files from Google Drive to platforms like Snowflake, NetSuite, and more. Automate file transfer, scheduling, and secure data flow—enabling collaborative, cloud-first workflows.', 'url' => home_url( '/product/google-drive-connector/' ) ),
	array( 'type' => 'sheets', 'title' => 'Google Sheets Connector', 'short' => 'Google Sheets', 'copy' => 'Enable seamless no-code read/write operations to extract, sync, and integrate spreadsheet data for ETL, reporting, and analytics—empowering finance, marketing, and operations teams efficiently.', 'url' => home_url( '/product/google-sheets-connector/' ) ),
	array( 'type' => 'pubsub', 'title' => 'Google Pub/Sub Connector', 'short' => 'Google Pub/Sub', 'copy' => 'Build real-time analytics pipelines and streaming data applications with ease. Connect Informatica Cloud with Google Pub/Sub for message publishing, subscription retrieval, and live data streaming.', 'url' => home_url( '/product/google-pub-sub/' ) ),
	array( 'type' => 'bigtable', 'title' => 'Google BigTable Connector', 'short' => 'Google BigTable', 'copy' => 'Manage and process massive datasets efficiently. Read, write, and delete data at petabyte scale while maintaining high throughput across analytics platforms—ideal for big data and AI-powered insights.', 'url' => home_url( '/product/google-bigtable-connector/' ) ),
	array( 'type' => 'ads', 'title' => 'Google Ads Connector', 'short' => 'Google Ads', 'copy' => 'Simplify campaign, ad group, and customer data integration. Feed marketing insights directly into your data warehouse to empower Agentic AI-Driven analytics and optimize ROI with data-backed decisions.', 'url' => home_url( '/product/google-ads-connector/' ) ),
);

$connector_groups = array(
	array(
		'class'    => 'is-infometry',
		'eyebrow' => 'Built & supported by Infometry',
		'title'    => 'Infometry Owned',
		'items'    => array(
			array( 'name' => 'Google Sheets', 'type' => 'sheets', 'display' => 'Google Sheets' ),
			array( 'name' => 'Google Drive', 'type' => 'drive', 'display' => 'Google Drive' ),
			array( 'name' => 'Google Cloud Pub/Sub', 'type' => 'pubsub', 'display' => 'Google Pub/Sub' ),
			array( 'name' => 'Google Ads', 'type' => 'ads', 'display' => 'Google Ads' ),
			array( 'name' => 'Google BigTable', 'type' => 'bigtable', 'display' => 'Google BigTable' ),
			array( 'name' => 'Adaptive Insights', 'type' => 'adaptive', 'display' => 'Adaptive Insights', 'icon' => 'adaptive-symbol.png' ),
			array( 'name' => 'HubSpot', 'type' => 'hubspot', 'display' => 'HubSpot' ),
		),
	),
	array(
		'class'    => 'is-informatica',
		'eyebrow' => 'Native enterprise connector portfolio',
		'title'    => 'Informatica Owned',
		'items'    => array(
			array( 'name' => 'SAP ABAP', 'logo' => 'sap-supplied.png', 'viewport' => '--logo-ratio:3.4648;--logo-width:100%;--logo-left:0%;--logo-top:0%', 'badge' => 'M' ),
			array( 'name' => 'Workday', 'logo' => 'workday-supplied.png', 'viewport' => '--logo-ratio:2.4945;--logo-width:106.3609%;--logo-left:-3.2544%;--logo-top:-0.7380%', 'badge' => 'M' ),
			array( 'name' => 'Concur', 'logo' => 'concur-supplied.png', 'viewport' => '--logo-ratio:4.2353;--logo-width:111.1111%;--logo-left:-5.5556%;--logo-top:-185.2941%' ),
			array( 'name' => 'Zuora', 'logo' => 'zuora-supplied.png', 'viewport' => '--logo-ratio:4.8729;--logo-width:104.1739%;--logo-left:-2.0870%;--logo-top:-90.6780%' ),
			array( 'name' => 'Amplitude', 'logo' => 'amplitude-supplied.png', 'viewport' => '--logo-ratio:4.7545;--logo-width:131.3576%;--logo-left:-15.6788%;--logo-top:-115.4545%', 'badge' => 'D' ),
			array( 'name' => 'Eloqua', 'logo' => 'eloqua-supplied.png', 'viewport' => '--logo-ratio:2.6958;--logo-width:100.4231%;--logo-left:-0.1410%;--logo-top:-2.6616%' ),
			array( 'name' => 'Twilio Segment', 'logo' => 'segment-supplied.png', 'viewport' => '--logo-ratio:4.7536;--logo-width:101.6768%;--logo-left:-0.9146%;--logo-top:-86.2319%', 'badge' => 'D' ),
			array( 'name' => 'Salesforce Pardot', 'logo' => 'pardot-supplied.png', 'viewport' => '--logo-ratio:2.5625;--logo-width:100%;--logo-left:0%;--logo-top:0%', 'badge' => 'D' ),
			array( 'name' => 'Oracle BigMachines', 'logo' => 'bigmachines-supplied.png', 'viewport' => '--logo-ratio:2.2419;--logo-width:109.3525%;--logo-left:-6.4748%;--logo-top:-9.6774%' ),
			array( 'name' => 'Mixpanel', 'logo' => 'mixpanel-supplied.png', 'viewport' => '--logo-ratio:3.0370;--logo-width:100%;--logo-left:0%;--logo-top:0%' ),
			array( 'name' => 'Jira Software', 'logo' => 'jira-supplied.png', 'viewport' => '--logo-ratio:7.6340;--logo-width:100%;--logo-left:0%;--logo-top:0%' ),
			array( 'name' => 'Microsoft Azure', 'logo' => 'azure-supplied.png', 'viewport' => '--logo-ratio:6.7667;--logo-width:110.8374%;--logo-left:-5.4187%;--logo-top:-326.6667%' ),
		),
	),
	array(
		'class'    => 'is-customer',
		'eyebrow' => 'Managed by customers',
		'title'    => 'Customer Owned',
		'items'    => array(
			array( 'name' => 'NICE Satmetrix', 'logo' => 'satmetrix-supplied.png', 'viewport' => '--logo-ratio:7.7833;--logo-width:107.0664%;--logo-left:-3.4261%;--logo-top:-368.3333%' ),
			array( 'name' => 'CallidusCloud', 'logo' => 'calliduscloud-supplied.png', 'viewport' => '--logo-ratio:2.6525;--logo-width:105.4313%;--logo-left:-3.8339%;--logo-top:-16.9492%' ),
			array( 'name' => 'Litmos', 'logo' => 'litmos-supplied.png', 'viewport' => '--logo-ratio:3.8919;--logo-width:111.1111%;--logo-left:-5.5556%;--logo-top:-166.2162%' ),
		),
	),
);

if ( ! function_exists( 'infometry_iin_connector_logo' ) ) {
	function infometry_iin_connector_logo( $type ) {
		$labels = array( 'drive' => 'Google Drive', 'sheets' => 'Google Sheets', 'pubsub' => 'Google Pub/Sub', 'bigtable' => 'Google BigTable', 'ads' => 'Google Ads', 'adaptive' => 'Adaptive Insights', 'hubspot' => 'HubSpot' );
		$label  = isset( $labels[ $type ] ) ? $labels[ $type ] : 'Connector';
		?>
		<span class="iin-brand iin-brand-<?php echo esc_attr( $type ); ?>" role="img" aria-label="<?php echo esc_attr( $label ); ?>">
			<?php if ( 'drive' === $type ) : ?>
				<svg class="iin-brand-svg" viewBox="0 0 64 56"><path fill="#0F9D58" d="M22 4h17l22 38H44z"/><path fill="#F4B400" d="M22 4 2 40l9 16 20-36z"/><path fill="#4285F4" d="M11 56h42l8-14H19z"/></svg>
			<?php elseif ( 'sheets' === $type ) : ?>
				<svg class="iin-brand-svg" viewBox="0 0 52 60"><path fill="#0F9D58" d="M7 1h27l12 12v46H7z"/><path fill="#87CEAC" d="M34 1v13h12z"/><path fill="#fff" d="M15 24h24v24H15zm4 4v4h6v-4zm10 0v4h6v-4zM19 36v4h6v-4zm10 0v4h6v-4z"/></svg>
			<?php elseif ( 'pubsub' === $type ) : ?>
				<svg class="iin-brand-svg" viewBox="0 0 64 64"><path fill="#4285F4" d="m32 2 27 15v30L32 62 5 47V17z"/><circle fill="#fff" cx="20" cy="32" r="5"/><circle fill="#fff" cx="42" cy="20" r="5"/><circle fill="#fff" cx="42" cy="44" r="5"/><path stroke="#fff" stroke-width="4" d="m24 29 13-7M24 35l13 7"/></svg>
			<?php elseif ( 'bigtable' === $type ) : ?>
				<svg class="iin-brand-svg" viewBox="0 0 64 64"><path fill="#4E7EF7" d="m32 2 28 16v28L32 62 4 46V18z"/><path fill="none" stroke="#fff" stroke-width="2" d="m32 11 19 11v20L32 53 13 42V22zm0 7 13 7v14l-13 7-13-7V25zm0 7 7 4v7l-7 4-7-4v-7z"/></svg>
			<?php elseif ( 'ads' === $type ) : ?>
				<svg class="iin-brand-svg" viewBox="0 0 64 58"><path fill="#4285F4" d="M25 6a10 10 0 0 1 18 1l19 34-17 10L25 16a10 10 0 0 1 0-10z"/><path fill="#34A853" d="M25 6 2 45l18 10 23-40z"/><circle fill="#FBBC04" cx="12" cy="46" r="10"/></svg>
			<?php elseif ( 'adaptive' === $type ) : ?>
				<svg class="iin-brand-svg" viewBox="0 0 64 64"><path fill="#0E9DCC" d="M3 8 31 58 38 8 22 34z"/><path fill="#F6A623" d="m38 8 23 4-30 46z"/><path fill="#43C6A8" d="M3 8h35L22 34z"/></svg>
			<?php else : ?>
				<svg class="iin-brand-svg" viewBox="0 0 64 64"><path fill="none" stroke="#FF6B35" stroke-width="6" d="M22 17v29m0-16h20m-2-9 9-7m-9 26 9 7"/><circle fill="#FF6B35" cx="22" cy="14" r="8"/><circle fill="#FF6B35" cx="22" cy="49" r="8"/><circle fill="#FF6B35" cx="49" cy="13" r="7"/><circle fill="#FF6B35" cx="49" cy="48" r="7"/><circle fill="#fff" stroke="#FF6B35" stroke-width="5" cx="40" cy="30" r="9"/></svg>
			<?php endif; ?>
		</span>
		<?php
	}
}
?>

<main class="infometry-informatica-product" id="infometry-informatica-product">
	<svg class="iin-icon-sprite" aria-hidden="true" focusable="false">
		<symbol id="iin-pipeline" viewBox="0 0 48 48"><circle cx="9" cy="11" r="5"/><circle cx="39" cy="10" r="5"/><circle cx="24" cy="38" r="5"/><path d="M14 11h12a6 6 0 0 1 6 6v3m-17-5v7a6 6 0 0 0 6 6h3m15-15v11a6 6 0 0 1-6 6h-4"/></symbol>
		<symbol id="iin-chart" viewBox="0 0 48 48"><path d="M7 40V9m0 31h35M14 34V23h7v11m5 0V13h7v21m5 0V19h6v15"/></symbol>
		<symbol id="iin-cloud" viewBox="0 0 48 48"><path d="M13 37h24a8 8 0 0 0 1-16 14 14 0 0 0-26-2 9 9 0 0 0 1 18Z"/></symbol>
		<symbol id="iin-code" viewBox="0 0 48 48"><rect x="6" y="7" width="36" height="34" rx="3"/><path d="m19 18-7 6 7 6m10-12 7 6-7 6m-3-16-5 20"/></symbol>
		<symbol id="iin-spark" viewBox="0 0 48 48"><path d="m24 4 3 10 10 3-10 3-3 10-3-10-10-3 10-3Zm13 22 2 6 6 2-6 2-2 7-2-7-6-2 6-2ZM10 29l2 5 5 2-5 2-2 5-2-5-5-2 5-2Z"/></symbol>
		<symbol id="iin-database" viewBox="0 0 48 48"><ellipse cx="24" cy="10" rx="15" ry="6"/><path d="M9 10v12c0 3 7 6 15 6s15-3 15-6V10M9 22v13c0 3 7 6 15 6s15-3 15-6V22"/></symbol>
	</svg>

	<section class="iin-hero" aria-labelledby="iin-hero-title"><div class="iin-shell iin-hero-grid">
		<div class="iin-hero-copy"><span class="iin-eyebrow">Informatica Connectors</span><h1 id="iin-hero-title">Informatica Certified Connectors for <em>Seamless Data Integration</em></h1><p>Pre-built, no-code connectors that accelerate data integration on Informatica. Automate workflows end-to-end, connect your enterprise applications, and unlock ecosystems of AI, analytics, and cloud connectivity in hours—not weeks or months.</p><div class="iin-actions"><a class="iin-button iin-button-primary" href="#iin-demo-form">Request a Demo</a><a class="iin-button iin-button-ghost" href="<?php echo esc_url( $contact_url ); ?>">Talk to Sales <span>→</span></a></div></div>
		<div class="iin-control-center is-ecosystem" aria-label="Informatica connector ecosystem">
			<div class="iin-cc-header"><span>Connector Ecosystem</span><b>One platform. Connected possibilities.</b></div>
			<div class="iin-cc-body">
				<aside class="iin-cc-hub"><span class="iin-cc-hub-mark"><img src="<?php echo esc_url( INFOMETRY_CT_URL . 'assets/images/informatica-product-mark.png' ); ?>" alt=""></span><strong>Informatica IDMC</strong><small>Unified connector hub</small><ul><li>Secure pipelines</li><li>No-code scale</li><li>Enterprise ready</li></ul></aside>
				<div class="iin-cc-groups">
					<?php foreach ( $connector_groups as $group ) : ?>
						<section class="iin-cc-group <?php echo esc_attr( $group['class'] ); ?>" aria-label="<?php echo esc_attr( $group['title'] ); ?> connectors">
							<header><span></span><div><h2><?php echo esc_html( $group['title'] ); ?></h2><small><?php echo esc_html( $group['eyebrow'] ); ?></small></div><b><?php echo esc_html( count( $group['items'] ) ); ?> connectors</b></header>
							<div class="iin-cc-logos">
								<?php $visible_items = 'is-informatica' === $group['class'] ? array_slice( $group['items'], 0, 9 ) : $group['items']; ?>
								<?php foreach ( $visible_items as $item ) : ?>
									<span class="iin-cc-logo" title="<?php echo esc_attr( $item['name'] ); ?>">
										<?php if ( ! empty( $item['viewport'] ) ) : ?>
											<span class="iin-cc-wordmark" style="<?php echo esc_attr( $item['viewport'] ); ?>"><img src="<?php echo esc_url( INFOMETRY_CT_URL . 'assets/images/connectors/' . $item['logo'] ); ?>" alt="<?php echo esc_attr( $item['name'] ); ?> logo"></span>
										<?php elseif ( ! empty( $item['type'] ) ) : ?>
											<span class="iin-cc-product-mark"><?php if ( ! empty( $item['icon'] ) ) : ?><span class="iin-brand"><img src="<?php echo esc_url( INFOMETRY_CT_URL . 'assets/images/connectors/' . $item['icon'] ); ?>" alt=""></span><?php else : ?><?php infometry_iin_connector_logo( $item['type'] ); ?><?php endif; ?><span class="iin-cc-product-label"><span><?php echo esc_html( $item['display'] ); ?></span><?php if ( ! empty( $item['display_second'] ) ) : ?><span><?php echo esc_html( $item['display_second'] ); ?></span><?php endif; ?></span></span>
										<?php else : ?>
											<img src="<?php echo esc_url( INFOMETRY_CT_URL . 'assets/images/connectors/' . $item['logo'] ); ?>" alt="<?php echo esc_attr( $item['name'] ); ?> logo">
										<?php endif; ?>
									</span>
								<?php endforeach; ?>
								<?php if ( count( $visible_items ) < count( $group['items'] ) ) : ?>
									<details class="iin-cc-more-menu">
										<summary class="iin-cc-more">More <span aria-hidden="true">+</span></summary>
										<div class="iin-cc-more-content"><strong>Additional connectors</strong><ul><?php foreach ( array_slice( $group['items'], count( $visible_items ) ) as $extra_item ) : ?><li title="<?php echo esc_attr( $extra_item['name'] ); ?>"><span class="iin-cc-extra-logo" style="<?php echo esc_attr( $extra_item['viewport'] ); ?>"><img src="<?php echo esc_url( INFOMETRY_CT_URL . 'assets/images/connectors/' . $extra_item['logo'] ); ?>" alt="<?php echo esc_attr( $extra_item['name'] ); ?> logo"></span></li><?php endforeach; ?></ul></div>
									</details>
								<?php endif; ?>
							</div>
						</section>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</div></section>

	<section class="iin-featured" id="featured-connectors" aria-labelledby="iin-featured-title"><div class="iin-shell"><div class="iin-heading"><span>Featured</span><h2 id="iin-featured-title">Featured Google Connectors</h2><p>Certified connectors to the most widely used Google services—secure, reliable, and built for scale.</p></div><div class="iin-connector-grid"><?php foreach ( $connectors as $connector ) : ?><article class="iin-connector-card"><?php infometry_iin_connector_logo( $connector['type'] ); ?><h3><?php echo esc_html( $connector['title'] ); ?></h3><p><?php echo esc_html( $connector['copy'] ); ?></p><a href="<?php echo esc_url( $connector['url'] ); ?>">Learn more <span>→</span></a></article><?php endforeach; ?></div></div></section>

	<section class="iin-enterprise-section" aria-labelledby="iin-enterprise-title"><div class="iin-shell iin-enterprise-panel"><div class="iin-heading iin-heading-light"><span>Global Enterprise Connectors</span><h2 id="iin-enterprise-title">Enterprise Connectors Beyond Google</h2><p>Connect critical enterprise applications with high-performance, secure, and no-code connectors.</p></div><div class="iin-enterprise-grid"><a href="<?php echo esc_url( home_url( '/product/adaptive-insight-connector/' ) ); ?>"><?php infometry_iin_connector_logo( 'adaptive' ); ?><div><h3>Adaptive Insights Connector</h3><p>Enable two-way data integration between Adaptive Insights and ERP systems like NetSuite, Salesforce, and Intacct. Automate financial planning, reporting, and analysis—all through No Code workflows.</p><ul><li>Real-time data synchronization</li><li>Automated financial data pipelines</li><li>Secure and governed access</li></ul></div></a><a href="<?php echo esc_url( home_url( '/product/hubspot-connector/' ) ); ?>"><?php infometry_iin_connector_logo( 'hubspot' ); ?><div><h3>HubSpot Connector</h3><p>Streamline CRM and marketing operations by reading and writing HubSpot objects like deals, contacts, and companies, ensuring seamless data flow and Agentic AI-powered insights for intelligent engagement.</p><ul><li>Contacts, deals, and activities sync</li><li>Marketing and sales insights</li><li>End-to-end workflow automation</li></ul></div></a></div></div></section>

	<section class="iin-cta-section" aria-labelledby="iin-trial-title"><div class="iin-shell"><div class="iin-cta"><span class="iin-cta-icon" aria-hidden="true"><svg viewBox="0 0 48 48"><use href="#iin-pipeline"/></svg></span><div><h2 id="iin-trial-title">Ready to connect your enterprise data?</h2><p>Start building secure, no-code Informatica workflows with Infometry's certified connectors.</p></div><div class="iin-actions"><a class="iin-button iin-button-primary" href="<?php echo esc_url( $contact_url ); ?>">Start Your Free Trial</a></div></div></div></section>

	<section class="iin-benefits-section" aria-labelledby="iin-benefits-title"><div class="iin-shell"><div class="iin-heading"><span>Why Choose Infometry</span><h2 id="iin-benefits-title">Why Choose Infometry Informatica Connectors?</h2></div><div class="iin-benefits"><article><svg><use href="#iin-pipeline"/></svg><h3>Automate End-to-End Data Pipelines</h3><p>Build and automate complete data workflows from source to destination without manual effort.</p></article><article><svg><use href="#iin-chart"/></svg><h3>Real-Time Analytics &amp; Reporting</h3><p>Deliver timely, accurate insights with real-time integration and advanced transformations.</p></article><article><svg><use href="#iin-cloud"/></svg><h3>Scale Across Clouds &amp; Systems</h3><p>Seamlessly connect cloud services, on-prem systems, and hybrid environments.</p></article><article><svg><use href="#iin-code"/></svg><h3>Enable No-Code Workflows</h3><p>Pre-built connectors and intuitive configuration empower teams to move faster.</p></article><article><svg><use href="#iin-spark"/></svg><h3>Agentic AI-Ready Connectivity</h3><p>Leverage AI-driven orchestration and predictive insights to optimize data workflows.</p></article></div></div></section>

	<section class="iin-demo-section" id="iin-demo-form" aria-labelledby="iin-demo-title"><div class="iin-shell"><div class="iin-heading"><span>Schedule a Demo</span><h2 id="iin-demo-title">Experience Informatica connectivity in action.</h2><p>Choose a convenient date and tell us where your data workflows need to go next.</p></div><div class="iin-demo-grid"><div class="iin-demo-calendar" data-iin-demo-calendar><div class="iin-calendar-head"><button type="button" data-iin-calendar-prev aria-label="Previous month">‹</button><strong data-iin-calendar-label>Choose a Date</strong><button type="button" data-iin-calendar-next aria-label="Next month">›</button></div><div class="iin-calendar-weekdays" aria-hidden="true"><i>Sun</i><i>Mon</i><i>Tue</i><i>Wed</i><i>Thu</i><i>Fri</i><i>Sat</i></div><div class="iin-calendar-days" data-iin-calendar-days></div><p class="iin-selected-date" data-iin-selected-date aria-live="polite"></p></div><div class="iin-demo-form-host"><?php if ( shortcode_exists( 'wpforms' ) ) : ?><?php echo do_shortcode( sprintf( '[wpforms id="%d" title="false" description="false" ajax="true"]', absint( INFOMETRY_CT_CONVERSA_FORM_ID ) ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?><?php else : ?><div class="iin-demo-form"><div class="icp-demo-form-head"><strong>Request your personalized demo</strong><p>Share your details and our analytics team will connect with you.</p></div><p>The request form is temporarily unavailable.</p><a class="iin-button iin-button-primary" href="<?php echo esc_url( $contact_url ); ?>">Contact Us</a></div><?php endif; ?></div></div></div></section>

	<section class="iin-related" aria-labelledby="iin-related-title"><div class="iin-shell"><div class="iin-heading"><span>Explore the Ecosystem</span><h2 id="iin-related-title">Other Products</h2></div><div class="iin-related-grid"><a class="iin-product-conversa" href="<?php echo esc_url( home_url( '/product/conversational-analytics/' ) ); ?>"><span class="iin-product-icon"><img src="<?php echo esc_url( INFOMETRY_CT_URL . 'assets/images/infofiscus-conversa-mark.png' ); ?>" alt=""></span><h3>INFOFISCUS Conversa</h3><p>AI-powered conversational analytics that turns enterprise data into governed, meaningful insights through natural language.</p><b>Explore Conversa <span>→</span></b></a><a class="iin-product-snowflake" href="<?php echo esc_url( home_url( '/product/#infofiscus-snowflake-native-apps' ) ); ?>"><span class="iin-product-icon"><img src="<?php echo esc_url( INFOMETRY_CT_URL . 'assets/images/snowflake-product-mark.png' ); ?>" alt=""></span><h3>INFOFISCUS Snowflake Native Apps</h3><p>Native Snowflake applications that accelerate analytics, integration, and operational reporting.</p><b>Snowflake Native Apps <span>→</span></b></a><a class="iin-product-analytics" href="<?php echo esc_url( home_url( '/product/#pre-built-apps' ) ); ?>"><span class="iin-product-icon"><svg viewBox="0 0 48 48" aria-hidden="true"><path d="M10 38V12m0 26h28M16 31l7-8 6 5 8-12"/></svg></span><h3>Pre-Built Analytics Apps</h3><p>Ready-to-use analytics solutions for IDMC and Matillion that reduce implementation time.</p><b>Pre-Built Analytics Apps <span>→</span></b></a></div></div></section>

	<footer class="iin-footer"><div class="iin-shell iin-footer-grid"><div class="iin-footer-connect"><h3>Connect with us</h3><a class="iin-footer-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url( INFOMETRY_CT_URL . 'assets/images/infometry-logo-white.png' ); ?>" alt="Infometry"></a><p>Turning enterprise data into trusted insights, intelligent decisions and measurable business outcomes.</p><div class="iin-footer-socials"><a href="https://www.facebook.com/infometryinc/" aria-label="Infometry on Facebook"><img src="<?php echo esc_url( INFOMETRY_CT_URL . 'assets/images/social-facebook.png' ); ?>" alt=""></a><a href="https://x.com/Infometryinc" aria-label="Infometry on X"><img src="<?php echo esc_url( INFOMETRY_CT_URL . 'assets/images/social-x.png' ); ?>" alt=""></a><a href="https://www.linkedin.com/company/infometry-inc" aria-label="Infometry on LinkedIn"><img src="<?php echo esc_url( INFOMETRY_CT_URL . 'assets/images/social-linkedin.png' ); ?>" alt=""></a><a href="https://www.youtube.com/channel/UCYYc9Fa7iPiVLDEiSvG7DmQ" aria-label="Infometry on YouTube"><img src="<?php echo esc_url( INFOMETRY_CT_URL . 'assets/images/social-youtube.png' ); ?>" alt=""></a><a href="https://in.pinterest.com/infometryincus/_saved/" aria-label="Infometry on Pinterest"><img src="<?php echo esc_url( INFOMETRY_CT_URL . 'assets/images/social-pinterest.png' ); ?>" alt=""></a><a href="https://www.instagram.com/infometry_inc/" aria-label="Infometry on Instagram"><img src="<?php echo esc_url( INFOMETRY_CT_URL . 'assets/images/social-instagram.png' ); ?>" alt=""></a><a href="https://www.g2.com/sellers/infometry-inc#profiles" aria-label="Infometry on G2"><img src="<?php echo esc_url( INFOMETRY_CT_URL . 'assets/images/social-g2.png' ); ?>" alt=""></a></div><a class="iin-footer-contact" href="<?php echo esc_url( $contact_url ); ?>">Contact Us <span>→</span></a></div><div><h3>Products</h3><a href="<?php echo esc_url( home_url( '/product/conversational-analytics/' ) ); ?>">INFOFISCUS Conversa</a><a href="<?php echo esc_url( home_url( '/product/google-cloud-connectors/' ) ); ?>">Google Connectors for Informatica</a><a href="<?php echo esc_url( home_url( '/product/global-cloud-connector/' ) ); ?>">Global Connectors for Informatica</a><a href="<?php echo esc_url( home_url( '/product/#infofiscus-snowflake-native-apps' ) ); ?>">Snowflake Native Apps</a><a href="<?php echo esc_url( home_url( '/product/#pre-built-apps' ) ); ?>">Pre-Built Apps</a><a href="<?php echo esc_url( home_url( '/product/#accelerators' ) ); ?>">Accelerators</a></div><div><h3>Resources</h3><a href="<?php echo esc_url( home_url( '/resources/blog/' ) ); ?>">Blog</a><a href="<?php echo esc_url( home_url( '/resources/infometry-case-studies/' ) ); ?>">Case Studies</a><a href="<?php echo esc_url( home_url( '/whitepapers/' ) ); ?>">Whitepapers</a><a href="<?php echo esc_url( home_url( '/resources/gallery/' ) ); ?>">Gallery</a><a href="<?php echo esc_url( home_url( '/resources/webinar/' ) ); ?>">Webinar</a><a href="<?php echo esc_url( home_url( '/resources/press-releases/' ) ); ?>">Press Releases</a></div><div><h3>Company</h3><a href="<?php echo esc_url( home_url( '/company/customers-partners/' ) ); ?>">Customers - Partners</a><a href="<?php echo esc_url( home_url( '/company/careers/' ) ); ?>">Careers</a><a href="<?php echo esc_url( home_url( '/company/life-at-infometry/' ) ); ?>">Life@Infometry</a><a href="<?php echo esc_url( home_url( '/company/testimonials/' ) ); ?>">Testimonials</a></div></div><div class="iin-shell iin-footer-bottom"><span>© 2026 Infometry Inc. All Rights Reserved.</span><span>Enabling AI for Every Enterprise</span></div></footer>
</main>

<?php get_footer(); ?>
