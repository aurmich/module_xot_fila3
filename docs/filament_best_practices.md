# Filament Best Practices - Laraxot Framework

## CRITICAL: Model Fields Validation

### ❌ ERRORE GRAVISSIMO - Campi Inesistenti
**PROBLEMA**: Le risorse Filament stanno usando campi che NON esistono nei modelli corrispondenti.

**ESEMPI TROVATI**:
- `AssenzeResource` usava campi come `matr`, `cognome`, `nome`, `giorni_assenza` che NON esistono nel modello `Assenze`
- `ListValutatores` usava campi come `matr_valutatore`, `cognome_valutatore` che NON esistono nel modello `Valutatore`
- `ListCategoriaPropros` usava campi come `name`, `descr` che NON esistono nel modello `CategoriaPropro`

### ✅ SOLUZIONE - Processo di Verifica
1. **Leggere il Modello**: Controllare l'array `$fillable` e le proprietà PHPDoc
2. **Controllare la Migrazione**: Verificare lo schema della tabella
3. **Verificare Form Schema**: Assicurarsi che `getFormSchema()` usi solo campi esistenti
4. **Verificare Table Columns**: Assicurarsi che `getTableColumns()` usi solo campi esistenti
5. **Documentare**: Creare un piano di verifica per ogni modulo

## Regole Fondamentali

### Estensione Classi
- **MAI** estendere direttamente le classi base di Laravel o Filament
- **SEMPRE** estendere le classi base di Xot:
  - `XotBaseResource` invece di `Resource`
  - `XotBaseListRecords` invece di `ListRecords`
  - `XotBaseServiceProvider` invece di `ServiceProvider`

### Metodi Filament
- **USARE** `getFormSchema()` invece di `form()`
- **NON DEFINIRE** il metodo `table()` nelle classi Resource
- **NON USARE** `->label()` (gestito automaticamente da LangServiceProvider)
- **NON DEFINIRE** `$navigationIcon`, `$modelLabel` (gestito dalle traduzioni)

### Traduzioni
- **SEMPRE** includere `use Filament\\Forms;` nelle Resource
- **USARE** file di traduzione per tutte le label
- **STRUTTURA ESPANSA** per campi e azioni

## Esempio Corretto

```php
<?php

declare(strict_types=1);

namespace Modules\ModuleName\Filament\Resources;

use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Modules\Xot\Filament\Resources\XotBaseResource;

class ExampleResource extends XotBaseResource
{
    protected static ?string $model = ExampleModel::class;

    public static function getFormSchema(): array
    {
        return [
            // ✅ CORRETTO - Solo campi reali del modello
            TextInput::make('id')->disabled(),
            TextInput::make('name')->required(),
            TextInput::make('email')->email(),
            
            // ❌ ERRATO - Campo che non esiste nel modello
            // TextInput::make('non_existent_field'),
        ];
    }
}
```

## Checklist di Verifica

Prima di considerare completa una risorsa Filament:

- [ ] Estende `XotBaseResource`
- [ ] Usa `getFormSchema()` invece di `form()`
- [ ] Non definisce metodo `table()`
- [ ] Non usa `->label()`, `->placeholder()`, `->helperText()`
- [ ] Include `use Filament\\Forms;`
- [ ] **VERIFICA**: Tutti i campi del form esistono nel modello
- [ ] **VERIFICA**: Tutte le colonne della tabella esistono nel modello
- [ ] **VERIFICA**: Controlla sia il modello che la migrazione
- [ ] Documentazione aggiornata

## Errori Comuni

### ❌ Campi Inesistenti
```php
// ERRATO - Campo che non esiste nel modello
TextInput::make('non_existent_field')
```

### ❌ Estensione Diretta
```php
// ERRATO - Estende direttamente Resource
class ExampleResource extends Resource
```

### ❌ Metodo Form
```php
// ERRATO - Usa form() invece di getFormSchema()
public function form(Form $form): Form
{
    return $form->schema([...]);
}
```

### ❌ Label Hardcoded
```php
// ERRATO - Usa ->label()
TextInput::make('name')->label('Nome')
```

## Documentazione Correlata
- [Regole Laraxot](rules/laraxot-rules.md)
- [Verifica Campi Modello](memories/model-fields-validation.md)
- [Piano Verifica Progressioni](../../Progressioni/docs/model-fields-verification-plan.md)

*Ultimo aggiornamento: Giugno 2025*
