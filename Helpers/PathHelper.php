<?php

declare(strict_types=1);

namespace Modules\Xot\Helpers;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

/**
<<<<<<< HEAD
<<<<<<< HEAD
 * Helper per la gestione dei percorsi nel progetto TechPlanner.
=======
 * Helper per la gestione dei percorsi nel progetto SaluteOra.
>>>>>>> ad700fc8 (.)
=======
 * Helper per la gestione dei percorsi nel progetto TechPlanner.
>>>>>>> 00793d2a (.)
 */
class PathHelper
{
    /**
     * Percorso base del progetto.
<<<<<<< HEAD
     *
     * @var string
     */
    public static string $projectBasePath = '/var/www/html/_bases/base_techplanner_fila3_mono';

    /**
     * Percorso base di Laravel.
     *
     * @var string
     */
    public static string $laravelBasePath = '/var/www/html/_bases/base_techplanner_fila3_mono/laravel';

    /**
     * Percorso base dei moduli.
     *
     * @var string
     */
    public static string $modulesBasePath = '/var/www/html/_bases/base_techplanner_fila3_mono/laravel/Modules';
=======
     */
    public static string $projectBasePath = '/var/www/html/_bases/base_techplanner_fila3_mono';

    /**
     * Percorso base di Laravel.
     */
    public static string $laravelBasePath = '/var/www/html/_bases/base_techplanner_fila3_mono/laravel';

    /**
     * Percorso base dei moduli.
     */
<<<<<<< HEAD
    public static string $modulesBasePath = '/var/www/html/saluteora/laravel/Modules';
>>>>>>> ad700fc8 (.)
=======
    public static string $modulesBasePath = '/var/www/html/_bases/base_techplanner_fila3_mono/laravel/Modules';
>>>>>>> 00793d2a (.)

    /**
     * Ottiene il percorso completo di un modulo.
     *
<<<<<<< HEAD
     * @param string $moduleName Nome del modulo
=======
     * @param  string  $moduleName  Nome del modulo
>>>>>>> ad700fc8 (.)
     * @return string Percorso completo del modulo
     */
    public static function modulePath(string $moduleName): string
    {
<<<<<<< HEAD
        return self::$modulesBasePath . '/' . $moduleName;
=======
        return self::$modulesBasePath.'/'.$moduleName;
>>>>>>> ad700fc8 (.)
    }

    /**
     * Ottiene il percorso dei modelli di un modulo.
     *
<<<<<<< HEAD
     * @param string $moduleName Nome del modulo
=======
     * @param  string  $moduleName  Nome del modulo
>>>>>>> ad700fc8 (.)
     * @return string Percorso dei modelli
     */
    public static function modelsPath(string $moduleName): string
    {
<<<<<<< HEAD
        return self::modulePath($moduleName) . '/app/Models';
=======
        return self::modulePath($moduleName).'/app/Models';
>>>>>>> ad700fc8 (.)
    }

    /**
     * Ottiene il percorso delle migrazioni di un modulo.
     *
<<<<<<< HEAD
     * @param string $moduleName Nome del modulo
=======
     * @param  string  $moduleName  Nome del modulo
>>>>>>> ad700fc8 (.)
     * @return string Percorso delle migrazioni
     */
    public static function migrationsPath(string $moduleName): string
    {
<<<<<<< HEAD
        return self::modulePath($moduleName) . '/database/migrations';
=======
        return self::modulePath($moduleName).'/database/migrations';
>>>>>>> ad700fc8 (.)
    }

    /**
     * Ottiene il percorso dei seeder di un modulo.
     *
<<<<<<< HEAD
     * @param string $moduleName Nome del modulo
=======
     * @param  string  $moduleName  Nome del modulo
>>>>>>> ad700fc8 (.)
     * @return string Percorso dei seeder
     */
    public static function seedersPath(string $moduleName): string
    {
<<<<<<< HEAD
        return self::modulePath($moduleName) . '/database/seeders';
=======
        return self::modulePath($moduleName).'/database/seeders';
>>>>>>> ad700fc8 (.)
    }

    /**
     * Ottiene il percorso dei controller di un modulo.
     *
<<<<<<< HEAD
     * @param string $moduleName Nome del modulo
=======
     * @param  string  $moduleName  Nome del modulo
>>>>>>> ad700fc8 (.)
     * @return string Percorso dei controller
     */
    public static function controllersPath(string $moduleName): string
    {
<<<<<<< HEAD
        return self::modulePath($moduleName) . '/app/Http/Controllers';
=======
        return self::modulePath($moduleName).'/app/Http/Controllers';
>>>>>>> ad700fc8 (.)
    }

    /**
     * Ottiene il percorso delle risorse Filament di un modulo.
     *
<<<<<<< HEAD
     * @param string $moduleName Nome del modulo
=======
     * @param  string  $moduleName  Nome del modulo
>>>>>>> ad700fc8 (.)
     * @return string Percorso delle risorse Filament
     */
    public static function filamentResourcesPath(string $moduleName): string
    {
<<<<<<< HEAD
        return self::modulePath($moduleName) . '/app/Filament/Resources';
=======
        return self::modulePath($moduleName).'/app/Filament/Resources';
>>>>>>> ad700fc8 (.)
    }

    /**
     * Ottiene il percorso dei provider di un modulo.
     *
<<<<<<< HEAD
     * @param string $moduleName Nome del modulo
=======
     * @param  string  $moduleName  Nome del modulo
>>>>>>> ad700fc8 (.)
     * @return string Percorso dei provider
     */
    public static function providersPath(string $moduleName): string
    {
<<<<<<< HEAD
        return self::modulePath($moduleName) . '/app/Providers';
=======
        return self::modulePath($moduleName).'/app/Providers';
>>>>>>> ad700fc8 (.)
    }

