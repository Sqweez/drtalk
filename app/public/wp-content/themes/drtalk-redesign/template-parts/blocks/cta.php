<?php

if (!defined('ABSPATH')) {
	exit();
}

$block = isset($args['block']) ? $args['block'] : drtalk_redesign_get_home_block('cta');

// If explicitly disabled in admin, do not render.
if ($block === false) {
	return;
}

$title = isset($block['title']) ? $block['title'] : '';
$subtitle = isset($block['subtitle']) ? $block['subtitle'] : '';
$steps = isset($block['cta_steps']) && is_array($block['cta_steps']) ? $block['cta_steps'] : [];
$button_text = isset($block['button_text']) ? $block['button_text'] : '';
$button_url = !empty($block['button_url'])
	? esc_url($block['button_url'])
	: esc_url(drtalk_redesign_referral_gap_analysis_url());
$subtext = isset($block['subtext']) ? $block['subtext'] : '';

$noise_pattern_id = !empty($block['noise_pattern']) ? absint($block['noise_pattern']) : 0;
$noise_url = $noise_pattern_id
	? wp_get_attachment_image_url($noise_pattern_id, 'full')
	: esc_url(get_theme_file_uri('assets/images/footer-pattern.png'));
$cta_noise_style = esc_attr("--cta-noise-image: url('{$noise_url}');");
?>

<section class="cta-section" data-home-order="12" aria-labelledby="cta-title">
	<div class="cta-noise" style="<?php echo $cta_noise_style; ?>" aria-hidden="true"></div>
	<div class="cta-content">
		<?php if (!empty($title) || !empty($subtitle)): ?>
			<div class="cta-heading">
				<?php if (!empty($title)): ?>
					<h2 id="cta-title"><?php echo esc_html($title); ?></h2>
				<?php endif; ?>
				<?php if (!empty($subtitle)): ?>
					<p><?php echo esc_html($subtitle); ?></p>
				<?php endif; ?>
			</div>
		<?php endif; ?>

		<?php if (!empty($steps)): ?>
			<div class="cta-steps">
				<?php foreach ($steps as $step):

    	$icon_id = !empty($step['icon']) ? absint($step['icon']) : 0;
    	$icon_url = $icon_id ? wp_get_attachment_image_url($icon_id, 'full') : '';
    	$step_title = isset($step['step_title']) ? $step['step_title'] : '';
    	$step_copy = isset($step['step_copy']) ? $step['step_copy'] : '';
    	?>
					<article class="cta-step">
						<?php if (!empty($icon_url)): ?>
							<img class="cta-step-icon" src="<?php echo esc_url($icon_url); ?>" alt="" loading="lazy">
						<?php endif; ?>
						<div class="cta-step-copy">
							<?php if (!empty($step_title)): ?>
								<h3><?php echo esc_html($step_title); ?></h3>
							<?php endif; ?>
							<?php if (!empty($step_copy)): ?>
								<p><?php echo esc_html($step_copy); ?></p>
							<?php endif; ?>
						</div>
					</article>
				<?php
    endforeach; ?>
			</div>
		<?php endif; ?>

		<?php if (!empty($button_text) && !empty($button_url)): ?>
			<div class="cta-action">
				<a class="cta-button" href="<?php echo $button_url; ?>" target="_blank" rel="noreferrer"><?php echo esc_html(
	$button_text
); ?></a>
				<?php if (!empty($subtext)): ?>
					<p><?php echo wp_kses_post($subtext); ?></p>
				<?php endif; ?>
			</div>
		<?php endif; ?>
	</div>
</section>
