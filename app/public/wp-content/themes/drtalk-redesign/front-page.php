<?php

$referral_gap_analysis_url = esc_url(drtalk_redesign_referral_gap_analysis_url());
$arrow_left_url = esc_url(get_theme_file_uri('assets/images/icon-arrow-left.svg'));
$arrow_right_url = esc_url(get_theme_file_uri('assets/images/icon-arrow-right.svg'));
$testimonial_avatar_placeholder_url = esc_url(get_theme_file_uri('assets/images/testimonial-avatar-placeholder.svg'));
$noise_orange_url = esc_url(get_theme_file_uri('assets/images/footer-pattern.png'));
$noise_dark_url = esc_url(get_theme_file_uri('assets/images/personalized-pattern-dark.png'));
$hero_noise_orange_url = $noise_orange_url;
$hero_noise_dark_url = $noise_dark_url;
$hero_phone_url = esc_url(get_theme_file_uri('assets/images/hero-phone.png'));
$hero_referral_url = esc_url(get_theme_file_uri('assets/images/hero-decoration-referral.png'));
$hero_shield_url = esc_url(get_theme_file_uri('assets/images/hero-decoration-shield.png'));
$hero_money_url = esc_url(get_theme_file_uri('assets/images/hero-decoration-money.png'));
$hero_connection_url = esc_url(get_theme_file_uri('assets/images/hero-decoration-connection.png'));
$different_points = [
	[
		'icon' => 'different-referral-friction-static.png',
		'hover_icon' => 'different-referral-friction-hover.gif',
		'title' => 'Referral Friction',
		'quote' => '“Our current system is primitive - half our referrals come through channels we can barely track.”',
		'description' =>
			'Faxes. Calls. Emails. Web Forms. Referrals slip through every gap. Stop relying on a workflow that can’t catch them all.'
	],
	[
		'icon' => 'different-relationship-risk-static.png',
		'hover_icon' => 'different-relationship-risk-hover.gif',
		'title' => 'Relationship Risk',
		'quote' => '“We got told that we were hard to work with. By a dentist who we thought was our friend.”',
		'description' =>
			'GPs won’t call to complain about a slow response; they’ll just route the next case to your competitor.'
	],
	[
		'icon' => 'different-staff-dependency-static.png',
		'hover_icon' => 'different-staff-dependency-hover.gif',
		'title' => 'Staff Dependency',
		'quote' => '“When she left, no one knew the status of any referral. We lost track of everything.”',
		'description' =>
			'Your growth shouldn’t live with one person. Build a system that moves referrals forward, no matter who is at the front desk.'
	],
	[
		'icon' => 'different-growth-risk-static.png',
		'hover_icon' => 'different-growth-risk-hover.gif',
		'title' => 'Growth Risk',
		'quote' => '“We thought we had a system. We just hadn’t grown into the point where it failed yet.”',
		'description' =>
			'A manual workflow breaks at scale. The system that got you here won’t get you where you’re going.'
	]
];
$different_divider_url = esc_url(get_theme_file_uri('assets/images/different-divider.svg'));
$different_icon_backdrop_url = esc_url(get_theme_file_uri('assets/images/problem-icon-backdrop-orange.svg'));
$different_noise_url = $noise_orange_url;
$how_it_works_steps = [
	[
		'number' => '01',
		'title' => 'Connect your existing workflow',
		'description' =>
			'We pull in every channel you’re already using. One place. No missed leads. And your referring doctors don’t have to change a single habit.',
		'image' => 'how-it-works-01.png'
	],
	[
		'number' => '02',
		'title' => 'Every referral lands in one place',
		'description' =>
			'Our AI sorts, prioritizes, and tracks in real time. So your team always knows what needs attention and who owns it.',
		'image' => 'how-it-works-02.png'
	],
	[
		'number' => '03',
		'title' => 'Collaborate and follow through',
		'description' =>
			'Chat securely, share images, and update case status in one place. No more "Did you get my fax?" Just faster care and a more professional practice.',
		'image' => 'how-it-works-03.png'
	]
];
$how_it_works_noise_url = $noise_orange_url;
$how_it_works_noise_style = esc_attr("--how-it-works-noise-image: url('{$how_it_works_noise_url}');");
$responsiveness_cards = [
	[
		'image' => 'why-us-volume.svg',
		'hover_image' => 'why-us-volume-hover.gif',
		'title' => 'Handle referral volume with confidence',
		'description' =>
			'Our Smart Referral Inbox captures every inbound referral regardless of how it arrives and tracks it through to scheduling with clear visibility. No referral falls through because it came in via the wrong channel.'
	],
	[
		'image' => 'why-us-specialist.svg',
		'hover_image' => 'why-us-specialist-hover.gif',
		'title' => 'Become the easiest specialist to work with',
		'description' =>
			'Communicate instantly with referring dentists through HIPAA-compliant messaging. No scattered emails. No phone tag. Just fast responses that make GPs want to send their next case to you.'
	],
	[
		'image' => 'why-us-workload.svg',
		'hover_image' => 'why-us-workload-hover.gif',
		'title' => 'Reduce your team’s workload',
		'description' =>
			'Eliminate repetitive admin tasks, close follow-up gaps, and free your staff to focus on patients instead of paperwork. Less back-and-forth means shorter handling time per referral and fewer things slipping through the cracks.'
	],
	[
		'image' => 'why-us-anywhere.svg',
		'hover_image' => 'why-us-anywhere-hover.gif',
		'title' => 'Manage referrals from anywhere',
		'description' =>
			'A web-based platform for your front desk. A native mobile app for dentists and specialists. Your whole team stays in control and securely connected, no matter where the work happens.'
	]
];
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
$why_us_noise_url = $noise_dark_url;
$why_us_noise_style = esc_attr("--why-us-noise-image: url('{$why_us_noise_url}');");
$why_us_icon_backdrop_url = esc_url(get_theme_file_uri('assets/images/why-us-icon-backdrop.svg'));
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
$calculator_inputs = [
	[
		'id' => 'referrals',
		'label' => 'Referrals per month',
		'value' => 80,
		'display_value' => '80',
		'minimum' => 10,
		'minimum_label' => '10',
		'maximum' => 300,
		'maximum_label' => '300',
		'step' => 1,
		'prefix' => '',
		'suffix' => ''
	],
	[
		'id' => 'case-value',
		'label' => 'Average case value',
		'value' => 3000,
		'display_value' => '3,000',
		'minimum' => 100,
		'minimum_label' => '100',
		'maximum' => 10000,
		'maximum_label' => '10,000',
		'step' => 100,
		'prefix' => '$',
		'suffix' => ''
	],
	[
		'id' => 'conversion-rate',
		'label' => 'Conversion rate',
		'value' => 42,
		'display_value' => '42',
		'minimum' => 0,
		'minimum_label' => '0',
		'maximum' => 100,
		'maximum_label' => '100',
		'step' => 1,
		'prefix' => '',
		'suffix' => '%'
	]
];
$calculator_noise_url = $noise_dark_url;
$calculator_noise_style = esc_attr("--calculator-noise-image: url('{$calculator_noise_url}');");
$trusted_partners = [
	[
		'file' => 'partner-logo-4.png',
		'class' => 'trusted-partner-tarnow-chu',
		'label' => 'Tarnow Chu Institute',
		'width' => '207',
		'height' => '48'
	],
	[
		'file' => 'partner-logo-1.png',
		'class' => 'trusted-partner-dental-designs',
		'label' => 'Dental Designs',
		'width' => '106.5',
		'height' => '48'
	],
	[
		'file' => 'partner-logo-3.png',
		'class' => 'trusted-partner-dentistry-automation',
		'label' => 'Dentistry Automation',
		'width' => '147',
		'height' => '48'
	],
	[
		'file' => 'partner-logo-5.png',
		'class' => 'trusted-partner-collective-health',
		'label' => 'Collective Health Society',
		'width' => '181.5',
		'height' => '48'
	],
	[
		'file' => 'partner-logo-6.png',
		'class' => 'trusted-partner-hdl',
		'label' => 'HDL Partners',
		'width' => '166',
		'height' => '48'
	]
];

