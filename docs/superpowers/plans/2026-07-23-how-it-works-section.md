# How It Works Section Implementation Plan

> **For agentic workers:** REQUIRED SUB-SKILL: Use superpowers:subagent-driven-development (recommended) or superpowers:executing-plans to implement this plan task-by-task. Steps use checkbox (`- [ ]`) syntax for tracking.

**Goal:** Add the Figma “From chaos to clarity” section with an automatically rotating, clickable three-step product demo.

**Architecture:** `front-page.php` owns content arrays and accessible static markup. `assets/js/theme.js` uses the data attributes to switch active step, update the demo contents, and restart a seven-second timer after manual selection. `src/input.css` contains the Figma-matching card and demo-panel visual states; Tailwind generates `dist/output.css`.

**Tech Stack:** WordPress PHP, Tailwind CSS v4, vanilla JavaScript, Figma-supplied PNG assets.

---

### Task 1: Store Figma assets and section content

**Files:**
- Create: `app/public/wp-content/themes/drtalk-redesign/assets/images/how-it-works-noise.png`
- Create: `app/public/wp-content/themes/drtalk-redesign/assets/images/how-it-works-demo.png`
- Modify: `app/public/wp-content/themes/drtalk-redesign/front-page.php`

- [ ] **Step 1: Download the Figma noise and product-demo images**

Save the two original PNG assets supplied by Figma under the filenames above. Confirm both files are readable with `file`.

- [ ] **Step 2: Define the three PHP feature records**

Add `$how_it_works_steps` with `number`, `title`, `description`, and per-state `demo` data. Use the exact Figma titles:

```php
[
	'number' => '01',
	'title' => 'Connect your existing workflow',
	'description' => 'We pull in every channel you’re already using. One place. No missed leads. And your referring doctors don’t have to change a single habit.',
]
```

- [ ] **Step 3: Render the Figma section before the calculator section**

Render the 1200 px two-column layout, each step as a `button` with `data-how-it-works-step`, and one product-demo panel with `data-how-it-works-demo`. Mark the first step as selected with `aria-pressed="true"`; retain all text in PHP for non-JavaScript fallback.

### Task 2: Style the Figma composition and product states

**Files:**
- Modify: `app/public/wp-content/themes/drtalk-redesign/src/input.css`
- Modify: `app/public/wp-content/themes/drtalk-redesign/dist/output.css` (generated)

- [ ] **Step 1: Add reusable component classes**

Add `.how-it-works-step`, `.how-it-works-step-title`, `.how-it-works-step-description`, and `.how-it-works-progress-fill` rules that reproduce the 32 px heading, 24 px gap, 2 px progress rule, and active/inactive Figma states.

- [ ] **Step 2: Add product-demo panel rules**

Add `.how-it-works-demo`, `.how-it-works-demo-state`, and `.how-it-works-demo-item` rules for a 568 × 560 px, 24 px rounded orange-light panel with noise texture. Use opacity and translate transitions for files, buttons, and notification rows; preserve the global reduced-motion behaviour.

- [ ] **Step 3: Build the stylesheet**

Run: `npm run build`

Expected: PostCSS completes successfully and updates `dist/output.css`.

### Task 3: Implement rotation and manual switching

**Files:**
- Modify: `app/public/wp-content/themes/drtalk-redesign/assets/js/theme.js`

- [ ] **Step 1: Initialise the section safely**

Query `[data-how-it-works]`. Return without changes when it is absent or has no steps. Store `activeStepIndex` and a timeout handle.

- [ ] **Step 2: Render the active state**

Create `setActiveStep(index)` to update `aria-pressed`, active classes, description visibility, progress fill, and the demo panel’s `data-active-step`. Each click calls `setActiveStep` then `restartRotation`.

- [ ] **Step 3: Rotate every seven seconds**

Create `restartRotation()` to clear the pending timeout and schedule the next wrapped index after `7000` milliseconds. Call it after initial render and every click. Respect `prefers-reduced-motion` by retaining state changes while skipping visual-transition classes.

### Task 4: Validate and commit

**Files:**
- Modify: `app/public/wp-content/themes/drtalk-redesign/front-page.php`
- Modify: `app/public/wp-content/themes/drtalk-redesign/src/input.css`
- Modify: `app/public/wp-content/themes/drtalk-redesign/dist/output.css`
- Modify: `app/public/wp-content/themes/drtalk-redesign/assets/js/theme.js`

- [ ] **Step 1: Format and run static validation**

Run:

```sh
npm run format && npm run build && npm run format:check && node --check assets/js/theme.js && find . -name '*.php' -print0 | xargs -0 -n1 php -l && git diff --check
```

Expected: all commands exit `0`.

- [ ] **Step 2: Verify in the local browser**

At `http://drtalk.local/`, confirm the active card and demo change after seven seconds. Click step two and confirm the correct card/demo appears immediately and does not auto-advance until a fresh seven-second interval passes. Check that keyboard activation works.

- [ ] **Step 3: Commit the feature**

Run:

```sh
git add app/public/wp-content/themes/drtalk-redesign
git commit -m "Add interactive how it works section"
```
