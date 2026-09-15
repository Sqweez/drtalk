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
	if (class_exists(Carbon_Fields::class)) {
		Carbon_Fields::boot();
		return;
	}

	$autoload = get_theme_file_path('vendor/autoload.php');
	if (file_exists($autoload)) {
		require_once $autoload;
	}

	if (class_exists(Carbon_Fields::class)) {
		Carbon_Fields::boot();
		return;
	}

	error_log(
		'drtalk-redesign: Carbon Fields is unavailable. Run "composer install --no-dev --optimize-autoloader" in the theme directory.'
	);
	add_action('admin_notices', 'drtalk_redesign_carbon_fields_missing_notice');
}
add_action('after_setup_theme', 'drtalk_redesign_boot_carbon_fields');

/**
 * Displays an actionable dependency error to site administrators.
 */
function drtalk_redesign_carbon_fields_missing_notice()
{
	if (!current_user_can('manage_options')) {
		return;
	}
	$message = __(
		'drtalk-redesign cannot load Carbon Fields. Run composer install --no-dev --optimize-autoloader in the theme directory.',
		'drtalk-redesign'
	);
	?>
	<div class="notice notice-error"><p><?php echo esc_html($message); ?></p></div>
	<?php
}

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
					Field::make('complex', 'stats_list', __('Stats Cards List', 'drtalk-redesign'))
						->set_collapsed(true)
						->add_fields([
							Field::make('text', 'stat_value', __('Value / Metric', 'drtalk-redesign'))
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
				->add_fields('personas', __('Personas / Audience Relief', 'drtalk-redesign'), [
					Field::make('checkbox', 'is_active', __('Enable Section', 'drtalk-redesign'))->set_default_value(
						true
					),
					Field::make('textarea', 'title', __('Section Title (H2)', 'drtalk-redesign'))
						->set_default_value('The same platform, different relief for everyone it touches.')
						->set_rows(2)
						->set_width(100),
					Field::make('text', 'button_text', __('Button Text', 'drtalk-redesign'))
						->set_default_value('Book a Demo Today')
						->set_width(33),
					Field::make(
						'text',
						'button_url',
						__('Button URL (leave empty for default Gap Analysis link)', 'drtalk-redesign')
					)->set_width(33),
					Field::make('text', 'button_subtext', __('Button Subtext', 'drtalk-redesign'))
						->set_default_value('30 minutes. No pitch, no obligation.')
						->set_width(34),
					Field::make('complex', 'personas_list', __('Personas List', 'drtalk-redesign'))
						->set_collapsed(true)
						->add_fields([
							Field::make('text', 'label', __('Tab Label', 'drtalk-redesign'))
								->set_default_value('Dental Specialists')
								->set_width(25)
								->set_required(true),
							Field::make('text', 'title', __('Persona Title (H3)', 'drtalk-redesign'))
								->set_default_value('Be the First Choice for Referrals')
								->set_width(35)
								->set_required(true),
							Field::make('select', 'tone', __('Color Tone', 'drtalk-redesign'))
								->set_options([
									'lilac' => 'Lilac / Dark Pattern',
									'orange' => 'Orange Pattern'
								])
								->set_default_value('lilac')
								->set_width(20),
							Field::make('image', 'image', __('Preview Image (PNG)', 'drtalk-redesign'))
								->set_value_type('id')
								->set_width(20),
							Field::make('textarea', 'description', __('Description', 'drtalk-redesign'))
								->set_rows(3)
								->set_width(100)
								->set_required(true)
						])
				])
				->add_fields('testimonials', __('Testimonials', 'drtalk-redesign'), [
					Field::make('checkbox', 'is_active', __('Enable Section', 'drtalk-redesign'))->set_default_value(
						true
					),
					Field::make('textarea', 'title', __('Section Title (H2)', 'drtalk-redesign'))
						->set_default_value('For the people who use it every day.')
						->set_rows(2)
						->set_width(100),
					Field::make('complex', 'testimonials_list', __('Testimonials List', 'drtalk-redesign'))
						->set_collapsed(true)
						->add_fields([
							Field::make('text', 'name', __('Author Name', 'drtalk-redesign'))
								->set_width(25)
								->set_required(true),
							Field::make('text', 'role', __('Job Role / Title', 'drtalk-redesign'))->set_width(25),
							Field::make('text', 'company', __('Practice / Company', 'drtalk-redesign'))->set_width(25),
							Field::make('text', 'eyebrow', __('Eyebrow / Payoff', 'drtalk-redesign'))
								->set_help_text(
									__('e.g. Save Time, Schedule Faster, Improve Workflows', 'drtalk-redesign')
								)
								->set_width(25),
							Field::make('textarea', 'quote', __('Quote / Content', 'drtalk-redesign'))
								->set_rows(3)
								->set_width(100)
								->set_required(true),
							Field::make('image', 'avatar', __('Author Photo', 'drtalk-redesign'))
								->set_value_type('id')
								->set_width(50),
							Field::make('image', 'logo', __('Company Logo', 'drtalk-redesign'))
								->set_value_type('id')
								->set_width(50)
						])
				])
				->add_fields('founder', __('Founder / Our Story', 'drtalk-redesign'), [
					Field::make('checkbox', 'is_active', __('Enable Section', 'drtalk-redesign'))->set_default_value(
						true
					),
					Field::make('textarea', 'title', __('Section Title (H2)', 'drtalk-redesign'))
						->set_default_value(
							'Built by specialists who lived the problem. Not developers who read about it.'
						)
						->set_rows(2)
						->set_width(100),
					Field::make('separator', 'sep_founder_profile', __('Founder Profile', 'drtalk-redesign')),
					Field::make('image', 'founder_image', __('Founder Photo', 'drtalk-redesign'))
						->set_value_type('id')
						->set_width(30),
					Field::make(
						'textarea',
						'founder_name',
						__('Founder Name & Titles (HTML allowed)', 'drtalk-redesign')
					)
						->set_default_value('Thomas L. Stone,<br>MD, DDS, FACS')
						->set_rows(2)
						->set_width(35),
					Field::make(
						'textarea',
						'founder_role',
						__('Founder Bio / Subtitle (HTML allowed)', 'drtalk-redesign')
					)
						->set_default_value('Oral & Maxillofacial Surgeon;<br>Founder of drtalk (est. 2014)')
						->set_rows(2)
						->set_width(35),
					Field::make('separator', 'sep_founder_story', __('Story & Call to Action', 'drtalk-redesign')),
					Field::make(
						'textarea',
						'story',
						__('Story Paragraphs (HTML / Paragraphs allowed)', 'drtalk-redesign')
					)
						->set_default_value(
							"<p>Over more than 25 years in oral surgery, Dr. Stone watched referral workflows break under growth, GP relationships quietly cool when communication lagged, and talented staff spend hours on admin that a better system would have handled automatically.</p>\n<p>He created drtalk because no existing tool was built for the way specialist practices actually work. Not as an outsider guessing at the problem, but as someone who lived it for decades.</p>"
						)
						->set_rows(6)
						->set_width(100),
					Field::make('text', 'link_text', __('Link Text', 'drtalk-redesign'))
						->set_default_value('Read Our Story')
						->set_width(50),
					Field::make(
						'text',
						'link_url',
						__('Link URL (leave empty for default About Us page)', 'drtalk-redesign')
					)->set_width(50)
				])
				->add_fields('concerns', __('Common Concerns / FAQ Carousel', 'drtalk-redesign'), [
					Field::make('checkbox', 'is_active', __('Enable Section', 'drtalk-redesign'))->set_default_value(
						true
					),
					Field::make('text', 'title', __('Section Title (H2)', 'drtalk-redesign'))
						->set_default_value('Common concerns. Honest answers.')
						->set_width(100),
					Field::make('complex', 'concerns_list', __('Concerns List', 'drtalk-redesign'))
						->set_collapsed(true)
						->add_fields([
							Field::make('text', 'title', __('Concern / Question', 'drtalk-redesign'))
								->set_width(40)
								->set_required(true),
							Field::make('textarea', 'answer', __('Answer / Explanation', 'drtalk-redesign'))
								->set_rows(3)
								->set_width(60)
								->set_required(true)
						])
				])
				->add_fields('fomo', __('FOMO / Referral Leakage Tracker', 'drtalk-redesign'), [
					Field::make('checkbox', 'is_active', __('Enable Section', 'drtalk-redesign'))->set_default_value(
						true
					),
					Field::make('textarea', 'title', __('Section Title (H2, HTML allowed)', 'drtalk-redesign'))
						->set_default_value('What you lose without<br>a smart referral process.')
						->set_rows(2)
						->set_width(50),
					Field::make('textarea', 'description', __('Description (HTML allowed)', 'drtalk-redesign'))
						->set_default_value(
							"The average specialist practice loses $4,640 every hour to missed and unconverted referrals.<br>Here's what's slipped by since you landed on this page:"
						)
						->set_rows(2)
						->set_width(50),
					Field::make('separator', 'sep_fomo_settings', __('Live Counter Settings', 'drtalk-redesign')),
					Field::make('text', 'baseline', __('Baseline Amount ($)', 'drtalk-redesign'))
						->set_default_value('0')
						->set_attribute('type', 'number')
						->set_width(33),
					Field::make('text', 'hourly_rate', __('Hourly Loss Rate ($)', 'drtalk-redesign'))
						->set_default_value('4640')
						->set_attribute('type', 'number')
						->set_width(33),
					Field::make('textarea', 'disclaimer', __('Disclaimer Note (HTML allowed)', 'drtalk-redesign'))
						->set_default_value(
							'Based on 80 referrals/mo, 58% leakage, $3,000 avg case value —<br>industry averages for specialty dental practices.'
						)
						->set_rows(2)
						->set_width(34)
				])
				->add_fields('cta', __('Call to Action / Process Steps', 'drtalk-redesign'), [
					Field::make('checkbox', 'is_active', __('Enable Section', 'drtalk-redesign'))->set_default_value(
						true
					),
					Field::make('text', 'title', __('Heading', 'drtalk-redesign'))
						->set_default_value('Your referral workflow has gaps.')
						->set_width(50),
					Field::make('text', 'subtitle', __('Subheading', 'drtalk-redesign'))
						->set_default_value('Give us 30 minutes and we’ll find them.')
						->set_width(50),
					Field::make('complex', 'cta_steps', __('Process Steps', 'drtalk-redesign'))
						->set_layout('tabbed-horizontal')
						->add_fields([
							Field::make('image', 'icon', __('Step Icon (PNG)', 'drtalk-redesign'))
								->set_value_type('id')
								->set_width(30),
							Field::make('text', 'step_title', __('Step Title', 'drtalk-redesign'))->set_width(35),
							Field::make('textarea', 'step_copy', __('Step Description', 'drtalk-redesign'))
								->set_rows(2)
								->set_width(35)
						]),
					Field::make('separator', 'sep_cta_action', __('Action Button & Details', 'drtalk-redesign')),
					Field::make('text', 'button_text', __('Button Text', 'drtalk-redesign'))
						->set_default_value('Claim Your Free Referral Gap Analysis')
						->set_width(50),
					Field::make('text', 'button_url', __('Button URL', 'drtalk-redesign'))
						->set_help_text(__('Leave empty to use default Referral Gap Analysis URL', 'drtalk-redesign'))
						->set_width(50),
					Field::make('textarea', 'subtext', __('Button Subtext (HTML allowed)', 'drtalk-redesign'))
						->set_default_value('30 minutes. No obligation<br>Best with practice owner + office manager.')
						->set_rows(2)
						->set_width(50),
					Field::make('image', 'noise_pattern', __('Background Pattern', 'drtalk-redesign'))
						->set_value_type('id')
						->set_help_text(__('Optional background noise overlay image', 'drtalk-redesign'))
						->set_width(50)
				])
				->add_fields('faq', __('Frequently Asked Questions', 'drtalk-redesign'), [
					Field::make('checkbox', 'is_active', __('Enable Section', 'drtalk-redesign'))->set_default_value(
						true
					),
					Field::make('text', 'title', __('Section Title (H2)', 'drtalk-redesign'))
						->set_default_value('Frequently Asked Questions')
						->set_width(70),
					Field::make('image', 'plus_icon', __('Plus Icon (SVG)', 'drtalk-redesign'))
						->set_value_type('id')
						->set_help_text(__('Optional custom plus/expand icon', 'drtalk-redesign'))
						->set_width(30),
					Field::make('complex', 'faq_categories', __('FAQ Categories', 'drtalk-redesign'))
						->set_layout('tabbed-horizontal')
						->add_fields([
							Field::make('text', 'category_name', __('Category Name', 'drtalk-redesign'))
								->set_width(100)
								->set_required(true),
							Field::make('complex', 'faq_questions', __('Questions', 'drtalk-redesign'))
								->set_collapsed(true)
								->add_fields([
									Field::make('text', 'question', __('Question', 'drtalk-redesign'))
										->set_width(100)
										->set_required(true),
									Field::make('textarea', 'answer', __('Answer (HTML allowed)', 'drtalk-redesign'))
										->set_rows(4)
										->set_width(100)
										->set_required(true)
								])
						])
				])
		]);
}
add_action('carbon_fields_register_fields', 'drtalk_redesign_register_front_page_fields');

