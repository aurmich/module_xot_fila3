# Convenzioni di Naming - Modulo Xot

## 🎯 Principi Fondamentali

### **DRY (Don't Repeat Yourself)**
- **Convenzioni Uniche:** Una sola convenzione per tutto il sistema
- **Naming Standardizzato:** Regole uniformi in tutti i moduli
- **Eliminazione Ambiguità:** Nomi chiari e non confondibili

### **KISS (Keep It Simple, Stupid)**
- **Semplicità:** Nomi immediatamente comprensibili
- **Consistenza:** Pattern uniformi e prevedibili
- **Chiarezza:** Evitare abbreviazioni e acronimi oscuri

## 📁 Convenzioni per File e Cartelle

### **1. File di Documentazione**
```
✅ CORRETTO                    ❌ ERRATO
user-guide.md                 UserGuide.md
filament-resources.md         FilamentResources.md
phpstan-configuration.md      PHPStanConfiguration.md
naming-conventions.md         naming_conventions.md
```

### **2. Cartelle e Sottocartelle**
```
✅ CORRETTO                    ❌ ERRATO
filament-resources/           FilamentResources/
user-management/              UserManagement/
database-migrations/          DatabaseMigrations/
api-endpoints/                APIEndpoints/
```

### **3. Eccezioni**
- **README.md:** SEMPRE con maiuscole (unica eccezione)
- **.gitignore:** Mantenere nomi standard
- **composer.json:** Mantenere nomi standard

## 🏗️ Convenzioni per Classi e Namespace

### **1. Namespace**
```php
// ✅ CORRETTO
namespace Modules\User\Models;
namespace Modules\Performance\Filament\Resources;
namespace Modules\UI\Components;

// ❌ ERRATO
namespace Modules\User\App\Models;        // Segmento 'app' non necessario
namespace Modules\User\Models;            // Manca namespace completo
namespace modules\user\models;            // Maiuscole sbagliate
```

### **2. Nomi delle Classi**
```php
// ✅ CORRETTO
class User extends BaseModel
class PerformanceResource extends XotBaseResource
class UINavigationComponent extends Component

// ❌ ERRATO
class user extends BaseModel              // Minuscola
class performance_resource extends XotBaseResource  // Underscore
class UINavigationComponent extends Component      // Troppo lungo
```

### **3. Nomi dei Metodi**
```php
// ✅ CORRETTO
public function getUserData(): array
public function createNewRecord(): Model
public function isActive(): bool

// ❌ ERRATO
public function get_user_data(): array    // Underscore
public function CreateNewRecord(): Model  // Maiuscola iniziale
public function IsActive(): bool          // Maiuscola iniziale
```

## 📋 Struttura Standardizzata

### **1. Struttura Cartelle App**
```
app/
├── models/          # Modelli dati
├── services/        # Logica di business
├── actions/         # Azioni specifiche
├── traits/          # Trait e comportamenti
├── notifications/   # Notifiche e avvisi
├── mail/            # Mail e comunicazioni
├── datas/           # DTO e oggetti dati
├── enums/           # Enum e costanti
├── view/            # View e componenti
├── http/            # Controller e middleware
├── console/         # Comandi console
└── providers/       # Service provider
```

### **2. Struttura Cartelle Filament**
```
app/Filament/
├── resources/       # Risorse
├── widgets/         # Widget
├── actions/         # Azioni
├── forms/           # Form
├── tables/          # Tabelle
└── pages/           # Pagine
```

### **3. Struttura Documentazione**
```
docs/
├── core/            # Documentazione core
├── filament/        # Guide Filament
├── development/     # Guide sviluppo
├── utils/           # Utilità e helper
└── templates/       # Template e esempi
```

## 🚫 Anti-pattern da Evitare

### **1. Naming Inconsistente**
```bash
# ❌ MAI mescolare convenzioni
app/Models/          # Maiuscola
app/services/        # Minuscola
app/Http/            # Maiuscola
app/providers/       # Minuscola
```

