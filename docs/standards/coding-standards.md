# Standard di Codice per il progetto

> **Nota**: Questo documento è correlato a [Convenzioni](../../../docs/conventions.md) e [Naming Conventions](../../../docs/naming-conventions.md). Per una panoramica completa, consulta tutti i documenti correlati.

Questo documento contiene gli standard di codice specifici per il progetto il progetto. Per le linee guida generali sulla scrittura del codice, consultare la [documentazione del modulo Xot](../CODE-STANDARDS.md).

## Principi Fondamentali in il progetto

Oltre ai principi generali documentati nel modulo Xot, in il progetto aderiamo ai seguenti principi:

1. **Coerenza con l'Architettura Modulare**: Ogni modulo deve seguire la struttura e i pattern definiti
2. **Documentazione Bilingue**: I commenti e la documentazione devono essere in italiano, con terminologia tecnica in inglese
3. **Sicurezza dei Dati Sanitari**: Implementare sempre misure di sicurezza avanzate per la protezione dei dati sensibili

## Regole Specifiche per il progetto

### Moduli Custom

il progetto utilizza diversi moduli personalizzati che richiedono specifiche implementazioni:

1. **Modulo Patient**: 
   - Implementare sempre la validazione ISEE
   - Utilizzare lo stato di gravidanza come flag per i trattamenti disponibili

2. **Modulo Dental**:
   - Le prenotazioni devono sempre essere collegate a un paziente registrato
   - Ogni visita deve avere uno stato tracciabile

3. **Modulo User**:
   - Implementare sempre il controllo multi-ruolo
   - Utilizzare i permessi granulari per l'accesso alle funzionalità

### Filament nel Contesto di il progetto

Nel pannello di amministrazione di il progetto:

1. Le risorse devono essere organizzate in navigazione gerarchica
2. I form devono implementare sempre controlli di autorizzazione basati su ruoli
3. Le azioni di massa devono essere limitate agli utenti amministratori

### Internazionalizzazione

il progetto richiede supporto multilingua per:

1. Interfaccia utente (IT primario, EN secondario)
2. Contenuti informativi per i pazienti
3. Notifiche e comunicazioni

## Migrazione dal Vecchio Sistema

Quando si integra codice dal vecchio sistema, è necessario:

1. Riscrivere completamente utilizzando tipizzazione stretta
2. Documentare l'origine e le modifiche apportate
3. Testare approfonditamente l'integrazione con i moduli esistenti

## Configurazioni Specifiche

il progetto utilizza le seguenti configurazioni personalizzate:

1. File di configurazione per regioni e provincie italiane
2. Configurazioni per integrazione con servizi sanitari nazionali
3. Mappatura codici per prestazioni odontoiatriche

## Audit e Logging

Ogni modifica ai dati sensibili deve essere:

1. Registrata con timestamp e utente che ha effettuato la modifica
2. Accessibile tramite interfaccia di audit per gli amministratori
3. Conservata secondo le normative sulla privacy e gestione dati sanitari

## Principi Fondamentali

Il codice del progetto il progetto **deve** aderire ai seguenti principi fondamentali:

1. **Robustezza**: Il codice deve funzionare correttamente anche in condizioni impreviste o avverse
2. **Solidità**: La struttura deve essere manutenibile, scalabile e testabile
3. **Tipizzazione Stretta**: Ogni variabile, parametro e valore di ritorno deve essere esplicitamente tipizzato

Questi principi sono **non negoziabili** e costituiscono la base per uno sviluppo di qualità.

## Tipizzazione Stretta (Strict Typing)

### Configurazione PHP

Tutti i file PHP **devono** iniziare con la dichiarazione di strict types:

```php
<?php

declare(strict_types=1);

namespace Modules\Patient\app\Models;
```

### Tipizzazione Esplicita

Ogni metodo e funzione **deve** dichiarare:
- Il tipo di ogni parametro
- Il tipo di ritorno, incluso `void` quando non restituisce valori
- Tipizzazioni nullable quando appropriato (`?string`)
- Tipizzazioni di unione quando strettamente necessario (`string|int`)

**Esempi corretti:**

