<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\View;

use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Spatie\QueueableAction\QueueableAction;
use Modules\Xot\Actions\Module\GetModuleNameByModelClassAction;

/**
 * Azione per ottenere il percorso della view da una classe.
 */
class GetViewByClassAction
{
    use QueueableAction;

    /**
<<<<<<< HEAD
     * "Modules\UI\Filament\Widgets\GroupWidget" => "ui::filament.widgets.group"
<<<<<<< HEAD
     * @return view-string
=======
<<<<<<< HEAD
     * @return string
=======
     * @return view-string
>>>>>>> origin/dev
>>>>>>> 3268b83 (.)
=======
     * Converte il percorso di una classe in un percorso di view.
     * Esempio: "Modules\UI\Filament\Widgets\GroupWidget" => "ui::filament.widgets.group"
     *
     * @param string $class Il nome completo della classe
     * @param string $suffix Il suffisso da aggiungere al percorso della view
     * @return view-string Il percorso della view
     * @throws \Exception Se la view non esiste
>>>>>>> 355a587 (.)
     */
    public function execute(string $class, string $suffix = ''): string
    {
        $module = Str::of($class)->betweenFirst('Modules\\', '\\')->toString();
        $module_low = Str::of($module)->lower()->toString();
        $after = Str::of($class)
            ->after('Modules\\'.$module.'\\')
            ->explode('\\')
            ->toArray();

        $mapped = Arr::map($after, function (string $value, int $key) use ($after) {
            if ($key > 0 && isset($after[$key - 1])) {
                /** @var mixed $prevValue */
                $prevValue = $after[$key - 1];
<<<<<<< HEAD

                // Gestione sicura delle conversioni di tipo per PHPStan level 10
                $prevValueStr = '';
<<<<<<< HEAD

=======
<<<<<<< HEAD
                
                // Gestione sicura delle conversioni di tipo per PHPStan level 10
                $prevValueStr = '';
                
=======

                // Gestione sicura delle conversioni di tipo per PHPStan level 10
                $prevValueStr = '';
>>>>>>> origin/dev
>>>>>>> 3268b83 (.)
=======
                
>>>>>>> 355a587 (.)
                if (is_string($prevValue)) {
                    $prevValueStr = $prevValue;
                } elseif ($prevValue === null) {
                    $prevValueStr = '';
                } elseif (is_scalar($prevValue)) {
                    // Cast sicuro per valori scalari (int, float, bool)
                    $prevValueStr = strval($prevValue);
                }
<<<<<<< HEAD

=======
<<<<<<< HEAD
                
=======

>>>>>>> origin/dev
>>>>>>> 3268b83 (.)
                $singular = Str::of($prevValueStr)->singular()->toString();
                if (Str::endsWith($value, $singular)) {
                    $value = Str::of($value)->beforeLast($singular)->toString();
                }
            }
<<<<<<< HEAD

=======
<<<<<<< HEAD
            
=======

>>>>>>> origin/dev
>>>>>>> 3268b83 (.)
            return Str::of($value)->slug()->toString();
        });

        $implode = implode('.', $mapped);
        $view = $module_low.'::'.$implode.$suffix;
<<<<<<< HEAD

=======
<<<<<<< HEAD
        
=======

>>>>>>> origin/dev
>>>>>>> 3268b83 (.)
        if (!view()->exists($view)) {
            throw new \Exception('View not found: '.$view);
        }

        return $view;
    }
}
