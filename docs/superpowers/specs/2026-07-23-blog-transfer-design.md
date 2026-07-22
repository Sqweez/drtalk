# Blog Transfer Design

## Goal

Make the existing WordPress blog work while `drtalk-redesign` is active, preserving the legacy blog's content and layout rather than redesigning it.

## Scope

Add a posts index template for the WordPress posts page at `/blog/` and a single-post template for individual blog URLs. Both will retain the legacy theme's markup: the post-page content loop on the index and the `Blog` label, title, and content loop on articles.

The templates will use the redesign theme's existing header, footer, compiled Tailwind stylesheet, and fixed-header spacing. No posts, URLs, settings, data, or editor content will be changed.

## Error Handling

Templates use the standard WordPress Loop and include a short empty-state message when no posts are available. Existing WordPress 404 handling remains unchanged.

## Validation

Build theme assets, run Prettier and PHP syntax checks, then open `/blog/` and an existing post URL in Local to confirm content, header/footer, and the absence of browser-console errors.
