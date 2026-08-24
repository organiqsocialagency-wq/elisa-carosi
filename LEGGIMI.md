# Sito Elisa Carosi

Costruito sull'identità visiva di Elisa (brandbook in cartella): palette prugna / corallo /
rosa polveroso / blu mezzanotte / oro / avorio, Cormorant Garamond per i titoli,
Montserrat per il corpo, Allura per le firme.

## Cosa c'è dentro

- `index.html` — la pagina. Tutto lo stile e la logica del preventivo sono qui dentro.
- `media/` — video hero, poster, le due foto e le quattro texture acquerello
  (`tex-macchia`, `tex-corallo`, `tex-oro`, `tex-schizzi`), ritagliate dal brandbook
  con lo sfondo reso trasparente.
- `elisa-carosi-file-unico.html` — la stessa pagina con video e foto incorporati: un solo file
  da caricare ovunque, senza cartelle. Pesa 5 MB, quindi per il web è meglio `index.html` + `media/`.

## Cambiare i prezzi

Tutti i prezzi stanno in cima allo `<script>` di `index.html`, cerca `PREZZO_USCITA`:

    var PREZZO_USCITA = 50;      // prezzo di una singola uscita
    var PREZZO_SET    = 130;     // prezzo quando si raggiunge il set completo

I supplementi sono negli attributi `data-amount` dei tre checkbox (struttura 150, trasferta 50,
capodanno 100). Se cambi il numero, ricordati di aggiornare anche il `+150 €` scritto accanto.

## Le performance

Ogni performance è un `<article class="perf">` con `data-key`, `data-name`, `data-max` e
`data-cat` (aerea / terra / luce, per il filtro). Cliccando l'intestazione la card si apre e
mostra descrizione, tag e stepper. Per aggiungerne una, copia un blocco e cambia quei dati.

## La regola del set

Il set scatta quando raggiungi il massimo di uscite di quell'attrezzo: 3 uguali per tutte le
performance, 2 per il tessuto (che ha `data-max="2"`). Sotto il massimo si paga a uscita.

## Colori e font

Tutti i colori sono variabili CSS in cima al file, nel blocco `:root`, con i nomi del
brandbook: `--plum` #2B0F2E, `--coral` #FF6B6B, `--rose` #C47A87, `--midnight` #0D1B2A,
`--gold` #D4AF37, `--ivory` #F7F4EF. Cambiando lì cambia tutto il sito.

Le icone sono uno sprite SVG in cima al `<body>`: ogni disciplina, valore e microelemento
è un `<symbol id="i-...">` richiamato con `<use href="#i-...">`.

## Numero e email

Cerca `var TEL` e `var EMAIL` nello script. Il numero va in formato internazionale senza `+`.

## I due moduli email

Entrambi aprono l'app di posta con `mailto:` — nessun server, nessun servizio esterno.
Il primo (nella scaletta) manda le performance scelte con giorno e orario; il secondo
(sezione "Su misura") manda la richiesta di performance personalizzata.

## Vedere il sito in locale

    node .claude/preview-server.mjs

poi apri http://localhost:8777
