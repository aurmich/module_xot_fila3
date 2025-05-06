<?php

declare(strict_types=1);

namespace Modules\Xot\Providers;

<<<<<<< HEAD
use function Safe\realpath;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Webmozart\Assert\Assert;
use Illuminate\Support\Facades\File;
=======
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Webmozart\Assert\Assert;
>>>>>>> 9746d62 (.)
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;
use Modules\Xot\Datas\ComponentFileData;
use Nwidart\Modules\Traits\PathNamespace;
<<<<<<< HEAD
use Modules\Xot\Actions\File\GetComponentsAction;
use Modules\Xot\Actions\Blade\RegisterBladeComponentsAction;

use Modules\Xot\Actions\Module\GetModulePathByGeneratorAction;
use Modules\Xot\Actions\Livewire\RegisterLivewireComponentsAction;
use BladeUI\Icons\Factory as IconFactory;
=======
use Modules\Xot\Actions\Blade\RegisterBladeComponentsAction;
use Modules\Xot\Actions\Module\GetModulePathByGeneratorAction;
use Modules\Xot\Actions\Livewire\RegisterLivewireComponentsAction;

use function Safe\realpath;
>>>>>>> 9746d62 (.)

/**
 * Class XotBaseServiceProvider.
 */
abstract class XotBaseServiceProvider extends ServiceProvider
{
    use PathNamespace;

    public string $name = '';
<<<<<<< HEAD
    public string $nameLower = '';
    protected string $module_dir = __DIR__;
    protected string $module_ns = __NAMESPACE__;
=======

    public string $nameLower = '';

    protected string $module_dir = __DIR__;

    protected string $module_ns = __NAMESPACE__;

>>>>>>> 9746d62 (.)
    protected string $module_base_ns;

    /**
     * Boot the application events.
     */
    public function boot(): void
    {
        $this->registerTranslations();
<<<<<<< HEAD
        //$this->registerConfig(); // to register   
=======
        $this->registerConfig();
>>>>>>> 9746d62 (.)
        $this->registerViews();
        $this->loadMigrationsFrom($this->module_dir.'/../Database/Migrations');
        $this->registerLivewireComponents();
        $this->registerBladeComponents();
        $this->registerCommands();
<<<<<<< HEAD

        //$this->registerBladeIcons(); deve stare in register
=======
>>>>>>> 9746d62 (.)
    }

    /**
     * Register the service provider.
     */
    public function register(): void
    {
        $this->nameLower = Str::lower($this->name);
        $this->module_ns = collect(explode('\\', $this->module_ns))->slice(0, -1)->implode('\\');
        $this->app->register($this->module_ns.'\Providers\RouteServiceProvider');
        $this->app->register($this->module_ns.'\Providers\EventServiceProvider');
<<<<<<< HEAD
        $this->registerConfig();
        $this->registerBladeIcons(); // to boot
=======
        $this->registerBladeIcons();
>>>>>>> 9746d62 (.)
    }

    public function registerBladeIcons(): void
    {
        if ('' === $this->name) {
            throw new \Exception('name is empty on ['.static::class.']');
        }
<<<<<<< HEAD
        
        $svgPath = app(GetModulePathByGeneratorAction::class)->execute($this->name, 'svg');
        /*
        $basePath = base_path(DIRECTORY_SEPARATOR);
        $svgPath = str_replace($basePath, '', $svgPath);


        Config::set('blade-icons.sets.'.$this->nameLower.'.path', $svgPath);
        Config::set('blade-icons.sets.'.$this->nameLower.'.prefix', $this->nameLower);
        //*/
        
        $this->callAfterResolving(IconFactory::class, function (IconFactory $factory) use ($svgPath) {
            $factory->add($this->nameLower, [
                'path' => $svgPath,
                'prefix' => $this->nameLower,
            ]);
        });
        
=======

        Assert::string($relativePath = config('modules.paths.generator.assets.path'));

        try {
            $svgPath = module_path($this->name, $relativePath.'/../svg');
            if (! is_string($svgPath)) {
                throw new \Exception('Invalid SVG path');
            }
            $resolvedPath = $svgPath;
            $svgPath = $resolvedPath;
        } catch (\Error $e) {
            $svgPath = base_path('Modules/'.$this->name.'/'.$relativePath.'/../svg');
            if (! is_string($svgPath)) {
                throw new \Exception('Invalid fallback SVG path');
            }
        }

        $basePath = base_path(DIRECTORY_SEPARATOR);
        $svgPath = str_replace($basePath, '', $svgPath);

        Config::set('blade-icons.sets.'.$this->nameLower.'.path', $svgPath);
        Config::set('blade-icons.sets.'.$this->nameLower.'.prefix', $this->nameLower);
>>>>>>> 9746d62 (.)
    }

