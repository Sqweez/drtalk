# Results Section Design

## Scope

Implement Figma node `408:1414`: “Real results. Proven at scale.” The section consists of five lilac statistic cards with Figma illustration assets.

## Layout

Use the existing cream page background, 120 px vertical padding, 1200 px content width, and 16 px card gaps. Each card is 320 px tall with 32 px rounded corners, 48 px horizontal and 56 px vertical padding. The heading is centred at 48 px; metric values use 80 px League Spartan.

## Interaction

Each card is focusable. On hover or keyboard focus it raises slightly, receives a soft purple shadow, and its illustration scales/rotates subtly. The metric values remain static. The existing reduced-motion preference disables the transition.

## Validation

Use original Figma assets, `npm run build`, formatting, PHP/JS syntax checks, and browser inspection at `drtalk.local`. Do not add shell tests unless explicitly requested.
