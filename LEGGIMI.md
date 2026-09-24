# Elisa Carosi · sito e preventivo

La pagina è in `index.html`; foto, texture e video sono in `media/`. `richiesta.php` riceve i due moduli e li inoltra a `elisa.carosi@me.com`. Se il server non riesce a inviarli, la pagina propone un link `mailto:` con la richiesta già scritta. Il recapito effettivo va verificato con Elisa usando una richiesta di prova prima di considerare conclusa la messa in funzione dei moduli.

## Prezzi e limiti

I prezzi base sono in cima allo script di `index.html`: 50 € a performance, 130 € per tre performance uguali. Due tessuti normali costano 100 €; la terza performance è disponibile solo con l'opzione amaca, e in quel caso il set costa 130 €. Ogni attrezzo ha il proprio limite di selezione. I supplementi struttura sono definiti nei selettori delle rispettive card: 150 € per tessuti e cerchio, 80 € per lollipop e palo. La trasferta fuori Roma costa 50 €. Il 31 dicembre aggiunge automaticamente 100 €.

Il riepilogo marca la struttura come **da verificare** quando il cliente non sa ancora se è presente in location. Tra due performance di Elisa occorrono almeno 30 minuti di recupero; la sequenza mostrata nel riepilogo è indicativa e non assegna orari definitivi.

## Pubblicazione

`main` su GitHub aggiorna GitHub Pages. Il dominio `elisacarosiperformer.it` usa invece il repository Git di cPanel nella cartella `repositories/elisa-carosi`. Per aggiornarlo, in cPanel apri **Git Version Control → Elisa Carosi → Pull or Deploy**, scegli **Update from Remote** e poi **Deploy HEAD Commit**. `.cpanel.yml` esegue `deploy-cpanel.sh`, che copia solo `index.html`, `richiesta.php` e `media/` in `public_html` e mantiene WordPress e i suoi file intatti. Se necessario, imposta `index.html` come homepage e conserva una copia di `.htaccess` fuori dalla cartella pubblica.

Il push su GitHub da solo non aggiorna automaticamente il dominio cPanel.
