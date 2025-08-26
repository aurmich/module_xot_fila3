# 🏗️ **Xot Module** - Fondamento Architetturale Laraxot PTVX

## 📋 **Panoramica**

Il modulo **Xot** è il fondamento architetturale dell'ecosistema Laraxot PTVX, implementando i principi **DRY**, **KISS**, **SOLID** e **Robustezza** per tutti i moduli derivati. Fornisce classi base, pattern architetturali e convenzioni standardizzate.

## 🎯 **Principi Fondamentali**

### **DRY (Don't Repeat Yourself)**
- **Centralizzazione**: Classi base e trait condivisi per evitare duplicazioni
- **Riusabilità**: Pattern architetturali standardizzati e riutilizzabili
- **Manutenibilità**: Aggiornamenti centralizzati che si propagano automaticamente

### **KISS (Keep It Simple, Stupid)**
- **Struttura lineare**: Organizzazione intuitiva e facile da navigare
- **Naming coerente**: Convenzioni uniformi in tutto il sistema
- **Navigazione semplice**: Massimo 3 livelli di profondità nella documentazione

### **SOLID**
- **Single Responsibility**: Ogni classe ha uno scopo specifico e ben definito
- **Open/Closed**: Estendibile senza modificare il codice esistente
- **Liskov Substitution**: Sottoclassi perfettamente sostituibili
- **Interface Segregation**: Interfacce specifiche per ogni responsabilità
- **Dependency Inversion**: Dipendenze da astrazioni, non da implementazioni

### **Robust**
- **Gestione errori**: Sistema robusto di gestione delle eccezioni
- **Validazione**: Controlli automatici e validazione dei dati
- **Fallback**: Meccanismi di recupero per situazioni critiche

### **Laraxot**
- **Architettura modulare**: Sistema modulare scalabile e manutenibile
- **Convenzioni standard**: Regole uniformi per tutti i moduli
- **Integrazione Filament**: Supporto nativo per l'ecosistema Filament

## 🏗️ **Componenti Core**

### **Classi Base Fondamentali**

#### **BaseModel**
```php
use Modules\Xot\Models\BaseModel;

class MioModello extends BaseModel
{
    // Implementazione specifica del modulo
    protected $fillable = ['nome', 'descrizione'];
}
```

**Caratteristiche:**
- Gestione automatica dei campi `extra`
- Trait condivisi per funzionalità comuni
- Convenzioni standard per relazioni e validazioni

#### **XotBaseResource**
```php
use Modules\Xot\Filament\Resources\XotBaseResource;

class MiaRisorsa extends XotBaseResource
{
    // Configurazione specifica della risorsa
    public static function getFormSchema(): array
    {
        return [
            // Schema del form
        ];
    }
}
```

**Caratteristiche:**
- Gestione automatica delle traduzioni
- Pattern standardizzati per tabelle e form
- Integrazione nativa con Filament

#### **XotBaseServiceProvider**
```php
use Modules\Xot\Providers\XotBaseServiceProvider;

class MioServiceProvider extends XotBaseServiceProvider
{
    protected string $module_name = 'MioModulo';
    
    public function boot(): void
    {
        parent::boot();
        // Personalizzazioni specifiche del modulo
    }
}
```

**Caratteristiche:**
- Bootstrap automatico di views, traduzioni e migrazioni
- Registrazione automatica di componenti Filament
- Gestione centralizzata degli asset

### **Pattern Architetturali**

#### **Architettura Modulare**
- **Struttura standardizzata**: Organizzazione uniforme per tutti i moduli
- **Dipendenze gestite**: Sistema di dipendenze tra moduli
- **Isolamento**: Ogni modulo è indipendente e testabile

#### **Sistema Moduli**
- **Auto-discovery**: Rilevamento automatico di componenti
- **Lazy loading**: Caricamento on-demand per ottimizzare le performance
- **Configurazione centralizzata**: Gestione unificata delle configurazioni

#### **Pattern Database**
- **Migrazioni standardizzate**: Estensione di `XotBaseMigration`
- **Modelli base**: Ereditarietà da `BaseModel`
- **Relazioni**: Pattern standardizzati per le relazioni Eloquent

