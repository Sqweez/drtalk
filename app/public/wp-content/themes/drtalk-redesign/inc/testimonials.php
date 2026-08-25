<?php

if (!defined('ABSPATH')) {
	exit();
}

/**
 * Registers testimonials managed from the WordPress admin.
 */
function drtalk_redesign_register_testimonial_post_type()
{
	register_post_type('testimonial', [
		'labels' => [
			'name' => __('Testimonials', 'drtalk-redesign'),
			'singular_name' => __('Testimonial', 'drtalk-redesign'),
			'add_new_item' => __('Add Testimonial', 'drtalk-redesign'),
			'edit_item' => __('Edit Testimonial', 'drtalk-redesign'),
			'new_item' => __('New Testimonial', 'drtalk-redesign'),
			'view_item' => __('View Testimonial', 'drtalk-redesign'),
			'search_items' => __('Search Testimonials', 'drtalk-redesign'),
			'not_found' => __('No testimonials found.', 'drtalk-redesign')
		],
		'public' => false,
		'show_ui' => true,
		'show_in_menu' => true,
		'show_in_rest' => true,
		'menu_icon' => 'dashicons-format-quote',
		'menu_position' => 21,
		'supports' => ['title']
	]);
}
add_action('init', 'drtalk_redesign_register_testimonial_post_type', 5);

/**
 * Clarifies that the testimonial title stores the person's name.
 */
function drtalk_redesign_testimonial_title_placeholder($title, $post)
{
	return $post->post_type === 'testimonial' ? __('Person’s name', 'drtalk-redesign') : $title;
}
add_filter('enter_title_here', 'drtalk_redesign_testimonial_title_placeholder', 10, 2);

/**
 * Adds testimonial-specific fields.
 */
function drtalk_redesign_add_testimonial_meta_boxes()
{
	add_meta_box(
		'drtalk-testimonial-details',
		__('Testimonial Details', 'drtalk-redesign'),
		'drtalk_redesign_render_testimonial_meta_box',
		'testimonial',
		'normal',
		'high'
	);
}
add_action('add_meta_boxes_testimonial', 'drtalk_redesign_add_testimonial_meta_boxes');

/**
 * Renders the testimonial details meta box.
 */
