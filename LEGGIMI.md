# Elisa Carosi · sito e preventivo

La pagina è in `index.html`; foto, texture e video sono in `media/`. `richiesta.php` riceve i due moduli e li inoltra a `elisa.carosi@me.com`. Se il server non riesce a inviarli, la pagina propone un link `mailto:` con la richiesta già scritta. Il recapito effettivo va verificato con Elisa usando una richiesta di prova prima di considerare conclusa la messa in funzione dei moduli.

## Prezzi e limiti

I prezzi base sono in cima allo script di `index.html`: 100 € per ogni performance aerea (Tessuti, Cerchio, Lollipop e Palo), senza sconto set. Le performance a terra, il fuoco e le ali di luce costano 50 €; tre performance uguali costano 130 €. Due tessuti classici costano 200 €; la terza performance è disponibile solo con l'opzione amaca e porta il totale a 300 €. Ogni attrezzo ha il proprio limite di selezione. I supplementi struttura restano 150 € per tessuti e cerchio, 80 € per lollipop e palo. La trasferta fuori Roma è selezionabile, ma il prezzo viene concordato in consulenza ed è escluso dal totale indicativo. Il 31 dicembre aggiunge automaticamente 100 €.

L'opzione amaca compare sotto i Tessuti nel riepilogo, con conferma visiva e controlli per aggiungere la terza performance. Disattivandola, l'eventuale terza performance viene rimossa e il totale aggiornato. Per la struttura si sceglie tra quella già presente nella location e quella portata da Elisa. Tra due performance occorrono almeno 30 minuti di recupero; la sequenza mostrata è indicativa e non assegna orari definitivi.

Entrambi i moduli richiedono giorno, inizio e fine serata. Gli orari avanzano di 30 minuti, dalle 08:00 alle 04:00 del giorno successivo; l'ultimo inizio disponibile è alle 03:30. La fine deve seguire l'inizio e le ore dopo mezzanotte sono esplicitamente indicate. Il telefono è facoltativo e viene incluso nella richiesta. Le note aggiuntive sono facoltative (massimo 2.000 caratteri) e vengono incluse sia nell'email inviata dal server sia nell'alternativa tramite app di posta.

Il massimo complessivo è di **4 performance**, sommando tutte le discipline (aeree, danza a terra, fuoco e ali di luce). Restano validi anche i limiti individuali: 2 Tessuti classici oppure 3 in versione amaca, e 3 per ciascuna altra disciplina. L'avviso compare solo al raggiungimento del massimo; tentando di aggiungerne altre, il pulsante dà un feedback visivo e compare un messaggio di blocco. Rimuovendone una si libera un posto. Con almeno 2 aeree, la Ballerina rimane limitata a 2 performance.

## Pubblicazione

`main` su GitHub aggiorna GitHub Pages. Il dominio `elisacarosiperformer.it` usa invece il repository Git di cPanel nella cartella `repositories/elisa-carosi`. Per aggiornarlo, in cPanel apri **Git Version Control → Elisa Carosi → Pull or Deploy**, scegli **Update from Remote** e poi **Deploy HEAD Commit**. `.cpanel.yml` esegue `deploy-cpanel.sh`, che copia solo `index.html`, `richiesta.php` e `media/` in `public_html` e mantiene WordPress e i suoi file intatti. Se necessario, imposta `index.html` come homepage e conserva una copia di `.htaccess` fuori dalla cartella pubblica.

Il push su GitHub da solo non aggiorna automaticamente il dominio cPanel.
