<?php

if (!defined('ABSPATH')) {
	exit();
}

/**
 * Adds the theme settings page under Settings.
 */
function drtalk_redesign_add_settings_page()
{
	add_options_page(
		__('drtalk settings', 'drtalk-redesign'),
		__('drtalk', 'drtalk-redesign'),
		'manage_options',
		'drtalk-settings',
		'drtalk_redesign_render_settings_page'
	);
}
add_action('admin_menu', 'drtalk_redesign_add_settings_page');

/**
 * Registers the stored settings and their fields.
 */
function drtalk_redesign_register_settings()
{
	register_setting('drtalk_redesign_settings', 'drtalk_contact_email', [
		'type' => 'string',
		'default' => drtalk_redesign_default_contact_email(),
		'sanitize_callback' => 'drtalk_redesign_sanitize_contact_email'
	]);

	add_settings_section(
		'drtalk_redesign_contact',
		__('Contact', 'drtalk-redesign'),
		'__return_false',
		'drtalk-settings'
	);

	add_settings_field(
		'drtalk_contact_email',
		__('Contact email', 'drtalk-redesign'),
		'drtalk_redesign_render_contact_email_field',
		'drtalk-settings',
		'drtalk_redesign_contact'
	);
}
add_action('admin_init', 'drtalk_redesign_register_settings');

function drtalk_redesign_render_contact_email_field()
{
	printf(
		'<input type="email" class="regular-text" name="drtalk_contact_email" value="%1$s" placeholder="%2$s"><p class="description">%3$s</p>',
		esc_attr(drtalk_redesign_contact_email()),
		esc_attr(drtalk_redesign_default_contact_email()),
		esc_html__('Used by the "Contact Us" links across the site.', 'drtalk-redesign')
	);
}

function drtalk_redesign_render_settings_page()
{
	if (!current_user_can('manage_options')) {
		return;
	}
	?>
	<div class="wrap">
		<h1><?php echo esc_html(get_admin_page_title()); ?></h1>
		<form action="options.php" method="post">
			<?php
   settings_fields('drtalk_redesign_settings');
   do_settings_sections('drtalk-settings');
   submit_button();
   ?>
		</form>
	</div>
	<?php
}

/**
 * Keeps the stored address a valid email, falling back to the theme default.
 */
function drtalk_redesign_sanitize_contact_email($value)
{
	$email = sanitize_email($value);

	return is_email($email) ? $email : drtalk_redesign_default_contact_email();
}
