https://fly.io/laravel-bytes/console-applications-with-laravel-zero/




 50bb41c (fix: auto resolve conflict)


 4ab3760 (.)

<<<<<<< HEAD

=======
>>>>>>> e5c56c3 (.)
# Comandi Console in Moduli Laraxot

## Namespace Corretto per i Comandi Console

Nei moduli Laraxot, i comandi console **devono** utilizzare il seguente pattern di namespace:

```php
namespace Modules\NomeModulo\Console\Commands;
```

Anche se i file sono fisicamente collocati nella directory `app/Console/Commands` del modulo, il namespace **NON** deve includere il segmento `app`.

### ✅ CORRETTO
```php
namespace Modules\Xot\Console\Commands;
```

### ❌ ERRATO
```php
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
namespace Modules\Xot\app\Console\Commands;
=======
=======
>>>>>>> d9307de (fix: auto resolve conflict)
<<<<<<< HEAD
=======


>>>>>>> c2dac53 (.)
namespace Modules\Xot\Console\Commands;
namespace Modules\Xot\app\Console\Commands;


namespace Modules\Xot\Console\Commands;

namespace Modules\Xot\app\Console\Commands;
<<<<<<< HEAD
>>>>>>> origin/dev
>>>>>>> origin/dev
<<<<<<< HEAD
>>>>>>> e5c56c3 (.)
=======
=======
namespace Modules\Xot\app\Console\Commands;
>>>>>>> 50bb41c (fix: auto resolve conflict)
>>>>>>> d9307de (fix: auto resolve conflict)
=======



namespace Modules\Xot\app\Console\Commands;
 50bb41c (fix: auto resolve conflict)
>>>>>>> c2dac53 (.)
```

## Esempio di Comando Console

```php
<?php

declare(strict_types=1);

namespace Modules\Xot\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class DatabaseSchemaExportCommand extends Command
{
    /**
     * Il nome e la firma del comando console.
     *
     * @var string
     */
    protected $signature = 'xot:schema-export {connection? : Nome della connessione database} {--output=docs/db_schema.json : Percorso file di output}';

    /**
     * La descrizione del comando console.
     *
     * @var string
     */
    protected $description = 'Esporta lo schema del database in un file JSON completo';

    /**
     * Esegui il comando console.
     */
    public function handle(): int
    {
        // Implementazione
        
        return 0;
    }
}
```

## Risorse Utili
- [Laravel Artisan Console Documentation](https://laravel.com/docs/10.x/artisan)
- [Console Applications with Laravel Zero](https://fly.io/laravel-bytes/console-applications-with-laravel-zero/)
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD

 e2a4c5d (.)
=======
>>>>>>> e5c56c3 (.)
=======
=======
>>>>>>> 7b67053 (fix: auto resolve conflict)
=======
=======
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
<<<<<<< HEAD
>>>>>>> d9307de (fix: auto resolve conflict)
=======
=======

 e2a4c5d (.)
>>>>>>> 4ab3760 (.)
>>>>>>> 7b67053 (fix: auto resolve conflict)
=======




 e2a4c5d (.)
 50bb41c (fix: auto resolve conflict)


 e2a4c5d (.)
 4ab3760 (.)
>>>>>>> c2dac53 (.)
