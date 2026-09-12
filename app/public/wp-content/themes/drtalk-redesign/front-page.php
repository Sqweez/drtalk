<?php

$referral_gap_analysis_url = esc_url(drtalk_redesign_referral_gap_analysis_url());
$arrow_left_url = esc_url(get_theme_file_uri('assets/images/icon-arrow-left.svg'));
$arrow_right_url = esc_url(get_theme_file_uri('assets/images/icon-arrow-right.svg'));
$testimonial_avatar_placeholder_url = esc_url(get_theme_file_uri('assets/images/testimonial-avatar-placeholder.svg'));
$noise_orange_url = esc_url(get_theme_file_uri('assets/images/footer-pattern.png'));
$noise_dark_url = esc_url(get_theme_file_uri('assets/images/personalized-pattern-dark.png'));

$results_stats = [
	[
		'value' => '$500M+',
		'copy' => 'In referral-driven <strong>revenue</strong> tracked',
		'image' => 'numbers-1.svg',
		'key' => 'revenue'
	],
	[
		'value' => 'Up to 20%',
		'copy' => '<strong>Revenue growth</strong> for drtalk practices in year one',
		'image' => 'numbers-2.svg',
		'key' => 'growth'
	],
	[
		'value' => '1,500+',
		'copy' => '<strong>Practices</strong> on drtalk nationwide',
		'image' => 'numbers-3.svg',
		'key' => 'practices'
	],
	[
		'value' => '70%',
		'copy' => '<strong>Faster</strong> time-to-scheduled appointment',
		'image' => 'numbers-4.svg',
		'key' => 'faster'
	],
	[
		'value' => '60%',
		'copy' => '<strong>Reduction</strong> in admin<span class="numbers-card-copy-break"><br></span> workload',
		'image' => 'numbers-5.svg',
		'key' => 'workload'
	]
];
$numbers_noise_url = $noise_dark_url;
$numbers_noise_style = esc_attr("--numbers-noise-image: url('{$numbers_noise_url}');");
$personalized_audiences = [
	[
		'label' => 'Dental Specialists',
		'title' => 'Be the First Choice for Referrals',
		'description' =>
			'Your reputation earns the referral. Your system keeps it. drtalk helps you ensure every referral is handled - and every GP knows it.',
		'image' => 'personas-specialists.png',
		'tone' => 'lilac'
	],
	[
		'label' => 'Office Managers',
		'title' => 'Run the Office Like a Pro',
		'description' =>
			'No more chasing faxes or hunting through email threads. Every referral is visible, assigned, and tracked in one place. Less chaos, clearer ownership, smoother days.',
		'image' => 'personas-managers.png',
		'tone' => 'orange'
	],
	[
		'label' => 'Referring GPs',
		'title' => 'Referring Shouldn’t Be a Hassle',
		'description' =>
			'No more patient handoffs that fall through the cracks. Send referrals the way you already work and get fast, clear communication back. Free for referring dentists, always.',
		'image' => 'personas-gps.png',
		'tone' => 'lilac'
	]
];
$personalized_dark_noise_url = $noise_dark_url;
$personalized_orange_noise_url = $noise_orange_url;
$personalized_noise_urls = ['lilac' => $personalized_dark_noise_url, 'orange' => $personalized_orange_noise_url];
$founder_image_url = esc_url(get_theme_file_uri('assets/images/thomas-stone-figma.png'));
$about_page_url = esc_url(home_url('/about-us/'));
$concerns_noise_url = $noise_orange_url;
$concerns_noise_style = esc_attr("--concerns-noise-image: url('{$concerns_noise_url}');");
$fomo_noise_url = $noise_dark_url;
$fomo_noise_style = esc_attr("--fomo-noise-image: url('{$fomo_noise_url}');");
$cta_noise_url = $noise_orange_url;
$cta_noise_style = esc_attr("--cta-noise-image: url('{$cta_noise_url}');");
$cta_steps = [
	[
		'icon' => 'cta-process-1.png',
		'title' => 'We learn your workflow',
		'copy' => 'How referrals come in today, who handles them, and how it gets back to referring GPs.'
	],
	[
		'icon' => 'cta-process-2.png',
		'title' => 'We show you the breakpoints',
		'copy' => 'We give you a score and highlight common pain points for practices with similar setups.'
	],
	[
		'icon' => 'cta-process-3.png',
		'title' => 'You keep the full findings',
		'copy' => 'A written analysis summary is yours to keep, regardless of what you decide to do next.'
	],
	[
		'icon' => 'cta-process-4.png',
		'title' => 'No follow up pressure',
		'copy' =>
			"If drtalk isn't right for your practice, we'll tell you that. Our job is to be useful. Not to close you."
	]
];
$concerns = [
	[
		'title' => '“We already have a system for referrals.”',
		'answer' =>
			'Great - then the analysis will help you pressure-test it. We\'ll walk through how practices with similar setups handle growth, staff turnover, and GP responsiveness expectations. If your workflow holds up, you\'ll know it. If there are gaps, you\'ll see them before they become expensive.'
	],
	[
		'title' => '“I don\'t want to add another subscription.”',
		'answer' =>
			'You\'re not being asked to. The analysis is free and comes with no obligation. If after seeing how drtalk works alongside your current setup the ROI isn\'t obvious, it\'s probably not the right move and we\'ll say so.'
	],
	[
		'title' => '“My GPs won\'t use another platform.”',
		'answer' =>
			'They don\'t have to, and many join on their own once they realize it makes their life easier too. Free access for GPs, nothing to install, and direct secure messaging and point-of-care scheduling with your office instead of chasing calls and faxes.'
	],
	[
		'title' => '“My staff won\'t adopt another tool.”',
		'answer' =>
			'Staff resistance comes from tools that add to their workload. During the review we\'ll show specifically how drtalk reduces the daily chaos your team already deals with, not pile on top of it.'
	]
];
$testimonials = drtalk_redesign_get_testimonials();
get_header();
?>
<?php get_template_part('template-parts/blocks/hero'); ?>
<?php get_template_part('template-parts/blocks/partners'); ?>

