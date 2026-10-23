<?php
/**
 * Template Name: Dematic Supply Chain Case Study
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
$conversa_url     = home_url( '/product/infofiscus-conversa-decision-intelligence/' );
$accelerators_url = home_url( '/accelerators/' );
$customers_url    = home_url( '/company/customers-partners/' );
$img_url          = INFOMETRY_CT_URL . 'assets/images/';
$dematic_img_url  = $img_url . 'case-studies/dematic/';

$challenges = array(
	array( 'database', 'Fragmented Enterprise Data', 'Customer, project, engineering, material and manufacturing data spread across multiple systems.' ),
	array( 'link', 'Missing Relationships and Data Quality Gaps', 'Inconsistent identifiers, incomplete data and broken cross-system relationships.' ),
	array( 'alert', 'Limited Visibility Into Delivery Risk', 'Difficult to identify whether delays were due to missing components, schedule mismatch, manufacturing dependency or capacity constraints.' ),
	array( 'document', 'Manual Reporting and Analysis', 'Teams spent significant time manually reconciling data across systems.' ),
	array( 'nodes', 'Lack of a Single Source of Truth', 'No unified view from opportunity through delivery for cross-functional teams.' ),
	array( 'globe', 'Complex Global Environment', 'Multiple applications, processes and data variations across regions and business units.' ),
);


$steps = array(
	array( 'search', 'Discover the Business Process and Data Landscape', 'Detailed workshops across sales, engineering, project management, manufacturing and supply chain to map processes, data flows and gaps.' ),
	array( 'nodes', 'Build an Integrated Data Foundation', 'Designed and implemented a unified data model and ETL processes using Informatica Cloud to connect data across CRM, ERP, PWA, engineering and manufacturing systems.' ),
	array( 'chart', 'Enable Operational Analytics and SIOP', 'Delivered analytics and dashboards for quotes, backlog, demand forecasting, manufacturing capacity and project delivery performance using Tableau.' ),
);

$outcomes = array(
	array( 'clock', '30%', 'Reduction in Proposal‑to‑Contract Time' ),
	array( 'target', '80%', 'Increase in Proposal Accuracy' ),
	array( 'chart', '20%', 'Improvement in Order‑to‑Manufacture Cycle Time' ),
	array( 'gear', 'Optimized', 'Manufacturing Costs through better supply chain planning' ),
	array( 'truck', 'On‑Time Delivery', 'of large customer projects' ),
	array( 'users', '1,000+', 'Annual Reporting Hours targeted for elimination' ),
);
?>

<main class="dematic-case-study" id="dematic-main">
	<svg class="dematic-sprite" aria-hidden="true" focusable="false">
		<symbol id="dematic-database" viewBox="0 0 24 24"><ellipse cx="12" cy="5" rx="8" ry="3"/><path d="M4 5v6c0 1.7 3.6 3 8 3s8-1.3 8-3V5M4 11v6c0 1.7 3.6 3 8 3s8-1.3 8-3v-6"/></symbol>
		<symbol id="dematic-link" viewBox="0 0 24 24"><path d="M10 14a4.5 4.5 0 0 0 6.4 0l3.2-3.2a4.5 4.5 0 0 0-6.4-6.4L11.6 6"/><path d="M14 10a4.5 4.5 0 0 0-6.4 0l-3.2 3.2a4.5 4.5 0 0 0 6.4 6.4l1.6-1.6"/></symbol>
		<symbol id="dematic-alert" viewBox="0 0 24 24"><path d="M12 3 2 20h20L12 3Z"/><path d="M12 10v4M12 17h.01"/></symbol>
		<symbol id="dematic-document" viewBox="0 0 24 24"><path d="M6 2h9l5 5v15H6V2Z"/><path d="M14 2v6h6M9 13h7M9 17h7"/></symbol>
		<symbol id="dematic-nodes" viewBox="0 0 24 24"><circle cx="12" cy="5" r="2.5"/><circle cx="5" cy="18" r="2.5"/><circle cx="19" cy="18" r="2.5"/><path d="M11 7.2 6.2 15.8M13 7.2l4.8 8.6M7.5 18h9"/></symbol>
		<symbol id="dematic-globe" viewBox="0 0 24 24"><circle cx="12" cy="12" r="9"/><path d="M3 12h18M12 3c2.5 2.6 3.8 5.6 3.8 9s-1.3 6.4-3.8 9c-2.5-2.6-3.8-5.6-3.8-9S9.5 5.6 12 3Z"/></symbol>
		<symbol id="dematic-users" viewBox="0 0 24 24"><circle cx="8" cy="8" r="3"/><circle cx="17" cy="9" r="2.5"/><path d="M2 20c0-4 2-6 6-6s6 2 6 6m1-5c4 0 7 1.8 7 5"/></symbol>
		<symbol id="dematic-factory" viewBox="0 0 24 24"><path d="M3 21V10l5 3V10l5 3V6l4-3v18H3Z"/><path d="M7 17h2M12 17h2M17 8v2"/></symbol>
		<symbol id="dematic-gear" viewBox="0 0 24 24"><circle cx="12" cy="12" r="3"/><path d="M19 13.5v-3l-2-.7-.7-1.7.9-1.9-2.1-2.1-1.9.9-1.7-.7L10.8 2h-3l-.7 2.3-1.7.7-1.9-.9-2.1 2.1.9 1.9-.7 1.7-2 .7v3l2 .7.7 1.7-.9 1.9 2.1 2.1 1.9-.9 1.7.7.7 2.3h3l.7-2.3 1.7-.7 1.9.9 2.1-2.1-.9-1.9.7-1.7 2-.7Z" transform="translate(1)"/></symbol>
		<symbol id="dematic-cloud" viewBox="0 0 24 24"><path d="M6 19h12a4 4 0 0 0 .5-8A7 7 0 0 0 5 9a5 5 0 0 0 1 10Z"/></symbol>
		<symbol id="dematic-target" viewBox="0 0 24 24"><circle cx="10" cy="14" r="8"/><circle cx="10" cy="14" r="4"/><path d="m10 14 11-11m-5 0h5v5"/></symbol>
		<symbol id="dematic-chart" viewBox="0 0 24 24"><path d="M4 20V11h4v9m4 0V4h4v16m4 0V8h4v12M2 20h22"/></symbol>
		<symbol id="dematic-arrow" viewBox="0 0 24 24"><path d="M4 12h15M13 6l6 6-6 6"/></symbol>
		<symbol id="dematic-search" viewBox="0 0 24 24"><circle cx="10" cy="10" r="6.5"/><path d="m15 15 6 6"/></symbol>
		<symbol id="dematic-clock" viewBox="0 0 24 24"><circle cx="12" cy="12" r="9"/><path d="M12 7v5l3 2"/></symbol>
		<symbol id="dematic-truck" viewBox="0 0 24 24"><path d="M2 6h12v10H2zM14 9h4l4 4v3h-8z"/><circle cx="6.5" cy="17.5" r="2"/><circle cx="17.5" cy="17.5" r="2"/></symbol>
		<symbol id="dematic-code" viewBox="0 0 24 24"><path d="m8 7-5 5 5 5M16 7l5 5-5 5M14 4l-4 16"/></symbol>
		<symbol id="dematic-quote" viewBox="0 0 24 24"><path d="M3 21v-7c0-5 2.5-8 7-9v3c-2.3.7-3.5 2.3-3.5 5H10v8H3Zm11 0v-7c0-5 2.5-8 7-9v3c-2.3.7-3.5 2.3-3.5 5H21v8h-7Z"/></symbol>
	</svg>

	<section class="dematic-hero" aria-labelledby="dematic-title">
		<div class="dematic-shell dematic-hero-inner">
			<div class="dematic-hero-copy">
				<p class="dematic-eyebrow">Case Study</p>
				<h1 id="dematic-title"><span>Creating End-to-End</span><strong>Supply Chain and Project</strong><span class="dematic-title-tail">Delivery Visibility</span></h1>
				<p>How Infometry connected sales, engineering, project planning, materials, manufacturing, and delivery data for a global warehouse automation leader.</p>
			</div>
			<figure class="dematic-hero-mobile-visual">
				<img src="<?php echo esc_url( $dematic_img_url . 'dematic-hero-v3.jpg' ); ?>" width="1774" height="887" alt="Automated warehouse with robots, forklifts and conveyors, overlaid with project delivery, global visibility, manufacturing and on-time delivery metrics">
			</figure>
		</div>
	</section>

	<section class="dematic-facts" aria-label="Case study summary">
		<div class="dematic-shell dematic-facts-grid">
			<article><span class="dematic-icon"><svg><use href="#dematic-users"/></svg></span><p><small>Client</small><strong>Dematic</strong></p></article>
			<article><span class="dematic-icon"><svg><use href="#dematic-factory"/></svg></span><p><small>Industry</small><strong>Warehouse Automation &amp; Supply Chain</strong></p></article>
			<article><span class="dematic-icon"><svg><use href="#dematic-gear"/></svg></span><p><small>Solution</small><strong>Supply Chain Optimization &amp; Project Delivery Analytics</strong></p></article>
			<article><span class="dematic-icon"><svg><use href="#dematic-cloud"/></svg></span><p><small>Technology</small><strong>Salesforce, SAP, Microsoft Project, Informatica, Tableau and more</strong></p></article>
		</div>
	</section>

	<section class="dematic-section dematic-overview" id="client">
		<div class="dematic-shell dematic-about-grid">
			<div class="dematic-copy-block">
				<h2>About the Client</h2>
				<p>Dematic is a global leader in warehouse automation and intelligent supply chain solutions. Its offerings include conveyor and sortation systems, automated guided vehicles and mobile robotics, storage and retrieval technologies, software, and other material-handling capabilities.</p>
				<p>Each customer project involves a complex chain of engineering, material, manufacturing, logistics, and installation dependencies.</p>
				<p>Sales, engineering, project planning, materials, manufacturing, and delivery teams each worked from their own systems, so understanding the true status of a customer project, from opportunity through installation, required pulling data together by hand. Dematic partnered with Infometry to connect that data into one trusted view.</p>
			</div>
			<figure class="dematic-client-visual">
				<img src="<?php echo esc_url( $dematic_img_url . 'dematic-warehouse-automation.jpg' ); ?>" width="770" height="887" alt="Autonomous mobile robots moving along a warehouse conveyor line" loading="lazy" decoding="async">
				<figcaption>Engineering Innovation for Smarter Supply Chain Operations</figcaption>
			</figure>
		</div>
		<div class="dematic-shell dematic-objective-grid">
			<div><h2>Business Objective</h2><p>Dematic needed a reliable analytical foundation for Sales, Inventory and Operations Planning (SIOP) that could connect the entire customer-project lifecycle, from opportunity through delivery. The goal was to integrate data across CRM, ERP, project management, engineering, quoting, manufacturing and other operational systems to enable trusted, real-time insights for better decision-making.</p></div>
			<div class="dematic-objective-flow" aria-label="Business objective flow">
				<span><i><svg><use href="#dematic-target"/></svg></i><b>End-to-End<br>Visibility</b></span><svg class="dematic-arrow"><use href="#dematic-arrow"/></svg>
				<span><i><svg><use href="#dematic-database"/></svg></i><b>Connected<br>Data Foundation</b></span><svg class="dematic-arrow"><use href="#dematic-arrow"/></svg>
				<span><i><svg><use href="#dematic-chart"/></svg></i><b>Actionable<br>SIOP Insights</b></span>
			</div>
		</div>
	</section>

	<section class="dematic-section dematic-challenge" id="challenge">
		<div class="dematic-shell">
			<div class="dematic-section-heading"><h2>Business Challenges</h2><p>Connecting the dots across a complex, global supply chain.</p></div>
			<div class="dematic-card-grid">
				<?php foreach ( $challenges as $item ) : ?>
					<article><span class="dematic-icon"><svg><use href="#dematic-<?php echo esc_attr( $item[0] ); ?>"/></svg></span><div><h3><?php echo esc_html( $item[1] ); ?></h3><p><?php echo esc_html( $item[2] ); ?></p></div></article>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<section class="dematic-section dematic-architecture" id="architecture">
		<div class="dematic-shell">
			<div class="dematic-section-heading"><h2>End-to-End Supply Chain &amp; Project Delivery Architecture</h2><p>Integrating data across the customer project lifecycle to enable unified analytics and planning.</p></div>
			<div class="dmx">
				<svg class="dematic-sprite" aria-hidden="true" focusable="false">
					<defs>
						<linearGradient id="dmx-blue" x1="0" y1="0" x2="1" y2="0"><stop offset="0" stop-color="#5aa6f8"/><stop offset=".55" stop-color="#2f7fe8"/><stop offset="1" stop-color="#1b55c9"/></linearGradient>
						<linearGradient id="dematic-sap-fill" x1="0" y1="0" x2="0" y2="1"><stop offset="0" stop-color="#00b1eb"/><stop offset=".212" stop-color="#009ad9"/><stop offset=".519" stop-color="#007fc4"/><stop offset=".792" stop-color="#006eb8"/><stop offset="1" stop-color="#0069b4"/></linearGradient>
						<linearGradient id="dmx-panel" x1="0" y1="0" x2="0" y2="1"><stop offset="0" stop-color="#ffffff"/><stop offset="1" stop-color="#e6f0fd"/></linearGradient>
					</defs>
					<symbol id="dmx-handshake" viewBox="0 0 24 24"><path d="m11 17 2 2a1 1 0 1 0 3-3"/><path d="m14 14 2.5 2.5a1 1 0 1 0 3-3l-3.88-3.88a3 3 0 0 0-4.24 0l-.88.88a1 1 0 1 1-3-3l2.81-2.81a5.79 5.79 0 0 1 7.06-.87l.47.28a2 2 0 0 0 1.42.25L21 4"/><path d="m21 3 1 11h-2M3 3 2 14l6.5 6.5a1 1 0 1 0 3-3M3 4h8"/></symbol>
					<symbol id="dmx-bulb" viewBox="0 0 24 24"><path d="M9 18h6M10 22h4M12 2a7 7 0 0 0-4 12.7c.6.5 1 1.3 1 2.3h6c0-1 .4-1.8 1-2.3A7 7 0 0 0 12 2Z"/><path d="M12 6v1M6 9H5M19 9h-1"/></symbol>
					<symbol id="dmx-quote" viewBox="0 0 24 24"><path d="M6 2h9l5 5v15H6V2Z"/><path d="M14 2v6h6M9 12h6M9 16h3"/><circle cx="15.5" cy="16.5" r="2"/></symbol>
					<symbol id="dmx-calendar" viewBox="0 0 24 24"><rect x="3" y="5" width="18" height="16" rx="2"/><path d="M3 10h18M8 3v4M16 3v4M7 14h2M11 14h2M15 14h2M7 17h2M11 17h2"/></symbol>
					<symbol id="dmx-db" viewBox="0 0 60 72"><rect x="6" y="14" width="48" height="46" fill="url(#dmx-blue)"/><ellipse cx="30" cy="60" rx="24" ry="8" fill="url(#dmx-blue)"/><path d="M6 30a24 8 0 0 0 48 0M6 45a24 8 0 0 0 48 0" fill="none" stroke="#cfe4ff" stroke-width="2"/><ellipse cx="30" cy="14" rx="24" ry="8" fill="#a9d0ff"/></symbol>
					<symbol id="dmx-cog" viewBox="0 0 24 24"><path fill="#2f7fe8" d="M19.4 13.5v-3l-2.1-.7-.6-1.5.9-2-2.1-2.1-2 .9-1.5-.6L11.3 2h-3l-.7 2.2-1.5.6-2-.9L2 6l.9 2-.6 1.5-2.1.7v3l2.1.7.6 1.5-.9 2L4.1 19.5l2-.9 1.5.6.7 2.1h3l.7-2.1 1.5-.6 2 .9 2.1-2.1-.9-2 .6-1.5Z" transform="translate(1.6 .2)"/><circle cx="11.4" cy="12" r="3.2" fill="#fff"/></symbol>
				</svg>

				<ol class="dmx-stages" aria-label="Customer project lifecycle">
					<li><svg aria-hidden="true"><use href="#dmx-handshake"/></svg><span>Sales Opportunity</span></li>
					<li><svg aria-hidden="true"><use href="#dmx-bulb"/></svg><span>Solution Design</span></li>
					<li><svg aria-hidden="true"><use href="#dmx-quote"/></svg><span>Quoting</span></li>
					<li><svg aria-hidden="true"><use href="#dematic-code"/></svg><span>Engineering</span></li>
					<li><svg aria-hidden="true"><use href="#dmx-calendar"/></svg><span>Project Planning</span></li>
					<li><svg aria-hidden="true"><use href="#dematic-factory"/></svg><span>Manufacturing</span></li>
					<li><svg aria-hidden="true"><use href="#dematic-truck"/></svg><span>Delivery &amp; Installation</span></li>
				</ol>

				<div class="dmx-systems">
					<article class="dmx-card">
						<div class="dmx-art dmx-art-crm">
							<svg class="dmx-panel" viewBox="0 0 92 70" aria-hidden="true"><rect x="1" y="1" width="90" height="68" rx="9" fill="url(#dmx-panel)" stroke="#c6dcf5"/><rect x="12" y="12" width="34" height="5" rx="2.5" fill="#bcd5f5"/><rect x="12" y="21" width="22" height="4" rx="2" fill="#d8e7fb"/><circle cx="22" cy="42" r="6" fill="#2f7fe8"/><path d="M12 58c0-6 4-9 10-9s10 3 10 9Z" fill="#2f7fe8"/><rect x="48" y="44" width="8" height="14" rx="1.5" fill="#5aa6f8"/><rect x="60" y="35" width="8" height="23" rx="1.5" fill="#2f7fe8"/><rect x="72" y="26" width="8" height="32" rx="1.5" fill="#1b55c9"/></svg>
							<img class="dmx-logo-salesforce" src="<?php echo esc_url( $img_url . 'case-studies/sunrun/logo-salesforce-current.png' ); ?>" alt="Salesforce" width="1254" height="1254" loading="lazy">
						</div>
						<h3>CRM</h3>
					</article>
					<article class="dmx-card">
						<div class="dmx-art dmx-art-stack">
							<span class="dmx-brand"><img class="dmx-logo-oracle" src="<?php echo esc_url( $img_url . 'case-studies/sunrun/logo-oracle-current.png' ); ?>" alt="Oracle" width="1529" height="199" loading="lazy"><em>Applications</em></span>
							<span class="dmx-art-row"><svg class="dmx-db" aria-hidden="true"><use href="#dmx-db"/></svg><svg class="dmx-panel dmx-panel-sm" viewBox="0 0 60 44" aria-hidden="true"><rect x="1" y="1" width="58" height="42" rx="7" fill="url(#dmx-panel)" stroke="#c6dcf5"/><rect x="28" y="12" width="22" height="4" rx="2" fill="#bcd5f5"/><rect x="28" y="20" width="16" height="4" rx="2" fill="#d8e7fb"/><rect x="28" y="28" width="20" height="4" rx="2" fill="#d8e7fb"/><use href="#dmx-cog" x="6" y="11" width="20" height="20"/></svg></span>
						</div>
						<h3>Quoting &amp; Configuration</h3>
					</article>
					<article class="dmx-card">
						<div class="dmx-art">
							<svg class="dmx-illus" viewBox="0 0 110 84" aria-hidden="true"><rect x="6" y="6" width="74" height="52" rx="6" fill="#1b55c9"/><rect x="11" y="11" width="64" height="42" rx="3" fill="#eaf3ff"/><path d="m36 24-8 8 8 8M50 24l8 8-8 8M46 21l-6 22" fill="none" stroke="#1b55c9" stroke-width="3.2" stroke-linecap="round" stroke-linejoin="round"/><path d="M36 58h14l3 12H33Z" fill="#2f7fe8"/><rect x="26" y="70" width="34" height="5" rx="2.5" fill="#1b55c9"/><use href="#dmx-cog" x="64" y="40" width="40" height="40"/></svg>
						</div>
						<h3>Engineering Systems</h3>
						<p>Engineering Data</p>
					</article>
					<article class="dmx-card">
						<div class="dmx-art dmx-art-stack">
							<svg class="dmx-ms" viewBox="0 0 23 23" role="img" aria-label="Microsoft"><path fill="#f25022" d="M1 1h10v10H1z"/><path fill="#7fba00" d="M12 1h10v10H12z"/><path fill="#00a4ef" d="M1 12h10v10H1z"/><path fill="#ffb900" d="M12 12h10v10H12z"/></svg>
							<svg class="dmx-panel dmx-panel-wide" viewBox="0 0 100 46" aria-hidden="true"><rect x="1" y="1" width="98" height="44" rx="7" fill="url(#dmx-panel)" stroke="#c6dcf5"/><rect x="10" y="10" width="38" height="5" rx="2.5" fill="#2f7fe8"/><rect x="30" y="19" width="34" height="5" rx="2.5" fill="#5aa6f8"/><rect x="46" y="28" width="30" height="5" rx="2.5" fill="#f2c94c"/><rect x="58" y="36" width="32" height="4" rx="2" fill="#27ae60"/></svg>
						</div>
						<h3>Microsoft Project Server (PWA)</h3>
						<p>Project Plans &amp; Schedules</p>
					</article>
					<article class="dmx-card">
						<div class="dmx-art dmx-art-stack">
							<svg class="dmx-sap" viewBox="0 0 412.38 204" role="img" aria-label="SAP"><polygon fill="url(#dematic-sap-fill)" points="0 204 208.413 204 412.38 0 0 0 0 204"/><path fill="#fff" fill-rule="evenodd" d="m244.727,38.359l-40.593-.025v96.518l-35.46-96.518h-35.16l-30.277,80.716c-3.224-20.352-24.277-27.38-40.84-32.649-10.937-3.512-22.541-8.678-22.434-14.387.091-4.687,6.225-9.04,18.377-8.385,8.17.433,15.373,1.092,29.71,8.006l14.102-24.557c-13.088-6.658-31.169-10.867-45.985-10.883h-.086c-17.277,0-31.677,5.598-40.602,14.824-6.221,6.443-9.572,14.626-9.712,23.679-.227,12.454,4.341,21.292,13.938,28.338,8.104,5.944,18.468,9.794,27.603,12.626,11.27,3.492,20.467,6.526,20.36,13.002-.083,2.355-.977,4.552-2.671,6.337-2.807,2.897-7.124,3.986-13.084,4.098-11.497.243-20.026-1.559-33.61-9.585l-12.536,24.903c13.546,7.705,29.586,12.223,45.952,12.223l2.106-.024c14.247-.256,25.745-4.316,34.929-11.712.527-.416,1.001-.845,1.488-1.277l-4.073,10.874h36.875l6.189-18.822c6.477,2.214,13.847,3.437,21.676,3.437,7.618,0,14.795-1.17,21.156-3.252l5.965,18.637h60.137v-38.969h13.113c31.706,0,50.456-16.147,50.456-43.202,0-30.139-18.219-43.969-57.011-43.969Zm-93.816,82.587c-4.737,0-9.177-.828-13.006-2.275l12.866-40.593h.244l12.643,40.708c-3.801,1.349-8.138,2.16-12.746,2.16Zm96.199-23.324h-8.941v-32.711h8.941c11.927,0,21.437,3.961,21.437,16.139,0,12.602-9.51,16.572-21.437,16.572"/></svg>
							<span class="dmx-art-row"><svg class="dmx-panel dmx-panel-sm" viewBox="0 0 60 50" aria-hidden="true"><rect x="1" y="1" width="58" height="48" rx="7" fill="url(#dmx-panel)" stroke="#c6dcf5"/><rect x="9" y="9" width="30" height="4" rx="2" fill="#bcd5f5"/><rect x="10" y="30" width="7" height="12" rx="1.5" fill="#5aa6f8"/><rect x="21" y="24" width="7" height="18" rx="1.5" fill="#2f7fe8"/><rect x="32" y="18" width="7" height="24" rx="1.5" fill="#1b55c9"/></svg><svg class="dmx-panel dmx-panel-sm" viewBox="0 0 50 50" aria-hidden="true"><rect x="1" y="1" width="48" height="48" rx="7" fill="url(#dmx-panel)" stroke="#c6dcf5"/><circle cx="25" cy="26" r="14" fill="#5aa6f8"/><path d="M25 26V12a14 14 0 0 1 13.4 18Z" fill="#1b55c9"/></svg></span>
						</div>
						<h3>ERP</h3>
						<p>ERP &amp; Manufacturing</p>
					</article>
					<article class="dmx-card">
						<div class="dmx-art">
							<svg class="dmx-illus" viewBox="0 0 120 84" aria-hidden="true"><use href="#dmx-db" x="14" y="2" width="50" height="62"/><rect x="40" y="62" width="74" height="9" rx="4.5" fill="#1b55c9"/><circle cx="50" cy="66.5" r="2.4" fill="#a9d0ff"/><circle cx="64" cy="66.5" r="2.4" fill="#a9d0ff"/><circle cx="78" cy="66.5" r="2.4" fill="#a9d0ff"/><circle cx="92" cy="66.5" r="2.4" fill="#a9d0ff"/><circle cx="106" cy="66.5" r="2.4" fill="#a9d0ff"/><rect x="62" y="46" width="20" height="16" rx="2" fill="#e8b36a"/><path d="M62 52h20M72 46v6" stroke="#c98a3d" stroke-width="1.6"/><use href="#dmx-cog" x="78" y="12" width="34" height="34"/></svg>
						</div>
						<h3>Other Operational Applications</h3>
						<p>Materials, Logistics, Installation</p>
					</article>
				</div>

				<div class="dmx-hub">
					<img src="<?php echo esc_url( $img_url . 'informatica-mark-transparent.png' ); ?>" alt="" width="77" height="77" loading="lazy">
					<b>Informatica Cloud</b><i aria-hidden="true"></i><span>Data Integration &amp; Orchestration (IDMC)</span>
				</div>

				<div class="dmx-bottom">
					<article class="dmx-edw">
						<img class="dmx-edw-art" src="<?php echo esc_url( $dematic_img_url . 'dematic-edw-illustration.png' ); ?>" alt="" width="716" height="336" loading="lazy" decoding="async">
						<b>Enterprise<br>Data Warehouse</b>
					</article>
					<span class="dmx-link" aria-hidden="true"></span>
					<article class="dmx-bi">
						<div class="dmx-bi-copy"><img src="<?php echo esc_url( $img_url . 'case-studies/sunrun/logo-tableau-current.png' ); ?>" alt="Tableau from Salesforce" width="2172" height="724" loading="lazy"><b>Analytics &amp; Reporting</b></div>
						<img class="dmx-bi-art" src="<?php echo esc_url( $dematic_img_url . 'dematic-analytics-illustration.png' ); ?>" alt="" width="688" height="336" loading="lazy" decoding="async">
					</article>
				</div>
			</div>
		</div>
	</section>

	<section class="dematic-section dematic-solution" id="infometry-solution">
		<div class="dematic-shell">
			<div class="dematic-section-heading"><h2>The Infometry Solution</h2><p>A three-stage transformation from discovery to operational intelligence.</p></div>
			<div class="dematic-steps">
				<?php foreach ( $steps as $index => $item ) : ?>
					<article><header><span class="dematic-step-number"><?php echo esc_html( (string) ( $index + 1 ) ); ?></span><h3><?php echo esc_html( $item[1] ); ?></h3></header><p><?php echo esc_html( $item[2] ); ?></p></article>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<section class="dematic-section dematic-outcomes" id="impact">
		<div class="dematic-shell">
			<div class="dematic-section-heading"><h2>Key Business Outcomes</h2><p>A connected data foundation enabling better planning, execution and customer delivery.</p></div>
			<div class="dematic-outcome-grid">
				<?php foreach ( $outcomes as $item ) : ?>
					<article><span class="dematic-icon"><svg><use href="#dematic-<?php echo esc_attr( $item[0] ); ?>"/></svg></span><strong><?php echo esc_html( $item[1] ); ?></strong><p><?php echo esc_html( $item[2] ); ?></p></article>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<section class="dematic-section dematic-testimonial" id="testimonial">
		<div class="dematic-shell">
			<figure class="dematic-quote">
				<div class="dematic-quote-body">
					<h2>Client Testimonial</h2>
					<svg class="dematic-quote-mark" aria-hidden="true"><use href="#dematic-quote"/></svg>
					<blockquote><p>When we decided to treat our data as a strategic weapon by integrating the streams from our many business applications into a global data warehouse, we reached out to Infometry to obtain the architectural expertise we needed. Nag Dinamani and his team helped us to bring our ideas to life. They are creative and effective, and we couldn't have gotten onto this exciting and profitable path without their help. Within the first six months of our project, we have gained enough operational efficiencies to fund our new data architecture, and we have identified real opportunities to change the competitive game through the efficient and effective collection, management and analysis of our data.</p></blockquote>
				</div>
				<figcaption><span class="dematic-icon"><svg><use href="#dematic-users"/></svg></span><span><b>Sr. Vice President</b>Leading North American provider of material handling equipment and intra-plant logistics</span></figcaption>
			</figure>
		</div>
	</section>

	<section class="dematic-section dematic-tech" id="technologies">
		<div class="dematic-shell">
			<div class="dematic-section-heading"><h2>Technologies &amp; Platforms</h2><p>A connected ecosystem of enterprise and operational systems.</p></div>
			<div class="dematic-tech-list">
				<span><span class="dematic-tech-logo salesforce"><img src="<?php echo esc_url( $img_url . 'case-studies/sunrun/logo-salesforce-current.png' ); ?>" alt="Salesforce" width="1254" height="1254" loading="lazy"></span><small>Salesforce</small></span>
				<span><span class="dematic-tech-logo sap"><svg class="dematic-sap" viewBox="0 0 412.38 204" role="img" aria-label="SAP"><polygon fill="url(#dematic-sap-fill)" points="0 204 208.413 204 412.38 0 0 0 0 204"/><path fill="#fff" fill-rule="evenodd" d="m244.727,38.359l-40.593-.025v96.518l-35.46-96.518h-35.16l-30.277,80.716c-3.224-20.352-24.277-27.38-40.84-32.649-10.937-3.512-22.541-8.678-22.434-14.387.091-4.687,6.225-9.04,18.377-8.385,8.17.433,15.373,1.092,29.71,8.006l14.102-24.557c-13.088-6.658-31.169-10.867-45.985-10.883h-.086c-17.277,0-31.677,5.598-40.602,14.824-6.221,6.443-9.572,14.626-9.712,23.679-.227,12.454,4.341,21.292,13.938,28.338,8.104,5.944,18.468,9.794,27.603,12.626,11.27,3.492,20.467,6.526,20.36,13.002-.083,2.355-.977,4.552-2.671,6.337-2.807,2.897-7.124,3.986-13.084,4.098-11.497.243-20.026-1.559-33.61-9.585l-12.536,24.903c13.546,7.705,29.586,12.223,45.952,12.223l2.106-.024c14.247-.256,25.745-4.316,34.929-11.712.527-.416,1.001-.845,1.488-1.277l-4.073,10.874h36.875l6.189-18.822c6.477,2.214,13.847,3.437,21.676,3.437,7.618,0,14.795-1.17,21.156-3.252l5.965,18.637h60.137v-38.969h13.113c31.706,0,50.456-16.147,50.456-43.202,0-30.139-18.219-43.969-57.011-43.969Zm-93.816,82.587c-4.737,0-9.177-.828-13.006-2.275l12.866-40.593h.244l12.643,40.708c-3.801,1.349-8.138,2.16-12.746,2.16Zm96.199-23.324h-8.941v-32.711h8.941c11.927,0,21.437,3.961,21.437,16.139,0,12.602-9.51,16.572-21.437,16.572"/></svg></span><small>SAP</small></span>
				<span><span class="dematic-tech-logo microsoft"><svg class="dematic-ms" viewBox="0 0 23 23" role="img" aria-label="Microsoft"><path fill="#f25022" d="M1 1h10v10H1z"/><path fill="#7fba00" d="M12 1h10v10H12z"/><path fill="#00a4ef" d="M1 12h10v10H1z"/><path fill="#ffb900" d="M12 12h10v10H12z"/></svg></span><small>Microsoft Project Server (PWA)</small></span>
				<span><span class="dematic-tech-logo oracle"><img src="<?php echo esc_url( $img_url . 'case-studies/sunrun/logo-oracle-current.png' ); ?>" alt="Oracle" width="1529" height="199" loading="lazy"></span><small>Oracle Applications</small></span>
				<span><span class="dematic-tech-logo informatica"><img src="<?php echo esc_url( $img_url . 'tech-informatica.png' ); ?>" alt="Informatica" width="293" height="78" loading="lazy"></span><small>Informatica Cloud</small></span>
				<span><span class="dematic-tech-logo tableau"><img src="<?php echo esc_url( $img_url . 'case-studies/sunrun/logo-tableau-current.png' ); ?>" alt="Tableau" width="2172" height="724" loading="lazy"></span><small>Tableau</small></span>
			</div>
		</div>
	</section>

	<section class="dematic-final-cta">
		<div class="dematic-shell"><div class="dematic-final-inner"><h2>Partner with Infometry</h2><p>Turn complex supply chain data into actionable insights.</p><a class="dematic-button" href="<?php echo esc_url( $contact_url ); ?>">Talk to Our Data &amp; Analytics Experts <svg><use href="#dematic-arrow"/></svg></a></div></div>
	</section>
</main>

<footer class="infometry-custom-footer" id="infometry-case-study-footer" aria-label="Infometry website footer">
	<div class="infometry-footer-shell">
		<div class="infometry-footer-grid">
			<div class="infometry-footer-connect">
				<h2>Connect with us</h2>
				<a class="infometry-footer-logo" href="<?php echo esc_url( $home_url ); ?>"><img src="<?php echo esc_url( $img_url . 'infometry-logo-white.png' ); ?>" width="500" height="142" loading="lazy" decoding="async" alt="Infometry Inc. — Enabling AI for Every Enterprise"></a>
				<p>Turning enterprise data into trusted insights, intelligent decisions and measurable business outcomes.</p>
				<div class="infometry-footer-social" aria-label="Infometry social profiles">
					<a href="https://www.facebook.com/infometryinc/" target="_blank" rel="noopener" aria-label="Infometry on Facebook"><img src="<?php echo esc_url( $img_url . 'social-facebook.png' ); ?>" width="512" height="512" loading="lazy" decoding="async" alt=""></a>
					<a href="https://x.com/Infometryinc" target="_blank" rel="noopener" aria-label="Infometry on X"><img src="<?php echo esc_url( $img_url . 'social-x.png' ); ?>" width="500" height="500" loading="lazy" decoding="async" alt=""></a>
					<a href="https://www.linkedin.com/company/infometry-inc" target="_blank" rel="noopener" aria-label="Infometry on LinkedIn"><img src="<?php echo esc_url( $img_url . 'social-linkedin.png' ); ?>" width="512" height="512" loading="lazy" decoding="async" alt=""></a>
					<a href="https://www.youtube.com/channel/UCYYc9Fa7iPiVLDEiSvG7DmQ" target="_blank" rel="noopener" aria-label="Infometry on YouTube"><img src="<?php echo esc_url( $img_url . 'social-youtube.png' ); ?>" width="512" height="512" loading="lazy" decoding="async" alt=""></a>
					<a href="https://in.pinterest.com/infometryincus/_saved/" target="_blank" rel="noopener" aria-label="Infometry on Pinterest"><img src="<?php echo esc_url( $img_url . 'social-pinterest.png' ); ?>" width="512" height="512" loading="lazy" decoding="async" alt=""></a>
					<a href="https://www.instagram.com/infometry_inc/" target="_blank" rel="noopener" aria-label="Infometry on Instagram"><img src="<?php echo esc_url( $img_url . 'social-instagram.png' ); ?>" width="512" height="512" loading="lazy" decoding="async" alt=""></a>
					<a href="https://www.g2.com/sellers/infometry-inc#profiles" target="_blank" rel="noopener" aria-label="Infometry on G2"><img src="<?php echo esc_url( $img_url . 'social-g2.png' ); ?>" width="512" height="512" loading="lazy" decoding="async" alt=""></a>
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
