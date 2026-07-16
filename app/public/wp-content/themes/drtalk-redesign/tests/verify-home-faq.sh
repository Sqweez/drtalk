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
grep -Fq '$faq_categories = [' "$template"
grep -Fq 'wp_json_encode' "$template"
grep -Fq 'data-faq-tabs' "$template"
grep -Fq 'data-faq-content' "$template"
grep -Fq 'data-faq-data' "$template"
grep -Fq 'data-faq-tabs' "$script"
grep -Fq 'cursor-pointer' "$script"
grep -Fq 'grid-rows-[0fr]' "$script"
grep -Fq 'grid-rows-[1fr]' "$script"
grep -Fq 'opacity-0' "$script"

echo "Home FAQ checks passed."
