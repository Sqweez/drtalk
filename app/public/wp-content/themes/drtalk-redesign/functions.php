<?php

if (!defined('ABSPATH')) {
	exit();
}

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
