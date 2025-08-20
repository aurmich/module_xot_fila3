# Best Practices Filament - Modulo Xot

## 🎯 Principi Fondamentali

### **DRY (Don't Repeat Yourself)**
- **Classi Base Uniche:** Estendere sempre XotBaseResource e XotBaseRelationManager
- **Template Standardizzati:** Strutture uniformi per tutte le risorse
- **Componenti Riutilizzabili:** Evitare duplicazione di logica

### **KISS (Keep It Simple, Stupid)**
- **Struttura Semplice:** Organizzazione logica e prevedibile
- **Metodi Essenziali:** Solo i metodi necessari
- **Configurazione Minimal:** Impostazioni essenziali

## 🏗️ Struttura delle Classi Base

### **XotBaseResource**
```php
<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Resources;

use Filament\Resources\Resource;

abstract class XotBaseResource extends Resource
{
    // Funzionalità comuni per tutte le risorse
}
```

### **XotBaseRelationManager**
```php
<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Resources\RelationManagers;

use Filament\Resources\RelationManagers\RelationManager;

abstract class XotBaseRelationManager extends RelationManager
{
    // Funzionalità comuni per tutti i relation manager
}
```

## 📋 Regole di Implementazione

### **1. Estensione Obbligatoria**
- **MAI** estendere direttamente `Filament\Resources\Resource`
- **MAI** estendere direttamente `Filament\Resources\RelationManagers\RelationManager`
- **SEMPRE** estendere le classi base appropriate del modulo

### **2. Metodi da Implementare**
```php
// ✅ CORRETTO - Metodi standardizzati
public function getFormSchema(): array
public function getTableColumns(): array
public function getTableHeaderActions(): array
public function getTableActions(): array
public function getTableBulkActions(): array

// ❌ ERRATO - Metodi non standardizzati
public function form(Form $form): Form
public function table(Table $table): Table
```

### **3. Traduzioni e Label**
```php
// ✅ CORRETTO - Usare file di traduzione
TextInput::make('name')
    ->required();

// ❌ ERRATO - MAI usare metodi label/placeholder/helperText
TextInput::make('name')
    ->label('Nome')           // VIETATO
    ->placeholder('Inserisci nome')  // VIETATO
    ->helperText('Testo di aiuto')   // VIETATO
```

## 🚫 Anti-pattern da Evitare

### **1. Estensione Diretta**
```php
// ❌ MAI estendere direttamente le classi Filament
use Filament\Resources\Resource;

class UserResource extends Resource // ❌ Sbagliato
{
    // ...
}
```

### **2. Override Metodi Final**
```php
// ❌ MAI sovrascrivere metodi final
public function form(Form $form): Form // ❌ Metodo final in XotBaseResource
{
    // ...
}
```

### **3. Uso di Metodi Label**
```php
// ❌ MAI usare metodi label/placeholder/helperText
TextInput::make('name')
    ->label('Nome')           // VIETATO
    ->placeholder('Inserisci nome')  // VIETATO
    ->helperText('Testo di aiuto')   // VIETATO
```

## ✅ Best Practices

### **1. Implementazione Resource**
```php
<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources;

use Modules\Xot\Filament\Resources\XotBaseResource;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\EmailInput;

class UserResource extends XotBaseResource
{
    protected static ?string $model = \Modules\User\Models\User::class;
    
    protected static ?string $navigationIcon = 'heroicon-o-users';
    
    protected static ?string $navigationGroup = 'Gestione Utenti';
    
    /**
     * Schema del form per la creazione e modifica.
     *
     * @return array<int, \Filament\Forms\Components\Component>
     */
    public function getFormSchema(): array
    {
        return [
            TextInput::make('name')
                ->required(),
                
            EmailInput::make('email')
                ->required()
                ->unique(ignoreRecord: true),
        ];
    }
    
    /**
     * Colonne della tabella.
     *
     * @return array<int, \Filament\Tables\Columns\Column>
     */
    public function getTableColumns(): array
    {
        return [
            Tables\Columns\TextColumn::make('name')
                ->searchable()
                ->sortable(),
                
            Tables\Columns\TextColumn::make('email')
                ->searchable()
                ->sortable(),
        ];
    }
}
```

