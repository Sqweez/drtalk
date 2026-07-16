# DrTalk Redesign Theme Design

## Goal

Create a new WordPress theme at
`app/public/wp-content/themes/drtalk-redesign/` that implements the supplied
Figma design while preserving every current public site path and business flow.
The existing timestamped theme remains active and unchanged until the redesign
passes local verification.

## Design Source

The Figma file is the visual source of truth. The design system uses League
Spartan for headings, Lato for body copy, and the primary colours `#F6F1EB`,
`#F3E8F7`, `#4A1E4F`, `#873BB7`, and `#ED8F43`. Use the supplied dual, light,
dark, white, and black logo variants only in their documented contrast contexts.

## Migration Strategy

Build the redesign as a clean theme, not a full copy of the legacy theme.
Selectively carry over only verified behaviour: existing URLs and templates,
WordPress theme hooks, content, registration/login/demo destinations, analytics
requirements, SEO metadata, and any required client-side interactions. Remove
duplicated legacy assets and centralise repeated external links in one
configuration location.

## Theme Architecture

Keep `style.css`, `functions.php`, and top-level WordPress templates in the
theme root. Store Figma-derived images, fonts, and icons in `assets/`; design
tokens and Tailwind input in `src/`; compiled CSS in `dist/`; and reusable UI
sections in `template-parts/`. The front page is composed from dedicated
sections rather than one long template: hero, proof, pain points, workflow,
outcomes, statistics, role-specific value, testimonials, founder, objections,
FAQ, and final CTA.

Use Tailwind CSS 4.3 with PostCSS and `@tailwindcss/postcss`. Define the Figma
colour, type, spacing, and breakpoint tokens as CSS-first `@theme` variables in
the source stylesheet, with explicit `@source` paths for PHP templates and
JavaScript. Do not depend on DaisyUI component styling for the redesign; build
the Figma components from project-owned utilities and component classes.

Retain templates for the current public surface: front page, features, goals,
pricing, about, standard pages, blog index, single posts, and 404. Each route
gets a parity checklist for content, CTAs, outbound destinations, responsive
behaviour, SEO, and analytics.

## Delivery and Validation

Implement and validate one shared foundation, then one page at a time. Run the
theme build and formatter checks, compare rendered desktop and mobile views to
the corresponding Figma frame, and manually verify every CTA and public route
in Local. Activate the new theme only after all parity checklists pass; retain
the old theme as rollback.
