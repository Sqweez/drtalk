<?php

$referral_gap_analysis_url = esc_url(drtalk_redesign_referral_gap_analysis_url());
$pattern_url = esc_url(get_theme_file_uri('assets/images/personalized-pattern-dark.png'));
$orange_pattern_url = esc_url(get_theme_file_uri('assets/images/footer-pattern.png'));
$hero_image_url = esc_url(get_theme_file_uri('assets/images/about-dashboard.png'));
$mobile_growth_image_url = esc_url(get_theme_file_uri('assets/images/about-dashboard-mobile.png'));
$founder_image_url = esc_url(get_theme_file_uri('assets/images/about-thomas.png'));
$testimonial_image_url = esc_url(get_theme_file_uri('assets/images/about-albert.png'));
$outdated_methods_icon_url = esc_url(get_theme_file_uri('assets/images/different-referral-friction-hover.gif'));
$incomplete_insights_icon_url = esc_url(get_theme_file_uri('assets/images/about-incomplete.svg'));

$platform_features = [
	[
		'icon' => 'about-referrals.svg',
		'title' => __('Referral Management', 'drtalk-redesign'),
		'body' => __(
			'Capture, track, and close referrals without the leakage. Know exactly where every patient is in the process. And who owns the next step.',
			'drtalk-redesign'
		)
	],
	[
		'icon' => 'about-secure.svg',
		'title' => __('Secure Communication', 'drtalk-redesign'),
		'body' => __(
			'HIPAA-compliant messaging with bank-level encryption and verified senders. Every conversation stays secure. Every referral stays on track.',
			'drtalk-redesign'
		)
	],
	[
		'icon' => 'about-growth.svg',
		'title' => __('Practice Growth', 'drtalk-redesign'),
		'body' => __(
			"Strengthen GP relationships, reduce scheduling friction by up to 70%, and track revenue tied directly to referrals. So you can see what's working.",
			'drtalk-redesign'
		)
	]
];

$deliberate_choices = [
	[
		'title' => __("We don't replace what you already use.", 'drtalk-redesign'),
		'body' => __(
			"drtalk plugs into the referral channels you're already using. Your scheduling, billing, and patient records stay exactly where they are.",
			'drtalk-redesign'
		)
	],
	[
		'title' => __("We don't ask referring GPs to change how they work.", 'drtalk-redesign'),
		'body' => __(
			'We built drtalk around the way referrals actually happen today, not the way a software company wishes they did. GPs keep sending referrals the way they always have. drtalk captures them regardless of channel.',
			'drtalk-redesign'
		)
	],
	[
		'title' => __("We don't ship features we can't stand behind.", 'drtalk-redesign'),
		'body' => __(
			"Every AI capability in drtalk is built to reduce your staff's workload. Not add another system for them to babysit. If a feature doesn't clearly do that, we don't ship it.",
			'drtalk-redesign'
		)
	]
];

get_header();
?>
<section class="relative min-h-[52.5625rem] overflow-hidden bg-[#fce2cc] px-5 py-16 sm:px-8 lg:min-h-0 lg:px-12 lg:py-20" style="--about-pattern: url('<?php echo $pattern_url; ?>');">
	<div class="pointer-events-none absolute inset-0 bg-[image:var(--about-pattern)] bg-[length:35rem_35rem] bg-left-top opacity-45" aria-hidden="true"></div>
	<div class="relative mx-auto grid max-w-[75rem] items-start gap-12 lg:grid-cols-[minmax(0,1fr)_minmax(0,.75fr)] lg:gap-16">
		<div class="flex flex-col items-start gap-10">
			<div class="text-purple-dark">
				<p class="font-heading text-2xl font-medium leading-[1.1] tracking-[-0.01em] opacity-75 lg:text-[2rem]"><?php esc_html_e(
    	'After 25 years on the receiving end of broken referral workflows,',
    	'drtalk-redesign'
    ); ?></p>
				<h1 class="mt-4 max-w-[43rem] text-[2.5rem] font-semibold leading-[1.1] tracking-[-0.01em] lg:text-5xl"><?php esc_html_e(
    	'Dr. Tom Stone decided to do something about it.',
    	'drtalk-redesign'
    ); ?></h1>
				<p class="mt-4 max-w-[43rem] text-base leading-6 lg:text-lg"><?php esc_html_e(
    	'Today, drtalk is the AI-powered referral and communication platform developed specifically for dental specialists and trusted by over 1,500 practices nationwide.',
    	'drtalk-redesign'
    ); ?></p>
			</div>
			<a class="inline-flex h-16 items-center justify-center gap-2 rounded-full border-2 border-purple-dark px-8 text-center text-base font-bold leading-6 text-purple-dark transition-colors hover:bg-purple-dark hover:text-cream" href="#what-tom-built">
				<?php esc_html_e('See How drtalk Works', 'drtalk-redesign'); ?>
				<span class="text-2xl leading-none" aria-hidden="true">→</span>
			</a>
		</div>
		<div class="aspect-[300/200] overflow-hidden rounded-2xl border-4 border-purple-dark">
			<img class="size-full object-cover" src="<?php echo $hero_image_url; ?>" width="3024" height="1964" alt="<?php esc_attr_e(
	'drtalk referral management dashboard',
	'drtalk-redesign'
); ?>">
		</div>
	</div>
