<?php

$demo_url = esc_url(drtalk_redesign_demo_url());
$hero_art_url = esc_url(get_theme_file_uri('assets/images/hero-art.png'));
$different_points = [
	[
		'icon' => 'different-referral-friction.svg',
		'title' => 'Referral Friction',
		'quote' => '“Our current system is primitive - half our referrals come through channels we can barely track.”',
		'description' =>
			'Faxes. Calls. Emails. Web Forms. Referrals slip through every gap. Stop relying on a workflow that can’t catch them all.'
	],
	[
		'icon' => 'different-relationship-risk.svg',
		'title' => 'Relationship Risk',
		'quote' => '“We got told we were hard to work with. By a dentist we thought was our friend.”',
		'description' =>
			'GPs won’t call to complain about a slow response; they’ll just route the next case to your competitor.'
	],
	[
		'icon' => 'different-staff-dependency.svg',
		'title' => 'Staff Dependency',
		'quote' => '“When she left, no one knew the status of any referral. We lost track of everything.”',
		'description' =>
			'Your growth shouldn’t live with one person. Build a system that moves referrals forward, no matter who is at the front desk.'
	],
	[
		'icon' => 'different-growth-risk.svg',
		'title' => 'Growth Risk',
		'quote' => '“We thought we had a system. We just hadn’t grown into the point where it failed yet.”',
		'description' =>
			'A manual workflow breaks at scale. The system that got you here won’t get you where you’re going.'
	]
];
$different_divider_url = esc_url(get_theme_file_uri('assets/images/different-divider.svg'));
$how_it_works_steps = [
	[
		'number' => '01',
		'title' => 'Connect your existing workflow',
		'description' =>
			'We pull in every channel you’re already using. One place. No missed leads. And your referring doctors don’t have to change a single habit.',
		'demo_label' => 'Referral received',
		'demo_title' => 'New referral lands in your inbox',
		'demo_detail' => 'Dr. Anthony Blakes · New patient'
	],
	[
		'number' => '02',
		'title' => 'Every referral lands in one place',
		'description' =>
			'Every fax, call, email, and web form becomes one clear referral record your whole office can see and move forward.',
		'demo_label' => 'One shared inbox',
		'demo_title' => 'Nothing falls through the gaps',
		'demo_detail' => '4 new referrals · 3 files attached'
	],
	[
		'number' => '03',
		'title' => 'Collaborate and close the loop',
		'description' =>
			'Keep your team aligned, update referring dentists automatically, and give every patient a clear next step.',
		'demo_label' => 'Referral updated',
		'demo_title' => 'Your team closes the loop',
		'demo_detail' => 'Status shared with the referring dentist'
	]
];
$how_it_works_noise_url = esc_url(get_theme_file_uri('assets/images/how-it-works-noise.png'));
$how_it_works_demo_url = esc_url(get_theme_file_uri('assets/images/how-it-works-demo.png'));
$responsiveness_cards = [
	[
		'image' => 'responsiveness-1.svg',
		'title' => 'Handle referral volume with confidence',
		'description' =>
			'Our Smart Referral Inbox captures every inbound referral regardless of how it arrives and tracks it through to scheduling with clear visibility. No referral falls through because it came in via the wrong channel.',
		'count' => 1300,
		'suffix' => '+'
	],
	[
		'image' => 'responsiveness-2.svg',
		'title' => 'Become the easiest specialist to work with',
		'description' =>
			'Communicate instantly with referring dentists through HIPAA-compliant messaging. No scattered emails. No phone tag. Just fast responses that make GPs want to send their next case to you.'
	],
	[
		'image' => 'responsiveness-3.svg',
		'title' => 'Reduce your team’s workload',
		'description' =>
			'Eliminate repetitive admin tasks, close follow-up gaps, and free your staff to focus on patients instead of paperwork. Less back-and-forth means shorter handling time per referral and fewer things slipping through the cracks.'
	],
	[
		'image' => 'responsiveness-4.svg',
		'title' => 'Manage referrals from anywhere',
		'description' =>
			'A web-based platform for your front desk. A native mobile app for dentists and specialists. Your whole team stays in control and securely connected, no matter where the work happens.'
	]
];
$results_stats = [
	['value' => '$500M+', 'copy' => 'In referral-driven <strong>revenue</strong> tracked', 'image' => 'results-1.svg'],
	[
		'value' => 'Up to 20%',
		'copy' => '<strong>Revenue growth</strong> for drtalk practices in year one',
		'image' => 'results-2.svg'
	],
	['value' => '1,500+', 'copy' => '<strong>Practices</strong> using drtalk nationwide', 'image' => 'results-3.svg'],
	['value' => '60%', 'copy' => '<strong>Reduction</strong> in administrative workload', 'image' => 'results-4.svg'],
	['value' => '70%', 'copy' => '<strong>Faster</strong> time-to-scheduled appointment', 'image' => 'results-5.svg']
];
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
		'minimum' => 10,
		'maximum' => 1000,
		'step' => 1,
		'prefix' => '',
		'suffix' => ''
	],
	[
		'id' => 'case-value',
		'label' => 'Average case value',
		'value' => 3000,
		'minimum' => 100,
		'maximum' => 10000,
		'step' => 100,
		'prefix' => '$',
		'suffix' => ''
	],
	[
		'id' => 'conversion-rate',
		'label' => 'Current conversion rate',
		'value' => 42,
		'minimum' => 0,
		'maximum' => 100,
		'step' => 1,
		'prefix' => '',
		'suffix' => '%'
	]
];
$calculator_noise_url = esc_url(get_theme_file_uri('assets/images/calculator-noise.png'));
$calculator_thumb_url = esc_url(get_theme_file_uri('assets/images/calculator-slider-thumb.svg'));
$calculator_divider_url = esc_url(get_theme_file_uri('assets/images/calculator-divider.svg'));
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
<section class="px-5 pb-[88px] pt-10 sm:px-8 lg:px-10">
	<div class="mx-auto grid max-w-[75rem] gap-2 overflow-hidden rounded-lg lg:grid-cols-2">
		<div class="relative flex min-h-[35rem] flex-col items-center justify-center overflow-hidden rounded-3xl bg-purple-dark px-8 py-12 text-center sm:px-12">
			<div class="hero-background-motion absolute inset-0 bg-[radial-gradient(circle_at_10%_10%,rgba(243,232,247,0.14),transparent_36%),radial-gradient(circle_at_80%_90%,rgba(135,59,183,0.32),transparent_46%)]"></div>
			<div class="relative max-w-[31rem]">
				<p class="text-[0.8125rem] font-black uppercase tracking-[0.15em] text-lilac">Built by Dentists for Dentists</p>
				<h1 class="mt-4 text-[2.75rem] leading-[1.1] text-cream sm:text-5xl">Stop Losing Referrals You Never Know You Missed</h1>
				<p class="mt-4 text-lg leading-6 text-lilac/75">Invisible referral leaks cost your practice revenue. Plug the gaps with DrTalk. Put AI to work for your office to seamlessly capture, track, and close every referral.</p>
				<div class="mt-8">
					<a class="button-primary" href="<?php echo $demo_url; ?>" target="_blank" rel="noreferrer">Claim Your Free Referral Gap Analysis</a>
					<p class="mt-4 text-sm text-lilac/75">30 minutes. We do the work. You keep the report. No pitch, no obligation.</p>
				</div>
			</div>
		</div>
		<div class="min-h-[28rem] overflow-hidden rounded-3xl bg-lilac lg:min-h-[35rem]">
			<img class="hero-art-float size-full object-cover" src="<?php echo $hero_art_url; ?>" width="596" height="560" alt="<?php esc_attr_e(
	'A DrTalk referral dashboard and healthcare illustrations',
	'drtalk-redesign'
); ?>">
		</div>
	</div>
	<div class="mx-auto mt-20 flex max-w-[75rem] flex-col items-center gap-8">
		<p class="text-[0.8125rem] font-black uppercase leading-4 tracking-[0.15em] text-purple-dark">Trusted By Dentistry’s Top Leaders</p>
		<div class="flex w-full items-start justify-center gap-12 overflow-hidden">
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

