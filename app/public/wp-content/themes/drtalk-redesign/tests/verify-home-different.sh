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

echo "Different-section checks passed."
