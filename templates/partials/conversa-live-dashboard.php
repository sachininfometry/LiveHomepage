<?php
/**
 * INFOFISCUS Conversa hero: a working miniature of the Conversa app that plays
 * through Home, a chat answer, Storybooks, the admin Dashboard and Connections
 * like a short product video, and can be clicked through by the visitor.
 *
 * Everything is rendered here in its finished state (charts included), so the
 * hero reads as a complete product screen before or without the script.
 * assets/js/infofiscus-conversa.js drives the tour; styles live at the end of
 * assets/css/infofiscus-conversa.css under .icp-live.
 *
 * @package Infometry_Custom_Templates
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$lv_img = INFOMETRY_CT_URL . 'assets/images/';

if ( ! function_exists( 'infometry_ct_lv_line_chart' ) ) {
	/**
	 * Area + line chart in a 320x150 view box.
	 *
	 * @param array  $values Data points, oldest first.
	 * @param float  $max    Top of the y axis.
	 * @param string $unit   Suffix for the axis labels.
	 * @return string SVG markup.
	 */
	function infometry_ct_lv_line_chart( $values, $max, $unit = '' ) {
		$left   = 30;
		$right  = 8;
		$top    = 10;
		$plot   = 128;
		$base   = $top + $plot;
		$step   = ( 320 - $left - $right ) / ( count( $values ) - 1 );
		$points = array();
		foreach ( $values as $i => $value ) {
			$points[] = round( $left + $step * $i, 1 ) . ',' . round( $top + $plot * ( 1 - $value / $max ), 1 );
		}
		$last = explode( ',', end( $points ) );
		$out  = '';
		foreach ( array( 0, 0.5, 1 ) as $k ) {
			$y    = round( $top + $plot * ( 1 - $k ), 1 );
			$out .= '<line class="lv-grid" x1="' . $left . '" x2="' . ( 320 - $right ) . '" y1="' . $y . '" y2="' . $y . '"/>';
			$out .= '<text class="lv-tick" x="' . ( $left - 6 ) . '" y="' . ( $y + 3 ) . '">' . esc_html( ( $max * $k ) . $unit ) . '</text>';
		}
		$out .= '<path class="lv-area" d="M' . $left . ',' . $base . ' L' . implode( ' L', $points ) . ' L' . $last[0] . ',' . $base . ' Z"/>';
		$out .= '<polyline class="lv-line" pathLength="1" points="' . implode( ' ', $points ) . '"/>';
		$out .= '<circle class="lv-dot" cx="' . $last[0] . '" cy="' . $last[1] . '" r="4"/>';
		return $out;
	}
}

$lv_nav = array(
	array( 'view' => 'home', 'icon' => 'home', 'label' => 'Home' ),
	array( 'view' => 'chat', 'icon' => 'edit', 'label' => 'New chat' ),
	array( 'view' => 'storybooks', 'icon' => 'book', 'label' => 'Storybooks' ),
	array( 'view' => 'dashboard', 'icon' => 'grid', 'label' => 'Dashboard' ),
	array( 'view' => 'connections', 'icon' => 'db', 'label' => 'Connections' ),
);

if ( ! function_exists( 'infometry_ct_lv_combo_chart' ) ) {
	/**
	 * Bars on the left axis and a line on the right axis, in a 560x160 view box.
	 * Rows are array( label, bar value, line value, flagged ); flagged bars are amber.
	 *
	 * @param array $chat One chat of a vertical in conversa-live-verticals.php.
	 * @return string SVG markup.
	 */
	function infometry_ct_lv_combo_chart( $chat ) {
		$rows = $chat['rows'];
		$band = ( 560 - 44 - 34 ) / count( $rows );
		$out  = '';
		foreach ( array( 0, 0.5, 1 ) as $k ) {
			$y    = round( 14 + 108 * ( 1 - $k ), 1 );
			$bar  = $chat['bar_max'] * $k;
			$out .= '<line class="lv-grid" x1="44" x2="526" y1="' . $y . '" y2="' . $y . '"/>';
			$out .= '<text class="lv-tick" x="38" y="' . ( $y + 3 ) . '">' . esc_html( $k ? sprintf( $chat['bar_fmt'], $bar ) : '0' ) . '</text>';
			$out .= '<text class="lv-tick is-right" x="532" y="' . ( $y + 3 ) . '">' . esc_html( $k ? sprintf( $chat['line_fmt'], $chat['line_max'] * $k ) : '0' ) . '</text>';
		}
		$out   .= '<g class="lv-bars">';
		$points = array();
		foreach ( $rows as $i => $row ) {
			$cx       = 44 + $band * $i + $band / 2;
			$y        = 14 + 108 * ( 1 - $row[1] / $chat['bar_max'] );
			$out     .= '<rect class="lv-bar' . ( ! empty( $row[3] ) ? ' is-low' : '' ) . '" x="' . round( $cx - $band * 0.26, 1 ) . '" y="' . round( $y, 1 ) . '" width="' . round( $band * 0.52, 1 ) . '" height="' . round( max( 1.5, 122 - $y ), 1 ) . '" rx="3"><title>' . esc_html( $row[0] . ': ' . sprintf( $chat['bar_fmt'], $row[1] ) . ' ' . $chat['legend'][0] ) . '</title></rect>';
			$out     .= '<text class="lv-val" x="' . round( $cx, 1 ) . '" y="' . round( $y - 4, 1 ) . '">' . esc_html( sprintf( $chat['bar_fmt'], $row[1] ) ) . '</text>';
			$out     .= '<text class="lv-lab" x="' . round( $cx, 1 ) . '" y="140">' . esc_html( $row[0] ) . '</text>';
			$points[] = round( $cx, 1 ) . ',' . round( 14 + 108 * ( 1 - $row[2] / $chat['line_max'] ), 1 );
		}
		$out .= '</g><g class="lv-vol"><polyline class="lv-line" pathLength="1" points="' . implode( ' ', $points ) . '"/>';
		foreach ( $points as $i => $point ) {
			list( $x, $y ) = explode( ',', $point );
			$out          .= '<circle class="lv-dot" cx="' . $x . '" cy="' . $y . '" r="3.5"><title>' . esc_html( $rows[ $i ][0] . ': ' . sprintf( $chat['line_fmt'], $rows[ $i ][2] ) . ' ' . $chat['legend'][2] ) . '</title></circle>';
		}
		return $out . '</g>';
	}
}

