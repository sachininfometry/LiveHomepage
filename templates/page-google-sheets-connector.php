<?php
/**
 * Template Name: Google Sheets Connector Product
 * Template Post Type: page, product
 *
 * The hero plays a live sync (sheet rows flowing through IDMC into targets),
 * the connectivity map streams data, and tutorials open in a video player.
 * assets/js/google-sheets-connector.js drives them; everything renders
 * finished without it.
 *
 * @package Infometry_Custom_Templates
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }
get_header();
$contact_url      = home_url( '/contact-us/' );
$marketplace_url  = 'https://marketplace.informatica.com/listings/cloud/connectors/infometry_google_sheets_connector.html';
$guide_url        = 'https://drive.google.com/file/d/1dSnTrAzoyMi2tKsEQGGblJ1hZxiEumiA/view?usp=sharing';
$g2_url           = 'https://www.g2.com/products/google-sheets-connector-for-informatica-idmc/reviews/google-sheets-connector-for-informatica-idmc-review-10702219';
$drive_url        = home_url( '/product/google-drive-connector/' );
$ads_url          = home_url( '/product/google-ads-connector/' );
$conversa_url     = home_url( '/product/infofiscus-conversa-decision-intelligence/' );
$accelerators_url = home_url( '/product/accelerators-for-data-warehouse-migration-automation/' );
$customers_url    = home_url( '/company/customers-partners/' );
$img              = INFOMETRY_CT_URL . 'assets/images/';
$sheets_icon      = $img . 'google-connectors/google-sheets.png';
$idmc_icon        = $img . 'informatica-product-mark.png';
$support_email    = 'info@infometry.net';
$trial_form_id    = 351429;

$igs_ops = array( 'Read', 'Write', 'Update', 'Delete', 'Range', 'Search', 'Filter' );

$igs_sheet = array(
	array( 'North America', '$4.2M', '$1.1M' ),
	array( 'EMEA', '$2.8M', '$0.9M' ),
	array( 'APAC', '$1.9M', '$0.6M' ),
	array( 'LATAM', '$0.7M', '$0.3M' ),
	array( 'India', '$1.2M', '$0.4M' ),
);

$igs_targets = array(
	array( 'Snowflake', 'google-sheets/eco-snowflake.png' ),
	array( 'Salesforce', 'google-sheets/eco-salesforce.png' ),
	array( 'NetSuite', 'google-sheets/eco-netsuite.png' ),
	array( 'Databricks', 'google-sheets/eco-databricks.png' ),
	array( 'AWS', 'google-sheets/eco-aws.png' ),
	array( 'Azure', 'google-sheets/eco-azure.png' ),
	array( 'SQL Server', 'google-sheets/eco-sqlserver.png' ),
	array( 'Oracle', 'google-sheets/eco-oracle.png' ),
	array( 'SAP', 'google-sheets/eco-sap.png' ),
	array( 'Workday', 'google-sheets/eco-workday.png' ),
	array( 'Tableau', 'google-sheets/eco-tableau.svg' ),
	array( 'Power BI', '' ),
);

$igs_groups = array(
	array(
		'tone'  => 'blue',
		'icon'  => 'cloud',
		'title' => 'Enterprise Applications',
		'note'  => 'CRM, ERP, EPM & SaaS, on-premises or cloud',
		'items' => array( array( 'Salesforce', 'google-sheets/eco-salesforce.png' ), array( 'NetSuite', 'google-sheets/eco-netsuite.png' ), array( 'Workday', 'google-sheets/eco-workday.png' ), array( 'SAP', 'google-sheets/eco-sap.png' ), array( 'Adaptive', 'google-sheets/eco-adaptive.png' ), array( 'HubSpot', 'google-sheets/eco-hubspot.png' ) ),
	),
	array(
		'tone'  => 'violet',
		'icon'  => 'db',
		'title' => 'Data Warehouses & Lakes',
		'note'  => 'MDM, Relational, NoSQL & Columnar',
		'items' => array( array( 'Snowflake', 'google-sheets/eco-snowflake.png' ), array( 'Databricks', 'google-sheets/eco-databricks.png' ), array( 'AWS', 'google-sheets/eco-aws.png' ), array( 'Azure', 'google-sheets/eco-azure.png' ), array( 'SQL Server', 'google-sheets/eco-sqlserver.png' ), array( 'Oracle', 'google-sheets/eco-oracle.png' ) ),
	),
	array(
		'tone'  => 'orange',
		'icon'  => 'chart',
		'title' => 'Analytics & BI Platforms',
		'note'  => 'Merged, analysis-ready datasets',
		'items' => array( array( 'Tableau', 'google-sheets/eco-tableau.svg' ), array( 'Power BI', '' ), array( 'Looker', '' ) ),
	),
);

$igs_features = array(
	array( 'code', 'Native Interfaces', 'Built on Informatica’s native connector framework with Read, Write, Update, Delete, Range, Search and Filter operations, configured through the IDMC UI. No JDBC driver JARs on the Secure Agent and no hand-built REST calls.' ),
	array( 'layers', 'Complex Format of Data Processing', 'Handles more than simple rows and columns: ranges, filters and multi-sheet data in a single mapping.' ),
	array( 'cloud', 'Integrates with On-Premises & Cloud Apps', 'Easily integrates with any on-premises or cloud app like NetSuite, Salesforce, Adaptive and more.' ),
	array( 'db', 'Connects with Almost Every Source or Target', 'Works with any source or target available in your IDMC org, including MDM, data lakes, enterprise data warehouses and relational, NoSQL and columnar databases.' ),
	array( 'bolt', 'Enterprise-Level Data Processing', 'Batch integration with CDI (Cloud Data Integration) and real-time integration with CAI (Cloud Application Integration), built to process large volumes of rows on a schedule or on demand.' ),
	array( 'calendar', 'Automation & Scheduling of Tasks', 'Schedule mapping and synchronization tasks in IDMC so sheet data stays in sync without manual uploads.' ),
	array( 'nodes', 'Multiple Environments, Locations & Applications', 'Brings data from all applications, across multiple locations, used within multiple environments for analytics.' ),
	array( 'shield', 'Reliable, Repeatable Pipelines', 'Once the mapping is set up, data moves without copy-paste or manual uploads, reducing errors and duplicate records.' ),
);

$igs_videos = array(
	array( 'PzdcvankQGA', 'Google Sheets Connector for Informatica Cloud', 'Overview' ),
	array( 'jHUGiqXl8ZE', 'How to update data from .csv to Google Sheets using Informatica', 'Update' ),
	array( 'rUK4ttec1uQ', 'How to insert data from .csv to Google Sheets using Informatica', 'Insert' ),
	array( 'ZHowj7qOqyk', 'Deleting Data in Google Sheets', 'Delete' ),
);

$igs_faqs = array(
	array( 'What are the types of licenses you offer?', 'We have two licensing models: Prod and Non-Prod. The Infometry connector annual subscription license is charged for a given OrgID, and customers get unlimited usage of the connectors within an OrgID.' ),
	array( 'How are updates on new features released to customers?', 'The Infometry Connector team continues to add new features and support newer API releases for each product. Infometry release cycles are synced with the Informatica Cloud platform, and customers get the updates automatically along with IICS release updates. All new releases are auto-updated at the customer end and are free of charge.' ),
	array( 'Whom do I contact for implementation and license?', 'You can contact Infometry at <a href="mailto:' . $support_email . '">' . $support_email . '</a>.' ),
	array( 'Is Infometry’s Google Sheets Connector certified by Informatica?', 'Yes, it is 100% certified by Informatica and also listed on the <a href="' . $marketplace_url . '" target="_blank" rel="noopener">Informatica Marketplace</a>.' ),
	array( 'How does your customer support work?', 'Our support is available 24/7, and we provide local time-zone support to all our customers globally. You can contact Infometry at <a href="mailto:' . $support_email . '">' . $support_email . '</a>.' ),
	array( 'How does Infometry charge for the Google Sheets Connector?', 'All our connectors are charged based on the number of Prod and Non-Prod licenses subscribed by the customer, completely independent of the number or size of the data and rows processed.' ),
	array( 'How soon can business users onboard and start using the connector?', 'In most cases, it is immediate.' ),
	array( 'What is the validity of the Infometry Connector license?', 'All our licenses are charged annually and are valid for 1 year.' ),
	array( 'How does Infometry offer technical support?', 'It’s available 24/7 with a turnaround time of 24–48 hours. You can contact Infometry at <a href="mailto:' . $support_email . '">' . $support_email . '</a>.' ),
	array( 'How secure is my data?', 'All our connectors and their updates are verified by Informatica before reaching the customer. Our connectors are activated by Informatica and work in your IICS environment. Connectors do not hold any data, and the connector ensures highly secured data transfers.' ),
	array( 'Why use this connector instead of a JDBC driver?', 'A JDBC driver needs JAR files installed on each Secure Agent and gives SQL-style access only. Infometry’s connector is enabled from IDMC, exposes Google Sheets operations like Range, Search and Filter in the mapping UI, and is updated automatically with IDMC releases.' ),
	array( 'Does the connector store my Google Sheets data?', 'No. The connector does not hold any data. It runs in your IDMC environment and moves data directly between Google Sheets and your targets.' ),
);

$igs_faq_schema = array(
	'@context'   => 'https://schema.org',
	'@type'      => 'FAQPage',
	'mainEntity' => array_map(
		function ( $faq ) {
			return array(
				'@type'          => 'Question',
				'name'           => $faq[0],
				'acceptedAnswer' => array( '@type' => 'Answer', 'text' => wp_strip_all_tags( $faq[1] ) ),
			);
		},
		$igs_faqs
	),
);

$igs_link_tags = array( 'a' => array( 'href' => array(), 'target' => array(), 'rel' => array() ) );

require_once INFOMETRY_CT_PATH . 'templates/partials/connector-kit.php';
?>
<main class="igs-page" id="igs-main">
	<?php include INFOMETRY_CT_PATH . 'templates/partials/connector-sprite.php'; ?>

	<section class="igs-hero" aria-labelledby="igs-title">
		<div class="igs-shell igs-hero-grid">
			<div class="igs-hero-copy">
				<span class="igs-badge"><i></i>100% Informatica Certified · IDMC (formerly IICS)</span>
				<h1 id="igs-title">Turn Google Sheets into a <em>governed enterprise data source</em></h1>
				<p>Infometry's Google Sheets Connector for Informatica IDMC moves forecasts, budgets, SKUs and headcount plans from spreadsheets into your warehouse, data lake and cloud apps — and writes results back. No JDBC drivers to install, no custom REST code.</p>
				<div class="igs-actions">
					<a class="igs-btn igs-btn-primary" href="#freetrialform">Start 30-Day Free Trial <svg><use href="#igs-arrow"/></svg></a>
					<a class="igs-btn igs-btn-ghost" href="<?php echo esc_url( $guide_url ); ?>" target="_blank" rel="noopener"><svg><use href="#igs-down"/></svg> Download User Guide</a>
				</div>
				<div class="igs-ops-bar">
					<span>Operations</span>
					<ul class="igs-ops" aria-label="Supported operations">
						<?php foreach ( $igs_ops as $op ) : ?>
							<li><?php echo esc_html( $op ); ?></li>
						<?php endforeach; ?>
					</ul>
				</div>
				<div class="igs-proof">
					<a href="<?php echo esc_url( $marketplace_url ); ?>" target="_blank" rel="noopener"><span class="igs-proof-icon"><?php infometry_ct_igs_img( $idmc_icon, '' ); ?></span><span><b>Informatica Marketplace</b><small>Certified listing</small></span><svg><use href="#igs-out"/></svg></a>
					<a href="<?php echo esc_url( $g2_url ); ?>" target="_blank" rel="noopener"><span class="igs-proof-icon is-g2"><svg><use href="#igs-star"/></svg></span><span><b>G2 Product Review</b><small>See customer feedback</small></span><svg><use href="#igs-out"/></svg></a>
					<?php /* TODO CONFIRM: G2 rating + review count */ ?>
				</div>
			</div>

			<div class="igs-flow" data-igs-live aria-label="Animated example: Google Sheets rows sync through the Infometry connector in Informatica IDMC into enterprise sources and targets such as Snowflake, Salesforce, NetSuite and Power BI">
				<svg class="igs-flow-wires" aria-hidden="true" focusable="false"></svg>
				<div class="igs-sheet" data-igs-sheet>
					<header>
						<span class="igs-sheet-icon"><svg><use href="#igs-grid"/></svg></span>
						<span class="igs-sheet-name"><b>FY27_Sales_Forecast</b><small>Finance · Planning</small></span>
						<span class="igs-sheet-live"><i></i>Live sync</span>
					</header>
					<div class="igs-sheet-fx"><b>fx</b><span data-igs-fx>Reading rows · Q1 Goal, OpEx</span></div>
					<div class="igs-sheet-grid">
						<span class="igs-sheet-select" data-igs-select aria-hidden="true"></span>
						<table>
							<thead>
								<tr class="igs-sheet-cols"><th></th><th>A</th><th>B</th><th>C</th></tr>
								<tr><th>1</th><th>Region</th><th>Q1 Goal</th><th>OpEx</th></tr>
							</thead>
							<tbody>
								<?php foreach ( $igs_sheet as $i => $row ) : ?>
									<tr data-igs-row><td><?php echo (int) $i + 2; ?></td><td><?php echo esc_html( $row[0] ); ?></td><td><?php echo esc_html( $row[1] ); ?></td><td><?php echo esc_html( $row[2] ); ?><em class="igs-row-state" aria-hidden="true"></em></td></tr>
								<?php endforeach; ?>
							</tbody>
						</table>
					</div>
					<footer aria-hidden="true"><span class="is-on">Q1 Plan</span><span>Headcount</span><span>OpEx</span><i>+</i></footer>
				</div>
				<div class="igs-core" data-igs-core>
					<span class="igs-core-icon"><svg><use href="#igs-bolt"/></svg></span>
					<strong>Infometry Connector</strong>
					<small>Informatica IDMC</small>
					<span class="igs-core-modes"><b>CDI · Batch</b><b>CAI · Real-time</b></span>
				</div>
				<div class="igs-eco" data-igs-eco>
					<header><b>Sources &amp; targets</b><small>Any IDMC connection</small></header>
					<ul>
						<?php foreach ( $igs_targets as $target ) : ?>
							<li data-igs-target data-name="<?php echo esc_attr( $target[0] ); ?>">
								<span>
									<?php if ( $target[1] ) : ?>
										<?php infometry_ct_igs_img( $img . $target[1], '' ); ?>
									<?php else : ?>
										<i class="igs-eco-bars"><i></i><i></i><i></i></i>
									<?php endif; ?>
								</span>
								<small><?php echo esc_html( $target[0] ); ?></small>
							</li>
						<?php endforeach; ?>
					</ul>
					<footer>+ data lakes, MDM &amp; every IDMC connection</footer>
				</div>
				<div class="igs-toast" data-igs-toast>
					<span><svg><use href="#igs-check"/></svg></span>
					<div><b>Mapping task completed</b><small>Synced · Scheduled daily 6:00 AM</small></div>
				</div>
			</div>
		</div>

	</section>

	<section class="igs-section igs-overview" aria-labelledby="igs-overview-title">
		<div class="igs-shell igs-ov">
			<div class="igs-ov-copy" data-igs-reveal>
				<span class="igs-kicker">Overview</span>
				<h2 id="igs-overview-title">Your critical business data already lives in <em>spreadsheets</em></h2>
				<p>Finance, sales and operations teams keep forecasts, targets and master data in Google Sheets. The Google Sheets Connector for Informatica IDMC brings that data into your enterprise data warehouses, cloud applications and data lakes, so spreadsheets become a governed source instead of a manual export.</p>
				<ul class="igs-ov-sets" aria-label="Data sets kept in Google Sheets">
					<?php foreach ( array( 'Sales Forecasts', 'Goals', 'Product Masters', 'SKUs', 'Lab Results', 'Headcount Estimates', 'OpEx Budgets' ) as $set ) : ?>
						<li><?php echo esc_html( $set ); ?></li>
					<?php endforeach; ?>
				</ul>
				<div class="igs-ov-points">
					<div><span><svg><use href="#igs-sync"/></svg></span><b>Read &amp; write, source or target</b><p>In synchronization tasks, mapping tasks and data integrations.</p></div>
					<div><span><svg><use href="#igs-bolt"/></svg></span><b>Future-ready</b><p>Ready to feed the automated and Agentic AI data pipelines you build in IDMC.</p></div>
				</div>
			</div>

			<div class="igs-ov-visual" aria-hidden="true" data-igs-reveal>
				<svg class="igs-ov-wires" viewBox="0 0 500 400" preserveAspectRatio="none" focusable="false">
					<defs>
						<linearGradient id="igs-ov-g" x1="0" x2="1"><stop offset="0" stop-color="#2ed57d"/><stop offset="1" stop-color="#7c5cff"/></linearGradient>
					</defs>
					<path id="igs-ov-p0" class="is-in" d="M196 200 H222"/>
					<path id="igs-ov-p1" d="M278 200 C305 200 300 84 330 84"/>
					<path id="igs-ov-p2" d="M278 200 H330"/>
					<path id="igs-ov-p3" d="M278 200 C305 200 300 316 330 316"/>
					<circle class="igs-ov-dot is-in" r="3.5"><animateMotion dur="1.4s" repeatCount="indefinite"><mpath href="#igs-ov-p0"/></animateMotion></circle>
					<circle class="igs-ov-dot" r="3.5"><animateMotion dur="1.8s" repeatCount="indefinite" begin="0s"><mpath href="#igs-ov-p1"/></animateMotion></circle>
					<circle class="igs-ov-dot" r="3.5"><animateMotion dur="1.8s" repeatCount="indefinite" begin=".6s"><mpath href="#igs-ov-p2"/></animateMotion></circle>
					<circle class="igs-ov-dot" r="3.5"><animateMotion dur="1.8s" repeatCount="indefinite" begin="1.2s"><mpath href="#igs-ov-p3"/></animateMotion></circle>
				</svg>

				<span class="igs-ov-label is-left">Your spreadsheets</span>
				<span class="igs-ov-label is-right">Your enterprise</span>

				<div class="igs-ov-deck">
					<div class="igs-ov-sheet is-back2"><header><?php infometry_ct_igs_img( $sheets_icon, '' ); ?><b>OpEx_Budget</b></header></div>
					<div class="igs-ov-sheet is-back1"><header><?php infometry_ct_igs_img( $sheets_icon, '' ); ?><b>Headcount_Plan</b></header></div>
					<div class="igs-ov-sheet is-front">
						<header><?php infometry_ct_igs_img( $sheets_icon, '' ); ?><b>FY27_Sales_Forecast</b></header>
						<div class="igs-ov-rows"><i></i><i></i><i></i><i></i></div>
						<svg class="igs-ov-spark" viewBox="0 0 100 30" preserveAspectRatio="none" focusable="false"><path d="M0 24 18 20 34 22 50 12 66 15 82 6 100 8"/></svg>
					</div>
				</div>

				<div class="igs-ov-core">
					<span class="igs-ov-orbit"></span>
					<span class="igs-ov-orb"><svg><use href="#igs-bolt"/></svg></span>
					<small>Infometry<br>Connector</small>
				</div>

				<ul class="igs-ov-dest">
					<li><span><svg><use href="#igs-db"/></svg></span><b>Data Warehouses</b><i><?php infometry_ct_igs_img( $img . 'google-sheets/eco-snowflake.png', '' ); ?><?php infometry_ct_igs_img( $img . 'google-sheets/eco-sqlserver.png', '' ); ?><?php infometry_ct_igs_img( $img . 'google-sheets/eco-oracle.png', '' ); ?></i></li>
					<li><span><svg><use href="#igs-cloud"/></svg></span><b>Cloud Applications</b><i><?php infometry_ct_igs_img( $img . 'google-sheets/eco-salesforce.png', '' ); ?><?php infometry_ct_igs_img( $img . 'google-sheets/eco-netsuite.png', '' ); ?><?php infometry_ct_igs_img( $img . 'google-sheets/eco-workday.png', '' ); ?></i></li>
					<li><span><svg><use href="#igs-layers"/></svg></span><b>Data Lakes</b><i><?php infometry_ct_igs_img( $img . 'google-sheets/eco-databricks.png', '' ); ?><?php infometry_ct_igs_img( $img . 'google-sheets/eco-aws.png', '' ); ?><?php infometry_ct_igs_img( $img . 'google-sheets/eco-azure.png', '' ); ?></i></li>
				</ul>
			</div>
		</div>
	</section>

	<section class="igs-section igs-capabilities" aria-labelledby="igs-cap-title">
		<div class="igs-shell">
			<div class="igs-head" data-igs-reveal>
				<span class="igs-kicker">Capabilities</span>
				<h2 id="igs-cap-title">Built for enterprise-level data processing</h2>
				<p>Fast, reliable and error-free data processing, made effortless.</p>
			</div>
			<div class="igs-feature-grid">
				<?php foreach ( $igs_features as $i => $feature ) : ?>
					<article class="igs-feature is-c<?php echo (int) $i % 4; ?>" data-igs-reveal>
						<span><svg><use href="#igs-<?php echo esc_attr( $feature[0] ); ?>"/></svg></span>
						<h3><?php echo esc_html( $feature[1] ); ?></h3>
						<p><?php echo esc_html( $feature[2] ); ?></p>
					</article>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<section class="igs-section igs-license" aria-labelledby="igs-compare-title">
		<div class="igs-shell">
			<div class="igs-head" data-igs-reveal>
				<span class="igs-kicker">Why Infometry</span>
				<h2 id="igs-compare-title">Infometry connector vs JDBC drivers vs REST V2</h2>
				<p>Three common ways to connect Google Sheets to Informatica IDMC, compared.</p>
			</div>
			<div class="igs-use-grid">
				<article class="igs-plan is-dark" data-igs-reveal>
					<header><span><svg><use href="#igs-shield"/></svg></span><h3>Infometry Google Sheets Connector</h3></header>
					<ul>
						<li><svg><use href="#igs-check"/></svg><span><b>Setup:</b> Enable from IDMC Add-on Connectors</span></li>
						<li><svg><use href="#igs-check"/></svg><span><b>Operations:</b> Read, Write, Update, Delete, Range, Search, Filter</span></li>
						<li><svg><use href="#igs-check"/></svg><span><b>Batch + real-time:</b> CDI and CAI</span></li>
						<li><svg><use href="#igs-check"/></svg><span><b>Informatica certification:</b> 100% certified, listed on Informatica Marketplace</span></li>
						<li><svg><use href="#igs-check"/></svg><span><b>Updates:</b> Automatic with IDMC releases, free</span></li>
						<li><svg><use href="#igs-check"/></svg><span><b>Pricing:</b> Annual per OrgID, unlimited usage, independent of data volume</span></li>
					</ul>
				</article>
				<article class="igs-plan" data-igs-reveal>
					<header><span><svg><use href="#igs-db"/></svg></span><h3>JDBC driver</h3></header>
					<ul>
						<li><svg><use href="#igs-code"/></svg><span><b>Setup:</b> Install driver JAR on Secure Agent and restart</span></li>
						<li><svg><use href="#igs-code"/></svg><span><b>Operations:</b> Depends on driver (SQL-style access)</span></li>
						<?php /* TODO CONFIRM: JDBC driver "Batch + real-time" value; row hidden until confirmed. */ ?>
						<li><svg><use href="#igs-code"/></svg><span><b>Informatica certification:</b> Third-party driver</span></li>
						<li><svg><use href="#igs-code"/></svg><span><b>Updates:</b> Manual driver upgrades</span></li>
						<li><svg><use href="#igs-code"/></svg><span><b>Pricing:</b> Per driver license</span></li>
					</ul>
				</article>
				<article class="igs-plan" data-igs-reveal>
					<header><span><svg><use href="#igs-sync"/></svg></span><h3>Generic REST V2</h3></header>
					<ul>
						<li><svg><use href="#igs-code"/></svg><span><b>Setup:</b> Build and maintain API calls yourself</span></li>
						<li><svg><use href="#igs-code"/></svg><span><b>Operations:</b> Whatever you build</span></li>
						<li><svg><use href="#igs-code"/></svg><span><b>Batch + real-time:</b> Manual</span></li>
						<li><svg><use href="#igs-code"/></svg><span><b>Informatica certification:</b> n/a</span></li>
						<li><svg><use href="#igs-code"/></svg><span><b>Updates:</b> You maintain it</span></li>
						<li><svg><use href="#igs-code"/></svg><span><b>Pricing:</b> Engineering time</span></li>
					</ul>
				</article>
			</div>
		</div>
	</section>

	<section class="igs-section igs-steps-section" aria-labelledby="igs-steps-title">
		<div class="igs-shell">
			<div class="igs-head is-light" data-igs-reveal>
				<span class="igs-kicker">How it works</span>
				<h2 id="igs-steps-title">From marketplace to a live pipeline in 3 simple steps</h2>
				<p>How you can use our connector with Informatica IDMC.</p>
			</div>
			<ol class="igs-steps" data-igs-steps>
				<li class="is-s1">
					<div class="igs-step-head"><b>01</b><span>Enable</span></div>
					<div class="igs-step-ui" aria-hidden="true">
						<div class="igs-ui-bar"><?php infometry_ct_igs_img( $idmc_icon, '' ); ?><span>IDMC · Add-on connectors</span></div>
						<div class="igs-ui-row is-muted"><i></i><span>Salesforce Connector</span><em class="igs-ui-switch is-on"></em></div>
						<div class="igs-ui-row is-main"><?php infometry_ct_igs_img( $sheets_icon, '' ); ?><span>Google Sheets Connector<small>by Infometry</small></span><em class="igs-ui-switch is-flip"></em></div>
						<div class="igs-ui-row is-muted"><i></i><span>Workday Connector</span><em class="igs-ui-switch"></em></div>
					</div>
					<h3>Enable the connector from IDMC</h3>
					<p>IDMC (formerly IICS) customers can enable it directly from their IDMC and contact us, or Informatica, to activate the license.</p>
				</li>
				<li class="is-s2">
					<div class="igs-step-head"><b>02</b><span>Request</span></div>
					<div class="igs-step-ui" aria-hidden="true">
						<div class="igs-ui-search"><svg><use href="#igs-out"/></svg><span class="igs-ui-type">Google Sheets</span></div>
						<div class="igs-ui-result"><?php infometry_ct_igs_img( $sheets_icon, '' ); ?><span>Google Sheets Connector<small>Infometry · Certified</small></span></div>
						<span class="igs-ui-cta">Start Free Trial</span>
					</div>
					<h3>Find &amp; request a trial</h3>
					<p>Go to the <a href="<?php echo esc_url( $marketplace_url ); ?>" target="_blank" rel="noopener">Informatica Marketplace</a>, search for Infometry’s connector, click Start Free Trial and send us a request.</p>
				</li>
				<li class="is-s3">
					<div class="igs-step-head"><b>03</b><span>Activate</span></div>
					<div class="igs-step-ui" aria-hidden="true">
						<div class="igs-ui-license"><span><svg><use href="#igs-key"/></svg></span><div><b>License · Trial</b><small>Paid or trial, per requirement</small></div><em>Active</em></div>
						<div class="igs-ui-meter"><span><i></i></span><small><b>30 days</b> trial validity</small></div>
					</div>
					<h3>Activate your license</h3>
					<p>Two license types, paid and trial, activated based on your requirement. Trial validity: 30 days.</p>
				</li>
			</ol>
		</div>
	</section>

	<section class="igs-section igs-connect" aria-labelledby="igs-connect-title">
		<div class="igs-shell">
			<div class="igs-head" data-igs-reveal>
				<span class="igs-kicker">Connectivity</span>
				<h2 id="igs-connect-title">Connects with almost every source or target</h2>
				<p>Integrates seamlessly with MDM, Data Lakes and Enterprise Data Warehouses, supports all databases (Relational, NoSQL, Columnar), and works with on-premises and cloud apps.</p>
			</div>
			<div class="igs-pipe" data-igs-pipe data-igs-reveal>
				<svg class="igs-pipe-svg" aria-hidden="true" focusable="false"></svg>
				<div class="igs-pipe-dots" aria-hidden="true"></div>

				<div class="igs-pipe-source" data-igs-pipe-source>
					<span class="igs-pipe-logo"><?php infometry_ct_igs_img( $sheets_icon, '' ); ?></span>
					<b>Google Sheets</b>
					<small>Source &amp; target</small>
					<ul aria-label="Supported operations">
						<?php foreach ( $igs_ops as $op ) : ?>
							<li><?php echo esc_html( $op ); ?></li>
						<?php endforeach; ?>
					</ul>
				</div>

				<div class="igs-pipe-hub" data-igs-pipe-hub>
					<span class="igs-pipe-ring" aria-hidden="true"></span>
					<span class="igs-pipe-logo is-hub"><?php infometry_ct_igs_img( $idmc_icon, '' ); ?></span>
					<b>Informatica IDMC</b>
					<small>Infometry Google Sheets Connector</small>
					<span class="igs-pipe-modes"><em>CDI · Batch</em><em>CAI · Real-time</em></span>
				</div>

				<div class="igs-pipe-targets">
					<?php foreach ( $igs_groups as $group ) : ?>
						<article class="igs-pipe-group is-<?php echo esc_attr( $group['tone'] ); ?>" data-igs-pipe-group>
							<header>
								<span><svg><use href="#igs-<?php echo esc_attr( $group['icon'] ); ?>"/></svg></span>
								<div><h3><?php echo esc_html( $group['title'] ); ?></h3><small><?php echo esc_html( $group['note'] ); ?></small></div>
							</header>
							<ul>
								<?php foreach ( $group['items'] as $item ) : ?>
									<li>
										<?php if ( $item[1] ) : ?>
											<?php infometry_ct_igs_img( $img . $item[1], '' ); ?>
										<?php elseif ( 'Power BI' === $item[0] ) : ?>
											<i class="igs-eco-bars"><i></i><i></i><i></i></i>
										<?php else : ?>
											<svg class="igs-pipe-generic"><use href="#igs-chart"/></svg>
										<?php endif; ?>
										<small><?php echo esc_html( $item[0] ); ?></small>
									</li>
								<?php endforeach; ?>
							</ul>
						</article>
					<?php endforeach; ?>
				</div>

				<div class="igs-pipe-foot">
					<span class="igs-pipe-foot-label"><svg><use href="#igs-check"/></svg>Works across</span>
					<ul>
						<?php
						$igs_pipe_tags = array( array( 'db', 'Relational' ), array( 'layers', 'NoSQL' ), array( 'chart', 'Columnar' ), array( 'shield', 'MDM' ), array( 'layers', 'Data Lakes' ), array( 'cloud', 'On-premises & cloud' ), array( 'nodes', 'Multiple environments' ) );
						foreach ( $igs_pipe_tags as $tag ) :
							?>
							<li><svg><use href="#igs-<?php echo esc_attr( $tag[0] ); ?>"/></svg><?php echo esc_html( $tag[1] ); ?></li>
						<?php endforeach; ?>
					</ul>
				</div>
			</div>
		</div>
	</section>

	<?php /* TODO CONFIRM: Technical details section. Render once at least 3 items are confirmed.
	<section class="igs-section igs-capabilities" aria-labelledby="igs-tech-title">
		<div class="igs-shell">
			<div class="igs-head" data-igs-reveal>
				<span class="igs-kicker">Technical details</span>
				<h2 id="igs-tech-title">What your data team needs to know</h2>
			</div>
			<div class="igs-feature-grid">
				<article class="igs-feature is-c0" data-igs-reveal><span><svg><use href="#igs-key"/></svg></span><h3>Authentication</h3><p>OAuth 2.0 (Client ID, Client Secret, Refresh Token)</p></article>   TODO CONFIRM: service account support
				<article class="igs-feature is-c1" data-igs-reveal><span><svg><use href="#igs-shield"/></svg></span><h3>Runtime</h3><p>IDMC Secure Agent</p></article>   TODO CONFIRM: hosted agent support
				<article class="igs-feature is-c2" data-igs-reveal><span><svg><use href="#igs-sync"/></svg></span><h3>Task types</h3><p>Synchronization tasks, mapping tasks, CAI processes</p></article>   TODO CONFIRM
				<article class="igs-feature is-c3" data-igs-reveal><span><svg><use href="#igs-layers"/></svg></span><h3>Objects</h3><p>Sheets, tabs, ranges</p></article>   TODO CONFIRM: named ranges / header row options
				TODO CONFIRM: Google API limits (how quota / rate limits are handled)
				TODO CONFIRM: PowerCenter support
			</div>
		</div>
	</section> */ ?>

	<section class="igs-section igs-uses" aria-labelledby="igs-uses-title">
		<div class="igs-shell">
			<div class="igs-head" data-igs-reveal>
				<span class="igs-kicker">Use cases</span>
				<h2 id="igs-uses-title">Popular use cases the connector supports</h2>
			</div>
			<div class="igs-use-grid">
				<article class="igs-use is-blue" data-igs-reveal>
					<div class="igs-use-scene" aria-hidden="true">
						<span class="igs-use-tile"><?php infometry_ct_igs_img( $sheets_icon, '' ); ?></span>
						<span class="igs-use-pipe"><i></i></span>
						<span class="igs-use-tile is-target"><?php infometry_ct_igs_img( $img . 'google-sheets/eco-salesforce.png', '' ); ?></span>
					</div>
					<span class="igs-use-num">Use case 01</span>
					<h3>Google Sheets to Salesforce</h3>
					<p>Read data from Google Sheets and write it to Salesforce.</p>
					<ul class="igs-use-tags"><li>Read → Write</li><li>CRM</li></ul>
				</article>
				<article class="igs-use is-violet" data-igs-reveal>
					<div class="igs-use-scene" aria-hidden="true">
						<span class="igs-use-tile"><?php infometry_ct_igs_img( $sheets_icon, '' ); ?></span>
						<span class="igs-use-pipe"><i></i></span>
						<span class="igs-use-stack">
							<span class="igs-use-tile is-sm"><?php infometry_ct_igs_img( $img . 'google-sheets/eco-snowflake.png', '' ); ?></span>
							<span class="igs-use-tile is-sm"><?php infometry_ct_igs_img( $img . 'google-sheets/eco-databricks.png', '' ); ?></span>
							<span class="igs-use-tile is-sm"><?php infometry_ct_igs_img( $img . 'google-sheets/eco-aws.png', '' ); ?></span>
						</span>
					</div>
					<span class="igs-use-num">Use case 02</span>
					<h3>Google Sheets to Enterprise Data Lake or Data Warehouse</h3>
					<p>Read data from Google Sheets and write it to your Enterprise Data Lake or Data Warehouse.</p>
					<ul class="igs-use-tags"><li>Batch &amp; real-time</li><li>Warehouse · Lake</li></ul>
				</article>
				<article class="igs-use is-amber" data-igs-reveal>
					<div class="igs-use-scene is-merge" aria-hidden="true">
						<span class="igs-use-sheets"><span class="igs-use-tile is-xs"><?php infometry_ct_igs_img( $sheets_icon, '' ); ?></span><span class="igs-use-tile is-xs"><?php infometry_ct_igs_img( $sheets_icon, '' ); ?></span><span class="igs-use-tile is-xs"><?php infometry_ct_igs_img( $sheets_icon, '' ); ?></span></span>
						<span class="igs-use-merge"><svg><use href="#igs-layers"/></svg></span>
						<span class="igs-use-pipe is-short"><i></i></span>
						<span class="igs-use-stack">
							<span class="igs-use-tile is-sm"><?php infometry_ct_igs_img( $img . 'google-sheets/eco-tableau.svg', '' ); ?></span>
							<span class="igs-use-tile is-sm"><i class="igs-eco-bars"><i></i><i></i><i></i></i></span>
							<span class="igs-use-tile is-sm"><svg class="igs-pipe-generic"><use href="#igs-chart"/></svg></span>
						</span>
					</div>
					<span class="igs-use-num">Use case 03</span>
					<h3>Merge multiple sheets for Tableau, Looker or Power BI</h3>
					<p>Merge data from multiple Google Sheets into a single data source and provide the dataset to analytics and visualization platforms.</p>
					<ul class="igs-use-tags"><li>Merge</li><li>Tableau · Looker · Power BI</li></ul>
				</article>
			</div>
			<div class="igs-uses-note" data-igs-reveal>
				<span aria-hidden="true"><svg><use href="#igs-star"/></svg></span>
				<p>Whether you're loading a weekly forecast into Snowflake or merging regional sheets for a Power BI dashboard, the connector turns spreadsheet data into a dependable part of your IDMC pipelines.</p>
			</div>
		</div>
	</section>

	<section class="igs-section igs-videos" aria-labelledby="igs-videos-title">
		<div class="igs-shell">
			<div class="igs-head" data-igs-reveal>
				<span class="igs-kicker">See it in action</span>
				<h2 id="igs-videos-title">Learn from step-by-step tutorials</h2>
				<p>Quick videos to help you get started and make the most of the connector.</p>
			</div>
			<div class="igs-tv" data-igs-tv data-igs-reveal>
				<a class="igs-tv-stage" href="<?php echo esc_url( 'https://www.youtube.com/watch?v=' . $igs_videos[0][0] ); ?>" target="_blank" rel="noopener" data-igs-video="<?php echo esc_attr( $igs_videos[0][0] ); ?>" data-igs-stage>
					<span class="igs-tv-scene" aria-hidden="true">
						<span class="igs-tv-tile"><?php infometry_ct_igs_img( $sheets_icon, '' ); ?></span>
						<span class="igs-tv-pipe"><i></i></span>
						<span class="igs-tv-tile"><?php infometry_ct_igs_img( $idmc_icon, '' ); ?></span>
					</span>
					<span class="igs-tv-play" aria-hidden="true"><svg><use href="#igs-play"/></svg></span>
					<span class="igs-tv-info">
						<span class="igs-tv-meta"><em data-igs-stage-op><?php echo esc_html( $igs_videos[0][2] ); ?></em><span data-igs-stage-ep>Episode 01</span> · Knowledge series</span>
						<b data-igs-stage-title><?php echo esc_html( $igs_videos[0][1] ); ?></b>
						<span class="igs-tv-cta">Watch tutorial <svg><use href="#igs-arrow"/></svg></span>
					</span>
				</a>
				<div class="igs-tv-list">
					<header><b>Tutorial playlist</b><small><?php echo count( $igs_videos ); ?> videos</small></header>
					<ol>
						<?php foreach ( $igs_videos as $i => $video ) : ?>
							<li>
								<a href="<?php echo esc_url( 'https://www.youtube.com/watch?v=' . $video[0] ); ?>" target="_blank" rel="noopener" data-igs-pick="<?php echo esc_attr( $video[0] ); ?>" data-op="<?php echo esc_attr( $video[2] ); ?>" data-ep="<?php echo esc_attr( sprintf( 'Episode %02d', $i + 1 ) ); ?>"<?php echo 0 === $i ? ' aria-current="true"' : ''; ?>>
									<span class="igs-tv-num"><?php echo esc_html( sprintf( '%02d', $i + 1 ) ); ?></span>
									<span class="igs-tv-item"><em><?php echo esc_html( $video[2] ); ?></em><b><?php echo esc_html( $video[1] ); ?></b></span>
									<span class="igs-tv-go" aria-hidden="true"><svg><use href="#igs-play"/></svg></span>
								</a>
							</li>
						<?php endforeach; ?>
					</ol>
				</div>
			</div>
		</div>
		<div class="igs-modal" data-igs-modal hidden>
			<div class="igs-modal-box" role="dialog" aria-modal="true" aria-label="Tutorial video">
				<button type="button" class="igs-modal-close" data-igs-close aria-label="Close video"><svg><use href="#igs-plus"/></svg></button>
				<div class="igs-modal-frame" data-igs-frame></div>
			</div>
		</div>
	</section>

	<section class="igs-section igs-license" aria-labelledby="igs-license-title">
		<div class="igs-shell">
			<div class="igs-head" data-igs-reveal>
				<span class="igs-kicker">Licensing</span>
				<h2 id="igs-license-title">Try it free, then go to production</h2>
				<p>Flexible, enterprise-ready licensing for your business needs.</p>
			</div>
			<div class="igs-license-grid">
				<article class="igs-plan" data-igs-reveal>
					<header><span><svg><use href="#igs-calendar"/></svg></span><h3>30-Day Trial</h3></header>
					<ul>
						<li><svg><use href="#igs-check"/></svg>Full connector functionality</li>
						<li><svg><use href="#igs-check"/></svg>Onboard immediately in most cases</li>
						<li><svg><use href="#igs-check"/></svg>Activated through IDMC or the Informatica Marketplace</li>
					</ul>
					<a class="igs-btn igs-btn-outline" href="#freetrialform">Start Free Trial <svg><use href="#igs-arrow"/></svg></a>
				</article>
				<article class="igs-plan is-dark" data-igs-reveal>
					<header><span><svg><use href="#igs-layers"/></svg></span><h3>Production &amp; Non-Production</h3></header>
					<ul>
						<li><svg><use href="#igs-check"/></svg>Annual subscription per OrgID, valid for 1 year</li>
						<li><svg><use href="#igs-check"/></svg>Unlimited connector usage within the OrgID</li>
						<li><svg><use href="#igs-check"/></svg>Pricing independent of data size or number of rows</li>
						<li><svg><use href="#igs-check"/></svg>Free, automatic updates with every IICS release</li>
					</ul>
					<a class="igs-btn igs-btn-primary" href="<?php echo esc_url( $contact_url ); ?>">Talk to Sales <svg><use href="#igs-arrow"/></svg></a>
				</article>
			</div>
		</div>
	</section>

	<section class="igs-section igs-faq" aria-labelledby="igs-faq-title">
		<div class="igs-shell igs-faq-shell">
			<div class="igs-faq-side" data-igs-reveal>
				<span class="igs-kicker">FAQ</span>
				<h2 id="igs-faq-title">Frequently Asked Questions</h2>
				<p>Licensing, updates, support and security: what teams ask before they connect Google Sheets to Informatica IDMC.</p>
				<div class="igs-faq-help">
					<span><svg><use href="#igs-chat"/></svg></span>
					<b>Still have questions?</b>
					<small>Support is available 24/7 with local time-zone coverage.</small>
					<a href="mailto:<?php echo esc_attr( $support_email ); ?>"><?php echo esc_html( $support_email ); ?></a>
					<ul class="igs-faq-facts">
						<li><span><svg><use href="#igs-key"/></svg></span><div><small>License</small><b>Annual, per OrgID · unlimited usage</b></div></li>
						<li><span><svg><use href="#igs-chat"/></svg></span><div><small>Support</small><b>24/7 · 24–48 hour turnaround</b></div></li>
						<li><span><svg><use href="#igs-sync"/></svg></span><div><small>Updates</small><b>Automatic and free with IICS releases</b></div></li>
						<li><span><svg><use href="#igs-shield"/></svg></span><div><small>Security</small><b>Verified by Informatica · holds no data</b></div></li>
					</ul>
					<a class="igs-btn igs-btn-primary" href="<?php echo esc_url( $contact_url ); ?>">Contact Us <svg><use href="#igs-arrow"/></svg></a>
				</div>
			</div>
			<div class="igs-faq-list">
				<?php foreach ( $igs_faqs as $i => $faq ) : ?>
					<details<?php echo 0 === $i ? ' open' : ''; ?>>
						<summary><?php echo esc_html( $faq[0] ); ?><span aria-hidden="true"><svg><use href="#igs-plus"/></svg></span></summary>
						<p><?php echo wp_kses( $faq[1], $igs_link_tags ); ?></p>
					</details>
				<?php endforeach; ?>
			</div>
		</div>
		<script type="application/ld+json"><?php echo wp_json_encode( $igs_faq_schema ); ?></script>
	</section>

	<section class="igs-section igs-related" aria-labelledby="igs-related-title">
		<div class="igs-shell">
			<div class="igs-head" data-igs-reveal>
				<span class="igs-kicker">Explore more</span>
				<h2 id="igs-related-title">Explore related products</h2>
			</div>
			<div class="igs-related-grid">
				<a class="igs-related-card" href="<?php echo esc_url( $drive_url ); ?>" data-igs-reveal>
					<span><?php infometry_ct_igs_img( $img . 'google-connectors/google-drive.png', '' ); ?></span>
					<div><h3>Google Drive Connector</h3><p>Provides connectivity to Google Drive to and from a variety of external sources.</p><em>Explore <svg><use href="#igs-arrow"/></svg></em></div>
				</a>
				<a class="igs-related-card" href="<?php echo esc_url( $ads_url ); ?>" data-igs-reveal>
					<span><?php infometry_ct_igs_img( $img . 'google-connectors/google-ads.png', '' ); ?></span>
					<div><h3>Google Ads Connector</h3><p>Seamlessly integrates Google Ads with Enterprise Data Lakes and Data Warehouses via the Informatica Cloud platform.</p><em>Explore <svg><use href="#igs-arrow"/></svg></em></div>
				</a>
			</div>
		</div>
	</section>

	<section class="igs-cta" id="freetrialform" aria-labelledby="igs-cta-title">
		<div class="igs-shell igs-cta-grid">
			<div class="igs-cta-copy">
				<span class="igs-kicker">Free trial</span>
				<h2 id="igs-cta-title">Bring your Google Sheets data into the enterprise data stack</h2>
				<p>Start your free 30-day trial and see how easily you can integrate, sync and operationalize Google Sheets data with Informatica IDMC.</p>
				<ul class="igs-cta-checks">
					<li><svg><use href="#igs-check"/></svg>100% Informatica Certified</li>
					<li><svg><use href="#igs-check"/></svg>Quick and easy setup</li>
					<li><svg><use href="#igs-check"/></svg>Connectors hold no data</li>
					<li><svg><use href="#igs-check"/></svg>24/7 local time-zone support</li>
				</ul>
				<div class="igs-cta-next">
					<b>What happens next</b>
					<ol>
						<li><span>1</span><p><strong>Submit your request</strong>Takes under a minute.</p></li>
						<li><span>2</span><p><strong>We activate your trial</strong>A 30-day trial license for your IDMC org.</p></li>
						<li><span>3</span><p><strong>Start syncing</strong>Use Google Sheets in your tasks and mappings.</p></li>
					</ol>
				</div>
			</div>
			<div class="igs-form">
				<h3>Request Free Trial</h3>
				<?php if ( shortcode_exists( 'wpforms' ) ) : ?>
					<?php echo do_shortcode( sprintf( '[wpforms id="%d" title="false" description="false"]', absint( $trial_form_id ) ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
				<?php else : ?>
					<p>The request form is temporarily unavailable. Email us at <a href="mailto:<?php echo esc_attr( $support_email ); ?>"><?php echo esc_html( $support_email ); ?></a>.</p>
					<a class="igs-btn igs-btn-primary" href="<?php echo esc_url( $contact_url ); ?>">Contact Us <svg><use href="#igs-arrow"/></svg></a>
				<?php endif; ?>
			</div>
		</div>
	</section>

	<footer class="infometry-custom-footer" id="infometry-footer" aria-label="Infometry website footer">
		<div class="infometry-shell">
			<div class="infometry-footer-grid">
				<div class="infometry-footer-connect">
					<h2>Connect with us</h2>
					<a class="infometry-footer-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>"><img width="500" height="142" src="<?php echo esc_url( $img . 'infometry-logo-white.png' ); ?>" alt="Infometry Inc. — Enabling AI for Every Enterprise"></a>
					<p>Turning enterprise data into trusted insights, intelligent decisions and measurable business outcomes.</p>
					<div class="infometry-footer-social" aria-label="Infometry social profiles">
						<a href="https://www.facebook.com/infometryinc/" target="_blank" rel="noopener" aria-label="Infometry on Facebook"><img width="512" height="512" src="<?php echo esc_url( $img . 'social-facebook.png' ); ?>" alt=""></a>
						<a href="https://x.com/Infometryinc" target="_blank" rel="noopener" aria-label="Infometry on X"><img width="500" height="500" src="<?php echo esc_url( $img . 'social-x.png' ); ?>" alt=""></a>
						<a href="https://www.linkedin.com/company/infometry-inc" target="_blank" rel="noopener" aria-label="Infometry on LinkedIn"><img width="512" height="512" src="<?php echo esc_url( $img . 'social-linkedin.png' ); ?>" alt=""></a>
						<a href="https://www.youtube.com/channel/UCYYc9Fa7iPiVLDEiSvG7DmQ" target="_blank" rel="noopener" aria-label="Infometry on YouTube"><img width="512" height="512" src="<?php echo esc_url( $img . 'social-youtube.png' ); ?>" alt=""></a>
						<a href="https://in.pinterest.com/infometryincus/_saved/" target="_blank" rel="noopener" aria-label="Infometry on Pinterest"><img width="512" height="512" src="<?php echo esc_url( $img . 'social-pinterest.png' ); ?>" alt=""></a>
						<a href="https://www.instagram.com/infometry_inc/" target="_blank" rel="noopener" aria-label="Infometry on Instagram"><img width="512" height="512" src="<?php echo esc_url( $img . 'social-instagram.png' ); ?>" alt=""></a>
						<a href="https://www.g2.com/sellers/infometry-inc#profiles" target="_blank" rel="noopener" aria-label="Infometry on G2"><img width="512" height="512" src="<?php echo esc_url( $img . 'social-g2.png' ); ?>" alt=""></a>
					</div>
					<a class="infometry-footer-contact" href="<?php echo esc_url( $contact_url ); ?>">Contact Us <span aria-hidden="true">→</span></a>
				</div>
				<nav class="infometry-footer-column" aria-label="Footer products"><h3>Products</h3><a href="<?php echo esc_url( $conversa_url ); ?>">INFOFISCUS Conversa</a><a href="<?php echo esc_url( home_url( '/product/informatica-connectors/' ) ); ?>">Informatica Connectors</a><a href="<?php echo esc_url( home_url( '/product/#infofiscus-snowflake-native-apps' ) ); ?>">INFOFISCUS Snowflake Native Apps</a><a href="<?php echo esc_url( home_url( '/product/#pre-built-apps' ) ); ?>">Pre-Built Apps For IDMC and Matillion</a><a href="<?php echo esc_url( $accelerators_url ); ?>">Accelerators</a></nav>
				<nav class="infometry-footer-column" aria-label="Footer resources"><h3>Resources</h3><a href="<?php echo esc_url( home_url( '/resources/blog/' ) ); ?>">Blog</a><a href="<?php echo esc_url( home_url( '/resources/infometry-case-studies/' ) ); ?>">Case Studies</a><a href="<?php echo esc_url( home_url( '/resources/whitepapers/' ) ); ?>">Whitepapers</a><a href="<?php echo esc_url( home_url( '/resources/gallery/' ) ); ?>">Gallery</a><a href="<?php echo esc_url( home_url( '/resources/webinar/' ) ); ?>">Webinar</a><a href="<?php echo esc_url( home_url( '/resources/press-releases/' ) ); ?>">Press Releases</a></nav>
				<nav class="infometry-footer-column" aria-label="Footer company"><h3>Company</h3><a href="<?php echo esc_url( $customers_url ); ?>">Customers – Partners</a><a href="<?php echo esc_url( home_url( '/company/careers/' ) ); ?>">Careers</a><a href="<?php echo esc_url( home_url( '/company/life-at-infometry/' ) ); ?>">Life@Infometry</a><a href="<?php echo esc_url( home_url( '/company/testimonials/' ) ); ?>">Testimonials</a></nav>
			</div>
			<div class="infometry-footer-bottom"><span>© 2026 Infometry Inc. All Rights Reserved.</span><span>Enabling AI for Every Enterprise</span></div>
		</div>
	</footer>
</main>
<?php get_footer(); ?>
