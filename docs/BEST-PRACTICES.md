# Best Practices per Laraxot

## Riferimenti al modello User

Una pratica fondamentale in Laraxot è **non fare mai riferimento diretto** alla classe specifica di implementazione dell'utente (`\Modules\User\Models\User`), poiché il modello utente effettivamente utilizzato viene configurato nei file di configurazione del sistema.

### ❌ Pratica scorretta

```php
/**
 * @var \Modules\User\Models\User $user
 */
public function handle($user) {
    // Codice che usa $user
}
```

### ✓ Pratica corretta

```php
use Modules\Xot\Contracts\UserContract;

/**
 * @var UserContract $user
 */
public function handle($user) {
    // Codice che usa $user
}
```

### Motivi per utilizzare UserContract

1. **Configurabilità**: Il modello User effettivo può cambiare in base alla configurazione.
2. **Disaccoppiamento**: Riduce le dipendenze verso implementazioni specifiche.
3. **Testabilità**: Facilita il testing con implementazioni mock dell'interfaccia.
4. **Flessibilità**: Consente di estendere o cambiare l'implementazione senza impattare il codice esistente.

### Come ottenere la classe User corretta

Se è necessario ottenere programmaticamente la classe User configurata:

```php
use Modules\Xot\Datas\XotData;

// Ottenere la classe User configurata
$userClass = XotData::make()->getUserClass();

// Creare un'istanza
$user = new $userClass();
```

### Tipizzazione nei parametri di metodo

Quando si tipizzano i parametri di un metodo:

```php
use Modules\Xot\Contracts\UserContract;

// Corretto
public function process(UserContract $user) {
    // Codice
}

// Errato
public function process(\Modules\User\Models\User $user) {
    // Codice
}
<<<<<<< HEAD
``` 
=======
<<<<<<< HEAD
```

# Best Practices per il Modulo Xot

## Gestione del Codice

### 1. Evitare la Duplicazione del Codice
- Identificare e rimuovere il codice duplicato
- Utilizzare funzioni helper o metodi di utilità per il codice comune
- Mantenere il codice DRY (Don't Repeat Yourself)

### 2. Gestione delle Eccezioni
```php
// ❌ SBAGLIATO: Duplicazione delle verifiche
if (! $this->isValidConnection($connectionName)) {
    throw new \InvalidArgumentException('...');
}
if (! $this->isValidConnection($connectionName)) {
    throw new \InvalidArgumentException('...');
}

// ✅ CORRETTO: Verifica singola
if (! $this->isValidConnection($connectionName)) {
    throw new \InvalidArgumentException(sprintf('Invalid database connection: %s', $connectionName));
}
```

### 3. Type Safety
- Utilizzare strict_types=1
- Definire tipi di ritorno espliciti
- Utilizzare type hints per i parametri
- Documentare i tipi generici con PHPDoc

```php
// ❌ SBAGLIATO: Tipi non specificati
function getItems($data) {
    return $data;
}

// ✅ CORRETTO: Tipi espliciti e documentazione
/**
 * @param array<string, mixed> $data
 * @return array<string, string>
 */
function getItems(array $data): array {
    return array_map('strval', $data);
}
```

### 4. Formattazione del Codice
- Mantenere uno stile coerente
- Utilizzare indentazione appropriata
- Bilanciare le parentesi graffe
- Seguire PSR-12

### 5. Documentazione
- Documentare tutti i metodi pubblici
- Specificare i tipi nei blocchi PHPDoc
- Includere esempi di utilizzo
- Mantenere la documentazione aggiornata

### 6. Testing
- Scrivere test per ogni nuova funzionalità
- Mantenere una copertura dei test adeguata
- Testare i casi limite
- Documentare i casi di test

## Filament Components

### 1. Visibilità dei Metodi
- Rispettare la visibilità dei metodi della classe padre
- Non ridurre la visibilità nelle classi figlie
- Documentare le modifiche alla visibilità

### 2. Gestione delle Traduzioni
- Utilizzare il sistema di traduzioni di Laravel
- Mantenere le traduzioni organizzate per modulo
- Utilizzare chiavi di traduzione descrittive

## Collegamenti
- [PHP Strict Types](PHP-STRICT-TYPES.md)
- [Filament Best Practices](filament/FILAMENT-BEST-PRACTICES.md)
- [Testing Guidelines](testing/TESTING-GUIDELINES.md) 
=======
``` 
>>>>>>> origin/dev
>>>>>>> 3268b83 (.)
