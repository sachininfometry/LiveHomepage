<?php
/**
 * Template Name: Conversa Slack Integration Press Release
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
$spr_img_url      = $img_url . 'press-releases/conversa-slack/';

$spr_quote    = 'With the INFOFISCUS Conversa Slack integration, we’re bringing enterprise decision intelligence directly into the flow of work. Teams can move beyond raw numbers to understand business performance through executive summaries, interactive visualizations, and auditable SQL—all within the collaboration environment they already use. Our goal is to make enterprise data more accessible while maintaining the transparency and governance organizations need to make confident, data-driven decisions.';
$spr_quote_by = 'Nag Dinamani, CEO & Founder at Infometry Inc.';

$highlights = array(
	array( 'spr-chat', 'is-violet', 'Natural Language Analytics in Slack', 'Ask business questions directly in Slack' ),
	array( 'spr-bars', 'is-blue', 'Executive Summaries & KPIs', 'Get instant, executive-ready insights and key metrics' ),
	array( 'spr-chart', 'is-cyan', 'Interactive Visualizations', 'Switch between Bar, Line, Area and Pie charts in one click' ),
	array( 'spr-doc', 'is-orange', 'Auditable SQL & Data Tables', 'View exact data with generated SQL and tabular results' ),
);

$features = array(
	array( 'spr-bars', 'is-orange', 'Executive Summaries and Key Metrics', 'Surface important findings and business indicators in an easy-to-scan format.' ),
	array( 'spr-pie', 'is-blue', 'Interactive Visualizations', 'Switch between bar, line, area, and pie charts directly within Slack, without re-executing the query.' ),
	array( 'spr-table', 'is-sky', 'Structured Data Tables', 'Review the numerical results behind an analytical response.' ),
	array( 'spr-code', 'is-violet', 'Auditable SQL', 'Inspect the SQL query used to produce results, helping technical teams verify the underlying calculations.' ),
	array( 'spr-chat', 'is-green', 'Suggested Follow-up Questions', 'Continue exploring comparisons, regional contributions, product performance, and other related questions.' ),
);

$security = array(
	'Slack Socket Mode (Secure WebSockets)',
	'No inbound firewall ports',
	'No public IP exposure',
	'Enterprise-grade security (SOC-2 ready)',
	'Modular integration framework',
);

$steps = array(
	array( 'spr-chat', 'Ask a Question', 'Mention @Conversa in any Slack channel or DM with your business question.' ),
	array( 'spr-spark', 'Get Instant Insights', 'Receive executive summaries, KPI cards and interactive charts within Slack.' ),
	array( 'spr-db', 'Explore & Verify', 'View detailed data tables, generated SQL and suggested follow-up questions.' ),
);

$summary = 'For Q3 2026, combining actuals through August with the latest forecast for September, the top three products are projected to generate $121.4M in total revenue. The Cloud Platform is the dominant revenue source, contributing $57.7M, which represents 47.5% of the total.';
?>

<main class="spr-page" id="spr-main">
<?php
if ( function_exists( 'infometry_ct_print_image_schema' ) ) {
	infometry_ct_print_image_schema(
		array(
			array( 'press-releases/conversa-slack/slack-logo-white.svg', 'Slack logo', 'Slack logo.' ),
			array( 'press-releases/conversa-slack/infofiscus-conversa-logo-white.png', 'INFOFISCUS Conversa logo', 'INFOFISCUS Conversa enterprise decision intelligence logo.' ),
		)
	);
}
if ( function_exists( 'infometry_ct_print_press_release_schema' ) ) {
	infometry_ct_print_press_release_schema();
}
?>
	<svg class="spr-sprite" aria-hidden="true" focusable="false">
		<symbol id="spr-chat" viewBox="0 0 24 24"><path d="M4 4.5h16a1.5 1.5 0 0 1 1.5 1.5v10a1.5 1.5 0 0 1-1.5 1.5H10l-5 4v-4H4A1.5 1.5 0 0 1 2.5 16V6A1.5 1.5 0 0 1 4 4.5Z"/><path d="M8 11h.01M12 11h.01M16 11h.01" stroke-width="2.6"/></symbol>
		<symbol id="spr-bars" viewBox="0 0 24 24"><g fill="currentColor" stroke="none"><rect x="3" y="13" width="4.5" height="8" rx="1"/><rect x="9.75" y="8" width="4.5" height="13" rx="1"/><rect x="16.5" y="3" width="4.5" height="18" rx="1"/></g></symbol>
		<symbol id="spr-chart" viewBox="0 0 24 24"><path d="M3 3v18h18"/><g fill="currentColor" stroke="none"><rect x="6" y="13" width="3" height="5" rx=".6"/><rect x="11" y="10" width="3" height="8" rx=".6"/><rect x="16" y="12" width="3" height="6" rx=".6"/></g><path d="m6 9 4-4 4 3 6-5"/></symbol>
		<symbol id="spr-doc" viewBox="0 0 24 24"><path d="M6 2.5h8.5L19.5 7.5V21.5H6Z"/><path d="M14 2.5V8h5.5M9 12h7M9 15.5h7M9 19h4"/></symbol>
		<symbol id="spr-pie" viewBox="0 0 24 24"><path fill="currentColor" stroke="none" d="M11 3.1A9 9 0 1 0 20.9 13H11Z"/><path fill="currentColor" stroke="none" opacity=".55" d="M13 1.1V11h9.9A9.9 9.9 0 0 0 13 1.1Z"/></symbol>
		<symbol id="spr-table" viewBox="0 0 24 24"><rect x="3" y="3.5" width="18" height="17" rx="2"/><path d="M3 8.5h18M3 13h18M3 17h18M9 8.5v12"/></symbol>
		<symbol id="spr-code" viewBox="0 0 24 24"><path d="m8 7-5 5 5 5M16 7l5 5-5 5M14 4l-4 16" stroke-width="2.2"/></symbol>
		<symbol id="spr-spark" viewBox="0 0 24 24"><path fill="currentColor" stroke="none" d="M10 2.5 12 9l6.5 2-6.5 2-2 6.5L8 13l-6.5-2L8 9Zm8.5 9 .9 2.6 2.6.9-2.6.9-.9 2.6-.9-2.6-2.6-.9 2.6-.9Z"/></symbol>
		<symbol id="spr-db" viewBox="0 0 24 24"><ellipse cx="12" cy="5" rx="8" ry="3"/><path d="M4 5v7c0 1.7 3.6 3 8 3s8-1.3 8-3V5M4 12v7c0 1.7 3.6 3 8 3s8-1.3 8-3v-7"/></symbol>
		<symbol id="spr-shield" viewBox="0 0 24 24"><path d="M12 2 4 5v6c0 5 3.4 9.3 8 11 4.6-1.7 8-6 8-11V5Z"/><path d="m8.5 12 2.5 2.5 4.5-5" stroke-width="2.2"/></symbol>
		<symbol id="spr-check" viewBox="0 0 24 24"><circle cx="12" cy="12" r="9.5"/><path d="m7.5 12.2 3 3 6-6.4" stroke-width="2.2"/></symbol>
		<symbol id="spr-calendar" viewBox="0 0 24 24"><rect x="3" y="4.5" width="18" height="16.5" rx="2"/><path d="M3 9.5h18M8 2.5v4M16 2.5v4"/></symbol>
		<symbol id="spr-pin" viewBox="0 0 24 24"><path d="M12 21.5s7-6.2 7-12a7 7 0 0 0-14 0c0 5.8 7 12 7 12Z"/><circle cx="12" cy="9.5" r="2.6"/></symbol>
		<symbol id="spr-file" viewBox="0 0 24 24"><path d="M6 2.5h8.5L19.5 7.5V21.5H6Z"/><path d="M14 2.5V8h5.5"/><path d="M8.5 13h7M8.5 16.5h7" stroke-width="1.6"/></symbol>
		<symbol id="spr-arrow" viewBox="0 0 24 24"><path d="M4 12h15M13 6l6 6-6 6"/></symbol>
		<symbol id="spr-quote" viewBox="0 0 48 40"><path fill="currentColor" stroke="none" d="M0 40V24C0 10.7 6.7 2.7 20 0v8c-6.2 1.9-9.5 6.1-10 12.5h9V40Zm28 0V24C28 10.7 34.7 2.7 48 0v8c-6.2 1.9-9.5 6.1-10 12.5h9V40Z"/></symbol>
		<symbol id="spr-user" viewBox="0 0 24 24"><circle cx="12" cy="8" r="4"/><path d="M4 21c0-4.4 3.6-7 8-7s8 2.6 8 7"/></symbol>
		<symbol id="spr-badge" viewBox="0 0 24 24"><rect x="3" y="5" width="18" height="15" rx="2"/><circle cx="9" cy="11.5" r="2.2"/><path d="M5.8 17c.5-1.9 1.7-2.8 3.2-2.8s2.7.9 3.2 2.8M14.5 10h4M14.5 13.5h4"/></symbol>
		<symbol id="spr-mail" viewBox="0 0 24 24"><rect x="2.5" y="5" width="19" height="14" rx="2"/><path d="m3 6.5 9 6.5 9-6.5"/></symbol>
		<symbol id="spr-phone" viewBox="0 0 24 24"><path d="M6.6 3.5h3l1.5 4.2-2 1.3a12 12 0 0 0 5.9 5.9l1.3-2 4.2 1.5v3a2 2 0 0 1-2.2 2A17 17 0 0 1 4.6 5.7a2 2 0 0 1 2-2.2Z"/></symbol>
		<symbol id="spr-globe" viewBox="0 0 24 24"><rect x="3" y="3" width="18" height="18" rx="2.5"/><path d="M7 8h10M7 12h10M7 16h6"/></symbol>
		<symbol id="spr-home" viewBox="0 0 24 24"><path d="M3 11 12 3.5 21 11v9.5h-6v-6H9v6H3Z"/></symbol>
		<symbol id="spr-gear" viewBox="0 0 24 24"><circle cx="12" cy="12" r="3"/><path d="M19.4 15a1.7 1.7 0 0 0 .3 1.8l.1.1a2 2 0 1 1-2.8 2.8l-.1-.1a1.7 1.7 0 0 0-1.8-.3 1.7 1.7 0 0 0-1 1.5V21a2 2 0 1 1-4 0v-.1a1.7 1.7 0 0 0-1.1-1.5 1.7 1.7 0 0 0-1.8.3l-.1.1a2 2 0 1 1-2.8-2.8l.1-.1a1.7 1.7 0 0 0 .3-1.8 1.7 1.7 0 0 0-1.5-1H3a2 2 0 1 1 0-4h.1a1.7 1.7 0 0 0 1.5-1.1 1.7 1.7 0 0 0-.3-1.8l-.1-.1a2 2 0 1 1 2.8-2.8l.1.1a1.7 1.7 0 0 0 1.8.3H9a1.7 1.7 0 0 0 1-1.5V3a2 2 0 1 1 4 0v.1a1.7 1.7 0 0 0 1 1.5 1.7 1.7 0 0 0 1.8-.3l.1-.1a2 2 0 1 1 2.8 2.8l-.1.1a1.7 1.7 0 0 0-.3 1.8V9a1.7 1.7 0 0 0 1.5 1H21a2 2 0 1 1 0 4h-.1a1.7 1.7 0 0 0-1.5 1Z"/></symbol>
		<symbol id="spr-plug" viewBox="0 0 24 24"><path d="M9 2v5M15 2v5M6 7h12v4a6 6 0 0 1-12 0Z"/><path d="M12 17v5"/></symbol>
		<symbol id="spr-users" viewBox="0 0 24 24"><circle cx="9" cy="8" r="3.2"/><path d="M2.5 20c0-3.8 2.8-6 6.5-6s6.5 2.2 6.5 6"/><circle cx="17" cy="9" r="2.6"/><path d="M16.5 14c3 .2 5 2.2 5 5"/></symbol>
		<symbol id="spr-sliders" viewBox="0 0 24 24"><path d="M4 7h10M18 7h2M4 17h4M12 17h8"/><circle cx="16" cy="7" r="2"/><circle cx="10" cy="17" r="2"/></symbol>
		<symbol id="spr-play" viewBox="0 0 24 24"><path fill="currentColor" stroke="none" d="M7 4.5v15l12-7.5Z"/></symbol>
		<symbol id="spr-save" viewBox="0 0 24 24"><path d="M5 3.5h11l3.5 3.5v13.5H5Z"/><path d="M8 3.5v5h7v-5M8 20.5v-6h8v6"/></symbol>
		<symbol id="spr-copy" viewBox="0 0 24 24"><rect x="8" y="8" width="12" height="12" rx="2"/><path d="M16 8V5.5A1.5 1.5 0 0 0 14.5 4h-9A1.5 1.5 0 0 0 4 5.5v9A1.5 1.5 0 0 0 5.5 16H8"/></symbol>
		<symbol id="spr-send" viewBox="0 0 24 24"><path fill="currentColor" stroke="none" d="M3 20.5 21 12 3 3.5l2.5 7.2L14 12l-8.5 1.3Z"/></symbol>
	</svg>

	<section class="spr-hero" aria-labelledby="spr-title">
		<div class="spr-shell spr-hero-grid">
			<div class="spr-hero-copy">
				<p class="spr-kicker is-cyan">For Immediate Release</p>
				<h1 id="spr-title">Infometry Introduces Slack Integration for <span class="spr-brand-cyan">INFOFISCUS Conversa</span></h1>
				<p class="spr-subhead">Bringing Enterprise Decision Intelligence Into the Flow of Work</p>
				<p class="spr-lead">New plugin framework enables teams to explore enterprise data directly in Slack with executive summaries, interactive visualizations, key metrics, and auditable SQL.</p>
				<ul class="spr-meta">
					<li><svg aria-hidden="true"><use href="#spr-calendar"/></svg><time datetime="2026-10-27">October 27, 2026</time></li>
					<li><svg aria-hidden="true"><use href="#spr-pin"/></svg><span>FREMONT, Calif., USA</span></li>
				</ul>
				<div class="spr-actions">
					<a class="spr-btn spr-btn-primary" href="<?php echo esc_url( $contact_url ); ?>"><svg aria-hidden="true"><use href="#spr-mail"/></svg>Contact Us</a>
					<a class="spr-btn spr-btn-ghost" href="<?php echo esc_url( $conversa_url ); ?>">Explore Conversa <svg aria-hidden="true"><use href="#spr-arrow"/></svg></a>
				</div>
			</div>
			<div class="spr-hero-visual">
				<p class="spr-partners">
					<img src="<?php echo esc_url( $spr_img_url . 'slack-logo-white.svg' ); ?>" title="Slack" width="498" height="127" alt="Slack logo">
					<span class="spr-x" aria-hidden="true">&times;</span>
					<img src="<?php echo esc_url( $spr_img_url . 'infofiscus-conversa-logo-white.png' ); ?>" title="INFOFISCUS Conversa" width="667" height="147" alt="INFOFISCUS Conversa logo">
				</p>
				<div class="spr-dash-stage">
				<span class="spr-chip is-top" data-seq="chip-answer" aria-hidden="true"><svg><use href="#spr-check"/></svg>Answered in Slack &middot; 157.7s</span>
				<span class="spr-chip is-bottom" data-seq="chip-sql" aria-hidden="true"><svg><use href="#spr-code"/></svg>Auditable SQL</span>
				<div class="spr-dash" data-spr-dash>
					<div class="spr-dash-top" aria-hidden="true"><span class="spr-dots"><i></i><i></i><i></i></span><span class="spr-dash-where"><img src="<?php echo esc_url( $spr_img_url . 'slack-mark.svg' ); ?>" title="Slack" alt="Slack mark" width="14" height="14" loading="lazy"># data-analytics</span><span class="spr-dash-step" data-step-label hidden><span class="spr-dash-step-bars"><i></i><i></i><i></i><i></i></span><span data-step-text>Ask in Slack</span></span></div>
					<div class="spr-dash-body">
						<div class="spr-dash-thread">
							<div class="spr-dash-msg" data-seq="ask">
								<span class="spr-dash-avatar is-user" aria-hidden="true">LS</span>
								<div><p class="spr-dash-who"><b>Liam Smith</b><time>9:17 AM</time></p><p><span class="spr-mention">@Conversa</span> <span data-type-text>Which products generated the most revenue in Q3 2026?</span></p></div>
							</div>
							<div class="spr-dash-msg" data-seq="reply">
								<span class="spr-dash-avatar is-bot" aria-hidden="true"><img src="<?php echo esc_url( $img_url . 'infofiscus-conversa-mark.png' ); ?>" title="INFOFISCUS Conversa" alt="INFOFISCUS Conversa mark" width="141" height="120" loading="lazy"></span>
								<div class="spr-dash-reply">
									<p class="spr-dash-who"><b>Conversa</b><em>APP</em><time>9:17 AM</time></p>
									<span class="spr-dash-typing" aria-hidden="true"><i></i><i></i><i></i><span>Conversa is analyzing&hellip;</span></span>
									<p class="spr-dash-summary" data-seq="summary">Cloud Platform leads Q3 2026 with <b>$57.7M</b> &mdash; 47.5% of the <b>$121.4M</b> generated by the top three products.</p>
									<div class="spr-dash-kpis" data-seq="kpis">
										<p><small>Q3 Revenue (Top 3)</small><b>$121.4M</b><span>Actuals + Forecast</span></p>
										<p><small>Top Product Revenue</small><b>$57.7M</b><span>Cloud Platform</span></p>
										<p><small>Share of Top 3</small><b>47.5%</b><span class="is-up">Dominant source</span></p>
									</div>
									<div class="spr-dash-card" data-seq="card">
										<div class="spr-dash-tabs" role="tablist" aria-label="Answer views">
											<button type="button" role="tab" aria-selected="true" data-tab="chart">Chart</button>
											<button type="button" role="tab" aria-selected="false" data-tab="table">Table</button>
											<button type="button" role="tab" aria-selected="false" data-tab="sql">SQL</button>
											<span class="spr-dash-types" data-types>
												<button type="button" class="is-active" data-type="bar" aria-pressed="true">Bar</button>
												<button type="button" data-type="line" aria-pressed="false">Line</button>
												<button type="button" data-type="area" aria-pressed="false">Area</button>
												<button type="button" data-type="pie" aria-pressed="false">Pie</button>
											</span>
										</div>
										<div class="spr-dash-panel" role="tabpanel" data-panel="chart">
											<p class="spr-dash-chart-title">Revenue by Product in Q3 2026</p>
											<svg class="spr-dash-svg" viewBox="0 0 560 132" role="img" aria-label="Bar chart: Cloud Platform $57.7M, Data Products $33.7M, Professional Services $30.0M" data-chart>
												<?php
												echo '<defs><linearGradient id="spr-bar-grad" x1="0" y1="0" x2="0" y2="1"><stop offset="0" stop-color="#ffb15c"/><stop offset="1" stop-color="#f2600f"/></linearGradient></defs>';
												$spr_chart = array( array( 'Cloud Platform', 57.7 ), array( 'Data Products', 33.7 ), array( 'Professional Services', 30.0 ) );
												foreach ( array( 0, 20, 40, 60 ) as $tick ) {
													$tick_y = 16 + 92 * ( 1 - $tick / 60 );
													printf( '<line class="spr-grid" x1="44" x2="550" y1="%1$.1f" y2="%1$.1f"/><text class="spr-tick" x="36" y="%2$.1f">%3$s</text>', $tick_y, $tick_y + 4, $tick ? '$' . $tick . 'M' : '0' );
												}
												foreach ( $spr_chart as $index => $point ) {
													$band  = 506 / 3;
													$bar_x = 44 + $band * $index + $band * .32;
													$bar_y = 16 + 92 * ( 1 - $point[1] / 60 );
													printf(
														'<rect class="spr-bar spr-anim" x="%1$.1f" y="%2$.1f" width="%3$.1f" height="%4$.1f" rx="6"><title>%5$s: $%6$.1fM</title></rect><text class="spr-val" x="%7$.1f" y="%8$.1f">$%6$.1fM</text><text class="spr-lab" x="%7$.1f" y="126">%5$s</text>',
														$bar_x,
														$bar_y,
														$band * .36,
														108 - $bar_y,
														esc_html( $point[0] ),
														$point[1],
														$bar_x + $band * .18,
														$bar_y - 8
													);
												}
												?>
											</svg>
										</div>
										<div class="spr-dash-panel" role="tabpanel" data-panel="table" hidden>
											<table>
												<thead><tr><th>Product Name</th><th>Revenue</th><th>Share</th></tr></thead>
												<tbody><tr><td>Cloud Platform</td><td>$57.7M</td><td>47.5%</td></tr><tr><td>Data Products</td><td>$33.7M</td><td>27.8%</td></tr><tr><td>Professional Services</td><td>$30.0M</td><td>24.7%</td></tr></tbody>
											</table>
										</div>
										<div class="spr-dash-panel" role="tabpanel" data-panel="sql" hidden>
<pre><code><span class="k">SELECT</span> p.product_name,
       <span class="k">SUM</span>(f.amount) <span class="k">AS</span> revenue
<span class="k">FROM</span>   finance.fact_financial f
<span class="k">JOIN</span>   finance.dim_product p <span class="k">USING</span> (product_id)
<span class="k">WHERE</span>  f.fiscal_quarter = <span class="s">'2026-Q3'</span>
<span class="k">GROUP BY</span> p.product_name
<span class="k">ORDER BY</span> revenue <span class="k">DESC</span>
<span class="k">LIMIT</span>  3;</code></pre>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				</div>
			</div>
		</div>
	</section>

	<section class="spr-highlights" aria-label="Integration highlights">
		<div class="spr-shell spr-highlight-grid">
			<?php foreach ( $highlights as $item ) : ?>
				<article><span class="spr-hl-icon <?php echo esc_attr( $item[1] ); ?>"><svg aria-hidden="true"><use href="#<?php echo esc_attr( $item[0] ); ?>"/></svg></span><h2><?php echo esc_html( $item[2] ); ?></h2><p><?php echo esc_html( $item[3] ); ?></p></article>
			<?php endforeach; ?>
		</div>
	</section>

	<section class="spr-section spr-announcement" id="announcement">
		<div class="spr-shell spr-two-col">
			<div class="spr-copy">
				<p class="spr-kicker">The Announcement</p>
				<h2>From Business Questions to Richer Answers in Slack</h2>
				<p><a class="spr-inline-link" href="<?php echo esc_url( $home_url ); ?>">Infometry Inc.</a> today announced a Slack integration for INFOFISCUS Conversa, expanding the platform with an extensible Plugins framework that enables business teams to access and explore enterprise data directly within their Slack workspace.</p>
				<p>The integration brings analytical exploration closer to everyday collaboration. Instead of switching between conversations and separate analytics interfaces, users can ask business questions in natural language, review structured analytical responses, and explore follow-up questions within Slack threads.</p>
			</div>
			<ul class="spr-feature-list" aria-label="What the integration delivers">
				<?php foreach ( $features as $item ) : ?>
					<li><span class="spr-ft-icon <?php echo esc_attr( $item[1] ); ?>"><svg aria-hidden="true"><use href="#<?php echo esc_attr( $item[0] ); ?>"/></svg></span><span><b><?php echo esc_html( $item[2] ); ?></b><?php echo esc_html( $item[3] ); ?></span></li>
				<?php endforeach; ?>
			</ul>
		</div>
	</section>

	<section class="spr-section spr-experience" aria-labelledby="spr-experience-title">
		<div class="spr-shell">
			<div class="spr-heading">
				<p class="spr-kicker">The Slack Experience</p>
				<h2 id="spr-experience-title">Decision Intelligence Directly in Slack</h2>
				<p>Ask questions, get instant executive summaries, interactive charts, data tables, and SQL &mdash; all within your Slack workspace.</p>
			</div>
			<div class="spr-exp-grid">
				<article class="spr-exp-card">
					<header><span class="spr-num">1</span><h3>Natural Language Query</h3></header>
					<p class="spr-exp-desc">Mention @Conversa in any channel, DM, or group.</p>
					<div class="spr-ui spr-ui-query" aria-hidden="true">
						<div class="spr-msg"><span class="spr-avatar is-user"><svg><use href="#spr-user"/></svg></span><div><b>Liam Smith</b> <time>9:17 AM</time><p><span class="spr-mention">@Conversa</span> Which products generated the most revenue in Q3 2026?</p></div></div>
						<div class="spr-compose"><span>Message #social</span><div><i>+</i><i><u>Aa</u></i><i>&#9786;</i><i>&middot;&middot;&middot;</i><svg class="spr-send"><use href="#spr-send"/></svg></div></div>
					</div>
				</article>
				<article class="spr-exp-card">
					<header><span class="spr-num">2</span><h3>Executive Summary &amp; KPI Cards</h3></header>
					<p class="spr-exp-desc">Get a business narrative with key insights and metrics.</p>
					<div class="spr-ui spr-ui-summary" aria-hidden="true">
						<div class="spr-msg"><span class="spr-avatar is-app"><img src="<?php echo esc_url( $spr_img_url . 'slack-mark.svg' ); ?>" title="Conversa app in Slack" alt="Slack mark" width="24" height="24" loading="lazy"></span><div><b>Conversa</b> <em>APP</em> <time>9:17 AM</time><p>Analysis completed (157.7s)</p></div></div>
						<b class="spr-ui-title">Conversa Summary &amp; Key Insights</b>
						<p class="spr-ui-text"><?php echo esc_html( $summary ); ?></p>
						<b class="spr-ui-kpi-head">KPI / Metrics</b>
						<div class="spr-kpis">
							<div><span class="spr-kpi-icon"><svg><use href="#spr-bars"/></svg></span><span><b>Total Q3 Revenue</b>$121.4M</span><small>N/A Actuals + Forecast</small></div>
							<div><span class="spr-kpi-icon"><svg><use href="#spr-bars"/></svg></span><span><b>Top Product Revenue</b>$57.7M</span><small>47.5% of Top 3 Total</small></div>
						</div>
					</div>
				</article>
				<article class="spr-exp-card">
					<header><span class="spr-num">3</span><h3>Interactive Visualizations</h3></header>
					<p class="spr-exp-desc">View charts directly in Slack and switch between chart types.</p>
					<div class="spr-ui spr-ui-chart" aria-hidden="true">
						<div class="spr-chart-box">
							<b class="spr-ui-title">Revenue by Product in Q3 2026</b>
							<div class="spr-chart">
								<div class="spr-axis"><span>$60M</span><span>$40M</span><span>$20M</span><span>0</span></div>
								<div class="spr-bars"><span style="--h: 96%"><i>Cloud Plat...</i></span><span style="--h: 56%"><i>Data Produ...</i></span><span style="--h: 50%"><i>Professional...</i></span></div>
							</div>
						</div>
						<div class="spr-chart-types"><span class="is-active">Bar</span><span>Line</span><span>Area</span><span>Pie</span></div>
						<p class="spr-ui-text"><b>Chart Insight</b>This bar chart compares the total revenue generated by each product. The products are sorted by revenue in descending order, making it easy to identify the top performers.</p>
					</div>
				</article>
				<article class="spr-exp-card">
					<header><span class="spr-num">4</span><h3>Data Table &amp; SQL</h3></header>
					<p class="spr-exp-desc">View detailed results and the generated SQL for full transparency.</p>
					<div class="spr-ui spr-ui-sql" aria-hidden="true">
						<div class="spr-result">
							<b class="spr-ui-title">Query Results &ndash; Revenue by Product in Q3 2026</b>
							<small>3 rows returned</small>
							<table>
								<thead><tr><th>Product Name</th><th>Revenue</th></tr></thead>
								<tbody><tr><td>Cloud Platform</td><td>57.7M</td></tr><tr><td>Data Products</td><td>33.7M</td></tr><tr><td>Professional Services</td><td>30.0M</td></tr></tbody>
							</table>
						</div>
						<div class="spr-code-box">
							<b class="spr-ui-title">SQL Generated <svg><use href="#spr-copy"/></svg></b>
<pre><code>WITH
  q3_financials AS (
    SELECT
      FACT_FINANCIAL.AMOUNT,
      FACT_FINANCIAL.ACCOUNT_ID,
      FACT_FINANCIAL.PRODUCT_ID
    FROM FINANCE.FACT_FINANCIAL</code></pre>
						</div>
					</div>
				</article>
			</div>
		</div>
	</section>

	<section class="spr-section spr-admin" aria-labelledby="spr-admin-title">
		<div class="spr-shell spr-admin-grid">
			<div class="spr-copy">
				<p class="spr-kicker">Administration and Configuration</p>
				<h2 id="spr-admin-title">Configure and Manage in Conversa Web Application</h2>
				<p>Administrators can configure the Slack plugin from the dedicated Plugins hub under Connections, manage credentials, test the connection, and monitor status through the platform&rsquo;s administration interface.</p>
			</div>
			<div class="spr-admin-ui" aria-hidden="true">
				<div class="spr-panel spr-panel-connections">
					<nav class="spr-side">
						<img src="<?php echo esc_url( $spr_img_url . 'infofiscus-conversa-logo-white.png' ); ?>" title="INFOFISCUS Conversa" alt="INFOFISCUS Conversa logo" width="667" height="147" loading="lazy">
						<span><svg><use href="#spr-home"/></svg>Home</span><span><svg><use href="#spr-bars"/></svg>Analytics</span><span><svg><use href="#spr-db"/></svg>Data</span><span class="is-active"><svg><use href="#spr-plug"/></svg>Connections</span><span><svg><use href="#spr-plug"/></svg>Plugins</span><span><svg><use href="#spr-users"/></svg>Users</span><span><svg><use href="#spr-gear"/></svg>Settings</span>
					</nav>
					<div class="spr-panel-main">
						<p class="spr-crumb">Conversa / <b>Connections</b></p>
						<p class="spr-tabs"><span>DB Connection</span><span>Agent Connection</span><span>Permissions</span><span>Data Policies</span><span class="is-active">Plugins</span></p>
						<div class="spr-plugin-card">
							<p class="spr-plugin-head"><span class="spr-plugin-logo"><img src="<?php echo esc_url( $spr_img_url . 'slack-mark.svg' ); ?>" title="Slack" alt="Slack mark" width="24" height="24" loading="lazy"></span><b>Slack</b><svg><use href="#spr-sliders"/></svg></p>
							<p class="spr-plugin-row"><span>Status</span><em class="spr-connected">Connected</em></p>
							<p class="spr-plugin-row"><span>Total Connections</span><em class="spr-count">0</em></p>
							<p class="spr-plugin-links"><span>Manage Plugin</span><span>Create Plugin</span></p>
						</div>
					</div>
				</div>
				<div class="spr-panel spr-panel-form">
					<p class="spr-form-head"><span class="spr-plugin-logo"><img src="<?php echo esc_url( $spr_img_url . 'slack-mark.svg' ); ?>" title="Slack" alt="Slack mark" width="24" height="24" loading="lazy"></span><span><b>Configure Slack Plugin</b>Provide your Slack bot credentials and webhook URL to enable conversational AI directly inside your Slack workspace.</span></p>
					<p class="spr-field"><label>Connection Name *</label><span>e.g. Conversa Slack Bot</span></p>
					<p class="spr-field"><label>Slack Bot Token *</label><span>xoxb-your-bot-token</span></p>
					<p class="spr-field"><label>Slack App Token *</label><span>xapp-your-app-token</span></p>
					<p class="spr-field"><label>Slack Webhook URL *</label><span>https://hooks.slack.com/services/...</span></p>
					<p class="spr-form-actions"><span class="spr-test"><svg><use href="#spr-play"/></svg>Test Connection</span><span class="spr-save"><svg><use href="#spr-save"/></svg>Save Plugin</span></p>
				</div>
			</div>
		</div>
	</section>

	<section class="spr-section spr-security" aria-labelledby="spr-security-title">
		<div class="spr-shell spr-security-grid">
			<div class="spr-security-copy">
				<div class="spr-security-body">
					<span class="spr-shield"><svg aria-hidden="true"><use href="#spr-shield"/></svg></span>
					<div>
						<p class="spr-kicker">Built for Enterprise Environments</p>
						<h2 id="spr-security-title">Secure and Scalable Integration Framework</h2>
						<p>The integration uses Slack Socket Mode over secure WebSockets, which does not require organizations to open inbound firewall ports, configure reverse proxies, or expose public IP addresses. The modular Plugins framework also enables future integrations as your needs evolve.</p>
					</div>
				</div>
			</div>
			<ul class="spr-checklist" aria-label="Security highlights">
				<?php foreach ( $security as $line ) : ?>
					<li><svg aria-hidden="true"><use href="#spr-check"/></svg><?php echo esc_html( $line ); ?></li>
				<?php endforeach; ?>
			</ul>
		</div>
	</section>

	<section class="spr-section spr-how" aria-labelledby="spr-how-title">
		<div class="spr-shell">
			<p class="spr-kicker" id="spr-how-title">How It Works</p>
			<ol class="spr-steps">
				<?php foreach ( $steps as $index => $item ) : ?>
					<li><span class="spr-step-num"><?php echo esc_html( (string) ( $index + 1 ) ); ?></span><span class="spr-step-icon"><svg aria-hidden="true"><use href="#<?php echo esc_attr( $item[0] ); ?>"/></svg></span><span><b><?php echo esc_html( $item[1] ); ?></b><?php echo esc_html( $item[2] ); ?></span></li>
				<?php endforeach; ?>
			</ol>
		</div>
	</section>

	<section class="spr-quote" aria-label="Executive quote">
		<div class="spr-shell spr-quote-inner">
			<svg class="spr-quote-mark" aria-hidden="true"><use href="#spr-quote"/></svg>
			<blockquote>
				<p>&ldquo;<?php echo esc_html( $spr_quote ); ?>&rdquo;</p>
				<footer>&mdash; <?php echo esc_html( $spr_quote_by ); ?></footer>
			</blockquote>
		</div>
	</section>

	<section class="spr-section spr-about" aria-label="About and media contact">
		<div class="spr-shell spr-about-grid">
			<div>
				<h2>About INFOFISCUS Conversa</h2>
				<p>INFOFISCUS Conversa is Infometry&rsquo;s enterprise decision intelligence platform that transforms governed enterprise data into trusted, decision-ready insights. It enables business teams to ask complex questions in natural language, investigate business performance, uncover key drivers and root causes, and make faster, more confident decisions with contextual analysis and actionable recommendations.</p>
				<a class="spr-btn spr-btn-outline" href="<?php echo esc_url( $conversa_url ); ?>">Learn More About Conversa <svg aria-hidden="true"><use href="#spr-arrow"/></svg></a>
			</div>
			<div>
				<h2>About Infometry Inc.</h2>
				<p>Infometry Inc. is a data analytics company that helps organizations address enterprise data and analytics needs. Its offerings include data integration, analytics, and decision intelligence solutions.</p>
				<a class="spr-btn spr-btn-outline" href="<?php echo esc_url( $home_url ); ?>">Learn More About Infometry <svg aria-hidden="true"><use href="#spr-arrow"/></svg></a>
			</div>
			<div>
				<h2>Media Contact</h2>
				<ul class="spr-contact">
					<li><svg aria-hidden="true"><use href="#spr-home"/></svg><b>Infometry Inc.</b></li>
					<li><svg aria-hidden="true"><use href="#spr-phone"/></svg><a href="tel:+15107935859">+1 (510) 793 5859</a></li>
					<li><svg aria-hidden="true"><use href="#spr-mail"/></svg><a href="mailto:info@infometry.net">info@infometry.net</a></li>
					<li><svg aria-hidden="true"><use href="#spr-pin"/></svg><span>39111 Paseo Padre Pkwy, Suite 203E, Fremont, CA 94538 USA</span></li>
					<li><svg aria-hidden="true"><use href="#spr-globe"/></svg><a href="<?php echo esc_url( $home_url ); ?>">www.infometry.net</a></li>
				</ul>
			</div>
		</div>
	</section>
</main>

<footer class="infometry-custom-footer" id="infometry-case-study-footer" aria-label="Infometry website footer">
	<div class="infometry-footer-shell">
		<div class="infometry-footer-grid">
			<div class="infometry-footer-connect">
				<h2>Connect with us</h2>
				<a class="infometry-footer-logo" href="<?php echo esc_url( $home_url ); ?>"><img src="<?php echo esc_url( $img_url . 'infometry-logo-white.png' ); ?>" title="Infometry Inc." width="500" height="142" loading="lazy" decoding="async" alt="Infometry Inc. logo – Enabling AI for Every Enterprise"></a>
				<p>Turning enterprise data into trusted insights, intelligent decisions and measurable business outcomes.</p>
				<div class="infometry-footer-social" aria-label="Infometry social profiles">
					<a href="https://www.facebook.com/infometryinc/" target="_blank" rel="noopener" aria-label="Infometry on Facebook"><img src="<?php echo esc_url( $img_url . 'social-facebook.png' ); ?>" title="Infometry on Facebook" width="512" height="512" loading="lazy" decoding="async" alt="Facebook"></a>
					<a href="https://x.com/Infometryinc" target="_blank" rel="noopener" aria-label="Infometry on X"><img src="<?php echo esc_url( $img_url . 'social-x.png' ); ?>" title="Infometry on X" width="500" height="500" loading="lazy" decoding="async" alt="X"></a>
					<a href="https://www.linkedin.com/company/infometry-inc" target="_blank" rel="noopener" aria-label="Infometry on LinkedIn"><img src="<?php echo esc_url( $img_url . 'social-linkedin.png' ); ?>" title="Infometry on LinkedIn" width="512" height="512" loading="lazy" decoding="async" alt="LinkedIn"></a>
					<a href="https://www.youtube.com/channel/UCYYc9Fa7iPiVLDEiSvG7DmQ" target="_blank" rel="noopener" aria-label="Infometry on YouTube"><img src="<?php echo esc_url( $img_url . 'social-youtube.png' ); ?>" title="Infometry on YouTube" width="512" height="512" loading="lazy" decoding="async" alt="YouTube"></a>
					<a href="https://in.pinterest.com/infometryincus/_saved/" target="_blank" rel="noopener" aria-label="Infometry on Pinterest"><img src="<?php echo esc_url( $img_url . 'social-pinterest.png' ); ?>" title="Infometry on Pinterest" width="512" height="512" loading="lazy" decoding="async" alt="Pinterest"></a>
					<a href="https://www.instagram.com/infometry_inc/" target="_blank" rel="noopener" aria-label="Infometry on Instagram"><img src="<?php echo esc_url( $img_url . 'social-instagram.png' ); ?>" title="Infometry on Instagram" width="512" height="512" loading="lazy" decoding="async" alt="Instagram"></a>
					<a href="https://www.g2.com/sellers/infometry-inc#profiles" target="_blank" rel="noopener" aria-label="Infometry on G2"><img src="<?php echo esc_url( $img_url . 'social-g2.png' ); ?>" title="Infometry on G2" width="512" height="512" loading="lazy" decoding="async" alt="G2"></a>
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