if ( ! function_exists( 'infometry_ct_lv_pie_chart' ) ) {
	/**
	 * Donut with a legend in the same 560x160 view box. Slices are the bar values
	 * unless the chat's 'pie' entry lists its own values and format.
	 *
	 * @param array $chat One chat of a vertical in conversa-live-verticals.php.
	 * @return string SVG markup.
	 */
	function infometry_ct_lv_pie_chart( $chat ) {
		$colors = array( '#8b7cff', '#5b9cff', '#f472b6', '#4ade80', '#fbbf24', '#22d3ee', '#fb923c' );
		$values = isset( $chat['pie'][2] ) ? $chat['pie'][2] : array_map( function ( $row ) { return $row[1]; }, $chat['rows'] );
		$fmt    = isset( $chat['pie'][3] ) ? $chat['pie'][3] : $chat['bar_fmt'];
		$total  = array_sum( $values );
		$start  = 0;
		$out    = '<g class="lv-donut" transform="rotate(-90 190 78)">';
		foreach ( $values as $i => $value ) {
			$share = $value / $total;
			$out  .= '<circle class="lv-slice" cx="190" cy="78" r="52" pathLength="100" stroke="' . $colors[ $i % 7 ] . '" stroke-dasharray="' . round( max( 0.1, $share * 100 - 0.8 ), 2 ) . ' 100" stroke-dashoffset="' . round( -$start * 100, 2 ) . '" style="--d:' . ( $i * 0.08 ) . 's"><title>' . esc_html( $chat['rows'][ $i ][0] . ': ' . sprintf( $fmt, $value ) ) . '</title></circle>';
			$start += $share;
		}
		$out .= '</g><text class="lv-pie-total" x="190" y="80">' . esc_html( $chat['pie'][1] ) . '</text><text class="lv-pie-label" x="190" y="94">' . esc_html( strtoupper( $chat['pie'][0] ) ) . '</text>';
		$top  = 78 - ( count( $values ) - 1 ) * 8.5;
		foreach ( $values as $i => $value ) {
			$y    = round( $top + $i * 17, 1 );
			$out .= '<rect x="300" y="' . ( $y - 6 ) . '" width="9" height="9" rx="2.5" fill="' . $colors[ $i % 7 ] . '"/>';
			$out .= '<text class="lv-pie-key" x="316" y="' . ( $y + 2 ) . '">' . esc_html( $chat['rows'][ $i ][0] ) . '</text>';
			$out .= '<text class="lv-pie-val" x="470" y="' . ( $y + 2 ) . '">' . esc_html( sprintf( $fmt, $value ) . ' · ' . round( $value / $total * 100 ) . '%' ) . '</text>';
		}
		return $out;
	}
}

// Industry verticals: Retail by default; each has its own agent and chats.
$lv_verticals = include INFOMETRY_CT_PATH . 'templates/partials/conversa-live-verticals.php';
$lv_default   = 'retail';


$lv_recent = array(
	array( 'title' => 'Sales performance for the Canada region', 'agent' => 'mistral_gbq_agent', 'db' => 'GBQ_CONN', 'yaml' => 'MIK_SALES_ANALYTICS.yaml', 'time' => 'Oct 27, 8:31 PM' ),
	array( 'title' => 'High sales volume but low revenue?', 'agent' => 'gemini_GBQ_agent', 'db' => 'Conn_BIGQUERY', 'yaml' => 'ORDER_ANALYSIS_VIEWS.yaml', 'time' => 'Oct 27, 8:30 PM' ),
);

$lv_storybooks = array(
	array( 'tone' => 'is-violet', 'title' => 'Finance', 'copy' => 'Finance department', 'chats' => 2, 'people' => 1, 'date' => 'Oct 27' ),
	array( 'tone' => 'is-blue', 'title' => 'Sales Ops', 'copy' => 'Pipeline and bookings', 'chats' => 5, 'people' => 3, 'date' => 'Oct 26' ),
	array( 'tone' => 'is-teal', 'title' => 'Supply Chain', 'copy' => 'Inventory and vendors', 'chats' => 3, 'people' => 2, 'date' => 'Oct 24' ),
);

// Admin dashboard: one panel per tab.
$lv_dash = array(
	'overview'    => array(
		'label' => 'Overview',
		'kpis'  => array(
			array( 'users', 'Daily Active Users', '128', 'Live today' ),
			array( 'bolt', 'Active Sessions', '452', '4.9 prompts / session' ),
			array( 'shield', 'DAU / MAU Stickiness', '50.0%', 'Healthy' ),
			array( 'spark', 'All-time Prompts', '28,150', '22.3M tokens' ),
		),
		'line'  => array( 'Daily Active Users', 'Unique users who sent a prompt', array( 62, 70, 68, 84, 91, 88, 97, 110, 104, 118, 126, 121, 133, 128 ), 150, '' ),
		'bars'  => array( 'Subject Area Usage', array( array( 'Sales', 2026, 100 ), array( 'General', 540, 27 ), array( 'Finance', 312, 16 ), array( 'Inventory', 148, 8 ), array( 'Operations', 95, 5 ) ) ),
	),
	'performance' => array(
		'label' => 'Performance',
		'kpis'  => array(
			array( 'bolt', 'Avg SQL Exec', '1.2 s', 'Fast' ),
			array( 'spark', 'Avg SQL Generation', '2.4 s', 'Gemini 2.5 Pro' ),
			array( 'grid', 'Avg End-to-End', '6.8 s', 'Down 31% this month' ),
			array( 'check', 'Success Rate', '94%', 'Last 30 days' ),
		),
		'line'  => array( 'Avg Response Time', 'Seconds, lower is better', array( 9.8, 9.1, 8.7, 8.9, 8.2, 7.9, 7.6, 7.8, 7.3, 7.1, 7.0, 6.9, 6.8, 6.8 ), 12, 's' ),
		'bars'  => array( 'Failures by Stage', array( array( 'SQL Execution', 33, 100 ), array( 'SQL Generation', 12, 36 ), array( 'Summary', 3, 9 ) ) ),
	),
	'tokens'      => array(
		'label' => 'Tokens',
		'kpis'  => array(
			array( 'spark', 'Total Tokens', '22.3M', 'Input + output' ),
			array( 'db', 'Input Tokens', '21.7M', 'Context and SQL' ),
			array( 'edit', 'Output Tokens', '564K', 'Answers and charts' ),
			array( 'users', 'Avg per Prompt', '8.1K', 'All roles' ),
		),
		'line'  => array( 'Tokens per Day', 'Millions of tokens', array( 0.4, 0.6, 0.5, 0.9, 1.1, 0.8, 1.2, 1.5, 1.3, 1.6, 1.9, 1.7, 2.1, 1.8 ), 2.5, 'M' ),
		'bars'  => array( 'Tokens by Team', array( array( 'Finance', '9.8M', 100 ), array( 'Sales Ops', '6.4M', 65 ), array( 'Supply Chain', '3.9M', 40 ), array( 'Marketing', '2.2M', 22 ) ) ),
	),
);

