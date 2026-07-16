<?php

$menu_fallback = [
	__('Features', 'drtalk-redesign') => home_url('/features/'),
	__('Pricing', 'drtalk-redesign') => home_url('/pricing/'),
	__('About us', 'drtalk-redesign') => home_url('/about-us/'),
	__('Blog', 'drtalk-redesign') => home_url('/blog/')
];
$home_url = esc_url(home_url('/'));
$login_url = esc_url(drtalk_redesign_login_url());
$demo_url = esc_url(drtalk_redesign_demo_url());
$logo_url = esc_url(get_theme_file_uri('assets/images/drtalk-logo-dual.png'));
$primary_navigation_label = esc_attr__('Primary navigation', 'drtalk-redesign');
$primary_menu = wp_nav_menu([
	'theme_location' => 'primary',
	'container' => false,
	'menu_class' => 'flex items-center gap-7 text-sm font-bold',
	'fallback_cb' => false,
	'echo' => false
]);
?>
<header class="border-b border-purple-dark/10 bg-cream">
	<div class="site-container flex min-h-20 items-center justify-between gap-6">
		<a href="<?php echo $home_url; ?>" rel="home">
			<img src="<?php echo $logo_url; ?>" width="119" height="32" alt="<?php esc_attr_e('DrTalk', 'drtalk-redesign'); ?>">
		</a>

		<button class="inline-flex size-11 items-center justify-center rounded-full border border-purple-dark/20 text-purple-dark lg:hidden" type="button" aria-controls="primary-navigation" aria-expanded="false" data-menu-toggle>
			<span class="sr-only"><?php esc_html_e('Toggle navigation', 'drtalk-redesign'); ?></span>
			<span aria-hidden="true" class="text-2xl leading-none">☰</span>
		</button>

		<nav id="primary-navigation" class="hidden lg:block" aria-label="<?php echo $primary_navigation_label; ?>" data-primary-navigation>
			<?php echo $primary_menu; ?>
			<?php if (!has_nav_menu('primary')): ?>
				<ul class="flex items-center gap-7 text-sm font-bold">
					<?php foreach ($menu_fallback as $label => $url): ?>
						<li><a class="transition hover:text-purple" href="<?php echo esc_url($url); ?>"><?php echo esc_html($label); ?></a></li>
					<?php endforeach; ?>
				</ul>
			<?php endif; ?>
		</nav>

		<div class="hidden items-center gap-5 lg:flex">
			<a class="text-sm font-bold transition hover:text-purple" href="<?php echo $login_url; ?>" target="_blank" rel="noreferrer">Login</a>
			<a class="button-primary" href="<?php echo $demo_url; ?>" target="_blank" rel="noreferrer">Book a demo</a>
		</div>
	</div>
</header>
