<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Pages;

use Filament\Forms\Form;
use Filament\Pages\Page;
use Illuminate\Support\Str;
use Filament\Facades\Filament;
use Filament\Forms\Contracts\HasForms;
use Illuminate\Database\Eloquent\Model;
use Modules\Xot\Filament\Traits\TransTrait;
use Filament\Forms\Concerns\InteractsWithForms;
use Illuminate\Contracts\Auth\Authenticatable;

/**
 * Undocumented class.
 *
 * @property ?string $model
 */
abstract class XotBasePage extends Page implements HasForms
{
    use TransTrait;
    use InteractsWithForms;

    protected static ?string $navigationIcon = 'heroicon-o-computer-desktop';

    protected static string $view = 'job::filament.pages.job-monitor';

    protected static ?string $model = null; // ---
    public ?array $data = [];

<<<<<<< HEAD
    // public function mount(): void {
    //     $user = auth()->user();
    //     if(!$user->hasRole('super-admin')){
    //         redirect('/admin');
    //     }
    // }
=======
    /**
     * Dati del form.
     * Contiene i dati del form durante la gestione della pagina.
     *
     * @var array<string, mixed>
     */
    public array $data = [];

    /**
     * Cache timeout per operazioni di cache (in secondi).
     */
    protected static int $cacheTimeout = 3600;

    /**
     * Ottiene il nome del modulo dalla classe.
     * Estrae il nome del modulo dal namespace della classe.
     *
     * @return string Il nome del modulo (es. '<nome progetto>', 'User', ecc.)
     */
>>>>>>> 02d219aa (♻️ (PathHelper.php, AnalyzePerformanceCommand.php, DayOfWeek.php, XotBasePage.php, XotBaseWidget.php, MCPModelServer.php, MCPService.php, XotComposer.php, README.md, structure.md): refactor code and update documentation to replace project-specific names with placeholders for better reusability and clarity across modules. This change enhances maintainability and allows for easier adaptation to different project contexts.)
    public static function getModuleName(): string
    {
        return Str::between(static::class, 'Modules\\', '\Filament');
    }

    public static function trans(string $key): string
    {
        $moduleNameLow = Str::lower(static::getModuleName());

        $p = Str::after(static::class, 'Filament\Pages\\');
        $p_arr = explode('\\', $p);
        /*
        dddx([
            'methods' => static::class,
            'p' => $p,
            'p_a' => $p_arr,
        ]);
        // */
        // RelationManager
        // $slug = Str::kebab(Str::before($p_arr[0], 'Resource'));
        // $slug .= '.'.Str::kebab(Str::before($p_arr[2], 'RelationManager'));

        // $modelNameSlug = Str::kebab(class_basename(static::class));

        $slug = collect($p_arr)->map(static fn ($item) => Str::kebab($item))->implode('.');
        $res = $moduleNameLow.'::'.$slug.'.'.$key;

        return __($res);
    }

    public static function getPluralModelLabel(): string
    {
        return static::transFunc(__FUNCTION__);
    }

    public static function getNavigationLabel(): string
    {
        return static::transFunc(__FUNCTION__);
        // return static::trans('navigation.plural');
    }

    public static function getNavigationGroup(): string
    {
        return static::transFunc(__FUNCTION__);
    }

    public function getModel(): string
    {
        // if (null != static::$model) {
        //    return static::$model;
        // }
        $moduleName = static::getModuleName();
        $modelName = Str::before(class_basename(static::class), 'Resource');
        $res = 'Modules\\'.$moduleName.'\Models\\'.$modelName;
        $this->model = $res;
        // self::$model = $res;

        return $res;
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema($this->getFormSchema())
            //->model($this->getUser())
            ->statePath('data');
    }

    protected function getFormSchema():array{
        return [];
    }

    protected function getUser(): Authenticatable&Model
    {
        $user = Filament::auth()->user();
        if (! $user instanceof Model) {
            throw new \Exception('The authenticated user object must be an Eloquent model to allow the profile page to update it.');
        }

        return $user;
    }
<<<<<<< HEAD
=======

    /**
     * Verifica se l'utente ha l'accesso alla pagina.
     * Utilizza il sistema di autorizzazioni per controllare l'accesso.
     *
     * @throws \Illuminate\Auth\Access\AuthorizationException Se l'utente non è autorizzato
     */
    protected function authorizeAccess(): void
    {
        $this->authorize('view', static::class);
    }

    /**
     * Verifica se l'utente ha un permesso specifico.
     * Utile per controlli granulari all'interno delle pagine.
     *
     * @param string $permission Il permesso da verificare
     * @return bool True se l'utente ha il permesso, false altrimenti
     */
    protected function hasPermissionTo(string $permission): bool
    {
        $user = $this->getUser();

        // Verifiamo che il metodo hasPermissionTo esista sull'utente
        if (!method_exists($user, 'hasPermissionTo')) {
            throw new \RuntimeException('Il modello utente deve implementare il metodo hasPermissionTo');
        }

        return $user->hasPermissionTo($permission);
    }

    /**
     * Ottiene la vista associata alla pagina.
     *
     * @return string Il percorso della vista
     */
    public function getView(): string
    {
        if (static::$view === '') {
            $view = app(GetViewByClassAction::class)->execute(static::class);
            if (view()->exists($view)) {
                return (string) $view;
            }

            // Se non troviamo una vista, lanciamo un'eccezione
            throw new \RuntimeException("Nessuna vista trovata per la classe: " . static::class);
        }

        return static::$view;
    }

    /**
     * Risolve il percorso della vista.
     *
     * @return string Il percorso della vista
     * @throws \RuntimeException Se la vista non esiste
     */
    protected function resolveViewPath(): string
    {
        $view = $this->getView();
        if (view()->exists($view)) {
            return $view;
        }

        throw new \RuntimeException("View [{$view}] not found for page: " . static::class);
    }

    /**
     * Ottiene una query builder per il modello associato alla pagina.
     *
     * @return Builder<Model>
     * @throws \LogicException Se il modello non è definito
     */
    protected function getQuery(): Builder
    {
        $modelClass = $this->getModel();

        if (!class_exists($modelClass)) {
            throw new \LogicException("Model class {$modelClass} does not exist");
        }

        /** @var class-string<Model> $modelClass */
        $instance = new $modelClass();
        if (!$instance instanceof Model) {
            throw new \LogicException("Class {$modelClass} must extend Eloquent Model");
        }

        /** @var Builder<Model> $query */
        $query = $modelClass::query();
        return $query;
    }

    /**
     * Invalida la cache per il modello specificato.
     *
     * @param class-string<Model>|null $modelClass
     * @param int|string|null $id
     * @return void
     */
    protected function invalidateCache(?string $modelClass = null, int|string|null $id = null): void
    {
        // Implementazione custom se necessaria
        // Per ora lasciamo vuoto, può essere implementato nelle classi figlie
    }
>>>>>>> 02d219aa (♻️ (PathHelper.php, AnalyzePerformanceCommand.php, DayOfWeek.php, XotBasePage.php, XotBaseWidget.php, MCPModelServer.php, MCPService.php, XotComposer.php, README.md, structure.md): refactor code and update documentation to replace project-specific names with placeholders for better reusability and clarity across modules. This change enhances maintainability and allows for easier adaptation to different project contexts.)
}
