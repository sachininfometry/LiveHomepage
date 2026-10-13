<?php
/**
 * Template Name: Sunrise Case Study
 * Template Post Type: page
 *
 * @package Infometry_Custom_Templates
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

$home_url         = home_url( '/' );
$contact_url      = home_url( '/contact-us/' );
$conversa_url     = home_url( '/product/infofiscus-conversa/' );
$accelerators_url = home_url( '/accelerators/' );
$customers_url    = home_url( '/company/customers-partners/' );

$challenges = array(
	array( 'database', 'Fragmented enterprise data', 'CRM, ERP, production, finance, meter-management, contract, and operational data lived across disconnected systems.' ),
	array( 'layers', 'Multiple sources of truth', 'Customer, home, contract, partner, and production records lacked a single, trusted analytical view.' ),
	array( 'structure', 'Complex data structures', 'Historical proposals and operational information required extensive alignment and transformation.' ),
	array( 'shield', 'Data quality & consistency', 'Customer, contact, partner, equipment, and financial data needed repeatable quality controls.' ),
	array( 'users', 'Cross-functional analytics', 'Sales, operations, production, customer engagement, and finance needed connected insights.' ),
	array( 'chart', 'Growing analytical complexity', 'NPV, credit, project economics, and portfolio performance demanded a scalable foundation.' ),
);

$analytics = array(
	array( 'chart', 'Production Analytics', 'Evaluate solar production and operational performance.' ),
	array( 'users', 'Customer Targeting', 'Identify and segment high-potential customers.' ),
	array( 'filter', 'Sales Cycle Analytics', 'Track progression from opportunity through contract.' ),
	array( 'handshake', 'Partner Performance', 'Measure partner activity and business outcomes.' ),
	array( 'message', 'Customer Contact Analytics', 'Understand interactions and engagement.' ),
	array( 'home', 'Home Scoring', 'Evaluate homes and opportunities against defined criteria.' ),
	array( 'trend', 'NPV Driver Analysis', 'Identify the factors influencing project economics.' ),
	array( 'document', 'Rating Agency Analytics', 'Support structured reporting and analysis requirements.' ),
	array( 'shield', 'Credit Model Analytics', 'Connect customer and financial data for credit analysis.' ),
	array( 'pie', 'Fund Portfolio Analytics', 'Assess financial and operational portfolio performance.' ),
);

$impact = array(
	array( 'database', 'Unified Enterprise Data', 'Customer, sales, production, partner, operational, and financial data in one analytical foundation.' ),
	array( 'target', 'Trusted Business Metrics', 'Standardized data models and definitions that improve reporting consistency.' ),
	array( 'gear', 'Automated Data Orchestration', 'Repeatable pipelines that reduce dependence on manually assembled data.' ),
	array( 'users', 'Cross-Functional Insights', 'Connected analysis across customers, sales, production, partners, economics, and portfolios.' ),
	array( 'chart', 'Scalable Analytics Architecture', 'A future-ready platform designed for new sources, metrics, and business requirements.' ),
);

$solutions = array(
	array( 'database', 'Integrated Data from Enterprise Systems', 'Integrated data from Salesforce, Oracle applications, meter and production systems, contract systems, and homegrown applications.' ),
	array( 'gear', 'Standardized and Governed Data', 'Standardized, transformed, and governed enterprise data for consistent reporting.' ),
	array( 'database', 'Oracle Cloud Enterprise Data Warehouse', 'Built a common analytical foundation across customer, sales, partner, production, operational, and financial data.' ),
	array( 'structure', 'Repeatable Data Orchestration', 'Implemented scalable data orchestration pipelines using Informatica Cloud.' ),
	array( 'document', 'Business Data Models', 'Developed business data models and analytical layers to support reporting and analysis.' ),
	array( 'chart', 'Analytics and Visualization', 'Enabled reporting and visualization through Tableau.' ),
);
?>

<main class="sunrise-case-study" id="sunrise-main">
	<svg class="sunrise-sprite" aria-hidden="true" focusable="false">
		<symbol id="sunrise-database" viewBox="0 0 24 24"><ellipse cx="12" cy="5" rx="8" ry="3"/><path d="M4 5v6c0 1.7 3.6 3 8 3s8-1.3 8-3V5M4 11v6c0 1.7 3.6 3 8 3s8-1.3 8-3v-6"/></symbol>
		<symbol id="sunrise-layers" viewBox="0 0 24 24"><path d="m12 2 9 5-9 5-9-5 9-5Z"/><path d="m3 12 9 5 9-5M3 17l9 5 9-5"/></symbol>
		<symbol id="sunrise-structure" viewBox="0 0 24 24"><rect x="3" y="3" width="7" height="7" rx="1"/><rect x="14" y="3" width="7" height="7" rx="1"/><rect x="8.5" y="14" width="7" height="7" rx="1"/><path d="M6.5 10v2h11v-2M12 12v2"/></symbol>
		<symbol id="sunrise-shield" viewBox="0 0 24 24"><path d="M12 2 4 5v6c0 5 3 9 8 11 5-2 8-6 8-11V5l-8-3Z"/><path d="m8 12 3 3 5-6"/></symbol>
		<symbol id="sunrise-users" viewBox="0 0 24 24"><circle cx="8" cy="8" r="3"/><circle cx="17" cy="9" r="2.5"/><path d="M2 20c0-4 2-6 6-6s6 2 6 6m1-5c4 0 7 1.8 7 5"/></symbol>
		<symbol id="sunrise-chart" viewBox="0 0 24 24"><path d="M4 20V11h4v9m4 0V4h4v16m4 0V8h4v12M2 20h22"/></symbol>
		<symbol id="sunrise-filter" viewBox="0 0 24 24"><path d="M3 4h18l-7 8v7l-4 2v-9L3 4Z"/></symbol>
		<symbol id="sunrise-handshake" viewBox="0 0 24 24"><path d="m8 12 3-3c1-1 2-1 3 0l2 2c1 1 2 1 3 0l2-2M3 7l4-3 4 4m10-1-4-3-3 3M4 10l7 8c1 1 2 1 3 0l5-6"/></symbol>
		<symbol id="sunrise-message" viewBox="0 0 24 24"><path d="M4 4h16v12H8l-4 4V4Z"/><path d="M8 9h8M8 12h5"/></symbol>
		<symbol id="sunrise-home" viewBox="0 0 24 24"><path d="m3 11 9-8 9 8v10h-6v-6H9v6H3V11Z"/></symbol>
		<symbol id="sunrise-trend" viewBox="0 0 24 24"><path d="m3 17 6-6 4 4 8-9"/><path d="M15 6h6v6"/></symbol>
		<symbol id="sunrise-document" viewBox="0 0 24 24"><path d="M6 2h9l5 5v15H6V2Z"/><path d="M14 2v6h6M9 13h7M9 17h7"/></symbol>
		<symbol id="sunrise-pie" viewBox="0 0 24 24"><path d="M11 3a9 9 0 1 0 9 9h-9V3Z"/><path d="M14 3v6h6a7 7 0 0 0-6-6Z"/></symbol>
		<symbol id="sunrise-target" viewBox="0 0 24 24"><circle cx="10" cy="14" r="8"/><circle cx="10" cy="14" r="4"/><path d="m10 14 11-11m-5 0h5v5"/></symbol>
		<symbol id="sunrise-gear" viewBox="0 0 24 24"><circle cx="12" cy="12" r="3"/><path d="M19 13.5v-3l-2-.7-.7-1.7.9-1.9-2.1-2.1-1.9.9-1.7-.7L10.8 2h-3l-.7 2.3-1.7.7-1.9-.9-2.1 2.1.9 1.9-.7 1.7-2 .7v3l2 .7.7 1.7-.9 1.9 2.1 2.1 1.9-.9 1.7.7.7 2.3h3l.7-2.3 1.7-.7 1.9.9 2.1-2.1-.9-1.9.7-1.7 2-.7Z" transform="translate(1)"/></symbol>
		<symbol id="sunrise-arrow" viewBox="0 0 24 24"><path d="M4 12h15M13 6l6 6-6 6"/></symbol>
		<symbol id="sunrise-code" viewBox="0 0 24 24"><path d="m8 7-5 5 5 5M16 7l5 5-5 5M14 4l-4 16"/></symbol>
		<symbol id="sunrise-cloud" viewBox="0 0 24 24"><path d="M6 19h12a4 4 0 0 0 .5-8A7 7 0 0 0 5 9a5 5 0 0 0 1 10Z"/></symbol>
	</svg>

	<section class="sunrise-hero" aria-labelledby="sunrise-title">
		<div class="sunrise-shell sunrise-hero-inner">
			<div class="sunrise-hero-copy">
				<p class="sunrise-eyebrow">Case Study</p>
				<h1 id="sunrise-title"><span>Powering Enterprise-Wide</span><strong>Data &amp; Analytics</strong><span class="sunrise-title-tail">for Sunrun</span></h1>
				<p>How Infometry built an integrated data warehouse, orchestration, and analytics foundation across customer, operational, production, and financial systems.</p>
			</div>
			<figure class="sunrise-hero-mobile-visual">
				<img src="<?php echo esc_url( INFOMETRY_CT_URL . 'assets/images/case-studies/sunrun/sunrun-energy-network-at-sunset.png' ); ?>" width="2172" height="724" alt="Sunrun cloud connected to production analytics, customer insights, partner performance, and portfolio insights">
			</figure>
		</div>
	</section>

	<section class="sunrun-facts" aria-label="Case study summary">
		<div class="sunrise-shell sunrun-facts-grid">
			<article><span class="sunrise-icon"><svg><use href="#sunrise-users"/></svg></span><p><small>Client</small><strong>Sunrun</strong></p></article>
			<article><span class="sunrise-icon"><svg><use href="#sunrise-chart"/></svg></span><p><small>Industry</small><strong>Renewable Energy &amp; Residential Solar</strong></p></article>
			<article><span class="sunrise-icon"><svg><use href="#sunrise-structure"/></svg></span><p><small>Solution</small><strong>Enterprise Data Warehouse, Data Integration &amp; Analytics</strong></p></article>
			<article><span class="sunrise-icon"><svg><use href="#sunrise-cloud"/></svg></span><p><small>Technology</small><strong>Oracle Cloud, Informatica Cloud, Tableau</strong></p></article>
		</div>
	</section>

	<section class="sunrise-section sunrise-client sunrun-overview" id="client">
		<div class="sunrise-shell sunrise-client-grid sunrun-about-grid">
			<div class="sunrise-copy-block sunrun-copy-block">
				<h2>About the Client</h2>
				<p>Sunrun is a leading residential solar and energy services company with business processes spanning customer acquisition, sales, partner operations, contracts, solar production, customer engagement, project finance, credit, and portfolio management.</p>
				<p>As the business scaled, these processes generated significant volumes of data across Salesforce, Oracle applications, meter and production systems, contract databases, and multiple homegrown applications.</p>
				<p>Sunrun engaged Infometry to design and implement an enterprise data and analytics platform that could unify this information and provide trusted insights across the business.</p>
			</div>
			<figure class="sunrun-client-visual">
				<img src="<?php echo esc_url( INFOMETRY_CT_URL . 'assets/images/case-studies/sunrun/clean-energy-brighter-tomorrows.png' ); ?>" width="1670" height="942" alt="Solar panels at sunrise with the message Clean Energy. Brighter Tomorrows." loading="lazy" decoding="async">
			</figure>
		</div>
		<div class="sunrise-shell sunrun-objective-grid">
			<div><h2>Business Objective</h2><p>To build an enterprise data warehouse and analytics platform that could integrate data across customer, sales, partner, operational, production, and financial systems, enabling trusted business metrics and scalable analytics to support data-driven decision-making.</p></div>
			<div class="sunrun-objective-flow" aria-label="Business objective flow">
				<span><i><svg><use href="#sunrise-database"/></svg></i><b>Fragmented<br>Data Sources</b></span><svg class="sunrun-arrow"><use href="#sunrise-arrow"/></svg>
				<span><i><svg><use href="#sunrise-gear"/></svg></i><b>Enterprise<br>Data Platform</b></span><svg class="sunrun-arrow"><use href="#sunrise-arrow"/></svg>
				<span><i><svg><use href="#sunrise-chart"/></svg></i><b>Actionable<br>Business Insights</b></span>
			</div>
		</div>
	</section>

	<section class="sunrise-section sunrise-challenge sunrun-dark-section" id="challenge">
		<div class="sunrise-shell">
			<div class="sunrun-section-heading"><h2>Business Challenges</h2><p>Sunrun's analytics requirements spanned the entire solar customer and asset lifecycle. However, the underlying data was distributed across multiple operational platforms.</p></div>
			<div class="sunrise-card-grid">
				<?php foreach ( $challenges as $item ) : ?>
					<article><span class="sunrise-icon"><svg><use href="#sunrise-<?php echo esc_attr( $item[0] ); ?>"/></svg></span><div><h3><?php echo esc_html( $item[1] ); ?></h3><p><?php echo esc_html( $item[2] ); ?></p></div></article>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<section class="sunrise-section sunrise-solution sunrun-roadmap" id="solution">
		<div class="sunrise-shell">
			<div class="sunrun-section-heading"><h2>Enterprise Data Architecture &amp; Analytics Roadmap</h2><p>A scalable architecture designed around Sunrun's business processes to enable unified analytics across the customer and solar asset lifecycle.</p></div>
			<div class="sunrise-architecture sunrun-architecture">
				<article class="sunrun-source-card"><h3 class="sunrun-card-title">Enterprise Sources</h3><div class="sunrun-source-list">
					<span><i class="brand"><img src="<?php echo esc_url( INFOMETRY_CT_URL . 'assets/images/case-studies/sunrun/logo-salesforce-current.png' ); ?>" alt="" width="1254" height="1254"></i><b>Salesforce<em>(CRM &amp; Sales Data)</em></b></span>
					<span><i class="brand oracle"><img src="<?php echo esc_url( INFOMETRY_CT_URL . 'assets/images/case-studies/sunrun/logo-oracle-current.png' ); ?>" alt="" width="1529" height="199"></i><b>Oracle Applications<em>(Financial &amp; Enterprise Data)</em></b></span>
					<span><i><svg><use href="#sunrise-database"/></svg></i><b>Meter &amp; Production Systems<em>(Operational Data)</em></b></span>
					<span><i><svg><use href="#sunrise-document"/></svg></i><b>Contract Systems<em>(Contracts Data)</em></b></span>
					<span><i><svg><use href="#sunrise-code"/></svg></i><b>Homegrown Applications<em>(Operational Data)</em></b></span>
				</div></article>
				<span class="sunrise-flow sunrun-source-flow" aria-hidden="true">
					<svg class="sunrun-fan" viewBox="0 0 64 340" preserveAspectRatio="none"><path d="M0 77C34 77 36 166 60 170M0 130C32 130 38 168 60 170M0 184C32 184 38 172 60 170M0 237C32 237 38 172 60 170M0 291C34 291 36 174 60 170"/><path class="head" d="m54 164 6 6-6 6"/></svg>
					<svg class="sunrun-flow-arrow"><use href="#sunrise-arrow"/></svg>
				</span>
				<article class="featured sunrun-platform-card"><h3 class="sunrun-card-title">Data Integration &amp;<br>Orchestration</h3><span class="sunrise-platform-mark informatica"><img src="<?php echo esc_url( INFOMETRY_CT_URL . 'assets/images/tech-informatica.png' ); ?>" alt="Informatica Cloud" width="293" height="78"></span><span class="sunrun-platform-sub">Cloud</span></article>
				<span class="sunrise-flow"><svg><use href="#sunrise-arrow"/></svg></span>
				<article class="sunrun-platform-card"><h3 class="sunrun-card-title">Enterprise<br>Data Warehouse</h3><span class="sunrun-database-mark"><svg><use href="#sunrise-database"/></svg></span><span class="sunrise-platform-mark oracle"><img src="<?php echo esc_url( INFOMETRY_CT_URL . 'assets/images/case-studies/sunrun/logo-oracle-current.png' ); ?>" alt="Oracle Cloud" width="1529" height="199"></span><span class="sunrun-platform-sub">Cloud</span></article>
				<span class="sunrise-flow"><svg><use href="#sunrise-arrow"/></svg></span>
				<article class="sunrun-platform-card sunrun-analytics-card"><h3 class="sunrun-card-title">Analytics &amp; Reporting</h3><span class="sunrise-platform-mark tableau"><img src="<?php echo esc_url( INFOMETRY_CT_URL . 'assets/images/case-studies/sunrun/logo-tableau-current.png' ); ?>" alt="Tableau from Salesforce" width="2172" height="724"></span><span class="sunrun-dashboard-mark" aria-hidden="true"><i></i><svg><use href="#sunrise-chart"/></svg></span></article>
				<article class="sunrun-output-card" aria-label="Business Insights"><ul><li><i><svg><use href="#sunrise-document"/></svg></i>Reports</li><li><i><svg><use href="#sunrise-chart"/></svg></i>Dashboards</li><li><i><svg><use href="#sunrise-target"/></svg></i>Scorecards</li><li><i><svg><use href="#sunrise-filter"/></svg></i>Ad-hoc Analysis</li><li><i><svg><use href="#sunrise-pie"/></svg></i>Business Insights</li></ul></article>
			</div>
		</div>
	</section>

	<section class="sunrise-section sunrun-delivery" id="infometry-solution">
		<div class="sunrise-shell">
			<div class="sunrun-section-heading"><h2>The Infometry Solution</h2><p>Infometry designed and implemented an end-to-end enterprise data warehouse, data orchestration, and business analytics platform using Informatica Cloud and Oracle Cloud, with Tableau for reporting and visualization.</p></div>
			<div class="sunrun-solution-grid">
				<?php foreach ( $solutions as $item ) : ?>
					<article><span class="sunrise-icon"><svg><use href="#sunrise-<?php echo esc_attr( $item[0] ); ?>"/></svg></span><div><h3><?php echo esc_html( $item[1] ); ?></h3><p><?php echo esc_html( $item[2] ); ?></p></div></article>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<section class="sunrise-section sunrise-analytics sunrun-analytics" id="analytics">
		<div class="sunrise-shell">
			<div class="sunrun-section-heading"><h2>Business Analytics Enabled</h2><p>The platform supported a broad range of strategic analytics initiatives across the enterprise.</p></div>
			<div class="sunrise-analytics-grid">
				<?php foreach ( $analytics as $item ) : ?>
					<article><span class="sunrise-icon"><svg><use href="#sunrise-<?php echo esc_attr( $item[0] ); ?>"/></svg></span><div><h3><?php echo esc_html( $item[1] ); ?></h3><p><?php echo esc_html( $item[2] ); ?></p></div></article>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<section class="sunrise-section sunrise-impact sunrun-outcomes" id="impact">
		<div class="sunrise-shell">
			<div class="sunrun-section-heading"><h2>Business Outcomes</h2><p>The solution provided Sunrun with a scalable enterprise analytics foundation capable of connecting data and insights across the business.</p></div>
			<div class="sunrise-impact-grid">
				<?php foreach ( $impact as $item ) : ?>
					<article><span class="sunrise-icon"><svg><use href="#sunrise-<?php echo esc_attr( $item[0] ); ?>"/></svg></span><h3><?php echo esc_html( $item[1] ); ?></h3><p><?php echo esc_html( $item[2] ); ?></p></article>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<section class="sunrise-section sunrise-tech sunrun-tech" id="technologies">
		<div class="sunrise-shell">
			<div class="sunrun-section-heading"><h2>Technologies Used</h2></div>
			<div class="sunrise-tech-list">
				<span><span class="sunrise-tech-logo oracle"><img src="<?php echo esc_url( INFOMETRY_CT_URL . 'assets/images/case-studies/sunrun/logo-oracle-current.png' ); ?>" alt="Oracle" width="1529" height="199"></span><small>Cloud Enterprise Data Warehouse</small></span>
				<span><span class="sunrise-tech-logo"><img src="<?php echo esc_url( INFOMETRY_CT_URL . 'assets/images/tech-informatica.png' ); ?>" alt="Informatica" width="293" height="78"></span><small>Cloud Integration</small></span>
				<span><span class="sunrise-tech-logo tableau"><img src="<?php echo esc_url( INFOMETRY_CT_URL . 'assets/images/case-studies/sunrun/logo-tableau-current.png' ); ?>" alt="Tableau from Salesforce" width="2172" height="724"></span><small>Business Intelligence</small></span>
				<span><span class="sunrise-tech-logo salesforce"><img src="<?php echo esc_url( INFOMETRY_CT_URL . 'assets/images/case-studies/sunrun/logo-salesforce-current.png' ); ?>" alt="Salesforce" width="1254" height="1254"></span><small>CRM &amp; Sales Data</small></span>
				<span><span class="sunrise-tech-logo oracle"><img src="<?php echo esc_url( INFOMETRY_CT_URL . 'assets/images/case-studies/sunrun/logo-oracle-current.png' ); ?>" alt="Oracle Applications" width="1529" height="199"></span><small>Oracle Applications</small></span>
				<span><span class="sunrise-tech-logo operational"><svg aria-hidden="true"><use href="#sunrise-gear"/></svg><b>Operational Systems</b></span><small>Meter, Production &amp; Homegrown</small></span>
			</div>
		</div>
	</section>

	<section class="sunrise-final-cta sunrun-final-cta">
		<div class="sunrise-shell sunrise-final-inner"><div><h2>Turning Complex Enterprise Data Into Actionable Insights</h2><p>Infometry helps organizations connect fragmented enterprise data, establish trusted business metrics, and create scalable analytics platforms that support better decisions across the business.</p><a class="sunrise-button" href="<?php echo esc_url( $contact_url ); ?>">Talk to Our Data &amp; Analytics Experts <svg><use href="#sunrise-arrow"/></svg></a></div></div>
	</section>
</main>

<footer class="infometry-custom-footer" id="infometry-case-study-footer" aria-label="Infometry website footer">
	<div class="infometry-footer-shell">
		<div class="infometry-footer-grid">
			<div class="infometry-footer-connect">
				<h2>Connect with us</h2>
				<a class="infometry-footer-logo" href="<?php echo esc_url( $home_url ); ?>"><img src="<?php echo esc_url( INFOMETRY_CT_URL . 'assets/images/infometry-logo-white.png' ); ?>" width="500" height="142" loading="lazy" decoding="async" alt="Infometry Inc. — Enabling AI for Every Enterprise"></a>
				<p>Turning enterprise data into trusted insights, intelligent decisions and measurable business outcomes.</p>
				<div class="infometry-footer-social" aria-label="Infometry social profiles">
					<a href="https://www.facebook.com/infometryinc/" target="_blank" rel="noopener" aria-label="Infometry on Facebook"><img src="<?php echo esc_url( INFOMETRY_CT_URL . 'assets/images/social-facebook.png' ); ?>" width="512" height="512" loading="lazy" decoding="async" alt=""></a>
					<a href="https://x.com/Infometryinc" target="_blank" rel="noopener" aria-label="Infometry on X"><img src="<?php echo esc_url( INFOMETRY_CT_URL . 'assets/images/social-x.png' ); ?>" width="500" height="500" loading="lazy" decoding="async" alt=""></a>
					<a href="https://www.linkedin.com/company/infometry-inc" target="_blank" rel="noopener" aria-label="Infometry on LinkedIn"><img src="<?php echo esc_url( INFOMETRY_CT_URL . 'assets/images/social-linkedin.png' ); ?>" width="512" height="512" loading="lazy" decoding="async" alt=""></a>
					<a href="https://www.youtube.com/channel/UCYYc9Fa7iPiVLDEiSvG7DmQ" target="_blank" rel="noopener" aria-label="Infometry on YouTube"><img src="<?php echo esc_url( INFOMETRY_CT_URL . 'assets/images/social-youtube.png' ); ?>" width="512" height="512" loading="lazy" decoding="async" alt=""></a>
					<a href="https://in.pinterest.com/infometryincus/_saved/" target="_blank" rel="noopener" aria-label="Infometry on Pinterest"><img src="<?php echo esc_url( INFOMETRY_CT_URL . 'assets/images/social-pinterest.png' ); ?>" width="512" height="512" loading="lazy" decoding="async" alt=""></a>
					<a href="https://www.instagram.com/infometry_inc/" target="_blank" rel="noopener" aria-label="Infometry on Instagram"><img src="<?php echo esc_url( INFOMETRY_CT_URL . 'assets/images/social-instagram.png' ); ?>" width="512" height="512" loading="lazy" decoding="async" alt=""></a>
					<a href="https://www.g2.com/sellers/infometry-inc#profiles" target="_blank" rel="noopener" aria-label="Infometry on G2"><img src="<?php echo esc_url( INFOMETRY_CT_URL . 'assets/images/social-g2.png' ); ?>" width="512" height="512" loading="lazy" decoding="async" alt=""></a>
				</div>
				<a class="infometry-footer-contact" href="<?php echo esc_url( $contact_url ); ?>">Contact Us <span aria-hidden="true">→</span></a>
			</div>
			<nav class="infometry-footer-column" aria-label="Footer products"><h3>Products</h3><a href="<?php echo esc_url( $conversa_url ); ?>">INFOFISCUS Conversa</a><a href="<?php echo esc_url( home_url( '/product/informatica-connectors/' ) ); ?>">Informatica Connectors</a><a href="<?php echo esc_url( home_url( '/product/#infofiscus-snowflake-native-apps' ) ); ?>">INFOFISCUS Snowflake Native Apps</a><a href="<?php echo esc_url( home_url( '/product/#pre-built-apps' ) ); ?>">Pre-Built Apps For IDMC and Matillion</a><a href="<?php echo esc_url( $accelerators_url ); ?>">Accelerators</a></nav>
			<nav class="infometry-footer-column" aria-label="Footer resources"><h3>Resources</h3><a href="<?php echo esc_url( home_url( '/resources/blog/' ) ); ?>">Blog</a><a href="<?php echo esc_url( home_url( '/resources/infometry-case-studies/' ) ); ?>">Case Studies</a><a href="<?php echo esc_url( home_url( '/resources/whitepapers/' ) ); ?>">Whitepapers</a><a href="<?php echo esc_url( home_url( '/resources/gallery/' ) ); ?>">Gallery</a><a href="<?php echo esc_url( home_url( '/resources/webinar/' ) ); ?>">Webinar</a><a href="<?php echo esc_url( home_url( '/resources/press-releases/' ) ); ?>">Press Releases</a></nav>
			<nav class="infometry-footer-column" aria-label="Footer company"><h3>Company</h3><a href="<?php echo esc_url( $customers_url ); ?>">Customers – Partners</a><a href="<?php echo esc_url( home_url( '/company/careers/' ) ); ?>">Careers</a><a href="<?php echo esc_url( home_url( '/company/life-at-infometry/' ) ); ?>">Life@Infometry</a><a href="<?php echo esc_url( home_url( '/company/infometry-cares/' ) ); ?>">Infometry Cares</a><a href="<?php echo esc_url( home_url( '/company/testimonials/' ) ); ?>">Testimonials</a></nav>
		</div>
		<div class="infometry-footer-bottom"><span>© <?php echo esc_html( wp_date( 'Y' ) ); ?> Infometry Inc. All Rights Reserved.</span><span>Enabling AI for Every Enterprise</span></div>
	</div>
</footer>

<?php get_footer(); ?>
