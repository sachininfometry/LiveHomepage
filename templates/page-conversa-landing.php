<?php
/**
 * Template Name: INFOFISCUS Conversa Ads Landing Page
 * Template Post Type: page
 *
 * Paid-traffic landing page for INFOFISCUS Conversa. It prints its own document,
 * so the theme header, site menu and footer are not on the page: the only ways
 * out are the demo form and the Privacy Policy link. The hero holds the demo
 * form (includes/conversa-landing-form.php); a section further down reuses the
 * live Conversa product tour (templates/partials/conversa-live-dashboard.php),
 * which is why the page sits inside .infometry-conversa-product and loads the
 * Conversa CSS/JS. Everything else: assets/css/conversa-landing.css and
 * assets/js/conversa-landing.js.
 *
 * @package Infometry_Custom_Templates
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$icl_privacy_url = home_url( '/privacy-policies/' );

// The site logo set in the theme (Betheme > Logo), shown on the banner like the other pages.
$icl_logo = function_exists( 'mfn_opts_get' ) ? mfn_opts_get( 'logo-img' ) : '';
if ( ! $icl_logo ) {
	$icl_logo = home_url( '/wp-content/uploads/2025/12/infometry-inc-logo-enabling-ai-for-every-enterprise-e1765295994150.png' );
}

$icl_customers = array(
	array( 'Sanofi', 'customer-sanofi-logo.png', 323, 259 ),
	array( 'Belk', 'customer-belk-logo.png', 423, 179 ),
	array( 'IBM', 'customer-ibm-logo.png', 403, 171 ),
	array( 'Informatica', 'customer-informatica-logo.png', 645, 171 ),
	array( 'Michaels', 'customer-michaels-logo.png', 150, 56 ),
	array( 'SanDisk', 'customer-sandisk-logo.png', 621, 137 ),
	array( 'Fusion.io', 'customer-fusionio-logo.png', 363, 198 ),
);

// Value, suffix, label. The value counts up when the card scrolls into view.
$icl_stats = array(
	array( '3', 'X', 'Faster time to insights' ),
	array( '75', '%', 'Self-service analytics growth' ),
	array( '2', 'X', 'Data team productivity boost' ),
	array( '92', '%+', 'Trusted answers, happier users' ),
);

// Icon, colour, heading, detail.
$icl_problems = array(
	array( 'clock', 'is-amber', 'Reporting Bottlenecks', 'Reports cover predefined questions, so anything new waits for an analyst.' ),
	array( 'db', 'is-cyan', 'Fragmented Enterprise Data', 'Data lives in multiple warehouses and applications.' ),
	array( 'code', 'is-violet', 'Limited Analytical Access', 'Exploring data still requires SQL or technical tools.' ),
	array( 'doc', 'is-blue', 'Inconsistent Business Context', 'Teams work from different reports and definitions.' ),
);

$icl_steps = array(
	array( 'chat', 'Ask', 'Ask a complex business question in natural language.' ),
	array( 'brain', 'Understand', 'Conversa applies business context and governed semantics.' ),
	array( 'search', 'Investigate', 'It analyzes the data, compares dimensions and follows the evidence.' ),
	array( 'target', 'Identify drivers', 'See the key factors, root causes, risks and opportunities.' ),
	array( 'check', 'Decide', 'Get a clear, decision-ready business insight.' ),
);

// Retail example: the "Impulse buys and returns" answer from the Retail workspace
// of the Conversa demo (templates/partials/conversa-live-verticals.php).
$icl_context = array( 'Promotion', 'Return rate', 'Full-price probability', 'Return amount', '7 promotions', 'Snowflake' );
// Step index that lights the row, label, result, result style.
$icl_trail = array(
	array( 2, 'Score promoted orders and the returns that followed', '7 promotions', '' ),
	array( 2, 'Rank promotions by their return rate', '14.4% → 28.0%', '' ),
	array( 3, 'Find the worst offenders: deep sitewide and apparel deals', '28.0% and 27.3% returns', 'is-down' ),
	array( 3, 'Find the healthiest offer by full-price probability', 'Loyalty Coupon 65.6%', 'is-up' ),
);
// Promotion, total return amount in $M, style (a bigger return bill is worse).
$icl_channels = array(
	array( '25% Off Sitewide', 30.9, 'is-low' ),
	array( '20% Off Apparel', 23.3, 'is-low' ),
	array( 'Buy 2 Get 1 Free', 20.8, '' ),
	array( '15% Off Electronics', 14.3, '' ),
	array( 'BOGO Beauty', 7.3, '' ),
	array( 'Loyalty Coupon', 7.0, 'is-best' ),
	array( 'New Customer Offer', 4.5, 'is-best' ),
);

// Icon, colour, text.
$icl_demo_points = array(
	array( 'chat', 'is-violet', 'How Conversa answers multi-step business questions' ),
	array( 'target', 'is-blue', 'Root cause and key drivers, with the SQL behind every answer' ),
	array( 'lock', 'is-cyan', 'Governance: SSO, role-based access, encryption and audit trails' ),
	array( 'spark', 'is-green', 'How a Conversa Value Sprint works for your team' ),
);

$icl_capabilities = array(
	array( 'brain', 'is-violet', 'Analytical reasoning', 'Investigate complex business questions', 'Multi-step analysis from the question to the drivers, risks, opportunities and follow-ups.' ),
	array( 'shield', 'is-blue', 'Trusted intelligence', 'Answers grounded in business meaning', 'Governed semantics keep metrics, terminology and business logic consistent.' ),
	array( 'nodes', 'is-cyan', 'Cross-platform intelligence', 'One question. Many systems. One answer.', 'Investigate across heterogeneous enterprise data platforms, not just one.' ),
	array( 'doc', 'is-amber', 'Document intelligence', 'Connect enterprise data with enterprise knowledge', 'Search PDFs, contracts, manuals, SOPs and reports alongside your data.' ),
	array( 'lock', 'is-pink', 'Enterprise governance', 'Built for governed analytics', 'Role-based access, single sign-on, encryption and audit trails.' ),
	array( 'spark', 'is-green', 'Enterprise AI economics', 'Scale AI with control', 'Scale AI-assisted analytics with controlled model usage and enterprise-ready efficiency.' ),
);
// Supporting capabilities, shown under the main six.
$icl_cap_support = array(
	array( 'chat', 'Natural language', 'Ask questions and follow-ups in plain English, without writing SQL.' ),
	array( 'code', 'SQL generation', 'Conversa generates optimized queries, and the SQL behind each answer can be inspected.' ),
);

$icl_shift = array(
	array( 'Fragmented data', 'Questions need information from multiple systems and teams.', 'Cross-enterprise intelligence', 'Investigate across connected enterprise data and business domains.' ),
	array( 'Reactive reporting', 'Teams wait for reports or analyst support when something changes.', 'Faster investigation', 'Investigate changes and drivers close to the moment of decision.' ),
	array( 'Knowledge bottlenecks', 'Analytical expertise sits with a few specialists.', 'Accessible intelligence', 'Business teams explore governed insights; analysts focus on higher-value work.' ),
	array( 'Disconnected decisions', 'Teams work from different reports and definitions.', 'Trusted business context', 'Shared definitions support consistent decision-making.' ),
);

// Approach-level comparison: describes typical use, not the limits of any product.
$icl_approaches = array( 'Traditional BI', 'Platform-native AI copilots', 'General-purpose AI tools', 'INFOFISCUS Conversa' );
$icl_approach_rows = array(
	array( 'Built for', 'Monitoring known KPIs through dashboards and reports', 'Asking questions about data inside one vendor platform', 'General questions, writing and analysis on content you provide', 'Investigating new business questions across governed enterprise data' ),
	array( 'Typical starting point', 'A dashboard designed in advance', 'The data and models in that platform', 'A prompt, plus files or data you supply', 'A business question in plain English' ),
	array( 'Business context', 'Defined in each report or data model', 'Defined within that platform', 'Supplied by the user in each conversation', 'Governed semantics shared across questions and teams' ),
	array( 'Typical output', 'Charts and tables to interpret', 'Answers and visuals within that tool', 'Generated text and analysis', 'Drivers, root causes and recommended actions, with the SQL behind them' ),
);

// Business plays, each an illustrative investigation from the Conversa demo environment:
// FP&A, Sales, Operations, Marketing and HR are the use cases on the Conversa product page
// (templates/page-infofiscus-conversa.php, assets/js/infofiscus-conversa.js); Executive Business
// Review and Retail are answers from the product tour (templates/partials/conversa-live-verticals.php).
$icl_uc = array(
	'executive'  => array(
		'icon'     => 'chart',
		'tab'      => 'Executive Business Review',
		'title'    => 'Executive Business Review',
		'question' => 'Which products are growing our recurring revenue, and which ones are shrinking?',
		'found'    => 'ARR reached $132.0M. Analytics Cloud leads with $48.2M at 124% net retention, while three products sit below 100% and are shrinking inside their existing accounts.',
		'drivers'  => array( 'Analytics Cloud: $48.2M ARR at 124% net retention', 'Data Platform: $36.5M ARR at 118% net retention', 'Integrations, Mobile SDK and Legacy: $25.5M below 100% net retention' ),
		'chart'    => array( 'ARR by Product Line', 'Three product lines are shrinking inside their existing accounts.', 'bar', array( 'Analytics', 'Platform', 'Security', 'Integr.', 'SDK', 'Legacy' ), array( 48.2, 36.5, 21.8, 12.4, 7.9, 5.2 ), array( '$48.2M', '$36.5M', '$21.8M', '$12.4M', '$7.9M', '$5.2M' ), 3 ),
		'takeaway' => 'Three product lines below 100% net retention hold $25.5M of ARR.',
		'action'   => 'Bundle Integrations into Analytics Cloud renewals and focus expansion sales on Data Platform accounts.',
		'kpis'     => array( array( 'Total ARR', '$132.0M', '6 product lines', 'is-up' ), array( 'Best net retention', '124%', 'Analytics Cloud', 'is-up' ), array( 'ARR below 100% NRR', '$25.5M', '3 products shrinking', 'is-down' ) ),
	),
	'fpa'        => array(
		'icon'     => 'bank',
		'tab'      => 'FP&A Intelligence',
		'title'    => 'Finance (FP&A)',
		'question' => 'Why did net profit improve this quarter, and which drivers contributed most?',
		'found'    => 'Net profit increased 11.8% as stronger enterprise pricing and lower fulfillment costs offset a 3.1% rise in operating expenses.',
		'drivers'  => array( 'Enterprise gross margin improved by 4.2 points', 'Logistics cost per order declined by 6.7%', 'North America contributed 58% of profit growth' ),
		'chart'    => array( 'Net Profit Trend', 'Quarterly profit accelerated after pricing changes introduced in April.', 'line', array( "Q1 '25", "Q2 '25", "Q3 '25", "Q4 '25", "Q1 '26", "Q2 '26" ), array( 14.8, 15.6, 15.4, 16.9, 17.8, 18.6 ), array( '$14.8M', '$15.6M', '$15.4M', '$16.9M', '$17.8M', '$18.6M' ), 3, 'Pricing change' ),
		'takeaway' => 'Pricing and fulfillment efficiency generated 82% of the quarter’s profit improvement.',
		'action'   => 'Protect enterprise pricing and extend logistics savings across other regions.',
		'kpis'     => array( array( 'Net profit', '$18.6M', 'Up 11.8% vs prior quarter', 'is-up' ), array( 'Gross margin', '31.6%', 'Up 4.2 pts vs prior quarter', 'is-up' ), array( 'EBITDA', '$34.2M', 'Up 12.7% vs prior quarter', 'is-up' ) ),
	),
	'retail'     => array(
		'icon'     => 'target',
		'tab'      => 'Retail Performance',
		'title'    => 'Retail Performance',
		'question' => 'What are the primary root causes driving inventory inaccuracies and stockout exposure?',
		'found'    => 'Stockouts cost $176.7M in lost sales against $72.8M of direct shrink, so unavailable inventory costs 2.4 times more than the loss itself.',
		'drivers'  => array( 'Theft & shrink: $24.6M shrink, $63.4M lost sales', 'Scanning errors: $17.5M shrink, $44.9M lost sales', 'Misplaced inventory: $13.2M shrink, $33.8M lost sales' ),
		'chart'    => array( 'Lost Sales by Root Cause', 'Two root causes drive most of the lost sales from stockouts.', 'bar', array( 'Theft & Shrink', 'Scanning', 'Misplaced', 'Returns', 'Damaged' ), array( 63.4, 44.9, 33.8, 20.2, 14.4 ), array( '$63.4M', '$44.9M', '$33.8M', '$20.2M', '$14.4M' ), 2 ),
		'takeaway' => 'Unavailable inventory costs 2.4 times more than the shrink itself.',
		'action'   => 'Target theft and shrink with loss prevention, and overhaul scanning procedures.',
		'kpis'     => array( array( 'Lost sales', '$176.7M', 'From stockouts', 'is-down' ), array( 'Shrink loss', '$72.8M', 'Direct asset loss', 'is-down' ), array( 'Total leakage', '$249.5M', 'Across 5 root causes', 'is-down' ) ),
	),
	'sales'      => array(
		'icon'     => 'users',
		'tab'      => 'Sales & Pipeline',
		'title'    => 'Sales & Pipeline',
		'question' => 'Why did pipeline conversion improve, and where should sales focus next?',
		'found'    => 'Win rate rose to 42.8% because enterprise opportunities moved faster through solution validation, while mid-market deals remain the largest growth gap.',
		'drivers'  => array( 'Enterprise win rate increased by 8.4 points', 'Sales cycle shortened by 12 days', '$3.6M mid-market pipeline needs executive action' ),
		'chart'    => array( 'Pipeline Conversion Trend', 'Conversion improved for three consecutive quarters, led by enterprise deals.', 'line', array( "Q1 '25", "Q2 '25", "Q3 '25", "Q4 '25", "Q1 '26", "Q2 '26" ), array( 34.4, 36.1, 35.7, 39.2, 41.0, 42.8 ), array( '34.4%', '36.1%', '35.7%', '39.2%', '41.0%', '42.8%' ), 3, 'New qualification' ),
		'takeaway' => 'Enterprise deals are converting faster, while mid-market pipeline remains the largest growth gap.',
		'action'   => 'Prioritize executive support for the $3.6M mid-market pipeline at risk.',
		'kpis'     => array( array( 'Win rate', '42.8%', 'Up 8.4 pts vs prior quarter', 'is-up' ), array( 'Qualified pipeline', '$18.7M', 'Up 15.1% vs prior quarter', 'is-up' ), array( 'Sales cycle', '46 days', '12 days faster than last quarter', 'is-up' ) ),
	),
	'operations' => array(
		'icon'     => 'nodes',
		'tab'      => 'Operational Intelligence',
		'title'    => 'Operations',
		'question' => 'What is driving fulfillment delays, and which process should we fix first?',
		'found'    => 'West-region delays are concentrated in two distribution centers where picking congestion and late carrier handoffs account for 71% of missed SLAs.',
		'drivers'  => array( 'DC-04 contributes 43% of delayed orders', 'Average picking time is 18 minutes above target', 'Evening carrier capacity is short by 14%' ),
		'chart'    => array( 'On-Time Fulfillment Trend', 'Service levels recovered after carrier capacity was reallocated in week six.', 'line', array( 'W1', 'W2', 'W3', 'W4', 'W5', 'W6' ), array( 88.2, 89.6, 91.1, 90.4, 93.2, 96.4 ), array( '88.2%', '89.6%', '91.1%', '90.4%', '93.2%', '96.4%' ), 4, 'Capacity reallocated' ),
		'takeaway' => 'Two distribution centers account for 71% of missed service-level commitments.',
		'action'   => 'Add evening carrier capacity and reduce picking congestion at DC-04 first.',
		'kpis'     => array( array( 'On-time SLA', '96.4%', 'Up 5.8 pts over six weeks', 'is-up' ), array( 'Order cycle time', '2.8 days', '18% faster over six weeks', 'is-up' ), array( 'Backlog', '1,240', 'Down 22% since peak week', 'is-up' ) ),
	),
	'marketing'  => array(
		'icon'     => 'spark',
		'tab'      => 'Marketing',
		'minor'    => true,
		'title'    => 'Marketing',
		'question' => 'Why did customer engagement drop last week, and what should we change?',
		'found'    => 'Engagement declined 18% because email click-through fell after send times shifted later, while paid social and webinar engagement remained stable.',
		'drivers'  => array( 'Email generated 74% of the total engagement decline', 'Evening sends underperformed morning sends by 21%', 'Returning customers showed the largest drop' ),
		'chart'    => array( 'Weekly Engagement Trend', 'The sharp decline begins after the email schedule changed on Wednesday.', 'line', array( 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat' ), array( 31.5, 30.8, 29.9, 26.2, 24.1, 24.8 ), array( '31.5%', '30.8%', '29.9%', '26.2%', '24.1%', '24.8%' ), 2, 'Send time changed' ),
		'takeaway' => 'Email timing caused 74% of the engagement decline; other channels remained stable.',
		'action'   => 'Restore morning sends and run a segmented timing test for returning customers.',
		'kpis'     => array( array( 'Engagement rate', '24.8%', 'Down 18% vs previous week', 'is-down' ), array( 'Email CTR', '2.9%', 'Down 21% after timing change', 'is-down' ), array( 'Campaign ROAS', '4.3X', 'Stable vs previous week', 'is-flat' ) ),
	),
	'hr'         => array(
		'icon'     => 'users',
		'tab'      => 'HR',
		'minor'    => true,
		'title'    => 'Human Resources',
		'question' => 'Why is regrettable attrition increasing, and which teams need attention?',
		'found'    => 'Attrition is concentrated in engineering and customer success employees with 18–30 months of tenure, driven by promotion delays and manager changes.',
		'drivers'  => array( 'Engineering accounts for 39% of regrettable exits', 'Employees awaiting promotion are 2.4× more likely to leave', 'Three managers show elevated team-level risk' ),
		'chart'    => array( 'Regrettable Attrition Trend', 'Risk increased after manager changes and peaked among mid-tenure employees.', 'line', array( "Q1 '25", "Q2 '25", "Q3 '25", "Q4 '25", "Q1 '26", "Q2 '26" ), array( 4.7, 4.9, 5.1, 5.6, 6.0, 6.4 ), array( '4.7%', '4.9%', '5.1%', '5.6%', '6.0%', '6.4%' ), 3, 'Manager changes' ),
		'takeaway' => 'Mid-tenure engineering and customer success employees carry the highest exit risk.',
		'action'   => 'Accelerate promotion reviews and launch targeted manager interventions.',
		'kpis'     => array( array( 'Retention', '91.8%', 'Down 2.1 pts vs prior quarter', 'is-down' ), array( 'Regrettable attrition', '6.4%', 'Up 1.7 pts vs prior quarter', 'is-down' ), array( 'Time to fill', '34 days', '22% faster than prior quarter', 'is-up' ) ),
	),
);

/**
 * Chart for a use case: a line (trend over time) or bars (breakdown), 400x210.
 *
 * @param array $c Chart spec: title, subtitle, type, labels, values, value labels, highlight/event index, event label.
 * @return string SVG markup.
 */
