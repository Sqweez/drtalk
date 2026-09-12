<?php

if (!defined('ABSPATH')) {
	exit();
}

use Carbon_Fields\Carbon_Fields;
use Carbon_Fields\Container;
use Carbon_Fields\Field;

/**
 * Boots Carbon Fields when the theme loads.
 */
function drtalk_redesign_boot_carbon_fields()
{
	$autoload = get_theme_file_path('vendor/autoload.php');
	if (file_exists($autoload)) {
		require_once $autoload;
		Carbon_Fields::boot();
	}
}
add_action('after_setup_theme', 'drtalk_redesign_boot_carbon_fields');

/**
 * Registers custom fields for the Front Page.
 */
function drtalk_redesign_register_front_page_fields()
{
	Container::make('theme_options', __('Front Page', 'drtalk-redesign'))
		->set_page_file('drtalk-front-page')
		->set_page_menu_title(__('Front Page', 'drtalk-redesign'))
		->set_icon('dashicons-admin-home')
		->set_page_menu_position(20)
		->add_fields([
			Field::make('complex', 'home_blocks', __('Home Page Blocks', 'drtalk-redesign'))
				->set_collapsed(true)
				->add_fields('hero', __('Hero Section', 'drtalk-redesign'), [
					Field::make('checkbox', 'is_active', __('Enable Section', 'drtalk-redesign'))->set_default_value(
						true
					),
					Field::make('text', 'eyebrow', __('Eyebrow Text', 'drtalk-redesign'))->set_default_value(
						'Built by Dentists for Dentists'
					),
					Field::make('text', 'title', __('Title (H1)', 'drtalk-redesign'))->set_default_value(
						'Stop Losing Referrals You Never Knew You Missed'
					),
					Field::make('textarea', 'description', __('Description', 'drtalk-redesign'))
						->set_default_value(
							'Invisible referral leaks cost your practice revenue. Plug the gaps with drtalk. Put AI to work for your office to seamlessly capture, track, and close every referral.'
						)
						->set_rows(3),
					Field::make('text', 'button_text', __('Button Text', 'drtalk-redesign'))->set_default_value(
						'Claim Your Free Referral Gap Analysis'
					),
					Field::make(
						'text',
						'button_url',
						__('Button URL (leave empty for default Gap Analysis link)', 'drtalk-redesign')
					),
					Field::make('text', 'subtext_line_1', __('Subtext Line 1', 'drtalk-redesign'))->set_default_value(
						'30 minutes. We do the work.'
					),
					Field::make('text', 'subtext_line_2', __('Subtext Line 2', 'drtalk-redesign'))->set_default_value(
						'You keep the report. No pitch, no obligation.'
					),
					Field::make('image', 'phone_image', __('Phone Mockup Image', 'drtalk-redesign'))
						->set_value_type('id')
						->set_help_text(__('Leave empty to use the default hero phone mockup.', 'drtalk-redesign')),
					Field::make(
						'checkbox',
						'show_decorations',
						__('Show Floating Icon Decorations', 'drtalk-redesign')
					)->set_default_value(true)
				])
				->add_fields('partners', __('Trusted Partners', 'drtalk-redesign'), [
					Field::make('checkbox', 'is_active', __('Enable Section', 'drtalk-redesign'))->set_default_value(
						true
					),
					Field::make('text', 'title', __('Section Title', 'drtalk-redesign'))->set_default_value(
						'Trusted By Dentistry’s Top Leaders'
					),
					Field::make('complex', 'partners_list', __('Partners List', 'drtalk-redesign'))
						->set_help_text(__('Leave empty to use the default 5 dental leaders.', 'drtalk-redesign'))
						->set_collapsed(true)
						->add_fields([
							Field::make(
								'text',
								'label',
								__('Partner Name (aria-label)', 'drtalk-redesign')
							)->set_required(true),
							Field::make('image', 'logo', __('Partner Logo', 'drtalk-redesign'))
								->set_value_type('id')
								->set_required(true),
							Field::make('text', 'width', __('Display Width in px (e.g. 160)', 'drtalk-redesign'))
								->set_default_value('160')
								->set_attribute('type', 'number'),
							Field::make('text', 'url', __('Website URL (optional)', 'drtalk-redesign'))
						])
				])
				->add_fields('problem_cards', __('Problem Cards', 'drtalk-redesign'), [
					Field::make('checkbox', 'is_active', __('Enable Section', 'drtalk-redesign'))->set_default_value(
						true
					),
					Field::make('text', 'eyebrow', __('Eyebrow Text', 'drtalk-redesign'))->set_default_value(
						'Put Operational AI to Work'
					),
					Field::make('text', 'title', __('Section Title (H2)', 'drtalk-redesign'))->set_default_value(
						"You didn't build a specialty practice to manage inboxes"
					),
					Field::make('textarea', 'description', __('Mobile Subtitle', 'drtalk-redesign'))
						->set_default_value(
							"When referring dentists feel like it's hard to work with you, they don't complain. They just stop referring."
						)
						->set_rows(2),
					Field::make('complex', 'cards', __('Problem Cards List', 'drtalk-redesign'))
						->set_help_text(__('Leave empty to use the default 4 problem cards.', 'drtalk-redesign'))
						->set_collapsed(true)
						->add_fields([
							Field::make('text', 'title', __('Card Title', 'drtalk-redesign'))->set_required(true),
							Field::make('textarea', 'quote', __('Quote', 'drtalk-redesign'))
								->set_rows(2)
								->set_required(true),
							Field::make('textarea', 'description', __('Description', 'drtalk-redesign'))
								->set_rows(3)
								->set_required(true),
							Field::make(
								'image',
								'static_icon',
								__('Static Icon (PNG)', 'drtalk-redesign')
							)->set_value_type('id'),
							Field::make(
								'image',
								'hover_icon',
								__('Hover Icon (GIF)', 'drtalk-redesign')
							)->set_value_type('id')
						])
				])
				->add_fields('calculator', __('Leakage Calculator', 'drtalk-redesign'), [
					Field::make('checkbox', 'is_active', __('Enable Section', 'drtalk-redesign'))->set_default_value(
						true
					),
					Field::make('text', 'title', __('Section Title (H2)', 'drtalk-redesign'))
						->set_default_value("If you can't measure your referral leakage, you can't fix it.")
						->set_width(50),
					Field::make('text', 'form_title', __('Form Title', 'drtalk-redesign'))
						->set_default_value('How much revenue is slipping through your fingers?')
						->set_width(50),

					Field::make('separator', 'sep_referrals', __('Slider 1: Referrals per month', 'drtalk-redesign')),
					Field::make('text', 'referrals_default', __('Default Value', 'drtalk-redesign'))
						->set_attribute('type', 'number')
						->set_default_value('80')
						->set_width(33),
					Field::make('text', 'referrals_min', __('Minimum', 'drtalk-redesign'))
						->set_attribute('type', 'number')
						->set_default_value('10')
						->set_width(33),
					Field::make('text', 'referrals_max', __('Maximum', 'drtalk-redesign'))
						->set_attribute('type', 'number')
						->set_default_value('300')
						->set_width(33),

					Field::make(
						'separator',
						'sep_case_value',
						__('Slider 2: Average Case Value ($)', 'drtalk-redesign')
					),
					Field::make('text', 'case_value_default', __('Default Value ($)', 'drtalk-redesign'))
						->set_attribute('type', 'number')
						->set_default_value('3000')
						->set_width(25),
					Field::make('text', 'case_value_min', __('Minimum ($)', 'drtalk-redesign'))
						->set_attribute('type', 'number')
						->set_default_value('100')
						->set_width(25),
					Field::make('text', 'case_value_max', __('Maximum ($)', 'drtalk-redesign'))
						->set_attribute('type', 'number')
						->set_default_value('10000')
						->set_width(25),
					Field::make('text', 'case_value_step', __('Step ($)', 'drtalk-redesign'))
						->set_attribute('type', 'number')
						->set_default_value('100')
						->set_width(25),

					Field::make('separator', 'sep_conversion', __('Slider 3: Conversion Rate (%)', 'drtalk-redesign')),
					Field::make('text', 'conversion_default', __('Default Value (%)', 'drtalk-redesign'))
						->set_attribute('type', 'number')
						->set_default_value('42')
						->set_width(33),
					Field::make('text', 'conversion_min', __('Minimum (%)', 'drtalk-redesign'))
						->set_attribute('type', 'number')
						->set_default_value('0')
						->set_width(33),
					Field::make('text', 'conversion_max', __('Maximum (%)', 'drtalk-redesign'))
						->set_attribute('type', 'number')
						->set_default_value('100')
						->set_width(33),

					Field::make('separator', 'sep_cta', __('Call to Action & Results', 'drtalk-redesign')),
					Field::make('text', 'note_text', __('Note Below Results', 'drtalk-redesign'))
						->set_default_value('Get the full report after the demo call with drtalk team.')
						->set_width(50),
					Field::make('text', 'button_text', __('Button Text', 'drtalk-redesign'))
						->set_default_value('Claim Your Free Referral Gap Analysis')
						->set_width(25),
					Field::make(
						'text',
						'button_url',
						__('Button URL (leave empty for default Gap Analysis link)', 'drtalk-redesign')
					)->set_width(25)
				])
				->add_fields('how_it_works', __('How It Works', 'drtalk-redesign'), [
					Field::make('checkbox', 'is_active', __('Enable Section', 'drtalk-redesign'))->set_default_value(
						true
					),
					Field::make('textarea', 'title', __('Section Title (H2)', 'drtalk-redesign'))
						->set_default_value('From chaos to clarity.<br>No disruption. No overhaul.')
						->set_rows(2)
						->set_width(50),
					Field::make('textarea', 'description', __('Section Description', 'drtalk-redesign'))
						->set_default_value(
							'drtalk plugs into the referral channels you’re already using. Your referring GPs keep doing what they’re doing. You just capture everything.'
						)
						->set_rows(2)
						->set_width(50),
					Field::make('complex', 'steps', __('Steps List', 'drtalk-redesign'))
						->set_help_text(__('Leave empty to use the default 3 steps.', 'drtalk-redesign'))
						->set_collapsed(true)
						->add_fields([
							Field::make('text', 'number', __('Step Number', 'drtalk-redesign'))
								->set_default_value('01')
								->set_width(20)
								->set_required(true),
							Field::make('text', 'title', __('Step Title', 'drtalk-redesign'))
								->set_width(40)
								->set_required(true),
							Field::make('image', 'image', __('Step Graphic (PNG)', 'drtalk-redesign'))
								->set_value_type('id')
								->set_width(40),
							Field::make('textarea', 'description', __('Step Description', 'drtalk-redesign'))
								->set_rows(3)
								->set_width(100)
								->set_required(true)
						])
				])
				->add_fields('responsiveness', __('Why Us / Responsiveness', 'drtalk-redesign'), [
					Field::make('checkbox', 'is_active', __('Enable Section', 'drtalk-redesign'))->set_default_value(
						true
					),
					Field::make('textarea', 'title', __('Section Title (H2)', 'drtalk-redesign'))
						->set_default_value('Most compete on reputation.<br>The best compete on responsiveness.')
						->set_rows(2)
						->set_width(50),
					Field::make('textarea', 'description', __('Section Subtitle', 'drtalk-redesign'))
						->set_default_value(
							'drtalk is the only mobile-first platform built by practicing dentists that brings referrals, communication, and visibility into one place.<br class="hidden lg:block"> So nothing gets missed, delayed, or lost again.'
						)
						->set_rows(2)
						->set_width(50),
					Field::make('complex', 'cards', __('Cards List', 'drtalk-redesign'))
						->set_collapsed(true)
						->add_fields([
							Field::make('text', 'title', __('Card Title', 'drtalk-redesign'))
								->set_width(50)
								->set_required(true),
							Field::make('image', 'static_icon', __('Static Icon (SVG)', 'drtalk-redesign'))
								->set_value_type('id')
								->set_width(25),
							Field::make('image', 'hover_icon', __('Hover Icon (GIF)', 'drtalk-redesign'))
								->set_value_type('id')
								->set_width(25),
							Field::make('textarea', 'description', __('Card Description', 'drtalk-redesign'))
								->set_rows(3)
								->set_width(100)
								->set_required(true)
						])
				])
				->add_fields('stats', __('Scale Numbers / Stats', 'drtalk-redesign'), [
					Field::make('checkbox', 'is_active', __('Enable Section', 'drtalk-redesign'))->set_default_value(
						true
					),
					Field::make('textarea', 'title', __('Section Title (H2)', 'drtalk-redesign'))
						->set_default_value('Real results.<br class="lg:hidden"> Proven at scale.')
						->set_rows(2),
					Field::make('complex', 'stats', __('Stats Cards List', 'drtalk-redesign'))
						->set_collapsed(true)
						->add_fields([
							Field::make('text', 'value', __('Value / Metric', 'drtalk-redesign'))
								->set_default_value('$500M+')
								->set_width(33)
								->set_required(true),
							Field::make('select', 'key', __('Grid Slot / Position', 'drtalk-redesign'))
								->set_options([
									'revenue' => 'Top Left (Wide - 50%)',
									'growth' => 'Top Right (Wide - 50%)',
									'practices' => 'Bottom Left (Regular - 33%)',
									'faster' => 'Bottom Center (Regular - 33%)',
									'workload' => 'Bottom Right (Regular - 33%)'
								])
								->set_default_value('revenue')
								->set_width(33)
								->set_required(true),
							Field::make('image', 'image', __('Illustration (SVG)', 'drtalk-redesign'))
								->set_value_type('id')
								->set_width(34),
							Field::make('textarea', 'copy', __('Description (HTML allowed)', 'drtalk-redesign'))
								->set_rows(2)
								->set_width(100)
								->set_required(true)
						])
				])
		]);
}
add_action('carbon_fields_register_fields', 'drtalk_redesign_register_front_page_fields');

