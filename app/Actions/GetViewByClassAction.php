<?php

declare(strict_types=1);

namespace Modules\Xot\Actions;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Str;
use Spatie\QueueableAction\QueueableAction;
use Webmozart\Assert\Assert;

/**
 * Classe per ottenere una vista basata su una classe.
 */
class GetViewByClassAction
{
    use QueueableAction;

    /**
     * Ottiene una vista basata su una classe.
     *
<<<<<<< HEAD
     * @param  string  $class  Nome della classe
     * @param  array<string, mixed>  $params  Parametri da passare alla vista
     * @param  string|null  $viewName  Nome personalizzato della vista
=======
     * @param string $class Nome della classe
     * @param array<string, mixed> $params Parametri da passare alla vista
     * @param string|null $viewName Nome personalizzato della vista
     *
     * @return View
>>>>>>> e697a77b (.)
     */
    public function execute(string $class, array $params = [], ?string $viewName = null): View
    {
        $viewName = $viewName ?? $this->getViewNameFromClass($class);
<<<<<<< HEAD

=======
        
>>>>>>> e697a77b (.)
        /** @var view-string $viewName */
        return view($viewName, $params);
    }

    /**
     * Ottiene il nome della vista dal nome della classe.
     *
<<<<<<< HEAD
     * @param  string  $class  Nome della classe
=======
     * @param string $class Nome della classe
     *
     * @return string
>>>>>>> e697a77b (.)
     */
    protected function getViewNameFromClass(string $class): string
    {
        $parts = explode('\\', $class);
        $className = end($parts);
<<<<<<< HEAD

=======
>>>>>>> e697a77b (.)
        return Str::kebab($className);
    }

    /**
     * Risolve il percorso della view basato sul namespace della classe.
     *
<<<<<<< HEAD
     * @param  string  $class  Il nome completo della classe
=======
     * @param string $class Il nome completo della classe
>>>>>>> e697a77b (.)
     * @return string Il percorso della view
     */
    public function executeOld(string $class): string
    {
        $arr = explode('\\', $class);
        Assert::isArray($arr);

        // Verifica che la classe sia nel namespace Modules
<<<<<<< HEAD
        if ($arr[0] !== 'Modules') {
=======
        if ('Modules' !== $arr[0]) {
>>>>>>> e697a77b (.)
            throw new \InvalidArgumentException('Class must be in Modules namespace');
        }

        $module = $arr[1];
        $module_low = Str::lower($module);

        // Estrai il nome della classe e convertilo in kebab-case
        $class_name = Str::kebab(class_basename($class));

        // Costruisci il percorso della view
        return $module_low.'::pages.'.$class_name;
    }
}
