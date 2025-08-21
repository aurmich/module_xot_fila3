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

```php
<?php

declare(strict_types=1);

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

Consulta l'esempio completo all'inizio di questo documento per una implementazione avanzata.

## Riferimenti

- [Documentazione Filament](https://filamentphp.com/docs)
- [Documentazione XotBaseResource](/var/www/html/exa/base_orisbroker_fila3/laravel/Modules/Xot/docs/resource.md)
- [Best Practices Laraxot](/var/www/html/exa/base_orisbroker_fila3/laravel/Modules/Xot/docs/best-practices.md)

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

**Vedi anche:** [filament-best-practices.mdc](../../../.windsurf/rules/filament-best-practices.mdc)

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
