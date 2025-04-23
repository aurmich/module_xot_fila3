<?php

declare(strict_types=1);

namespace Modules\Xot\Providers;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Field;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TimePicker;
use Filament\Infolists\Components\Entry;
use Filament\Support\Components\Component;
use Filament\Support\Concerns\Configurable;
use Filament\Tables\Columns\Column;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\BaseFilter;
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
use Illuminate\Auth\AuthenticationException;
use Illuminate\Contracts\Debug\ExceptionHandler;
use Illuminate\Database\Eloquent\Model;
>>>>>>> e5c56c3 (.)
=======
=======
>>>>>>> 7b67053 (fix: auto resolve conflict)
use Illuminate\Auth\AuthenticationException;
use Illuminate\Contracts\Debug\ExceptionHandler;
use Illuminate\Database\Eloquent\Model;
=======
<<<<<<< HEAD
=======
use Illuminate\Auth\AuthenticationException;
use Illuminate\Contracts\Debug\ExceptionHandler;
use Illuminate\Database\Eloquent\Model;
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
<<<<<<< HEAD
>>>>>>> d9307de (fix: auto resolve conflict)
=======
=======
>>>>>>> 4ab3760 (.)
>>>>>>> 7b67053 (fix: auto resolve conflict)
=======
use Illuminate\Auth\AuthenticationException;
use Illuminate\Contracts\Debug\ExceptionHandler;
>>>>>>> c2dac53 (.)
use Illuminate\Database\Events\MigrationsEnded;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\File;
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\View;
use Modules\Xot\View\Composers\XotComposer;
=======
=======
>>>>>>> d9307de (fix: auto resolve conflict)
=======
>>>>>>> 7b67053 (fix: auto resolve conflict)
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\View;
<<<<<<< HEAD
use Modules\Xot\Exceptions\Handlers\HandlerDecorator;
use Modules\Xot\Exceptions\Handlers\HandlersRepository;
use Modules\Xot\Exceptions\Formatters\WebhookErrorFormatter;
=======
<<<<<<< HEAD
use Modules\Xot\Exceptions\Handlers\HandlerDecorator;
use Modules\Xot\Exceptions\Handlers\HandlersRepository;
use Modules\Xot\Exceptions\Formatters\WebhookErrorFormatter;
=======
use Modules\Xot\Exceptions\Formatters\WebhookErrorFormatter;
use Modules\Xot\Exceptions\Handlers\HandlerDecorator;
use Modules\Xot\Exceptions\Handlers\HandlersRepository;
>>>>>>> origin/dev
>>>>>>> origin/dev
use Modules\Xot\View\Composers\XotComposer;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
<<<<<<< HEAD
>>>>>>> e5c56c3 (.)
=======
=======
<<<<<<< HEAD
=======
>>>>>>> 4ab3760 (.)
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\View;
use Modules\Xot\View\Composers\XotComposer;
>>>>>>> 50bb41c (fix: auto resolve conflict)
>>>>>>> d9307de (fix: auto resolve conflict)
use Webmozart\Assert\Assert;

use function Safe\realpath;

<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
=======
>>>>>>> c2dac53 (.)
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\View;
use Modules\Xot\Exceptions\Formatters\WebhookErrorFormatter;
use Modules\Xot\Exceptions\Handlers\HandlerDecorator;
use Modules\Xot\Exceptions\Handlers\HandlersRepository;
use Modules\Xot\View\Composers\XotComposer;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Webmozart\Assert\Assert;

use function Safe\realpath;

/**
 * Class XotServiceProvider.
 */
class XotServiceProvider extends XotBaseServiceProvider
{
    public string $name = 'Xot';

    protected string $module_dir = __DIR__;

    protected string $module_ns = __NAMESPACE__;

