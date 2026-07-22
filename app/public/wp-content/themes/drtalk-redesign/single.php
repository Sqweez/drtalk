<?php

get_header(); ?>

<div class="flex min-h-screen flex-col" style="padding-top: var(--wp-admin--admin-bar--height, 0);">
	<div class="container mx-auto flex-1 max-w-5xl px-4 py-8 lg:pt-24">
		<?php if (have_posts()): ?>
			<?php while (have_posts()): ?>
				<?php the_post(); ?>
				<section class="flex w-full flex-col overflow-hidden bg-opacity-10 px-5 py-16">
					<header class="flex flex-col justify-center gap-6 leading-none text-neutral-900 sm:mx-auto sm:max-w-md lg:mx-auto lg:max-w-max lg:gap-y-8">
						<h3 class="text-center text-xl font-semibold tracking-normal text-purple-500 lg:text-2xl">Blog</h3>
						<h1 class="text-center text-3xl font-semibold leading-7 tracking-tight text-zinc-700 lg:text-5xl"><?php the_title(); ?></h1>
					</header>
				</section>
				<div class="prose max-w-none">
					<?php the_content(); ?>
				</div>
			<?php endwhile; ?>
		<?php else: ?>
			<p><?php esc_html_e('Post not found.', 'drtalk-redesign'); ?></p>
		<?php endif; ?>
	</div>
</div>

<?php get_footer(); ?>
