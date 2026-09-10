<?php

if (!defined('ABSPATH')) {
	exit();
}

/**
 * Returns the formatted, editor-supplied effective date or the WordPress fallback.
 */
function drtalk_redesign_get_legal_page_date($post_id, $fallback)
{
	$value = get_post_meta($post_id, '_drtalk_legal_effective_date', true);
	$date = DateTimeImmutable::createFromFormat('!Y-m-d', $value);

	if (!$date || $date->format('Y-m-d') !== $value) {
		return $fallback;
	}

	return $date->format('M j, Y');
}

/**
 * Registers the editable effective date for pages using the Legal template.
 */
function drtalk_redesign_add_legal_page_dates_meta_box($post)
{
	if ('page-legal.php' !== get_page_template_slug($post)) {
		return;
	}

	add_meta_box(
		'drtalk-legal-page-dates',
		__('Legal page date', 'drtalk-redesign'),
		'drtalk_redesign_render_legal_page_dates_meta_box',
		'page',
		'side',
		'default'
	);
}
add_action('add_meta_boxes_page', 'drtalk_redesign_add_legal_page_dates_meta_box');

/**
 * Renders the editable effective date for a Legal template page.
 */
function drtalk_redesign_render_legal_page_dates_meta_box($post)
{
	$effective_date = get_post_meta($post->ID, '_drtalk_legal_effective_date', true);

	wp_nonce_field('drtalk_save_legal_page_dates', 'drtalk_legal_page_dates_nonce');
	?>
	<p>
		<label for="drtalk-legal-effective-date"><?php esc_html_e('Effective date', 'drtalk-redesign'); ?></label>
		<input class="widefat" id="drtalk-legal-effective-date" name="drtalk_legal_effective_date" type="date" value="<?php echo esc_attr(
  	$effective_date
  ); ?>">
	</p>
	<p class="description"><?php esc_html_e('Leave the date empty to use the WordPress publication date.', 'drtalk-redesign'); ?></p>
	<?php
}

/**
 * Saves the editable Legal template page effective date.
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

	$value = isset($_POST['drtalk_legal_effective_date'])
		? sanitize_text_field(wp_unslash($_POST['drtalk_legal_effective_date']))
		: '';
	$date = DateTimeImmutable::createFromFormat('!Y-m-d', $value);

	if ($date && $date->format('Y-m-d') === $value) {
		update_post_meta($post_id, '_drtalk_legal_effective_date', $value);
	} else {
		delete_post_meta($post_id, '_drtalk_legal_effective_date');
	}
}
add_action('save_post_page', 'drtalk_redesign_save_legal_page_dates');
