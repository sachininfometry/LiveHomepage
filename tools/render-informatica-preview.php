<?php
/**
 * Render the WordPress Informatica template as a standalone local preview.
 *
 * Usage: php tools/render-informatica-preview.php
 */

declare(strict_types=1);

$project_root = dirname(__DIR__);
$output_file  = $project_root . DIRECTORY_SEPARATOR . 'preview-informatica.html';

define('ABSPATH', $project_root . DIRECTORY_SEPARATOR);
define('INFOMETRY_CT_URL', '');
define('INFOMETRY_CT_CONVERSA_FORM_ID', 379751);

function preview_escape(string $value): string
{
	return htmlspecialchars($value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}

function esc_url(string $value): string
{
	return preview_escape($value);
}

function esc_html(string $value): string
{
	return preview_escape($value);
}

function esc_attr(string $value): string
{
	return preview_escape($value);
}

function home_url(string $path = '/'): string
{
	return 'https://www.infometry.net/' . ltrim($path, '/');
}

function shortcode_exists(string $shortcode): bool
{
	return false;
}

function do_shortcode(string $shortcode): string
{
	return '';
}

function absint(mixed $value): int
{
	return abs((int) $value);
}

function get_header(): void
{
	echo <<<'HTML'
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Informatica Connectors | Infometry Preview</title>
	<link rel="stylesheet" href="assets/css/informatica-connectors.css?v=2.2.1">
	<style>
		.preview-site-header{display:flex;min-height:74px;padding:12px 32px;align-items:center;justify-content:space-between;gap:28px;background:#020b2d;color:#fff;font-family:"Open Sans","Segoe UI",Arial,sans-serif}
		.preview-site-header>a{display:flex;align-items:center}.preview-site-header img{display:block;width:190px;height:48px;object-fit:contain;object-position:left center}
		.preview-site-header nav{display:flex;align-items:center;justify-content:flex-end;gap:24px}.preview-site-header nav a{color:#fff;font-size:13px;font-weight:700;text-decoration:none}
		.preview-site-header nav .demo{padding:10px 15px;border-radius:7px;background:#0b7cff}
		@media(max-width:900px){.preview-site-header{padding-inline:18px}.preview-site-header nav{display:none}}
	</style>
</head>
<body class="infometry-informatica-product-page">
	<header class="preview-site-header">
		<a href="https://www.infometry.net/"><img src="assets/images/infometry-logo-white.png" alt="Infometry Inc."></a>
		<nav aria-label="Preview navigation">
			<a href="https://www.infometry.net/product/">Products</a>
			<a href="https://www.infometry.net/snowflake-solutions/">Solutions</a>
			<a href="https://www.infometry.net/resources/blog/">Resources</a>
			<a href="https://www.infometry.net/company/">Company</a>
			<a href="https://www.infometry.net/contact-us/">Contact Us</a>
			<a class="demo" href="#iin-demo-form">Request a Demo</a>
		</nav>
	</header>
HTML;
}

function get_footer(): void
{
	echo <<<'HTML'
<script src="assets/js/informatica-connectors.js?v=2.2.1"></script>
</body>
</html>
HTML;
}

ob_start();
require $project_root . DIRECTORY_SEPARATOR . 'templates' . DIRECTORY_SEPARATOR . 'page-informatica-connectors.php';
$html = ob_get_clean();

if (!is_string($html) || $html === '') {
	fwrite(STDERR, "The Informatica preview rendered no output.\n");
	exit(1);
}

if (file_put_contents($output_file, $html . PHP_EOL) === false) {
	fwrite(STDERR, "Unable to write {$output_file}.\n");
	exit(1);
}

echo "Rendered {$output_file}\n";
