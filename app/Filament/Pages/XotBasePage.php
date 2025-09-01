<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Pages;

use Filament\Actions\Action;
use Filament\Facades\Filament;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Pages\Page as FilamentPage;
<<<<<<< HEAD
<<<<<<< HEAD
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
=======
use Illuminate\Support\Str;
use Webmozart\Assert\Assert;
>>>>>>> 89d0c8f4 (.)
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Contracts\Auth\Authenticatable;
use Modules\Xot\Actions\View\GetViewByClassAction;
use Modules\Xot\Filament\Traits\TransTrait;
<<<<<<< HEAD
use Webmozart\Assert\Assert;
=======
use Illuminate\Support\Str;
use Webmozart\Assert\Assert;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Contracts\Auth\Authenticatable;
use Modules\Xot\Actions\View\GetViewByClassAction;
use Modules\Xot\Filament\Traits\TransTrait;
>>>>>>> e697a77b (.)
=======
>>>>>>> 89d0c8f4 (.)

/**
 * Classe base astratta per tutte le pagine Filament non legate a risorse specifiche.
 * Fornisce funzionalità comuni e standardizzate per la gestione delle pagine.
 *
 * Implementa:
 * - Sistema di traduzioni integrato
 * - Gestione autorizzazioni
 * - Integrazione con form
 * - Rilevamento intelligente modello
 * - Metodi helper comuni
 *
<<<<<<< HEAD
<<<<<<< HEAD
 * @property ?string $model Il modello associato alla pagina
 * @property array<string, mixed> $data I dati del form
=======
 * @property ?string              $model Il modello associato alla pagina
 * @property array<string, mixed> $data  I dati del form
>>>>>>> e697a77b (.)
=======
 * @property ?string              $model Il modello associato alla pagina
 * @property array<string, mixed> $data  I dati del form
>>>>>>> 89d0c8f4 (.)
 *
 * @see \Modules\Xot\docs\xotbasepage_implementation.md Documentazione completa
 */
abstract class XotBasePage extends FilamentPage implements HasForms
{
<<<<<<< HEAD
<<<<<<< HEAD
    use InteractsWithForms;
=======
>>>>>>> 89d0c8f4 (.)
    use TransTrait;
    use InteractsWithForms;

<<<<<<< HEAD
=======
    use TransTrait;
    use InteractsWithForms;

    
>>>>>>> e697a77b (.)
=======
    
>>>>>>> 89d0c8f4 (.)
    /**
     * Vista predefinita per la pagina.
     * Deve essere sovrascritta nelle classi figlie.
     */
    protected static string $view = '';

