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

## Implementazione
- Tutti i nuovi file PHP devono includere questa dichiarazione.
- I file esistenti vanno aggiornati quando modificati.
- Verifica con:
```bash
find Modules -name "*.php" -type f -exec grep -L "declare(strict_types=1)" {} \;
```

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
