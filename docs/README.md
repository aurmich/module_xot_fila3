# Modulo Xot

## Introduzione

<<<<<<< HEAD
Il modulo Xot è il core del sistema, fornisce funzionalità base e componenti riutilizzabili per tutti gli altri moduli. Implementa pattern architetturali, gestione degli errori, e componenti UI comuni.

## File Chiave
- [BaseUser.php](../User/app/Models/BaseUser.php)
- [User.php](../User/app/Models/User.php)
- [Doctor.php](../Patient/app/Models/Doctor.php)
- [DoctorResource.php](../Patient/app/Filament/Resources/DoctorResource.php)
- [RegisterAction.php](../Patient/app/Actions/RegisterAction.php)
- [RegistrationWidget.php](../User/app/Filament/Widgets/RegistrationWidget.php)

## Componenti Principali


- [Volt Folio Best Practices](./VOLT_FOLIO_BEST_PRACTICES.md) - Best practices per Volt e Folio
- [Volt Folio Best Practices](./VOLT_FOLIO_BEST_PRACTICES.md) - Best practices per Volt e Foliob6f667c (.)

=======
<<<<<<< HEAD
Altre sezioni...
=======
## Introduzione
Il modulo Xot è il modulo base che fornisce le classi e le funzionalità fondamentali per gli altri moduli. Gestisce l'integrazione con Filament, Livewire e Volt, fornendo una base solida per lo sviluppo di applicazioni modulari.

## Indice

### Architettura e Componenti Base
- [Architecture](./architecture.md) - Architettura del modulo
- [Base Classes](./base_classes.md) - Classi base
- [Service Providers](./service_providers.md) - Provider di servizi
- [Volt Folio Best Practices](./VOLT_FOLIO_BEST_PRACTICES.md) - Best practices per Volt e Folio
>>>>>>> c58c29f3 (♻️ (XotBaseWidget.php): clean up code by removing unnecessary whitespace and comments for better readability)

### Filament
- [Filament Integration](./filament_integration.md) - Integrazione con Filament
- [Widgets](./widgets.md) - Sistema widget
- [Resources](./resources.md) - Gestione risorse

<<<<<<< HEAD
### 3. Interfaces
- `RepositoryInterface`: Contratto base per i repository
- `ServiceInterface`: Contratto base per i service
- `ActionInterface`: Contratto base per le actions

### 4. Exceptions
- `BaseException`: Classe base per le eccezioni
- `ValidationException`: Gestione errori di validazione
- `NotFoundException`: Gestione risorse non trovate
- `AuthorizationException`: Gestione errori di autorizzazione

## Best Practices

### 1. Ereditarietà
- Estendere sempre le classi base appropriate
- Implementare le interfacce richieste
- Usare i trait forniti quando necessario

### 2. Error Handling
- Usare le eccezioni custom fornite
- Implementare logging appropriato
- Gestire gli errori in modo consistente

### 3. Validation
- Usare le regole di validazione base
- Estendere le regole quando necessario
- Mantenere la validazione consistente

## Dependencies
- Laravel Framework
- Filament
- Parental
- Laravel Modules

## Struttura
```
Xot/
=======
### Service Providers
- [Provider Structure](./provider_structure.md) - Struttura provider
- [Provider Traits](./provider_traits.md) - Trait per provider
- [Provider Best Practices](./provider_best_practices.md) - Best practices

### Testing e Quality
- [Testing](./testing.md) - Testing e quality assurance (usare Pest come test runner)
- [Best Practices](./BEST-PRACTICES.md) - Linee guida generali
- [Security](./security.md) - Sicurezza e hardening

### Documentazione Tecnica
- [Roadmap](./roadmap.md) - Piano di sviluppo futuro
- [Bottlenecks](./bottlenecks.md) - Analisi performance e ottimizzazioni
- [Module Structure](./MODULE_STRUCTURE.md) - Struttura moduli

### Link Esterni
- [Laravel Framework](https://laravel.com/docs/12.x)
- [Filament Documentation](https://filamentphp.com/docs)
- [Livewire Documentation](https://livewire.laravel.com/docs)

## Note Importanti

### Estensione Classi
- Non estendere mai direttamente le classi di Filament
- Utilizzare sempre le classi base di Xot con prefisso XotBase
- Seguire le convenzioni di naming del modulo

### Trait e Service Provider
- I trait per i provider devono essere in `Providers/Traits/`
- Seguire la struttura esistente per nuovi trait
- Documentare sempre l'uso dei trait

### Traduzioni
- Utilizzare il LangServiceProvider per le traduzioni
- Non usare ->label() direttamente
- Struttura corretta: 'source' => ['label'=>'Sorgente']

## Esempi

### Service Provider
```php
use Xot\XotBaseServiceProvider;

