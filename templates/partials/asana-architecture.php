<?php
/**
 * Code-native architecture transformation section.
 *
 * @package Infometry_Custom_Templates
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section class="ia-architecture" aria-labelledby="ia-architecture-title">
	<div class="ia-shell">
		<header class="ia-heading">
			<p class="ia-eyebrow"><?php esc_html_e( 'Architecture Transformation', 'infometry-custom-templates' ); ?></p>
			<h2 id="ia-architecture-title"><?php esc_html_e( 'From Legacy to Modern', 'infometry-custom-templates' ); ?></h2>
			<p><?php esc_html_e( 'We transformed Asana’s financial data platform from a tightly coupled, complex environment to a modern, scalable, Snowflake-native architecture.', 'infometry-custom-templates' ); ?></p>
		</header>

		<div class="ia-diagram" aria-label="Comparison of the legacy and modern Snowflake-native architectures">
			<article class="ia-panel ia-panel-before">
				<div class="ia-panel-heading">
					<span class="ia-state ia-state-before"><?php esc_html_e( 'Before', 'infometry-custom-templates' ); ?></span>
					<h3><?php esc_html_e( 'Legacy Architecture', 'infometry-custom-templates' ); ?></h3>
				</div>

				<div class="ia-legacy-flow">
					<div class="ia-node ia-legacy-node">
						<span class="ia-icon" aria-hidden="true">
							<svg viewBox="0 0 64 64"><ellipse cx="32" cy="13" rx="22" ry="8"/><path d="M10 13v13c0 4.5 10 8 22 8s22-3.5 22-8V13M10 26v13c0 4.5 10 8 22 8s22-3.5 22-8V26M10 39v12c0 4.5 10 8 22 8s22-3.5 22-8V39"/></svg>
						</span>
						<strong><?php esc_html_e( 'MySQL', 'infometry-custom-templates' ); ?></strong>
						<small><?php esc_html_e( 'Operational data', 'infometry-custom-templates' ); ?></small>
					</div>
					<span class="ia-arrow" aria-hidden="true"></span>
					<div class="ia-node ia-legacy-node">
						<span class="ia-icon" aria-hidden="true">
							<svg viewBox="0 0 64 64"><rect x="10" y="9" width="44" height="13" rx="3"/><rect x="10" y="26" width="44" height="13" rx="3"/><rect x="10" y="43" width="44" height="13" rx="3"/><path d="M17 15.5h18m12 0h1M17 32.5h18m12 0h1M17 49.5h18m12 0h1"/></svg>
						</span>
						<strong><?php esc_html_e( 'Tightly Coupled', 'infometry-custom-templates' ); ?></strong>
						<small><?php esc_html_e( 'ETL & business logic', 'infometry-custom-templates' ); ?></small>
					</div>
					<span class="ia-arrow" aria-hidden="true"></span>
					<div class="ia-node ia-legacy-node">
						<span class="ia-icon" aria-hidden="true">
							<svg viewBox="0 0 64 64"><path d="M17 6h22l11 11v41H17z"/><path d="M39 6v12h11M24 30h19M24 38h19M24 46h13"/></svg>
						</span>
						<strong><?php esc_html_e( 'Limited Reporting', 'infometry-custom-templates' ); ?></strong>
						<small><?php esc_html_e( 'Slow, manual insights', 'infometry-custom-templates' ); ?></small>
					</div>
				</div>

				<ul class="ia-friction-list">
					<li><?php esc_html_e( 'Complex dependencies', 'infometry-custom-templates' ); ?></li>
					<li><?php esc_html_e( 'Slow processing', 'infometry-custom-templates' ); ?></li>
					<li><?php esc_html_e( 'Limited scalability', 'infometry-custom-templates' ); ?></li>
				</ul>
			</article>

			<div class="ia-transform" aria-hidden="true"><span></span></div>

			<article class="ia-panel ia-panel-after">
				<div class="ia-panel-heading">
					<span class="ia-state ia-state-after"><?php esc_html_e( 'After', 'infometry-custom-templates' ); ?></span>
					<h3><?php esc_html_e( 'Modern Snowflake-Native Architecture', 'infometry-custom-templates' ); ?></h3>
				</div>

				<div class="ia-modern-flow">
					<div class="ia-sources" aria-label="Connected enterprise data sources">
						<div><svg viewBox="0 0 32 32" aria-hidden="true"><ellipse cx="16" cy="7" rx="10" ry="4"/><path d="M6 7v8c0 2 4.5 4 10 4s10-2 10-4V7M6 15v8c0 2 4.5 4 10 4s10-2 10-4v-8"/></svg><span>ERP</span></div>
						<div><svg viewBox="0 0 32 32" aria-hidden="true"><path d="M8 25a6 6 0 0 1 0-12 9 9 0 0 1 17 3 4.5 4.5 0 0 1-1 9H8Z"/></svg><span>SaaS</span></div>
						<div><svg viewBox="0 0 32 32" aria-hidden="true"><rect x="5" y="6" width="22" height="20" rx="3"/><path d="M10 12h12M10 17h12M10 22h7"/></svg><span><?php esc_html_e( 'Product', 'infometry-custom-templates' ); ?></span></div>
						<div><svg viewBox="0 0 32 32" aria-hidden="true"><circle cx="16" cy="16" r="10"/><path d="M6 16h20M16 6a16 16 0 0 1 0 20M16 6a16 16 0 0 0 0 20"/></svg><span><?php esc_html_e( 'External', 'infometry-custom-templates' ); ?></span></div>
					</div>

					<span class="ia-modern-arrow" aria-hidden="true"></span>

					<div class="ia-snowflake-core">
						<svg class="ia-snowflake-mark" viewBox="0 0 96 96" aria-hidden="true"><g><path d="M48 8v80M13.4 28l69.2 40M82.6 28 13.4 68"/><path d="m38 14 10 7 10-7M38 82l10-7 10 7M16 39l11 1 1-11M80 57l-11-1-1 11M80 39l-11 1-1-11M16 57l11-1 1 11"/></g></svg>
						<strong>Snowflake</strong>
						<span><?php esc_html_e( 'Unified Financial Data Cloud', 'infometry-custom-templates' ); ?></span>
						<div class="ia-core-pills"><em><?php esc_html_e( 'Governed', 'infometry-custom-templates' ); ?></em><em><?php esc_html_e( 'Scalable', 'infometry-custom-templates' ); ?></em></div>
					</div>

					<span class="ia-modern-arrow" aria-hidden="true"></span>

					<div class="ia-outcomes">
						<div><svg viewBox="0 0 32 32" aria-hidden="true"><path d="M5 26V13h5v13M14 26V6h5v20M23 26V10h5v16M3 26h27"/></svg><span><?php esc_html_e( 'Analytics & Reporting', 'infometry-custom-templates' ); ?></span></div>
						<div><svg viewBox="0 0 32 32" aria-hidden="true"><path d="m5 24 7-8 5 4 10-12"/><path d="M22 8h5v5"/><circle cx="5" cy="24" r="2"/><circle cx="12" cy="16" r="2"/><circle cx="17" cy="20" r="2"/></svg><span><?php esc_html_e( 'Real-Time Analytics', 'infometry-custom-templates' ); ?></span></div>
						<div><svg viewBox="0 0 32 32" aria-hidden="true"><path d="M16 4 6 8v7c0 6 4 10 10 13 6-3 10-7 10-13V8L16 4Z"/><path d="m11 16 3 3 7-8"/></svg><span><?php esc_html_e( 'Security & Governance', 'infometry-custom-templates' ); ?></span></div>
					</div>
				</div>

				<div class="ia-benefits" aria-label="Modern platform benefits">
					<span><?php esc_html_e( 'Faster processing', 'infometry-custom-templates' ); ?></span>
					<span><?php esc_html_e( 'Independent workloads', 'infometry-custom-templates' ); ?></span>
					<span><?php esc_html_e( 'Trusted financial metrics', 'infometry-custom-templates' ); ?></span>
				</div>
			</article>
		</div>
	</div>
</section>
