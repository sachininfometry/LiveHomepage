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
$connectors = array(
	array( 'mark' => 'G', 'class' => 'is-drive', 'title' => 'Google Drive Connector', 'copy' => 'Sync files and metadata to your data pipelines.', 'tag' => 'Real-Time', 'url' => home_url( '/product/google-drive-connector/' ) ),
	array( 'mark' => 'S', 'class' => 'is-sheets', 'title' => 'Google Sheets Connector', 'copy' => 'Sync spreadsheets seamlessly for analytics and ETL.', 'tag' => 'Real-Time', 'url' => home_url( '/product/google-sheets-connector/' ) ),
	array( 'mark' => 'BQ', 'class' => 'is-bigquery', 'title' => 'Google BigQuery Connector', 'copy' => 'Stream and transform enterprise data at scale.', 'tag' => 'Real-Time', 'url' => home_url( '/product/google-bigtable-connector/' ) ),
	array( 'mark' => 'PS', 'class' => 'is-pubsub', 'title' => 'Google Pub/Sub Connector', 'copy' => 'Enable event-driven integration and live data streams.', 'tag' => 'Real-Time', 'url' => home_url( '/product/google-pub-sub/' ) ),
	array( 'mark' => 'A', 'class' => 'is-ads', 'title' => 'Google Ads Connector', 'copy' => 'Ingest campaign data for governed reporting and insights.', 'tag' => 'Real-Time', 'url' => home_url( '/product/google-ads-connector/' ) ),
);

?>

