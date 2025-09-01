<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Filament;

<<<<<<< HEAD
<<<<<<< HEAD
use Filament\Facades\Filament;
use Filament\Navigation\NavigationItem;
use Illuminate\Support\Facades\File;
=======
>>>>>>> 89d0c8f4 (.)
use Illuminate\Support\Str;
use Webmozart\Assert\Assert;
<<<<<<< HEAD
=======
use Illuminate\Support\Str;
use Webmozart\Assert\Assert;
=======
>>>>>>> 89d0c8f4 (.)
use Filament\Facades\Filament;
use Illuminate\Support\Facades\File;
use Filament\Navigation\NavigationItem;
use Modules\Tenant\Services\TenantService;
use Spatie\QueueableAction\QueueableAction;
use Modules\Xot\Actions\Module\GetModulePathByGeneratorAction;
<<<<<<< HEAD
>>>>>>> e697a77b (.)
=======
>>>>>>> 89d0c8f4 (.)

/**
 * Classe per gestire gli elementi di navigazione per i moduli.
 */
class GetModulesNavigationItems
{
    use QueueableAction;

    /**
     * Ottiene gli elementi di navigazione per i moduli.
     *
     * @return array<int, NavigationItem> Array di elementi di navigazione
     */
    public function execute(): array
    {
        $navs = [];

        $modules = TenantService::allModules();
        Assert::isArray($modules, 'TenantService::allModules() deve restituire un array');

        foreach ($modules as $module) {
            Assert::string($module, 'Il nome del modulo deve essere una stringa');
<<<<<<< HEAD
<<<<<<< HEAD

=======
            
>>>>>>> e697a77b (.)
=======
            
>>>>>>> 89d0c8f4 (.)
            $module_low = Str::lower($module);
            Assert::stringNotEmpty($module_low, 'Il nome del modulo convertito in minuscolo non può essere vuoto');
            /*
            // Otteniamo il percorso relativo della configurazione
            $relativeConfigPath = config('modules.paths.generator.config.path');
            $relativeConfigPathStr = is_string($relativeConfigPath) ? $relativeConfigPath : 'Config';
<<<<<<< HEAD
<<<<<<< HEAD

=======
            
>>>>>>> e697a77b (.)
=======
            
>>>>>>> 89d0c8f4 (.)
            try {
                // Proviamo a ottenere il percorso del modulo
                $configPath = module_path($module, $relativeConfigPathStr);
                Assert::string($configPath, 'Il percorso di configurazione deve essere una stringa');
            } catch (\Exception | \Error $e) {
                // Se fallisce, costruiamo manualmente il percorso
                $configPath = base_path('Modules/'.$module.'/'.$relativeConfigPathStr);
            }
<<<<<<< HEAD
<<<<<<< HEAD

=======
            
>>>>>>> e697a77b (.)
=======
            
>>>>>>> 89d0c8f4 (.)
            // Verifichiamo che $configPath sia una stringa valida
            Assert::stringNotEmpty($configPath, 'Il percorso di configurazione non può essere vuoto');
            */
            $configPath = app(GetModulePathByGeneratorAction::class)->execute($module, 'config');
            // Costruiamo il percorso completo del file di configurazione
            $configFilePath = $configPath.'/config.php';
<<<<<<< HEAD
<<<<<<< HEAD

=======
            
>>>>>>> 89d0c8f4 (.)
            // Verifichiamo che il file esista
            if (!File::exists($configFilePath)) {
                continue; // Saltiamo questo modulo se il file di configurazione non esiste
            }
<<<<<<< HEAD

=======
            
            // Verifichiamo che il file esista
            if (!File::exists($configFilePath)) {
                continue; // Saltiamo questo modulo se il file di configurazione non esiste
            }
            
>>>>>>> e697a77b (.)
=======
            
>>>>>>> 89d0c8f4 (.)
            // Carichiamo la configurazione
            try {
                /** @var array<string, mixed> $config */
                $config = File::getRequire($configFilePath);
                Assert::isArray($config, 'Il file di configurazione deve restituire un array');
            } catch (\Exception $e) {
                // Se non riusciamo a caricare la configurazione, passiamo al modulo successivo
                continue;
            }
<<<<<<< HEAD
<<<<<<< HEAD

=======
            
>>>>>>> 89d0c8f4 (.)
            // Estraiamo i valori di configurazione con valori predefiniti
            $icon = $config['icon'] ?? 'heroicon-o-question-mark-circle';
            Assert::string($icon, "L'icona deve essere una stringa");
            
            $role = $module_low.'::admin';
            Assert::stringNotEmpty($role, 'Il ruolo non può essere vuoto');
            
            $navigation_sort = $config['navigation_sort'] ?? 1;
            Assert::integerish($navigation_sort, 'navigation_sort deve essere un intero');
            $navigation_sort = (int) $navigation_sort;
<<<<<<< HEAD

=======
            
            // Estraiamo i valori di configurazione con valori predefiniti
            $icon = $config['icon'] ?? 'heroicon-o-question-mark-circle';
            Assert::string($icon, "L'icona deve essere una stringa");
            
            $role = $module_low.'::admin';
            Assert::stringNotEmpty($role, 'Il ruolo non può essere vuoto');
            
            $navigation_sort = $config['navigation_sort'] ?? 1;
            Assert::integerish($navigation_sort, 'navigation_sort deve essere un intero');
            $navigation_sort = (int) $navigation_sort;
            
>>>>>>> e697a77b (.)
=======
            
>>>>>>> 89d0c8f4 (.)
            // Creiamo l'elemento di navigazione
            $nav = NavigationItem::make($module)
                ->url('/'.$module_low.'/admin')
                ->icon($icon)
                ->group('Modules')
                ->sort($navigation_sort)
                ->visible(
                    static function () use ($role): bool {
                        $user = Filament::auth()->user();
<<<<<<< HEAD
<<<<<<< HEAD
                        if ($user === null) {
=======
                        if (null === $user) {
>>>>>>> e697a77b (.)
=======
                        if (null === $user) {
>>>>>>> 89d0c8f4 (.)
                            return false;
                        }

                        // Verifichiamo che il metodo hasRole esista
<<<<<<< HEAD
<<<<<<< HEAD
                        if (! method_exists($user, 'hasRole')) {
=======
                        if (!method_exists($user, 'hasRole')) {
>>>>>>> e697a77b (.)
=======
                        if (!method_exists($user, 'hasRole')) {
>>>>>>> 89d0c8f4 (.)
                            return false;
                        }

                        return (bool) $user->hasRole($role);
                    }
                );

            $navs[] = $nav;
        }

        return $navs;
    }
}
