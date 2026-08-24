#!/bin/bash
# Manda online le modifiche al sito.
# Uso:  ./pubblica.sh "descrizione della modifica"
# Se non scrivi nulla, mette la data come descrizione.

set -e
cd "$(dirname "$0")"

MSG="${1:-Aggiornamento del $(date '+%d/%m/%Y alle %H:%M')}"

if [ -z "$(git status --porcelain)" ]; then
  echo "Nessuna modifica da pubblicare."
  exit 0
fi

git add -A
git commit -q -m "$MSG"
git push -q origin main

echo "Fatto: \"$MSG\""
echo "Il sito si aggiorna entro un minuto circa."
