# Personalized Relief Section Implementation Plan

> **For agentic workers:** REQUIRED SUB-SKILL: Use superpowers:subagent-driven-development (recommended) or superpowers:executing-plans to implement this plan task-by-task. Steps use checkbox (`- [ ]`) syntax for tracking.

**Goal:** Add the three-audience personalized relief section with click and scroll tab navigation.

**Architecture:** PHP provides tab records and static fallback content. `personalized.js` controls selected state, replaces screen/text data, and debounces intentional wheel gestures; esbuild includes it in `dist/theme.js`. CSS provides active pill styling and slide/fade transitions.

**Tech Stack:** WordPress PHP, Tailwind CSS v4, vanilla JavaScript, Figma assets.

---

### Task 1: Add content and assets

**Files:**
- Create: `assets/images/personalized-noise.png`, `assets/images/personalized-screen.png`
- Modify: `front-page.php`

- [ ] Download Figma node `344:1003` assets, define three audience records, and render tabs plus a 520 px lilac content panel.

### Task 2: Add tab interaction

**Files:**
- Create: `assets/js/personalized.js`
- Modify: `assets/js/theme.js`, `src/input.css`, `dist/theme.js`, `dist/output.css`

- [ ] Implement click/keyboard selection, debounced wheel switching while section is visible, and slide/fade screen transitions. Build and verify formatting, JS/PHP syntax, browser interaction, and `git diff --check` without adding shell tests.
