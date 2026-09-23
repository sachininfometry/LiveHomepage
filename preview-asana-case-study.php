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
	<style>html,body{margin:0;min-height:100%}</style>
</head>
<body class="infometry-asana-case-study-page">
<?php require __DIR__ . '/templates/page-asana-case-study.php'; ?>
</body>
</html>
