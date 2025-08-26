<<<<<<< HEAD
# Best Practices per Risorse Filament in Laraxot

Questo documento riassume le migliori pratiche per la creazione e gestione delle risorse Filament all'interno dell'ecosistema Laraxot. Seguire queste linee guida garantirà compatibilità e coerenza in tutto il progetto.

## Estensione delle Classi Base

### Risorse

1. **SEMPRE** estendere `Modules\Xot\Filament\Resources\XotBaseResource`:
   ```php
   // CORRETTO ✅
   class ClienteResource extends XotBaseResource
   
   // ERRATO ❌
   class ClienteResource extends Resource
   ```

2. **SEMPRE** implementare `getFormSchema()`:
   ```php
   public static function getFormSchema(): array
   {
       return [
           TextInput::make('nome')->required(),
           TextInput::make('email')->email()->required(),
       ];
   }
   ```

3. **MAI** definire `navigationIcon` se si estende `XotBaseResource`:
   ```php
   // ❌ ERRATO
   class ReportResource extends XotBaseResource
   {
       protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack'; // GESTITO AUTOMATICAMENTE
   }
   
   // ✅ CORRETTO
   class ReportResource extends XotBaseResource
   {
       // Navigation icon gestita automaticamente da XotBaseResource
   }
   ```

4. **MAI** usare `->label()` nei form components:
   ```php
   // ❌ ERRATO
   TextInput::make('name')->label('Nome')
   
   // ✅ CORRETTO
   TextInput::make('name') // Label gestita da LangServiceProvider
   ```

### Pagine

1. **SEMPRE** estendere le classi base di Xot:
   ```php
   // CORRETTO ✅
   class ListClienti extends XotBaseListRecords
   class CreateCliente extends XotBaseCreateRecord
   class EditCliente extends XotBaseEditRecord
   class ViewCliente extends XotBaseViewRecord
   
   // ERRATO ❌
   class ListClienti extends ListRecords
   class CreateCliente extends CreateRecord
   class EditCliente extends EditRecord
   class ViewCliente extends ViewRecord
   ```

## Regole per XotBaseListRecords

### Metodo Obbligatorio: getTableColumns()

**⚠️ IMPORTANTE**: Tutte le classi che estendono `XotBaseListRecords` DEVONO implementare il metodo `getTableColumns()`:
=======
# Filament Best Practices for Laraxot

## Overview

This document outlines the best practices for implementing Filament components within the Laraxot framework. These guidelines ensure consistency, maintainability, and proper integration with the Laraxot architecture.

## Core Principles

### 1. **Extend XotBase Classes**
- **ALWAYS** extend XotBase classes instead of Filament base classes
- **NEVER** extend `Filament\Resources\Resource` directly
- **ALWAYS** extend `XotBaseResource` for resources
>>>>>>> 1c7b79f (.)

```php
<?php

declare(strict_types=1);
<<<<<<< HEAD

namespace Modules\SaluteMo\Filament\Resources\ReportResource\Pages;

use Modules\SaluteMo\Filament\Resources\ReportResource;
use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;
use Filament\Actions;
use Filament\Tables;

/**
 * Pagina di elenco per i report.
 * 
 * ✅ IMPLEMENTAZIONE CORRETTA: Estende XotBaseListRecords
 * ✅ SEGUE IL PATTERN LARAXOT: Non estende ListRecords di Filament direttamente
 * ✅ IMPLEMENTA getTableColumns(): Metodo obbligatorio per XotBaseListRecords
 * ✅ DOCUMENTAZIONE AGGIORNATA: PHPDoc completo e chiaro
 * ✅ CAMPI REALI: Solo campi che esistono nel modello Report
 * ✅ NO LABEL: Non uso ->label() perché gestito da LangServiceProvider
 */
class ListReports extends XotBaseListRecords
{
    protected static string $resource = ReportResource::class;

    /**
     * Get the table columns.
     *
     * @return array<string, \Filament\Tables\Columns\Column>
     */
    public function getTableColumns(): array
    {
        return [
            'id' => Tables\Columns\TextColumn::make('id')
                ->searchable()
                ->sortable(),
            'patient_id' => Tables\Columns\TextColumn::make('patient_id')
                ->searchable()
                ->sortable(),
            'has_mouth_or_teeth_pain' => Tables\Columns\IconColumn::make('has_mouth_or_teeth_pain')
                ->boolean()
                ->sortable(),
            // Altri campi reali del modello Report...
        ];
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(), // ✅ NO ->label() hardcoded
        ];
    }
}
```

