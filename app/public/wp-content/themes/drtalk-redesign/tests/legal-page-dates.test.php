<?php

define('ABSPATH', __DIR__);

$drtalk_test_meta = [
	42 => [
		'_drtalk_legal_published_date' => '2024-03-04',
		'_drtalk_legal_modified_date' => 'not-a-date'
	]
];

function add_action() {}

function get_post_meta($post_id, $meta_key)
{
	global $drtalk_test_meta;

	return $drtalk_test_meta[$post_id][$meta_key] ?? '';
}

require dirname(__DIR__) . '/inc/legal-page-dates.php';

assert(drtalk_redesign_get_legal_page_date(42, 'published', 'Jan 1, 2020') === 'Mar 4, 2024');
assert(drtalk_redesign_get_legal_page_date(42, 'modified', 'Jan 1, 2020') === 'Jan 1, 2020');

echo 'Legal page date tests passed' . PHP_EOL;