</section>

<section class="relative overflow-hidden px-5 py-16 lg:hidden" style="--about-pattern: url('<?php echo $orange_pattern_url; ?>');" aria-labelledby="growth-title-mobile">
	<div class="pointer-events-none absolute inset-0 bg-[image:var(--about-pattern)] bg-[length:35rem_35rem] bg-left-top" aria-hidden="true"></div>
	<div class="relative flex flex-col gap-8">
		<h2 id="growth-title-mobile" class="text-[2.5rem] font-medium leading-[1.1] tracking-[-0.01em]"><?php esc_html_e(
  	"Your growth shouldn't depend on luck and lunches.",
  	'drtalk-redesign'
  ); ?></h2>
		<div class="space-y-6 text-lg leading-6 opacity-90">
			<p><?php esc_html_e('Referral relationships are the lifeblood of a specialty practice.', 'drtalk-redesign'); ?></p>
			<p><?php esc_html_e(
   	'But most specialists are still managing them the way they did a decade ago…a call here, a lunch there. Hoping the GP down the street remembers you the next time a patient needs work.',
   	'drtalk-redesign'
   ); ?></p>
			<p><?php esc_html_e(
   	"Referrals arrive missing details. Relationships go quiet without warning. And there's no reliable way to know if what you're investing in referring offices is actually paying off.",
   	'drtalk-redesign'
   ); ?></p>
			<p><?php esc_html_e("That's what we built drtalk to solve.", 'drtalk-redesign'); ?></p>
		</div>
		<div class="h-[12.5rem] overflow-hidden">
			<img class="h-[20.3125rem] w-[31.25rem] max-w-none object-cover" src="<?php echo $mobile_growth_image_url; ?>" width="2000" height="1300" alt="<?php esc_attr_e(
	'drtalk referral dashboard with tracked practice activity',
	'drtalk-redesign'
); ?>">
		</div>
	</div>
</section>

<section class="hidden px-5 py-16 sm:px-8 lg:block lg:px-12 lg:py-[6.5rem]" aria-labelledby="growth-title">
	<div class="mx-auto max-w-[75rem]">
		<h2 id="growth-title" class="text-center text-[2.5rem] font-medium leading-[1.1] tracking-[-0.01em]"><?php esc_html_e(
  	"Your growth shouldn't depend on luck and lunches.",
  	'drtalk-redesign'
  ); ?></h2>
		<div class="mt-12 grid gap-2 lg:grid-cols-2">
			<article class="flex flex-col items-center justify-center gap-6 overflow-hidden rounded-2xl p-8 text-center" style="background-image: url('<?php echo $pattern_url; ?>'); background-size: 35rem 35rem;">
				<img class="h-20 w-[7.875rem] object-contain motion-reduce:hidden" src="<?php echo $outdated_methods_icon_url; ?>" width="2268" height="1440" alt="">
				<img class="hidden h-20 w-[7.875rem] object-contain motion-reduce:block" src="<?php echo esc_url(
    	get_theme_file_uri('assets/images/different-referral-friction-static.png')
    ); ?>" width="2268" height="1440" alt="">
				<div><h3 class="text-[1.625rem] font-medium leading-[1] opacity-90"><?php esc_html_e(
    	'Outdated Methods',
    	'drtalk-redesign'
    ); ?></h3><p class="mt-2 text-lg leading-6 opacity-90"><?php esc_html_e(
	'Most specialists are still managing them the way they did a decade ago…a call here, a lunch there. Hoping the GP down the street remembers you the next time a patient needs work.',
	'drtalk-redesign'
); ?></p></div>
			</article>
			<article class="flex flex-col items-center justify-center gap-6 overflow-hidden rounded-2xl p-8 text-center" style="background-image: url('<?php echo $pattern_url; ?>'); background-size: 35rem 35rem;">
				<img class="h-20 w-[7.875rem] object-contain" src="<?php echo $incomplete_insights_icon_url; ?>" width="100" height="75" alt="">
				<div><h3 class="text-[1.625rem] font-medium leading-[1] opacity-90"><?php esc_html_e(
    	'Incomplete Insights',
    	'drtalk-redesign'
    ); ?></h3><p class="mt-2 text-lg leading-6 opacity-90"><?php esc_html_e(
	"Referrals arrive missing details. Relationships go quiet without warning. And there's no reliable way to know if what you're investing in referring offices is actually paying off.",
	'drtalk-redesign'
); ?></p></div>
			</article>
		</div>
		<p class="mt-12 text-center text-lg font-bold leading-6 opacity-90"><?php esc_html_e(
  	"That's what we built drtalk to solve.",
  	'drtalk-redesign'
  ); ?></p>
	</div>
