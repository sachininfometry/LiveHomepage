<?php
/**
 * Template Name: Codexis Enterprise Data Warehouse Case Study
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
$cdx_img_url      = $img_url . 'case-studies/codexis/';

$challenges = array(
	array( 'cdx-excel', 'Manual Excel Consolidation', 'Data collected across multiple systems and departments using spreadsheets.' ),
	array( 'cdx-db', 'Limited ERP Reporting', 'Existing ERP reports did not meet analytical and management reporting needs.' ),
	array( 'cdx-share', 'Fragmented Global View', 'Difficult to compare spend across entities, departments, and projects.' ),
	array( 'cdx-users-fill', 'Restricted Self-Service Analysis', 'Need for drill-down and multidimensional finance reporting for better business insights.' ),
);

$approach = array(
	array( 'dematic-search', 'Assess finance, operations & R&D reporting needs', 'Understand data sources, reporting requirements and business use cases across global entities.' ),
	array( 'dematic-gear', 'Integrate enterprise data with SSIS', 'Extract and integrate data from multiple systems using SQL Server Integration Services (SSIS).' ),
	array( 'cdx-db', 'Build SQL Server data warehouse', 'Design and implement a scalable SQL Server data warehouse with reusable ETL framework.' ),
	array( 'cdx-cube', 'Create SSAS OLAP cubes', 'Develop multidimensional cubes using SQL Server Analysis Services (SSAS) for finance and operational analytics.' ),
	array( 'cdx-bars-fill', 'Deliver secure dashboards and analysis', 'Implement Business Objects reports and executive dashboards with secure, role-based access.' ),
);

$outcomes = array(
	array( 'cdx-bars-fill', '80%', 'Productivity Increase', 'After eliminating manual collection and spreadsheet-based reporting.' ),
	array( 'cdx-db', '', 'Consolidated Spending View', 'Single version of truth across global entities, departments and projects.' ),
	array( 'cdx-report', '', 'Drill-Down OpEx, CapEx & Accruals', 'Detailed and accurate financial reporting and analysis.' ),
	array( 'dematic-trend', '', 'Actual vs Forecast / Plan', 'Complete view including headcount for better planning and control.' ),
	array( 'dematic-globe', '', 'Global Multidimensional Analysis', 'Analyze by items, vendors, time, chart of accounts, projects and departments.' ),
);
?>

<main class="dematic-case-study dgf-case-study cdx-case-study" id="dematic-main">
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
		<symbol id="cdx-x-server" viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="7" rx="1.5"/><rect x="3" y="13" width="18" height="7" rx="1.5"/><path d="M7 7.5h.01M7 16.5h.01M11 7.5h6M11 16.5h6"/></symbol>
		<symbol id="cdx-x-hybrid" viewBox="0 0 24 24"><path d="M6 7.5 11 13.5M17.5 6.5 12.5 13M12 15l5.5 4" stroke-width="2.4"/><g fill="currentColor" stroke="none"><circle cx="5" cy="6" r="3.2"/><circle cx="18.5" cy="5" r="3.2"/><circle cx="12" cy="14.5" r="2.6"/><circle cx="18.5" cy="19.5" r="2.8"/></g></symbol>
		<symbol id="cdx-x-server-fill" viewBox="0 0 24 24"><g fill="currentColor" stroke="none"><rect x="2" y="3" width="20" height="8" rx="2"/><rect x="2" y="13" width="20" height="8" rx="2"/></g><g stroke="#fff" stroke-width="1.8"><path d="M5.5 7h.01M8.5 7h.01M5.5 17h.01M8.5 17h.01M12 7h6M12 17h6"/></g></symbol>
		<symbol id="cdx-x-savings" viewBox="0 0 24 24"><g fill="currentColor" stroke="none"><ellipse cx="10" cy="5" rx="7.5" ry="2.8"/><path d="M2.5 7.4v3.2c0 1.6 3.4 2.8 7.5 2.8s7.5-1.2 7.5-2.8V7.4c-1.6 1.1-4.4 1.8-7.5 1.8S4.1 8.5 2.5 7.4Z"/><path d="M2.5 13v3.2c0 1.6 3.4 2.8 7.5 2.8.9 0 1.7-.1 2.5-.2a6.5 6.5 0 0 1 1-5.2c-1.1.3-2.2.4-3.5.4-3.1 0-5.9-.7-7.5-1.8Z"/></g><circle cx="18" cy="17" r="5" fill="#16a34a" stroke="none"/><path d="M19.6 15.1c-.3-.5-.9-.8-1.6-.8-.9 0-1.6.5-1.6 1.2 0 1.7 3.3.9 3.3 2.6 0 .7-.7 1.3-1.7 1.3-.7 0-1.4-.3-1.7-.9M18 13.4v7.2" stroke="#fff" stroke-width="1.3"/></symbol>
		<symbol id="cdx-x-calendar" viewBox="0 0 24 24"><rect x="3" y="5" width="18" height="16" rx="2"/><path d="M3 10h18M8 3v4M16 3v4M7 14h2M11 14h2M15 14h2M7 17.5h2M11 17.5h2"/></symbol>
		<symbol id="cdx-x-dollar" viewBox="0 0 24 24"><circle cx="12" cy="12" r="9.5"/><path d="M15 8.6c-.6-.9-1.7-1.4-3-1.4-1.8 0-3 .9-3 2.3 0 3.2 6.2 1.7 6.2 4.9 0 1.4-1.3 2.4-3.2 2.4-1.4 0-2.6-.6-3.2-1.6M12 5.5v13"/></symbol>
		<symbol id="cdx-x-signal" viewBox="0 0 24 24"><circle cx="12" cy="12" r="2"/><path d="M8.5 15.5a5 5 0 0 1 0-7M15.5 8.5a5 5 0 0 1 0 7M5.6 18.4a9 9 0 0 1 0-12.8M18.4 5.6a9 9 0 0 1 0 12.8"/></symbol>
		<symbol id="cdx-x-mapreduce" viewBox="0 0 24 24"><circle cx="5" cy="5" r="2.2"/><circle cx="5" cy="12" r="2.2"/><circle cx="5" cy="19" r="2.2"/><circle cx="19" cy="12" r="2.6"/><path d="M7.2 5.6 16.6 11M7.2 12h9.2M7.2 18.4l9.4-5.4"/></symbol>
		<symbol id="cdx-x-cluster" viewBox="0 0 24 24"><rect x="2.5" y="3" width="8" height="8" rx="1.5"/><rect x="13.5" y="3" width="8" height="8" rx="1.5"/><rect x="2.5" y="13" width="8" height="8" rx="1.5"/><rect x="13.5" y="13" width="8" height="8" rx="1.5"/></symbol>
			<symbol id="cdx-shield-fill" viewBox="0 0 24 24"><path fill="currentColor" stroke="none" d="M12 1.8 3.5 5v6.2c0 5.3 3.6 9.6 8.5 11 4.9-1.4 8.5-5.7 8.5-11V5L12 1.8Z"/><path d="m8 12 3 3 5-6" stroke="#fff" stroke-width="2.4"/></symbol>
		<symbol id="cdx-bars-fill" viewBox="0 0 24 24"><g fill="currentColor" stroke="none"><rect x="2" y="12" width="5.2" height="10" rx="1"/><rect x="9.4" y="7" width="5.2" height="15" rx="1"/><rect x="16.8" y="2" width="5.2" height="20" rx="1"/></g></symbol>
		<symbol id="cdx-users-fill" viewBox="0 0 24 24"><g fill="currentColor" stroke="none"><circle cx="12" cy="6.5" r="3.5"/><circle cx="4.8" cy="8.8" r="2.6"/><circle cx="19.2" cy="8.8" r="2.6"/><path d="M5.5 21c0-4.3 2.6-7.2 6.5-7.2s6.5 2.9 6.5 7.2Z"/><path d="M.5 19.5c0-3.3 1.6-5.5 4.3-5.5 1 0 1.8.3 2.5.8-1.4 1.4-2.3 3.4-2.5 4.7Z"/><path d="M23.5 19.5c0-3.3-1.6-5.5-4.3-5.5-1 0-1.8.3-2.5.8 1.4 1.4 2.3 3.4 2.5 4.7Z"/></g></symbol>
		<symbol id="cdx-lock" viewBox="0 0 24 24"><rect x="4" y="10" width="16" height="12" rx="2.2" fill="currentColor" stroke="none"/><path d="M8 10V7a4 4 0 0 1 8 0v3" stroke-width="2.4"/><circle cx="12" cy="15.4" r="1.7" fill="#fff" stroke="none"/><path d="M12 16.5v2.3" stroke="#fff" stroke-width="1.8"/></symbol>
		<symbol id="cdx-share" viewBox="0 0 24 24"><g fill="currentColor" stroke="none"><circle cx="18" cy="5" r="3.2"/><circle cx="6" cy="12" r="3.2"/><circle cx="18" cy="19" r="3.2"/></g><path d="m8.6 10.6 6.8-4M8.6 13.4l6.8 4" stroke-width="2.2"/></symbol>
		<symbol id="cdx-swap" viewBox="0 0 24 24"><path d="M3 8h16M15 4l4 4-4 4M21 16H5M9 12l-4 4 4 4" stroke-width="2.2"/></symbol>
		<symbol id="cdx-monitor" viewBox="0 0 24 24"><rect x="2.5" y="3.5" width="19" height="13" rx="1.8"/><path d="M8 21h8M12 16.5V21"/></symbol>
		<symbol id="cdx-wrench" viewBox="0 0 24 24"><path fill="currentColor" stroke="none" d="M21.2 6.3 18 9.5 14.5 6 17.7 2.8A6 6 0 0 0 9.8 9.6L2.6 16.8a2.4 2.4 0 0 0 3.4 3.4l7.2-7.2a6 6 0 0 0 8-6.7Z"/></symbol>
		<symbol id="cdx-cart" viewBox="0 0 24 24"><path d="M2.5 3.5h2.6l2.3 11.2h11.2l2.1-7.9H6.2"/><circle cx="9" cy="19" r="1.6"/><circle cx="17.5" cy="19" r="1.6"/></symbol>
		<symbol id="cdx-truck" viewBox="0 0 24 24"><g fill="currentColor" stroke="none"><path d="M1.5 5.5h12.5v10H1.5z"/><path d="M15 9h4l3.5 3.6v2.9H15z"/></g><circle cx="6" cy="17.5" r="2.2" fill="#fff" stroke="currentColor" stroke-width="1.8"/><circle cx="18" cy="17.5" r="2.2" fill="#fff" stroke="currentColor" stroke-width="1.8"/></symbol>
		<symbol id="cdx-gift" viewBox="0 0 24 24"><g fill="currentColor" stroke="none"><rect x="3" y="8" width="18" height="4.5" rx="1"/><rect x="4.5" y="12.5" width="15" height="9" rx="1"/></g><path d="M12 8v13.5" stroke="#fff" stroke-width="2"/><path d="M12 8C10 4 6.5 4 7 6.5S11 8 12 8Zm0 0c2-4 5.5-4 5 -1.5S13 8 12 8Z" stroke-width="1.8"/></symbol>
		<symbol id="cdx-card" viewBox="0 0 24 24"><rect x="2" y="5" width="20" height="14" rx="2.2" fill="currentColor" stroke="none"/><path d="M2 9.5h20" stroke="#fff" stroke-width="2"/><path d="M5.5 15h4" stroke="#fff" stroke-width="1.8"/></symbol>
		<symbol id="cdx-db" viewBox="0 0 24 24"><g fill="currentColor" stroke="none"><ellipse cx="12" cy="5" rx="8" ry="3"/><path d="M4 7.6v3.4c0 1.7 3.6 3 8 3s8-1.3 8-3V7.6c-1.7 1.2-4.7 1.9-8 1.9s-6.3-.7-8-1.9Z"/><path d="M4 13.6V17c0 1.7 3.6 3 8 3s8-1.3 8-3v-3.4c-1.7 1.2-4.7 1.9-8 1.9s-6.3-.7-8-1.9Z"/></g></symbol>
		<symbol id="cdx-gear-fill" viewBox="0 0 24 24"><path fill="currentColor" stroke="none" d="M13.6 1.5h-3.2l-.6 2.7a8 8 0 0 0-2 1.2L5.2 4.5 3.6 7.3l2 1.9a8 8 0 0 0 0 2.3l-2 1.9 1.6 2.8 2.6-.9a8 8 0 0 0 2 1.2l.6 2.7h3.2l.6-2.7a8 8 0 0 0 2-1.2l2.6.9 1.6-2.8-2-1.9a8 8 0 0 0 0-2.3l2-1.9-1.6-2.8-2.6.9a8 8 0 0 0-2-1.2Z" transform="translate(0 2)"/><circle cx="12" cy="12.3" r="3.6" fill="#fff" stroke="none"/></symbol>
		<symbol id="cdx-upload" viewBox="0 0 24 24"><path d="M12 15V3M7 8l5-5 5 5M4 15v5h16v-5"/></symbol>
		<symbol id="cdx-download" viewBox="0 0 24 24"><path d="M12 3v12M7 10l5 5 5-5M4 15v5h16v-5"/></symbol>
		<symbol id="cdx-zip" viewBox="0 0 24 24"><path d="M6 2h9l5 5v15H6V2Z"/><path d="M11 3v2h2v2h-2v2h2v2h-2v3"/></symbol>
		<symbol id="cdx-warehouse" viewBox="0 0 24 24"><path d="M2 21V9l10-6 10 6v12"/><path d="M6 21v-9h12v9M6 15h12M6 18h12"/></symbol>
		<symbol id="cdx-folder" viewBox="0 0 24 24"><path fill="currentColor" stroke="none" d="M2 6.5A2 2 0 0 1 4 4.5h5l2 2.2h9a2 2 0 0 1 2 2V18a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2Z"/></symbol>
			<symbol id="cdx-servers" viewBox="0 0 24 24"><g fill="currentColor" stroke="none"><rect x="2" y="2.5" width="20" height="5.5" rx="1.4"/><rect x="2" y="9.25" width="20" height="5.5" rx="1.4"/><rect x="2" y="16" width="20" height="5.5" rx="1.4"/></g><path d="M5.5 5.25h.01M5.5 12h.01M5.5 18.75h.01M9 5.25h2M9 12h2M9 18.75h2" stroke="#fff" stroke-width="1.8"/></symbol>
		<symbol id="cdx-phone" viewBox="0 0 24 24"><rect x="6" y="2" width="12" height="20" rx="2.5"/><path d="M10.5 18.5h3"/></symbol>
		<symbol id="cdx-target" viewBox="0 0 24 24"><circle cx="12" cy="12" r="9"/><circle cx="12" cy="12" r="5"/><circle cx="12" cy="12" r="1.6" fill="currentColor"/><path d="M12 1v3M12 20v3M1 12h3M20 12h3"/></symbol>
		<symbol id="cdx-play" viewBox="0 0 24 24"><rect x="2" y="4" width="20" height="16" rx="3.5" fill="currentColor" stroke="none"/><path d="m10 8.5 5.5 3.5-5.5 3.5Z" fill="#fff" stroke="none"/></symbol>
		<symbol id="cdx-antenna" viewBox="0 0 24 24"><circle cx="12" cy="9" r="1.8" fill="currentColor"/><path d="M12 11v11M8.5 5.5a5 5 0 0 0 0 7M15.5 5.5a5 5 0 0 1 0 7M5.6 2.6a9 9 0 0 0 0 12.8M18.4 2.6a9 9 0 0 1 0 12.8"/></symbol>
		<symbol id="cdx-records" viewBox="0 0 24 24"><path d="M6 2h9l5 5v15H6V2Z" fill="currentColor" stroke="none"/><path d="M9 11h7M9 14.5h7M9 18h5" stroke="#fff" stroke-width="1.6"/></symbol>
		<symbol id="cdx-cursor" viewBox="0 0 24 24"><path fill="currentColor" stroke="none" d="M5 2.5 19.5 13l-6.4 1.1 3.7 6.8-2.6 1.4-3.7-6.8L6 20Z"/></symbol>
		<symbol id="cdx-cogs" viewBox="0 0 24 24"><path fill="currentColor" stroke="none" d="M9.6 1.5H7.4l-.4 1.9a5.6 5.6 0 0 0-1.4.8L3.8 3.6 2.7 5.5 4.1 6.8a5.6 5.6 0 0 0 0 1.6L2.7 9.7l1.1 1.9 1.8-.6a5.6 5.6 0 0 0 1.4.8l.4 1.9h2.2l.4-1.9a5.6 5.6 0 0 0 1.4-.8l1.8.6 1.1-1.9-1.4-1.3a5.6 5.6 0 0 0 0-1.6l1.4-1.3-1.1-1.9-1.8.6a5.6 5.6 0 0 0-1.4-.8ZM8.5 5.6a2 2 0 1 1 0 4 2 2 0 0 1 0-4Zm9.4 6.9h-1.6l-.3 1.4a4 4 0 0 0-1 .6l-1.3-.4-.8 1.4 1 1a4 4 0 0 0 0 1.1l-1 1 .8 1.4 1.3-.4a4 4 0 0 0 1 .6l.3 1.4h1.6l.3-1.4a4 4 0 0 0 1-.6l1.3.4.8-1.4-1-1a4 4 0 0 0 0-1.1l1-1-.8-1.4-1.3.4a4 4 0 0 0-1-.6Zm-.8 4.2a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z"/></symbol>
			<symbol id="cdx-excel" viewBox="0 0 24 24"><rect x="3" y="3" width="18" height="18" rx="2.5" fill="none" stroke="currentColor" stroke-width="2"/><path d="m8 8 8 8M16 8l-8 8" fill="none" stroke="currentColor" stroke-width="2.4"/></symbol>
		<symbol id="cdx-cube" viewBox="0 0 24 24"><g fill="currentColor" stroke="none"><path d="m12 1.8 9 5-9 5-9-5Z"/><path d="M2.5 8.3l8.8 4.9v9.9l-8.8-4.9Z" opacity=".75"/><path d="M21.5 8.3l-8.8 4.9v9.9l8.8-4.9Z" opacity=".9"/></g></symbol>
		<symbol id="cdx-report" viewBox="0 0 24 24"><path fill="currentColor" stroke="none" d="M5 2h10l5 5v15H5Z"/><path d="M8.5 18v-3M12 18v-6M15.5 18v-4" stroke="#fff" stroke-width="2"/></symbol>
		<symbol id="cdx-shield-lock" viewBox="0 0 24 24"><path fill="currentColor" stroke="none" d="M12 1.8 3.5 5v6.2c0 5.3 3.6 9.6 8.5 11 4.9-1.4 8.5-5.7 8.5-11V5Z"/><rect x="8.5" y="11" width="7" height="5.5" rx="1" fill="#fff" stroke="none"/><path d="M10 11V9.5a2 2 0 0 1 4 0V11" stroke="#fff" stroke-width="1.6"/></symbol>
		<symbol id="cdx-trend-up" viewBox="0 0 24 24"><g fill="currentColor" stroke="none"><rect x="2" y="14" width="4.5" height="8" rx="1"/><rect x="8.5" y="10" width="4.5" height="12" rx="1"/><rect x="15" y="6" width="4.5" height="16" rx="1"/></g><path d="m3 10 6-5 4 3 7-6M16 2h4v4" stroke-width="2"/></symbol>
		<symbol id="cdx-dash" viewBox="0 0 24 24"><rect x="2.5" y="3.5" width="19" height="17" rx="2"/><path d="M2.5 8h19M7 12h3v5H7zM13 12h4M13 15h4"/></symbol>
		<symbol id="cdx-windows" viewBox="0 0 24 24"><path fill="currentColor" stroke="none" d="M2 4.5 10.5 3.3v8.1H2Zm9.5-1.3L22 1.8v9.6H11.5ZM2 12.6h8.5v8.1L2 19.5Zm9.5 0H22v9.6l-10.5-1.4Z"/></symbol>
	</svg>

	<section class="dematic-hero" aria-labelledby="dematic-title">
		<div class="dematic-shell dematic-hero-inner">
			<div class="dematic-hero-copy">
				<p class="dematic-eyebrow">Case Study</p>
				<h1 id="dematic-title"><span>Building a Global</span> <strong>Enterprise Data Warehouse</strong> <span class="dematic-title-tail cdx-title-tail">for <em class="cdx-brand">Finance, Operations <br>&amp; R&amp;D</em></span></h1>
				<p>A centralized analytical platform to drive greater visibility, faster reporting and better decision-making across the business.</p>
			</div>
			<figure class="dematic-hero-mobile-visual">
				<img src="<?php echo esc_url( $cdx_img_url . 'codexis-hero-v2.jpg' ); ?>" width="2104" height="747" alt="Engineered enzyme in a Codexis research lab">
			</figure>
		</div>
	</section>

	<section class="dematic-facts" aria-label="Case study summary">
		<div class="dematic-shell dematic-facts-grid">
			<article><span class="dematic-icon"><svg aria-hidden="true"><use href="#cdx-trend-up"/></svg></span><p><small>80%</small><strong>Productivity Increase</strong></p></article>
			<article class="is-label"><span class="dematic-icon"><svg aria-hidden="true"><use href="#dematic-globe"/></svg></span><p><small>Global Finance</small><strong>&amp; Operations</strong></p></article>
			<article class="is-label"><span class="dematic-icon"><svg aria-hidden="true"><use href="#cdx-report"/></svg></span><p><small>Drill-Down OpEx /</small><strong>CapEx Reporting</strong></p></article>
			<article class="is-label"><span class="dematic-icon"><svg aria-hidden="true"><use href="#cdx-shield-lock"/></svg></span><p><small>Secure Role-Based</small><strong>Access</strong></p></article>
		</div>
	</section>

	<section class="dematic-section dematic-overview" id="client">
		<div class="dematic-shell dematic-about-grid">
			<div class="dematic-copy-block">
				<h2>About the Client</h2>
				<p class="cdx-wordmark"><img src="<?php echo esc_url( $cdx_img_url . 'codexis-logo.png' ); ?>" alt="Codexis" width="640" height="96" loading="lazy" decoding="async"></p>
				<p>Codexis is a biotechnology company focused on developing and commercializing enzymes to improve the chemistry of everyday life. The finance, operations, and R&amp;D teams needed a global view of business performance to support better planning and decision-making across the organization.</p>
			</div>
			<figure class="dematic-client-visual dgf-client-visual">
				<img src="<?php echo esc_url( $cdx_img_url . 'codexis-lab.jpg' ); ?>" width="1796" height="876" alt="Scientist pipetting blue samples in a lab with molecular data on a screen" loading="lazy" decoding="async">
			</figure>
		</div>
		<div class="dematic-shell dematic-objective-grid">
			<div>
				<h2>Business Objective</h2>
				<p>To replace manually consolidated Excel reporting and limited ERP reports with a high-performance enterprise analytical solution. Provide a unified view of OpEx, CapEx, P&amp;L, accruals, and R&amp;D activity across global entities.</p>
			</div>
			<ul class="cdx-goals" aria-label="Objectives">
				<li><i class="is-blue"><svg aria-hidden="true"><use href="#cdx-target"/></svg></i>Unified view of global finance, operations and R&amp;D</li>
				<li><i class="is-blue"><svg aria-hidden="true"><use href="#cdx-bars-fill"/></svg></i>Accurate and timely management reporting</li>
				<li><i class="is-blue"><svg aria-hidden="true"><use href="#cdx-users-fill"/></svg></i>Self-service analytical capabilities</li>
				<li><i class="is-blue"><svg aria-hidden="true"><use href="#cdx-gear-fill"/></svg></i>Scalable solution for future growth</li>
			</ul>
		</div>
	</section>

	<section class="dematic-section dematic-challenge" id="challenge">
		<div class="dematic-shell">
			<div class="dematic-section-heading"><h2>Business Challenges</h2><p>The existing reporting environment was manual, fragmented and could not meet growing analytical needs.</p></div>
			<div class="dgf-challenge-grid cdx-challenges">
				<?php foreach ( $challenges as $item ) : ?>
					<article><header><span class="cdx-ch-icon"><svg aria-hidden="true"><use href="#<?php echo esc_attr( $item[0] ); ?>"/></svg></span><h3><?php echo esc_html( $item[1] ); ?></h3></header><p><?php echo esc_html( $item[2] ); ?></p></article>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<section class="dematic-section dematic-solution dgf-approach" id="infometry-approach">
		<div class="dematic-shell">
			<div class="dematic-section-heading"><h2>The Infometry Approach</h2><p>A phased approach to design and implement a scalable enterprise data warehouse for finance, operations and R&amp;D analytics.</p></div>
			<ol class="dgf-stages cdx-stages" aria-label="Infometry approach steps">
				<?php foreach ( $approach as $index => $item ) : ?>
					<li><span class="dgf-stage-num"><?php echo esc_html( (string) ( $index + 1 ) ); ?></span><span><?php echo esc_html( $item[1] ); ?></span></li>
				<?php endforeach; ?>
			</ol>
			<div class="dgf-approach-grid cdx-approach">
				<?php foreach ( $approach as $item ) : ?>
					<article><span class="dematic-icon"><svg><use href="#<?php echo esc_attr( $item[0] ); ?>"/></svg></span><p><?php echo esc_html( $item[2] ); ?></p></article>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<section class="dematic-section dgf-architecture" id="architecture">
		<div class="dematic-shell">
			<div class="dematic-section-heading"><h2>Solution Architecture</h2><p>An end-to-end data warehouse and business intelligence solution on the Microsoft stack.</p></div>
			<div class="cdx-arch">
				<div class="cdx-box cdx-src">
					<h3>Source Systems</h3>
					<ul class="cdx-src-list">
						<li><i><svg aria-hidden="true"><use href="#cdx-report"/></svg></i><span>Finance Systems</span></li>
						<li><i><svg aria-hidden="true"><use href="#cdx-users-fill"/></svg></i><span>HR</span></li>
						<li><i><svg aria-hidden="true"><use href="#dematic-document"/></svg></i><span>Accounting</span></li>
						<li><i><svg aria-hidden="true"><use href="#cdx-servers"/></svg></i><span>ERP (e.g., SAP)</span></li>
						<li><i><svg aria-hidden="true"><use href="#cdx-records"/></svg></i><span>R&amp;D / Lab Systems</span></li>
						<li><i><svg aria-hidden="true"><use href="#cdx-db"/></svg></i><span>Other Departmental Data</span></li>
					</ul>
				</div>
				<span class="cdx-arr" aria-hidden="true"><i></i></span>
				<div class="cdx-box cdx-center">
					<h3>SSIS ETL Framework</h3>
					<i class="cdx-big-icon"><svg aria-hidden="true"><use href="#cdx-cogs"/></svg></i>
					<ul class="cdx-bullets">
						<li>Data extraction, transformation and loading</li>
						<li>Error handling and logging</li>
						<li>Self-documentation</li>
						<li>Configurable parameters</li>
					</ul>
				</div>
				<span class="cdx-arr" aria-hidden="true"><i></i></span>
				<div class="cdx-box cdx-center">
					<img class="cdx-sql" src="<?php echo esc_url( $img_url . 'tech-logos/sql-server-mark.png' ); ?>" alt="Microsoft SQL Server" width="64" height="64" loading="lazy">
					<h3>SQL Server<small>Data Warehouse</small></h3>
					<i class="cdx-big-icon"><svg aria-hidden="true"><use href="#cdx-db"/></svg></i>
				</div>
				<span class="cdx-arr" aria-hidden="true"><i></i></span>
				<div class="cdx-box cdx-center">
					<i class="cdx-big-icon"><svg aria-hidden="true"><use href="#cdx-cube"/></svg></i>
					<h3>SSAS<small>OLAP Cubes</small></h3>
				</div>
				<span class="cdx-arr is-split" aria-hidden="true"><i></i><i></i></span>
				<div class="cdx-stack">
					<div class="cdx-box cdx-row"><i><svg aria-hidden="true"><use href="#cdx-dash"/></svg></i><span><b>Business Objects</b>Web Intelligence / Voyager</span></div>
					<div class="cdx-box cdx-row"><i><svg aria-hidden="true"><use href="#cdx-dash"/></svg></i><span><b>Xcelsius</b>Executive Dashboards</span></div>
				</div>
				<div class="cdx-box cdx-security">
					<span><i><svg aria-hidden="true"><use href="#cdx-windows"/></svg></i><span><b>Windows Active Directory</b>Single Sign-On</span></span>
					<span><i><svg aria-hidden="true"><use href="#cdx-lock"/></svg></i><span><b>Business Objects Security</b>by Entity, Department and Project</span></span>
				</div>
			</div>
		</div>
	</section>

	<section class="dematic-section dematic-outcomes" id="impact">
		<div class="dematic-shell">
			<div class="dematic-section-heading"><h2>Key Business Outcomes</h2><p>A single, trusted analytical platform for global finance, operations and R&amp;D.</p></div>
			<div class="dgf-outcome-grid cdx-outcomes">
				<?php foreach ( $outcomes as $item ) : ?>
					<article><span class="dematic-icon"><svg><use href="#<?php echo esc_attr( $item[0] ); ?>"/></svg></span><div><?php if ( '' !== $item[1] ) : ?><strong><?php echo esc_html( $item[1] ); ?></strong><?php endif; ?><b><?php echo esc_html( $item[2] ); ?></b><p><?php echo esc_html( $item[3] ); ?></p></div></article>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<section class="dematic-section dematic-tech" id="technologies">
		<div class="dematic-shell">
			<div class="dematic-section-heading"><h2>Technologies &amp; Platforms</h2><p>Key technologies used in Codexis&rsquo;s enterprise data warehouse.</p></div>
			<div class="dgf-tech-grid cdx-tech">
				<div class="dgf-tech"><span class="dgf-tech-icon-box"><img src="<?php echo esc_url( $img_url . 'tech-logos/sql-server-mark.png' ); ?>" alt="" width="64" height="64" loading="lazy"></span><span class="dgf-tech-name">Microsoft<small>SQL Server 2008</small></span></div>
				<div class="dgf-tech"><span class="dgf-tech-icon-box is-blue"><svg aria-hidden="true"><use href="#cdx-cogs"/></svg></span><span class="dgf-tech-name">SSIS<small>SQL Server Integration Services</small></span></div>
				<div class="dgf-tech"><span class="dgf-tech-icon-box is-blue"><svg aria-hidden="true"><use href="#cdx-cube"/></svg></span><span class="dgf-tech-name">SSAS<small>SQL Server Analysis Services</small></span></div>
				<div class="dgf-tech"><span class="dgf-tech-icon-box"><img src="<?php echo esc_url( $img_url . 'tech-logos/sap.png' ); ?>" alt="" width="64" height="64" loading="lazy"></span><span class="dgf-tech-name">BusinessObjects<small>XI 3.1 Edge</small></span></div>
				<div class="dgf-tech"><span class="dgf-tech-icon-box is-blue"><svg aria-hidden="true"><use href="#cdx-dash"/></svg></span><span class="dgf-tech-name">Xcelsius<small>2008</small></span></div>
				<div class="dgf-tech"><span class="dgf-tech-icon-box"><img src="<?php echo esc_url( $img_url . 'tech-logos/microsoft.png' ); ?>" alt="" width="64" height="64" loading="lazy"></span><span class="dgf-tech-name">Windows<small>Active Directory</small></span></div>
			</div>
		</div>
	</section>

	<section class="dematic-final-cta dgf-cta cdx-cta">
		<div class="dematic-shell"><div class="dematic-final-inner"><p class="cdx-cta-eyebrow">Partner with Infometry</p><h2>Turn Finance Data into <span class="cdx-cta-accent">Actionable Business Intelligence</span></h2><p>Build scalable data warehouse and analytics solutions for better visibility, faster reporting and smarter decisions.</p><a class="dematic-button" href="<?php echo esc_url( $contact_url ); ?>">Talk to Our Data &amp; Analytics Experts <svg><use href="#dematic-arrow"/></svg></a></div></div>
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