/**
 * Returns all configured home blocks from Carbon Fields.
 *
 * @return array
 */
function drtalk_redesign_get_home_blocks()
{
	if (!function_exists('carbon_get_theme_option')) {
		return [];
	}

	$blocks = carbon_get_theme_option('home_blocks');
	return is_array($blocks) ? $blocks : [];
}

/**
 * Retrieves a specific block configuration by type.
 * Returns:
 * - array of block data if found and active
 * - false if found but explicitly disabled (is_active === false)
 * - null if not yet configured in Carbon Fields (fallback to defaults)
 *
 * @param string $type
 * @return array|false|null
 */
function drtalk_redesign_get_home_block($type)
{
	$blocks = drtalk_redesign_get_home_blocks();

	foreach ($blocks as $block) {
		if (isset($block['_type']) && $block['_type'] === $type) {
			if (isset($block['is_active']) && !$block['is_active']) {
				return false;
			}
			return $block;
		}
	}

	return null;
}

/**
 * Imports a theme asset into the WordPress Media Library if not already present.
 *
 * @param string $relative_path
 * @param string $title
 * @return int Attachment ID
 */
function drtalk_redesign_get_or_create_theme_attachment($relative_path, $title = '')
{
	$source_path = get_theme_file_path($relative_path);
	if (!file_exists($source_path)) {
		return 0;
	}

	$filename = basename($relative_path);
	if (empty($title)) {
		$title = preg_replace('/\.[^.]+$/', '', $filename);
	}

	// Check if already in media library
	$existing = get_posts([
		'post_type' => 'attachment',
		'title' => $title,
		'posts_per_page' => 1,
		'fields' => 'ids'
	]);
	if (!empty($existing)) {
		return (int) $existing[0];
	}

	require_once ABSPATH . 'wp-admin/includes/image.php';
	require_once ABSPATH . 'wp-admin/includes/file.php';
	require_once ABSPATH . 'wp-admin/includes/media.php';

	$upload_dir = wp_upload_dir();
	$dest_path = $upload_dir['path'] . '/' . wp_unique_filename($upload_dir['path'], $filename);
	copy($source_path, $dest_path);

	$filetype = wp_check_filetype($filename, null);
	$mime_type = $filetype['type'];
	if (empty($mime_type) && strtolower(pathinfo($filename, PATHINFO_EXTENSION)) === 'svg') {
		$mime_type = 'image/svg+xml';
	}

	$attachment = [
		'post_mime_type' => $mime_type,
		'post_title' => sanitize_text_field($title),
		'post_content' => '',
		'post_status' => 'inherit'
	];

	$attach_id = wp_insert_attachment($attachment, $dest_path);
	$attach_data = wp_generate_attachment_metadata($attach_id, $dest_path);
	wp_update_attachment_metadata($attach_id, $attach_data);

	return (int) $attach_id;
}

