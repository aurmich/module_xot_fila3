<<<<<<< HEAD
<<<<<<< HEAD

=======
<<<<<<< HEAD
=======

>>>>>>> origin/dev
>>>>>>> 3268b83 (.)
=======

### Versione HEAD



### Versione Alternativa


### Versione HEAD


### Versione Alternativa



---


---

>>>>>>> 355a587 (.)
# Linee Guida per la Documentazione in Laraxot

Questo documento definisce le best practices per la creazione e la manutenzione della documentazione all'interno del framework Laraxot.

## Struttura della Documentazione

### 1. Organizzazione dei File

La documentazione dovrebbe essere organizzata in modo coerente in tutti i moduli:

```
Modules/NomeModulo/
├── docs/                  # Documentazione ufficiale in formato Markdown
│   ├── README.md          # Panoramica e punto d'ingresso
│   ├── module_nome.md     # Descrizione dettagliata del modulo
│   ├── BEST-PRACTICES.md  # Best practices specifiche del modulo
│   ├── MODELS.md          # Documentazione dei modelli
│   ├── ...                # Altri documenti specifici
│   └── assets/            # Immagini, diagrammi e altri assets
│
└── _docs/                 # Note, appunti e documenti in fase di sviluppo
    ├── topic1.txt         # Appunti su un argomento specifico
    ├── links.txt          # Collegamenti utili
    └── ...                # Altri appunti
```

### 2. Nomenclatura dei File

Per garantire coerenza e facilità di navigazione:

- File principali: utilizzare MAIUSCOLE con trattini (es. `BEST-PRACTICES.md`)
- File secondari: utilizzare lowercase con trattini (es. `getting-started.md`)
- File di appunti: utilizzare lowercase con underscore (es. `api_notes.txt`)
- File specifici del modulo: prefix `module_` seguito dal nome del modulo in minuscolo (es. `module_brain.md`)

## Formato dei Documenti

### 1. Frontmatter (opzionale)

Per i documenti che utilizzeranno un generatore di siti statici come Jigsaw, iniziare con un frontmatter YAML:

```markdown
---
title: Titolo del Documento
description: Breve descrizione del contenuto
category: Categoria (es. Modelli, API, Config)
position: 1
---
```

### 2. Intestazione e Introduzione

Ogni documento dovrebbe iniziare con:

```markdown
# Titolo Principale

Breve introduzione che spiega lo scopo del documento e il contesto.
```

### 3. Struttura delle Sezioni

Utilizzare una gerarchia chiara di intestazioni:

```markdown
## Sezione Principale

Descrizione della sezione principale.

### Sottosezione

Contenuto dettagliato della sottosezione.

#### Ulteriore dettaglio

Contenuto ancora più specifico.
```

### 4. Blocchi di Codice

Per gli esempi di codice, specificare sempre il linguaggio:

````markdown
```php
// Esempio di codice PHP
public function example(): string
{
    return 'Esempio';
}
```

```blade
{{-- Esempio di codice Blade --}}
<x-layout>
    <h1>{{ $title }}</h1>
</x-layout>
```
````

### 5. Note, Avvisi e Suggerimenti

Utilizzare un formato coerente per evidenziare informazioni importanti:

```markdown
> **Nota:** Informazioni aggiuntive che potrebbero essere utili.

> **Attenzione:** Avviso su potenziali problemi o considerazioni importanti.

> **Suggerimento:** Consigli per migliorare l'implementazione o l'utilizzo.
```

## Contenuti Specifici per Tipo di Documento

### 1. README.md

Il file README dovrebbe contenere:

- Descrizione del modulo e suo scopo
- Prerequisiti e dipendenze
- Istruzioni di installazione di base
- Esempi di utilizzo principali
- Collegamenti ad altra documentazione rilevante

### 2. MODELS.md

La documentazione dei modelli dovrebbe includere:

- Nome della classe del modello e namespace completo
- Tabella del database associata e chiave primaria
- Attributi principali con descrizioni
- Relazioni con altri modelli
- Scopes e metodi personalizzati
- Esempi di utilizzo comune

Esempio:
```markdown
## NomeModello

```php
Modules\ModuloNome\Models\NomeModello
```

**Tabella:** `nome_tabella`  
**Chiave primaria:** `id_nome`

**Attributi principali:**
- `attributo_1`: Descrizione
- `attributo_2`: Descrizione

**Relazioni:**
- `relazioneUno()`: Appartiene a un `AltroModello`
- `relazioneDue()`: Ha molti `AltroModello`

**Scopes:**
- `attivi()`: Filtra per elementi attivi

**Esempio di utilizzo:**
```php
$modelli = NomeModello::attivi()->get();
```
```

