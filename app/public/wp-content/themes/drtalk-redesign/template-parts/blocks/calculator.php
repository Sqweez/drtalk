<?php

if (!defined('ABSPATH')) {
	exit();
}

$block = isset($args['block']) ? $args['block'] : drtalk_redesign_get_home_block('calculator');

// If explicitly disabled in admin, do not render.
if ($block === false) {
	return;
}

$calculator_noise_url = esc_url(get_theme_file_uri('assets/images/personalized-pattern-dark.png'));
$calculator_noise_style = esc_attr("--calculator-noise-image: url('{$calculator_noise_url}');");

$title = isset($block['title']) ? $block['title'] : '';
$form_title = isset($block['form_title']) ? $block['form_title'] : '';

$referrals_val =
	isset($block['referrals_default']) && $block['referrals_default'] !== '' ? (int) $block['referrals_default'] : 80;
$referrals_min = isset($block['referrals_min']) && $block['referrals_min'] !== '' ? (int) $block['referrals_min'] : 10;
$referrals_max = isset($block['referrals_max']) && $block['referrals_max'] !== '' ? (int) $block['referrals_max'] : 300;

$case_val =
	isset($block['case_value_default']) && $block['case_value_default'] !== ''
		? (int) $block['case_value_default']
		: 3000;
$case_min = isset($block['case_value_min']) && $block['case_value_min'] !== '' ? (int) $block['case_value_min'] : 100;
$case_max = isset($block['case_value_max']) && $block['case_value_max'] !== '' ? (int) $block['case_value_max'] : 10000;
$case_step =
	isset($block['case_value_step']) && $block['case_value_step'] !== '' ? (int) $block['case_value_step'] : 100;

$conv_val =
	isset($block['conversion_default']) && $block['conversion_default'] !== ''
		? (int) $block['conversion_default']
		: 42;
$conv_min = isset($block['conversion_min']) && $block['conversion_min'] !== '' ? (int) $block['conversion_min'] : 0;
$conv_max = isset($block['conversion_max']) && $block['conversion_max'] !== '' ? (int) $block['conversion_max'] : 100;

$note_text = isset($block['note_text']) ? $block['note_text'] : '';
$button_text = isset($block['button_text']) ? $block['button_text'] : '';
$button_url = !empty($block['button_url'])
	? esc_url($block['button_url'])
	: esc_url(drtalk_redesign_referral_gap_analysis_url());

$calculator_inputs = [
	[
		'id' => 'referrals',
		'label' => 'Referrals per month',
		'value' => $referrals_val,
		'display_value' => number_format($referrals_val),
		'minimum' => $referrals_min,
		'minimum_label' => number_format($referrals_min),
		'maximum' => $referrals_max,
		'maximum_label' => number_format($referrals_max),
		'step' => 1,
		'prefix' => '',
		'suffix' => ''
	],
	[
		'id' => 'case-value',
		'label' => 'Average case value',
		'value' => $case_val,
		'display_value' => number_format($case_val),
		'minimum' => $case_min,
		'minimum_label' => number_format($case_min),
		'maximum' => $case_max,
		'maximum_label' => number_format($case_max),
		'step' => $case_step,
		'prefix' => '$',
		'suffix' => ''
	],
	[
		'id' => 'conversion-rate',
		'label' => 'Conversion rate',
		'value' => $conv_val,
		'display_value' => (string) $conv_val,
		'minimum' => $conv_min,
		'minimum_label' => (string) $conv_min,
		'maximum' => $conv_max,
		'maximum_label' => (string) $conv_max,
		'step' => 1,
		'prefix' => '',
		'suffix' => '%'
	]
];

