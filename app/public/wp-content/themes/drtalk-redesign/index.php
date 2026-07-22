<?php

get_header(); ?>

<div class="flex min-h-screen flex-col" style="padding-top: var(--wp-admin--admin-bar--height, 0);">
	<div class="container mx-auto flex-1 max-w-4xl px-4 py-8 lg:pt-24">
		<?php if (have_posts()): ?>
			<?php while (have_posts()): ?>
				<?php the_post(); ?>
				<div class="prose max-w-none">
					<?php the_content(); ?>
				</div>
			<?php endwhile; ?>
		<?php else: ?>
			<p><?php esc_html_e('No posts found.', 'drtalk-redesign'); ?></p>
		<?php endif; ?>
	</div>
</div>

<?php get_footer(); ?>
