#!/usr/bin/env sh

set -eu

theme_dir=$(CDPATH= cd -- "$(dirname -- "$0")/.." && pwd)

for file in \
	"$theme_dir/index.php" \
	"$theme_dir/front-page.php" \
	"$theme_dir/assets/images/drtalk-logo-dual.png" \
	"$theme_dir/assets/images/drtalk-logo-white.png"; do
	if [ ! -f "$file" ]; then
		echo "Missing home page asset: $file" >&2
		exit 1
	fi
done

grep -Fq "Stop Losing Referrals You Never Know You Missed" "$theme_dir/front-page.php"
grep -Fq "Claim Your Free Referral Gap Analysis" "$theme_dir/front-page.php"
grep -Fq "Built by Dentists for Dentists" "$theme_dir/front-page.php"
grep -Fq "Trusted By Dentistry’s Top Leaders" "$theme_dir/front-page.php"
grep -Fq "hero-background-motion" "$theme_dir/front-page.php"
grep -Fq "hero-art-float" "$theme_dir/front-page.php"
grep -Fq "@keyframes hero-art-float" "$theme_dir/src/input.css"
grep -Fq "partner-logo-1.png" "$theme_dir/front-page.php"
grep -Fq "partner-logo-3.png" "$theme_dir/front-page.php"
grep -Fq "partner-logo-4.png" "$theme_dir/front-page.php"
grep -Fq "partner-logo-5.png" "$theme_dir/front-page.php"
grep -Fq "partner-logo-6.png" "$theme_dir/front-page.php"

echo "Home page checks passed."
