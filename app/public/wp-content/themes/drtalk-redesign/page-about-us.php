<?php

$about_settings = function_exists('drtalk_redesign_get_about_page_settings')
	? drtalk_redesign_get_about_page_settings()
	: [];

$hero = $about_settings['hero'] ?? [];
$problems = $about_settings['problems'] ?? [];
$founder = $about_settings['founder'] ?? [];
$stats = $about_settings['stats'] ?? [];
$testimonial = $about_settings['testimonial'] ?? [];
$features = $about_settings['features'] ?? [];
$choices = $about_settings['choices'] ?? [];
$cta = $about_settings['cta'] ?? [];

get_header();
?>
<?php if (!empty($hero['is_active'])): ?>
<section class="relative min-h-[52.5625rem] overflow-hidden bg-[#fce2cc] px-5 py-16 sm:px-8 lg:min-h-0 lg:px-12 lg:py-20" style="--about-pattern: url('<?php echo esc_url(
	$hero['pattern_url']
); ?>');">
	<div class="pointer-events-none absolute inset-0 bg-[image:var(--about-pattern)] bg-[length:35rem_35rem] bg-left-top" aria-hidden="true"></div>
	<div class="relative mx-auto grid max-w-[75rem] items-start gap-12 lg:grid-cols-[minmax(0,1fr)_minmax(0,.75fr)] lg:gap-16">
		<div class="flex flex-col items-start gap-10">
			<div class="text-purple-dark">
				<?php if (!empty($hero['eyebrow'])): ?>
					<p class="font-heading text-2xl font-medium leading-[1.1] tracking-[-0.01em] opacity-75 lg:text-[2rem]"><?php echo esc_html(
     	$hero['eyebrow']
     ); ?></p>
				<?php endif; ?>
				<?php if (!empty($hero['title'])): ?>
					<h1 class="mt-4 max-w-[43rem] text-[2.5rem] font-semibold leading-[1.1] tracking-[-0.01em] lg:text-5xl"><?php echo esc_html(
     	$hero['title']
     ); ?></h1>
				<?php endif; ?>
				<?php if (!empty($hero['description'])): ?>
					<p class="mt-4 max-w-[43rem] text-base leading-6 lg:text-lg"><?php echo esc_html($hero['description']); ?></p>
				<?php endif; ?>
			</div>
			<?php if (!empty($hero['button_text']) && !empty($hero['button_url'])): ?>
				<a class="inline-flex h-16 items-center justify-center gap-2 rounded-full border-2 border-purple-dark px-8 text-center text-base font-bold leading-6 text-purple-dark transition-colors hover:bg-purple-dark hover:text-cream" href="<?php echo esc_url(
    	$hero['button_url']
    ); ?>" target="_blank" rel="noreferrer">
					<?php echo esc_html($hero['button_text']); ?>
					<span class="text-2xl leading-none" aria-hidden="true">→</span>
				</a>
			<?php endif; ?>
		</div>
		<div class="relative aspect-[300/200]">
			<img class="absolute top-0 left-0 h-[40.59rem] w-[62.5rem] max-w-none rounded-2xl border-4 border-purple-dark object-cover" src="<?php echo esc_url(
   	$hero['image_url']
   ); ?>" width="3024" height="1964" alt="<?php esc_attr_e(
	'drtalk referral management dashboard',
	'drtalk-redesign'
); ?>">
		</div>
	</div>
</section>
<?php endif; ?>

<?php if (!empty($problems['is_active'])): ?>
<section class="px-5 py-16 sm:px-8 lg:px-12 lg:py-[6.5rem]" aria-labelledby="growth-title">
	<div class="mx-auto max-w-[75rem]">
		<div class="text-center">
			<?php if (!empty($problems['eyebrow'])): ?>
				<p class="text-[0.8125rem] font-black leading-4 tracking-[0.15em] uppercase"><?php echo esc_html(
    	$problems['eyebrow']
    ); ?></p>
			<?php endif; ?>
			<?php if (!empty($problems['title'])): ?>
				<h2 id="growth-title" class="mt-4 text-[2rem] font-medium leading-[1.1] tracking-[-0.01em] lg:text-[2.5rem]"><?php echo esc_html(
    	$problems['title']
    ); ?></h2>
			<?php endif; ?>
		</div>
		<?php if (!empty($problems['cards'])): ?>
			<div class="mt-12 grid gap-2 lg:grid-cols-2">
				<?php foreach ($problems['cards'] as $card): ?>
					<article class="flex flex-col items-center justify-center gap-6 overflow-hidden rounded-2xl p-8 text-center" style="background-image: url('<?php echo esc_url(
     	$problems['pattern_url']
     ); ?>'); background-size: 35rem 35rem;">
						<?php if (!empty($card['icon_url'])): ?>
							<img class="h-20 w-[7.875rem] object-contain" src="<?php echo esc_url(
       	$card['icon_url']
       ); ?>" width="2268" height="1440" alt="">
						<?php endif; ?>
						<div>
							<h3 class="text-[1.625rem] font-medium leading-[1] opacity-90"><?php echo esc_html($card['title']); ?></h3>
							<p class="mt-2 text-lg leading-6 opacity-90"><?php echo esc_html($card['description']); ?></p>
						</div>
					</article>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>
	</div>