```php
public function getPatientById(int $id): ?Patient
{
    return $this->repository->find($id);
}

public function calculateAge(DateTimeInterface $birthDate): int
{
    return $birthDate->diff(new DateTime())->y;
}

public function processData(array $data): void
{
    // Elaborazione senza valore di ritorno
}
```

**Esempi errati (da evitare):**

```php
// ❌ NO: Mancanza di tipizzazione
public function getPatient($id)
{
    return $this->repository->find($id);
}

// ❌ NO: Tipizzazione incompleta
public function savePatient(Patient $patient)
{
    $this->repository->save($patient);
}
```

### Utilizzo di Types e Enums

- Utilizzare **enum** PHP 8.1+ per tutti i valori che rappresentano un insieme limitato di opzioni
- Utilizzare **typed properties** per tutte le proprietà delle classi
- Utilizzare **value objects** per rappresentare concetti di dominio complessi

**Esempio di Enum:**

```php
enum GenderType: string
{
    case FEMALE = 'F';
    case MALE = 'M';
    case OTHER = 'O';
    
    public function label(): string
    {
        return match($this) {
            self::FEMALE => 'Femminile',
            self::MALE => 'Maschile',
            self::OTHER => 'Altro',
        };
    }
}

// Utilizzo
public function setGender(GenderType $gender): void
{
    $this->gender = $gender->value;
}
```

**Esempio di Value Object:**

```php
final class TaxCode
{
    private string $value;
    
    public function __construct(string $taxCode)
    {
        if (!$this->isValid($taxCode)) {
            throw new InvalidArgumentException('Codice fiscale non valido');
        }
        
        $this->value = $taxCode;
    }
    
    public function value(): string
    {
        return $this->value;
    }
    
    private function isValid(string $taxCode): bool
    {
        // Validazione del codice fiscale
        return (bool) preg_match('/^[A-Z]{6}[0-9]{2}[A-Z][0-9]{2}[A-Z][0-9]{3}[A-Z]$/', $taxCode);
    }
}
```

## Robustezza del Codice

### Gestione delle Eccezioni

- Utilizzare eccezioni specifiche per ogni tipo di errore
- Documentare tutte le eccezioni che possono essere lanciate da un metodo
- Gestire le eccezioni al livello appropriato dell'applicazione
- Mai nascondere le eccezioni senza una gestione appropriata

```php
/**
 * Trova un paziente per codice fiscale.
 *
 * @param string $taxCode Il codice fiscale del paziente
 * @return Patient Il paziente trovato
 * @throws PatientNotFoundException Se nessun paziente viene trovato con il codice fiscale specificato
 * @throws InvalidTaxCodeException Se il codice fiscale non è valido
 */
public function findByTaxCode(string $taxCode): Patient
{
    if (!TaxCode::isValid($taxCode)) {
        throw new InvalidTaxCodeException($taxCode);
    }
    
    $patient = $this->repository->findByTaxCode($taxCode);
    
    if ($patient === null) {
        throw new PatientNotFoundException("Nessun paziente trovato con codice fiscale: {$taxCode}");
    }
    
    return $patient;
}
```

### Validazione Input

- Validare **sempre** gli input esterni (richieste HTTP, dati importati, ecc.)
- Utilizzare form request per la validazione nelle richieste HTTP
- Applicare validazione approfondita anche per i dati provenienti dal database

```php
namespace Modules\Patient\app\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Modules\Patient\app\Enums\GenderType;

class StorePatientRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'tax_code' => ['required', 'string', 'size:16', 'unique:patients,tax_code'],
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'birth_date' => ['required', 'date', 'before:today'],
            'gender' => ['required', 'string', 'in:' . implode(',', array_column(GenderType::cases(), 'value'))],
            'email' => ['required', 'email', 'unique:patients,email'],
            'phone' => ['required', 'string', 'max:20'],
            'address' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'province' => ['required', 'string', 'size:2'],
            'postal_code' => ['required', 'string', 'size:5'],
            'isee' => ['required', 'numeric', 'min:0'],
            'is_pregnant' => ['boolean'],
        ];
    }
}
```

## Collegamenti Correlati

- [Convenzioni](../../../docs/conventions.md)
- [Naming Conventions](../../../docs/naming-conventions.md)
- [Documentazione Xot](../CODE-STANDARDS.md)
- [Collegamenti Documentazione](../../../../docs/collegamenti-documentazione.md)

