<?php

declare(strict_types=1);

namespace Modules\Xot\Services;

use function count;

use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

/**
 * Class RouteService.
 * Modules\Xot\Services\RouteService.
 *
 * @method string urlAct($params)
 */
class RouteService
{
    /**
     * Verifica se l'utente è in modalità amministrazione.
     *
     * @param array<string,string> $params Parametri aggiuntivi
     * @return bool True se l'utente è in modalità amministrazione, false altrimenti
     */
    public static function inAdmin(array $params = []): bool
    {
        // Se il parametro in_admin è specificato, lo restituiamo direttamente
        if (isset($params['in_admin'])) {
            // Convertiamo qualsiasi valore a booleano
            return (bool) $params['in_admin'];
        }

        // Se il primo segmento dell'URL è 'admin', siamo in modalità amministrazione
        if ('admin' === Request::segment(1)) {
            return true;
        }

        // Verifichiamo un caso speciale per le richieste Livewire
        $segments = Request::segments();
        
        // Se abbiamo almeno un segmento, è 'livewire' e la sessione 'in_admin' è true
        return (is_countable($segments) ? \count($segments) : 0) > 0 && 
               'livewire' === $segments[0] && 
               session('in_admin', false) === true;
    }

    /**
     * @param array<string,string> $params
     */
    public static function urlAct(array $params): string
    {
        $query = [];
        $act = 'show';
        $row = (object) [];
        extract($params);

        $route_action = (string) Route::currentRouteAction();
        Str::snake(Str::after($route_action, '@'));
        
        $routename = ''; // Request::route()->getName();
        $old_act_route = last(explode('.', $routename));
        if (! \is_string($old_act_route)) {
            throw new \Exception('['.__LINE__.']['.class_basename(self::class).']');
        }

        $routename_act = Str::before($routename, $old_act_route).''.$act;
        $route_current = Route::current();
        $route_params = [];
        if ($route_current instanceof \Illuminate\Routing\Route) {
            $route_params = $route_current->parameters();
            $routename = $route_current->getName();
        }

        if (Route::has($routename_act)) {
            $parz = array_merge($route_params, [$row]);
            $parz = array_merge($parz, $query);

            return route($routename_act, $parz);
        }

        return '#'.$routename_act;
    }

    /**
     * @param array<string,string> $params
     */
    public static function getRoutenameN(array $params): string
    {
        // default vars
        $n = 0;
        $act = 'show';
        extract($params);
        $tmp = [];
        
        if (inAdmin($params)) {
            $tmp[] = 'admin';
        }

        for ($i = 0; $i <= $n; ++$i) {
            $tmp[] = 'container'.$i;
        }

        $tmp[] = $act;

        return implode('.', $tmp);
    }

    /**
     * @param array<string,string> $params
     */
    public static function urlLang(array $params = []): string
    {
        return '?';
    }

    public static function getAct(): string
    {
        $route_current = Route::current();
        if (null === $route_current) {
            return 'show';
        }
        $routename = $route_current->getName();
        if (null === $routename) {
            return 'show';
        }

        return (string) last(explode('.', $routename));
    }

    public static function getModuleName(): string
    {
        $route_current = Route::current();
        if (null === $route_current) {
            return '';
        }
        $route_action = $route_current->getActionName();
        if (! \is_string($route_action)) {
            throw new \Exception('['.__LINE__.']['.class_basename(self::class).']');
        }
        $arr = explode('\\', $route_action);
        if (! isset($arr[1])) {
            return '';
        }

        return $arr[1];
    }

    public static function getControllerName(): string
    {
        $route_current = Route::current();
        if (null === $route_current) {
            return '';
        }

        return class_basename($route_current->getController());
    }

    public static function getView(): string
    {
        $route_current = Route::current();
        if (null === $route_current) {
            return '';
        }
        $routename = $route_current->getName();
        if (null === $routename) {
            return '';
        }
        $act = last(explode('.', $routename));
        if (! \is_string($act)) {
            throw new \Exception('['.__LINE__.']['.class_basename(self::class).']');
        }
        $module_name = self::getModuleName();
        $controller_name = self::getControllerName();
        $controller_name = Str::before($controller_name, 'Controller');
        $controller_name = Str::snake($controller_name);

        return strtolower($module_name).'::'.$controller_name.'.'.$act;
    }

    public static function getRouteParams(): array
    {
        $route_current = Route::current();
        if (null === $route_current) {
            return [];
        }

        return $route_current->parameters();
    }
<<<<<<< HEAD
=======
<<<<<<< HEAD

    /**
     * Recupera i parametri della route corrente.
     *
     * @return array<string, mixed>
     */
    public static function getRouteParams(): array
    {
        $route = Route::current();
        if (null === $route) {
            return [];
        }

        return [
            'name' => $route->getName(),
            'action' => $route->getActionName(),
            'parameters' => $route->parameters(),
            'uri' => $route->uri(),
        ];
    }
=======
>>>>>>> origin/dev
>>>>>>> 3268b83 (.)
}
