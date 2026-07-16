<?php

$demo_url = esc_url(drtalk_redesign_demo_url());
$hero_art_url = esc_url(get_theme_file_uri('assets/images/hero-art.png'));

get_header();
?>
<section class="px-5 pb-[88px] pt-10 sm:px-8 lg:px-10">
	<div class="mx-auto grid max-w-[75rem] gap-2 overflow-hidden rounded-lg lg:grid-cols-2">
		<div class="relative flex min-h-[35rem] flex-col items-center justify-center overflow-hidden rounded-3xl bg-purple-dark px-8 py-12 text-center sm:px-12">
			<div class="absolute inset-0 bg-[radial-gradient(circle_at_10%_10%,rgba(243,232,247,0.14),transparent_36%),radial-gradient(circle_at_80%_90%,rgba(135,59,183,0.32),transparent_46%)]"></div>
			<div class="relative max-w-[31rem]">
				<p class="text-[0.8125rem] font-black uppercase tracking-[0.15em] text-lilac">Built by Dentists for Dentists</p>
				<h1 class="mt-4 text-[2.75rem] leading-[1.1] text-cream sm:text-5xl">Stop Losing Referrals You Never Know You Missed</h1>
				<p class="mt-4 text-lg leading-6 text-lilac/75">Invisible referral leaks cost your practice revenue. Plug the gaps with DrTalk. Put AI to work for your office to seamlessly capture, track, and close every referral.</p>
				<div class="mt-8">
					<a class="button-primary" href="<?php echo $demo_url; ?>" target="_blank" rel="noreferrer">Claim Your Free Referral Gap Analysis</a>
					<p class="mt-4 text-sm text-lilac/75">30 minutes. We do the work. You keep the report. No pitch, no obligation.</p>
				</div>
			</div>
		</div>
		<div class="min-h-[28rem] overflow-hidden rounded-3xl bg-lilac lg:min-h-[35rem]">
			<img class="size-full object-cover" src="<?php echo $hero_art_url; ?>" width="596" height="560" alt="<?php esc_attr_e(
	'A DrTalk referral dashboard and healthcare illustrations',
	'drtalk-redesign'
); ?>">
		</div>
	</div>
</section>

<section class="site-container pb-20 text-center lg:pb-28">
	<p class="text-sm font-black uppercase tracking-[0.12em] text-purple">Referral conversations, connected</p>
	<h2 class="mx-auto mt-4 max-w-3xl text-4xl leading-tight sm:text-5xl">A clearer path from referral to treatment</h2>
	<p class="mx-auto mt-6 max-w-2xl text-lg leading-7 text-purple-dark/75">DrTalk gives practices visibility into each referral, so every patient gets timely care and every opportunity stays on track.</p>
	<div class="mt-10 grid gap-4 text-left md:grid-cols-3">
		<div class="rounded-3xl bg-lilac p-7"><p class="font-heading text-3xl font-semibold">Capture</p><p class="mt-3 leading-6 text-purple-dark/75">See referral activity in one place instead of relying on manual follow-up.</p></div>
		<div class="rounded-3xl bg-cream p-7 ring-1 ring-purple-dark/10"><p class="font-heading text-3xl font-semibold">Track</p><p class="mt-3 leading-6 text-purple-dark/75">Know where every patient is in the referral journey and what needs attention.</p></div>
		<div class="rounded-3xl bg-purple-dark p-7 text-cream"><p class="font-heading text-3xl font-semibold">Close</p><p class="mt-3 leading-6 text-lilac/75">Turn overlooked gaps into better care, stronger relationships, and healthy growth.</p></div>
	</div>
</section>
<?php get_template_part('template-parts/home', 'faq'); ?>
<?php get_footer();