$lv_databases = array(
	array( 'name' => 'Snowflake', 'logo' => 'tech-logos/snowflake-mark.png', 'size' => array( 182, 182 ), 'count' => 4 ),
	array( 'name' => 'Databricks', 'logo' => 'databricks-mark.png', 'size' => array( 80, 72 ), 'count' => 2 ),
	array( 'name' => 'BigQuery', 'logo' => 'google-cloud-mark.png', 'size' => array( 224, 224 ), 'count' => 3 ),
	array( 'name' => 'MySQL', 'badge' => 'My', 'tone' => 'is-mysql', 'count' => 1 ),
	array( 'name' => 'Oracle', 'logo' => 'tech-logos/oracle-mark.png', 'size' => array( 224, 142 ), 'count' => 1 ),
	array( 'name' => 'PostgreSQL', 'badge' => 'Pg', 'tone' => 'is-pg', 'count' => 2 ),
	array( 'name' => 'SQL-Server', 'logo' => 'tech-logos/sql-server-mark.png', 'size' => array( 191, 208 ), 'count' => 1 ),
	array( 'name' => 'ClickHouse', 'badge' => '', 'tone' => 'is-ch', 'count' => 1 ),
	array( 'name' => 'Azure Synapse', 'badge' => 'Az', 'tone' => 'is-az', 'count' => 1 ),
);

// Connections > Permissions: users the visitor can grant access to RETAIL_INVENTORY_AGENT.
$lv_users = array(
	array( 'FA', 'Finance Analyst', 'Finance team', true ),
	array( 'SO', 'Store Ops Lead', 'Store operations', true ),
	array( 'LP', 'Loss Prevention', 'Loss prevention team', false ),
);

$lv_policies = array(
	array( 'Mask customer PII', 'Email, phone and card columns are masked for every agent', true ),
	array( 'Row-level security by region', 'Store managers only see their own region', true ),
	array( 'Block raw cost columns', 'Unit cost hidden from non-finance roles', false ),
);

