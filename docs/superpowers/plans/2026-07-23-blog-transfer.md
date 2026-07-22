# Blog Transfer Implementation Plan

> **For agentic workers:** REQUIRED SUB-SKILL: Use superpowers:subagent-driven-development (recommended) or superpowers:executing-plans to implement this plan task-by-task. Steps use checkbox (`- [ ]`) syntax for tracking.

**Goal:** Restore the legacy blog index and individual article pages in the active redesign theme.

**Architecture:** WordPress resolves the posts page with `index.php` and individual posts with `single.php`. The transferred templates retain the legacy loops and presentation while using the redesign theme shell through `get_header()` and `get_footer()`.

**Tech Stack:** WordPress PHP templates, Tailwind CSS, Local WordPress.

---

### Task 1: Restore the blog index template

**Files:**
- Modify: `app/public/wp-content/themes/drtalk-redesign/index.php`

- [ ] **Step 1: Replace the generic index markup with the legacy blog loop**

```php
<?php get_header(); ?>

<div class="flex min-h-screen flex-col" style="padding-top: var(--wp-admin--admin-bar--height, 0);">
	<div class="container mx-auto flex-1 max-w-4xl px-4 py-8 lg:pt-24">
		<?php if (have_posts()) : ?>
			<?php while (have_posts()) : the_post(); ?>
				<div class="prose max-w-none">
					<?php the_content(); ?>
				</div>
			<?php endwhile; ?>
		<?php else : ?>
			<p><?php esc_html_e('No posts found.', 'drtalk-redesign'); ?></p>
		<?php endif; ?>
	</div>
</div>

<?php get_footer(); ?>
```

- [ ] **Step 2: Build the stylesheet**

Run: `npm run build` from `app/public/wp-content/themes/drtalk-redesign`

Expected: `dist/output.css` and `dist/theme.js` are generated without errors.

### Task 2: Restore the individual article template

**Files:**
- Create: `app/public/wp-content/themes/drtalk-redesign/single.php`

- [ ] **Step 1: Add the legacy article header and WordPress Loop**

```php
<?php get_header(); ?>

<div class="flex min-h-screen flex-col" style="padding-top: var(--wp-admin--admin-bar--height, 0);">
	<div class="container mx-auto flex-1 max-w-5xl px-4 py-8 lg:pt-24">
		<?php if (have_posts()) : ?>
			<?php while (have_posts()) : the_post(); ?>
				<section class="flex w-full flex-col overflow-hidden bg-opacity-10 px-5 py-16">
					<header class="flex flex-col justify-center gap-6 leading-none text-neutral-900 sm:mx-auto sm:max-w-md lg:mx-auto lg:max-w-max lg:gap-y-8">
						<h3 class="text-center text-xl font-semibold tracking-normal text-purple-500 lg:text-2xl">Blog</h3>
						<h1 class="text-center text-3xl font-semibold leading-7 tracking-tight text-zinc-700 lg:text-5xl"><?php the_title(); ?></h1>
					</header>
				</section>
				<div class="prose max-w-none">
					<?php the_content(); ?>
				</div>
			<?php endwhile; ?>
		<?php else : ?>
			<p><?php esc_html_e('Post not found.', 'drtalk-redesign'); ?></p>
		<?php endif; ?>
	</div>
</div>

<?php get_footer(); ?>
```

- [ ] **Step 2: Check PHP syntax**

Run: `php -l app/public/wp-content/themes/drtalk-redesign/index.php && php -l app/public/wp-content/themes/drtalk-redesign/single.php`

Expected: Both commands report `No syntax errors detected`.

### Task 3: Validate the transferred routes

**Files:**
- Modify: `app/public/wp-content/themes/drtalk-redesign/dist/output.css`

- [ ] **Step 1: Check formatting and generated CSS**

Run: `npm run format:check` from `app/public/wp-content/themes/drtalk-redesign`, then `git diff --check` from the repository root.

Expected: Prettier reports all files match and Git reports no whitespace errors.

- [ ] **Step 2: Verify in Local**

Open `http://drtalk.local/blog/` and an existing post permalink. Confirm each page renders its legacy content, uses the redesign header and footer, and emits no browser-console errors.

- [ ] **Step 3: Commit the transfer**

```bash
git add app/public/wp-content/themes/drtalk-redesign/index.php \
	app/public/wp-content/themes/drtalk-redesign/single.php \
	app/public/wp-content/themes/drtalk-redesign/dist/output.css
git commit -m "Restore blog templates in redesign theme"
```
