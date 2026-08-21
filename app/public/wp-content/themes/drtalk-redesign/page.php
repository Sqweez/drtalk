<?php
/**
 * The template for displaying all single pages.
 */

get_header(); ?>

<article <?php post_class('min-h-[60vh] bg-cream px-5 py-12 lg:px-10 lg:py-20'); ?>>
	<div class="mx-auto max-w-4xl">
		<?php while (have_posts()): ?>
			<?php the_post(); ?>
			<header class="mb-10 text-center">
				<h1 class="text-4xl font-semibold leading-[1.1] text-purple-dark lg:text-5xl"><?php the_title(); ?></h1>
			</header>
			<div class="prose max-w-none text-lg leading-8 text-purple-dark/80">
				<?php the_content(); ?>
			</div>
		<?php endwhile; ?>
	</div>
</article>

<?php get_footer(); ?>
