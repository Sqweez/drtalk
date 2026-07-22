# Responsiveness Section Design

## Scope

Implement Figma node `344:930` on the homepage: the “Most specialists compete on reputation” section. It contains a centred heading and description followed by four feature cards in a two-column grid.

## Layout and Content

Use the established cream background, 120 px vertical padding, 1200 px content width, 64 px content gap, and 48 px grid gaps. Each card contains its Figma-provided 270 × 160 px illustration, a 32 px League Spartan heading, and 16 px Lato description. The four cards use the exact Figma titles and copy.

## Number Animation

Illustrations with metric text use one-time count-up animation. When the section first enters the viewport, each `data-count-target` counter begins at a generated value below the target and updates until its final formatted number, for example `90234` to `1,300+`. The final display never changes after completion. The animation is disabled under `prefers-reduced-motion`, where final values display immediately.

## Architecture and Validation

PHP arrays provide the card content, asset filenames, and final counter values. A dedicated `assets/js/responsiveness.js` module uses `IntersectionObserver` to start the effect once and is bundled into `dist/theme.js`. Verify with `npm run build`, `npm run format:check`, JavaScript/PHP syntax checks, and browser inspection at `drtalk.local`; do not add shell tests unless explicitly requested.