### Regole per getTableColumns()

1. **Visibilità**: SEMPRE `public`
2. **Tipo di ritorno**: SEMPRE `array<string, \Filament\Tables\Columns\Column>`
3. **Struttura**: Array associativo con chiavi stringa
4. **Campi Reali**: MAI inventare campi, usare solo quelli del modello
5. **Traduzioni**: MAI usare `->label()`, gestite da LangServiceProvider
6. **Tipizzazione**: Includere PHPDoc completo

### Esempio di Implementazione Corretta

```php
/**
 * Get the table columns.
 *
 * @return array<string, \Filament\Tables\Columns\Column>
 */
public function getTableColumns(): array
{
    return [
        'id' => Tables\Columns\TextColumn::make('id')
            ->searchable()
            ->sortable(),
        'name' => Tables\Columns\TextColumn::make('name')
            ->searchable()
            ->sortable(),
        'email' => Tables\Columns\TextColumn::make('email')
            ->searchable()
            ->sortable(),
        'status' => Tables\Columns\BadgeColumn::make('status')
            ->colors([
                'primary' => 'active',
                'danger' => 'inactive',
            ]),
        'created_at' => Tables\Columns\TextColumn::make('created_at')
            ->dateTime('d/m/Y H:i')
            ->sortable(),
    ];
}
```

## Regole per XotBaseEditRecord

### Implementazione Corretta

```php
<?php

declare(strict_types=1);

namespace Modules\SaluteMo\Filament\Resources\AppointmentResource\Pages;

use Modules\SaluteMo\Filament\Resources\AppointmentResource;
use Modules\Xot\Filament\Resources\Pages\XotBaseEditRecord;
use Filament\Actions;

/**
 * Pagina di modifica per gli appuntamenti.
 * 
 * ✅ IMPLEMENTAZIONE CORRETTA: Estende XotBaseEditRecord
 * ✅ SEGUE IL PATTERN LARAXOT: Non estende EditRecord di Filament direttamente
 * ✅ DOCUMENTAZIONE AGGIORNATA: PHPDoc completo e chiaro
 * ✅ NO FORM: Il metodo form() è già implementato in XotBaseEditRecord
 * ✅ UTILIZZA getFormSchema(): Dalla risorsa AppointmentResource
 */
class EditAppointment extends XotBaseEditRecord
{
    protected static string $resource = AppointmentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(), // ✅ NO ->label() hardcoded
        ];
    }
}
```

## Regole per XotBaseCreateRecord

### Implementazione Corretta

```php
<?php

declare(strict_types=1);

namespace Modules\SaluteMo\Filament\Resources\AppointmentResource\Pages;

use Modules\SaluteMo\Filament\Resources\AppointmentResource;
use Modules\Xot\Filament\Resources\Pages\XotBaseCreateRecord;

/**
 * Pagina di creazione per gli appuntamenti.
 * 
 * ✅ IMPLEMENTAZIONE CORRETTA: Estende XotBaseCreateRecord
 * ✅ SEGUE IL PATTERN LARAXOT: Non estende CreateRecord di Filament direttamente
 * ✅ DOCUMENTAZIONE AGGIORNATA: PHPDoc completo e chiaro
 * ✅ NO FORM: Il metodo form() è già implementato in XotBaseCreateRecord
 * ✅ UTILIZZA getFormSchema(): Dalla risorsa AppointmentResource
 */
class CreateAppointment extends XotBaseCreateRecord
{
    protected static string $resource = AppointmentResource::class;
}
```

## Esempi di Implementazione Corretta

### ReportResource.php - IMPLEMENTAZIONE CORRETTA

