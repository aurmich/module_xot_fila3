# XotBasePanelProvider Pattern

## Panoramica
Il `XotBasePanelProvider` è una classe astratta che estende il `PanelProvider` di Filament e fornisce una base comune per tutti i pannelli amministrativi dei moduli. Questo pattern segue il principio DRY (Don't Repeat Yourself) centralizzando la configurazione comune dei pannelli.

## Caratteristiche Principali

### 1. Configurazione Modulare
- Ogni modulo deve dichiarare una proprietà `protected string $module` che identifica il nome del modulo
- Il namespace del modulo viene gestito automaticamente attraverso il metodo `getModuleNamespace()`
- Supporta la configurazione automatica dei percorsi basati sul nome del modulo

### 2. Funzionalità Base Predefinite
- Gestione automatica dei middleware essenziali
- Configurazione della navigazione (laterale o superiore)
- Supporto per la ricerca globale
- Gestione delle autorizzazioni
- Integrazione con il sistema di metatag

### 3. Discovery Automatico
Il provider configura automaticamente:
- Resources in `app/Filament/Resources`
- Pages in `app/Filament/Pages`
- Widgets in `app/Filament/Widgets`
- Clusters in `app/Filament/Clusters`
- Componenti Livewire in `app/Http/Livewire`

### 4. Personalizzazione
Ogni modulo può personalizzare:
- `$topNavigation`: bool - Attiva/disattiva la navigazione superiore
- `$globalSearch`: bool - Attiva/disattiva la ricerca globale
- `$navigation`: bool - Attiva/disattiva la navigazione

## Utilizzo

```php
namespace Modules\YourModule\Providers\Filament;

class AdminPanelProvider extends XotBasePanelProvider
{
    protected string $module = 'YourModule';
    
    // Opzionale: personalizza le impostazioni
    protected bool $topNavigation = true;
    protected bool $globalSearch = true;
}
```

## Registrazione nei Moduli

### File module.json
Ogni modulo deve registrare il provider nel file `module.json`:

```json
{
    "name": "ModuleName",
    "alias": "modulename",
    "description": "",
    "keywords": [],
    "active": 1,
    "order": 0,
    "providers": [
        "Modules\\ModuleName\\Providers\\ModuleNameServiceProvider",
        "Modules\\ModuleName\\Providers\\Filament\\AdminPanelProvider"
    ],
    "aliases": {},
    "files": [],
    "requires": []
}
```

### Struttura Provider Obbligatoria
Ogni modulo deve avere **DUE** provider registrati:

1. **ServiceProvider principale**: `Modules\{ModuleName}\Providers\{ModuleName}ServiceProvider`
2. **AdminPanelProvider**: `Modules\{ModuleName}\Providers\Filament\AdminPanelProvider`

### Pattern di Registrazione
```json
"providers": [
    "Modules\\{ModuleName}\\Providers\\{ModuleName}ServiceProvider",
    "Modules\\{ModuleName}\\Providers\\Filament\\AdminPanelProvider"
]
```

## Moduli con AdminPanelProvider

### Moduli con Provider Esistente e Configurato Correttamente
- Activity
- Gdpr
- Incentivi
- IndennitaCondizioniLavoro
- IndennitaResponsabilita
- Job
- Lang
- Media
- Notify
- Pdnd
- Performance
- Progressioni
- Ptv
- Rating
- Setting
- Sigma
- Tenant
- UI
- User
- Xot

### Moduli con Provider Creato ma Non Configurato
I seguenti moduli hanno il file `AdminPanelProvider.php` ma mancano della registrazione nel `module.json`:

- Badge ✅ (già configurato)
- CertFisc ❌ (manca registrazione)
- ContoAnnuale ❌ (manca registrazione)
- Europa ❌ (manca registrazione)
- Inail ❌ (manca registrazione)
- Legge104 ❌ (manca registrazione)
- Legge109 ❌ (manca registrazione)
- Mensa ❌ (manca registrazione)
- MobilitaVolontaria ❌ (manca registrazione)
- Prenotazioni ❌ (manca registrazione)
- PresenzeAssenze ❌ (manca registrazione)
- Questionari ❌ (manca registrazione)
- Sindacati ❌ (manca registrazione)

## Procedura di Creazione e Configurazione

### 1. Struttura Directory
Assicurarsi che esista la directory:
```
Modules/{ModuleName}/app/Providers/Filament/
```

### 2. File AdminPanelProvider.php
Creare il file con la seguente struttura:

```php
<?php

declare(strict_types=1);

namespace Modules\{ModuleName}\Providers\Filament;

use Modules\Xot\Providers\Filament\XotBasePanelProvider;

class AdminPanelProvider extends XotBasePanelProvider
{
    protected string $module = '{ModuleName}';
}
```

### 3. Registrazione nel module.json
Aggiornare il file `Modules/{ModuleName}/module.json`:

```json
{
    "name": "{ModuleName}",
    "alias": "{modulename}",
    "description": "",
    "keywords": [],
    "active": 1,
    "order": 0,
    "providers": [
        "Modules\\{ModuleName}\\Providers\\{ModuleName}ServiceProvider",
        "Modules\\{ModuleName}\\Providers\\Filament\\AdminPanelProvider"
    ],
    "aliases": {},
    "files": [],
    "requires": []
}
```

### 4. Verifica Autoload
Dopo la creazione, rigenerare l'autoload:
```bash
composer dump-autoload
```

## Best Practices
1. Mantenere la coerenza dei namespace seguendo la convenzione `Modules\{ModuleName}\Providers\Filament`
2. Utilizzare il nome esatto del modulo nella proprietà `$module`
3. Documentare eventuali personalizzazioni specifiche del modulo
4. Seguire le convenzioni di naming di Filament per resources, pages e widgets
5. **SEMPRE** registrare il provider nel file `module.json`
6. Verificare che entrambi i provider (ServiceProvider e AdminPanelProvider) siano registrati

## Sicurezza
- I middleware essenziali sono già configurati (CSRF, autenticazione, ecc.)
- L'autenticazione è gestita attraverso il middleware `Filament\Http\Middleware\Authenticate`
- Le sessioni sono protette con middleware appropriati

## Estensibilità
Per estendere le funzionalità base:
1. Sovrascrivere il metodo `panel()` chiamando `parent::panel($panel)` prima delle personalizzazioni
2. Aggiungere middleware specifici del modulo
3. Configurare provider di autenticazione personalizzati se necessario

## Note Tecniche
- Il provider utilizza `strict_types=1`
- Supporta la configurazione dei metatag attraverso `MetatagData`
- Integra con il sistema di moduli Laravel attraverso la configurazione `modules.namespace`

## Verifica e Manutenzione

### Controllo Moduli Mancanti
```bash
# Verificare quali moduli mancano del provider
comm -23 <(ls /var/www/html/ptvx/laravel/Modules/ | grep -v "generate_docs.sh" | sort) <(find /var/www/html/ptvx/laravel/Modules -name "AdminPanelProvider.php" | sed 's|.*/Modules/||' | sed 's|/.*||' | sort)
```

### Controllo Registrazione Provider
```bash
# Verificare quali moduli hanno il provider ma non sono registrati
for module in $(find /var/www/html/ptvx/laravel/Modules -name "AdminPanelProvider.php" | sed 's|.*/Modules/||' | sed 's|/.*||'); do
    if ! grep -q "AdminPanelProvider" "/var/www/html/ptvx/laravel/Modules/$module/module.json" 2>/dev/null; then
        echo "❌ $module: AdminPanelProvider non registrato in module.json"
    else
        echo "✅ $module: AdminPanelProvider registrato correttamente"
    fi
done
```

### Aggiornamento Documentazione
Dopo la creazione di nuovi provider, aggiornare:
1. Questa documentazione con la lista aggiornata dei moduli
2. La documentazione del modulo specifico
3. I collegamenti bidirezionali nella documentazione root

## Troubleshooting

### Errore: "Class not found"
**Causa**: Provider non registrato nel `module.json` o autoload non aggiornato
**Soluzione**: 
1. Verificare la registrazione nel `module.json`
2. Eseguire `composer dump-autoload`
3. Pulire la cache: `php artisan cache:clear`

### Errore: "Provider already registered"
**Causa**: Doppia registrazione del provider
**Soluzione**: Verificare che il provider sia registrato solo una volta nel `module.json` 