    /**
     * Modello associato alla pagina.
     * Se non specificato, verrà dedotto automaticamente dal nome della classe.
     *
     * @var class-string<Model>|null
     */
    public static ?string $model = null;

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
     * @return string Il nome del modulo (es. 'SaluteOra', 'User', ecc.)
     */
    public static function getModuleName(): string
    {
        $namespace = static::class;
        $moduleName = Str::between($namespace, 'Modules\\', '\\Filament');

<<<<<<< HEAD
<<<<<<< HEAD
        if ($moduleName === '') {
=======
        if ('' === $moduleName) {
>>>>>>> e697a77b (.)
=======
        if ('' === $moduleName) {
>>>>>>> 89d0c8f4 (.)
            throw new \LogicException(sprintf('Cannot extract module name from class %s', static::class));
        }

        return $moduleName;
    }

    /**
     * Ottiene la chiave di traduzione per un dato key.
     * Genera un percorso di traduzione standardizzato basato sul modulo e sul nome della classe.
     *
<<<<<<< HEAD
<<<<<<< HEAD
     * @param  string  $key  La chiave di traduzione specifica
     * @param  array<string, bool|float|int|string>  $replace  Parametri di sostituzione per la traduzione
     * @param  string|null  $locale  Locale da utilizzare (null = locale corrente)
     * @param  bool  $useFallback  Se true, utilizza la chiave come fallback se la traduzione non esiste
=======
=======
>>>>>>> 89d0c8f4 (.)
     * @param string $key La chiave di traduzione specifica
     * @param array<string, bool|float|int|string> $replace Parametri di sostituzione per la traduzione
     * @param string|null $locale Locale da utilizzare (null = locale corrente)
     * @param bool $useFallback Se true, utilizza la chiave come fallback se la traduzione non esiste
     *
<<<<<<< HEAD
>>>>>>> e697a77b (.)
=======
>>>>>>> 89d0c8f4 (.)
     * @return string La stringa tradotta o la chiave originale se non trovata
     */
    public static function trans(string $key, array $replace = [], ?string $locale = null, bool $useFallback = true): string
    {
        $moduleNameLow = Str::lower(static::getModuleName());
        $p = Str::after(static::class, 'Filament\\Pages\\');
        $p_arr = explode('\\', $p);
        $slug = collect($p_arr)->map(static fn (string $item): string => Str::kebab($item))->implode('.');

        $translationKey = $moduleNameLow.'::'.$slug.'.'.$key;
        $translation = __($translationKey, $replace, $locale);

        if ($translation === $translationKey && App::environment('local', 'development', 'testing')) {
            Log::warning("Traduzione mancante: {$translationKey}");

            return $useFallback ? $key : $translationKey;
        }

        return (string) $translation;
    }

    /**
     * Ottiene l'etichetta plurale del modello.
     *
     * @return string L'etichetta plurale del modello
     */
    public static function getPluralModelLabel(): string
    {
        return static::trans('plural_label');
    }

    /**
     * Ottiene il gruppo di navigazione.
     *
     * @return string Il gruppo di navigazione
     */
    public static function getNavigationGroup(): string
    {
        return static::transFunc(__FUNCTION__);
    }

    /**
     * Ottiene il modello associato alla pagina.
     * Se non specificato esplicitamente, tenta di dedurlo dal nome della classe.
     *
     * @return class-string<Model> Il namespace completo della classe del modello
     */
    public function getModel(): string
    {
        /** @phpstan-ignore property.staticAccess */
        if (static::$model !== null) {
            /** @var class-string<Model> $model */
            /** @phpstan-ignore property.staticAccess */
            $model = static::$model;

            return $model;
        }

        $moduleName = static::getModuleName();
        $className = class_basename(static::class);

        // Rimuove suffissi comuni per ottenere il nome del modello
        $modelName = Str::of($className)
            ->before('Resource')
            ->before('Page')
            ->before('Dashboard')
            ->before('Report')
            ->trim()
            ->toString();

<<<<<<< HEAD
<<<<<<< HEAD
        if ($modelName === '') {
=======
        if ('' === $modelName) {
>>>>>>> e697a77b (.)
=======
        if ('' === $modelName) {
>>>>>>> 89d0c8f4 (.)
            throw new \LogicException(sprintf('Cannot determine model name from class %s', static::class));
        }

        $modelNamespace = 'Modules\\'.$moduleName.'\\Models\\'.$modelName;

        // Verifica che la classe del modello esista
        if (! class_exists($modelNamespace)) {
            throw new \LogicException("Model class {$modelNamespace} does not exist");
        }
        Assert::classExists($modelNamespace);
        Assert::isInstanceOf($modelNamespace, Model::class);
<<<<<<< HEAD
<<<<<<< HEAD

=======
>>>>>>> e697a77b (.)
=======
>>>>>>> 89d0c8f4 (.)
        /* @var class-string<Model> $modelNamespace */
        return $modelNamespace;
    }

    /**
     * Configura il form della pagina.
     * Imposta lo schema e il percorso dello stato per il form.
     *
<<<<<<< HEAD
<<<<<<< HEAD
     * @param  Form  $form  Il form da configurare
=======
     * @param Form $form Il form da configurare
     *
>>>>>>> e697a77b (.)
=======
     * @param Form $form Il form da configurare
     *
>>>>>>> 89d0c8f4 (.)
     * @return Form Il form configurato
     */
    public function form(Form $form): Form
    {
        $form = $form->schema($this->getFormSchema());

        $form->statePath('data');
<<<<<<< HEAD
<<<<<<< HEAD

        $debounce = $this->getAutosaveDebounce();
        if ($debounce !== null && method_exists($form, 'autosaveDebounce')) {
=======
        
        $debounce = $this->getAutosaveDebounce();
        if (null !== $debounce && method_exists($form, 'autosaveDebounce')) {
>>>>>>> e697a77b (.)
=======
        
        $debounce = $this->getAutosaveDebounce();
        if (null !== $debounce && method_exists($form, 'autosaveDebounce')) {
>>>>>>> 89d0c8f4 (.)
            $form->autosaveDebounce($debounce);
        }

        return $form;
    }

    /**
     * Ottiene il tempo di debounce per l'autosave in millisecondi.
     * Sovrascrivere nelle classi figlie per modificare questo valore.
     *
     * @return int|null Il tempo di debounce in millisecondi o null per disabilitare l'autosave
     */
    protected function getAutosaveDebounce(): ?int
    {
        return null; // Disabilitato per default
    }

<<<<<<< HEAD
<<<<<<< HEAD
=======
    
    

>>>>>>> e697a77b (.)
=======
    
    

>>>>>>> 89d0c8f4 (.)
    /**
     * Ottiene l'utente autenticato.
     * Verifica che l'utente sia un'istanza di Model per permettere aggiornamenti.
     *
<<<<<<< HEAD
<<<<<<< HEAD
     *
     * @return Authenticatable&Model L'utente autenticato
     *
     * @throws \RuntimeException Se l'utente non è autenticato o non è un'istanza di Model
=======
     * @throws \RuntimeException Se l'utente non è autenticato o non è un'istanza di Model
     *
     * @return Authenticatable&Model L'utente autenticato
>>>>>>> e697a77b (.)
=======
     * @throws \RuntimeException Se l'utente non è autenticato o non è un'istanza di Model
     *
     * @return Authenticatable&Model L'utente autenticato
>>>>>>> 89d0c8f4 (.)
     */
    protected function getUser(): Authenticatable&Model
    {
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
            throw new \RuntimeException('Nessun utente autenticato trovato.');
        }

        if (! $user instanceof Model) {
            throw new \RuntimeException('L\'utente autenticato deve essere un modello Eloquent per permettere aggiornamenti.');
        }

        /* @var Authenticatable&Model $user */
        return $user;
    }

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
<<<<<<< HEAD
<<<<<<< HEAD
     * @param  string  $permission  Il permesso da verificare
=======
     * @param string $permission Il permesso da verificare
     *
>>>>>>> e697a77b (.)
=======
     * @param string $permission Il permesso da verificare
     *
>>>>>>> 89d0c8f4 (.)
     * @return bool True se l'utente ha il permesso, false altrimenti
     */
    protected function hasPermissionTo(string $permission): bool
    {
        $user = $this->getUser();

        // Verifiamo che il metodo hasPermissionTo esista sull'utente
<<<<<<< HEAD
<<<<<<< HEAD
        // if (!method_exists($user, 'hasPermissionTo')) {
        //    throw new \RuntimeException('Il modello utente deve implementare il metodo hasPermissionTo');
        // }
=======
        //if (!method_exists($user, 'hasPermissionTo')) {
        //    throw new \RuntimeException('Il modello utente deve implementare il metodo hasPermissionTo');
        //}
>>>>>>> e697a77b (.)
=======
        //if (!method_exists($user, 'hasPermissionTo')) {
        //    throw new \RuntimeException('Il modello utente deve implementare il metodo hasPermissionTo');
        //}
>>>>>>> 89d0c8f4 (.)

        return $user->hasPermissionTo($permission);
    }

    /**
     * Ottiene la vista associata alla pagina.
     *
     * @return string Il percorso della vista
     */
    public function getView(): string
    {
<<<<<<< HEAD
<<<<<<< HEAD
        if (static::$view === '') {
=======
        if ('' === static::$view) {
>>>>>>> e697a77b (.)
=======
        if ('' === static::$view) {
>>>>>>> 89d0c8f4 (.)
            $view = app(GetViewByClassAction::class)->execute(static::class);
            if (view()->exists($view)) {
                return (string) $view;
            }

            // Se non troviamo una vista, lanciamo un'eccezione
            throw new \RuntimeException('Nessuna vista trovata per la classe: '.static::class);
        }

        return static::$view;
    }

    /**
     * Risolve il percorso della vista.
     *
<<<<<<< HEAD
<<<<<<< HEAD
     *
     * @return string Il percorso della vista
     *
     * @throws \RuntimeException Se la vista non esiste
=======
     * @throws \RuntimeException Se la vista non esiste
     *
     * @return string Il percorso della vista
>>>>>>> e697a77b (.)
=======
     * @throws \RuntimeException Se la vista non esiste
     *
     * @return string Il percorso della vista
>>>>>>> 89d0c8f4 (.)
     */
    protected function resolveViewPath(): string
    {
        $view = $this->getView();
        if (view()->exists($view)) {
            return $view;
        }

        throw new \RuntimeException("View [{$view}] not found for page: ".static::class);
    }

    /**
     * Ottiene una query builder per il modello associato alla pagina.
     *
<<<<<<< HEAD
<<<<<<< HEAD
     *
     * @return Builder<Model>
     *
     * @throws \LogicException Se il modello non è definito
=======
     * @throws \LogicException Se il modello non è definito
     *
     * @return Builder<Model>
>>>>>>> e697a77b (.)
=======
     * @throws \LogicException Se il modello non è definito
     *
     * @return Builder<Model>
>>>>>>> 89d0c8f4 (.)
     */
    protected function getQuery(): Builder
    {
        $modelClass = $this->getModel();

        if (! class_exists($modelClass)) {
            throw new \LogicException("Model class {$modelClass} does not exist");
        }

        /** @var class-string<Model> $modelClass */
<<<<<<< HEAD
<<<<<<< HEAD
        $instance = new $modelClass;
=======
        $instance = new $modelClass();
>>>>>>> e697a77b (.)
=======
        $instance = new $modelClass();
>>>>>>> 89d0c8f4 (.)
        if (! $instance instanceof Model) {
            throw new \LogicException("Class {$modelClass} must extend Eloquent Model");
        }

        /** @var Builder<Model> $query */
        $query = $modelClass::query();

        return $query;
    }

    /**
     * Invalida la cache per il modello specificato.
     *
<<<<<<< HEAD
<<<<<<< HEAD
     * @param  class-string<Model>|null  $modelClass
=======
     * @param class-string<Model>|null $modelClass
>>>>>>> e697a77b (.)
=======
     * @param class-string<Model>|null $modelClass
>>>>>>> 89d0c8f4 (.)
     */
    protected function invalidateCache(?string $modelClass = null, int|string|null $id = null): void
    {
        // Implementazione custom se necessaria
        // Per ora lasciamo vuoto, può essere implementato nelle classi figlie
    }

    protected function getFormActions(): array
    {
        return [
            Action::make('save')
                ->label(__('filament-panels::resources/pages/edit-record.form.actions.save.label'))
                ->submit('save'),
        ];
    }
}