$icl_uc_chart = static function ( $c ) {
	list( , , $type, $labels, $values, $shown, $mark ) = $c;
	$event = isset( $c[7] ) ? $c[7] : '';
	$n     = count( $values );
	$left  = 26;
	$right = 384;
	$top   = 34;
	$base  = 168;
	$step  = ( $right - $left ) / $n;
	$out   = '<svg class="icl-uc-svg is-' . esc_attr( $type ) . '" viewBox="0 0 400 210" role="img" aria-label="' . esc_attr( $c[0] ) . '" focusable="false">';
	foreach ( array( 0, 0.5, 1 ) as $k ) {
		$out .= '<line class="icl-uc-grid" x1="' . $left . '" x2="' . $right . '" y1="' . ( $top + ( $base - $top ) * $k ) . '" y2="' . ( $top + ( $base - $top ) * $k ) . '"/>';
	}
	if ( 'bar' === $type ) {
		$max = max( $values );
		foreach ( $values as $i => $v ) {
			$h    = round( ( $base - $top ) * $v / $max, 1 );
			$x    = round( $left + $step * $i + $step * 0.2, 1 );
			$w    = round( $step * 0.6, 1 );
			$cls  = $i < $mark ? 'is-hi' : '';
			$out .= '<rect class="icl-uc-bar ' . $cls . '" x="' . $x . '" y="' . ( $base - $h ) . '" width="' . $w . '" height="' . $h . '" rx="5" style="--i:' . $i . '"/>';
			$out .= '<text class="icl-uc-val" x="' . ( $x + $w / 2 ) . '" y="' . ( $base - $h - 8 ) . '">' . esc_html( $shown[ $i ] ) . '</text>';
			$out .= '<text class="icl-uc-lab" x="' . ( $x + $w / 2 ) . '" y="' . ( $base + 22 ) . '">' . esc_html( $labels[ $i ] ) . '</text>';
		}
	} else {
		$min    = min( $values );
		$max    = max( $values );
		$pad    = ( $max - $min ) * 0.18;
		$lo     = $min - $pad;
		$hi     = $max + $pad;
		$points = array();
		foreach ( $values as $i => $v ) {
			$points[] = array( round( $left + $step * $i + $step / 2, 1 ), round( $base - ( $base - $top ) * ( $v - $lo ) / ( $hi - $lo ), 1 ) );
		}
		$line = implode( ' ', array_map( static function ( $pt ) { return $pt[0] . ',' . $pt[1]; }, $points ) );
		$last = end( $points );
		$out .= '<polygon class="icl-uc-area" points="' . $points[0][0] . ',' . $base . ' ' . $line . ' ' . $last[0] . ',' . $base . '"/>';
		if ( $event ) {
			$ex   = $points[ $mark ][0];
			$out .= '<line class="icl-uc-event" x1="' . $ex . '" x2="' . $ex . '" y1="' . ( $top - 14 ) . '" y2="' . $base . '"/>';
			$out .= '<text class="icl-uc-event-lab" x="' . $ex . '" y="' . ( $top - 20 ) . '">' . esc_html( strtoupper( $event ) ) . '</text>';
		}
		$out .= '<polyline class="icl-uc-line" pathLength="1" points="' . $line . '"/>';
		foreach ( $points as $i => $pt ) {
			$out .= '<circle class="icl-uc-dot" cx="' . $pt[0] . '" cy="' . $pt[1] . '" r="4.5"/>';
			$out .= '<text class="icl-uc-val" x="' . $pt[0] . '" y="' . ( $pt[1] - 11 ) . '">' . esc_html( $shown[ $i ] ) . '</text>';
			$out .= '<text class="icl-uc-lab" x="' . $pt[0] . '" y="' . ( $base + 22 ) . '">' . esc_html( $labels[ $i ] ) . '</text>';
		}
	}
	return $out . '</svg>';
};