### **2. Duplicazione Strutture**
```bash
# ❌ MAI duplicare cartelle
app/Data/            # Maiuscola
app/Datas/           # Maiuscola (duplicato)
app/Mail/            # Maiuscola
app/Mails/           # Maiuscola (duplicato)
```

### **3. Nomi Ambigui**
```bash
# ❌ MAI usare nomi confondibili
app/View/            # Maiuscola
app/Views/           # Maiuscola (plurale)
app/Helper/          # Maiuscola
app/Helpers/         # Maiuscola (plurale)
```

## ✅ Best Practices

### **1. Naming Descrittivo**
```bash
# ✅ CORRETTO - Nomi chiari e descrittivi
user-authentication/
performance-metrics/
database-migrations/
api-endpoints/

# ❌ ERRATO - Nomi vaghi o abbreviati
auth/
perf/
db/
api/
```

### **2. Separazione con Hyphens**
```bash
# ✅ CORRETTO - Separazione con hyphens
filament-resources/
user-management/
database-schema/
api-authentication/

# ❌ ERRATO - Separazione con underscore o camelCase
filament_resources/
userManagement/
databaseSchema/
apiAuthentication/
```

### **3. Gerarchia Logica**
```bash
# ✅ CORRETTO - Gerarchia logica e prevedibile
app/
├── models/          # Modelli base
├── services/        # Servizi di business
├── actions/         # Azioni specifiche
└── traits/          # Trait e comportamenti

# ❌ ERRATO - Struttura confusa e non logica
app/
├── Models/          # Maiuscola inconsistente
├── business/        # Nome vago
├── Actions/         # Maiuscola inconsistente
└── Behaviors/       # Maiuscola inconsistente
```

## 🔧 Implementazione e Migrazione

### **1. Script di Rinomina**
```bash
#!/bin/bash
# Script per rinominare cartelle in lowercase con hyphens

# Esempio per il modulo User
cd laravel/Modules/User/app

# Rinominare cartelle con maiuscole
mv View/ view/
mv Services/ services/
mv Actions/ actions/
mv Traits/ traits/
mv Notifications/ notifications/
mv Mail/ mail/
mv Data/ datas/
mv Enums/ enums/
mv Http/ http/
mv Console/ console/
mv Providers/ providers/
```

### **2. Aggiornamento Namespace**
```php
// PRIMA (con maiuscole)
namespace Modules\User\App\Models;
namespace Modules\User\App\Services;

// DOPO (standardizzato)
namespace Modules\User\Models;
namespace Modules\User\Services;
```

### **3. Aggiornamento Autoload**
```json
{
    "autoload": {
        "psr-4": {
            "Modules\\User\\": "Modules/User/"
        }
    }
}
```

## 📊 Checklist Validazione

### **Fase 1: Identificazione Problemi**
- [ ] Cartelle con maiuscole identificate
- [ ] File con naming inconsistente identificati
- [ ] Duplicazioni strutturali identificate
- [ ] Namespace non standardizzati identificati

### **Fase 2: Standardizzazione**
- [ ] Cartelle rinominate in lowercase con hyphens
- [ ] File rinominate in lowercase con hyphens
- [ ] Namespace aggiornati
- [ ] Autoload aggiornato

### **Fase 3: Validazione**
- [ ] PHPStan passa senza errori
- [ ] Test unitari passano
- [ ] Test di integrazione passano
- [ ] Documentazione aggiornata

### **Fase 4: Documentazione**
- [ ] Guide aggiornate con nuove convenzioni
- [ ] Template aggiornati
- [ ] Esempi aggiornati
- [ ] Collegamenti verificati

## 🔗 Collegamenti

- [Architettura Modulo Xot](architecture.md)
- [Best Practices Sistema](../../../docs/core/best-practices.md)
- [Convenzioni Sistema](../../../docs/core/conventions.md)
- [Template Modulo](../../../docs/templates/module-template.md)

---

**Ultimo aggiornamento:** Gennaio 2025  
**Versione:** 2.0 - Consolidata DRY + KISS
