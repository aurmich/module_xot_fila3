# XotBaseWidget

La classe astratta `XotBaseWidget` fornisce una base comune per tutti i widget Filament nel modulo Xot.

## Caratteristiche Principali

- Estende `Filament\Widgets\Widget`
<<<<<<< HEAD
<<<<<<< HEAD
=======

### Versione HEAD

>>>>>>> 355a587 (.)
- Integra funzionalità per i form tramite `InteractsWithForms`
- Supporta filtri di pagina tramite `InteractsWithPageFilters`
- Gestione automatica delle viste
- Configurazione flessibile

## Struttura Corretta dei File

### Posizionamento

I widget Filament **DEVONO** essere posizionati nella directory `app/Filament/Widgets/` del modulo:

```
Modules/NomeModulo/app/Filament/Widgets/NomeWidget.php
```

### Namespace

Il namespace corretto è `Modules\NomeModulo\Filament\Widgets` (senza il segmento `app`):

```php
namespace Modules\User\Filament\Widgets;

// NON usare: namespace Modules\User\App\Filament\Widgets;
```

<<<<<<< HEAD
=======
=======

### Versione Alternativa

>>>>>>> 355a587 (.)
- Integra funzionalità per i form
- Supporta filtri di pagina
- Gestione automatica delle viste
- Configurazione flessibile

<<<<<<< HEAD
>>>>>>> 3268b83 (.)
=======

---

>>>>>>> 355a587 (.)
## Proprietà

```php
public string $title = '';        // Titolo del widget
public string $icon = '';         // Icona del widget
protected int|string|array $columnSpan = 'full';  // Larghezza del widget
```

## Traits Integrati

<<<<<<< HEAD
<<<<<<< HEAD
=======

### Versione HEAD

>>>>>>> 355a587 (.)
- `\Filament\Widgets\Concerns\InteractsWithPageFilters`: Gestione dei filtri di pagina
- `\Filament\Forms\Concerns\InteractsWithForms`: Interazione con i form

> **IMPORTANTE**: Utilizzare sempre il namespace completo per i traits, incluso il namespace `\Filament\` iniziale
<<<<<<< HEAD
=======
=======

### Versione Alternativa

>>>>>>> 355a587 (.)
- `InteractsWithPageFilters`: Gestione dei filtri di pagina
- `InteractsWithForms`: Interazione con i form
>>>>>>> 3268b83 (.)

---


## Form Schema

Ogni widget deve implementare il proprio schema di form:

```php
abstract public function getFormSchema(): array;

final public function form(Form $form): Form
{
    return $form
        ->schema($this->getFormSchema())
        ->columns(2)
        ->statePath('data');
}
```

## Best Practices

1. **Estensione della Classe**
   ```php
<<<<<<< HEAD
<<<<<<< HEAD
=======

### Versione HEAD

