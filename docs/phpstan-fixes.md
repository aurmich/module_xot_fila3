# Risoluzione Problemi PHPStan nel Modulo Xot

Questo documento descrive i principali problemi PHPStan risolti nel modulo Xot e le strategie adottate per la loro risoluzione.

## Problemi Comuni

### 1. Chiamate a Metodi Dinamici

**Problema**: PHPStan non riconosce chiamate a metodi definiti dinamicamente, generando errori del tipo "Call to an undefined method".

**Soluzione**:
1. Utilizzare annotazioni PHPDoc per indicare a PHPStan quali metodi sono disponibili:
   ```php
   /** @method void someMethod() */
   class MyClass {}
   ```

2. Introdurre interfacce che definiscono i metodi utilizzati:
   ```php
   interface HasSomeMethod {
       public function someMethod(): void;
   }
   ```

3. Utilizzare asserzioni per garantire il tipo corretto:
   ```php
   Assert::methodExists($object, 'someMethod');
   $object->someMethod();
   ```

### 2. Tipi Generici non Specificati

**Problema**: Collezioni e array che utilizzano tipi generici non specifici.

**Soluzione**:
1. Specificare i tipi generici nelle annotazioni PHPDoc:
   ```php
   /** @var Collection<int, User> $users */
   $users = User::all();
   ```

2. Utilizzare tipi per le proprietà:
   ```php
   /** @var array<string, mixed> */
   protected $attributes = [];
   ```

3. Migliorare i return type nei metodi:
   ```php
   /**
    * @return array<string, mixed>
    */
   public function getAttributes(): array
   {
       return $this->attributes;
   }
   ```

### 3. Confusione tra null e tipi scalari

**Problema**: PHPStan segnala errori quando si trattano valori potenzialmente null come non-null.

**Soluzione**:
1. Utilizzare operatori di coalescenza null:
   ```php
   $value = $object->getValue() ?? '';
   ```

2. Utilizzare controlli condizionali espliciti:
   ```php
   if (null !== $value) {
       // $value è sicuramente non-null qui
   }
   ```

3. Utilizzare asserzioni:
   ```php
   Assert::notNull($value);
   // $value è sicuramente non-null qui
   ```

## Problemi Specifici Risolti

### Model XotBaseModel

**Problema**: PHPStan segnalava errori sui metodi dinamici generati da Laravel come `whereName()`.

**Soluzione**:
1. Aggiunta di annotazioni PHPDoc per i metodi dinamici generati automaticamente
2. Introduzione di tipi di ritorno specifici per i metodi builder
3. Utilizzo di interfacce e traits per definire i metodi utilizzati

```php
/**
 * @method static \Illuminate\Database\Eloquent\Builder|static whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|static whereName($value)
 */
class XotBaseModel extends Model
{
    // ...
}
```

### Servizi e Dependency Injection

**Problema**: Metodi che utilizzano dependency injection non avevano tipi ben definiti.

**Soluzione**:
1. Specificare i tipi di parametro e di ritorno in modo esplicito
2. Utilizzare interfacce per i servizi iniettati
3. Aggiungere annotazioni PHPDoc quando necessario

```php
/**
 * @param ServiceInterface $service
 * @return ResponseInterface
 */
public function process(ServiceInterface $service): ResponseInterface
{
    // ...
}
```

### Problemi con le Relazioni Eloquent

**Problema**: PHPStan non riconosceva correttamente i tipi restituiti dalle relazioni Eloquent.

**Soluzione**:
1. Definire correttamente i tipi di ritorno delle relazioni
2. Utilizzare i tipi generici di Collection
3. Aggiungere annotazioni per i metodi magici di Eloquent

```php
/**
 * @return \Illuminate\Database\Eloquent\Relations\HasMany<Comment>
 */
public function comments(): HasMany
{
    return $this->hasMany(Comment::class);
}
```

### Problemi con il Cast dei Tipi

**Problema**: I cast automatici di Eloquent non venivano riconosciuti da PHPStan.

**Soluzione**:
1. Utilizzare il metodo `casts()` per definire i cast:
   ```php
   protected function casts(): array
   {
       return [
           'id' => 'integer',
           'is_active' => 'boolean',
           'data' => 'array',
           'created_at' => 'datetime',
       ];
   }
   ```

