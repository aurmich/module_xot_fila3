# Best Practices per Risorse Filament in Laraxot
# Filament Best Practices - Laraxot PTVX

## ERRORE CRITICO IDENTIFICATO E RISOLTO

### ❌ Problema: Campi Inesistenti nelle Risorse Filament
**GRAVISSIMO**: Le risorse Filament stavano usando campi che NON esistono nei modelli corrispondenti.

**Esempi trovati nel modulo Progressioni**:
- `AssenzeResource` usava: `matr`, `cognome`, `nome`, `giorni_assenza` (NON esistenti)
- `ListValutatores` usava: `matr_valutatore`, `cognome_valutatore` (NON esistenti)
- `ListCategoriaPropros` usava: `name`, `descr` (NON esistenti)

### ✅ Soluzione Implementata
1. **Verifica Sistematica**: Controllo di ogni modello e migrazione
2. **Correzione Risorse**: Aggiornamento di tutte le risorse Filament
3. **Documentazione**: Piano di verifica per ogni modulo
4. **Regole Aggiornate**: Nuove regole per prevenire il problema

## Processo di Verifica Campi Modello

### 1. Leggere il Modello
```php
// Controllare l'array $fillable
protected $fillable = ['id', 'name', 'email'];

// Controllare le proprietà PHPDoc
/**
 * @property int $id
 * @property string $name
 * @property string $email
 */
```

### 2. Controllare la Migrazione
```php
// Verificare lo schema della tabella
Schema::create('example_table', function (Blueprint $table) {
    $table->id();
    $table->string('name');
    $table->string('email');
    $table->timestamps();
});
```

### 3. Verificare Form Schema
```php
// ✅ CORRETTO - Solo campi esistenti
public static function getFormSchema(): array
{
    return [
        TextInput::make('id')->disabled(),
        TextInput::make('name')->required(),
        TextInput::make('email')->email(),
    ];
}
```

### 4. Verificare Table Columns
```php
// ✅ CORRETTO - Solo campi esistenti
public function getTableColumns(): array
{
    return [
        'id' => TextColumn::make('id')->sortable(),
        'name' => TextColumn::make('name')->searchable(),
        'email' => TextColumn::make('email')->searchable(),
    ];
}
```

## Regole Fondamentali Aggiornate

### Estensione Classi
- **SEMPRE** estendere `XotBaseResource` invece di `Resource`
- **SEMPRE** estendere `XotBaseListRecords` invece di `ListRecords`
- **MAI** estendere direttamente le classi base di Laravel o Filament

### Metodi Filament
- **USARE** `getFormSchema()` invece di `form()`
- **NON DEFINIRE** il metodo `table()` nelle classi Resource
- **NON USARE** `->label()`, `->placeholder()`, `->helperText()`
- **INCLUDERE** `use Filament\\Forms;` nelle Resource

### Verifica Campi
- **CONTROLLARE** sempre che i campi del form esistano nel modello
- **CONTROLLARE** sempre che le colonne della tabella esistano nel modello
- **VERIFICARE** sia il modello che la migrazione
- **DOCUMENTARE** ogni verifica nel piano del modulo

## Checklist Completa

Prima di considerare completa una risorsa Filament:

- [ ] Estende `XotBaseResource`
- [ ] Usa `getFormSchema()` invece di `form()`
- [ ] Non definisce metodo `table()`
- [ ] Non usa `->label()`, `->placeholder()`, `->helperText()`
- [ ] Include `use Filament\\Forms;`
- [ ] **VERIFICA**: Tutti i campi del form esistono nel modello
- [ ] **VERIFICA**: Tutte le colonne della tabella esistono nel modello
- [ ] **VERIFICA**: Controlla sia il modello che la migrazione
- [ ] **VERIFICA**: Documenta nel piano di verifica del modulo
- [ ] Documentazione aggiornata

## Esempi di Errori Corretti

### ❌ Prima (ERRATO)
```php
// AssenzeResource.php
public static function getFormSchema(): array
{
    return [
        TextInput::make('matr'),           // ❌ NON esiste nel modello
        TextInput::make('cognome'),        // ❌ NON esiste nel modello
        TextInput::make('nome'),           // ❌ NON esiste nel modello
        TextInput::make('giorni_assenza'), // ❌ NON esiste nel modello
    ];
}
```

### ✅ Dopo (CORRETTO)
```php
// AssenzeResource.php
public static function getFormSchema(): array
{
    return [
        TextInput::make('id')->disabled(),
        TextInput::make('tipo')->numeric(),
        TextInput::make('codice')->numeric(),
        TextInput::make('descr')->maxLength(250),
        TextInput::make('anno')->numeric(),
        TextInput::make('umi')->numeric(),
        TextInput::make('dur')->numeric(),
    ];
}
```

## Documentazione Correlata
- [Regole Laraxot](../laravel/Modules/Xot/docs/rules/laraxot-rules.md)
- [Verifica Campi Modello](../laravel/Modules/Xot/docs/memories/model-fields-validation.md)
- [Piano Verifica Progressioni](../laravel/Modules/Progressioni/docs/model-fields-verification-plan.md)
- [Best Practice Filament](../laravel/Modules/Xot/docs/filament_best_practices.md)