get_header();
?>
<section class="px-2 py-8 sm:px-8 lg:px-12 lg:pb-0 lg:pt-5" data-home-order="1">
	<div class="mx-auto grid max-w-[90rem] gap-2 lg:grid-cols-2">
		<div class="relative flex flex-col items-center justify-center overflow-hidden rounded-3xl bg-purple-dark px-6 py-10 text-center sm:p-10 lg:h-[35rem] lg:min-h-[34rem]">
			<div
				class="hero-noise absolute inset-0"
				style="<?php echo esc_attr('--hero-noise-image: url(\'' . $hero_noise_orange_url . '\');'); ?>"
				aria-hidden="true"
			></div>
			<div class="relative flex w-full max-w-[37rem] flex-col items-center gap-8">
				<div class="flex w-full flex-col items-center gap-4 text-cream">
					<p class="text-[0.8125rem] font-black uppercase leading-4 tracking-[0.15em]">Built by Dentists for Dentists</p>
					<h1 class="text-4xl leading-none tracking-normal sm:text-5xl sm:leading-[1.1] sm:tracking-[-0.01em]">Stop Losing Referrals You Never Knew You Missed</h1>
					<p class="text-lg leading-6 text-cream/90"><span class="hidden lg:inline">Invisible referral leaks cost your practice revenue. Plug the gaps with drtalk. </span>Put AI to work for your office to seamlessly capture, track, and close every referral.</p>
				</div>
				<div class="flex flex-col items-center gap-4">
					<a class="inline-flex min-h-16 items-center justify-center rounded-full bg-orange px-8 py-5 text-center text-base font-bold leading-6 text-purple-dark transition-colors hover:bg-cream focus-visible:outline-orange" href="<?php echo $referral_gap_analysis_url; ?>" target="_blank" rel="noreferrer">Claim Your Free Referral Gap Analysis</a>
					<p class="text-sm leading-5 text-cream/75">
						<span class="block">30 minutes. We do the work.</span>
						<span class="block">You keep the report. No pitch, no obligation.</span>
					</p>
				</div>
			</div>
		</div>
		<div class="hero-visual relative hidden min-h-[28rem] overflow-hidden rounded-3xl bg-lilac lg:block lg:h-[35rem]">
			<div class="hero-visual-stage hero-decoration-stage" aria-hidden="true">
				<img class="hero-decoration hero-decoration-referral" src="<?php echo $hero_referral_url; ?>" width="112" height="114" alt="">
				<img class="hero-decoration hero-decoration-shield" src="<?php echo $hero_shield_url; ?>" width="141" height="140" alt="">
				<img class="hero-decoration hero-decoration-money" src="<?php echo $hero_money_url; ?>" width="127" height="134" alt="">
				<img class="hero-decoration hero-decoration-connection" src="<?php echo $hero_connection_url; ?>" width="149" height="146" alt="">
			</div>
			<div
				class="hero-noise hero-visual-noise absolute inset-0"
				style="<?php echo esc_attr('--hero-noise-image: url(\'' . $hero_noise_dark_url . '\');'); ?>"
				aria-hidden="true"
			></div>
			<div class="hero-visual-stage hero-phone-stage" aria-hidden="true">
				<img class="hero-phone" src="<?php echo $hero_phone_url; ?>" width="1319" height="2748" alt="">
			</div>
			<p class="sr-only"><?php esc_html_e(
   	'drtalk referral dashboard with referral, security, revenue, and connection illustrations.',
   	'drtalk-redesign'
   ); ?></p>
		</div>
	</div>
