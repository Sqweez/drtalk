<?php

$faq_categories = [
	[
		'id' => 'referrals',
		'label' => 'Referrals & Workflow',
		'questions' => [
			[
				'question' => 'How does drtalk help reduce referral leakage?',
				'answer' =>
					'DrTalk gives your team a clear view of referral activity, follow-up, and next steps so opportunities are not lost between offices.'
			],
			[
				'question' => 'Do my referring GPs need to learn a new system?',
				'answer' =>
					'No. DrTalk is designed to make collaboration straightforward for referring providers without adding a complicated new workflow.'
			],
			[
				'question' => "What happens to a referral once it's sent?",
				'answer' =>
					'The referral is tracked through the workflow, giving your team visibility into its progress and the actions still needed.'
			],
			[
				'question' => 'Is drtalk built for dental, or for broader healthcare?',
				'answer' =>
					'DrTalk is built for healthcare practice operations and supports dental practices as well as broader healthcare teams.'
			],
			[
				'question' => 'Will my team actually adopt this, or will it just add more steps?',
				'answer' =>
					'The product is designed to reduce manual chasing and make the next action clear, fitting into your team’s day-to-day workflow.'
			],
			[
				'question' => 'Does drtalk integrate with my existing EMR or other software?',
				'answer' =>
					'DrTalk can work alongside existing systems. A referral analysis is the best way to review your current workflow and integration needs.'
			]
		]
	],
	[
		'id' => 'security',
		'label' => 'Security & Compliance',
		'questions' => [
			[
				'question' => 'How does drtalk protect patient information?',
				'answer' =>
					'DrTalk is built for healthcare operations with safeguards for protected health information in transit and at rest.'
			],
			[
				'question' => 'Is drtalk HIPAA compliant?',
				'answer' => 'DrTalk is designed as a HIPAA-compliant business tool for healthcare practice operations.'
			]
		]
	],
	[
		'id' => 'pricing',
		'label' => 'Pricing & Getting started',
		'questions' => [
			[
				'question' => 'How do I get started with drtalk?',
				'answer' =>
					'Start with a free referral gap analysis. In 30 minutes, we review the workflow and identify the opportunities in your practice.'
			],
			[
				'question' => 'What does the free referral analysis include?',
				'answer' => 'We do the work and you keep the report. There is no pitch and no obligation.'
			]
		]
	]
];

$faq_data_json = wp_json_encode($faq_categories, JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT);
$plus_icon_url = get_theme_file_uri('assets/images/icon-plus.svg');
?>
<section class="bg-cream px-10 py-[120px]" aria-labelledby="faq-title" data-faq data-faq-icon="<?php echo esc_url(
	$plus_icon_url
); ?>">
  <div class="mx-auto flex w-full max-w-[75rem] flex-col items-center gap-12">
    <h2 id="faq-title" class="text-center text-5xl leading-[1.1]">Frequently Asked Questions</h2>
    <div class="flex items-center justify-center gap-2 rounded-[28px] border border-[#736962] p-2" role="tablist" aria-label="FAQ categories" data-faq-tabs></div>
    <div class="w-full max-w-[45rem] transition-[opacity,transform] duration-200 ease-out" data-faq-content></div>
  </div>
  <script type="application/json" data-faq-data><?php echo $faq_data_json; ?></script>
</section>
