# MetatagData

<<<<<<< HEAD
<<<<<<< HEAD
=======

### Versione HEAD

>>>>>>> 355a587 (.)
## Descrizione
La classe `MetatagData` gestisce i metadati del sito, inclusi loghi, colori e configurazioni SEO.

## Proprietà Principali

### Loghi e Branding
- `logo_header`: Logo principale del sito
- `logo_header_dark`: Logo per tema scuro
- `logo_square`: Logo quadrato per icone
- `logo_footer`: Logo per il footer
- `logo_alt`: Testo alternativo per i loghi
- `logo_height`: Altezza del logo

### Metadati SEO
- `title`: Titolo del sito
- `sitename`: Nome del sito
- `subtitle`: Sottotitolo
- `description`: Descrizione del sito
- `keywords`: Parole chiave
- `author`: Autore
- `generator`: Generatore del sito

### Colori
- `color_primary`: Colore primario
- `color_title`: Colore del titolo
- `color_megamenu`: Colore del megamenu
- `color_hamburger`: Colore dell'hamburger menu
- `color_banner`: Colore del banner

## Metodi Principali

### Gestione Loghi
```php
// Ottiene il logo del brand (metodo semantico)
$logo = $metatag->getBrandLogo();

// Ottiene il logo dell'header (implementazione di base)
$headerLogo = $metatag->getLogoHeader();

// Ottiene il logo per tema scuro
$darkLogo = $metatag->getLogoHeaderDark();

// Ottiene l'altezza del logo
$height = $metatag->getLogoHeight();
```

### Gestione Colori
```php
// Ottiene i colori per Filament
$colors = $metatag->getFilamentColors();

// Ottiene tutti i colori
$allColors = $metatag->getAllColors();

// Ottiene i colori personalizzati
$customColors = $metatag->getColors();
```

### Gestione Metadati
```php
// Ottiene i valori meta
$metaValues = $metatag->getMetaValues();

// Ottiene le card social
$socialCards = $metatag->getSocialCards();

// Ottiene i dati OpenGraph
$openGraph = $metatag->getOpenGraph();

// Ottiene i dati Twitter Cards
$twitterCards = $metatag->getTwitterCards();
```

## Best Practices

1. **Utilizzo dei Loghi**:
   - Preferire `getBrandLogo()` per operazioni relative al brand
   - Utilizzare `getLogoHeader()` solo per compatibilità
   - Verificare sempre la presenza del logo dark

2. **Gestione Colori**:
   - Utilizzare `getFilamentColors()` per l'integrazione con Filament
   - Mantenere coerenza nella palette colori
   - Documentare le variazioni di colore

3. **SEO**:
   - Mantenere descrizioni uniche e pertinenti
   - Utilizzare parole chiave rilevanti
   - Aggiornare regolarmente i metadati

## Note di Implementazione

1. **Singleton Pattern**:
   - La classe utilizza il pattern Singleton
   - Accesso tramite `MetatagData::make()`
   - Configurazione caricata da `TenantService`

2. **Gestione Errori**:
   - Fallback automatico per loghi mancanti
   - Logging degli errori
   - Valori predefiniti per campi obbligatori

3. **Tipizzazione**:
   - Tutte le proprietà sono tipizzate
   - I metodi hanno return type hint
   - Supporto per PHPStan livello 10

## Collegamenti
- [Configurazione Logo](../logo_resolution.md)
- [Gestione Colori](../colors.md)
- [SEO Best Practices](../seo.md)
<<<<<<< HEAD
=======
=======

### Versione Alternativa

>>>>>>> 355a587 (.)
La classe MetatagData è un Data Object che gestisce i meta tag per il SEO e i social media.
>>>>>>> 3268b83 (.)

---


## Caratteristiche principali

- Gestione dei meta tag SEO standard
- Supporto per Open Graph Protocol
- Configurazione Twitter Cards
- Integrazione con schema.org
- Gestione dei meta tag personalizzati

## Proprietà

| Proprietà | Tipo | Descrizione |
|-----------|------|-------------|
| title | string | Titolo della pagina |
| description | string | Descrizione della pagina |
| keywords | array | Parole chiave per SEO |
| robots | string | Direttive per i crawler |
| author | string | Autore del contenuto |
| ogTitle | string | Titolo per Open Graph |
| ogDescription | string | Descrizione per Open Graph |
| ogImage | string | URL immagine per Open Graph |
| twitterCard | string | Tipo di Twitter Card |
| twitterTitle | string | Titolo per Twitter |
| twitterDescription | string | Descrizione per Twitter |
| twitterImage | string | URL immagine per Twitter |

## Metodi

### Costruttore
```php
public function __construct(array $data)
```

### Factory Methods
```php
public static function fromArray(array $data): self
public static function make(array $data = []): self
```

### Metodi di generazione
```php
public function toHtml(): string
public function toArray(): array
```

<<<<<<< HEAD
<<<<<<< HEAD
=======
=======

### Versione HEAD


### Versione Alternativa

>>>>>>> 355a587 (.)
## Best Practices

- Utilizzare i metodi factory per creare nuove istanze
- Validare i dati in ingresso con Assert
- Mantenere l'immutabilità dell'oggetto
- Seguire le specifiche dei vari protocolli (Open Graph, Twitter Cards)
- Utilizzare URL assoluti per le immagini

<<<<<<< HEAD
>>>>>>> 3268b83 (.)
=======

---

>>>>>>> 355a587 (.)
## Esempio di utilizzo

```php
$metatags = MetatagData::make([
    'title' => 'Titolo della pagina',
    'description' => 'Descrizione della pagina',
    'ogTitle' => 'Titolo per social',
    'ogImage' => 'https://example.com/image.jpg',
]);

echo $metatags->toHtml();
```

## Validazione

La classe utilizza `Assert` per validare:
- Presenza dei campi obbligatori
- Formato corretto degli URL
- Lunghezza appropriata dei testi
<<<<<<< HEAD
<<<<<<< HEAD
- Valori validi per i tipi di card 
=======
- Valori validi per i tipi di card 
>>>>>>> 3268b83 (.)
=======

### Versione HEAD

- Valori validi per i tipi di card 

### Versione Alternativa

- Valori validi per i tipi di card 

---

>>>>>>> 355a587 (.)
