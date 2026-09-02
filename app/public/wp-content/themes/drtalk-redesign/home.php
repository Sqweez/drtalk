<?php
/**
 * The blog index and news archive template.
 *
 * @package drtalk-redesign
 */

$paged = get_query_var('paged') ? get_query_var('paged') : (get_query_var('page') ? get_query_var('page') : 1);
$blog_query = new WP_Query([
	'post_type' => 'post',
	'post_status' => 'publish',
	'posts_per_page' => 9,
	'paged' => $paged
]);

get_header();

$noise_orange_url = esc_url(get_theme_file_uri('assets/images/footer-pattern.png'));
$noise_dark_url = esc_url(get_theme_file_uri('assets/images/personalized-pattern-dark.png'));
$hero_noise_style = esc_attr("--news-hero-noise-image: url('{$noise_orange_url}');");
$cta_noise_style = esc_attr("--news-cta-noise-image: url('{$noise_dark_url}');");
$footer_logo_url = esc_url(get_theme_file_uri('assets/images/footer-logo.svg'));
$referral_gap_analysis_url = esc_url(drtalk_redesign_referral_gap_analysis_url());
?>

<!-- Hero Section -->
<section class="relative overflow-hidden bg-cream px-5 pb-5 pt-12 lg:px-12 lg:pb-12 lg:pt-20" data-name="hero-section">
	<div class="news-hero-noise" style="<?php echo $hero_noise_style; ?>" aria-hidden="true"></div>
	<div class="relative mx-auto flex w-full max-w-[1200px] flex-col gap-4 text-purple-dark" data-name="textblock">
		<h1 class="font-heading text-[32px] font-medium leading-[1.1] tracking-[-0.32px] text-purple-dark lg:text-[40px] lg:tracking-[-0.4px]">
			<?php esc_html_e('The Latest from drtalk', 'drtalk-redesign'); ?>
		</h1>
		<p class="font-body text-[16px] font-normal leading-[24px] text-purple-dark opacity-90">
			<?php esc_html_e('Product news, company updates, and more from the team at drtalk.', 'drtalk-redesign'); ?>
		</p>
	</div>
</section>

