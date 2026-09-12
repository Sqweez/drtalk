<?php

if (!defined('ABSPATH')) {
	exit();
}

$block = isset($args['block']) ? $args['block'] : drtalk_redesign_get_home_block('founder');

// If explicitly disabled in admin, do not render.
if ($block === false) {
	return;
}

$title = isset($block['title']) ? $block['title'] : '';
$image_id = !empty($block['founder_image']) ? (int) $block['founder_image'] : 0;
$image_url = $image_id ? wp_get_attachment_image_url($image_id, 'full') : '';

$founder_name = isset($block['founder_name']) ? $block['founder_name'] : '';
$founder_role = isset($block['founder_role']) ? $block['founder_role'] : '';
$story = isset($block['story']) ? $block['story'] : '';

$link_text = !empty($block['link_text']) ? $block['link_text'] : 'Read Our Story';
$link_url = !empty($block['link_url']) ? esc_url($block['link_url']) : esc_url(home_url('/about-us/'));

if (empty($title) && empty($story)) {
	return;
}

$story_html = strpos($story, '<p>') !== false ? $story : wpautop($story);
?>

<section class="founder-section" data-home-order="9" aria-labelledby="founder-title">
	<div class="founder-section-content">
		<?php if (!empty($title)): ?>
			<h2 class="founder-section-mobile-title"><?php echo wp_kses_post($title); ?></h2>
		<?php endif; ?>
		<div class="founder-section-profile">
			<?php if (!empty($image_url)): ?>
				<img class="founder-section-image" src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr(
	wp_strip_all_tags($founder_name ?: 'Thomas L. Stone')
); ?>">
			<?php endif; ?>
			<?php if (!empty($founder_name) || !empty($founder_role)): ?>
				<div class="founder-section-profile-copy">
					<?php if (!empty($founder_name)): ?>
						<h3><?php echo wp_kses_post($founder_name); ?></h3>
					<?php endif; ?>
					<?php if (!empty($founder_role)): ?>
						<p><?php echo wp_kses_post($founder_role); ?></p>
					<?php endif; ?>
				</div>
			<?php endif; ?>
		</div>
		<div class="founder-section-story">
			<?php if (!empty($title)): ?>
				<h2 id="founder-title" class="founder-section-desktop-title"><?php echo wp_kses_post($title); ?></h2>
			<?php endif; ?>
			<?php if (!empty($story)): ?>
				<?php echo wp_kses_post($story_html); ?>
			<?php endif; ?>
			<?php if (!empty($link_text) && !empty($link_url)): ?>
				<a class="founder-section-link" href="<?php echo $link_url; ?>">
					<span><?php echo esc_html($link_text); ?></span>
					<svg aria-hidden="true" viewBox="0 0 24 24" fill="none">
						<path d="M5 12h14m-6-6 6 6-6 6" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.75" />
					</svg>
				</a>
			<?php endif; ?>
		</div>
	</div>
</section>
