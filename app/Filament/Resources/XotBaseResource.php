<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Resources;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Pages\SubNavigationPosition;
use Filament\Resources\Resource as FilamentResource;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Contracts\View\View;
use Illuminate\Support\HtmlString;
use Illuminate\Support\Str;
use Modules\Media\Actions\GetAttachmentsSchemaAction;
use Modules\Xot\Actions\ModelClass\CountAction;
use Modules\Xot\Filament\Traits\NavigationLabelTrait;
use Webmozart\Assert\Assert;

use function Safe\glob;

/**
 * @method static string getUrl(string $name, array<string, mixed> $parameters = [], bool $isAbsolute = true)
 */
abstract class XotBaseResource extends FilamentResource
{
    use NavigationLabelTrait;

<<<<<<< HEAD
    protected static null|string $model = null;
=======
    protected static ?string $model = null;
>>>>>>> c4ec0fb6 (.)

    // protected static ?string $navigationIcon = 'heroicon-o-bell';
    // protected static ?string $navigationLabel = 'Custom Navigation Label';
    // protected static ?string $activeNavigationIcon = 'heroicon-s-document-text';
    // protected static bool $shouldRegisterNavigation = false;
    // protected static ?string $navigationGroup = 'Parametri di Sistema';
    // protected static ?int $navigationSort = null;

    protected static SubNavigationPosition $subNavigationPosition = SubNavigationPosition::Top;

    public static function getModuleName(): string
    {
        return Str::between(static::class, 'Modules\\', '\Filament');
    }

    public function hasCombinedRelationManagerTabsWithContent(): bool
    {
        return true;
    }

    /**
     * @return class-string<\Illuminate\Database\Eloquent\Model>
     */
    public static function getModel(): string
    {
<<<<<<< HEAD
        if (static::$model !== null) {
            $res = static::$model;
            Assert::subclassOf(
                $res,
                \Illuminate\Database\Eloquent\Model::class,
                sprintf('Class %s must extend Eloquent Model', $res),
            );
=======
        if (static::$model != null) {
            $res = static::$model;
            Assert::subclassOf($res, \Illuminate\Database\Eloquent\Model::class, sprintf('Class %s must extend Eloquent Model', $res));
>>>>>>> c4ec0fb6 (.)

            return $res;
        }
        $moduleName = static::getModuleName();
        $modelName = Str::before(class_basename(static::class), 'Resource');
<<<<<<< HEAD
        $res = 'Modules\\' . $moduleName . '\Models\\' . $modelName;
        Assert::classExists($res, sprintf('Model class %s does not exist', $res));
        Assert::subclassOf(
            $res,
            \Illuminate\Database\Eloquent\Model::class,
            sprintf('Class %s must extend Eloquent Model', $res),
        );
=======
        $res = 'Modules\\'.$moduleName.'\Models\\'.$modelName;
        Assert::classExists($res, sprintf('Model class %s does not exist', $res));
        Assert::subclassOf($res, \Illuminate\Database\Eloquent\Model::class, sprintf('Class %s must extend Eloquent Model', $res));
>>>>>>> c4ec0fb6 (.)
        static::$model = $res;

        return $res;
    }

    /**
     * @return array<string|int,\Filament\Forms\Components\Component>
     */
    abstract public static function getFormSchema(): array;

    final public static function form(Form $form): Form
    {
<<<<<<< HEAD
        return $form->schema(static::getFormSchema());
=======
        return $form
            ->schema(static::getFormSchema());
>>>>>>> c4ec0fb6 (.)
    }

    /**
     * @return array<string, mixed>
     */
    public static function extendTableCallback(): array
    {
<<<<<<< HEAD
        return [];
=======
        return [
        ];
>>>>>>> c4ec0fb6 (.)
    }

    /**
     * Get form extension callbacks.
     *
     * @return array<string, mixed>
     */
    public static function extendFormCallback(): array
    {
<<<<<<< HEAD
        return [];
    }

    public static function getNavigationBadge(): null|string
=======
        return [
        ];
    }

    public static function getNavigationBadge(): ?string
>>>>>>> c4ec0fb6 (.)
    {
        try {
            $count = app(CountAction::class)->execute(static::getModel());

<<<<<<< HEAD
            return number_format($count, 0) . '';
=======
            return number_format($count, 0).'';
>>>>>>> c4ec0fb6 (.)
        } catch (\Exception $e) {
            return '--';
        }
    }