</section>
<?php endif; ?>

<?php if (!empty($founder['is_active'])): ?>
<section class="px-5 py-16 sm:px-8 lg:px-12 lg:py-20" aria-labelledby="founder-title">
	<div class="mx-auto grid max-w-[75rem] gap-12 lg:grid-cols-[minmax(0,1fr)_minmax(0,.75fr)] lg:gap-16">
		<div class="order-2 lg:order-1">
			<h2 id="founder-title" class="text-[2rem] font-medium leading-[1.1] tracking-[-0.01em] lg:text-[2.5rem]"><?php echo esc_html(
   	$founder['title']
   ); ?></h2>
			<div class="mt-4 space-y-6 text-lg leading-6 opacity-90">
				<?php echo wp_kses_post($founder['story']); ?>
			</div>
		</div>
		<figure class="order-1 min-h-[25.1875rem] lg:order-2 lg:min-h-0">
			<img class="aspect-[600/399] w-full rounded-lg object-cover" src="<?php echo esc_url(
   	$founder['image_url']
   ); ?>" width="600" height="399" alt="<?php esc_attr_e('Dr. Thomas L. Stone', 'drtalk-redesign'); ?>">
			<?php if (!empty($founder['quote'])): ?>
				<blockquote class="mt-6 text-2xl leading-[1.15]">“<?php echo esc_html($founder['quote']); ?>”</blockquote>
			<?php endif; ?>
			<?php if (!empty($founder['caption'])): ?>
				<figcaption class="mt-4 text-base leading-6 opacity-75"><?php echo esc_html($founder['caption']); ?></figcaption>
			<?php endif; ?>
		</figure>
	</div>
</section>
<?php endif; ?>

<?php if (!empty($stats['is_active'])): ?>
<section class="px-5 py-16 sm:px-8 lg:px-12 lg:py-20" aria-labelledby="outcomes-title">
	<div class="mx-auto max-w-[75rem]">
		<h2 id="outcomes-title" class="text-center text-[2rem] font-medium leading-[1.1] tracking-[-0.01em] lg:text-[2.5rem]"><?php echo esc_html(
  	$stats['title']
  ); ?></h2>
		<?php if (!empty($stats['cards'])): ?>
			<div class="mt-16 grid gap-2 lg:grid-cols-3">
				<?php foreach ($stats['cards'] as $card): ?>
					<div class="min-h-[9.75rem] overflow-hidden rounded-2xl bg-[#fce2cc] p-10 text-center lg:h-auto" style="background-image: url('<?php echo esc_url(
     	$stats['pattern_url']
     ); ?>'); background-size: 35rem 35rem;">
						<p class="font-heading text-[3.5rem] font-medium leading-none tracking-[-0.01em]"><?php echo esc_html(
      	$card['stat_value'] ?? ($card['value'] ?? '')
      ); ?></p>
						<p class="mt-1 text-sm leading-5"><?php echo wp_kses_post($card['label']); ?></p>
					</div>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>
	</div>
</section>
<?php endif; ?>

<?php if (!empty($testimonial['is_active'])): ?>
<section class="px-5 py-16 sm:px-8 lg:px-12 lg:py-20" aria-labelledby="testimonial-title">
	<div class="mx-auto flex max-w-[75rem] flex-col gap-10 overflow-hidden rounded-3xl bg-lilac px-6 py-8 lg:p-12" style="background-image: url('<?php echo esc_url(
 	$testimonial['pattern_url']
 ); ?>'); background-size: 35rem 35rem;">
		<?php if (!empty($testimonial['eyebrow'])): ?>
			<p class="text-[0.8125rem] font-black leading-4 tracking-[0.15em] uppercase"><?php echo esc_html(
   	$testimonial['eyebrow']
   ); ?></p>
		<?php endif; ?>
		<blockquote class="text-xl leading-normal lg:text-[1.875rem]">
			<p>“<?php echo esc_html($testimonial['quote']); ?>”</p>
		</blockquote>
		<div class="flex flex-col items-start gap-6 lg:flex-row lg:items-center">
			<?php if (!empty($testimonial['avatar_url'])): ?>
				<img class="size-16 shrink-0 rounded-full object-cover lg:size-20" src="<?php echo esc_url(
    	$testimonial['avatar_url']
    ); ?>" width="196" height="248" alt="<?php echo esc_attr($testimonial['name']); ?>">
			<?php endif; ?>
			<div>
				<h2 id="testimonial-title" class="text-[1.625rem] font-medium leading-[1]"><?php echo esc_html(
    	$testimonial['name']
    ); ?></h2>
				<?php if (!empty($testimonial['role'])): ?>
					<p class="mt-2 text-sm leading-5 opacity-75"><?php echo esc_html($testimonial['role']); ?></p>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>
<?php endif; ?>