/**
 * Registers custom fields for the Header.
 */
function drtalk_redesign_register_header_fields()
{
	Container::make('theme_options', __('Header Settings', 'drtalk-redesign'))
		->set_page_file('drtalk-header')
		->set_page_menu_title(__('Header', 'drtalk-redesign'))
		->set_icon('dashicons-table-row-before')
		->set_page_menu_position(21)
		->add_tab(__('Logo', 'drtalk-redesign'), [
			Field::make('image', 'header_logo', __('Logo Image', 'drtalk-redesign'))
				->set_value_type('id')
				->set_help_text(
					__('Upload custom logo SVG or PNG. Leave empty to use the default drtalk logo.', 'drtalk-redesign')
				),
			Field::make('text', 'header_logo_url', __('Logo Destination URL', 'drtalk-redesign'))->set_help_text(
				__('Leave empty to link to the site homepage.', 'drtalk-redesign')
			),
			Field::make('text', 'header_logo_alt', __('Logo Alt Text', 'drtalk-redesign'))->set_default_value('DrTalk')
		])
		->add_tab(__('Navigation Links', 'drtalk-redesign'), [
			Field::make('complex', 'header_nav_links', __('Navigation Items', 'drtalk-redesign'))
				->set_layout('tabbed-horizontal')
				->add_fields([
					Field::make('text', 'text', __('Link Text', 'drtalk-redesign'))->set_required(true)->set_width(40),
					Field::make('text', 'url', __('Link URL', 'drtalk-redesign'))->set_required(true)->set_width(40),
					Field::make('checkbox', 'target_blank', __('Open in new tab', 'drtalk-redesign'))->set_width(20)
				])
				->set_help_text(
					__(
						'Add menu links for desktop and mobile. If empty, defaults (About, News) will be used.',
						'drtalk-redesign'
					)
				)
		])
		->add_tab(__('Action Buttons', 'drtalk-redesign'), [
			Field::make('separator', 'sep_header_primary_btn', __('Primary Button (Right CTA)', 'drtalk-redesign')),
			Field::make('checkbox', 'header_primary_btn_enable', __('Enable Primary Button', 'drtalk-redesign'))
				->set_default_value(true)
				->set_width(100),
			Field::make('text', 'header_primary_btn_text', __('Button Text', 'drtalk-redesign'))
				->set_default_value('Get a Free Referral Analysis')
				->set_width(50),
			Field::make('text', 'header_primary_btn_url', __('Button URL', 'drtalk-redesign'))
				->set_help_text(__('Leave empty to use default Referral Gap Analysis URL.', 'drtalk-redesign'))
				->set_width(50),
			Field::make(
				'checkbox',
				'header_primary_btn_target_blank',
				__('Open in new tab', 'drtalk-redesign')
			)->set_default_value(true),

			Field::make('separator', 'sep_header_secondary_btn', __('Secondary Button (Log In)', 'drtalk-redesign')),
			Field::make('checkbox', 'header_secondary_btn_enable', __('Enable Secondary Button', 'drtalk-redesign'))
				->set_default_value(true)
				->set_width(100),
			Field::make('text', 'header_secondary_btn_text', __('Button Text', 'drtalk-redesign'))
				->set_default_value('Log In')
				->set_width(50),
			Field::make('text', 'header_secondary_btn_url', __('Button URL', 'drtalk-redesign'))
				->set_help_text(__('Leave empty to use default Login URL.', 'drtalk-redesign'))
				->set_width(50),
			Field::make(
				'checkbox',
				'header_secondary_btn_target_blank',
				__('Open in new tab', 'drtalk-redesign')
			)->set_default_value(true)
		]);
}
add_action('carbon_fields_register_fields', 'drtalk_redesign_register_header_fields');

/**
 * Retrieves the header configuration settings.
 *
 * @return array
 */
function drtalk_redesign_get_header_settings()
{
	$default_logo_url = get_theme_file_uri('assets/images/drtalk-logo.svg');
	$default_referral_url = function_exists('drtalk_redesign_referral_gap_analysis_url')
		? drtalk_redesign_referral_gap_analysis_url()
		: '#';
	$default_login_url = function_exists('drtalk_redesign_login_url') ? drtalk_redesign_login_url() : '#';
	$default_nav_links = [
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
	];

	if (!function_exists('carbon_get_theme_option')) {
		return [
			'logo_url' => $default_logo_url,
			'logo_link' => home_url('/'),
			'logo_alt' => get_bloginfo('name') ?: 'DrTalk',
			'nav_links' => $default_nav_links,
			'primary_btn' => [
				'enable' => true,
				'text' => 'Get a Free Referral Analysis',
				'url' => $default_referral_url,
				'target_blank' => true
			],
			'secondary_btn' => [
				'enable' => true,
				'text' => 'Log In',
				'url' => $default_login_url,
				'target_blank' => true
			]
		];
	}

	$logo_id = carbon_get_theme_option('header_logo');
	$logo_url = $logo_id ? wp_get_attachment_url($logo_id) : '';
	if (empty($logo_url)) {
		$logo_url = $default_logo_url;
	}

	$logo_link = carbon_get_theme_option('header_logo_url');
	if (empty($logo_link)) {
		$logo_link = home_url('/');
	}

	$logo_alt = carbon_get_theme_option('header_logo_alt');
	if (empty($logo_alt)) {
		$logo_alt = get_bloginfo('name') ?: 'DrTalk';
	}

	$raw_nav = carbon_get_theme_option('header_nav_links');
	$nav_links = [];
	if (!empty($raw_nav) && is_array($raw_nav)) {
		foreach ($raw_nav as $item) {
			if (!empty($item['text']) && !empty($item['url'])) {
				$nav_links[] = [
					'text' => $item['text'],
					'url' => $item['url'],
					'target_blank' => !empty($item['target_blank'])
				];
			}
		}
	}

	if (empty($nav_links)) {
		if (has_nav_menu('primary')) {
			$locations = get_nav_menu_locations();
			$menu_id = $locations['primary'] ?? 0;
			$menu_items = $menu_id ? wp_get_nav_menu_items($menu_id) : [];
			if (!empty($menu_items) && is_array($menu_items)) {
				foreach ($menu_items as $menu_item) {
					$nav_links[] = [
						'text' => $menu_item->title,
						'url' => $menu_item->url,
						'target_blank' => $menu_item->target === '_blank'
					];
				}
			}
		}
	}

	if (empty($nav_links)) {
		$nav_links = $default_nav_links;
	}

	$primary_enable = carbon_get_theme_option('header_primary_btn_enable');
	if ($primary_enable === null || $primary_enable === '') {
		$primary_enable = true;
	}
	$primary_text = carbon_get_theme_option('header_primary_btn_text');
	if ($primary_text === null || $primary_text === '') {
		$primary_text = 'Get a Free Referral Analysis';
	}
	$primary_url = carbon_get_theme_option('header_primary_btn_url');
	if (empty($primary_url)) {
		$primary_url = $default_referral_url;
	}
	$primary_target = carbon_get_theme_option('header_primary_btn_target_blank');
	if ($primary_target === null || $primary_target === '') {
		$primary_target = true;
	}

	$secondary_enable = carbon_get_theme_option('header_secondary_btn_enable');
	if ($secondary_enable === null || $secondary_enable === '') {
		$secondary_enable = true;
	}
	$secondary_text = carbon_get_theme_option('header_secondary_btn_text');
	if ($secondary_text === null || $secondary_text === '') {
		$secondary_text = 'Log In';
	}
	$secondary_url = carbon_get_theme_option('header_secondary_btn_url');
	if (empty($secondary_url)) {
		$secondary_url = $default_login_url;
	}
	$secondary_target = carbon_get_theme_option('header_secondary_btn_target_blank');
	if ($secondary_target === null || $secondary_target === '') {
		$secondary_target = true;
	}

	return [
		'logo_url' => $logo_url,
		'logo_link' => $logo_link,
		'logo_alt' => $logo_alt,
		'nav_links' => $nav_links,
		'primary_btn' => [
			'enable' => (bool) $primary_enable,
			'text' => $primary_text,
			'url' => $primary_url,
			'target_blank' => (bool) $primary_target
		],
		'secondary_btn' => [
			'enable' => (bool) $secondary_enable,
			'text' => $secondary_text,
			'url' => $secondary_url,
			'target_blank' => (bool) $secondary_target
		]
	];
}

/**
 * Seeds default header navigation links into Carbon Fields if not configured yet.
 */
function drtalk_redesign_seed_header_settings()
{
	if (!function_exists('carbon_get_theme_option') || !function_exists('carbon_set_theme_option')) {
		return;
	}

	if (get_option('drtalk_header_seeded_v1')) {
		return;
	}

	$existing_nav = carbon_get_theme_option('header_nav_links');
	if (empty($existing_nav)) {
		carbon_set_theme_option('header_nav_links', [
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
		]);
	}

	update_option('drtalk_header_seeded_v1', 1);
}
add_action('admin_init', 'drtalk_redesign_seed_header_settings');

/**
 * Registers custom fields for the Footer.
 */
