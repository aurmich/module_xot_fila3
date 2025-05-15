<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Pages;

<<<<<<< Updated upstream
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< Updated upstream
<<<<<<< HEAD
>>>>>>> bdc979b (.)
=======
>>>>>>> Stashed changes
use Filament\Forms\Form;
use Filament\Pages\Page;
use Illuminate\Support\Str;
use Filament\Facades\Filament;
use Filament\Forms\Contracts\HasForms;
use Illuminate\Database\Eloquent\Model;
use Modules\Xot\Filament\Traits\TransTrait;
use Filament\Forms\Concerns\InteractsWithForms;
use Illuminate\Contracts\Auth\Authenticatable;
<<<<<<< Updated upstream
<<<<<<< HEAD
=======
=======
=======
use Filament\Forms\Form;
>>>>>>> Stashed changes
use Filament\Pages\Page;
use Illuminate\Support\Str;
use Filament\Facades\Filament;
use Filament\Forms\Contracts\HasForms;
use Illuminate\Database\Eloquent\Model;
use Modules\Xot\Filament\Traits\TransTrait;
<<<<<<< Updated upstream
>>>>>>> 4241492 (.)
=======
use Filament\Forms\Concerns\InteractsWithForms;
use Illuminate\Contracts\Auth\Authenticatable;
>>>>>>> Stashed changes
=======
use Filament\Pages\Page;
use Illuminate\Support\Str;
use Modules\Xot\Filament\Traits\TransTrait;
>>>>>>> 823c958 (.)
>>>>>>> bdc979b (.)
=======
>>>>>>> Stashed changes

/**
 * Undocumented class.
 *
 * @property ?string $model
 */
<<<<<<< Updated upstream
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< Updated upstream
<<<<<<< HEAD
>>>>>>> bdc979b (.)
abstract class XotBasePage extends Page implements HasForms
{
    use TransTrait;
    use InteractsWithForms;
<<<<<<< HEAD
=======
=======
abstract class XotBasePage extends Page
{
    use TransTrait;
>>>>>>> 4241492 (.)
=======
=======
>>>>>>> Stashed changes
abstract class XotBasePage extends Page implements HasForms
{
    use TransTrait;
    use InteractsWithForms;
<<<<<<< Updated upstream
>>>>>>> Stashed changes
=======
abstract class XotBasePage extends Page
{
    use TransTrait;
>>>>>>> 823c958 (.)
>>>>>>> bdc979b (.)
=======
>>>>>>> Stashed changes

    protected static ?string $navigationIcon = 'heroicon-o-computer-desktop';

    protected static string $view = 'job::filament.pages.job-monitor';

    protected static ?string $model = null; // ---
<<<<<<< Updated upstream
<<<<<<< HEAD
    public ?array $data = [];
=======
<<<<<<< HEAD
<<<<<<< Updated upstream
<<<<<<< HEAD
    public ?array $data = [];
=======
>>>>>>> 4241492 (.)
=======
    public ?array $data = [];
>>>>>>> Stashed changes
=======
>>>>>>> 823c958 (.)
>>>>>>> bdc979b (.)
=======
    public ?array $data = [];
>>>>>>> Stashed changes

    // public function mount(): void {
    //     $user = auth()->user();
    //     if(!$user->hasRole('super-admin')){
    //         redirect('/admin');
    //     }
    // }
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
<<<<<<< Updated upstream
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< Updated upstream
<<<<<<< HEAD
=======
>>>>>>> Stashed changes
>>>>>>> bdc979b (.)
=======
>>>>>>> Stashed changes

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
<<<<<<< Updated upstream
<<<<<<< HEAD
=======
<<<<<<< Updated upstream
=======
>>>>>>> 4241492 (.)
=======
>>>>>>> Stashed changes
=======
>>>>>>> 823c958 (.)
>>>>>>> bdc979b (.)
=======
>>>>>>> Stashed changes
}