<section class="bg-cream px-10 py-[120px]">
	<div class="mx-auto flex max-w-[75rem] flex-col gap-20">
		<div class="flex flex-col items-center gap-4 text-center text-purple-dark">
			<p class="text-[0.8125rem] font-black uppercase leading-4 tracking-[0.15em]">Put Operational AI to Work for Your Office</p>
			<h2 class="text-5xl leading-[1.1]">You didn't build a specialty practice to manage inboxes.</h2>
			<p class="text-lg leading-6">When referring dentists feel like it's hard to work with you, they don't complain. They just stop referring.</p>
		</div>
		<div class="grid grid-cols-4 gap-8">
			<?php foreach ($different_points as $point): ?>
				<?php
    $point_icon_url = esc_url(get_theme_file_uri('assets/images/' . $point['icon']));
    $point_title = esc_html($point['title']);
    $point_quote = esc_html($point['quote']);
    $point_description = esc_html($point['description']);
    ?>
				<article class="operational-ai-card flex flex-col gap-8" tabindex="0">
					<img class="operational-ai-icon h-20 w-[7.875rem]" src="<?php echo $point_icon_url; ?>" width="126" height="80" alt="">
					<div class="flex flex-col gap-4">
						<p class="text-[0.8125rem] font-black uppercase leading-4 tracking-[0.15em] text-purple-dark/75"><?php echo $point_title; ?></p>
						<p class="text-lg font-bold italic leading-6 text-purple-dark"><?php echo $point_quote; ?></p>
						<img class="h-0.5 w-8" src="<?php echo $different_divider_url; ?>" width="32" height="2" alt="">
						<p class="text-base leading-[1.375rem] text-[#524c45]"><?php echo $point_description; ?></p>
					</div>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<section class="bg-cream px-10 py-[120px]" data-responsiveness>
	<div class="mx-auto flex max-w-[75rem] flex-col items-center gap-16">
		<div class="flex flex-col items-center gap-4 text-center text-purple-dark">
			<h2 class="text-5xl leading-[1.1]">Most specialists compete on reputation.<br>The best ones compete on responsiveness.</h2>
			<p class="max-w-[72rem] text-lg leading-6">drtalk is the only mobile-first platform built by practicing dentists that brings referrals, communication, and visibility into one place. So nothing gets missed, delayed, or lost again.</p>
		</div>
		<div class="grid w-full grid-cols-2 gap-12">
			<?php foreach ($responsiveness_cards as $responsiveness_card): ?>
				<?php
    $responsiveness_image = esc_url(get_theme_file_uri('assets/images/' . $responsiveness_card['image']));
    $responsiveness_title = esc_html($responsiveness_card['title']);
    $responsiveness_description = esc_html($responsiveness_card['description']);
    $responsiveness_count = $responsiveness_card['count'] ?? null;
    $responsiveness_count_value = esc_attr($responsiveness_count ?? '');
    $responsiveness_suffix = esc_attr($responsiveness_card['suffix'] ?? '');
    ?>
				<article class="flex flex-col items-start gap-6 text-purple-dark">
					<div class="relative h-40 w-[16.875rem]">
						<img class="size-full" src="<?php echo $responsiveness_image; ?>" width="270" height="160" alt="">
						<?php if ($responsiveness_count): ?>
							<span class="absolute right-3 top-3 rounded-lg bg-cream/90 px-3 py-1 font-heading text-xl font-medium text-purple-dark" data-count-target="<?php echo $responsiveness_count_value; ?>" data-count-suffix="<?php echo $responsiveness_suffix; ?>">0<?php echo $responsiveness_suffix; ?></span>
						<?php endif; ?>
					</div>
					<div class="flex flex-col gap-2">
						<h3 class="text-[2rem] font-medium leading-[1.1] tracking-[-0.02em] text-purple-dark"><?php echo $responsiveness_title; ?></h3>
						<p class="text-base leading-[1.375rem] text-purple-dark"><?php echo $responsiveness_description; ?></p>
					</div>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<section class="bg-cream px-10 py-[120px]">
	<div class="mx-auto flex max-w-[75rem] flex-col items-center gap-12">
		<h2 class="text-center text-5xl leading-[1.1]">Real results. Proven at scale.</h2>
		<div class="flex w-full flex-wrap gap-4">
			<?php foreach ($results_stats as $results_stat): ?>
				<?php
    $results_value = esc_html($results_stat['value']);
    $results_copy = wp_kses_post($results_stat['copy']);
    $results_image = esc_url(get_theme_file_uri('assets/images/' . $results_stat['image']));
    ?>
				<article class="results-stat-card relative flex h-80 min-w-[22.5rem] flex-1 flex-col gap-8 overflow-hidden rounded-[2rem] bg-lilac px-12 py-14" tabindex="0">
					<div class="relative z-10">
						<p class="text-7xl font-semibold leading-[1.1] tracking-[-0.03em]"><?php echo $results_value; ?></p>
						<p class="mt-2 max-w-60 text-lg leading-6 text-purple-dark/80"><?php echo $results_copy; ?></p>
					</div>
					<img class="results-stat-icon pointer-events-none absolute -bottom-20 -right-20 h-72 w-80 object-contain" src="<?php echo $results_image; ?>" alt="">
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<section class="bg-cream px-10 py-[120px]" data-how-it-works>
	<div class="mx-auto flex max-w-[75rem] flex-col items-center gap-16">
		<div class="flex flex-col items-center gap-4 text-center text-purple-dark">
			<h2 class="text-5xl leading-[1.1]">From chaos to clarity.<br>No disruption. No overhaul.</h2>
			<p class="text-lg leading-6">drtalk plugs into the referral channels you’re already using.<br>Your referring GPs keep doing what they’re doing. You just capture everything.</p>
		</div>
		<div class="flex w-full items-start gap-16">
			<div class="flex min-w-0 flex-1 flex-col gap-4" role="group" aria-label="How drtalk works">
				<?php foreach ($how_it_works_steps as $step_index => $how_it_works_step): ?>
					<?php
     $step_number = esc_html($how_it_works_step['number']);
     $step_title = esc_html($how_it_works_step['title']);
     $step_description = esc_html($how_it_works_step['description']);
     $step_active = $step_index === 0;
     $step_class = $step_active ? ' is-active' : '';
     $step_index_value = esc_attr($step_index);
     $step_aria_pressed = $step_active ? 'true' : 'false';
     ?>
					<button class="how-it-works-step<?php echo $step_class; ?>" type="button" data-how-it-works-step data-how-it-works-index="<?php echo $step_index_value; ?>" aria-pressed="<?php echo $step_aria_pressed; ?>">
						<span class="flex gap-6 text-left">
							<span class="w-10 shrink-0 text-center font-heading text-[2rem] font-medium leading-[1.1] tracking-[-0.02em] text-purple-dark/50"><?php echo $step_number; ?></span>
							<span class="flex min-w-0 flex-1 flex-col gap-3">
								<span class="how-it-works-step-title font-heading text-[2rem] font-medium leading-[1.1] tracking-[-0.02em] text-purple-dark"><?php echo $step_title; ?></span>
								<span class="how-it-works-step-description text-lg leading-6 text-purple-dark"><?php echo $step_description; ?></span>
							</span>
						</span>
						<span class="flex items-center py-6"><span class="how-it-works-progress-fill"></span><span class="h-0.5 flex-1 bg-purple-dark/10"></span></span>
					</button>
				<?php endforeach; ?>
			</div>
			<div class="how-it-works-demo" data-how-it-works-demo data-active-step="0">
				<img class="pointer-events-none absolute inset-0 size-full object-cover opacity-10" src="<?php echo $how_it_works_noise_url; ?>" width="1024" height="1024" alt="">
				<div class="how-it-works-demo-screen">
					<img class="size-full object-cover" src="<?php echo $how_it_works_demo_url; ?>" width="378" height="246" alt="A drtalk referral dashboard">
					<?php foreach ($how_it_works_steps as $step_index => $how_it_works_step): ?>
						<?php
      $demo_label = esc_html($how_it_works_step['demo_label']);
      $demo_title = esc_html($how_it_works_step['demo_title']);
      $demo_detail = esc_html($how_it_works_step['demo_detail']);
      $demo_step_index = esc_attr($step_index);
      ?>
						<div class="how-it-works-demo-state" data-how-it-works-demo-state="<?php echo $demo_step_index; ?>" aria-hidden="<?php echo $step_index ===
