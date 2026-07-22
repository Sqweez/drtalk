# How It Works Section Design

## Scope

Implement Figma node `344:890` as the next homepage section: “From chaos to clarity. No disruption. No overhaul.” The desktop composition is a three-step feature navigator beside a 568 × 560 px product-demo panel on an orange-light background.

## Content and Layout

The section uses the established cream background, 120 px vertical padding, and 1200 px content width. Its heading and two-line supporting copy are centred. The feature area is a left column of three numbered steps and a right rounded demo panel with the Figma noise texture.

## Behaviour

The first of three steps is active on load. The active step reveals its descriptive copy and a 100 px purple progress segment; inactive steps show only their title and an empty segment. Every seven seconds, the active index advances and wraps from step three to step one. Clicking a step updates the active card and corresponding demo state immediately, then restarts the seven-second cycle. Buttons remain keyboard accessible.

The product preview is modelled as three Figma-aligned demo states. Its in-panel elements transition on a state change: inbox actions, file activity, and collaboration indicators animate into place. Motion follows the global reduced-motion preference, where changes occur without animated transitions.

## Data and Validation

Step titles, descriptions, and demo-state content are supplied by PHP arrays. JavaScript owns only active-state rendering and the restartable timer. Validate with `npm run build`, `npm run format:check`, PHP syntax checks, and browser interaction at `drtalk.local`; do not add shell tests unless explicitly requested.