function drtalk_redesign_render_testimonial_meta_box($post)
{
	$quote = $post->post_content;
	$payoff = get_post_meta($post->ID, '_drtalk_testimonial_payoff', true);
	$role = get_post_meta($post->ID, '_drtalk_testimonial_role', true);
	$company = get_post_meta($post->ID, '_drtalk_testimonial_company', true);
	$website = get_post_meta($post->ID, '_drtalk_testimonial_website', true);
	$photo_id = get_post_thumbnail_id($post->ID);
	$photo_url = $photo_id ? wp_get_attachment_image_url($photo_id, 'medium') : '';
	$logo_id = absint(get_post_meta($post->ID, '_drtalk_testimonial_logo_id', true));
	$logo_url = $logo_id ? wp_get_attachment_image_url($logo_id, 'medium') : '';

	wp_nonce_field('drtalk_save_testimonial', 'drtalk_testimonial_nonce');
	?>
	<div class="drtalk-testimonial-form">
		<div class="drtalk-testimonial-field drtalk-testimonial-field--quote">
			<label for="drtalk-testimonial-quote"><?php esc_html_e('Quote', 'drtalk-redesign'); ?></label>
			<textarea class="widefat" id="drtalk-testimonial-quote" name="drtalk_testimonial_quote" rows="6"><?php echo esc_textarea(
   	$quote
   ); ?></textarea>
		</div>

		<div class="drtalk-testimonial-fields-grid">
			<div class="drtalk-testimonial-field">
				<label for="drtalk-testimonial-payoff"><?php esc_html_e('Pays off label', 'drtalk-redesign'); ?></label>
				<input class="widefat" id="drtalk-testimonial-payoff" name="drtalk_testimonial_payoff" type="text" value="<?php echo esc_attr(
    	$payoff
    ); ?>">
			</div>
			<div class="drtalk-testimonial-field">
				<label for="drtalk-testimonial-order"><?php esc_html_e('Carousel order', 'drtalk-redesign'); ?></label>
				<input class="small-text" id="drtalk-testimonial-order" min="0" name="drtalk_testimonial_order" type="number" value="<?php echo esc_attr(
    	$post->menu_order
    ); ?>">
			</div>
			<div class="drtalk-testimonial-field">
				<label for="drtalk-testimonial-role"><?php esc_html_e('Role', 'drtalk-redesign'); ?></label>
				<input class="widefat" id="drtalk-testimonial-role" name="drtalk_testimonial_role" type="text" value="<?php echo esc_attr(
    	$role
    ); ?>">
			</div>
			<div class="drtalk-testimonial-field">
				<label for="drtalk-testimonial-company"><?php esc_html_e('Company', 'drtalk-redesign'); ?></label>
				<input class="widefat" id="drtalk-testimonial-company" name="drtalk_testimonial_company" type="text" value="<?php echo esc_attr(
    	$company
    ); ?>">
			</div>
			<div class="drtalk-testimonial-field drtalk-testimonial-field--wide">
				<label for="drtalk-testimonial-website"><?php esc_html_e('Company website', 'drtalk-redesign'); ?></label>
				<input class="widefat" id="drtalk-testimonial-website" name="drtalk_testimonial_website" type="url" value="<?php echo esc_attr(
    	$website
    ); ?>">
			</div>
		</div>

		<div class="drtalk-testimonial-media-grid">
			<div class="drtalk-testimonial-media" data-testimonial-media-field data-media-title="<?php esc_attr_e(
   	'Choose person photo',
   	'drtalk-redesign'
   ); ?>" data-media-button="<?php esc_attr_e('Use this photo', 'drtalk-redesign'); ?>">
				<strong><?php esc_html_e('Person photo', 'drtalk-redesign'); ?></strong>
				<div class="drtalk-testimonial-media-preview drtalk-testimonial-media-preview--photo" data-testimonial-media-preview><?php if (
    	$photo_url
    ): ?><img src="<?php echo esc_url($photo_url); ?>" alt=""><?php endif; ?></div>
				<input data-testimonial-media-id name="drtalk_testimonial_photo_id" type="hidden" value="<?php echo esc_attr(
    	$photo_id
    ); ?>">
				<div class="drtalk-testimonial-media-actions">
					<button class="button" data-testimonial-media-select type="button"><?php esc_html_e(
     	'Choose photo',
     	'drtalk-redesign'
     ); ?></button>
					<button class="button-link-delete" data-testimonial-media-remove type="button"<?php echo $photo_id
     	? ''
     	: ' hidden'; ?>><?php esc_html_e('Remove', 'drtalk-redesign'); ?></button>
				</div>
			</div>

			<div class="drtalk-testimonial-media" data-testimonial-media-field data-media-title="<?php esc_attr_e(
   	'Choose company logo',
   	'drtalk-redesign'
   ); ?>" data-media-button="<?php esc_attr_e('Use this logo', 'drtalk-redesign'); ?>">
				<strong><?php esc_html_e('Company logo', 'drtalk-redesign'); ?></strong>
				<div class="drtalk-testimonial-media-preview drtalk-testimonial-media-preview--logo" data-testimonial-media-preview><?php if (
    	$logo_url
    ): ?><img src="<?php echo esc_url($logo_url); ?>" alt=""><?php endif; ?></div>
				<input data-testimonial-media-id name="drtalk_testimonial_logo_id" type="hidden" value="<?php echo esc_attr(
    	$logo_id
    ); ?>">
				<div class="drtalk-testimonial-media-actions">
					<button class="button" data-testimonial-media-select type="button"><?php esc_html_e(
     	'Choose logo',
     	'drtalk-redesign'
     ); ?></button>
					<button class="button-link-delete" data-testimonial-media-remove type="button"<?php echo $logo_id
     	? ''
     	: ' hidden'; ?>><?php esc_html_e('Remove', 'drtalk-redesign'); ?></button>
				</div>
			</div>
		</div>

		<p class="description"><?php esc_html_e(
  	'Card backgrounds alternate automatically: orange, lilac, orange, lilac.',
  	'drtalk-redesign'
  ); ?></p>
	</div>
	<?php
}