</section>

<section class="px-5 py-16 sm:px-8 lg:px-12 lg:py-20" aria-labelledby="founder-title">
	<div class="mx-auto grid max-w-[75rem] gap-12 lg:grid-cols-[minmax(0,1fr)_minmax(0,.75fr)] lg:gap-16">
		<div class="order-2 lg:order-1"><h2 id="founder-title" class="text-[2rem] font-medium leading-[1.1] tracking-[-0.01em] lg:text-[2.5rem]"><?php esc_html_e(
  	'Created by a dental specialist who felt the frustration firsthand.',
  	'drtalk-redesign'
  ); ?></h2><div class="mt-4 space-y-6 text-lg leading-6 opacity-90"><p><?php esc_html_e(
	"In 2014, Dr. Tom Stone set out to fix what he'd spent decades navigating. Referring dentists had no idea what happened after they sent a case his way. Patients he needed weren't showing up. The tools that were supposed to connect the two were the thing getting in the way.",
	'drtalk-redesign'
); ?></p><p><?php esc_html_e(
	"So he founded drtalk to fix it. To make professional communication seamless, referrals smart and efficient, and the knowledge dentists rely on easy to share. Not as an outsider guessing at the problem, but as someone who'd already spent decades inside it.",
	'drtalk-redesign'
); ?> <strong class="hidden lg:inline"><?php esc_html_e(
 	"And it's already working for practices like yours.",
 	'drtalk-redesign'
 ); ?></strong></p><p class="lg:hidden"><?php esc_html_e(
	"A decade later, that idea isn't a theory anymore. It's already working for practices like yours.",
	'drtalk-redesign'
); ?></p></div></div>
		<figure class="order-1 min-h-[25.1875rem] lg:order-2 lg:min-h-0"><img class="aspect-[600/399] w-full rounded-lg object-cover" src="<?php echo $founder_image_url; ?>" width="600" height="399" alt="<?php esc_attr_e(
	'Dr. Thomas L. Stone',
	'drtalk-redesign'
); ?>"><blockquote class="mt-6 text-2xl leading-[1.15]">“<?php esc_html_e(
	'I believe the future of dentistry belongs to those who embrace intelligent systems, not just harder work.',
	'drtalk-redesign'
); ?>”</blockquote><figcaption class="mt-4 text-base leading-6 opacity-75"><?php esc_html_e(
	'– Thomas L. Stone, MD, DDS, FACS',
	'drtalk-redesign'
); ?></figcaption></figure>
	</div>
</section>