add_filter('upload_mimes', function ($mimes) {
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
});

/**
 * Seeds default home blocks if none are configured yet.
 *
 * @param bool $force
 */
function drtalk_redesign_seed_home_blocks($force = false)
{
	if (!function_exists('carbon_get_theme_option') || !function_exists('carbon_set_theme_option')) {
		return;
	}

	if (!$force && get_option('drtalk_home_blocks_seeded_v1')) {
		return;
	}

	$existing_blocks = carbon_get_theme_option('home_blocks');
	if (!$force && !empty($existing_blocks)) {
		update_option('drtalk_home_blocks_seeded_v1', 1);
		return;
	}

	$phone_image_id = drtalk_redesign_get_or_create_theme_attachment(
		'assets/images/hero-phone.png',
		'drtalk Hero Phone Mockup'
	);
	$logo_4_id = drtalk_redesign_get_or_create_theme_attachment(
		'assets/images/partner-logo-4.png',
		'Tarnow Chu Institute Logo'
	);
	$logo_1_id = drtalk_redesign_get_or_create_theme_attachment(
		'assets/images/partner-logo-1.png',
		'Dental Designs Logo'
	);
	$logo_3_id = drtalk_redesign_get_or_create_theme_attachment(
		'assets/images/partner-logo-3.png',
		'Dentistry Automation Logo'
	);
	$logo_5_id = drtalk_redesign_get_or_create_theme_attachment(
		'assets/images/partner-logo-5.png',
		'Collective Health Society Logo'
	);
	$logo_6_id = drtalk_redesign_get_or_create_theme_attachment(
		'assets/images/partner-logo-6.png',
		'HDL Partners Logo'
	);

	$prob_1_static = drtalk_redesign_get_or_create_theme_attachment(
		'assets/images/different-referral-friction-static.png',
		'Referral Friction Static Icon'
	);
	$prob_1_hover = drtalk_redesign_get_or_create_theme_attachment(
		'assets/images/different-referral-friction-hover.gif',
		'Referral Friction Hover Animation'
	);
	$prob_2_static = drtalk_redesign_get_or_create_theme_attachment(
		'assets/images/different-relationship-risk-static.png',
		'Relationship Risk Static Icon'
	);
	$prob_2_hover = drtalk_redesign_get_or_create_theme_attachment(
		'assets/images/different-relationship-risk-hover.gif',
		'Relationship Risk Hover Animation'
	);
	$prob_3_static = drtalk_redesign_get_or_create_theme_attachment(
		'assets/images/different-staff-dependency-static.png',
		'Staff Dependency Static Icon'
	);
	$prob_3_hover = drtalk_redesign_get_or_create_theme_attachment(
		'assets/images/different-staff-dependency-hover.gif',
		'Staff Dependency Hover Animation'
	);
	$prob_4_static = drtalk_redesign_get_or_create_theme_attachment(
		'assets/images/different-growth-risk-static.png',
		'Growth Risk Static Icon'
	);
	$prob_4_hover = drtalk_redesign_get_or_create_theme_attachment(
		'assets/images/different-growth-risk-hover.gif',
		'Growth Risk Hover Animation'
	);

	$hiw_1_id = drtalk_redesign_get_or_create_theme_attachment(
		'assets/images/how-it-works-01.png',
		'How It Works Step 1 Graphic'
	);
	$hiw_2_id = drtalk_redesign_get_or_create_theme_attachment(
		'assets/images/how-it-works-02.png',
		'How It Works Step 2 Graphic'
	);
	$hiw_3_id = drtalk_redesign_get_or_create_theme_attachment(
		'assets/images/how-it-works-03.png',
		'How It Works Step 3 Graphic'
	);

	$why_1_static = drtalk_redesign_get_or_create_theme_attachment(
		'assets/images/why-us-volume.svg',
		'Why Us Referral Volume Static'
	);
	$why_1_hover = drtalk_redesign_get_or_create_theme_attachment(
		'assets/images/why-us-volume-hover.gif',
		'Why Us Referral Volume Hover'
	);
	$why_2_static = drtalk_redesign_get_or_create_theme_attachment(
		'assets/images/why-us-specialist.svg',
		'Why Us Easiest Specialist Static'
	);
	$why_2_hover = drtalk_redesign_get_or_create_theme_attachment(
		'assets/images/why-us-specialist-hover.gif',
		'Why Us Easiest Specialist Hover'
	);
	$why_3_static = drtalk_redesign_get_or_create_theme_attachment(
		'assets/images/why-us-workload.svg',
		'Why Us Reduce Workload Static'
	);
	$why_3_hover = drtalk_redesign_get_or_create_theme_attachment(
		'assets/images/why-us-workload-hover.gif',
		'Why Us Reduce Workload Hover'
	);
	$why_4_static = drtalk_redesign_get_or_create_theme_attachment(
		'assets/images/why-us-anywhere.svg',
		'Why Us Manage Anywhere Static'
	);
	$why_4_hover = drtalk_redesign_get_or_create_theme_attachment(
		'assets/images/why-us-anywhere-hover.gif',
		'Why Us Manage Anywhere Hover'
	);

	$num_1_id = drtalk_redesign_get_or_create_theme_attachment(
		'assets/images/numbers-1.svg',
		'Scale Numbers 1 Illustration'
	);
	$num_2_id = drtalk_redesign_get_or_create_theme_attachment(
		'assets/images/numbers-2.svg',
		'Scale Numbers 2 Illustration'
	);
	$num_3_id = drtalk_redesign_get_or_create_theme_attachment(
		'assets/images/numbers-3.svg',
		'Scale Numbers 3 Illustration'
	);
	$num_4_id = drtalk_redesign_get_or_create_theme_attachment(
		'assets/images/numbers-4.svg',
		'Scale Numbers 4 Illustration'
	);
	$num_5_id = drtalk_redesign_get_or_create_theme_attachment(
		'assets/images/numbers-5.svg',
		'Scale Numbers 5 Illustration'
	);

	$default_blocks = [
		[
			'_type' => 'hero',
			'is_active' => true,
			'eyebrow' => 'Built by Dentists for Dentists',
			'title' => 'Stop Losing Referrals You Never Knew You Missed',
			'description' =>
				'Invisible referral leaks cost your practice revenue. Plug the gaps with drtalk. Put AI to work for your office to seamlessly capture, track, and close every referral.',
			'button_text' => 'Claim Your Free Referral Gap Analysis',
			'button_url' => '',
			'subtext_line_1' => '30 minutes. We do the work.',
			'subtext_line_2' => 'You keep the report. No pitch, no obligation.',
			'phone_image' => $phone_image_id ?: '',
			'show_decorations' => true
		],
		[
			'_type' => 'partners',
			'is_active' => true,
			'title' => 'Trusted By Dentistry’s Top Leaders',
			'partners_list' => [
				[
					'label' => 'Tarnow Chu Institute',
					'logo' => $logo_4_id ?: '',
					'width' => '207',
					'url' => ''
				],
				[
					'label' => 'Dental Designs',
					'logo' => $logo_1_id ?: '',
					'width' => '106.5',
					'url' => ''
				],
				[
					'label' => 'Dentistry Automation',
					'logo' => $logo_3_id ?: '',
					'width' => '147',
					'url' => ''
				],
				[
					'label' => 'Collective Health Society',
					'logo' => $logo_5_id ?: '',
					'width' => '181.5',
					'url' => ''
				],
				[
					'label' => 'HDL Partners',
					'logo' => $logo_6_id ?: '',
					'width' => '166',
					'url' => ''
				]
			]
		],
		[
			'_type' => 'problem_cards',
			'is_active' => true,
			'eyebrow' => 'Put Operational AI to Work',
			'title' => "You didn't build a specialty practice to manage inboxes",
			'description' =>
				"When referring dentists feel like it's hard to work with you, they don't complain. They just stop referring.",
			'cards' => [
				[
					'title' => 'Referral Friction',
					'quote' =>
						'“Our current system is primitive - half our referrals come through channels we can barely track.”',
					'description' =>
						'Faxes. Calls. Emails. Web Forms. Referrals slip through every gap. Stop relying on a workflow that can’t catch them all.',
					'static_icon' => $prob_1_static ?: '',
					'hover_icon' => $prob_1_hover ?: ''
				],
				[
					'title' => 'Relationship Risk',
					'quote' =>
						'“We got told that we were hard to work with. By a dentist who we thought was our friend.”',
					'description' =>
						'GPs won’t call to complain about a slow response; they’ll just route the next case to your competitor.',
					'static_icon' => $prob_2_static ?: '',
					'hover_icon' => $prob_2_hover ?: ''
				],
				[
					'title' => 'Staff Dependency',
					'quote' => '“When she left, no one knew the status of any referral. We lost track of everything.”',
					'description' =>
						'Your growth shouldn’t live with one person. Build a system that moves referrals forward, no matter who is at the front desk.',
					'static_icon' => $prob_3_static ?: '',
					'hover_icon' => $prob_3_hover ?: ''
				],
				[
					'title' => 'Growth Risk',
					'quote' => '“We thought we had a system. We just hadn’t grown into the point where it failed yet.”',
					'description' =>
						'A manual workflow breaks at scale. The system that got you here won’t get you where you’re going.',
					'static_icon' => $prob_4_static ?: '',
					'hover_icon' => $prob_4_hover ?: ''
				]
			]
		],
		[
			'_type' => 'calculator',
			'is_active' => true,
			'title' => "If you can't measure your referral leakage, you can't fix it.",
			'form_title' => 'How much revenue is slipping through your fingers?',
			'referrals_default' => '80',
			'referrals_min' => '10',
			'referrals_max' => '300',
			'case_value_default' => '3000',
			'case_value_min' => '100',
			'case_value_max' => '10000',
			'case_value_step' => '100',
			'conversion_default' => '42',
			'conversion_min' => '0',
			'conversion_max' => '100',
			'note_text' => 'Get the full report after the demo call with drtalk team.',
			'button_text' => 'Claim Your Free Referral Gap Analysis',
			'button_url' => ''
		],
		[
			'_type' => 'how_it_works',
			'is_active' => true,
			'title' => 'From chaos to clarity.<br>No disruption. No overhaul.',
			'description' =>
				'drtalk plugs into the referral channels you’re already using. Your referring GPs keep doing what they’re doing. You just capture everything.',
			'steps' => [
				[
					'number' => '01',
					'title' => 'Connect your existing workflow',
					'description' =>
						'We pull in every channel you’re already using. One place. No missed leads. And your referring doctors don’t have to change a single habit.',
					'image' => $hiw_1_id ?: ''
				],
				[
					'number' => '02',
					'title' => 'Every referral lands in one place',
					'description' =>
						'Our AI sorts, prioritizes, and tracks in real time. So your team always knows what needs attention and who owns it.',
					'image' => $hiw_2_id ?: ''
				],
				[
					'number' => '03',
					'title' => 'Collaborate and follow through',
					'description' =>
						'Chat securely, share images, and update case status in one place. No more "Did you get my fax?" Just faster care and a more professional practice.',
					'image' => $hiw_3_id ?: ''
				]
			]
		],
		[
			'_type' => 'responsiveness',
			'is_active' => true,
			'title' => 'Most compete on reputation.<br>The best compete on responsiveness.',
			'description' =>
				'drtalk is the only mobile-first platform built by practicing dentists that brings referrals, communication, and visibility into one place.<br class="hidden lg:block"> So nothing gets missed, delayed, or lost again.',
			'cards' => [
				[
					'title' => 'Handle referral volume with confidence',
					'description' =>
						'Our Smart Referral Inbox captures every inbound referral regardless of how it arrives and tracks it through to scheduling with clear visibility. No referral falls through because it came in via the wrong channel.',
					'static_icon' => $why_1_static ?: '',
					'hover_icon' => $why_1_hover ?: ''
				],
				[
					'title' => 'Become the easiest specialist to work with',
					'description' =>
						'Communicate instantly with referring dentists through HIPAA-compliant messaging. No scattered emails. No phone tag. Just fast responses that make GPs want to send their next case to you.',
					'static_icon' => $why_2_static ?: '',
					'hover_icon' => $why_2_hover ?: ''
				],
				[
					'title' => 'Reduce your team’s workload',
					'description' =>
						'Eliminate repetitive admin tasks, close follow-up gaps, and free your staff to focus on patients instead of paperwork. Less back-and-forth means shorter handling time per referral and fewer things slipping through the cracks.',
					'static_icon' => $why_3_static ?: '',
					'hover_icon' => $why_3_hover ?: ''
				],
				[
					'title' => 'Manage referrals from anywhere',
					'description' =>
						'A web-based platform for your front desk. A native mobile app for dentists and specialists. Your whole team stays in control and securely connected, no matter where the work happens.',
					'static_icon' => $why_4_static ?: '',
					'hover_icon' => $why_4_hover ?: ''
				]
			]
		]
	];

	carbon_set_theme_option('home_blocks', $default_blocks);
	update_option('drtalk_home_blocks_seeded_v1', 1);
}
add_action('admin_init', 'drtalk_redesign_seed_home_blocks');
