<?php

declare(strict_types=1);

namespace Modules\Xot\Services;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use function Safe\preg_replace;
use Webmozart\Assert\Assert;

/**
 * Class RouteDynService.
 */
class RouteDynService
{
    private static string $namespace_start = '';
<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< HEAD
    private static ?self $instance = null;

    private function __construct()
    {
        // Costruttore privato per il pattern Singleton
    }

    public static function getInstance(): self
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    /**
     * Ottiene le opzioni di gruppo per una rotta.
     *
     * @param array<string, mixed> $opts
     * @return array<string, mixed>
     */
    public function getGroupOpts(array $opts): array
    {
        $group_opts = [];

        $prefix = $this->getPrefix($opts);
        if ('' !== $prefix) {
            $group_opts['prefix'] = $prefix;
        }

        $as = $this->getAs($opts);
        if ('' !== $as) {
            $group_opts['as'] = $as;
        }

        $namespace = $this->getNamespace($opts);
        if ('' !== $namespace) {
            $group_opts['namespace'] = $namespace;
        }

        return $group_opts;
    }

    /**
     * Ottiene il prefisso della rotta.
     *
     * @param array<string, mixed> $opts
     */
    public function getPrefix(array $opts): string
    {
        Assert::keyExists($opts, 'prefix');
        return (string) Arr::get($opts, 'prefix');
    }

    /**
     * Ottiene il nome della rotta.
     *
     * @param array<string, mixed> $opts
     */
    public function getAs(array $opts): string
    {
        Assert::keyExists($opts, 'as');
        return (string) Arr::get($opts, 'as');
    }

    /**
     * Ottiene il namespace del controller.
     *
     * @param array<string, mixed> $opts
     */
    public function getNamespace(array $opts): string
    {
        Assert::keyExists($opts, 'namespace');
        return (string) Arr::get($opts, 'namespace');
    }

    /**
     * Ottiene il controller.
     *
     * @param array<string, mixed> $opts
     */
    public function getController(array $opts): string
    {
        Assert::keyExists($opts, 'controller');
        return (string) Arr::get($opts, 'controller');
    }

    /**
     * Ottiene l'azione dalla configurazione.
     *
     * @param array<string, mixed> $v
     */
    public function getAct(array $v): string
=======
>>>>>>> 3268b83 (.)
=======
    private static ?self $instance = null;
>>>>>>> 355a587 (.)

    private function __construct()
    {
        // Costruttore privato per il pattern Singleton
    }

    public static function getInstance(): self
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    /**
     * Ottiene le opzioni di gruppo per una rotta.
     *
     * @param array<string, mixed> $opts
     * @return array<string, mixed>
     */
    public function getGroupOpts(array $opts): array
    {
        $group_opts = [];

        $prefix = $this->getPrefix($opts);
        if ('' !== $prefix) {
            $group_opts['prefix'] = $prefix;
        }

        $as = $this->getAs($opts);
        if ('' !== $as) {
            $group_opts['as'] = $as;
        }

        $namespace = $this->getNamespace($opts);
        if ('' !== $namespace) {
            $group_opts['namespace'] = $namespace;
        }

        return $group_opts;
    }

    /**
     * Ottiene il prefisso della rotta.
     *
     * @param array<string, mixed> $opts
     */
    public function getPrefix(array $opts): string
    {
        Assert::keyExists($opts, 'prefix');
        return (string) Arr::get($opts, 'prefix');
    }

    /**
     * Ottiene il nome della rotta.
     *
     * @param array<string, mixed> $opts
     */
    public function getAs(array $opts): string
    {
        Assert::keyExists($opts, 'as');
        return (string) Arr::get($opts, 'as');
    }

    /**
     * Ottiene il namespace del controller.
     *
     * @param array<string, mixed> $opts
     */
    public function getNamespace(array $opts): string
    {
        Assert::keyExists($opts, 'namespace');
        return (string) Arr::get($opts, 'namespace');
    }

    /**
     * Ottiene il controller.
     *
     * @param array<string, mixed> $opts
     */
    public function getController(array $opts): string
    {
        Assert::keyExists($opts, 'controller');
        return (string) Arr::get($opts, 'controller');
    }

