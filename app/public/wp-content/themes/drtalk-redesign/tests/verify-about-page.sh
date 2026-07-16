#!/usr/bin/env sh

set -eu

theme_dir=$(CDPATH= cd -- "$(dirname -- "$0")/.." && pwd)
template="$theme_dir/page-about-us.php"

for file in \
	"$template" \
	"$theme_dir/assets/images/about-hero.webp" \
	"$theme_dir/assets/images/dr-vic-martel.png"; do
	if [ ! -f "$file" ]; then
		echo "Missing about page file: $file" >&2
		exit 1
	fi
done

grep -Fq 'HIPPA compliant business tool' "$template"
grep -Fq 'Excellence in Healthcare' "$template"
grep -Fq 'Dr. Vic Martel' "$template"
grep -Fq 'get_header()' "$template"
grep -Fq 'get_footer()' "$template"

echo "About page checks passed."