function drtalk_redesign_register_footer_fields()
{
	Container::make('theme_options', __('Footer Settings', 'drtalk-redesign'))
		->set_page_file('drtalk-footer')
		->set_page_menu_title(__('Footer', 'drtalk-redesign'))
		->set_icon('dashicons-table-row-after')
		->set_page_menu_position(22)
		->add_tab(__('Logo', 'drtalk-redesign'), [
			Field::make('image', 'footer_logo', __('Logo Image', 'drtalk-redesign'))
				->set_value_type('id')
				->set_help_text(
					__('Upload custom logo SVG or PNG. Leave empty to use the default footer logo.', 'drtalk-redesign')
				),
			Field::make('text', 'footer_logo_url', __('Logo Destination URL', 'drtalk-redesign'))->set_help_text(
				__('Leave empty to link to the site homepage.', 'drtalk-redesign')
			),
			Field::make('text', 'footer_logo_alt', __('Logo Alt Text', 'drtalk-redesign'))->set_default_value('DrTalk')
		])
		->add_tab(__('Navigation Columns', 'drtalk-redesign'), [
			Field::make('complex', 'footer_columns', __('Navigation Columns', 'drtalk-redesign'))
				->set_layout('tabbed-horizontal')
				->add_fields([
					Field::make('text', 'column_title', __('Column Title', 'drtalk-redesign'))
						->set_required(true)
						->set_width(100),
					Field::make('complex', 'links', __('Links', 'drtalk-redesign'))
						->set_collapsed(true)
						->add_fields([
							Field::make('text', 'text', __('Link Text', 'drtalk-redesign'))
								->set_required(true)
								->set_width(40),
							Field::make('text', 'url', __('Link URL', 'drtalk-redesign'))
								->set_required(true)
								->set_width(40),
							Field::make(
								'checkbox',
								'target_blank',
								__('Open in new tab', 'drtalk-redesign')
							)->set_width(20)
						])
				])
				->set_help_text(
					__(
						'Configure footer navigation columns (e.g., Website, Company). If empty, defaults will be used.',
						'drtalk-redesign'
					)
				)
		])
		->add_tab(__('Social Links', 'drtalk-redesign'), [
			Field::make('complex', 'footer_social_links', __('Social Links', 'drtalk-redesign'))
				->set_layout('tabbed-horizontal')
				->add_fields([
					Field::make('text', 'title', __('Platform Name / Alt Text', 'drtalk-redesign'))
						->set_required(true)
						->set_width(35),
					Field::make('text', 'url', __('Profile URL', 'drtalk-redesign'))->set_required(true)->set_width(35),
					Field::make('select', 'preset_icon', __('Preset Icon', 'drtalk-redesign'))
						->set_options([
							'linkedin' => 'LinkedIn',
							'facebook' => 'Facebook',
							'instagram' => 'Instagram',
							'custom' => __('Custom Icon (upload below)', 'drtalk-redesign')
						])
						->set_default_value('linkedin')
						->set_width(30),
					Field::make('image', 'custom_icon', __('Custom Icon (SVG/PNG)', 'drtalk-redesign'))
						->set_value_type('id')
						->set_help_text(
							__(
								'Used if Preset Icon is set to "Custom Icon", or to override the preset icon.',
								'drtalk-redesign'
							)
						)
				])
				->set_help_text(
					__(
						'Social links shown at the bottom right. If empty, defaults (LinkedIn, Facebook, Instagram) will be used.',
						'drtalk-redesign'
					)
				)
		])
		->add_tab(__('Bottom Bar', 'drtalk-redesign'), [
			Field::make('text', 'footer_copyright', __('Copyright Text', 'drtalk-redesign'))
				->set_default_value('© {year} drtalk. All rights reserved.')
				->set_help_text(__('Use {year} to dynamically insert the current year.', 'drtalk-redesign')),
			Field::make('image', 'footer_pattern', __('Background Pattern', 'drtalk-redesign'))
				->set_value_type('id')
				->set_help_text(
					__('Upload custom noise/pattern image. Leave empty to use the default pattern.', 'drtalk-redesign')
				)
		]);
}
add_action('carbon_fields_register_fields', 'drtalk_redesign_register_footer_fields');

/**
 * Retrieves the footer configuration settings.
 *
 * @return array
 */
