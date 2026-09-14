<?php

require_once dirname(__DIR__) . '/inc/home-blocks.php';

function assert_same($expected, $actual, $message)
{
	if ($expected !== $actual) {
		fwrite(STDERR, $message . PHP_EOL);
		exit(1);
	}
}

$canonical_types = drtalk_redesign_get_canonical_home_block_types();
$defaults = [];
foreach ($canonical_types as $type) {
	$defaults[$type] = ['_type' => $type, 'is_active' => true];
}

$existing = [['_type' => 'hero', 'is_active' => true, 'title' => 'Edited'], ['_type' => 'stats', 'is_active' => false]];
$merged = drtalk_redesign_merge_home_blocks($existing, $defaults);

assert_same(true, $merged['modified'], 'Missing blocks should modify the collection.');
assert_same($canonical_types, array_column($merged['blocks'], '_type'), 'All canonical blocks should be added once.');
assert_same('Edited', $merged['blocks'][0]['title'], 'Existing block data must not be overwritten.');

$second_pass = drtalk_redesign_merge_home_blocks($merged['blocks'], $defaults);
assert_same(false, $second_pass['modified'], 'A second synchronization must be idempotent.');
assert_same($merged['blocks'], $second_pass['blocks'], 'A second synchronization must not duplicate blocks.');

$custom_order = [
	['_type' => 'faq', 'is_active' => true],
	['_type' => 'hero', 'is_active' => false],
	['_type' => 'cta', 'is_active' => true]
];
$renderable = drtalk_redesign_get_renderable_home_blocks($custom_order);
assert_same(
	['faq', 'cta'],
	array_column($renderable, '_type'),
	'Rendering must preserve order and skip disabled blocks.'
);

$range = drtalk_redesign_normalize_calculator_range(500, 100, 100, 0, 80, 10, 300, 1);
assert_same(
	['value' => 80, 'minimum' => 10, 'maximum' => 300, 'step' => 1],
	$range,
	'Invalid calculator settings should use safe defaults.'
);

fwrite(STDOUT, "Home block tests passed.\n");
