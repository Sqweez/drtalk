<?php

if (!defined('ABSPATH')) {
	exit();
}

$block = isset($args['block']) ? $args['block'] : drtalk_redesign_get_home_block('hero');

// If explicitly disabled in admin, do not render.
if ($block === false) {
	return;
}

$hero_noise_orange_url = esc_url(get_theme_file_uri('assets/images/footer-pattern.png'));
$hero_noise_dark_url = esc_url(get_theme_file_uri('assets/images/personalized-pattern-dark.png'));
$hero_referral_url = esc_url(get_theme_file_uri('assets/images/hero-decoration-referral.png'));
$hero_shield_url = esc_url(get_theme_file_uri('assets/images/hero-decoration-shield.png'));
$hero_money_url = esc_url(get_theme_file_uri('assets/images/hero-decoration-money.png'));
$hero_connection_url = esc_url(get_theme_file_uri('assets/images/hero-decoration-connection.png'));

$eyebrow = isset($block['eyebrow']) ? $block['eyebrow'] : '';
$title = isset($block['title']) ? $block['title'] : '';
$description = isset($block['description']) ? $block['description'] : '';
$button_text = isset($block['button_text']) ? $block['button_text'] : '';
$button_url = !empty($block['button_url'])
	? esc_url($block['button_url'])
	: esc_url(drtalk_redesign_referral_gap_analysis_url());
$subtext_line_1 = isset($block['subtext_line_1']) ? $block['subtext_line_1'] : '';
$subtext_line_2 = isset($block['subtext_line_2']) ? $block['subtext_line_2'] : '';

$phone_image_url = !empty($block['phone_image'])
	? wp_get_attachment_image_url((int) $block['phone_image'], 'full')
	: '';

$show_decorations = isset($block['show_decorations']) ? (bool) $block['show_decorations'] : true;
?>
<section class="px-2 py-8 sm:px-8 lg:px-12 lg:pb-0 lg:pt-5" data-home-order="1">
	<div class="mx-auto grid max-w-[90rem] gap-2 lg:grid-cols-2">
		<div class="relative flex flex-col items-center justify-center overflow-hidden rounded-3xl bg-purple-dark px-6 py-10 text-center sm:p-10 lg:h-[35rem] lg:min-h-[34rem]">
			<div
				class="hero-noise absolute inset-0"
				style="<?php echo esc_attr('--hero-noise-image: url(\'' . $hero_noise_orange_url . '\');'); ?>"
				aria-hidden="true"
			></div>
			<div class="relative flex w-full max-w-[37rem] flex-col items-center gap-8">
				<div class="flex w-full flex-col items-center gap-4 text-cream">
					<?php if (!empty($eyebrow)): ?>
						<p class="text-[0.8125rem] font-black uppercase leading-4 tracking-[0.15em]"><?php echo esc_html($eyebrow); ?></p>
					<?php endif; ?>
					<?php if (!empty($title)): ?>
						<h1 class="text-4xl leading-none tracking-normal sm:text-5xl sm:leading-[1.1] sm:tracking-[-0.01em]"><?php echo esc_html(
      	$title
      ); ?></h1>
					<?php endif; ?>
					<?php if (!empty($description)): ?>
						<p class="text-lg leading-6 text-cream/90"><?php echo nl2br(esc_html($description)); ?></p>
					<?php endif; ?>
				</div>
				<?php if (!empty($button_text) || !empty($subtext_line_1) || !empty($subtext_line_2)): ?>
					<div class="flex flex-col items-center gap-4">
						<?php if (!empty($button_text)): ?>
							<a class="inline-flex min-h-16 items-center justify-center rounded-full bg-orange px-8 py-5 text-center text-base font-bold leading-6 text-purple-dark transition-colors hover:bg-cream focus-visible:outline-orange" href="<?php echo $button_url; ?>" target="_blank" rel="noreferrer"><?php echo esc_html(
	$button_text
); ?></a>
						<?php endif; ?>
						<?php if (!empty($subtext_line_1) || !empty($subtext_line_2)): ?>
							<p class="text-sm leading-5 text-cream/75">
								<?php if (!empty($subtext_line_1)): ?>
									<span class="block"><?php echo esc_html($subtext_line_1); ?></span>
								<?php endif; ?>
								<?php if (!empty($subtext_line_2)): ?>
									<span class="block"><?php echo esc_html($subtext_line_2); ?></span>
								<?php endif; ?>
							</p>
						<?php endif; ?>
					</div>
				<?php endif; ?>
			</div>
		</div>
		<div class="hero-visual relative hidden min-h-[28rem] overflow-hidden rounded-3xl bg-lilac lg:block lg:h-[35rem]">
			<?php if ($show_decorations): ?>
			<div class="hero-visual-stage hero-decoration-stage" aria-hidden="true">
				<img class="hero-decoration hero-decoration-referral" src="<?php echo $hero_referral_url; ?>" width="112" height="114" alt="">
				<img class="hero-decoration hero-decoration-shield" src="<?php echo $hero_shield_url; ?>" width="141" height="140" alt="">
				<img class="hero-decoration hero-decoration-money" src="<?php echo $hero_money_url; ?>" width="127" height="134" alt="">
				<img class="hero-decoration hero-decoration-connection" src="<?php echo $hero_connection_url; ?>" width="149" height="146" alt="">
			</div>
			<?php endif; ?>
			<div
				class="hero-noise hero-visual-noise absolute inset-0"
				style="<?php echo esc_attr('--hero-noise-image: url(\'' . $hero_noise_dark_url . '\');'); ?>"
				aria-hidden="true"
			></div>
			<?php if (!empty($phone_image_url)): ?>
				<div class="hero-visual-stage hero-phone-stage" aria-hidden="true">
					<img class="hero-phone" src="<?php echo esc_url($phone_image_url); ?>" width="1319" height="2748" alt="">
				</div>
			<?php endif; ?>
			<p class="sr-only"><?php esc_html_e(
   	'drtalk referral dashboard with referral, security, revenue, and connection illustrations.',
   	'drtalk-redesign'
   ); ?></p>
		</div>
	</div>
</section>
