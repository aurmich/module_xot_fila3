# Pattern di Estensione Filament

## Panoramica

Questo documento definisce il pattern obbligatorio per l'estensione delle classi Filament nel progetto. **NON** estendiamo mai classi Filament direttamente, ma utilizziamo sempre le classi base personalizzate XotBase* o LangBase*.

## Regole Fondamentali

### 1. Estensione delle Risorse

```php
// ❌ ERRATO - Estensione diretta
use Filament\Resources\Resource;
class MyResource extends Resource {}

// ✅ CORRETTO - Estensione tramite XotBase
use Modules\Xot\Filament\Resources\XotBaseResource;
class MyResource extends XotBaseResource {}
```

### 2. Estensione delle Pagine

#### **REGOLA CRITICA: Trait Translatable**

**Se una classe usa il trait `Translatable`, NON estendere `XotBase*` ma `LangBase*`:**

```php
// ❌ ERRATO - XotBase con Translatable
use Modules\Xot\Filament\Resources\Pages\XotBaseCreateRecord;
class CreateMyRecord extends XotBaseCreateRecord {
    use CreateRecord\Concerns\Translatable; // ❌ ERRORE!
}

// ✅ CORRETTO - LangBase per Translatable
use Modules\Lang\Filament\Resources\Pages\LangBaseCreateRecord;
class CreateMyRecord extends LangBaseCreateRecord {
    // Il trait Translatable è già incluso in LangBaseCreateRecord
}
```

#### CreateRecord
```php
// ❌ ERRATO
use Filament\Resources\Pages\CreateRecord;
class CreateMyRecord extends CreateRecord {}

// ✅ CORRETTO - Senza traduzioni
use Modules\Xot\Filament\Resources\Pages\XotBaseCreateRecord;
class CreateMyRecord extends XotBaseCreateRecord {}

// ✅ CORRETTO - Con traduzioni
use Modules\Lang\Filament\Resources\Pages\LangBaseCreateRecord;
class CreateMyRecord extends LangBaseCreateRecord {}
```

#### EditRecord
```php
// ❌ ERRATO
use Filament\Resources\Pages\EditRecord;
class EditMyRecord extends EditRecord {}

// ✅ CORRETTO - Senza traduzioni
use Modules\Xot\Filament\Resources\Pages\XotBaseEditRecord;
class EditMyRecord extends XotBaseEditRecord {}

// ✅ CORRETTO - Con traduzioni
use Modules\Lang\Filament\Resources\Pages\LangBaseEditRecord;
class EditMyRecord extends LangBaseEditRecord {}
```

#### ViewRecord
```php
// ❌ ERRATO
use Filament\Resources\Pages\ViewRecord;
class ViewMyRecord extends ViewRecord {}

// ✅ CORRETTO - Senza traduzioni
use Modules\Xot\Filament\Resources\Pages\XotBaseViewRecord;
class ViewMyRecord extends XotBaseViewRecord {}

// ✅ CORRETTO - Con traduzioni
use Modules\Lang\Filament\Resources\Pages\LangBaseViewRecord;
class ViewMyRecord extends LangBaseViewRecord {}
```

#### ListRecords
```php
// ❌ ERRATO
use Filament\Resources\Pages\ListRecords;
class ListMyRecords extends ListRecords {}

// ✅ CORRETTO - Senza traduzioni
use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;
class ListMyRecords extends XotBaseListRecords {}

// ✅ CORRETTO - Con traduzioni
use Modules\Lang\Filament\Resources\Pages\LangBaseListRecords;
class ListMyRecords extends LangBaseListRecords {}
```

### 3. Estensione delle Risorse con Traduzioni

```php
// ❌ ERRATO
use Filament\Resources\Resource;
use Filament\Resources\Concerns\Translatable;
class MyResource extends Resource {
    use Translatable;
}

// ✅ CORRETTO
use Modules\Lang\Filament\Resources\LangBaseResource;
class MyResource extends LangBaseResource {
    // Il trait Translatable è già incluso in LangBaseResource
}
```

### 4. Namespace Corretto

```php
// ✅ CORRETTO
namespace Modules\Blog\Filament\Resources\ArticleResource\Pages;

// ❌ ERRATO
namespace Modules\Blog\App\Filament\Resources\ArticleResource\Pages;
```

