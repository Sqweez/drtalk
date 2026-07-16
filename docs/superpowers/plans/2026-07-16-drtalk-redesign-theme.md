# DrTalk Redesign Theme Implementation Plan

> **For agentic workers:** REQUIRED SUB-SKILL: Use superpowers:subagent-driven-development (recommended) or superpowers:executing-plans to implement this plan task-by-task. Steps use checkbox (`- [ ]`) syntax for tracking.

**Goal:** Build a Figma-faithful WordPress theme at `app/public/wp-content/themes/drtalk-redesign/` while retaining every existing public route, CTA, and content flow.

**Architecture:** The new theme is a clean Tailwind 4.3 theme with a WordPress shell, CSS-first design tokens, reusable template parts, and route-specific templates. The old timestamped theme remains a read-only behaviour reference until parity validation is complete.

**Tech Stack:** PHP 8 / WordPress themes, Tailwind CSS 4.3, `@tailwindcss/postcss`, PostCSS CLI, Prettier with `@prettier/plugin-php`, npm

---

### Task 1: Establish the theme and build toolchain

**Files:**
- Create: `app/public/wp-content/themes/drtalk-redesign/style.css`
- Create: `app/public/wp-content/themes/drtalk-redesign/functions.php`
- Create: `app/public/wp-content/themes/drtalk-redesign/package.json`
- Create: `app/public/wp-content/themes/drtalk-redesign/postcss.config.mjs`
- Create: `app/public/wp-content/themes/drtalk-redesign/.prettierrc.yml`
- Create: `app/public/wp-content/themes/drtalk-redesign/.prettierignore`
- Create: `app/public/wp-content/themes/drtalk-redesign/src/input.css`
- Create: `app/public/wp-content/themes/drtalk-redesign/dist/.gitkeep`

- [ ] **Step 1:** Create a valid WordPress theme header in `style.css` with theme slug `drtalk-redesign` and text domain `drtalk-redesign`.
- [ ] **Step 2:** Define npm `build`, `watch`, `dev`, `format`, and `format:check` scripts. Use `postcss src/input.css -o dist/output.css` for builds and add `--watch` only to the watch script.
- [ ] **Step 3:** Run `npm install --save-dev tailwindcss@4.3 @tailwindcss/postcss postcss postcss-cli prettier @prettier/plugin-php` to create the lockfile. Configure `postcss.config.mjs` with `@tailwindcss/postcss`; do not install Autoprefixer or DaisyUI.
- [ ] **Step 4:** Add `@import "tailwindcss"` plus explicit `@source` directives for the new theme's PHP and JavaScript files in `src/input.css`.
- [ ] **Step 5:** Run `npm run build` in the new theme directory. Expected result: exit code 0 and generated `dist/output.css`. Future clean installs use `npm ci` from the generated lockfile.
- [ ] **Step 6:** Commit the new theme foundation with `git add app/public/wp-content/themes/drtalk-redesign && git commit -m "Create redesign theme foundation"`.

### Task 2: Encode the Figma design system

**Files:**
- Modify: `app/public/wp-content/themes/drtalk-redesign/src/input.css`
- Create: `app/public/wp-content/themes/drtalk-redesign/assets/fonts/README.md`
- Create: `app/public/wp-content/themes/drtalk-redesign/assets/images/.gitkeep`

- [ ] **Step 1:** Define named `@theme` colour tokens for cream `#F6F1EB`, lilac `#F3E8F7`, dark purple `#4A1E4F`, purple `#873BB7`, and orange `#ED8F43`.
- [ ] **Step 2:** Load League Spartan for headings and Lato for body text through an approved font delivery method, then expose them as `--font-heading` and `--font-body` `@theme` variables.
- [ ] **Step 3:** Add base typography, focus-visible, reduced-motion, container, and button styles in `src/input.css`; preserve accessible contrast on cream, purple, and orange surfaces.
- [ ] **Step 4:** Run `npm run format:check && npm run build`. Expected result: both commands exit 0.
- [ ] **Step 5:** Compare the local token showcase to Figma frames `183:192` and `208:386`, including all logo contrast variants.
- [ ] **Step 6:** Commit with `git add app/public/wp-content/themes/drtalk-redesign/src app/public/wp-content/themes/drtalk-redesign/assets && git commit -m "Add Figma design tokens"`.

### Task 3: Build the shared WordPress shell and configuration