<main class="infometry-informatica-product" id="infometry-informatica-product">
	<svg class="iin-icon-sprite" aria-hidden="true" focusable="false">
		<symbol id="iin-shield" viewBox="0 0 24 24"><path d="M12 2 4 5v6c0 5 3 9 8 11 5-2 8-6 8-11V5l-8-3Z"/><path d="m8 12 3 3 5-6"/></symbol>
		<symbol id="iin-code" viewBox="0 0 24 24"><path d="m8 9-4 3 4 3m8-6 4 3-4 3M14 4l-4 16"/></symbol>
		<symbol id="iin-swap" viewBox="0 0 24 24"><path d="M4 8h15m-4-4 4 4-4 4M20 16H5m4-4-4 4 4 4"/></symbol>
		<symbol id="iin-cloud" viewBox="0 0 24 24"><path d="M7 18h11a4 4 0 0 0 .4-8A7 7 0 0 0 5 9a4.5 4.5 0 0 0 2 9Z"/></symbol>
		<symbol id="iin-database" viewBox="0 0 24 24"><ellipse cx="12" cy="5" rx="7" ry="3"/><path d="M5 5v6c0 1.7 3.1 3 7 3s7-1.3 7-3V5M5 11v6c0 1.7 3.1 3 7 3s7-1.3 7-3v-6"/></symbol>
		<symbol id="iin-chart" viewBox="0 0 24 24"><path d="M4 19V5M4 19h16M8 16v-5m4 5V8m4 8V6"/></symbol>
		<symbol id="iin-nodes" viewBox="0 0 24 24"><circle cx="5" cy="12" r="2"/><circle cx="12" cy="5" r="2"/><circle cx="19" cy="12" r="2"/><circle cx="12" cy="19" r="2"/><path d="m7 10 3-3m4 0 3 3m0 4-3 3m-4 0-3-3"/></symbol>
		<symbol id="iin-pulse" viewBox="0 0 24 24"><path d="M2 12h5l2-6 4 12 2-6h7"/></symbol>
		<symbol id="iin-plug" viewBox="0 0 24 24"><path d="M8 3v5m8-5v5M6 8h12v3a6 6 0 0 1-12 0V8Zm6 9v4"/></symbol>
		<symbol id="iin-gear" viewBox="0 0 24 24"><circle cx="12" cy="12" r="3"/><path d="M19 13.5v-3l-2.2-.7-.5-1.2 1-2-2.1-2.1-2 1L12 5l-.7-2h-3l-.7 2-1.2.5-2-1-2.1 2.1 1 2-.5 1.2-2.2.7v3l2.2.7.5 1.2-1 2 2.1 2.1 2-1 1.2.5.7 2h3l.7-2 1.2-.5 2 1 2.1-2.1-1-2 .5-1.2 2.2-.7Z"/></symbol>
		<symbol id="iin-arrow" viewBox="0 0 24 24"><path d="M5 12h14m-5-5 5 5-5 5"/></symbol>
	</svg>

	<section class="iin-hero">
		<div class="iin-shell iin-hero-grid">
			<div class="iin-hero-copy">
				<span class="iin-eyebrow">Informatica IDMC Connections</span>
				<h1>Connect Anything.<br>Move Data Faster.<br>Scale <em>Without Code.</em></h1>
				<p>Certified Informatica connectors that connect Google Cloud and enterprise applications through reliable, scalable pipelines—so your data moves where it matters.</p>
				<div class="iin-actions"><a class="iin-button iin-button-primary" href="#featured-connectors">Explore Connectors <span>→</span></a><a class="iin-button iin-button-secondary" href="<?php echo esc_url( $contact_url ); ?>">Talk to an Integration Expert</a></div>
			</div>
			<div class="iin-orbit" aria-label="Informatica IDMC connecting enterprise sources and destinations">
				<div class="iin-orbit-ring ring-one"></div><div class="iin-orbit-ring ring-two"></div><div class="iin-orbit-ring ring-three"></div>
				<div class="iin-orbit-core"><img src="<?php echo esc_url( INFOMETRY_CT_URL . 'assets/images/informatica-product-mark.png' ); ?>" alt=""><strong>Informatica<br>IDMC</strong></div>
				<div class="iin-orbit-list is-left"><span>Google Drive</span><span>Google Sheets</span><span>BigQuery</span><span>Database</span></div>
				<div class="iin-orbit-list is-right"><span>Snowflake</span><span>NetSuite</span><span>Analytics &amp; BI</span><span>Enterprise Apps</span></div>
			</div>
		</div>
	</section>

	<section class="iin-value-strip"><div class="iin-shell iin-value-grid">
		<article><svg><use href="#iin-shield"/></svg><div><h3>Certified Connectors</h3><p>Built and certified for Informatica IDMC</p></div></article>
		<article><svg><use href="#iin-code"/></svg><div><h3>No-Code Integration</h3><p>Connect and orchestrate pipelines visually</p></div></article>
		<article><svg><use href="#iin-swap"/></svg><div><h3>Bi-Directional Data</h3><p>Sync data with real-time updates both ways</p></div></article>
		<article><svg><use href="#iin-cloud"/></svg><div><h3>Enterprise Scale</h3><p>Performance, governance, and reliability</p></div></article>
	</div></section>

	<section class="iin-section"><div class="iin-shell iin-flow-panel">
		<div class="iin-flow-copy"><span class="iin-kicker">Pre-built integration</span><h2>Connect Enterprise Data<br>Without Building Every<br>Pipeline From Scratch</h2><p>Infometry connectors are pre-built, certified, and optimized for Informatica IDMC—eliminating custom development and accelerating time-to-value.</p><ul><li>Pre-configured connections and pipelines</li><li>Real-time and incremental data sync</li><li>Secure, scalable, and production-ready</li></ul></div>
		<div class="iin-flow-map">
			<div><b>Sources</b><span>Google Cloud Apps</span><span>Enterprise Apps</span><span>Databases</span><span>SaaS Applications</span><span>Files &amp; APIs</span></div>
			<div class="iin-flow-center"><b>Integration Layer</b><strong><img src="<?php echo esc_url( INFOMETRY_CT_URL . 'assets/images/informatica-product-mark.png' ); ?>" alt=""> Informatica IDMC</strong><span>Pre-built Connectors</span><span>Mappings &amp; Orchestration</span><span>Monitoring &amp; Governance</span></div>
			<div><b>Destinations</b><span>Data Warehouses</span><span>Analytics &amp; BI</span><span>Enterprise Apps</span><span>Data Lakes</span><span>Cloud Platforms</span></div>
		</div>
	</div></section>

	<section class="iin-section" id="featured-connectors"><div class="iin-shell iin-panel"><div class="iin-heading"><span class="iin-kicker">Ready-to-deploy</span><h2>Featured Google Connectors</h2><p>Pre-built connectors for the apps your teams use every day.</p></div><div class="iin-connector-grid">
		<?php foreach ( $connectors as $connector ) : ?><a class="iin-connector-card <?php echo esc_attr( $connector['class'] ); ?>" href="<?php echo esc_url( $connector['url'] ); ?>"><span class="iin-connector-mark"><?php echo esc_html( $connector['mark'] ); ?></span><h3><?php echo esc_html( $connector['title'] ); ?></h3><p><?php echo esc_html( $connector['copy'] ); ?></p><small><?php echo esc_html( $connector['tag'] ); ?></small></a><?php endforeach; ?>
	</div></div></section>

	<section class="iin-section"><div class="iin-shell iin-panel"><div class="iin-heading"><span class="iin-kicker">Enterprise ecosystem</span><h2>Global Enterprise Connectors</h2><p>Battle-tested connectors that unify data across your business.</p></div><div class="iin-enterprise-grid">
		<a href="<?php echo esc_url( home_url( '/product/adaptive-insight-connector/' ) ); ?>"><span class="iin-adaptive">A</span><div><h3>Adaptive Insights Connector</h3><p>Connect financial planning and performance data seamlessly to your pipelines.</p><small>Bi-Directional</small></div></a>
		<a href="<?php echo esc_url( home_url( '/product/hubspot-connector/' ) ); ?>"><span class="iin-hubspot">⌘</span><div><h3>HubSpot Connector</h3><p>Sync CRM, marketing, and sales data in real time or on a schedule.</p><small>Bi-Directional</small></div></a>
	</div></div></section>

	<section class="iin-section"><div class="iin-shell iin-process-panel">
		<div class="iin-process-intro"><span class="iin-kicker">Simple by design</span><h2>From Connection to Trusted Data</h2><p>Configure once, automate delivery, and scale without rebuilding pipelines.</p></div>
		<div class="iin-steps"><article><svg><use href="#iin-plug"/></svg><b>1. Connect</b><p>Choose your source and destination</p></article><article><svg><use href="#iin-gear"/></svg><b>2. Integrate</b><p>Configure mappings and sync settings</p></article><article><svg><use href="#iin-nodes"/></svg><b>3. Transform</b><p>Orchestrate and enrich data within IDMC</p></article><article><svg><use href="#iin-cloud"/></svg><b>4. Deliver</b><p>Deliver trusted data where it is needed</p></article></div>
	</div></section>

	<section class="iin-section iin-cta-wrap"><div class="iin-shell iin-cta"><div class="iin-cta-icon"><svg><use href="#iin-nodes"/></svg></div><div><h2>Connect Your Data. Automate the Flow. Move Faster.</h2><p>Leverage pre-built Informatica connectors to accelerate integration, reduce effort, and unlock the full potential of your data.</p></div><div class="iin-actions"><a class="iin-button iin-button-primary" href="<?php echo esc_url( $contact_url ); ?>">Talk to an Integration Expert →</a><a class="iin-button iin-button-secondary" href="<?php echo esc_url( $contact_url ); ?>">Request a Demo</a></div></div></section>

	<footer class="iin-footer">
		<div class="iin-shell iin-footer-grid">
			<div class="iin-footer-connect"><h3>Connect with us</h3><a class="iin-footer-logo" href="https://www.infometry.net/"><img src="<?php echo esc_url( INFOMETRY_CT_URL . 'assets/images/infometry-logo-white.png' ); ?>" alt="Infometry"></a><p>Turning enterprise data into trusted insights, intelligent decisions and measurable business outcomes.</p><div class="iin-footer-socials"><a href="https://www.facebook.com/infometryinc/" aria-label="Infometry on Facebook"><img src="<?php echo esc_url( INFOMETRY_CT_URL . 'assets/images/social-facebook.png' ); ?>" alt=""></a><a href="https://x.com/Infometryinc" aria-label="Infometry on X"><img src="<?php echo esc_url( INFOMETRY_CT_URL . 'assets/images/social-x.png' ); ?>" alt=""></a><a href="https://www.linkedin.com/company/infometry-inc" aria-label="Infometry on LinkedIn"><img src="<?php echo esc_url( INFOMETRY_CT_URL . 'assets/images/social-linkedin.png' ); ?>" alt=""></a><a href="https://www.youtube.com/channel/UCYYc9Fa7iPiVLDEiSvG7DmQ" aria-label="Infometry on YouTube"><img src="<?php echo esc_url( INFOMETRY_CT_URL . 'assets/images/social-youtube.png' ); ?>" alt=""></a><a href="https://in.pinterest.com/infometryincus/_saved/" aria-label="Infometry on Pinterest"><img src="<?php echo esc_url( INFOMETRY_CT_URL . 'assets/images/social-pinterest.png' ); ?>" alt=""></a><a href="https://www.instagram.com/infometry_inc/" aria-label="Infometry on Instagram"><img src="<?php echo esc_url( INFOMETRY_CT_URL . 'assets/images/social-instagram.png' ); ?>" alt=""></a><a href="https://www.g2.com/sellers/infometry-inc#profiles" aria-label="Infometry on G2"><img src="<?php echo esc_url( INFOMETRY_CT_URL . 'assets/images/social-g2.png' ); ?>" alt=""></a></div><a class="iin-footer-contact" href="https://www.infometry.net/contact-us/">Contact Us <span>→</span></a></div>
			<div><h3>Products</h3><a href="https://www.infometry.net/product/conversational-analytics/">INFOFISCUS Conversa</a><a href="https://www.infometry.net/product/google-cloud-connectors/">Google (GCP) Connectors For Informatica IDMC</a><a href="https://www.infometry.net/product/global-cloud-connector/">Global Connectors For Informatica IDMC</a><a href="https://www.infometry.net/product/#infofiscus-snowflake-native-apps">INFOFISCUS Snowflake Native Apps</a><a href="https://www.infometry.net/product/#pre-built-apps">Pre-Built Apps For IDMC and Matillion</a><a href="https://www.infometry.net/product/accelerators-for-data-warehouse-migration-automation/">Accelerators</a></div>
			<div><h3>Resources</h3><a href="https://www.infometry.net/resources/blog/">Blog</a><a href="https://www.infometry.net/resources/infometry-case-studies/">Case Studies</a><a href="https://www.infometry.net/whitepapers/">Whitepapers</a><a href="https://www.infometry.net/resources/gallery/">Gallery</a><a href="https://www.infometry.net/resources/webinar/">Webinar</a><a href="https://www.infometry.net/resources/press-releases/">Press Releases</a></div>
			<div><h3>Company</h3><a href="https://www.infometry.net/company/customers-partners/">Customers - Partners</a><a href="https://www.infometry.net/company/careers/">Careers</a><a href="https://www.infometry.net/company/life-at-infometry/">Life@Infometry</a><a href="https://www.infometry.net/company/testimonials/">Testimonials</a></div>
		</div>
		<div class="iin-shell iin-footer-bottom"><span>© 2026 Infometry Inc. All rights reserved.</span><span>Enabling AI for Every Enterprise</span></div>
	</footer>
</main>

<?php get_footer(); ?>
