<?php
/**
 * INFOFISCUS Conversa introduction: the business decision journey, played like
 * a short product video. A question is asked, business context feeds the
 * decision engine, four reasoning steps run, and decision-ready outputs land.
 *
 * Everything is rendered in its finished state, so the journey reads as a
 * complete picture before or without the script. assets/js/infofiscus-conversa.js
 * plays it and wires the chapter buttons; styles live at the end of
 * assets/css/infofiscus-conversa.css under .icp-jr.
 *
 * @package Infometry_Custom_Templates
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$jr_question = 'Why did customer engagement drop last week?';
$jr_context  = array( 'Customer segments', 'Campaign reach', 'Engagement KPIs', 'Channel trends', 'Prior-week baseline', 'Engagement target' );
$jr_steps    = array(
	array( 'Compare engagement with the prior week', '50.3K &rarr; 41.2K' ),
	array( 'Break down the decline by channel and segment', '' ),
	array( 'Identify the biggest drop in email engagement', 'Email &minus;31%' ),
	array( 'Find the key driver: lower click-through rate', 'CTR 3.8% &rarr; 2.1%' ),
);
$jr_channels = array(
	array( 'Email', 31, true ),
	array( 'Social', 9, false ),
	array( 'Web', 4, false ),
	array( 'App', 2, false ),
);
$jr_chapters = array( 'Ask', 'Context', 'Reason', 'Decide' );
?>
<div class="icp-jr" data-icp-journey aria-label="INFOFISCUS Conversa business journey from question to decision-ready insight">
	<div class="jr-chrome">
		<span class="jr-lights" aria-hidden="true"><i></i><i></i><i></i></span>
		<strong>Business Decision Journey</strong>
		<span class="jr-status" aria-hidden="true"><i></i><span data-jr-status>Decision ready</span></span>
		<button type="button" class="jr-play" data-jr-play aria-label="Play the journey">
			<svg class="jr-icon-play" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M8 5.5v13l10.5-6.5z"/></svg>
			<svg class="jr-icon-pause" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M7 5h3.5v14H7zM13.5 5H17v14h-3.5z"/></svg>
		</button>
	</div>

	<div class="jr-body">
		<p class="jr-ask" data-jr-stage="0">
			<span class="jr-avatar"><img src="<?php echo esc_url( INFOMETRY_CT_URL . 'assets/images/infometry-mark-white.png' ); ?>" width="77" height="101" loading="lazy" decoding="async" alt=""></span>
			<span class="jr-question"><span class="jr-sr"><?php echo esc_html( $jr_question ); ?></span><span data-jr-typed aria-hidden="true"><?php echo esc_html( $jr_question ); ?></span><i class="jr-caret" aria-hidden="true"></i></span>
			<span class="jr-send" aria-hidden="true"><svg viewBox="0 0 24 24" focusable="false"><path d="M4 12h14M13 6l6 6-6 6"/></svg></span>
		</p>

		<div class="jr-flow">
			<svg class="jr-wires" aria-hidden="true" focusable="false"></svg>

			<div class="jr-context" data-jr-stage="1">
				<small>Business context</small>
				<ul>
					<?php foreach ( $jr_context as $item ) : ?>
						<li><?php echo esc_html( $item ); ?></li>
					<?php endforeach; ?>
				</ul>
			</div>

			<div class="jr-engine" data-jr-stage="1">
				<span class="jr-orb" aria-hidden="true"><i></i><i></i><svg viewBox="0 0 24 24" focusable="false"><circle cx="6" cy="6" r="3"/><circle cx="18" cy="6" r="3"/><circle cx="12" cy="18" r="3"/><path d="M8.5 7.5 11 15M15.5 7.5 13 15"/></svg></span>
				<strong>Conversa Decision Intelligence</strong>
				<small>KPIs + Context + Drivers = Action</small>
			</div>

			<ol class="jr-steps" data-jr-stage="2">
				<?php foreach ( $jr_steps as $i => $step ) : ?>
					<li>
						<b><?php echo (int) $i + 1; ?></b>
						<span><?php echo esc_html( $step[0] ); ?></span>
						<?php if ( 1 === $i ) : ?>
							<em class="jr-bars" aria-label="Decline by channel: Email 31%, Social 9%, Web 4%, App 2%">
								<?php foreach ( $jr_channels as $channel ) : ?>
									<i class="<?php echo $channel[2] ? 'is-hot' : ''; ?>" style="--h:<?php echo (int) $channel[1]; ?>"><span><?php echo esc_html( $channel[0] ); ?></span></i>
								<?php endforeach; ?>
							</em>
						<?php else : ?>
							<em><?php echo wp_kses( $step[1], array() ); ?></em>
						<?php endif; ?>
					</li>
				<?php endforeach; ?>
			</ol>
		</div>

		<div class="jr-outputs" data-jr-stage="3">
			<article>
				<small>Executive Summary</small>
				<strong><span data-jr-count="18">&minus;18</span>%</strong>
				<span>Engagement down week over week</span>
			</article>
			<article class="is-chart">
				<small>Visualization</small>
				<svg viewBox="0 0 160 56" preserveAspectRatio="none" aria-label="Weekly engagement trend by channel: email falls sharply in the last week" role="img" focusable="false">
					<path class="jr-grid" d="M0 14h160M0 28h160M0 42h160"/>
					<path class="jr-line is-web" pathLength="100" d="M4 38 34 37 64 36 94 37 124 36 156 39"/>
					<path class="jr-line is-social" pathLength="100" d="M4 27 34 25 64 28 94 26 124 27 156 31"/>
					<path class="jr-line is-email" pathLength="100" d="M4 14 34 16 64 12 94 15 124 17 156 44"/>
					<circle class="jr-drop" cx="156" cy="44" r="3.2"/>
				</svg>
				<span>Weekly trend by channel</span>
			</article>
			<article class="is-action">
				<small>Recommended Action</small>
				<strong>Optimize email timing</strong>
				<span><svg viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="m5 12.5 4.5 4.5L19 7.5"/></svg>Shift sends to peak open hours</span>
			</article>
		</div>
	</div>

	<div class="jr-chapters" role="group" aria-label="Journey chapters">
		<?php foreach ( $jr_chapters as $i => $label ) : ?>
			<button type="button" data-jr-go="<?php echo (int) $i; ?>"><i aria-hidden="true"><b></b></i><span><em><?php echo (int) $i + 1; ?></em><?php echo esc_html( $label ); ?></span></button>
		<?php endforeach; ?>
	</div>
</div>
