<?php

if (!defined('ABSPATH')) {
	exit();
}

/**
 * Returns a formatted, editor-supplied legal page date or the WordPress fallback.
 */
function drtalk_redesign_get_legal_page_date($post_id, $date_type, $fallback)
{
	$meta_keys = [
		'published' => '_drtalk_legal_published_date',
		'modified' => '_drtalk_legal_modified_date'
	];

	if (!isset($meta_keys[$date_type])) {
		return $fallback;
	}

	$value = get_post_meta($post_id, $meta_keys[$date_type], true);
	$date = DateTimeImmutable::createFromFormat('!Y-m-d', $value);

	if (!$date || $date->format('Y-m-d') !== $value) {
		return $fallback;
	}

	return $date->format('M j, Y');
}

/**
 * Registers the editable dates for pages using the Legal template.
 */
function drtalk_redesign_add_legal_page_dates_meta_box($post)
{
	if ('page-legal.php' !== get_page_template_slug($post)) {
		return;
	}

	add_meta_box(
		'drtalk-legal-page-dates',
		__('Legal page dates', 'drtalk-redesign'),
		'drtalk_redesign_render_legal_page_dates_meta_box',
		'page',
		'side',
		'default'
	);
}
add_action('add_meta_boxes_page', 'drtalk_redesign_add_legal_page_dates_meta_box');

/**
 * Renders editable dates for a Legal template page.
 */
function drtalk_redesign_render_legal_page_dates_meta_box($post)
{
	$published_date = get_post_meta($post->ID, '_drtalk_legal_published_date', true);
	$modified_date = get_post_meta($post->ID, '_drtalk_legal_modified_date', true);

	wp_nonce_field('drtalk_save_legal_page_dates', 'drtalk_legal_page_dates_nonce');
	?>
	<p>
		<label for="drtalk-legal-published-date"><?php esc_html_e('Publication date', 'drtalk-redesign'); ?></label>
		<input class="widefat" id="drtalk-legal-published-date" name="drtalk_legal_published_date" type="date" value="<?php echo esc_attr(
  	$published_date
  ); ?>">
	</p>
	<p>
		<label for="drtalk-legal-modified-date"><?php esc_html_e('Last update date', 'drtalk-redesign'); ?></label>
		<input class="widefat" id="drtalk-legal-modified-date" name="drtalk_legal_modified_date" type="date" value="<?php echo esc_attr(
  	$modified_date
  ); ?>">
	</p>
	<p class="description"><?php esc_html_e('Leave a date empty to use the WordPress date.', 'drtalk-redesign'); ?></p>
	<?php
}

/**
 * Saves editable Legal template page dates.
 */
function drtalk_redesign_save_legal_page_dates($post_id)
{
	$nonce = isset($_POST['drtalk_legal_page_dates_nonce'])
		? sanitize_text_field(wp_unslash($_POST['drtalk_legal_page_dates_nonce']))
		: '';

	if (!wp_verify_nonce($nonce, 'drtalk_save_legal_page_dates')) {
		return;
	}

	if (
		(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) ||
		wp_is_post_autosave($post_id) ||
		wp_is_post_revision($post_id) ||
		!current_user_can('edit_post', $post_id)
	) {
		return;
	}

	$fields = [
		'_drtalk_legal_published_date' => 'drtalk_legal_published_date',
		'_drtalk_legal_modified_date' => 'drtalk_legal_modified_date'
	];

	foreach ($fields as $meta_key => $field_name) {
		$value = isset($_POST[$field_name]) ? sanitize_text_field(wp_unslash($_POST[$field_name])) : '';
		$date = DateTimeImmutable::createFromFormat('!Y-m-d', $value);

		if ($date && $date->format('Y-m-d') === $value) {
			update_post_meta($post_id, $meta_key, $value);
		} else {
			delete_post_meta($post_id, $meta_key);
		}
	}
}
add_action('save_post_page', 'drtalk_redesign_save_legal_page_dates');
