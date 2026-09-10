<?php
/**
 * Template Name: Legal
 * Template Post Type: page
 *
 * @package drtalk-redesign
 */

get_header(); ?>

<?php while (have_posts()): ?>
	<?php the_post(); ?>
	<?php
 $effective_date = drtalk_redesign_get_legal_page_date(get_the_ID(), get_the_date('M j, Y'));

 $content = get_the_content();
 for ($i = 0; $i < 5; $i++) {
 	$prev = $content;
 	$content = preg_replace(
 		'/^\s*(<!--\s*wp:spacer.*?<!--\s*\/wp:spacer\s*-->|<div[^>]*class="[^"]*wp-block-spacer[^"]*"[^>]*><\/div>)\s*/si',
 		'',
 		$content
 	);
 	$content = preg_replace(
 		'/^\s*<!--\s*wp:paragraph\s*\{[^}]*"align":"center"[^}]*\}.*?<!--\s*\/wp:paragraph\s*-->\s*/si',
 		'',
 		$content
 	);
 	$content = preg_replace('/^\s*<p[^>]*class="[^"]*has-text-align-center[^"]*"[^>]*>.*?<\/p>\s*/si', '', $content);
 	$content = preg_replace(
 		'/^\s*<!--\s*wp:heading\s*\{[^}]*"textAlign":"center"[^}]*\}.*?<!--\s*\/wp:heading\s*-->\s*/si',
 		'',
 		$content
 	);
 	$content = preg_replace(
 		'/^\s*<h[1-6][^>]*class="[^"]*has-text-align-center[^"]*"[^>]*>.*?<\/h[1-6]>\s*/si',
 		'',
 		$content
 	);
 	$content = preg_replace(
 		'/^\s*<!--\s*wp:paragraph\s*-->\s*<p>\s*(?:&nbsp;|\s)*<\/p>\s*<!--\s*\/wp:paragraph\s*-->\s*/si',
 		'',
 		$content
 	);
 	$content = preg_replace('/^\s*<p>\s*(?:&nbsp;|\s)*<\/p>\s*/si', '', $content);
 	if ($content === $prev) {
 		break;
 	}
 }
 if (function_exists('sharing_display')) {
 	remove_filter('the_content', 'sharing_display', 19);
 	remove_filter('the_excerpt', 'sharing_display', 19);
 }
 $content = apply_filters('the_content', $content);
 $content = preg_replace('/^\s*<p class="wp-block-paragraph">\s*(?:&nbsp;|\s)*<\/p>\s*/si', '', $content);
 $content = preg_replace('/<div[^>]*class="[^"]*sharedaddy[^"]*"[^>]*>.*?<\/div>\s*<\/div>\s*<\/div>/si', '', $content);
 ?>
	<article <?php post_class('legal-page bg-cream overflow-clip px-5 py-12 lg:px-12 lg:pb-20 lg:pt-12'); ?>>
		<div class="mx-auto flex w-full max-w-[840px] flex-col gap-12">
			<header class="flex w-full flex-col gap-4">
				<h1 class="font-heading text-[36px] font-semibold leading-none text-purple-dark sm:text-[48px] sm:leading-[1.1] sm:tracking-[-0.48px]">
					<?php the_title(); ?>
				</h1>
				<div class="flex items-center gap-1 font-body text-base leading-6 text-purple-dark">
					<span class="opacity-50"><?php esc_html_e('Effective:', 'drtalk-redesign'); ?></span>
					<span><?php echo esc_html($effective_date); ?></span>
				</div>
			</header>

			<div class="legal-content w-full">
				<?php echo $content;
	// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	?>
			</div>
		</div>
	</article>
<?php endwhile; ?>

<?php get_footer(); ?>
