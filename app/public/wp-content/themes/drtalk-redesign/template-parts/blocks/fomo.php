<?php

if (!defined('ABSPATH')) {
	exit();
}

$block = isset($args['block']) ? $args['block'] : drtalk_redesign_get_home_block('fomo');

// If explicitly disabled in admin, do not render.
if ($block === false) {
	return;
}

$title = isset($block['title']) ? $block['title'] : '';
$description = isset($block['description']) ? $block['description'] : '';
$baseline = isset($block['baseline']) && is_numeric($block['baseline']) ? (float) $block['baseline'] : 0;
$hourly_rate = isset($block['hourly_rate']) && is_numeric($block['hourly_rate']) ? (float) $block['hourly_rate'] : 4640;
$disclaimer = isset($block['disclaimer']) ? $block['disclaimer'] : '';

if (empty($title) && empty($description)) {
	return;
}

$noise_dark_url = esc_url(get_theme_file_uri('assets/images/personalized-pattern-dark.png'));
$fomo_noise_style = esc_attr("--fomo-noise-image: url('{$noise_dark_url}');");
?>

<section class="fomo-section" data-home-order="11" data-fomo data-fomo-baseline="<?php echo esc_attr(
	$baseline
); ?>" data-fomo-hourly-rate="<?php echo esc_attr($hourly_rate); ?>" aria-labelledby="fomo-title">
	<div class="fomo-noise" style="<?php echo $fomo_noise_style; ?>" aria-hidden="true"></div>
	<div class="fomo-content">
		<div class="fomo-copy">
			<?php if (!empty($title)): ?>
				<h2 id="fomo-title"><?php echo wp_kses_post($title); ?></h2>
			<?php endif; ?>
			<?php if (!empty($description)): ?>
				<p><?php echo wp_kses_post($description); ?></p>
			<?php endif; ?>
		</div>
		<div class="fomo-counter">
			<p class="fomo-amount" data-fomo-amount>$0.00</p>
			<p class="fomo-time"><span aria-hidden="true"></span><span data-fomo-time>00m:00s on page</span></p>
			<?php if (!empty($disclaimer)): ?>
				<p class="fomo-disclaimer"><?php echo wp_kses_post($disclaimer); ?></p>
			<?php endif; ?>
		</div>
	</div>
</section>
