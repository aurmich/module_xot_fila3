# Relation Managers in Laraxot PTVX

Questo documento fornisce un collegamento alla documentazione dettagliata sui RelationManager nel framework Laraxot PTVX.

## Regole Fondamentali

1. In Laraxot PTVX, **tutti i RelationManager devono estendere `Modules\Xot\Filament\Resources\RelationManagers\XotBaseRelationManager`** e non direttamente `Filament\Resources\RelationManagers\RelationManager`.

2. **NON UTILIZZARE MAI** i metodi `->label()`, `->placeholder()` e `->helperText()` nei componenti Filament. Le traduzioni vengono gestite automaticamente dal LangServiceProvider.

3. Il metodo `form()` è dichiarato come `final` in `XotBaseRelationManager` e **NON può essere sovrascritto**. Implementare invece `getFormSchema()`.

4. Non implementare direttamente il metodo `table()`. Implementare invece `getTableColumns()`, `getTableHeaderActions()`, `getTableActions()` e `getTableBulkActions()`.

## Documentazione Dettagliata

Per una documentazione completa, fare riferimento ai seguenti documenti:

- [XotBaseRelationManager](/laravel/Modules/Xot/docs/filament/relation_managers.md) - Classe base per tutti i RelationManager
- [HasXotTable Trait](/laravel/Modules/Xot/docs/filament/xot_table.md) - Trait utilizzato da XotBaseRelationManager per la gestione delle tabelle

## Sintassi Corretta

```php
<?php

declare(strict_types=1);

namespace Modules\NomeModulo\Filament\Resources\NomeResource\RelationManagers;

use Modules\Xot\Filament\Resources\RelationManagers\XotBaseRelationManager;

class EsempioRelationManager extends XotBaseRelationManager
{
    protected static string $relationship = 'nomeRelazione';
    
    // Implementazione...
}
```

## Sintassi Non Corretta

```php
<?php

// ❌ ERRATO: Non estendere direttamente RelationManager
use Filament\Resources\RelationManagers\RelationManager;

class EsempioRelationManager extends RelationManager
{
    // ...
}
```

## Collegamenti Utili

- [Regole generali per Filament](/laravel/Modules/Xot/docs/filament/rules.md)
- [Convenzioni di traduzione](/laravel/Modules/Xot/docs/translation-rules.md)
- [PHPStan e tipizzazione](/laravel/Modules/Xot/docs/phpstan_rules.md)

*Questo documento è un punto di accesso alle informazioni dettagliate. Per modifiche, consultare e aggiornare la documentazione nel modulo Xot.*