class CustomServiceProvider extends XotBaseServiceProvider
{
    // Implementazione
}
```

### Widget Base
```php
use Xot\Filament\Widgets\XotBaseWidget;

class CustomWidget extends XotBaseWidget
{
    // Implementazione
}
```

## Dipendenze
- Laravel Framework
- Filament
- Livewire
- Volt
- Folio

## Utilizzo
Il modulo Xot fornisce funzionalità base attraverso:
- Classi base estensibili
- Service provider modulari
- Integrazione Filament
- Sistema widget
- Gestione risorse

## Panoramica
Il modulo Xot è il cuore dell'architettura dell'applicazione. Fornisce le classi base, i trait e le interfacce fondamentali utilizzate da tutti gli altri moduli.

### Versione HEAD


### Versione Incoming

##> **Collegamenti correlati**
> - [README.md documentazione generale](../../docs/README.md)
> - [README.md toolkit bashscripts](../../bashscripts/docs/README.md)
> - [README.md modulo GDPR](../Gdpr/docs/README.md)
> - [README.md modulo User](../User/docs/README.md)
> - [README.md modulo Lang](../Lang/docs/README.md)
> - [README.md modulo CMS](../../laravel/Modules/Cms/docs/README.md) <!-- TODO: documento non presente -->
> - [README.md modulo Reporting](../../laravel/Modules/Reporting/docs/README.md) <!-- TODO: documento non presente -->
> - [README.md modulo Chart](../../laravel/Modules/Chart/docs/README.md) <!-- TODO: documento non presente -->
> - [README.md modulo UI](../UI/docs/README.md)
> - [README.md modulo Xot](../Xot/docs/README.md)
> - [Collegamenti documentazione centrale](../../docs/collegamenti-documentazione.md)


---

## Collegamenti Principali

### Documentazione Core
- [Struttura del Modulo](./structure.md)
- [Base Classes](./base-classes.md)
- [Service Provider](./SERVICE-PROVIDER-BEST-PRACTICES.md)
- [Filament Integration](./FILAMENT_BEST_PRACTICES.md)
- [Module Structure](./MODULE_STRUCTURE.md)

### Integrazioni
- [Integrazione con User](../User/docs/README.md)
- [Integrazione con Lang](../Lang/docs/README.md)
- [Integrazione con UI](../UI/docs/README.md)

### Best Practices
- [Best Practices Generali](./BEST-PRACTICES.md)
- [Convenzioni Namespace](./namespace-conventions.md)
- [PHPStan Fixes](./phpstan-fixes.md)
- [Risoluzione Conflitti](./RISOLUZIONE_CONFLITTI_MERGE.md)

### Testing e Qualità
- [PHPStan Level 9](./PHPSTAN_LEVEL9_FIXES.md)
- [PHPStan Level 10](./PHPSTAN_LEVEL10_FIXES.md)
- [Testing Best Practices](./testing-best-practices.md)

## Struttura del Modulo

```
Modules/Xot/
>>>>>>> c58c29f3 (♻️ (XotBaseWidget.php): clean up code by removing unnecessary whitespace and comments for better readability)
├── app/
│   ├── Models/
│   │   └── XotBaseModel.php
│   ├── Providers/
│   │   ├── XotBaseServiceProvider.php
│   │   └── XotServiceProvider.php
│   ├── Filament/
│   │   ├── Resources/
│   │   │   └── XotBaseResource.php
│   │   ├── Widgets/
│   │   │   └── XotBaseWidget.php
│   │   └── Pages/
│   │       └── XotBasePage.php
│   └── Http/
│       └── Controllers/
│           └── XotBaseController.php
├── config/
│   └── xot.php
└── resources/
    └── views/
        └── components/
            └── xot/
```

## Classi Base

### 1. XotBaseModel
```php
namespace Modules\Xot\Models;

use Illuminate\Database\Eloquent\Model;

abstract class XotBaseModel extends Model
{
    // Implementazione base per tutti i modelli
}
```

### 2. XotBaseServiceProvider
```php
namespace Modules\Xot\Providers;

use Illuminate\Support\ServiceProvider;