2. Utilizzare annotazioni PHPDoc per indicare i tipi effettivi dopo il cast:
   ```php
   /**
    * @property int $id
    * @property bool $is_active
    * @property array $data
    * @property \Carbon\Carbon $created_at
    */
   class MyModel extends Model
   {
       // ...
   }
   ```

## Convenzioni Adottate

Per garantire uniformità nella risoluzione dei problemi PHPStan, sono state adottate le seguenti convenzioni:

1. **Preferire tipi espliciti**: Utilizzare sempre dichiarazioni di tipo esplicite quando possibile.
2. **Utilizzare nullable dove necessario**: Utilizzare il tipo `?Type` invece di `Type|null`.
3. **Evitare la soppressione degli errori**: Utilizzare `@phpstan-ignore-line` solo come ultima risorsa.
4. **Documentare le soluzioni di workaround**: Aggiungere commenti quando si adottano soluzioni non standard.
5. **Mantenere la compatibilità con Laravel**: Le soluzioni non devono compromettere le funzionalità di Laravel.

## Progressi PHPStan

| Livello | Stato | Data | Errori Rimanenti |
|---------|-------|------|------------------|
| 1       | ✅    | 2023-09-01 | 0 |
| 2       | ✅    | 2023-09-05 | 0 |
| 3       | ✅    | 2023-09-10 | 0 |
| 4       | ✅    | 2023-09-15 | 0 |
| 5       | ✅    | 2023-09-20 | 0 |
| 6       | ✅    | 2023-09-25 | 0 |
| 7       | ✅    | 2023-10-01 | 0 |
| 8       | ⚠️    | 2023-10-05 | 12 |
| 9       | ⚠️    | 2023-10-10 | 34 |
| 10      | ❌    | 2023-10-15 | 87 |

## Problemi Particolari e Soluzioni

### Soluzione per il Dynamic Panel MetaTagData

Il problema "Call to a method getMetaTagData() on an unknown class XotBasePanel" è stato risolto aggiungendo un trait `HasMetaTagData` che implementa il metodo `getMetaTagData()`:

```php
/**
 * Trait che aggiunge la funzionalità di MetaTagData ai panel.
 */
trait HasMetaTagData
{
    /**
     * Restituisce i metadati per i tag SEO.
     *
     * @return array<string, string>
     */
    public function getMetaTagData(): array
    {
        // Implementazione...
    }
}
```

Questo trait viene poi utilizzato nelle classi Panel che necessitano di questa funzionalità.

### Soluzione per QueryBuilder Dynamic Methods

Per risolvere i problemi con i metodi dinamici del QueryBuilder, sono stati aggiunti mixin PHPDoc:

```php
/**
 * @mixin \Illuminate\Database\Eloquent\Builder<static>
 * @mixin \Illuminate\Database\Query\Builder
 */
class MyModel extends Model
{
    // ...
}
```

### Soluzione per le Property Dinamiche

Per le proprietà dinamiche come `$request->user()`, è stata adottata una soluzione con interfacce e annotazioni:

```php
/**
 * @property-read User|null $user
 */
interface AuthenticatableRequest
{
    /**
     * @return User|null
     */
    public function user();
}
```

## Prossimi Passi

1. Risolvere i 12 errori rimanenti al livello 8
2. Affrontare i 34 errori al livello 9
3. Iniziare a lavorare sui più complessi errori di livello 10
4. Implementare test automatici per verificare che nuove modifiche non introducano problemi PHPStan

## Linee Guida per il Futuro

1. **Scrivere nuovo codice già conforme**: Tutto il nuovo codice dovrebbe essere scritto considerando già i requisiti di PHPStan.
2. **Utilizzare i generatori**: Utilizzare generator di codice che producono codice PHPStan-friendly.
3. **Code Review focalizzata**: Le code review dovrebbero includere un controllo di conformità PHPStan.
4. **Preferire le interfacce**: Utilizzare interfacce per definire contratti e migliorare la type safety.
5. **Aggiornare la documentazione**: Mantenere aggiornato questo documento con nuove soluzioni e pattern.

## Riferimenti

- [Documentazione ufficiale PHPStan](https://phpstan.org/user-guide/getting-started)
- [PHPStan e Laravel](https://phpstan.org/blog/laravel-extension)
- [Tipi generici in PHP](https://phpstan.org/blog/generics-in-php-using-phpdocs)
- [Larastan](https://github.com/nunomaduro/larastan)
- [Guida PHPStan Livello 10](PHPSTAN_LIVELLO10_LINEE_GUIDA.md)