**Files:**
- Modify: `app/public/wp-content/themes/drtalk-redesign/functions.php`
- Create: `app/public/wp-content/themes/drtalk-redesign/header.php`
- Create: `app/public/wp-content/themes/drtalk-redesign/footer.php`
- Create: `app/public/wp-content/themes/drtalk-redesign/template-parts/site-header.php`
- Create: `app/public/wp-content/themes/drtalk-redesign/template-parts/site-footer.php`
- Create: `app/public/wp-content/themes/drtalk-redesign/inc/links.php`
- Create: `app/public/wp-content/themes/drtalk-redesign/assets/js/theme.js`

- [ ] **Step 1:** Register title-tag, post thumbnails, HTML5 markup, and a primary navigation location in `functions.php`.
- [ ] **Step 2:** Enqueue `dist/output.css` and `assets/js/theme.js` with file modification times for cache busting; do not use `?cache=false`.
- [ ] **Step 3:** Define named helpers in `inc/links.php` for the current individual registration URL, practice registration URL, login URL, and demo booking URL; escape all returned URLs at output boundaries.
- [ ] **Step 4:** Build the responsive Figma header and footer as template parts, using the appropriate light or dark logo asset by background contrast.
- [ ] **Step 5:** Verify the primary menu, mobile navigation, footer links, and keyboard focus order in Local.
- [ ] **Step 6:** Commit with `git add app/public/wp-content/themes/drtalk-redesign && git commit -m "Add redesign theme shell"`.

### Task 4: Import and organise approved Figma assets

**Files:**
- Create: `app/public/wp-content/themes/drtalk-redesign/assets/images/logo/`
- Create: `app/public/wp-content/themes/drtalk-redesign/assets/images/home/`
- Create: `app/public/wp-content/themes/drtalk-redesign/assets/icons/`
- Create: `app/public/wp-content/themes/drtalk-redesign/docs/assets.md`

- [ ] **Step 1:** Download assets only through the Figma MCP asset URLs returned for the relevant Figma nodes; preserve original vector assets where available.
- [ ] **Step 2:** Store logo variants as `logo-dual`, `logo-light`, `logo-dark`, `logo-white`, and `logo-black`, using their original file extensions.
- [ ] **Step 3:** Name page imagery by semantic purpose, for example `hero-practice.webp`, `workflow-dashboard.webp`, and `founder-portrait.webp`; never retain duplicate legacy `image-*` aliases.
- [ ] **Step 4:** Record each asset's Figma node, intended page, alt-text purpose, and source filename in `docs/assets.md`.
- [ ] **Step 5:** Render the home page after asset insertion and confirm no missing image request appears in the browser network panel.
- [ ] **Step 6:** Commit with `git add app/public/wp-content/themes/drtalk-redesign && git commit -m "Add redesign assets"`.

### Task 5: Implement the first half of the Figma home page

**Files:**
- Create: `app/public/wp-content/themes/drtalk-redesign/front-page.php`
- Create: `app/public/wp-content/themes/drtalk-redesign/template-parts/home/hero.php`
- Create: `app/public/wp-content/themes/drtalk-redesign/template-parts/home/different.php`
- Create: `app/public/wp-content/themes/drtalk-redesign/template-parts/home/calculator.php`
- Create: `app/public/wp-content/themes/drtalk-redesign/template-parts/home/how-it-works.php`
- Create: `app/public/wp-content/themes/drtalk-redesign/template-parts/home/outcomes.php`

- [ ] **Step 1:** Compose `front-page.php` from template parts; keep copy and destinations in small PHP data arrays rather than duplicating CTA markup.
- [ ] **Step 2:** Implement Figma frame `344:681` (hero) with responsive image treatment, primary demo CTA, and secondary navigation actions.
- [ ] **Step 3:** Implement frames `344:745`, `344:819`, and `344:890` (problem framing, calculator, and workflow); preserve any required toggle or calculator interaction in `assets/js/theme.js`.
- [ ] **Step 4:** Implement the first `different-section` and outcome/stat content from frames `344:930` and `408:1414`.
- [ ] **Step 5:** Run `npm run format:check && npm run build`; then compare desktop and mobile renders against the corresponding Figma sections.
- [ ] **Step 6:** Verify all registration, login, and demo links resolve to the same destinations as the legacy front page.
- [ ] **Step 7:** Commit with `git add app/public/wp-content/themes/drtalk-redesign && git commit -m "Build redesign home page foundation"`.