$icl_faqs = array(
	array( 'What is INFOFISCUS Conversa?', 'An enterprise decision intelligence platform that helps business teams ask complex questions, investigate what changed and why, identify key drivers, and turn governed enterprise data into trusted, decision-ready insights.' ),
	array( 'How is Conversa different from traditional business intelligence tools?', 'Traditional BI tools are built to monitor known metrics through dashboards and reports. Conversa adds an investigative layer: teams ask new questions, see what changed and why, and get the drivers and recommended actions behind the numbers.' ),
	array( 'Can Conversa investigate complex business questions?', 'Yes. Conversa breaks a question into steps: it compares periods, breaks results down by dimension, follows the evidence to root causes and drivers, and returns a decision-ready answer.' ),
	array( 'Can Conversa work across multiple enterprise data platforms?', 'Yes. It connects to major platforms including Snowflake, Google BigQuery, Amazon Redshift, Azure Synapse, Oracle, SQL Server and PostgreSQL.' ),
	array( 'Does Conversa use business context and semantic intelligence?', 'Yes. Governed semantics keep metrics, terminology and business logic consistent, so answers use the same business definitions across teams.' ),
	array( 'Can Conversa work with enterprise documents?', 'Yes. Conversa can search PDFs, contracts, manuals, SOPs and reports alongside your data.' ),
	array( 'Can users inspect the analysis behind an answer?', 'Yes. Answers show the steps Conversa took and the SQL it generated, so analysts can check how each result was produced.' ),
	array( 'Is Conversa designed for enterprise security?', 'Yes. Queries run on your own cloud warehouse with its encryption and access controls, plus SSO, role-based access and audit trails.' ),
	array( 'Does Conversa replace Tableau or Power BI?', 'No. Conversa complements Tableau, Power BI and other BI tools by adding a conversational, investigative layer on top of your current analytics stack.' ),
	array( 'What is a Conversa Value Sprint?', 'It is the next step after a personalized demo: a focused engagement on your own business questions, so your team can see how Conversa investigates them.' ),
);