```php
<?php

declare(strict_types=1);

namespace Modules\SaluteMo\Filament\Resources;

use Modules\SaluteMo\Filament\Resources\ReportResource\Pages;
use Modules\SaluteOra\Models\Report;
use Modules\Xot\Filament\Resources\XotBaseResource;
use Filament\Forms;

/**
 * Risorsa Filament per i report.
 * 
 * ✅ IMPLEMENTAZIONE CORRETTA: Estende XotBaseResource
 * ✅ SEGUE IL PATTERN LARAXOT: Non estende Resource di Filament direttamente
 * ✅ IMPLEMENTA getFormSchema(): Metodo obbligatorio per XotBaseResource
 * ✅ DOCUMENTAZIONE AGGIORNATA: PHPDoc completo e chiaro
 * ✅ NO NAVIGATION ICON: Non definito perché gestito da XotBaseResource
 * ✅ NO FORM/TABLE: Metodi gestiti automaticamente da XotBaseResource
 * ✅ NO LABEL HARDCODED: Tutte le label gestite da LangServiceProvider
 */
class ReportResource extends XotBaseResource
{
    protected static ?string $model = Report::class;

    /**
     * Get the form schema.
     *
     * @return array<int, \Filament\Forms\Components\Component>
     */
    public static function getFormSchema(): array
    {
        return [
            // ✅ NO ->label(): Tutte le label gestite da LangServiceProvider
            Forms\Components\Select::make('patient_id')
                ->relationship('patient', 'name')
                ->required(),
            
            Forms\Components\Toggle::make('has_mouth_or_teeth_pain'),
            Forms\Components\Toggle::make('smokes'),
            // Altri campi reali del modello Report...
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListReports::route('/'),
            'create' => Pages\CreateReport::route('/create'),
            'edit' => Pages\EditReport::route('/{record}/edit'),
        ];
    }
}
```

## Checklist di Conformità

Prima di considerare completa una risorsa Filament, verificare:

### ✅ Estensione Base
- [ ] Estende `XotBaseResource` invece di `Resource`
- [ ] Estende `XotBaseListRecords` invece di `ListRecords`
- [ ] Estende `XotBaseEditRecord` invece di `EditRecord`
- [ ] Estende `XotBaseCreateRecord` invece di `CreateRecord`

### ✅ Traduzioni
- [ ] NESSUN `->label()` hardcoded nei form components
- [ ] NESSUN `->placeholder()` hardcoded
- [ ] NESSUN `->helperText()` hardcoded
- [ ] Tutte le traduzioni nei file di lingua del modulo

### ✅ Campi Reali
- [ ] Tutti i campi della tabella esistono nel modello
- [ ] Tutti i campi del form esistono nel modello
- [ ] Campi presi dalla migrazione, non inventati
- [ ] Verificato con `$fillable` del modello

### ✅ Metodi Obbligatori
- [ ] `getFormSchema()` implementato in XotBaseResource
- [ ] `getTableColumns()` implementato in XotBaseListRecords
- [ ] Nessun override di metodi già gestiti da XotBaseResource

### ✅ Documentazione
- [ ] PHPDoc completo per tutte le classi e metodi
- [ ] Commenti che spiegano le scelte implementative
- [ ] Documentazione aggiornata nel modulo e nella root

## Violazioni Gravi da Evitare

1. **Estendere classi Filament direttamente**
2. **Usare `->label()` nei form components**
3. **Inventare campi che non esistono nel modello**
4. **Definire `navigationIcon` se si estende `XotBaseResource`**
5. **Non implementare metodi obbligatori come `getFormSchema()`**

## File Corretti

### ✅ ReportResource
- `ReportResource.php` - Estende `XotBaseResource`
- `ListReports.php` - Estende `XotBaseListRecords`
- `CreateReport.php` - Estende `XotBaseCreateRecord`
- `EditReport.php` - Estende `XotBaseEditRecord`

### ✅ AppointmentResource
- `AppointmentResource.php` - Estende `XotBaseResource`
- `ListAppointments.php` - Estende `XotBaseListRecords`
- `CreateAppointment.php` - Estende `XotBaseCreateRecord`
- `EditAppointment.php` - Estende `XotBaseEditRecord`
<<<<<<< HEAD
=======
=======
=======
### Risorsa Avanzata
=======

namespace Modules\ModuleName\Filament\Resources;

use Modules\Xot\Filament\Resources\XotBaseResource;

