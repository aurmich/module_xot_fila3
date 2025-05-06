# Struttura dei Prompt

I prompt sono file di testo che contengono istruzioni per l'AI. Devono seguire queste regole:

1. **Regola Fondamentale**:
   - Per la regola universale sui prompt condivisi (come quelli in bashscripts/prompts), vedi [Regola prompt condivisi](./PROMPT_RULES.md)

2. **Contenuto**:
   - Devono essere chiari e concisi
   - Devono essere completi
   - Devono essere coerenti con la struttura del progetto
   - Devono essere aggiornati regolarmente

3. **Posizione**:
   - Devono essere nella cartella `bashscripts/prompts/`
   - Il nome del file deve essere descrittivo
   - L'estensione deve essere `.txt`

4. **Esempio**:
   ```text
   analizza l'intero contenuto della cartella Modules come un unico insieme coerente ogni modulo nella cartella Modules è indipendente con proprio composer.json da cui ricavare namespace autoload e struttura le classi da registrare si trovano nella rispettiva cartella app ma il namespace corretto è Modules<nome>\ e non Modules<nome>\app\ ogni modulo ha la propria cartella docs che contiene la documentazione tecnica approfondita quella è la tua memoria la cartella docs nella root del progetto non è documentazione ma un indice con collegamenti bidirezionali che ti guida a dove leggere studiare aggiornare e documentare correttamente la logica e le scelte di progetto inoltre può contenere la descrizione generale del progetto con roadmap epiche milestone stime politica filosofia zen e religione non ci devono essere documentazioni generali nella cartella docs della root la documentazione va organizzata per moduli secondo queste regole documentazione generica nella cartella docs del modulo Xot documentazione specifica del progetto nella cartella docs della root del progetto documentazione del frontend nella cartella docs del modulo Cms documentazione dei componenti UI nella cartella docs del modulo UI documentazione utenti e permessi nella cartella docs del modulo User documentazione pazienti nella cartella docs del modulo Patient documentazione dental nella cartella docs del modulo Dental documentazione multi-tenant nella cartella docs del modulo Tenant documentazione traduzioni nella cartella docs del modulo Lang documentazione media nella cartella docs del modulo Media documentazione notifiche nella cartella docs del modulo Notify documentazione report nella cartella docs del modulo Reporting documentazione gdpr nella cartella docs del modulo Gdpr documentazione jobs nella cartella docs del modulo Job documentazione grafici nella cartella docs del modulo Chart nella cartella docs della root del progetto ci devono essere solo i collegamenti bidirezionali alle documentazioni verso i moduli devi verificare sempre se le cartelle docs dei moduli hanno quello che ti serve e se sono ben collegate con collegamenti bidirezionali alla cartella docs della root e tra i moduli stessi la documentazione va riscritta in modo efficace ed essenziale concentrandosi sul perché e sul cosa evitando i dettagli implementativi se ti viene corretta una cosa devi sempre aggiornare prima la documentazione del modulo più adatto e poi aggiungere il collegamento nella root devi analizzare anche la documentazione presente nella cartella docs della root e valutare se alcuni documenti vanno spostati nella documentazione di un modulo più adeguato aggiornando poi i collegamenti bidirezionali coerentemente la documentazione generica va sempre collocata nella cartella docs del modulo Xot se trovi pezzi di documentazione generica all'interno della cartella docs della root questi vanno spostati nella cartella docs del modulo Xot e nella root devono essere lasciati solo i collegamenti bidirezionali ai documenti spostati le funzioni getListTableColumns getTableActions e getTableBulkActions devono restituire array con chiavi stringa se getTableActions restituisce solo ViewAction EditAction e DeleteAction va rimosso del tutto altrimenti deve includere ...parent::getTableActions() se getTableBulkActions restituisce solo DeleteBulkAction va rimosso altrimenti deve includere ...parent::getTableBulkActions() non usare mai ->label('') perché le label sono gestite solo tramite file di traduzione nei moduli con LangServiceProvider se una funzionalità chiama -><nome>($metatag->get<Nome>()) e manca il metodo get<Nome> allora documenta perché serve e poi implementalo coerentemente all'interno del modulo corretto se devi creare uno script shell devi usare la cartella bashscripts più vicina e non devi mai creare nuove cartelle bashscripts ma usare solo quelle già esistenti procedi nell'ordine che ritieni più efficace senza mai fermarti mantenendo coerenza architetturale e senza rompere funzionalità esistenti aggiornando sempre la documentazione locale e i collegamenti bidirezionali nella root e tra i moduli devi capire e documentare anche lo scopo specifico di ogni modulo per spostare la documentazione nel modulo giusto e poi creare/aggiornare i files coi collegamenti bidirezionali procedi sempre e scegli tu ordine e priorità senza interruzioni
   ```

5. **Collegamenti**:
   - Questo documento deve essere collegato nella root `docs/` con un link bidirezionale
   - Gli altri moduli devono avere un link a questo documento
   - I prompt devono essere aggiornati quando cambiano le regole 

## Regole per i Prompt

Per la regola universale sui prompt condivisi (come quelli in bashscripts/prompts), vedi:

- [Regola Universale per i Prompt](./PROMPT_RULES.md)

## Collegamenti
- [Documentazione Generale](./documentation.md)
- [Regole del Progetto](./rules.md)

## Collegamenti tra versioni di prompts.md
* [prompts.md](docs/prompts.md)
* [prompts.md](../../../Xot/docs/prompts.md)

