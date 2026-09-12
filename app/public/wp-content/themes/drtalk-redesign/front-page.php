<?php
get_header();

$home_blocks = drtalk_redesign_get_home_blocks();

if (!empty($home_blocks)) {
	foreach ($home_blocks as $block) {
		$type = isset($block['_type']) ? $block['_type'] : '';
		if (empty($type) || (isset($block['is_active']) && !$block['is_active'])) {
			continue;
		}
		$slug = str_replace('_', '-', $type);
		get_template_part('template-parts/blocks/' . $slug, null, ['block' => $block]);
	}
}

get_footer();