2. **SEMPRE** usare il campo corretto basato sul database:
   ```php
   // Per modelli Brain (CORRETTO ✅)
   ->relationship('nazione_nascita', 'nome')
   
   // Per modelli Orisbroker (CORRETTO ✅)
   ->relationship('nazione', 'descrizione')
   ```

3. **CONSIDERARE** l'uso di accessor per uniformare l'interfaccia:
   ```php
   // Nel modello Brain\Models\Nazione
   public function getDescrizioneAttribute(): string
   {
       return $this->nome;
   }
   ```

## Debug e Sviluppo

1. **MAI** lasciare funzioni di debug nel codice di produzione:
   ```php
   // DA RIMUOVERE PRIMA DEL COMMIT ❌
   dddx($record);
   dd($data);
   ```

2. **SEMPRE** verificare le strutture del database prima di implementare relazioni

## Creazione di ClienteFromBrain

1. **ESATTA SEQUENZA** di campi da mantenere:
   - **Dati anagrafici**: titolo_id, nome, cognome, sesso, data_nascita, etc.
   - **Classificazione professionale**: tipologia_cliente_id, stato_id, etc.
   - **Informazioni professionali**: data_iscrizione_albo, is_socio_andi, etc.
   - **Indirizzo e contatti**: via, cap, regione_id, provincia_id, etc.
   - **Dati bancari**: iban, intestatario, banca, filiale
   - **Modalità di ricezione**: Lista di modalità selezionabili

## Collegamenti tra versioni di FILAMENT_BEST_PRACTICES.md
* [FILAMENT_BEST_PRACTICES.md](../../../Xot/docs/filament/FILAMENT_BEST_PRACTICES.md)
* [FILAMENT_BEST_PRACTICES.md](../../../Xot/docs/FILAMENT_BEST_PRACTICES.md)
* [FILAMENT_BEST_PRACTICES.md](../../../User/docs/FILAMENT_BEST_PRACTICES.md)
* [FILAMENT_BEST_PRACTICES.md](../../../Job/docs/FILAMENT_BEST_PRACTICES.md)


## Collegamenti tra versioni di filament_best_practices.md
* [filament_best_practices.md](../../../../../docs/rules/filament_best_practices.md)
* [filament_best_practices.md](../filament_best_practices.md)
* [filament_best_practices.md](../../../User/docs/filament_best_practices.md)
* [filament_best_practices.md](../../../Job/docs/filament_best_practices.md)
# Filament Best Practices

## Visibilità dei Metodi

### Principio di Liskov
Quando si estendono le classi base di Filament o XotBase, è fondamentale rispettare il principio di sostituzione di Liskov. Questo significa che:
- La visibilità dei metodi non può essere ridotta nelle classi figlie
- I tipi di ritorno devono essere compatibili
- I parametri devono essere compatibili

### Metodi Comuni e loro Visibilità
| Metodo | Classe Base | Visibilità Richiesta |
|--------|-------------|---------------------|
| getTableActions() | XotBaseListRecords | public |
| getFormSchema() | XotBaseCreateRecord | public |
| getFormSchema() | XotBaseEditRecord | public |
| getHeaderActions() | XotBaseListRecords | public |
| getTableColumns() | XotBaseListRecords | public |

### Esempi di Implementazione Corretta

```php
class ListPosts extends XotBaseListRecords
{
    public function getTableActions(): array
    {
        return [
            // Le tue azioni personalizzate
        ];
    }

    public function getTableColumns(): array
    {
        return [
            // Le tue colonne personalizzate
        ];
    }
}
```

### Errori Comuni da Evitare

1. Riduzione della Visibilità
```php
// ❌ SBAGLIATO: Riduzione della visibilità
protected function getTableActions(): array

// ✅ CORRETTO: Mantenimento della visibilità
public function getTableActions(): array
```

2. Tipo di Ritorno Incompatibile
```php
// ❌ SBAGLIATO: Tipo di ritorno incompatibile
public function getTableActions(): Collection

// ✅ CORRETTO: Tipo di ritorno compatibile
public function getTableActions(): array
```

## Collegamenti
- [Documentazione Filament Ufficiale](https://filamentphp.com/)
- [Principio di Sostituzione di Liskov](https://it.wikipedia.org/wiki/Principio_di_sostituzione_di_Liskov)
- [Best Practices PHP](../php-strict-types.md) 
- [Best Practices PHP](../PHP-STRICT-TYPES.md) 
## Note Importanti
- **CRITICO**: Verificare sempre la corrispondenza tra modello, migrazione e risorsa Filament
- **DOCUMENTARE**: Ogni verifica deve essere documentata nel piano del modulo
- **PREVENIRE**: Implementare controlli automatici per evitare regressioni
- **TESTARE**: Verificare che le risorse funzionino correttamente dopo le correzioni

*Ultimo aggiornamento: Giugno 2025* 
