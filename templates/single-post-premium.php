<?php
/**
 * Premium single-post template, applied centrally to standard posts.
 *
 * Reuses the theme header/navigation and footer. Renders the stored content
 * through the normal the_content filters (shortcodes, embeds, Elementor), then
 * post-processes it for display only. See includes/premium-blog.php.
 *
 * @package Infometry_Custom_Templates
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

infometry_ct_premium_blog_header();

while ( have_posts() ) :
	the_post();

	$post_id   = get_the_ID();
	$title     = get_the_title();
	$category  = infometry_ct_blog_primary_category( $post_id );
	$prepared  = infometry_ct_blog_prepare_content( apply_filters( 'the_content', get_the_content() ), $title ); // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedHooknameFound -- core filter.
	$toc       = $prepared['toc'];
	$has_toc   = count( $toc ) >= 2;
	$show_hero_image = has_post_thumbnail() && ! $prepared['opens_with_image'];
	$author_id = (int) get_post_field( 'post_author', $post_id );
	$minutes   = infometry_ct_blog_reading_time( $prepared['html'] );
	$related   = infometry_ct_blog_related_posts( $post_id, $category );
	$blog_url  = home_url( '/resources/blog/' );
	?>

<main class="ifb" id="ifb-main">
	<div class="ifb-progress" aria-hidden="true"><i></i></div>

	<header class="ifb-hero">
		<div class="ifb-shell ifb-hero-inner">
			<a class="ifb-back" href="<?php echo esc_url( $blog_url ); ?>"><span aria-hidden="true">&larr;</span> All articles</a>
			<?php if ( $category ) : ?>
				<a class="ifb-chip" href="<?php echo esc_url( get_category_link( $category ) ); ?>"><?php echo esc_html( $category->name ); ?></a>
			<?php endif; ?>
			<h1 class="ifb-title"><?php echo esc_html( $title ); ?></h1>
			<?php if ( has_excerpt() ) : ?>
				<p class="ifb-dek"><?php echo esc_html( wp_trim_words( get_the_excerpt(), 32 ) ); ?></p>
			<?php endif; ?>
			<div class="ifb-byline">
				<span class="ifb-author">
					<?php echo get_avatar( $author_id, 44, '', '', array( 'class' => 'ifb-avatar' ) ); ?>
					<span class="ifb-author-text">
						<b><?php echo esc_html( get_the_author_meta( 'display_name', $author_id ) ); ?></b>
						<small><time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"><?php echo esc_html( get_the_date() ); ?></time><span aria-hidden="true">&middot;</span><?php echo esc_html( sprintf( '%d min read', $minutes ) ); ?></small>
					</span>
				</span>
				<?php
				$share_url   = rawurlencode( get_permalink() );
				$share_title = rawurlencode( html_entity_decode( $title, ENT_QUOTES, 'UTF-8' ) );
				?>
				<div class="ifb-share" aria-label="Share this article">
					<a href="<?php echo esc_url( 'https://www.linkedin.com/sharing/share-offsite/?url=' . $share_url ); ?>" target="_blank" rel="noopener" aria-label="Share on LinkedIn"><svg viewBox="0 0 24 24" aria-hidden="true"><path fill="currentColor" stroke="none" d="M4.98 3.5a2.5 2.5 0 1 1 0 5 2.5 2.5 0 0 1 0-5ZM3 9.75h4V21H3Zm6.5 0h3.8v1.6h.06c.53-1 1.84-2.06 3.79-2.06 4.05 0 4.8 2.67 4.8 6.13V21h-4v-4.93c0-1.18-.02-2.7-1.64-2.7-1.65 0-1.9 1.29-1.9 2.62V21h-4Z"/></svg></a>
					<a href="<?php echo esc_url( 'https://twitter.com/intent/tweet?url=' . $share_url . '&text=' . $share_title ); ?>" target="_blank" rel="noopener" aria-label="Share on X"><svg viewBox="0 0 24 24" aria-hidden="true"><path fill="currentColor" stroke="none" d="M17.75 3h3.07l-6.7 7.66L22 21h-6.17l-4.83-6.32L5.47 21H2.4l7.17-8.2L2 3h6.33l4.37 5.77Zm-1.08 16.17h1.7L7.4 4.74H5.58Z"/></svg></a>
					<button type="button" class="ifb-copy" data-ifb-copy aria-label="Copy link"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M10 14a4.5 4.5 0 0 0 6.4 0l3.2-3.2a4.5 4.5 0 0 0-6.4-6.4L11.6 6"/><path d="M14 10a4.5 4.5 0 0 0-6.4 0l-3.2 3.2a4.5 4.5 0 0 0 6.4 6.4l1.6-1.6"/></svg><span class="ifb-copy-done">Copied</span></button>
				</div>
			</div>
		</div>
	</header>

	<div class="ifb-shell ifb-body<?php echo $has_toc ? ' has-toc' : ''; ?>">
		<aside class="ifb-side" aria-label="Article sidebar">
			<?php if ( $has_toc ) : ?>
				<nav class="ifb-toc" aria-label="Table of contents">
					<details class="ifb-toc-box" open>
						<summary><span class="ifb-toc-title">On this page</span><span class="ifb-toc-progress" aria-hidden="true"><i></i></span></summary>
						<ol>
							<?php foreach ( $toc as $item ) : ?>
								<li class="is-h<?php echo esc_attr( (string) $item['level'] ); ?>"><a href="#<?php echo esc_attr( $item['id'] ); ?>"><span><?php echo esc_html( $item['text'] ); ?></span></a></li>
							<?php endforeach; ?>
						</ol>
					</details>
				</nav>
			<?php endif; ?>
			<div class="ifb-promo">
				<img src="<?php echo esc_url( INFOMETRY_CT_URL . 'assets/images/infofiscus-conversa-mark.png' ); ?>" width="141" height="120" alt="" loading="lazy" decoding="async">
				<b>Ask your data anything</b>
				<p>INFOFISCUS Conversa turns plain-English questions into trusted enterprise insights.</p>
				<a href="<?php echo esc_url( home_url( '/product/infofiscus-conversa-decision-intelligence/' ) ); ?>">Explore Conversa <span aria-hidden="true">&rarr;</span></a>
			</div>
		</aside>

		<article id="post-<?php echo esc_attr( (string) $post_id ); ?>" <?php post_class( 'ifb-article' ); ?>>
			<div class="ifb-content" id="ifb-article-start">
				<?php echo $prepared['html']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- filtered post content. ?>
			</div>

			<?php
			wp_link_pages(
				array(
					'before' => '<nav class="ifb-pages">',
					'after'  => '</nav>',
				)
			);

			$tags = get_the_tags();
			if ( $tags ) :
				?>
				<div class="ifb-tags" aria-label="Tags">
					<?php foreach ( $tags as $tag ) : ?>
						<a href="<?php echo esc_url( get_tag_link( $tag ) ); ?>"><?php echo esc_html( $tag->name ); ?></a>
					<?php endforeach; ?>
				</div>
			<?php endif; ?>
		</article>
	</div>

	<section class="ifb-cta" aria-labelledby="ifb-cta-title">
		<div class="ifb-shell ifb-cta-inner">
			<div>
				<h2 id="ifb-cta-title">Turn your data into decisions with Infometry</h2>
				<p>Talk to our data, analytics and AI experts about modernizing your platform and getting more from your enterprise data.</p>
			</div>
			<a class="ifb-button" href="<?php echo esc_url( home_url( '/contact-us/' ) ); ?>">Talk to an Expert <span aria-hidden="true">&rarr;</span></a>
		</div>
	</section>

	<?php if ( $related ) : ?>
		<section class="ifb-related" aria-labelledby="ifb-related-title">
			<div class="ifb-shell">
				<div class="ifb-related-head">
					<h2 id="ifb-related-title">Related Articles</h2>
					<a href="<?php echo esc_url( $blog_url ); ?>">View all articles <span aria-hidden="true">&rarr;</span></a>
				</div>
				<div class="ifb-related-grid">
					<?php
					foreach ( $related as $related_post ) :
						$related_cat = infometry_ct_blog_primary_category( $related_post->ID );
						?>
						<article class="ifb-card">
							<a class="ifb-card-media" href="<?php echo esc_url( get_permalink( $related_post ) ); ?>" tabindex="-1" aria-hidden="true">
								<?php
								if ( has_post_thumbnail( $related_post ) ) {
									echo get_the_post_thumbnail( $related_post, 'medium_large', array( 'loading' => 'lazy', 'alt' => '' ) );
								}
								?>
							</a>
							<div class="ifb-card-body">
								<?php if ( $related_cat ) : ?>
									<span class="ifb-card-cat"><?php echo esc_html( $related_cat->name ); ?></span>
								<?php endif; ?>
								<h3><a href="<?php echo esc_url( get_permalink( $related_post ) ); ?>"><?php echo esc_html( get_the_title( $related_post ) ); ?></a></h3>
								<time datetime="<?php echo esc_attr( get_the_date( 'c', $related_post ) ); ?>"><?php echo esc_html( get_the_date( '', $related_post ) ); ?></time>
							</div>
						</article>
					<?php endforeach; ?>
				</div>
			</div>
		</section>
	<?php endif; ?>
</main>

	<?php
endwhile;

// Home page footer (theme footer is hidden on these posts); get_footer() still runs wp_footer().
require INFOMETRY_CT_PATH . 'templates/partials/site-footer.php';
get_footer();
