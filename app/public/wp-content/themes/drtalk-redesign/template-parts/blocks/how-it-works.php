<?php

if (!defined('ABSPATH')) {
	exit();
}

$block = isset($args['block']) ? $args['block'] : drtalk_redesign_get_home_block('how_it_works');

// If explicitly disabled in admin, do not render.
if ($block === false) {
	return;
}

$title = isset($block['title']) ? $block['title'] : '';
$description = isset($block['description']) ? $block['description'] : '';

$custom_steps = !empty($block['steps']) && is_array($block['steps']) ? $block['steps'] : [];

$steps = [];

foreach ($custom_steps as $step) {
	$step_num = !empty($step['number']) ? $step['number'] : '';
	$step_title = !empty($step['title']) ? $step['title'] : '';
	$step_desc = !empty($step['description']) ? $step['description'] : '';

	$image_id = !empty($step['image']) ? (int) $step['image'] : 0;
	$image_url = $image_id ? wp_get_attachment_image_url($image_id, 'full') : '';

	$steps[] = [
		'number' => $step_num,
		'title' => $step_title,
		'description' => $step_desc,
		'image_url' => $image_url
	];
}

if (empty($steps)) {
	return;
}

$noise_url = esc_url(get_theme_file_uri('assets/images/footer-pattern.png'));
$noise_style = esc_attr("--how-it-works-noise-image: url('{$noise_url}');");
?>

<section class="bg-cream px-5 py-14 lg:px-10 lg:py-[120px]" data-home-order="4" data-how-it-works>
	<div class="mx-auto flex max-w-[75rem] flex-col items-center gap-16">
		<div class="flex flex-col items-center gap-4 text-center text-purple-dark">
			<?php if (!empty($title)): ?>
				<h2 class="text-4xl leading-none lg:text-5xl lg:leading-[1.1]"><?php echo wp_kses_post($title); ?></h2>
			<?php endif; ?>
			<?php if (!empty($description)): ?>
				<p class="text-lg leading-6"><?php echo esc_html($description); ?></p>
			<?php endif; ?>
		</div>
		<div class="how-it-works-layout">
			<div class="how-it-works-steps" role="tablist" aria-label="How drtalk works" aria-orientation="vertical">
				<?php foreach ($steps as $step_index => $how_it_works_step): ?>
					<?php
     $step_number = esc_html($how_it_works_step['number']);
     $step_title = esc_html($how_it_works_step['title']);
     $step_description = esc_html($how_it_works_step['description']);
     $step_image_url = esc_url($how_it_works_step['image_url']);
     $step_active = $step_index === 0;
     $step_class = $step_active ? ' is-active' : '';
     $step_index_value = esc_attr($step_index);
     $step_aria_selected = $step_active ? 'true' : 'false';
     $step_tabindex = $step_active ? '0' : '-1';
     ?>
					<button
						id="how-it-works-tab-<?php echo $step_index_value; ?>"
						class="how-it-works-step<?php echo $step_class; ?>"
						type="button"
						role="tab"
						data-how-it-works-step
						data-how-it-works-index="<?php echo $step_index_value; ?>"
						aria-controls="how-it-works-panel-<?php echo $step_index_value; ?>"
						aria-selected="<?php echo $step_aria_selected; ?>"
						tabindex="<?php echo $step_tabindex; ?>"
					>
						<span class="how-it-works-step-number"><?php echo $step_number; ?></span>
						<span class="how-it-works-step-container">
							<span class="how-it-works-step-text">
								<span class="how-it-works-step-title"><?php echo $step_title; ?></span>
								<span class="how-it-works-step-description"><?php echo $step_description; ?></span>
							</span>
							<?php if (!empty($step_image_url)): ?>
								<span class="how-it-works-mobile-media">
									<span class="how-it-works-noise" style="<?php echo $noise_style; ?>" aria-hidden="true"></span>
									<span class="how-it-works-media-screen">
										<img src="<?php echo $step_image_url; ?>" width="2000" height="2000" alt="">
									</span>
								</span>
							<?php endif; ?>
							<span class="how-it-works-progress"><span class="how-it-works-progress-fill"></span></span>
						</span>
					</button>
				<?php endforeach; ?>
			</div>
			<div class="how-it-works-demo" data-how-it-works-demo data-active-step="0">
				<div class="how-it-works-noise" style="<?php echo $noise_style; ?>" aria-hidden="true"></div>
				<div class="how-it-works-demo-screen">
					<?php foreach ($steps as $step_index => $how_it_works_step): ?>
						<?php
      $demo_step_index = esc_attr($step_index);
      $demo_image_url = esc_url($how_it_works_step['image_url']);
      $demo_image_alt = esc_attr($how_it_works_step['title']);
      $demo_hidden = $step_index === 0 ? 'false' : 'true';
      ?>
						<figure id="how-it-works-panel-<?php echo $demo_step_index; ?>" class="how-it-works-demo-state" role="tabpanel" aria-labelledby="how-it-works-tab-<?php echo $demo_step_index; ?>" data-how-it-works-demo-state="<?php echo $demo_step_index; ?>" aria-hidden="<?php echo $demo_hidden; ?>">
							<?php if (!empty($demo_image_url)): ?>
								<img src="<?php echo $demo_image_url; ?>" width="2000" height="2000" alt="<?php echo $demo_image_alt; ?>">
							<?php endif; ?>
						</figure>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</div>
</section>
