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
<?php get_template_part('template-parts/home', 'faq'); ?>
<?php get_footer();
