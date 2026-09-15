<?php

$header_settings = function_exists('drtalk_redesign_get_header_settings')
	? drtalk_redesign_get_header_settings()
	: [
		'logo_url' => get_theme_file_uri('assets/images/drtalk-logo.svg'),
		'logo_link' => home_url('/'),
		'logo_alt' => __('DrTalk', 'drtalk-redesign'),
		'nav_links' => [
			['text' => 'About', 'url' => home_url('/about-us/'), 'target_blank' => false],
			['text' => 'News', 'url' => home_url('/blog/'), 'target_blank' => false]
		],
		'primary_btn' => [
			'enable' => true,
			'text' => 'Get a Free Referral Analysis',
			'url' => drtalk_redesign_referral_gap_analysis_url(),
			'target_blank' => true
		],
		'secondary_btn' => [
			'enable' => true,
			'text' => 'Log In',
			'url' => drtalk_redesign_login_url(),
			'target_blank' => true
		]
	];

$logo_url = esc_url($header_settings['logo_url']);
$logo_link = esc_url($header_settings['logo_link']);
$logo_alt = esc_attr($header_settings['logo_alt']);
$nav_links = $header_settings['nav_links'];
$primary_btn = $header_settings['primary_btn'];
$secondary_btn = $header_settings['secondary_btn'];
$primary_navigation_label = esc_attr__('Primary navigation', 'drtalk-redesign');
?>
<header class="fixed inset-x-0 z-40 bg-cream px-5 py-4 lg:px-12 lg:py-5" style="top: var(--wp-admin--admin-bar--height, 0);">
	<div class="flex h-10 w-full items-center justify-between lg:hidden">
		<a class="shrink-0" href="<?php echo $logo_link; ?>" rel="home">
			<img src="<?php echo $logo_url; ?>" width="119" height="32" class="h-8 w-auto" alt="<?php echo $logo_alt; ?>">
		</a>
		<button
			class="flex size-10 shrink-0 items-center justify-center rounded-full text-purple-dark"
			type="button"
			aria-expanded="false"
			aria-controls="mobile-primary-navigation"
			aria-label="<?php esc_attr_e('Toggle navigation', 'drtalk-redesign'); ?>"
			data-menu-toggle
		>
			<span class="mobile-menu-toggle-icon" aria-hidden="true">
				<span class="mobile-menu-hamburger">
					<span></span>
					<span></span>
					<span></span>
				</span>
				<span class="mobile-menu-close">
					<span></span>
					<span></span>
				</span>
			</span>
		</button>
		<nav id="mobile-primary-navigation" class="mobile-menu-panel hidden" data-primary-navigation aria-label="<?php echo $primary_navigation_label; ?>" aria-hidden="true">
			<div class="flex min-h-0 flex-1 flex-col items-start gap-8 text-lg leading-6 text-purple-dark">
				<?php foreach ($nav_links as $link): ?>
					<a
						class="w-full"
						href="<?php echo esc_url($link['url']); ?>"
						<?php if (!empty($link['target_blank'])): ?> target="_blank" rel="noreferrer"<?php endif; ?>
					>
						<?php echo esc_html($link['text']); ?>
					</a>
				<?php endforeach; ?>
			</div>
			<div class="flex w-full flex-col gap-4">
				<?php if (!empty($primary_btn['enable']) && !empty($primary_btn['text'])): ?>
					<a
						class="inline-flex min-h-16 w-full items-center justify-center rounded-full bg-purple-dark px-8 py-5 text-center text-base font-bold leading-6 text-cream"
						href="<?php echo esc_url($primary_btn['url']); ?>"
						<?php if (!empty($primary_btn['target_blank'])): ?> target="_blank" rel="noreferrer"<?php endif; ?>
					>
						<?php echo esc_html($primary_btn['text']); ?>
					</a>
				<?php endif; ?>
				<?php if (!empty($secondary_btn['enable']) && !empty($secondary_btn['text'])): ?>
					<a
						class="inline-flex min-h-16 w-full items-center justify-center rounded-full px-8 py-5 text-center text-base font-bold leading-6 text-purple-dark"
						href="<?php echo esc_url($secondary_btn['url']); ?>"
						<?php if (!empty($secondary_btn['target_blank'])): ?> target="_blank" rel="noreferrer"<?php endif; ?>
					>
						<?php echo esc_html($secondary_btn['text']); ?>
					</a>
				<?php endif; ?>
			</div>
		</nav>
	</div>

	<div class="hidden h-10 w-full items-center justify-center gap-8 rounded-lg lg:flex">
		<div class="flex flex-1 items-center gap-8">
			<a class="shrink-0" href="<?php echo $logo_link; ?>" rel="home">
				<img src="<?php echo $logo_url; ?>" width="119" height="32" class="h-8 w-auto" alt="<?php echo $logo_alt; ?>">
			</a>
			<?php foreach ($nav_links as $link): ?>
				<a
					class="text-sm leading-[18px] text-purple-dark transition hover:text-purple"
					href="<?php echo esc_url($link['url']); ?>"
					<?php if (!empty($link['target_blank'])): ?> target="_blank" rel="noreferrer"<?php endif; ?>
				>
					<?php echo esc_html($link['text']); ?>
				</a>
			<?php endforeach; ?>
		</div>

		<div class="flex shrink-0 items-center gap-4">
			<?php if (!empty($secondary_btn['enable']) && !empty($secondary_btn['text'])): ?>
				<a
					class="inline-flex h-10 items-center justify-center rounded-[28px] px-6 py-3 text-base font-bold leading-6 text-purple-dark transition hover:bg-purple-dark/5"
					href="<?php echo esc_url($secondary_btn['url']); ?>"
					<?php if (!empty($secondary_btn['target_blank'])): ?> target="_blank" rel="noreferrer"<?php endif; ?>
				>
					<?php echo esc_html($secondary_btn['text']); ?>
				</a>
			<?php endif; ?>
			<?php if (!empty($primary_btn['enable']) && !empty($primary_btn['text'])): ?>
				<a
					class="inline-flex h-10 items-center justify-center rounded-[28px] bg-purple-dark px-6 py-3 text-base font-bold leading-6 text-cream transition hover:bg-purple"
					href="<?php echo esc_url($primary_btn['url']); ?>"
					<?php if (!empty($primary_btn['target_blank'])): ?> target="_blank" rel="noreferrer"<?php endif; ?>
				>
					<?php echo esc_html($primary_btn['text']); ?>
				</a>
			<?php endif; ?>
		</div>
	</div>
</header>

