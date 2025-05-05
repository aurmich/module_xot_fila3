# XotBaseServiceProvider

## Panoramica

XotBaseServiceProvider è la classe base astratta per tutti i ServiceProvider dei moduli nel sistema. Estende `Illuminate\Support\ServiceProvider` e implementa funzionalità comuni per la registrazione di componenti, configurazioni, traduzioni e altro.

## Proprietà Fondamentali

```php
public string $name = '';           // Nome del modulo (DEVE essere public)
public string $nameLower = '';      // Nome del modulo in minuscolo
protected string $module_dir = __DIR__;    // Directory del modulo
protected string $module_ns = __NAMESPACE__; // Namespace del modulo
```

### Importanza della Visibilità

- `$name` e `$nameLower` DEVONO essere `public` perché vengono utilizzati da classi figlie
- La visibilità non può essere modificata nelle classi che estendono XotBaseServiceProvider
- Modificare la visibilità causerà un errore PHP: "Access level ... must be public (as in class XotBaseServiceProvider)"

## Metodi Principali

### boot()
```php
public function boot(): void
{
    $this->registerTranslations();
    $this->registerViews();
    $this->loadMigrationsFrom($this->module_dir.'/../Database/Migrations');
    $this->registerLivewireComponents();
    $this->registerBladeComponents();
    $this->registerCommands();
}
```

Responsabilità:
- Registrazione traduzioni
- Registrazione viste
- Caricamento migrazioni
- Registrazione componenti Livewire
- Registrazione componenti Blade
- Registrazione comandi

### register()
```php
public function register(): void
{
    $this->nameLower = Str::lower($this->name);
    $this->module_ns = collect(explode('\\', $this->module_ns))->slice(0, -1)->implode('\\');
    $this->app->register($this->module_ns.'\Providers\RouteServiceProvider');
    $this->app->register($this->module_ns.'\Providers\EventServiceProvider');
    $this->registerConfig();
    $this->registerBladeIcons();
}
```

Responsabilità:
- Inizializzazione proprietà del modulo
- Registrazione RouteServiceProvider
- Registrazione EventServiceProvider
- Registrazione configurazioni
- Registrazione icone Blade

## Best Practices

1. **Non Modificare la Visibilità**
   - Mantenere `public` per `$name` e `$nameLower`
   - Non cambiare la visibilità dei metodi ereditati

2. **Evitare Override Non Necessari**
   - Non sovrascrivere metodi se non si aggiunge funzionalità
   - Chiamare sempre `parent::method()` quando si sovrascrive

3. **Configurazione Corretta**
   - Impostare sempre `$name` nel costruttore
   - Verificare che `$module_dir` e `$module_ns` siano corretti

## Esempio di Implementazione Corretta

```php
namespace Modules\Notify\Providers;

use Modules\Xot\Providers\XotBaseServiceProvider;

class NotifyServiceProvider extends XotBaseServiceProvider
{
    public string $name = 'Notify';
    
    public function boot(): void
    {
        parent::boot();
        // Aggiungi funzionalità specifiche qui
    }
}
```

## Collegamenti Bidirezionali

### Collegamenti nella Root
- [Architettura dei Provider](../../../docs/architecture/providers.md)
- [Struttura dei Moduli](../../../docs/architecture/modules.md)

### Collegamenti ai Moduli
- [Notify ServiceProvider](../../Notify/docs/service-provider.md)
- [User ServiceProvider](../../User/docs/service-provider.md)

## Note Importanti

1. La proprietà `$name` è fondamentale e DEVE essere `public`
2. Non modificare mai la visibilità delle proprietà/metodi ereditati
3. Seguire sempre il pattern di registrazione standard
4. Documentare ogni modifica o estensione
5. Mantenere la coerenza tra i moduli 
## Collegamenti tra versioni di XotBaseServiceProvider.md
* [XotBaseServiceProvider.md](../../../../docs/moduli/xot/XotBaseServiceProvider.md)