    /**
     * @return array<string, \Filament\Resources\Pages\PageRegistration>
     */
    public static function getPages(): array
    {
<<<<<<< HEAD
        $prefix = static::class . '\Pages\\';
        $name = Str::of(class_basename(static::class))->before('Resource')->toString();
        $plural = Str::of($name)->plural()->toString();
        $index = Str::of($prefix)->append('List' . $plural)->toString();
        $create = Str::of($prefix)->append('Create' . $name . '')->toString();
        $edit = Str::of($prefix)->append('Edit' . $name . '')->toString();
        $view = Str::of($prefix)->append('View' . $name . '')->toString();
=======
        $prefix = static::class.'\Pages\\';
        $name = Str::of(class_basename(static::class))->before('Resource')->toString();
        $plural = Str::of($name)->plural()->toString();
        $index = Str::of($prefix)->append('List'.$plural)->toString();
        $create = Str::of($prefix)->append('Create'.$name.'')->toString();
        $edit = Str::of($prefix)->append('Edit'.$name.'')->toString();
        $view = Str::of($prefix)->append('View'.$name.'')->toString();
>>>>>>> c4ec0fb6 (.)

        /** @var class-string<\Filament\Resources\Pages\Page> $index */
        $index = $index;
        /** @var class-string<\Filament\Resources\Pages\Page> $create */
        $create = $create;
        /** @var class-string<\Filament\Resources\Pages\Page> $edit */
        $edit = $edit;
        /** @var class-string<\Filament\Resources\Pages\Page> $view */
        $view = $view;

        /** @var array<string, \Filament\Resources\Pages\PageRegistration> $pages */
        $pages = [
            'index' => $index::route('/'),
            'create' => $create::route('/create'),
            'edit' => $edit::route('/{record}/edit'),
            // 'view' => $view::route('/{record}'),
        ];

        if (class_exists($view)) {
            $pages['view'] = $view::route('/{record}');
        }

        return $pages;
    }

    /**
     * @return array<class-string<\Filament\Resources\RelationManagers\RelationManager>|\Filament\Resources\RelationManagers\RelationGroup|\Filament\Resources\RelationManagers\RelationManagerConfiguration>
     */
    public static function getRelations(): array
    {
        $reflector = new \ReflectionClass(static::class);
        $filename = $reflector->getFileName();
<<<<<<< HEAD
        Assert::string($filename, __FILE__ . ':' . __LINE__ . ' - ' . class_basename(__CLASS__));
=======
        Assert::string($filename);
>>>>>>> c4ec0fb6 (.)

        $path = Str::of($filename)
            ->before('.php')
            ->append(DIRECTORY_SEPARATOR)
            ->append('RelationManagers')
            ->toString();

<<<<<<< HEAD
        $files = glob($path . DIRECTORY_SEPARATOR . '*RelationManager.php');
=======
        $files = glob($path.DIRECTORY_SEPARATOR.'*RelationManager.php');
>>>>>>> c4ec0fb6 (.)
        Assert::isArray($files);

        /** @var array<class-string<\Filament\Resources\RelationManagers\RelationManager>> $res */
        $res = [];
        foreach ($files as $file) {
            $className = Str::of($file)
<<<<<<< HEAD
                ->after('RelationManagers' . DIRECTORY_SEPARATOR)
                ->before('.php')
                ->prepend(static::class . '\RelationManagers\\')
=======
                ->after('RelationManagers'.DIRECTORY_SEPARATOR)
                ->before('.php')
                ->prepend(static::class.'\RelationManagers\\')
>>>>>>> c4ec0fb6 (.)
                ->toString();

            if (class_exists($className)) {
                Assert::subclassOf($className, \Filament\Resources\RelationManagers\RelationManager::class);
                $res[] = $className;
            }
        }

        return $res;
    }

    public static function getWizardSubmitAction(): Htmlable
    {
        $submit_view = 'pub_theme::filament.wizard.submit-button';
        //@phpstan-ignore-next-line
<<<<<<< HEAD
        if (!view()->exists($submit_view)) {
=======
        if (! view()->exists($submit_view)) {
>>>>>>> c4ec0fb6 (.)
            throw new \Exception("View {$submit_view} does not exist");
        }
        $render = view($submit_view)->render();

        return new HtmlString($render);
    }

    /**
     * Get attachments schema for forms.
     *
     * @return array<int, \Filament\Forms\Components\Component>
     */
    public static function getAttachmentsSchema(bool $multiple = true): array
    {
        $model = static::getModel();
<<<<<<< HEAD
        if (!method_exists($model, 'getAttachments')) {
=======
        if (! method_exists($model, 'getAttachments')) {
>>>>>>> c4ec0fb6 (.)
            return [];
        }
        $attachments = $model::getAttachments();
        $disk = 'attachments';
        $schema = app(GetAttachmentsSchemaAction::class)->execute($attachments, $disk);

        return $schema;
    }

    protected static function getStepByName(string $name): Forms\Components\Wizard\Step
    {
<<<<<<< HEAD
        $schema = Str::of($name)
            ->snake()
            ->studly()
            ->prepend('get')
            ->append('Schema')
            ->toString();

        return Forms\Components\Wizard\Step::make($name)->schema(static::$schema());
=======
        $schema = Str::of($name)->snake()->studly()->prepend('get')->append('Schema')->toString();

        return Forms\Components\Wizard\Step::make($name)
            ->schema(static::$schema());
>>>>>>> c4ec0fb6 (.)
    }
}