    /**
     * Ottiene l'azione dalla configurazione.
     *
     * @param array<string, mixed> $v
     */
    public function getAct(array $v): string
    {
        if (isset($v['act'])) {
            Assert::string($act = $v['act']);
            return $act;
        }

        Assert::nullOrString($v['act'] = $v['name']);
        Assert::nullOrString($v['act']);
        $v['act'] = preg_replace('/{.*}\//', '', (string) $v['act']);
        if ($v['act'] === null) {
            $v['act'] = '';
        }

        $v['act'] = str_replace('/', '_', $v['act']);
        $v['act'] = Str::camel($v['act']);
        $v['act'] = str_replace(['{', '}'], '', $v['act']);

        return Str::camel($v['act']);
    }

    /**
     * Ottiene il nome del parametro.
     *
     * @param array<string, mixed> $v
     */
    public function getParamName(array $v): string
    {
        if (isset($v['param_name'])) {
            Assert::string($param_name = $v['param_name']);
            return $param_name;
        }

        Assert::string($name = $v['name']);
        $param_name = 'id_'.$name;
        $param_name = str_replace(['{', '}'], '', $param_name);

        return mb_strtolower($param_name);
    }

    /**
     * Ottiene i nomi dei parametri.
     *
     * @param array<string, mixed> $v
     * @return array<int, string>
     */
    public function getParamsName(array $v): array
    {
        $param_name = $this->getParamName($v);
        return [$param_name];
    }

    /**
     * Ottiene le opzioni per la risorsa.
     *
     * @param array<string, mixed> $v
     * @return array<string, mixed>
     */
    public function getResourceOpts(array $v): array
    {
        $param_name = $this->getParamName($v);
        $params_name = $this->getParamsName($v);

        $opts = [
            'parameters' => [mb_strtolower((string) $v['name']) => implode('}/{', $params_name)],
            'names' => $this->prefixedResourceNames($this->getAs($v)),
        ];

        if (isset($v['only'])) {
            $opts['only'] = $v['only'];
        }

        if ($param_name === '' && ! isset($opts['only'])) {
            $opts['only'] = ['index'];
        }

        $opts['where'] = array_fill_keys($params_name, '[0-9]+');
        return $opts;
    }

    /**
     * Ottiene l'URI della rotta.
     *
     * @param array<string, mixed> $v
     */
    public function getUri(array $v): string
    {
        Assert::string($name = $v['name']);
        return mb_strtolower($name);
    }

    /**
     * Ottiene il metodo HTTP.
     *
     * @param array<string, mixed> $v
     * @return array<int, string>
     */
    public function getMethod(array $v): array
    {
        if (isset($v['method'])) {
            return Arr::wrap($v['method']);
        }
        return ['get', 'post'];
    }

    /**
     * Ottiene il controller e l'azione.
     *
     * @param array<string, mixed> $v
     */
    public function getUses(array $v): string
    {
        $controller = $this->getController($v);
        $act = $this->getAct($v);
        return $controller.'@'.$act;
    }

    /**
     * Ottiene il callback della rotta.
     *
     * @param array<string, mixed> $v
     * @return array{as: string, uses: string}
     */
    public function getCallback(array $v, ?string $curr = null): array
    {
        Assert::string($name = $v['name']);
        $as = Str::slug($name);
        $uses = $this->getUses($v);
        if ($curr !== null) {
            $uses = '\\'.self::$namespace_start.'\\'.$curr.'\\'.$uses;
        } else {
            $uses = '\\'.self::$namespace_start.'\\'.$uses;
        }

        return ['as' => $as, 'uses' => $uses];
    }

    /**
     * Crea una rotta dinamica.
     *
     * @param array<string, mixed> $array
     */
    public static function dynamic_route(array $array, ?string $namespace = null, ?string $namespace_start = null, ?string $curr = null): void
    {
        Assert::isArray($array, 'The $array parameter must be an array.');
        Assert::notEmpty($array, 'The $array parameter cannot be empty.');

        if ($namespace_start !== null) {
            self::$namespace_start = $namespace_start;
        }

        $instance = self::getInstance();
        foreach ($array as $k => $v) {
            if (isset($v['subs'])) {
                $instance->createRouteSubs($v, $namespace, $curr);
                continue;
            }
            if (isset($v['acts'])) {
                $instance->createRouteActs($v, $namespace, $curr);
                continue;
            }
            if (isset($v['resource'])) {
                $instance->createRouteResource($v, $namespace);
                continue;
            }
        }
    }