### **2. Implementazione RelationManager**
```php
<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\UserResource\RelationManagers;

use Modules\Xot\Filament\Resources\RelationManagers\XotBaseRelationManager;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Actions\AttachAction;
use Filament\Tables\Actions\DetachAction;

class TeamsRelationManager extends XotBaseRelationManager
{
    protected static string $relationship = 'teams';
    
    protected static ?string $recordTitleAttribute = 'name';
    
    /**
     * Schema del form per l'editing e la creazione.
     *
     * @return array<int, \Filament\Forms\Components\Component>
     */
    public function getFormSchema(): array
    {
        return [
            TextInput::make('role')
                ->required(),
        ];
    }
    
    /**
     * Colonne della tabella.
     *
     * @return array<int, \Filament\Tables\Columns\Column>
     */
    public function getTableColumns(): array
    {
        return [
            Tables\Columns\TextColumn::make('name')
                ->searchable()
                ->sortable(),
                
            Tables\Columns\TextColumn::make('role')
                ->searchable(),
        ];
    }
    
    /**
     * Azioni dell'header della tabella.
     *
     * @return array<string, \Filament\Tables\Actions\Action>
     */
    public function getTableHeaderActions(): array
    {
        return [
            'attach' => AttachAction::make()
                ->modalHeading(__('user::teams.actions.attach.modal.heading'))
                ->form(fn (AttachAction $action): array => [
                    $action->getRecordSelect(),
                    TextInput::make('role')
                        ->default('member')
                        ->required(),
                ]),
        ];
    }
    
    /**
     * Azioni per ogni riga della tabella.
     *
     * @return array<string, \Filament\Tables\Actions\Action>
     */
    public function getTableActions(): array
    {
        return [
            'edit' => EditAction::make()
                ->modalHeading(__('user::teams.actions.edit.modal.heading')),
                
            'detach' => DetachAction::make()
                ->modalHeading(__('user::teams.actions.detach.modal.heading')),
        ];
    }
}
```

### **3. Implementazione Actions**
```php
<?php

declare(strict_types=1);

namespace Modules\User\Filament\Actions;

use Filament\Actions\Action;
use Filament\Support\Colors\Color;

class ApproveUserAction extends Action
{
    /**
     * Configurazione dell'azione.
     */
    protected function setUp(): void
    {
        parent::setUp();
        
        $this->label(__('user::actions.approve.label'))
            ->icon('heroicon-o-check-circle')
            ->color(Color::GREEN)
            ->requiresConfirmation()
            ->modalHeading(__('user::actions.approve.modal.heading'))
            ->modalDescription(__('user::actions.approve.modal.description'))
            ->modalSubmitActionLabel(__('user::actions.approve.confirm'))
            ->action(fn () => $this->approveUser());
    }
    
    /**
     * Logica di approvazione utente.
     */
    protected function approveUser(): void
    {
        // Implementazione dell'approvazione
    }
}
```

## 📁 Struttura Cartelle Standard

### **1. Struttura Resource**
```
app/Filament/
├── resources/                    # Risorse
│   ├── user-resource/           # Resource utente
│   │   ├── pages/               # Pagine della resource
│   │   │   ├── create-user.php
│   │   │   ├── edit-user.php
│   │   │   └── list-users.php
│   │   └── relation-managers/   # Relation manager
│   │       ├── teams-relation-manager.php
│   │       └── permissions-relation-manager.php
│   └── user-resource.php        # Resource principale
├── widgets/                      # Widget
├── actions/                      # Azioni custom
├── forms/                        # Form custom
├── tables/                       # Tabelle custom
└── pages/                        # Pagine custom
```

### **2. Struttura Documentazione**
```
docs/
├── filament/                     # Guide Filament
│   ├── best-practices.md        # Best practices
│   ├── resources.md             # Guide risorse
│   ├── actions.md               # Guide azioni
│   └── dashboard.md             # Guide dashboard
└── README.md                    # README principale
```

## 🔧 Configurazione e Setup

### **1. Service Provider Registration**
```php
<?php

declare(strict_types=1);

namespace Modules\User\Providers;

use Filament\Facades\Filament;
use Illuminate\Support\ServiceProvider;
use Modules\User\Filament\Resources\UserResource;

class UserServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        parent::boot();
        
        // Registra le risorse Filament
        Filament::registerResources([
            UserResource::class,
        ]);
    }
}
```

### **2. Configurazione Traduzioni**
```php
// Modules/User/lang/it/filament.php
return [
    'resources' => [
        'user' => [
            'label' => 'Utente',
            'plural_label' => 'Utenti',
            'navigation_group' => 'Gestione Utenti',
            'navigation_icon' => 'heroicon-o-users',
        ],
    ],
    
    'actions' => [
        'approve' => [
            'label' => 'Approva',
            'modal' => [
                'heading' => 'Approva Utente',
                'description' => 'Sei sicuro di voler approvare questo utente?',
                'confirm' => 'Approva',
            ],
        ],
    ],
];
```

## 📊 Metriche di Qualità

### **PHPStan Compliance**
- **Livello Minimo:** 9
- **Livello Target:** 10
- **Tipizzazione:** 100% esplicita
- **PHPDoc:** Completo per tutte le classi

### **Code Coverage**
- **Test Unitari:** 100% delle risorse
- **Test di Integrazione:** 100% delle funzionalità
- **Test di Regressione:** Dopo ogni modifica

## 🔗 Collegamenti

- [Architettura Modulo Xot](../core/architecture.md)
- [Convenzioni di Naming](../core/naming-conventions.md)
- [Best Practices Sistema](../../../docs/core/filament-best-practices.md)
- [Template Modulo](../../../docs/templates/module-template.md)

---

**Ultimo aggiornamento:** Gennaio 2025  
**Versione:** 2.0 - Consolidata DRY + KISS
