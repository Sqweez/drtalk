<?php

$hero_image_url = esc_url(get_theme_file_uri('assets/images/about-hero.webp'));
$testimonial_image_url = esc_url(get_theme_file_uri('assets/images/dr-vic-martel.png'));

get_header();
?>
<section class="bg-cream px-10 pb-24 pt-16">
	<div class="mx-auto flex max-w-[75rem] items-center gap-16">
		<div class="flex min-h-[38rem] flex-1 flex-col justify-between py-10">
			<div class="max-w-[34rem]">
				<h1 class="text-6xl leading-[1.05] text-purple-dark">HIPPA compliant business tool</h1>
				<p class="mt-8 max-w-[34rem] text-xl leading-8 text-purple-dark/80">drtalk is a HIPPA compliant business tool designed specifically for healthcare practice operations.</p>
			</div>

			<div>
				<p class="text-base leading-6 text-purple-dark/60">Unmatched engagement and efficiency</p>
				<div class="mt-4 flex gap-10">
					<div class="w-32"><p class="font-heading text-4xl font-semibold text-purple-dark">400x</p><p class="mt-1 text-sm leading-5 text-purple-dark">More engagement</p></div>
					<div class="w-40"><p class="font-heading text-4xl font-semibold text-purple-dark">+$200m</p><p class="mt-1 text-sm leading-5 text-purple-dark">new referral generated revenue</p></div>
					<div class="w-40"><p class="font-heading text-4xl font-semibold text-purple-dark">60%</p><p class="mt-1 text-sm leading-5 text-purple-dark">Improved operational efficiency</p></div>
				</div>
			</div>
		</div>
		<div class="flex flex-1 justify-end">
			<img class="w-full max-w-[32rem] object-contain" src="<?php echo $hero_image_url; ?>" width="512" height="569" alt="<?php esc_attr_e(
	'Healthcare Platform Interface',
	'drtalk-redesign'
); ?>">
		</div>
	</div>
</section>

<section class="mx-auto max-w-4xl px-10 py-28 text-purple-dark">
	<h2 class="text-center text-5xl">Excellence in Healthcare</h2>
	<div class="mt-16 text-xl leading-8 text-purple-dark/80">
		<p>DrTalk is a HIPAA-compliant business tool designed to revolutionize medical and dental practice operations by ensuring data security, improving workflows, and fostering trust. It safeguards Protected Health Information (PHI) both at rest and in transit, enabling healthcare providers to focus on delivering quality care without the risks of data breaches. DrTalk streamlines communication between healthcare professionals, patients, and vendors, minimizing delays in diagnosis, treatment, and administrative tasks for better outcomes.</p>
		<p class="mt-6">It also enhances collaboration by offering secure virtual classroom channels where participants can earn continuing education credits on the go.</p>
		<p class="mt-6">By prioritizing data security, DrTalk fosters patient trust, enabling openness that leads to better diagnoses and personalized care. Its advanced features, such as automated data encryption, role-based access, and secure cloud storage, improves operational efficiency while reducing errors. Additionally, DrTalk supports data-driven decision-making by securely analyzing healthcare data to identify trends and implement evidence-based practices.</p>
		<p class="mt-6">As a cornerstone of modern healthcare excellence, DrTalk empowers organizations to innovate responsibly while maintaining regulatory compliance and safeguarding patient rights.</p>
	</div>
</section>

<section class="bg-lilac px-10 py-24" aria-labelledby="testimonial-title">
	<div class="mx-auto flex max-w-[59rem] flex-row-reverse items-start gap-10">
		<div class="flex-1 pt-6">
			<blockquote class="text-[1.375rem] font-light leading-8 text-purple-dark">
				<p>“ I have been involved with dental education for over 30 years and this is the most exciting innovation I have seen. As an industry leader using drtalk, I can monetize and scale my content and grow my audience from my home.”</p>
			</blockquote>
		</div>
		<div class="w-80 shrink-0">
			<img class="w-full rounded-2xl object-contain" src="<?php echo $testimonial_image_url; ?>" width="748" height="478" alt="<?php esc_attr_e(
	'Dr. Vic Martel in his practice',
	'drtalk-redesign'
); ?>">
			<div class="mt-6 text-purple-dark">
				<h2 id="testimonial-title" class="text-xl font-semibold">Dr. Vic Martel</h2>
				<p class="mt-1 text-sm leading-8">Restorative Dentist and Lecturer</p>
			</div>
		</div>
	</div>
</section>
<?php get_footer();
