<?php

if (!defined('ABSPATH')) {
	exit();
}

$block = isset($args['block']) ? $args['block'] : drtalk_redesign_get_home_block('personas');

// If explicitly disabled in admin, do not render.
if ($block === false) {
	return;
}

$noise_orange_url = esc_url(get_theme_file_uri('assets/images/footer-pattern.png'));
$noise_dark_url = esc_url(get_theme_file_uri('assets/images/personalized-pattern-dark.png'));
$noise_urls = [
	'lilac' => $noise_dark_url,
	'orange' => $noise_orange_url
];

$title = isset($block['title']) ? $block['title'] : '';
$button_text = !empty($block['button_text']) ? $block['button_text'] : 'Book a Demo Today';
$button_url = !empty($block['button_url'])
	? esc_url($block['button_url'])
	: esc_url(drtalk_redesign_referral_gap_analysis_url());
$button_subtext = isset($block['button_subtext']) ? $block['button_subtext'] : '';

$custom_personas = !empty($block['personas_list']) && is_array($block['personas_list']) ? $block['personas_list'] : [];

$personas = [];

foreach ($custom_personas as $item) {
	$label = !empty($item['label']) ? $item['label'] : '';
	$item_title = !empty($item['title']) ? $item['title'] : '';
	$description = !empty($item['description']) ? $item['description'] : '';
	$tone = !empty($item['tone']) && $item['tone'] === 'orange' ? 'orange' : 'lilac';

	$image_id = !empty($item['image']) ? (int) $item['image'] : 0;
	$image_url = $image_id ? wp_get_attachment_image_url($image_id, 'full') : '';

	$personas[] = [
		'label' => $label,
		'title' => $item_title,
		'description' => $description,
		'tone' => $tone,
		'image_url' => $image_url
	];
}

if (empty($personas)) {
	return;
}
?>

<section class="bg-cream px-5 py-14 lg:px-10 lg:py-[120px]" data-home-order="7" data-personalized>
	<div class="personalized-sticky mx-auto flex max-w-[75rem] flex-col items-center gap-8 lg:gap-12" data-personalized-sticky>
		<?php if (!empty($title)): ?>
			<h2 class="text-center text-4xl leading-none lg:text-5xl lg:leading-[1.1]"><?php echo wp_kses_post($title); ?></h2>
		<?php endif; ?>
		<div class="personalized-tabs" role="tablist" aria-label="Audience">
			<?php foreach ($personas as $audience_index => $audience): ?>
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
		<div class="personalized-panel" data-personalized-panel data-active-index="0">
			<div class="personalized-track">
				<?php foreach ($personas as $audience_index => $audience): ?>
					<?php
     $personalized_state_index = esc_attr($audience_index);
     $personalized_state_hidden = $audience_index === 0 ? 'false' : 'true';
     $personalized_title = esc_html($audience['title']);
     $personalized_description = esc_html($audience['description']);
     $personalized_screen = esc_url($audience['image_url']);
     $personalized_tone_class =
     	$audience['tone'] === 'orange' ? ' personalized-state--orange' : ' personalized-state--lilac';
     $personalized_noise = isset($noise_urls[$audience['tone']]) ? $noise_urls[$audience['tone']] : $noise_dark_url;
     $personalized_noise_style = esc_attr("--personalized-noise-image: url('{$personalized_noise}');");
     ?>
					<div class="personalized-state<?php echo esc_attr(
     	$personalized_tone_class
     ); ?>" data-personalized-state="<?php echo $personalized_state_index; ?>" aria-hidden="<?php echo $personalized_state_hidden; ?>">
						<div class="personalized-noise" style="<?php echo $personalized_noise_style; ?>" aria-hidden="true"></div>
						<div class="personalized-copy">
							<div>
								<h3><?php echo $personalized_title; ?></h3>
								<p><?php echo $personalized_description; ?></p>
							</div>
							<div class="personalized-action">
								<a href="<?php echo $button_url; ?>" target="_blank" rel="noreferrer"><?php echo esc_html($button_text); ?></a>
								<?php if (!empty($button_subtext)): ?>
									<p><?php echo esc_html($button_subtext); ?></p>
								<?php endif; ?>
							</div>
						</div>
						<?php if (!empty($personalized_screen)): ?>
							<div class="personalized-screen">
								<img src="<?php echo $personalized_screen; ?>" alt="<?php echo esc_attr($personalized_title); ?>">
							</div>
						<?php endif; ?>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</section>
