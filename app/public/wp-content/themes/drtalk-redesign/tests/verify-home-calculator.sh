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
grep -Fq "data-calculator" "$theme_dir/front-page.php"
grep -Fq "data-calculator-input=\"<?php echo \$calculator_id; ?>\"" "$theme_dir/front-page.php"
grep -Fq "'id' => 'referrals'" "$theme_dir/front-page.php"
grep -Fq "'id' => 'case-value'" "$theme_dir/front-page.php"
grep -Fq "'id' => 'conversion-rate'" "$theme_dir/front-page.php"
grep -Fq "data-calculator-monthly" "$theme_dir/front-page.php"
grep -Fq "data-calculator-annual" "$theme_dir/front-page.php"
grep -Fq "data-calculator-health" "$theme_dir/front-page.php"
grep -Fq "data-calculator-health-band" "$theme_dir/front-page.php"
grep -Fq "const calculatorRoot" "$theme_dir/assets/js/theme.js"
grep -Fq "Math.max(5, Math.min(95" "$theme_dir/assets/js/theme.js"
grep -Fq "lostReferrals * caseValue" "$theme_dir/assets/js/theme.js"

echo "Calculator-section checks passed."
