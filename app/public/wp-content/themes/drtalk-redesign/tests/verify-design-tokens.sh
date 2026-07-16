#!/usr/bin/env sh

set -eu

theme_dir=$(CDPATH= cd -- "$(dirname "$0")/.." && pwd)
css_file="$theme_dir/src/input.css"
php_file="$theme_dir/functions.php"

for token in \
  '--color-cream: #F6F1EB' \
  '--color-lilac: #F3E8F7' \
  '--color-purple-dark: #4A1E4F' \
  '--color-purple: #873BB7' \
  '--color-orange: #ED8F43' \
  '--font-heading:' \
  '--font-body:'
do
  if ! grep -Fiq -- "$token" "$css_file"; then
    printf 'Missing Figma token: %s\n' "$token" >&2
    exit 1
  fi
done

for selector in ':focus-visible' '@media (prefers-reduced-motion: reduce)' '.site-container' '.button-primary'; do
  if ! grep -Fq -- "$selector" "$css_file"; then
    printf 'Missing base style: %s\n' "$selector" >&2
    exit 1
  fi
done

grep -Fq 'fonts.googleapis.com' "$php_file"

printf 'Design token checks passed.\n'
