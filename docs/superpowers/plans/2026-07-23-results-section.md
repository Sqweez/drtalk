# Results Section Implementation Plan

> **For agentic workers:** REQUIRED SUB-SKILL: Use superpowers:subagent-driven-development (recommended) or superpowers:executing-plans to implement this plan task-by-task. Steps use checkbox (`- [ ]`) syntax for tracking.

**Goal:** Add the five-card Figma results section with accessible card hover motion.

**Architecture:** PHP renders the metric data and card markup. CSS owns hover/focus transitions and reduced-motion fallback. Figma-provided SVGs are static assets; no JavaScript is necessary for this section.

**Tech Stack:** WordPress PHP, Tailwind CSS v4, Figma SVG assets.

---

### Task 1: Add original assets and card data

**Files:**
- Create: `app/public/wp-content/themes/drtalk-redesign/assets/images/results-1.svg`
- Create: `app/public/wp-content/themes/drtalk-redesign/assets/images/results-2.svg`
- Create: `app/public/wp-content/themes/drtalk-redesign/assets/images/results-3.svg`
- Create: `app/public/wp-content/themes/drtalk-redesign/assets/images/results-4.svg`
- Create: `app/public/wp-content/themes/drtalk-redesign/assets/images/results-5.svg`
- Modify: `app/public/wp-content/themes/drtalk-redesign/front-page.php`

- [ ] Download Figma node `408:1414` illustration SVGs, define five PHP records, and render the Figma 320 px lilac cards before the FAQ.

### Task 2: Add card motion and validate

**Files:**
- Modify: `app/public/wp-content/themes/drtalk-redesign/src/input.css`
- Modify: `app/public/wp-content/themes/drtalk-redesign/dist/output.css` (generated)

- [ ] Add hover/focus CSS for card lift, shadow, and illustration transform. Run `npm run format && npm run build && npm run format:check`, PHP syntax checks, and `git diff --check`; inspect hover in `drtalk.local`.
- [ ] Commit with `git add app/public/wp-content/themes/drtalk-redesign && git commit -m "Add results metrics section"`.