    /**
     * Crea una rotta risorsa.
     *
     * @param array<string, mixed> $v
     */
    public function createRouteResource(array $v, ?string $namespace): void
    {
        $uri = $this->getUri($v);
        $controller = $this->getController($v);
        $opts = $this->getResourceOpts($v);

        Route::resource($uri, $controller, $opts);
    }

    /**
     * Crea rotte per le sottosezioni.
     *
     * @param array<string, mixed> $v
     */
    public function createRouteSubs(array $v, ?string $namespace, ?string $curr): void
    {
        Assert::isArray($v['subs']);
        $group_opts = $this->getGroupOpts($v);
        Route::group($group_opts, function () use ($v, $namespace, $curr): void {
            self::dynamic_route($v['subs'], $namespace, null, $curr);
        });
    }

    /**
     * Crea rotte per le azioni.
     *
     * @param array<string, mixed> $v
     */
    public function createRouteActs(array $v, ?string $namespace, ?string $curr): void
    {
        Assert::isArray($v['acts']);
        $group_opts = $this->getGroupOpts($v);
        Route::group($group_opts, function () use ($v, $namespace, $curr): void {
            self::dynamic_route($v['acts'], $namespace, null, $curr);
        });
    }

    /**
     * Genera nomi di risorse con prefisso.
     *
     * @return array<string, string>
     */
    public function prefixedResourceNames(string $prefix): array
    {
        if ('.' === mb_substr($prefix, -1)) {
            $prefix = mb_substr($prefix, 0, -1);
        }

        return [
            'index' => $prefix.'.index',
            'create' => $prefix.'.create',
            'store' => $prefix.'.store',
            'show' => $prefix.'.show',
            'edit' => $prefix.'.edit',
            'update' => $prefix.'.update',
            'destroy' => $prefix.'.destroy',
        ];
    }

    public static function getGroupOpts(array $v, ?string $namespace): array
    {
        return [
            'prefix' => self::getPrefix($v, $namespace),
            'namespace' => self::getNamespace($v, $namespace),
            'as' => self::getAs($v, $namespace),
        ];
    }

    public static function getPrefix(array $v, ?string $namespace): string
    {
        if (isset($v['prefix'])) {
            Assert::string($prefix = $v['prefix']);
            return $prefix;
        }

        Assert::string($name = $v['name']);
        $prefix = mb_strtolower($name);
        $param_name = self::getParamName($v, $namespace);
        if ($param_name !== '') {
            return $prefix.'/{'.$param_name.'}';
        }

        return $prefix;
    }

    public static function getAs(array $v, ?string $namespace): string
    {
        if (isset($v['as'])) {
            Assert::string($as = $v['as']);
            return $as;
        }

        Assert::string($name = $v['name']);
        $as = mb_strtolower($name);
        $as = str_replace('/', '.', $as);
<<<<<<< HEAD
<<<<<<< HEAD
        $as = preg_replace('/{.*}./', '', $as);
=======
=======
        $as = preg_replace('/{.*}./', '', $as);
>>>>>>> 355a587 (.)

        /** @var string $tmp */
        $tmp = preg_replace('/{.*}./', '', $as);
        if (!is_string($tmp)) {
            $tmp = $as; // Fallback se preg_replace fallisce
        }
        $as = $tmp;

>>>>>>> 3268b83 (.)
        $as = str_replace(['{', '}'], '', $as);

        return $as.'.';
    }

    public static function getNamespace(array $v, ?string $namespace): ?string
    {
        if (isset($v['namespace'])) {
            Assert::string($namespace = $v['namespace']);
            return $namespace;
        }

        Assert::string($namespace = $v['name']);
        $namespace = str_replace(['{', '}'], '', $namespace);
        if ($namespace === '') {
            return null;
        }

        return Str::studly($namespace);
    }