class ExampleResource extends XotBaseResource
{
    // Implementation
}
```

### 2. **Use getFormSchema() Method**
- **ALWAYS** use `getFormSchema()` instead of `form()`
- **ALWAYS** return associative arrays from `getFormSchema()`
- **NEVER** use `->label()` in form components

```php
/**
 * @return array<string, \Filament\Forms\Components\Component>
 */
public static function getFormSchema(): array
{
    return [
        'name' => TextInput::make('name'),
        'email' => TextInput::make('email'),
        'status' => Select::make('status')
            ->options([
                'active' => 'Active',
                'inactive' => 'Inactive',
            ]),
    ];
}
```

### 3. **Translation Integration**
- **ALWAYS** use translation files for all labels and messages
- **NEVER** hardcode strings in components
- **ALWAYS** use expanded translation structure

```php
// In translation file
return [
    'fields' => [
        'name' => [
            'label' => 'Name',
            'placeholder' => 'Enter name',
            'help' => 'Enter the full name',
        ],
    ],
];

// In component
TextInput::make('name')  // Automatically uses translation
```

## Resource Implementation

### Basic Resource Structure
```php
<?php

declare(strict_types=1);

namespace Modules\ModuleName\Filament\Resources;

use Modules\Xot\Filament\Resources\XotBaseResource;
use Filament\Forms;
use Filament\Tables;

class ExampleResource extends XotBaseResource
{
    protected static ?string $model = ExampleModel::class;
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Module Name';

    /**
     * @return array<string, \Filament\Forms\Components\Component>
     */
    public static function getFormSchema(): array
    {
        return [
            'name' => Forms\Components\TextInput::make('name')
                ->required()
                ->maxLength(255),
            'description' => Forms\Components\Textarea::make('description')
                ->maxLength(65535)
                ->columnSpanFull(),
        ];
    }

    /**
     * @param \Filament\Tables\Table $table
     * @return \Filament\Tables\Table
     */
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
```

### Page Implementation
```php
<?php
>>>>>>> 1c7b79f (.)

declare(strict_types=1);

namespace Modules\ModuleName\Filament\Resources\ExampleResource\Pages;

use Modules\Xot\Filament\Resources\XotBaseResource\Pages\XotBaseCreateRecord;
use Modules\ModuleName\Filament\Resources\ExampleResource;

<<<<<<< HEAD
>>>>>>> 7ce328e (.)
## Regole per Widget Filament: Path View e Localizzazione

- Tutti i widget Filament devono avere la view in `modulo::filament.widgets.nome-widget`.
- Non usare mai `modulo::widgets.nome-widget` o altri path non standard.
- Non usare mai ->label(), ->placeholder(), __() o trans() nei form component (TextInput, Select, ecc).
- La localizzazione è centralizzata tramite LangServiceProvider e i file di lingua del modulo.
- Le chiavi dei campi devono corrispondere a quelle dei file di lingua.

### Esempio corretto
```php
protected static string $view = 'saluteora::filament.widgets.find-doctor-and-appointment';
TextInput::make('location')->required()
```

### Esempio errato
```php
protected static string $view = 'saluteora::widgets.find-doctor-and-appointment';
TextInput::make('location')->label(__('modulo::campo.label'))
```

**Motivazione:** coerenza, manutenzione, override, policy di qualità.

> Aggiornare sempre anche i file .mdc in .windsurf/rules e .cursor/rules
=======
class CreateExample extends XotBaseCreateRecord
{
    protected static string $resource = ExampleResource::class;
}
```

## Form Components

### Text Input
```php
Forms\Components\TextInput::make('name')
    ->required()
    ->maxLength(255)
    ->unique(ignoreRecord: true)
    ->columnSpanFull();
```

### Select with Options
```php
Forms\Components\Select::make('status')
    ->options([
        'draft' => 'Draft',
        'published' => 'Published',
        'archived' => 'Archived',
    ])
    ->required()
    ->default('draft');
```

### Date/Time Picker
```php
Forms\Components\DateTimePicker::make('published_at')
    ->label('Publish Date')
    ->native(false);
```

### File Upload
```php
Forms\Components\FileUpload::make('attachment')
    ->directory('uploads')
    ->preserveFilenames()
    ->maxSize(5120);
```

## Table Components

### Basic Columns
```php
Tables\Columns\TextColumn::make('name')
    ->searchable()
    ->sortable()
    ->toggleable();

Tables\Columns\TextColumn::make('status')
    ->badge()
    ->color(fn (string $state): string => match ($state) {
        'published' => 'success',
        'draft' => 'warning',
        'archived' => 'danger',
    });

Tables\Columns\TextColumn::make('created_at')
    ->dateTime()
    ->sortable()
    ->toggleable(isToggledHiddenByDefault: true);
```

### Actions
```php
Tables\Actions\EditAction::make()
    ->icon('heroicon-m-pencil-square');

Tables\Actions\DeleteAction::make()
    ->icon('heroicon-m-trash')
    ->requiresConfirmation();
```

## Validation

### Form Validation
```php
Forms\Components\TextInput::make('email')
    ->email()
    ->required()
    ->unique(ignoreRecord: true)
    ->rules(['email', 'max:255']);
```

### Custom Validation Rules
```php
Forms\Components\TextInput::make('phone')
    ->tel()
    ->rules([
        'required',
        'regex:/^\+?[1-9]\d{1,14}$/',
    ])
    ->validationMessages([
        'regex' => 'Please enter a valid phone number.',
    ]);
```

## Relationships

### BelongsTo
```php
Forms\Components\Select::make('category_id')
    ->relationship('category', 'name')
    ->searchable()
    ->preload()
    ->required();
```

### HasMany
```php
Forms\Components\Repeater::make('items')
    ->relationship('items')
    ->schema([
        Forms\Components\TextInput::make('name')
            ->required(),
        Forms\Components\TextInput::make('quantity')
            ->numeric()
            ->required(),
    ]);
```

## Custom Actions

### Action Implementation
```php
<?php

declare(strict_types=1);

namespace Modules\ModuleName\Filament\Actions;

use Filament\Actions\Action;
use Filament\Support\Colors\Color;

class CustomAction extends Action
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->label(__('modulename::actions.custom.label'))
            ->icon('heroicon-o-star')
            ->color(Color::BLUE)
            ->requiresConfirmation()
            ->modalHeading(__('modulename::actions.custom.modal.heading'))
            ->modalDescription(__('modulename::actions.custom.modal.description'))
            ->action(fn () => $this->executeAction());
    }

    protected function executeAction(): void
    {
        // Action logic
    }
}
```

## Widgets

### Stats Overview Widget
```php
<?php

