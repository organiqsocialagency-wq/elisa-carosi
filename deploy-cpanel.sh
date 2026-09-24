#!/bin/sh
set -eu
webroot=/home/ymoepkke/public_html
backup=/home/ymoepkke/backups-elisa-landing
mkdir -p "$backup" "$webroot/media"
if ! grep -q '^DirectoryIndex index.html index.php$' "$webroot/.htaccess"; then
  cp -p "$webroot/.htaccess" "$backup/htaccess-$(date +%Y%m%d-%H%M%S)"
  printf '\n# Homepage Elisa Carosi\nDirectoryIndex index.html index.php\n' >> "$webroot/.htaccess"
fi
cp -R media/. "$webroot/media/"
cp index.html "$webroot/index.html"
