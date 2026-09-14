# Home Blocks Medium-Risk Fixes

## Scope

Resolve the remaining medium-risk findings from the home-page architecture review. SVG upload policy is explicitly out of scope.

## Design

- Normalize every calculator range on the server and defensively in JavaScript. Invalid bounds fall back to known-safe bounds, non-positive steps fall back to a safe step, and defaults are clamped into the final range.
- Keep Carbon Fields optional for public rendering, but make a missing runtime visible to administrators and the PHP log. Document Composer installation as a deployment requirement.
- Treat theme-asset imports as fallible operations. Validate upload paths, copying, attachment insertion, and generated metadata; clean up partial files or attachments on failure.
- Extract pure home-block helpers so migration ordering, idempotence, duplicate prevention, and `is_active` filtering can be tested without booting WordPress.

## Verification

- Node tests for calculator normalization and typed inputs.
- PHP tests for block migration, idempotence, order, and disabled sections.
- PHP lint, Prettier check, production build, and focused browser smoke test.