    /**
     * Ottiene il percorso delle viste di un modulo.
     *
<<<<<<< HEAD
     * @param string $moduleName Nome del modulo
=======
     * @param  string  $moduleName  Nome del modulo
>>>>>>> ad700fc8 (.)
     * @return string Percorso delle viste
     */
    public static function viewsPath(string $moduleName): string
    {
<<<<<<< HEAD
        return self::modulePath($moduleName) . '/resources/views';
=======
        return self::modulePath($moduleName).'/resources/views';
>>>>>>> ad700fc8 (.)
    }

    /**
     * Verifica se un percorso è corretto secondo le convenzioni del progetto.
     *
<<<<<<< HEAD
     * @param string $path Percorso da verificare
=======
     * @param  string  $path  Percorso da verificare
>>>>>>> ad700fc8 (.)
     * @return bool True se il percorso è corretto, false altrimenti
     */
    public static function isValidPath(string $path): bool
    {
        // Verifica che il percorso contenga /laravel/Modules/ e non solo /Modules/
<<<<<<< HEAD
<<<<<<< HEAD
        if (Str::contains($path, '/base_techplanner_fila3_mono/Modules/')) {
            return false;
        }

        // Verifica che il percorso contenga /laravel/ dopo /base_techplanner_fila3_mono/
        if (Str::contains($path, '/base_techplanner_fila3_mono/') && !Str::contains($path, '/base_techplanner_fila3_mono/laravel/')) {
=======
        if (Str::contains($path, '/saluteora/Modules/')) {
=======
        if (Str::contains($path, '/base_techplanner_fila3_mono/Modules/')) {
>>>>>>> 00793d2a (.)
            return false;
        }

        // Verifica che il percorso contenga /laravel/ dopo /saluteora/
        if (Str::contains($path, '/saluteora/') && ! Str::contains($path, '/saluteora/laravel/')) {
>>>>>>> ad700fc8 (.)
            return false;
        }

        return true;
    }

    /**
     * Corregge un percorso errato secondo le convenzioni del progetto.
     *
<<<<<<< HEAD
     * @param string $path Percorso da correggere
=======
     * @param  string  $path  Percorso da correggere
>>>>>>> ad700fc8 (.)
     * @return string Percorso corretto
     */
    public static function correctPath(string $path): string
    {
<<<<<<< HEAD
<<<<<<< HEAD
        // Corregge /var/www/html/base_techplanner_fila3_mono/Modules/ in /var/www/html/base_techplanner_fila3_mono/laravel/Modules/
        if (Str::contains($path, '/base_techplanner_fila3_mono/Modules/')) {
            return str_replace('/base_techplanner_fila3_mono/Modules/', '/base_techplanner_fila3_mono/laravel/Modules/', $path);
        }

        // Corregge /var/www/html/Modules/ in /var/www/html/base_techplanner_fila3_mono/laravel/Modules/
        if (Str::contains($path, '/var/www/html/Modules/')) {
            return str_replace('/var/www/html/Modules/', '/var/www/html/base_techplanner_fila3_mono/laravel/Modules/', $path);
=======
        // Corregge /var/www/html/saluteora/Modules/ in /var/www/html/saluteora/laravel/Modules/
        if (Str::contains($path, '/saluteora/Modules/')) {
            return str_replace('/saluteora/Modules/', '/saluteora/laravel/Modules/', $path);
=======
        // Corregge /var/www/html/base_techplanner_fila3_mono/Modules/ in /var/www/html/base_techplanner_fila3_mono/laravel/Modules/
        if (Str::contains($path, '/base_techplanner_fila3_mono/Modules/')) {
            return str_replace('/base_techplanner_fila3_mono/Modules/', '/base_techplanner_fila3_mono/laravel/Modules/', $path);
>>>>>>> 00793d2a (.)
        }

        // Corregge /var/www/html/Modules/ in /var/www/html/base_techplanner_fila3_mono/laravel/Modules/
        if (Str::contains($path, '/var/www/html/Modules/')) {
<<<<<<< HEAD
            return str_replace('/var/www/html/Modules/', '/var/www/html/saluteora/laravel/Modules/', $path);
>>>>>>> ad700fc8 (.)
=======
            return str_replace('/var/www/html/Modules/', '/var/www/html/base_techplanner_fila3_mono/laravel/Modules/', $path);
>>>>>>> 00793d2a (.)
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
<<<<<<< HEAD
        
        if (!File::exists($modulesPath)) {
            return [];
        }
        
        /** @var array<string> $directories */
        $directories = File::directories($modulesPath);
        
        return array_map(fn(string $path): string => basename($path), $directories);
=======

        if (! File::exists($modulesPath)) {
            return [];
        }

        /** @var array<string> $directories */
        $directories = File::directories($modulesPath);

        return array_map(fn (string $path): string => basename($path), $directories);
>>>>>>> ad700fc8 (.)
    }

    /**
     * Verifica se un modulo esiste.
     *
<<<<<<< HEAD
     * @param string $moduleName Nome del modulo
=======
     * @param  string  $moduleName  Nome del modulo
>>>>>>> ad700fc8 (.)
     * @return bool True se il modulo esiste, false altrimenti
     */
    public static function moduleExists(string $moduleName): bool
    {
        return File::exists(self::modulePath($moduleName));
    }
}
