<?php
/**
 * The template for displaying 404 pages (not found).
 */

get_header(); ?>

<section class="flex min-h-[65vh] items-center justify-center bg-cream px-5 py-16 text-center lg:px-10 lg:py-28">
	<div class="mx-auto flex max-w-xl flex-col items-center gap-6">
		<span class="font-heading text-7xl font-bold tracking-tight text-purple-dark lg:text-9xl">404</span>
		<h1 class="text-3xl font-semibold text-purple-dark lg:text-4xl"><?php esc_html_e(
  	'Page Not Found',
  	'drtalk-redesign'
  ); ?></h1>
		<p class="text-lg leading-7 text-purple-dark/75">
			<?php esc_html_e(
   	'The page you are looking for might have been removed, had its name changed, or is temporarily unavailable.',
   	'drtalk-redesign'
   ); ?>
		</p>
		<div class="mt-4">
			<a class="inline-flex min-h-12 items-center justify-center rounded-full bg-purple-dark px-8 py-3 text-base font-bold text-cream transition hover:bg-purple" href="<?php echo esc_url(
   	home_url('/')
   ); ?>">
				<?php esc_html_e('Back to Home', 'drtalk-redesign'); ?>
			</a>
		</div>
	</div>
</section>

<?php get_footer(); ?>
