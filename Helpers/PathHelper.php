<?php

declare(strict_types=1);

namespace Modules\Xot\Helpers;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

/**
<<<<<<< HEAD
<<<<<<< HEAD
 * Helper per la gestione dei percorsi nel progetto.
=======
 * Helper per la gestione dei percorsi nel progetto SaluteOra.
>>>>>>> d1a0a6c3 (.)
=======
 * Helper per la gestione dei percorsi nel progetto.
>>>>>>> 05bf7bce (.)
 */
class PathHelper
{
    /**
     * Percorso base del progetto.
     */
<<<<<<< HEAD
<<<<<<< HEAD
    public static string $projectBasePath = '/var/www/html';
=======
    public static string $projectBasePath = '/var/www/html/saluteora';
>>>>>>> d1a0a6c3 (.)
=======
    public static string $projectBasePath = '/var/www/html';
>>>>>>> 05bf7bce (.)

    /**
     * Percorso base di Laravel.
     */
<<<<<<< HEAD
<<<<<<< HEAD
    public static string $laravelBasePath = '/var/www/html/laravel';
=======
    public static string $laravelBasePath = '/var/www/html/saluteora/laravel';
>>>>>>> d1a0a6c3 (.)
=======
    public static string $laravelBasePath = '/var/www/html/laravel';
>>>>>>> 05bf7bce (.)

    /**
     * Percorso base dei moduli.
     */
<<<<<<< HEAD
<<<<<<< HEAD
    public static string $modulesBasePath = '/var/www/html/laravel/Modules';
=======
    public static string $modulesBasePath = '/var/www/html/saluteora/laravel/Modules';
>>>>>>> d1a0a6c3 (.)
=======
    public static string $modulesBasePath = '/var/www/html/laravel/Modules';
>>>>>>> 05bf7bce (.)

    /**
     * Ottiene il percorso completo di un modulo.
     *
     * @param  string  $moduleName  Nome del modulo
     * @return string Percorso completo del modulo
     */
    public static function modulePath(string $moduleName): string
    {
        return self::$modulesBasePath.'/'.$moduleName;
    }

    /**
     * Ottiene il percorso dei modelli di un modulo.
     *
     * @param  string  $moduleName  Nome del modulo
     * @return string Percorso dei modelli
     */
    public static function modelsPath(string $moduleName): string
    {
        return self::modulePath($moduleName).'/app/Models';
    }

    /**
     * Ottiene il percorso delle migrazioni di un modulo.
     *
     * @param  string  $moduleName  Nome del modulo
     * @return string Percorso delle migrazioni
     */
    public static function migrationsPath(string $moduleName): string
    {
        return self::modulePath($moduleName).'/database/migrations';
    }

    /**
     * Ottiene il percorso dei seeder di un modulo.
     *
     * @param  string  $moduleName  Nome del modulo
     * @return string Percorso dei seeder
     */
    public static function seedersPath(string $moduleName): string
    {
        return self::modulePath($moduleName).'/database/seeders';
    }

    /**
     * Ottiene il percorso dei controller di un modulo.
     *
     * @param  string  $moduleName  Nome del modulo
     * @return string Percorso dei controller
     */
    public static function controllersPath(string $moduleName): string
    {
        return self::modulePath($moduleName).'/app/Http/Controllers';
    }

    /**
     * Ottiene il percorso delle risorse Filament di un modulo.
     *
     * @param  string  $moduleName  Nome del modulo
     * @return string Percorso delle risorse Filament
     */
    public static function filamentResourcesPath(string $moduleName): string
    {
        return self::modulePath($moduleName).'/app/Filament/Resources';
    }

    /**
     * Ottiene il percorso dei provider di un modulo.
     *
     * @param  string  $moduleName  Nome del modulo
     * @return string Percorso dei provider
     */
    public static function providersPath(string $moduleName): string
    {
        return self::modulePath($moduleName).'/app/Providers';
    }

    /**
     * Ottiene il percorso delle viste di un modulo.
     *
     * @param  string  $moduleName  Nome del modulo
     * @return string Percorso delle viste
     */
    public static function viewsPath(string $moduleName): string
    {
        return self::modulePath($moduleName).'/resources/views';
    }

