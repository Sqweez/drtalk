<?php

$home_url = esc_url(home_url('/'));
$demo_url = esc_url(drtalk_redesign_demo_url());
$logo_url = esc_url(get_theme_file_uri('assets/images/drtalk-logo-white.png'));
?>
<footer class="bg-purple-dark py-14 text-cream">
	<div class="site-container">
		<div class="flex flex-col gap-10 border-b border-cream/20 pb-10 lg:flex-row lg:items-end lg:justify-between">
			<div>
				<a href="<?php echo $home_url; ?>" rel="home">
					<img src="<?php echo $logo_url; ?>" width="119" height="32" alt="<?php esc_attr_e('DrTalk', 'drtalk-redesign'); ?>">
				</a>
				<p class="mt-4 max-w-sm text-sm leading-6 text-cream/75">Better referral conversations start with the right healthcare community.</p>
			</div>
			<a class="button-primary self-start lg:self-auto" href="<?php echo $demo_url; ?>" target="_blank" rel="noreferrer">Book a demo</a>
		</div>
		<div class="flex flex-col gap-5 pt-8 text-sm text-cream/75 lg:flex-row lg:items-center lg:justify-between">
			<nav aria-label="<?php esc_attr_e('Footer navigation', 'drtalk-redesign'); ?>">
				<ul class="flex flex-wrap gap-x-5 gap-y-3">
					<li><a class="hover:text-cream" href="<?php echo esc_url(home_url('/terms-and-conditions/')); ?>">Terms of use</a></li>
					<li><a class="hover:text-cream" href="<?php echo esc_url(home_url('/privacy/')); ?>">Privacy policy</a></li>
					<li><a class="hover:text-cream" href="<?php echo esc_url(home_url('/copyright-policy/')); ?>">Copyright policy</a></li>
				</ul>
			</nav>
			<p>© <?php echo esc_html(gmdate('Y')); ?> DrTalk. All rights reserved.</p>
		</div>
	</div>
</footer>
