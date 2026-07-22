# Responsiveness Section Implementation Plan

> **For agentic workers:** REQUIRED SUB-SKILL: Use superpowers:subagent-driven-development (recommended) or superpowers:executing-plans to implement this plan task-by-task. Steps use checkbox (`- [ ]`) syntax for tracking.

**Goal:** Add the Figma responsiveness section and one-time count-up animation for its metric illustrations.

**Architecture:** Store card data in PHP and render a two-column Figma grid in `front-page.php`. Import a dedicated `responsiveness.js` module from the existing JavaScript entry point; it observes counters once and updates their text until their final values. The existing esbuild command emits the one WordPress script asset.

**Tech Stack:** WordPress PHP, Tailwind CSS v4, vanilla JavaScript, esbuild, Figma PNG assets.

---

### Task 1: Add the Figma card assets and markup

**Files:**
- Create: `app/public/wp-content/themes/drtalk-redesign/assets/images/responsiveness-1.png`
- Create: `app/public/wp-content/themes/drtalk-redesign/assets/images/responsiveness-2.png`
- Create: `app/public/wp-content/themes/drtalk-redesign/assets/images/responsiveness-3.png`
- Create: `app/public/wp-content/themes/drtalk-redesign/assets/images/responsiveness-4.png`
- Modify: `app/public/wp-content/themes/drtalk-redesign/front-page.php`

- [ ] Download the four PNG assets returned by Figma node `344:930`.
- [ ] Add a four-record PHP array containing each image, Figma title, and description.
- [ ] Render the centred heading/copy and a `grid grid-cols-2 gap-12` card grid before the “How it works” section. Give metric text `data-count-target` and its final formatted value.

### Task 2: Add the one-time counter module

**Files:**
- Create: `app/public/wp-content/themes/drtalk-redesign/assets/js/responsiveness.js`
- Modify: `app/public/wp-content/themes/drtalk-redesign/assets/js/theme.js`

- [ ] Add `import './responsiveness.js';` to the entry module.
- [ ] Observe `[data-responsiveness]` with `IntersectionObserver`; when it first intersects, animate every `[data-count-target]` from a generated value below its `data-count-start` to the numeric target over 900 ms. Preserve suffixes and emit final text immediately under reduced motion. Unobserve after completion.

### Task 3: Build and verify

**Files:**
- Modify: `app/public/wp-content/themes/drtalk-redesign/dist/theme.js` (generated)

- [ ] Run `npm run format && npm run build && npm run format:check`.
- [ ] Run `find assets/js -name '*.js' -print0 | xargs -0 -n1 node --check`, `find . -name '*.php' -print0 | xargs -0 -n1 php -l`, and `git diff --check`.
- [ ] At `http://drtalk.local/`, verify the four cards match Figma, counters count once on first view, and final values remain static.
- [ ] Commit with `git add app/public/wp-content/themes/drtalk-redesign && git commit -m "Add responsiveness feature section"`.