/**
 * Icon from the page sprite.
 *
 * @param string $name Symbol name.
 * @return string SVG markup.
 */
$icl_icon = static function ( $name ) {
	return '<svg class="icl-i" aria-hidden="true" focusable="false"><use href="#icl-' . esc_attr( $name ) . '"/></svg>';
};
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<main class="infometry-conversa-product icl-page" id="icl-top">
	<svg class="icl-sprite" aria-hidden="true" focusable="false">
		<symbol id="icl-check" viewBox="0 0 24 24"><path d="m5 12.5 4.5 4.5L19 7.5"/></symbol>
		<symbol id="icl-arrow" viewBox="0 0 24 24"><path d="M5 12h14M13 6l6 6-6 6"/></symbol>
		<symbol id="icl-play" viewBox="0 0 24 24"><circle cx="12" cy="12" r="9"/><path class="icl-solid" d="m10 8.5 5.5 3.5-5.5 3.5z"/></symbol>
		<symbol id="icl-code" viewBox="0 0 24 24"><path d="m8 7-5 5 5 5M16 7l5 5-5 5"/></symbol>
		<symbol id="icl-doc" viewBox="0 0 24 24"><path d="M7 3h7l5 5v13H7z"/><path d="M14 3v5h5M10 13h6M10 17h6"/></symbol>
		<symbol id="icl-db" viewBox="0 0 24 24"><ellipse cx="12" cy="5.5" rx="7" ry="2.5"/><path d="M5 5.5v13c0 1.4 3.1 2.5 7 2.5s7-1.1 7-2.5v-13M5 12c0 1.4 3.1 2.5 7 2.5s7-1.1 7-2.5"/></symbol>
		<symbol id="icl-clock" viewBox="0 0 24 24"><circle cx="12" cy="12" r="9"/><path d="M12 7v5l3 2"/></symbol>
		<symbol id="icl-chat" viewBox="0 0 24 24"><path d="M20 12a8 8 0 0 1-11.6 7.1L4 20l1-4.2A8 8 0 1 1 20 12z"/></symbol>
		<symbol id="icl-brain" viewBox="0 0 24 24"><path d="M9 3a4 4 0 0 0-4 4v1a4 4 0 0 0 0 8v1a4 4 0 0 0 7 2.6A4 4 0 0 0 19 17v-1a4 4 0 0 0 0-8V7a4 4 0 0 0-7-2.6A4 4 0 0 0 9 3Z"/><path d="M12 4v16"/></symbol>
		<symbol id="icl-search" viewBox="0 0 24 24"><circle cx="11" cy="11" r="6.5"/><path d="m20 20-4.2-4.2"/></symbol>
		<symbol id="icl-target" viewBox="0 0 24 24"><circle cx="12" cy="12" r="9"/><circle cx="12" cy="12" r="5"/><circle cx="12" cy="12" r="1.5"/></symbol>
		<symbol id="icl-shield" viewBox="0 0 24 24"><path d="m12 3 7 3v6c0 4.5-3 7.6-7 9-4-1.4-7-4.5-7-9V6z"/><path d="m9 12 2 2 4-4"/></symbol>
		<symbol id="icl-nodes" viewBox="0 0 24 24"><circle cx="6" cy="6" r="2.5"/><circle cx="18" cy="6" r="2.5"/><circle cx="12" cy="18" r="2.5"/><path d="M8 7.5 11 15.5M16 7.5 13 15.5M8.5 6h7"/></symbol>
		<symbol id="icl-lock" viewBox="0 0 24 24"><rect x="5" y="10" width="14" height="10" rx="2"/><path d="M8 10V7a4 4 0 0 1 8 0v3"/></symbol>
		<symbol id="icl-bank" viewBox="0 0 24 24"><path d="m3 10 9-6 9 6H3Z"/><path d="M5 10v8M9 10v8M15 10v8M19 10v8M3 20h18"/></symbol>
		<symbol id="icl-chart" viewBox="0 0 24 24"><path d="M4 19V5M4 19h16"/><path d="m7 15 4-4 3 3 5-7"/></symbol>
		<symbol id="icl-spark" viewBox="0 0 24 24"><path d="M12 3c.6 4.6 2.4 6.4 7 7-4.6.6-6.4 2.4-7 7-.6-4.6-2.4-6.4-7-7 4.6-.6 6.4-2.4 7-7z"/></symbol>
		<symbol id="icl-users" viewBox="0 0 24 24"><circle cx="9" cy="8" r="3.5"/><path d="M2.5 20a6.5 6.5 0 0 1 13 0"/><path d="M16 4.5a3.5 3.5 0 0 1 0 7M18 14a6 6 0 0 1 3.5 6"/></symbol>
		<symbol id="icl-x" viewBox="0 0 24 24"><path d="M7 7l10 10M17 7 7 17"/></symbol>
	</svg>

	<header class="icl-topbar" data-icl-topbar>
		<div class="icl-shell icl-hero-brand">
			<img class="icl-logo" src="<?php echo esc_url( $icl_logo ); ?>" width="428" height="65" fetchpriority="high" decoding="async" alt="Infometry Inc. Enabling AI for Every Enterprise">
			<a class="icl-btn icl-btn-primary icl-btn-sm" href="#icl-demo" data-icl-demo>Request a Demo <?php echo $icl_icon( 'arrow' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></a>
		</div>
	</header>

	<section class="icl-hero" aria-labelledby="icl-hero-title">
		<div class="icl-hero-bg" aria-hidden="true"><i></i><i></i><i></i></div>
		<div class="icl-shell icl-hero-grid">
			<div class="icl-hero-copy">
				<p class="icl-pill"><span class="icl-pulse" aria-hidden="true"></span>INFOFISCUS Conversa™</p>
				<h1 id="icl-hero-title">Turn Enterprise Data Into <span>Trusted Decisions.</span></h1>
				<p class="icl-hero-lead">INFOFISCUS Conversa helps enterprise teams investigate complex business questions, uncover why business performance changes, and identify the drivers, risks and opportunities behind the numbers, so leaders can make confident, informed decisions.</p>
				<div class="icl-actions">
					<a class="icl-btn icl-btn-primary" href="#icl-demo" data-icl-demo>Book a Live Demo <?php echo $icl_icon( 'arrow' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></a>
					<a class="icl-btn icl-btn-ghost" href="#icl-tour" data-icl-tour><?php echo $icl_icon( 'play' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>Try the interactive demo</a>
				</div>
				<ul class="icl-hero-points">
					<li><?php echo $icl_icon( 'shield' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?><span>Trusted<br>Answers</span></li>
					<li><?php echo $icl_icon( 'search' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?><span>Deeper<br>Analysis</span></li>
					<li><?php echo $icl_icon( 'target' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?><span>Actionable<br>Insights</span></li>
					<li><?php echo $icl_icon( 'lock' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?><span>Enterprise-Grade<br>Security</span></li>
				</ul>
			</div>
			<div class="icl-form-card" id="icl-demo">
				<?php $icl_status = isset( $_GET['icl_lead'] ) ? sanitize_key( wp_unslash( $_GET['icl_lead'] ) ) : ''; // phpcs:ignore WordPress.Security.NonceVerification.Recommended ?>
				<form class="icl-form" method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" data-icl-form novalidate>
					<p class="icl-form-badge"><span class="icl-pulse" aria-hidden="true"></span>Personalized demo</p>
					<h3>See How Conversa Investigates Your Business Questions</h3>
					<p class="icl-form-intro">Discover how INFOFISCUS Conversa helps your team investigate business performance, uncover key drivers and turn governed enterprise data into decision-ready insights.</p>
					<input type="hidden" name="action" value="infometry_landing_lead">
					<input type="hidden" name="icl_t" value="" data-icl-time>
					<input type="hidden" name="icl_url" value="" data-icl-url>
					<div class="icl-hp" aria-hidden="true"><label>Website <input type="text" name="icl_website" tabindex="-1" autocomplete="off"></label></div>
					<label for="icl-name">Full name</label>
					<input id="icl-name" type="text" name="icl_name" placeholder="Jane Smith" autocomplete="name" maxlength="120" required>
					<label for="icl-email">Company email</label>
					<input id="icl-email" type="email" name="icl_email" placeholder="jane@company.com" autocomplete="email" maxlength="160" required>
					<label for="icl-company">Company</label>
					<input id="icl-company" type="text" name="icl_company" placeholder="Company name" autocomplete="organization" maxlength="160" required>
					<label for="icl-phone">Contact number <span>(optional)</span></label>
					<input id="icl-phone" type="tel" name="icl_phone" placeholder="+1 555 000 0000" autocomplete="tel" maxlength="40">
					<button class="icl-btn icl-btn-primary icl-submit" type="submit">Request My Personalized Demo <?php echo $icl_icon( 'arrow' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></button>
					<p class="icl-form-msg<?php echo 'ok' === $icl_status ? ' is-ok' : ( 'error' === $icl_status ? ' is-error' : '' ); ?>" role="status" aria-live="polite" data-icl-msg><?php
					if ( 'ok' === $icl_status ) {
						echo esc_html( 'Thank you. Our analytics team will connect with you to schedule a time.' );
					} elseif ( 'error' === $icl_status ) {
						echo esc_html( 'Please enter your full name, a valid company email and your company.' );
					}
					?></p>
				</form>
				<p class="icl-form-note"><?php echo $icl_icon( 'lock' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>Our analytics team will connect with you to schedule a time.</p>
			</div>
		</div>
	</section>

	<section class="icl-proof" aria-label="Results and customers">
		<div class="icl-shell">
			<div class="icl-proof-card" data-icl-reveal>
				<div class="icl-stats">
					<?php foreach ( $icl_stats as $stat ) : ?>
						<div class="icl-stat"><strong><span data-icl-count="<?php echo esc_attr( $stat[0] ); ?>"><?php echo esc_html( $stat[0] ); ?></span><?php echo esc_html( $stat[1] ); ?></strong><span><?php echo esc_html( $stat[2] ); ?></span></div>
					<?php endforeach; ?>
				</div>
				<div class="icl-trust">
					<h2 class="icl-trust-title">Infometry is trusted by 150+ customers worldwide</h2>
					<div class="icl-logos" role="region" aria-label="Customer logos">
						<div class="icl-logos-track">
							<?php for ( $loop = 0; $loop < 2; $loop++ ) : ?>
								<?php foreach ( $icl_customers as $customer ) : ?>
									<span class="icl-logo-item"<?php echo $loop ? ' aria-hidden="true"' : ''; ?>><img src="<?php echo esc_url( INFOMETRY_CT_URL . 'assets/images/' . $customer[1] ); ?>" width="<?php echo esc_attr( $customer[2] ); ?>" height="<?php echo esc_attr( $customer[3] ); ?>" loading="lazy" decoding="async" alt="<?php echo $loop ? '' : esc_attr( $customer[0] ); ?>"></span>
								<?php endforeach; ?>
							<?php endfor; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="icl-section icl-problem" aria-labelledby="icl-problem-title">
		<div class="icl-shell icl-problem-layout">
			<div class="icl-problem-copy" data-icl-reveal>
				<p class="icl-kicker">The decision gap</p>
				<h2 id="icl-problem-title">Your Dashboards Show What Changed. Your Leaders Still Need to Know Why.</h2>
				<p class="icl-lead">Business leaders need more than another report. They need to investigate unexpected results, understand contributing factors and identify where action is required.</p>
				<a class="icl-btn icl-btn-primary" href="#icl-demo" data-icl-demo>See how Conversa closes the gap <?php echo $icl_icon( 'arrow' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></a>
			</div>
			<div class="icl-gap-card" data-icl-reveal>
				<div class="icl-gap-head">
					<span class="icl-gap-icon" aria-hidden="true"><?php echo $icl_icon( 'search' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span>
					<div><b>Where business answers get stuck</b><small>The four gaps Conversa closes</small></div>
				</div>
				<ol class="icl-gap-list">
					<?php foreach ( $icl_problems as $i => $problem ) : ?>
						<li class="<?php echo esc_attr( $problem[1] ); ?>"><span class="icl-tile"><?php echo $icl_icon( $problem[0] ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span><div><h3><?php echo esc_html( $problem[2] ); ?></h3><p><?php echo esc_html( $problem[3] ); ?></p></div><em aria-hidden="true">0<?php echo esc_html( $i + 1 ); ?></em></li>
					<?php endforeach; ?>
				</ol>
			</div>
		</div>
	</section>

	<section class="icl-section icl-alt icl-how" aria-labelledby="icl-how-title">
		<div class="icl-shell">
			<div class="icl-head" data-icl-reveal>
				<p class="icl-kicker">How enterprise decision intelligence works</p>
				<h2 id="icl-how-title">From business question to trusted decision</h2>
			</div>
			<div class="icl-stepper" data-icl-stepper>
				<ol class="icl-steps" role="tablist" aria-label="How Conversa answers a question">
					<?php foreach ( $icl_steps as $i => $step ) : ?>
						<li role="presentation">
							<button type="button" class="icl-step<?php echo 0 === $i ? ' is-active' : ''; ?>" role="tab" aria-selected="<?php echo 0 === $i ? 'true' : 'false'; ?>" data-icl-step="<?php echo esc_attr( $i ); ?>">
								<span class="icl-step-num"><?php echo esc_html( $i + 1 ); ?></span>
								<span class="icl-step-icon"><?php echo $icl_icon( $step[0] ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span>
								<b><?php echo esc_html( $step[1] ); ?></b>
								<small><?php echo esc_html( $step[2] ); ?></small>
								<i class="icl-step-bar" aria-hidden="true"></i>
							</button>
						</li>
					<?php endforeach; ?>
				</ol>
				<div class="icl-example" data-icl-reveal>
					<div class="icl-example-head">
						<h3 data-icl-ex="0"><span class="icl-q-dot" aria-hidden="true"><?php echo $icl_icon( 'chat' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span><span><small>Retail example · Retail Ops Director</small>Which promotions are causing customers to buy impulsively and then return products later?</span></h3>
						<span class="icl-formula">KPIs + Context + Drivers = Action</span>
					</div>
					<div class="icl-context" data-icl-ex="1">
						<small>Data and context used</small>
						<?php foreach ( $icl_context as $item ) : ?>
							<span><?php echo esc_html( $item ); ?></span>
						<?php endforeach; ?>
					</div>
					<div class="icl-example-body">
						<ol class="icl-trail">
							<?php foreach ( $icl_trail as $i => $row ) : ?>
								<li data-icl-ex="<?php echo esc_attr( $row[0] ); ?>"><span class="icl-trail-num"><?php echo esc_html( $i + 1 ); ?></span><p><?php echo esc_html( $row[1] ); ?></p><strong class="<?php echo esc_attr( $row[3] ); ?>"><?php echo esc_html( $row[2] ); ?></strong></li>
							<?php endforeach; ?>
						</ol>
						<div class="icl-bars" data-icl-ex="2">
							<small>Return amount by promotion</small>
							<?php foreach ( $icl_channels as $ch ) : ?>
								<div class="icl-bar <?php echo esc_attr( $ch[2] ); ?>"><span><?php echo esc_html( $ch[0] ); ?></span><i style="--w:<?php echo esc_attr( max( 3, round( $ch[1] / 30.9 * 100 ) ) ); ?>%"></i><b>$<?php echo esc_html( number_format( $ch[1], 1 ) ); ?>M</b></div>
							<?php endforeach; ?>
						</div>
					</div>
					<div class="icl-verdict" data-icl-ex="4">
						<div class="icl-verdict-kpi"><strong>28.0%</strong><span>Highest return rate<br>25% Off Sitewide, vs 14.4% for BOGO Beauty</span></div>
						<p class="icl-action-note"><b>Recommended action:</b> Tighten return windows on 25% Off Sitewide, replace deep apparel discounts with loyalty offers, and flag repeat buy-and-return customers for review.</p>
					</div>
					<div class="icl-example-cta">
						<a class="icl-btn icl-btn-primary" href="#icl-demo" data-icl-demo>See this on your own data <?php echo $icl_icon( 'arrow' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></a>
						<span>Bring your own business questions and watch Conversa investigate them.</span>
					</div>
					<p class="icl-demo-note">Illustrative data from the Conversa demo environment.</p>
				</div>
			</div>
		</div>
	</section>

	<section class="icl-section icl-dark icl-tour" id="icl-tour" aria-labelledby="icl-tour-title">
		<div class="icl-hero-bg" aria-hidden="true"><i></i><i></i></div>
		<div class="icl-shell icl-tour-grid">
			<div class="icl-tour-copy" data-icl-reveal>
				<p class="icl-kicker">Interactive demo</p>
				<h2 id="icl-tour-title">Explore How Conversa Investigates <span class="icl-grad-text">Real Business Questions</span></h2>
				<p class="icl-tour-lead">Explore how Conversa moves from complex business questions to trusted answers, deeper investigation, key drivers and decision-ready insights across different business domains.</p>
				<ol class="icl-tour-how" aria-label="How to use the demo">
					<li><b>1</b>Pick an industry</li>
					<li><b>2</b>Open a chat</li>
					<li><b>3</b>Click the charts</li>
				</ol>
				<ul class="icl-tour-points">
					<?php foreach ( $icl_demo_points as $point ) : ?>
						<li class="<?php echo esc_attr( $point[1] ); ?>"><span class="icl-tile"><?php echo $icl_icon( $point[0] ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span><?php echo esc_html( $point[2] ); ?></li>
					<?php endforeach; ?>
				</ul>
				<div class="icl-tour-cta">
					<a class="icl-btn icl-btn-primary" href="#icl-demo" data-icl-demo>Book a Live Demo <?php echo $icl_icon( 'arrow' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></a>
					<span>See it on your own business questions</span>
				</div>
			</div>
			<div class="icl-tour-demo">
				<?php
				// Home screen copy inside the product tour (the Conversa product page keeps its own).
				$lv_home_title    = 'Decision Intelligence That Goes <span>Beyond Traditional Analytics.</span>';
				$lv_home_copy     = 'INFOFISCUS Conversa helps business teams investigate complex questions, understand performance drivers and uncover insights across governed enterprise data.';
				$lv_show_demo_cta = true; // Show the in-demo request-demo CTA and nudge on the ads landing page only.
				include INFOMETRY_CT_PATH . 'templates/partials/conversa-live-dashboard.php';
				?>
			</div>
		</div>
	</section>

	<section class="icl-section icl-alt icl-teams" aria-labelledby="icl-teams-title">
		<div class="icl-shell">
			<div class="icl-head" data-icl-reveal>
				<p class="icl-kicker">Decision intelligence use cases</p>
				<h2 id="icl-teams-title">Decision Intelligence for Your Most Important Business Priorities.</h2>
				<p class="icl-lead">Every answer drills down from the business question to the drivers behind it, and ends with a recommended action.</p>
			</div>
			<div class="icl-tabs" role="tablist" aria-label="Use cases">
				<?php $first = true; foreach ( $icl_uc as $key => $uc ) : ?>
					<button type="button" role="tab" id="icl-tab-<?php echo esc_attr( $key ); ?>" class="<?php echo empty( $uc['minor'] ) ? '' : 'is-minor'; ?>" aria-controls="icl-panel-<?php echo esc_attr( $key ); ?>" aria-selected="<?php echo $first ? 'true' : 'false'; ?>" tabindex="<?php echo $first ? '0' : '-1'; ?>" data-icl-tab><?php echo $icl_icon( $uc['icon'] ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?><?php echo esc_html( $uc['tab'] ); ?></button>
				<?php $first = false; endforeach; ?>
			</div>
			<?php $first = true; foreach ( $icl_uc as $key => $uc ) : ?>
				<div class="icl-uc" role="tabpanel" id="icl-panel-<?php echo esc_attr( $key ); ?>" aria-labelledby="icl-tab-<?php echo esc_attr( $key ); ?>" data-icl-panel<?php echo $first ? '' : ' hidden'; ?>>
					<div class="icl-uc-insight">
						<p class="icl-uc-label">Business insight</p>
						<h3><span class="icl-tile"><?php echo $icl_icon( $uc['icon'] ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span><?php echo esc_html( $uc['title'] ); ?></h3>
						<div class="icl-uc-question"><small>Business question</small><p><?php echo esc_html( $uc['question'] ); ?></p></div>
						<div class="icl-uc-found"><small>Conversa found</small><p><?php echo esc_html( $uc['found'] ); ?></p></div>
						<ol class="icl-uc-drivers">
							<?php foreach ( $uc['drivers'] as $i => $driver ) : ?>
								<li><span>0<?php echo esc_html( $i + 1 ); ?></span><?php echo esc_html( $driver ); ?></li>
							<?php endforeach; ?>
						</ol>
					</div>
					<div class="icl-uc-panel">
						<div class="icl-uc-panel-head">
							<div><h4><?php echo esc_html( $uc['chart'][0] ); ?></h4><p class="icl-uc-ai">AI-generated drill-down</p></div>
							<img src="<?php echo esc_url( INFOMETRY_CT_URL . 'assets/images/press-releases/conversa-slack/infofiscus-conversa-logo-white.png' ); ?>" width="667" height="147" loading="lazy" decoding="async" alt="INFOFISCUS Conversa">
						</div>
						<p class="icl-uc-sub"><?php echo esc_html( $uc['chart'][1] ); ?></p>
						<div class="icl-uc-chart"><?php echo $icl_uc_chart( $uc['chart'] ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></div>
						<div class="icl-uc-out">
							<article><span class="is-take"><?php echo $icl_icon( 'check' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span><div><small>Key takeaway</small><p><?php echo esc_html( $uc['takeaway'] ); ?></p></div></article>
							<article><span class="is-act"><?php echo $icl_icon( 'arrow' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span><div><small>Recommended action</small><p><?php echo esc_html( $uc['action'] ); ?></p></div></article>
						</div>
					</div>
					<div class="icl-uc-kpis">
						<?php foreach ( $uc['kpis'] as $kpi ) : ?>
							<div class="icl-uc-kpi <?php echo esc_attr( $kpi[3] ); ?>"><small><?php echo esc_html( $kpi[0] ); ?></small><strong><?php echo esc_html( $kpi[1] ); ?></strong><span><i aria-hidden="true"></i><?php echo esc_html( $kpi[2] ); ?></span></div>
						<?php endforeach; ?>
					</div>
				</div>
			<?php $first = false; endforeach; ?>
			<p class="icl-footnote">Illustrative examples from the Conversa demo environment.</p>
		</div>
	</section>

	<section class="icl-section icl-faq" aria-labelledby="icl-faq-title">
		<div class="icl-shell icl-faq-inner">
			<div class="icl-head icl-center" data-icl-reveal>
				<p class="icl-kicker">FAQ</p>
				<h2 id="icl-faq-title">Frequently asked questions</h2>
			</div>
			<?php foreach ( $icl_faqs as $i => $faq ) : ?>
				<details class="icl-faq-item"<?php echo 0 === $i ? ' open' : ''; ?>>
					<summary><?php echo esc_html( $faq[0] ); ?><span class="icl-faq-plus" aria-hidden="true"></span></summary>
					<p><?php echo esc_html( $faq[1] ); ?></p>
				</details>
			<?php endforeach; ?>
		</div>
	</section>

	<section class="icl-final icl-dark" aria-labelledby="icl-final-title">
		<div class="icl-hero-bg" aria-hidden="true"><i></i><i></i><i></i></div>
		<div class="icl-shell" data-icl-reveal>
			<h2 id="icl-final-title">Bring Your Most Important Business Questions to <span class="icl-grad-text">Conversa.</span></h2>
			<p>See how INFOFISCUS Conversa helps your organization investigate complex business questions, uncover what is driving performance and turn governed enterprise data into trusted, decision-ready insights.</p>
			<div class="icl-actions">
				<a class="icl-btn icl-btn-primary" href="#icl-demo" data-icl-demo>Request Your Personalized Conversa Demo <?php echo $icl_icon( 'arrow' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></a>
			</div>
		</div>
	</section>

	<footer class="icl-footer">
		<div class="icl-shell icl-footer-inner">
			<span>© <?php echo esc_html( gmdate( 'Y' ) ); ?> Infometry Inc. All Rights Reserved.</span>
			<a href="<?php echo esc_url( $icl_privacy_url ); ?>">Privacy Policy</a>
		</div>
	</footer>

	<script type="application/ld+json">
	<?php
	$icl_page_url = get_permalink();
	if ( ! $icl_page_url ) {
		$icl_page_url = home_url( '/' );
	}
	$icl_org_id = home_url( '/#organization' );
	$icl_faq_items = array_map(
		static function ( $faq ) {
			return array(
				'@type'          => 'Question',
				'name'           => $faq[0],
				'acceptedAnswer' => array( '@type' => 'Answer', 'text' => $faq[1] ),
			);
		},
		$icl_faqs
	);
	$icl_schema = array(
		'@context' => 'https://schema.org',
		'@graph'   => array(
			array(
				'@type'  => 'Organization',
				'@id'    => $icl_org_id,
				'name'   => 'Infometry Inc.',
				'url'    => home_url( '/' ),
				'logo'   => $icl_logo,
				'slogan' => 'Enabling AI for Every Enterprise',
			),
			array(
				'@type'             => 'SoftwareApplication',
				'name'              => 'INFOFISCUS Conversa',
				'applicationCategory' => 'BusinessApplication',
				'operatingSystem'   => 'Web, Windows, macOS',
				'url'               => $icl_page_url,
				'description'       => 'INFOFISCUS Conversa is an enterprise conversational AI and decision intelligence application that helps business teams investigate complex questions, uncover performance drivers and turn governed enterprise data into trusted, decision-ready insights.',
				'publisher'         => array( '@id' => $icl_org_id ),
				'offers'            => array(
					'@type'         => 'Offer',
					'price'         => '0',
					'priceCurrency' => 'USD',
					'description'   => 'Request a personalized demo',
				),
			),
			array(
				'@type'      => 'FAQPage',
				'mainEntity' => $icl_faq_items,
			),
		),
	);
	echo wp_json_encode( $icl_schema ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	?>
	</script>
</main>
<?php wp_footer(); ?>
</body>
</html>
