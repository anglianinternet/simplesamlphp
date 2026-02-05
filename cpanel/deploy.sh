#!/usr/bin/env bash
set -euo pipefail

SCRIPT_DIR="$(cd "$(dirname "${BASH_SOURCE[0]}")" && pwd)"
REPO_ROOT="$(cd "$SCRIPT_DIR/.." && pwd)"

# Symlink: $HOME/public_html/authentication -> repo/public
LINK_PATH="${LINK_PATH:-$HOME/public_html/authentication}"

err() { echo "deploy.sh: $*" >&2; exit 1; }

# Require path to be set and non-empty
[[ -n "${LINK_PATH:-}" ]] || err "LINK_PATH is empty"

# Require path to be under $HOME (no escaping outside home)
case "$LINK_PATH" in
  "$HOME"|"$HOME"/*) ;;
  *) err "LINK_PATH must be under \$HOME: $LINK_PATH" ;;
esac

# Require repo layout
[[ -d "$REPO_ROOT/public" ]] || err "missing repo dir: public/"

# If target exists and is not a symlink, do not overwrite
if [[ -e "$LINK_PATH" ]]; then
  if [[ -L "$LINK_PATH" ]]; then
    rm "$LINK_PATH"
  else
    err "LINK_PATH exists but is not a symlink (cannot overwrite): $LINK_PATH"
  fi
fi

ln -s "$REPO_ROOT/public" "$LINK_PATH"
echo "deploy.sh: symlink created: $LINK_PATH -> $REPO_ROOT/public"

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
