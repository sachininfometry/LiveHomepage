<?php
/**
 * Template Name: Expedia Hadoop Case Study
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
$exp_img_url      = $img_url . 'case-studies/expedia/';

$challenges = array(
	array( 'chart', 'Accelerating EDW Growth', 'Data volumes were expanding rapidly across digital and enterprise workloads.' ),
	array( 'database', 'High Infrastructure Cost', 'Scaling premium DB2 and SAN infrastructure for all use cases was increasingly expensive.' ),
	array( 'gear', 'Analytics Constraints', 'Traditional SQL-centric processing limited efficient large-scale exploration and transformation.' ),
	array( 'shield', 'Data Currency & Resiliency', 'Fresher data, better availability, and a more resilient analytics foundation were becoming important.' ),
);

$approach = array(
	array( 'dematic-search', 'Assess EDW & Data Growth', 'Evaluate data growth, cost pressures, and architectural gaps.' ),
	array( 'exp-server', 'Architect Hadoop Platform', 'Define infrastructure, capacity, security, data organization, and operational standards.' ),
	array( 'dematic-nodes', 'Move Clickstream Data to HDFS', 'Organize high-volume raw data for scalable storage and time-based reprocessing.' ),
	array( 'dgf-gear-check', 'Modernize ETL with MapReduce', 'Convert selected database-centric workloads into distributed processing jobs.' ),
	array( 'dematic-chart', 'Enable Analytics & Optimize', 'Configure Hive-based access, integrate with the existing EDW, and tune cluster performance.' ),
);

$outcomes = array(
	array( 'dgf-db-fill', '200 TB Scalable Foundation', 'A distributed platform capable of handling very large clickstream datasets' ),
	array( 'exp-dollar', '$8.5M Projected Savings', 'Projected infrastructure savings over 2.5 years, from the original business case' ),
	array( 'dematic-nodes', 'Hybrid Architecture', 'Hadoop complemented the existing EDW and data marts rather than replacing them' ),
	array( 'dgf-bars', 'Expanded Analytics Access', 'Analytics enabled through Hive while existing SQL workflows were maintained' ),
);
?>

<main class="dematic-case-study dgf-case-study exp-case-study" id="dematic-main">
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
		<symbol id="exp-server" viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="7" rx="1.5"/><rect x="3" y="13" width="18" height="7" rx="1.5"/><path d="M7 7.5h.01M7 16.5h.01M11 7.5h6M11 16.5h6"/></symbol>
		<symbol id="exp-hybrid" viewBox="0 0 24 24"><path d="M6 7.5 11 13.5M17.5 6.5 12.5 13M12 15l5.5 4" stroke-width="2.4"/><g fill="currentColor" stroke="none"><circle cx="5" cy="6" r="3.2"/><circle cx="18.5" cy="5" r="3.2"/><circle cx="12" cy="14.5" r="2.6"/><circle cx="18.5" cy="19.5" r="2.8"/></g></symbol>
		<symbol id="exp-server-fill" viewBox="0 0 24 24"><g fill="currentColor" stroke="none"><rect x="2" y="3" width="20" height="8" rx="2"/><rect x="2" y="13" width="20" height="8" rx="2"/></g><g stroke="#fff" stroke-width="1.8"><path d="M5.5 7h.01M8.5 7h.01M5.5 17h.01M8.5 17h.01M12 7h6M12 17h6"/></g></symbol>
		<symbol id="exp-savings" viewBox="0 0 24 24"><g fill="currentColor" stroke="none"><ellipse cx="10" cy="5" rx="7.5" ry="2.8"/><path d="M2.5 7.4v3.2c0 1.6 3.4 2.8 7.5 2.8s7.5-1.2 7.5-2.8V7.4c-1.6 1.1-4.4 1.8-7.5 1.8S4.1 8.5 2.5 7.4Z"/><path d="M2.5 13v3.2c0 1.6 3.4 2.8 7.5 2.8.9 0 1.7-.1 2.5-.2a6.5 6.5 0 0 1 1-5.2c-1.1.3-2.2.4-3.5.4-3.1 0-5.9-.7-7.5-1.8Z"/></g><circle cx="18" cy="17" r="5" fill="#16a34a" stroke="none"/><path d="M19.6 15.1c-.3-.5-.9-.8-1.6-.8-.9 0-1.6.5-1.6 1.2 0 1.7 3.3.9 3.3 2.6 0 .7-.7 1.3-1.7 1.3-.7 0-1.4-.3-1.7-.9M18 13.4v7.2" stroke="#fff" stroke-width="1.3"/></symbol>
		<symbol id="exp-calendar" viewBox="0 0 24 24"><rect x="3" y="5" width="18" height="16" rx="2"/><path d="M3 10h18M8 3v4M16 3v4M7 14h2M11 14h2M15 14h2M7 17.5h2M11 17.5h2"/></symbol>
		<symbol id="exp-dollar" viewBox="0 0 24 24"><circle cx="12" cy="12" r="9.5"/><path d="M15 8.6c-.6-.9-1.7-1.4-3-1.4-1.8 0-3 .9-3 2.3 0 3.2 6.2 1.7 6.2 4.9 0 1.4-1.3 2.4-3.2 2.4-1.4 0-2.6-.6-3.2-1.6M12 5.5v13"/></symbol>
		<symbol id="exp-signal" viewBox="0 0 24 24"><circle cx="12" cy="12" r="2"/><path d="M8.5 15.5a5 5 0 0 1 0-7M15.5 8.5a5 5 0 0 1 0 7M5.6 18.4a9 9 0 0 1 0-12.8M18.4 5.6a9 9 0 0 1 0 12.8"/></symbol>
		<symbol id="exp-mapreduce" viewBox="0 0 24 24"><circle cx="5" cy="5" r="2.2"/><circle cx="5" cy="12" r="2.2"/><circle cx="5" cy="19" r="2.2"/><circle cx="19" cy="12" r="2.6"/><path d="M7.2 5.6 16.6 11M7.2 12h9.2M7.2 18.4l9.4-5.4"/></symbol>
		<symbol id="exp-cluster" viewBox="0 0 24 24"><rect x="2.5" y="3" width="8" height="8" rx="1.5"/><rect x="13.5" y="3" width="8" height="8" rx="1.5"/><rect x="2.5" y="13" width="8" height="8" rx="1.5"/><rect x="13.5" y="13" width="8" height="8" rx="1.5"/></symbol>
	</svg>

	<section class="dematic-hero" aria-labelledby="dematic-title">
		<div class="dematic-shell dematic-hero-inner">
			<div class="dematic-hero-copy">
				<p class="dematic-eyebrow">Case Study</p>
				<h1 id="dematic-title"><span>Modernizing Expedia&rsquo;s</span> <strong>Enterprise Data Platform</strong> <span class="dematic-title-tail exp-title-tail">with <em class="exp-brand">Hadoop</em></span></h1>
				<p class="exp-hero-lead">Scalable Big-Data Processing, Platform Optimization &amp; Analytics Modernization</p>
				<p>How Infometry extended Expedia&rsquo;s DB2-based EDW with a scalable Hadoop platform for high-volume clickstream and enterprise analytics.</p>
			</div>
			<figure class="dematic-hero-mobile-visual">
				<img src="<?php echo esc_url( $exp_img_url . 'expedia-hero.jpg' ); ?>" width="1974" height="797" alt="Passenger jet flying above the clouds at sunset">
			</figure>
		</div>
	</section>

	<section class="dematic-facts" aria-label="Case study summary">
		<div class="dematic-shell dematic-facts-grid">
			<article><span class="dematic-icon"><svg><use href="#exp-hybrid"/></svg></span><p><small>Hybrid Architecture</small><strong>Hadoop complemented the existing EDW and data marts</strong></p></article>
			<article><span class="dematic-icon"><svg><use href="#dgf-db-fill"/></svg></span><p><small>200 TB</small><strong>Clickstream Data</strong></p></article>
			<article><span class="dematic-icon"><svg><use href="#exp-server-fill"/></svg></span><p><small>40-Node</small><strong>Hadoop Cluster</strong></p></article>
			<article><span class="dematic-icon"><svg><use href="#exp-savings"/></svg></span><p><small>$8.5M</small><strong>Projected Savings over 2.5 years</strong></p></article>
		</div>
	</section>

	<section class="dematic-section dematic-overview" id="client">
		<div class="dematic-shell dematic-about-grid">
			<div class="dematic-copy-block">
				<h2>About the Client</h2>
				<p class="dgf-lead">A global online travel company with a data-intensive digital business</p>
				<p>Expedia is a global online travel company operating a highly data-intensive digital business.</p>
				<p>Customer interactions, search activity, transactions, marketing signals, and clickstream behavior generate very large volumes of enterprise and analytical data.</p>
			</div>
			<figure class="dematic-client-visual dgf-client-visual">
				<img src="<?php echo esc_url( $exp_img_url . 'expedia-about-travel.jpg' ); ?>" width="1813" height="868" alt="Laptop and phone showing the Expedia travel site, with a hat, passport and suitcase" loading="lazy" decoding="async">
			</figure>
		</div>
		<div class="dematic-shell dematic-objective-grid">
			<div>
				<h2>Business Objective</h2>
				<p class="dgf-lead">Build a scalable and cost-efficient data platform for high-volume analytics</p>
				<p>Expedia needed to extend its traditional DB2-centric enterprise data warehouse architecture to support rapidly growing clickstream and external data, improve processing scalability, reduce infrastructure cost, and expand access to large-scale analytics. Infometry began with a 12-week engagement to evaluate and implement a Hadoop-based architecture that could complement the existing EDW while preserving continuity for downstream users and applications.</p>
			</div>
			<ul class="exp-goals" aria-label="Objectives">
				<li><i class="is-blue"><svg aria-hidden="true"><use href="#dgf-db-fill"/></svg></i>Scale for high data volumes</li>
				<li><i class="is-green"><svg aria-hidden="true"><use href="#exp-dollar"/></svg></i>Lower infrastructure cost</li>
				<li><i class="is-orange"><svg aria-hidden="true"><use href="#dgf-bars"/></svg></i>Enable advanced analytics</li>
				<li><i class="is-purple"><svg aria-hidden="true"><use href="#dgf-gear-check"/></svg></i>Maintain existing EDW and downstream systems</li>
			</ul>
		</div>
	</section>

	<section class="dematic-section dematic-challenge" id="challenge">
		<div class="dematic-shell">
			<div class="dematic-section-heading"><h2>Business Challenges</h2><p>A growing digital footprint was increasing cost and limiting analytical flexibility.</p></div>
			<div class="dgf-challenge-grid">
				<?php foreach ( $challenges as $index => $item ) : ?>
					<article><header><span class="dgf-badge"><?php echo esc_html( sprintf( '%02d', $index + 1 ) ); ?></span><span class="dematic-icon"><svg><use href="#dematic-<?php echo esc_attr( $item[0] ); ?>"/></svg></span></header><h3><?php echo esc_html( $item[1] ); ?></h3><p><?php echo esc_html( $item[2] ); ?></p></article>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<section class="dematic-section dematic-solution dgf-approach" id="infometry-approach">
		<div class="dematic-shell">
			<div class="dematic-section-heading"><h2>Infometry Approach</h2><p>A phased big-data modernization strategy designed for scale and continuity.</p></div>
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
			<div class="dematic-section-heading"><h2>Enterprise Data Platform Modernization Architecture</h2><p>From traditional source systems to a unified, hybrid analytics platform.</p></div>
			<div class="dgf-flow exp-flow">
				<article class="dgf-col exp-col">
					<h3 class="exp-col-head is-blue">Source Systems</h3>
					<ul class="exp-list">
						<li><i><svg aria-hidden="true"><use href="#dgf-db-fill"/></svg></i><span>Clickstream Data <b>(Omniture)</b></span></li>
						<li><i><svg aria-hidden="true"><use href="#exp-server"/></svg></i><span>Back-Office Systems</span></li>
						<li><i><svg aria-hidden="true"><use href="#dematic-document"/></svg></i><span>External Data</span></li>
						<li><i><svg aria-hidden="true"><use href="#exp-signal"/></svg></i><span>Near-Real-Time Feeds</span></li>
					</ul>
				</article>
				<span class="dgf-arrow" aria-hidden="true"></span>
				<article class="dgf-col exp-col">
					<h3 class="exp-col-head is-orange">Hadoop Platform</h3>
					<img class="exp-mark" src="<?php echo esc_url( $img_url . 'tech-logos/hadoop-mark.png' ); ?>" alt="Apache Hadoop" width="192" height="144" loading="lazy">
					<ul class="exp-list is-orange-list">
						<li><i><svg aria-hidden="true"><use href="#dgf-db-fill"/></svg></i><span>HDFS</span></li>
						<li><i><img src="<?php echo esc_url( $img_url . 'tech-logos/hive-mark.png' ); ?>" alt="" width="192" height="173" loading="lazy"></i><span>Hive</span></li>
						<li><i><svg aria-hidden="true"><use href="#exp-mapreduce"/></svg></i><span>MapReduce</span></li>
						<li><i><svg aria-hidden="true"><use href="#exp-cluster"/></svg></i><span>Distributed Processing</span></li>
					</ul>
				</article>
				<span class="dgf-arrow" aria-hidden="true"></span>
				<article class="dgf-col exp-col">
					<h3 class="exp-col-head is-green">Existing EDW / Data Marts</h3>
					<ul class="exp-logos">
						<li><img src="<?php echo esc_url( $img_url . 'tech-logos/ibm.svg' ); ?>" alt="" width="64" height="64" loading="lazy"><span>IBM DB2</span></li>
						<li><img src="<?php echo esc_url( $img_url . 'tech-logos/sql-server-mark.png' ); ?>" alt="" width="64" height="64" loading="lazy"><span>SQL Server</span></li>
						<li><img src="<?php echo esc_url( $img_url . 'tech-logos/informatica-mark.png' ); ?>" alt="" width="192" height="194" loading="lazy"><span>Informatica</span></li>
						<li><i><svg aria-hidden="true"><use href="#dgf-db-fill"/></svg></i><span>Enterprise Data Marts</span></li>
					</ul>
				</article>
				<span class="dgf-arrow" aria-hidden="true"></span>
				<article class="dgf-col exp-col">
					<h3 class="exp-col-head is-purple">Analytics &amp; Applications</h3>
					<ul class="exp-list is-compact">
						<li><i><svg aria-hidden="true"><use href="#dgf-bars"/></svg></i><span>Reporting</span></li>
						<li><i><svg aria-hidden="true"><use href="#dematic-chart"/></svg></i><span>Dashboards</span></li>
						<li><i><svg aria-hidden="true"><use href="#dematic-users"/></svg></i><span>CRM</span></li>
						<li><i><svg aria-hidden="true"><use href="#dematic-search"/></svg></i><span>Data Mining</span></li>
						<li><i><svg aria-hidden="true"><use href="#dematic-trend"/></svg></i><span>Livesite Analytics</span></li>
					</ul>
				</article>
			</div>
		</div>
	</section>

	<section class="dematic-section dematic-outcomes" id="impact">
		<div class="dematic-shell">
			<div class="dematic-section-heading"><h2>Key Business Outcomes</h2><p>A scalable hybrid architecture for business growth and high-volume analytics.</p></div>
			<div class="dgf-outcome-grid exp-outcomes">
				<?php foreach ( $outcomes as $item ) : ?>
					<article><span class="dematic-icon"><svg><use href="#<?php echo esc_attr( $item[0] ); ?>"/></svg></span><div><strong><?php echo esc_html( $item[1] ); ?></strong><p><?php echo esc_html( $item[2] ); ?></p></div></article>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<section class="dematic-section dematic-tech" id="technologies">
		<div class="dematic-shell">
			<div class="dematic-section-heading"><h2>Technologies &amp; Platforms</h2><p>Key technologies used in Expedia&rsquo;s data platform modernization.</p></div>
			<div class="dgf-tech-grid exp-tech">
				<div class="dgf-tech" style="--tint:#fffbe0"><span class="dgf-tech-icon-box"><img src="<?php echo esc_url( $img_url . 'tech-logos/hadoop-mark.png' ); ?>" alt="Apache Hadoop" width="192" height="144" loading="lazy"></span><span class="dgf-tech-name">Apache Hadoop</span></div>
				<div class="dgf-tech" style="--tint:#fff1e8"><span class="dgf-tech-icon-box is-orange"><svg aria-hidden="true"><use href="#dgf-db-fill"/></svg></span><span class="dgf-tech-name">HDFS</span></div>
				<div class="dgf-tech" style="--tint:#fffbe0"><span class="dgf-tech-icon-box"><img src="<?php echo esc_url( $img_url . 'tech-logos/hive-mark.png' ); ?>" alt="Apache Hive" width="192" height="173" loading="lazy"></span><span class="dgf-tech-name">Hive</span></div>
				<div class="dgf-tech" style="--tint:#fff1e8"><span class="dgf-tech-icon-box is-orange"><svg aria-hidden="true"><use href="#exp-mapreduce"/></svg></span><span class="dgf-tech-name">MapReduce</span></div>
				<div class="dgf-tech" style="--tint:#e8f0fd"><span class="dgf-tech-icon-box"><img src="<?php echo esc_url( $img_url . 'tech-logos/ibm.svg' ); ?>" alt="IBM" width="64" height="64" loading="lazy"></span><span class="dgf-tech-name">IBM DB2</span></div>
				<div class="dgf-tech" style="--tint:#fff1e8"><span class="dgf-tech-icon-box"><img src="<?php echo esc_url( $img_url . 'tech-logos/informatica-mark.png' ); ?>" alt="Informatica" width="192" height="194" loading="lazy"></span><span class="dgf-tech-name">Informatica</span></div>
				<div class="dgf-tech" style="--tint:#fdecee"><span class="dgf-tech-icon-box"><img src="<?php echo esc_url( $img_url . 'tech-logos/sql-server-mark.png' ); ?>" alt="SQL Server" width="64" height="64" loading="lazy"></span><span class="dgf-tech-name">SQL Server</span></div>
				<div class="dgf-tech" style="--tint:#eef1f6"><span class="dgf-tech-icon-box is-blue"><svg aria-hidden="true"><use href="#dematic-trend"/></svg></span><span class="dgf-tech-name">Omniture Clickstream</span></div>
			</div>
		</div>
	</section>

	<section class="dematic-final-cta dgf-cta">
		<div class="dematic-shell"><div class="dematic-final-inner"><h2>Build a Scalable Foundation for Travel Data &amp; Analytics</h2><p>Modernize legacy data platforms and unlock high-volume analytics with Infometry.</p><a class="dematic-button" href="<?php echo esc_url( $contact_url ); ?>">Talk to Our Data &amp; Analytics Experts <svg><use href="#dematic-arrow"/></svg></a></div></div>
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