<?php get_template_part('template-parts/blocks/problem-cards'); ?>
<?php get_template_part('template-parts/blocks/calculator'); ?>

<?php get_template_part('template-parts/blocks/responsiveness'); ?>

<section class="bg-cream px-5 py-14 sm:px-8 lg:px-10 lg:py-[120px]" data-home-order="6">
	<div class="mx-auto flex max-w-[88.5rem] flex-col items-center gap-10 lg:gap-16">
		<h2 class="text-center text-4xl leading-none lg:text-5xl lg:leading-[1.1]">Real results.<br class="lg:hidden"> Proven at scale.</h2>
		<div class="numbers-grid grid w-full grid-cols-1 gap-1 lg:grid-cols-6 lg:gap-4">
			<?php foreach ($results_stats as $results_stat): ?>
				<?php
    $results_value = esc_html($results_stat['value']);
    $results_copy = wp_kses_post($results_stat['copy']);
    $results_image = esc_url(get_theme_file_uri('assets/images/' . $results_stat['image']));
    $results_key = esc_attr($results_stat['key']);
    ?>
				<article class="numbers-card relative flex min-h-[7.5rem] flex-col overflow-hidden rounded-2xl bg-lilac px-5 pb-8 pt-5 text-purple-dark lg:h-[17.5rem] lg:rounded-3xl lg:px-12 lg:py-14" data-stat="<?php echo $results_key; ?>" style="<?php echo $numbers_noise_style; ?>" tabindex="0">
					<div class="numbers-card-noise" aria-hidden="true"></div>
					<div class="relative z-10">
						<p class="font-heading text-[2.5rem] font-medium leading-[1.1] tracking-[-0.01em] lg:text-7xl lg:leading-[normal]"><?php echo $results_value; ?></p>
						<p class="mt-1 max-w-[17rem] text-sm leading-5 text-purple-dark lg:mt-2 lg:max-w-60 lg:text-lg lg:leading-6"><?php echo $results_copy; ?></p>
					</div>
					<img class="numbers-card-illustration pointer-events-none absolute -bottom-6 -right-4 hidden h-60 w-60 object-contain lg:block" src="<?php echo $results_image; ?>" width="240" height="240" alt="">
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<?php get_template_part('template-parts/blocks/how-it-works'); ?>


