<?php
define( 'ABSPATH', __DIR__ . DIRECTORY_SEPARATOR );
define( 'INFOMETRY_CT_URL', './' );
function get_header() {}
function get_footer() {}
function home_url( $path = '/' ) { return '#' . trim( $path, '/' ); }
function esc_url( $value ) { return htmlspecialchars( $value, ENT_QUOTES, 'UTF-8' ); }
function esc_html( $value ) { return htmlspecialchars( $value, ENT_QUOTES, 'UTF-8' ); }
function esc_attr( $value ) { return htmlspecialchars( $value, ENT_QUOTES, 'UTF-8' ); }
?><!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>Insurance Snowflake Modernization Case Study</title>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600;700;800&amp;display=swap" rel="stylesheet">
	<link rel="stylesheet" href="assets/css/insurance-snowflake-case-study.css?v=<?php echo rawurlencode( (string) filemtime( __DIR__ . '/assets/css/insurance-snowflake-case-study.css' ) ); ?>">
	<style>html,body{margin:0;min-height:100%}</style>
</head>
<body class="infometry-insurance-snowflake-page">
<?php require __DIR__ . '/templates/page-insurance-snowflake-case-study.php'; ?>
</body>
</html>
