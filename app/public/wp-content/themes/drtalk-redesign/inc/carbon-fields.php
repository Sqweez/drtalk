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

	$canonical_order = [
		'hero',
		'partners',
		'problem_cards',
		'calculator',
		'how_it_works',
		'responsiveness',
		'stats',
		'personas',
		'testimonials',
		'founder',
		'concerns',
		'fomo',
		'cta',
		'faq'
	];

	$blocks_by_type = [];
	foreach ($blocks as $b) {
		if (isset($b['_type'])) {
			$blocks_by_type[$b['_type']] = $b;
		}
	}

	$default_blocks_map = null;
	$modified = false;

	foreach ($canonical_order as $type) {
		if (!isset($blocks_by_type[$type])) {
			if ($default_blocks_map === null) {
				$default_blocks_map = drtalk_redesign_get_default_home_blocks();
			}
			if (isset($default_blocks_map[$type])) {
				$blocks_by_type[$type] = $default_blocks_map[$type];
				$modified = true;
			}
		}
	}

	if (isset($blocks_by_type['testimonials'])) {
		if (empty($blocks_by_type['testimonials']['testimonials_list'])) {
			$items = drtalk_redesign_get_cpt_testimonials_for_migration();
			if (!empty($items)) {
				$blocks_by_type['testimonials']['testimonials_list'] = $items;
				$modified = true;
			}
		}
	}

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
		$ordered_blocks = [];
		foreach ($canonical_order as $type) {
			if (isset($blocks_by_type[$type])) {
				$ordered_blocks[] = $blocks_by_type[$type];
				unset($blocks_by_type[$type]);
			}
		}
		foreach ($blocks_by_type as $remaining_block) {
			$ordered_blocks[] = $remaining_block;
		}

		carbon_set_theme_option('home_blocks', $ordered_blocks);
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
