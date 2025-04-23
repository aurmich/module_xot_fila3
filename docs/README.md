<<<<<<< HEAD
# Modulo Xot
=======
# Modulo Xot (eXtension of Things)

## Descrizione

Il modulo Xot è un modulo fondamentale che fornisce funzionalità di base e componenti riutilizzabili per l'intero sistema. Fornisce astrazioni, utility, trait e implementazioni comuni utilizzate da altri moduli dell'applicazione.

## Analisi PHPStan

Il modulo è stato analizzato con PHPStan per migliorare la qualità del codice e ridurre gli errori potenziali:

- [Correzioni per l'analisi PHPStan](phpstan_fixes.md)
- [Documentazione generale PHPStan](/docs/phpstan/problemi_e_soluzioni.md)

## Componenti Principali

### XotBaseResource
Classe base per tutte le risorse Filament. Gestisce:
- Navigazione automatica
- Traduzioni
- Permessi base
- Configurazioni comuni

### XotBasePage
Classe base per tutte le pagine Filament. Fornisce:
- Layout standard
- Gestione permessi
- Integrazione con il sistema di traduzioni
- Funzionalità comuni

### XotBaseModel
Modello base con funzionalità comuni:
- Soft delete
- Timestamp automatici
- Relazioni standard
- Metodi utility

### Actions

Contiene classi che implementano il pattern Action per eseguire operazioni specifiche:

- **File**: Operazioni sui file e cartelle
- **Model**: Operazioni sui modelli Eloquent
- **Panel**: Configurazione e personalizzazione dei pannelli Filament
- **Documentation**: Generazione e aggiornamento della documentazione

### Datas

Implementa i Data Transfer Objects (DTO) utilizzando Spatie Data:

- **MetatagData**: Configurazione dei meta-tag per l'applicazione
- **ComponentFileData**: Rappresentazione dei componenti dell'applicazione

### Filament

Estensioni e personalizzazioni per Filament Admin Panel:

- **Resources**: Risorse di base per il pannello amministrativo
- **Traits**: Trait per estendere le funzionalità dei componenti Filament
- **Pages**: Pagine personalizzate per il pannello amministrativo

## Servizi

### LangService
Gestisce le traduzioni dell'applicazione:
- Caricamento automatico
- Fallback configurabile
- Cache delle traduzioni
- Supporto per più lingue

### PermissionService
Gestisce i permessi dell'applicazione:
- Controllo accessi
- Ruoli e capacità
- Cache dei permessi
- Integrazione con Gate

## Traits

### HasPermissions
Trait per la gestione dei permessi nei modelli:
- Verifica permessi
- Assegnazione ruoli
- Sincronizzazione permessi

### HasTranslations
Trait per la gestione delle traduzioni nei modelli:
- Campi traducibili
- Fallback automatico
- Cache delle traduzioni

## Configurazione
Il modulo è configurabile tramite:
- `config/xot.php`
- Environment variables
- Service providers

## Dipendenze

Il modulo dipende dai seguenti pacchetti:

- `spatie/laravel-data`: Per i Data Transfer Objects
- `thecodingmachine/safe`: Per versioni sicure delle funzioni PHP
- `filament/filament`: Per componenti dell'interfaccia amministrativa

## Documentazione PHPStan

- [Linee Guida PHPStan Livello 10](./PHPStan/LEVEL10_LINEE_GUIDA.md) - Linee guida dettagliate per rispettare le regole di PHPStan a livello 10
- [Correzioni PHPStan](phpstan_fixes.md) - Analisi dei problemi riscontrati e soluzioni implementate

## Links

- [Documentazione PHPStan generale](/docs/phpstan.md)
- [Problemi e soluzioni PHPStan](/docs/phpstan/problemi_e_soluzioni.md)
>>>>>>> aurmich/dev

## Panoramica
Il modulo Xot fornisce le funzionalità base e le utilities utilizzate da tutti gli altri moduli dell'applicazione.

## Componenti Principali

### XotBaseResource
Classe base per tutte le risorse Filament. Gestisce:
- Navigazione automatica
- Traduzioni
- Permessi base
- Configurazioni comuni

### XotBasePage
Classe base per tutte le pagine Filament. Fornisce:
- Layout standard
- Gestione permessi
- Integrazione con il sistema di traduzioni
- Funzionalità comuni

### XotBaseModel
Modello base con funzionalità comuni:
- Soft delete
- Timestamp automatici
- Relazioni standard
- Metodi utility

## Servizi

### LangService
Gestisce le traduzioni dell'applicazione:
- Caricamento automatico
- Fallback configurabile
- Cache delle traduzioni
- Supporto per più lingue

### PermissionService
Gestisce i permessi dell'applicazione:
- Controllo accessi
- Ruoli e capacità
- Cache dei permessi
- Integrazione con Gate

## Traits

### HasPermissions
Trait per la gestione dei permessi nei modelli:
- Verifica permessi
- Assegnazione ruoli
- Sincronizzazione permessi

### HasTranslations
Trait per la gestione delle traduzioni nei modelli:
- Campi traducibili
- Fallback automatico
- Cache delle traduzioni

## Configurazione
Il modulo è configurabile tramite:
- `config/xot.php`
- Environment variables
- Service providers

## Best Practices
1. Estendere sempre le classi base appropriate
2. Utilizzare i traits forniti
3. Seguire le convenzioni di naming
4. Mantenere la documentazione aggiornata

## Directory Principali
- `Abstracts/`: Classi base e interfacce
- `Helpers/`: Utility globali
- `Http/`: Middleware e controller base
- `config/`: Configurazioni condivise

## Funzionalità Chiave
1. **Helper Globali**
   - Manipolazione stringhe/array
   - Utility date e tempi
   - Helper database
   - Funzioni sicurezza

2. **Astrazioni Base**
   - Interfacce comuni
   - Classi base per modelli/controller
   - Trait riutilizzabili

3. **Quality Assurance**
   - PHP Insights
   - PHPStan
   - PHPMD
   - Psalm
   - Rector
   - PHP CS Fixer

## Utilizzo
1. Estendere le classi base per nuovi modelli/controller
2. Utilizzare gli helper per funzionalità comuni
3. Seguire gli standard di codice definiti

## Documentazione Dettagliata
- `/docs/filament/`: Integrazione Filament
- `/docs/model/`: Gestione modelli
- `/docs/service/`: Servizi disponibili
- `/docs/activity/`: Sistema di logging

<<<<<<< HEAD
## Documentazione PHPStan

- [Linee Guida PHPStan Livello 10](./PHPStan/LEVEL10_LINEE_GUIDA.md) - Linee guida dettagliate per rispettare le regole di PHPStan a livello 10

=======
>>>>>>> aurmich/dev
## Documentazione Filament

- [Linee Guida per getInfolistSchema](./filament/INFOLIST_SCHEMA_GUIDELINES.md) - Guida completa per l'implementazione corretta del metodo getInfolistSchema, con focus sull'uso delle chiavi stringa negli array 