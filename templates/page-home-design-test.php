<?php
/**
 * Template Name: Home Design Test
 * Template Post Type: page
 *
 * @package Infometry_Custom_Templates
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

$demo_url          = apply_filters( 'infometry_home_demo_url', home_url( '/contact-us/' ) );
$contact_url       = apply_filters( 'infometry_home_contact_url', home_url( '/contact-us/' ) );
$conversa_url      = home_url( '/product/conversational-analytics/' );
$snowflake_url     = home_url( '/product/snowflake-native-apps/' );
$informatica_url   = home_url( '/product/informatica-connectors/' );
$netsuite_url      = home_url( '/product/netsuite-to-snowflake-connector/' );
$accelerators_url  = home_url( '/product/accelerators-for-data-warehouse-migration-automation/' );
$prebuilt_apps_url = home_url( '/product/pre-built-analytics-apps-for-idmc-and-matillion/' );
$customers_url     = home_url( '/company/customers-partners/' );
$partners_url      = home_url( '/company/customers-partners/#infometry-partners' );
$databricks_url    = home_url( '/databricks-solutions/' );
$snowflake_sol_url = home_url( '/snowflake-solutions/' );
$google_cloud_url  = home_url( '/product/google-cloud-connectors/' );
$dbt_url           = home_url( '/dbt-migration/' );
$pc_to_idmc_url    = home_url( '/pc-to-cloud-migration/' );
$mulesoft_url      = home_url( '/mulesoft-esb/' );
$matillion_url     = home_url( '/matillion-etl/' );
$about_url         = home_url( '/company/' );
$retail_url        = home_url( '/retail/' );
$manufacturing_url = home_url( '/manufacturing-and-supply-chain/' );
$healthcare_url    = home_url( '/healthcare/' );
$finance_url       = home_url( '/finance/' );
$technology_url    = home_url( '/hi-tech/' );
$life_sciences_url = home_url( '/life-sciences-and-pharmaceutical/' );
$energy_url        = home_url( '/solar-and-energy/' );
$supply_chain_url  = home_url( '/manufacturing-and-supply-chain/' );
?>

<main class="infometry-home-test" id="infometry-home-test">
	<svg class="infometry-icon-sprite" aria-hidden="true" focusable="false">
		<symbol id="i-chat" viewBox="0 0 24 24"><path d="M5 4h14a3 3 0 0 1 3 3v7a3 3 0 0 1-3 3h-7l-5 4v-4H5a3 3 0 0 1-3-3V7a3 3 0 0 1 3-3Z"/><circle cx="8" cy="10.5" r="1"/><circle cx="12" cy="10.5" r="1"/><circle cx="16" cy="10.5" r="1"/></symbol>
		<symbol id="i-snow" viewBox="0 0 24 24"><path d="M12 2v20M4.2 6.5l15.6 11M19.8 6.5l-15.6 11M8.5 4 12 6l3.5-2M8.5 20l3.5-2 3.5 2M3 10l3 2-3 2M21 10l-3 2 3 2"/></symbol>
		<symbol id="i-link" viewBox="0 0 24 24"><path d="m9 15 6-6M7.5 18H6a4 4 0 0 1 0-8h3M16.5 6H18a4 4 0 0 1 0 8h-3"/></symbol>
		<symbol id="i-grid" viewBox="0 0 24 24"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/><path d="M14 14h7v7h-7z"/></symbol>
		<symbol id="i-rocket" viewBox="0 0 24 24"><path d="M14 4c3-2 6-2 6-2s0 3-2 6l-5 5-5-5 6-4Z"/><path d="m8 8-4 1-2 3 6 1M13 13l-1 6-3 2-1-8M6 16c-2 0-3 1-3 3 2 0 3-1 3-3Z"/><circle cx="15.5" cy="6.5" r="1.5"/></symbol>
		<symbol id="i-headset" viewBox="0 0 24 24"><path d="M4 13v-2a8 8 0 0 1 16 0v2M4 13H2v6h4v-6H4Zm16 0h2v6h-4v-6h2ZM18 19c0 2-2 3-5 3"/></symbol>
		<symbol id="i-target" viewBox="0 0 24 24"><circle cx="11" cy="13" r="8"/><circle cx="11" cy="13" r="4"/><path d="m11 13 10-10M16 3h5v5"/></symbol>
		<symbol id="i-shield" viewBox="0 0 24 24"><path d="M12 2 4 5v6c0 5 3 9 8 11 5-2 8-6 8-11V5l-8-3Z"/><path d="m8 12 3 3 5-6"/></symbol>
		<symbol id="i-cloud" viewBox="0 0 24 24"><path d="M6 18a4 4 0 0 1-.5-8A7 7 0 0 1 19 11a3.5 3.5 0 0 1-1 7H6Z"/><path d="M12 11v10m-4-6 4-4 4 4"/></symbol>
		<symbol id="i-users" viewBox="0 0 24 24"><circle cx="9" cy="8" r="3"/><circle cx="17" cy="9" r="2"/><path d="M3 20v-2a6 6 0 0 1 12 0v2M15 14c4 0 6 2 6 5"/></symbol>
		<symbol id="i-bag" viewBox="0 0 24 24"><path d="M4 8h16l-1 13H5L4 8Z"/><path d="M9 9V6a3 3 0 0 1 6 0v3"/></symbol>
		<symbol id="i-building" viewBox="0 0 24 24"><path d="M4 21V5h10v16M14 10h6v11M8 9h2m-2 4h2m-2 4h2m8-3h-2m2 4h-2M2 21h20"/></symbol>
		<symbol id="i-heart" viewBox="0 0 24 24"><path d="M20.8 4.6a5.5 5.5 0 0 0-7.8 0L12 5.7l-1.1-1.1a5.5 5.5 0 0 0-7.8 7.8L12 21l8.8-8.6a5.5 5.5 0 0 0 0-7.8Z"/></symbol>
		<symbol id="i-bank" viewBox="0 0 24 24"><path d="m3 9 9-6 9 6H3Zm2 2v8m5-8v8m4-8v8m5-8v8M3 21h18"/></symbol>
		<symbol id="i-tech" viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="13" rx="2"/><path d="M8 21h8m-4-4v4"/></symbol>
		<symbol id="i-nodes" viewBox="0 0 24 24"><circle cx="6" cy="6" r="2"/><circle cx="18" cy="6" r="2"/><circle cx="6" cy="18" r="2"/><circle cx="18" cy="18" r="2"/><path d="M8 6h8M6 8v8m12-8v8M8 18h8"/></symbol>
		<symbol id="i-pharma" viewBox="0 0 24 24"><path d="M10 2h4" /><path d="M11 2v6l-6 10a3 3 0 0 0 2.6 4h8.8a3 3 0 0 0 2.6-4L13 8V2" /><path d="M8 15h8" /><path d="M9 19h6" /><circle cx="9" cy="11" r="1" /><circle cx="15" cy="13" r="1" /></symbol>
		<symbol id="i-entertainment" viewBox="0 0 24 24"><rect x="3" y="6" width="18" height="12" rx="2"/><path d="m10 10 5 2-5 2v-4ZM7 6 5 3m6 3L9 3m6 3-2-3m6 3-2-3"/></symbol>
		<symbol id="i-energy" viewBox="0 0 24 24"><path d="M13 2 5 13h6l-1 9 9-13h-6l1-7Z"/></symbol>
		<symbol id="i-chip" viewBox="0 0 24 24"><rect x="7" y="7" width="10" height="10" rx="2"/><path d="M9 1v4m6-4v4M9 19v4m6-4v4M1 9h4m-4 6h4m14-6h4m-4 6h4M10 10h4v4h-4z"/></symbol>
		<symbol id="i-supply-chain" viewBox="0 0 24 24"><circle cx="5" cy="6" r="2"/><circle cx="19" cy="6" r="2"/><circle cx="12" cy="18" r="2"/><path d="M7 6h10M6.3 7.6l4.7 8.7m6.7-8.7-4.7 8.7"/></symbol>
	</svg>

	<section class="infometry-hero" aria-labelledby="infometry-hero-title">
		<div class="infometry-orb infometry-orb-one"></div>
		<div class="infometry-orb infometry-orb-two"></div>
		<div class="infometry-shell infometry-hero-grid">
			<div class="infometry-hero-copy">
				<span class="infometry-eyebrow">Conversation Analytics Platform for Enterprise</span>
				<h1 id="infometry-hero-title">Ask Anything.<br>Get Insights.<br><span>Drive Results.</span></h1>
				<p>From the C-suite to frontline teams, INFOFISCUS Conversa makes enterprise data accessible to all - no SQL, no bottlenecks. Just natural questions, instant insights, and confident, data-driven decisions.</p>
				<div class="infometry-actions">
					<a class="infometry-button infometry-button-primary" href="<?php echo esc_url( $demo_url ); ?>">Request a Demo <span aria-hidden="true">→</span></a>
					<a class="infometry-button infometry-button-ghost" href="#infometry-products"><span class="infometry-play" aria-hidden="true">▶</span> Explore Solutions</a>
				</div>
				<div class="infometry-hero-benefits" aria-label="Product benefits">
					<span><svg><use href="#i-chat"/></svg>Ask in <br>Natural Language</span>
					<span><svg><use href="#i-snow"/></svg>Instant <br>Business Insights</span>
					<span><svg><use href="#i-shield"/></svg>Enterprise-Grade<br>Security</span>
					<span><svg><use href="#i-target"/></svg>Actionable<br>Recommendations</span>
				</div>
			</div>

			<div class="infometry-dashboard-wrap infometry-hero-slider" aria-label="INFOFISCUS Conversa product preview carousel">
				<figure class="infometry-hero-slide is-home">
					<img src="<?php echo esc_url( INFOMETRY_CT_URL . 'assets/images/conversa-home-1.png' ); ?>" alt="INFOFISCUS Conversa home dashboard">
				</figure>
				<figure class="infometry-hero-slide is-storybooks">
					<img src="<?php echo esc_url( INFOMETRY_CT_URL . 'assets/images/conversa-storybooks-1.png' ); ?>" alt="INFOFISCUS Conversa storybooks dashboard">
				</figure>
				<figure class="infometry-hero-slide is-connections">
					<img src="<?php echo esc_url( INFOMETRY_CT_URL . 'assets/images/conversa-connections-1.png' ); ?>" alt="INFOFISCUS Conversa connections dashboard">
				</figure>
				<div class="infometry-hero-slider-dots" aria-hidden="true"><span></span><span></span><span></span></div>
			</div>
		</div>
	</section>

	<section class="infometry-trust" id="infometry-impact" aria-label="Infometry experience and impact">
		<div class="infometry-shell infometry-trust-inner">
			<div class="infometry-stat"><b class="infometry-counter" data-counter-target="16" data-counter-suffix="+">0+</b><span>Years of Expertise</span></div>
			<div class="infometry-stat"><b class="infometry-counter" data-counter-target="150" data-counter-suffix="+">0+</b><span>Happy Customers</span></div>
			<div class="infometry-stat"><b class="infometry-counter" data-counter-target="350" data-counter-suffix="+">0+</b><span>Successful Transformations</span></div>
			<div class="infometry-stat"><b class="infometry-counter" data-counter-target="22" data-counter-suffix="+">0+</b><span>Innovative Products</span></div>
			<div class="infometry-stat"><b class="infometry-counter" data-counter-target="100" data-counter-suffix="+">0+</b><span>Experts &amp; Growing</span></div>
			<div class="infometry-partner-panel">
				<span class="infometry-partner-heading">Our Partners</span>
				<div class="infometry-partners" id="infometry-partner-carousel" aria-label="Technology partners">
					<a class="infometry-partner-item snowflake" href="<?php echo esc_url( $partners_url ); ?>"><img src="<?php echo esc_url( INFOMETRY_CT_URL . 'assets/images/snowflake-logo.png' ); ?>" alt="Snowflake"></a>
					<a class="infometry-partner-item databricks" href="<?php echo esc_url( $partners_url ); ?>"><img src="<?php echo esc_url( INFOMETRY_CT_URL . 'assets/images/databricks-logo.png' ); ?>" alt="Databricks"></a>
					<a class="infometry-partner-item gcloud" href="<?php echo esc_url( $partners_url ); ?>"><span class="infometry-gcloud-lockup"><img class="infometry-gcloud-mark" src="<?php echo esc_url( INFOMETRY_CT_URL . 'assets/images/google-cloud-mark.png' ); ?>" alt=""><img class="infometry-gcloud-wordmark" src="<?php echo esc_url( INFOMETRY_CT_URL . 'assets/images/google-cloud-wordmark.png' ); ?>" alt="Google Cloud"></span></a>
					<a class="infometry-partner-item informatica" href="<?php echo esc_url( $partners_url ); ?>"><img src="<?php echo esc_url( INFOMETRY_CT_URL . 'assets/images/informatica-logo.png' ); ?>" alt="Informatica"></a>
					<a class="infometry-partner-item dbt" href="<?php echo esc_url( $partners_url ); ?>"><img src="<?php echo esc_url( INFOMETRY_CT_URL . 'assets/images/dbt-labs-logo.png' ); ?>" alt="dbt Labs"></a>
					<a class="infometry-partner-item hvr" href="<?php echo esc_url( $partners_url ); ?>"><img src="<?php echo esc_url( INFOMETRY_CT_URL . 'assets/images/partner-hvr.png' ); ?>" alt="HVR"></a>
					<a class="infometry-partner-item matillion" href="<?php echo esc_url( $partners_url ); ?>"><img src="<?php echo esc_url( INFOMETRY_CT_URL . 'assets/images/partner-matillion.png' ); ?>" alt="Matillion"></a>
					<a class="infometry-partner-item mulesoft" href="<?php echo esc_url( $partners_url ); ?>"><img src="<?php echo esc_url( INFOMETRY_CT_URL . 'assets/images/partner-mulesoft.png' ); ?>" alt="MuleSoft"></a>
				</div>
			</div>
		</div>
	</section>

	<section class="infometry-who" aria-labelledby="infometry-who-title">
		<div class="infometry-shell">
			<div class="infometry-who-panel">
				<div class="infometry-who-copy">
					<span>Who we are</span>
					<h2 id="infometry-who-title">Enterprise Data Solutions. AI-Powered Decisions. Measurable Business Impact.</h2>
					<p>Infometry helps enterprises modernize data with AI-native products, intelligent automation, and governed cloud platforms.</p>
					<p>With 16+ years of expertise and 350+ successful transformations, we turn fragmented enterprise data into trusted insights, faster decisions, and measurable business outcomes.</p>
					<a href="<?php echo esc_url( $about_url ); ?>">Explore Infometry <span aria-hidden="true">→</span></a>
				</div>
				<div class="infometry-who-insight">
					<div class="infometry-who-intro"><span>Built for AI-first enterprises</span><strong>From Enterprise Data<br>to Intelligent Action.</strong></div>
					<div class="infometry-who-pillars">
						<article><svg><use href="#i-target"/></svg><h3>AI-Powered Analytics</h3><p>Transform trusted enterprise data into real-time insights, recommendations, and conversational intelligence.</p></article>
						<article><svg><use href="#i-cloud"/></svg><h3>Modern Data Platforms</h3><p>Build scalable, secure, and governed cloud data foundations for AI and analytics.</p></article>
						<article><svg><use href="#i-rocket"/></svg><h3>AI &amp; Intelligent Automation</h3><p>Accelerate business processes with Agentic AI, automation, and low-code innovation.</p></article>
					</div>
					<div class="infometry-who-journey" aria-label="Infometry delivery journey"><span><b>01</b><em>Discover</em><small>Unify enterprise data</small></span><span><b>02</b><em>Modernize</em><small>Build AI-ready platforms</small></span><span><b>03</b><em>Transform</em><small>Deliver trusted business outcomes</small></span></div>
				</div>
			</div>
		</div>
	</section>

	<section class="infometry-products" id="infometry-products" aria-labelledby="infometry-products-title">
		<div class="infometry-shell">
			<header class="infometry-section-head"><h2 id="infometry-products-title">Innovative Products. Intelligent Solutions.</h2><p>Accelerate enterprise AI, analytics, integration, and modernization with Infometry's products.</p></header>
			<div class="infometry-card-grid infometry-product-grid" id="infometry-product-carousel" tabindex="0" aria-label="Infometry products">
				<article class="infometry-product-card is-featured is-conversa"><div class="infometry-card-icon has-brand-image"><img src="<?php echo esc_url( INFOMETRY_CT_URL . 'assets/images/infofiscus-conversa-mark.png' ); ?>" alt="INFOFISCUS Conversa"></div><span class="infometry-product-kicker">Conversational AI</span><h3>INFOFISCUS<br>Conversa</h3><p>AI-powered conversational analytics for instant enterprise insights and decisions.</p><div class="infometry-product-highlights"><span>Natural Language</span><span>Instant Insights</span></div><a href="<?php echo esc_url( $conversa_url ); ?>">Explore Conversa →</a></article>
				<article class="infometry-product-card is-informatica"><div class="infometry-card-icon has-brand-image"><img src="<?php echo esc_url( INFOMETRY_CT_URL . 'assets/images/informatica-mark.png' ); ?>" alt="Informatica"></div><span class="infometry-product-kicker">Data Integration</span><h3>Informatica<br>Connectors</h3><p>Connect Informatica to modern cloud platforms with enterprise-grade pipelines designed for dependable, scalable and seamless data movement.</p><div class="infometry-product-highlights"><span>Faster Integration</span><span>Reliable Pipelines</span></div><a href="<?php echo esc_url( $informatica_url ); ?>">Explore Connectors →</a></article>
				<article class="infometry-product-card is-snowflake"><div class="infometry-card-icon has-brand-image"><img src="<?php echo esc_url( INFOMETRY_CT_URL . 'assets/images/snowflake-product-mark.png' ); ?>" alt="Snowflake"></div><span class="infometry-product-kicker">Cloud Data Apps</span><h3>Snowflake<br>Native Apps</h3><p>Native Snowflake applications delivering analytics, governance, and AI acceleration.</p><div class="infometry-product-highlights"><span>Analytics</span><span>Governance</span></div><a href="<?php echo esc_url( $snowflake_url ); ?>">Explore Apps →</a></article>
				<article class="infometry-product-card is-prebuilt"><div class="infometry-card-icon blue"><svg><use href="#i-grid"/></svg></div><span class="infometry-product-kicker">Pre-Built Analytics</span><h3>Pre-Built<br>Analytics Apps</h3><p>Ready-to-deploy analytics for Finance, Sales, Marketing, and Operations.</p><div class="infometry-product-highlights"><span>Finance</span><span>Operations</span></div><a href="<?php echo esc_url( $prebuilt_apps_url ); ?>">Explore Apps →</a></article>
				<article class="infometry-product-card is-snowflake"><div class="infometry-card-icon has-brand-image"><img src="<?php echo esc_url( INFOMETRY_CT_URL . 'assets/images/snowflake-product-mark.png' ); ?>" alt="Snowflake"></div><span class="infometry-product-kicker">Cloud Migration</span><h3>Snowflake<br>Migration</h3><p>Migrate enterprise data platforms to Snowflake faster with Agentic AI.</p><div class="infometry-product-highlights"><span>Data Cloud</span><span>Agentic AI</span></div><a href="<?php echo esc_url( $snowflake_sol_url ); ?>">Explore Snowflake &rarr;</a></article>
				<article class="infometry-product-card is-databricks"><div class="infometry-card-icon has-brand-image"><img src="<?php echo esc_url( INFOMETRY_CT_URL . 'assets/images/databricks-mark.png' ); ?>" alt="Databricks"></div><span class="infometry-product-kicker">Lakehouse AI</span><h3>Databricks<br>Expertise</h3><p>Build scalable Lakehouse architectures for enterprise AI and analytics.</p><div class="infometry-product-highlights"><span>Lakehouse</span><span>AI/ML</span></div><a href="<?php echo esc_url( $databricks_url ); ?>">Explore Databricks &rarr;</a></article>
				<article class="infometry-product-card is-informatica"><div class="infometry-card-icon has-brand-image"><img src="<?php echo esc_url( INFOMETRY_CT_URL . 'assets/images/informatica-mark.png' ); ?>" alt="Informatica"></div><span class="infometry-product-kicker">IDMC Migration</span><h3>PowerCenter<br>to IDMC</h3><p>Modernize Informatica PowerCenter using automated low-code migration accelerators.</p><div class="infometry-product-highlights"><span>Low-Code</span><span>IDMC</span></div><a href="<?php echo esc_url( $pc_to_idmc_url ); ?>">Explore IDMC &rarr;</a></article>
				<article class="infometry-product-card is-mulesoft"><div class="infometry-card-icon has-brand-image"><img src="<?php echo esc_url( INFOMETRY_CT_URL . 'assets/images/mulesoft-mark.png' ); ?>" alt="MuleSoft"></div><span class="infometry-product-kicker">API Integration</span><h3>MuleSoft + API<br>Integration</h3><p>Build intelligent APIs connecting enterprise applications, data, and AI workflows.</p><div class="infometry-product-highlights"><span>Smart APIs</span><span>AI Workflows</span></div><a href="<?php echo esc_url( $mulesoft_url ); ?>">Explore MuleSoft &rarr;</a></article>
				<article class="infometry-product-card is-accelerator"><div class="infometry-card-icon blue"><svg><use href="#i-rocket"/></svg></div><span class="infometry-product-kicker">Intelligent Automation</span><h3>Intelligent<br>Accelerators</h3><p>Automate metadata, testing, and enterprise data engineering workflows.</p><div class="infometry-product-highlights"><span>Metadata</span><span>Testing</span></div><a href="<?php echo esc_url( $accelerators_url ); ?>">Explore Accelerators →</a></article>
				<article class="infometry-product-card is-dbt"><div class="infometry-card-icon has-brand-image"><img src="<?php echo esc_url( INFOMETRY_CT_URL . 'assets/images/dbt-mark.png' ); ?>" alt="dbt"></div><span class="infometry-product-kicker">ELT Modernization</span><h3>dbt Cloud/Core<br>Migration</h3><p>Accelerate dbt migration with optimized SQL and deployment templates.</p><div class="infometry-product-highlights"><span>dbt Cloud</span><span>Core</span></div><a href="<?php echo esc_url( $dbt_url ); ?>">Explore DBT &rarr;</a></article>
				<article class="infometry-product-card is-matillion"><div class="infometry-card-icon has-brand-image"><img src="<?php echo esc_url( INFOMETRY_CT_URL . 'assets/images/matillion-mark.png' ); ?>" alt="Matillion"></div><span class="infometry-product-kicker">Cloud-Native ETL</span><h3>Matillion<br>Solutions</h3><p>Cloud-native ETL accelerated through AI-powered transformation frameworks.</p><div class="infometry-product-highlights"><span>ETL</span><span>Transform</span></div><a href="<?php echo esc_url( $matillion_url ); ?>">Explore Matillion &rarr;</a></article>
			</div>
		</div>
	</section>

	<section class="infometry-values" aria-label="Our capabilities">
		<header class="infometry-capabilities-head"><h2>Our Capabilities</h2></header>
		<div class="infometry-shell infometry-value-grid" id="infometry-capability-carousel" tabindex="0" aria-label="Infometry capabilities">
			<article class="infometry-capability-item"><svg><use href="#i-chat"/></svg><div><h3>Conversational AI Analytics</h3><p>Natural language analytics delivering instant insights from enterprise data through AI conversations.</p></div></article>
			<article class="infometry-capability-item"><svg><use href="#i-rocket"/></svg><div><h3>AI/ML + Agentic Intelligence</h3><p>Intelligent AI agents automate insights, recommendations, workflows, and enterprise decision-making.</p></div></article>
			<article class="infometry-capability-item"><svg><use href="#i-grid"/></svg><div><h3>Low-Code Data Automation</h3><p>Simplify integration, orchestration, and automation using enterprise-ready low-code platforms.</p></div></article>
			<article class="infometry-capability-item"><svg><use href="#i-target"/></svg><div><h3>Advanced Analytics</h3><p>Predictive and prescriptive analytics driving faster, smarter, data-driven business decisions.</p></div></article>
			<article class="infometry-capability-item"><svg><use href="#i-nodes"/></svg><div><h3>Unified Data + Document Intelligence</h3><p>Analyze structured and unstructured enterprise data for trusted AI-powered knowledge discovery.</p></div></article>
		</div>
	</section>

	<section class="infometry-industries" id="infometry-industries" aria-labelledby="infometry-industries-title">
		<div class="infometry-shell">
			<header class="infometry-section-head"><span>Industry expertise</span><h2 id="infometry-industries-title">Transforming Data into Business Outcomes Across Every Industry</h2><p>AI-powered data platforms, analytics, and intelligent automation tailored for every enterprise sector.</p></header>
		  <div class="infometry-card-grid infometry-industry-grid" id="infometry-industry-carousel" tabindex="0" aria-label="Infometry industry verticals">
				<article class="infometry-industry-item"><div class="infometry-mini-icon"><svg><use href="#i-heart"/></svg></div><h3>Healthcare</h3><p>Deliver AI-powered insights improving patient care, operational efficiency, and healthcare outcomes.</p><div class="infometry-industry-focus"><span>Patient Analytics</span><span>Data Governance</span></div><a class="infometry-industry-link" href="<?php echo esc_url( $healthcare_url ); ?>" aria-label="Explore Healthcare">Explore Healthcare <span aria-hidden="true">→</span></a></article>
				<article class="infometry-industry-item"><div class="infometry-mini-icon"><svg><use href="#i-bag"/></svg></div><h3>Retail</h3><p>Unify omnichannel data to personalize customer experiences, optimize inventory, and accelerate growth.</p><div class="infometry-industry-focus"><span>Customer 360</span><span>Demand Planning</span></div><a class="infometry-industry-link" href="<?php echo esc_url( $retail_url ); ?>" aria-label="Explore Retail">Explore Retail <span aria-hidden="true">→</span></a></article>
				<article class="infometry-industry-item"><div class="infometry-mini-icon"><svg><use href="#i-bank"/></svg></div><h3>Financial Services</h3><p>Strengthen risk management, fraud detection, compliance, and customer intelligence through trusted analytics.</p><div class="infometry-industry-focus"><span>Risk Analytics</span><span>Fraud Detection</span></div><a class="infometry-industry-link" href="<?php echo esc_url( $finance_url ); ?>" aria-label="Explore Financial Services">Explore Financial Services <span aria-hidden="true">→</span></a></article>
				<article class="infometry-industry-item"><div class="infometry-mini-icon"><svg><use href="#i-tech"/></svg></div><h3>Hi-Tech</h3><p>Accelerate innovation with AI-powered analytics for products, operations, and recurring revenue growth.</p><div class="infometry-industry-focus"><span>Product Analytics</span><span>AI Acceleration</span></div><a class="infometry-industry-link" href="<?php echo esc_url( $technology_url ); ?>" aria-label="Explore Hi-Tech">Explore Hi-Tech <span aria-hidden="true">→</span></a></article>
				<article class="infometry-industry-item"><div class="infometry-mini-icon"><svg><use href="#i-energy"/></svg></div><h3>Energy &amp; Utilities</h3><p>Optimize energy operations with predictive analytics for assets, consumption, and supply networks.</p><div class="infometry-industry-focus"><span>Asset Analytics</span><span>Demand Forecasting</span></div><a class="infometry-industry-link" href="<?php echo esc_url( $energy_url ); ?>" aria-label="Explore Energy and Utilities">Explore Energy <span aria-hidden="true">→</span></a></article>
				<article class="infometry-industry-item"><div class="infometry-mini-icon"><svg><use href="#i-supply-chain"/></svg></div><h3>Supply Chain</h3><p>Improve supply chain visibility using AI-driven insights for logistics, inventory, and partner performance.</p><div class="infometry-industry-focus"><span>Logistics Intelligence</span><span>Inventory Optimization</span></div><a class="infometry-industry-link" href="<?php echo esc_url( $supply_chain_url ); ?>" aria-label="Explore Supply Chain">Explore Supply Chain <span aria-hidden="true">→</span></a></article>
				<article class="infometry-industry-item"><div class="infometry-mini-icon"><svg><use href="#i-pharma"/></svg></div><h3>Life Sciences &amp; Pharma</h3><p>Accelerate research, regulatory compliance, and commercial analytics through unified enterprise data.</p><div class="infometry-industry-focus"><span>Clinical Analytics</span><span>Regulatory Compliance</span></div><a class="infometry-industry-link" href="<?php echo esc_url( $life_sciences_url ); ?>" aria-label="Explore Life Sciences and Pharma">Explore Life Sciences <span aria-hidden="true">→</span></a></article>
				<article class="infometry-industry-item"><div class="infometry-mini-icon"><svg><use href="#i-building"/></svg></div><h3>Manufacturing</h3><p>Enhance production efficiency with real-time factory analytics, predictive maintenance, and quality intelligence.</p><div class="infometry-industry-focus"><span>Smart Factory</span><span>Predictive Operations</span></div><a class="infometry-industry-link" href="<?php echo esc_url( $manufacturing_url ); ?>" aria-label="Explore Manufacturing">Explore Manufacturing <span aria-hidden="true">→</span></a></article>
         </div>

		</div>
	</section>

	<section class="infometry-customers" aria-labelledby="infometry-customers-title">
		<div class="infometry-shell">
			<header class="infometry-section-head infometry-customers-head"><span>Customer success</span><h2 id="infometry-customers-title">Trusted by 150+ Customers Worldwide</h2></header>
			<div class="infometry-customer-carousel" id="infometry-customer-carousel" aria-label="Infometry customers">
				<a class="infometry-customer-logo" href="<?php echo esc_url( $customers_url ); ?>"><img src="<?php echo esc_url( INFOMETRY_CT_URL . 'assets/images/customer-michaels.png' ); ?>" alt="Michaels"></a>
				<a class="infometry-customer-logo" href="<?php echo esc_url( $customers_url ); ?>"><img src="<?php echo esc_url( INFOMETRY_CT_URL . 'assets/images/customer-fusion-io.png' ); ?>" alt="Fusion-io"></a>
				<a class="infometry-customer-logo" href="<?php echo esc_url( $customers_url ); ?>"><img src="<?php echo esc_url( INFOMETRY_CT_URL . 'assets/images/customer-adaptive-insights.png' ); ?>" alt="Adaptive Insights"></a>
				<a class="infometry-customer-logo" href="<?php echo esc_url( $customers_url ); ?>"><img src="<?php echo esc_url( INFOMETRY_CT_URL . 'assets/images/customer-informatica.png' ); ?>" alt="Informatica"></a>
				<a class="infometry-customer-logo" href="<?php echo esc_url( $customers_url ); ?>"><img src="<?php echo esc_url( INFOMETRY_CT_URL . 'assets/images/customer-sandisk.png' ); ?>" alt="SanDisk"></a>
				<a class="infometry-customer-logo" href="<?php echo esc_url( $customers_url ); ?>"><img src="<?php echo esc_url( INFOMETRY_CT_URL . 'assets/images/customer-ibm.png' ); ?>" alt="IBM"></a>
				<a class="infometry-customer-logo" href="<?php echo esc_url( $customers_url ); ?>"><img src="<?php echo esc_url( INFOMETRY_CT_URL . 'assets/images/customer-belk.png' ); ?>" alt="Belk"></a>
				<a class="infometry-customer-logo" href="<?php echo esc_url( $customers_url ); ?>"><img src="<?php echo esc_url( INFOMETRY_CT_URL . 'assets/images/customer-sanofi.png' ); ?>" alt="Sanofi"></a>
				<a class="infometry-customer-logo" href="<?php echo esc_url( $customers_url ); ?>"><img src="<?php echo esc_url( INFOMETRY_CT_URL . 'assets/images/customer-asana.png' ); ?>" alt="Asana"></a>
			</div>
		</div>
	</section>

	<section class="infometry-final-cta">
		<div class="infometry-shell">
			<div class="infometry-cta-panel">
				<div class="infometry-cta-copy"><img class="infometry-cta-logo" src="<?php echo esc_url( INFOMETRY_CT_URL . 'assets/images/infometry-logo-white.png' ); ?>" alt="Infometry Inc. — Enabling AI for Every Enterprise"><span>Ready for AI-driven transformation?</span><h2>Modernize Data.<br>Accelerate AI. Drive Business Outcomes.</h2><p>Infometry helps enterprises unlock trusted insights through AI-powered analytics, Agentic AI, cloud data modernization, and intelligent automation.</p><div class="infometry-cta-proof"><span><b>16+</b> Years Data &amp; AI Expertise</span><span><b>350+</b> Enterprise Projects</span><span><b>24×7</b> Global Support</span></div></div>
				<div class="infometry-actions"><a class="infometry-button infometry-button-light" href="<?php echo esc_url( $demo_url ); ?>">Request a Demo <span>→</span></a><a class="infometry-button infometry-button-ghost" href="<?php echo esc_url( $contact_url ); ?>">Speak with an Expert</a></div>
				<div class="infometry-cta-art" aria-hidden="true"><span>Enterprise AI</span><i></i><i></i><i></i><b>AI</b></div>
			</div>
		</div>
	</section>
</main>

<footer class="infometry-custom-footer" id="infometry-footer" aria-label="Infometry website footer">
	<div class="infometry-shell">
		<div class="infometry-footer-grid">
			<div class="infometry-footer-connect">
				<h2>Connect with us</h2>
				<a class="infometry-footer-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url( INFOMETRY_CT_URL . 'assets/images/infometry-logo-white.png' ); ?>" alt="Infometry Inc. — Enabling AI for Every Enterprise"></a>
				<p>Turning enterprise data into trusted insights, intelligent decisions and measurable business outcomes.</p>
				<div class="infometry-footer-social" aria-label="Infometry social profiles">
					<a href="https://www.facebook.com/infometryinc/" target="_blank" rel="noopener" aria-label="Infometry on Facebook"><img src="<?php echo esc_url( INFOMETRY_CT_URL . 'assets/images/social-facebook.png' ); ?>" alt=""></a>
					<a href="https://x.com/Infometryinc" target="_blank" rel="noopener" aria-label="Infometry on X"><img src="<?php echo esc_url( INFOMETRY_CT_URL . 'assets/images/social-x.png' ); ?>" alt=""></a>
					<a href="https://www.linkedin.com/company/infometry-inc" target="_blank" rel="noopener" aria-label="Infometry on LinkedIn"><img src="<?php echo esc_url( INFOMETRY_CT_URL . 'assets/images/social-linkedin.png' ); ?>" alt=""></a>
					<a href="https://www.youtube.com/channel/UCYYc9Fa7iPiVLDEiSvG7DmQ" target="_blank" rel="noopener" aria-label="Infometry on YouTube"><img src="<?php echo esc_url( INFOMETRY_CT_URL . 'assets/images/social-youtube.png' ); ?>" alt=""></a>
					<a href="https://in.pinterest.com/infometryincus/_saved/" target="_blank" rel="noopener" aria-label="Infometry on Pinterest"><img src="<?php echo esc_url( INFOMETRY_CT_URL . 'assets/images/social-pinterest.png' ); ?>" alt=""></a>
					<a href="https://www.instagram.com/infometry_inc/" target="_blank" rel="noopener" aria-label="Infometry on Instagram"><img src="<?php echo esc_url( INFOMETRY_CT_URL . 'assets/images/social-instagram.png' ); ?>" alt=""></a>
					<a href="https://www.g2.com/sellers/infometry-inc#profiles" target="_blank" rel="noopener" aria-label="Infometry on G2"><img src="<?php echo esc_url( INFOMETRY_CT_URL . 'assets/images/social-g2.png' ); ?>" alt=""></a>
				</div>
				<a class="infometry-footer-contact" href="<?php echo esc_url( $contact_url ); ?>">Contact Us <span aria-hidden="true">→</span></a>
			</div>
			<nav class="infometry-footer-column" aria-label="Footer products"><h3>Products</h3><a href="<?php echo esc_url( $conversa_url ); ?>">INFOFISCUS Conversa</a><a href="<?php echo esc_url( home_url( '/product/google-cloud-connectors/' ) ); ?>">Google (GCP) Connectors For Informatica IDMC</a><a href="<?php echo esc_url( home_url( '/product/global-cloud-connector/' ) ); ?>">Global Connectors For Informatica IDMC</a><a href="<?php echo esc_url( home_url( '/product/#infofiscus-snowflake-native-apps' ) ); ?>">INFOFISCUS Snowflake Native Apps</a><a href="<?php echo esc_url( home_url( '/product/#pre-built-apps' ) ); ?>">Pre-Built Apps For IDMC and Matillion</a><a href="<?php echo esc_url( $accelerators_url ); ?>">Accelerators</a></nav>
			<nav class="infometry-footer-column" aria-label="Footer resources"><h3>Resources</h3><a href="<?php echo esc_url( home_url( '/resources/blog/' ) ); ?>">Blog</a><a href="<?php echo esc_url( home_url( '/resources/infometry-case-studies/' ) ); ?>">Case Studies</a><a href="<?php echo esc_url( home_url( '/resources/gallery/' ) ); ?>">Gallery</a><a href="<?php echo esc_url( home_url( '/resources/webinar/' ) ); ?>">Webinar</a><a href="<?php echo esc_url( home_url( '/resources/press-releases/' ) ); ?>">Press Releases</a></nav>
			<nav class="infometry-footer-column" aria-label="Footer company"><h3>Company</h3><a href="<?php echo esc_url( $customers_url ); ?>">Customers – Partners</a><a href="<?php echo esc_url( home_url( '/company/careers/' ) ); ?>">Careers</a><a href="<?php echo esc_url( home_url( '/company/life-at-infometry/' ) ); ?>">Life@Infometry</a><a href="<?php echo esc_url( home_url( '/company/testimonials/' ) ); ?>">Testimonials</a></nav>
		</div>
		<div class="infometry-footer-bottom"><span>© 2026 Infometry Inc. All Rights Reserved.</span><span>Enabling AI for Every Enterprise</span></div>
	</div>
</footer>

<?php get_footer(); ?>