<?php if (!empty($features['is_active'])): ?>
<section id="what-tom-built" class="scroll-mt-24 px-5 py-16 sm:px-8 lg:px-12 lg:py-20" aria-labelledby="built-title">
	<div class="mx-auto max-w-[75rem]">
		<div class="text-center">
			<h2 id="built-title" class="text-[2rem] font-medium leading-[1.1] tracking-[-0.01em] lg:text-[2.5rem]"><?php echo esc_html(
   	$features['title']
   ); ?></h2>
			<?php if (!empty($features['description'])): ?>
				<p class="mx-auto mt-4 max-w-5xl text-lg leading-6 opacity-90"><?php echo wp_kses_post($features['description']); ?></p>
			<?php endif; ?>
		</div>
		<?php if (!empty($features['list'])): ?>
			<div class="mt-16 grid gap-16 lg:grid-cols-3 lg:gap-8">
				<?php foreach ($features['list'] as $feature): ?>
					<article class="text-center">
						<?php if (!empty($feature['icon_url'])): ?>
							<img class="mx-auto h-[5.5rem] w-36 object-contain" src="<?php echo esc_url(
       	$feature['icon_url']
       ); ?>" width="144" height="88" alt="">
						<?php endif; ?>
						<h3 class="mt-8 text-[1.625rem] font-medium leading-[1]"><?php echo esc_html($feature['title']); ?></h3>
						<p class="mt-2 text-base leading-6 opacity-75"><?php echo esc_html($feature['body']); ?></p>
					</article>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>
	</div>
</section>
<?php endif; ?>

<?php if (!empty($choices['is_active'])): ?>
<section class="px-5 py-16 sm:px-8 lg:px-12 lg:py-20" aria-labelledby="choices-title">
	<div class="mx-auto max-w-[75rem]">
		<div class="text-center">
			<h2 id="choices-title" class="text-[2rem] font-medium leading-[1.1] tracking-[-0.01em] lg:text-[2.5rem]"><?php echo esc_html(
   	$choices['title']
   ); ?></h2>
			<?php if (!empty($choices['description'])): ?>
				<p class="mx-auto mt-4 max-w-5xl text-base leading-6 opacity-90"><?php echo esc_html($choices['description']); ?></p>
			<?php endif; ?>
		</div>
		<?php if (!empty($choices['list'])): ?>
			<div class="mt-16 grid gap-2 lg:grid-cols-3">
				<?php foreach ($choices['list'] as $choice): ?>
					<article class="flex h-[23.5rem] flex-col items-center gap-10 overflow-hidden rounded-3xl p-8 text-center" style="background-image: url('<?php echo esc_url(
     	$choices['pattern_url']
     ); ?>'); background-size: 35rem 35rem;">
						<img class="size-14 object-contain" src="<?php echo esc_url($choices['icon_url']); ?>" width="56" height="56" alt="">
						<div>
							<h3 class="text-[1.625rem] font-medium leading-[1]"><?php echo esc_html($choice['title']); ?></h3>
							<p class="mt-2 text-base leading-6 opacity-75"><?php echo esc_html($choice['body']); ?></p>
						</div>
					</article>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>
	</div>
</section>
<?php endif; ?>

<?php if (!empty($cta['is_active'])): ?>
<section class="relative overflow-hidden bg-lilac px-5 py-14 text-center sm:px-8 lg:px-12 lg:py-20" style="--about-pattern: url('<?php echo esc_url(
	$cta['pattern_url']
); ?>');" aria-labelledby="about-cta-title">
	<div class="pointer-events-none absolute inset-0 bg-[image:var(--about-pattern)] bg-[length:35rem_35rem] bg-left-top" aria-hidden="true"></div>
	<div class="relative mx-auto max-w-5xl">
		<?php if (!empty($cta['eyebrow'])): ?>
			<p class="text-[0.8125rem] font-black leading-4 tracking-[0.15em] uppercase"><?php echo esc_html(
   	$cta['eyebrow']
   ); ?></p>
		<?php endif; ?>
		<h2 id="about-cta-title" class="mt-4 text-4xl font-semibold leading-[1.1] tracking-[-0.01em] sm:text-5xl"><?php echo esc_html(
  	$cta['title']
  ); ?></h2>
		<?php if (!empty($cta['description'])): ?>
			<p class="mt-4 text-lg leading-6 opacity-90"><?php echo esc_html($cta['description']); ?></p>
		<?php endif; ?>
		<div class="mt-8 flex flex-col items-center gap-4">
			<?php if (!empty($cta['button_text']) && !empty($cta['button_url'])): ?>
				<a class="inline-flex min-h-16 w-full items-center justify-center rounded-full bg-purple px-8 py-5 text-center text-base font-bold leading-6 text-cream transition-colors duration-200 hover:bg-purple-dark sm:w-auto" href="<?php echo esc_url(
    	$cta['button_url']
    ); ?>" target="_blank" rel="noreferrer">
					<?php echo esc_html($cta['button_text']); ?>
				</a>
			<?php endif; ?>
			<?php if (!empty($cta['subtext'])): ?>
				<p class="text-sm leading-5 opacity-75"><?php echo esc_html($cta['subtext']); ?></p>
			<?php endif; ?>
		</div>
	</div>
</section>
<?php endif; ?>

<?php get_footer();
