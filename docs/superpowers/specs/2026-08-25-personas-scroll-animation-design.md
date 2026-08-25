# Personas Scroll Animation Design

## Context and goal

The personas section already matches the approved Figma design and contains three full-size persona states: Dental Specialists, Office Managers, and Referring GPs. The requested change is limited to desktop interaction: vertical page scrolling should move the existing persona track horizontally, similar to the “Word from partners” section on the supplied reference site.

## Scope

- Keep the current Figma typography, colors, spacing, tabs, card dimensions, imagery, and content.
- Add the scroll-driven horizontal transition at the existing desktop breakpoint (`64rem` and wider).
- Keep the current mobile layout and behavior unchanged below `64rem`.
- Add no assets, dependencies, or new reduced-motion behavior.

## Desktop behavior

The section creates a scroll runway while its existing content remains sticky in the viewport. Scrolling through that runway moves the existing horizontal track continuously from the first persona to the third.

- The first card is aligned with the panel at the start of the section.
- Each of the two equal scroll segments advances the track by exactly one card width plus the existing track gap.
- The next card does not peek into the visible panel at the resting positions.
- After the third card reaches its resting position, the sticky section releases and normal page scrolling resumes.
- The tab matching the nearest card becomes active as the track moves.
- Clicking a tab scrolls the page to that persona's corresponding position in the runway.
- Existing keyboard tab navigation remains functional and scrolls to the selected persona.

Scroll progress is calculated from the section's measured start and usable scroll distance, clamped from `0` to `1`. Track translation is derived from the measured panel/card width and the existing gap rather than duplicated visual constants. The active persona index is the nearest of the three resting positions.

The implementation uses a transform on the track, a passive scroll listener, and `requestAnimationFrame`. Section and track measurements are recalculated on resize so the cards remain aligned at supported desktop widths.

## Mobile behavior

Below `64rem`, the three persona blocks remain in their current vertical Figma layout. The desktop scroll runway, sticky horizontal track, and transform are disabled. Existing mobile label and scroll synchronization behavior remains unchanged.

## Accessibility and fallback

- Preserve the current tab roles, `aria-selected`, and panel visibility semantics.
- Preserve arrow-key and click navigation for the tabs.
- If JavaScript is unavailable, the first persona remains visible and the section does not create an unusable scroll trap.

## Acceptance criteria

- At desktop widths, vertical scrolling moves smoothly through all three existing persona cards and releases after the third.
- At each resting position, the selected card aligns exactly with the panel and no adjacent card is visible.
- Tabs stay synchronized and clicking or keyboard-selecting a tab moves to the correct persona.
- The page has no horizontal overflow.
- At mobile widths, the current stacked design is visually and behaviorally unchanged, including at 390px and 320px.
- `npm run format:check` and `npm run build` pass in the redesign theme.
- The affected desktop and mobile states are verified in the local WordPress site with no new browser-console, PHP, or Nginx errors.
