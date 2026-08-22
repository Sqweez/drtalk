<?php

$home_url = esc_url(home_url('/'));
$demo_url = esc_url(drtalk_redesign_demo_url());
$login_url = esc_url(drtalk_redesign_login_url());
$about_url = esc_url(home_url('/about-us/'));
$blog_url = esc_url(home_url('/blog/'));
$contact_url = esc_url(home_url('/contact-us/'));
$baa_url = esc_url(home_url('/business-associates-agreement/'));
$terms_url = esc_url(home_url('/terms-and-conditions/'));
$privacy_url = esc_url(home_url('/privacy/'));
$logo_url = esc_url(get_theme_file_uri('assets/images/drtalk-logo-light.png'));
$noise_url = esc_url(get_theme_file_uri('assets/images/footer-pattern.png'));
$linkedin_icon_url = esc_url(get_theme_file_uri('assets/images/icon-linkedin.svg'));
$facebook_icon_url = esc_url(get_theme_file_uri('assets/images/icon-facebook.svg'));
$instagram_icon_url = esc_url(get_theme_file_uri('assets/images/icon-instagram.svg'));
$website_navigation_label = esc_attr__('Website navigation', 'drtalk-redesign');
$company_navigation_label = esc_attr__('Company navigation', 'drtalk-redesign');
?>
<footer class="site-footer relative overflow-hidden bg-purple-dark px-5 py-14 text-cream lg:px-10 lg:py-[88px]">
	<div class="site-footer-noise" style="--site-footer-noise-image: url('<?php echo $noise_url; ?>')" aria-hidden="true"></div>
	<div class="relative mx-auto flex w-full max-w-[75rem] flex-col items-start gap-8 rounded-sm lg:h-[272px]">
		<div class="flex w-full flex-col items-start gap-8 lg:min-h-0 lg:flex-1 lg:flex-row lg:gap-16">
			<div class="flex w-full flex-col items-start lg:flex-1">
				<a href="<?php echo $home_url; ?>" rel="home">
					<img src="<?php echo $logo_url; ?>" width="178" height="48" alt="<?php esc_attr_e('DrTalk', 'drtalk-redesign'); ?>">
				</a>
			</div>

			<div class="flex w-full flex-col gap-8 text-sm leading-[18px] lg:flex-[2] lg:flex-row lg:gap-16">
			<nav class="flex flex-1 flex-col items-start gap-4" aria-label="<?php echo $website_navigation_label; ?>">
				<p class="w-[120px] opacity-50">Website</p>
				<ul class="flex w-full flex-col items-start gap-2">
					<li><a class="transition hover:text-orange" href="<?php echo $demo_url; ?>" target="_blank" rel="noreferrer">Book a Demo</a></li>
					<li><a class="transition hover:text-orange" href="<?php echo $login_url; ?>" target="_blank" rel="noreferrer">Log In</a></li>
					<li><a class="transition hover:text-orange" href="<?php echo $about_url; ?>">About</a></li>
					<li><a class="transition hover:text-orange" href="<?php echo $blog_url; ?>">Blog</a></li>
				</ul>
			</nav>

			<nav class="flex flex-1 flex-col items-start gap-4" aria-label="<?php echo $company_navigation_label; ?>">
				<p class="w-[120px] opacity-50">Company</p>
				<ul class="flex w-full flex-col items-start gap-2">
					<li><a class="transition hover:text-orange" href="<?php echo $contact_url; ?>">Contact Us</a></li>
					<li><a class="transition hover:text-orange" href="<?php echo $privacy_url; ?>">Privacy Policy</a></li>
					<li><a class="transition hover:text-orange" href="<?php echo $baa_url; ?>">Business Associates Agreement</a></li>
					<li><a class="transition hover:text-orange" href="<?php echo $terms_url; ?>">Terms of Use</a></li>
				</ul>
			</nav>
			</div>
		</div>

		<div class="flex w-full flex-col items-start gap-6 rounded-sm text-sm leading-5 lg:flex-row lg:items-center lg:gap-8">
			<div class="flex gap-8 lg:order-2">
			<a href="https://www.linkedin.com/" target="_blank" rel="noreferrer"><img src="<?php echo $linkedin_icon_url; ?>" width="24" height="24" alt="<?php esc_attr_e(
	'LinkedIn',
	'drtalk-redesign'
); ?>"></a>
			<a href="https://www.facebook.com/" target="_blank" rel="noreferrer"><img src="<?php echo $facebook_icon_url; ?>" width="24" height="24" alt="<?php esc_attr_e(
	'Facebook',
	'drtalk-redesign'
); ?>"></a>
			<a href="https://www.instagram.com/" target="_blank" rel="noreferrer"><img src="<?php echo $instagram_icon_url; ?>" width="24" height="24" alt="<?php esc_attr_e(
	'Instagram',
	'drtalk-redesign'
); ?>"></a>
			</div>
			<p class="min-w-0 flex-1 opacity-50 lg:order-1">© <?php echo esc_html(gmdate('Y')); ?> drtalk. All rights reserved.</p>
		</div>
	</div>
</footer>
