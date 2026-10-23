<?php
/**
 * Template Name: Conn's HomePlus Snowflake Case Study
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
$cns_img_url      = $img_url . 'case-studies/conns/';

$challenges = array(
	array( 'database', 'Multiple Source Systems', 'Data spread across AS400 and other systems with complex data structures and extraction requirements.' ),
	array( 'chart', 'Data Quality & Consistency', 'Need for data mapping, validation, and quality checks to ensure accurate and reliable credit and enterprise data.' ),
	array( 'gear', 'Complex Credit Data & Metrics', 'Requirement to define credit data sets, metrics, and a dimensional model including FICO, customer, accounts, payments, and delinquency data.' ),
	array( 'trend', 'Modern Analytics & Reporting', 'Enable self-service and scheduled reporting with secure access, dashboards, and scalable analytics for business and credit teams.' ),
);

$approach = array(
	array( 'dematic-document', 'Discover & Plan', 'Understand business requirements, credit data sets, and define metrics and reporting needs.' ),
	array( 'dgf-gear-check', 'Evaluate & Set Up ETL/ELT', 'Evaluate Fivetran, HVR and Informatica, provide a comparative study, help with procurement, and set up the selected tools.' ),
	array( 'dgf-db-fill', 'Design & Build Snowflake EDW', 'Create landing, ODS, and EDW environments with design standards, naming conventions, and data mapping.' ),
	array( 'dgf-bars', 'Develop Credit Data Mart', 'Design a dimensional model with facts and dimensions; build ETL/ELT processes for credit data including FICO, applications and delinquency reports.' ),
	array( 'dematic-users', 'Enable Analytics & Support', 'Develop dashboards, configure security and scheduling, and provide UAT and ongoing support.' ),
);

$outcomes = array(
	array( 'dgf-db-fill', 'Modern Data Platform', 'Snowflake-based EDW and Credit Data Mart' ),
	array( 'dgf-gear-check', 'Improved Data Quality', 'Standardized data mapping and validation processes' ),
	array( 'dgf-bars', 'Credit Analytics & Reporting', 'FICO, applications, customer, and delinquency reports with dashboards' ),
	array( 'dematic-users', 'Self-Service Enablement', 'Secure access for business and credit teams with scheduled and ad-hoc reporting' ),
);
?>

<main class="dematic-case-study dgf-case-study cns-case-study" id="dematic-main">
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
			<symbol id="dematic-trend" viewBox="0 0 24 24"><path d="m3 17 6-6 4 4 8-9"/><path d="M15 6h6v6"/></symbol>
		<symbol id="cns-server" viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="7" rx="1.5"/><rect x="3" y="13" width="18" height="7" rx="1.5"/><path d="M7 7.5h.01M7 16.5h.01M11 7.5h6M11 16.5h6"/></symbol>
		<symbol id="cns-card" viewBox="0 0 24 24"><rect x="2" y="5" width="20" height="14" rx="2"/><path d="M2 10h20M6 15h4"/></symbol>
		<symbol id="cns-cart" viewBox="0 0 24 24"><path d="M3 4h2l2.4 11h11l2-8H6.2"/><circle cx="9" cy="19" r="1.5"/><circle cx="17" cy="19" r="1.5"/></symbol>
	</svg>

	<section class="dematic-hero" aria-labelledby="dematic-title">
		<div class="dematic-shell dematic-hero-inner">
			<div class="dematic-hero-copy">
				<p class="dematic-eyebrow">Case Study</p>
				<h1 id="dematic-title"><span>Snowflake Enterprise Data</span> <strong>Warehouse &amp; Credit</strong> <span class="dematic-title-tail cns-title-tail"><em class="cns-accent">Data Mart</em> for <em class="cns-brand">Conn&rsquo;s HomePlus</em></span></h1>
				<p>Building a modern, scalable data platform to unify enterprise data and enable credit analytics, reporting, and self-service insights.</p>
			</div>
			<figure class="dematic-hero-mobile-visual">
				<img src="<?php echo esc_url( $cns_img_url . 'conns-hero.jpg' ); ?>" width="1983" height="793" alt="Conn&rsquo;s HomePlus retail store at sunset">
			</figure>
		</div>
	</section>

	<section class="dematic-facts" aria-label="Case study summary">
		<div class="dematic-shell dematic-facts-grid">
			<article><span class="dematic-icon"><svg><use href="#cns-server"/></svg></span><p><small>Live Data Replication</small><strong>IBM Db2 to Snowflake</strong></p></article>
			<article><span class="dematic-icon"><svg><use href="#dgf-db-fill"/></svg></span><p><small>Enterprise EDW</small><strong>Landing, ODS and<br>EDW environments</strong></p></article>
			<article><span class="dematic-icon"><svg><use href="#cns-card"/></svg></span><p><small>Credit Data Mart</small><strong>FICO, applications and customer analytics</strong></p></article>
			<article><span class="dematic-icon"><svg><use href="#dematic-layers"/></svg></span><p><small>Multiple Sources</small><strong>AS400, Spectrum, Latitude and Tempo</strong></p></article>
		</div>
	</section>

	<section class="dematic-section dematic-overview" id="client">
		<div class="dematic-shell dematic-about-grid">
			<div class="dematic-copy-block">
				<h2>About the Client</h2>
				<p class="dgf-lead">A leading specialty retailer with a significant credit business</p>
				<p>Conn&rsquo;s HomePlus is a leading specialty retailer of home appliances, electronics, furniture, and home goods. The company serves millions of customers across its retail stores and online channels.</p>
				<p>Its retail and credit operations generate large volumes of transactional, customer, and credit-related data that the business relies on for reporting and decision-making.</p>
			</div>
			<figure class="dematic-client-visual dgf-client-visual">
				<img src="<?php echo esc_url( $cns_img_url . 'conns-store.jpg' ); ?>" width="1163" height="673" alt="Conn&rsquo;s HomePlus store front" loading="lazy" decoding="async">
			</figure>
		</div>
		<div class="dematic-shell dematic-objective-grid">
			<div>
				<h2>Business Objective</h2>
				<p class="dgf-lead">Implement a modern Snowflake-powered data platform and credit data mart</p>
				<p>Conn&rsquo;s HomePlus wanted to build a modern, scalable data platform on Snowflake to unify enterprise data and enable credit analytics. The objective was to design and implement an Enterprise Data Warehouse (EDW) and a Credit Data Mart, integrate data from AS400 and other sources, and enable reliable reporting, dashboards, and self-service analytics for business and credit teams.</p>
			</div>
			<ul class="cns-goals" aria-label="Objectives">
				<li><i class="is-green"><svg aria-hidden="true"><use href="#dgf-db-fill"/></svg></i>Unified enterprise data foundation</li>
				<li><i class="is-red"><svg aria-hidden="true"><use href="#dgf-bars"/></svg></i>Credit analytics and reporting</li>
				<li><i class="is-blue"><svg aria-hidden="true"><use href="#dematic-users"/></svg></i>Self-service and scheduled dashboards</li>
				<li><i class="is-purple"><svg aria-hidden="true"><use href="#dgf-gear-check"/></svg></i>Scalable, future-ready architecture</li>
			</ul>
		</div>
	</section>

	<section class="dematic-section dematic-challenge" id="challenge">
		<div class="dematic-shell">
			<div class="dematic-section-heading"><h2>Business Challenges</h2><p>Multiple data sources, complex credit data, and the need for a modern data platform.</p></div>
			<div class="dgf-challenge-grid">
				<?php foreach ( $challenges as $index => $item ) : ?>
					<article><header><span class="dgf-badge"><?php echo esc_html( sprintf( '%02d', $index + 1 ) ); ?></span><span class="dematic-icon"><svg><use href="#dematic-<?php echo esc_attr( $item[0] ); ?>"/></svg></span></header><h3><?php echo esc_html( $item[1] ); ?></h3><p><?php echo esc_html( $item[2] ); ?></p></article>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<section class="dematic-section dematic-solution dgf-approach" id="infometry-approach">
		<div class="dematic-shell">
			<div class="dematic-section-heading"><h2>Infometry Approach</h2><p>A structured, end-to-end implementation approach.</p></div>
			<ol class="dgf-stages" aria-label="Infometry approach steps">
				<?php foreach ( $approach as $index => $item ) : ?>
					<li><span class="dgf-stage-num"><?php echo esc_html( (string) ( $index + 1 ) ); ?></span><span><?php echo esc_html( $item[1] ); ?></span></li>
				<?php endforeach; ?>
			</ol>
			<div class="dgf-approach-grid">
				<?php foreach ( $approach as $item ) : ?>
					<article><span class="dematic-icon"><svg><use href="#<?php echo esc_attr( $item[0] ); ?>"/></svg></span><p><?php echo esc_html( $item[2] ); ?></p></article>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<section class="dematic-section dgf-architecture" id="architecture">
		<div class="dematic-shell">
			<div class="dematic-section-heading"><h2>Solution Architecture</h2><p>From enterprise sources to a unified Snowflake platform for credit analytics.</p></div>
			<div class="dgf-flow cns-flow">
				<article class="dgf-col cns-col">
					<h3 class="cns-col-head is-blue">Source Systems</h3>
					<ul class="cns-list">
						<li><i><svg aria-hidden="true"><use href="#cns-server"/></svg></i><span><b>AS400</b> (68 tables)</span></li>
						<li><i><svg aria-hidden="true"><use href="#cns-cart"/></svg></i><span>Retail &amp; store systems</span></li>
						<li><i><svg aria-hidden="true"><use href="#dematic-document"/></svg></i><span>Other enterprise sources</span></li>
					</ul>
				</article>
				<span class="dgf-arrow" aria-hidden="true"></span>
				<article class="dgf-col cns-col">
					<h3 class="cns-col-head is-orange">Data Integration (ETL/ELT)</h3>
					<ul class="cns-logos">
						<li><img src="<?php echo esc_url( $img_url . 'tech-logos/fivetran-mark.svg' ); ?>" alt="" width="64" height="64" loading="lazy"><span>Fivetran</span></li>
						<li><img src="<?php echo esc_url( $img_url . 'tech-logos/hvr-mark.png' ); ?>" alt="" width="141" height="140" loading="lazy"><span>HVR</span></li>
						<li><img src="<?php echo esc_url( $img_url . 'tech-logos/informatica-mark.png' ); ?>" alt="" width="192" height="194" loading="lazy"><span>Informatica</span></li>
					</ul>
				</article>
				<span class="dgf-arrow" aria-hidden="true"></span>
				<article class="dgf-col cns-col">
					<h3 class="cns-col-head is-sky">Snowflake Data Platform</h3>
					<img class="cns-snow" src="<?php echo esc_url( $img_url . 'tech-logos/snowflake-mark.png' ); ?>" alt="Snowflake" width="182" height="182" loading="lazy">
					<ul class="cns-layers">
						<li><i class="is-blue"><svg aria-hidden="true"><use href="#dgf-db-fill"/></svg></i>Landing</li>
						<li><i class="is-purple"><svg aria-hidden="true"><use href="#dgf-db-fill"/></svg></i>ODS</li>
						<li><i class="is-green"><svg aria-hidden="true"><use href="#dgf-db-fill"/></svg></i>EDW</li>
					</ul>
				</article>
				<span class="dgf-arrow" aria-hidden="true"></span>
				<article class="dgf-col cns-col">
					<h3 class="cns-col-head is-purple">Credit Data Mart &amp; Analytics</h3>
					<ul class="cns-list is-compact">
						<li><i><svg aria-hidden="true"><use href="#cns-card"/></svg></i><span>Credit Data Mart</span></li>
						<li><i><svg aria-hidden="true"><use href="#dgf-doc-check"/></svg></i><span>FICO Analytics</span></li>
						<li><i><svg aria-hidden="true"><use href="#dematic-users"/></svg></i><span>Customer Analytics</span></li>
						<li><i><svg aria-hidden="true"><use href="#dematic-alert"/></svg></i><span>Delinquency Reports</span></li>
						<li><i><svg aria-hidden="true"><use href="#dematic-chart"/></svg></i><span>Dashboards (Tableau)</span></li>
						<li><i><svg aria-hidden="true"><use href="#dematic-search"/></svg></i><span>Self-Service Analytics</span></li>
					</ul>
				</article>
			</div>
		</div>
	</section>

	<section class="dematic-section dematic-outcomes" id="impact">
		<div class="dematic-shell">
			<div class="dematic-section-heading"><h2>Key Business Outcomes</h2><p>A modern data foundation enabling trusted credit analytics and enterprise reporting.</p></div>
			<div class="dgf-outcome-grid cns-outcomes">
				<?php foreach ( $outcomes as $item ) : ?>
					<article><span class="dematic-icon"><svg><use href="#<?php echo esc_attr( $item[0] ); ?>"/></svg></span><div><strong><?php echo esc_html( $item[1] ); ?></strong><p><?php echo esc_html( $item[2] ); ?></p></div></article>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<section class="dematic-section dematic-tech" id="technologies">
		<div class="dematic-shell">
			<div class="dematic-section-heading"><h2>Technologies &amp; Platforms</h2><p>Key technologies used in the implementation.</p></div>
			<div class="dgf-tech-grid cns-tech">
				<div class="dgf-tech" style="--tint:#e7f6fd"><span class="dgf-tech-icon-box"><img src="<?php echo esc_url( $img_url . 'tech-logos/snowflake-mark.png' ); ?>" alt="Snowflake" width="182" height="182" loading="lazy"></span><span class="dgf-tech-name">Snowflake</span></div>
				<div class="dgf-tech" style="--tint:#e8f0fd"><span class="dgf-tech-icon-box"><img src="<?php echo esc_url( $img_url . 'tech-logos/fivetran-mark.svg' ); ?>" alt="Fivetran" width="64" height="64" loading="lazy"></span><span class="dgf-tech-name">Fivetran</span></div>
				<div class="dgf-tech" style="--tint:#eef1f6"><span class="dgf-tech-icon-box"><img src="<?php echo esc_url( $img_url . 'tech-logos/hvr-mark.png' ); ?>" alt="HVR" width="141" height="140" loading="lazy"></span><span class="dgf-tech-name">HVR</span></div>
				<div class="dgf-tech" style="--tint:#fff1e8"><span class="dgf-tech-icon-box"><img src="<?php echo esc_url( $img_url . 'tech-logos/informatica-mark.png' ); ?>" alt="Informatica" width="192" height="194" loading="lazy"></span><span class="dgf-tech-name">Informatica</span></div>
				<div class="dgf-tech" style="--tint:#e8f0fd"><span class="dgf-tech-icon-box"><img src="<?php echo esc_url( $img_url . 'tech-logos/ibm.svg' ); ?>" alt="IBM" width="64" height="64" loading="lazy"></span><span class="dgf-tech-name">IBM AS400</span></div>
				<div class="dgf-tech" style="--tint:#fff1e8"><span class="dgf-tech-icon-box"><img src="<?php echo esc_url( $img_url . 'tech-logos/tableau-mark.svg' ); ?>" alt="Tableau" width="64" height="64" loading="lazy"></span><span class="dgf-tech-name">Tableau</span></div>
			</div>
		</div>
	</section>

	<section class="dematic-final-cta dgf-cta">
		<div class="dematic-shell"><div class="dematic-final-inner"><h2>Build a Scalable Data Foundation for Credit Analytics &amp; Business Growth</h2><p>Modernize your data platform with Snowflake and unlock trusted insights for better credit decisions.</p><a class="dematic-button" href="<?php echo esc_url( $contact_url ); ?>">Talk to Our Data &amp; Analytics Experts <svg><use href="#dematic-arrow"/></svg></a></div></div>
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