abstract class XotBaseServiceProvider extends ServiceProvider
{
    // Implementazione base per tutti i service provider
}
```

### 3. XotBaseResource
```php
namespace Modules\Xot\Filament\Resources;

use Filament\Resources\Resource;

abstract class XotBaseResource extends Resource
{
    // Implementazione base per tutte le risorse Filament
}
```

### 4. XotBaseWidget
```php
namespace Modules\Xot\Filament\Widgets;

use Filament\Widgets\Widget;

abstract class XotBaseWidget extends Widget
{
    // Implementazione base per tutti i widget Filament
}
```

## Best Practices

### 1. Estensione delle Classi
```php
// ❌ NON FARE QUESTO
use Filament\Resources\Resource;
class UserResource extends Resource { ... }

// ✅ FARE QUESTO
use Modules\Xot\Filament\Resources\XotBaseResource;
class UserResource extends XotBaseResource { ... }
```

### 2. Service Provider
```php
// ❌ NON FARE QUESTO
use Illuminate\Support\ServiceProvider;
class UserServiceProvider extends ServiceProvider { ... }

// ✅ FARE QUESTO
use Modules\Xot\Providers\XotBaseServiceProvider;
class UserServiceProvider extends XotBaseServiceProvider { ... }
```

### 3. Modelli
```php
// ❌ NON FARE QUESTO
use Illuminate\Database\Eloquent\Model;
class User extends Model { ... }