<section class="px-5 py-16 sm:px-8 lg:px-12 lg:py-20" aria-labelledby="outcomes-title">
	<div class="mx-auto max-w-[75rem]">
		<h2 id="outcomes-title" class="text-center text-[2rem] font-medium leading-[1.1] tracking-[-0.01em] lg:text-[2.5rem]"><span class="block lg:inline"><?php esc_html_e(
  	'Ten years later,',
  	'drtalk-redesign'
  ); ?></span> <span class="block lg:inline"><?php esc_html_e(
	"here's what that",
	'drtalk-redesign'
); ?></span> <span class="block lg:inline"><?php esc_html_e('looks like.', 'drtalk-redesign'); ?></span></h2>
		<div class="mt-16 grid gap-2 lg:grid-cols-3">
			<div class="h-[9.75rem] overflow-hidden rounded-2xl bg-[#fce2cc] p-10 text-center lg:h-auto" style="background-image: url('<?php echo $pattern_url; ?>'); background-size: 35rem 35rem;"><p class="font-heading text-[3.5rem] font-medium leading-none tracking-[-0.01em]">$500M+</p><p class="mt-1 text-sm leading-5"><?php esc_html_e(
	'In referral-driven',
	'drtalk-redesign'
); ?> <strong><?php esc_html_e('revenue', 'drtalk-redesign'); ?></strong> <?php esc_html_e(
	'tracked',
	'drtalk-redesign'
); ?></p></div>
			<div class="h-44 overflow-hidden rounded-2xl bg-[#fce2cc] p-10 text-center lg:h-auto" style="background-image: url('<?php echo $pattern_url; ?>'); background-size: 35rem 35rem;"><p class="font-heading text-[3.5rem] font-medium leading-none tracking-[-0.01em]"><?php esc_html_e(
	'Up to 20%',
	'drtalk-redesign'
); ?></p><p class="mt-1 text-sm leading-5"><strong><?php esc_html_e(
	'Revenue growth',
	'drtalk-redesign'
); ?></strong> <?php esc_html_e('for drtalk practices in year one', 'drtalk-redesign'); ?></p></div>
			<div class="h-[9.75rem] overflow-hidden rounded-2xl bg-[#fce2cc] p-10 text-center lg:h-auto" style="background-image: url('<?php echo $pattern_url; ?>'); background-size: 35rem 35rem;"><p class="font-heading text-[3.5rem] font-medium leading-none tracking-[-0.01em]">70%</p><p class="mt-1 text-sm leading-5"><strong><?php esc_html_e(
	'Faster',
	'drtalk-redesign'
); ?></strong> <?php esc_html_e('time-to-scheduled appointment', 'drtalk-redesign'); ?></p></div>
		</div>
	</div>
</section>

<section class="px-5 py-16 sm:px-8 lg:px-12 lg:py-20" aria-labelledby="testimonial-title">
	<div class="mx-auto flex max-w-[75rem] flex-col gap-10 overflow-hidden rounded-3xl bg-lilac px-6 py-8 lg:p-12" style="background-image: url('<?php echo $pattern_url; ?>'); background-size: 35rem 35rem;">
		<p class="text-[0.8125rem] font-black leading-4 tracking-[0.15em] uppercase"><?php esc_html_e(
  	'What practices see after switching',
  	'drtalk-redesign'
  ); ?></p>
		<blockquote class="min-h-[7.5rem] text-base leading-6 lg:min-h-0 lg:text-[1.875rem] lg:leading-normal"><p>“<?php esc_html_e(
  	"drtalk has transformed our practice. Our team works in sync with referring offices, and we've seen a significant boost in efficiency and practice revenue.",
  	'drtalk-redesign'
  ); ?>”</p></blockquote>
		<div class="flex flex-col items-start gap-6 lg:flex-row lg:items-center"><img class="size-16 shrink-0 rounded-full object-cover lg:size-20" src="<?php echo $testimonial_image_url; ?>" width="196" height="248" alt="<?php esc_attr_e(
	'Dr. Albert Kang',
	'drtalk-redesign'
); ?>"><div><h2 id="testimonial-title" class="text-[1.625rem] font-medium leading-[1]"><?php esc_html_e(
	'Dr. Albert Kang',
	'drtalk-redesign'
); ?></h2><p class="mt-2 text-sm leading-5 opacity-75"><?php esc_html_e(
	'Oral & Maxillofacial Surgeon, New England Oral & Maxillofacial Surgery',
	'drtalk-redesign'
); ?></p></div></div>
	</div>
</section>

