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
