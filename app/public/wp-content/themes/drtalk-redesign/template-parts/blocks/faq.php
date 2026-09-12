<?php

if (!defined('ABSPATH')) {
	exit();
}

$block = isset($args['block']) ? $args['block'] : drtalk_redesign_get_home_block('faq');

// If explicitly disabled in admin, do not render.
if ($block === false) {
	return;
}

$title = isset($block['title']) && $block['title'] !== '' ? $block['title'] : 'Frequently Asked Questions';
$categories_raw = isset($block['faq_categories']) && is_array($block['faq_categories']) ? $block['faq_categories'] : [];

if (empty($categories_raw)) {
	return;
}

$faq_categories = [];
foreach ($categories_raw as $index => $cat) {
	$cat_name = isset($cat['category_name']) ? trim($cat['category_name']) : '';
	if ($cat_name === '') {
		continue;
	}

	$cat_id = sanitize_title($cat_name);
	if (empty($cat_id)) {
		$cat_id = 'cat-' . ($index + 1);
	}

	$questions_raw = isset($cat['faq_questions']) && is_array($cat['faq_questions']) ? $cat['faq_questions'] : [];
	$questions = [];
	foreach ($questions_raw as $q) {
		$question_text = isset($q['question']) ? trim($q['question']) : '';
		$answer_text = isset($q['answer']) ? trim($q['answer']) : '';
		if ($question_text !== '' || $answer_text !== '') {
			$questions[] = [
				'question' => $question_text,
				'answer' => wp_kses_post($answer_text)
			];
		}
	}

	if (!empty($questions)) {
		$faq_categories[] = [
			'id' => $cat_id,
			'label' => $cat_name,
			'questions' => $questions
		];
	}
}

if (empty($faq_categories)) {
	return;
}

$plus_icon_id = !empty($block['plus_icon']) ? absint($block['plus_icon']) : 0;
$plus_icon_url = $plus_icon_id
	? wp_get_attachment_image_url($plus_icon_id, 'full')
	: esc_url(get_theme_file_uri('assets/images/icon-plus.svg'));
$faq_data_json = wp_json_encode($faq_categories, JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT);
?>

<section class="bg-cream px-5 py-14 lg:px-10 lg:py-[120px]" data-home-order="13" aria-labelledby="faq-title" data-faq
				 data-faq-icon="<?php echo esc_url($plus_icon_url); ?>">
	<div class="mx-auto flex w-full max-w-[75rem] flex-col items-center gap-10 lg:gap-12">
		<?php if (!empty($title)): ?>
			<h2 id="faq-title" class="text-center text-4xl leading-none lg:text-5xl lg:leading-[1.1]"><?php echo esc_html(
   	$title
   ); ?></h2>
		<?php endif; ?>
		<div class="flex max-w-[42rem] flex-wrap items-center justify-center gap-2" role="tablist"
				 aria-label="FAQ categories" data-faq-tabs></div>
		<div class="w-full max-w-[45rem] transition-[opacity,translate] duration-[220ms] ease-[cubic-bezier(0.25,1,0.5,1)]" data-faq-content></div>
	</div>
	<script type="application/json" data-faq-data><?php echo $faq_data_json; ?></script>
</section>
