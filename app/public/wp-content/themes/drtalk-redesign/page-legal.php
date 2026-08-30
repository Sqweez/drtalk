<?php
/**
 * Template Name: Legal
 * Template Post Type: page
 *
 * @package drtalk-redesign
 */

get_header(); ?>

<article <?php post_class('legal-page min-h-[60vh] bg-cream px-5 py-12 lg:px-10 lg:py-20'); ?>>
	<div class="mx-auto max-w-4xl">
		<?php while (have_posts()): ?>
			<?php the_post(); ?>
			<div class="legal-content text-base leading-relaxed text-purple-dark/85 lg:text-lg lg:leading-8">
				<?php the_content(); ?>
			</div>
		<?php endwhile; ?>
	</div>
</article>

<?php get_footer(); ?>
