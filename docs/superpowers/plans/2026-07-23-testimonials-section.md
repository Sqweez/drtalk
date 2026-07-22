# Testimonials Carousel Implementation Plan

> **For agentic workers:** REQUIRED SUB-SKILL: Use superpowers:subagent-driven-development (recommended) or superpowers:executing-plans to implement this plan task-by-task. Steps use checkbox (`- [ ]`) syntax for tracking.

**Goal:** Add the Figma testimonial carousel with working previous/next controls.

**Architecture:** PHP exposes the three testimonial records and asset paths. CSS renders a translated flex track within a fading viewport. `testimonials.js` owns index state, button actions, accessible labels, and reduced-motion-aware state changes; esbuild bundles it into the single theme script.

**Tech Stack:** WordPress PHP, Tailwind CSS v4, vanilla JavaScript, Figma assets.

---

### Task 1: Assets and markup

**Files:**
- Create: `assets/images/testimonial-*`
- Modify: `front-page.php`

- [ ] Download node `344:1018` Figma assets, define three testimonial records, and render the 544 px cards inside an overflow-hidden carousel viewport.

### Task 2: Carousel controls

**Files:**
- Create: `assets/js/testimonials.js`
- Modify: `assets/js/theme.js`, `src/input.css`, `dist/theme.js`, `dist/output.css`

- [ ] Add translated-track styles, edge fades, controls, and JavaScript index changes. Build and verify formatting, PHP/JS syntax, live browser controls, and `git diff --check`; do not add shell tests.
