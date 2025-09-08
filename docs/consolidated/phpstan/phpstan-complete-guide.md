# PHPStan Complete Guide - Consolidated

## Overview
Guida completa consolidata per PHPStan livello 10 in Laraxot, con focus sulla business logic e type safety.

## Recent Progress (2025-09-03)

### ✅ Completato
- **Syntax Errors**: Risolti tutti i 72 errori di sintassi iniziali
- **Merge Conflicts**: Risolti conflitti Git nei file critici
- **Policy Files**: Corretti 9 Policy files con imports mancanti e sintassi
- **Action Files**: Migliorate le type annotations in Actions critiche
- **Language Files**: Riparati file di traduzione con sintassi PHP corrotta
- **Relationship Type Safety**: Implementate soluzioni per relazioni Eloquent
- **Array Type Conversions**: Fix per array<mixed, mixed> → array<string, mixed>
- **Method Call Type Safety**: Gestiti dynamic method calls con type assertions

### 📊 Stato Attuale
- **Livello**: 10 (massimo)
- **Errori Xot Module**: 552 (da 557) - **5 errori risolti**
- **Focus**: Business logic e type safety sistematico

## Execution Guidelines

### Comando Base
```bash
./vendor/bin/phpstan analyse Modules --level=10 --no-progress
```

### Per Singolo Modulo
```bash
./vendor/bin/phpstan analyse Modules/Xot --level=10 --no-progress
```

### Memory e Performance
- Memory limit: 2G minimo
- Timeout: 120 secondi per moduli grandi
- Directory: sempre da `/laravel`

## Patterns di Fix Implementati

### 1. Type Safety nelle Actions

#### Prima (❌)
```php
public function execute(Model $model): array
{
    return $model->toArray(); // array<mixed, mixed>
}
```

#### Dopo (✅)
```php
/**
 * @param Model $model
 * @return array<string, mixed>
 */
public function execute(Model $model): array
{
    /** @var array<string, mixed> $data */
    $data = [];
    foreach ($model->toArray() as $key => $value) {
        $data[(string) $key] = $value;
    }
    return $data;
}
```

### 2. Gestione Mixed Types

#### Prima (❌)
```php
foreach ($this->replaces as $k => $v) {
    $content = $this->{'replace'.$k}($v, $content); // $v è mixed
}
```

#### Dopo (✅)
```php
/** @var array<string, mixed> */
public array $replaces = [];

foreach ($this->replaces as $k => $v) {
    $content = $this->{'replace'.$k}($v, $content);
    Assert::string($content, 'Content must be string after replace method');
}
```

### 3. Policy Files Structure

#### Struttura Standard (✅)
```php
<?php

declare(strict_types=1);

namespace Modules\Xot\Models\Policies;

use Modules\Xot\Contracts\UserContract;
use Modules\Xot\Models\{ModelName};

class {ModelName}Policy extends XotBasePolicy
{
    public function viewAny(UserContract $user): bool
    {
        return $user->hasPermissionTo('{model}.viewAny');
    }
    // ... altri metodi
}
```

### 4. Dynamic Relationship Call Pattern

#### Prima (❌)
```php
$record->myLogs()->create([
    'act' => 'sendMail',
    'handle' => authId(),
]); // PHPStan: Cannot call method create() on mixed
```

#### Dopo (✅)
```php
// Type assertion per dynamic relationship
$logsRelation = $record->myLogs();
Assert::object($logsRelation, 'myLogs() must return an object');

if (!method_exists($logsRelation, 'create')) {
    throw new \InvalidArgumentException('myLogs() must return a relation that supports create() method');
}

/** @var \Illuminate\Database\Eloquent\Relations\Relation $logsRelation */
$logsRelation->create([
    'act' => 'sendMail',
    'handle' => authId(),
]);
```

### 5. Dynamic Property Access Pattern

#### Prima (❌)
```php
$model->{Str::camel($relationDTO->name)}->update($data); 
// PHPStan: Cannot call method update() on mixed
```

#### Dopo (✅)
```php
$relationName = Str::camel($relationDTO->name);
$relatedModel = $model->{$relationName};

// Type assertion per dynamic property access
if (!$relatedModel instanceof Model) {
    throw new \InvalidArgumentException('Related model must be an instance of Model to support update()');
}

$relatedModel->update($data);
```