// Initial math
$monthly_risk = round($referrals_val * $case_val * (1 - $conv_val / 100));
$annual_risk = $monthly_risk * 12;
?>
<section class="bg-cream px-5 py-14 lg:px-10 lg:py-[120px]" data-home-order="3" data-calculator-root>
	<div class="mx-auto flex max-w-[75rem] flex-col items-center gap-10 lg:gap-16">
		<h2 class="w-full text-center text-4xl leading-none lg:text-5xl"><?php echo esc_html($title); ?></h2>
		<div class="relative flex w-full max-w-[64rem] flex-wrap content-center items-center gap-x-4 gap-y-2 overflow-hidden rounded-3xl bg-lilac p-2">
			<div class="calculator-noise pointer-events-none absolute inset-0" style="<?php echo $calculator_noise_style; ?>" aria-hidden="true"></div>
			<div class="relative flex w-full min-w-0 basis-full flex-col gap-5 rounded-[1.125rem] bg-cream p-5 lg:min-w-[20rem] lg:flex-1 lg:basis-0">
				<p class="w-full text-base leading-6 text-purple-dark"><?php echo esc_html($form_title); ?></p>
				<?php foreach ($calculator_inputs as $calculator_input): ?>
					<?php
     $calculator_label = esc_html($calculator_input['label']);
     $calculator_id = esc_attr($calculator_input['id']);
     $calculator_value = esc_attr($calculator_input['value']);
     $calculator_minimum = esc_attr($calculator_input['minimum']);
     $calculator_maximum = esc_attr($calculator_input['maximum']);
     $calculator_step = esc_attr($calculator_input['step']);
     $calculator_prefix = esc_html($calculator_input['prefix']);
     $calculator_suffix = esc_html($calculator_input['suffix']);
     $calculator_display_value = esc_attr($calculator_input['display_value']);
     $calculator_minimum_label = esc_html($calculator_prefix . $calculator_input['minimum_label'] . $calculator_suffix);
     $calculator_maximum_label = esc_html($calculator_prefix . $calculator_input['maximum_label'] . $calculator_suffix);
     ?>
					<div class="flex flex-col gap-4">
						<div class="flex items-center gap-2">
							<p class="flex-1 text-sm leading-5 text-[#736962]"><?php echo $calculator_label; ?></p>
							<div class="flex w-24 items-center rounded-[1.25rem] border border-[#d6d1cb] px-4 py-2 text-sm leading-5 text-purple-dark">
								<span><?php echo $calculator_prefix; ?></span>
								<input class="min-w-0 flex-1 bg-transparent text-sm leading-5 outline-none" type="text" inputmode="numeric" value="<?php echo $calculator_display_value; ?>" data-calculator-number="<?php echo $calculator_id; ?>" aria-label="<?php echo $calculator_label; ?>">
								<span><?php echo $calculator_suffix; ?></span>
							</div>
						</div>
						<div class="flex flex-col gap-2">
							<div class="relative h-4">
								<div class="absolute inset-x-0 top-1/2 h-1 -translate-y-1/2 rounded-lg bg-[#d6d1cb]"></div>
								<div class="absolute left-0 top-1/2 h-1 -translate-y-1/2 rounded-lg bg-purple" data-calculator-fill="<?php echo $calculator_id; ?>"></div>
								<span class="pointer-events-none absolute top-1/2 h-5 w-2 -translate-x-1/2 -translate-y-1/2 rounded-lg border-[3px] border-purple bg-cream" data-calculator-thumb="<?php echo $calculator_id; ?>"></span>
								<input class="absolute inset-0 h-4 w-full cursor-pointer opacity-0" type="range" min="<?php echo $calculator_minimum; ?>" max="<?php echo $calculator_maximum; ?>" step="<?php echo $calculator_step; ?>" value="<?php echo $calculator_value; ?>" data-calculator-input="<?php echo $calculator_id; ?>" aria-label="<?php echo $calculator_label; ?>">
							</div>
							<div class="flex justify-between text-xs leading-4 text-[#736962]">
								<span><?php echo $calculator_minimum_label; ?></span>
								<span><?php echo $calculator_maximum_label; ?></span>
							</div>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
			<div class="relative flex w-full min-w-0 basis-full flex-col gap-5 rounded-[1.125rem] p-5 text-purple-dark lg:min-w-[20rem] lg:flex-1 lg:basis-0" data-calculator-results aria-live="polite">
				<div class="flex flex-col gap-3 border-b border-purple-dark/25 pb-3">
					<p class="text-sm leading-5">Monthly revenue at risk</p>
					<p class="text-[2.5rem] leading-none" data-calculator-monthly>$<?php echo number_format($monthly_risk); ?></p>
				</div>
				<div class="flex flex-wrap gap-5 border-b border-purple-dark/25 pb-3">
					<div class="flex flex-1 flex-col gap-3">
						<p class="text-sm leading-5">Annual revenue at risk</p>
						<p class="text-2xl leading-none" data-calculator-annual>$<?php echo number_format($annual_risk); ?></p>
					</div>
					<div class="flex flex-1 flex-col gap-3">
						<p class="text-sm leading-5">Health score</p>
						<div class="flex items-baseline gap-2.5">
							<p class="text-2xl leading-none text-orange" data-calculator-health>44%</p>
							<span class="sr-only" data-calculator-health-band>Poor</span>
							<div class="flex h-5 items-center gap-1" data-calculator-health-bars>
								<?php for ($score_bar = 1; $score_bar <= 10; $score_bar++): ?>
									<span class="h-5 w-[3px] rounded-sm bg-purple-dark/40" data-calculator-health-bar></span>
								<?php endfor; ?>
							</div>
						</div>
					</div>
				</div>
				<div class="flex flex-col items-center gap-4">
					<p class="w-full text-center text-sm leading-5 text-purple-dark/75"><?php echo esc_html($note_text); ?></p>
					<a class="inline-flex min-h-16 w-full items-center justify-center whitespace-normal rounded-full bg-purple px-8 py-5 text-center text-base font-bold leading-6 text-cream min-[360px]:whitespace-nowrap" href="<?php echo $button_url; ?>" target="_blank" rel="noreferrer"><?php echo esc_html(
	$button_text
); ?></a>
				</div>
			</div>
		</div>
	</div>
</section>