</section>

<section class="bg-cream px-5 py-14 sm:px-8 lg:px-12" data-home-order="1">
	<div class="mx-auto flex max-w-[90rem] flex-col items-center gap-8">
		<p class="text-[0.8125rem] font-black uppercase leading-4 tracking-[0.15em] text-purple-dark">Trusted By Dentistry’s Top Leaders</p>
		<div class="trusted-partners-marquee">
			<div class="trusted-partners-track">
				<?php foreach ($trusted_partners as $partner): ?>
					<span
						class="trusted-partner-logo <?php echo esc_attr($partner['class']); ?>"
						role="img"
						aria-label="<?php echo esc_attr($partner['label']); ?>"
					></span>
				<?php endforeach; ?>
				<?php foreach ($trusted_partners as $partner): ?>
					<span
						class="trusted-partner-logo trusted-partner-logo-clone <?php echo esc_attr($partner['class']); ?>"
						aria-hidden="true"
					></span>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</section>

<section class="bg-cream px-5 py-14 sm:px-8 lg:px-12 lg:py-[104px]" data-home-order="2" data-problem-section>
	<div class="mx-auto flex max-w-[90rem] flex-col gap-10 lg:gap-20">
		<div class="flex flex-col items-center gap-4 text-center text-purple-dark">
			<p class="text-[0.8125rem] font-black uppercase leading-4 tracking-[0.15em]">Put Operational AI to Work</p>
			<h2 class="text-4xl leading-none tracking-normal sm:text-5xl sm:leading-[1.1] sm:tracking-[-0.01em]">You didn't build a specialty practice to manage inboxes</h2>
			<p class="text-base leading-6 lg:hidden">When referring dentists feel like it's hard to work with you, they don't complain. They just stop referring.</p>
		</div>
		<div class="problem-card-list">
			<?php foreach ($different_points as $point): ?>
				<?php
    $point_icon_url = esc_url(get_theme_file_uri('assets/images/' . $point['icon']));
    $point_hover_icon_url = esc_url(get_theme_file_uri('assets/images/' . $point['hover_icon']));
    $point_title = esc_html($point['title']);
    $point_quote = esc_html($point['quote']);
    $point_description = esc_html($point['description']);
    ?>
				<article
					class="problem-card"
					style="<?php echo esc_attr('--problem-noise-image: url(\'' . $different_noise_url . '\');'); ?>"
					data-problem-card
					tabindex="0"
				>
					<div class="problem-card-noise" aria-hidden="true"></div>
					<div class="problem-card-icon" aria-hidden="true">
						<img class="problem-card-icon-backdrop" src="<?php echo $different_icon_backdrop_url; ?>" width="126" height="80" alt="">
						<img class="problem-card-icon-static" src="<?php echo $point_icon_url; ?>" width="126" height="80" alt="">
						<img class="problem-card-icon-animated" src="<?php echo $point_hover_icon_url; ?>" data-problem-icon-src="<?php echo $point_hover_icon_url; ?>" width="126" height="80" alt="">
					</div>
					<div class="relative flex flex-col items-center gap-4 lg:items-start">
						<h3 class="font-body text-[0.8125rem] font-black uppercase leading-4 tracking-[0.15em] text-purple-dark"><?php echo $point_title; ?></h3>
						<p class="text-lg font-bold italic leading-6 text-purple-dark"><?php echo $point_quote; ?></p>
						<img class="h-0.5 w-8" src="<?php echo $different_divider_url; ?>" width="32" height="2" alt="">
						<p class="text-base leading-6 text-purple-dark/75"><?php echo $point_description; ?></p>
					</div>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<section class="bg-cream px-5 py-14 sm:px-8 lg:px-10 lg:py-[120px]" data-home-order="5">
	<div class="mx-auto flex max-w-[75rem] flex-col items-center gap-10 lg:gap-16">
		<div class="flex flex-col items-center gap-4 text-center text-purple-dark">
			<h2 class="text-4xl leading-none lg:text-5xl lg:leading-[1.1]">Most compete on reputation.<br>The best compete on responsiveness.</h2>
			<p class="max-w-[72rem] text-lg leading-6">drtalk is the only mobile-first platform built by practicing dentists that brings referrals, communication, and visibility into one place.<br class="hidden lg:block"> So nothing gets missed, delayed, or lost again.</p>
		</div>
		<div class="grid w-full grid-cols-1 gap-0 lg:grid-cols-2">
			<?php foreach ($responsiveness_cards as $responsiveness_card): ?>
				<?php
    $responsiveness_image = esc_url(get_theme_file_uri('assets/images/' . $responsiveness_card['image']));
    $responsiveness_hover_image = esc_url(get_theme_file_uri('assets/images/' . $responsiveness_card['hover_image']));
    $responsiveness_title = esc_html($responsiveness_card['title']);
    $responsiveness_description = esc_html($responsiveness_card['description']);
    ?>
				<article class="why-us-card relative flex min-h-[19.75rem] flex-col items-center overflow-hidden rounded-2xl px-4 pb-4 pt-8 text-center text-purple-dark" tabindex="0" data-why-us-card style="<?php echo $why_us_noise_style; ?>">
					<div class="why-us-card-noise" aria-hidden="true"></div>
					<div class="why-us-card-icon relative z-10 h-[6.5625rem] w-[8.75rem] overflow-hidden" aria-hidden="true">
						<img class="why-us-card-icon-backdrop absolute inset-x-0 bottom-0 h-[5.46875rem] w-full" src="<?php echo $why_us_icon_backdrop_url; ?>" width="140" height="88" alt="">
						<img class="why-us-card-icon-static absolute inset-0 size-full object-contain" src="<?php echo $responsiveness_image; ?>" width="140" height="105" alt="">
						<img class="why-us-card-icon-animated absolute inset-0 size-full object-contain" src="<?php echo $responsiveness_hover_image; ?>" data-why-us-icon-src="<?php echo $responsiveness_hover_image; ?>" width="140" height="105" alt="">
					</div>
					<div class="relative z-10 mt-6 flex flex-col gap-2">
						<h3 class="text-[1.625rem] font-medium leading-none tracking-[-0.02em] text-purple-dark"><?php echo $responsiveness_title; ?></h3>
						<p class="text-sm leading-5 text-purple-dark"><?php echo $responsiveness_description; ?></p>
					</div>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>

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

