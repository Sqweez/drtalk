<?php

$referral_gap_analysis_url = esc_url(drtalk_redesign_referral_gap_analysis_url());
$noise_orange_url = esc_url(get_theme_file_uri('assets/images/footer-pattern.png'));
$noise_dark_url = esc_url(get_theme_file_uri('assets/images/personalized-pattern-dark.png'));

$fomo_noise_url = $noise_dark_url;
$fomo_noise_style = esc_attr("--fomo-noise-image: url('{$fomo_noise_url}');");
$cta_noise_url = $noise_orange_url;
$cta_noise_style = esc_attr("--cta-noise-image: url('{$cta_noise_url}');");
$cta_steps = [
	[
		'icon' => 'cta-process-1.png',
		'title' => 'We learn your workflow',
		'copy' => 'How referrals come in today, who handles them, and how it gets back to referring GPs.'
	],
	[
		'icon' => 'cta-process-2.png',
		'title' => 'We show you the breakpoints',
		'copy' => 'We give you a score and highlight common pain points for practices with similar setups.'
	],
	[
		'icon' => 'cta-process-3.png',
		'title' => 'You keep the full findings',
		'copy' => 'A written analysis summary is yours to keep, regardless of what you decide to do next.'
	],
	[
		'icon' => 'cta-process-4.png',
		'title' => 'No follow up pressure',
		'copy' =>
			"If drtalk isn't right for your practice, we'll tell you that. Our job is to be useful. Not to close you."
	]
];
get_header();
?>
<?php get_template_part('template-parts/blocks/hero'); ?>
<?php get_template_part('template-parts/blocks/partners'); ?>

<?php get_template_part('template-parts/blocks/problem-cards'); ?>
<?php get_template_part('template-parts/blocks/calculator'); ?>

<?php get_template_part('template-parts/blocks/responsiveness'); ?>

<?php get_template_part('template-parts/blocks/stats'); ?>

<?php get_template_part('template-parts/blocks/how-it-works'); ?>


<?php get_template_part('template-parts/blocks/testimonials'); ?>

<?php get_template_part('template-parts/blocks/personas'); ?>

<?php get_template_part('template-parts/blocks/founder'); ?>
<?php get_template_part('template-parts/blocks/concerns'); ?>
<section class="fomo-section" data-home-order="11" data-fomo data-fomo-baseline="0" data-fomo-hourly-rate="4640" aria-labelledby="fomo-title">
	<div class="fomo-noise" style="<?php echo $fomo_noise_style; ?>" aria-hidden="true"></div>
	<div class="fomo-content">
		<div class="fomo-copy">
			<h2 id="fomo-title">What you lose without<br>a smart referral process.</h2>
			<p>The average specialist practice loses $4,640 every hour to missed and unconverted referrals.<br>Here's what's slipped by since you landed on this page:</p>
		</div>
		<div class="fomo-counter">
			<p class="fomo-amount" data-fomo-amount>$0.00</p>
			<p class="fomo-time"><span aria-hidden="true"></span><span data-fomo-time>00m:00s on page</span></p>
			<p class="fomo-disclaimer">Based on 80 referrals/mo, 58% leakage, $3,000 avg case value —<br>industry averages for specialty dental practices.</p>
		</div>
	</div>
</section>
<section class="cta-section" data-home-order="12" aria-labelledby="cta-title">
	<div class="cta-noise" style="<?php echo $cta_noise_style; ?>" aria-hidden="true"></div>
	<div class="cta-content">
		<div class="cta-heading">
			<h2 id="cta-title">Your referral workflow has gaps.</h2>
			<p>Give us 30 minutes and we’ll find them.</p>
		</div>
		<div class="cta-steps">
			<?php foreach ($cta_steps as $cta_step): ?>
				<?php
    $cta_icon = esc_url(get_theme_file_uri('assets/images/' . $cta_step['icon']));
    $cta_title = esc_html($cta_step['title']);
    $cta_copy = esc_html($cta_step['copy']);
    ?>
				<article class="cta-step">
					<img class="cta-step-icon" src="<?php echo $cta_icon; ?>" alt="">
					<div class="cta-step-copy">
						<h3><?php echo $cta_title; ?></h3>
						<p><?php echo $cta_copy; ?></p>
					</div>
				</article>
			<?php endforeach; ?>
		</div>
		<div class="cta-action">
			<a class="cta-button" href="<?php echo $referral_gap_analysis_url; ?>" target="_blank" rel="noreferrer">Claim Your Free Referral Gap Analysis</a>
			<p>30 minutes. No obligation<br>Best with practice owner + office manager.</p>
		</div>
	</div>
</section>
<?php get_template_part('template-parts/home', 'faq'); ?>
<?php get_footer();
