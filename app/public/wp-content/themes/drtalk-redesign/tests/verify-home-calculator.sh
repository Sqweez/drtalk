#!/usr/bin/env sh

set -eu

theme_dir=$(CDPATH= cd -- "$(dirname -- "$0")/.." && pwd)

for file in \
	"$theme_dir/assets/images/calculator-noise.png" \
	"$theme_dir/assets/images/calculator-slider-thumb.svg" \
	"$theme_dir/assets/images/calculator-divider.svg"; do
	if [ ! -f "$file" ]; then
		echo "Missing calculator asset: $file" >&2
		exit 1
	fi
done

grep -Fq "If you can't measure your referral leakage, you can't fix it." "$theme_dir/front-page.php"
grep -Fq "How much revenue is slipping through your fingers?" "$theme_dir/front-page.php"
grep -Fq "Monthly revenue at risk:" "$theme_dir/front-page.php"
grep -Fq "Claim Your Free Referral Gap Analysis" "$theme_dir/front-page.php"
grep -Fq "calculator-slider-thumb.svg" "$theme_dir/front-page.php"

echo "Calculator-section checks passed."
