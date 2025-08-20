# Guida PHPStan - Modulo Xot

## 🎯 Principi Fondamentali

### **DRY (Don't Repeat Yourself)**
- **Configurazione Unica:** Una sola configurazione PHPStan per tutto il sistema
- **Template Standardizzati:** Strutture uniformi per tutte le classi
- **Regole Centralizzate:** Regole comuni in un unico posto

### **KISS (Keep It Simple, Stupid)**
- **Configurazione Semplice:** Impostazioni essenziali e chiare
- **Livelli Progressivi:** Avanzamento graduale dei livelli
- **Errori Gestibili:** Risoluzione sistematica dei problemi

## 📊 Livelli PHPStan

### **Livello 9 (Minimo Richiesto)**
- Tipizzazione esplicita per tutti i metodi
- PHPDoc completo per proprietà e metodi
- Gestione corretta dei tipi nullable

### **Livello 10 (Target)**
- Tipizzazione generics per collezioni
- Annotazioni avanzate per relazioni
- Controlli rigorosi su tutti i tipi

## 🚫 Anti-pattern da Evitare

### **1. Tipizzazione Implicita**
```php
// ❌ ERRATO - Manca tipo di ritorno
public function getUserData()
{
    return User::all();
}

// ✅ CORRETTO - Tipo esplicito
public function getUserData(): Collection
{
    return User::all();
}
```

### **2. PHPDoc Incompleto**
```php
// ❌ ERRATO - PHPDoc incompleto
/**
 * @param $data
 * @return mixed
 */
public function process($data)
{
    // ...
}

// ✅ CORRETTO - PHPDoc completo
/**
 * @param array<string, mixed> $data
 * @return array<string, mixed>
 */
public function process(array $data): array
{
    // ...
}
```

### **3. Gestione Nullable**
```php
// ❌ ERRATO - Non gestisce null
public function getName(): string
{
    return $this->name; // Potrebbe essere null
}

// ✅ CORRETTO - Gestisce null
public function getName(): ?string
{
    return $this->name;
}
```

## ✅ Best Practices

### **1. Tipizzazione Modelli**
```php
<?php

declare(strict_types=1);

namespace Modules\User\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $id
 * @property string $name
 * @property string $email
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Collection<int, Team> $teams
 * @property-read Collection<int, Permission> $permissions
 */
class User extends BaseModel
{
    /** @var list<string> */
    protected $fillable = ['name', 'email'];
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<Team, User>
     */
    public function team(): BelongsTo
    {
        return $this->belongsTo(Team::class);
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany<Permission>
     */
    public function permissions(): HasMany
    {
        return $this->hasMany(Permission::class);
    }
}
```

### **2. Tipizzazione Actions**
```php
<?php

declare(strict_types=1);

namespace Modules\User\Actions;

use Spatie\QueueableAction\QueueableAction;
use Modules\User\Data\UserData;
use Modules\User\Models\User;

class CreateUserAction
{
    use QueueableAction;
    
    public function execute(UserData $data): User
    {
        return User::create($data->toArray());
    }
}
```

### **3. Tipizzazione Service Provider**
```php
<?php

declare(strict_types=1);

namespace Modules\User\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\User\Models\User;
use Modules\User\Policies\UserPolicy;

class UserServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        parent::boot();
        
        // Registra le policy
        Gate::policy(User::class, UserPolicy::class);
    }
    
    public function register(): void
    {
        parent::register();
        
        // Registra i servizi
        $this->app->singleton('user.service', UserService::class);
    }
}
```

## 🔧 Configurazione PHPStan

### **1. File di Configurazione**
```neon
# phpstan.neon
parameters:
    level: 9
    paths:
        - Modules
    excludePaths:
        - Modules/*/tests
        - Modules/*/database
    
    checkMissingIterableValueType: true
    checkGenericClassInNonGenericObjectType: true
    treatPhpDocTypesAsCertain: false
```

### **2. Baseline per Errori Esistenti**
```bash
# Generare baseline
./vendor/bin/phpstan analyze --generate-baseline

# Analizzare con baseline
./vendor/bin/phpstan analyze --baseline=phpstan-baseline.neon
```

### **3. Esecuzione da Root**
```bash
# ✅ CORRETTO - Eseguire da laravel/
cd /var/www/html/ptvx/laravel
./vendor/bin/phpstan analyze Modules --level=9

# ❌ ERRATO - MAI usare artisan
php artisan test:phpstan
```

## 📋 Checklist Validazione

### **Fase 1: Preparazione**
- [ ] Configurazione PHPStan corretta
- [ ] Baseline generato per errori esistenti
- [ ] Livello target impostato (9 o 10)

### **Fase 2: Analisi**
- [ ] Esecuzione da directory laravel/
- [ ] Analisi di tutti i moduli
- [ ] Report errori generato

### **Fase 3: Risoluzione**
- [ ] Tipizzazione esplicita aggiunta
- [ ] PHPDoc completato
- [ ] Gestione null implementata

### **Fase 4: Validazione**
- [ ] PHPStan passa senza errori
- [ ] Test unitari passano
- [ ] Test di integrazione passano

## 🔗 Collegamenti

- [Architettura Modulo Xot](../core/architecture.md)
- [Best Practices Sistema](../../../docs/core/best-practices.md)
- [PHPStan Guide Sistema](../../../docs/core/phpstan-guide.md)

---

**Ultimo aggiornamento:** Gennaio 2025  
**Versione:** 2.0 - Consolidata DRY + KISS
