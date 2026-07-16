#!/usr/bin/env sh

set -eu

theme_dir=$(CDPATH= cd -- "$(dirname -- "$0")/.." && pwd)
template="$theme_dir/template-parts/home-faq.php"
script="$theme_dir/assets/js/theme.js"

for file in "$template" "$theme_dir/assets/images/icon-plus.svg"; do
	if [ ! -f "$file" ]; then
		echo "Missing FAQ file: $file" >&2
		exit 1
	fi
done

grep -Fq 'Frequently Asked Questions' "$template"
grep -Fq 'Security &amp; Compliance' "$template"
grep -Fq 'Pricing &amp; Getting started' "$template"
grep -Fq 'data-faq-category' "$template"
grep -Fq 'data-faq-tabs' "$template"
grep -Fq 'data-faq-tabs' "$script"
grep -Fq 'data-faq-answer' "$script"

echo "Home FAQ checks passed."
