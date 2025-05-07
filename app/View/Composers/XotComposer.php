<?php

declare(strict_types=1);

namespace Modules\Xot\View\Composers;

<<<<<<< HEAD
use Illuminate\View\View;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Webmozart\Assert\Assert;
use Modules\Xot\Datas\XotData;
use Modules\Xot\Datas\MetatagData;
use Nwidart\Modules\Facades\Module;
use Illuminate\Support\Facades\Auth;
use Modules\Xot\Actions\File\AssetPathAction;
use Nwidart\Modules\Laravel\Module as LaravelModule;

/**
 * Class XotComposer.
=======
<<<<<<< HEAD
use Illuminate\Support\Facades\Route;
use Illuminate\View\View;
use Modules\Xot\Services\RouteService;
use Modules\Xot\Services\ThemeService;

/**
 * Class XotComposer
 * Gestisce la composizione delle viste per il modulo Xot.
=======
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Modules\Xot\Datas\MetatagData;
use Modules\Xot\Datas\XotData;
use Nwidart\Modules\Facades\Module;
use Nwidart\Modules\Laravel\Module as LaravelModule;
use Webmozart\Assert\Assert;

/**
 * Class XotComposer.
>>>>>>> origin/dev
>>>>>>> 3268b83 (.)
 */
class XotComposer
{
    /**
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
>>>>>>> 3268b83 (.)
     * Undocumented function.
     *
     * @param array<mixed|void> $arguments
     */
    public function __call(string $name, array $arguments): mixed
    {
        $modules = Module::getOrdered();

        $module = Arr::first(
            $modules,
            static function ($module) use ($name): bool {
                // Ensure the module is an instance of LaravelModule
                if (! $module instanceof LaravelModule) {
                    return false;
                }

                Assert::string($moduleName = $module->getName());
                $class = '\Modules\\'.$moduleName.'\View\Composers\ThemeComposer';

                return method_exists($class, $name);
            }
        );

        if (! \is_object($module)) {
            throw new \Exception('Create a View\Composers\ThemeComposer.php inside a module with ['.$name.'] method');
        }

        Assert::isInstanceOf($module, LaravelModule::class, '['.__LINE__.']['.class_basename($this).']');
        $class = '\Modules\\'.$module->getName().'\View\Composers\ThemeComposer';

        $app = app($class);
        $callback = [$app, $name];
        Assert::isCallable($callback);

        return call_user_func_array($callback, $arguments);
    }

    /**
<<<<<<< HEAD
=======
>>>>>>> origin/dev
>>>>>>> 3268b83 (.)
     * Bind data to the view.
     */
    public function compose(View $view): void
    {
<<<<<<< HEAD
=======
<<<<<<< HEAD
        $routeParams = app(RouteService::class)->getRouteParams();
        $theme = ThemeService::getTheme();

        $view->with([
            'route_params' => $routeParams,
            'theme' => $theme,
        ]);
    }

    /**
     * Gestisce le chiamate dinamiche ai metodi.
     *
     * @param string $method
     * @param array<mixed> $parameters
     *
     * @return mixed
     */
    public function __call(string $method, array $parameters)
    {
        if (method_exists($this, $method)) {
            return $this->$method(...$parameters);
        }

        throw new \BadMethodCallException(sprintf(
            'Il metodo %s non esiste nella classe %s',
            $method,
            static::class
        ));
    }

    /**
     * Genera il percorso per un asset.
     */
    public function asset(string $path): string
    {
        return asset($path);
    }

    /**
     * Genera un percorso relativo.
     */
    public function path(string $path): string
    {
        return $path;
    }

    /**
     * Gestisce i metatag della pagina.
     *
     * @param array<string, mixed> $options
     * @return array<string, mixed>
     */
    public function metatag(array $options = []): array
    {
        $defaults = [
            'title' => config('app.name', ''),
            'description' => '',
            'keywords' => '',
            'author' => '',
            'robots' => 'index,follow',
        ];

        return array_merge($defaults, $options);
=======
>>>>>>> 3268b83 (.)
        $lang = app()->getLocale();
        $view->with('lang', $lang);
        $view->with('_theme', $this);

        if (Auth::check()) {
            $profile = XotData::make()->getProfileModel();
            $view->with('_profile', $profile);
            $view->with('_user', auth()->user());
        }
    }

    public function asset(string $str): string
    {
        return asset(app(\Modules\Xot\Actions\File\AssetAction::class)->execute($str));
    }

<<<<<<< HEAD
    public function path(string $str): string
    {
        return (app(AssetPathAction::class)->execute($str));
    }

=======
>>>>>>> 3268b83 (.)
    public function metatag(string $str): string|bool|null
    {
        $metatag = MetatagData::make();
        $fun = 'get'.Str::studly($str);
        if (method_exists($metatag, $fun)) {
            // @phpstan-ignore return.type
            return $metatag->{$fun}();
        }

        // @phpstan-ignore return.type
        return $metatag->{$str};
<<<<<<< HEAD
=======
>>>>>>> origin/dev
>>>>>>> 3268b83 (.)
    }
}
