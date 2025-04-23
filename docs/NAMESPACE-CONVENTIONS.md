# Convenzioni Namespace in SaluteOra

Questo documento descrive le convenzioni di namespace adottate nel progetto SaluteOra, con particolare attenzione alla struttura modulare basata su Laravel.

## Struttura Base

La struttura dei namespace segue una convenzione ben definita basata sulla struttura fisica dei file e sulla loro funzione logica all'interno dell'applicazione.

### Regola Generale

```
Modules\{ModuleName}\{Type}\{Subtype?}\{ClassName}
```

Dove:
- `{ModuleName}`: Nome del modulo (es. User, Tenant, Cms)
- `{Type}`: Tipo di componente (es. Models, Controllers, Actions)
- `{Subtype}`: (Opzionale) Sottotipo o raggruppamento (es. File, Auth)
- `{ClassName}`: Nome della classe

### Esempi

```php
namespace Modules\User\Models;
class User {}

namespace Modules\Tenant\Actions\Domain;
class GetDomainByIdAction {}

namespace Modules\Cms\Http\Controllers\Api;
class PageController {}
```

## Struttura delle Directory

La struttura fisica delle directory deve corrispondere alla struttura dei namespace per garantire coerenza e facilità di navigazione nel codice.

### Esempio di Struttura Directory

```
laravel/
└── Modules/
    ├── User/
    │   ├── app/
    │   │   ├── Models/
    │   │   │   └── User.php
    │   │   └── Http/
    │   │       └── Controllers/
    │   │           └── UserController.php
    │   ├── database/
    │   │   └── migrations/
    │   └── routes/
    │       └── web.php
    └── Tenant/
        ├── app/
        │   ├── Models/
        │   │   └── Domain.php
        │   └── Actions/
        │       └── Domain/
        │           └── GetDomainByIdAction.php
        └── ...
```

## Convenzioni Specifiche per Tipo

### Models

```
Modules\{ModuleName}\Models\{ModelName}
```

Tutti i modelli devono estendere `Modules\Xot\Models\XotBaseModel` o altra classe base appropriata.

### Controllers

```
Modules\{ModuleName}\Http\Controllers\{ControllerName}
```

I controllers API dovrebbero essere in:
```
Modules\{ModuleName}\Http\Controllers\Api\{ControllerName}
```

### Actions

```
Modules\{ModuleName}\Actions\{Subtype?}\{ActionName}
```

Le azioni seguono il pattern "Action" e sono classi con un metodo `execute()` che implementa una singola responsabilità.

### Filament Resources

```
Modules\{ModuleName}\Filament\Resources\{ResourceName}Resource
```

Pages e RelationManagers associati:
```
Modules\{ModuleName}\Filament\Resources\{ResourceName}Resource\Pages\{PageName}
Modules\{ModuleName}\Filament\Resources\{ResourceName}Resource\RelationManagers\{RelationName}RelationManager
```

### Listeners

```
Modules\{ModuleName}\Listeners\{ListenerName}
```

### Service Providers

```
Modules\{ModuleName}\Providers\{ServiceName}ServiceProvider
```

## Compatibilità con l'Autoloading

La configurazione dell'autoloading in `composer.json` deve riflettere questa struttura di namespace:

```json
"autoload": {
    "psr-4": {
        "App\\": "app/",
        "Modules\\": "Modules/"
    }
}
```

## Casi Speciali

### Traits

I traits dovrebbero essere collocati in una sottocartella `Traits` all'interno del tipo principale a cui si applicano:

```
Modules\{ModuleName}\Models\Traits\{TraitName}
```

### Interfaces

Le interfacce dovrebbero utilizzare il suffisso `Interface` e essere collocate in:

```
Modules\{ModuleName}\Contracts\{InterfaceName}Interface
```

### Enums

Gli enum dovrebbero essere collocati in:

```
Modules\{ModuleName}\Enums\{EnumName}
```

## Best Practices

1. **Mantenere la coerenza**: Seguire sempre la stessa struttura di namespace in tutti i moduli
2. **Evitare namespace troppo profondi**: Limitare a un massimo di 4-5 livelli
3. **Nomi significativi**: Utilizzare nomi che riflettono chiaramente lo scopo e la funzione
4. **Allineamento con Laravel**: Mantenere compatibilità con le convenzioni Laravel dove possibile

## Esempio Completo

```php
// Model
namespace Modules\User\Models;
class User extends \Modules\Xot\Models\XotBaseModel {}

// Controller
namespace Modules\User\Http\Controllers;
class UserController extends \Modules\Xot\Http\Controllers\XotBaseController {}

// Action
namespace Modules\User\Actions\Auth;
class LoginAction {
    public function execute(string $username, string $password): bool {
        // implementation
    }
}

// Filament Resource
namespace Modules\User\Filament\Resources;
class UserResource extends \Modules\Xot\Filament\Resources\XotBaseResource {}

// Service Provider
namespace Modules\User\Providers;
class UserServiceProvider extends \Modules\Xot\Providers\XotBaseServiceProvider {}
```

## Verifica di Conformità

Per verificare che tutti i file rispettino queste convenzioni, sono disponibili script automatici nella cartella `scripts` che analizzano la struttura del progetto e segnalano eventuali anomalie.

```bash
php scripts/check-namespaces.php
```

## Riferimenti

- [PSR-4: Autoloader Standard](https://www.php-fig.org/psr/psr-4/)
- [Laravel Namespacing Conventions](https://laravel.com/docs/master/structure)
- [Nwidart/Laravel-Modules Documentation](https://nwidart.com/laravel-modules/v6/introduction)
