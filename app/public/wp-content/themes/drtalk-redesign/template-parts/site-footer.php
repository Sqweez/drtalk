<?php

$home_url = esc_url(home_url('/'));
$individual_signup_url = esc_url(drtalk_redesign_individual_signup_url());
$about_url = esc_url(home_url('/about-us/'));
$blog_url = esc_url(home_url('/blog/'));
$pricing_url = esc_url(home_url('/pricing/'));
$contact_url = esc_url(home_url('/contact-us/'));
$support_email_url = 'mailto:support@drtalk.com';
$copyright_url = esc_url(home_url('/copyright-policy/'));
$baa_url = esc_url(home_url('/business-associates-agreement/'));
$terms_url = esc_url(home_url('/terms-and-conditions/'));
$privacy_url = esc_url(home_url('/privacy/'));
$logo_url = esc_url(get_theme_file_uri('assets/images/drtalk-logo-light.png'));
$linkedin_icon_url = esc_url(get_theme_file_uri('assets/images/icon-linkedin.svg'));
$facebook_icon_url = esc_url(get_theme_file_uri('assets/images/icon-facebook.svg'));
$instagram_icon_url = esc_url(get_theme_file_uri('assets/images/icon-instagram.svg'));
$website_navigation_label = esc_attr__('Website navigation', 'drtalk-redesign');
$contact_navigation_label = esc_attr__('Contact navigation', 'drtalk-redesign');
$company_navigation_label = esc_attr__('Company navigation', 'drtalk-redesign');
?>
<footer class="bg-purple-dark px-10 py-[88px] text-cream">
	<div class="mx-auto flex h-[272px] w-full max-w-[75rem] flex-col items-start gap-8 rounded-sm">
		<div class="flex min-h-0 w-full flex-1 items-start gap-16">
			<div class="flex flex-1 flex-col items-start">
				<a href="<?php echo $home_url; ?>" rel="home">
					<img src="<?php echo $logo_url; ?>" width="178" height="48" alt="<?php esc_attr_e('DrTalk', 'drtalk-redesign'); ?>">
				</a>
			</div>

			<nav class="flex flex-1 flex-col items-start gap-4 text-sm leading-[18px]" aria-label="<?php echo $website_navigation_label; ?>">
				<p class="w-[120px] opacity-50">Website</p>
				<ul class="flex w-full flex-col items-start gap-2">
					<li><a class="transition hover:text-orange" href="<?php echo $individual_signup_url; ?>" target="_blank" rel="noreferrer">Create Account</a></li>
					<li><a class="transition hover:text-orange" href="<?php echo $about_url; ?>">About</a></li>
					<li><a class="transition hover:text-orange" href="<?php echo $blog_url; ?>">Blog</a></li>
					<li><a class="transition hover:text-orange" href="<?php echo $pricing_url; ?>">Pricing</a></li>
				</ul>
			</nav>

			<nav class="flex flex-1 flex-col items-start gap-4 text-sm leading-[18px]" aria-label="<?php echo $contact_navigation_label; ?>">
				<p class="w-[120px] opacity-50">Connect</p>
				<ul class="flex w-full flex-col items-start gap-2">
					<li><a class="transition hover:text-orange" href="<?php echo $contact_url; ?>">Contact Us</a></li>
					<li><a class="transition hover:text-orange" href="<?php echo esc_url($support_email_url); ?>">Send Email</a></li>
				</ul>
			</nav>

			<nav class="flex flex-1 flex-col items-start gap-4 text-sm leading-[18px]" aria-label="<?php echo $company_navigation_label; ?>">
				<p class="w-[120px] opacity-50">Company</p>
				<ul class="flex w-full flex-col items-start gap-2">
					<li><a class="transition hover:text-orange" href="<?php echo $copyright_url; ?>">Copyright Policy</a></li>
					<li><a class="transition hover:text-orange" href="<?php echo $baa_url; ?>">Business Associates Agreement</a></li>
					<li><a class="transition hover:text-orange" href="<?php echo $terms_url; ?>">Terms of Use</a></li>
					<li><a class="transition hover:text-orange" href="<?php echo $privacy_url; ?>">Privacy Policy</a></li>
				</ul>
			</nav>
		</div>

		<div class="flex w-full items-center gap-8 rounded-sm text-sm leading-[18px]">
			<p class="min-w-0 flex-1 opacity-50">© <?php echo esc_html(gmdate('Y')); ?> drtalk. All rights reserved.</p>
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
	</div>
</footer>
