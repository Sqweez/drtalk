<?php

if (!defined('ABSPATH')) {
	exit();
}

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