/**
 * Saves testimonial metadata.
 */
function drtalk_redesign_save_testimonial_meta($post_id)
{
	$nonce = isset($_POST['drtalk_testimonial_nonce'])
		? sanitize_text_field(wp_unslash($_POST['drtalk_testimonial_nonce']))
		: '';

	if (!wp_verify_nonce($nonce, 'drtalk_save_testimonial')) {
		return;
	}

	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
		return;
	}

	if (!current_user_can('edit_post', $post_id)) {
		return;
	}

	$text_fields = [
		'_drtalk_testimonial_payoff' => 'drtalk_testimonial_payoff',
		'_drtalk_testimonial_role' => 'drtalk_testimonial_role',
		'_drtalk_testimonial_company' => 'drtalk_testimonial_company'
	];

	foreach ($text_fields as $meta_key => $field_name) {
		$value = isset($_POST[$field_name]) ? sanitize_text_field(wp_unslash($_POST[$field_name])) : '';
		update_post_meta($post_id, $meta_key, $value);
	}

	$website = isset($_POST['drtalk_testimonial_website'])
		? esc_url_raw(wp_unslash($_POST['drtalk_testimonial_website']))
		: '';
	$quote = isset($_POST['drtalk_testimonial_quote'])
		? sanitize_textarea_field(wp_unslash($_POST['drtalk_testimonial_quote']))
		: '';
	$order = isset($_POST['drtalk_testimonial_order']) ? absint($_POST['drtalk_testimonial_order']) : 0;
	$photo_id = isset($_POST['drtalk_testimonial_photo_id']) ? absint($_POST['drtalk_testimonial_photo_id']) : 0;
	$logo_id = isset($_POST['drtalk_testimonial_logo_id']) ? absint($_POST['drtalk_testimonial_logo_id']) : 0;

	update_post_meta($post_id, '_drtalk_testimonial_website', $website);
	update_post_meta($post_id, '_drtalk_testimonial_logo_id', $logo_id);

	if ($photo_id) {
		set_post_thumbnail($post_id, $photo_id);
	} else {
		delete_post_thumbnail($post_id);
	}

	remove_action('save_post_testimonial', 'drtalk_redesign_save_testimonial_meta');
	wp_update_post([
		'ID' => $post_id,
		'post_content' => $quote,
		'menu_order' => $order
	]);
	add_action('save_post_testimonial', 'drtalk_redesign_save_testimonial_meta');
}
add_action('save_post_testimonial', 'drtalk_redesign_save_testimonial_meta');

/**
 * Styles the testimonial form and enables its media pickers.
 */