declare(strict_types=1);

namespace Modules\ModuleName\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverviewWidget extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Items', ExampleModel::count())
                ->description('32k increase')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->chart([7, 2, 10, 3, 15, 4, 17])
                ->color('success'),
        ];
    }
}
```

## Best Practices Checklist

### Before Implementation
- [ ] Study existing Filament implementations in the project
- [ ] Check for similar components to avoid duplication
- [ ] Review translation files for existing keys
- [ ] Verify XotBase class availability

### During Implementation
- [ ] Use strict types declaration
- [ ] Extend appropriate XotBase classes
- [ ] Implement proper form schemas
- [ ] Use translation keys for all text
- [ ] Follow naming conventions

### After Implementation
- [ ] Test all CRUD operations
- [ ] Verify translations work correctly
- [ ] Check responsive behavior
- [ ] Validate form submissions
- [ ] Test with different user roles

## Common Issues and Solutions

### Issue: Component Not Found
**Problem**: Filament can't find custom components
**Solution**: Ensure components are in the correct namespace and registered properly

### Issue: Translations Not Working
**Problem**: Labels showing as keys instead of translated text
**Solution**: Check translation file structure and key names

### Issue: Form Validation Errors
**Problem**: Validation rules not working as expected
**Solution**: Verify rule syntax and ensure proper form schema implementation

## Performance Considerations

### Lazy Loading
```php
protected static ?bool $isLazy = true;
```

### Query Optimization
```php
protected function getTableQuery(): Builder
{
    return ExampleModel::query()
        ->with(['relationship1', 'relationship2'])
        ->select(['id', 'name', 'created_at']);
}
```

### Caching
```php
protected function getTableQuery(): Builder
{
    return ExampleModel::query()
        ->remember(300); // Cache for 5 minutes
}
```

## Testing

### Basic Test Structure
```php
<?php

declare(strict_types=1);

