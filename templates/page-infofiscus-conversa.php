<?php
/**
 * Template Name: INFOFISCUS Conversa Product
 * Template Post Type: page
 *
 * @package Infometry_Custom_Templates
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

$demo_url    = apply_filters( 'infometry_conversa_demo_url', home_url( '/infofiscus-analytics-sign-up-for-demo/' ) );
$contact_url = apply_filters( 'infometry_conversa_contact_url', home_url( '/contact-us/' ) );

$problems = array(
	array( 'icon' => 'gauge', 'title' => 'Dashboard Overload', 'copy' => 'Teams spend more time searching for reports than making decisions.' ),
	array( 'icon' => 'chart', 'title' => 'Slow Analytics', 'copy' => 'Waiting on analysts delays business-critical decisions.' ),
	array( 'icon' => 'bolt', 'title' => 'SQL Dependency', 'copy' => 'Business users rely on technical teams for every new question.' ),
	array( 'icon' => 'shield', 'title' => 'Inconsistent Metrics', 'copy' => 'Different reports produce different answers, reducing trust.' ),
);

$capabilities = array(
	array( 'icon' => 'chat', 'class' => 'is-natural-language', 'kicker' => 'Conversational Analytics', 'title' => 'Natural Language to SQL Engine', 'copy' => 'Turn business questions into optimized SQL using semantic context and live enterprise data.', 'benefits' => array( 'Understand business intent', 'Generate optimized SQL', 'Query live enterprise data' ), 'tags' => array( 'Natural Language', 'Live Data' ) ),
	array( 'icon' => 'brain', 'class' => 'is-ai-insights', 'kicker' => 'AI Intelligence', 'title' => 'Multi-Model AI Analytics', 'copy' => 'Use OpenAI, Claude, Gemini, and enterprise models across conversational analytics workloads.', 'benefits' => array( 'Choose the right AI model', 'Analyze complex questions', 'Deliver flexible insights' ), 'tags' => array( 'Multi-Model AI', 'Trusted Answers' ) ),
	array( 'icon' => 'chart', 'class' => 'is-connectivity', 'kicker' => 'Advanced Intelligence', 'title' => 'Advanced Analytics', 'copy' => 'Uncover trends, root causes, and business drivers beyond traditional dashboards and reports.', 'benefits' => array( 'Detect trends and anomalies', 'Explain root causes', 'Surface business drivers' ), 'tags' => array( 'Root Cause', 'Trend Analysis' ) ),
	array( 'icon' => 'spark', 'class' => 'is-governance', 'kicker' => 'Enterprise Knowledge', 'title' => 'AI Document Intelligence', 'copy' => 'Search PDFs, contracts, and documents to discover trusted enterprise knowledge instantly.', 'benefits' => array( 'Search enterprise documents', 'Find trusted knowledge', 'Summarize key information' ), 'tags' => array( 'Document AI', 'Enterprise Search' ) ),
	array( 'icon' => 'nodes', 'class' => 'is-visuals', 'kicker' => 'Trusted Data', 'title' => 'Semantic Layer for Trusted Data', 'copy' => 'Keep metrics consistent with semantic models, business definitions, and governed relationships.', 'benefits' => array( 'Standardize business metrics', 'Apply shared definitions', 'Deliver consistent answers' ), 'tags' => array( 'Semantic Models', 'Governed Metrics' ) ),
	array( 'icon' => 'lock', 'class' => 'is-sql', 'kicker' => 'Secure Analytics', 'title' => 'Security and Governance', 'copy' => 'Protect data with role-based access, encryption, audit trails, and secure warehouse connections.', 'benefits' => array( 'Enforce role-based access', 'Maintain audit trails', 'Secure warehouse access' ), 'tags' => array( 'Enterprise Security', 'Governance' ) ),
	array( 'icon' => 'monitor', 'class' => 'is-monitoring', 'kicker' => 'Native Experience', 'title' => 'Native Desktop Application', 'copy' => 'Access secure, high-performance conversational analytics on Windows and macOS.', 'benefits' => array( 'Use a native application', 'Work securely on desktop', 'Support Windows and macOS' ), 'tags' => array( 'Native Desktop', 'Secure Access' ) ),
	array( 'icon' => 'bolt', 'class' => 'is-automation', 'kicker' => 'Business Efficiency', 'title' => 'Cost Optimization & Faster Insights', 'copy' => 'Reduce reporting costs, remove bottlenecks, and accelerate decisions across teams.', 'benefits' => array( 'Reduce reporting effort', 'Remove analytics bottlenecks', 'Accelerate decisions' ), 'tags' => array( 'Cost Optimization', 'Faster Insights' ) ),
);

$steps = array(
	array( 'icon' => 'chat', 'title' => '1. Ask Naturally', 'copy' => 'Ask questions in everyday business language.' ),
	array( 'icon' => 'database', 'title' => '2. Understand Context', 'copy' => 'AI applies semantic models and business logic.' ),
	array( 'icon' => 'chart', 'title' => '3. Generate Trusted Insights', 'copy' => 'Analyze live data with AI-powered explanations.' ),
	array( 'icon' => 'check', 'title' => '4. Take Confident Action', 'copy' => 'Make faster decisions with trusted recommendations.' ),
);

$outcomes = array(
	array( 'icon' => 'bank', 'stat' => '3X', 'copy' => 'Faster time to insights' ),
	array( 'icon' => 'trend', 'stat' => '75%', 'copy' => 'Self-service analytics growth' ),
	array( 'icon' => 'path', 'stat' => '2X', 'copy' => 'Data team productivity boost' ),
	array( 'icon' => 'trust', 'stat' => '92%+', 'copy' => 'Trusted answers, happier users' ),
);

$personas = array(
	array( 'icon' => 'executive', 'class' => 'is-executive', 'title' => 'CIOs, CDOs & Executives', 'copy' => 'Scale governed AI access, track enterprise performance, and make faster strategic decisions.', 'benefits' => array( 'Govern enterprise AI', 'Monitor enterprise KPIs', 'Ensure security and compliance' ), 'tags' => array( 'AI Governance', 'Decision Intelligence' ) ),
	array( 'icon' => 'users', 'class' => 'is-business-user', 'title' => 'Business Users', 'copy' => 'Explore enterprise data naturally without SQL, dashboards, or technical support.', 'benefits' => array( 'Ask questions naturally', 'Get instant governed answers', 'Explore business insights' ), 'tags' => array( 'Self-Service Analytics', 'Natural Language AI' ) ),
	array( 'icon' => 'analyst', 'class' => 'is-data-analyst', 'title' => 'Data Analysts', 'copy' => 'Accelerate analysis with AI-generated SQL, transparent queries, and explainable insights.', 'benefits' => array( 'Review generated SQL', 'Investigate trends and anomalies', 'Build reusable analytics workflows' ), 'tags' => array( 'AI-Assisted Analytics', 'SQL Transparency' ) ),
	array( 'icon' => 'finance', 'class' => 'is-finance-team', 'title' => 'Finance Teams', 'copy' => 'Explain variances and improve planning with trusted, real-time financial insights.', 'benefits' => array( 'Analyze budget variances', 'Monitor financial performance', 'Improve forecasting accuracy' ), 'tags' => array( 'FP&A Analytics', 'Financial Planning' ) ),
	array( 'icon' => 'it', 'class' => 'is-it-data', 'title' => 'IT & Data Teams', 'copy' => 'Deliver governed analytics while maintaining data quality, permissions, and platform reliability.', 'benefits' => array( 'Manage secure data access', 'Govern metrics and semantic models', 'Enforce enterprise permissions' ), 'tags' => array( 'Data Governance', 'Enterprise Security' ) ),
);

$supported_llms = array(
	array( 'name' => 'OpenAI', 'file' => 'llm-openai.png' ),
	array( 'name' => 'Llama', 'file' => 'llm-llama.png' ),
	array( 'name' => 'Vertex AI', 'file' => 'llm-vertex-ai.png' ),
	array( 'name' => 'Gemini', 'file' => 'llm-gemini.png' ),
	array( 'name' => 'Claude', 'file' => 'llm-claude.png' ),
	array( 'name' => 'Mistral AI', 'file' => 'llm-mistral-ai.png' ),
);

$comparison_rows = array(
	array( 'capability' => 'Natural Language Query', 'conversa' => 'yes', 'tableau' => 'partial', 'powerbi' => 'partial', 'ai' => 'yes' ),
	array( 'capability' => 'Automated Insights', 'conversa' => 'yes', 'tableau' => 'no', 'powerbi' => 'no', 'ai' => 'partial' ),
	array( 'capability' => 'Root Cause Analysis', 'conversa' => 'yes', 'tableau' => 'no', 'powerbi' => 'no', 'ai' => 'yes' ),
	array( 'capability' => 'Predictive Analytics', 'conversa' => 'partial', 'tableau' => 'partial', 'powerbi' => 'no', 'ai' => 'yes' ),
	array( 'capability' => 'Semantic Layer', 'conversa' => 'yes', 'tableau' => 'no', 'powerbi' => 'partial', 'ai' => 'no' ),
	array( 'capability' => 'SQL Transparency', 'conversa' => 'yes', 'tableau' => 'no', 'powerbi' => 'no', 'ai' => 'partial' ),
	array( 'capability' => 'Multi Data Sources', 'conversa' => 'yes', 'tableau' => 'yes', 'powerbi' => 'yes', 'ai' => 'partial' ),
	array( 'capability' => 'Unstructured Data', 'conversa' => 'yes', 'tableau' => 'no', 'powerbi' => 'no', 'ai' => 'partial' ),
	array( 'capability' => 'Governance', 'conversa' => 'yes', 'tableau' => 'yes', 'powerbi' => 'yes', 'ai' => 'partial' ),
);

$customer_logos = array(
	array( 'name' => 'Sanofi', 'file' => 'customer-sanofi-logo.png' ),
	array( 'name' => 'Belk', 'file' => 'customer-belk-logo.png' ),
	array( 'name' => 'IBM', 'file' => 'customer-ibm-logo.png' ),
	array( 'name' => 'Informatica', 'file' => 'customer-informatica-logo.png' ),
	array( 'name' => 'Michaels', 'file' => 'customer-michaels-logo.png' ),
	array( 'name' => 'SanDisk', 'file' => 'customer-sandisk-logo.png' ),
	array( 'name' => 'Fusion.io', 'file' => 'customer-fusionio-logo.png' ),
	array( 'name' => 'Adaptive Insights', 'file' => 'customer-adaptive-insights-logo.png' ),
	array( 'name' => 'Asana', 'file' => 'customer-asana-logo.png' ),
);

$faqs = array(
	array( 'question' => 'What is a conversational analytics platform?', 'answer' => 'It is an AI-driven analytics system that lets users ask data questions in everyday language and immediately get governed answers without dashboards or manual SQL.' ),
	array( 'question' => 'How does a conversational analytics platform work?', 'answer' => 'It understands intent with natural language processing, maps the question to a governed semantic model, runs optimized queries on connected data, and returns charts, numbers, and plain-English summaries.' ),
	array( 'question' => 'Is Conversa secure?', 'answer' => 'Yes. Conversa is designed for enterprise security with role-based access, governed definitions, auditability, and query execution against approved enterprise data sources.' ),
	array( 'question' => 'What data sources does Conversa support?', 'answer' => 'Conversa can connect to modern cloud and hybrid data platforms including Snowflake, BigQuery, Redshift, Azure Synapse, Oracle, PostgreSQL, SQL Server, and similar structured data stores.' ),
	array( 'question' => 'Can conversational analytics handle complex business questions?', 'answer' => 'Yes. It can support multi-step, business-specific questions and follow-up analysis grounded in live enterprise data and semantic definitions.' ),
	array( 'question' => 'Does conversational analytics respect role-based access?', 'answer' => 'Yes. Users only see the data they are authorized to access, with permissions aligned to enterprise security policies.' ),
	array( 'question' => 'Can conversational analytics replace dashboards?', 'answer' => 'It complements dashboards. Dashboards remain useful for recurring monitoring, while Conversa helps users investigate new questions and explore data faster.' ),
	array( 'question' => 'What makes INFOFISCUS Conversa different?', 'answer' => 'Conversa combines natural language queries, direct warehouse access, semantic governance, SQL transparency, document intelligence, and business-friendly answers in one enterprise platform.' ),
);

$other_products = array(
	array( 'icon' => 'nodes', 'title' => 'Informatica Connectors', 'copy' => 'Pre-built, no-code connectors for fast, secure, and scalable data movement across enterprise systems.' ),
	array( 'icon' => 'database', 'title' => 'INFOFISCUS Snowflake Native Apps', 'copy' => 'Native Snowflake applications that accelerate analytics, integration, and operational reporting.' ),
	array( 'icon' => 'chart', 'title' => 'Pre-Built Analytics Apps', 'copy' => 'Ready-to-use analytics solutions for IDMC and Matillion that reduce implementation time.' ),
);
?>

<main class="infometry-conversa-product" id="infometry-conversa-product">
	<svg class="icp-icon-sprite" aria-hidden="true" focusable="false">
		<symbol id="icp-i-chat" viewBox="0 0 24 24"><path d="M5 4h14a3 3 0 0 1 3 3v7a3 3 0 0 1-3 3h-7l-5 4v-4H5a3 3 0 0 1-3-3V7a3 3 0 0 1 3-3Z"/><path d="M8 10.5h.01M12 10.5h.01M16 10.5h.01"/></symbol>
		<symbol id="icp-i-chart" viewBox="0 0 24 24"><path d="M4 19V5M4 19h16"/><path d="m7 15 4-4 3 3 5-7"/><path d="M18 7h1v5"/></symbol>
		<symbol id="icp-i-shield" viewBox="0 0 24 24"><path d="M12 2 4 5v6c0 5 3 9 8 11 5-2 8-6 8-11V5l-8-3Z"/><path d="m8 12 3 3 5-6"/></symbol>
		<symbol id="icp-i-brain" viewBox="0 0 24 24"><path d="M9 3a4 4 0 0 0-4 4v1a4 4 0 0 0 0 8v1a4 4 0 0 0 7 2.6A4 4 0 0 0 19 17v-1a4 4 0 0 0 0-8V7a4 4 0 0 0-7-2.6A4 4 0 0 0 9 3Z"/><path d="M12 4v16M7 8h3M14 9h3"/></symbol>
		<symbol id="icp-i-gauge" viewBox="0 0 24 24"><path d="M4 14a8 8 0 1 1 16 0"/><path d="m12 14 4-4"/><path d="M7 18h10"/></symbol>
		<symbol id="icp-i-bolt" viewBox="0 0 24 24"><path d="m13 2-9 12h7l-1 8 10-13h-7l0-7Z"/></symbol>
		<symbol id="icp-i-nodes" viewBox="0 0 24 24"><circle cx="6" cy="6" r="3"/><circle cx="18" cy="6" r="3"/><circle cx="12" cy="18" r="3"/><path d="M8.5 7.5 11 15M15.5 7.5 13 15"/></symbol>
		<symbol id="icp-i-lock" viewBox="0 0 24 24"><rect x="5" y="10" width="14" height="10" rx="2"/><path d="M8 10V7a4 4 0 0 1 8 0v3"/></symbol>
		<symbol id="icp-i-spark" viewBox="0 0 24 24"><path d="M12 2v6M12 16v6M4.9 4.9l4.2 4.2M14.9 14.9l4.2 4.2M2 12h6M16 12h6M4.9 19.1l4.2-4.2M14.9 9.1l4.2-4.2"/></symbol>
		<symbol id="icp-i-eye" viewBox="0 0 24 24"><path d="M2 12s4-7 10-7 10 7 10 7-4 7-10 7S2 12 2 12Z"/><circle cx="12" cy="12" r="3"/></symbol>
		<symbol id="icp-i-monitor" viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="13" rx="2"/><path d="M8 21h8M12 17v4"/></symbol>
		<symbol id="icp-i-api" viewBox="0 0 24 24"><path d="M8 9 5 12l3 3M16 9l3 3-3 3M13 5l-2 14"/></symbol>
		<symbol id="icp-i-database" viewBox="0 0 24 24"><ellipse cx="12" cy="5" rx="7" ry="3"/><path d="M5 5v6c0 1.7 3.1 3 7 3s7-1.3 7-3V5M5 11v6c0 1.7 3.1 3 7 3s7-1.3 7-3v-6"/></symbol>
		<symbol id="icp-i-check" viewBox="0 0 24 24"><circle cx="12" cy="12" r="9"/><path d="m8 12 3 3 5-6"/></symbol>
		<symbol id="icp-i-bank" viewBox="0 0 24 24"><path d="m3 10 9-6 9 6H3Z"/><path d="M5 10v8M9 10v8M15 10v8M19 10v8M3 18h18"/></symbol>
		<symbol id="icp-i-trend" viewBox="0 0 24 24"><path d="M4 19V5M4 19h16"/><path d="m7 15 4-4 3 3 5-7"/></symbol>
		<symbol id="icp-i-path" viewBox="0 0 24 24"><path d="M4 17c4 0 3-10 8-10s4 10 8 10"/><circle cx="4" cy="17" r="2"/><circle cx="12" cy="7" r="2"/><circle cx="20" cy="17" r="2"/></symbol>
		<symbol id="icp-i-trust" viewBox="0 0 24 24"><path d="M12 2 4 5v6c0 5 3 9 8 11 5-2 8-6 8-11V5l-8-3Z"/><path d="m8 12 3 3 5-6"/></symbol>
		<symbol id="icp-i-executive" viewBox="0 0 24 24"><path d="M4 19V5M4 19h16"/><path d="M8 16v-5M12 16V8M16 16v-8"/></symbol>
		<symbol id="icp-i-users" viewBox="0 0 24 24"><path d="M16 11a4 4 0 1 0-8 0"/><path d="M4 21a8 8 0 0 1 16 0"/><path d="M20 8a3 3 0 0 1 2 5M4 8a3 3 0 0 0-2 5"/></symbol>
		<symbol id="icp-i-analyst" viewBox="0 0 24 24"><path d="M5 19V5h14v14H5Z"/><path d="M8 15h2v2H8zM11 11h2v6h-2zM14 8h2v9h-2z"/></symbol>
		<symbol id="icp-i-finance" viewBox="0 0 24 24"><path d="M4 12h16M7 8h10M8 16h8"/><path d="m12 3 8 5H4l8-5Z"/></symbol>
		<symbol id="icp-i-it" viewBox="0 0 24 24"><path d="M12 3v4M12 17v4M4 12h4M16 12h4"/><circle cx="12" cy="12" r="5"/></symbol>
	</svg>

	<section class="icp-hero" aria-labelledby="icp-hero-title">
		<div class="icp-shell">
			<div class="icp-hero-grid">
				<div class="icp-hero-copy">
					<p class="icp-eyebrow">Conversation Analytics Platform for Enterprise</p>
					<h1 id="icp-hero-title">Ask Anything.<br>Get Insights.<br><span>Drive Results.</span></h1>
					<p class="icp-hero-text">INFOFISCUS Conversa gives every team instant, governed answers from enterprise data—no SQL, no dashboard bottlenecks.</p>
					<div class="icp-actions">
						<a class="icp-button icp-button-primary" href="<?php echo esc_url( $demo_url ); ?>">Request a Demo <span aria-hidden="true">→</span></a>
						<a class="icp-button icp-button-secondary" href="#icp-intro"><span class="icp-play-dot">▶</span> Watch Product Tour</a>
					</div>
					<div class="icp-hero-icons" aria-label="Conversa platform strengths">
						<span><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M4 5.5h16v10.5H9l-5 3.5z"></path><circle cx="9" cy="10.8" r=".8"></circle><circle cx="12" cy="10.8" r=".8"></circle><circle cx="15" cy="10.8" r=".8"></circle></svg><b>Natural<br>Language</b></span>
						<span><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 2v4M12 18v4M2 12h4M18 12h4M5 5l3 3M16 16l3 3M19 5l-3 3M8 16l-3 3"></path><circle cx="12" cy="12" r="3.5"></circle></svg><b>Instant<br>Insights</b></span>
						<span><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 2.8 19 6v5.2c0 4.5-2.8 8-7 10-4.2-2-7-5.5-7-10V6z"></path><path d="m8.7 11.7 2.1 2.1 4.5-4.6"></path></svg><b>Enterprise-Grade<br>Security</b></span>
						<span><svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="11" cy="13" r="7"></circle><circle cx="11" cy="13" r="3"></circle><path d="m15.8 8.2 4.7-4.7M16.5 3.5h4v4"></path></svg><b>Actionable<br>Recommendations</b></span>
					</div>
				</div>

				<div class="icp-hero-slider" data-icp-hero-slider aria-label="INFOFISCUS Conversa product preview carousel">
					<figure class="icp-hero-slide is-active"><img src="<?php echo esc_url( INFOMETRY_CT_URL . 'assets/images/conversa-home-1.png' ); ?>" alt="INFOFISCUS Conversa home dashboard"></figure>
					<figure class="icp-hero-slide"><img src="<?php echo esc_url( INFOMETRY_CT_URL . 'assets/images/conversa-storybooks-1.png' ); ?>" alt="INFOFISCUS Conversa storybooks dashboard"></figure>
					<figure class="icp-hero-slide"><img src="<?php echo esc_url( INFOMETRY_CT_URL . 'assets/images/conversa-connections-1.png' ); ?>" alt="INFOFISCUS Conversa connections dashboard"></figure>
				</div>

				<div class="icp-dashboard icp-dashboard-legacy" aria-hidden="true">
					<aside class="icp-dashboard-rail" aria-hidden="true">
						<span class="icp-rail-menu"></span>
						<span class="is-active"><svg><use href="#icp-i-analyst"></use></svg></span>
						<span><svg><use href="#icp-i-spark"></use></svg></span>
						<span><svg><use href="#icp-i-monitor"></use></svg></span>
						<span><svg><use href="#icp-i-eye"></use></svg></span>
						<span><svg><use href="#icp-i-gauge"></use></svg></span>
					</aside>
					<div class="icp-dashboard-stage">
						<div class="icp-dashboard-head">
							<img src="<?php echo esc_url( INFOMETRY_CT_URL . 'assets/images/infofiscus-conversa-logo.png' ); ?>" alt="INFOFISCUS Conversa">
							<span aria-hidden="true">...</span>
						</div>
						<div class="icp-chat-question">Why did revenue decline in the Western Region this quarter?</div>
						<div class="icp-ai-orb">AI</div>
						<div class="icp-answer-card">Revenue declined by 12% in the Western Region primarily due to stockouts in key products and lower repeat purchases.</div>
						<div class="icp-dashboard-cards">
							<article class="icp-revenue-card">
								<h3>Revenue Change</h3>
								<strong>-12%</strong>
								<span>vs Last Quarter</span>
								<div class="icp-revenue-line" aria-hidden="true">
									<svg viewBox="0 0 180 78" focusable="false">
										<path class="icp-chart-area" d="M8 62 L38 48 L68 54 L100 34 L132 42 L172 16 L172 72 L8 72 Z"></path>
										<path class="icp-chart-line" d="M8 62 L38 48 L68 54 L100 34 L132 42 L172 16"></path>
										<g class="icp-chart-points">
											<circle cx="8" cy="62" r="3"></circle>
											<circle cx="38" cy="48" r="3"></circle>
											<circle cx="68" cy="54" r="3"></circle>
											<circle cx="100" cy="34" r="3"></circle>
											<circle cx="132" cy="42" r="3"></circle>
											<circle cx="172" cy="16" r="3"></circle>
										</g>
									</svg>
								</div>
							</article>
							<article class="icp-impact-card">
								<h3>Impact by Category</h3>
								<div class="icp-impact-donut" aria-hidden="true"></div>
								<ul>
									<li><span></span>Stockouts <strong>48%</strong></li>
									<li><span></span>Repeat Purchases <strong>32%</strong></li>
									<li><span></span>Pricing <strong>20%</strong></li>
								</ul>
							</article>
							<article class="icp-recommend-card">
								<h3>Top Recommendations</h3>
								<ul>
									<li>Improve inventory availability</li>
									<li>Boost customer retention</li>
									<li>Optimize promotions</li>
								</ul>
							</article>
						</div>
						<div class="icp-dashboard-input"><span>Ask another question...</span><button type="button" aria-label="Send sample prompt">▶</button></div>
					</div>
					<div class="icp-dashboard-top">
						<strong>Conversa</strong>
						<div><span>Sales Overview</span><span>Filters</span></div>
					</div>
					<div class="icp-question-card">
						<label>Ask a question</label>
						<p>What was total revenue last quarter?</p>
						<button type="button" aria-label="Submit sample question">+</button>
					</div>
					<div class="icp-kpi-row">
						<article><span>Total Revenue</span><strong>$124.6M</strong><small>↑ 16.8%</small></article>
						<article><span>Total Orders</span><strong>18,732</strong><small>↑ 12.4%</small></article>
						<article><span>Avg Order Value</span><strong>$664</strong><small>↑ 6.2%</small></article>
					</div>
					<div class="icp-dash-grid">
						<article class="icp-sql-card"><span>Generated SQL</span><code>SELECT SUM(revenue)<br>FROM fact_sales<br>WHERE quarter = 'Q1-2024';</code><small>● Run</small></article>
						<article class="icp-line-card"><span>Revenue Over Time</span><div class="icp-line-chart"><i></i></div></article>
						<article class="icp-insight-card"><span>AI Insight</span><p>Total revenue in Q1-2024 was <strong>$124.6M</strong>, up <strong>16.8%</strong> vs Q4-2023.</p></article>
						<article class="icp-donut-card"><span>Revenue Over Channel</span><div class="icp-donut"></div></article>
						<article class="icp-bars-card"><span>Top Regions by Revenue</span><div class="icp-bars"><i></i><i></i><i></i><i></i></div></article>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="icp-hero-strip" aria-label="Enterprise outcomes and supported LLMs">
		<div class="icp-shell icp-hero-strip-inner">
			<div class="icp-strip-stats" aria-label="Enterprise outcomes">
				<?php foreach ( $outcomes as $outcome ) : ?>
					<div class="icp-strip-stat"><strong data-icp-count="<?php echo esc_attr( preg_replace( '/[^0-9.]/', '', $outcome['stat'] ) ); ?>" data-icp-suffix="<?php echo esc_attr( preg_replace( '/[0-9.]/', '', $outcome['stat'] ) ); ?>"><?php echo esc_html( $outcome['stat'] ); ?></strong><span><?php echo esc_html( $outcome['copy'] ); ?></span></div>
				<?php endforeach; ?>
			</div>
			<div class="icp-llm-panel"><span class="icp-strip-heading">LLMs Supported</span><div class="icp-llm-list" aria-label="Supported large language models">
				<?php foreach ( $supported_llms as $llm ) : ?><span><img src="<?php echo esc_url( INFOMETRY_CT_URL . 'assets/images/' . $llm['file'] ); ?>" alt="<?php echo esc_attr( $llm['name'] ); ?> logo"></span><?php endforeach; ?>
				<?php foreach ( $supported_llms as $llm ) : ?><span aria-hidden="true"><img src="<?php echo esc_url( INFOMETRY_CT_URL . 'assets/images/' . $llm['file'] ); ?>" alt=""></span><?php endforeach; ?>
			</div></div>
		</div>
	</section>

	<section class="icp-intro" id="icp-intro" aria-labelledby="icp-intro-title">
		<div class="icp-shell icp-intro-grid">
			<div class="icp-intro-showcase-head"><p class="icp-kicker">Enterprise AI. Trusted Insights.</p><h2 id="icp-intro-title">Ask Questions. Find Root Causes. Act Faster.</h2><p>Conversa combines conversational AI, semantic understanding, and enterprise governance to deliver trusted insights, KPI explanations, root causes, and recommendations from your cloud data warehouse.</p></div>
			<div class="icp-intro-video-frame icp-architecture-frame">
				<div class="icp-intro-video-bar"><span><i></i><i></i><i></i></span><strong>Conversa Intelligence Architecture</strong><small>Governed analytics</small></div>
				<div class="icp-architecture" aria-label="INFOFISCUS Conversa architecture from governed context to trusted answer">
					<div class="icp-architecture-query"><span class="icp-query-brand-mark"><img src="<?php echo esc_url( INFOMETRY_CT_URL . 'assets/images/infometry-mark-white.png' ); ?>" alt="" aria-hidden="true"></span><span>Why did customer engagement drop last week?</span></div>
					<div class="icp-architecture-grid">
						<div class="icp-architecture-sources">
							<small>Governed context</small>
							<span>Data dictionary</span><span>Semantic definitions</span><span>Business rules</span><span>Metric definitions</span><span>Decision history</span><span>Table descriptions</span>
						</div>
						<div class="icp-architecture-engine">
							<div class="icp-engine-orb"><svg><use href="#icp-i-nodes"></use></svg></div>
							<strong>Conversa Intelligence Engine</strong>
							<small>Business Ontology + Context + LLM/SLM + Governance = Accuracy</small>
						</div>
						<div class="icp-architecture-flow">
							<article><b>1</b><span>Query received</span></article>
							<article><b>2</b><span>Interpret intent and resolve entities</span></article>
							<article><b>3</b><span>Apply semantic and business context</span></article>
							<article><b>4</b><span>Generate governed SQL and analysis</span></article>
							<article class="is-answer"><b>5</b><span>Deliver a trusted answer</span><i></i></article>
						</div>
					</div>
				</div>
			</div>
			<div class="icp-intro-value-row"><article><span><svg><use href="#icp-i-chat"></use></svg></span><div><strong>Natural Language</strong><small>Ask business questions naturally without SQL.</small></div></article><article><span><svg><use href="#icp-i-trust"></use></svg></span><div><strong>Semantic Answers</strong><small>Get consistent answers from governed metrics.</small></div></article><article><span><svg><use href="#icp-i-trend"></use></svg></span><div><strong>Decision Intelligence</strong><small>Understand trends, drivers, and next actions.</small></div></article></div>
		</div>
	</section>

	<section class="icp-problem" aria-labelledby="icp-problem-title">
		<div class="icp-shell">
			<div class="icp-section-heading icp-center">
				<h2 id="icp-problem-title">Why Traditional Business Intelligence Slows Decisions</h2>
				<p>Dashboards, SQL, and manual reporting prevent teams from getting timely answers.</p>
			</div>
			<div class="icp-card-grid icp-four">
				<?php foreach ( $problems as $problem ) : ?>
					<article class="icp-soft-card">
						<span class="icp-icon"><svg><use href="#icp-i-<?php echo esc_attr( $problem['icon'] ); ?>"></use></svg></span>
						<h3><?php echo esc_html( $problem['title'] ); ?></h3>
						<p><?php echo esc_html( $problem['copy'] ); ?></p>
					</article>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<section class="icp-capabilities" id="icp-capabilities" aria-labelledby="icp-capabilities-title">
		<div class="icp-shell">
			<div class="icp-section-heading icp-center">
				<h2 id="icp-capabilities-title">INFOFISCUS Conversa Platform Capabilities</h2>
				<p>Enterprise conversational analytics built for trusted, secure, and faster decisions.</p>
			</div>
			<div class="icp-capability-carousel" aria-label="Platform capabilities carousel">
				<div class="icp-card-grid icp-capability-grid">
					<?php foreach ( $capabilities as $capability ) : ?>
						<article class="icp-feature-card <?php echo esc_attr( $capability['class'] ); ?>">
							<span class="icp-icon"><svg><use href="#icp-i-<?php echo esc_attr( $capability['icon'] ); ?>"></use></svg></span>
							<span class="icp-feature-kicker"><?php echo esc_html( $capability['kicker'] ); ?></span>
							<h3><?php echo esc_html( $capability['title'] ); ?></h3>
							<p><?php echo esc_html( $capability['copy'] ); ?></p>
							<ul class="icp-feature-benefits"><?php foreach ( $capability['benefits'] as $benefit ) : ?><li><?php echo esc_html( $benefit ); ?></li><?php endforeach; ?></ul>
							<div class="icp-feature-tags"><?php foreach ( $capability['tags'] as $tag ) : ?><span><?php echo esc_html( $tag ); ?></span><?php endforeach; ?></div>
						</article>
					<?php endforeach; ?>
					<?php foreach ( $capabilities as $capability ) : ?>
						<article class="icp-feature-card <?php echo esc_attr( $capability['class'] ); ?>" aria-hidden="true">
							<span class="icp-icon"><svg><use href="#icp-i-<?php echo esc_attr( $capability['icon'] ); ?>"></use></svg></span>
							<span class="icp-feature-kicker"><?php echo esc_html( $capability['kicker'] ); ?></span>
							<h3><?php echo esc_html( $capability['title'] ); ?></h3>
							<p><?php echo esc_html( $capability['copy'] ); ?></p>
							<ul class="icp-feature-benefits"><?php foreach ( $capability['benefits'] as $benefit ) : ?><li><?php echo esc_html( $benefit ); ?></li><?php endforeach; ?></ul>
							<div class="icp-feature-tags"><?php foreach ( $capability['tags'] as $tag ) : ?><span><?php echo esc_html( $tag ); ?></span><?php endforeach; ?></div>
						</article>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</section>

	<section class="icp-workflow" id="icp-workflow" aria-labelledby="icp-workflow-title">
		<div class="icp-shell">
			<h2 id="icp-workflow-title">How Enterprise Conversational Analytics Works</h2>
			<div class="icp-workflow-row">
				<?php foreach ( $steps as $step ) : ?>
					<article>
						<span class="icp-step-icon"><svg><use href="#icp-i-<?php echo esc_attr( $step['icon'] ); ?>"></use></svg></span>
						<h3><?php echo esc_html( $step['title'] ); ?></h3>
						<p><?php echo esc_html( $step['copy'] ); ?></p>
					</article>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<section class="icp-outcome-journey" aria-labelledby="icp-outcome-journey-title">
		<div class="icp-shell">
			<div class="icp-journey-heading">
				<span>Enterprise transformation</span>
				<h2 id="icp-outcome-journey-title">The shift Conversa creates.</h2>
				<p>See how everyday analytics changes when trusted intelligence becomes accessible to every team.</p>
			</div>
			<div class="icp-shift-board">
				<div class="icp-shift-labels"><span>Before Conversa</span><span>Transformation</span><span>With Conversa</span></div>
				<div class="icp-shift-row"><article class="icp-shift-problem"><span><svg><use href="#icp-i-monitor"></use></svg></span><div><small>Before Conversa</small><h3>Data Silos</h3><p>Information stays fragmented across systems and teams.</p></div></article><div class="icp-shift-flow" aria-hidden="true"><i></i><b>→</b></div><article class="icp-shift-result"><span><svg><use href="#icp-i-chat"></use></svg></span><div><small>With Conversa</small><h3>Unified Enterprise Intelligence</h3><p>Access trusted insights across connected enterprise data.</p></div></article></div>
				<div class="icp-shift-row"><article class="icp-shift-problem"><span><svg><use href="#icp-i-path"></use></svg></span><div><small>Before Conversa</small><h3>Reactive Reporting</h3><p>Teams wait for reports after problems occur.</p></div></article><div class="icp-shift-flow" aria-hidden="true"><i></i><b>→</b></div><article class="icp-shift-result"><span><svg><use href="#icp-i-eye"></use></svg></span><div><small>With Conversa</small><h3>Proactive Intelligence</h3><p>Detect trends, risks, and opportunities before impact.</p></div></article></div>
				<div class="icp-shift-row"><article class="icp-shift-problem"><span><svg><use href="#icp-i-database"></use></svg></span><div><small>Before Conversa</small><h3>Knowledge Bottlenecks</h3><p>Business knowledge stays trapped with specialists.</p></div></article><div class="icp-shift-flow" aria-hidden="true"><i></i><b>→</b></div><article class="icp-shift-result"><span><svg><use href="#icp-i-users"></use></svg></span><div><small>With Conversa</small><h3>Self-Service Analytics</h3><p>Everyone can explore trusted enterprise insights.</p></div></article></div>
				<div class="icp-shift-row"><article class="icp-shift-problem"><span><svg><use href="#icp-i-gauge"></use></svg></span><div><small>Before Conversa</small><h3>Disconnected Decisions</h3><p>Teams rely on inconsistent reports and assumptions.</p></div></article><div class="icp-shift-flow" aria-hidden="true"><i></i><b>→</b></div><article class="icp-shift-result"><span><svg><use href="#icp-i-trust"></use></svg></span><div><small>With Conversa</small><h3>Business Alignment</h3><p>Shared metrics create organization-wide consistency.</p></div></article></div>
			</div>
		</div>
	</section>

	<section class="icp-use-cases" id="icp-use-cases" aria-labelledby="icp-use-cases-title">
		<div class="icp-shell">
			<div class="icp-section-heading icp-center">
				<h2 id="icp-use-cases-title">Industry Use Cases</h2>
			</div>
			<div class="icp-use-case-panel" data-icp-use-cases>
				<div class="icp-tabs" aria-label="Industry tabs">
					<button class="is-active" type="button" data-icp-use-tab="finance">Finance</button>
					<button type="button" data-icp-use-tab="sales">Sales</button>
					<button type="button" data-icp-use-tab="operations">Operations</button>
					<button type="button" data-icp-use-tab="marketing">Marketing</button>
					<button type="button" data-icp-use-tab="hr">HR</button>
				</div>
				<div class="icp-use-panel is-active" data-icp-use-panel="finance">
					<div class="icp-finance-copy">
						<span class="icp-use-icon"><svg><use href="#icp-i-bank"></use></svg></span>
						<h3>Finance</h3>
						<p>Analyze profitability, cash flow, and forecasts with trusted conversational insights.</p>
						<ul><li>Profitability and cash flow</li><li>Budget variance insights</li><li>Forecasting and KPI monitoring</li></ul>
					</div>
					<div class="icp-finance-chart"><h4>Net Profit Trend</h4><div class="icp-chart-card-line" data-chart="finance"></div></div>
					<div class="icp-finance-kpis"><article><span>Gross Margin</span><strong>31.6%</strong><small>Up 4.2% vs Prior Period</small></article><article><span>EBITDA</span><strong>$34.2M</strong><small>Up 12.7% vs Prior Period</small></article></div>
				</div>
				<div class="icp-use-panel" data-icp-use-panel="sales">
					<div class="icp-finance-copy">
						<span class="icp-use-icon"><svg><use href="#icp-i-chart"></use></svg></span>
						<h3>Sales</h3>
						<p>Analyze pipeline performance, revenue trends, and quota attainment in real time.</p>
						<ul><li>Pipeline health and win-rate trends</li><li>Revenue by region and sales channel</li><li>Account risk and next-best actions</li></ul>
					</div>
					<div class="icp-finance-chart"><h4>Pipeline Conversion</h4><div class="icp-chart-card-line" data-chart="sales"></div></div>
					<div class="icp-finance-kpis"><article><span>Win Rate</span><strong>42.8%</strong><small>Up 8.4% vs Prior Period</small></article><article><span>Pipeline</span><strong>$18.7M</strong><small>Up 15.1% vs Prior Period</small></article></div>
				</div>
				<div class="icp-use-panel" data-icp-use-panel="operations">
					<div class="icp-finance-copy">
						<span class="icp-use-icon"><svg><use href="#icp-i-nodes"></use></svg></span>
						<h3>Operations</h3>
						<p>Monitor production, inventory, and supply chain performance to improve efficiency.</p>
						<ul><li>Inventory and fulfillment insights</li><li>Capacity and utilization analysis</li><li>Exception monitoring and alerts</li></ul>
					</div>
					<div class="icp-finance-chart"><h4>Fulfillment Efficiency</h4><div class="icp-chart-card-line" data-chart="operations"></div></div>
					<div class="icp-finance-kpis"><article><span>Cycle Time</span><strong>18%</strong><small>Improvement this quarter</small></article><article><span>On-Time SLA</span><strong>96.4%</strong><small>Up 5.8% vs Prior Period</small></article></div>
				</div>
				<div class="icp-use-panel" data-icp-use-panel="marketing">
					<div class="icp-finance-copy">
						<span class="icp-use-icon"><svg><use href="#icp-i-spark"></use></svg></span>
						<h3>Marketing</h3>
						<p>Measure campaign performance, engagement, and ROI to optimize marketing investment.</p>
						<ul><li>Campaign performance and ROI</li><li>Lead conversion and attribution</li><li>Audience and channel analytics</li></ul>
					</div>
					<div class="icp-finance-chart"><h4>Campaign ROI</h4><div class="icp-chart-card-line" data-chart="marketing"></div></div>
					<div class="icp-finance-kpis"><article><span>MQL Growth</span><strong>28%</strong><small>Up 9.6% vs Prior Period</small></article><article><span>ROAS</span><strong>4.3X</strong><small>Up 13.2% vs Prior Period</small></article></div>
				</div>
				<div class="icp-use-panel" data-icp-use-panel="hr">
					<div class="icp-finance-copy">
						<span class="icp-use-icon"><svg><use href="#icp-i-users"></use></svg></span>
						<h3>Human Resources</h3>
						<p>Analyze workforce trends, hiring performance, and employee engagement.</p>
						<ul><li>Hiring and time-to-fill analytics</li><li>Attrition and engagement insights</li><li>Workforce planning and skills gaps</li></ul>
					</div>
					<div class="icp-finance-chart"><h4>Hiring Velocity</h4><div class="icp-chart-card-line" data-chart="hr"></div></div>
					<div class="icp-finance-kpis"><article><span>Time to Fill</span><strong>22%</strong><small>Faster than prior period</small></article><article><span>Retention</span><strong>91.8%</strong><small>Up 3.4% vs Prior Period</small></article></div>
				</div>
			</div>
		</div>
	</section>

	<section class="icp-personas" id="icp-personas" aria-labelledby="icp-personas-title">
		<div class="icp-shell">
			<div class="icp-section-heading icp-center">
				<span class="icp-persona-eyebrow">Built for Every Role</span>
				<h2 id="icp-personas-title">Empowering Every Team with Trusted Analytics</h2>
				<p>Role-ready insights, governed answers, and faster decisions across your enterprise.</p>
			</div>
			<div class="icp-card-grid icp-persona-grid">
				<?php foreach ( $personas as $persona ) : ?>
					<article class="icp-persona-card <?php echo esc_attr( $persona['class'] ); ?>">
						<span class="icp-icon"><svg><use href="#icp-i-<?php echo esc_attr( $persona['icon'] ); ?>"></use></svg></span>
						<h3><?php echo esc_html( $persona['title'] ); ?></h3>
						<p><?php echo esc_html( $persona['copy'] ); ?></p>
						<ul class="icp-persona-benefits"><?php foreach ( $persona['benefits'] as $benefit ) : ?><li><?php echo esc_html( $benefit ); ?></li><?php endforeach; ?></ul>
						<div class="icp-persona-tags"><?php foreach ( $persona['tags'] as $tag ) : ?><span><?php echo esc_html( $tag ); ?></span><?php endforeach; ?></div>
					</article>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<section class="icp-comparison" id="icp-comparison" aria-labelledby="icp-comparison-title">
		<div class="icp-shell">
			<div class="icp-section-heading icp-center">
				<h2 id="icp-comparison-title">INFOFISCUS Conversa vs Other Conversational Analytics Platforms</h2>
				<p>See how enterprise conversational analytics compares across the capabilities teams ask for most.</p>
			</div>
			<div class="icp-comparison-table-wrap">
				<table class="icp-comparison-table">
					<thead>
						<tr>
							<th scope="col">Capabilities</th>
							<th scope="col"><span><img src="<?php echo esc_url( INFOMETRY_CT_URL . 'assets/images/infofiscus-conversa-table-logo.png' ); ?>" alt="INFOFISCUS Conversa"></span></th>
							<th scope="col">Tableau</th>
							<th scope="col">Power BI</th>
							<th scope="col">Modern AI Tools</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ( $comparison_rows as $row ) : ?>
							<tr>
								<th scope="row"><?php echo esc_html( $row['capability'] ); ?></th>
								<?php foreach ( array( 'conversa', 'tableau', 'powerbi', 'ai' ) as $column ) : ?>
									<?php
									$status       = $row[ $column ];
									$status_label = 'yes' === $status ? 'Included' : ( 'partial' === $status ? 'Partial' : 'Not included' );
									$status_text  = 'yes' === $status ? 'Full Support' : ( 'partial' === $status ? 'Partial' : 'Not Supported' );
									?>
									<td><span class="icp-status icp-status-<?php echo esc_attr( $status ); ?>" aria-label="<?php echo esc_attr( $status_label ); ?>"><?php echo esc_html( $status_text ); ?></span></td>
								<?php endforeach; ?>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
			<div class="icp-section-action">
				<a class="icp-button icp-button-primary" href="<?php echo esc_url( $demo_url ); ?>">Book a Demo</a>
			</div>
		</div>
	</section>

	<section class="icp-demo-form-section" id="icp-demo-form" aria-labelledby="icp-demo-form-title">
		<div class="icp-shell">
			<div class="icp-section-heading icp-center">
				<h2 id="icp-demo-form-title">Experience INFOFISCUS Conversa.</h2>
				<p><strong>Turn every business question into a confident decision.</strong></p>
				<p>Book a personalized demo and see governed conversational analytics working with your enterprise data.</p>
			</div>
			<div class="icp-demo-form-grid">
				<div class="icp-demo-visual">
					<div class="icp-demo-card">
						<span>See How We Can Work for You</span>
						<button class="icp-demo-schedule-trigger" type="button" data-icp-demo-trigger>Schedule Your Demo</button>
						<div class="icp-demo-calendar" data-icp-demo-calendar>
							<div class="icp-demo-calendar-head">
								<button class="icp-demo-calendar-nav" type="button" data-icp-calendar-prev aria-label="Previous month">&lt;</button>
								<strong data-icp-calendar-label>Choose a Date</strong>
								<button class="icp-demo-calendar-nav" type="button" data-icp-calendar-next aria-label="Next month">&gt;</button>
							</div>
							<div class="icp-demo-weekdays" aria-hidden="true">
								<i>Sun</i><i>Mon</i><i>Tue</i><i>Wed</i><i>Thu</i><i>Fri</i><i>Sat</i>
							</div>
							<div class="icp-demo-days" data-icp-calendar-days></div>
							<p class="icp-demo-selected-date" data-icp-selected-date aria-live="polite"></p>
						</div>
					</div>
				</div>
				<div class="icp-demo-form-host" data-icp-wpforms-host>
					<?php if ( shortcode_exists( 'wpforms' ) ) : ?>
						<?php
						echo do_shortcode(
							sprintf(
								'[wpforms id="%d" title="false" description="false" ajax="true"]',
								absint( INFOMETRY_CT_CONVERSA_FORM_ID )
							)
						); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
						?>
					<?php else : ?>
						<div class="icp-demo-form icp-demo-form-fallback">
							<div class="icp-demo-form-head">
								<strong>Request your personalized demo</strong>
								<p>Share your details and our analytics team will connect with you.</p>
							</div>
							<p>The request form is temporarily unavailable.</p>
							<a class="icp-button icp-button-primary" href="<?php echo esc_url( $contact_url ); ?>">Contact Us</a>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</section>

	<section class="icp-customers" aria-labelledby="icp-customers-title">
		<div class="icp-shell">
			<div class="icp-section-heading icp-center">
				<h2 id="icp-customers-title">Infometry Trusted by 150+ Customers Worldwide</h2>
			</div>
			<div class="icp-logo-slider" aria-label="Customer logos">
				<div class="icp-logo-track">
					<?php for ( $i = 0; $i < 2; $i++ ) : ?>
						<?php foreach ( $customer_logos as $customer ) : ?>
							<span class="icp-logo-slide">
								<?php
								$customer_logo_path = INFOMETRY_CT_PATH . 'assets/images/' . $customer['file'];
								$customer_logo_ver  = is_readable( $customer_logo_path ) ? (string) filemtime( $customer_logo_path ) : INFOMETRY_CT_VERSION;
								?>
								<img src="<?php echo esc_url( INFOMETRY_CT_URL . 'assets/images/' . $customer['file'] . '?v=' . $customer_logo_ver ); ?>" alt="<?php echo esc_attr( $customer['name'] ); ?> logo">
							</span>
						<?php endforeach; ?>
					<?php endfor; ?>
				</div>
			</div>
		</div>
	</section>

	<section class="icp-faq" id="icp-faq" aria-labelledby="icp-faq-title">
		<div class="icp-shell">
			<div class="icp-section-heading icp-center">
				<h2 id="icp-faq-title">Frequently Asked Questions</h2>
			</div>
			<div class="icp-faq-list">
				<?php foreach ( $faqs as $index => $faq ) : ?>
					<details <?php echo 0 === $index ? 'open' : ''; ?>>
						<summary><?php echo esc_html( $faq['question'] ); ?></summary>
						<p><?php echo esc_html( $faq['answer'] ); ?></p>
					</details>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<section class="icp-other-products" aria-labelledby="icp-other-products-title">
		<div class="icp-shell">
			<div class="icp-section-heading icp-center">
				<h2 id="icp-other-products-title">Other Products</h2>
			</div>
			<div class="icp-card-grid icp-other-grid">
				<?php foreach ( $other_products as $product ) : ?>
					<article class="icp-feature-card">
						<span class="icp-icon"><svg><use href="#icp-i-<?php echo esc_attr( $product['icon'] ); ?>"></use></svg></span>
						<h3><?php echo esc_html( $product['title'] ); ?></h3>
						<p><?php echo esc_html( $product['copy'] ); ?></p>
						<a class="icp-text-link" href="<?php echo esc_url( $contact_url ); ?>">Read More</a>
					</article>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<section class="icp-final-cta" aria-labelledby="icp-final-title">
		<div class="icp-shell icp-final-panel">
			<span class="icp-rocket"><svg><use href="#icp-i-spark"></use></svg></span>
			<div>
				<h2 id="icp-final-title">Turn questions into better business outcomes.</h2>
				<p>Experience the power of conversational analytics.</p>
			</div>
			<a class="icp-button icp-button-primary" href="<?php echo esc_url( $demo_url ); ?>">Request a Live Demo</a>
			<a class="icp-button icp-button-secondary" href="<?php echo esc_url( $contact_url ); ?>">Talk to an Expert</a>
		</div>
	</section>

	<section class="icp-product-footer" id="icp-footer" aria-label="INFOFISCUS Conversa page footer">
		<div class="icp-shell icp-footer-grid">
			<div class="icp-footer-connect">
				<h3>Connect with us</h3>
				<img src="<?php echo esc_url( INFOMETRY_CT_URL . 'assets/images/infometry-logo-white.png' ); ?>" alt="Infometry Inc.">
				<p>Turning enterprise data into trusted insights, intelligent decisions and measurable business outcomes.</p>
				<div class="icp-social-row" aria-label="Infometry social links">
					<a class="icp-social" href="#" aria-label="Facebook"><img src="<?php echo esc_url( INFOMETRY_CT_URL . 'assets/images/social-facebook.png' ); ?>" alt=""></a>
					<a class="icp-social" href="#" aria-label="X"><img src="<?php echo esc_url( INFOMETRY_CT_URL . 'assets/images/social-x.png' ); ?>" alt=""></a>
					<a class="icp-social" href="#" aria-label="LinkedIn"><img src="<?php echo esc_url( INFOMETRY_CT_URL . 'assets/images/social-linkedin.png' ); ?>" alt=""></a>
					<a class="icp-social" href="#" aria-label="YouTube"><img src="<?php echo esc_url( INFOMETRY_CT_URL . 'assets/images/social-youtube.png' ); ?>" alt=""></a>
					<a class="icp-social" href="#" aria-label="Pinterest"><img src="<?php echo esc_url( INFOMETRY_CT_URL . 'assets/images/social-pinterest.png' ); ?>" alt=""></a>
					<a class="icp-social" href="#" aria-label="Instagram"><img src="<?php echo esc_url( INFOMETRY_CT_URL . 'assets/images/social-instagram.png' ); ?>" alt=""></a>
					<a class="icp-social" href="#" aria-label="G2"><img src="<?php echo esc_url( INFOMETRY_CT_URL . 'assets/images/social-g2.png' ); ?>" alt=""></a>
				</div>
				<a class="icp-footer-contact" href="<?php echo esc_url( $contact_url ); ?>">Contact Us <span>→</span></a>
			</div>
			<div class="icp-footer-links">
				<h3>Products</h3>
				<a href="#icp-hero-title">INFOFISCUS Conversa</a>
				<a href="#">Google (GCP) Connectors For Informatica IDMC</a>
				<a href="#">Global Connectors For Informatica IDMC</a>
				<a href="#">INFOFISCUS Snowflake Native Apps</a>
				<a href="#">Pre-Built Apps For IDMC and Matillion</a>
				<a href="#">Accelerators</a>
			</div>
			<div class="icp-footer-links">
				<h3>Resources</h3>
				<a href="#">Blog</a>
				<a href="#">Case Studies</a>
				<a href="#">Whitepapers</a>
				<a href="#">Gallery</a>
				<a href="#">Webinar</a>
				<a href="#">Press Releases</a>
			</div>
			<div class="icp-footer-links">
				<h3>Company</h3>
				<a href="#">Customers - Partners</a>
				<a href="#">Careers</a>
				<a href="mailto:Life@Infometry">Life@Infometry</a>
				<a href="#">Testimonials</a>
			</div>
		</div>
		<div class="icp-shell icp-footer-bottom">
			<p>© 2026 Infometry Inc. All Rights Reserved.</p>
			<p>Enabling AI for Every Enterprise</p>
		</div>
	</section>

	<section class="icp-product-footer-legacy" aria-hidden="true">
		<div class="icp-shell icp-footer-grid">
			<div><strong>Infometry.</strong><p>Infometry helps enterprises transform data into decisions with AI-powered analytics platforms.</p></div>
			<div><h3>Platform</h3><a href="#icp-capabilities">Overview</a><a href="#icp-capabilities">Capabilities</a><a href="#icp-workflow">Security</a></div>
			<div><h3>Solutions</h3><a href="#icp-use-cases">By Function</a><a href="#icp-use-cases">By Industry</a><a href="#icp-personas">Use Cases</a></div>
			<div><h3>Resources</h3><a href="#">Docs & Guides</a><a href="#">Blog</a><a href="#">Webinars</a></div>
			<div><h3>Stay updated</h3><p>Get the latest product updates and insights.</p><form><input type="email" placeholder="Enter your email" aria-label="Email address"><button type="button">→</button></form></div>
		</div>
	</section>
</main>

<?php
get_footer();
