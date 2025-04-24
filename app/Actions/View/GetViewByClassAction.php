<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\View;

use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Spatie\QueueableAction\QueueableAction;
use Modules\Xot\Actions\Module\GetModuleNameByModelClassAction;

class GetViewByClassAction
{
    use QueueableAction;

    /**
     * "Modules\UI\Filament\Widgets\GroupWidget" => "ui::filament.widgets.group"
     * @return view-string
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
>>>>>>> aurmich/dev
=======
                
                // Gestione sicura delle conversioni di tipo per PHPStan level 10
                $prevValueStr = '';
                
>>>>>>> c93e31b (.)
                if (is_string($prevValue)) {
                    $prevValueStr = $prevValue;
                } elseif ($prevValue === null) {
                    $prevValueStr = '';
                } elseif (is_scalar($prevValue)) {
                    // Cast sicuro per valori scalari (int, float, bool)
<<<<<<< HEAD
                    $prevValueStr = strval($prevValue);
                }

=======

                   // Utilizziamo il cast esplicito con controllo di tipo per PHPStan Level 9
                   $prevValueStr = is_scalar($prevValue) ? (string) $prevValue : '';
                }
                
>>>>>>> c93e31b (.)
                $singular = Str::of($prevValueStr)->singular()->toString();
                if (Str::endsWith($value, $singular)) {
                    $value = Str::of($value)->beforeLast($singular)->toString();
                }
            }
<<<<<<< HEAD

=======
            
>>>>>>> c93e31b (.)
            return Str::of($value)->slug()->toString();
        });

        $implode = implode('.', $mapped);
        $view = $module_low.'::'.$implode.$suffix;
<<<<<<< HEAD

=======
        
>>>>>>> c93e31b (.)
        if (!view()->exists($view)) {
            throw new \Exception('View not found: '.$view);
        }

        return $view;
    }
}
