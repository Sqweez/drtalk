# Testimonials Carousel Design

## Scope

Implement Figma node `344:1018`: “For the people who use it every day.” The section is a three-card testimonial carousel with orange and lilac cards, avatar/logo pairs, and round arrow controls.

## Layout

Use the 1200 px content width, a centred 48 px heading, 544 px high cards, and Figma’s 480 px card width, 24 px card radius, 32 px horizontal and 48 px vertical padding. The carousel viewport fades its left and right edges to the cream background.

## Interaction

The active card sits centred. Previous and next controls advance the index with wrap-around. Cards slide horizontally with a short transition; controls support keyboard activation and have labels. Under reduced motion, the active card changes without transition.

## Validation

Use PHP data arrays, original Figma assets, a dedicated bundled JavaScript module, and CSS component rules. Validate build, formatting, PHP/JS syntax, and carousel behaviour in `drtalk.local`; do not add shell tests unless explicitly requested.
