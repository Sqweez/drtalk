# Founder Section Implementation Plan

> **For agentic workers:** REQUIRED SUB-SKILL: Use superpowers:subagent-driven-development (recommended) or superpowers:executing-plans to implement this plan task-by-task. Steps use checkbox (`- [ ]`) syntax for tracking.

**Goal:** Add the Figma founder section to the redesign home page.

**Architecture:** The front-page template owns semantic content and references a local portrait asset. A focussed CSS component block creates the two-column desktop composition and uses existing design tokens and fonts.

**Tech Stack:** WordPress PHP templates, Tailwind CSS v4, PostCSS, Prettier.

---

### Task 1: Add the founder portrait asset

**Files:**
- Create: `app/public/wp-content/themes/drtalk-redesign/assets/images/thomas-stone.png`

- [ ] **Step 1: Download the portrait supplied by Figma**

Use the Figma asset endpoint and save the image as `thomas-stone.png` in the theme image directory.

- [ ] **Step 2: Inspect the downloaded asset**

Run: `file app/public/wp-content/themes/drtalk-redesign/assets/images/thomas-stone.png`

Expected: a valid PNG or JPEG image file.

### Task 2: Render the founder section

**Files:**
- Modify: `app/public/wp-content/themes/drtalk-redesign/front-page.php`

- [ ] **Step 1: Define escaped local asset and About-page URLs near existing front-page data**

```php
$founder_image_url = esc_url(get_theme_file_uri('assets/images/thomas-stone.png'));
$about_page_url = esc_url(home_url('/about/'));
```

- [ ] **Step 2: Insert the semantic section before testimonials**

Render the portrait, founder name, role text, Figma copy, and a `Read Our Story` link targeting `$about_page_url`. Use `alt="Thomas L. Stone"` and an inline external-link SVG labelled only by the surrounding link.

### Task 3: Match Figma desktop styling

**Files:**
- Modify: `app/public/wp-content/themes/drtalk-redesign/src/input.css`

- [ ] **Step 1: Add a founder-section component block**

Create a 1200px-wide grid with 1fr/2fr columns, 64px column gap, 120px section padding, a 16px-radius square portrait, and a 64px top inset for the right column. Use `#f6f1eb`, `#4a1e4f`, `#736962`, and `#873bb7` as defined in Figma.

- [ ] **Step 2: Rebuild the generated theme assets**

Run: `npm run build`

Expected: CSS and JavaScript build successfully.

### Task 4: Validate and commit

**Files:**
- Modify: generated `app/public/wp-content/themes/drtalk-redesign/dist/output.css`

- [ ] **Step 1: Format and run static validation**

Run: `npm run format:check && find . -name '*.php' -print0 | xargs -0 -n1 php -l && git diff --check`

Expected: all checks exit with status 0. This repository has no first-party automated test suite, and no shell tests are added.

- [ ] **Step 2: Check the local page visually**

Open `http://drtalk.local/` and compare the founder section’s layout, colour, typography, portrait crop, and link with Figma node `344:1084`.

- [ ] **Step 3: Commit the implementation**

```bash
git add app/public/wp-content/themes/drtalk-redesign/front-page.php \\
  app/public/wp-content/themes/drtalk-redesign/src/input.css \\
  app/public/wp-content/themes/drtalk-redesign/assets/images/thomas-stone.png \\
  app/public/wp-content/themes/drtalk-redesign/dist/output.css
git commit -m "Add founder story section"
```