<!-- Numbers / Articles Section -->
<section class="bg-cream px-5 py-12 lg:p-12 lg:pb-20" data-name="numbers-section">
	<div class="mx-auto flex w-full max-w-[1200px] flex-col gap-12" data-name="content">
		<?php if ($blog_query->have_posts()): ?>
			<div class="grid w-full grid-cols-1 gap-x-8 gap-y-12 sm:grid-cols-2 lg:grid-cols-3" data-name="article-list">
				<?php while ($blog_query->have_posts()): ?>
					<?php
     $blog_query->the_post();
     $permalink = esc_url(get_permalink());
     $title = get_the_title();
     $excerpt = get_the_excerpt();
     $date = get_the_date('F j, Y');
     ?>
					<article class="group flex w-full min-w-0 flex-col items-start gap-6" data-name="article">
						<a class="relative aspect-[400/200] w-full overflow-hidden rounded-[8px] border border-[#ede8e1] bg-[#873bb7]" href="<?php echo $permalink; ?>" data-name="image-container">
							<?php if (has_post_thumbnail()): ?>
								<?php the_post_thumbnail('large', [
        	'class' =>
        		'h-full w-full object-cover transition-transform duration-300 group-hover:scale-105 group-hover:opacity-90',
        	'alt' => esc_attr($title)
        ]); ?>
							<?php else: ?>
								<div class="flex h-full w-full items-center justify-center bg-[#873bb7] p-6 transition-transform duration-300 group-hover:scale-105">
									<img src="<?php echo $footer_logo_url; ?>" width="119" height="32" alt="<?php echo esc_attr(
	$title
); ?>" class="opacity-90" />
								</div>
							<?php endif; ?>
						</a>
						<div class="flex w-full flex-col gap-2 text-purple-dark" data-name="Info">
							<h2 class="font-heading text-[24px] font-semibold leading-[1.1] tracking-[-0.24px] text-purple-dark transition-colors duration-200 [text-decoration-skip-ink:none] group-hover:text-purple group-hover:underline">
								<a href="<?php echo $permalink; ?>">
									<?php echo esc_html($title); ?>
								</a>
							</h2>
							<div class="font-body text-[16px] font-normal leading-[24px] text-purple-dark line-clamp-3">
								<?php echo esc_html($excerpt); ?>
							</div>
							<time class="font-body text-[14px] font-normal leading-[20px] text-purple-dark opacity-50" datetime="<?php echo esc_attr(
       	get_the_date('c')
       ); ?>">
								<?php echo esc_html($date); ?>
							</time>
						</div>
					</article>
				<?php endwhile; ?>
			</div>

			<?php
   $total_pages = $blog_query->max_num_pages;
   if ($total_pages > 1):

   	$current_page = max(1, $paged);
   	$prev_link = $current_page > 1 ? get_pagenum_link($current_page - 1) : '';
   	$next_link = $current_page < $total_pages ? get_pagenum_link($current_page + 1) : '';
   	?>
				<nav class="flex flex-wrap items-center gap-4 pt-4" aria-label="<?php esc_attr_e(
    	'Pagination',
    	'drtalk-redesign'
    ); ?>" data-name="actions">
					<?php if ($prev_link): ?>
						<a href="<?php echo esc_url(
      	$prev_link
      ); ?>" class="inline-flex size-16 items-center justify-center rounded-[32px] border-2 border-purple-dark text-purple-dark transition-colors duration-200 hover:bg-purple-dark hover:text-cream" aria-label="<?php esc_attr_e(
	'Previous page',
	'drtalk-redesign'
); ?>" data-name="button-icon">
							<svg class="size-6 shrink-0" viewBox="0 0 24 24" fill="none" aria-hidden="true">
								<path d="M7.825 13L12.7125 17.8875C13.105 18.28 13.1021 18.9172 12.7062 19.3062C12.3152 19.6904 11.6876 19.6876 11.3 19.3L4.70711 12.7071C4.31658 12.3166 4.31658 11.6834 4.70711 11.2929L11.3 4.70003C11.6876 4.31241 12.3152 4.30964 12.7062 4.69381C13.1021 5.08281 13.105 5.72003 12.7125 6.11253L7.825 11H19C19.5523 11 20 11.4477 20 12C20 12.5523 19.5523 13 19 13H7.825Z" fill="currentColor"/>
							</svg>
						</a>
					<?php else: ?>
						<span class="pointer-events-none inline-flex size-16 items-center justify-center rounded-[32px] border-2 border-purple-dark text-purple-dark opacity-30" aria-hidden="true" data-name="button-icon">
							<svg class="size-6 shrink-0" viewBox="0 0 24 24" fill="none" aria-hidden="true">
								<path d="M7.825 13L12.7125 17.8875C13.105 18.28 13.1021 18.9172 12.7062 19.3062C12.3152 19.6904 11.6876 19.6876 11.3 19.3L4.70711 12.7071C4.31658 12.3166 4.31658 11.6834 4.70711 11.2929L11.3 4.70003C11.6876 4.31241 12.3152 4.30964 12.7062 4.69381C13.1021 5.08281 13.105 5.72003 12.7125 6.11253L7.825 11H19C19.5523 11 20 11.4477 20 12C20 12.5523 19.5523 13 19 13H7.825Z" fill="currentColor"/>
							</svg>
						</span>
					<?php endif; ?>

					<div class="hidden flex-wrap items-center gap-4 sm:flex">
						<?php
      $page_links = paginate_links([
      	'total' => $total_pages,
      	'current' => $current_page,
      	'type' => 'array',
      	'prev_next' => false,
      	'mid_size' => 2,
      	'end_size' => 1
      ]);
      if (!empty($page_links)):
      	foreach ($page_links as $link):
      		if (strpos($link, 'current') !== false):
      			preg_match('/>([^<]+)</', $link, $m);
      			$num = $m[1] ?? '1';
      			echo '<span class="inline-flex size-16 items-center justify-center rounded-[32px] bg-purple-dark font-body text-[16px] font-bold leading-[24px] text-cream" aria-current="page" data-name="button">' .
      				esc_html($num) .
      				'</span>';
      		elseif (strpos($link, 'dots') !== false):
      			echo '<span class="inline-flex size-16 items-center justify-center rounded-[32px] border-2 border-[#d6d1cb] bg-cream font-body text-[16px] font-bold leading-[24px] text-purple-dark" data-name="button">…</span>';
      		else:
      			preg_match('/href="([^"]+)"/', $link, $href_m);
      			preg_match('/>([^<]+)</', $link, $text_m);
      			$href = $href_m[1] ?? '#';
      			$num = $text_m[1] ?? '1';
      			echo '<a href="' .
      				esc_url($href) .
      				'" class="inline-flex size-16 items-center justify-center rounded-[32px] border-2 border-[#d6d1cb] bg-cream font-body text-[16px] font-bold leading-[24px] text-purple-dark transition hover:border-purple-dark hover:bg-purple-dark/5" data-name="button">' .
      				esc_html($num) .
      				'</a>';
      		endif;
      	endforeach;
      endif;
      ?>
					</div>

					<?php if ($next_link): ?>
						<a href="<?php echo esc_url(
      	$next_link
      ); ?>" class="inline-flex size-16 items-center justify-center rounded-[32px] border-2 border-purple-dark text-purple-dark transition-colors duration-200 hover:bg-purple-dark hover:text-cream" aria-label="<?php esc_attr_e(
	'Next page',
	'drtalk-redesign'
); ?>" data-name="button-icon">
							<svg class="size-6 shrink-0" viewBox="0 0 24 24" fill="none" aria-hidden="true">
								<path d="M16.175 13L11.2875 17.8875C10.895 18.28 10.8979 18.9172 11.2938 19.3062C11.6848 19.6904 12.3124 19.6876 12.7 19.3L19.2929 12.7071C19.6834 12.3166 19.6834 11.6834 19.2929 11.2929L12.7 4.70003C12.3124 4.31241 11.6848 4.30964 11.2938 4.69381C10.8979 5.08281 10.895 5.72003 11.2875 6.11253L16.175 11H5C4.44772 11 4 11.4477 4 12C4 12.5523 4.44772 13 5 13H16.175Z" fill="currentColor"/>
							</svg>
						</a>
					<?php else: ?>
						<span class="pointer-events-none inline-flex size-16 items-center justify-center rounded-[32px] border-2 border-purple-dark text-purple-dark opacity-30" aria-hidden="true" data-name="button-icon">
							<svg class="size-6 shrink-0" viewBox="0 0 24 24" fill="none" aria-hidden="true">
								<path d="M16.175 13L11.2875 17.8875C10.895 18.28 10.8979 18.9172 11.2938 19.3062C11.6848 19.6904 12.3124 19.6876 12.7 19.3L19.2929 12.7071C19.6834 12.3166 19.6834 11.6834 19.2929 11.2929L12.7 4.70003C12.3124 4.31241 11.6848 4.30964 11.2938 4.69381C10.8979 5.08281 10.895 5.72003 11.2875 6.11253L16.175 11H5C4.44772 11 4 11.4477 4 12C4 12.5523 4.44772 13 5 13H16.175Z" fill="currentColor"/>
							</svg>
						</span>
					<?php endif; ?>
				</nav>
			<?php
   endif;
   ?>
		<?php else: ?>
			<p class="text-lg text-purple-dark opacity-70"><?php esc_html_e('No articles found.', 'drtalk-redesign'); ?></p>
		<?php endif; ?>
		<?php wp_reset_postdata(); ?>
	</div>