<section class="relative overflow-hidden bg-cream px-5 py-14 lg:px-10 lg:py-[120px]" data-home-order="8" data-testimonials>
	<div class="mx-auto flex max-w-[75rem] flex-col items-center gap-10 lg:gap-16">
		<h2 class="text-center text-4xl leading-none lg:text-5xl lg:leading-[1.1]">For the people who use it every day.</h2>
		<div class="testimonials-swiper w-full" data-testimonials-swiper>
			<div class="swiper-wrapper">
				<?php foreach ($testimonials as $testimonial_index => $testimonial): ?>
					<?php
     $testimonial_is_orange = $testimonial_index % 2 === 0;
     $orange_tone_class = 'testimonial-card--orange bg-[#fce2cc] border-orange';
     $lilac_tone_class = 'testimonial-card--lilac bg-lilac border-purple';
     $testimonial_tone_class = esc_attr($testimonial_is_orange ? $orange_tone_class : $lilac_tone_class);
     $testimonial_eyebrow = esc_html($testimonial['eyebrow']);
     $testimonial_quote = esc_html($testimonial['quote']);
     $testimonial_border = $testimonial_is_orange ? 'border-orange' : 'border-purple';
     $testimonial_name = esc_html($testimonial['name']);
     $testimonial_role = esc_html($testimonial['role']);
     $testimonial_company = esc_attr($testimonial['company']);
     $testimonial_avatar = esc_url($testimonial['avatar_url']);
     $testimonial_logo = esc_url($testimonial['logo_url']);
     ?>
					<article class="testimonial-card swiper-slide relative flex h-[30.5rem] w-full shrink-0 flex-col gap-10 overflow-hidden rounded-3xl <?php echo $testimonial_tone_class; ?> px-6 py-8 text-purple-dark lg:h-[34rem] lg:w-[30rem] lg:px-8 lg:py-12">
						<div class="flex min-h-[4.5rem] items-start justify-between">
							<?php if ($testimonial_avatar): ?>
								<img class="testimonial-avatar" src="<?php echo $testimonial_avatar; ?>" alt="<?php echo $testimonial_name; ?>">
							<?php else: ?>
								<img class="testimonial-avatar" src="<?php echo $testimonial_avatar_placeholder_url; ?>" width="72" height="72" alt="">
							<?php endif; ?>
							<?php if ($testimonial_logo): ?>
								<img class="testimonial-company-logo" src="<?php echo $testimonial_logo; ?>" alt="<?php echo $testimonial_company; ?>">
							<?php endif; ?>
						</div>
						<div class="flex flex-1 flex-col gap-4"><p class="text-[0.8125rem] font-black uppercase tracking-[0.15em] text-purple-dark/75"><?php echo $testimonial_eyebrow; ?></p><p class="text-lg leading-6 lg:text-2xl lg:leading-8"><?php echo $testimonial_quote; ?></p></div>
						<div class="border-l-4 pl-4 <?php echo $testimonial_border; ?>"><p class="font-bold"><?php echo $testimonial_name; ?></p><p class="text-sm text-purple-dark/75"><?php echo $testimonial_role; ?></p></div>
					</article>
				<?php endforeach; ?>
			</div>
		</div>
		<div class="flex gap-6"><button class="testimonial-control" type="button" data-testimonials-previous aria-label="Previous testimonial"><img src="<?php echo $arrow_left_url; ?>" width="16" height="16" alt=""></button><button class="testimonial-control" type="button" data-testimonials-next aria-label="Next testimonial"><img src="<?php echo $arrow_right_url; ?>" width="16" height="16" alt=""></button></div>
	</div>
