# Filament Best Practices (Moduli Riutilizzabili)

## Descrizione
Best practice generiche per l'utilizzo di Filament in moduli Laravel riutilizzabili. Nessun riferimento a nomi di progetto o brand.

## Regole principali
- NON estendere mai direttamente le classi di Filament: creare sempre wrapper personalizzati
- Utilizzare traits per funzionalità riutilizzabili
- Seguire il pattern di composizione invece dell'ereditarietà
- Mantenere la compatibilità con gli aggiornamenti di Filament
- Centralizzare le configurazioni comuni nelle classi base
- Non inserire proprietà statiche custom nei resource (es. $navigationIcon, $navigationGroup, $translationPrefix)
- Non usare ->label() direttamente nei form: usare sempre i file di traduzione

## Esempi
```php
// ❌ Anti-pattern
class MyResource extends \Filament\Resources\Resource {}

// ✅ Best practice
class MyResource extends \Modules\Xot\Filament\Resources\XotBaseResource {}
```

## Troubleshooting
- Se compare un errore di override di proprietà statiche, rimuovere la proprietà dal resource e centralizzare nella base
- Se le traduzioni non vengono applicate, controllare la struttura dei file lang e l'assenza di ->label() hardcoded

<<<<<<< Updated upstream
## Collegamenti
- [Filament Docs](https://filamentphp.com/docs)
- [Best practices moduli riutilizzabili](../module-documentation-neutrality.md)
- [Ereditarietà modelli](../model-inheritance-best-practices.md)
=======
### Problema: Form non visualizzato correttamente

**Soluzione:** Assicurarsi di utilizzare `getFormSchema()` invece di `form()` e controllare che tutti i componenti siano configurati correttamente.

### Problema: Label non tradotte

**Soluzione:** Verificare che:
1. Non si stia utilizzando `->label()` direttamente sui componenti
2. I file di traduzione siano nella posizione corretta e seguano la struttura espansa
3. Le chiavi dei campi nel form corrispondano esattamente alle chiavi dei campi nel file di traduzione

### Problema: Relazioni non caricate correttamente

**Soluzione:** Verificare che:
1. I nomi delle relazioni e delle colonne siano corretti
2. Le relazioni siano definite correttamente nel modello
3. Sia utilizzato l'eager loading appropriato in `getEloquentQuery()`

## Esempi Pratici

### Risorsa Base

```php
<?php

namespace Modules\Brain\Filament\Resources;

use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;
use Modules\Xot\Filament\Resources\XotBaseResource;
use Modules\Brain\Models\Socio;

class SocioResource extends XotBaseResource
{
    protected static ?string $model = Socio::class;
    
    public static function getFormSchema(): array
    {
        return [
            TextInput::make('nome')->required(),
            TextInput::make('cognome')->required(),
        ];
    }
    
    public static function table(\Filament\Tables\Table $table): \Filament\Tables\Table
    {
        return $table
            ->columns([
                TextColumn::make('nome'),
                TextColumn::make('cognome'),
            ]);
    }
}
```

### Risorsa Avanzata

Consulta l'esempio completo all'inizio di questo documento per una implementazione avanzata.

## Riferimenti

- [Documentazione Filament](https://filamentphp.com/docs)
- [Documentazione XotBaseResource](/var/www/html/exa/base_orisbroker_fila3/laravel/Modules/Xot/docs/resource.md)
- [Best Practices Laraxot](/var/www/html/exa/base_orisbroker_fila3/laravel/Modules/Xot/docs/best-practices.md)

## Collegamenti tra versioni di FILAMENT-BEST-PRACTICES.md
* [FILAMENT-BEST-PRACTICES.md](../../../Xot/docs/filament/FILAMENT-BEST-PRACTICES.md)
* [FILAMENT-BEST-PRACTICES.md](../../../Xot/docs/FILAMENT-BEST-PRACTICES.md)


## Collegamenti tra versioni di filament-best-practices.md
### Versione HEAD

* [filament-best-practices.md](../filament-best-practices.md)

### Versione Incoming

* [filament-best-practices.md](filament/filament-best-practices.md)

---

## Collocazione dei metodi tabellari

**Regola:**
I metodi `getTableColumns`, `getTableFilters`, `getTableActions`, `getTableBulkActions` vanno sempre implementati nella pagina collegata (es. `ListXResource`), **mai** nella Resource, secondo le regole Filament e Laraxot. La Resource deve solo definire le pagine e la form schema.

**Motivazione:**
- Rispetta la separazione delle responsabilità tra Resource e Page
- Permette override e personalizzazione per singola pagina
- Facilita la manutenzione e la testabilità
- Allinea il codice agli standard Filament e Laraxot

**Esempio corretto:**
```php
// In Resource:
public static function getPages(): array {
    return [
        'index' => Pages\ListPerformanceFondos::route('/'),
        // ...
    ];
}

// In Pages/ListPerformanceFondos.php:
public function getTableColumns(): array { /* ... */ }
public function getTableFilters(): array { /* ... */ }
public function getTableActions(): array { /* ... */ }
public function getTableBulkActions(): array { /* ... */ }
```

**Esempio sbagliato:**
```php
// In Resource:
public static function getTableColumns(): array { /* ... */ }
```

**Nota:**
Aggiornare sempre la documentazione e le regole di progetto. Applicare la stessa regola a tutti i moduli e risorse Filament, anche custom.

**Vedi anche:**
- [Best Practices Filament per il modulo Performance](../../Performance/docs/filament.md)
>>>>>>> Stashed changes


