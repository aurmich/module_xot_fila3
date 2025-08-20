# Template Classi Base - Modulo Xot

## 🎯 Panoramica

Template standardizzati per tutte le classi del sistema Laraxot, seguendo i principi DRY + KISS.

## 🏗️ Template Modello Base

### **BaseModel Standard**
```php
<?php

declare(strict_types=1);

namespace Modules\{ModuleName}\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * {Description} model.
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property bool $is_active
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Collection<int, RelatedModel> $relatedModels
 */
class {ModelName} extends BaseModel
{
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'description',
        'is_active',
    ];

    /**
     * The attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ];
    }

    /**
     * Get the related models.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany<RelatedModel>
     */
    public function relatedModels(): HasMany
    {
        return $this->hasMany(RelatedModel::class);
    }

    /**
     * Get the parent model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<ParentModel, {ModelName}>
     */
    public function parentModel(): BelongsTo
    {
        return $this->belongsTo(ParentModel::class);
    }

    /**
     * Get the many-to-many relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany<RelatedModel>
     */
    public function manyToManyModels(): BelongsToMany
    {
        return $this->belongsToMany(RelatedModel::class);
    }
}
```

## 🎨 Template Resource Filament

### **XotBaseResource Standard**
```php
<?php

declare(strict_types=1);

namespace Modules\{ModuleName}\Filament\Resources;

use Modules\Xot\Filament\Resources\XotBaseResource;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;

class {ModelName}Resource extends XotBaseResource
{
    protected static ?string $model = \Modules\{ModuleName}\Models\{ModelName}::class;

    protected static ?string $navigationIcon = 'heroicon-o-{icon}';

    protected static ?string $navigationGroup = '{Group Name}';

    protected static ?int $navigationSort = 1;

    /**
     * Get the form schema for creating and editing.
     *
     * @return array<int, \Filament\Forms\Components\Component>
     */
    public function getFormSchema(): array
    {
        return [
            TextInput::make('name')
                ->required()
                ->maxLength(255),

            Textarea::make('description')
                ->maxLength(1000)
                ->columnSpanFull(),

            Toggle::make('is_active')
                ->default(true),
        ];
    }

    /**
     * Get the table columns.
     *
     * @return array<int, \Filament\Tables\Columns\Column>
     */
    public function getTableColumns(): array
    {
        return [
            TextColumn::make('name')
                ->searchable()
                ->sortable(),

            TextColumn::make('description')
                ->limit(50)
                ->searchable(),

            IconColumn::make('is_active')
                ->boolean()
                ->sortable(),

            TextColumn::make('created_at')
                ->dateTime()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
        ];
    }
}
```

## 🔗 Template RelationManager

### **XotBaseRelationManager Standard**
```php
<?php

declare(strict_types=1);

namespace Modules\{ModuleName}\Filament\Resources\{ModelName}Resource\RelationManagers;

use Modules\Xot\Filament\Resources\RelationManagers\XotBaseRelationManager;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Actions\AttachAction;
use Filament\Tables\Actions\DetachAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;

class {RelatedModel}RelationManager extends XotBaseRelationManager
{
    protected static string $relationship = '{relationship_name}';

    protected static ?string $recordTitleAttribute = 'name';

    /**
     * Get the form schema for editing and creating.
     *
     * @return array<int, \Filament\Forms\Components\Component>
     */
    public function getFormSchema(): array
    {
        return [
            TextInput::make('role')
                ->required()
                ->maxLength(255),
        ];
    }

    /**
     * Get the table columns.
     *
     * @return array<int, \Filament\Tables\Columns\Column>
     */
    public function getTableColumns(): array
    {
        return [
            TextColumn::make('name')
                ->searchable()
                ->sortable(),

            TextColumn::make('role')
                ->searchable(),

            TextColumn::make('created_at')
                ->dateTime()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
        ];
    }

    /**
     * Get the table header actions.
     *
     * @return array<string, \Filament\Tables\Actions\Action>
     */
    public function getTableHeaderActions(): array
    {
        return [
            'attach' => AttachAction::make()
                ->modalHeading(__('{modulename}::{relationship_name}.actions.attach.modal.heading'))
                ->form(fn (AttachAction $action): array => [
                    $action->getRecordSelect(),
                    TextInput::make('role')
                        ->default('member')
                        ->required(),
                ]),
        ];
    }

    /**
     * Get the table actions.
     *
     * @return array<string, \Filament\Tables\Actions\Action>
     */
    public function getTableActions(): array
    {
        return [
            'edit' => EditAction::make()
                ->modalHeading(__('{modulename}::{relationship_name}.actions.edit.modal.heading')),

            'detach' => DetachAction::make()
                ->modalHeading(__('{modulename}::{relationship_name}.actions.detach.modal.heading')),
        ];
    }
}
```

