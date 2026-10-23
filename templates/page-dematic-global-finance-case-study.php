<?php
/**
 * Template Name: Dematic Global Finance Case Study
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
$dgf_img_url      = $img_url . 'case-studies/dematic-finance/';

$challenges = array(
	array( 'database', 'Different ERP Platforms and Extraction Methods', 'Financial data originated from SAP, Syteline, Proteus, Dynamics NAV, Excel and other regional mechanisms.' ),
	array( 'document', 'Insufficient Detail in Standard Trial Balances', 'Trial balances were largely at Chart-of-Accounts level, while EPM required balances at Cost Center and Trading Partner level.' ),
	array( 'chart', 'High Data Volume and Reconciliation Complexity', 'Trial-balance generation involved tens of millions of transaction rows, with reconciliation to existing INFOR reporting.' ),
	array( 'shield', 'Need for Consistent Financial Controls', 'Required master-data validation, completeness checks, translation rules, source traceability, and proof that GL transactions balanced to zero.' ),
);

$approach = array(
	array( 'database', 'Establish Starting Position', 'Created a validated global starting position at Cost Center and Trading Partner level.' ),
	array( 'nodes', 'Extract & Integrate Data', 'Built reliable interfaces and incremental extraction processes across SAP and non-SAP systems.' ),
	array( 'shield', 'Validate & Standardize', 'Applied master-data checks, data validation, translation rules and control frameworks.' ),
	array( 'layers', 'Aggregate Monthly Balances', 'Aggregated validated GL transactions into monthly balances for EPM reporting.' ),
	array( 'chart', 'Deliver to Host Analytics (EPM)', 'Delivered governed, reconciled datasets into Host Analytics for Global P&L and Balance Sheet reporting.' ),
);

$outcomes = array(
	array( 'dgf-building', '32+', 'Companies integrated into the global finance scope' ),
	array( 'dgf-doc-check', 'Global', 'P&L and Balance Sheet reporting foundation' ),
	array( 'dgf-gear-check', 'Governed', 'And validated financial data pipeline' ),
	array( 'dgf-bolt', 'Daily +', 'Intra-day processing during month-end close' ),
);

$sap_logo   = '<svg class="dematic-sap" viewBox="0 0 412.38 204" role="img" aria-label="SAP"><polygon fill="url(#dematic-sap-fill)" points="0 204 208.413 204 412.38 0 0 0 0 204"/><path fill="#fff" fill-rule="evenodd" d="m244.727,38.359l-40.593-.025v96.518l-35.46-96.518h-35.16l-30.277,80.716c-3.224-20.352-24.277-27.38-40.84-32.649-10.937-3.512-22.541-8.678-22.434-14.387.091-4.687,6.225-9.04,18.377-8.385,8.17.433,15.373,1.092,29.71,8.006l14.102-24.557c-13.088-6.658-31.169-10.867-45.985-10.883h-.086c-17.277,0-31.677,5.598-40.602,14.824-6.221,6.443-9.572,14.626-9.712,23.679-.227,12.454,4.341,21.292,13.938,28.338,8.104,5.944,18.468,9.794,27.603,12.626,11.27,3.492,20.467,6.526,20.36,13.002-.083,2.355-.977,4.552-2.671,6.337-2.807,2.897-7.124,3.986-13.084,4.098-11.497.243-20.026-1.559-33.61-9.585l-12.536,24.903c13.546,7.705,29.586,12.223,45.952,12.223l2.106-.024c14.247-.256,25.745-4.316,34.929-11.712.527-.416,1.001-.845,1.488-1.277l-4.073,10.874h36.875l6.189-18.822c6.477,2.214,13.847,3.437,21.676,3.437,7.618,0,14.795-1.17,21.156-3.252l5.965,18.637h60.137v-38.969h13.113c31.706,0,50.456-16.147,50.456-43.202,0-30.139-18.219-43.969-57.011-43.969Zm-93.816,82.587c-4.737,0-9.177-.828-13.006-2.275l12.866-40.593h.244l12.643,40.708c-3.801,1.349-8.138,2.16-12.746,2.16Zm96.199-23.324h-8.941v-32.711h8.941c11.927,0,21.437,3.961,21.437,16.139,0,12.602-9.51,16.572-21.437,16.572"/></svg>';
$ms_logo    = '<svg class="dematic-ms" viewBox="0 0 23 23" role="img" aria-label="Microsoft"><path fill="#f25022" d="M1 1h10v10H1z"/><path fill="#7fba00" d="M12 1h10v10H12z"/><path fill="#00a4ef" d="M1 12h10v10H1z"/><path fill="#ffb900" d="M12 12h10v10H12z"/></svg>';
$excel_logo = '<svg class="dgf-excel-svg" viewBox="0 0 32 32" role="img" aria-label="Microsoft Excel"><rect x="9" y="3" width="21" height="26" rx="2" fill="#21a366"/><path d="M9 3h10.5v8.7H9Z" fill="#33c481"/><path d="M19.5 3H28a2 2 0 0 1 2 2v6.7H19.5Z" fill="#33c481"/><path d="M9 20.3h21V27a2 2 0 0 1-2 2H9Z" fill="#107c41"/><rect x="2" y="8" width="16" height="16" rx="2" fill="#107c41"/><path d="m6 12 2.6 4L6 20h2.2l1.6-2.6 1.6 2.6h2.2l-2.6-4 2.6-4h-2.2l-1.6 2.6L8.2 12Z" fill="#fff"/></svg>';
?>

<main class="dematic-case-study dgf-case-study" id="dematic-main">
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
			<defs><linearGradient id="dematic-sap-fill" x1="0" y1="0" x2="0" y2="1"><stop offset="0" stop-color="#00b1eb"/><stop offset=".212" stop-color="#009ad9"/><stop offset=".519" stop-color="#007fc4"/><stop offset=".792" stop-color="#006eb8"/><stop offset="1" stop-color="#0069b4"/></linearGradient></defs>
		<symbol id="dematic-shield" viewBox="0 0 24 24"><path d="M12 2 4 5v6c0 5 3 9 8 11 5-2 8-6 8-11V5l-8-3Z"/><path d="m8 12 3 3 5-6"/></symbol>
		<symbol id="dematic-layers" viewBox="0 0 24 24"><path d="m12 2 9 5-9 5-9-5 9-5Z"/><path d="m3 12 9 5 9-5M3 17l9 5 9-5"/></symbol>
		<symbol id="dgf-building" viewBox="0 0 24 24"><path fill="currentColor" stroke="none" d="M2 22V12h5V9h4V3h6v8h3v3h2v8Zm2-2h2v-2H4Zm0-4h2v-2H4Zm5 4h2v-2H9Zm0-4h2v-2H9Zm0-4h2v-2H9Zm4 8h2v-2h-2Zm0-4h2v-2h-2Zm0-4h2v-2h-2Zm0-4h2V5h-2Zm5 12h2v-2h-2Zm0-4h2v-2h-2Z"/></symbol>
		<symbol id="dgf-doc-check" viewBox="0 0 24 24"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h6"/><path d="M14 2v6h6M14 2l6 6v5"/><path d="M8 12h7M8 16h4"/><circle cx="18" cy="18" r="4.2" fill="currentColor" stroke="none"/><path d="m16.2 18 1.3 1.3 2.4-2.6" stroke="#fff" stroke-width="1.6"/></symbol>
		<symbol id="dgf-gear-check" viewBox="0 0 24 24"><path fill="currentColor" stroke="none" d="M13.6 1.5h-3.2l-.6 2.7a8 8 0 0 0-2 1.2L5.2 4.5 3.6 7.3l2 1.9a8 8 0 0 0 0 2.3l-2 1.9 1.6 2.8 2.6-.9a8 8 0 0 0 2 1.2l.6 2.7h3.2l.6-2.7a8 8 0 0 0 2-1.2l2.6.9 1.6-2.8-2-1.9a8 8 0 0 0 0-2.3l2-1.9-1.6-2.8-2.6.9a8 8 0 0 0-2-1.2Z" transform="translate(0 2)"/><circle cx="12" cy="12.3" r="4.6" fill="#fff" stroke="none"/><path d="m9.9 12.4 1.5 1.5 2.8-3" stroke="currentColor" stroke-width="1.8"/></symbol>
		<symbol id="dgf-bolt" viewBox="0 0 24 24"><path fill="currentColor" stroke="none" d="M14 1 4 14h7l-2 9 11-14h-7Z"/></symbol>
		<symbol id="dgf-db-fill" viewBox="0 0 24 24"><g fill="currentColor" stroke="none"><ellipse cx="12" cy="5" rx="8" ry="3"/><path d="M4 7.6v3.4c0 1.7 3.6 3 8 3s8-1.3 8-3V7.6c-1.7 1.2-4.7 1.9-8 1.9s-6.3-.7-8-1.9Z"/><path d="M4 13.6V17c0 1.7 3.6 3 8 3s8-1.3 8-3v-3.4c-1.7 1.2-4.7 1.9-8 1.9s-6.3-.7-8-1.9Z"/></g></symbol>
		<symbol id="dgf-triangle" viewBox="0 0 24 24"><path d="M12 3 2 21h20L12 3Z"/><path d="M12 9 7 18h10Z"/></symbol>
		<symbol id="dgf-bars" viewBox="0 0 24 24"><rect x="2" y="13" width="5" height="9" rx="1"/><rect x="9.5" y="8" width="5" height="14" rx="1"/><rect x="17" y="3" width="5" height="19" rx="1"/></symbol>
	</svg>

	<section class="dematic-hero" aria-labelledby="dematic-title">
		<div class="dematic-shell dematic-hero-inner">
			<div class="dematic-hero-copy">
				<p class="dematic-eyebrow">Case Study</p>
				<h1 id="dematic-title"><span>Creating a Unified Global</span> <strong>Finance Reporting</strong> <span class="dematic-title-tail">Foundation Across 32+ Companies</span></h1>
				<p>How Infometry standardized, validated, and integrated financial data across regions and ERP platforms to power trusted global P&amp;L and Balance Sheet reporting.</p>
			</div>
			<figure class="dematic-hero-mobile-visual">
				<img src="<?php echo esc_url( $dgf_img_url . 'dematic-finance-hero-v5.jpg' ); ?>" width="1984" height="793" alt="Regional finance data from North America, South America, Europe and Asia-Pacific flowing into a central data store that feeds Global P&amp;L and Balance Sheet reporting">
			</figure>
		</div>
	</section>

	<section class="dematic-facts" aria-label="Case study summary">
		<div class="dematic-shell dematic-facts-grid">
			<article><span class="dematic-icon"><svg><use href="#dgf-building"/></svg></span><p><small>32+</small><strong>Companies included in the global finance scope</strong></p></article>
			<article><span class="dematic-icon"><svg><use href="#dgf-doc-check"/></svg></span><p><small>Global</small><strong>P&amp;L and Balance Sheet reporting foundation</strong></p></article>
			<article><span class="dematic-icon"><svg><use href="#dgf-gear-check"/></svg></span><p><small>Multi-ERP</small><strong>SAP, Syteline, Proteus, Dynamics NAV and non-ERP sources</strong></p></article>
			<article><span class="dematic-icon"><svg><use href="#dematic-clock"/></svg></span><p><small>Daily <em>+</em></small><strong>Intra-day processing during month-end close</strong></p></article>
		</div>
	</section>

	<section class="dematic-section dematic-overview" id="client">
		<div class="dematic-shell dematic-about-grid">
			<div class="dematic-copy-block">
				<h2>About the Client</h2>
				<p class="dgf-lead">A global warehouse automation leader operating across multiple regions and legal entities</p>
				<p>Dematic delivers warehouse automation, software, and intelligent material-handling solutions to large enterprises around the world.</p>
				<p>Its global operating model creates a complex finance environment: multiple legal entities, regional organizations, intercompany relationships, local ERP platforms, and different financial data structures must ultimately roll into a consistent enterprise view.</p>
			</div>
			<figure class="dematic-client-visual dgf-client-visual">
				<img src="<?php echo esc_url( $dgf_img_url . 'dematic-building.jpg' ); ?>" width="1752" height="897" alt="Dematic office building with the Dematic logo on its glass facade" loading="lazy" decoding="async">
			</figure>
		</div>
		<div class="dematic-shell dematic-objective-grid">
			<div>
				<h2>Business Objective</h2>
				<p class="dgf-lead">Create one trusted financial view across regions, entities, and ERP systems</p>
				<p>The Global Finance team was implementing Host Analytics as its EPM platform to collect, consolidate, and report Global P&amp;L and Balance Sheet information. Finance needed a reliable way to source and standardize financial data from more than 32 Dematic companies, with a controlled starting balance, validated GL transactions, standardized master data, and a repeatable process across all regions.</p>
			</div>
			<div class="dematic-objective-flow dgf-objective-flow" aria-label="Business objective flow">
				<span><i><svg><use href="#dematic-database"/></svg></i><b>Enterprise<br>Financial Data</b><em>Multiple ERPs and sources</em></span><svg class="dematic-arrow"><use href="#dematic-arrow"/></svg>
				<span><i><svg><use href="#dematic-gear"/></svg></i><b>Standardization<br>&amp; Validation</b><em>COA, Cost Center, Trading Partner</em></span><svg class="dematic-arrow"><use href="#dematic-arrow"/></svg>
				<span><i><svg><use href="#dgf-bars"/></svg></i><b>Global P&amp;L &amp;<br>Balance Sheet</b><em>Trusted EPM Reporting</em></span>
			</div>
		</div>
	</section>

	<section class="dematic-section dematic-challenge" id="challenge">
		<div class="dematic-shell">
			<div class="dematic-section-heading"><h2>Business Challenges</h2><p>Global consolidation was constrained by inconsistent detail, systems, and controls.</p></div>
			<div class="dgf-challenge-grid">
				<?php foreach ( $challenges as $index => $item ) : ?>
					<article><header><span class="dgf-badge"><?php echo esc_html( sprintf( '%02d', $index + 1 ) ); ?></span><span class="dematic-icon"><svg><use href="#dematic-<?php echo esc_attr( $item[0] ); ?>"/></svg></span></header><h3><?php echo esc_html( $item[1] ); ?></h3><p><?php echo esc_html( $item[2] ); ?></p></article>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<section class="dematic-section dematic-solution dgf-approach" id="infometry-approach">
		<div class="dematic-shell">
			<div class="dematic-section-heading"><h2>Infometry Approach</h2><p>A governed finance data pipeline designed for global scale.</p></div>
			<ol class="dgf-stages" aria-label="Infometry approach steps">
				<?php foreach ( $approach as $index => $item ) : ?>
					<li><span class="dgf-stage-num"><?php echo esc_html( (string) ( $index + 1 ) ); ?></span><span><?php echo esc_html( $item[1] ); ?></span></li>
				<?php endforeach; ?>
			</ol>
			<div class="dgf-approach-grid">
				<?php foreach ( $approach as $item ) : ?>
					<article><span class="dematic-icon"><svg><use href="#dematic-<?php echo esc_attr( $item[0] ); ?>"/></svg></span><p><?php echo esc_html( $item[2] ); ?></p></article>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<section class="dematic-section dgf-architecture" id="architecture">
		<div class="dematic-shell">
			<div class="dematic-section-heading"><h2>Global Finance Data Integration Architecture</h2><p>From multiple source systems to a unified, governed EPM platform.</p></div>
			<div class="dgf-flow">
				<article class="dgf-col dgf-sources">
					<h3>Source Systems<br>(32+ Companies)</h3>
					<div class="dgf-source-grid">
						<span><?php echo $sap_logo; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?><b>SAP</b></span>
						<span><i><svg aria-hidden="true"><use href="#dgf-db-fill"/></svg></i><b>Syteline</b></span>
						<span><i><svg aria-hidden="true"><use href="#dgf-triangle"/></svg></i><b>Proteus</b></span>
						<span><?php echo $ms_logo; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?><b>Microsoft Dynamics NAV</b></span>
						<span><?php echo $excel_logo; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?><b>Excel</b></span>
						<span><i><svg aria-hidden="true"><use href="#dematic-document"/></svg></i><b>Other ERP / Non-ERP Sources</b></span>
					</div>
				</article>
				<span class="dgf-arrow" aria-hidden="true"></span>
				<article class="dgf-col dgf-data">
					<h3>Financial Data</h3>
					<ul>
						<li><i><svg aria-hidden="true"><use href="#dematic-document"/></svg></i>GL Transactions</li>
						<li><i><svg aria-hidden="true"><use href="#dematic-nodes"/></svg></i>Chart of Accounts</li>
						<li><i><svg aria-hidden="true"><use href="#dematic-factory"/></svg></i>Cost Center</li>
						<li><i><svg aria-hidden="true"><use href="#dematic-users"/></svg></i>Trading Partner</li>
					</ul>
				</article>
				<span class="dgf-arrow" aria-hidden="true"></span>
				<article class="dgf-col dgf-validation">
					<span class="dgf-col-icon"><svg aria-hidden="true"><use href="#dgf-gear-check"/></svg></span>
					<h3>Validation &amp; Standardization</h3>
					<ul><li>Data Quality Checks</li><li>Master Data Mapping</li><li>Translation Rules</li><li>Control Framework</li><li>Source Traceability</li></ul>
				</article>
				<span class="dgf-arrow" aria-hidden="true"></span>
				<article class="dgf-col dgf-staging">
					<span class="dgf-col-icon"><svg aria-hidden="true"><use href="#dgf-db-fill"/></svg></span>
					<h3>Global Finance Staging Layer</h3>
				</article>
				<span class="dgf-arrow" aria-hidden="true"></span>
				<article class="dgf-col dgf-epm">
					<h3>Host Analytics (EPM)</h3>
					<span class="dgf-col-icon dgf-bars"><svg aria-hidden="true"><use href="#dgf-bars"/></svg></span>
					<b>Global P&amp;L &amp;<br>Balance Sheet</b>
				</article>
			</div>
		</div>
	</section>

	<section class="dematic-section dematic-outcomes" id="impact">
		<div class="dematic-shell">
			<div class="dematic-section-heading"><h2>Key Business Outcomes</h2><p>A reliable and governed financial data foundation enabling trusted global reporting.</p></div>
			<div class="dgf-outcome-grid">
				<?php foreach ( $outcomes as $item ) : ?>
					<article><span class="dematic-icon"><svg><use href="#<?php echo esc_attr( 0 === strpos( $item[0], 'dgf-' ) ? $item[0] : 'dematic-' . $item[0] ); ?>"/></svg></span><div><strong><?php echo esc_html( $item[1] ); ?></strong><p><?php echo esc_html( $item[2] ); ?></p></div></article>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<section class="dematic-section dematic-tech" id="technologies">
		<div class="dematic-shell">
			<div class="dematic-section-heading"><h2>Technologies &amp; Platforms</h2><p>A connected ecosystem of enterprise and finance systems.</p></div>
			<div class="dgf-tech-grid">
				<div class="dgf-tech" style="--tint:#e8f3fd"><span class="dgf-tech-icon-box"><img src="<?php echo esc_url( $img_url . 'tech-logos/sap.png' ); ?>" alt="SAP" width="400" height="198" loading="lazy"></span><span class="dgf-tech-name">SAP</span></div>
				<div class="dgf-tech" style="--tint:#fdeced"><span class="dgf-tech-icon-box"><img src="<?php echo esc_url( $img_url . 'tech-logos/infor.png' ); ?>" alt="Infor" width="240" height="240" loading="lazy"></span><span class="dgf-tech-name">Syteline</span></div>
				<div class="dgf-tech" style="--tint:#eef1f6"><span class="dgf-tech-icon-box"><svg class="dgf-svg-icon" aria-hidden="true"><use href="#dgf-triangle"/></svg></span><span class="dgf-tech-name">Proteus</span></div>
				<div class="dgf-tech" style="--tint:#f1f6ee"><span class="dgf-tech-icon-box"><img src="<?php echo esc_url( $img_url . 'tech-logos/microsoft.png' ); ?>" alt="Microsoft" width="240" height="240" loading="lazy"></span><span class="dgf-tech-name">Microsoft Dynamics NAV</span></div>
				<div class="dgf-tech" style="--tint:#fdeeee"><span class="dgf-tech-icon-box"><img src="<?php echo esc_url( $img_url . 'tech-logos/sql-server-mark.png' ); ?>" alt="SQL Server" width="195" height="210" loading="lazy"></span><span class="dgf-tech-name">SQL Server</span></div>
				<div class="dgf-tech" style="--tint:#fff1e8"><span class="dgf-tech-icon-box"><img src="<?php echo esc_url( $img_url . 'tech-logos/informatica-mark.png' ); ?>" alt="Informatica" width="192" height="194" loading="lazy"></span><span class="dgf-tech-name">Informatica</span></div>
				<div class="dgf-tech" style="--tint:#e8faf0"><span class="dgf-tech-icon-box"><img src="<?php echo esc_url( $img_url . 'tech-logos/matillion-mark.png' ); ?>" alt="Matillion" width="189" height="208" loading="lazy"></span><span class="dgf-tech-name">Matillion</span></div>
				<div class="dgf-tech" style="--tint:#e7f6fd"><span class="dgf-tech-icon-box"><img src="<?php echo esc_url( $img_url . 'tech-logos/snowflake-mark.png' ); ?>" alt="Snowflake" width="182" height="182" loading="lazy"></span><span class="dgf-tech-name">Snowflake</span></div>
				<div class="dgf-tech" style="--tint:#fff1e8"><span class="dgf-tech-icon-box"><svg class="dgf-svg-icon dgf-bars-icon" aria-hidden="true"><use href="#dgf-bars"/></svg></span><span class="dgf-tech-name">Host Analytics</span></div>
			</div>
		</div>
	</section>

	<section class="dematic-final-cta dgf-cta">
		<div class="dematic-shell"><div class="dematic-final-inner"><h2>Partner with Infometry</h2><p>Turn complex finance data into trusted, actionable insights.</p><a class="dematic-button" href="<?php echo esc_url( $contact_url ); ?>">Talk to Our Data &amp; Analytics Experts <svg><use href="#dematic-arrow"/></svg></a></div></div>
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
