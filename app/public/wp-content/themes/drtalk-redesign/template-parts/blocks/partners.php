<?php

if (!defined('ABSPATH')) {
	exit();
}

$block = isset($args['block']) ? $args['block'] : drtalk_redesign_get_home_block('partners');

// If explicitly disabled in admin, do not render.
if ($block === false) {
	return;
}

$title = isset($block['title']) ? $block['title'] : '';
$custom_partners = !empty($block['partners_list']) && is_array($block['partners_list']) ? $block['partners_list'] : [];

$partners = [];

foreach ($custom_partners as $item) {
	$label = !empty($item['label']) ? $item['label'] : '';
	$logo_id = !empty($item['logo']) ? (int) $item['logo'] : 0;
	$logo_url = $logo_id ? wp_get_attachment_image_url($logo_id, 'full') : '';
	$width = !empty($item['width']) ? (float) $item['width'] : 160;
	$url = !empty($item['url']) ? esc_url($item['url']) : '';

	if ($logo_url) {
		$style = sprintf(
			'width: %1$spx; height: 48px; mask-image: url(%2$s); -webkit-mask-image: url(%2$s);',
			esc_attr($width),
			esc_url($logo_url)
		);
		$partners[] = [
			'class' => '',
			'label' => $label,
			'style' => $style,
			'url' => $url
		];
	}
}

if (empty($partners)) {
	return;
}
?>
<section class="bg-cream px-5 py-14 sm:px-8 lg:px-12" data-home-order="1">
	<div class="mx-auto flex max-w-[90rem] flex-col items-center gap-8">
		<?php if (!empty($title)): ?>
			<p class="text-[0.8125rem] font-black uppercase leading-4 tracking-[0.15em] text-purple-dark"><?php echo esc_html(
   	$title
   ); ?></p>
		<?php endif; ?>
		<div class="trusted-partners-marquee">
			<div class="trusted-partners-track">
				<?php foreach ($partners as $partner): ?>
					<?php if (!empty($partner['url'])): ?>
						<a
							href="<?php echo esc_url($partner['url']); ?>"
							class="trusted-partner-logo <?php echo esc_attr($partner['class']); ?>"
							<?php if (!empty($partner['style'])): ?>style="<?php echo esc_attr($partner['style']); ?>"<?php endif; ?>
							role="img"
							aria-label="<?php echo esc_attr($partner['label']); ?>"
							target="_blank"
							rel="noreferrer"
						></a>
					<?php else: ?>
						<span
							class="trusted-partner-logo <?php echo esc_attr($partner['class']); ?>"
							<?php if (!empty($partner['style'])): ?>style="<?php echo esc_attr($partner['style']); ?>"<?php endif; ?>
							role="img"
							aria-label="<?php echo esc_attr($partner['label']); ?>"
						></span>
					<?php endif; ?>
				<?php endforeach; ?>
				<?php foreach ($partners as $partner): ?>
					<?php if (!empty($partner['url'])): ?>
						<a
							href="<?php echo esc_url($partner['url']); ?>"
							class="trusted-partner-logo trusted-partner-logo-clone <?php echo esc_attr($partner['class']); ?>"
							<?php if (!empty($partner['style'])): ?>style="<?php echo esc_attr($partner['style']); ?>"<?php endif; ?>
							aria-hidden="true"
							tabindex="-1"
							target="_blank"
							rel="noreferrer"
						></a>
					<?php else: ?>
						<span
							class="trusted-partner-logo trusted-partner-logo-clone <?php echo esc_attr($partner['class']); ?>"
							<?php if (!empty($partner['style'])): ?>style="<?php echo esc_attr($partner['style']); ?>"<?php endif; ?>
							aria-hidden="true"
						></span>
					<?php endif; ?>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</section>