    public function boot(): void
    {
        parent::boot();
        $this->redirectSSL();
        $this->registerViewComposers();
        $this->registerEvents();
<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< HEAD
        //$this->registerExceptionHandler(); // guardare come fa sentry
=======
<<<<<<< HEAD
        //$this->registerExceptionHandler(); // guardare come fa sentry
=======
        $this->registerExceptionHandler();
>>>>>>> origin/dev
>>>>>>> origin/dev
>>>>>>> e5c56c3 (.)
        $this->registerTimezone();
=======
<<<<<<< HEAD
        $this->registerViewComposers();
        $this->registerEvents();
        $this->registerTimezone();
<<<<<<< HEAD
=======
        // $this->registerTranslator(); to lang
        $this->registerViewComposers(); // rompe filament
        $this->registerEvents();
=======
>>>>>>> c2dac53 (.)
        $this->registerExceptionHandler();
        $this->registerTimezone();
        $this->registerProviders();
    }

    public function register(): void
    {
        parent::register();
        $this->registerConfig();
<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< HEAD
        //$this->registerExceptionHandlersRepository();
        //$this->extendExceptionHandler();
=======
<<<<<<< HEAD
        //$this->registerExceptionHandlersRepository();
        //$this->extendExceptionHandler();
=======
        $this->registerExceptionHandlersRepository();
        $this->extendExceptionHandler();
>>>>>>> origin/dev
>>>>>>> origin/dev
>>>>>>> e5c56c3 (.)
=======
        $this->registerExceptionHandlersRepository();
        $this->extendExceptionHandler();
>>>>>>> c2dac53 (.)
        $this->registerCommands();
    }

    public function registerProviders(): void
    {
        // $this->app->register(Filament\ModulesServiceProvider::class);
    }

    public function registerTimezone(): void
    {
        Assert::string($timezone = config('app.timezone') ?? 'Europe/Berlin', '['.__LINE__.']['.class_basename($this).']');
        Assert::string($date_format = config('app.date_format') ?? 'd/m/Y', '['.__LINE__.']['.class_basename($this).']');
        Assert::string($locale = config('app.locale') ?? 'it', '['.__LINE__.']['.class_basename($this).']');

        app()->setLocale($locale);
        Carbon::setLocale($locale);
        date_default_timezone_set($timezone);

        DateTimePicker::configureUsing(fn (DateTimePicker $component) => $component->timezone($timezone));
        DatePicker::configureUsing(fn (DatePicker $component) => $component->timezone($timezone)->displayFormat($date_format));
        TimePicker::configureUsing(fn (TimePicker $component) => $component->timezone($timezone));
        TextColumn::configureUsing(fn (TextColumn $column) => $column->timezone($timezone));
    }

<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> origin/dev
    /*
     * @see https://github.com/cerbero90/exception-handler
     --  guardare come fa sentry 
    public function registerExceptionHandler(): void
    {
        $exceptionHandler = $this->app->make(ExceptionHandler::class);
        if ($exceptionHandler instanceof HandlerDecorator) {
            $exceptionHandler->reporter(
                static function (\Throwable $e): void {
                    $data = (new WebhookErrorFormatter($e))->format();
                    if ($e instanceof AuthenticationException || $e instanceof NotFoundHttpException) {
                        return;
                    }

                    if (is_string(config('logging.channels.slack_errors.url'))
                        && mb_strlen(config('logging.channels.slack_errors.url')) > 5) {
                        Log::channel('slack_errors')
                            ->error($e->getMessage(), $data);
                    }
                }
            );
        }
    }
        */
<<<<<<< HEAD
=======
=======
=======
<<<<<<< HEAD
    }

    public function registerConfig(): void
<<<<<<< HEAD
=======
        // TextInput::configureUsing(fn (TextInput $component) => $component->validationMessages($validationMessages));
    }

>>>>>>> 50bb41c (fix: auto resolve conflict)
=======
>>>>>>> c2dac53 (.)
    /**
     * @see https://github.com/cerbero90/exception-handler
     */
    public function registerExceptionHandler(): void
    {
        $exceptionHandler = $this->app->make(ExceptionHandler::class);

        if ($exceptionHandler instanceof HandlerDecorator) {
            $exceptionHandler->reporter(
                static function (\Throwable $e): void {
                    $data = (new WebhookErrorFormatter($e))->format();
                    if ($e instanceof AuthenticationException || $e instanceof NotFoundHttpException) {
                        return;
                    }
                    if (is_string(config('logging.channels.slack_errors.url')) && mb_strlen(config('logging.channels.slack_errors.url')) > 5) {
                        Log::channel('slack_errors')->error($e->getMessage(), $data);
                    }
                }
            );
        }
    }

