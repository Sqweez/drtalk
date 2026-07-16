<?php

$home_url = esc_url(home_url('/'));
$demo_url = esc_url(drtalk_redesign_demo_url());
?>
<footer class="bg-purple-dark py-14 text-cream">
	<div class="site-container">
		<div class="flex flex-col gap-10 border-b border-cream/20 pb-10 lg:flex-row lg:items-end lg:justify-between">
			<div>
				<a class="font-heading text-3xl font-bold tracking-[-0.06em]" href="<?php echo $home_url; ?>" rel="home">DrTalk<span class="text-orange">.</span></a>
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