## 🚀 Template Action Custom

### **Action Standard**
```php
<?php

declare(strict_types=1);

namespace Modules\{ModuleName}\Filament\Actions;

use Filament\Actions\Action;
use Filament\Support\Colors\Color;

class {ActionName}Action extends Action
{
    /**
     * Configure the action.
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->label(__('{modulename}::actions.{action_name}.label'))
            ->icon('heroicon-o-{icon}')
            ->color(Color::{COLOR})
            ->requiresConfirmation()
            ->modalHeading(__('{modulename}::actions.{action_name}.modal.heading'))
            ->modalDescription(__('{modulename}::actions.{action_name}.modal.description'))
            ->modalSubmitActionLabel(__('{modulename}::actions.{action_name}.confirm'))
            ->action(fn () => $this->executeAction());
    }

    /**
     * Execute the action.
     */
    protected function executeAction(): void
    {
        // Implementazione dell'azione
    }
}
```

## 🔧 Template Service Provider

### **XotBaseServiceProvider Standard**
```php
<?php

declare(strict_types=1);

namespace Modules\{ModuleName}\Providers;

use Modules\Xot\Providers\XotBaseServiceProvider;
use Filament\Facades\Filament;
use Modules\{ModuleName}\Filament\Resources\{ModelName}Resource;

class {ModuleName}ServiceProvider extends XotBaseServiceProvider
{
    /**
     * The module namespace.
     *
     * @var string
     */
    protected string $module_name = '{ModuleName}';

    /**
     * Boot the application events.
     *
     * @return void
     */
    public function boot(): void
    {
        parent::boot();

        // Registra le risorse Filament
        Filament::registerResources([
            {ModelName}Resource::class,
        ]);
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register(): void
    {
        parent::register();

        // Registra servizi specifici del modulo
        $this->app->singleton('{modulename}.service', {ModuleName}Service::class);
    }
}
```

## 📊 Template Data Object

### **Spatie Laravel Data Standard**
```php
<?php

declare(strict_types=1);

namespace Modules\{ModuleName}\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Attributes\Validation\Required;
use Spatie\LaravelData\Attributes\Validation\StringType;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Casts\DateTimeInterfaceCast;

class {ModelName}Data extends Data
{
    public function __construct(
        #[Required, StringType]
        public readonly string $name,

        public readonly ?string $description = null,

        public readonly bool $is_active = true,

        #[WithCast(DateTimeInterfaceCast::class)]
        public readonly ?\DateTimeInterface $created_at = null,

        #[WithCast(DateTimeInterfaceCast::class)]
        public readonly ?\DateTimeInterface $updated_at = null,

        public readonly ?int $id = null,
    ) {
    }

    /**
     * Create from model.
     *
     * @param \Modules\{ModuleName}\Models\{ModelName} $model
     * @return self
     */
    public static function fromModel(\Modules\{ModuleName}\Models\{ModelName} $model): self
    {
        return new self(
            name: $model->name,
            description: $model->description,
            is_active: $model->is_active,
            created_at: $model->created_at,
            updated_at: $model->updated_at,
            id: $model->id,
        );
    }

    /**
     * Convert to model.
     *
     * @return \Modules\{ModuleName}\Models\{ModelName}
     */
    public function toModel(): \Modules\{ModuleName}\Models\{ModelName}
    {
        $model = $this->id
            ? \Modules\{ModuleName}\Models\{ModelName}::findOrFail($this->id)
            : new \Modules\{ModuleName}\Models\{ModelName};

        $model->name = $this->name;
        $model->description = $this->description;
        $model->is_active = $this->is_active;

        return $model;
    }
}
```

## 📋 Checklist Utilizzo Template

### **Fase 1: Preparazione**
- [ ] Template appropriato selezionato
- [ ] Namespace corretto identificato
- [ ] Dipendenze necessarie identificate

### **Fase 2: Personalizzazione**
- [ ] Nomi classe aggiornati
- [ ] Proprietà specifiche aggiunte
- [ ] Metodi custom implementati

### **Fase 3: Validazione**
- [ ] PHPStan passa senza errori
- [ ] Test unitari passano
- [ ] Funzionalità testata

## 🔗 Collegamenti

- [Architettura Modulo Xot](../core/architecture.md)
- [Best Practices Filament](../filament/best-practices.md)
- [Guida PHPStan](../development/phpstan-guide.md)

---

**Ultimo aggiornamento:** Gennaio 2025  
**Versione:** 2.0 - Consolidata DRY + KISS
