# Git Bootstrap Design

## Goal

Initialize the Local WordPress workspace as the `Sqweez/drtalk` Git repository
without publishing the copied production site, secrets, logs, uploads, plugins,
WordPress core, database dumps, or archived themes.

## Repository Boundary

The repository root remains the current `drtalk/` directory so project
documentation and the future theme can share one history. The initial allowlist
tracks:

- `.gitignore`;
- `AGENTS.md`;
- `docs/`;
- the future theme at
  `app/public/wp-content/themes/drtalk-redesign/`.

Everything else is ignored by default. Theme-local dependencies, environment
files, caches, and editor metadata remain ignored even inside the allowlisted
theme.

## Git and Remote

Initialize Git with `main` as the initial branch and configure
`https://github.com/Sqweez/drtalk.git` as `origin`. Make one initial commit after
checking the complete staged file list and scanning it for common secret-bearing
paths. Push `main` directly because the remote repository is empty; no pull
request is needed for repository bootstrap.

## Verification

Confirm that `git status --short --ignored` shows the Local site content as
ignored, `git ls-files` contains only approved paths, the remote URL is correct,
and `origin/main` points to the initial commit after push.