<section class="bg-cream px-5 py-14 lg:px-10 lg:py-[120px]" data-home-order="4" data-how-it-works>
	<div class="mx-auto flex max-w-[75rem] flex-col items-center gap-16">
		<div class="flex flex-col items-center gap-4 text-center text-purple-dark">
			<h2 class="text-4xl leading-none lg:text-5xl lg:leading-[1.1]">From chaos to clarity.<br>No disruption. No overhaul.</h2>
			<p class="text-lg leading-6">drtalk plugs into the referral channels you’re already using. Your referring GPs keep doing what they’re doing. You just capture everything.</p>
		</div>
		<div class="how-it-works-layout">
			<div class="how-it-works-steps" role="tablist" aria-label="How drtalk works" aria-orientation="vertical">
				<?php foreach ($how_it_works_steps as $step_index => $how_it_works_step): ?>
					<?php
     $step_number = esc_html($how_it_works_step['number']);
     $step_title = esc_html($how_it_works_step['title']);
     $step_description = esc_html($how_it_works_step['description']);
     $step_image_url = esc_url(get_theme_file_uri('assets/images/' . $how_it_works_step['image']));
     $step_active = $step_index === 0;
     $step_class = $step_active ? ' is-active' : '';
     $step_index_value = esc_attr($step_index);
     $step_aria_selected = $step_active ? 'true' : 'false';
     $step_tabindex = $step_active ? '0' : '-1';
     ?>
					<button
						id="how-it-works-tab-<?php echo $step_index_value; ?>"
						class="how-it-works-step<?php echo $step_class; ?>"
						type="button"
						role="tab"
						data-how-it-works-step
						data-how-it-works-index="<?php echo $step_index_value; ?>"
						aria-controls="how-it-works-panel-<?php echo $step_index_value; ?>"
						aria-selected="<?php echo $step_aria_selected; ?>"
						tabindex="<?php echo $step_tabindex; ?>"
					>
						<span class="how-it-works-step-number"><?php echo $step_number; ?></span>
						<span class="how-it-works-step-container">
							<span class="how-it-works-step-text">
								<span class="how-it-works-step-title"><?php echo $step_title; ?></span>
								<span class="how-it-works-step-description"><?php echo $step_description; ?></span>
							</span>
							<span class="how-it-works-mobile-media">
								<span class="how-it-works-noise" style="<?php echo $how_it_works_noise_style; ?>" aria-hidden="true"></span>
								<span class="how-it-works-media-screen">
									<img src="<?php echo $step_image_url; ?>" width="2000" height="2000" alt="">
								</span>
							</span>
							<span class="how-it-works-progress"><span class="how-it-works-progress-fill"></span></span>
						</span>
					</button>
				<?php endforeach; ?>
			</div>
			<div class="how-it-works-demo" data-how-it-works-demo data-active-step="0">
				<div class="how-it-works-noise" style="<?php echo $how_it_works_noise_style; ?>" aria-hidden="true"></div>
				<div class="how-it-works-demo-screen">
					<?php foreach ($how_it_works_steps as $step_index => $how_it_works_step): ?>
						<?php
      $demo_step_index = esc_attr($step_index);
      $demo_image_url = esc_url(get_theme_file_uri('assets/images/' . $how_it_works_step['image']));
      $demo_image_alt = esc_attr($how_it_works_step['title']);
      $demo_hidden = $step_index === 0 ? 'false' : 'true';
      ?>
						<figure id="how-it-works-panel-<?php echo $demo_step_index; ?>" class="how-it-works-demo-state" role="tabpanel" aria-labelledby="how-it-works-tab-<?php echo $demo_step_index; ?>" data-how-it-works-demo-state="<?php echo $demo_step_index; ?>" aria-hidden="<?php echo $demo_hidden; ?>">
							<img src="<?php echo $demo_image_url; ?>" width="2000" height="2000" alt="<?php echo $demo_image_alt; ?>">
						</figure>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="bg-cream px-5 py-14 lg:px-10 lg:py-[120px]" data-home-order="3" data-calculator-root>
	<div class="mx-auto flex max-w-[75rem] flex-col items-center gap-10 lg:gap-16">
		<h2 class="w-full text-center text-4xl leading-none lg:text-5xl">If you can't measure your referral leakage, you can't fix it.</h2>
		<div class="relative flex w-full max-w-[64rem] flex-wrap content-center items-center gap-x-4 gap-y-2 overflow-hidden rounded-3xl bg-lilac p-2">
			<div class="calculator-noise pointer-events-none absolute inset-0" style="<?php echo $calculator_noise_style; ?>" aria-hidden="true"></div>
			<div class="relative flex w-full min-w-0 basis-full flex-col gap-5 rounded-[1.125rem] bg-cream p-5 lg:min-w-[20rem] lg:flex-1 lg:basis-0">
				<p class="w-full text-base leading-6 text-purple-dark">How much revenue is slipping through your fingers?</p>
				<?php foreach ($calculator_inputs as $calculator_input): ?>
					<?php
     $calculator_label = esc_html($calculator_input['label']);
     $calculator_id = esc_attr($calculator_input['id']);
     $calculator_value = esc_attr($calculator_input['value']);
     $calculator_minimum = esc_attr($calculator_input['minimum']);
     $calculator_maximum = esc_attr($calculator_input['maximum']);
     $calculator_step = esc_attr($calculator_input['step']);
     $calculator_prefix = esc_html($calculator_input['prefix']);
     $calculator_suffix = esc_html($calculator_input['suffix']);
     $calculator_display_value = esc_attr($calculator_input['display_value']);
     $calculator_minimum_label = esc_html($calculator_prefix . $calculator_input['minimum_label'] . $calculator_suffix);
     $calculator_maximum_label = esc_html($calculator_prefix . $calculator_input['maximum_label'] . $calculator_suffix);
     ?>
					<div class="flex flex-col gap-4">
						<div class="flex items-center gap-2">
							<p class="flex-1 text-sm leading-5 text-[#736962]"><?php echo $calculator_label; ?></p>
							<div class="flex w-24 items-center rounded-[1.25rem] border border-[#d6d1cb] px-4 py-2 text-sm leading-5 text-purple-dark">
								<span><?php echo $calculator_prefix; ?></span>
								<input class="min-w-0 flex-1 bg-transparent text-sm leading-5 outline-none" type="text" inputmode="numeric" value="<?php echo $calculator_display_value; ?>" data-calculator-number="<?php echo $calculator_id; ?>" aria-label="<?php echo $calculator_label; ?>">
								<span><?php echo $calculator_suffix; ?></span>
							</div>
						</div>
						<div class="flex flex-col gap-2">
							<div class="relative h-4">
								<div class="absolute inset-x-0 top-1/2 h-1 -translate-y-1/2 rounded-lg bg-[#d6d1cb]"></div>
								<div class="absolute left-0 top-1/2 h-1 -translate-y-1/2 rounded-lg bg-purple" data-calculator-fill="<?php echo $calculator_id; ?>"></div>
								<span class="pointer-events-none absolute top-1/2 h-5 w-2 -translate-x-1/2 -translate-y-1/2 rounded-lg border-[3px] border-purple bg-cream" data-calculator-thumb="<?php echo $calculator_id; ?>"></span>
								<input class="absolute inset-0 h-4 w-full cursor-pointer opacity-0" type="range" min="<?php echo $calculator_minimum; ?>" max="<?php echo $calculator_maximum; ?>" step="<?php echo $calculator_step; ?>" value="<?php echo $calculator_value; ?>" data-calculator-input="<?php echo $calculator_id; ?>" aria-label="<?php echo $calculator_label; ?>">
							</div>
							<div class="flex justify-between text-xs leading-4 text-[#736962]">
								<span><?php echo $calculator_minimum_label; ?></span>
								<span><?php echo $calculator_maximum_label; ?></span>
							</div>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
			<div class="relative flex w-full min-w-0 basis-full flex-col gap-5 rounded-[1.125rem] p-5 text-purple-dark lg:min-w-[20rem] lg:flex-1 lg:basis-0" data-calculator-results aria-live="polite">
				<div class="flex flex-col gap-3 border-b border-purple-dark/25 pb-3">
					<p class="text-sm leading-5">Monthly revenue at risk</p>
					<p class="text-[2.5rem] leading-none" data-calculator-monthly>$139,200</p>
				</div>
				<div class="flex flex-wrap gap-5 border-b border-purple-dark/25 pb-3">
					<div class="flex flex-1 flex-col gap-3">
						<p class="text-sm leading-5">Annual revenue at risk</p>
						<p class="text-2xl leading-none" data-calculator-annual>$1,670,400</p>
					</div>
					<div class="flex flex-1 flex-col gap-3">
						<p class="text-sm leading-5">Health score</p>
						<div class="flex items-baseline gap-2.5">
							<p class="text-2xl leading-none text-orange" data-calculator-health>44%</p>
							<span class="sr-only" data-calculator-health-band>Poor</span>
							<div class="flex h-5 items-center gap-1" data-calculator-health-bars>
								<?php for ($score_bar = 1; $score_bar <= 10; $score_bar++): ?>
									<span class="h-5 w-[3px] rounded-sm bg-purple-dark/40" data-calculator-health-bar></span>
								<?php endfor; ?>
							</div>
						</div>
					</div>
				</div>
				<div class="flex flex-col items-center gap-4">
					<p class="w-full text-center text-sm leading-5 text-purple-dark/75">Get the full report after the demo call with drtalk team.</p>
					<a class="inline-flex min-h-16 w-full items-center justify-center whitespace-normal rounded-full bg-purple px-8 py-5 text-center text-base font-bold leading-6 text-cream min-[360px]:whitespace-nowrap" href="<?php echo $referral_gap_analysis_url; ?>" target="_blank" rel="noreferrer">Claim Your Free Referral Gap Analysis</a>
				</div>
			</div>
		</div>
	</div>
</section>
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
