<?php

if (!defined('ABSPATH')) {
	exit();
}

$block = isset($args['block']) ? $args['block'] : drtalk_redesign_get_home_block('concerns');

// If explicitly disabled in admin, do not render.
if ($block === false) {
	return;
}

$title = isset($block['title']) ? $block['title'] : '';
$custom_concerns = !empty($block['concerns_list']) && is_array($block['concerns_list']) ? $block['concerns_list'] : [];

$concerns = [];

foreach ($custom_concerns as $item) {
	$item_title = !empty($item['title']) ? $item['title'] : '';
	$item_answer = !empty($item['answer']) ? $item['answer'] : '';

	if (!empty($item_title) || !empty($item_answer)) {
		$concerns[] = [
			'title' => $item_title,
			'answer' => $item_answer
		];
	}
}

if (empty($concerns)) {
	return;
}

$noise_orange_url = esc_url(get_theme_file_uri('assets/images/footer-pattern.png'));
$concerns_noise_style = esc_attr("--concerns-noise-image: url('{$noise_orange_url}');");
?>

<section class="concerns-section" data-home-order="10" data-concerns aria-labelledby="concerns-title">
	<div class="concerns-section-content">
		<?php if (!empty($title)): ?>
			<h2 id="concerns-title"><?php echo esc_html($title); ?></h2>
		<?php endif; ?>
		<div class="concerns-carousel" data-concerns-carousel>
			<div class="concerns-track" data-concerns-track>
				<?php foreach ($concerns as $concern_index => $concern): ?>
					<?php
     $concern_title = esc_html($concern['title']);
     $concern_answer = esc_html($concern['answer']);
     $concern_index_value = esc_attr($concern_index);
     ?>
					<article class="concerns-card" data-concerns-card="<?php echo $concern_index_value; ?>">
						<div class="concerns-card-noise" style="<?php echo $concerns_noise_style; ?>" aria-hidden="true"></div>
						<div class="concerns-card-copy">
							<h3><?php echo $concern_title; ?></h3>
							<p><?php echo $concern_answer; ?></p>
						</div>
						<button class="concerns-next" type="button" data-concerns-next aria-label="Show next concern">
							<svg class="concerns-next-icon" viewBox="0 0 64 64" aria-hidden="true">
								<circle class="concerns-next-track" cx="32" cy="32" r="31" pathLength="1" />
								<circle class="concerns-next-progress" cx="32" cy="32" r="31" pathLength="1" />
								<path class="concerns-next-arrow" d="M36.175 33L31.2875 37.8875C30.895 38.28 30.8979 38.9172 31.2938 39.3062C31.6848 39.6904 32.3124 39.6876 32.7 39.3L39.2929 32.7071C39.6834 32.3166 39.6834 31.6834 39.2929 31.2929L32.7 24.7C32.3124 24.3124 31.6848 24.3096 31.2938 24.6938C30.8979 25.0828 30.895 25.72 31.2875 26.1125L36.175 31H25C24.4477 31 24 31.4477 24 32C24 32.5523 24.4477 33 25 33H36.175Z" />
							</svg>
						</button>
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