function drtalk_redesign_get_footer_settings()
{
	$default_logo_url = get_theme_file_uri('assets/images/footer-logo.svg');
	$default_noise_url = get_theme_file_uri('assets/images/footer-pattern.png');
	$default_referral_url = function_exists('drtalk_redesign_referral_gap_analysis_url')
		? drtalk_redesign_referral_gap_analysis_url()
		: '#';
	$default_login_url = function_exists('drtalk_redesign_login_url') ? drtalk_redesign_login_url() : '#';
	$default_contact_url = function_exists('drtalk_redesign_contact_url') ? drtalk_redesign_contact_url() : '#';

	$default_columns = [
		[
			'title' => 'Website',
			'links' => [
				[
					'text' => 'Book a Demo',
					'url' => $default_referral_url,
					'target_blank' => true
				],
				[
					'text' => 'Log In',
					'url' => $default_login_url,
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
					'url' => $default_contact_url,
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
	];

	$default_social_links = [
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
	];

	$default_copyright_format = '© {year} drtalk. All rights reserved.';

	if (!function_exists('carbon_get_theme_option')) {
		return [
			'logo_url' => $default_logo_url,
			'logo_link' => home_url('/'),
			'logo_alt' => get_bloginfo('name') ?: 'DrTalk',
			'noise_url' => $default_noise_url,
			'columns' => $default_columns,
			'social_links' => $default_social_links,
			'copyright' => str_replace('{year}', gmdate('Y'), $default_copyright_format)
		];
	}

	$logo_id = carbon_get_theme_option('footer_logo');
	$logo_url = $logo_id ? wp_get_attachment_url($logo_id) : '';
	if (empty($logo_url)) {
		$logo_url = $default_logo_url;
	}

	$logo_link = carbon_get_theme_option('footer_logo_url');
	if (empty($logo_link)) {
		$logo_link = home_url('/');
	}

	$logo_alt = carbon_get_theme_option('footer_logo_alt');
	if (empty($logo_alt)) {
		$logo_alt = get_bloginfo('name') ?: 'DrTalk';
	}

	$pattern_id = carbon_get_theme_option('footer_pattern');
	$noise_url = $pattern_id ? wp_get_attachment_url($pattern_id) : '';
	if (empty($noise_url)) {
		$noise_url = $default_noise_url;
	}

	$raw_columns = carbon_get_theme_option('footer_columns');
	$columns = [];
	if (!empty($raw_columns) && is_array($raw_columns)) {
		foreach ($raw_columns as $raw_col) {
			$title = !empty($raw_col['column_title']) ? trim($raw_col['column_title']) : '';
			$links = [];
			if (!empty($raw_col['links']) && is_array($raw_col['links'])) {
				foreach ($raw_col['links'] as $item) {
					if (!empty($item['text']) && !empty($item['url'])) {
						$links[] = [
							'text' => $item['text'],
							'url' => $item['url'],
							'target_blank' => !empty($item['target_blank'])
						];
					}
				}
			}
			if ($title !== '' || !empty($links)) {
				$columns[] = [
					'title' => $title,
					'links' => $links
				];
			}
		}
	}

	if (empty($columns)) {
		$columns = $default_columns;
	}

	$raw_social = carbon_get_theme_option('footer_social_links');
	$social_links = [];
	$preset_icons = [
		'linkedin' => get_theme_file_uri('assets/images/icon-linkedin.svg'),
		'facebook' => get_theme_file_uri('assets/images/icon-facebook.svg'),
		'instagram' => get_theme_file_uri('assets/images/icon-instagram.svg')
	];

	if (!empty($raw_social) && is_array($raw_social)) {
		foreach ($raw_social as $item) {
			if (!empty($item['url'])) {
				$custom_icon_id = !empty($item['custom_icon']) ? (int) $item['custom_icon'] : 0;
				$icon_url = $custom_icon_id ? wp_get_attachment_url($custom_icon_id) : '';
				if (empty($icon_url)) {
					$preset = !empty($item['preset_icon']) ? $item['preset_icon'] : 'linkedin';
					$icon_url = $preset_icons[$preset] ?? $preset_icons['linkedin'];
				}

				$social_links[] = [
					'title' => !empty($item['title']) ? $item['title'] : 'Social',
					'url' => $item['url'],
					'icon_url' => $icon_url
				];
			}
		}
	}

	if (empty($social_links)) {
		$social_links = $default_social_links;
	}

	$copyright_text = carbon_get_theme_option('footer_copyright');
	if ($copyright_text === null || $copyright_text === '') {
		$copyright_text = $default_copyright_format;
	}
	$copyright = str_replace('{year}', gmdate('Y'), $copyright_text);

	return [
		'logo_url' => $logo_url,
		'logo_link' => $logo_link,
		'logo_alt' => $logo_alt,
		'noise_url' => $noise_url,
		'columns' => $columns,
		'social_links' => $social_links,
		'copyright' => $copyright
	];
}

/**
 * Seeds default footer navigation and social links into Carbon Fields if not configured yet.
 */
function drtalk_redesign_seed_footer_settings()
{
	if (!function_exists('carbon_get_theme_option') || !function_exists('carbon_set_theme_option')) {
		return;
	}

	if (get_option('drtalk_footer_seeded_v1')) {
		return;
	}

	$default_referral_url = function_exists('drtalk_redesign_referral_gap_analysis_url')
		? drtalk_redesign_referral_gap_analysis_url()
		: '#';
	$default_login_url = function_exists('drtalk_redesign_login_url') ? drtalk_redesign_login_url() : '#';
	$default_contact_url = function_exists('drtalk_redesign_contact_url') ? drtalk_redesign_contact_url() : '#';

	$existing_columns = carbon_get_theme_option('footer_columns');
	if (empty($existing_columns)) {
		carbon_set_theme_option('footer_columns', [
			[
				'column_title' => 'Website',
				'links' => [
					[
						'text' => 'Book a Demo',
						'url' => $default_referral_url,
						'target_blank' => true
					],
					[
						'text' => 'Log In',
						'url' => $default_login_url,
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
				'column_title' => 'Company',
				'links' => [
					[
						'text' => 'Contact Us',
						'url' => $default_contact_url,
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
		]);
	}

	$existing_social = carbon_get_theme_option('footer_social_links');
	if (empty($existing_social)) {
		carbon_set_theme_option('footer_social_links', [
			[
				'title' => 'LinkedIn',
				'url' => 'https://www.linkedin.com/company/drtalk/',
				'preset_icon' => 'linkedin'
			],
			[
				'title' => 'Facebook',
				'url' => 'https://www.facebook.com/DrTalk1',
				'preset_icon' => 'facebook'
			],
			[
				'title' => 'Instagram',
				'url' => 'https://www.instagram.com/drtalk_',
				'preset_icon' => 'instagram'
			]
		]);
	}

	$existing_copyright = carbon_get_theme_option('footer_copyright');
	if (empty($existing_copyright)) {
		carbon_set_theme_option('footer_copyright', '© {year} drtalk. All rights reserved.');
	}

	update_option('drtalk_footer_seeded_v1', 1);
}
add_action('admin_init', 'drtalk_redesign_seed_footer_settings');

/**
 * Registers custom fields for the About Page.
 */
function drtalk_redesign_register_about_page_fields()
{
	Container::make('theme_options', __('About Page', 'drtalk-redesign'))
		->set_page_file('drtalk-about-page')
		->set_page_menu_title(__('About Page', 'drtalk-redesign'))
		->set_icon('dashicons-businessperson')
		->set_page_menu_position(23)
		->add_tab(__('Hero Section', 'drtalk-redesign'), [
			Field::make('checkbox', 'about_hero_is_active', __('Enable Section', 'drtalk-redesign'))->set_default_value(
				true
			),
			Field::make('text', 'about_hero_eyebrow', __('Eyebrow Text', 'drtalk-redesign'))->set_default_value(
				'After 25 years on the receiving end of broken referral workflows,'
			),
			Field::make('text', 'about_hero_title', __('Title (H1)', 'drtalk-redesign'))->set_default_value(
				'Dr. Tom Stone decided to do something about it.'
			),
			Field::make('textarea', 'about_hero_description', __('Description', 'drtalk-redesign'))
				->set_default_value(
					'Today, drtalk is the AI-powered referral and communication platform developed specifically for dental specialists and trusted by over 1,500 practices nationwide.'
				)
				->set_rows(3),
			Field::make('text', 'about_hero_button_text', __('Button Text', 'drtalk-redesign'))->set_default_value(
				'See How drtalk Works'
			),
			Field::make('text', 'about_hero_button_url', __('Button URL', 'drtalk-redesign'))->set_help_text(
				__('Leave empty for default Gap Analysis link.', 'drtalk-redesign')
			),
			Field::make('image', 'about_hero_image', __('Dashboard Preview Image', 'drtalk-redesign'))
				->set_value_type('id')
				->set_help_text(__('Leave empty to use the default dashboard image.', 'drtalk-redesign')),
			Field::make('image', 'about_hero_pattern', __('Background Pattern', 'drtalk-redesign'))
				->set_value_type('id')
				->set_help_text(__('Leave empty to use the default dark pattern.', 'drtalk-redesign'))
		])
		->add_tab(__('What We Solve', 'drtalk-redesign'), [
			Field::make(
				'checkbox',
				'about_problems_is_active',
				__('Enable Section', 'drtalk-redesign')
			)->set_default_value(true),
			Field::make('text', 'about_problems_eyebrow', __('Eyebrow Text', 'drtalk-redesign'))->set_default_value(
				'What we built drtalk to solve'
			),
			Field::make('text', 'about_problems_title', __('Section Title (H2)', 'drtalk-redesign'))->set_default_value(
				"Your growth shouldn't depend on luck and lunches."
			),
			Field::make('complex', 'about_problems_cards', __('Problem Cards', 'drtalk-redesign'))
				->set_layout('tabbed-horizontal')
				->add_fields([
					Field::make('text', 'title', __('Card Title', 'drtalk-redesign'))
						->set_required(true)
						->set_width(50),
					Field::make('select', 'preset_icon', __('Preset Icon', 'drtalk-redesign'))
						->set_options([
							'outdated_methods' => 'Outdated Methods',
							'incomplete_insights' => 'Incomplete Insights',
							'custom' => __('Custom Icon (upload below)', 'drtalk-redesign')
						])
						->set_default_value('outdated_methods')
						->set_width(25),
					Field::make('image', 'icon', __('Custom Icon', 'drtalk-redesign'))
						->set_value_type('id')
						->set_width(25),
					Field::make('textarea', 'description', __('Description', 'drtalk-redesign'))
						->set_rows(3)
						->set_required(true)
						->set_width(100)
				])
				->set_help_text(__('Leave empty to use the default 2 problem cards.', 'drtalk-redesign'))
		])
		->add_tab(__('Founder Story', 'drtalk-redesign'), [
			Field::make(
				'checkbox',
				'about_founder_is_active',
				__('Enable Section', 'drtalk-redesign')
			)->set_default_value(true),
			Field::make('text', 'about_founder_title', __('Section Title (H2)', 'drtalk-redesign'))->set_default_value(
				'Created by a dental specialist who felt the frustration firsthand.'
			),
			Field::make('textarea', 'about_founder_story', __('Story Content (HTML allowed)', 'drtalk-redesign'))
				->set_default_value(
					"<p>In 2014, Dr. Tom Stone set out to fix what he'd spent decades navigating. Referring dentists had no idea what happened after they sent a case his way. Patients he needed weren't showing up. The tools that were supposed to connect the two were the thing getting in the way.</p>\n<p>So he founded drtalk to fix it. To make professional communication seamless, referrals smart and efficient, and the knowledge dentists rely on easy to share. Not as an outsider guessing at the problem, but as someone who'd already spent decades inside it. <strong class=\"font-normal lg:font-bold\">And it's already working for practices like yours.</strong></p>"
				)
				->set_rows(6),
			Field::make('image', 'about_founder_image', __('Founder Photo', 'drtalk-redesign'))
				->set_value_type('id')
				->set_help_text(__('Photo of Dr. Thomas L. Stone.', 'drtalk-redesign'))
				->set_width(33),
			Field::make('textarea', 'about_founder_quote', __('Quote', 'drtalk-redesign'))
				->set_default_value(
					'I believe the future of dentistry belongs to those who embrace intelligent systems, not just harder work.'
				)
				->set_rows(3)
				->set_width(34),
			Field::make('text', 'about_founder_caption', __('Quote Caption / Author', 'drtalk-redesign'))
				->set_default_value('– Thomas L. Stone, MD, DDS, FACS')
				->set_width(33)
		])
		->add_tab(__('Outcomes & Stats', 'drtalk-redesign'), [
			Field::make(
				'checkbox',
				'about_stats_is_active',
				__('Enable Section', 'drtalk-redesign')
			)->set_default_value(true),
			Field::make('text', 'about_stats_title', __('Section Title (H2)', 'drtalk-redesign'))->set_default_value(
				"Ten years later, here's what that looks like."
			),
			Field::make('complex', 'about_stats_cards', __('Stats Cards', 'drtalk-redesign'))
				->set_layout('tabbed-horizontal')
				->add_fields([
					Field::make('text', 'value', __('Stat Value / Metric', 'drtalk-redesign'))
						->set_required(true)
						->set_width(40),
					Field::make('textarea', 'label', __('Label (HTML allowed)', 'drtalk-redesign'))
						->set_required(true)
						->set_rows(2)
						->set_width(60)
				])
				->set_help_text(__('Leave empty to use the default 3 statistics.', 'drtalk-redesign'))
		])
		->add_tab(__('Testimonial', 'drtalk-redesign'), [
			Field::make(
				'checkbox',
				'about_testimonial_is_active',
				__('Enable Section', 'drtalk-redesign')
			)->set_default_value(true),
			Field::make('text', 'about_testimonial_eyebrow', __('Eyebrow Text', 'drtalk-redesign'))->set_default_value(
				'What practices see after switching'
			),
			Field::make('textarea', 'about_testimonial_quote', __('Quote', 'drtalk-redesign'))
				->set_default_value(
					"drtalk has transformed our practice. Our team works in sync with referring offices, and we've seen a significant boost in efficiency and practice revenue."
				)
				->set_rows(3),
			Field::make('text', 'about_testimonial_name', __('Author Name', 'drtalk-redesign'))
				->set_default_value('Dr. Albert Kang')
				->set_width(33),
			Field::make('text', 'about_testimonial_role', __('Author Role / Practice', 'drtalk-redesign'))
				->set_default_value('Oral & Maxillofacial Surgeon, New England Oral & Maxillofacial Surgery')
				->set_width(34),
			Field::make('image', 'about_testimonial_avatar', __('Author Photo', 'drtalk-redesign'))
				->set_value_type('id')
				->set_width(33)
		])
		->add_tab(__('Platform Features', 'drtalk-redesign'), [
			Field::make(
				'checkbox',
				'about_features_is_active',
				__('Enable Section', 'drtalk-redesign')
			)->set_default_value(true),
			Field::make('text', 'about_features_title', __('Section Title (H2)', 'drtalk-redesign'))->set_default_value(
				'What Tom actually built.'
			),
			Field::make('textarea', 'about_features_description', __('Description (HTML allowed)', 'drtalk-redesign'))
				->set_default_value(
					'drtalk replaces the workarounds most specialty practices are still stitching together - fax, phone, email, paper - with <strong>one connected platform</strong>.'
				)
				->set_rows(2),
			Field::make('complex', 'about_features_list', __('Features List', 'drtalk-redesign'))
				->set_layout('tabbed-horizontal')
				->add_fields([
					Field::make('text', 'title', __('Feature Title', 'drtalk-redesign'))
						->set_required(true)
						->set_width(40),
					Field::make('select', 'preset_icon', __('Preset Icon', 'drtalk-redesign'))
						->set_options([
							'referrals' => 'Referral Management',
							'secure' => 'Secure Communication',
							'growth' => 'Practice Growth',
							'custom' => __('Custom Icon (upload below)', 'drtalk-redesign')
						])
						->set_default_value('referrals')
						->set_width(30),
					Field::make('image', 'icon', __('Custom Icon', 'drtalk-redesign'))
						->set_value_type('id')
						->set_width(30),
					Field::make('textarea', 'body', __('Feature Description', 'drtalk-redesign'))
						->set_rows(3)
						->set_required(true)
						->set_width(100)
				])
				->set_help_text(__('Leave empty to use the default 3 platform features.', 'drtalk-redesign'))
		])
		->add_tab(__('Deliberate Choices', 'drtalk-redesign'), [
			Field::make(
				'checkbox',
				'about_choices_is_active',
				__('Enable Section', 'drtalk-redesign')
			)->set_default_value(true),
			Field::make('text', 'about_choices_title', __('Section Title (H2)', 'drtalk-redesign'))->set_default_value(
				"Three things we've deliberately said no to."
			),
			Field::make('textarea', 'about_choices_description', __('Description', 'drtalk-redesign'))
				->set_default_value(
					"Every feature a platform adds is one more thing your team has to learn, adopt, and troubleshoot. drtalk exists to reduce that surface area, not expand it. So we've made some deliberate choices about what we don't do."
				)
				->set_rows(3),
			Field::make('complex', 'about_choices_list', __('Choices List', 'drtalk-redesign'))
				->set_layout('tabbed-horizontal')
				->add_fields([
					Field::make('text', 'title', __('Choice Title', 'drtalk-redesign'))
						->set_required(true)
						->set_width(40),
					Field::make('textarea', 'body', __('Description', 'drtalk-redesign'))
						->set_rows(3)
						->set_required(true)
						->set_width(60)
				])
				->set_help_text(__('Leave empty to use the default 3 deliberate choices.', 'drtalk-redesign'))
		])
		->add_tab(__('Call to Action', 'drtalk-redesign'), [
			Field::make('checkbox', 'about_cta_is_active', __('Enable Section', 'drtalk-redesign'))->set_default_value(
				true
			),
			Field::make('text', 'about_cta_eyebrow', __('Eyebrow Text', 'drtalk-redesign'))->set_default_value(
				'Free 30-minute session'
			),
			Field::make('text', 'about_cta_title', __('Heading', 'drtalk-redesign'))->set_default_value(
				'See exactly where your referrals are slipping through the cracks.'
			),
			Field::make('textarea', 'about_cta_description', __('Description', 'drtalk-redesign'))
				->set_default_value(
					'30 minutes. We walk through how referrals move through your practice today, identify where your current process is costing you, and give you a summary to keep. Whether or not drtalk turns out to be right for you.'
				)
				->set_rows(3),
			Field::make('text', 'about_cta_button_text', __('Button Text', 'drtalk-redesign'))->set_default_value(
				'Book your free Referral Gap Analysis'
			),
			Field::make('text', 'about_cta_button_url', __('Button URL', 'drtalk-redesign'))->set_help_text(
				__('Leave empty for default Gap Analysis link.', 'drtalk-redesign')
			),
			Field::make('text', 'about_cta_subtext', __('Subtext', 'drtalk-redesign'))->set_default_value(
				'30 minutes · Best with practice owner + office manager · No obligation'
			)
		]);
}
add_action('carbon_fields_register_fields', 'drtalk_redesign_register_about_page_fields');

/**
 * Retrieves the About page configuration settings.
 *
 * @return array
 */
function drtalk_redesign_get_about_page_settings()
{
	$default_pattern_url = get_theme_file_uri('assets/images/personalized-pattern-dark.png');
	$default_orange_pattern_url = get_theme_file_uri('assets/images/footer-pattern.png');
	$default_hero_image_url = get_theme_file_uri('assets/images/about-dashboard.png');
	$default_founder_image_url = get_theme_file_uri('assets/images/about-thomas.png');
	$default_testimonial_image_url = get_theme_file_uri('assets/images/about-albert.png');
	$default_referral_url = function_exists('drtalk_redesign_referral_gap_analysis_url')
		? drtalk_redesign_referral_gap_analysis_url()
		: '#';

	$defaults = [
		'hero' => [
			'is_active' => true,
			'eyebrow' => 'After 25 years on the receiving end of broken referral workflows,',
			'title' => 'Dr. Tom Stone decided to do something about it.',
			'description' =>
				'Today, drtalk is the AI-powered referral and communication platform developed specifically for dental specialists and trusted by over 1,500 practices nationwide.',
			'button_text' => 'See How drtalk Works',
			'button_url' => $default_referral_url,
			'image_url' => $default_hero_image_url,
			'pattern_url' => $default_pattern_url
		],
		'problems' => [
			'is_active' => true,
			'eyebrow' => 'What we built drtalk to solve',
			'title' => "Your growth shouldn't depend on luck and lunches.",
			'pattern_url' => $default_orange_pattern_url,
			'cards' => [
				[
					'title' => 'Outdated Methods',
					'description' =>
						'Most specialists are still managing referrals the way they did a decade ago…a call here, a lunch there. Hoping the GP down the street remembers you the next time a patient needs work.',
					'icon_url' => get_theme_file_uri('assets/images/different-referral-friction-static.png')
				],
				[
					'title' => 'Incomplete Insights',
					'description' =>
						"Referrals arrive missing details. Relationships go quiet without warning. And there's no reliable way to know if what you're investing in referring offices is actually paying off.",
					'icon_url' => get_theme_file_uri('assets/images/about-incomplete.svg')
				]
			]
		],
		'founder' => [
			'is_active' => true,
			'title' => 'Created by a dental specialist who felt the frustration firsthand.',
			'story' =>
				"<p>In 2014, Dr. Tom Stone set out to fix what he'd spent decades navigating. Referring dentists had no idea what happened after they sent a case his way. Patients he needed weren't showing up. The tools that were supposed to connect the two were the thing getting in the way.</p>\n<p>So he founded drtalk to fix it. To make professional communication seamless, referrals smart and efficient, and the knowledge dentists rely on easy to share. Not as an outsider guessing at the problem, but as someone who'd already spent decades inside it. <strong class=\"font-normal lg:font-bold\">And it's already working for practices like yours.</strong></p>",
			'image_url' => $default_founder_image_url,
			'quote' =>
				'I believe the future of dentistry belongs to those who embrace intelligent systems, not just harder work.',
			'caption' => '– Thomas L. Stone, MD, DDS, FACS'
		],
		'stats' => [
			'is_active' => true,
			'title' => "Ten years later, here's what that looks like.",
			'pattern_url' => $default_pattern_url,
			'cards' => [
				[
					'value' => '$500M+',
					'label' => 'In referral-driven <strong>revenue</strong> tracked'
				],
				[
					'value' => 'Up to 20%',
					'label' => '<strong>Revenue growth</strong> for drtalk practices in year one'
				],
				[
					'value' => '70%',
					'label' => '<strong>Faster</strong> time-to-scheduled appointment'
				]
			]
		],
		'testimonial' => [
			'is_active' => true,
			'eyebrow' => 'What practices see after switching',
			'quote' =>
				"drtalk has transformed our practice. Our team works in sync with referring offices, and we've seen a significant boost in efficiency and practice revenue.",
			'name' => 'Dr. Albert Kang',
			'role' => 'Oral & Maxillofacial Surgeon, New England Oral & Maxillofacial Surgery',
			'avatar_url' => $default_testimonial_image_url,
			'pattern_url' => $default_pattern_url
		],
		'features' => [
			'is_active' => true,
			'title' => 'What Tom actually built.',
			'description' =>
				'drtalk replaces the workarounds most specialty practices are still stitching together - fax, phone, email, paper - with <strong>one connected platform</strong>.',
			'list' => [
				[
					'title' => 'Referral Management',
					'body' =>
						'Capture, track, and close referrals without the leakage. Know exactly where every patient is in the process. And who owns the next step.',
					'icon_url' => get_theme_file_uri('assets/images/about-referrals.svg')
				],
				[
					'title' => 'Secure Communication',
					'body' =>
						'HIPAA-compliant messaging with bank-level encryption and verified senders. Every conversation stays secure. Every referral stays on track.',
					'icon_url' => get_theme_file_uri('assets/images/about-secure.svg')
				],
				[
					'title' => 'Practice Growth',
					'body' =>
						"Strengthen GP relationships, reduce scheduling friction by up to 70%, and track revenue tied directly to referrals. So you can see what's working.",
					'icon_url' => get_theme_file_uri('assets/images/about-growth.svg')
				]
			]
		],
		'choices' => [
			'is_active' => true,
			'title' => "Three things we've deliberately said no to.",
			'description' =>
				"Every feature a platform adds is one more thing your team has to learn, adopt, and troubleshoot. drtalk exists to reduce that surface area, not expand it. So we've made some deliberate choices about what we don't do.",
			'pattern_url' => $default_pattern_url,
			'icon_url' => get_theme_file_uri('assets/images/about-no.svg'),
			'list' => [
				[
					'title' => "We don't replace what you already use.",
					'body' =>
						"drtalk plugs into the referral channels you're already using. Your scheduling, billing, and patient records stay exactly where they are."
				],
				[
					'title' => "We don't ask referring GPs to change how they work.",
					'body' =>
						'We built drtalk around the way referrals actually happen today, not the way a software company wishes they did. GPs keep sending referrals the way they always have. drtalk captures them regardless of channel.'
				],
				[
					'title' => "We don't ship features we can't stand behind.",
					'body' =>
						"Every AI capability in drtalk is built to reduce your staff's workload. Not add another system for them to babysit. If a feature doesn't clearly do that, we don't ship it."
				]
			]
		],
		'cta' => [
			'is_active' => true,
			'eyebrow' => 'Free 30-minute session',
			'title' => 'See exactly where your referrals are slipping through the cracks.',
			'description' =>
				'30 minutes. We walk through how referrals move through your practice today, identify where your current process is costing you, and give you a summary to keep. Whether or not drtalk turns out to be right for you.',
			'button_text' => 'Book your free Referral Gap Analysis',
			'button_url' => $default_referral_url,
			'subtext' => '30 minutes · Best with practice owner + office manager · No obligation',
			'pattern_url' => $default_pattern_url
		]
	];

	if (!function_exists('carbon_get_theme_option')) {
		return $defaults;
	}

	// Hero
	$hero_active = carbon_get_theme_option('about_hero_is_active');
	$hero_image_id = carbon_get_theme_option('about_hero_image');
	$hero_image_url = $hero_image_id ? wp_get_attachment_url($hero_image_id) : '';
	$hero_pattern_id = carbon_get_theme_option('about_hero_pattern');
	$hero_pattern_url = $hero_pattern_id ? wp_get_attachment_url($hero_pattern_id) : '';
	$hero_btn_url = carbon_get_theme_option('about_hero_button_url');

	$hero = [
		'is_active' => $hero_active === null || $hero_active === '' ? true : (bool) $hero_active,
		'eyebrow' => carbon_get_theme_option('about_hero_eyebrow') ?: $defaults['hero']['eyebrow'],
		'title' => carbon_get_theme_option('about_hero_title') ?: $defaults['hero']['title'],
		'description' => carbon_get_theme_option('about_hero_description') ?: $defaults['hero']['description'],
		'button_text' => carbon_get_theme_option('about_hero_button_text') ?: $defaults['hero']['button_text'],
		'button_url' => !empty($hero_btn_url) ? $hero_btn_url : $defaults['hero']['button_url'],
		'image_url' => !empty($hero_image_url) ? $hero_image_url : $defaults['hero']['image_url'],
		'pattern_url' => !empty($hero_pattern_url) ? $hero_pattern_url : $defaults['hero']['pattern_url']
	];

	// Problems
	$problems_active = carbon_get_theme_option('about_problems_is_active');
	$raw_problems = carbon_get_theme_option('about_problems_cards');
	$problems_cards = [];
	$problem_icons_preset = [
		'outdated_methods' => get_theme_file_uri('assets/images/different-referral-friction-static.png'),
		'incomplete_insights' => get_theme_file_uri('assets/images/about-incomplete.svg')
	];

	if (!empty($raw_problems) && is_array($raw_problems)) {
		foreach ($raw_problems as $item) {
			if (!empty($item['title'])) {
				$icon_id = !empty($item['icon']) ? (int) $item['icon'] : 0;
				$icon_url = $icon_id ? wp_get_attachment_url($icon_id) : '';
				if (empty($icon_url)) {
					$preset = !empty($item['preset_icon']) ? $item['preset_icon'] : 'outdated_methods';
					$icon_url = $problem_icons_preset[$preset] ?? $problem_icons_preset['outdated_methods'];
				}
				$problems_cards[] = [
					'title' => $item['title'],
					'description' => !empty($item['description']) ? $item['description'] : '',
					'icon_url' => $icon_url
				];
			}
		}
	}
	if (empty($problems_cards)) {
		$problems_cards = $defaults['problems']['cards'];
	}

	$problems = [
		'is_active' => $problems_active === null || $problems_active === '' ? true : (bool) $problems_active,
		'eyebrow' => carbon_get_theme_option('about_problems_eyebrow') ?: $defaults['problems']['eyebrow'],
		'title' => carbon_get_theme_option('about_problems_title') ?: $defaults['problems']['title'],
		'pattern_url' => $default_orange_pattern_url,
		'cards' => $problems_cards
	];

	// Founder
	$founder_active = carbon_get_theme_option('about_founder_is_active');
	$founder_img_id = carbon_get_theme_option('about_founder_image');
	$founder_img_url = $founder_img_id ? wp_get_attachment_url($founder_img_id) : '';

	$founder = [
		'is_active' => $founder_active === null || $founder_active === '' ? true : (bool) $founder_active,
		'title' => carbon_get_theme_option('about_founder_title') ?: $defaults['founder']['title'],
		'story' => carbon_get_theme_option('about_founder_story') ?: $defaults['founder']['story'],
		'image_url' => !empty($founder_img_url) ? $founder_img_url : $defaults['founder']['image_url'],
		'quote' => carbon_get_theme_option('about_founder_quote') ?: $defaults['founder']['quote'],
		'caption' => carbon_get_theme_option('about_founder_caption') ?: $defaults['founder']['caption']
	];

	// Stats
	$stats_active = carbon_get_theme_option('about_stats_is_active');
	$raw_stats = carbon_get_theme_option('about_stats_cards');
	$stats_cards = [];
	if (!empty($raw_stats) && is_array($raw_stats)) {
		foreach ($raw_stats as $item) {
			if (!empty($item['value'])) {
				$stats_cards[] = [
					'value' => $item['value'],
					'label' => !empty($item['label']) ? $item['label'] : ''
				];
			}
		}
	}
	if (empty($stats_cards)) {
		$stats_cards = $defaults['stats']['cards'];
	}

	$stats = [
		'is_active' => $stats_active === null || $stats_active === '' ? true : (bool) $stats_active,
		'title' => carbon_get_theme_option('about_stats_title') ?: $defaults['stats']['title'],
		'pattern_url' => $default_pattern_url,
		'cards' => $stats_cards
	];

	// Testimonial
	$testimonial_active = carbon_get_theme_option('about_testimonial_is_active');
	$avatar_id = carbon_get_theme_option('about_testimonial_avatar');
	$avatar_url = $avatar_id ? wp_get_attachment_url($avatar_id) : '';

	$testimonial = [
		'is_active' => $testimonial_active === null || $testimonial_active === '' ? true : (bool) $testimonial_active,
		'eyebrow' => carbon_get_theme_option('about_testimonial_eyebrow') ?: $defaults['testimonial']['eyebrow'],
		'quote' => carbon_get_theme_option('about_testimonial_quote') ?: $defaults['testimonial']['quote'],
		'name' => carbon_get_theme_option('about_testimonial_name') ?: $defaults['testimonial']['name'],
		'role' => carbon_get_theme_option('about_testimonial_role') ?: $defaults['testimonial']['role'],
		'avatar_url' => !empty($avatar_url) ? $avatar_url : $defaults['testimonial']['avatar_url'],
		'pattern_url' => $default_pattern_url
	];

	// Features
	$features_active = carbon_get_theme_option('about_features_is_active');
	$raw_features = carbon_get_theme_option('about_features_list');
	$features_list = [];
	$feature_icons_preset = [
		'referrals' => get_theme_file_uri('assets/images/about-referrals.svg'),
		'secure' => get_theme_file_uri('assets/images/about-secure.svg'),
		'growth' => get_theme_file_uri('assets/images/about-growth.svg')
	];

	if (!empty($raw_features) && is_array($raw_features)) {
		foreach ($raw_features as $item) {
			if (!empty($item['title'])) {
				$icon_id = !empty($item['icon']) ? (int) $item['icon'] : 0;
				$icon_url = $icon_id ? wp_get_attachment_url($icon_id) : '';
				if (empty($icon_url)) {
					$preset = !empty($item['preset_icon']) ? $item['preset_icon'] : 'referrals';
					$icon_url = $feature_icons_preset[$preset] ?? $feature_icons_preset['referrals'];
				}
				$features_list[] = [
					'title' => $item['title'],
					'body' => !empty($item['body']) ? $item['body'] : '',
					'icon_url' => $icon_url
				];
			}
		}
	}
	if (empty($features_list)) {
		$features_list = $defaults['features']['list'];
	}

	$features = [
		'is_active' => $features_active === null || $features_active === '' ? true : (bool) $features_active,
		'title' => carbon_get_theme_option('about_features_title') ?: $defaults['features']['title'],
		'description' => carbon_get_theme_option('about_features_description') ?: $defaults['features']['description'],
		'list' => $features_list
	];

	// Choices
	$choices_active = carbon_get_theme_option('about_choices_is_active');
	$raw_choices = carbon_get_theme_option('about_choices_list');
	$choices_list = [];
	if (!empty($raw_choices) && is_array($raw_choices)) {
		foreach ($raw_choices as $item) {
			if (!empty($item['title'])) {
				$choices_list[] = [
					'title' => $item['title'],
					'body' => !empty($item['body']) ? $item['body'] : ''
				];
			}
		}
	}
	if (empty($choices_list)) {
		$choices_list = $defaults['choices']['list'];
	}

	$choices = [
		'is_active' => $choices_active === null || $choices_active === '' ? true : (bool) $choices_active,
		'title' => carbon_get_theme_option('about_choices_title') ?: $defaults['choices']['title'],
		'description' => carbon_get_theme_option('about_choices_description') ?: $defaults['choices']['description'],
		'pattern_url' => $default_pattern_url,
		'icon_url' => get_theme_file_uri('assets/images/about-no.svg'),
		'list' => $choices_list
	];

	// CTA
	$cta_active = carbon_get_theme_option('about_cta_is_active');
	$cta_btn_url = carbon_get_theme_option('about_cta_button_url');

	$cta = [
		'is_active' => $cta_active === null || $cta_active === '' ? true : (bool) $cta_active,
		'eyebrow' => carbon_get_theme_option('about_cta_eyebrow') ?: $defaults['cta']['eyebrow'],
		'title' => carbon_get_theme_option('about_cta_title') ?: $defaults['cta']['title'],
		'description' => carbon_get_theme_option('about_cta_description') ?: $defaults['cta']['description'],
		'button_text' => carbon_get_theme_option('about_cta_button_text') ?: $defaults['cta']['button_text'],
		'button_url' => !empty($cta_btn_url) ? $cta_btn_url : $defaults['cta']['button_url'],
		'subtext' => carbon_get_theme_option('about_cta_subtext') ?: $defaults['cta']['subtext'],
		'pattern_url' => $default_pattern_url
	];

	return [
		'hero' => $hero,
		'problems' => $problems,
		'founder' => $founder,
		'stats' => $stats,
		'testimonial' => $testimonial,
		'features' => $features,
		'choices' => $choices,
		'cta' => $cta
	];
}

/**
 * Seeds default About Page fields into Carbon Fields if not configured yet.
 */
function drtalk_redesign_seed_about_page_settings()
{
	if (!function_exists('carbon_get_theme_option') || !function_exists('carbon_set_theme_option')) {
		return;
	}

	if (get_option('drtalk_about_page_seeded_v1')) {
		return;
	}

	$existing_problems = carbon_get_theme_option('about_problems_cards');
	if (empty($existing_problems)) {
		carbon_set_theme_option('about_problems_cards', [
			[
				'title' => 'Outdated Methods',
				'preset_icon' => 'outdated_methods',
				'description' =>
					'Most specialists are still managing referrals the way they did a decade ago…a call here, a lunch there. Hoping the GP down the street remembers you the next time a patient needs work.'
			],
			[
				'title' => 'Incomplete Insights',
				'preset_icon' => 'incomplete_insights',
				'description' =>
					"Referrals arrive missing details. Relationships go quiet without warning. And there's no reliable way to know if what you're investing in referring offices is actually paying off."
			]
		]);
	}

	$existing_stats = carbon_get_theme_option('about_stats_cards');
	if (empty($existing_stats)) {
		carbon_set_theme_option('about_stats_cards', [
			[
				'value' => '$500M+',
				'label' => 'In referral-driven <strong>revenue</strong> tracked'
			],
			[
				'value' => 'Up to 20%',
				'label' => '<strong>Revenue growth</strong> for drtalk practices in year one'
			],
			[
				'value' => '70%',
				'label' => '<strong>Faster</strong> time-to-scheduled appointment'
			]
		]);
	}

	$existing_features = carbon_get_theme_option('about_features_list');
	if (empty($existing_features)) {
		carbon_set_theme_option('about_features_list', [
			[
				'title' => 'Referral Management',
				'preset_icon' => 'referrals',
				'body' =>
					'Capture, track, and close referrals without the leakage. Know exactly where every patient is in the process. And who owns the next step.'
			],
			[
				'title' => 'Secure Communication',
				'preset_icon' => 'secure',
				'body' =>
					'HIPAA-compliant messaging with bank-level encryption and verified senders. Every conversation stays secure. Every referral stays on track.'
			],
			[
				'title' => 'Practice Growth',
				'preset_icon' => 'growth',
				'body' =>
					"Strengthen GP relationships, reduce scheduling friction by up to 70%, and track revenue tied directly to referrals. So you can see what's working."
			]
		]);
	}

	$existing_choices = carbon_get_theme_option('about_choices_list');
	if (empty($existing_choices)) {
		carbon_set_theme_option('about_choices_list', [
			[
				'title' => "We don't replace what you already use.",
				'body' =>
					"drtalk plugs into the referral channels you're already using. Your scheduling, billing, and patient records stay exactly where they are."
			],
			[
				'title' => "We don't ask referring GPs to change how they work.",
				'body' =>
					'We built drtalk around the way referrals actually happen today, not the way a software company wishes they did. GPs keep sending referrals the way they always have. drtalk captures them regardless of channel.'
			],
			[
				'title' => "We don't ship features we can't stand behind.",
				'body' =>
					"Every AI capability in drtalk is built to reduce your staff's workload. Not add another system for them to babysit. If a feature doesn't clearly do that, we don't ship it."
			]
		]);
	}

	update_option('drtalk_about_page_seeded_v1', 1);
}
add_action('admin_init', 'drtalk_redesign_seed_about_page_settings');

/**
 * Registers custom fields for the News / Blog Page.
 */
function drtalk_redesign_register_news_page_fields()
{
	Container::make('theme_options', __('News Page', 'drtalk-redesign'))
		->set_page_file('drtalk-news-page')
		->set_page_menu_title(__('News', 'drtalk-redesign'))
		->set_icon('dashicons-format-aside')
		->set_page_menu_position(24)
		->add_tab(__('Hero Section', 'drtalk-redesign'), [
			Field::make('text', 'news_hero_title', __('Title (H1)', 'drtalk-redesign'))->set_default_value(
				'The Latest from drtalk'
			),
			Field::make('textarea', 'news_hero_description', __('Description', 'drtalk-redesign'))
				->set_default_value('Product news, company updates, and more from the team at drtalk.')
				->set_rows(2),
			Field::make('image', 'news_hero_pattern', __('Background Pattern', 'drtalk-redesign'))
				->set_value_type('id')
				->set_help_text(
					__('Upload custom background pattern. Leave empty to use default pattern.', 'drtalk-redesign')
				)
		])
		->add_tab(__('Articles Grid', 'drtalk-redesign'), [
			Field::make('text', 'news_posts_per_page', __('Articles Per Page', 'drtalk-redesign'))
				->set_default_value('9')
				->set_attribute('type', 'number'),
			Field::make('image', 'news_default_thumbnail', __('Fallback Article Image', 'drtalk-redesign'))
				->set_value_type('id')
				->set_help_text(
					__(
						'Fallback thumbnail for articles that do not have a featured image. If empty, drtalk logo is used.',
						'drtalk-redesign'
					)
				)
		])
		->add_tab(__('Call to Action', 'drtalk-redesign'), [
			Field::make('checkbox', 'news_cta_is_active', __('Enable Section', 'drtalk-redesign'))->set_default_value(
				true
			),
			Field::make('text', 'news_cta_eyebrow', __('Eyebrow Text', 'drtalk-redesign'))->set_default_value(
				'FREE 30-MINUTE SESSION'
			),
			Field::make('text', 'news_cta_title', __('Heading (H2)', 'drtalk-redesign'))->set_default_value(
				'See exactly where your referrals are slipping through the cracks'
			),
			Field::make('textarea', 'news_cta_description', __('Description', 'drtalk-redesign'))
				->set_default_value(
					'30 minutes. We walk through how referrals move through your practice today, identify where your current process is costing you, and give you a summary to keep. Whether or not drtalk turns out to be right for you.'
				)
				->set_rows(3),
			Field::make('text', 'news_cta_button_text', __('Button Text', 'drtalk-redesign'))->set_default_value(
				'Book your free Referral Gap Analysis'
			),
			Field::make('text', 'news_cta_button_url', __('Button URL', 'drtalk-redesign'))->set_help_text(
				__('Leave empty for default Gap Analysis link.', 'drtalk-redesign')
			),
			Field::make('text', 'news_cta_subtext', __('Subtext', 'drtalk-redesign'))->set_default_value(
				'30 minutes · Best with practice owner + office manager · No obligation'
			),
			Field::make('image', 'news_cta_pattern', __('Background Pattern', 'drtalk-redesign'))
				->set_value_type('id')
				->set_help_text(
					__('Upload custom background pattern. Leave empty to use default pattern.', 'drtalk-redesign')
				)
		])
		->add_tab(__('Single Article', 'drtalk-redesign'), [
			Field::make(
				'text',
				'news_single_breadcrumb_label',
				__('Breadcrumb Label', 'drtalk-redesign')
			)->set_default_value('News'),
			Field::make(
				'checkbox',
				'news_single_show_share',
				__('Show Social Share Buttons', 'drtalk-redesign')
			)->set_default_value(true),
			Field::make(
				'textarea',
				'news_single_cta_description',
				__('Single Article CTA Description', 'drtalk-redesign')
			)
				->set_default_value(
					'In your free Referral Gap Analysis, we walk through how referrals move through your practice, identify where your current process is costing you, and show you what a more reliable system looks like going forward.'
				)
				->set_rows(3)
				->set_help_text(
					__('Custom description for the Call to Action section on single article pages.', 'drtalk-redesign')
				)
		]);
}
add_action('carbon_fields_register_fields', 'drtalk_redesign_register_news_page_fields');

/**
 * Retrieves the News / Blog page configuration settings.
 *
 * @return array
 */
function drtalk_redesign_get_news_settings()
{
	$default_hero_pattern_url = get_theme_file_uri('assets/images/footer-pattern.png');
	$default_cta_pattern_url = get_theme_file_uri('assets/images/personalized-pattern-dark.png');
	$default_fallback_logo = get_theme_file_uri('assets/images/footer-logo.svg');
	$default_referral_url = function_exists('drtalk_redesign_referral_gap_analysis_url')
		? drtalk_redesign_referral_gap_analysis_url()
		: '#';

	$defaults = [
		'hero' => [
			'title' => 'The Latest from drtalk',
			'description' => 'Product news, company updates, and more from the team at drtalk.',
			'pattern_url' => $default_hero_pattern_url
		],
		'posts_per_page' => 9,
		'default_thumbnail_url' => $default_fallback_logo,
		'cta' => [
			'is_active' => true,
			'eyebrow' => 'FREE 30-MINUTE SESSION',
			'title' => 'See exactly where your referrals are slipping through the cracks',
			'description' =>
				'30 minutes. We walk through how referrals move through your practice today, identify where your current process is costing you, and give you a summary to keep. Whether or not drtalk turns out to be right for you.',
			'button_text' => 'Book your free Referral Gap Analysis',
			'button_url' => $default_referral_url,
			'subtext' => '30 minutes · Best with practice owner + office manager · No obligation',
			'pattern_url' => $default_cta_pattern_url
		],
		'single' => [
			'breadcrumb_label' => 'News',
			'show_share' => true,
			'cta_description' =>
				'In your free Referral Gap Analysis, we walk through how referrals move through your practice, identify where your current process is costing you, and show you what a more reliable system looks like going forward.'
		]
	];

	if (!function_exists('carbon_get_theme_option')) {
		return $defaults;
	}

	$hero_pattern_id = carbon_get_theme_option('news_hero_pattern');
	$hero_pattern_url = $hero_pattern_id ? wp_get_attachment_url($hero_pattern_id) : '';

	$hero = [
		'title' => carbon_get_theme_option('news_hero_title') ?: $defaults['hero']['title'],
		'description' => carbon_get_theme_option('news_hero_description') ?: $defaults['hero']['description'],
		'pattern_url' => !empty($hero_pattern_url) ? $hero_pattern_url : $defaults['hero']['pattern_url']
	];

	$posts_per_page = (int) carbon_get_theme_option('news_posts_per_page');
	if ($posts_per_page <= 0) {
		$posts_per_page = 9;
	}

	$thumb_id = carbon_get_theme_option('news_default_thumbnail');
	$default_thumbnail_url = $thumb_id ? wp_get_attachment_url($thumb_id) : $default_fallback_logo;

	$cta_active = carbon_get_theme_option('news_cta_is_active');
	$cta_pattern_id = carbon_get_theme_option('news_cta_pattern');
	$cta_pattern_url = $cta_pattern_id ? wp_get_attachment_url($cta_pattern_id) : '';
	$cta_btn_url = carbon_get_theme_option('news_cta_button_url');

	$cta = [
		'is_active' => $cta_active === null || $cta_active === '' ? true : (bool) $cta_active,
		'eyebrow' => carbon_get_theme_option('news_cta_eyebrow') ?: $defaults['cta']['eyebrow'],
		'title' => carbon_get_theme_option('news_cta_title') ?: $defaults['cta']['title'],
		'description' => carbon_get_theme_option('news_cta_description') ?: $defaults['cta']['description'],
		'button_text' => carbon_get_theme_option('news_cta_button_text') ?: $defaults['cta']['button_text'],
		'button_url' => !empty($cta_btn_url) ? $cta_btn_url : $defaults['cta']['button_url'],
		'subtext' => carbon_get_theme_option('news_cta_subtext') ?: $defaults['cta']['subtext'],
		'pattern_url' => !empty($cta_pattern_url) ? $cta_pattern_url : $defaults['cta']['pattern_url']
	];

	$single_share = carbon_get_theme_option('news_single_show_share');
	$single = [
		'breadcrumb_label' =>
			carbon_get_theme_option('news_single_breadcrumb_label') ?: $defaults['single']['breadcrumb_label'],
		'show_share' => $single_share === null || $single_share === '' ? true : (bool) $single_share,
		'cta_description' =>
			carbon_get_theme_option('news_single_cta_description') ?: $defaults['single']['cta_description']
	];

	return [
		'hero' => $hero,
		'posts_per_page' => $posts_per_page,
		'default_thumbnail_url' => $default_thumbnail_url,
		'cta' => $cta,
		'single' => $single
	];
}

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
	if (!is_file($source_path) || !is_readable($source_path)) {
		error_log('drtalk-redesign: Cannot import unreadable theme asset: ' . $relative_path);
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
	if (!empty($upload_dir['error']) || empty($upload_dir['path'])) {
		error_log('drtalk-redesign: Cannot import theme asset because the upload directory is unavailable.');
		return 0;
	}
	if (!is_dir($upload_dir['path']) && !wp_mkdir_p($upload_dir['path'])) {
		error_log('drtalk-redesign: Cannot create the upload directory for theme assets.');
		return 0;
	}
	if (!is_writable($upload_dir['path'])) {
		error_log('drtalk-redesign: Cannot write theme assets to the upload directory.');
		return 0;
	}

	$dest_path = $upload_dir['path'] . '/' . wp_unique_filename($upload_dir['path'], $filename);
	if (!@copy($source_path, $dest_path)) {
		error_log('drtalk-redesign: Failed to copy theme asset into the upload directory: ' . $relative_path);
		return 0;
	}

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

	$attach_id = wp_insert_attachment($attachment, $dest_path, 0, true);
	if (is_wp_error($attach_id) || !$attach_id) {
		wp_delete_file($dest_path);
		$message = is_wp_error($attach_id) ? $attach_id->get_error_message() : 'Unknown attachment insertion error.';
		error_log('drtalk-redesign: Failed to create media attachment: ' . $message);
		return 0;
	}

	$attach_data = wp_generate_attachment_metadata($attach_id, $dest_path);
	if ($mime_type !== 'image/svg+xml' && strpos((string) $mime_type, 'image/') === 0 && !is_array($attach_data)) {
		wp_delete_attachment($attach_id, true);
		error_log('drtalk-redesign: Failed to generate metadata for theme asset: ' . $relative_path);
		return 0;
	}
	wp_update_attachment_metadata($attach_id, $attach_data);

	return (int) $attach_id;
}

add_filter('upload_mimes', function ($mimes) {
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
});

/**
 * Reads existing CPT testimonials from the database and returns them formatted for the Carbon Fields block.
 *
 * @return array
 */
function drtalk_redesign_get_cpt_testimonials_for_migration()
{
	$posts = get_posts([
		'post_type' => 'testimonial',
		'post_status' => 'publish',
		'posts_per_page' => -1,
		'orderby' => 'menu_order',
		'order' => 'ASC'
	]);

	if (empty($posts)) {
		return [];
	}

	$items = [];
	foreach ($posts as $post) {
		$logo_id = absint(get_post_meta($post->ID, '_drtalk_testimonial_logo_id', true));
		$photo_id = absint(get_post_thumbnail_id($post->ID));

		$items[] = [
			'name' => get_the_title($post),
			'role' => (string) get_post_meta($post->ID, '_drtalk_testimonial_role', true),
			'company' => (string) get_post_meta($post->ID, '_drtalk_testimonial_company', true),
			'eyebrow' => (string) get_post_meta($post->ID, '_drtalk_testimonial_payoff', true),
			'quote' => wp_strip_all_tags($post->post_content),
			'avatar' => $photo_id ?: '',
			'logo' => $logo_id ?: ''
		];
	}

	return $items;
}

/**
 * Returns default configuration data for all 14 canonical front page blocks keyed by block type.
 *
 * @return array<string, array>
 */
function drtalk_redesign_get_default_home_blocks()
{
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

	$persona_1_id = drtalk_redesign_get_or_create_theme_attachment(
		'assets/images/personas-specialists.png',
		'Personas Dental Specialists'
	);
	$persona_2_id = drtalk_redesign_get_or_create_theme_attachment(
		'assets/images/personas-managers.png',
		'Personas Office Managers'
	);
	$persona_3_id = drtalk_redesign_get_or_create_theme_attachment(
		'assets/images/personas-gps.png',
		'Personas Referring GPs'
	);

	$founder_image_id = drtalk_redesign_get_or_create_theme_attachment(
		'assets/images/thomas-stone-figma.png',
		'Thomas L. Stone Founder Photo'
	);

	$cta_1_id = drtalk_redesign_get_or_create_theme_attachment('assets/images/cta-process-1.png', 'CTA Process 1 Icon');
	$cta_2_id = drtalk_redesign_get_or_create_theme_attachment('assets/images/cta-process-2.png', 'CTA Process 2 Icon');
	$cta_3_id = drtalk_redesign_get_or_create_theme_attachment('assets/images/cta-process-3.png', 'CTA Process 3 Icon');
	$cta_4_id = drtalk_redesign_get_or_create_theme_attachment('assets/images/cta-process-4.png', 'CTA Process 4 Icon');
	$cta_noise_id = drtalk_redesign_get_or_create_theme_attachment(
		'assets/images/footer-pattern.png',
		'CTA Noise Pattern'
	);

	$plus_icon_id = drtalk_redesign_get_or_create_theme_attachment('assets/images/icon-plus.svg', 'FAQ Plus Icon');
	$referral_gap_url = esc_url(drtalk_redesign_referral_gap_analysis_url());
	$baa_url = esc_url(home_url('/business-associates-agreement/'));
	$contact_url = esc_url(drtalk_redesign_contact_url());

	return [
		'hero' => [
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
		'partners' => [
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
		'problem_cards' => [
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
		'calculator' => [
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
		'how_it_works' => [
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
		'responsiveness' => [
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
		],
		'stats' => [
			'_type' => 'stats',
			'is_active' => true,
			'title' => 'Real results.<br class="lg:hidden"> Proven at scale.',
			'stats_list' => [
				[
					'stat_value' => '$500M+',
					'copy' => 'In referral-driven <strong>revenue</strong> tracked',
					'image' => $num_1_id ?: '',
					'key' => 'revenue'
				],
				[
					'stat_value' => 'Up to 20%',
					'copy' => '<strong>Revenue growth</strong> for drtalk practices in year one',
					'image' => $num_2_id ?: '',
					'key' => 'growth'
				],
				[
					'stat_value' => '1,500+',
					'copy' => '<strong>Practices</strong> on drtalk nationwide',
					'image' => $num_3_id ?: '',
					'key' => 'practices'
				],
				[
					'stat_value' => '70%',
					'copy' => '<strong>Faster</strong> time-to-scheduled appointment',
					'image' => $num_4_id ?: '',
					'key' => 'faster'
				],
				[
					'stat_value' => '60%',
					'copy' =>
						'<strong>Reduction</strong> in admin<span class="numbers-card-copy-break"><br></span> workload',
					'image' => $num_5_id ?: '',
					'key' => 'workload'
				]
			]
		],
		'personas' => [
			'_type' => 'personas',
			'is_active' => true,
			'title' => 'The same platform, different relief for everyone it touches.',
			'button_text' => 'Book a Demo Today',
			'button_url' => '',
			'button_subtext' => '30 minutes. No pitch, no obligation.',
			'personas_list' => [
				[
					'label' => 'Dental Specialists',
					'title' => 'Be the First Choice for Referrals',
					'description' =>
						'Your reputation earns the referral. Your system keeps it. drtalk helps you ensure every referral is handled - and every GP knows it.',
					'tone' => 'lilac',
					'image' => $persona_1_id ?: ''
				],
				[
					'label' => 'Office Managers',
					'title' => 'Run the Office Like a Pro',
					'description' =>
						'No more chasing faxes or hunting through email threads. Every referral is visible, assigned, and tracked in one place. Less chaos, clearer ownership, smoother days.',
					'tone' => 'orange',
					'image' => $persona_2_id ?: ''
				],
				[
					'label' => 'Referring GPs',
					'title' => 'Referring Shouldn’t Be a Hassle',
					'description' =>
						'No more patient handoffs that fall through the cracks. Send referrals the way you already work and get fast, clear communication back. Free for referring dentists, always.',
					'tone' => 'lilac',
					'image' => $persona_3_id ?: ''
				]
			]
		],
		'testimonials' => [
			'_type' => 'testimonials',
			'is_active' => true,
			'title' => 'For the people who use it every day.',
			'testimonials_list' => drtalk_redesign_get_cpt_testimonials_for_migration()
		],
		'founder' => [
			'_type' => 'founder',
			'is_active' => true,
			'title' => 'Built by specialists who lived the problem. Not developers who read about it.',
			'founder_image' => $founder_image_id ?: '',
			'founder_name' => 'Thomas L. Stone,<br>MD, DDS, FACS',
			'founder_role' => 'Oral & Maxillofacial Surgeon;<br>Founder of drtalk (est. 2014)',
			'story' =>
				"<p>Over more than 25 years in oral surgery, Dr. Stone watched referral workflows break under growth, GP relationships quietly cool when communication lagged, and talented staff spend hours on admin that a better system would have handled automatically.</p>\n<p>He created drtalk because no existing tool was built for the way specialist practices actually work. Not as an outsider guessing at the problem, but as someone who lived it for decades.</p>",
			'link_text' => 'Read Our Story',
			'link_url' => ''
		],
		'concerns' => [
			'_type' => 'concerns',
			'is_active' => true,
			'title' => 'Common concerns. Honest answers.',
			'concerns_list' => [
				[
					'title' => '“We already have a system for referrals.”',
					'answer' =>
						'Great - then the analysis will help you pressure-test it. We\'ll walk through how practices with similar setups handle growth, staff turnover, and GP responsiveness expectations. If your workflow holds up, you\'ll know it. If there are gaps, you\'ll see them before they become expensive.'
				],
				[
					'title' => '“I don\'t want to add another subscription.”',
					'answer' =>
						'You\'re not being asked to. The analysis is free and comes with no obligation. If after seeing how drtalk works alongside your current setup the ROI isn\'t obvious, it\'s probably not the right move and we\'ll say so.'
				],
				[
					'title' => '“My GPs won\'t use another platform.”',
					'answer' =>
						'They don\'t have to, and many join on their own once they realize it makes their life easier too. Free access for GPs, nothing to install, and direct secure messaging and point-of-care scheduling with your office instead of chasing calls and faxes.'
				],
				[
					'title' => '“My staff won\'t adopt another tool.”',
					'answer' =>
						'Staff resistance comes from tools that add to their workload. During the review we\'ll show specifically how drtalk reduces the daily chaos your team already deals with, not pile on top of it.'
				]
			]
		],
		'fomo' => [
			'_type' => 'fomo',
			'is_active' => true,
			'title' => 'What you lose without<br>a smart referral process.',
			'description' =>
				"The average specialist practice loses $4,640 every hour to missed and unconverted referrals.<br>Here's what's slipped by since you landed on this page:",
			'baseline' => '0',
			'hourly_rate' => '4640',
			'disclaimer' =>
				'Based on 80 referrals/mo, 58% leakage, $3,000 avg case value —<br>industry averages for specialty dental practices.'
		],
		'cta' => [
			'_type' => 'cta',
			'is_active' => true,
			'title' => 'Your referral workflow has gaps.',
			'subtitle' => 'Give us 30 minutes and we’ll find them.',
			'cta_steps' => [
				[
					'icon' => $cta_1_id ?: '',
					'step_title' => 'We learn your workflow',
					'step_copy' =>
						'How referrals come in today, who handles them, and how it gets back to referring GPs.'
				],
				[
					'icon' => $cta_2_id ?: '',
					'step_title' => 'We show you the breakpoints',
					'step_copy' =>
						'We give you a score and highlight common pain points for practices with similar setups.'
				],
				[
					'icon' => $cta_3_id ?: '',
					'step_title' => 'You keep the full findings',
					'step_copy' =>
						'A written analysis summary is yours to keep, regardless of what you decide to do next.'
				],
				[
					'icon' => $cta_4_id ?: '',
					'step_title' => 'No follow up pressure',
					'step_copy' =>
						"If drtalk isn't right for your practice, we'll tell you that. Our job is to be useful. Not to close you."
				]
			],
			'button_text' => 'Claim Your Free Referral Gap Analysis',
			'button_url' => '',
			'subtext' => '30 minutes. No obligation<br>Best with practice owner + office manager.',
			'noise_pattern' => $cta_noise_id ?: ''
		],
		'faq' => [
			'_type' => 'faq',
			'is_active' => true,
			'title' => 'Frequently Asked Questions',
			'plus_icon' => $plus_icon_id ?: '',
			'faq_categories' => [
				[
					'category_name' => 'Referrals & Workflow',
					'faq_questions' => [
						[
							'question' => 'How does drtalk help reduce referral leakage?',
							'answer' => sprintf(
								'Referral leakage, patients who are referred but never schedule or complete treatment, is one of the biggest sources of lost revenue in specialty practice. drtalk gives your team a shared dashboard where every referral is tracked in real time, from the moment it\'s sent to the moment the patient is seen. Nothing gets lost in a fax pile, a missed call, or an unread email. Practices using drtalk consistently recover a significant portion of referrals that would otherwise fall through the cracks. <a href="%s" target="_blank" rel="noreferrer" class="font-bold underline text-purple-dark hover:text-purple">Book your free Referral Gap Analysis</a> now to see how referral leakage is affecting your practice.',
								$referral_gap_url
							)
						],
						[
							'question' => 'Do my referring GPs need to learn a new system?',
							'answer' =>
								'No. drtalk is designed to work with how your referring offices already operate. GPs can still send referrals through their existing email or e-fax with nothing to install and no logins required. Many join drtalk on their own once they see it\'s free and replaces the phone tag with direct secure messaging.'
						],
						[
							'question' => "What happens to a referral once it's sent?",
							'answer' =>
								'Every referral lands in a shared practice dashboard visible to your whole team, not just one person\'s inbox. Your staff can see the referral status, exchange messages and documents with the referring office, and track the patient through to a scheduled appointment. Because the whole team is looped in, there\'s no gap in coverage if someone is out, and no referral gets missed because it was sitting unseen in one person\'s queue.'
						],
						[
							'question' => 'Is drtalk built for dental, or for broader healthcare?',
							'answer' =>
								'drtalk supports healthcare teams broadly, but it was purpose-built for dentistry and has the deepest functionality for dental specialists. The referral workflows, communication tools, and practice dashboard are all tuned for the realities of dental referrals. If you\'re a dental specialist looking to tighten your referral network and reduce patient drop-off, drtalk was built with your practice in mind.'
						],
						[
							'question' => 'Will my team actually adopt this, or will it just add more steps?',
							'answer' =>
								'The teams that adopt drtalk fastest are the ones who\'ve been burned by referrals going quiet - staff who\'ve spent time chasing down faxes, fielding \'did you get our referral?\' calls, or finding out weeks later that a patient never scheduled. drtalk reduces that noise immediately. Most practices see their team self-motivated to use it once they realize they\'re not losing track of cases anymore. Onboarding is straightforward, and we work with your team directly to make sure adoption sticks.'
						],
						[
							'question' => 'Does drtalk integrate with my existing EMR or practice management software?',
							'answer' => sprintf(
								'Yes, drtalk has EMR integration capability. The specifics depend on your current system - <a href="%s" target="_blank" rel="noreferrer" class="font-bold underline text-purple-dark hover:text-purple">book a working session</a> with our team and we\'ll walk through exactly how drtalk fits into your existing setup, including what\'s possible with your practice management software.',
								$referral_gap_url
							)
						]
					]
				],
				[
					'category_name' => 'Security & Compliance',
					'faq_questions' => [
						[
							'question' => 'Is drtalk HIPAA compliant and secure?',
							'answer' => sprintf(
								'Yes. drtalk uses AES-256 encryption - the standard trusted by the U.S. government for sensitive data - for all messages, files, and referrals, both in transit and at rest. Every user on the network has a signed <a href="%s" class="font-bold underline text-purple-dark hover:text-purple">Business Associate Agreement (BAA)</a>, role-based access controls are in place, and all Protected Health Information (PHI) is stored in a secure, encrypted cloud environment. drtalk was built for healthcare from the ground up, so compliance isn\'t an afterthought, it\'s the foundation.',
								$baa_url
							)
						],
						[
							'question' => 'How is drtalk different from just using email or secure email?',
							'answer' =>
								'Email - even \'secure\' email - puts the burden of compliance on both ends of the conversation. There\'s no guarantee the recipient is compliant, no visibility into whether a message was acted on, and no structured way to track a referral through to completion. drtalk gives you a verified, encrypted network where every participant has a signed BAA, every referral is tracked, and your team has a clear record of every communication. It\'s the difference between hoping a referral gets through and knowing it did.'
						]
					]
				],
				[
					'category_name' => 'Pricing & Getting Started',
					'faq_questions' => [
						[
							'question' => 'How much does drtalk cost?',
							'answer' => sprintf(
								'drtalk offers a free trial so you can explore the platform and see how it fits your practice before committing to anything. <a href="%s" target="_blank" rel="noreferrer" class="font-bold underline text-purple-dark hover:text-purple">Book a free Referral Gap Analysis</a> to help you figure out the right plan for your practice.',
								$referral_gap_url
							)
						],
						[
							'question' => 'Is there a contract or setup fee?',
							'answer' =>
								'No contract and no setup fee. Our team will help you connect your referral workflows and get your staff up to speed so you\'re seeing value quickly, not eventually.'
						],
						[
							'question' => 'How many people from my practice can use drtalk?',
							'answer' => sprintf(
								'Plans include unlimited team members per location with front desk, assistants, coordinators, and providers all included. If you\'re evaluating drtalk as an enterprise solution, <a href="%s" class="font-bold underline text-purple-dark hover:text-purple">let us know</a> and we\'ll walk you through what\'s available now and what\'s coming.',
								$contact_url
							)
						],
						[
							'question' => 'How quickly will we see results?',
							'answer' => sprintf(
								'Most practices start seeing a difference within the first few weeks - referrals that would have gone quiet get followed up, patients who would have slipped through get scheduled, and staff spend less time chasing. The longer-term impact is a tighter referral network and a measurable reduction in leakage. The best way to see what\'s possible for your practice specifically is by <a href="%s" target="_blank" rel="noreferrer" class="font-bold underline text-purple-dark hover:text-purple">booking a Referral Gap Analysis working session</a> - we\'ll show you exactly where the gaps are and what closing them is worth.',
								$referral_gap_url
							)
						],
						[
							'question' => 'How do I get started?',
							'answer' => sprintf(
								'<a href="%s" target="_blank" rel="noreferrer" class="font-bold underline text-purple-dark hover:text-purple">Book a 30-minute working session</a> with our team. We\'ll map your current referral workflow, show you where drtalk fits in, and get your practice set up for a free trial if you think drtalk is a fit. No pressure, no obligation.',
								$referral_gap_url
							)
						]
					]
				]
			]
		]
	];
}

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

	$default_blocks_map = drtalk_redesign_get_default_home_blocks();
	carbon_set_theme_option('home_blocks', array_values($default_blocks_map));
	update_option('drtalk_home_blocks_seeded_v1', 1);
}
add_action('admin_init', 'drtalk_redesign_seed_home_blocks');

/**
 * Automatically ensures all 14 canonical blocks exist in Carbon Fields home_blocks and migrates CPT testimonials.
 */
function drtalk_redesign_sync_blocks_to_carbon()
{
	if (!function_exists('carbon_get_theme_option') || !function_exists('carbon_set_theme_option')) {
		return;
	}

	$blocks = carbon_get_theme_option('home_blocks');
	if (!is_array($blocks) || empty($blocks)) {
		drtalk_redesign_seed_home_blocks(true);
		return;
	}

	$existing_types = array_filter(array_column($blocks, '_type'));
	$canonical_types = drtalk_redesign_get_canonical_home_block_types();
	$needs_merge =
		count(array_unique($existing_types)) !== count($blocks) ||
		!empty(array_diff($canonical_types, $existing_types));
	$merged = $needs_merge
		? drtalk_redesign_merge_home_blocks($blocks, drtalk_redesign_get_default_home_blocks())
		: ['blocks' => $blocks, 'modified' => false];
	$blocks = $merged['blocks'];
	$modified = $merged['modified'];

	foreach ($blocks as &$block) {
		if (isset($block['_type']) && $block['_type'] === 'testimonials' && empty($block['testimonials_list'])) {
			$items = drtalk_redesign_get_cpt_testimonials_for_migration();
			if (!empty($items)) {
				$block['testimonials_list'] = $items;
				$modified = true;
			}
			break;
		}
	}
	unset($block);

	if (!has_site_icon()) {
		$site_icon_id = drtalk_redesign_get_or_create_theme_attachment(
			'assets/images/favicon/android-chrome-512x512.png',
			'drtalk Site Icon'
		);
		if ($site_icon_id) {
			update_option('site_icon', $site_icon_id);
		}
	}

	if ($modified) {
		carbon_set_theme_option('home_blocks', $blocks);
	}
}
add_action('admin_init', 'drtalk_redesign_sync_blocks_to_carbon', 30);

/**
 * Ensures missing blocks are synced when visiting front-end before admin.
 */
function drtalk_redesign_maybe_sync_frontend()
{
	if (is_admin() || wp_doing_ajax() || wp_doing_cron()) {
		return;
	}
	if (!function_exists('carbon_get_theme_option')) {
		return;
	}
	$blocks = carbon_get_theme_option('home_blocks');
	if (empty($blocks) || count($blocks) < 14) {
		drtalk_redesign_sync_blocks_to_carbon();
	}
}
add_action('init', 'drtalk_redesign_maybe_sync_frontend', 40);
