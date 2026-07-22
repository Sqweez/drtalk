<?php

$home_url = esc_url(home_url('/'));
$about_url = esc_url(home_url('/about-us/'));
$blog_url = esc_url(home_url('/blog/'));
$login_url = esc_url(drtalk_redesign_login_url());
$demo_url = esc_url(drtalk_redesign_demo_url());
$logo_url = esc_url(get_theme_file_uri('assets/images/drtalk-logo-dual.png'));
?>
<header class="fixed inset-x-0 z-40 bg-cream px-12 py-5" style="top: var(--wp-admin--admin-bar--height, 0);">
	<div class="mx-auto flex h-10 w-full max-w-[75rem] items-center justify-center gap-8 rounded-lg">
		<div class="flex flex-1 items-center gap-6">
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
