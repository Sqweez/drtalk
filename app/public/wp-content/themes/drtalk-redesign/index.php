<?php

get_header();

if (have_posts()) {
	while (have_posts()) {
		the_post(); ?>
		<article class="site-container py-16 lg:py-24">
			<h1><?php the_title(); ?></h1>
			<div class="mt-8 max-w-3xl text-lg leading-8">
				<?php the_content(); ?>
			</div>
		</article>
		<?php
	}
}

get_footer();
