# Personalized Relief Section Design

## Scope

Implement Figma node `344:1003`: a three-audience tabbed section titled “The same platform, different relief for everyone it touches.”

## Layout

Render the 1200 px cream section with a centred 48 px heading, pill-style three-tab control, and a 520 px lilac content card. The active tab controls the card title, description, CTA context, and its product screen. Figma noise texture sits behind the card contents.

## Interaction

Clicking a tab selects its audience. While the pointer is over the section, a deliberate vertical wheel or touch gesture advances or reverses the tab with a short debounce; normal page scrolling resumes once the gesture threshold is not met. On each change, screen content slides in from the right and text fades upward. Keyboard tab activation is supported; reduced motion updates content without transitions.

## Validation

Use PHP arrays, a dedicated bundled JavaScript module, and original Figma assets. Validate build, formatting, PHP/JS syntax, and the click/scroll interaction in `drtalk.local`. Do not add shell tests unless explicitly requested.
