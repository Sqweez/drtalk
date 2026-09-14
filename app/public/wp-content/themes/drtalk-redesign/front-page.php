<?php
get_header();

$home_blocks = drtalk_redesign_get_home_blocks();

if (!empty($home_blocks)) {
	foreach (drtalk_redesign_get_renderable_home_blocks($home_blocks) as $block) {
		$type = $block['_type'];
		$slug = str_replace('_', '-', $type);
		get_template_part('template-parts/blocks/' . $slug, null, ['block' => $block]);
	}
}

get_footer();