### 3. SERVICE-PROVIDER.md

La documentazione dei service provider dovrebbe includere:

- Scopo del provider
- Metodi principali e cosa registrano
- Configurazioni specifiche
- Hooks e eventi associati

### 4. TRANSLATIONS.md

La documentazione delle traduzioni dovrebbe includere:

- Struttura dei file di traduzione
- Convenzioni di naming
- Esempi di utilizzo nelle view/componenti
- Best practices per la traduzione

## Mantenimento della Documentazione

### 1. Sincronizzazione con il Codice

La documentazione dovrebbe essere aggiornata contemporaneamente alle modifiche del codice correlato. In particolare:

- Quando si crea o si modifica un modello, aggiornare `MODELS.md`
- Quando si aggiungono nuovi provider, aggiornare `SERVICE-PROVIDER.md`
- Quando si modificano le convenzioni, aggiornare `BEST-PRACTICES.md`

### 2. Generazione Automatica

Utilizzare strumenti di generazione automatica quando possibile:

```bash
# Esempio: Generare documentazione per lo schema del database
php artisan xot:generate-db-documentation /path/to/schema.json /path/to/output
```

### 3. Controlli di Qualità

Prima di committare la documentazione:

- Verificare che i link siano validi
- Controllare che gli esempi di codice siano funzionanti e aggiornati
- Assicurarsi che la formattazione Markdown sia corretta
- Verificare la coerenza terminologica

## Integrazione Cross-Module

### 1. Collegamenti tra Moduli

Quando si fa riferimento a concetti o classi in altri moduli, utilizzare collegamenti relativi:

```markdown
Per ulteriori informazioni, consultare la [documentazione del modulo UI](../UI/docs/README.md).
```

### 2. Documentazione Centralizzata

Alcuni argomenti comuni a più moduli dovrebbero essere documentati nel modulo Xot e poi referenziati dagli altri moduli:

```markdown
Per le best practices generali sul framework, consultare la [guida principale](../Xot/docs/best-practices.md).
```

## Esempi di Eccellenza

### Documentazione di Modelli

```markdown
# Modelli del Modulo Brain

Questo documento descrive i modelli disponibili nel modulo Brain, che rappresentano le entità del database braindb.

## Struttura dei Modelli

Tutti i modelli seguono la struttura namespace `Modules\Brain\Models` e sono progettati per interfacciarsi con il database braindb configurato come connessione `brain` in Laravel.

## Modelli Disponibili

### Socio

Rappresenta un socio dell'associazione.

```php
Modules\Brain\Models\Socio
```

**Tabella:** `socio`  
**Chiave primaria:** `id_socio`

**Relazioni:**
- `sezione()`: Appartiene a una `Sezione`
- `statoSocio()`: Appartiene a uno `StatoSocio`
- `convenzioni()`: Ha molti attraverso `SocioRichiestaConvenzione`

**Scope:**
- `attivi()`: Filtra per soci attivi

**Esempio di utilizzo:**
```php
$sociAttivi = Socio::attivi()->with('sezione')->get();
```
```

## Implementazione

Per implementare queste linee guida:

1. Creare questa guida nel modulo Xot come riferimento centrale
2. Aggiornare gradualmente la documentazione esistente per seguire queste convenzioni
3. Utilizzare questa struttura per tutta la nuova documentazione
4. Condividere queste linee guida con il team di sviluppo
5. Includere controlli della documentazione nel processo di code review

## Risorse Utili