## 🚀 **Quick Start**

### **1. Creazione di un Nuovo Modulo**

```bash
# Struttura standard del modulo
Modules/
└── MioModulo/
    ├── app/
    │   ├── Models/
    │   ├── Http/
    │   └── Filament/
    ├── config/
    ├── database/
    ├── docs/
    ├── lang/
    ├── resources/
    └── routes/
```

### **2. Estendere Classi Base**

```php
// Modello
namespace Modules\MioModulo\app\Models;

use Modules\Xot\Models\BaseModel;

class MioModello extends BaseModel
{
    protected $fillable = ['nome', 'descrizione'];
    
    public function relazioni()
    {
        return $this->hasMany(AltroModello::class);
    }
}

// Risorsa Filament
namespace Modules\MioModulo\app\Filament\Resources;

use Modules\Xot\Filament\Resources\XotBaseResource;

class MioModelloResource extends XotBaseResource
{
    public static function getFormSchema(): array
    {
        return [
            // Schema del form
        ];
    }
}
```

### **3. Service Provider**

```php
namespace Modules\MioModulo\Providers;

use Modules\Xot\Providers\XotBaseServiceProvider;

class MioModuloServiceProvider extends XotBaseServiceProvider
{
    protected string $module_name = 'MioModulo';
    
    public function boot(): void
    {
        parent::boot();
        
        // Personalizzazioni specifiche
        $this->registerCustomComponents();
    }
    
    protected function registerCustomComponents(): void
    {
        // Registrazione componenti custom
    }
}
```

## 📚 **Documentazione Completa**

### **Core Architecture**
- **Base Classes**: Classi base e loro utilizzo
- **Service Providers**: Pattern per i service provider
- **Database Patterns**: Migrazioni e modelli
- **Testing Standards**: Standard di testing e best practices

### **Development Guidelines**
- **Code Quality**: Standard di qualità del codice
- **Best Practices**: Pattern e convenzioni
- **Troubleshooting**: Risoluzione problemi comuni

### **API Reference**
- **Interfaces**: Interfacce disponibili
- **Methods**: Metodi pubblici e loro utilizzo
- **Examples**: Esempi pratici di implementazione

## 🧪 **Testing Standards**

### **Test Coverage Goals**
- **100%** per le classi base Xot
- **80%+** per tutti i moduli derivati
- **Critical paths** devono avere copertura completa

### **Base Test Classes**

```php
use Modules\Xot\Tests\XotBaseTestCase;

class MioModuloTest extends XotBaseTestCase
{
    public function test_creazione_modello()
    {
        $modello = MioModello::create([
            'nome' => 'Test',
            'descrizione' => 'Descrizione test'
        ]);
        
        $this->assertModelExists($modello);
        $this->assertEquals('Test', $modello->nome);
    }
}
```

### **Testing Patterns**

#### **Model Testing**
```php
public function test_relazioni_modello()
{
    $user = User::factory()->create();
    $prodotti = Prodotto::factory()->count(3)->for($user)->create();
    
    $this->assertCount(3, $user->prodotti);
    $this->assertEquals($user->id, $prodotti->first()->user_id);
}
```

#### **API Testing**
```php
public function test_api_endpoint()
{
    $response = $this->getJson('/api/mio-modulo');
    
    $response->assertSuccessful()
             ->assertJsonStructure(['data', 'meta']);
}
```

## 🔧 **Best Practices**

### **Sempre Estendere Classi Base**
```php
// ✅ CORRETTO
class MioModello extends BaseModel

// ❌ ERRATO
class MioModello extends Model
```

### **Utilizzare i Trait Xot**
```php
use HasXotTable;
use HasExtra;

class MioModello extends BaseModel
{
    use HasXotTable, HasExtra;
}
```

### **Seguire le Convenzioni Naming**
```php
// Nomi delle classi in PascalCase
class MioModello extends BaseModel

// Nomi dei metodi in camelCase
public function getNomeCompleto(): string

// Nomi delle proprietà in snake_case
protected $fillable = ['nome', 'cognome'];
```