>>>>>>> 355a587 (.)
   namespace Modules\User\Filament\Widgets;
   
   use Modules\Xot\Filament\Widgets\XotBaseWidget;

   class RegistrationWidget extends XotBaseWidget
   {
       protected int | string | array $columnSpan = 'full';
       public string $type;
       public string $resource;
       protected static string $view = 'pub_theme::filament.widgets.registration';

       public function mount(string $type): void
       {
           $this->type = $type;
           $this->resource = 'Modules\\' . ucfirst($type) . '\\Models\\User';
       }

       public function getFormSchema(): array
       {
           return $this->resource::getFormSchemaWidget();
<<<<<<< HEAD
=======
=======

### Versione Alternativa

>>>>>>> 355a587 (.)
   use Modules\Xot\Filament\Widgets\XotBaseWidget;

   class YourWidget extends XotBaseWidget
   {
       public function getFormSchema(): array
       {
           return [
               // Definisci lo schema del form
           ];
<<<<<<< HEAD
>>>>>>> 3268b83 (.)
=======

---

>>>>>>> 355a587 (.)
       }
   }
   ```

<<<<<<< HEAD
<<<<<<< HEAD
=======

### Versione HEAD

>>>>>>> 355a587 (.)
2. **Mai Usare `->label()` nei Componenti Filament**
   - Le etichette sono gestite automaticamente dal LangServiceProvider
   - Utilizzare la struttura espansa per i campi nei file di traduzione
   - Seguire la convenzione di naming per le chiavi di traduzione: `modulo::risorsa.fields.campo.label`

3. **Struttura Corretta per getFormSchema()**
   ```php
   public function getFormSchema(): array
   {
       return [
           'title' => Forms\Components\TextInput::make('title'),
           'content' => Forms\Components\RichEditor::make('content'),
       ];
   }
   ```

4. **Gestione delle Viste**
<<<<<<< HEAD
=======
2. **Gestione delle Viste**
>>>>>>> 3268b83 (.)
=======

### Versione Alternativa

2. **Gestione delle Viste**

---

>>>>>>> 355a587 (.)
   - Le viste vengono risolte automaticamente
   - Utilizzare il namespace del modulo per le viste
   - Seguire le convenzioni di naming

<<<<<<< HEAD
<<<<<<< HEAD
5. **Configurazione**
=======
3. **Configurazione**
>>>>>>> 3268b83 (.)
=======

### Versione HEAD

5. **Configurazione**

### Versione Alternativa

3. **Configurazione**

---

>>>>>>> 355a587 (.)
   - Personalizzare titolo e icona
   - Definire la larghezza appropriata
   - Implementare azioni di salvataggio quando necessario

<<<<<<< HEAD
<<<<<<< HEAD
6. **Filtri**
=======
4. **Filtri**
>>>>>>> 3268b83 (.)
=======

### Versione HEAD

6. **Filtri**

### Versione Alternativa

4. **Filtri**

---

>>>>>>> 355a587 (.)
   - Utilizzare i metodi di `InteractsWithPageFilters`
   - Gestire gli aggiornamenti dei filtri
   - Mantenere la coerenza nella struttura

## Dipendenze

- Filament Widgets
- Filament Forms
- Modules Xot

## Eventi

```php
public array $listener = [
    'filters-updated' => 'filtersUpdated',
];
```

## Note di Sviluppo

- La classe è astratta e deve essere estesa
- Le viste vengono risolte automaticamente tramite `GetViewByClassAction`
- Supporta la personalizzazione completa del form
- Integra gestione cache per ottimizzazione

<<<<<<< HEAD
<<<<<<< HEAD
=======

### Versione HEAD

>>>>>>> 355a587 (.)
## Integrazione con CanPoll

Per implementare il polling automatico nei widget Filament, utilizzare il trait `CanPoll`:

```php
use Filament\Widgets\Concerns\CanPoll;

class DashboardStatsWidget extends XotBaseWidget
{
    use CanPoll;
    
    // Personalizzare l'intervallo di polling (default: 5s)
    protected static ?string $pollingInterval = '10s';
    
    protected function getPollingInterval(): ?string
    {
        return static::$pollingInterval;
    }
}
```

Questo trait permette al widget di aggiornarsi automaticamente a intervalli regolari senza richiedere l'intervento dell'utente.

## Collegamenti Bidirezionali

- [README.md](../../README.md) - Indice principale della documentazione
- [DIRECTORY-CASE-SENSITIVITY.md](../../DIRECTORY-CASE-SENSITIVITY.md) - Regole per la case sensitivity delle directory
- [NAMESPACE-RULES.md](../../NAMESPACE-RULES.md) - Regole per i namespace nei moduli
- [FOLIO_VOLT_FILAMENT_INTEGRATION.md](../../FOLIO_VOLT_FILAMENT_INTEGRATION.md) - Integrazione Folio, Volt e Filament
- [MODULE_STRUCTURE.md](../../MODULE_STRUCTURE.md) - Struttura standard dei moduli
- [Documentazione Filament](https://filamentphp.com/docs/3.x/widgets/installation) 
<<<<<<< HEAD
=======
=======

### Versione Alternativa

>>>>>>> 355a587 (.)
## Link Correlati

- [Documentazione Filament](../../../docs/filament/index.md)
- [Gestione Widget](../../../docs/filament/widgets.md)
- [Form Schema](../../../docs/filament/forms.md) 
<<<<<<< HEAD
>>>>>>> 3268b83 (.)
=======

---

>>>>>>> 355a587 (.)
