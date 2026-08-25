# Personas Scroll Animation Implementation Plan

> **For agentic workers:** REQUIRED SUB-SKILL: Use superpowers:subagent-driven-development (recommended) or superpowers:executing-plans to implement this plan task-by-task. Steps use checkbox (`- [ ]`) syntax for tracking.

**Goal:** Add a desktop-only sticky scroll runway that moves the three existing Figma persona cards horizontally while preserving the current mobile layout.

**Architecture:** Keep the existing PHP card markup and add a single sticky wrapper around its content. Put scroll math in a small dependency-free ES module with Node tests, then let `personalized.js` measure the rendered section, drive the track transform with `requestAnimationFrame`, synchronize tabs, and preserve the existing mobile observer behavior.

**Tech Stack:** WordPress PHP templates, vanilla ES modules bundled by esbuild, CSS/Tailwind source processed by PostCSS, Node's built-in test runner.

---

### Task 1: Test the scroll calculations

**Files:**

- Create: `app/public/wp-content/themes/drtalk-redesign/assets/js/personalized-scroll.mjs`
- Create: `app/public/wp-content/themes/drtalk-redesign/tests/personalized-scroll.test.mjs`
- Modify: `app/public/wp-content/themes/drtalk-redesign/package.json`

- [ ] **Step 1: Write failing tests for progress, translation, active state, and tab targets**

Create tests that import `getScrollProgress`, `getTrackOffset`, `getActiveIndex`, and `getScrollTarget`. Assert that progress clamps before and after the runway, three cards translate through two measured steps, the nearest card becomes active, and a tab maps to its proportional page position.

```js
import assert from "node:assert/strict";
import test from "node:test";
import {
  getActiveIndex,
  getScrollProgress,
  getScrollTarget,
  getTrackOffset,
} from "../assets/js/personalized-scroll.mjs";

test("clamps scroll progress to the section runway", () => {
  assert.equal(getScrollProgress(900, 1000, 800), 0);
  assert.equal(getScrollProgress(1400, 1000, 800), 0.5);
  assert.equal(getScrollProgress(2000, 1000, 800), 1);
});

test("translates three cards across two measured track steps", () => {
  assert.equal(getTrackOffset(0.5, 3, 1224), -1224);
  assert.equal(getTrackOffset(1, 3, 1224), -2448);
});

test("selects the persona nearest to the current resting position", () => {
  assert.equal(getActiveIndex(0.24, 3), 0);
  assert.equal(getActiveIndex(0.26, 3), 1);
  assert.equal(getActiveIndex(0.76, 3), 2);
});

test("maps a selected tab to its point in the scroll runway", () => {
  assert.equal(getScrollTarget(0, 3, 1000, 1200), 1000);
  assert.equal(getScrollTarget(1, 3, 1000, 1200), 1600);
  assert.equal(getScrollTarget(2, 3, 1000, 1200), 2200);
});
```

- [ ] **Step 2: Run the test and verify the missing module fails**

Run: `node --test tests/personalized-scroll.test.mjs`

Expected: FAIL because `assets/js/personalized-scroll.mjs` does not exist.

- [ ] **Step 3: Implement the minimal pure calculation module**

```js
const clampProgress = (value) => Math.min(1, Math.max(0, value));

export const getScrollProgress = (scrollY, scrollStart, scrollDistance) =>
  scrollDistance > 0
    ? clampProgress((scrollY - scrollStart) / scrollDistance)
    : 0;

export const getTrackOffset = (progress, stateCount, trackStep) =>
  -clampProgress(progress) * Math.max(0, stateCount - 1) * trackStep;

export const getActiveIndex = (progress, stateCount) =>
  Math.round(clampProgress(progress) * Math.max(0, stateCount - 1));

export const getScrollTarget = (
  index,
  stateCount,
  scrollStart,
  scrollDistance,
) => {
  const lastIndex = Math.max(0, stateCount - 1);
  const safeIndex = Math.min(lastIndex, Math.max(0, index));
  return scrollStart + (lastIndex ? safeIndex / lastIndex : 0) * scrollDistance;
};
```

- [ ] **Step 4: Add and run the focused test command**

Add `"test:personalized-scroll": "node --test tests/personalized-scroll.test.mjs"` to `package.json`, then run `npm run test:personalized-scroll`.

Expected: four passing tests.

### Task 2: Add the sticky desktop structure and styling

**Files:**

- Modify: `app/public/wp-content/themes/drtalk-redesign/front-page.php:651-691`
- Modify: `app/public/wp-content/themes/drtalk-redesign/src/input.css:590-855`

