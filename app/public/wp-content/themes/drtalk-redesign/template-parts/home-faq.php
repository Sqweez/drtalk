<?php

$demo_url = esc_url(drtalk_redesign_demo_url());
$referral_gap_analysis_url = esc_url(drtalk_redesign_referral_gap_analysis_url());
$baa_url = esc_url(home_url('/business-associates-agreement/'));
$contact_url = esc_url(drtalk_redesign_contact_url());

$faq_categories = [
	[
		'id' => 'referrals',
		'label' => 'Referrals & Workflow',
		'questions' => [
			[
				'question' => 'How does drtalk help reduce referral leakage?',
				'answer' => sprintf(
					'Referral leakage, patients who are referred but never schedule or complete treatment, is one of the biggest sources of lost revenue in specialty practice. drtalk gives your team a shared dashboard where every referral is tracked in real time, from the moment it\'s sent to the moment the patient is seen. Nothing gets lost in a fax pile, a missed call, or an unread email. Practices using drtalk consistently recover a significant portion of referrals that would otherwise fall through the cracks. <a href="%s" target="_blank" rel="noreferrer" class="font-bold underline text-purple-dark hover:text-purple">Book your free Referral Gap Analysis</a> now to see how referral leakage is affecting your practice.',
					$referral_gap_analysis_url
				)
			],
			[
				'question' => 'Do my referring GPs need to learn a new system?',
				'answer' =>
					'No. drtalk is designed to work with how your referring offices already operate. GPs can still send referrals through their existing email or e-fax with nothing to install and no logins required. Many join drtalk on their own once they see it\'s free and replaces the phone tag with direct secure messaging.'
			],
			[
				'question' => "What happens to a referral once it's sent?",
				'answer' =>
					'Every referral lands in a shared practice dashboard visible to your whole team, not just one person\'s inbox. Your staff can see the referral status, exchange messages and documents with the referring office, and track the patient through to a scheduled appointment. Because the whole team is looped in, there\'s no gap in coverage if someone is out, and no referral gets missed because it was sitting unseen in one person\'s queue.'
			],
			[
				'question' => 'Is drtalk built for dental, or for broader healthcare?',
				'answer' =>
					'drtalk supports healthcare teams broadly, but it was purpose-built for dentistry and has the deepest functionality for dental specialists. The referral workflows, communication tools, and practice dashboard are all tuned for the realities of dental referrals. If you\'re a dental specialist looking to tighten your referral network and reduce patient drop-off, drtalk was built with your practice in mind.'
			],
			[
				'question' => 'Will my team actually adopt this, or will it just add more steps?',
				'answer' =>
					'The teams that adopt drtalk fastest are the ones who\'ve been burned by referrals going quiet - staff who\'ve spent time chasing down faxes, fielding \'did you get our referral?\' calls, or finding out weeks later that a patient never scheduled. drtalk reduces that noise immediately. Most practices see their team self-motivated to use it once they realize they\'re not losing track of cases anymore. Onboarding is straightforward, and we work with your team directly to make sure adoption sticks.'
			],
			[
				'question' => 'Does drtalk integrate with my existing EMR or practice management software?',
				'answer' => sprintf(
					'Yes, drtalk has EMR integration capability. The specifics depend on your current system - <a href="%s" target="_blank" rel="noreferrer" class="font-bold underline text-purple-dark hover:text-purple">book a working session</a> with our team and we\'ll walk through exactly how drtalk fits into your existing setup, including what\'s possible with your practice management software.',
					$demo_url
				)
			]
		]
	],
	[
		'id' => 'security',
		'label' => 'Security & Compliance',
		'questions' => [
			[
				'question' => 'Is drtalk HIPAA compliant and secure?',
				'answer' => sprintf(
					'Yes. drtalk uses AES-256 encryption - the standard trusted by the U.S. government for sensitive data - for all messages, files, and referrals, both in transit and at rest. Every user on the network has a signed <a href="%s" class="font-bold underline text-purple-dark hover:text-purple">Business Associate Agreement (BAA)</a>, role-based access controls are in place, and all Protected Health Information (PHI) is stored in a secure, encrypted cloud environment. drtalk was built for healthcare from the ground up, so compliance isn\'t an afterthought, it\'s the foundation.',
					$baa_url
				)
			],
			[
				'question' => 'How is drtalk different from just using email or secure email?',
				'answer' =>
					'Email - even \'secure\' email - puts the burden of compliance on both ends of the conversation. There\'s no guarantee the recipient is compliant, no visibility into whether a message was acted on, and no structured way to track a referral through to completion. drtalk gives you a verified, encrypted network where every participant has a signed BAA, every referral is tracked, and your team has a clear record of every communication. It\'s the difference between hoping a referral gets through and knowing it did.'
			]
		]
	],
	[
		'id' => 'pricing',
		'label' => 'Pricing & Getting Started',
		'questions' => [
			[
				'question' => 'How much does drtalk cost?',
				'answer' => sprintf(
					'drtalk offers a free trial so you can explore the platform and see how it fits your practice before committing to anything. <a href="%s" target="_blank" rel="noreferrer" class="font-bold underline text-purple-dark hover:text-purple">Book a free Referral Gap Analysis</a> to help you figure out the right plan for your practice.',
					$referral_gap_analysis_url
				)
			],
			[
				'question' => 'Is there a contract or setup fee?',
				'answer' =>
					'No contract and no setup fee. Our team will help you connect your referral workflows and get your staff up to speed so you\'re seeing value quickly, not eventually.'
			],
			[
				'question' => 'How many people from my practice can use drtalk?',
				'answer' => sprintf(
					'Plans include unlimited team members per location with front desk, assistants, coordinators, and providers all included. If you\'re evaluating drtalk as an enterprise solution, <a href="%s" class="font-bold underline text-purple-dark hover:text-purple">let us know</a> and we\'ll walk you through what\'s available now and what\'s coming.',
					$contact_url
				)
			],
			[
				'question' => 'How quickly will we see results?',
				'answer' => sprintf(
					'Most practices start seeing a difference within the first few weeks - referrals that would have gone quiet get followed up, patients who would have slipped through get scheduled, and staff spend less time chasing. The longer-term impact is a tighter referral network and a measurable reduction in leakage. The best way to see what\'s possible for your practice specifically is by <a href="%s" target="_blank" rel="noreferrer" class="font-bold underline text-purple-dark hover:text-purple">booking a Referral Gap Analysis working session</a> - we\'ll show you exactly where the gaps are and what closing them is worth.',
					$referral_gap_analysis_url
				)
			],
			[
				'question' => 'How do I get started?',
				'answer' => sprintf(
					'<a href="%s" target="_blank" rel="noreferrer" class="font-bold underline text-purple-dark hover:text-purple">Book a 30-minute working session</a> with our team. We\'ll map your current referral workflow, show you where drtalk fits in, and get your practice set up for a free trial if you think drtalk is a fit. No pressure, no obligation.',
					$demo_url
				)
			]
		]
	]
];

$faq_data_json = wp_json_encode($faq_categories, JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT);
$plus_icon_url = get_theme_file_uri('assets/images/icon-plus.svg');
?>
<section class="bg-cream px-5 py-14 lg:px-10 lg:py-[120px]" data-home-order="13" aria-labelledby="faq-title" data-faq
				 data-faq-icon="<?php echo esc_url($plus_icon_url); ?>">
	<div class="mx-auto flex w-full max-w-[75rem] flex-col items-center gap-10 lg:gap-12">
		<h2 id="faq-title" class="text-center text-4xl leading-none lg:text-5xl lg:leading-[1.1]">Frequently Asked Questions</h2>
		<div class="flex max-w-[42rem] flex-wrap items-center justify-center gap-2" role="tablist"
				 aria-label="FAQ categories" data-faq-tabs></div>
		<div class="min-h-[700px] w-full max-w-[45rem] transition-[opacity,translate] duration-[220ms] ease-[cubic-bezier(0.25,1,0.5,1)] motion-reduce:translate-y-0 motion-reduce:transition-none lg:min-h-[456px]" data-faq-content></div>
	</div>
	<script type="application/json" data-faq-data><?php echo $faq_data_json; ?></script>
</section>
