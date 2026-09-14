<?php

if (!defined('ABSPATH') && PHP_SAPI !== 'cli') {
	exit();
}

/**
 * Returns the canonical home-page block order.
 *
 * @return string[]
 */
function drtalk_redesign_get_canonical_home_block_types()
{
	return [
		'hero',
		'partners',
		'problem_cards',
		'calculator',
		'how_it_works',
		'responsiveness',
		'stats',
		'personas',
		'testimonials',
		'founder',
		'concerns',
		'fomo',
		'cta',
		'faq'
	];
}

/**
 * Adds missing canonical blocks without overwriting existing content.
 *
 * Existing user order is preserved when the collection is already complete.
 * During a migration, canonical blocks are restored in canonical order.
 *
 * @param array $blocks
 * @param array $default_blocks_map
 * @return array{blocks: array, modified: bool}
 */
function drtalk_redesign_merge_home_blocks($blocks, $default_blocks_map)
{
	$blocks_by_type = [];
	foreach ($blocks as $block) {
		if (isset($block['_type']) && !isset($blocks_by_type[$block['_type']])) {
			$blocks_by_type[$block['_type']] = $block;
		}
	}

	$modified = count($blocks_by_type) !== count($blocks);
	foreach (drtalk_redesign_get_canonical_home_block_types() as $type) {
		if (!isset($blocks_by_type[$type]) && isset($default_blocks_map[$type])) {
			$blocks_by_type[$type] = $default_blocks_map[$type];
			$modified = true;
		}
	}

	if (!$modified) {
		return ['blocks' => $blocks, 'modified' => false];
	}

	$ordered_blocks = [];
	foreach (drtalk_redesign_get_canonical_home_block_types() as $type) {
		if (isset($blocks_by_type[$type])) {
			$ordered_blocks[] = $blocks_by_type[$type];
			unset($blocks_by_type[$type]);
		}
	}

	return ['blocks' => array_merge($ordered_blocks, array_values($blocks_by_type)), 'modified' => true];
}

/**
 * Filters disabled or malformed blocks without changing their order.
 *
 * @param array $blocks
 * @return array
 */
function drtalk_redesign_get_renderable_home_blocks($blocks)
{
	return array_values(
		array_filter($blocks, function ($block) {
			return !empty($block['_type']) && (!isset($block['is_active']) || (bool) $block['is_active']);
		})
	);
}

/**
 * Normalizes calculator settings into a finite, usable range.
 *
 * @return array{value: int, minimum: int, maximum: int, step: int}
 */
function drtalk_redesign_normalize_calculator_range(
	$value,
	$minimum,
	$maximum,
	$step,
	$fallback_value,
	$fallback_minimum,
	$fallback_maximum,
	$fallback_step
) {
	$value = is_numeric($value) ? (int) $value : (int) $fallback_value;
	$minimum = is_numeric($minimum) ? (int) $minimum : (int) $fallback_minimum;
	$maximum = is_numeric($maximum) ? (int) $maximum : (int) $fallback_maximum;
	$step = is_numeric($step) ? (int) $step : (int) $fallback_step;

	if ($maximum <= $minimum) {
		$minimum = (int) $fallback_minimum;
		$maximum = (int) $fallback_maximum;
		$value = (int) $fallback_value;
	}
	if ($step <= 0) {
		$step = max(1, (int) $fallback_step);
	}

	return [
		'value' => max($minimum, min($maximum, $value)),
		'minimum' => $minimum,
		'maximum' => $maximum,
		'step' => $step
	];
}
