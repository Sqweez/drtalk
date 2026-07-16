# Git Bootstrap Implementation Plan

> **For agentic workers:** REQUIRED SUB-SKILL: Use superpowers:subagent-driven-development (recommended) or superpowers:executing-plans to implement this plan task-by-task. Steps use checkbox (`- [ ]`) syntax for tracking.

**Goal:** Safely initialize and publish the repository while tracking only project guidance, documentation, and the future redesign theme.

**Architecture:** Keep the Local WordPress directory as the repository root and use an allowlist `.gitignore`. Push a reviewed initial commit directly to the empty remote's `main` branch.

**Tech Stack:** Git, GitHub, WordPress theme directory

---

### Task 1: Define the tracking boundary

**Files:**
- Create: `.gitignore`

- [ ] **Step 1:** Add a default-deny ignore file that re-includes `AGENTS.md`, `docs/`, and `app/public/wp-content/themes/drtalk-redesign/`.
- [ ] **Step 2:** Add theme-local exclusions for `node_modules/`, environment files, caches, logs, and OS/editor metadata.
- [ ] **Step 3:** Verify the ignore rules with `git check-ignore` after repository initialization.

### Task 2: Initialize and audit Git

**Files:**
- Track: `.gitignore`
- Track: `AGENTS.md`
- Track: `docs/superpowers/specs/2026-07-16-git-bootstrap-design.md`
- Track: `docs/superpowers/plans/2026-07-16-git-bootstrap.md`

- [ ] **Step 1:** Run `git init -b main`.
- [ ] **Step 2:** Add `origin` as `https://github.com/Sqweez/drtalk.git`.
- [ ] **Step 3:** Stage only the four approved paths and inspect `git diff --cached --stat` plus `git diff --cached`.
- [ ] **Step 4:** Confirm `git ls-files` contains no configuration, SQL, upload, plugin, log, or existing-theme files.

### Task 3: Publish the initial commit

- [ ] **Step 1:** Commit with `Initialize repository`.
- [ ] **Step 2:** Push with `git push -u origin main`.
- [ ] **Step 3:** Verify `origin/main` resolves to the local `HEAD` and the working tree is clean.