### Task 6: Implement the remaining Figma home page sections

**Files:**
- Create: `app/public/wp-content/themes/drtalk-redesign/template-parts/home/personalized.php`
- Create: `app/public/wp-content/themes/drtalk-redesign/template-parts/home/testimonials.php`
- Create: `app/public/wp-content/themes/drtalk-redesign/template-parts/home/founder.php`
- Create: `app/public/wp-content/themes/drtalk-redesign/template-parts/home/concerns.php`
- Create: `app/public/wp-content/themes/drtalk-redesign/template-parts/home/fomo.php`
- Create: `app/public/wp-content/themes/drtalk-redesign/template-parts/home/cta.php`
- Create: `app/public/wp-content/themes/drtalk-redesign/template-parts/home/faq.php`

- [ ] **Step 1:** Implement Figma frames `344:1003`, `344:1018`, and `344:1084` for role-specific value, testimonials, and founder content.
- [ ] **Step 2:** Implement the objection carousel from `344:1100` with accessible previous/next controls, visible slide state, and keyboard operation.
- [ ] **Step 3:** Implement frames `344:1888`, `344:1143`, and `344:1171` for value loss, final CTA, and FAQ; use semantic headings, buttons, and `<details>` elements for the FAQ where they match the design.
- [ ] **Step 4:** Compare every home section with Figma frame `344:679` at desktop and mobile widths; resolve clipped text, overlap, and focus-order defects before continuing.
- [ ] **Step 5:** Run `npm run format:check && npm run build`, manually test all carousel, toggle, FAQ, and CTA interactions, then commit with `git add app/public/wp-content/themes/drtalk-redesign && git commit -m "Complete redesign home page"`.

### Task 7: Migrate the remaining public routes

**Files:**
- Create: `app/public/wp-content/themes/drtalk-redesign/page-features.php`
- Create: `app/public/wp-content/themes/drtalk-redesign/page-goals.php`
- Create: `app/public/wp-content/themes/drtalk-redesign/page-pricing.php`
- Create: `app/public/wp-content/themes/drtalk-redesign/page-about-us.php`
- Create: `app/public/wp-content/themes/drtalk-redesign/page.php`
- Create: `app/public/wp-content/themes/drtalk-redesign/index.php`
- Create: `app/public/wp-content/themes/drtalk-redesign/single.php`
- Create: `app/public/wp-content/themes/drtalk-redesign/404.php`
- Create: `app/public/wp-content/themes/drtalk-redesign/docs/route-parity.md`

- [ ] **Step 1:** Copy route names and current content requirements from the legacy templates, then record each template's required headings, CTAs, external destinations, and interactions in `docs/route-parity.md`.
- [ ] **Step 2:** Build Features, Goals, Pricing, and About as clean Figma-aligned templates while preserving their current WordPress slugs and conversion flows.
- [ ] **Step 3:** Build generic page, blog index, single-post, and 404 templates with `the_content()`, `the_title()`, and accessible post navigation where appropriate.
- [ ] **Step 4:** Run each route in Local and mark its parity checklist only after content, CTA destinations, responsive layout, title output, and analytics hooks are verified.
- [ ] **Step 5:** Run `npm run format:check && npm run build`, then commit with `git add app/public/wp-content/themes/drtalk-redesign && git commit -m "Migrate redesign public routes"`.

### Task 8: Validate, stage, and activate safely

**Files:**
- Create: `app/public/wp-content/themes/drtalk-redesign/docs/release-checklist.md`
- Modify: `app/public/wp-content/themes/drtalk-redesign/docs/route-parity.md`

- [ ] **Step 1:** Create a release checklist covering all public routes, desktop and mobile comparison, CTA destinations, menu states, keyboard navigation, page titles, logo contrast, image loading, and browser console errors.
- [ ] **Step 2:** Run `npm run format:check && npm run build` from the redesign theme. Expected result: exit code 0 for both commands.
- [ ] **Step 3:** Activate `drtalk-redesign` only in the Local WordPress instance; do not alter production configuration.
- [ ] **Step 4:** Re-run the full route-parity and release checklists after activation. Record any failed check before changing the active theme elsewhere.
- [ ] **Step 5:** Commit the completed checklists with `git add app/public/wp-content/themes/drtalk-redesign/docs && git commit -m "Document redesign validation"`.
