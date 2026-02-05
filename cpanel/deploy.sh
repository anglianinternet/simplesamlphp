#!/usr/bin/env bash
set -euo pipefail

SCRIPT_DIR="$(cd "$(dirname "${BASH_SOURCE[0]}")" && pwd)"
REPO_ROOT="$(cd "$SCRIPT_DIR/.." && pwd)"

# Symlink: $HOME/public_html/authentication -> repo/public
PUBLIC_PATH="${PUBLIC_PATH:-$HOME/public_html/authentication}"
CONFIG_PATH="${CONFIG_PATH:-$HOME/private/saml-configuration}"

err() { echo "deploy.sh: $*" >&2; exit 1; }

# Require path to be set and non-empty
[[ -n "${PUBLIC_PATH:-}" ]] || err "PUBLIC_PATH is empty"

# Require path to be under $HOME (no escaping outside home)
case "$PUBLIC_PATH" in
  "$HOME"|"$HOME"/*) ;;
  *) err "PUBLIC_PATH must be under \$HOME: $PUBLIC_PATH" ;;
esac

# Require repo layout
[[ -d "$REPO_ROOT/public" ]] || err "missing repo dir: public/"


mkdir -p "$PUBLIC_PATH"
cp -a "$REPO_ROOT/public/." "$PUBLIC_PATH/"
ln -s "$CONFIG_PATH"/* "$REPO_ROOT/config"
echo "deploy.sh: symlink created: $PUBLIC_PATH -> $REPO_ROOT/public"

# Composer: prefer PATH, then ~/bin/composer
COMPOSER=""
if command -v composer >/dev/null 2>&1; then
  COMPOSER="composer"
elif [[ -x "$HOME/bin/composer" ]]; then
  COMPOSER="$HOME/bin/composer"
fi
if [[ -n "$COMPOSER" ]]; then
  "$COMPOSER" --working-dir="$REPO_ROOT" install --no-dev --no-interaction
fi
