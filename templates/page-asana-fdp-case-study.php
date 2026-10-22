<?php
/**
 * Template Name: Asana Case Study
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
$img_url          = INFOMETRY_CT_URL . 'assets/images/';
$dematic_img_url  = $img_url . 'case-studies/dematic/';
$fdp_img_url      = $img_url . 'case-studies/';

$challenges = array(
	array( 'link', 'Tightly Coupled Processing', 'Custom Python and tightly coupled SQL increased maintenance and complexity.' ),
	array( 'database', 'Full Data Refreshes', 'Longer synchronization times and unnecessary compute consumption.' ),
	array( 'shield', 'Limited Governance', 'Difficult auditability, lineage, reconciliation, and monitoring.' ),
	array( 'cube', 'Non-Modular Architecture', 'Harder to add new business capabilities and adapt to changing requirements.' ),
	array( 'users', 'Shared Workloads', 'Operational and analytics workloads shared datasets, impacting performance.' ),
	array( 'chart', 'Growing Business Demands', 'Architecture needed to scale and align to Snowflake best practices.' ),
);

$approach = array(
	array( 'dematic-search', 'Assess Existing FDP', 'Analyzed current architecture, workflows and pain points.' ),
	array( 'dematic-gear', 'Design Modular Snowflake Architecture', 'Defined a scalable, modular architecture using Snowflake best practices.' ),
	array( 'dgf-db-fill', 'Implement Incremental Processing & Audit Controls', 'Replaced full refreshes with incremental data processing and established audit frameworks.' ),
	array( 'fdp-airflow', 'Orchestrate with Apache Airflow', 'Implemented robust orchestration for reliable, scalable and automated data pipelines.' ),
	array( 'dematic-shield', 'Standardize Models, Governance & Lineage', 'Introduced common facts and conformed dimensions with strong governance, referential integrity and end-to-end lineage.' ),
);

$outcomes = array(
	array( 'fdp-unified', '60%', 'Improvement in data pipeline performance' ),
	array( 'dgf-db-fill', 'Reduced compute consumption', ' through optimized incremental loading.' ),
	array( 'fdp-shield-fill', 'Improved governance,', ' lineage and data quality.' ),
	array( 'dgf-gear-check', '', 'More maintainable modular architecture with Airflow orchestration.' ),
);
?>

<main class="dematic-case-study dgf-case-study fdp-case-study" id="dematic-main">
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
		<symbol id="fdp-server" viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="7" rx="1.5"/><rect x="3" y="13" width="18" height="7" rx="1.5"/><path d="M7 7.5h.01M7 16.5h.01M11 7.5h6M11 16.5h6"/></symbol>
		<symbol id="fdp-hybrid" viewBox="0 0 24 24"><path d="M6 7.5 11 13.5M17.5 6.5 12.5 13M12 15l5.5 4" stroke-width="2.4"/><g fill="currentColor" stroke="none"><circle cx="5" cy="6" r="3.2"/><circle cx="18.5" cy="5" r="3.2"/><circle cx="12" cy="14.5" r="2.6"/><circle cx="18.5" cy="19.5" r="2.8"/></g></symbol>
		<symbol id="fdp-server-fill" viewBox="0 0 24 24"><g fill="currentColor" stroke="none"><rect x="2" y="3" width="20" height="8" rx="2"/><rect x="2" y="13" width="20" height="8" rx="2"/></g><g stroke="#fff" stroke-width="1.8"><path d="M5.5 7h.01M8.5 7h.01M5.5 17h.01M8.5 17h.01M12 7h6M12 17h6"/></g></symbol>
		<symbol id="fdp-savings" viewBox="0 0 24 24"><g fill="currentColor" stroke="none"><ellipse cx="10" cy="5" rx="7.5" ry="2.8"/><path d="M2.5 7.4v3.2c0 1.6 3.4 2.8 7.5 2.8s7.5-1.2 7.5-2.8V7.4c-1.6 1.1-4.4 1.8-7.5 1.8S4.1 8.5 2.5 7.4Z"/><path d="M2.5 13v3.2c0 1.6 3.4 2.8 7.5 2.8.9 0 1.7-.1 2.5-.2a6.5 6.5 0 0 1 1-5.2c-1.1.3-2.2.4-3.5.4-3.1 0-5.9-.7-7.5-1.8Z"/></g><circle cx="18" cy="17" r="5" fill="#16a34a" stroke="none"/><path d="M19.6 15.1c-.3-.5-.9-.8-1.6-.8-.9 0-1.6.5-1.6 1.2 0 1.7 3.3.9 3.3 2.6 0 .7-.7 1.3-1.7 1.3-.7 0-1.4-.3-1.7-.9M18 13.4v7.2" stroke="#fff" stroke-width="1.3"/></symbol>
		<symbol id="fdp-calendar" viewBox="0 0 24 24"><rect x="3" y="5" width="18" height="16" rx="2"/><path d="M3 10h18M8 3v4M16 3v4M7 14h2M11 14h2M15 14h2M7 17.5h2M11 17.5h2"/></symbol>
		<symbol id="fdp-dollar" viewBox="0 0 24 24"><circle cx="12" cy="12" r="9.5"/><path d="M15 8.6c-.6-.9-1.7-1.4-3-1.4-1.8 0-3 .9-3 2.3 0 3.2 6.2 1.7 6.2 4.9 0 1.4-1.3 2.4-3.2 2.4-1.4 0-2.6-.6-3.2-1.6M12 5.5v13"/></symbol>
		<symbol id="fdp-signal" viewBox="0 0 24 24"><circle cx="12" cy="12" r="2"/><path d="M8.5 15.5a5 5 0 0 1 0-7M15.5 8.5a5 5 0 0 1 0 7M5.6 18.4a9 9 0 0 1 0-12.8M18.4 5.6a9 9 0 0 1 0 12.8"/></symbol>
		<symbol id="fdp-mapreduce" viewBox="0 0 24 24"><circle cx="5" cy="5" r="2.2"/><circle cx="5" cy="12" r="2.2"/><circle cx="5" cy="19" r="2.2"/><circle cx="19" cy="12" r="2.6"/><path d="M7.2 5.6 16.6 11M7.2 12h9.2M7.2 18.4l9.4-5.4"/></symbol>
		<symbol id="fdp-cluster" viewBox="0 0 24 24"><rect x="2.5" y="3" width="8" height="8" rx="1.5"/><rect x="13.5" y="3" width="8" height="8" rx="1.5"/><rect x="2.5" y="13" width="8" height="8" rx="1.5"/><rect x="13.5" y="13" width="8" height="8" rx="1.5"/></symbol>
			<symbol id="fdp-gauge2" viewBox="0 0 48 34"><defs><linearGradient id="fdp-gauge-grad" x1="0" y1="0" x2="1" y2="0"><stop offset="0" stop-color="#6a5cf0"/><stop offset="1" stop-color="#1f8cf0"/></linearGradient></defs><path d="M5 29a19 19 0 0 1 38 0" fill="none" stroke="url(#fdp-gauge-grad)" stroke-width="5" stroke-linecap="round"/><path d="M10.6 15.6l2.6 1.9M24 9.4v3.2M37.4 15.6l-2.6 1.9" fill="none" stroke="#9aa9f4" stroke-width="2" stroke-linecap="round"/><path d="M24 29l9-12" fill="none" stroke="#1e40af" stroke-width="3.6" stroke-linecap="round"/><circle cx="24" cy="29" r="3.8" fill="#1e40af"/></symbol>
		<symbol id="fdp-gauge" viewBox="0 0 24 24"><path d="M3 17a9 9 0 1 1 18 0" stroke-width="2.4"/><path d="M12 17l4.5-6" stroke-width="2.4"/><circle cx="12" cy="17" r="1.8" fill="currentColor" stroke="none"/><path d="M5.6 11.3l1.2.9M12 7.2v1.5M18.4 11.3l-1.2.9"/></symbol>
		<symbol id="fdp-shield-fill" viewBox="0 0 24 24"><path d="M12 2 4 5v6c0 5 3 9 8 11 5-2 8-6 8-11V5l-8-3Z" stroke-width="2.2"/><path d="m8 12 3 3 5-6" stroke-width="2.4"/></symbol>
		<symbol id="fdp-check" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10.5" fill="currentColor" stroke="none"/><path d="m7.5 12.3 3 3 6-6.3" stroke="#fff" stroke-width="2.2"/></symbol>
		<symbol id="fdp-checklist" viewBox="0 0 24 24"><rect x="4" y="3" width="16" height="18" rx="2"/><path d="m7.5 8 1.3 1.3L11 7M13 8.3h4M7.5 13l1.3 1.3L11 12M13 13.3h4M8 17.5h9"/></symbol>
		<symbol id="fdp-share" viewBox="0 0 24 24"><circle cx="18" cy="5" r="2.6"/><circle cx="6" cy="12" r="2.6"/><circle cx="18" cy="19" r="2.6"/><path d="m8.3 10.8 7.4-4.4M8.3 13.2l7.4 4.4"/></symbol>
		<symbol id="fdp-airflow" viewBox="0 0 24 24"><g fill="currentColor" stroke="none"><path d="M12 12 3 3.5c4.5-1 8 .7 9 8.5Z"/><path d="M12 12 20.5 3c1 4.5-.7 8-8.5 9Z"/><path d="M12 12l9 8.5c-4.5 1-8-.7-9-8.5Z"/><path d="M12 12 3.5 21c-1-4.5.7-8 8.5-9Z"/></g></symbol>
		<symbol id="dematic-cube" viewBox="0 0 24 24"><path d="m12 2 9 5v10l-9 5-9-5V7l9-5Z"/><path d="m3 7 9 5 9-5m-9 5v10"/></symbol>
		<symbol id="dematic-snow" viewBox="0 0 24 24"><path d="M12 2v20M3.5 7l17 10m0-10-17 10M8 4l4 2 4-2M8 20l4-2 4 2M3 11l3 1-3 2m18-3-3 1 3 2"/></symbol>
		<symbol id="fdp-unified" viewBox="0 0 24 24"><g fill="currentColor" stroke="none"><rect x="2" y="13" width="5" height="9" rx="1.2"/><rect x="9.5" y="8" width="5" height="14" rx="1.2"/><rect x="17" y="3" width="5" height="19" rx="1.2"/></g></symbol>
		<symbol id="fdp-scale" viewBox="0 0 24 24"><path d="M4 9V4h5M20 9V4h-5M4 15v5h5M20 15v5h-5M4 4l6 6M20 4l-6 6M4 20l6-6M20 20l-6-6" stroke-width="2.2"/></symbol>
		<symbol id="fdp-team" viewBox="0 0 24 24"><g fill="currentColor" stroke="none"><circle cx="12" cy="6.5" r="3.5"/><circle cx="4.8" cy="8.8" r="2.6"/><circle cx="19.2" cy="8.8" r="2.6"/><path d="M5.5 21c0-4.3 2.6-7.2 6.5-7.2s6.5 2.9 6.5 7.2Z"/><path d="M.5 19.5c0-3.3 1.6-5.5 4.3-5.5 1 0 1.8.3 2.5.8-1.4 1.4-2.3 3.4-2.5 4.7Z"/><path d="M23.5 19.5c0-3.3-1.6-5.5-4.3-5.5-1 0-1.8.3-2.5.8 1.4 1.4 2.3 3.4 2.5 4.7Z"/></g></symbol>
		<symbol id="fdp-zuora" viewBox="0 0 24 24"><path d="M5 3.5h11.5L9 11h10.5" stroke-width="2.4" stroke-linejoin="round"/><path d="M14.5 13H4.5l7.5 7.5H.5" transform="translate(4 0)" stroke-width="2.4" stroke-linejoin="round"/></symbol>
		<symbol id="fdp-events" viewBox="0 0 24 24"><path d="M13 2 4 14h7l-1 8 9-12h-7l1-8Z"/></symbol>
	</svg>

	<section class="dematic-hero fdp-hero" aria-labelledby="dematic-title">
		<div class="dematic-shell dematic-hero-inner">
			<div class="dematic-hero-copy">
				<p class="dematic-eyebrow">Case Study</p>
				<h1 id="dematic-title"><span>Financial Data Platform</span><strong>(FDP 2.0)</strong><span class="fdp-title-light">Modernization on</span><span class="fdp-title-light">the Snowflake AI Data Cloud</span></h1>
				<p>How Infometry helped Asana modernize its financial data platform to drive faster insights, greater scalability and smarter decision-making with Snowflake's AI Data Cloud.</p>
				<ul class="fdp-hero-points" aria-label="Highlights">
					<li><i><svg aria-hidden="true"><use href="#dematic-chart"/></svg></i>Unified<br>Financial Data</li>
					<li><i><svg aria-hidden="true"><use href="#dgf-bolt"/></svg></i>Faster<br>Insights</li>
					<li><i><svg aria-hidden="true"><use href="#fdp-scale"/></svg></i>Scalable<br>Architecture</li>
					<li><i><svg aria-hidden="true"><use href="#dematic-users"/></svg></i>Empowered<br>Teams</li>
				</ul>
			</div>
			<figure class="dematic-hero-mobile-visual">
				<img src="<?php echo esc_url( $fdp_img_url . 'asana-fdp-banner-art-v2.jpg' ); ?>" width="1360" height="802" alt="Asana office building with the Snowflake AI Data Cloud and analytics cards">
			</figure>
		</div>
	</section>

	<section class="dematic-facts" aria-label="Case study summary">
		<div class="dematic-shell dematic-facts-grid">
			<article><span class="dematic-icon fdp-gauge-icon"><svg viewBox="0 0 48 34"><use href="#fdp-gauge2"/></svg></span><p><small>60% Pipeline</small><strong>Performance Improvement</strong></p></article>
			<article><span class="dematic-icon"><svg><use href="#dgf-db-fill"/></svg></span><p><small>Incremental</small><strong>Data Processing</strong></p></article>
			<article><span class="dematic-icon"><svg><use href="#fdp-shield-fill"/></svg></span><p><small>Governed</small><strong>Financial Data</strong></p></article>
			<article><span class="dematic-icon fdp-sf-mark"><img src="<?php echo esc_url( $img_url . 'tech-logos/snowflake-mark.png' ); ?>" alt="Snowflake" width="182" height="182"><sup class="fdp-reg" aria-hidden="true">&reg;</sup></span><p><small>Snowflake&rsquo;s</small><strong>AI Data Cloud</strong></p></article>
		</div>
	</section>

	<section class="dematic-section dematic-overview" id="client">
		<div class="dematic-shell dematic-about-grid">
			<div class="dematic-copy-block">
				<h2>About the Client</h2>
				<a class="fdp-client-logo" href="https://asana.com/" aria-label="Visit the Asana website"><img src="<?php echo esc_url( $img_url . 'customer-asana-logo.png' ); ?>" alt="Asana" width="300" height="92" loading="lazy" decoding="async"></a>
				<p>Asana is a global SaaS company that relies on financial and operational data to track MRR, ARR, customer lifetime value, churn, and new-logo acquisition. These insights are essential for executive decision-making, financial planning, and business performance management.</p>
				<p>Asana&rsquo;s Financial Data Platform (FDP 2.0) integrates data from Zuora, Salesforce, NetSuite, and Product Events to provide a unified foundation for enterprise reporting and analytics.</p>
			</div>
			<figure class="dematic-client-visual dgf-client-visual">
				<img src="<?php echo esc_url( $fdp_img_url . 'asana-fdp-about-laptop.jpg' ); ?>" width="1710" height="920" alt="Laptop showing an Asana project dashboard on an office desk" loading="lazy" decoding="async">
			</figure>
		</div>
		<div class="dematic-shell dematic-objective-grid">
			<div>
				<h2>Business Objective</h2>
				<p class="dgf-lead">Modernize FDP 2.0 on the Snowflake AI Data Cloud</p>
				<p>Modernize FDP 2.0 to improve scalability, maintainability, governance, and financial reporting using Snowflake-native capabilities.</p>
				<p>Infometry was engaged to assess, redesign, and modernize the existing platform with a modular architecture that simplifies data integration, accelerates financial reporting, strengthens governance, and establishes a scalable foundation for enterprise analytics and future growth.</p>
			</div>
			<ul class="fdp-goals" aria-label="Objectives">
				<li><i><svg aria-hidden="true"><use href="#fdp-check"/></svg></i>Scalable platform for growing data volumes</li>
				<li><i><svg aria-hidden="true"><use href="#fdp-check"/></svg></i>Improved governance and data quality</li>
				<li><i><svg aria-hidden="true"><use href="#fdp-check"/></svg></i>Faster insights for financial decision making</li>
				<li><i><svg aria-hidden="true"><use href="#fdp-check"/></svg></i>Future-ready foundation aligned to Snowflake best practices</li>
			</ul>
		</div>
	</section>

	<section class="dematic-section dematic-challenge" id="challenge">
		<div class="dematic-shell">
			<div class="dematic-section-heading"><h2>Business Challenges</h2><p>A growing need for scalability, governance, and flexibility in financial data processing.</p></div>
			<div class="dgf-challenge-grid fdp-challenges">
				<?php foreach ( $challenges as $index => $item ) : ?>
					<article><span class="fdp-ch-icon"><svg aria-hidden="true"><use href="#dematic-<?php echo esc_attr( $item[0] ); ?>"/></svg></span><div><h3><?php echo esc_html( $item[1] ); ?></h3><p><?php echo esc_html( $item[2] ); ?></p></div></article>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<section class="dematic-section dematic-solution dgf-approach" id="infometry-approach">
		<div class="dematic-shell">
			<div class="dematic-section-heading"><h2>Infometry Approach</h2><p>A phased approach to modernize Asana&rsquo;s financial data platform on Snowflake.</p></div>
			<ol class="dgf-stages fdp-stages" aria-hidden="true">
				<?php foreach ( $approach as $index => $item ) : ?>
					<li><span class="dgf-stage-num"><?php echo esc_html( (string) ( $index + 1 ) ); ?></span></li>
				<?php endforeach; ?>
			</ol>
			<ol class="dgf-approach-grid fdp-approach" aria-label="Infometry approach steps">
				<?php foreach ( $approach as $item ) : ?>
					<li><span class="dematic-icon"><svg><use href="#<?php echo esc_attr( $item[0] ); ?>"/></svg></span><h3><?php echo esc_html( $item[1] ); ?></h3><p><?php echo esc_html( $item[2] ); ?></p></li>
				<?php endforeach; ?>
			</ol>
		</div>
	</section>

	<section class="dematic-section dgf-architecture" id="architecture">
		<div class="dematic-shell">
			<div class="dematic-section-heading"><h2>Solution Architecture</h2><p>A modular and governed architecture built on Snowflake for scalable financial analytics.</p></div>
			<div class="dgf-flow fdp-flow">
				<article class="dgf-col fdp-col">
					<h3 class="fdp-col-head is-blue">Source Applications</h3>
					<ul class="fdp-logos">
						<li><img src="<?php echo esc_url( $img_url . 'tech-logos/zuora-mark.png' ); ?>" alt="" width="123" height="122" loading="lazy"><span>Zuora</span></li>
						<li><img src="<?php echo esc_url( $img_url . 'brand-salesforce.png' ); ?>" alt="" width="267" height="188" loading="lazy"><span>Salesforce</span></li>
						<li><img src="<?php echo esc_url( $img_url . 'netsuite-mark.png' ); ?>" alt="" width="248" height="244" loading="lazy"><span>NetSuite</span></li>
						<li><i class="fdp-events-mark"><svg aria-hidden="true"><use href="#dematic-document"/></svg></i><span>Product Events</span></li>
					</ul>
				</article>
				<span class="dgf-arrow" aria-hidden="true"></span>
				<article class="dgf-col fdp-col">
					<h3 class="fdp-col-head is-orange">Data Pipeline &amp; Orchestration</h3>
					<ul class="fdp-list">
						<li><i><svg aria-hidden="true"><use href="#dgf-db-fill"/></svg></i><span>Incremental Loads &amp; Transformations</span></li>
						<li><i><img src="<?php echo esc_url( $img_url . 'tech-logos/airflow-mark.png' ); ?>" alt="" width="192" height="192" loading="lazy"></i><span><b>Apache Airflow</b> Orchestration</span></li>
						<li><i><svg aria-hidden="true"><use href="#fdp-checklist"/></svg></i><span>Control &amp; Audit Frameworks</span></li>
					</ul>
				</article>
				<span class="dgf-arrow" aria-hidden="true"></span>
				<article class="dgf-col fdp-col">
					<h3 class="fdp-col-head is-sky">Snowflake FDP 2.0 Layers</h3>
					<span class="fdp-sf-wordmark-wrap"><img class="fdp-sf-wordmark" src="<?php echo esc_url( $img_url . 'tech-logos/snowflake-wordmark.png' ); ?>" alt="Snowflake" width="640" height="152" loading="lazy"><sup class="fdp-reg" aria-hidden="true">&reg;</sup></span>
					<ol class="fdp-layers" aria-label="FDP 2.0 data layers">
						<li><i class="is-blue"><svg aria-hidden="true"><use href="#dgf-db-fill"/></svg></i><b>EDL</b><small>Extract, Detailed Load</small></li>
						<li><i class="is-orange"><svg aria-hidden="true"><use href="#dgf-db-fill"/></svg></i><b>ESL</b><small>Enterprise Staging Layer</small></li>
						<li><i class="is-green"><svg aria-hidden="true"><use href="#dgf-db-fill"/></svg></i><b>EDW</b><small>Enterprise Data Warehouse</small></li>
					</ol>
					<ul class="fdp-governance" aria-label="Built-in controls"><li>Governance</li><li>Data Quality</li><li>Lineage</li><li>Auditability</li></ul>
				</article>
				<span class="dgf-arrow" aria-hidden="true"></span>
				<article class="dgf-col fdp-col">
					<h3 class="fdp-col-head is-purple">Analytics &amp; Consumption</h3>
					<ul class="fdp-list is-compact is-purple-list">
						<li><i><svg aria-hidden="true"><use href="#fdp-unified"/></svg></i><span>Financial Reporting</span></li>
						<li><i><svg aria-hidden="true"><use href="#dematic-chart"/></svg></i><span>BI &amp; Dashboards</span></li>
						<li><i><svg aria-hidden="true"><use href="#dematic-users"/></svg></i><span>Self-Service Analytics</span></li>
						<li><i><svg aria-hidden="true"><use href="#dematic-globe"/></svg></i><span>AI Initiatives</span></li>
						<li><i><svg aria-hidden="true"><use href="#fdp-share"/></svg></i><span>Secure Data Sharing</span></li>
					</ul>
				</article>
			</div>
		</div>
	</section>

	<section class="dematic-section dematic-outcomes" id="impact">
		<div class="dematic-shell">
			<div class="dematic-section-heading"><h2>Key Business Outcomes</h2><p>A modernized financial data platform delivering measurable impact.</p></div>
			<div class="dgf-outcome-grid fdp-outcomes">
				<?php foreach ( $outcomes as $item ) : ?>
					<article><span class="dematic-icon"><svg><use href="#<?php echo esc_attr( $item[0] ); ?>"/></svg></span><div><?php if ( '60%' === $item[1] ) : ?><strong><?php echo esc_html( $item[1] ); ?></strong><p><?php echo esc_html( $item[2] ); ?></p><?php else : ?><p class="fdp-outcome-text"><?php if ( '' !== $item[1] ) : ?><b><?php echo esc_html( $item[1] ); ?></b><?php endif; ?><?php echo esc_html( $item[2] ); ?></p><?php endif; ?></div></article>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<section class="dematic-section dematic-tech" id="technologies">
		<div class="dematic-shell">
			<div class="dematic-section-heading"><h2>Technologies &amp; Platforms</h2><p>Key technologies used in Asana&rsquo;s financial data platform modernization.</p></div>
			<div class="dgf-tech-grid fdp-tech">
				<div class="dgf-tech fdp-tech-snowflake"><span class="dgf-tech-icon-box"><img src="<?php echo esc_url( $img_url . 'tech-logos/snowflake-wordmark.png' ); ?>" alt="Snowflake" width="640" height="152" loading="lazy"><sup class="fdp-reg" aria-hidden="true">&reg;</sup></span></div>
				<div class="dgf-tech" style="--tint:#eef6ff"><span class="dgf-tech-icon-box"><img src="<?php echo esc_url( $img_url . 'tech-logos/airflow-mark.png' ); ?>" alt="Apache Airflow" width="192" height="192" loading="lazy"></span><span class="dgf-tech-name">Apache Airflow</span></div>
				<div class="dgf-tech fdp-tech-wordmark"><span class="dgf-tech-icon-box"><img src="<?php echo esc_url( $img_url . 'tech-logos/zuora-logo.png' ); ?>" alt="Zuora" width="575" height="118" loading="lazy"></span></div>
				<div class="dgf-tech" style="--tint:#e8f4fd"><span class="dgf-tech-icon-box"><img src="<?php echo esc_url( $img_url . 'brand-salesforce.png' ); ?>" alt="Salesforce" width="267" height="188" loading="lazy"></span><span class="dgf-tech-name">Salesforce</span></div>
				<div class="dgf-tech" style="--tint:#eef1f6"><span class="dgf-tech-icon-box"><img src="<?php echo esc_url( $img_url . 'netsuite-mark.png' ); ?>" alt="NetSuite" width="248" height="244" loading="lazy"></span><span class="dgf-tech-name">NetSuite</span></div>
				<div class="dgf-tech" style="--tint:#eef4fb"><span class="dgf-tech-icon-box fdp-events-mark"><svg aria-hidden="true"><use href="#dematic-document"/></svg></span><span class="dgf-tech-name">Product Events</span></div>
			</div>
		</div>
	</section>

	<section class="dematic-final-cta dgf-cta">
		<div class="dematic-shell"><div class="dematic-final-inner"><h2>Ready to Modernize Your <span class="fdp-cta-accent">Financial Data Platform?</span></h2><p>Build a scalable, governed foundation for trusted reporting and smarter decisions.</p><a class="dematic-button" href="<?php echo esc_url( $contact_url ); ?>">Talk to Our Data &amp; Analytics Experts <svg><use href="#dematic-arrow"/></svg></a></div></div>
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
