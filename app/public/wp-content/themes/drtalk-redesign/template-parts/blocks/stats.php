<?php

if (!defined('ABSPATH')) {
	exit();
}

$block = isset($args['block']) ? $args['block'] : drtalk_redesign_get_home_block('stats');

// If explicitly disabled in admin, do not render.
if ($block === false) {
	return;
}

$numbers_noise_url = esc_url(get_theme_file_uri('assets/images/personalized-pattern-dark.png'));
$numbers_noise_style = esc_attr("--numbers-noise-image: url('{$numbers_noise_url}');");

$title = isset($block['title']) ? $block['title'] : '';

$custom_stats = !empty($block['stats']) && is_array($block['stats']) ? $block['stats'] : [];

$stats = [];

foreach ($custom_stats as $item) {
	$value = !empty($item['value']) ? $item['value'] : '';
	$copy = !empty($item['copy']) ? $item['copy'] : '';
	$key = !empty($item['key']) ? $item['key'] : '';

	$image_id = !empty($item['image']) ? (int) $item['image'] : 0;
	$image_url = $image_id ? wp_get_attachment_image_url($image_id, 'full') : '';

	$stats[] = [
		'value' => $value,
		'copy' => $copy,
		'key' => $key,
		'image_url' => $image_url
	];
}

if (empty($stats)) {
	return;
}
?>

<section class="bg-cream px-5 py-14 sm:px-8 lg:px-10 lg:py-[120px]" data-home-order="6">
	<div class="mx-auto flex max-w-[88.5rem] flex-col items-center gap-10 lg:gap-16">
		<?php if (!empty($title)): ?>
			<h2 class="text-center text-4xl leading-none lg:text-5xl lg:leading-[1.1]"><?php echo wp_kses_post($title); ?></h2>
		<?php endif; ?>
		<div class="numbers-grid grid w-full grid-cols-1 gap-1 lg:grid-cols-6 lg:gap-4">
			<?php foreach ($stats as $results_stat): ?>
				<?php
				$results_value = esc_html($results_stat['value']);
				$results_copy = wp_kses_post($results_stat['copy']);
				$results_image = esc_url($results_stat['image_url']);
				$results_key = esc_attr($results_stat['key']);
				?>
				<article class="numbers-card relative flex min-h-[7.5rem] flex-col overflow-hidden rounded-2xl bg-lilac px-5 pb-8 pt-5 text-purple-dark lg:h-[17.5rem] lg:rounded-3xl lg:px-12 lg:py-14" data-stat="<?php echo $results_key; ?>" style="<?php echo $numbers_noise_style; ?>" tabindex="0">
					<div class="numbers-card-noise" aria-hidden="true"></div>
					<div class="relative z-10">
						<p class="font-heading text-[2.5rem] font-medium leading-[1.1] tracking-[-0.01em] lg:text-7xl lg:leading-[normal]"><?php echo $results_value; ?></p>
						<p class="mt-1 max-w-[17rem] text-sm leading-5 text-purple-dark lg:mt-2 lg:max-w-60 lg:text-lg lg:leading-6"><?php echo $results_copy; ?></p>
					</div>
					<?php if (!empty($results_image)): ?>
						<img class="numbers-card-illustration pointer-events-none absolute -bottom-6 -right-4 hidden h-60 w-60 object-contain lg:block" src="<?php echo $results_image; ?>" width="240" height="240" alt="">
					<?php endif; ?>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