<section id="what-tom-built" class="scroll-mt-24 px-5 py-16 sm:px-8 lg:px-12 lg:py-20" aria-labelledby="built-title">
	<div class="mx-auto max-w-[75rem]">
		<div class="text-center"><h2 id="built-title" class="text-[2rem] font-medium leading-[1.1] tracking-[-0.01em] lg:text-[2.5rem]"><?php esc_html_e(
  	'What Tom actually built.',
  	'drtalk-redesign'
  ); ?></h2><p class="mx-auto mt-4 max-w-5xl text-lg leading-6 opacity-90"><?php esc_html_e(
	'drtalk replaces the workarounds most specialty practices are still stitching together: fax, phone, email, paper, with',
	'drtalk-redesign'
); ?> <strong><?php esc_html_e('one connected platform', 'drtalk-redesign'); ?></strong>.</p></div>
		<div class="mt-16 grid gap-16 lg:grid-cols-3 lg:gap-8">
			<?php foreach ($platform_features as $feature): ?>
				<article class="text-center"><img class="mx-auto h-[5.5rem] w-36 object-contain" src="<?php echo esc_url(
    	get_theme_file_uri('assets/images/' . $feature['icon'])
    ); ?>" width="144" height="88" alt=""><h3 class="mt-8 text-[1.625rem] font-medium leading-[1]"><?php echo esc_html(
	$feature['title']
); ?></h3><p class="mt-2 text-base leading-6 opacity-75"><?php echo esc_html($feature['body']); ?></p></article>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<section class="px-5 py-16 sm:px-8 lg:px-12 lg:py-20" aria-labelledby="choices-title">
	<div class="mx-auto max-w-[75rem]">
		<div class="text-center"><h2 id="choices-title" class="text-[2rem] font-medium leading-[1.1] tracking-[-0.01em] lg:text-[2.5rem]"><?php esc_html_e(
  	"Three things we've deliberately said no to.",
  	'drtalk-redesign'
  ); ?></h2><p class="mx-auto mt-4 max-w-5xl text-base leading-6 opacity-90"><?php esc_html_e(
	"Every feature a platform adds is one more thing your team has to learn, adopt, and troubleshoot. drtalk exists to reduce that surface area, not expand it. So we've made some deliberate choices about what we don't do.",
	'drtalk-redesign'
); ?></p></div>
		<div class="mt-16 grid gap-2 lg:grid-cols-3">
			<?php foreach ($deliberate_choices as $choice): ?>
				<article class="flex h-[23.5rem] flex-col items-center gap-10 overflow-hidden rounded-3xl p-8 text-center" style="background-image: url('<?php echo $pattern_url; ?>'); background-size: 35rem 35rem;"><img class="size-14 object-contain" src="<?php echo esc_url(
	get_theme_file_uri('assets/images/about-no.svg')
); ?>" width="56" height="56" alt=""><div><h3 class="text-[1.625rem] font-medium leading-[1]"><?php echo esc_html(
	$choice['title']
); ?></h3><p class="mt-2 text-base leading-6 opacity-75"><?php echo esc_html($choice['body']); ?></p></div></article>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<section class="relative overflow-hidden bg-lilac px-5 py-14 text-center sm:px-8 lg:px-12 lg:py-20" style="--about-pattern: url('<?php echo $pattern_url; ?>');" aria-labelledby="about-cta-title">
	<div class="pointer-events-none absolute inset-0 bg-[image:var(--about-pattern)] bg-[length:35rem_35rem] bg-left-top" aria-hidden="true"></div>
	<div class="relative mx-auto max-w-5xl"><p class="text-[0.8125rem] font-black leading-4 tracking-[0.15em] uppercase"><?php esc_html_e(
 	'Free 30-minute session',
 	'drtalk-redesign'
 ); ?></p><h2 id="about-cta-title" class="mt-4 text-4xl font-semibold leading-[1.1] tracking-[-0.01em] sm:text-5xl"><?php esc_html_e(
	'See exactly where your referrals are slipping through the cracks.',
	'drtalk-redesign'
); ?></h2><p class="mt-4 text-lg leading-6 opacity-90"><?php esc_html_e(
	'30 minutes. We walk through how referrals move through your practice today, identify where your current process is costing you, and give you a summary to keep. Whether or not drtalk turns out to be right for you.',
	'drtalk-redesign'
); ?></p><div class="mt-8 flex flex-col items-center gap-4"><a class="inline-flex min-h-16 w-full items-center justify-center rounded-full bg-purple px-8 py-5 text-center text-base font-bold leading-6 text-cream transition-colors duration-200 hover:bg-purple-dark sm:w-auto" href="<?php echo $referral_gap_analysis_url; ?>" target="_blank" rel="noreferrer"><?php esc_html_e(
	'Book your free Referral Gap Analysis',
	'drtalk-redesign'
); ?></a><p class="text-sm leading-5 opacity-75"><?php esc_html_e(
	'30 minutes · Best with practice owner + office manager · No obligation',
	'drtalk-redesign'
); ?></p></div></div>
</section>
<?php get_footer();