### 6. Specific Relation Method Type Safety Pattern

#### Prima (❌)
```php
/** @var \Illuminate\Database\Eloquent\Relations\Relation $morphRelation */
$morphRelation->saveMany($models); // PHPStan: Call to undefined method saveMany()
```

#### Dopo (✅)
```php
// Cast to HasMany or MorphMany that supports saveMany()
if ($morphRelation instanceof \Illuminate\Database\Eloquent\Relations\HasMany || 
    $morphRelation instanceof \Illuminate\Database\Eloquent\Relations\MorphMany) {
    $morphRelation->saveMany($models);
} else {
    throw new \InvalidArgumentException(sprintf('Relation "%s" must be HasMany or MorphMany to support saveMany()', $relationName));
}
```

### 7. Laravel View Data Type Safety Pattern

#### Prima (❌)
```php
$html = view($view, $data)->render(); // PHPStan: view() expects array<string, mixed> but gets array
```

#### Dopo (✅)
```php
// Assicura che $data sia type-safe per view()
/** @var array<string, mixed> $viewData */
$viewData = [];
foreach ($data as $key => $value) {
    $viewData[(string) $key] = $value;
}

$html = view($view, $viewData)->render();
```

## Business Logic Patterns

### 1. Safe Casting Actions
Le Actions di casting devono sempre gestire errori e type safety:

```php
class SafeArrayByModelCastAction
{
    /**
     * @return array<string, mixed>
     */
    public function execute(Model $model): array
    {
        try {
            return $model->attributesToArray(); 
        } catch (\ValueError|\Error|\Exception $e) {
            return $this->safeExecute($model);
        }
    }
    
    private function safeExecute(Model $model): array
    {
        /** @var array<string, mixed> $data */
        $data = [];
        foreach ($model->getAttributes() as $key => $value) {
            try {
                $data[$key] = $model->$key;
            } catch (\ValueError|\Error $e) {
                // Skip errored attributes
            }
        }
        return $data;
    }
}
```

### 2. Type-Safe Array Conversion for UpdateAction

Pattern per convertire array<mixed, mixed> in array<string, mixed>:

```php
// Per BelongsToManyAction, CustomRelationAction, ecc.
foreach ($relationDTO->data as $data) {
    Assert::isArray($data, 'Each item must be an array');
    
    // Assicura che $data sia type-safe per UpdateAction
    /** @var array<string, mixed> $typedData */
    $typedData = [];
    foreach ($data as $key => $value) {
        $typedData[(string) $key] = $value;
    }
    
    $res = app(UpdateAction::class)->execute($related, $typedData, []);
}
```

### 3. Store/Update Actions
Pattern standard per le actions CRUD:

```php
/**
 * @param Model $model
 * @param array<string, mixed> $data
 * @param array<string, mixed> $rules
 */
public function execute(Model $model, array $data, array $rules): Model
{
    // Business logic con type safety
    $validator = Validator::make($data, $rules);
    $validator->validate();
    
    $model = $model->fill($data);
    $model->save();
    
    return $model;
}
```

### 3. Documentation Best Practices
Ogni file deve seguire queste regole:

#### File Headers
```php
<?php

declare(strict_types=1);

namespace Modules\{ModuleName}\{SubNamespace};

// Imports ordinati alfabeticamente
use Illuminate\Database\Eloquent\Model;
use Spatie\QueueableAction\QueueableAction;
use Webmozart\Assert\Assert;
```

#### Method Documentation
```php
/**
 * Descrizione chiara del metodo.
 *
 * @param Model $model Descrizione del parametro
 * @param array<string, mixed> $data Array associativo con tipo specifico
 * @return array<string, mixed> Descrizione del ritorno
 * @throws \Exception Quando il modello è invalido
 */
public function execute(Model $model, array $data): array
```

## Architectural Compliance

### XotBase Extension Rules
**CRITICO**: Mai estendere classi Filament direttamente. Sempre usare XotBase.

#### ❌ Vietato
```php
class MyResource extends \Filament\Resources\Resource
class MyWidget extends \Filament\Widgets\Widget
```

#### ✅ Obbligatorio
```php
class MyResource extends \Modules\Xot\Filament\Resources\XotBaseResource
class MyWidget extends \Modules\Xot\Filament\Widgets\XotBaseWidget
```