</section>
<section class="bg-cream px-5 py-14 lg:px-10 lg:py-[120px]" data-home-order="7" data-personalized>
	<div class="personalized-sticky mx-auto flex max-w-[75rem] flex-col items-center gap-8 lg:gap-12" data-personalized-sticky>
		<h2 class="text-center text-4xl leading-none lg:text-5xl lg:leading-[1.1]">The same platform, different relief for everyone it touches.</h2>
		<div class="personalized-tabs" role="tablist" aria-label="Audience">
			<?php foreach ($personalized_audiences as $audience_index => $audience): ?>
				<?php
    $audience_active = $audience_index === 0;
    $audience_class = $audience_active ? ' is-active' : '';
    $audience_index_value = esc_attr($audience_index);
    $audience_selected = $audience_active ? 'true' : 'false';
    $audience_label = esc_html($audience['label']);
    ?>
				<button class="personalized-tab<?php echo $audience_class; ?>" type="button" role="tab" data-personalized-tab data-personalized-index="<?php echo $audience_index_value; ?>" aria-selected="<?php echo $audience_selected; ?>"><?php echo $audience_label; ?></button>
			<?php endforeach; ?>
		</div>
		<div class="personalized-panel" data-personalized-panel data-active-index="0">
			<div class="personalized-track">
				<?php foreach ($personalized_audiences as $audience_index => $audience): ?>
				<?php
    $personalized_state_index = esc_attr($audience_index);
    $personalized_state_hidden = $audience_index === 0 ? 'false' : 'true';
    $personalized_title = esc_html($audience['title']);
    $personalized_description = esc_html($audience['description']);
    $personalized_screen = esc_url(get_theme_file_uri('assets/images/' . $audience['image']));
    $personalized_tone = $audience['tone'] === 'orange' ? ' personalized-state--orange' : ' personalized-state--lilac';
    $personalized_tone_class = esc_attr($personalized_tone);
    $personalized_noise = $personalized_noise_urls[$audience['tone']];
    $personalized_noise_style = esc_attr("--personalized-noise-image: url('{$personalized_noise}');");
    ?>
					<div class="personalized-state<?php echo $personalized_tone_class; ?>" data-personalized-state="<?php echo $personalized_state_index; ?>" aria-hidden="<?php echo $personalized_state_hidden; ?>">
						<div class="personalized-noise" style="<?php echo $personalized_noise_style; ?>" aria-hidden="true"></div>
						<div class="personalized-copy">
							<div><h3><?php echo $personalized_title; ?></h3><p><?php echo $personalized_description; ?></p></div>
							<div class="personalized-action"><a href="<?php echo $referral_gap_analysis_url; ?>" target="_blank" rel="noreferrer">Book a Demo Today</a><p>30 minutes. No pitch, no obligation.</p></div>
						</div>
						<div class="personalized-screen"><img src="<?php echo $personalized_screen; ?>" alt="drtalk platform screen"></div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</section>
<section class="founder-section" data-home-order="9" aria-labelledby="founder-title">
	<div class="founder-section-content">
		<h2 class="founder-section-mobile-title">Built by specialists who lived the problem. Not developers who read about it.</h2>
		<div class="founder-section-profile">
			<img class="founder-section-image" src="<?php echo $founder_image_url; ?>" alt="Thomas L. Stone">
			<div class="founder-section-profile-copy">
				<h3>Thomas L. Stone,<br>MD, DDS, FACS</h3>
				<p>Oral &amp; Maxillofacial Surgeon;<br>Founder of drtalk (est. 2014)</p>
			</div>
		</div>
		<div class="founder-section-story">
			<h2 id="founder-title" class="founder-section-desktop-title">Built by specialists who lived the problem. Not developers who read about it.</h2>
			<p>Over more than 25 years in oral surgery, Dr. Stone watched referral workflows break under growth, GP relationships quietly cool when communication lagged, and talented staff spend hours on admin that a better system would have handled automatically.</p>
			<p>He created drtalk because no existing tool was built for the way specialist practices actually work. Not as an outsider guessing at the problem, but as someone who lived it for decades.</p>
			<a class="founder-section-link" href="<?php echo $about_page_url; ?>">
				<span>Read Our Story</span>
				<svg aria-hidden="true" viewBox="0 0 24 24" fill="none">
					<path d="M5 12h14m-6-6 6 6-6 6" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.75" />
				</svg>
			</a>
		</div>
	</div>
