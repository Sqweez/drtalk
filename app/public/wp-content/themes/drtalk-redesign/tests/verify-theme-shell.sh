#!/usr/bin/env sh

set -eu

theme_dir=$(CDPATH= cd -- "$(dirname -- "$0")/.." && pwd)

for file in \
	"$theme_dir/header.php" \
	"$theme_dir/footer.php" \
	"$theme_dir/inc/links.php" \
	"$theme_dir/template-parts/site-header.php" \
	"$theme_dir/template-parts/site-footer.php" \
	"$theme_dir/assets/js/theme.js"; do
	if [ ! -f "$file" ]; then
		echo "Missing shared shell file: $file" >&2
		exit 1
	fi
done

grep -Fq 'wp_head()' "$theme_dir/header.php"
grep -Fq 'wp_body_open()' "$theme_dir/header.php"
grep -Fq 'wp_footer()' "$theme_dir/footer.php"
grep -Fq "register_nav_menus" "$theme_dir/functions.php"
grep -Fq "drtalk_redesign_demo_url" "$theme_dir/inc/links.php"
grep -Fq "drtalk_redesign_login_url" "$theme_dir/inc/links.php"
grep -Fq 'Get a Free Referral Analysis' "$theme_dir/template-parts/site-header.php"
grep -Fq 'Log In' "$theme_dir/template-parts/site-header.php"
grep -Fq "home_url('/about-us/')" "$theme_dir/template-parts/site-header.php"
grep -Fq "home_url('/blog/')" "$theme_dir/template-parts/site-header.php"
grep -Fq 'Create Account' "$theme_dir/template-parts/site-footer.php"
grep -Fq 'Business Associates Agreement' "$theme_dir/template-parts/site-footer.php"
grep -Fq 'icon-linkedin.svg' "$theme_dir/template-parts/site-footer.php"
grep -Fq 'drtalk-logo-light.png' "$theme_dir/template-parts/site-footer.php"

echo "Theme shell checks passed."
