# convenzioni per namespace e percorsi dei moduli

## struttura corretta del percorso

uno degli errori più comuni è la confusione tra il namespace nel codice php e il percorso fisico dei file nel filesystem.

### percorso fisico corretto

i file dei moduli devono sempre seguire questa struttura:

```
<<<<<<< HEAD
/var/www/html/base_techplanner_fila3_mono/laravel/Modules/{NomeModulo}/app/{Tipo}/...
```

per esempio:
- `/var/www/html/base_ptvx_fila3_mono/laravel/Modules/<nome modulo>/app/Filament/Resources/...`
- `/var/www/html/base_ptvx_fila3_mono/laravel/Modules/<nome modulo>/app/Models/...`
- `/var/www/html/base_ptvx_fila3_mono/laravel/Modules/<nome modulo>/app/Http/Controllers/...`
=======
/var/www/html/base_saluteora/laravel/Modules/{NomeModulo}/app/{Tipo}/...
```

per esempio:
- `/var/www/html/base_saluteora/laravel/Modules/SaluteOra/app/Filament/Resources/...`
- `/var/www/html/base_saluteora/laravel/Modules/SaluteOra/app/Models/...`
- `/var/www/html/base_saluteora/laravel/Modules/SaluteOra/app/Http/Controllers/...`
>>>>>>> d1a0a6c3 (.)

### namespace corretto

i namespace nei file php devono seguire questa struttura:

```php
namespace Modules\{NomeModulo}\{Tipo}\...;
```

per esempio:
<<<<<<< HEAD
- `namespace Modules\<nome modulo>\Filament\Resources;`
- `namespace Modules\<nome modulo>\Models;`
- `namespace Modules\<nome modulo>\Http\Controllers;`
=======
- `namespace Modules\SaluteOra\Filament\Resources;`
- `namespace Modules\SaluteOra\Models;`
- `namespace Modules\SaluteOra\Http\Controllers;`
>>>>>>> d1a0a6c3 (.)

## errore comune

spesso si confonde il percorso fisico con il namespace, cercando file in:

```
<<<<<<< HEAD
/var/www/html/base_techplanner_fila3_mono/laravel/Modules/{NomeModulo}/{Tipo}/...
=======
/var/www/html/base_saluteora/laravel/Modules/{NomeModulo}/{Tipo}/...
>>>>>>> d1a0a6c3 (.)
```

questo è **errato** perché omette la directory `app/` nel percorso fisico.

## verifiche rapide

1. percorso fisico: deve contenere `/app/` dopo il nome del modulo
2. namespace: non deve contenere `app` nel namespace

## esempi corretti

| namespace | percorso fisico |
|-----------|----------------|
<<<<<<< HEAD
| `Modules\<nome modulo>\Filament\Resources\DoctorResource` | `/var/www/html/base_ptvx_fila3_mono/laravel/Modules/<nome modulo>/app/Filament/Resources/DoctorResource.php` |
| `Modules\User\Models\User` | `/var/www/html/base_ptvx_fila3_mono/laravel/Modules/User/app/Models/User.php` |
=======
| `Modules\SaluteOra\Filament\Resources\DoctorResource` | `/var/www/html/base_saluteora/laravel/Modules/SaluteOra/app/Filament/Resources/DoctorResource.php` |
| `Modules\User\Models\User` | `/var/www/html/base_saluteora/laravel/Modules/User/app/Models/User.php` |
>>>>>>> d1a0a6c3 (.)

## come evitare l'errore

1. usa sempre strumenti come `find_by_name` per verificare il percorso effettivo
2. controlla sempre la corrispondenza tra il namespace e il percorso fisico
3. considera sempre che il percorso fisico contiene `/app/` mentre il namespace no

## linkback

<<<<<<< HEAD
- [convenzioni di codice](/var/www/html/base_techplanner_fila3_mono/laravel/project_docs/conventions.md)
- [struttura progetto](/var/www/html/base_techplanner_fila3_mono/laravel/project_docs/project-structure.md)
=======
- [convenzioni di codice](/var/www/html/base_saluteora/laravel/project_docs/conventions.md)
- [struttura progetto](/var/www/html/base_saluteora/laravel/project_docs/project-structure.md)
>>>>>>> d1a0a6c3 (.)