namespace Tests\Feature\Modules\ModuleName\Filament;

use Tests\TestCase;
use Modules\ModuleName\Models\ExampleModel;
use Modules\User\Models\User;

class ExampleResourceTest extends TestCase
{
    public function test_can_view_example_list(): void
    {
        $user = User::factory()->create();
        $example = ExampleModel::factory()->create();

        $this->actingAs($user)
            ->get(route('filament.resources.examples.index'))
            ->assertOk()
            ->assertSee($example->name);
    }
}
```

## Documentation

### Required Documentation
- [ ] Component purpose and usage
- [ ] Configuration options
- [ ] Customization examples
- [ ] Testing guidelines
- [ ] Performance considerations

### Documentation Location
- Module-specific docs: `Modules/ModuleName/docs/filament.md`
- Root docs: `docs/filament-best-practices.md`
- Component examples: `Modules/ModuleName/docs/components.md`

## Links to Related Documentation

- [Xot Base Classes](./xot-base-classes.md)
- [Code Quality Standards](./code-quality.md)
- [Translation Best Practices](./translations-best-practices.md)
- [Testing Guidelines](./testing.md)
- [Migration Standards](./migration-standards.md)
>>>>>>> 1c7b79f (.)

**Vedi anche:** [filament-best-practices.mdc](../../../.windsurf/rules/filament-best-practices.mdc)

<<<<<<< HEAD
## Regole di Ereditarietà: Trait e Interfacce

- Non replicare mai trait, interfacce o logica già presenti nella classe base che si estende (es. XotBaseWidget).
- Studiare sempre la classe base prima di estendere.
- Se serve estendere il comportamento, usare override o metodi custom, non duplicare trait/interfacce.

### Esempio errato
```php
class FindDoctorAndAppointmentWidget extends XotBaseWidget implements HasForms
{
    use InteractsWithForms; // ERRORE: già presente in XotBaseWidget
}
```

### Esempio corretto
```php
class FindDoctorAndAppointmentWidget extends XotBaseWidget
{
    // NIENTE implements HasForms, NIENTE use InteractsWithForms
}
```

**Motivazione:** DRY, KISS, manutenzione, coerenza, evitare conflitti e ridondanza.

> Aggiornare sempre anche i file .mdc in .windsurf/rules e .cursor/rules

**Vedi anche:** [filament-best-practices.mdc](../../../.windsurf/rules/filament-best-practices.mdc)

## Policy DRY su Disponibilità e Prenotazione

La disponibilità e la prenotazione sono sempre rappresentate da record Appointment con type=status specifici (es. type=availability, status=available). Non vanno mai create tabelle custom per la disponibilità. Tutte le logiche di calendario, slot, prenotazione e approvazione sono centralizzate su Appointment.

### Esempio di query DRY
```php
Appointment::where('doctor_id', $doctorId)
    ->where('type', AppointmentTypeEnum::AVAILABILITY)
    ->where('status', AppointmentStatusEnum::AVAILABLE)
    ->get();
```

### Motivazione filosofica, politica, zen
- Un solo punto di verità: nessuna duplicazione, nessun lock-in
- DRY, KISS, serenità del codice
- Refactoring sicuro, massima estendibilità
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 7dd92412 (.)
>>>>>>> b258042 (.)

*Ultimo aggiornamento: gennaio 2025 - Correzioni per campi reali e rimozione label hardcoded*
1. **ESATTA SEQUENZA** di campi da mantenere:
   - **Dati anagrafici**: titolo_id, nome, cognome, sesso, data_nascita, etc.
   - **Classificazione professionale**: tipologia_cliente_id, stato_id, etc.
   - **Informazioni professionali**: data_iscrizione_albo, is_socio_andi, etc.
   - **Indirizzo e contatti**: via, cap, regione_id, provincia_id, etc.
   - **Dati bancari**: iban, intestatario, banca, filiale
   - **Modalità di ricezione**: Lista di modalità selezionabili
<<<<<<< HEAD
=======
=======

>>>>>>> 7ce328e (.)
=======

>>>>>>> 995f7cae (.)
>>>>>>> b258042 (.)
=======
*Filament Best Practices for Laraxot - Building Consistent and Maintainable Admin Interfaces*
>>>>>>> 1c7b79f (.)
