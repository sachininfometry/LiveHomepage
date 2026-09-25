<?php
define( 'ABSPATH', __DIR__ . DIRECTORY_SEPARATOR );
define( 'INFOMETRY_CT_URL', './' );
function get_header() {}
function get_footer() {}
function home_url( $path = '/' ) { return '#' . trim( $path, '/' ); }
function esc_url( $value ) { return htmlspecialchars( $value, ENT_QUOTES, 'UTF-8' ); }
function esc_html( $value ) { return htmlspecialchars( $value, ENT_QUOTES, 'UTF-8' ); }
function esc_attr( $value ) { return htmlspecialchars( $value, ENT_QUOTES, 'UTF-8' ); }
function wp_date( $format ) { return date( $format ); }
?><!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>Asana Case Study Preview</title>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600;700;800&amp;display=swap" rel="stylesheet">
	<link rel="stylesheet" href="assets/css/asana-case-study.css">
	<style>
		html,body{margin:0;min-height:100%}

		/*
		 * The approved live artwork already contains the complete hero copy,
		 * CTA, benefit row and callout cards. Render it once at its native
		 * 1960 x 802 ratio so those details are not darkened or duplicated by
		 * the code-native preview layers.
		 */
		.ics-hero{
			min-height:0;
			aspect-ratio:1960/802;
			background-color:#02264a;
			background-image:url("https://wordpress-1633295-6612805.cloudwaysapps.com/wp-content/plugins/infometry-custom-templates/assets/images/case-studies/asana-fdp-hero-final.png");
			background-position:center;
			background-repeat:no-repeat;
			background-size:100% 100%;
		}
		.ics-hero:before{display:none}
		.ics-hero-inner{width:100%;min-height:0;height:100%;padding:0}
		.ics-hero-copy,.ics-hero-visual,.ics-hero-benefits{visibility:hidden;pointer-events:none}

		@media(max-width:720px){
			.ics-hero{min-height:0;background-position:center;background-size:cover}
			.ics-hero-inner{min-height:0;padding:0}
		}
	</style>
</head>
<body class="infometry-asana-case-study-page">
<?php require __DIR__ . '/templates/page-asana-case-study.php'; ?>
</body>
</html>
