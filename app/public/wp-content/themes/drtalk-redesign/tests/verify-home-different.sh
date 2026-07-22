#!/usr/bin/env sh

set -eu

theme_dir=$(CDPATH= cd -- "$(dirname -- "$0")/.." && pwd)

for file in \
	"$theme_dir/assets/images/different-referral-friction.svg" \
	"$theme_dir/assets/images/different-divider.svg" \
	"$theme_dir/assets/images/different-relationship-risk.svg" \
	"$theme_dir/assets/images/different-staff-dependency.svg" \
	"$theme_dir/assets/images/different-growth-risk.svg"; do
	if [ ! -f "$file" ]; then
		echo "Missing different-section asset: $file" >&2
		exit 1
	fi
done

grep -Fq "Put Operational AI to Work for Your Office" "$theme_dir/front-page.php"
grep -Fq "You didn't build a specialty practice to manage inboxes." "$theme_dir/front-page.php"
grep -Fq "Referral Friction" "$theme_dir/front-page.php"
grep -Fq "Relationship Risk" "$theme_dir/front-page.php"
grep -Fq "Staff Dependency" "$theme_dir/front-page.php"
grep -Fq "Growth Risk" "$theme_dir/front-page.php"
grep -Fq 'class="operational-ai-card flex flex-col gap-8" tabindex="0"' "$theme_dir/front-page.php"
grep -Fq 'class="operational-ai-icon h-20 w-[7.875rem]"' "$theme_dir/front-page.php"
grep -Fq '.operational-ai-card:hover,' "$theme_dir/src/input.css"
grep -Fq '.operational-ai-card:focus-visible' "$theme_dir/src/input.css"
grep -Fq '.operational-ai-card:hover .operational-ai-icon,' "$theme_dir/src/input.css"

echo "Different-section checks passed."