### **Gestire i Campi Extra**
```php
// Store dati aggiuntivi
$modello->setExtra('campo_custom', 'valore');

// Retrieve dati
$valore = $modello->getExtra('campo_custom');
```

## 📊 **Metriche Qualità**

### **PHPStan**
- **Livello 10** obbligatorio per tutto il codice
- **Zero errori** di analisi statica
- **Type safety** completa

### **PSR-12**
- **Conformità completa** agli standard PSR
- **Code style** uniforme in tutto il progetto
- **Linting automatico** nel CI/CD

### **Test Coverage**
- **Minimo 90%** per tutti i moduli
- **100%** per le classi base critiche
- **Test di regressione** per ogni modifica

### **Documentazione**
- **100%** dei metodi pubblici documentati
- **PHPDoc completo** per tutte le classi
- **Esempi pratici** per ogni funzionalità

## 🚨 **Troubleshooting**

### **Problemi Comuni**

#### **1. Classe Base Non Trovata**
```bash
# Verificare autoload
composer dump-autoload

# Controllare namespace
use Modules\Xot\Models\BaseModel;
```

#### **2. Traduzioni Non Caricate**
```bash
# Pulire cache
php artisan cache:clear
php artisan config:clear
php artisan view:clear

# Verificare service provider
php artisan module:list
```

#### **3. Errori PHPStan**
```bash
# Eseguire analisi
./vendor/bin/phpstan analyse --level=10

# Verificare configurazione
cat phpstan.neon
```

### **Debug e Logging**
```php
// Abilitare debug
config(['app.debug' => true]);

// Logging dettagliato
Log::debug('Debug info', ['context' => 'value']);
```

## 🔗 **Collegamenti e Riferimenti**

### **1. Documentazione Modulo**
- [**Indice Completo**](index.md) - Navigazione rapida per tutti i documenti
- [**Architettura**](architecture.md) - Architettura dettagliata del modulo
- [**Best Practices**](best-practices.md) - Linee guida complete per lo sviluppo
- [**Troubleshooting**](troubleshooting.md) - Risoluzione problemi e debug
- [**Esempi**](examples.md) - Casi d'uso pratici e implementazioni

### **2. Documentazione Principale**
- [**Root Documentation**](../../../docs/README.md) - Documentazione generale del progetto
- [**Best Practices**](../../../docs/best-practices/) - Best practices globali
- [**Troubleshooting**](../../../docs/troubleshooting/) - Risoluzione problemi

### **3. Moduli Correlati**
- [**UI Module**](../UI/docs/README.md) - Componenti UI condivisi
- [**User Module**](../User/docs/README.md) - Gestione utenti e autenticazione
- [**Tenant Module**](../Tenant/docs/README.md) - Multi-tenancy

### **4. Risorse Esterne**
- [**Laravel Documentation**](https://laravel.com/docs) - Documentazione ufficiale Laravel
- [**Filament Documentation**](https://filamentphp.com/docs) - Documentazione Filament
- [**PHPStan Documentation**](https://phpstan.org/) - Analisi statica del codice

## 📈 **Roadmap e Sviluppi Futuri**

### **Versioni Pianificate**
- **v2.0**: Miglioramenti performance e caching
- **v2.1**: Nuove classi base per API REST
- **v2.2**: Supporto per GraphQL e real-time

### **Contributi**
- **Issue reporting**: GitHub Issues per bug e feature requests
- **Pull requests**: Contributi alla codebase
- **Documentazione**: Miglioramenti alla documentazione

---

## 📝 **Changelog**

### **v2.0.0** - Giugno 2025
- ✅ Rifattorizzazione completa della documentazione
- ✅ Consolidamento in file singoli per DRY
- ✅ Aggiornamento principi SOLID e Robust
- ✅ Integrazione completa con Laraxot

### **v1.5.0** - Maggio 2025
- ✅ Supporto Laravel 11
- ✅ Aggiornamento PHPStan livello 10
- ✅ Miglioramenti performance

---

*Ultimo aggiornamento: giugno 2025 - Versione 2.0.0*