    public static function getAct(array $v, ?string $namespace): string
<<<<<<< HEAD
=======
>>>>>>> origin/dev
>>>>>>> 3268b83 (.)
    {
        if (isset($v['act'])) {
            Assert::string($act = $v['act']);
            return $act;
        }

        Assert::nullOrString($v['act'] = $v['name']);
<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 3268b83 (.)
=======
>>>>>>> 355a587 (.)
        Assert::nullOrString($v['act']);
        $v['act'] = preg_replace('/{.*}\//', '', (string) $v['act']);
        if ($v['act'] === null) {
            $v['act'] = '';
<<<<<<< HEAD
        }

        $v['act'] = str_replace('/', '_', $v['act']);
        $v['act'] = Str::camel($v['act']);
        $v['act'] = str_replace(['{', '}'], '', $v['act']);

        return Str::camel($v['act']);
    }

<<<<<<< HEAD
    public static function getParamName(array $v, ?string $namespace): string
=======
    /**
     * Ottiene il nome del parametro.
     *
     * @param array<string, mixed> $v
     */
    public function getParamName(array $v): string
=======

        $act = '';
        if (is_string($v['act'])) {
            /** @var string|null $tmp */
            $tmp = preg_replace('/{.*}\//', '', $v['act']);
            $act = $tmp !== null ? $tmp : $v['act'];

            $act = str_replace('/', '_', $act);
            $act = Str::camel($act);
            $act = str_replace(['{', '}'], '', $act);
=======
>>>>>>> 355a587 (.)
        }

        $v['act'] = str_replace('/', '_', $v['act']);
        $v['act'] = Str::camel($v['act']);
        $v['act'] = str_replace(['{', '}'], '', $v['act']);

        return Str::camel($v['act']);
    }

    public static function getParamName(array $v, ?string $namespace): string
>>>>>>> origin/dev
>>>>>>> 3268b83 (.)
    {
        if (isset($v['param_name'])) {
            Assert::string($param_name = $v['param_name']);
            return $param_name;
        }

        Assert::string($name = $v['name']);
        $param_name = 'id_'.$name;
        $param_name = str_replace(['{', '}'], '', $param_name);

        return mb_strtolower($param_name);
    }