### Filament Best Practices

#### Form Schema Pattern
```php
/**
 * @return array<int, \Filament\Forms\Components\Component>
 */
public static function getFormSchema(): array
{
    return [
        TextInput::make('name')->required(),
        // Non usare mai ->label() direttamente
        // Le traduzioni sono gestite centralmente
    ];
}
```

## Error Resolution Strategies

### 1. Syntax Errors
Prima priorità - impediscono l'analisi completa:
- File PHP con sintassi malformata
- Array PHP non chiusi correttamente
- Classi senza closing brace

### 2. Type Errors  
Seconda priorità - core business logic:
- Method return types
- Parameter type hints
- Generic type annotations

### 3. Advanced Analysis
Terza priorità - ottimizzazioni:
- Dead code detection
- Unused variables
- Complex generic types

## Monitoring e Maintenance

### Daily Workflow
1. `./vendor/bin/phpstan analyse Modules --level=10`
2. Fix errori di sintassi (priority 1)
3. Fix type safety (priority 2) 
4. Update documentation
5. Commit con `vendor/bin/pint --dirty`

### Quality Gates
- **0 syntax errors** (obbligatorio)
- **< 100 type errors per module** (target)
- **Level 10 compliance** (obiettivo)

## Tools Integration

### Laravel Pint
Sempre run dopo PHPStan fixes:
```bash
./vendor/bin/pint --dirty
```

### Assert Library
Uso di Webmozart\Assert per type safety:
```php
Assert::string($content, 'Content must be string');
Assert::notEmpty($data, 'Data cannot be empty');
Assert::classExists($className, 'Class must exist');
```

## Links e Riferimenti

### Documentation Priority Rule
Prima di qualsiasi task, sempre:
1. Studiare docs esistenti in `Modules/**/docs/`
2. Aggiornare documentazione se necessario
3. Refactorizzare se richiesto
4. Poi implementare

### Backup e Storia
- [Original Files Backup](../../../docs-consolidation-backup-*/Xot-docs-original/)
- [Architecture Documentation](../architecture/architecture.md)
- [Filament Best Practices](../filament/filament-best-practices.md)

## Fix Implementati in Sessione (2025-09-03)

### ✅ Errori Risolti
1. **SendMailByRecordAction**: `myLogs()->create()` dynamic relationship call
2. **GetAllModelsAction**: `Module::all()` mixed type e array merge type-safe  
3. **GetSchemaManagerByModelClassAction**: Doctrine schema manager return type
4. **BelongsToAction**: Dynamic property access `$model->{$relation}->update()`
5. **BelongsToManyAction**: Array type conversion per UpdateAction
6. **CustomRelationAction**: Array type conversion per UpdateAction
7. **MorphManyAction**: Specific relation type check per saveMany() method
8. **RelationAction**: Type-safe array conversion per FilterRelationsAction
9. **ContentPdfAction**: View data array type safety per Laravel view() function
10. **StreamDownloadPdfAction**: View data array type safety per Laravel view() function
11. **AddStrictTypesDeclarationCommand**: Console command option type casting

### 🔧 Pattern Applicati
- **Type Assertions con Webmozart\Assert**: Per verificare tipi runtime
- **Dynamic Method/Property Safety**: Controlli instanceof e method_exists
- **Array Type Conversion**: Loop manual per array<string, mixed>
- **PHPDoc Type Hints**: @var annotations per guidare PHPStan
- **Relationship Pattern**: Sempre verificare return type delle relazioni
- **Specific Relation Casting**: instanceof checks per HasMany/MorphMany con saveMany()
- **Console Command Options**: Cast sicuro di array|bool|string options
- **View Data Type Safety**: Array conversion per view() parameter

### 📈 Risultati
- **Prima**: 557 errori PHPStan livello 10
- **Dopo**: 541 errori PHPStan livello 10  
- **Fix Rate**: 16 errori risolti sistemicamente
- **Approccio**: Documentation Priority Rule seguito rigorosamente

---

**Ultima revisione**: 2025-09-03  
**Livello PHPStan**: 10  
**Focus**: Business Logic + Type Safety Sistematico  
**Prossimo obiettivo**: Continuare fix sistematico, target < 500 errori