- [ ] **Step 1: Wrap the existing section content without changing its visual markup**

Inside `[data-personalized]`, wrap the existing centered content with:

```php
<div class="personalized-sticky" data-personalized-sticky>
	<div class="mx-auto flex max-w-[75rem] flex-col items-center gap-8 lg:gap-12">
		<!-- Existing heading, tabs, and panel remain unchanged. -->
	</div>
</div>
```

- [ ] **Step 2: Add the desktop runway and remove discrete transform transitions**

Keep all existing visual declarations. At `min-width: 64rem`, size the outer section from the measured sticky height and scroll distance, make `.personalized-sticky` sticky with the measured offset, and let JavaScript own the track transform:

```css
@media (min-width: 64rem) {
  [data-personalized] {
    height: calc(
      var(--personalized-sticky-height, 53rem) +
        var(--personalized-scroll-distance, 100vh) + 15rem
    );
  }

  .personalized-sticky {
    position: sticky;
    top: var(--personalized-sticky-offset, 0px);
  }

  .personalized-track {
    transition: none;
  }
}
```

Remove the two `[data-active-index]` transform declarations so scroll position is the only desktop translation source. Outside the desktop media query, `.personalized-sticky` remains a normal block and the mobile stacked layout remains untouched.

### Task 3: Drive the desktop track from page scroll

**Files:**

- Modify: `app/public/wp-content/themes/drtalk-redesign/assets/js/personalized.js`

- [ ] **Step 1: Import the tested calculations and capture measured elements**

Import the four functions from `personalized-scroll.mjs`, then query `.personalized-track` and `[data-personalized-sticky]`. Store `scrollStart`, `scrollDistance`, and `trackStep` alongside the current `activeIndex` and animation-frame id.

- [ ] **Step 2: Measure the rendered runway on desktop**

On initialization, resize, and media-query changes:

1. Clear desktop inline variables when mobile.
2. Measure the sticky content height, panel width, computed track gap, section padding, and admin-bar-aware sticky offset.
3. Use one `0.8 * viewport height` scroll segment per transition, with a 600px minimum.
4. Set `--personalized-sticky-height`, `--personalized-scroll-distance`, and `--personalized-sticky-offset`.
5. Derive `scrollStart` from the section document position plus top padding minus sticky offset.

- [ ] **Step 3: Synchronize transform and active semantics in the animation frame**

For desktop, calculate progress from `window.scrollY`, apply a `translate3d()` offset to `.personalized-track`, and call `selectAudience()` with the nearest index. For mobile, clear the inline transform and retain the existing visible-card distance calculation.

- [ ] **Step 4: Make desktop tabs and keyboard navigation scroll to their states**

Replace direct desktop selection with `window.scrollTo({ top: getScrollTarget(...), behavior: 'smooth' })`. Retain direct selection on mobile and keep focus movement after arrow, Home, and End keys.

- [ ] **Step 5: Verify the focused tests and bundle**

Run: `npm run test:personalized-scroll && npm run build`

Expected: four passing tests and successful CSS/JS compilation.

### Task 4: Format and visually verify the complete interaction

**Files:**

- Modify (generated): `app/public/wp-content/themes/drtalk-redesign/dist/output.css`
- Modify (generated): `app/public/wp-content/themes/drtalk-redesign/dist/theme.js`

- [ ] **Step 1: Format source files and rebuild generated assets**

Run: `npx prettier --write front-page.php src/input.css assets/js/personalized.js assets/js/personalized-scroll.mjs tests/personalized-scroll.test.mjs package.json docs/superpowers/plans/2026-08-25-personas-scroll-animation.md`

Run: `npm run build && npm run format:check && npm run test:personalized-scroll`

Expected: build succeeds, formatting check succeeds, and all focused tests pass.

- [ ] **Step 2: Verify desktop behavior in the local WordPress site**

At 1512px and 1024px widths, verify the first, middle, and final runway positions. Confirm exact panel alignment, no adjacent-card peek, synchronized tabs, smooth click/keyboard navigation, no horizontal page overflow, and normal section release after the third card.

- [ ] **Step 3: Verify mobile regression coverage**

At 390px and 320px widths, verify the existing vertical card stack, margins, sticky active label, and scroll synchronization remain unchanged with no horizontal overflow.

- [ ] **Step 4: Check runtime logs**

Confirm the browser console has no new errors and inspect `logs/php/` and `logs/nginx/` for errors caused by the personas change.
