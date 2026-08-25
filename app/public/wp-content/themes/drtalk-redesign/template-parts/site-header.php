<?php

$home_url = esc_url(home_url('/'));
$about_url = esc_url(home_url('/about-us/'));
$blog_url = esc_url(home_url('/blog/'));
$login_url = esc_url(drtalk_redesign_login_url());
$demo_url = esc_url(drtalk_redesign_demo_url());
$logo_url = esc_url(get_theme_file_uri('assets/images/drtalk-logo.svg'));
$primary_navigation_label = esc_attr__('Primary navigation', 'drtalk-redesign');
?>
<header class="fixed inset-x-0 z-40 bg-cream px-5 py-4 lg:px-12 lg:py-5" style="top: var(--wp-admin--admin-bar--height, 0);">
	<div class="flex h-10 w-full items-center justify-between lg:hidden">
		<a class="shrink-0" href="<?php echo $home_url; ?>" rel="home">
			<img src="<?php echo $logo_url; ?>" width="119" height="32" alt="<?php esc_attr_e('DrTalk', 'drtalk-redesign'); ?>">
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
				<a class="w-full" href="<?php echo $about_url; ?>">About</a>
				<a class="w-full" href="<?php echo $blog_url; ?>">Blog</a>
			</div>
			<div class="flex w-full flex-col gap-4">
				<a class="inline-flex min-h-16 w-full items-center justify-center rounded-full bg-purple-dark px-8 py-5 text-center text-base font-bold leading-6 text-cream" href="<?php echo $demo_url; ?>" target="_blank" rel="noreferrer">Get a Free Referral Analysis</a>
				<a class="inline-flex min-h-16 w-full items-center justify-center rounded-full px-8 py-5 text-center text-base font-bold leading-6 text-purple-dark" href="<?php echo $login_url; ?>" target="_blank" rel="noreferrer">Log In</a>
			</div>
		</nav>
	</div>

	<div class="hidden h-10 w-full items-center justify-center gap-8 rounded-lg lg:flex">
		<div class="flex flex-1 items-center gap-8">
			<a class="shrink-0" href="<?php echo $home_url; ?>" rel="home">
				<img src="<?php echo $logo_url; ?>" width="119" height="32" alt="<?php esc_attr_e('DrTalk', 'drtalk-redesign'); ?>">
			</a>
			<a class="text-sm leading-[18px] text-purple-dark transition hover:text-purple" href="<?php echo $about_url; ?>">About</a>
			<a class="text-sm leading-[18px] text-purple-dark transition hover:text-purple" href="<?php echo $blog_url; ?>">Blog</a>
		</div>

		<div class="flex shrink-0 items-center gap-4">
			<a class="inline-flex h-10 items-center justify-center rounded-[28px] px-6 py-3 text-base font-bold leading-6 text-purple-dark transition hover:bg-purple-dark/5" href="<?php echo $login_url; ?>" target="_blank" rel="noreferrer">Log In</a>
			<a class="inline-flex h-10 items-center justify-center rounded-[28px] bg-purple-dark px-6 py-3 text-base font-bold leading-6 text-cream transition hover:bg-purple" href="<?php echo $demo_url; ?>" target="_blank" rel="noreferrer">Get a Free Referral Analysis</a>
		</div>
	</div>
</header>
