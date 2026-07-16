#!/usr/bin/env sh

set -eu

theme_dir=$(CDPATH= cd -- "$(dirname "$0")/.." && pwd)

for required_file in \
  style.css \
  functions.php \
  package.json \
  postcss.config.mjs \
  .prettierrc.yml \
  .prettierignore \
  src/input.css \
  dist/output.css
do
  if [ ! -f "$theme_dir/$required_file" ]; then
    printf 'Missing required theme file: %s\n' "$required_file" >&2
    exit 1
  fi
done

grep -q '^Theme Name: DrTalk Redesign$' "$theme_dir/style.css"
grep -q '^Text Domain: drtalk-redesign$' "$theme_dir/style.css"

node -e '
  const pkg = require(process.argv[1]);
  const expected = ["build", "watch", "dev", "format", "format:check"];
  for (const script of expected) {
    if (!pkg.scripts?.[script]) {
      throw new Error(`Missing npm script: ${script}`);
    }
  }
' "$theme_dir/package.json"

printf 'Theme foundation checks passed.\n'
