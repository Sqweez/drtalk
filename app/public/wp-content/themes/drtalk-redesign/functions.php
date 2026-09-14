<?php

if (!defined('ABSPATH')) {
	exit();
}

require_once get_theme_file_path('inc/links.php');
require_once get_theme_file_path('inc/settings.php');
require_once get_theme_file_path('inc/testimonials.php');
require_once get_theme_file_path('inc/legal-page-dates.php');
require_once get_theme_file_path('inc/home-blocks.php');
require_once get_theme_file_path('inc/carbon-fields.php');

/**
 * Configures WordPress features used by the public-facing theme.
 */
function drtalk_redesign_setup()
{
	add_theme_support('automatic-feed-links');
	add_theme_support('title-tag');
	add_theme_support('post-thumbnails');
	add_theme_support('html5', ['comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script']);

	register_nav_menus([
		'primary' => __('Primary navigation', 'drtalk-redesign')
	]);
}
add_action('after_setup_theme', 'drtalk_redesign_setup');

/**
 * Enqueues the redesign typography.
 */
function drtalk_redesign_enqueue_fonts()
{
	wp_enqueue_style(
		'drtalk-redesign-fonts',
		'https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,400;0,700;0,900;1,400;1,700&family=League+Spartan:wght@400;500;600;700;800&display=swap',
		[],
		null
	);
}
add_action('wp_enqueue_scripts', 'drtalk_redesign_enqueue_fonts');

/**
 * Enqueues the compiled redesign stylesheet.
 */
function drtalk_redesign_enqueue_styles()
{
	$stylesheet_path = get_theme_file_path('dist/output.css');
	$stylesheet_version = file_exists($stylesheet_path) ? (string) filemtime($stylesheet_path) : '1.0.0';

	wp_enqueue_style('drtalk-redesign', get_theme_file_uri('dist/output.css'), [], $stylesheet_version);
}
add_action('wp_enqueue_scripts', 'drtalk_redesign_enqueue_styles');

/**
 * Enqueues small progressive-enhancement interactions for the theme shell.
 */
function drtalk_redesign_enqueue_scripts()
{
	$script_path = get_theme_file_path('dist/theme.js');
	$script_version = file_exists($script_path) ? (string) filemtime($script_path) : '1.0.0';

	wp_enqueue_script('drtalk-redesign', get_theme_file_uri('dist/theme.js'), [], $script_version, [
		'in_footer' => true
	]);
}
add_action('wp_enqueue_scripts', 'drtalk_redesign_enqueue_scripts');

/**
 * Disables sharing buttons (e.g. Jetpack Sharedaddy) on pages and single posts.
 */
function drtalk_redesign_disable_sharing_on_pages()
{
	if (is_page() || is_page_template('page-legal.php') || is_single()) {
		if (function_exists('sharing_display')) {
			remove_filter('the_content', 'sharing_display', 19);
			remove_filter('the_excerpt', 'sharing_display', 19);
		}
	}
}
add_action('template_redirect', 'drtalk_redesign_disable_sharing_on_pages');
add_action('loop_start', 'drtalk_redesign_disable_sharing_on_pages');

/**
 * Outputs modern SVG favicon, fallbacks, web manifest, and theme color in <head>.
 */
function drtalk_redesign_favicon_head_tags()
{
	$favicon_dir = get_theme_file_uri('assets/images/favicon'); ?>
	<link rel="icon" href="<?php echo esc_url($favicon_dir . '/favicon.svg'); ?>" type="image/svg+xml">
	<link rel="alternate icon" href="<?php echo esc_url(
 	$favicon_dir . '/favicon-32x32.png'
 ); ?>" type="image/png" sizes="32x32">
	<link rel="alternate icon" href="<?php echo esc_url(
 	$favicon_dir . '/favicon-16x16.png'
 ); ?>" type="image/png" sizes="16x16">
	<link rel="apple-touch-icon" href="<?php echo esc_url($favicon_dir . '/apple-touch-icon.png'); ?>" sizes="180x180">
	<link rel="manifest" href="<?php echo esc_url($favicon_dir . '/site.webmanifest'); ?>">
	<meta name="theme-color" content="#4A1E4F">
	<?php
}
add_action('wp_head', 'drtalk_redesign_favicon_head_tags', 1);
add_action('admin_head', 'drtalk_redesign_favicon_head_tags', 1);
add_action('login_head', 'drtalk_redesign_favicon_head_tags', 1);