$lv_agents = array(
	array( 'name' => 'OpenAI', 'logo' => 'llm-marks/openai-mark.png', 'size' => array( 96, 96 ), 'count' => 6 ),
	array( 'name' => 'Gemini', 'logo' => 'llm-marks/gemini-mark.png', 'size' => array( 96, 96 ), 'count' => 36 ),
	array( 'name' => 'Claude', 'logo' => 'llm-marks/claude-mark.png', 'size' => array( 96, 96 ), 'count' => 5 ),
	array( 'name' => 'Mistral AI', 'logo' => 'llm-marks/mistral-ai-mark.png', 'size' => array( 96, 96 ), 'count' => 3 ),
	array( 'name' => 'Cortex Analyst', 'logo' => 'tech-logos/snowflake-mark.png', 'size' => array( 182, 182 ), 'count' => 2 ),
	array( 'name' => 'INFOFISCUS SLM', 'logo' => 'infofiscus-conversa-mark.png', 'size' => array( 141, 120 ), 'count' => 1 ),
);
?>
<div class="icp-live" data-icp-live role="region" aria-roledescription="product tour" aria-label="INFOFISCUS Conversa product tour">
	<svg class="lv-sprite" aria-hidden="true" focusable="false">
		<symbol id="lv-home" viewBox="0 0 24 24"><path d="M3.5 11 12 4l8.5 7v8.5a1 1 0 0 1-1 1H15v-6H9v6H4.5a1 1 0 0 1-1-1z"/></symbol>
		<symbol id="lv-edit" viewBox="0 0 24 24"><path d="M4 20h4L19 9l-4-4L4 16z"/><path d="m14 6 4 4"/></symbol>
		<symbol id="lv-book" viewBox="0 0 24 24"><path d="M5 5a2 2 0 0 1 2-2h12v15H7a2 2 0 0 0-2 2z"/><path d="M5 20a2 2 0 0 0 2 1h12v-3"/></symbol>
		<symbol id="lv-grid" viewBox="0 0 24 24"><rect x="4" y="4" width="7" height="7" rx="1.6"/><rect x="13" y="4" width="7" height="7" rx="1.6"/><rect x="4" y="13" width="7" height="7" rx="1.6"/><rect x="13" y="13" width="7" height="7" rx="1.6"/></symbol>
		<symbol id="lv-db" viewBox="0 0 24 24"><ellipse cx="12" cy="5.5" rx="7" ry="2.5"/><path d="M5 5.5v13c0 1.4 3.1 2.5 7 2.5s7-1.1 7-2.5v-13"/><path d="M5 12c0 1.4 3.1 2.5 7 2.5s7-1.1 7-2.5"/></symbol>
		<symbol id="lv-chat" viewBox="0 0 24 24"><path d="M20 12a8 8 0 0 1-11.6 7.1L4 20l1-4.2A8 8 0 1 1 20 12z"/></symbol>
		<symbol id="lv-send" viewBox="0 0 24 24"><path d="m4 12 16-8-6 16-2.5-6.5z"/></symbol>
		<symbol id="lv-users" viewBox="0 0 24 24"><circle cx="9" cy="8" r="3.5"/><path d="M2.5 20a6.5 6.5 0 0 1 13 0"/><path d="M16 4.5a3.5 3.5 0 0 1 0 7M18 14a6 6 0 0 1 3.5 6"/></symbol>
		<symbol id="lv-check" viewBox="0 0 24 24"><path d="m5 12.5 4.5 4.5L19 7.5"/></symbol>
		<symbol id="lv-spark" viewBox="0 0 24 24"><path d="M12 3c.6 4.6 2.4 6.4 7 7-4.6.6-6.4 2.4-7 7-.6-4.6-2.4-6.4-7-7 4.6-.6 6.4-2.4 7-7z"/></symbol>
		<symbol id="lv-shield" viewBox="0 0 24 24"><path d="m12 3 7 3v6c0 4.5-3 7.6-7 9-4-1.4-7-4.5-7-9V6z"/></symbol>
		<symbol id="lv-bolt" viewBox="0 0 24 24"><path d="M13 3 5 14h6l-1 7 8-11h-6z"/></symbol>
		<symbol id="lv-search" viewBox="0 0 24 24"><circle cx="11" cy="11" r="6.5"/><path d="m20 20-4.2-4.2"/></symbol>
		<symbol id="lv-play" viewBox="0 0 24 24"><path class="lv-solid" d="M8 5v14l11-7z"/></symbol>
		<symbol id="lv-code" viewBox="0 0 24 24"><path d="m8 7-5 5 5 5M16 7l5 5-5 5"/></symbol>
		<symbol id="lv-chev" viewBox="0 0 24 24"><path d="m9 6 6 6-6 6"/></symbol>
		<symbol id="lv-table" viewBox="0 0 24 24"><rect x="3.5" y="4.5" width="17" height="15" rx="1.8"/><path d="M3.5 9.5h17M3.5 14.5h17M9.5 9.5v10"/></symbol>
		<symbol id="lv-bars" viewBox="0 0 24 24"><path d="M6 20v-7M12 20V5M18 20v-10"/></symbol>
		<symbol id="lv-sliders" viewBox="0 0 24 24"><path d="M4 7h10M18 7h2M4 17h4M12 17h8"/><circle cx="16" cy="7" r="2"/><circle cx="10" cy="17" r="2"/></symbol>
		<symbol id="lv-pointer" viewBox="0 0 24 24"><path d="M9 11V5.5a1.5 1.5 0 0 1 3 0V11m0-1.5a1.5 1.5 0 0 1 3 0V12m0-1a1.5 1.5 0 0 1 3 0v4.5a5.5 5.5 0 0 1-5.5 5.5h-1A5.5 5.5 0 0 1 7 17l-2.3-4a1.5 1.5 0 0 1 2.6-1.5L9 14"/></symbol>
		<symbol id="lv-heart" viewBox="0 0 24 24"><path d="M12 20s-7.5-4.6-7.5-10.2A4.3 4.3 0 0 1 12 7.4a4.3 4.3 0 0 1 7.5 2.4C19.5 15.4 12 20 12 20z"/></symbol>
		<symbol id="lv-bag" viewBox="0 0 24 24"><path d="M5 8h14l-1 12H6z"/><path d="M9 10V7a3 3 0 0 1 6 0v3"/></symbol>
		<symbol id="lv-bank" viewBox="0 0 24 24"><path d="m3.5 9 8.5-5 8.5 5zM5 20.5h14M6.5 11v7M10 11v7M14 11v7M17.5 11v7"/></symbol>
		<symbol id="lv-monitor" viewBox="0 0 24 24"><rect x="3.5" y="4.5" width="17" height="11.5" rx="1.8"/><path d="M9 20h6M12 16v4"/></symbol>
		<symbol id="lv-nodes" viewBox="0 0 24 24"><circle cx="6" cy="6" r="2.2"/><circle cx="18" cy="6" r="2.2"/><circle cx="12" cy="18" r="2.2"/><path d="M8.2 6h7.6M7.1 8l3.8 8M16.9 8l-3.8 8"/></symbol>
		<symbol id="lv-lock" viewBox="0 0 24 24"><rect x="5" y="10.5" width="14" height="10" rx="2"/><path d="M8 10.5V7.5a4 4 0 0 1 8 0v3"/></symbol>
		<symbol id="lv-pause" viewBox="0 0 24 24"><path class="lv-solid" d="M7 5h3.5v14H7zM13.5 5H17v14h-3.5z"/></symbol>
		<linearGradient id="lv-g-bar" x1="0" y1="0" x2="0" y2="1"><stop offset="0" stop-color="#7b8cff"/><stop offset="1" stop-color="#4f46e5"/></linearGradient>
		<linearGradient id="lv-g-low" x1="0" y1="0" x2="0" y2="1"><stop offset="0" stop-color="#ffc061"/><stop offset="1" stop-color="#f97316"/></linearGradient>
		<linearGradient id="lv-g-area" x1="0" y1="0" x2="0" y2="1"><stop offset="0" stop-color="#2f8cff" stop-opacity=".38"/><stop offset="1" stop-color="#2f8cff" stop-opacity="0"/></linearGradient>
	</svg>

	<p class="lv-hint"><button type="button" class="lv-play" data-lv-play aria-label="Pause the product tour"><svg class="lv-i-pause" aria-hidden="true"><use href="#lv-pause"/></svg><svg class="lv-i-play" aria-hidden="true"><use href="#lv-play"/></svg></button><b>Interactive demo</b><span>Pick an industry, then click chats and charts</span></p>

	<div class="lv-app" data-lv-app>
		<div class="lv-chrome"><span class="lv-lights" aria-hidden="true"><i></i><i></i><i></i></span><span class="lv-chrome-title"><svg aria-hidden="true"><use href="#lv-shield"/></svg>INFOFISCUS Conversa <i aria-hidden="true">&middot;</i> <b data-lv-ws><?php echo esc_html( $lv_verticals[ $lv_default ]['label'] ); ?></b> workspace</span><span class="lv-live" aria-hidden="true"><i></i>Live</span></div>
		<p class="lv-toast" aria-live="polite"><svg aria-hidden="true"><use href="#lv-check"/></svg><span data-lv-toast>Retail workspace</span></p>
		<aside class="lv-side">
			<img class="lv-logo" src="<?php echo esc_url( $lv_img . 'press-releases/conversa-slack/infofiscus-conversa-logo-white.png' ); ?>" width="667" height="147" loading="lazy" decoding="async" title="INFOFISCUS Conversa" alt="INFOFISCUS Conversa logo">
			<nav class="lv-nav" aria-label="Conversa app sections">
				<?php foreach ( $lv_nav as $item ) : ?>
					<button type="button" class="lv-nav-item<?php echo 'chat' === $item['view'] ? ' is-active' : ''; ?>" data-lv-go="<?php echo esc_attr( $item['view'] ); ?>"<?php echo 'chat' === $item['view'] ? ' aria-current="page"' : ''; ?>><svg aria-hidden="true"><use href="#lv-<?php echo esc_attr( $item['icon'] ); ?>"/></svg><span><?php echo esc_html( $item['label'] ); ?></span></button>
				<?php endforeach; ?>
			</nav>
			<p class="lv-side-head">Chats</p>
			<?php foreach ( $lv_verticals as $vkey => $vertical ) : ?>
				<ul class="lv-chats" data-lv-vertical="<?php echo esc_attr( $vkey ); ?>"<?php echo $lv_default === $vkey ? '' : ' hidden'; ?>>
					<?php foreach ( $vertical['chats'] as $i => $chat ) : ?>
						<li><button type="button" class="lv-chat-item<?php echo 0 === $i ? ' is-active' : ''; ?>" data-lv-chat="<?php echo esc_attr( $vkey . '-' . $i ); ?>"<?php echo 0 === $i ? ' aria-current="true"' : ''; ?>><svg aria-hidden="true"><use href="#lv-chat"/></svg><span><?php echo esc_html( $chat['title'] ); ?></span></button></li>
					<?php endforeach; ?>
				</ul>
			<?php endforeach; ?>
		</aside>

		<div class="lv-main">
			<header class="lv-top">
				<p class="lv-crumb">Conversa <span>/</span> <b data-lv-crumb>New chat</b></p>
				<div class="lv-top-icons" aria-hidden="true"><svg><use href="#lv-db"/></svg><svg><use href="#lv-shield"/></svg><svg><use href="#lv-grid"/></svg></div>
				<?php foreach ( $lv_verticals as $vkey => $vertical ) : ?>
					<p class="lv-user" data-lv-vertical="<?php echo esc_attr( $vkey ); ?>"<?php echo $lv_default === $vkey ? '' : ' hidden'; ?>><span class="lv-avatar" aria-hidden="true"><?php echo esc_html( $vertical['user'][2] ); ?></span><span class="lv-user-name"><b><?php echo esc_html( $vertical['user'][0] ); ?></b><?php echo esc_html( $vertical['user'][1] ); ?></span></p>
				<?php endforeach; ?>
			</header>

			<div class="lv-views">
				<section class="lv-view lv-home" data-lv-view="home" aria-label="Home" hidden>
					<p class="lv-pill" data-in><i></i>INFOFISCUS Conversa 2.0 is live</p>
					<p class="lv-home-title" data-in>Bring data intelligence into <span>every decision with INFOFISCUS</span></p>
					<p class="lv-home-copy" data-in>The enterprise conversational AI platform that lets analysts and decision-makers chat with their data warehouses and semantic models.</p>
					<div class="lv-home-actions" data-in><span class="lv-btn is-primary" data-lv-target="start">Start Chatting</span><span class="lv-btn">Connections</span></div>
					<div class="lv-home-cards">
						<article data-in><span class="lv-icon"><svg aria-hidden="true"><use href="#lv-bolt"/></svg></span><b>Instant Insights</b><small>Query millions of rows in natural language.</small></article>
						<article data-in><span class="lv-icon"><svg aria-hidden="true"><use href="#lv-shield"/></svg></span><b>Enterprise Grade</b><small>Role-based access and audit logging built in.</small></article>
						<article data-in><span class="lv-icon"><svg aria-hidden="true"><use href="#lv-search"/></svg></span><b>Semantic Understanding</b><small>Understands business logic, not just schema.</small></article>
					</div>
				</section>

				<section class="lv-view lv-chat is-active" data-lv-view="chat" aria-label="Chat">
					<?php foreach ( $lv_verticals as $vkey => $vertical ) : ?>
						<div class="lv-agent-bar" data-lv-vertical="<?php echo esc_attr( $vkey ); ?>" data-agent="<?php echo esc_attr( $vertical['agent'] ); ?>"<?php echo $lv_default === $vkey ? '' : ' hidden'; ?>>
							<span class="lv-agent"><svg class="is-spark" aria-hidden="true"><use href="#lv-spark"/></svg><?php echo esc_html( $vertical['agent'] ); ?> <em>v2</em> <span class="lv-snow"><img src="<?php echo esc_url( $lv_img . $vertical['source'][1] ); ?>" width="<?php echo esc_attr( $vertical['source'][2] ); ?>" height="<?php echo esc_attr( $vertical['source'][3] ); ?>" loading="lazy" decoding="async" title="<?php echo esc_attr( ucfirst( $vertical['source'][0] ) ); ?>" alt="<?php echo esc_attr( ucfirst( $vertical['source'][0] ) . ' logo' ); ?>"><?php echo esc_html( $vertical['source'][0] ); ?></span></span>
							<span class="lv-agent"><svg class="is-spark" aria-hidden="true"><use href="#lv-spark"/></svg>Gemini 3.8 Flash</span>
							<span class="lv-agent is-extra"><svg aria-hidden="true"><use href="#lv-grid"/></svg>Default Layout</span>
							<span class="lv-agent is-extra"><svg aria-hidden="true"><use href="#lv-sliders"/></svg>Thresholds</span>
						</div>
					<?php endforeach; ?>
					<?php foreach ( $lv_verticals as $vkey => $vertical ) : ?>
						<?php foreach ( $vertical['chats'] as $i => $chat ) : ?>
						<?php
						$lv_rows = isset( $chat['table']['rows'] ) ? $chat['table']['rows'] : array_map(
							function ( $row ) use ( $chat ) {
								return array( $row[0], sprintf( $chat['bar_fmt'], $row[1] ), sprintf( $chat['line_fmt'], $row[2] ) );
							},
							$chat['rows']
						);
						?>
						<div class="lv-convo" data-lv-thread="<?php echo esc_attr( $vkey . '-' . $i ); ?>"<?php echo ( $lv_default === $vkey && 0 === $i ) ? '' : ' hidden'; ?>>
							<div class="lv-thread">
								<p class="lv-ask" data-lv-ask><?php echo esc_html( $chat['question'] ); ?></p>
								<div class="lv-reply">
									<div class="lv-answer">
										<p class="lv-thinking" aria-hidden="true"><i></i><i></i><i></i> <?php echo esc_html( $chat['thinking'] ); ?></p>
										<p class="lv-thought" data-in><svg aria-hidden="true"><use href="#lv-check"/></svg><span>Thought for <?php echo esc_html( $chat['thought'][0] ); ?> &middot; <?php echo esc_html( $chat['thought'][1] ); ?> steps</span><?php if ( $chat['thought'][2] ) : ?><em><svg aria-hidden="true"><use href="#lv-shield"/></svg>1 verified query</em><?php endif; ?></p>
										<div class="lv-sql" data-in>
											<button type="button" class="lv-sql-head" data-lv-sql aria-expanded="false"><svg aria-hidden="true"><use href="#lv-code"/></svg><b>SQL Generated</b><svg class="lv-chev" aria-hidden="true"><use href="#lv-chev"/></svg></button>
											<pre hidden><code><?php echo esc_html( $chat['sql'] ); ?></code></pre>
										</div>
										<div class="lv-table" data-in>
											<p class="lv-table-head"><svg aria-hidden="true"><use href="#lv-table"/></svg><b>Query Results - <?php echo esc_html( $chat['table']['title'] ); ?></b></p>
											<div class="lv-table-scroll">
												<table>
													<thead><tr><?php foreach ( $chat['table']['cols'] as $col ) : ?><th scope="col"><?php echo esc_html( $col ); ?></th><?php endforeach; ?></tr></thead>
													<tbody>
														<?php foreach ( array_slice( $lv_rows, 0, 5 ) as $row ) : ?>
															<tr><?php foreach ( $row as $c => $cell ) : ?><td<?php echo $c ? ' class="is-num"' : ''; ?>><?php echo esc_html( $cell ); ?></td><?php endforeach; ?></tr>
														<?php endforeach; ?>
													</tbody>
												</table>
											</div>
										</div>
										<p class="lv-summary" data-in><b>Executive Summary:</b> <?php echo wp_kses( $chat['summary'], array( 'b' => array() ) ); ?></p>
										<div class="lv-section" data-in>
											<p class="lv-section-title"><svg aria-hidden="true"><use href="#lv-spark"/></svg>Key Insights</p>
											<div class="lv-insights">
												<?php foreach ( $chat['insights'] as $insight ) : ?>
													<p><small><?php echo esc_html( $insight[0] ); ?></small><b data-lv-count><?php echo esc_html( $insight[1] ); ?></b><em><?php echo esc_html( $insight[2] ); ?></em></p>
												<?php endforeach; ?>
											</div>
										</div>
										<div class="lv-section" data-in>
											<p class="lv-section-title"><svg aria-hidden="true"><use href="#lv-check"/></svg>Strategic Action Plan</p>
											<ol class="lv-recs">
												<?php foreach ( $chat['recs'] as $n => $rec ) : ?>
													<li><span><?php echo esc_html( $n + 1 ); ?></span><?php echo esc_html( $rec ); ?></li>
												<?php endforeach; ?>
											</ol>
										</div>
										<div class="lv-viz" data-in data-type="combo">
											<div class="lv-viz-head"><b><svg aria-hidden="true"><use href="#lv-bars"/></svg>Data Visualization</b>
												<div class="lv-types" role="group" aria-label="Chart type">
													<button type="button" data-lv-type="bar">Bar</button>
													<button type="button" data-lv-type="line">Line</button>
													<button type="button" data-lv-type="pie">Pie</button>
													<button type="button" class="is-active" data-lv-type="combo" aria-pressed="true">Combo</button>
												</div>
											</div>
											<p class="lv-chart-title"><?php echo esc_html( $chat['chart'] ); ?></p>
											<p class="lv-legend"><span class="is-rev"><?php echo esc_html( $chat['legend'][0] ); ?></span><span class="is-low"><?php echo esc_html( $chat['legend'][1] ); ?></span><span class="is-vol"><?php echo esc_html( $chat['legend'][2] ); ?></span></p>
											<svg class="lv-combo lv-chart is-drawn" data-type="combo" viewBox="0 0 560 160" role="img" aria-label="<?php echo esc_attr( $chat['chart'] . ': ' . implode( ', ', array_map( function ( $row ) use ( $chat ) { return $row[0] . ' ' . sprintf( $chat['bar_fmt'], $row[1] ) . ', ' . sprintf( $chat['line_fmt'], $row[2] ); }, $chat['rows'] ) ) ); ?>"><?php echo infometry_ct_lv_combo_chart( $chat ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- numeric SVG, labels escaped in the helper. ?></svg>
											<svg class="lv-pie lv-chart is-drawn" viewBox="0 0 560 160" role="img" aria-label="<?php echo esc_attr( $chat['pie'][0] . ' share, total ' . $chat['pie'][1] ); ?>"><?php echo infometry_ct_lv_pie_chart( $chat ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- numeric SVG, labels escaped in the helper. ?></svg>
										</div>
									</div>
								</div>
							</div>
						</div>
						<?php endforeach; ?>
					<?php endforeach; ?>
					<div class="lv-input"><span data-lv-input>Ask <?php echo esc_html( $lv_verticals[ $lv_default ]['agent'] ); ?>...</span><span class="lv-send" data-lv-target="send"><svg aria-hidden="true"><use href="#lv-send"/></svg></span></div>
				</section>

				<section class="lv-view lv-books" data-lv-view="storybooks" aria-label="Storybooks" hidden>
					<div class="lv-view-head" data-in><p class="lv-h"><svg aria-hidden="true"><use href="#lv-book"/></svg>Storybooks</p><span class="lv-btn is-primary">+ New Storybook</span></div>
					<div class="lv-stats">
						<p data-in><span class="lv-icon"><svg aria-hidden="true"><use href="#lv-book"/></svg></span><small>Total Storybooks</small><b data-lv-count>3</b></p>
						<p data-in><span class="lv-icon"><svg aria-hidden="true"><use href="#lv-chat"/></svg></span><small>Active Chats</small><b data-lv-count>10</b></p>
						<p data-in><span class="lv-icon"><svg aria-hidden="true"><use href="#lv-users"/></svg></span><small>Collaborators</small><b data-lv-count>4</b></p>
					</div>
					<div class="lv-book-grid">
						<?php foreach ( $lv_storybooks as $i => $book ) : ?>
							<article class="<?php echo esc_attr( $book['tone'] ); ?>" data-in<?php echo 0 === $i ? ' data-lv-target="book"' : ''; ?>>
								<span class="lv-book-icon"><svg aria-hidden="true"><use href="#lv-book"/></svg></span>
								<b><?php echo esc_html( $book['title'] ); ?></b><small><?php echo esc_html( $book['copy'] ); ?></small>
								<p class="lv-book-meta"><span><svg aria-hidden="true"><use href="#lv-chat"/></svg><?php echo esc_html( $book['chats'] ); ?></span><span><svg aria-hidden="true"><use href="#lv-users"/></svg><?php echo esc_html( $book['people'] ); ?></span><em>private &middot; <?php echo esc_html( $book['date'] ); ?></em></p>
							</article>
						<?php endforeach; ?>
					</div>
					<div class="lv-recent" data-in>
						<p class="lv-card-title"><b>Recent in Finance</b></p>
						<ul>
							<?php foreach ( $lv_recent as $item ) : ?>
								<li><span class="lv-icon"><svg aria-hidden="true"><use href="#lv-chat"/></svg></span><p><b><?php echo esc_html( $item['title'] ); ?></b><span class="lv-tags"><em>Agent: <?php echo esc_html( $item['agent'] ); ?></em><em>Database: <?php echo esc_html( $item['db'] ); ?></em><em>YAML: <?php echo esc_html( $item['yaml'] ); ?></em></span></p><small><?php echo esc_html( $item['time'] ); ?></small></li>
							<?php endforeach; ?>
						</ul>
					</div>
				</section>

				<section class="lv-view lv-dash" data-lv-view="dashboard" aria-label="Dashboard" hidden>
					<div class="lv-view-head" data-in><p class="lv-h"><svg aria-hidden="true"><use href="#lv-grid"/></svg>Dashboard<small>Platform adoption &amp; engagement analytics</small></p><span class="lv-chip">Admin view</span></div>
					<div class="lv-tabs" role="tablist" aria-label="Dashboard views" data-in>
						<?php foreach ( $lv_dash as $key => $panel ) : ?>
							<button type="button" role="tab" data-lv-tab="<?php echo esc_attr( $key ); ?>" aria-selected="<?php echo 'overview' === $key ? 'true' : 'false'; ?>"><?php echo esc_html( $panel['label'] ); ?></button>
						<?php endforeach; ?>
					</div>
					<?php foreach ( $lv_dash as $key => $panel ) : ?>
						<div class="lv-panel" role="tabpanel" aria-label="<?php echo esc_attr( $panel['label'] ); ?>" data-lv-panel="<?php echo esc_attr( $key ); ?>"<?php echo 'overview' === $key ? '' : ' hidden'; ?>>
							<div class="lv-dash-kpis">
								<?php foreach ( $panel['kpis'] as $kpi ) : ?>
									<p data-in><span class="lv-icon"><svg aria-hidden="true"><use href="#lv-<?php echo esc_attr( $kpi[0] ); ?>"/></svg></span><small><?php echo esc_html( $kpi[1] ); ?></small><b data-lv-count><?php echo esc_html( $kpi[2] ); ?></b><em><?php echo esc_html( $kpi[3] ); ?></em></p>
								<?php endforeach; ?>
							</div>
							<div class="lv-dash-charts">
								<article data-in>
									<p class="lv-card-title"><b><?php echo esc_html( $panel['line'][0] ); ?></b><small><?php echo esc_html( $panel['line'][1] ); ?></small></p>
									<svg class="lv-trend lv-chart is-drawn" viewBox="0 0 320 148" role="img" aria-label="<?php echo esc_attr( $panel['line'][0] . ' trend' ); ?>"><?php echo infometry_ct_lv_line_chart( $panel['line'][2], $panel['line'][3], $panel['line'][4] ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- numeric SVG built above. ?></svg>
								</article>
								<article data-in>
									<p class="lv-card-title"><b><?php echo esc_html( $panel['bars'][0] ); ?></b></p>
									<ul class="lv-hbars lv-chart is-drawn">
										<?php foreach ( $panel['bars'][1] as $bar ) : ?>
											<li><span><?php echo esc_html( $bar[0] ); ?></span><i style="--w:<?php echo esc_attr( $bar[2] ); ?>%"></i><b><?php echo esc_html( is_numeric( $bar[1] ) ? number_format( $bar[1] ) : $bar[1] ); ?></b></li>
										<?php endforeach; ?>
									</ul>
								</article>
							</div>
						</div>
					<?php endforeach; ?>
				</section>

				<section class="lv-view lv-conn" data-lv-view="connections" aria-label="Connections" hidden>
					<div class="lv-tabs is-line" role="tablist" aria-label="Connection types" data-in>
						<button type="button" role="tab" data-lv-tab="db" aria-selected="true"><svg aria-hidden="true"><use href="#lv-db"/></svg>DB Connection</button>
						<button type="button" role="tab" data-lv-tab="agents" aria-selected="false"><svg aria-hidden="true"><use href="#lv-spark"/></svg>Agent Connection</button>
						<button type="button" role="tab" data-lv-tab="permissions" aria-selected="false"><svg aria-hidden="true"><use href="#lv-shield"/></svg>Permissions</button>
						<button type="button" role="tab" data-lv-tab="policies" aria-selected="false"><svg aria-hidden="true"><use href="#lv-lock"/></svg>Data Policies</button>
					</div>
					<div class="lv-panel lv-conn-grid" role="tabpanel" aria-label="Databases" data-lv-panel="db">
						<?php foreach ( $lv_databases as $db ) : ?>
							<article data-in>
								<p class="lv-conn-name"><span class="lv-logo-badge"><?php if ( isset( $db['logo'] ) ) : ?><img src="<?php echo esc_url( $lv_img . $db['logo'] ); ?>" width="<?php echo esc_attr( $db['size'][0] ); ?>" height="<?php echo esc_attr( $db['size'][1] ); ?>" loading="lazy" decoding="async" title="<?php echo esc_attr( $db['name'] ); ?>" alt="<?php echo esc_attr( $db['name'] . ' logo' ); ?>"><?php else : ?><i class="<?php echo esc_attr( $db['tone'] ); ?>"><?php echo esc_html( $db['badge'] ); ?></i><?php endif; ?></span><b><?php echo esc_html( $db['name'] ); ?></b></p>
								<p class="lv-conn-row"><small>Status</small><span class="lv-ok"><svg aria-hidden="true"><use href="#lv-check"/></svg>Connected</span></p>
								<p class="lv-conn-row"><small>Total Connections</small><em data-lv-count><?php echo esc_html( $db['count'] ); ?></em></p>
								<p class="lv-conn-links"><span>Manage</span><span>+ Create</span></p>
							</article>
						<?php endforeach; ?>
					</div>
					<div class="lv-panel lv-conn-grid" role="tabpanel" aria-label="AI agents" data-lv-panel="agents" hidden>
						<?php foreach ( $lv_agents as $agent ) : ?>
							<article data-in>
								<p class="lv-conn-name"><span class="lv-logo-badge"><img src="<?php echo esc_url( $lv_img . $agent['logo'] ); ?>" width="<?php echo esc_attr( $agent['size'][0] ); ?>" height="<?php echo esc_attr( $agent['size'][1] ); ?>" loading="lazy" decoding="async" title="<?php echo esc_attr( $agent['name'] ); ?>" alt="<?php echo esc_attr( $agent['name'] . ' logo' ); ?>"></span><b><?php echo esc_html( $agent['name'] ); ?></b></p>
								<p class="lv-conn-row"><small>Status</small><span class="lv-ok"><svg aria-hidden="true"><use href="#lv-check"/></svg>Connected</span></p>
								<p class="lv-conn-row"><small>Agents</small><em data-lv-count><?php echo esc_html( $agent['count'] ); ?></em></p>
								<p class="lv-conn-links"><span>Manage</span><span>+ Create</span></p>
							</article>
						<?php endforeach; ?>
					</div>
					<div class="lv-panel lv-perm" role="tabpanel" aria-label="Permissions" data-lv-panel="permissions" hidden>
						<article class="lv-perm-card" data-in>
							<p class="lv-perm-title"><span class="lv-icon"><svg aria-hidden="true"><use href="#lv-shield"/></svg></span><b>Agent Access<small>Grant users access to AI agents &amp; configure summary limits</small></b></p>
							<p class="lv-field-label">Select agent</p>
							<p class="lv-select">RETAIL_INVENTORY_AGENT<svg aria-hidden="true"><use href="#lv-chev"/></svg></p>
							<p class="lv-field-label">Assign users <em><span data-lv-selected>2</span> Selected</em></p>
							<ul class="lv-users">
								<?php foreach ( $lv_users as $n => $user ) : ?>
									<li><button type="button" data-lv-user aria-pressed="<?php echo $user[3] ? 'true' : 'false'; ?>"<?php echo 2 === $n ? ' data-lv-target="grant"' : ''; ?>><span class="lv-avatar" aria-hidden="true"><?php echo esc_html( $user[0] ); ?></span><span><b><?php echo esc_html( $user[1] ); ?></b><small><?php echo esc_html( $user[2] ); ?></small></span><i class="lv-tick-box" aria-hidden="true"><svg><use href="#lv-check"/></svg></i></button></li>
								<?php endforeach; ?>
							</ul>
							<div class="lv-limits">
								<p><small>Record limit</small><b>500</b></p>
								<p><small>Max prompt size</small><b>1 MB</b></p>
							</div>
							<span class="lv-btn is-primary">Save Permission &amp; Thresholds</span>
						</article>
						<div class="lv-perm-side">
							<p class="lv-perm-title" data-in><span class="lv-icon"><svg aria-hidden="true"><use href="#lv-users"/></svg></span><b>Access Summary<small>User permissions and summary limits</small></b></p>
							<p class="lv-perm-stat" data-in><small>Eligible Users</small><b>12</b></p>
							<p class="lv-perm-stat" data-in><small>Active Users</small><b data-lv-active>2</b></p>
							<p class="lv-perm-stat" data-in><small>Total Grants</small><b data-lv-grants>6</b></p>
						</div>
					</div>
					<div class="lv-panel lv-policies" role="tabpanel" aria-label="Data policies" data-lv-panel="policies" hidden>
						<?php foreach ( $lv_policies as $policy ) : ?>
							<article data-in>
								<span class="lv-icon"><svg aria-hidden="true"><use href="#lv-lock"/></svg></span>
								<p><b><?php echo esc_html( $policy[0] ); ?></b><small><?php echo esc_html( $policy[1] ); ?></small></p>
								<button type="button" class="lv-switch" data-lv-switch aria-pressed="<?php echo $policy[2] ? 'true' : 'false'; ?>" aria-label="<?php echo esc_attr( 'Turn ' . $policy[0] . ' on or off' ); ?>"><i></i></button>
							</article>
						<?php endforeach; ?>
					</div>
					<p class="lv-footnote">Powered by INFOFISCUS | Conversa v2.1 &copy; <?php echo esc_html( gmdate( 'Y' ) ); ?> Infometry Inc. All rights reserved.</p>
				</section>
			</div>
		</div>

		<span class="lv-cursor" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M5 3l14 8.2-6.2 1.5L9.6 19z"/></svg></span>
	</div>

	<div class="lv-pipe">
		<svg class="lv-pipe-lines" aria-hidden="true" focusable="false"></svg>
		<div class="lv-verticals" role="group" aria-label="See Conversa for your industry">
			<?php foreach ( $lv_verticals as $vkey => $vertical ) : ?>
				<button type="button" class="is-<?php echo esc_attr( $vkey ); ?>" data-lv-pick="<?php echo esc_attr( $vkey ); ?>" aria-pressed="<?php echo $lv_default === $vkey ? 'true' : 'false'; ?>"><span aria-hidden="true"><svg><use href="#lv-<?php echo esc_attr( $vertical['icon'] ); ?>"/></svg></span><b><?php echo esc_html( $vertical['label'] ); ?></b></button>
			<?php endforeach; ?>
		</div>
	</div>
</div>