### 5. Array Associativi Obbligatori

```php
// ✅ CORRETTO
protected function getFormSchema(): array
{
    return [
        'title' => TextInput::make('title'),
        'content' => Textarea::make('content'),
    ];
}

// ❌ ERRATO
protected function getFormSchema(): array
{
    return [
        TextInput::make('title'),
        Textarea::make('content'),
    ];
}
```

## Controllo Rapido HasTranslations

**Prima di creare/modificare una pagina Filament:**

1. Apri il modello corrispondente (es. `Article.php`, `Category.php`)
2. Cerca `use Spatie\Translatable\HasTranslations`
3. **Se presente** → usa `LangBase*` nelle pagine Filament
4. **Se assente** → usa `XotBase*` nelle pagine Filament

### Esempi Pratici

**Modello Article (Blog):**
```php
// File: Modules/Blog/app/Models/Article.php
class Article extends BaseModel {
    use HasTranslations;  // ← PRESENTE
    // ...
}

// Quindi nelle pagine Filament:
class CreateArticle extends LangBaseCreateRecord {}  // ✅
class EditArticle extends LangBaseEditRecord {}      // ✅
class ViewArticle extends LangBaseViewRecord {}      // ✅
```

**Modello Rating (Rating):**
```php
// File: Modules/Rating/app/Models/Rating.php
class Rating extends BaseModel {
    // NO HasTranslations
}

// Quindi nelle pagine Filament:
class CreateRating extends XotBaseCreateRecord {}    // ✅
class EditRating extends XotBaseEditRecord {}        // ✅
```

## Classi Base Disponibili

### Modulo Xot (Base)
- `XotBaseResource` - Risorsa base senza traduzioni
- `XotBaseCreateRecord` - Creazione senza traduzioni
- `XotBaseEditRecord` - Modifica senza traduzioni
- `XotBaseViewRecord` - Visualizzazione senza traduzioni
- `XotBaseListRecords` - Lista senza traduzioni

### Modulo Lang (Con Traduzioni)
- `LangBaseResource` - Risorsa base con traduzioni
- `LangBaseCreateRecord` - Creazione con traduzioni
- `LangBaseEditRecord` - Modifica con traduzioni
- `LangBaseViewRecord` - Visualizzazione con traduzioni
- `LangBaseListRecords` - Lista con traduzioni

## Filosofia

Questo pattern segue i principi:
- **DRY (Don't Repeat Yourself)**: Centralizzazione della logica comune
- **KISS (Keep It Simple, Stupid)**: Semplicità nell'estensione
- **Composizione over Inheritance**: Utilizzo di trait e classi base
- **Zen**: Armonia tra funzionalità e manutenibilità

## Correzioni Automatiche

Per correggere automaticamente le estensioni dirette:

1. Identificare classi con trait `Translatable`
2. Sostituire estensioni dirette con `LangBase*`
3. Rimuovere trait `Translatable` (già incluso)
4. Aggiornare namespace se necessario
5. Verificare metodi non consentiti

## Vantaggi del Pattern

1. **Centralizzazione**: Configurazioni comuni gestite nella classe base
2. **Manutenibilità**: Aggiornamenti centralizzati
3. **Coerenza**: Comportamento uniforme in tutta l'applicazione
4. **Localizzazione**: Gestione automatica delle traduzioni
5. **Prestazioni**: Riduzione della duplicazione di codice

## Controllo Qualità

Prima di ogni commit, verificare:

- [ ] Nessuna estensione diretta di classi Filament
- [ ] Utilizzo delle classi XotBase* appropriate
- [ ] Namespace corretto `Modules\<ModuleName>\Filament\...`
- [ ] Nessuna proprietà/metodo non consentito dichiarato
- [ ] Nessun uso di `->label()` direttamente
- [ ] Metodi condizionali non dichiarati se vuoti/standard

## Link Correlati

- [🚨 REGOLA FONDAMENTALE: HasTranslations](hastranslations_rule.md)
- [XotBaseResource](xotbaseresource.md)
- [Regole Risorse Filament](filament_resource_rules.md)
- [Namespace Conventions](namespace_conventions.md)
- [Best Practices Filament](filament_best_practices.md)
