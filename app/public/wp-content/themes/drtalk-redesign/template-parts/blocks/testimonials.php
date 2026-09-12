<?php

if (!defined('ABSPATH')) {
	exit();
}

$block = isset($args['block']) ? $args['block'] : drtalk_redesign_get_home_block('testimonials');

// If explicitly disabled in admin, do not render.
if ($block === false) {
	return;
}

$title = isset($block['title']) ? $block['title'] : '';
$custom_testimonials =
	!empty($block['testimonials_list']) && is_array($block['testimonials_list']) ? $block['testimonials_list'] : [];

$testimonials = [];

foreach ($custom_testimonials as $item) {
	$name = !empty($item['name']) ? $item['name'] : '';
	$role = !empty($item['role']) ? $item['role'] : '';
	$company = !empty($item['company']) ? $item['company'] : '';
	$eyebrow = !empty($item['eyebrow']) ? $item['eyebrow'] : '';
	$quote = !empty($item['quote']) ? $item['quote'] : '';

	$avatar_id = !empty($item['avatar']) ? (int) $item['avatar'] : 0;
	$avatar_url = $avatar_id ? wp_get_attachment_image_url($avatar_id, 'medium') : '';

	$logo_id = !empty($item['logo']) ? (int) $item['logo'] : 0;
	$logo_url = $logo_id ? wp_get_attachment_image_url($logo_id, 'medium') : '';

	$testimonials[] = [
		'name' => $name,
		'role' => $role,
		'company' => $company,
		'eyebrow' => $eyebrow,
		'quote' => $quote,
		'avatar_url' => $avatar_url,
		'logo_url' => $logo_url
	];
}

if (empty($testimonials)) {
	return;
}

$arrow_left_url = esc_url(get_theme_file_uri('assets/images/icon-arrow-left.svg'));
$arrow_right_url = esc_url(get_theme_file_uri('assets/images/icon-arrow-right.svg'));
$testimonial_avatar_placeholder_url = esc_url(get_theme_file_uri('assets/images/testimonial-avatar-placeholder.svg'));
?>

<section class="relative overflow-hidden bg-cream px-5 py-14 lg:px-10 lg:py-[120px]" data-home-order="8" data-testimonials>
	<div class="mx-auto flex max-w-[75rem] flex-col items-center gap-10 lg:gap-16">
		<?php if (!empty($title)): ?>
			<h2 class="text-center text-4xl leading-none lg:text-5xl lg:leading-[1.1]"><?php echo wp_kses_post($title); ?></h2>
		<?php endif; ?>
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
						<div class="flex flex-1 flex-col gap-4">
							<?php if (!empty($testimonial_eyebrow)): ?>
								<p class="text-[0.8125rem] font-black uppercase tracking-[0.15em] text-purple-dark/75"><?php echo $testimonial_eyebrow; ?></p>
							<?php endif; ?>
							<p class="text-lg leading-6 lg:text-2xl lg:leading-8"><?php echo $testimonial_quote; ?></p>
						</div>
						<div class="border-l-4 pl-4 <?php echo $testimonial_border; ?>">
							<p class="font-bold"><?php echo $testimonial_name; ?></p>
							<?php if (!empty($testimonial_role)): ?>
								<p class="text-sm text-purple-dark/75"><?php echo $testimonial_role; ?></p>
							<?php endif; ?>
						</div>
					</article>
				<?php endforeach; ?>
			</div>
		</div>
		<div class="flex gap-6">
			<button class="testimonial-control" type="button" data-testimonials-previous aria-label="Previous testimonial">
				<img src="<?php echo $arrow_left_url; ?>" width="16" height="16" alt="">
			</button>
			<button class="testimonial-control" type="button" data-testimonials-next aria-label="Next testimonial">
				<img src="<?php echo $arrow_right_url; ?>" width="16" height="16" alt="">
			</button>
		</div>
	</div>
</section>