>>>>>>> e5c56c3 (.)
    public function registerConfig(): void
    {
        $config_file = realpath(__DIR__.'/../config/xot.php');
        $this->mergeConfigFrom($config_file, 'xot');
    }

    public function loadHelpersFrom(string $path): void
    {
        $files = File::files($path);
        foreach ($files as $file) {
            if ('php' !== $file->getExtension()) {
                continue;
            }
            $realPath = $file->getRealPath();
            if (false === $realPath) {
                continue;
            }
            include_once $realPath;
        }
    }

    protected function translatableComponents(): void
    {
        $components = [Field::class, BaseFilter::class, Placeholder::class, Column::class, Entry::class];
        foreach ($components as $component) {
            /* @var Configurable $component */
            $component::configureUsing(function (Component $translatable): void {
                /* @phpstan-ignore method.notFound */
                $translatable->translateLabel();
            });
        }
    }

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
>>>>>>> d9307de (fix: auto resolve conflict)
=======
>>>>>>> 7b67053 (fix: auto resolve conflict)
<<<<<<< HEAD
    /*
     * Register the custom exception handlers repository.
     -- guardare come fa sentry
=======
<<<<<<< HEAD
    /*
     * Register the custom exception handlers repository.
     -- guardare come fa sentry
=======
>>>>>>> 50bb41c (fix: auto resolve conflict)
=======
=======
>>>>>>> c2dac53 (.)
    /**
     * Register the custom exception handlers repository.
     */
    public function registerExceptionHandlersRepository(): void
    {
        $this->app->singleton(HandlersRepository::class, HandlersRepository::class);
    }

    /**
     * Extend the Laravel default exception handler.
     *
     * @see https://github.com/cerbero90/exception-handler/blob/master/src/Providers/ExceptionHandlerServiceProvider.php
     */
    private function extendExceptionHandler(): void
    {
        $this->app->extend(
            ExceptionHandler::class,
            static function (ExceptionHandler $handler, $app) {
                // @phpstan-ignore offsetAccess.nonOffsetAccessible, argument.type
                return new HandlerDecorator($handler, $app[HandlersRepository::class]);
            }
        );
    }

<<<<<<< HEAD
>>>>>>> origin/dev
>>>>>>> origin/dev
<<<<<<< HEAD
>>>>>>> e5c56c3 (.)
=======
=======

>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
<<<<<<< HEAD
>>>>>>> d9307de (fix: auto resolve conflict)
=======
=======
>>>>>>> 4ab3760 (.)
>>>>>>> 7b67053 (fix: auto resolve conflict)
=======
>>>>>>> c2dac53 (.)
    private function redirectSSL(): void
    {
        // --- meglio ficcare un controllo anche sull'env
        if (
            config('xra.forcessl') && (isset($_SERVER['SERVER_NAME']) && 'localhost' !== $_SERVER['SERVER_NAME']
            && isset($_SERVER['REQUEST_SCHEME']) && 'http' === $_SERVER['REQUEST_SCHEME'])
        ) {
            URL::forceScheme('https');
            /*
             * da fare in htaccess
             */
            if (! request()->secure() /* && in_array(env('APP_ENV'), ['stage', 'production']) */) {
                exit(redirect()->secure(request()->getRequestUri()));
            }
        }
    }

    /**
     * Undocumented function.
     *
     * @see https://medium.com/@dobron/running-laravel-ide-helper-generator-automatically-b909e75849d0
     */
    private function registerEvents(): void
    {
        Event::listen(
            MigrationsEnded::class,
            static function (): void {
                // Artisan::call('ide-helper:models -r -W');
            }
        );
    }

    private function registerViewComposers(): void
    {
        View::composer('*', XotComposer::class);
    }
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======


>>>>>>> e5c56c3 (.)
=======


=======
>>>>>>> 50bb41c (fix: auto resolve conflict)
>>>>>>> d9307de (fix: auto resolve conflict)
=======
>>>>>>> c2dac53 (.)
} // end class