- [Markdown Guide](https://www.markdownguide.org/)
- [Documentazione Laravel](https://laravel.com/docs)
- [Documentazione PHPDoc](https://docs.phpdoc.org/)
<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
=======
=======

### Versione HEAD


### Versione Alternativa


### Versione HEAD


### Versione Alternativa


### Versione Alternativa

>>>>>>> 355a587 (.)
# Linee Guida per la Documentazione

## Struttura della Documentazione

### 1. Documentazione Specifica del Modulo

- Si trova nella cartella `docs/` di ogni modulo
- Contiene la documentazione tecnica approfondita
- Descrive funzionalità, architettura e utilizzo del modulo

### 2. Documentazione Generale

- Si trova in sottocartelle tematiche nella directory `docs/` nella root del progetto
- Esempi di sottocartelle tematiche:
  - `docs/architecture/` - Per documenti relativi all'architettura tecnica
  - `docs/rules/` - Per documenti relativi alle regole e convenzioni
  - `docs/moduli/` - Per documenti generali sui moduli
  - `docs/troubleshooting/` - Per documenti relativi alla risoluzione problemi

## Nomenclatura

I file di documentazione devono seguire queste convenzioni di naming:

1. **File README.md**:
   - Ogni cartella `docs/` di un modulo deve contenere un file `README.md`
   - Descrive la panoramica del modulo/componente
   - È il punto di ingresso per la documentazione del modulo

2. **File specifici**:
   - Utilizzare il formato `kebab-case.md` per i nomi dei file
   - Il nome deve riflettere chiaramente il contenuto
   - Esempi: `gestione-utenti.md`, `workflow-appuntamenti.md`

3. **Titoli nei file**:
   - Il titolo principale (H1) del documento deve corrispondere al nome del file
   - Esempio: File `gestione-utenti.md` → Titolo `# Gestione Utenti`

## Collegamenti Bidirezionali

I collegamenti tra documenti devono:

1. **Essere sempre relativi**:
   ```markdown
   [Gestione Utenti](../../docs/gestione-utenti.md)
   ```

2. **Essere bidirezionali**:
   - Il documento di origine deve collegarsi al documento di destinazione
   - Il documento di destinazione deve collegarsi al documento di origine

3. **Essere mantenuti aggiornati**:
   - Quando si sposta un documento, tutti i collegamenti devono essere aggiornati
   - Quando si rinomina un documento, tutti i collegamenti devono essere aggiornati

## Struttura dei Documenti

Ogni documento deve seguire questa struttura:

1. **Titolo principale** (H1):
   ```markdown
   # Nome del Documento
   ```

2. **Breve introduzione**:
   - 2-3 frasi che descrivono lo scopo del documento

3. **Indice** (per documenti lunghi):
   ```markdown
   ## Indice
   - [Sezione 1](#sezione-1)
   - [Sezione 2](#sezione-2)
   ```

4. **Contenuto strutturato**:
   - Utilizzare titoli di sezione (H2, H3) per organizzare il contenuto
   - Mantenere una gerarchia logica

5. **Collegamenti alla documentazione correlata**:
   - Alla fine del documento, aggiungere collegamenti a documenti correlati

## Contenuto

Il contenuto della documentazione deve:

1. **Concentrarsi sul "perché"**:
   - Spiegare le motivazioni dietro le scelte architetturali
   - Documentare le decisioni di design

2. **Descrivere il "cosa"**:
   - Spiegare cosa fa un componente/modulo
   - Descrivere le funzionalità principali

3. **Limitare il "come"**:
   - Evitare dettagli implementativi troppo specifici
   - Questi dettagli cambiano frequentemente e rendono la documentazione obsoleta

4. **Essere conciso ma completo**:
   - Evitare ripetizioni
   - Utilizzare un linguaggio chiaro e diretto

## Regole di Aggiornamento

La documentazione deve essere aggiornata:

1. **Prima del codice**:
   - Aggiornare la documentazione prima di iniziare lo sviluppo (Documentazione Driven Development)

2. **Durante lo sviluppo**:
   - Aggiornare la documentazione quando si prendono decisioni architetturali

3. **Dopo lo sviluppo**:
   - Verificare e completare la documentazione una volta terminato lo sviluppo

4. **Durante la manutenzione**:
   - Aggiornare la documentazione quando si corregge un bug o si modifica una funzionalità esistente

## Multilinguismo

La documentazione deve:

1. **Essere in italiano**:
   - La lingua principale della documentazione è l'italiano

2. **Utilizzare termini tecnici in inglese**:
   - Mantenere i termini tecnici standard in inglese
   - Esempio: "Dependency Injection" anziché "Iniezione di Dipendenze"

## Principio di Modularità

Per garantire la riutilizzabilità dei moduli, la documentazione all'interno dei moduli deve:

1. **Evitare riferimenti al nome del progetto specifico**:
   - Non utilizzare il nome "SaluteOra" nella documentazione dei moduli
   - Usare termini generici come "l'applicazione", "il sistema", ecc.

2. **Focalizzarsi sulla funzionalità del modulo**:
   - Descrivere il funzionamento interno del modulo
   - Documentare i servizi e le funzionalità offerte
   - Spiegare come interagisce con altri moduli in modo generico

3. **Documentare le interfacce, non le implementazioni specifiche**:
   - Concentrarsi sulle interfacce e i contratti esposti dal modulo

## Collegamenti alla Documentazione Generale

- [Linee Guida per la Documentazione di SaluteOra](../../../../docs/linee-guida-documentazione.md)
<<<<<<< HEAD
>>>>>>> aurmich/dev
>>>>>>> origin/dev
>>>>>>> 3268b83 (.)
=======

---


---


---

>>>>>>> 355a587 (.)
