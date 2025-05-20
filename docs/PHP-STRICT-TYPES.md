<<<<<<< HEAD
# PHP Strict Types in Laravel Modules

## Overview
Questo documento fornisce le linee guida per l'uso di strict typing in PHP all'interno dei moduli Laravel, garantendo type safety e riducendo errori a runtime.

## Regola Fondamentale
- Tutti i file PHP DEVONO includere `declare(strict_types=1);` subito dopo il tag di apertura `<?php`.
- La dichiarazione va sempre in prima riga, prima di qualsiasi altro codice o commento.

## Vantaggi
1. **Type Safety**: Forza il controllo rigoroso dei tipi su parametri e valori di ritorno.
2. **Prevenzione Errori**: Aiuta a catturare errori di tipo in fase di sviluppo.
3. **Codice Più Pulito**: Rende esplicite le intenzioni sui tipi di dati attesi.
4. **Migliore Integrazione con Tools**: Facilita l'analisi statica con PHPStan.
=======
# PHP Strict Types Convention

## Regola Generale

Tutti i file PHP del progetto che contengono logica di business DEVONO iniziare con la dichiarazione `declare(strict_types=1);` subito dopo il tag di apertura PHP.

### File che Richiedono strict_types
- Controllers
- Models
- Actions
- Services
- Traits
- Interfaces
- Tests
- Helpers

### File che NON Richiedono strict_types
- File di vista Blade (.blade.php)
- File di configurazione (config/*.php)
- File di routing (routes/*.php)
- File di traduzione (lang/*.php)

## Formato Corretto

```php
<?php

declare(strict_types=1);

namespace Example;
// ... resto del codice
```

## Motivazione

L'uso di `declare(strict_types=1);` offre diversi vantaggi:

1. **Type Safety**: Forza il type checking rigoroso per:
   - Parametri delle funzioni
   - Valori di ritorno delle funzioni
   - Assegnazioni di proprietà tipizzate

2. **Prevenzione Errori**: Aiuta a catturare errori di tipo in fase di sviluppo invece che in runtime

3. **Codice Più Pulito**: Rende esplicite le intenzioni riguardo ai tipi di dati attesi

4. **Migliore Integrazione con Tools**: Facilita l'analisi statica del codice con strumenti come PHPStan
>>>>>>> a7dd3a3 (.)

## Implementazione
- Tutti i nuovi file PHP devono includere questa dichiarazione.
- I file esistenti vanno aggiornati quando modificati.
- Verifica con:
```bash
find Modules -name "*.php" -type f -exec grep -L "declare(strict_types=1)" {} \;
```

<<<<<<< HEAD
## Esempio
```php
<?php
declare(strict_types=1);

namespace Modules\Xot\Models;

abstract class XotBaseModel extends Model
{
    // ...
}
```

## Collegamenti
- [README.md](./README.md)
- [Code Quality](./CODE_QUALITY.md)
- [PHPStan Implementation Guide](./PHPSTAN-IMPLEMENTATION-GUIDE.md)

---

> Questo file è stato oggetto di risoluzione manuale di conflitti git: mantenuta una sola versione aggiornata e coerente secondo le regole di progetto.
=======
Questo comando mostrerà tutti i file PHP che non hanno la dichiarazione `strict_types`.

## Implementazioni Specifiche nei Moduli

Ogni modulo può avere requisiti specifici per l'implementazione di `strict_types`. Consultare la documentazione specifica dei moduli:

- [Implementazione nel Modulo UI](../../UI/docs/STRICT_TYPES_IMPLEMENTATION.md)

## PHPStan e strict_types

L'utilizzo di `declare(strict_types=1)` è un requisito fondamentale per la compatibilità con PHPStan livello 10. Per ulteriori dettagli, consultare:

- [Linee Guida PHPStan Livello 10](./PHPStan/LEVEL10_LINEE_GUIDA.md)
- [Workflow PHPStan](./PHPSTAN_WORKFLOW.md)
>>>>>>> a7dd3a3 (.)