<<<<<<< HEAD
=======
<<<<<<< HEAD
    /**
     * Ottiene i nomi dei parametri.
     *
     * @param array<string, mixed> $v
     * @return array<int, string>
     */
    public function getParamsName(array $v): array
    {
        $param_name = $this->getParamName($v);
        return [$param_name];
    }

    /**
     * Ottiene le opzioni per la risorsa.
     *
     * @param array<string, mixed> $v
     * @return array<string, mixed>
     */
    public function getResourceOpts(array $v): array
    {
        $param_name = $this->getParamName($v);
        $params_name = $this->getParamsName($v);

        $opts = [
            'parameters' => [mb_strtolower((string) $v['name']) => implode('}/{', $params_name)],
            'names' => $this->prefixedResourceNames($this->getAs($v)),
=======
>>>>>>> 3268b83 (.)
    public static function getParamsName(array $v, ?string $namespace): array
    {
        $param_name = self::getParamName($v, $namespace);
        return [$param_name];
    }

    public static function getResourceOpts(array $v, ?string $namespace): array
    {
        $param_name = self::getParamName($v, $namespace);
        $params_name = self::getParamsName($v, $namespace);
        Assert::isArray($params_name);

        $opts = [
            'parameters' => [mb_strtolower((string) $v['name']) => implode('}/{', $params_name)],
            'names' => self::prefixedResourceNames(self::getAs($v, $namespace)),
<<<<<<< HEAD
=======
>>>>>>> origin/dev
>>>>>>> 3268b83 (.)
        ];

        if (isset($v['only'])) {
            $opts['only'] = $v['only'];
        }

        if ($param_name === '' && ! isset($opts['only'])) {
            $opts['only'] = ['index'];
        }

        $opts['where'] = array_fill_keys($params_name, '[0-9]+');
        return $opts;
    }

<<<<<<< HEAD
=======
<<<<<<< HEAD
    /**
     * Ottiene l'URI della rotta.
     *
     * @param array<string, mixed> $v
     */
    public function getUri(array $v): string
=======
>>>>>>> 3268b83 (.)
    public static function getController(array $v, ?string $namespace): string
    {
        if (isset($v['controller'])) {
            Assert::string($controller = $v['controller']);
            return $controller;
        }

        Assert::string($v['controller'] = $v['name']);
        $v['controller'] = str_replace(['/', '{', '}'], ['_', '', ''], $v['controller']);
        $v['controller'] = Str::studly($v['controller']);
        $v['controller'] .= 'Controller';

        return $v['controller'];
    }

    public static function getUri(array $v, ?string $namespace): string
<<<<<<< HEAD
    {
        Assert::string($name= $v['name']);
        //return mb_strtolower(is_string($v) ? $v : (string) $v['name);
        return $name;
    }

    public static function getMethod(array $v, ?string $namespace): array
=======
>>>>>>> origin/dev
    {
        Assert::string($name = $v['name']);
        return $name;
    }

<<<<<<< HEAD
    /**
     * Ottiene il metodo HTTP.
     *
     * @param array<string, mixed> $v
     * @return array<int, string>
     */
    public function getMethod(array $v): array
=======
    public static function getMethod(array $v, ?string $namespace): array
>>>>>>> origin/dev
>>>>>>> 3268b83 (.)
    {
        Assert::string($name = $v['name']);
        return $name;
    }

    public static function getMethod(array $v, ?string $namespace): array
    {
        if (isset($v['method'])) {
            return Arr::wrap($v['method']);
        }
        return ['get', 'post'];
    }

<<<<<<< HEAD
=======
<<<<<<< HEAD
    /**
     * Ottiene il controller e l'azione.
     *
     * @param array<string, mixed> $v
     */
    public function getUses(array $v): string
    {
        $controller = $this->getController($v);
        $act = $this->getAct($v);
        return $controller.'@'.$act;
    }

    /**
     * Ottiene il callback della rotta.
     *
     * @param array<string, mixed> $v
     * @return array{as: string, uses: string}
     */
    public function getCallback(array $v, ?string $curr = null): array
    {
        Assert::string($name = $v['name']);
        $as = Str::slug($name);
        $uses = $this->getUses($v);
=======
>>>>>>> 3268b83 (.)
    public static function getUses(array $v, ?string $namespace): string
    {
        $controller = self::getController($v, $namespace);
        $act = self::getAct($v, $namespace);
        return $controller.'@'.$act;
    }

    public static function getCallback(array $v, ?string $namespace, ?string $curr): array
    {
        Assert::string($name = $v['name']);
        $as = Str::slug($name);
        $uses = self::getUses($v, $namespace);
<<<<<<< HEAD
=======
>>>>>>> origin/dev
>>>>>>> 3268b83 (.)
        if ($curr !== null) {
            $uses = '\\'.self::$namespace_start.'\\'.$curr.'\\'.$uses;
        } else {
            $uses = '\\'.self::$namespace_start.'\\'.$uses;
        }

        return ['as' => $as, 'uses' => $uses];
    }

<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< HEAD
    /**
     * Crea una rotta dinamica.
     *
     * @param array<string, mixed> $array
     */
=======
>>>>>>> origin/dev
>>>>>>> 3268b83 (.)
    public static function dynamic_route(array $array, ?string $namespace = null, ?string $namespace_start = null, ?string $curr = null): void
    {
        Assert::isArray($array, 'The $array parameter must be an array.');
        Assert::notEmpty($array, 'The $array parameter cannot be empty.');

        if ($namespace_start !== null) {
            self::$namespace_start = $namespace_start;
        }

<<<<<<< HEAD
=======
<<<<<<< HEAD
        $instance = self::getInstance();
        foreach ($array as $k => $v) {
            if (isset($v['subs'])) {
                $instance->createRouteSubs($v, $namespace, $curr);
                continue;
            }
            if (isset($v['acts'])) {
                $instance->createRouteActs($v, $namespace, $curr);
                continue;
            }
            if (isset($v['resource'])) {
                $instance->createRouteResource($v, $namespace);
                continue;
            }
        }
    }

    /**
     * Crea una rotta risorsa.
     *
     * @param array<string, mixed> $v
     */
    public function createRouteResource(array $v, ?string $namespace): void
    {
        $uri = $this->getUri($v);
        $controller = $this->getController($v);
        $opts = $this->getResourceOpts($v);

        Route::resource($uri, $controller, $opts);
    }

    /**
     * Crea rotte per le sottosezioni.
     *
     * @param array<string, mixed> $v
     */
    public function createRouteSubs(array $v, ?string $namespace, ?string $curr): void
    {
        Assert::isArray($v['subs']);
        $group_opts = $this->getGroupOpts($v);
        Route::group($group_opts, function () use ($v, $namespace, $curr): void {
            self::dynamic_route($v['subs'], $namespace, null, $curr);
        });
    }

    /**
     * Crea rotte per le azioni.
     *
     * @param array<string, mixed> $v
     */
    public function createRouteActs(array $v, ?string $namespace, ?string $curr): void
    {
        Assert::isArray($v['acts']);
        $group_opts = $this->getGroupOpts($v);
        Route::group($group_opts, function () use ($v, $namespace, $curr): void {
            self::dynamic_route($v['acts'], $namespace, null, $curr);
        });
    }

    /**
     * Genera nomi di risorse con prefisso.
     *
     * @return array<string, string>
     */
    public function prefixedResourceNames(string $prefix): array
    {
=======
>>>>>>> 3268b83 (.)
        foreach ($array as $v) {
            Assert::isArray($v, 'Each item in the array must be an array.');
            $group_opts = self::getGroupOpts($v, $namespace);
            $v['group_opts'] = $group_opts;

=======
>>>>>>> 355a587 (.)
            self::createRouteResource($v, $namespace);

            Route::group($group_opts, static function () use ($v, $namespace, $curr): void {
                self::createRouteActs($v, $namespace, $curr);
                self::createRouteSubs($v, $namespace, $curr);
            });
        }
    }

    public static function createRouteResource(array $v, ?string $namespace): void
    {
        if ($v['name'] === null) {
            return;
        }
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 355a587 (.)
        Assert::string($name= $v['name']);
        $opts = self::getResourceOpts($v, $namespace);
        $controller = self::getController($v, $namespace);
        
        
<<<<<<< HEAD
=======
=======
>>>>>>> 355a587 (.)

        Assert::string($name = $v['name']);
        $opts = self::getResourceOpts($v, $namespace);
        $controller = self::getController($v, $namespace);

>>>>>>> 3268b83 (.)
        Route::resource($name, $controller, $opts);
    }

    public static function createRouteSubs(array $v, ?string $namespace, ?string $curr): void
    {
        if (! isset($v['subs'])) {
            return;
        }

        $sub_namespace = self::getNamespace($v, $namespace);
        $curr = $curr === null ? $sub_namespace : $curr;
        Assert::isArray($subs = $v['subs']);
        self::dynamic_route($subs, $sub_namespace, null, $curr);
    }

    public static function createRouteActs(array $v, ?string $namespace, ?string $curr): void
    {
        if (! isset($v['acts']) || ! is_array($v['acts'])) {
            return;
        }

        $controller = self::getController($v, $namespace);
        foreach ($v['acts'] as $v1) {
            Assert::isArray($v1);
            $v1['controller'] = $controller;

            $method = self::getMethod($v1, $namespace);
            $uri = self::getUri($v1, $namespace);
            $callback = self::getCallback($v1, $namespace, $curr);
            Route::match($method, $uri, $callback);
        }
    }

    public static function prefixedResourceNames(string $prefix): array
    {
        if ('.' === mb_substr($prefix, -1)) {
            $prefix = mb_substr($prefix, 0, -1);
        }

<<<<<<< HEAD
=======
>>>>>>> origin/dev
>>>>>>> 3268b83 (.)
        return [
            'index' => $prefix.'.index',
            'create' => $prefix.'.create',
            'store' => $prefix.'.store',
            'show' => $prefix.'.show',
            'edit' => $prefix.'.edit',
            'update' => $prefix.'.update',
            'destroy' => $prefix.'.destroy',
        ];
    }
<<<<<<< HEAD

    // --------------------------------------------------
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======

    // --------------------------------------------------
>>>>>>> origin/dev
>>>>>>> 3268b83 (.)
=======

    // --------------------------------------------------
>>>>>>> 355a587 (.)
}
