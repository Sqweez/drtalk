# Editable legal page dates

## Goal

Allow editors to set the visible publication and last-update dates on each page
using the `Legal` template, without changing the page's WordPress timestamps.

## Editor experience

The page editor will show a **Legal page dates** metabox only when the selected
page uses `page-legal.php`. It contains two native date inputs:

- Publication date
- Last update date

Editors may leave either field empty.

## Front-end behavior

`page-legal.php` will use the corresponding manual date when it is present.
When a manual value is absent, it will retain the existing fallback:

- Publication date: WordPress publication date
- Last update date: WordPress modified date

Both manual and fallback dates will continue to display as `M j, Y`, matching
the present legal-page header.

## Data handling

Store the values as private page meta in `Y-m-d` format. Save only for users
who can edit the page, after nonce verification; ignore autosaves and revisions.
Invalid values will not be stored. The template will validate stored values
before rendering them and use the WordPress fallback for invalid or empty data.

## Scope and validation

The metabox and output logic apply to all three current legal pages through the
shared template, and automatically apply to later pages using that template.

Verification will cover manual-date display, fallback behavior, authorization
and nonce protection, then run the theme formatting and production CSS build.
