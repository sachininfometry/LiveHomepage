<?php
/**
 * Site footer (same markup and links as the home page footer).
 * Shared partial; styles in assets/css/blog-post.css under .infometry-custom-footer.
 *
 * @package Infometry_Custom_Templates
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$footer_img = INFOMETRY_CT_URL . 'assets/images/';
$footer_social = array(
	array( 'https://www.facebook.com/infometryinc/', 'Facebook', 'social-facebook.png' ),
	array( 'https://x.com/Infometryinc', 'X', 'social-x.png' ),
	array( 'https://www.linkedin.com/company/infometry-inc', 'LinkedIn', 'social-linkedin.png' ),
	array( 'https://www.youtube.com/channel/UCYYc9Fa7iPiVLDEiSvG7DmQ', 'YouTube', 'social-youtube.png' ),
	array( 'https://in.pinterest.com/infometryincus/_saved/', 'Pinterest', 'social-pinterest.png' ),
	array( 'https://www.instagram.com/infometry_inc/', 'Instagram', 'social-instagram.png' ),
	array( 'https://www.g2.com/sellers/infometry-inc#profiles', 'G2', 'social-g2.png' ),
);
$footer_columns = array(
	'Products'  => array(
		'INFOFISCUS Conversa'                   => '/product/infofiscus-conversa-decision-intelligence/',
		'Informatica Connectors'                => '/product/informatica-connectors/',
		'INFOFISCUS Snowflake Native Apps'      => '/product/#infofiscus-snowflake-native-apps',
		'Pre-Built Apps For IDMC and Matillion' => '/product/#pre-built-apps',
		'Accelerators'                          => '/product/accelerators-for-data-warehouse-migration-automation/',
	),
	'Resources' => array(
		'Blog'           => '/resources/blog/',
		'Case Studies'   => '/resources/infometry-case-studies/',
		'Whitepapers'    => '/resources/whitepapers/',
		'Gallery'        => '/resources/gallery/',
		'Webinar'        => '/resources/webinar/',
		'Press Releases' => '/resources/press-releases/',
	),
	'Company'   => array(
		'Customers – Partners' => '/company/customers-partners/',
		'Careers'              => '/company/careers/',
		'Life@Infometry'       => '/company/life-at-infometry/',
		'Infometry Cares'      => '/company/infometry-cares/',
		'Testimonials'         => '/company/testimonials/',
	),
);
?>
<footer class="infometry-custom-footer" id="infometry-footer" aria-label="Infometry website footer">
	<div class="infometry-shell">
		<div class="infometry-footer-grid">
			<div class="infometry-footer-connect">
				<h2>Connect with us</h2>
				<a class="infometry-footer-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url( $footer_img . 'infometry-logo-white.png' ); ?>" width="500" height="142" loading="lazy" decoding="async" alt="Infometry Inc. — Enabling AI for Every Enterprise"></a>
				<p>Turning enterprise data into trusted insights, intelligent decisions and measurable business outcomes.</p>
				<div class="infometry-footer-social" aria-label="Infometry social profiles">
					<?php foreach ( $footer_social as $item ) : ?>
						<a href="<?php echo esc_url( $item[0] ); ?>" target="_blank" rel="noopener" aria-label="<?php echo esc_attr( 'Infometry on ' . $item[1] ); ?>"><img src="<?php echo esc_url( $footer_img . $item[2] ); ?>" width="512" height="512" loading="lazy" decoding="async" alt=""></a>
					<?php endforeach; ?>
				</div>
				<a class="infometry-footer-contact" href="<?php echo esc_url( home_url( '/contact-us/' ) ); ?>">Contact Us <span aria-hidden="true">→</span></a>
			</div>
			<?php foreach ( $footer_columns as $heading => $links ) : ?>
				<nav class="infometry-footer-column" aria-label="<?php echo esc_attr( 'Footer ' . strtolower( $heading ) ); ?>">
					<h3><?php echo esc_html( $heading ); ?></h3>
					<?php foreach ( $links as $label => $path ) : ?>
						<a href="<?php echo esc_url( home_url( $path ) ); ?>"><?php echo esc_html( $label ); ?></a>
					<?php endforeach; ?>
				</nav>
			<?php endforeach; ?>
		</div>
		<div class="infometry-footer-bottom"><span>© <?php echo esc_html( wp_date( 'Y' ) ); ?> Infometry Inc. All Rights Reserved.</span><span>Enabling AI for Every Enterprise</span></div>
	</div>
</footer>