    /**
     * Register views.
     */
    public function registerViews(): void
    {
        if ('' === $this->name) {
            throw new \Exception('name is empty on ['.static::class.']');
        }

        $viewPath = module_path($this->name, 'resources/views');
        if (! is_string($viewPath)) {
            throw new \Exception('Invalid view path');
        }

        $this->loadViewsFrom($viewPath, $this->nameLower);
    }

    /**
     * Register translations.
     */
    public function registerTranslations(): void
    {
        if ('' === $this->name) {
            throw new \Exception('name is empty on ['.static::class.']');
        }

        try {
            $langPath = module_path($this->name, 'lang');
            if (! is_string($langPath)) {
                throw new \Exception('Invalid language path');
            }
            $this->loadTranslationsFrom($langPath, $this->nameLower);
        } catch (\Error $e) {
            $fallbackPath = base_path('Modules/'.$this->name.'/lang');
            $this->loadTranslationsFrom($fallbackPath, $this->nameLower);
        }

        $jsonLangPath = module_path($this->name, 'lang');
        if (! is_string($jsonLangPath)) {
            throw new \Exception('Invalid JSON language path');
        }
        $this->loadJsonTranslationsFrom($jsonLangPath);
    }

    /**
     * Register an additional directory of factories.
     */
    public function registerFactories(): void
    {
        if (! app()->environment('production')) {
            // app(Factory::class)->load($this->module_dir.'/../Database/factories');
        }
    }

    /**
     * Register config.
     */
    protected function registerConfig(): void
    {
        try {
<<<<<<< HEAD
            $configPath = app(GetModulePathByGeneratorAction::class)->execute($this->name, 'config');
            $files = File::glob($configPath.'/*.php');
            foreach($files as $file){
                $info=pathinfo($file);
                $filename=Arr::get($info, 'filename');
                //$this->mergeConfigFrom($file, $this->nameLower);
                $configData = File::getRequire($file);
                Config::set($this->nameLower.'::'.$filename, $configData);
            }
            /*
            $this->publishes([
                $configPath => config_path($this->nameLower),
            ], 'config');
            */
=======
            Assert::string($relativePath = config('modules.paths.generator.config.path'));
            $configPath = module_path($this->name, $relativePath);
            if (! is_string($configPath)) {
                return;
            }

            if (! file_exists($configPath)) {
                return;
            }

            $this->publishes([
                $configPath => config_path($this->nameLower.'.php'),
            ], 'config');

>>>>>>> 9746d62 (.)
            $this->mergeConfigFrom($configPath, $this->nameLower);
        } catch (\Exception $e) {
            // Ignore missing configuration
            return;
        }
    }

    public function registerBladeComponents(): void
    {
<<<<<<< HEAD
        $componentsViewPath = app(GetModulePathByGeneratorAction::class)->execute($this->name, 'component-view');
        Blade::anonymousComponentPath($componentsViewPath);

        $componentClassPath = app(GetModulePathByGeneratorAction::class)->execute($this->name, 'component-class');

        $namespace = $this->module_ns.'\\View\\Components';
=======
        $componentClassPath = app(GetModulePathByGeneratorAction::class)->execute($this->name, 'component-class');

        $namespace = $this->module_ns.'\View\Components';
>>>>>>> 9746d62 (.)
        Blade::componentNamespace($namespace, $this->nameLower);

        app(RegisterBladeComponentsAction::class)
            ->execute(
                $componentClassPath,
                $this->module_ns
            );
    }

    /**
     * Register Livewire components.
     */
    public function registerLivewireComponents(): void
    {
        $prefix = '';
        app(RegisterLivewireComponentsAction::class)
            ->execute(
                $this->module_dir.'/../Http/Livewire',
                Str::before($this->module_ns, '\Providers'),
                $prefix
            );
    }

    public function registerCommands(): void
    {
        $prefix = '';

        $comps = app(\Modules\Xot\Actions\File\GetComponentsAction::class)
            ->execute(
                $this->module_dir.'/../Console/Commands',
                'Modules\\'.$this->name.'\\Console\\Commands',
                $prefix,
            );
        if (0 == $comps->count()) {
            return;
        }
        $commands = $comps->toArray();
        /** @var array<int, array{ns: string}> $commands */
        $commands = array_map(
            static function (mixed $item): string {
                Assert::isArray($item);
                Assert::keyExists($item, 'ns');
<<<<<<< HEAD
=======
                Assert::string($item['ns']);
>>>>>>> 9746d62 (.)
                return $item['ns'];
            },
            $commands
        );
        $this->commands($commands);
    }

    /**
     * Get the services provided by the provider.
     */
    public function provides(): array
    {
        return [];
    }
}
