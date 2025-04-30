# Modulo Xot

## Introduzione
Il modulo Xot è il modulo core che fornisce le funzionalità base per tutti gli altri moduli.

## Indice

### Struttura e Convenzioni
- [Struttura Base](STRUCTURE.md)
- [Convenzioni di Namespace](namespace-conventions.md)
- [Convenzioni di Routing](routing-conventions.md)
- [Convenzioni di Codice](code-conventions.md)

### Framework e Tecnologie
- [Laravel 12.x](../../../docs/framework/LARAVEL.md)
- [Filament](../../../docs/framework/FILAMENT.md)
- [Livewire](../../../docs/framework/LIVEWIRE.md)
- [Folio & Volt](../../../docs/framework/FOLIO_VOLT.md)

### Configurazione
- [Configurazione Base](configuration/BASE.md)
- [Configurazione Multi-tenant](configuration/MULTI_TENANT.md)
- [Configurazione Domini](configuration/DOMAINS.md)

### Sviluppo
- [Setup Ambiente](development/SETUP.md)
- [Workflow](development/WORKFLOW.md)
- [Testing](development/TESTING.md)

### Collegamenti ad Altri Moduli
- [UI Module](../../UI/docs/README.md)
- [User Module](../../User/docs/README.md)
- [Tenant Module](../../Tenant/docs/README.md)
- [Patient Module](../../Patient/docs/README.md)

### Collegamenti Esterni
- [Documentazione Principale](../../../docs/README.md)
- [Standards](../../../docs/standards/CODING.md)
- [Best Practices](../../../docs/standards/DOCUMENTATION.md)
- [Security](../../../docs/standards/SECURITY.md)

## Funzionalità Principali

### Base Classes
- XotBaseModel
- XotBaseController
- XotBaseResource
- XotBasePage
- XotBaseWidget

### Service Providers
- XotBaseServiceProvider
- XotBaseRouteServiceProvider

### Traits
- HasMedia
- HasTranslations
- HasRoles
- HasTenant

## Best Practices

### 1. Estensione Classi
```php
// ✅ Corretto
class UserResource extends XotBaseResource

// ❌ Errato
class UserResource extends Resource
```

### 2. Service Provider
```php
class UserServiceProvider extends XotBaseServiceProvider
{
    public function boot(): void
    {
        parent::boot();
        // Configurazione specifica
    }
}
```

### 3. Model
```php
class User extends XotBaseModel
{
    use HasTranslations;
    use HasRoles;
    use HasTenant;
}
```

## Collegamenti Rapidi
- [Torna alla Documentazione Principale](../../../docs/README.md)
- [Standards di Codifica](../../../docs/standards/CODING.md)
- [Configurazione](configuration/BASE.md)
- [Sviluppo](development/SETUP.md)
