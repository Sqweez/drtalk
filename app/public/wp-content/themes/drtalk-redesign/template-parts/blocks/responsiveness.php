<?php

if (!defined('ABSPATH')) {
	exit();
}

$block = isset($args['block']) ? $args['block'] : drtalk_redesign_get_home_block('responsiveness');

// If explicitly disabled in admin, do not render.
if ($block === false) {
	return;
}

$why_us_noise_url = esc_url(get_theme_file_uri('assets/images/personalized-pattern-dark.png'));
$why_us_noise_style = esc_attr("--why-us-noise-image: url('{$why_us_noise_url}');");
$why_us_icon_backdrop_url = esc_url(get_theme_file_uri('assets/images/why-us-icon-backdrop.svg'));

$title = isset($block['title']) ? $block['title'] : '';
$description = isset($block['description']) ? $block['description'] : '';

$custom_cards = !empty($block['cards']) && is_array($block['cards']) ? $block['cards'] : [];

$cards = [];

foreach ($custom_cards as $card) {
	$card_title = !empty($card['title']) ? $card['title'] : '';
	$card_desc = !empty($card['description']) ? $card['description'] : '';

	$static_icon_id = !empty($card['static_icon']) ? (int) $card['static_icon'] : 0;
	$static_icon_url = $static_icon_id ? wp_get_attachment_image_url($static_icon_id, 'full') : '';

	$hover_icon_id = !empty($card['hover_icon']) ? (int) $card['hover_icon'] : 0;
	$hover_icon_url = $hover_icon_id ? wp_get_attachment_image_url($hover_icon_id, 'full') : '';

	$cards[] = [
		'title' => $card_title,
		'description' => $card_desc,
		'image_url' => $static_icon_url,
		'hover_image_url' => $hover_icon_url ?: $static_icon_url
	];
}

if (empty($cards)) {
	return;
}
?>

<section class="bg-cream px-5 py-14 sm:px-8 lg:px-10 lg:py-[120px]" data-home-order="5">
	<div class="mx-auto flex max-w-[75rem] flex-col items-center gap-10 lg:gap-16">
		<div class="flex flex-col items-center gap-4 text-center text-purple-dark">
			<?php if (!empty($title)): ?>
				<h2 class="text-4xl leading-none lg:text-5xl lg:leading-[1.1]"><?php echo wp_kses_post($title); ?></h2>
			<?php endif; ?>
			<?php if (!empty($description)): ?>
				<p class="max-w-[72rem] text-lg leading-6"><?php echo wp_kses_post($description); ?></p>
			<?php endif; ?>
		</div>
		<div class="grid w-full grid-cols-1 gap-0 lg:grid-cols-2">
			<?php foreach ($cards as $card): ?>
				<?php
    $card_image = esc_url($card['image_url']);
    $card_hover_image = esc_url($card['hover_image_url']);
    $card_title = esc_html($card['title']);
    $card_description = esc_html($card['description']);
    ?>
				<article class="why-us-card relative flex min-h-[19.75rem] flex-col items-center overflow-hidden rounded-2xl px-4 pb-4 pt-8 text-center text-purple-dark" tabindex="0" data-why-us-card style="<?php echo $why_us_noise_style; ?>">
					<div class="why-us-card-noise" aria-hidden="true"></div>
					<div class="why-us-card-icon relative z-10 h-[6.5625rem] w-[8.75rem] overflow-hidden" aria-hidden="true">
						<img class="why-us-card-icon-backdrop absolute inset-x-0 bottom-0 h-[5.46875rem] w-full" src="<?php echo $why_us_icon_backdrop_url; ?>" width="140" height="88" alt="">
						<?php if (!empty($card_image)): ?>
							<img class="why-us-card-icon-static absolute inset-0 size-full object-contain" src="<?php echo $card_image; ?>" width="140" height="105" alt="">
						<?php endif; ?>
						<?php if (!empty($card_hover_image)): ?>
							<img class="why-us-card-icon-animated absolute inset-0 size-full object-contain" src="<?php echo $card_hover_image; ?>" data-why-us-icon-src="<?php echo $card_hover_image; ?>" width="140" height="105" alt="">
						<?php endif; ?>
					</div>
					<div class="relative z-10 mt-6 flex flex-col gap-2">
						<h3 class="text-[1.625rem] font-medium leading-none tracking-[-0.02em] text-purple-dark"><?php echo $card_title; ?></h3>
						<p class="text-sm leading-5 text-purple-dark"><?php echo $card_description; ?></p>
					</div>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
