<?php

$demo_url = esc_url(drtalk_redesign_demo_url());
$hero_noise_orange_url = esc_url(get_theme_file_uri('assets/images/noise-orange.png'));
$hero_noise_dark_url = esc_url(get_theme_file_uri('assets/images/noise-dark.png'));
$hero_phone_url = esc_url(get_theme_file_uri('assets/images/hero-phone.png'));
$hero_referral_url = esc_url(get_theme_file_uri('assets/images/hero-decoration-referral.png'));
$hero_shield_url = esc_url(get_theme_file_uri('assets/images/hero-decoration-shield.png'));
$hero_money_url = esc_url(get_theme_file_uri('assets/images/hero-decoration-money.png'));
$hero_connection_url = esc_url(get_theme_file_uri('assets/images/hero-decoration-connection.png'));
$different_points = [
	[
		'icon' => 'different-referral-friction.svg',
		'hover_icon' => 'different-referral-friction-hover.gif',
		'title' => 'Referral Friction',
		'quote' => '“Our current system is primitive - half our referrals come through channels we can barely track.”',
		'description' =>
			'Faxes. Calls. Emails. Web Forms. Referrals slip through every gap. Stop relying on a workflow that can’t catch them all.'
	],
	[
		'icon' => 'different-relationship-risk.svg',
		'hover_icon' => 'different-relationship-risk-hover.gif',
		'title' => 'Relationship Risk',
		'quote' => '“We got told we were hard to work with. By a dentist we thought was our friend.”',
		'description' =>
			'GPs won’t call to complain about a slow response; they’ll just route the next case to your competitor.'
	],
	[
		'icon' => 'different-staff-dependency.svg',
		'hover_icon' => 'different-staff-dependency-hover.gif',
		'title' => 'Staff Dependency',
		'quote' => '“When she left, no one knew the status of any referral. We lost track of everything.”',
		'description' =>
			'Your growth shouldn’t live with one person. Build a system that moves referrals forward, no matter who is at the front desk.'
	],
	[
		'icon' => 'different-growth-risk.svg',
		'hover_icon' => 'different-growth-risk-hover.gif',
		'title' => 'Growth Risk',
		'quote' => '“We thought we had a system. We just hadn’t grown into the point where it failed yet.”',
		'description' =>
			'A manual workflow breaks at scale. The system that got you here won’t get you where you’re going.'
	]
];
$different_divider_url = esc_url(get_theme_file_uri('assets/images/different-divider.svg'));
$different_noise_url = esc_url(get_theme_file_uri('assets/images/noise-orange.png'));
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
			'Every fax, call, email, and web form becomes one clear referral record your whole office can see and move forward.',
		'image' => 'how-it-works-02.png'
	],
	[
		'number' => '03',
		'title' => 'Collaborate and close the loop',
		'description' =>
			'Keep your team aligned, update referring dentists automatically, and give every patient a clear next step.',
		'image' => 'how-it-works-03.png'
	]
];
$how_it_works_noise_url = esc_url(get_theme_file_uri('assets/images/noise-orange.png'));
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
	['value' => '$500M+', 'copy' => 'In referral-driven <strong>revenue</strong> tracked', 'image' => 'numbers-1.svg'],
	[
		'value' => 'Up to 20%',
		'copy' => '<strong>Revenue growth</strong> for drtalk practices in year one',
		'image' => 'numbers-2.svg'
	],
	['value' => '60%', 'copy' => '<strong>Reduction</strong> in admin workload', 'image' => 'numbers-3.svg'],
	['value' => '1,500+', 'copy' => '<strong>Practices</strong> on drtalk nationwide', 'image' => 'numbers-4.svg'],
	['value' => '70%', 'copy' => '<strong>Faster</strong> time-to-scheduled appointment', 'image' => 'numbers-5.svg']
];
$why_us_noise_url = esc_url(get_theme_file_uri('assets/images/noise-dark.png'));
$why_us_noise_style = esc_attr("--why-us-noise-image: url('{$why_us_noise_url}');");
$why_us_icon_backdrop_url = esc_url(get_theme_file_uri('assets/images/why-us-icon-backdrop.svg'));
$numbers_noise_url = esc_url(get_theme_file_uri('assets/images/noise-dark.png'));
$numbers_noise_style = esc_attr("--numbers-noise-image: url('{$numbers_noise_url}');");
$personalized_audiences = [
	[
		'label' => 'Dental Specialists',
		'title' => 'Be the First Choice for Referrals',
		'description' =>
			'Most specialists compete on reputation. The best ones compete on responsiveness. drtalk gives you the system to make sure every referral is handled - and every GP knows it.',
		'image' => 'personalized-screen.png'
	],
	[
		'label' => 'Office Managers',
		'title' => 'Keep the Whole Office in Sync',
		'description' =>
			'Every referral, task, message, and next step lives in one clear workflow. Your team spends less time chasing updates and more time helping patients.',
		'image' => 'personalized-screen.png'
	],
	[
		'label' => 'Referring GPs',
		'title' => 'Know What Happens Next',
		'description' =>
			'Send a referral, see its progress, and get updates without a phone call. drtalk makes it simple to work with the specialists your patients trust.',
		'image' => 'personalized-screen.png'
	]
];
$personalized_noise_url = esc_url(get_theme_file_uri('assets/images/personalized-noise.png'));
$founder_image_url = esc_url(get_theme_file_uri('assets/images/thomas-stone.jpeg'));
$about_page_url = esc_url(home_url('/about-us/'));
$concerns_noise_url = esc_url(get_theme_file_uri('assets/images/concerns-noise.png'));
$concerns_scribble_url = esc_url(get_theme_file_uri('assets/images/concerns-scribble.svg'));
$fomo_noise_url = esc_url(get_theme_file_uri('assets/images/concerns-noise.png'));
$cta_noise_url = esc_url(get_theme_file_uri('assets/images/concerns-noise.png'));
$cta_steps = [
	[
		'icon' => 'cta-step-2.svg',
		'title' => 'We learn your workflow',
		'emphasis' => 'How referrals come in',
		'copy' => ' today, who handles them, and how it gets back to referring GPs.'
	],
	[
		'icon' => 'cta-step-3.svg',
		'title' => 'We show you the breakpoints',
		'emphasis' => 'We give you a score',
		'copy' => ' and highlight common pain points for practices with similar setups.'
	],
	[
		'icon' => 'cta-step-4.svg',
		'title' => 'You keep the full findings',
		'emphasis' => 'A written analysis summary',
		'copy' => ' is yours to keep, regardless of what you decide to do next.'
	],
	[
		'icon' => 'cta-step-1.svg',
		'title' => 'No follow up pressure',
		'emphasis' => "If drtalk isn't right",
		'copy' => " for your practice, we'll tell you that. Our job is to be useful. Not to close you."
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
$testimonials = [
	[
		'eyebrow' => 'Save Time',
		'quote' =>
			'“Every referral is captured, tracked, and converted into scheduled appointments without manual chasing or missed connections.”',
		'name' => 'Yost Smith',
		'role' => 'Oral & Maxillofacial Surgeon',
		'company' => 'NorthShore Center for Oral & Facial Surgery and Implantology',
		'avatar' => 'testimonial-6.png',
		'logo' => 'testimonial-1.png',
		'tone' => 'orange'
	],
	[
		'eyebrow' => 'Stay Connected',
		'quote' =>
			'“Our lab runs smoother than ever. We process cases securely and stay connected with every dentist we serve.”',
		'name' => 'Ross Ballinger',
		'role' => 'Full Arch Director',
		'company' => 'Dental Designs',
		'avatar' => 'testimonial-7.png',
		'logo' => 'testimonial-3.png',
		'tone' => 'lilac'
	],
	[
		'eyebrow' => 'Eliminate Leakage',
		'quote' => 'drtalk has eliminated referral leakage and increased our overall profitability.',
		'name' => 'Ali Salehpour',
		'role' => 'Oral & Maxillofacial Surgeon',
		'company' => 'Oral, Facial, & Implant Surgery Center of Monterey',
		'avatar' => 'testimonial-8.png',
		'logo' => 'testimonial-4.png',
		'tone' => 'orange'
	]
];
$testimonials_noise_url = esc_url(get_theme_file_uri('assets/images/testimonial-5.png'));
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
$calculator_noise_url = esc_url(get_theme_file_uri('assets/images/noise-dark.png'));
$calculator_noise_style = esc_attr("--calculator-noise-image: url('{$calculator_noise_url}');");
$trusted_partners = [
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
		'file' => 'partner-logo-4.png',
		'class' => 'trusted-partner-tarnow-chu',
		'label' => 'Tarnow Chu Institute',
		'width' => '207',
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
					<a class="inline-flex min-h-16 items-center justify-center rounded-full bg-orange px-8 py-5 text-center text-base font-bold leading-6 text-purple-dark transition-colors hover:bg-cream focus-visible:outline-orange" href="<?php echo $demo_url; ?>" target="_blank" rel="noreferrer">Claim Your Free Referral Gap Analysis</a>
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
				<img class="hero-phone" src="<?php echo $hero_phone_url; ?>" width="304" height="491" alt="">
			</div>
			<p class="sr-only"><?php esc_html_e(
   	'drtalk referral dashboard with referral, security, revenue, and connection illustrations.',
   	'drtalk-redesign'
   ); ?></p>
		</div>
	</div>
</section>

<section class="px-5 py-14 sm:px-8 lg:px-12 lg:pb-[88px] lg:pt-20" data-home-order="1">
	<div class="mx-auto flex max-w-[75rem] flex-col items-center gap-8">
		<p class="text-[0.8125rem] font-black uppercase leading-4 tracking-[0.15em] text-purple-dark">Trusted By Dentistry’s Top Leaders</p>
		<div class="flex w-full items-start justify-start gap-12 overflow-hidden lg:justify-center">
			<?php foreach ($trusted_partners as $partner): ?>
				<span
					class="trusted-partner-logo <?php echo esc_attr($partner['class']); ?> block shrink-0 bg-purple-dark"
					role="img"
					aria-label="<?php echo esc_attr($partner['label']); ?>"
				></span>
			<?php endforeach; ?>
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
		<div class="grid w-full grid-cols-1 gap-0 lg:grid-cols-4">
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
	<div class="mx-auto flex max-w-[75rem] flex-col items-center gap-10 lg:gap-12">
		<h2 class="text-center text-4xl leading-none lg:text-5xl lg:leading-[1.1]">Real results.<br>Proven at scale.</h2>
		<div class="numbers-grid grid w-full grid-cols-1 gap-1 lg:grid-cols-6">
			<?php foreach ($results_stats as $results_stat): ?>
				<?php
    $results_value = esc_html($results_stat['value']);
    $results_copy = wp_kses_post($results_stat['copy']);
    $results_image = esc_url(get_theme_file_uri('assets/images/' . $results_stat['image']));
    ?>
				<article class="numbers-card relative flex h-[7.5rem] flex-col overflow-hidden rounded-2xl bg-lilac px-5 pb-8 pt-5 text-purple-dark lg:col-span-2 lg:h-80 lg:rounded-[2rem] lg:px-12 lg:py-14" style="<?php echo $numbers_noise_style; ?>">
					<div class="numbers-card-noise" aria-hidden="true"></div>
					<div class="relative z-10">
						<p class="text-[2.5rem] font-medium leading-[1.1] tracking-[-0.01em] lg:text-7xl lg:font-semibold lg:tracking-[-0.03em]"><?php echo $results_value; ?></p>
						<p class="mt-1 max-w-[17rem] text-sm leading-5 text-purple-dark lg:mt-2 lg:max-w-60 lg:text-lg lg:leading-6"><?php echo $results_copy; ?></p>
					</div>
					<img class="pointer-events-none absolute -bottom-8 -right-6 hidden h-60 w-60 object-contain lg:block" src="<?php echo $results_image; ?>" width="240" height="240" alt="">
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
			<div class="relative flex w-full min-w-0 flex-1 flex-col gap-5 rounded-[1.125rem] bg-cream p-5 sm:min-w-[20rem]">
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
			<div class="relative flex w-full min-w-0 flex-1 flex-col gap-5 rounded-[1.125rem] p-5 text-purple-dark sm:min-w-[20rem]" data-calculator-results aria-live="polite">
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
							<p class="text-2xl leading-none text-[#c9252d]" data-calculator-health>44%</p>
							<span class="sr-only" data-calculator-health-band>Poor</span>
							<div class="flex h-5 items-center gap-1" data-calculator-health-bars>
								<?php for ($score_bar = 1; $score_bar <= 10; $score_bar++): ?>
									<span class="h-5 w-[3px] rounded-sm bg-purple-dark/25" data-calculator-health-bar></span>
								<?php endfor; ?>
							</div>
						</div>
					</div>
				</div>
				<div class="flex flex-col items-center gap-4">
					<p class="w-full text-center text-sm leading-5 text-purple-dark/75">Get the full report after the demo call with drtalk team.</p>
					<a class="inline-flex min-h-16 w-full items-center justify-center rounded-full bg-purple px-8 py-5 text-center text-base font-bold leading-6 text-cream" href="<?php echo $demo_url; ?>" target="_blank" rel="noreferrer">Claim Your Free Referral Gap Analysis</a>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="relative overflow-hidden bg-cream px-10 py-[120px]" data-home-order="8" data-testimonials>
	<div class="mx-auto flex max-w-[75rem] flex-col items-center gap-16">
		<h2 class="text-center text-5xl leading-[1.1]">For the people who use it every day.</h2>
		<div class="testimonials-swiper w-full" data-testimonials-swiper>
			<div class="swiper-wrapper">
				<?php foreach ($testimonials as $testimonial): ?>
					<?php
     $testimonial_avatar = esc_url(get_theme_file_uri('assets/images/' . $testimonial['avatar']));
     $testimonial_logo = esc_url(get_theme_file_uri('assets/images/' . $testimonial['logo']));
     $testimonial_tone = $testimonial['tone'] === 'lilac' ? 'bg-lilac border-purple' : 'bg-[#fce2cc] border-orange';
     $testimonial_tone_class = esc_attr($testimonial_tone);
     $testimonial_eyebrow = esc_html($testimonial['eyebrow']);
     $testimonial_quote = esc_html($testimonial['quote']);
     $testimonial_border = $testimonial['tone'] === 'lilac' ? 'border-purple' : 'border-orange';
     $testimonial_name = esc_html($testimonial['name']);
     $testimonial_role = esc_html($testimonial['role']);
     $testimonial_company = esc_html($testimonial['company']);
     ?>
					<article class="testimonial-card swiper-slide flex h-[34rem] w-[30rem] shrink-0 flex-col gap-10 overflow-hidden rounded-3xl border-l-4 <?php echo $testimonial_tone_class; ?> px-8 py-12 text-purple-dark">
						<div class="flex items-start justify-between"><img class="size-20 rounded-full object-cover" src="<?php echo $testimonial_avatar; ?>" alt=""><img class="h-20 w-30 object-contain" src="<?php echo $testimonial_logo; ?>" alt=""></div>
						<div class="flex flex-1 flex-col gap-4"><p class="text-[0.8125rem] font-black uppercase tracking-[0.15em] text-purple-dark/75"><?php echo $testimonial_eyebrow; ?></p><p class="text-2xl leading-8"><?php echo $testimonial_quote; ?></p></div>
						<div class="border-l-4 pl-4 <?php echo $testimonial_border; ?>"><p class="font-bold"><?php echo $testimonial_name; ?></p><p class="text-sm text-purple-dark/75"><?php echo $testimonial_role; ?></p><p class="text-sm text-purple-dark/75"><?php echo $testimonial_company; ?></p></div>
					</article>
				<?php endforeach; ?>
			</div>
		</div>
		<div class="flex gap-6"><button class="testimonial-control" type="button" data-testimonials-previous aria-label="Previous testimonial">←</button><button class="testimonial-control" type="button" data-testimonials-next aria-label="Next testimonial">→</button></div>
	</div>
</section>
<section class="bg-cream px-10 py-[120px]" data-home-order="7" data-personalized>
	<div class="mx-auto flex max-w-[75rem] flex-col items-center gap-12">
		<h2 class="text-center text-5xl leading-[1.1]">The same platform, different relief for everyone it touches.</h2>
		<div class="flex items-center justify-center gap-2 rounded-[1.75rem] border border-[#736962] p-2" role="tablist" aria-label="Audience">
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
		<div class="personalized-panel relative flex h-[32.5rem] w-full gap-16 overflow-hidden rounded-3xl bg-lilac p-16" data-personalized-panel data-active-index="0">
			<img class="pointer-events-none absolute inset-0 size-full object-cover opacity-10" src="<?php echo $personalized_noise_url; ?>" alt="">
			<?php foreach ($personalized_audiences as $audience_index => $audience): ?>
				<?php
    $personalized_state_index = esc_attr($audience_index);
    $personalized_state_hidden = $audience_index === 0 ? 'false' : 'true';
    $personalized_title = esc_html($audience['title']);
    $personalized_description = esc_html($audience['description']);
    $personalized_screen = esc_url(get_theme_file_uri('assets/images/' . $audience['image']));
    ?>
				<div class="personalized-state" data-personalized-state="<?php echo $personalized_state_index; ?>" aria-hidden="<?php echo $personalized_state_hidden; ?>">
					<div class="flex h-full w-[30rem] flex-col justify-between">
						<div><h3 class="text-[2rem] font-medium leading-[1.1]"><?php echo $personalized_title; ?></h3><p class="mt-4 text-lg leading-6"><?php echo $personalized_description; ?></p></div>
						<div><a class="inline-flex h-14 items-center justify-center rounded-[28px] bg-purple px-8 text-base font-bold text-cream transition-colors hover:bg-purple-dark" href="<?php echo $demo_url; ?>" target="_blank" rel="noreferrer">Book a Demo Today</a><p class="mt-4 text-base text-purple-dark/75">30 minutes. No pitch, no obligation.</p></div>
					</div>
					<div class="personalized-screen"><img src="<?php echo $personalized_screen; ?>" alt="drtalk platform screen"></div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
<section class="founder-section" data-home-order="9" aria-labelledby="founder-title">
	<div class="founder-section-content">
		<div class="founder-section-profile">
			<img class="founder-section-image" src="<?php echo $founder_image_url; ?>" alt="Thomas L. Stone">
			<div class="founder-section-profile-copy">
				<h3>Thomas L. Stone,<br>MD, DDS, FACS</h3>
				<p>Oral &amp; Maxillofacial Surgeon;<br>Founder of drtalk (est. 2014)</p>
			</div>
		</div>
		<div class="founder-section-story">
			<h2 id="founder-title">Built by specialists who lived the problem. Not developers who read about it.</h2>
			<p>Over more than 25 years in oral surgery, Dr. Stone watched referral workflows break under growth, GP relationships quietly cool when communication lagged, and talented staff spend hours on admin that a better system would have handled automatically.</p>
			<p>He created drtalk because no existing tool was built for the way specialist practices actually work. Not as an outsider guessing at the problem, but as someone who lived it for decades.</p>
			<a class="founder-section-link" href="<?php echo $about_page_url; ?>">
				<span>Read Our Story</span>
				<svg aria-hidden="true" viewBox="0 0 24 24" fill="none">
					<path d="M14 4h6v6M20 4l-9 9M20 14v5a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V5a1 1 0 0 1 1-1h5" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.75" />
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
						<img class="concerns-card-noise" src="<?php echo $concerns_noise_url; ?>" alt="">
						<img class="concerns-card-scribble" src="<?php echo $concerns_scribble_url; ?>" alt="">
						<div class="concerns-card-copy">
							<h3><?php echo $concern_title; ?></h3>
							<p><?php echo $concern_answer; ?></p>
						</div>
						<button class="concerns-next" type="button" data-concerns-next aria-label="Show next concern"><span aria-hidden="true">→</span></button>
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
<section class="fomo-section" data-home-order="11" data-fomo data-fomo-baseline="194.33" data-fomo-hourly-rate="4640" aria-labelledby="fomo-title">
	<img class="fomo-noise" src="<?php echo $fomo_noise_url; ?>" alt="">
	<div class="fomo-content">
		<div class="fomo-copy">
			<h2 id="fomo-title">What you’re losing without<br>an intelligent digital referral process</h2>
			<p>The average specialist practice loses $4,640 every hour to missed and unconverted referrals.<br>Here's what's slipped by since you landed on this page:</p>
		</div>
		<div class="fomo-counter">
			<p class="fomo-amount" data-fomo-amount>$194.33</p>
			<p class="fomo-time"><span aria-hidden="true"></span><span data-fomo-time>00m:00s on page</span></p>
			<p class="fomo-disclaimer">Based on 80 referrals/mo, 58% leakage, $3,000 avg case value —<br>industry averages for specialty dental practices.</p>
		</div>
	</div>
</section>
<section class="cta-section" data-home-order="12" aria-labelledby="cta-title">
	<img class="cta-noise" src="<?php echo $cta_noise_url; ?>" alt="">
	<div class="cta-content">
		<h2 id="cta-title">Your referral workflow has gaps.<br>Give us 30 minutes and we’ll find them.</h2>
		<div class="cta-steps">
			<?php foreach ($cta_steps as $cta_step): ?>
				<?php
    $cta_icon = esc_url(get_theme_file_uri('assets/images/' . $cta_step['icon']));
    $cta_title = esc_html($cta_step['title']);
    $cta_emphasis = esc_html($cta_step['emphasis']);
    $cta_copy = esc_html($cta_step['copy']);
    ?>
				<article class="cta-step">
					<img class="cta-step-icon" src="<?php echo $cta_icon; ?>" alt="">
					<div class="cta-step-copy">
						<h3><?php echo $cta_title; ?></h3>
						<p><strong><?php echo $cta_emphasis; ?></strong><?php echo $cta_copy; ?></p>
					</div>
				</article>
			<?php endforeach; ?>
		</div>
		<div class="cta-action">
			<a class="cta-button" href="<?php echo $demo_url; ?>" target="_blank" rel="noreferrer">Claim Your Free Referral Gap Analysis</a>
			<p>30 minutes. No obligation<br>Best with practice owner + office manager.</p>
		</div>
	</div>
</section>
<?php get_template_part('template-parts/home', 'faq'); ?>
<?php get_footer();