function drtalk_redesign_enqueue_testimonial_admin_assets($hook_suffix)
{
	if (!in_array($hook_suffix, ['post.php', 'post-new.php'], true)) {
		return;
	}

	$screen = get_current_screen();

	if (!$screen || $screen->post_type !== 'testimonial') {
		return;
	}

	wp_enqueue_media();

	$styles = <<<'CSS'
	.drtalk-testimonial-form { display: grid; gap: 24px; padding: 8px 4px 4px; }
	.drtalk-testimonial-field { display: grid; gap: 7px; }
	.drtalk-testimonial-field label { font-weight: 600; }
	.drtalk-testimonial-field textarea { font-size: 15px; line-height: 1.55; resize: vertical; }
	.drtalk-testimonial-fields-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 18px 24px; }
	.drtalk-testimonial-field--wide { grid-column: 1 / -1; }
	.drtalk-testimonial-media-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 24px; }
	.drtalk-testimonial-media { display: grid; gap: 12px; align-content: start; padding: 16px; border: 1px solid #dcdcde; border-radius: 6px; background: #f6f7f7; }
	.drtalk-testimonial-media-preview { display: flex; min-height: 150px; align-items: center; justify-content: center; overflow: hidden; border: 1px dashed #c3c4c7; border-radius: 4px; background: #fff; }
	.drtalk-testimonial-media-preview:empty::before { color: #646970; content: 'No image selected'; }
	.drtalk-testimonial-media-preview img { display: block; max-width: 100%; max-height: 150px; object-fit: contain; }
	.drtalk-testimonial-media-preview--photo img { width: 150px; height: 150px; border-radius: 50%; object-fit: cover; }
	.drtalk-testimonial-media-actions { display: flex; align-items: center; gap: 12px; }
	@media (max-width: 782px) { .drtalk-testimonial-fields-grid, .drtalk-testimonial-media-grid { grid-template-columns: 1fr; } .drtalk-testimonial-field--wide { grid-column: auto; } }
	CSS;

	wp_add_inline_style('common', $styles);

	$script = <<<'JS'
	document.addEventListener('click', (event) => {
	  const selectButton = event.target.closest('[data-testimonial-media-select]');
	  const removeButton = event.target.closest('[data-testimonial-media-remove]');
	  const field = event.target.closest('[data-testimonial-media-field]');

	  if (!field || (!selectButton && !removeButton)) return;

	  event.preventDefault();
	  const input = field.querySelector('[data-testimonial-media-id]');
	  const preview = field.querySelector('[data-testimonial-media-preview]');

	  if (removeButton) {
	    input.value = '';
	    preview.replaceChildren();
	    removeButton.hidden = true;
	    return;
	  }

	  const frame = wp.media({ title: field.dataset.mediaTitle, button: { text: field.dataset.mediaButton }, multiple: false });
	  frame.on('select', () => {
	    const attachment = frame.state().get('selection').first().toJSON();
	    const image = document.createElement('img');
	    image.src = attachment.sizes?.medium?.url || attachment.url;
	    image.alt = '';
	    input.value = attachment.id;
	    preview.replaceChildren(image);
	    removeButton.hidden = false;
	  });
	  frame.open();
	});
	JS;

	wp_add_inline_script('media-editor', $script);
}
add_action('admin_enqueue_scripts', 'drtalk_redesign_enqueue_testimonial_admin_assets');

/**
 * Returns the testimonials shown on the homepage.
 */
function drtalk_redesign_get_testimonials()
{
	$posts = get_posts([
		'post_type' => 'testimonial',
		'post_status' => 'publish',
		'posts_per_page' => -1,
		'orderby' => 'menu_order',
		'order' => 'ASC'
	]);

	return array_map(function ($post) {
		$logo_id = absint(get_post_meta($post->ID, '_drtalk_testimonial_logo_id', true));

		return [
			'eyebrow' => get_post_meta($post->ID, '_drtalk_testimonial_payoff', true),
			'quote' => wp_strip_all_tags($post->post_content),
			'name' => get_the_title($post),
			'role' => get_post_meta($post->ID, '_drtalk_testimonial_role', true),
			'company' => get_post_meta($post->ID, '_drtalk_testimonial_company', true),
			'website' => get_post_meta($post->ID, '_drtalk_testimonial_website', true),
			'avatar_url' => get_the_post_thumbnail_url($post, 'medium'),
			'logo_url' => $logo_id ? wp_get_attachment_image_url($logo_id, 'medium') : ''
		];
	}, $posts);
}

/**
 * Imports a bundled testimonial image into the media library.
 */
function drtalk_redesign_import_testimonial_asset($filename, $post_id, $alt_text)
{
	$source_path = get_theme_file_path('assets/images/' . $filename);

	if (!file_exists($source_path)) {
		return 0;
	}

	require_once ABSPATH . 'wp-admin/includes/file.php';
	require_once ABSPATH . 'wp-admin/includes/image.php';
	require_once ABSPATH . 'wp-admin/includes/media.php';

	$temporary_file = wp_tempnam($source_path);

	if (!$temporary_file || !copy($source_path, $temporary_file)) {
		return 0;
	}

	$attachment_id = media_handle_sideload(
		[
			'name' => basename($source_path),
			'tmp_name' => $temporary_file
		],
		$post_id,
		$alt_text
	);

	if (is_wp_error($attachment_id)) {
		@unlink($temporary_file);
		return 0;
	}

	update_post_meta($attachment_id, '_wp_attachment_image_alt', $alt_text);

	return (int) $attachment_id;
}

/**
 * Seeds the approved testimonial copy from the supplied client document once.
 */
function drtalk_redesign_seed_testimonials()
{
	if (get_option('drtalk_redesign_testimonials_seed_version') === '1') {
		return;
	}

	$testimonials = [
		[
			'name' => 'Yost Smith',
			'role' => 'Oral & Maxillofacial Surgeon',
			'company' => 'NorthShore Center for Oral & Facial Surgery and Implantology',
			'website' => 'https://nscofs.com/',
			'quote' =>
				'“Every referral is captured, tracked, and converted into scheduled appointments without manual chasing or missed connections.”',
			'payoff' => 'Capture Every Referral',
			'photo' => 'testimonial-yost-smith.png',
			'logo' => 'testimonial-1.png'
		],
		[
			'name' => 'Albert Kang',
			'role' => 'Oral & Maxillofacial Surgeon',
			'company' => 'New England Oral & Maxillofacial Surgery',
			'website' => 'https://newenglandoralsurgery.com/',
			'quote' =>
				'“drtalk has transformed our practice. Our team works in sync with referring offices, and we’ve seen a significant boost in efficiency and practice revenue.”',
			'payoff' => 'Grow Revenue',
			'photo' => 'testimonial-albert-kang.png'
		],
		[
			'name' => 'Ali Salehpour',
			'role' => 'Oral & Maxillofacial Surgeon',
			'company' => 'Oral, Facial, & Implant Surgery Center of Monterey',
			'website' => 'https://www.ofiscm.com/',
			'quote' => '“drtalk has eliminated referral leakage and increased our overall profitability.”',
			'payoff' => 'Eliminate Leakage',
			'photo' => 'testimonial-ali-salehpour.png'
		],
		[
			'name' => 'Ross Ballinger',
			'role' => 'Full Arch Director',
			'company' => 'Dental Designs',
			'website' => 'https://dentaldesignsinc.com/',
			'quote' =>
				'“Our lab runs smoother than ever. We process cases securely and stay connected with every dentist we serve.”',
			'payoff' => 'Stay Connected',
			'photo' => 'testimonial-ross-ballinger.png',
			'logo' => 'testimonial-4.png'
		],
		[
			'name' => 'Brittany Helget',
			'role' => 'Treatment Coordinator',
			'company' => 'Colorado Surgical Arts',
			'website' => 'https://cosurgicalarts.com/',
			'quote' => '“What used to take days now happens in seconds.”',
			'payoff' => 'Save Time',
			'photo' => 'testimonial-brittany-helget.png'
		],
		[
			'name' => 'Alexis Moreno',
			'role' => 'Marketing Specialist',
			'company' => 'Arizona Oral and Maxillofacial Surgeons',
			'website' => 'https://azoms.com/',
			'quote' =>
				'“drtalk makes it incredibly easy to ensure nothing falls through the cracks. I appreciate how user-friendly it is for our team and the offices we work with. It’s become an important part of how we grow and support our practice.”',
			'payoff' => 'Support Better'
		],
		[
			'name' => 'Sarah Salazar',
			'role' => 'Supervisor',
			'company' => 'Midland Oral Surgery',
			'website' => 'https://www.midlandoms.com/',
			'quote' => '“drtalk drives profitability. It’s the best business tool we’ve added to our practice.”',
			'payoff' => 'Drive Profitability'
		],
		[
			'name' => 'Jacqueline Dempster',
			'role' => 'Office Manager',
			'company' => 'Midland Oral Surgery',
			'website' => 'https://www.midlandoms.com/',
			'quote' =>
				'“drtalk pulls high-value referrals from email, e-Fax, websites, and other sources and organizes them in one dashboard instantly. What used to take days now happens in seconds.”',
			'payoff' => 'Save Time'
		],
		[
			'name' => 'Leyla',
			'role' => 'Implant Treatment Coordinator',
			'company' => 'Oral Surgery of Hawaii',
			'website' => 'https://www.oralsurgeryhawaii.com/',
			'quote' => '“With drtalk, referrals get scheduled right away and I don’t waste time looking for them.”',
			'payoff' => 'Schedule Faster'
		],
		[
			'name' => 'Gigi',
			'role' => 'Office Manager',
			'company' => 'Mark Watson DDS',
			'website' => '',
			'quote' =>
				'“I click, drag, and drop patient referrals, updates and radiographs directly – no more voicemails or endless phone tag.”',
			'payoff' => 'Improve Workflows'
		],
		[
			'name' => 'Chris Forti',
			'role' => 'Receptionist',
			'company' => 'Elevated Family Dentistry',
			'website' => 'https://www.elevatedfd.com/',
			'quote' =>
				'“I’m technologically challenged and if I can use it, you can too. It makes the referral process very easy.”',
			'payoff' => 'Implement Quickly'
		],
		[
			'name' => 'Beca Miller',
			'role' => 'Office Manager',
			'company' => 'Hillsdale Dental',
			'website' => 'https://www.hillsdaledentalcare.com/',
			'quote' =>
				'“drtalk has made communication with our specialist team seamless. I can easily access X-rays, reports, and correspondence for insurance claims with one click. It’s truly improved our patient care and workflow.”',
			'payoff' => 'Improve Care'
		],
		[
			'name' => 'Dr. Vic Martel',
			'role' => 'Restorative Dentist and Lecturer',
			'company' => 'Martel Academy',
			'website' => 'https://www.martelacademy.com/',
			'quote' =>
				'“I’ve been involved with dental education for over 30 years, and this is the most exciting innovation I have seen.”',
			'payoff' => 'Stay Ahead',
			'photo' => 'testimonial-vic-martel.png'
		]
	];

	$seed_complete = true;

	foreach ($testimonials as $order => $testimonial) {
		$slug = sanitize_title($testimonial['name']);
		$existing = get_page_by_path($slug, OBJECT, 'testimonial');

		if ($existing) {
			continue;
		}

		$post_id = wp_insert_post(
			[
				'post_type' => 'testimonial',
				'post_status' => 'publish',
				'post_title' => $testimonial['name'],
				'post_name' => $slug,
				'post_content' => $testimonial['quote'],
				'menu_order' => $order
			],
			true
		);

		if (is_wp_error($post_id)) {
			$seed_complete = false;
			continue;
		}

		update_post_meta($post_id, '_drtalk_testimonial_payoff', $testimonial['payoff']);
		update_post_meta($post_id, '_drtalk_testimonial_role', $testimonial['role']);
		update_post_meta($post_id, '_drtalk_testimonial_company', $testimonial['company']);
		update_post_meta($post_id, '_drtalk_testimonial_website', $testimonial['website']);

		if (!empty($testimonial['photo'])) {
			$photo_id = drtalk_redesign_import_testimonial_asset($testimonial['photo'], $post_id, $testimonial['name']);

			if ($photo_id) {
				set_post_thumbnail($post_id, $photo_id);
			}
		}

		if (!empty($testimonial['logo'])) {
			$logo_id = drtalk_redesign_import_testimonial_asset(
				$testimonial['logo'],
				$post_id,
				$testimonial['company']
			);

			if ($logo_id) {
				update_post_meta($post_id, '_drtalk_testimonial_logo_id', $logo_id);
			}
		}
	}

	if ($seed_complete) {
		update_option('drtalk_redesign_testimonials_seed_version', '1');
	}
}
add_action('init', 'drtalk_redesign_seed_testimonials', 20);