</section>
<section class="concerns-section" data-home-order="10" data-concerns aria-labelledby="concerns-title">
	<div class="concerns-section-content">
		<h2 id="concerns-title">Common concerns. Honest answers.</h2>
		<div class="concerns-carousel" data-concerns-carousel>
			<div class="concerns-track" data-concerns-track>
				<?php foreach ($concerns as $concern_index => $concern): ?>
					<?php
     $concern_title = esc_html($concern['title']);
     $concern_answer = esc_html($concern['answer']);
     $concern_index_value = esc_attr($concern_index);
     ?>
					<article class="concerns-card" data-concerns-card="<?php echo $concern_index_value; ?>">
						<div class="concerns-card-noise" style="<?php echo $concerns_noise_style; ?>" aria-hidden="true"></div>
						<div class="concerns-card-copy">
							<h3><?php echo $concern_title; ?></h3>
							<p><?php echo $concern_answer; ?></p>
						</div>
						<button class="concerns-next" type="button" data-concerns-next aria-label="Show next concern">
							<svg class="concerns-next-icon" viewBox="0 0 64 64" aria-hidden="true">
								<circle class="concerns-next-track" cx="32" cy="32" r="31" pathLength="1" />
								<circle class="concerns-next-progress" cx="32" cy="32" r="31" pathLength="1" />
								<path class="concerns-next-arrow" d="M36.175 33L31.2875 37.8875C30.895 38.28 30.8979 38.9172 31.2938 39.3062C31.6848 39.6904 32.3124 39.6876 32.7 39.3L39.2929 32.7071C39.6834 32.3166 39.6834 31.6834 39.2929 31.2929L32.7 24.7C32.3124 24.3124 31.6848 24.3096 31.2938 24.6938C30.8979 25.0828 30.895 25.72 31.2875 26.1125L36.175 31H25C24.4477 31 24 31.4477 24 32C24 32.5523 24.4477 33 25 33H36.175Z" />
							</svg>
						</button>
					</article>
				<?php endforeach; ?>
			</div>
		</div>
		<div class="concerns-pagination" role="tablist" aria-label="Common concerns">
			<?php foreach ($concerns as $concern_index => $concern): ?>
				<?php
    $concern_index_value = esc_attr($concern_index);
    $concern_selected = $concern_index === 0 ? 'true' : 'false';
    $concern_label = esc_attr('Show concern ' . ($concern_index + 1));
    ?>
				<button class="concerns-dot" type="button" role="tab" data-concerns-dot="<?php echo $concern_index_value; ?>" aria-selected="<?php echo $concern_selected; ?>" aria-label="<?php echo $concern_label; ?>"></button>
			<?php endforeach; ?>
		</div>
	</div>
</section>
<section class="fomo-section" data-home-order="11" data-fomo data-fomo-baseline="0" data-fomo-hourly-rate="4640" aria-labelledby="fomo-title">
	<div class="fomo-noise" style="<?php echo $fomo_noise_style; ?>" aria-hidden="true"></div>
	<div class="fomo-content">
		<div class="fomo-copy">
			<h2 id="fomo-title">What you lose without<br>a smart referral process.</h2>
			<p>The average specialist practice loses $4,640 every hour to missed and unconverted referrals.<br>Here's what's slipped by since you landed on this page:</p>
		</div>
		<div class="fomo-counter">
			<p class="fomo-amount" data-fomo-amount>$0.00</p>
			<p class="fomo-time"><span aria-hidden="true"></span><span data-fomo-time>00m:00s on page</span></p>
			<p class="fomo-disclaimer">Based on 80 referrals/mo, 58% leakage, $3,000 avg case value —<br>industry averages for specialty dental practices.</p>
		</div>
	</div>
</section>
<section class="cta-section" data-home-order="12" aria-labelledby="cta-title">
	<div class="cta-noise" style="<?php echo $cta_noise_style; ?>" aria-hidden="true"></div>
	<div class="cta-content">
		<div class="cta-heading">
			<h2 id="cta-title">Your referral workflow has gaps.</h2>
			<p>Give us 30 minutes and we’ll find them.</p>
		</div>
		<div class="cta-steps">
			<?php foreach ($cta_steps as $cta_step): ?>
				<?php
    $cta_icon = esc_url(get_theme_file_uri('assets/images/' . $cta_step['icon']));
    $cta_title = esc_html($cta_step['title']);
    $cta_copy = esc_html($cta_step['copy']);
    ?>
				<article class="cta-step">
					<img class="cta-step-icon" src="<?php echo $cta_icon; ?>" alt="">
					<div class="cta-step-copy">
						<h3><?php echo $cta_title; ?></h3>
						<p><?php echo $cta_copy; ?></p>
					</div>
				</article>
			<?php endforeach; ?>
		</div>
		<div class="cta-action">
			<a class="cta-button" href="<?php echo $referral_gap_analysis_url; ?>" target="_blank" rel="noreferrer">Claim Your Free Referral Gap Analysis</a>
			<p>30 minutes. No obligation<br>Best with practice owner + office manager.</p>
		</div>
	</div>
</section>
<?php get_template_part('template-parts/home', 'faq'); ?>
<?php get_footer();
