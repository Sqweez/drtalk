<?php

$footer_settings = function_exists('drtalk_redesign_get_footer_settings')
	? drtalk_redesign_get_footer_settings()
	: [
		'logo_url' => get_theme_file_uri('assets/images/footer-logo.svg'),
		'logo_link' => home_url('/'),
		'logo_alt' => __('DrTalk', 'drtalk-redesign'),
		'noise_url' => get_theme_file_uri('assets/images/footer-pattern.png'),
		'columns' => [
			[
				'title' => 'Website',
				'links' => [
					[
						'text' => 'Book a Demo',
						'url' => drtalk_redesign_referral_gap_analysis_url(),
						'target_blank' => true
					],
					[
						'text' => 'Log In',
						'url' => drtalk_redesign_login_url(),
						'target_blank' => true
					],
					[
						'text' => 'About',
						'url' => home_url('/about-us/'),
						'target_blank' => false
					],
					[
						'text' => 'News',
						'url' => home_url('/blog/'),
						'target_blank' => false
					]
				]
			],
			[
				'title' => 'Company',
				'links' => [
					[
						'text' => 'Contact Us',
						'url' => drtalk_redesign_contact_url(),
						'target_blank' => false
					],
					[
						'text' => 'Privacy Policy',
						'url' => home_url('/privacy/'),
						'target_blank' => false
					],
					[
						'text' => 'Business Associates Agreement',
						'url' => home_url('/business-associates-agreement/'),
						'target_blank' => false
					],
					[
						'text' => 'Terms of Use',
						'url' => home_url('/terms-and-conditions/'),
						'target_blank' => false
					]
				]
			]
		],
		'social_links' => [
			[
				'title' => 'LinkedIn',
				'url' => 'https://www.linkedin.com/company/drtalk/',
				'icon_url' => get_theme_file_uri('assets/images/icon-linkedin.svg')
			],
			[
				'title' => 'Facebook',
				'url' => 'https://www.facebook.com/DrTalk1',
				'icon_url' => get_theme_file_uri('assets/images/icon-facebook.svg')
			],
			[
				'title' => 'Instagram',
				'url' => 'https://www.instagram.com/drtalk_',
				'icon_url' => get_theme_file_uri('assets/images/icon-instagram.svg')
			]
		],
		'copyright' => sprintf('© %s drtalk. All rights reserved.', gmdate('Y'))
	];

$home_url = esc_url($footer_settings['logo_link']);
$logo_url = esc_url($footer_settings['logo_url']);
$logo_alt = esc_attr($footer_settings['logo_alt']);
$noise_url = esc_url($footer_settings['noise_url']);
$columns = $footer_settings['columns'];
$social_links = $footer_settings['social_links'];
$copyright = $footer_settings['copyright'];
?>
<footer class="site-footer relative overflow-hidden bg-purple-dark px-5 py-14 text-cream lg:px-10 lg:py-[88px]">
	<div class="site-footer-noise" style="--site-footer-noise-image: url('<?php echo $noise_url; ?>')" aria-hidden="true"></div>
	<div class="relative mx-auto flex w-full max-w-[75rem] flex-col items-start gap-8 rounded-sm lg:h-[272px]">
		<div class="flex w-full flex-col items-start gap-8 lg:min-h-0 lg:flex-1 lg:flex-row lg:gap-16">
			<div class="flex w-full flex-col items-start lg:flex-1">
				<a href="<?php echo $home_url; ?>" rel="home">
					<img src="<?php echo $logo_url; ?>" width="178" height="48" alt="<?php echo $logo_alt; ?>">
				</a>
			</div>

			<?php if (!empty($columns)): ?>
				<div class="flex w-full flex-col gap-8 text-sm leading-[18px] lg:flex-[2] lg:flex-row lg:gap-16">
					<?php foreach ($columns as $column):

     	$column_title = !empty($column['title']) ? $column['title'] : '';
     	$nav_label = esc_attr(
     		sprintf(__('%s navigation', 'drtalk-redesign'), $column_title ?: __('Footer', 'drtalk-redesign'))
     	);
     	?>
						<nav class="flex flex-1 flex-col items-start gap-4" aria-label="<?php echo $nav_label; ?>">
							<?php if ($column_title !== ''): ?>
								<p class="w-[120px] opacity-50"><?php echo esc_html($column_title); ?></p>
							<?php endif; ?>
							<?php if (!empty($column['links'])): ?>
								<ul class="flex w-full flex-col items-start gap-2">
									<?php foreach ($column['links'] as $link):
         	$target = !empty($link['target_blank']) ? ' target="_blank" rel="noreferrer"' : ''; ?>
										<li><a class="transition hover:text-orange" href="<?php echo esc_url(
          	$link['url']
          ); ?>"<?php echo $target; ?>><?php echo esc_html($link['text']); ?></a></li>
									<?php
         endforeach; ?>
								</ul>
							<?php endif; ?>
						</nav>
					<?php
     endforeach; ?>
				</div>
			<?php endif; ?>
		</div>

		<div class="flex w-full flex-col items-start gap-6 rounded-sm text-sm leading-5 lg:flex-row lg:items-center lg:gap-8">
			<?php if (!empty($social_links)): ?>
				<div class="flex gap-8 lg:order-2">
					<?php foreach ($social_links as $social): ?>
						<a href="<?php echo esc_url($social['url']); ?>" target="_blank" rel="noreferrer"><img src="<?php echo esc_url(
	$social['icon_url']
); ?>" width="24" height="24" alt="<?php echo esc_attr($social['title']); ?>"></a>
					<?php endforeach; ?>
				</div>
			<?php endif; ?>
			<p class="min-w-0 flex-1 opacity-50 lg:order-1"><?php echo esc_html($copyright); ?></p>
		</div>
	</div>
</footer>