0
	? 'false'
	: 'true'; ?>">
							<p class="text-xs font-black uppercase tracking-[0.12em] text-purple-dark/70"><?php echo $demo_label; ?></p>
							<p class="mt-2 font-heading text-2xl font-medium leading-[1.1] text-purple-dark"><?php echo $demo_title; ?></p>
							<p class="mt-2 text-sm leading-[1.125rem] text-[#524c45]"><?php echo $demo_detail; ?></p>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="bg-cream px-10 py-[120px]" data-calculator-root>
	<div class="mx-auto flex max-w-[75rem] flex-col items-center gap-16">
		<h2 class="w-full text-center text-5xl leading-none">If you can't measure your referral leakage, you can't fix it.</h2>
		<div class="relative flex w-full max-w-[64rem] gap-4 overflow-hidden rounded-3xl bg-lilac p-4">
			<img class="pointer-events-none absolute inset-0 size-full object-cover opacity-10" src="<?php echo $calculator_noise_url; ?>" width="1024" height="1024" alt="">
			<div class="relative flex w-[30rem] shrink-0 flex-col gap-8 rounded-2xl bg-cream p-8">
				<p class="max-w-60 text-lg leading-6 text-[#524c45]">How much revenue is slipping through your fingers?</p>
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
     ?>
					<div class="flex flex-col gap-4">
						<div class="flex items-center gap-2">
							<p class="flex-1 text-sm leading-[1.125rem] text-[#524c45]"><?php echo $calculator_label; ?></p>
							<div class="flex w-30 items-center rounded-lg border border-[#d6d1cb] px-4 py-2 text-lg leading-6 text-purple-dark">
								<span><?php echo $calculator_prefix; ?></span>
								<input class="min-w-0 flex-1 bg-transparent text-lg leading-6 outline-none" type="number" min="<?php echo $calculator_minimum; ?>" max="<?php echo $calculator_maximum; ?>" step="<?php echo $calculator_step; ?>" value="<?php echo $calculator_value; ?>" data-calculator-number="<?php echo $calculator_id; ?>" aria-label="<?php echo $calculator_label; ?>">
								<span><?php echo $calculator_suffix; ?></span>
							</div>
						</div>
						<div class="flex flex-col gap-2">
							<div class="relative h-4">
								<div class="absolute inset-x-0 top-1/2 h-1 -translate-y-1/2 rounded-lg bg-[#d6d1cb]"></div>
								<div class="absolute left-0 top-1/2 h-1 -translate-y-1/2 rounded-lg bg-purple" data-calculator-fill="<?php echo $calculator_id; ?>"></div>
								<img class="pointer-events-none absolute top-1/2 size-4 -translate-x-1/2 -translate-y-1/2" src="<?php echo $calculator_thumb_url; ?>" width="16" height="16" alt="" data-calculator-thumb="<?php echo $calculator_id; ?>">
								<input class="absolute inset-0 h-4 w-full cursor-pointer opacity-0" type="range" min="<?php echo $calculator_minimum; ?>" max="<?php echo $calculator_maximum; ?>" step="<?php echo $calculator_step; ?>" value="<?php echo $calculator_value; ?>" data-calculator-input="<?php echo $calculator_id; ?>" aria-label="<?php echo $calculator_label; ?>">
							</div>
							<div class="flex justify-between text-sm leading-[1.125rem] text-[#736962]">
								<span><?php echo $calculator_prefix . $calculator_minimum . $calculator_suffix; ?></span>
								<span><?php echo $calculator_prefix . $calculator_maximum . $calculator_suffix; ?></span>
							</div>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
			<div class="relative flex min-w-0 flex-1 flex-col gap-8 rounded-2xl p-8 text-purple-dark" data-calculator-results aria-live="polite">
				<div class="flex flex-col gap-2">
					<p class="text-sm leading-[1.125rem] text-purple-dark/75">Monthly revenue at risk:</p>
					<p class="text-5xl leading-[1.1]" data-calculator-monthly>$139,200</p>
				</div>
				<img class="h-px w-full" src="<?php echo $calculator_divider_url; ?>" width="432" height="1" alt="">
				<div class="flex gap-8">
					<div class="flex flex-1 flex-col gap-3">
						<p class="text-sm leading-[1.125rem] text-purple-dark/75">Annual revenue at risk:</p>
						<p class="text-[2rem] font-medium leading-[1.1]" data-calculator-annual>$1,670,400</p>
					</div>
					<div class="flex flex-1 flex-col gap-3">
						<p class="text-sm leading-[1.125rem] text-purple-dark/75">Health score:</p>
						<div class="flex items-baseline gap-3">
							<div>
								<p class="text-[2rem] font-medium leading-[1.1] text-[#c9252d]" data-calculator-health>44%</p>
								<p class="mt-1 text-sm leading-[1.125rem] text-[#c9252d]" data-calculator-health-band>Poor</p>
							</div>
							<div class="flex items-center gap-1" data-calculator-health-bars>
								<?php for ($score_bar = 1; $score_bar <= 10; $score_bar++): ?>
									<span class="h-6 w-1 rounded-sm bg-purple-dark/25" data-calculator-health-bar></span>
								<?php endfor; ?>
							</div>
						</div>
					</div>
				</div>
				<img class="h-px w-full" src="<?php echo $calculator_divider_url; ?>" width="432" height="1" alt="">
				<div class="flex flex-col items-start gap-6">
					<p class="w-full text-center text-sm leading-[1.125rem]">Get the full report after the demo call with drtalk team.</p>
					<a class="flex w-full items-end rounded-[3.5rem] bg-purple px-12 py-7 text-center text-lg font-bold leading-6 text-cream" href="<?php echo $demo_url; ?>" target="_blank" rel="noreferrer">Claim Your Free Referral Gap Analysis</a>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="relative bg-cream px-10 py-[120px]" data-testimonials>
	<div class="mx-auto flex max-w-[75rem] flex-col items-center gap-16">
		<h2 class="text-center text-5xl leading-[1.1]">For the people who use it every day.</h2>
		<div class="testimonials-swiper w-full" data-testimonials-swiper>
			<div class="swiper-wrapper">
				<?php foreach (array_merge($testimonials, $testimonials) as $testimonial): ?>
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
<section class="bg-cream px-10 py-[120px]" data-personalized>
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
<?php get_template_part('template-parts/home', 'faq'); ?>
<?php get_footer();
