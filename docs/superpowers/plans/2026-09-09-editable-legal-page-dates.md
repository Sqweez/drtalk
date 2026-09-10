# Editable Legal Page Dates Implementation Plan

> **For agentic workers:** REQUIRED SUB-SKILL: Use superpowers:subagent-driven-development (recommended) or superpowers:executing-plans to implement this plan task-by-task. Steps use checkbox (`- [ ]`) syntax for tracking.

**Goal:** Let WordPress editors override both visible dates on Legal template pages while retaining WordPress dates as fallbacks.

**Architecture:** A focused theme include provides a Legal-page metabox, secure private-meta persistence, and date resolution. The Legal template asks it for a manual date and otherwise displays the existing WordPress date.

**Tech Stack:** WordPress PHP APIs, native PHP date validation, Prettier, PostCSS.

---

### Task 1: Prove the manual date and fallback behavior

**Files:**

- Create: `app/public/wp-content/themes/drtalk-redesign/tests/legal-page-dates.test.php`
- Create: `app/public/wp-content/themes/drtalk-redesign/inc/legal-page-dates.php`

- [ ] **Step 1: Write the failing test**

```php
assert(drtalk_redesign_get_legal_page_date(42, 'published', 'Jan 1, 2020') === 'Mar 4, 2024');
assert(drtalk_redesign_get_legal_page_date(42, 'modified', 'Jan 1, 2020') === 'Jan 1, 2020');
```

- [ ] **Step 2: Run the test to verify it fails**

Run `php tests/legal-page-dates.test.php`; expect an undefined resolver function.

- [ ] **Step 3: Implement the resolver**

Validate a `Y-m-d` private-meta value and format it as `M j, Y`; return the supplied fallback for an absent or invalid value.

- [ ] **Step 4: Run the test to verify it passes**

Run `php tests/legal-page-dates.test.php`; expect `Legal page date tests passed`.

### Task 2: Add editor fields and persistence

**Files:**

- Modify: `app/public/wp-content/themes/drtalk-redesign/inc/legal-page-dates.php`
- Modify: `app/public/wp-content/themes/drtalk-redesign/functions.php`

- [ ] **Step 1: Register the metabox**

Hook `add_meta_boxes_page`; show it only where `get_page_template_slug($post)` is `page-legal.php`. Render publication and last-update native date fields plus a nonce.

- [ ] **Step 2: Save the dates safely**

Hook `save_post_page`; reject missing/invalid nonces, autosaves, revisions and users lacking `edit_post`. Store exact valid `Y-m-d` strings; delete a field's meta when its submitted value is empty or invalid.

- [ ] **Step 3: Load the include**

Require `inc/legal-page-dates.php` from `functions.php`.

### Task 3: Connect the public template and verify

**Files:**

- Modify: `app/public/wp-content/themes/drtalk-redesign/page-legal.php`

- [ ] **Step 1: Resolve both displayed dates**

Replace direct WordPress date assignment with `drtalk_redesign_get_legal_page_date()` calls and pass the current publication/modified values as fallbacks.

- [ ] **Step 2: Verify**

Run `php tests/legal-page-dates.test.php`, PHP lint for both affected PHP files, `npm run format:check`, and `npm run build`; all must exit successfully.

- [ ] **Step 3: Commit**

Commit the include, template, loader, isolated test, and plan with message `Add editable legal page dates`.
