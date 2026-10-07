<?php
/**
 * Template Name: Insurance Snowflake Modernization Case Study
 * Template Post Type: page
 *
 * @package Infometry_Custom_Templates
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

$contact_url = home_url( '/contact-us/' );
$case_url    = home_url( '/resources/infometry-case-studies/' );
$metrics = array(
	array( '450+', 450, '+', 'Insurers trust the', 'platform worldwide' ),
	array( '1,027', 1027, '', 'SQL Server tables', 'migrated' ),
	array( '1,200', 1200, '', 'Tableau worksheets', 'delivered' ),
	array( '300+', 300, '+', 'MuleSoft interfaces', 'modernized' ),
);
$challenges = array(
	array( 'layers', 'Legacy complexity', 'Complex architecture and undocumented stored procedures' ),
	array( 'database', 'Duplicate data', 'Multiple copies across disconnected tools and processes' ),
	array( 'snow', 'Platform migration', 'SQL Server databases consolidated on Snowflake' ),
	array( 'clock', 'Six-month deadline', 'Existing systems retired within an accelerated timeline' ),
	array( 'nodes', 'Enterprise integrations', 'A large application landscape connected at scale' ),
	array( 'server', 'Database scale', 'More than 1,200 database objects migrated' ),
	array( 'chart', 'Analytics transition', '200+ Qlik dashboards moved to Tableau Online' ),
	array( 'cloud', 'Real-time services', 'Mule 4 microservices enabled live integration' ),
	array( 'users', 'Change enablement', 'Qlik users supported through Tableau adoption' ),
);
$solutions = array(
	array( 'database', 'Eliminated redundant data collection', 'A governed Data Hub streamlined data flow and enabled parallel processing.' ),
	array( 'layers', 'Simplified transformation logic', 'An optimized data model and aggregation layer reduced stored procedure dependencies.' ),
	array( 'nodes', 'Standardized integration', 'Templatized mappings simplified ETL/ELT and microservices-based ESB interfaces.' ),
	array( 'cloud', 'Optimized data loads', 'Amazon S3 staging improved the efficiency and reliability of cloud data loading.' ),
	array( 'users', 'Handled change management', 'A structured enablement program helped Qlik users transition to Tableau.' ),
	array( 'database', '1,300+ database objects', 'SQL Server database objects were successfully migrated.' ),
	array( 'chart', '1,200+ Qlik dashboards', 'Analytics experiences were migrated and modernized.' ),
	array( 'map', '1,200 cloud mappings', 'Informatica Cloud mappings were implemented at enterprise scale.' ),
	array( 'nodes', '300+ MuleSoft interfaces', 'Application interfaces were delivered through Mule 4 microservices.' ),
);
?>
<main class="gcs" id="gcs-main">
	<svg class="gcs-sprite" aria-hidden="true" focusable="false">
		<symbol id="gcs-database" viewBox="0 0 24 24"><ellipse cx="12" cy="5" rx="8" ry="3"/><path d="M4 5v6c0 1.7 3.6 3 8 3s8-1.3 8-3V5M4 11v6c0 1.7 3.6 3 8 3s8-1.3 8-3v-6"/></symbol>
		<symbol id="gcs-layers" viewBox="0 0 24 24"><path d="m12 3 9 5-9 5-9-5 9-5Z"/><path d="m3 12 9 5 9-5M3 16l9 5 9-5"/></symbol>
		<symbol id="gcs-nodes" viewBox="0 0 24 24"><circle cx="12" cy="5" r="3"/><circle cx="5" cy="18" r="3"/><circle cx="19" cy="18" r="3"/><path d="m10.5 7.5-4 8m7-8 4 8M8 18h8"/></symbol>
		<symbol id="gcs-cloud" viewBox="0 0 24 24"><path d="M6 19a5 5 0 0 1-.5-10A7 7 0 0 1 19 11a4 4 0 0 1-1 8H6Z"/></symbol>
		<symbol id="gcs-users" viewBox="0 0 24 24"><circle cx="8" cy="8" r="3"/><circle cx="17" cy="9" r="2.5"/><path d="M2 20c0-4 2-6 6-6s6 2 6 6m1-5c4 0 7 1.8 7 5"/></symbol>
		<symbol id="gcs-chart" viewBox="0 0 24 24"><path d="M4 20V11h4v9m4 0V4h4v16m4 0V8h4v12M2 20h22"/></symbol>
		<symbol id="gcs-map" viewBox="0 0 24 24"><path d="m3 6 6-3 6 3 6-3v15l-6 3-6-3-6 3V6Z"/><path d="M9 3v15m6-12v15"/></symbol>
		<symbol id="gcs-check" viewBox="0 0 24 24"><circle cx="12" cy="12" r="9"/><path d="m8 12 3 3 6-7"/></symbol>
		<symbol id="gcs-snow" viewBox="0 0 24 24"><path d="M12 2v20M3.5 7l17 10m0-10-17 10M8 4l4 2 4-2M8 20l4-2 4 2M3 11l3 1-3 2m18-3-3 1 3 2"/></symbol>
		<symbol id="gcs-clock" viewBox="0 0 24 24"><circle cx="12" cy="12" r="9"/><path d="M12 7v5l3 2"/></symbol>
		<symbol id="gcs-server" viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="6" rx="2"/><rect x="3" y="14" width="18" height="6" rx="2"/><path d="M7 7h.01M7 17h.01M11 7h7M11 17h7"/></symbol>
	</svg>
	<section class="gcs-hero" aria-labelledby="gcs-title"><div class="gcs-shell gcs-hero-inner">
		<div class="gcs-hero-copy"><span class="gcs-eyebrow">Case Study</span><h1 id="gcs-title">On-Prem Data Warehouses &amp; Tools <em>Migration to Snowflake Data Cloud</em></h1><p class="gcs-hero-summary">How Infometry helped a leading insurance software company modernize its legacy data warehouse, analytics, and integration ecosystem for faster insights, real-time connectivity, and cloud-ready scale.</p><div class="gcs-hero-path" aria-label="Modernization outcomes"><span><i><svg><use href="#gcs-database"/></svg></i><span><b><span>Unified</span><span>Data</span></b><small><span>Snowflake</span><span>EDW</span></small></span></span><span><i><svg><use href="#gcs-chart"/></svg></i><span><b><span>Faster</span><span>Insights</span></b><small><span>Tableau</span><span>Analytics</span></small></span></span><span><i><svg><use href="#gcs-nodes"/></svg></i><span><b><span>Real-time</span><span>Integration</span></b><small><span>Mule 4</span><span>Microservices</span></small></span></span><span><i><svg><use href="#gcs-cloud"/></svg></i><span><b><span>Cloud-ready</span><span>Scale</span></b><small><span>Modern</span><span>Architecture</span></small></span></span></div></div>
		<div class="gcs-hero-architecture" aria-label="Legacy platforms modernized on Snowflake"><div class="gcs-source-stack"><span><b>SQL</b> SQL Server DW</span><span><b>Q</b> Qlik</span><span><b>M</b> Mule</span></div><div class="gcs-flow-lines"><i></i><i></i><i></i></div><div class="gcs-snow-core"><svg><use href="#gcs-snow"/></svg><strong>Snowflake</strong><small>Data Cloud</small></div><div class="gcs-flow-lines is-right"><i></i><i></i><i></i></div><div class="gcs-target-stack"><span><b>❄</b> Snowflake Cloud</span><span><b>▦</b> Tableau Analytics</span><span><b>M</b> Mule 2.0 + Microservices</span></div></div>
	</div></section>
	<section class="gcs-metrics" aria-label="Case study headline metrics"><div class="gcs-shell gcs-metrics-grid"><?php foreach ( $metrics as $metric ) : ?><article><strong class="gcs-counter" data-count="<?php echo esc_attr( $metric[1] ); ?>" data-suffix="<?php echo esc_attr( $metric[2] ); ?>"><?php echo esc_html( $metric[0] ); ?></strong><span><?php echo esc_html( $metric[3] ); ?><br><?php echo esc_html( $metric[4] ); ?></span></article><?php endforeach; ?></div></section>
	<section class="gcs-section gcs-client"><div class="gcs-shell gcs-split"><div><h2>Our Client</h2><p>Our customer is a leading insurance company and platform P&amp;C insurers trust to engage, innovate, and grow efficiently. It combines digital, core, analytics, and AI to deliver its platform as a cloud service. More than 450 insurers, from new ventures to the largest and most complex in the world, depend on them.</p></div><figure class="gcs-photo-card gcs-client-visual"><img src="<?php echo esc_url( INFOMETRY_CT_URL . 'assets/images/case-studies/insurance-snowflake/client-office-v1.png' ); ?>" alt="Modern glass-fronted enterprise office campus" width="1536" height="1024" loading="lazy" decoding="async"><figcaption><span><svg><use href="#gcs-users"/></svg></span><strong>450+</strong><small>insurers trust their platform worldwide</small></figcaption></figure></div></section>
	<section class="gcs-section gcs-objective"><div class="gcs-shell gcs-split"><div><h2>Business Objective</h2><p>It was a venture to modernize the Enterprise Data Warehouse by consolidating on-prem data marts and data warehouses and designing a central Snowflake Cloud Data Warehouse (EDW) for analytics use cases and an Integration Data Hub (IDH) for real-time application integration.</p><p>This would help the customer process data at scale, provide real-time data access, reduce operational costs, and offer a self-service Tableau cloud analytics platform for data-driven insights.</p><a class="gcs-text-link" href="#gcs-solution">Learn more <span>→</span></a></div><figure class="gcs-photo-card"><img src="<?php echo esc_url( INFOMETRY_CT_URL . 'assets/images/case-studies/insurance-snowflake/business-objective-analytics-v1.png' ); ?>" alt="Business professional reviewing enterprise analytics on a tablet" width="1536" height="1024" loading="lazy" decoding="async"></figure></div></section>
	<section class="gcs-section gcs-challenges"><div class="gcs-shell gcs-challenge-grid"><div class="gcs-challenge-copy"><span class="gcs-section-label">Modernization mandate</span><h2>Business Challenges</h2><p>The customer’s mandate was to implement a Snowflake Enterprise Data Warehouse and Integration Data Hub and go live within six months. The goal was to decommission on-prem servers and consolidate data integration and analytics tooling.</p><p>The existing environment included complex architecture, redundant data silos, limited compute, SLA-impacting performance issues, and undocumented legacy stored procedures.</p><a class="gcs-button is-blue" href="<?php echo esc_url( $case_url ); ?>">Download the Case Study PDF <span>→</span></a></div><div class="gcs-challenge-panel"><div class="gcs-challenge-panel-head"><span>Critical delivery priorities</span><h3>Key challenges included</h3></div><div class="gcs-challenge-cards"><?php foreach ( $challenges as $challenge ) : ?><article><i><svg><use href="#gcs-<?php echo esc_attr( $challenge[0] ); ?>"/></svg></i><div><h4><?php echo esc_html( $challenge[1] ); ?></h4><p><?php echo esc_html( $challenge[2] ); ?></p></div></article><?php endforeach; ?></div></div></div></section>
	<section class="gcs-section gcs-architecture" id="gcs-program-journey"><div class="gcs-shell">
		<div class="gcs-section-intro"><span>Program journey</span><h2>Migration Architecture &amp; Delivery Timeline</h2><p>A four-year modernization journey that moved core data, analytics, cloud integration, and enterprise applications onto a scalable modern platform.</p></div>
		<div class="gcs-journey" aria-label="Modernization program from 2017 to 2020">
			<article style="--stage:#087bf5;--stage-soft:#eaf4ff"><div class="gcs-journey-head"><time datetime="2017">2017</time><i><svg><use href="#gcs-database"/></svg></i></div><h3>Snowflake Migration</h3><ul><li><strong>1,027</strong> Tables</li><li><strong>150+</strong> Views</li><li><strong>50+</strong> Stored Procedures</li><li><strong>30+</strong> Schemas</li><li><strong>3</strong> Databases</li></ul><p><b>Foundation</b>SQL Server EDW for Oracle and Salesforce</p></article>
			<article style="--stage:#08a6d8;--stage-soft:#e9faff"><div class="gcs-journey-head"><time datetime="2018">2018</time><i><svg><use href="#gcs-chart"/></svg></i></div><h3>Qlik to Tableau</h3><ul><li><strong>1,200</strong> Tableau Worksheets</li><li><strong>12</strong> Tableau Workbooks</li><li><strong>25</strong> Data Sources</li><li><strong>95</strong> Dashboards</li><li><strong>9</strong> Functional Areas</li></ul><p><b>Analytics</b>EDW enhancement for Salesforce</p></article>
			<article style="--stage:#0066cc;--stage-soft:#edf5ff"><div class="gcs-journey-head"><time datetime="2019">2019</time><i><svg><use href="#gcs-map"/></svg></i></div><h3>Informatica Migration</h3><ul><li><strong>1,200</strong> Mappings</li><li><strong>12</strong> Tasks</li><li><strong>25</strong> Task Flows</li><li><strong>11</strong> Cloud Applications</li></ul><p><b>Cloud integration</b>Customer 360° project</p></article>
			<article style="--stage:#ff7200;--stage-soft:#fff3e9"><div class="gcs-journey-head"><time datetime="2020">2020</time><i><svg><use href="#gcs-nodes"/></svg></i></div><h3>MuleSoft Implementation</h3><ul><li>Worker Integration</li><li>Coupa Integration</li><li>Financial Force Integration</li><li>Space IQ Integration</li></ul><p><b>Modern platform</b>Enterprise data platform modernization</p></article>
		</div>
	</div></section>
	<section class="gcs-section gcs-solution" id="gcs-solution"><div class="gcs-shell"><div class="gcs-section-intro"><span>Turn-key modernization</span><h2>Solution</h2><p>The customer hired Infometry to deliver the Data Warehouse modernization project within six months. Infometry implemented a highly scalable Snowflake Data Warehouse, Information Hub, and near-real-time integration across cloud and on-prem applications using pre-built data models, integration templates, and automation.</p></div><div class="gcs-solution-grid"><?php foreach ( $solutions as $solution ) : ?><article><svg><use href="#gcs-<?php echo esc_attr( $solution[0] ); ?>"/></svg><div><h3><?php echo esc_html( $solution[1] ); ?></h3><p><?php echo esc_html( $solution[2] ); ?></p></div></article><?php endforeach; ?></div><a class="gcs-text-link" href="#gcs-outcomes">Learn more <span>→</span></a></div></section>
	<section class="gcs-section gcs-outcomes" id="gcs-outcomes"><div class="gcs-shell"><div class="gcs-outcome-copy"><h2>Business Outcomes</h2><p>By engaging with Infometry, the customer built an Enterprise Data Warehouse and Analytics solution that automates data collection and processing and supports operational and executive dashboards with historical and real-time data.</p></div><div class="gcs-outcome-grid"><article><strong>56.2%</strong><span>Achieved uptime and met business SLA</span></article><article><svg><use href="#gcs-check"/></svg><span>Successfully delivered the project on time</span></article><article><svg><use href="#gcs-chart"/></svg><span>Data analysts can query real-time data in the Data Lake</span></article><article><svg><use href="#gcs-layers"/></svg><span>Business decisions are now data-driven</span></article></div></div></section>
	<section class="gcs-section gcs-tech"><div class="gcs-shell"><span class="gcs-section-label">Modern data ecosystem</span><h2>Technologies Used</h2><figure class="gcs-tech-showcase"><img src="<?php echo esc_url( INFOMETRY_CT_URL . 'assets/images/case-studies/insurance-snowflake/technologies-used-symmetrical.png' ); ?>" alt="Snowflake, SQL Server, Qlik, Tableau, MuleSoft, AWS, and Informatica" width="2070" height="162" loading="lazy" decoding="async"></figure></div></section>
	<section class="gcs-cta"><div class="gcs-shell"><div><span>Let’s build what’s next</span><h2>Connect with us</h2><p>Build a smarter, data-driven future together.</p></div><a class="gcs-button" href="<?php echo esc_url( $contact_url ); ?>">Get in Touch <span>→</span></a><img src="<?php echo esc_url( INFOMETRY_CT_URL . 'assets/images/infometry-logo-white.png' ); ?>" alt="Infometry" width="202" height="49"></div></section>
</main>
<script>
(function () {
	'use strict';
	var counters = document.querySelectorAll('.gcs-counter[data-count]');
	if (!counters.length || !('IntersectionObserver' in window) || window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
		return;
	}
	var formatter = new Intl.NumberFormat('en-US');
	var observer = new IntersectionObserver(function (entries) {
		entries.forEach(function (entry) {
			if (!entry.isIntersecting) return;
			observer.unobserve(entry.target);
			var target = Number(entry.target.dataset.count);
			var suffix = entry.target.dataset.suffix || '';
			var started = performance.now();
			function tick(now) {
				var progress = Math.min((now - started) / 1400, 1);
				var eased = 1 - Math.pow(1 - progress, 3);
				entry.target.textContent = formatter.format(Math.round(target * eased)) + suffix;
				if (progress < 1) requestAnimationFrame(tick);
			}
			requestAnimationFrame(tick);
		});
	}, { threshold: 0.35 });
	counters.forEach(function (counter) { observer.observe(counter); });
}());
</script>
<?php get_footer(); ?>
