<?php

if (!defined('ABSPATH')) {
	exit();
}

$block = isset($args['block']) ? $args['block'] : drtalk_redesign_get_home_block('problem_cards');

// If explicitly disabled in admin, do not render.
if ($block === false) {
	return;
}

$different_divider_url = esc_url(get_theme_file_uri('assets/images/different-divider.svg'));
$different_icon_backdrop_url = esc_url(get_theme_file_uri('assets/images/problem-icon-backdrop-orange.svg'));
$different_noise_url = esc_url(get_theme_file_uri('assets/images/footer-pattern.png'));

$eyebrow = isset($block['eyebrow']) ? $block['eyebrow'] : '';
$title = isset($block['title']) ? $block['title'] : '';
$description = isset($block['description']) ? $block['description'] : '';

$custom_cards = !empty($block['cards']) && is_array($block['cards']) ? $block['cards'] : [];

$cards = [];

foreach ($custom_cards as $card) {
	$card_title = !empty($card['title']) ? $card['title'] : '';
	$card_quote = !empty($card['quote']) ? $card['quote'] : '';
	$card_desc = !empty($card['description']) ? $card['description'] : '';

	$static_icon_id = !empty($card['static_icon']) ? (int) $card['static_icon'] : 0;
	$static_icon_url = $static_icon_id ? wp_get_attachment_image_url($static_icon_id, 'full') : '';

	$hover_icon_id = !empty($card['hover_icon']) ? (int) $card['hover_icon'] : 0;
	$hover_icon_url = $hover_icon_id ? wp_get_attachment_image_url($hover_icon_id, 'full') : '';

	$cards[] = [
		'title' => $card_title,
		'quote' => $card_quote,
		'description' => $card_desc,
		'icon_url' => $static_icon_url,
		'hover_icon_url' => $hover_icon_url ?: $static_icon_url
	];
}

if (empty($cards)) {
	return;
}
?>
<section class="bg-cream px-5 py-14 sm:px-8 lg:px-12 lg:py-[104px]" data-home-order="2" data-problem-section>
	<div class="mx-auto flex max-w-[90rem] flex-col gap-10 lg:gap-20">
		<div class="flex flex-col items-center gap-4 text-center text-purple-dark">
			<?php if (!empty($eyebrow)): ?>
				<p class="text-[0.8125rem] font-black uppercase leading-4 tracking-[0.15em]"><?php echo esc_html($eyebrow); ?></p>
			<?php endif; ?>
			<?php if (!empty($title)): ?>
				<h2 class="text-4xl leading-none tracking-normal sm:text-5xl sm:leading-[1.1] sm:tracking-[-0.01em]"><?php echo esc_html(
    	$title
    ); ?></h2>
			<?php endif; ?>
			<?php if (!empty($description)): ?>
				<p class="text-base leading-6 lg:hidden"><?php echo esc_html($description); ?></p>
			<?php endif; ?>
		</div>
		<div class="problem-card-list">
			<?php foreach ($cards as $point): ?>
				<?php
    $point_icon_url = esc_url($point['icon_url']);
    $point_hover_icon_url = esc_url($point['hover_icon_url']);
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
