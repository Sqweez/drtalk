<?php
/**
 * Single post template (News / Blog article)
 *
 * @package drtalk-redesign
 */

get_header();

$noise_dark_url = esc_url(get_theme_file_uri('assets/images/personalized-pattern-dark.png'));
$cta_noise_style = esc_attr("--news-cta-noise-image: url('{$noise_dark_url}');");
$referral_gap_analysis_url = esc_url(drtalk_redesign_referral_gap_analysis_url());
$blog_url = esc_url(home_url('/blog/'));
?>

<?php if (have_posts()): ?>
	<?php while (have_posts()): ?>
		<?php
  the_post();
  $post_id = get_the_ID();
  $title = get_the_title();
  $permalink = get_permalink();
  $author_name = get_the_author();
  $published_date = get_the_date('M j, Y');
  $modified_date = get_the_modified_date('M j, Y');

  $content = get_the_content();
  if (function_exists('sharing_display')) {
  	remove_filter('the_content', 'sharing_display', 19);
  	remove_filter('the_excerpt', 'sharing_display', 19);
  }
  $content = apply_filters('the_content', $content);
  $content = preg_replace(
  	'/<div[^>]*class="[^"]*sharedaddy[^"]*"[^>]*>.*?<\/div>\s*<\/div>\s*<\/div>/si',
  	'',
  	$content
  );
  ?>

		<article id="post-<?php echo esc_attr($post_id); ?>" <?php post_class('single-article bg-cream'); ?>>
			<!-- Article Main Section -->
			<section class="overflow-clip bg-cream px-5 py-12 lg:px-12 lg:pb-20 lg:pt-12" data-name="numbers-section">
				<div class="mx-auto flex w-full max-w-[840px] flex-col gap-12" data-name="content">
					<!-- Article Header -->
					<header class="flex w-full flex-col gap-6" data-name="Frame 477">
						<!-- Breadcrumb -->
						<nav class="flex w-full max-w-[1200px] items-center gap-2 font-body text-[16px] leading-6 text-purple-dark" aria-label="<?php esc_attr_e(
      	'Breadcrumb',
      	'drtalk-redesign'
      ); ?>" data-name="headline">
							<a href="<?php echo $blog_url; ?>" class="shrink-0 transition-colors hover:text-purple">
								<?php esc_html_e('News', 'drtalk-redesign'); ?>
							</a>
							<span class="shrink-0 text-purple-dark opacity-50" aria-hidden="true">/</span>
							<span class="min-w-0 flex-1 truncate text-purple-dark opacity-50" aria-current="page">
								<?php echo esc_html($title); ?>
							</span>
						</nav>

						<!-- Post Title -->
						<div class="flex w-full max-w-[1200px] flex-col gap-4" data-name="textblock">
							<h1 class="font-heading text-[36px] font-semibold leading-none tracking-normal text-purple-dark sm:text-[48px] sm:leading-[1.1] sm:tracking-[-0.48px]">
								<?php echo esc_html($title); ?>
							</h1>
						</div>

						<!-- Meta Info Row -->
						<div class="flex w-full max-w-[1200px] flex-wrap items-center gap-x-4 gap-y-2 font-body text-[16px] leading-6 text-purple-dark" data-name="headline">
							<div class="flex shrink-0 items-center gap-1">
								<span class="opacity-50"><?php esc_html_e('Author:', 'drtalk-redesign'); ?></span>
								<span><?php echo esc_html($author_name); ?></span>
							</div>
							<span class="size-1 shrink-0 rounded-full bg-purple-dark" aria-hidden="true"></span>
							<div class="flex shrink-0 items-center gap-1">
								<span class="opacity-50"><?php esc_html_e('Published:', 'drtalk-redesign'); ?></span>
								<time datetime="<?php echo esc_attr(get_the_date('c')); ?>"><?php echo esc_html($published_date); ?></time>
							</div>
							<span class="size-1 shrink-0 rounded-full bg-purple-dark" aria-hidden="true"></span>
							<div class="flex shrink-0 items-center gap-1">
								<span class="opacity-50"><?php esc_html_e('Last Update:', 'drtalk-redesign'); ?></span>
								<time datetime="<?php echo esc_attr(get_the_modified_date('c')); ?>"><?php echo esc_html($modified_date); ?></time>
							</div>
						</div>
					</header>

					<!-- Article Body -->
					<div class="article-content w-full">
						<?php echo $content;
 	// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
 	?>
					</div>

					<!-- Share Section -->
					<div class="flex w-full max-w-[1200px] flex-col gap-4" data-name="links">
						<p class="font-body text-[14px] font-bold leading-5 text-purple-dark">
							<?php esc_html_e('Share this article:', 'drtalk-redesign'); ?>
						</p>
						<div class="flex flex-wrap items-center gap-4" data-name="actions">
							<a
								href="https://www.facebook.com/sharer/sharer.php?u=<?php echo rawurlencode($permalink); ?>"
								target="_blank"
								rel="noopener noreferrer"
								class="inline-flex h-10 items-center justify-center rounded-full border border-purple-dark bg-cream px-5 py-2 font-body text-[16px] font-bold leading-6 text-purple-dark transition hover:bg-purple-dark hover:text-cream focus-visible:outline-orange"
								data-name="button"
							>
								<?php esc_html_e('Facebook', 'drtalk-redesign'); ?>
							</a>
							<a
								href="https://twitter.com/intent/tweet?url=<?php echo rawurlencode($permalink); ?>&text=<?php echo rawurlencode(
	$title
); ?>"
								target="_blank"
								rel="noopener noreferrer"
								class="inline-flex h-10 items-center justify-center rounded-full border border-purple-dark bg-cream px-5 py-2 font-body text-[16px] font-bold leading-6 text-purple-dark transition hover:bg-purple-dark hover:text-cream focus-visible:outline-orange"
								data-name="button"
							>
								<?php esc_html_e('X (Twitter)', 'drtalk-redesign'); ?>
							</a>
						</div>
					</div>
				</div>
			</section>

			<!-- CTA Section -->
			<section class="relative overflow-hidden bg-[#f3e8f7] px-5 py-14 lg:px-12 lg:py-20" aria-labelledby="cta-article-title" data-name="cta-section">
				<div class="news-cta-noise" style="<?php echo $cta_noise_style; ?>" aria-hidden="true"></div>
				<div class="relative mx-auto flex w-full max-w-[1024px] flex-col items-center gap-8 text-center" data-name="left">
					<div class="flex w-full flex-col items-center gap-4 text-purple-dark" data-name="textblock">
						<div class="flex w-full flex-col justify-end font-body text-[13px] font-black uppercase leading-4 tracking-[1.95px] text-purple-dark">
							<p class="mb-0 leading-4"><?php esc_html_e('FREE 30-MINUTE SESSION', 'drtalk-redesign'); ?></p>
						</div>
						<h2 id="cta-article-title" class="font-heading text-[36px] font-semibold leading-none tracking-normal text-purple-dark sm:text-[48px] sm:leading-[1.1] sm:tracking-[-0.48px]">
							<?php esc_html_e('See exactly where your referrals are slipping through the cracks', 'drtalk-redesign'); ?>
						</h2>
						<p class="max-w-[1024px] font-body text-[18px] font-normal leading-6 text-purple-dark opacity-90">
							<?php esc_html_e(
       	'In your free Referral Gap Analysis, we walk through how referrals move through your practice, identify where your current process is costing you, and show you what a more reliable system looks like going forward.',
       	'drtalk-redesign'
       ); ?>
						</p>
					</div>
					<div class="flex w-full flex-col items-center gap-4" data-name="actions">
						<a class="inline-flex min-h-16 items-center justify-center rounded-[32px] bg-purple px-8 py-5 text-center font-body text-[16px] font-bold leading-6 text-cream transition hover:bg-purple-dark focus-visible:outline-orange" href="<?php echo $referral_gap_analysis_url; ?>" target="_blank" rel="noreferrer" data-name="button">
							<?php esc_html_e('Book your free Referral Gap Analysis', 'drtalk-redesign'); ?>
						</a>
						<p class="text-center font-body text-[14px] font-normal leading-5 text-purple-dark opacity-75">
							<?php esc_html_e('30 minutes · Best with practice owner + office manager · No obligation', 'drtalk-redesign'); ?>
						</p>
					</div>
				</div>
			</section>
		</article>
	<?php endwhile; ?>
<?php else: ?>
	<section class="bg-cream px-5 py-20 lg:px-12">
		<div class="mx-auto max-w-[840px] text-center">
			<h1 class="font-heading text-3xl font-semibold text-purple-dark"><?php esc_html_e(
   	'Post not found.',
   	'drtalk-redesign'
   ); ?></h1>
			<p class="mt-4 font-body text-base text-purple-dark/80">
				<a href="<?php echo $blog_url; ?>" class="text-purple underline hover:text-purple-dark"><?php esc_html_e(
	'Return to News',
	'drtalk-redesign'
); ?></a>
			</p>
		</div>
	</section>
<?php endif; ?>

<?php get_footer(); ?>
