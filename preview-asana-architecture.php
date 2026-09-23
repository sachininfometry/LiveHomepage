<?php
define( 'ABSPATH', __DIR__ . DIRECTORY_SEPARATOR );
if ( ! function_exists( 'esc_html_e' ) ) {
	function esc_html_e( $text ) {
		echo htmlspecialchars( $text, ENT_QUOTES, 'UTF-8' );
	}
}
?><!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Asana Architecture Transformation Preview</title>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700;800&amp;display=swap" rel="stylesheet">
	<link rel="stylesheet" href="assets/css/asana-architecture.css">
	<style>html,body{margin:0;min-height:100%;background:#fff}</style>
</head>
<body>
	<main>
		<?php require __DIR__ . '/templates/partials/asana-architecture.php'; ?>
	</main>
</body>
</html>