    /**
     * Verifica se un percorso è corretto secondo le convenzioni del progetto.
     *
     * @param  string  $path  Percorso da verificare
     * @return bool True se il percorso è corretto, false altrimenti
     */
    public static function isValidPath(string $path): bool
    {
        // Verifica che il percorso contenga /laravel/Modules/ e non solo /Modules/
<<<<<<< HEAD
<<<<<<< HEAD
        if (Str::contains($path, '/Modules/')) {
            return false;
        }

        // Verifica che il percorso contenga /laravel/ dopo /TechPlanner/
        if (Str::contains($path, '/') && ! Str::contains($path, '/laravel/')) {
=======
        if (Str::contains($path, '/saluteora/Modules/')) {
            return false;
        }

        // Verifica che il percorso contenga /laravel/ dopo /saluteora/
        if (Str::contains($path, '/saluteora/') && ! Str::contains($path, '/saluteora/laravel/')) {
>>>>>>> d1a0a6c3 (.)
=======
        if (Str::contains($path, '/Modules/')) {
            return false;
        }

        // Verifica che il percorso contenga /laravel/ dopo /TechPlanner/
        if (Str::contains($path, '/') && ! Str::contains($path, '/laravel/')) {
>>>>>>> 05bf7bce (.)
            return false;
        }

        return true;
    }

    /**
     * Corregge un percorso errato secondo le convenzioni del progetto.
     *
     * @param  string  $path  Percorso da correggere
     * @return string Percorso corretto
     */
    public static function correctPath(string $path): string
    {
<<<<<<< HEAD
<<<<<<< HEAD
        // Corregge /var/www/html/TechPlanner/Modules/ in /var/www/html/TechPlanner/laravel/Modules/
        if (Str::contains($path, '/TechPlanner/Modules/')) {
            return str_replace('/Modules/', '/laravel/Modules/', $path);
        }

        // Corregge /var/www/html/Modules/ in /var/www/html/TechPlanner/laravel/Modules/
        if (Str::contains($path, '/var/www/html/Modules/')) {
            return str_replace('/var/www/html/Modules/', '/var/www/html/laravel/Modules/', $path);
=======
        // Corregge /var/www/html/saluteora/Modules/ in /var/www/html/saluteora/laravel/Modules/
        if (Str::contains($path, '/saluteora/Modules/')) {
            return str_replace('/saluteora/Modules/', '/saluteora/laravel/Modules/', $path);
=======
        // Corregge /var/www/html/TechPlanner/Modules/ in /var/www/html/TechPlanner/laravel/Modules/
        if (Str::contains($path, '/TechPlanner/Modules/')) {
            return str_replace('/Modules/', '/laravel/Modules/', $path);
>>>>>>> 05bf7bce (.)
        }

        // Corregge /var/www/html/Modules/ in /var/www/html/TechPlanner/laravel/Modules/
        if (Str::contains($path, '/var/www/html/Modules/')) {
<<<<<<< HEAD
            return str_replace('/var/www/html/Modules/', '/var/www/html/saluteora/laravel/Modules/', $path);
>>>>>>> d1a0a6c3 (.)
=======
            return str_replace('/var/www/html/Modules/', '/var/www/html/laravel/Modules/', $path);
>>>>>>> 05bf7bce (.)
        }

        return $path;
    }

    /**
     * Ottiene tutti i moduli disponibili.
     *
     * @return array<string> Array con i nomi dei moduli
     */
    public static function getModules(): array
    {
        $modulesPath = self::$modulesBasePath;

        if (! File::exists($modulesPath)) {
            return [];
        }

        /** @var array<string> $directories */
        $directories = File::directories($modulesPath);

        return array_map(fn (string $path): string => basename($path), $directories);
    }

    /**
     * Verifica se un modulo esiste.
     *
     * @param  string  $moduleName  Nome del modulo
     * @return bool True se il modulo esiste, false altrimenti
     */
    public static function moduleExists(string $moduleName): bool
    {
        return File::exists(self::modulePath($moduleName));
    }
}
