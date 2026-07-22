# Founder Section Design

## Goal

Add the Figma founder section (`344:1084`) to the redesign home page, matching its desktop composition exactly.

## Layout

The section uses the existing cream background with 120px vertical and 40px horizontal padding. A centred 1200px grid has a one-third left column and two-thirds right column with a 64px gap.

The left column contains a square, 16px-rounded portrait, followed by the founder's name and supporting role text. The right column starts 64px below the grid top and contains the Figma heading, two body paragraphs, and a purple `Read Our Story` link with an external-link icon.

## Implementation

Store the supplied portrait in the theme's `assets/images/` directory. Add semantic PHP markup to `front-page.php`, a small component style block in `src/input.css`, and use the existing About page URL for the link. No interaction or responsive behaviour is in scope.

## Validation

Build Tailwind and the JavaScript bundle, run Prettier and PHP/JavaScript syntax checks, then compare the home-page section in the local browser with the Figma screenshot.
