# Repository Guidelines

## Project Structure & Module Organization

This is a Local-managed WordPress site. The document root is `app/public/`; WordPress core lives directly beneath it, while site-specific work belongs in `app/public/wp-content/`.

New development belongs in `app/public/wp-content/themes/drtalk-redesign/`. The currently active legacy theme is `drtalk-website-theme-20260213-105123`; use it as a reference, not as the redesign target. Keep PHP templates at the theme root, Tailwind source in `src/`, compiled assets in `dist/`, and static files under `assets/`. Local service templates are under `conf/`, database exports under `app/sql/`, and runtime logs under `logs/`; these are not tracked.

## Build, Test, and Development Commands

Run frontend commands from the theme directory that contains `package.json`:

```sh
npm ci                 # Install locked Node dependencies
npm run dev            # Watch Tailwind sources and rebuild CSS
npm run build          # Produce dist/output.css once
npm run format:check   # Check PHP, JS, CSS, JSON, and Markdown formatting
npm run format         # Apply Prettier formatting
```

Use the Local application to start WordPress, PHP, Nginx, and MySQL. There is no repository-level build script.

## Coding Style & Naming Conventions

Follow WordPress conventions in PHP: tabs for indentation, snake_case functions, escaped output (`esc_html()`, `esc_url()`), and prefixed, descriptive hooks. Template files use WordPress names such as `page-pricing.php` and `front-page.php`. JavaScript and CSS use two spaces. Prettier configuration in `.prettierrc.yml` is authoritative; avoid hand-editing generated `dist/output.css`.

## Testing Guidelines

No first-party automated test suite is configured. Before submitting changes, run `npm run format:check` and `npm run build`, then verify affected pages in the local WordPress site at desktop and mobile widths. Check browser console output, PHP logs in `logs/php/`, and Nginx errors in `logs/nginx/`. Treat tests bundled inside WordPress plugins or installer code as third-party and out of scope.

## Commit & Pull Request Guidelines

This repository is newly initialized, so no long-running commit convention exists yet. Use concise, imperative subjects, for example `Fix mobile pricing layout`. Keep commits scoped and exclude logs, database dumps, credentials, caches, and unrelated generated files. Pull requests should describe the change, list validation performed, link the relevant issue, and include before/after screenshots for visual updates.

## Security & Configuration

Do not commit secrets from `wp-config.php`, SQL exports, logs, or production data. Prefer Local-specific configuration and sanitized fixtures when sharing diagnostics.
