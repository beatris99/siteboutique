#!/usr/bin/env sh
set -eu
ROOT="$(CDPATH= cd -- "$(dirname -- "$0")/.." && pwd)"
FONT_DIR="$ROOT/public/fonts"
mkdir -p "$FONT_DIR"

download() {
  url="$1"
  target="$2"
  echo "Downloading $(basename "$target")..."
  curl -fL --retry 3 --connect-timeout 15 "$url" -o "$target"
  [ "$(wc -c < "$target")" -ge 500 ] || { echo "Invalid download: $target" >&2; exit 1; }
}

download 'https://cdn.jsdelivr.net/fontsource/fonts/instrument-sans:vf@5.3.0/latin-wght-normal.woff2' "$FONT_DIR/instrument-sans-latin-wght-normal.woff2"
download 'https://cdn.jsdelivr.net/fontsource/fonts/instrument-sans:vf@5.3.0/latin-ext-wght-normal.woff2' "$FONT_DIR/instrument-sans-latin-ext-wght-normal.woff2"
download 'https://cdn.jsdelivr.net/fontsource/fonts/source-serif-4:vf@5.3.0/latin-wght-normal.woff2' "$FONT_DIR/source-serif-4-latin-wght-normal.woff2"
download 'https://cdn.jsdelivr.net/fontsource/fonts/source-serif-4:vf@5.3.0/latin-ext-wght-normal.woff2' "$FONT_DIR/source-serif-4-latin-ext-wght-normal.woff2"
download 'https://raw.githubusercontent.com/google/fonts/main/ofl/instrumentsans/OFL.txt' "$FONT_DIR/LICENSE-INSTRUMENT-SANS.txt"
download 'https://raw.githubusercontent.com/google/fonts/main/ofl/sourceserif4/OFL.txt' "$FONT_DIR/LICENSE-SOURCE-SERIF-4.txt"

echo "Self-hosted fonts installed in $FONT_DIR"
ls -lh "$FONT_DIR"