</section>

<!-- CTA Section -->
<section class="relative overflow-hidden bg-[#f3e8f7] px-5 py-14 lg:px-12 lg:py-20" aria-labelledby="cta-news-title" data-name="cta-section">
	<div class="news-cta-noise" style="<?php echo $cta_noise_style; ?>" aria-hidden="true"></div>
	<div class="relative mx-auto flex w-full max-w-[1024px] flex-col items-center gap-8 text-center" data-name="left">
		<div class="flex w-full flex-col items-center gap-4 text-purple-dark" data-name="textblock">
			<div class="flex w-full flex-col justify-end font-body text-[13px] font-black uppercase leading-4 tracking-[1.95px] text-purple-dark">
				<p class="mb-0 leading-4"><?php esc_html_e('FREE 30-MINUTE SESSION', 'drtalk-redesign'); ?></p>
			</div>
			<h2 id="cta-news-title" class="font-heading text-[32px] font-semibold leading-[1.1] tracking-[-0.32px] text-purple-dark sm:text-[48px] sm:tracking-[-0.48px]">
				<?php esc_html_e('See exactly where your referrals are slipping through the cracks', 'drtalk-redesign'); ?>
			</h2>
			<p class="max-w-[1024px] font-body text-[16px] font-normal leading-[24px] text-purple-dark opacity-90 sm:text-[18px]">
				<?php esc_html_e(
    	'30 minutes. We walk through how referrals move through your practice today, identify where your current process is costing you, and give you a summary to keep. Whether or not drtalk turns out to be right for you.',
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

<?php get_footer(); ?>