// ✅ FARE QUESTO
use Modules\Xot\Models\XotBaseModel;
class User extends XotBaseModel { ... }
```

## Dipendenze Principali

### Moduli
- **User**: Gestione utenti e autenticazione
- **Lang**: Gestione traduzioni
- **UI**: Componenti interfaccia utente

### Pacchetti
- Laravel Framework
- Filament
- Livewire
- Volt

## Roadmap

### Prossime Feature
1. Miglioramento delle classi base
2. Ottimizzazione delle performance
3. Nuovi trait e interfacce

### Miglioramenti Pianificati
1. Refactoring del codice base
2. Miglioramento della documentazione
3. Ottimizzazione delle query

## Contribuire

### Setup Sviluppo
1. Clona il repository
2. Installa le dipendenze
3. Configura l'ambiente
<<<<<<< HEAD
4. Esegui i test
=======
4. Esegui i test con Pest:
   ```bash
   pest
   ```

> Tutti i nuovi test devono essere scritti con [Pest](https://pestphp.com/). Non usare più PHPUnit direttamente.
>>>>>>> c58c29f3 (♻️ (XotBaseWidget.php): clean up code by removing unnecessary whitespace and comments for better readability)

### Convenzioni di Codice
- Seguire PSR-12
- Utilizzare type hints
- Documentare il codice
- Scrivere test unitari

### Processo di Pull Request
1. Crea un branch feature
2. Implementa le modifiche
3. Aggiungi i test
4. Aggiorna la documentazione
5. Crea la PR

## Troubleshooting

### Problemi Comuni
1. Conflitti di estensione
2. Problemi di performance
3. Errori di configurazione

### Soluzioni
1. Verifica la configurazione
2. Controlla i log
3. Consulta la documentazione

## Riferimenti

### Documentazione
- [Laravel](https://laravel.com/docs)
- [Filament](https://filamentphp.com/docs)
- [Livewire](https://livewire.laravel.com/docs)
- [Volt](https://livewire.laravel.com/docs/volt)

### Collegamenti Interni
- [User Module](../User/docs/README.md)
- [Lang Module](../Lang/docs/README.md)
- [UI Module](../UI/docs/README.md)

## Changelog

### [1.0.0] - 2024-03-20
#### Added
- Implementazione iniziale
- Classi base
- Service provider base
- Integrazione Filament

#### Changed
- Miglioramento performance
- Ottimizzazione query
- Refactoring codice

#### Fixed
- Bug estensione classi
- Problemi di configurazione
- Errori di integrazione

<<<<<<< HEAD
## Best Practices XotBaseResource

> **Regola vincolante:** Se una risorsa estende `XotBaseResource`, NON deve mai dichiarare:
> - `protected static ?string $navigationGroup`
> - `protected static ?string $navigationLabel`
> - `public static function table(Table $table): Table`

La configurazione di navigazione e la definizione della tabella sono centralizzate nella classe base o nei provider.

**Checklist:**
- [ ] Nessuna dichiarazione di navigationGroup/navigationLabel/table() nelle risorse che estendono XotBaseResource
- [ ] Configurazione centralizzata e DRY

**Vedi anche:**
- [filament-xotbase-resource-best-practices.mdc](../../../.cursor/rules/filament-xotbase-resource-best-practices.mdc)

## Documentazione Filament

- [Linee Guida per getInfolistSchema](./filament/INFOLIST_SCHEMA_GUIDELINES.md) - Guida completa per l'implementazione corretta del metodo getInfolistSchema, con focus sull'uso delle chiavi stringa negli array 

## Documentazione Service Provider
- [Best Practices nei Service Provider](./providers/service_provider_best_practices.md) - Linee guida sull'utilizzo di GetModulePathByGeneratorAction per una gestione robusta dei percorsi

## Documentazione PHPStan
- [Linee Guida PHPStan Livello 10](./PHPStan/LEVEL10_LINEE_GUIDA.md) - Linee guida dettagliate per rispettare le regole di PHPStan a livello 10

## Documentazione Filament
- [Linee Guida per getInfolistSchema](./filament/INFOLIST_SCHEMA_GUIDELINES.md) - Guida completa per l'implementazione corretta del metodo getInfolistSchema, con focus sull'uso delle chiavi stringa negli array 

## Politica, Filosofia, Religione, Etica, Zen

- **Politica**: Il modulo Xot promuove collaborazione, trasparenza e inclusività, senza discriminazioni.
- **Filosofia**: Minimalismo, chiarezza, miglioramento continuo.
- **Religione**: Laicità, rispetto di tutte le fedi, libertà di pensiero.
- **Etica**: Onestà, rispetto, responsabilità, attenzione all'impatto sociale e ambientale.
- **Zen**: Semplicità, concentrazione sul presente, armonia e serenità nello sviluppo.b6f667c (.)


## Service Provider: Decisione Architetturale (2025-05-13)

Il provider `XotBaseServiceProvider` è progettato per:
- Centralizzare la registrazione di views, config, traduzioni, componenti Blade e Livewire
- Utilizzare actions dedicate (es. `GetModulePathByGeneratorAction`) per garantire robustezza e coerenza
- Gestire fallback e validazioni in modo sicuro
- Favorire l'estendibilità e la coerenza cross-modulo

### Punti di forza
- Coerenza architetturale
- Robustezza nella gestione dei path
- Facilità di estensione per i moduli custom

### Criticità e miglioramenti
- Logging degli errori nei fallback (oggi spesso silenziosi)
- Maggiore chiarezza nei commenti e PHPDoc
- Promuovere l'iniezione delle actions per testabilità

Consulta le [best practices aggiornate](./providers/service_provider_best_practices.md) per dettagli, motivazioni e consigli operativi.
=======
## Obiettivi Funzionali
- Fornire classi base per l'estensione di Filament
- Gestione delle traduzioni e localizzazione
- Implementazione di widget e componenti riutilizzabili

## Decisioni Architetturali
- Utilizzo di XotBaseResource per le risorse Filament
- Implementazione di traduzioni tramite file di lingua
- Gestione delle relazioni tra modelli

## Collegamenti
- [Documentazione Principale](../../docs/README.md)
- [Regole Globali](../../docs/REGOLE_GLOBALI.md)
- [Convenzioni di Denominazione](../../docs/NAMING_CONVENTIONS.md)
>>>>>>> c58c29f3 (♻️ (XotBaseWidget.php): clean up code by removing unnecessary whitespace and comments for better readability)

## Backlink
- [Collegamento a docs/links.md della root](../../../../docs/links.md)
- **Zen**: Semplicità, concentrazione sul presente, armonia e serenità nello sviluppo.
<<<<<<< HEAD

## Proprietà fondamentali del ServiceProvider (Laraxot/PTVX)

Tutti i provider dei moduli che estendono XotBaseServiceProvider **devono** dichiarare:
- `protected string $module_dir = __DIR__;`
- `protected string $module_ns = __NAMESPACE__;`
- `public string $name = 'Xot';`

Queste proprietà sono necessarie per:
- La risoluzione automatica dei path delle risorse
- Il corretto namespace per autoloading e publish
- L'identificazione del modulo nelle operazioni di asset publish

### Esempio
```php
class XotServiceProvider extends XotBaseServiceProvider
{
    protected string $module_dir = __DIR__;
    protected string $module_ns = __NAMESPACE__;
    public string $name = 'Xot';
}
```

**Motivazione:**  
- Se mancano queste proprietà, alcune risorse potrebbero non essere caricate correttamente.
- La dichiarazione esplicita garantisce portabilità, manutenibilità e coerenza tra tutti i moduli.

**Approfondimenti:**  
- Vedi anche [../../../../docs/provider_overview.md](../../../../docs/provider_overview.md)
- Vedi anche [model_base_rules.md](model_base_rules.md)

## Regola per i file .sh (script shell)

Tutti i file `.sh` (script shell) devono essere posizionati esclusivamente in una sottocartella dedicata chiamata `bashscripts` (ad esempio `docs/bashscripts/`).
Non devono mai trovarsi direttamente nella root di `docs/` o in altre sottocartelle generiche.

**Motivazione:**
- Ordine e reperibilità: tutti gli script shell sono facilmente individuabili e gestibili.
- Sicurezza: si evita l'esecuzione accidentale di script non previsti.
- Coerenza cross-modulo e tra root/moduli.

**Esempio di struttura corretta:**
```
docs/
└── bashscripts/
    ├── deploy.sh
    ├── clear_cache.sh
    └── backup_db.sh
