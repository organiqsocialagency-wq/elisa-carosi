# Elisa Carosi · sito e preventivo

La pagina è in `index.html`; foto, texture e video sono in `media/`. `richiesta.php` riceve i due moduli e li inoltra a `elisa.carosi@me.com`. Se il server non riesce a inviarli, la pagina propone un link `mailto:` con la richiesta già scritta. Il recapito effettivo va verificato con Elisa usando una richiesta di prova prima di considerare conclusa la messa in funzione dei moduli.

## Interfaccia

Lora è usato per i titoli, Manrope per testi e controlli e Allura per le firme decorative. Le card chiuse mostrano foto, titolo, requisiti sintetici e selettore quantità; le descrizioni e le animazioni SVG dedicate compaiono all'apertura. Il bordo luminoso segue il puntatore e usa oro, rosa e borgogna. Sul desktop le sette card formano una griglia a tre colonne; dopo la prima selezione diventano una colonna e il preventivo compare a destra. Sul mobile resta l'elenco a una colonna. Il nastro SVG accompagna il gradiente tra tema chiaro e scuro, si ferma fuori schermo e ha un comando pausa. Le animazioni rispettano la preferenza di sistema per il movimento ridotto.

## Galleria e contenuti verificabili

La spirale fotografica contiene 23 foto fornite dall’utente, ottimizzate in WebP (circa 1,9 MB complessivi), senza didascalie visibili. Le immagini sono elementi HTML `img` con descrizioni alternative, dimensioni e caricamento differito. I file sono `media/galleria-elisa-carosi-01.webp` fino a `23.webp`. Conservare proporzioni e firme degli autori quando si sostituiscono gli scatti. La spirale reagisce allo scroll, al trascinamento e alle frecce su/giù; un comando permette di fermarla. Rispetta la preferenza per movimento ridotto.

Numeri di esperienza, location e recensioni dimostrative sono stati rimossi: non sono ancora confermati dall’utente. Reinserire solo dati verificati e testimonianze autentiche autorizzate. Il focus dei testi è Roma e provincia, con pari priorità per matrimoni, compleanni, anniversari, locali ed eventi aziendali.

La struttura di Elisa è inclusa automaticamente nel preventivo come sottovoce di ciascun attrezzo: 150 € per tessuti e cerchio, 80 € per palo e lollipop. La casella compatta **Ho già la struttura** rimuove il relativo supplemento. Il supplemento si applica una volta per attrezzo, anche con più performance sullo stesso.

## Prezzi e limiti

Tutte le tariffe sono ancora provvisorie, come indicato nei testi pubblici. Il riepilogo è una stima, non una conferma di prenotazione. I prezzi base sono in cima allo script di `index.html`: 100 € per ogni performance aerea (Tessuti, Cerchio, Lollipop e Palo), senza sconto set. Le performance a terra, il fuoco e le ali di luce costano 50 €; tre performance uguali costano 130 €. Due tessuti classici costano 200 €; la terza performance è disponibile solo con l'opzione amaca e porta il totale a 300 €. Ogni attrezzo ha il proprio limite di selezione. I supplementi struttura restano 150 € per tessuti e cerchio, 80 € per lollipop e palo. La trasferta fuori Roma è selezionabile, ma il prezzo viene concordato in consulenza ed è escluso dal totale indicativo. Il 31 dicembre aggiunge automaticamente 100 €.

L’opzione **Tessuto in amaca** è una casella compatta nel riepilogo. Con un Tessuto vale per quella performance; con almeno due Tessuti, dopo averla spuntata, si può scegliere quanti eseguire in amaca. Sono consentite fino a tre performance di Tessuti se almeno una è in amaca, sempre nel limite complessivo di quattro. Disattivando l’amaca, l’eventuale terzo Tessuto viene rimosso. I 30 minuti di recupero sono indicati nelle descrizioni delle performance.

Giorno, inizio e fine serata sono obbligatori nel preventivo e facoltativi nella richiesta personalizzata, anche per il ricevitore PHP. Se specificati, data e orari vengono comunque validati. Gli orari avanzano di 30 minuti, dalle 08:00 alle 04:00 del giorno successivo; l’ultimo inizio disponibile è alle 03:30. Quando sono presenti entrambi gli orari, la fine deve seguire l’inizio. Telefono e note (massimo 2.000 caratteri) sono facoltativi e inclusi sia nell’email del server sia nell’alternativa tramite app di posta.

Il massimo complessivo è di **4 performance**, sommando tutte le discipline (aeree, danza a terra, fuoco e ali di luce). Restano validi anche i limiti individuali: 2 Tessuti classici oppure 3 in versione amaca, e 3 per ciascuna altra disciplina. L'avviso compare solo al raggiungimento del massimo; tentando di aggiungerne altre, il pulsante dà un feedback visivo e compare un messaggio di blocco. Rimuovendone una si libera un posto. Con almeno 2 aeree, la danza a terra rimane limitata a 2 performance.

## Pubblicazione

`main` su GitHub aggiorna GitHub Pages. Il dominio `elisacarosiperformer.it` usa invece il repository Git di cPanel nella cartella `repositories/elisa-carosi`. Per aggiornarlo, in cPanel apri **Git Version Control → Elisa Carosi → Pull or Deploy**, scegli **Update from Remote** e poi **Deploy HEAD Commit**. `.cpanel.yml` esegue `deploy-cpanel.sh`, che copia solo `index.html`, `richiesta.php`, `robots.txt`, `sitemap.xml` e `media/` in `public_html` e mantiene WordPress e i suoi file intatti. Se necessario, imposta `index.html` come homepage e conserva una copia di `.htaccess` fuori dalla cartella pubblica.

Il push su GitHub da solo non aggiorna automaticamente il dominio cPanel.

## SEO

La pagina usa un solo H1, titoli per le sezioni e i tipi di evento, canonical sul dominio principale, metadati social e dati strutturati Person, servizi e FAQ coerenti con i contenuti visibili. Nessun prezzo provvisorio o recensione inventata è incluso nei dati strutturati. La sitemap elenca la homepage e le 23 foto; robots.txt la rende individuabile. Non sono garantiti risultati arricchiti, indicizzazione o posizionamenti. Il report editoriale completo è conservato fuori dal sito, nella cartella di progetto.
