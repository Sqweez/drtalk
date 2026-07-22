# Operational AI Icon Hover Design

## Scope

Add a concise interactive response to the four cards in the “Put Operational AI to Work for Your Office” section: Referral Friction, Relationship Risk, Staff Dependency, and Growth Risk.

## Interaction

Each card remains informational rather than clickable. On pointer hover or keyboard focus within the card, it lifts slightly and its SVG icon scales up with a small rotation. The divider and copy retain their existing visual treatment. The same transition reverses when focus or hover ends.

## Accessibility

The motion uses CSS transitions only; no JavaScript is needed. The existing global `prefers-reduced-motion` rule reduces its duration to near-zero for visitors who request reduced motion. Keyboard focus is supported by giving each non-clickable card a focusable container.

## Verification

The home-section shell check will assert the semantic card class, its focusability, and the hover/focus motion rules. The theme CSS will be rebuilt and format, PHP syntax, and shell checks will run before commit.