```

**Checklist aggiornata:**
- [x] Nessun file .sh fuori da bashscripts/
- [x] Documentazione aggiornata
- [x] Struttura coerente in tutti i moduli
=======
- [Modulo User](../User/docs/README.md)
- [Modulo Cms](../Cms/docs/README.md)
- [Modulo Blog](../Blog/docs/README.md)
- [Modulo Predict](../Predict/docs/README.md)

## Regole Generali: Eventi e Spatie Laravel Data

- **Pattern consigliato**: Passare agli eventi oggetti che estendono [Spatie Laravel Data](https://spatie.be/docs/laravel-data/v4/introduction) invece di array o primitive.
- **Motivazione**: Garantisce type safety, validazione automatica, serializzazione robusta e coerenza tra eventi, actions, projectors e aggregates.
- **Esempio**:
  ```php
  use Modules\Predict\Datas\BetPlacedData;
  use Spatie\EventSourcing\StoredEvents\ShouldBeStored;

  class BetPlaced extends ShouldBeStored
  {
      public function __construct(
          public BetPlacedData $data
      ) {}
  }
  ```
- **Anti-pattern**: Passare array associativi o primitive agli eventi (es: `new BetPlaced(['user_id' => 1, ...])`).
- **Collegamento**: Vedi anche la sezione corrispondente in Predict: [Pattern e Anti-pattern: Eventi e Spatie Laravel Data](../../Predict/docs/README.md#pattern-e-anti-pattern-eventi-e-spatie-laravel-data)

## Regole Generali: Struttura Cartelle, Aggregates, Projectors, Namespace

- **Tutte le classi di dominio di un modulo vanno sempre in `app/`**. Non usare mai `Domain/` né `App/` nel namespace.
- **Aggregates**: sempre in `app/Aggregates/`.
- **Projectors**: sempre in `app/Projectors/`.
- **Listeners**: NON vanno usati se si usano gli Aggregates di Spatie Event Sourcing.
- **Mai creare la cartella `Domain` nei moduli**.
- **Il namespace corretto è sempre `Modules\<NomeModulo>\<Sottocartella>`**.
- **Pattern e anti-pattern**: documentare sempre pattern corretti e errori comuni, sia qui che nella docs del modulo coinvolto.
- **Ogni bugfix va documentato**:
  - Contesto (versione, ambiente, condizioni di trigger)
  - Test di regressione
  - Commit message standardizzato (es: `fix(predict): descrizione breve`)
  - Categorizzazione per area problematica
- **Collegamento bidirezionale**: vedi anche la sezione [Pattern e Anti-pattern: Struttura Cartelle, Aggregates, Projectors](../../Predict/docs/README.md#pattern-e-anti-pattern-struttura-cartelle-aggregates-projectors) nella docs di Predict.
- **Per la gestione dei dati negli eventi, vedi anche la sezione [Regole Generali: Eventi e Spatie Laravel Data](#regole-generali-eventi-e-spatie-laravel-data)**

## Requisiti

- PHP 8.2+
- Laravel 12.x
- Estensioni PHP: PDO, JSON, cURL
- Database: MySQL 8.0+ o PostgreSQL 13+
>>>>>>> 5529cf84 (♻️ (XotBaseWidget.php): clean up code by removing unnecessary whitespace and comments for better readability)
>>>>>>> c58c29f3 (♻️ (XotBaseWidget.php): clean up code by removing unnecessary whitespace and comments for better readability)
