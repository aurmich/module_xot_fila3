<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Resources\Pages;

use Closure;
<<<<<<< HEAD
use Filament\Forms\ComponentContainer;
use Filament\Forms\Components\Component;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Pages\Concerns\InteractsWithFormActions;
use Filament\Pages\Page as FilamentPage;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Modules\Xot\Filament\Traits\NavigationLabelTrait;
use Modules\Xot\Filament\Traits\TransTrait;
use Webmozart\Assert\Assert;

=======
use Filament\Forms\Form;
use Illuminate\Support\Str;
use Webmozart\Assert\Assert;
use Illuminate\Support\Collection;
use Illuminate\Contracts\View\View;
use Filament\Forms\ComponentContainer;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Components\Component;
use Filament\Pages\Page as FilamentPage;
use Modules\Xot\Filament\Traits\TransTrait;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Pages\Concerns\InteractsWithFormActions;
use Modules\Xot\Filament\Traits\NavigationLabelTrait;
>>>>>>> c4ec0fb6 (.)
/**
 * Base class for all custom pages in the application.
 *
 * This class provides common functionality for custom pages,
 * following the architectural pattern of never extending Filament classes directly.
 *
 * @property ?string $model
 * @property ?array $data
 * @property ComponentContainer $form
<<<<<<< HEAD
 */
=======
*/
>>>>>>> c4ec0fb6 (.)
abstract class XotBasePage extends FilamentPage implements HasForms
{
    use InteractsWithForms;
    use NavigationLabelTrait;
    use TransTrait;
    use InteractsWithFormActions;

    /**
     * The model class associated with this page, if any.
     */
<<<<<<< HEAD
    public static null|string $model = null;
=======
    public static ?string $model = null;
>>>>>>> c4ec0fb6 (.)

    /**
     * The form data.
     *
     * @var array<string, mixed>
     */
<<<<<<< HEAD
    public null|array $data = [];

=======
    public ?array $data = [];

    
>>>>>>> c4ec0fb6 (.)
    /**
     * Get the view that should be used for the page.
     */
    public function getView(): string
    {
        if (isset(static::$view)) {
            return static::$view;
        }

        $view = Str::of(static::class)
            ->after('Modules\\')
            ->before('\\Filament\\')
            ->lower()
            ->append('::filament.pages.')
<<<<<<< HEAD
            ->append(
                Str::of(static::class)
                    ->afterLast('\\')
                    ->kebab()
                    ->toString(),
=======
            ->append(Str::of(static::class)
                ->afterLast('\\')
                ->kebab()
                ->toString()
>>>>>>> c4ec0fb6 (.)
            );

        return $view->toString();
    }

    /**
     * Get navigation label with automatic translation.
     */
    public static function getNavigationLabel(): string
    {
        return static::transFunc(__FUNCTION__);
    }

    /**
     * Get page title with automatic translation.
     */
    public function getTitle(): string
    {
        return static::transFunc(__FUNCTION__);
    }

    /**
     * Get the heading with automatic translation.
     */
    public function getHeading(): string
    {
        return $this->getTitle();
    }

    /**
     * Configure the form.
     */
    public function form(Form $form): Form
    {
<<<<<<< HEAD
        return $form->schema($this->getFormSchema())->statePath('data');
=======
        return $form
            ->schema($this->getFormSchema())
            ->statePath('data');
>>>>>>> c4ec0fb6 (.)
    }

    /**
     * Get the form schema for the page.
     *
     * @return array<string, Component>
     */
    protected function getFormSchema(): array
    {
        return [];
    }

    /**
     * Get the associated model class for this page.
     */
<<<<<<< HEAD
    public static function getModel(): null|string
=======
    public static function getModel(): ?string
>>>>>>> c4ec0fb6 (.)
    {
        /** @phpstan-ignore property.staticAccess */
        return static::$model;
    }

    /**
     * Get the resources associated with this page.
     *
     * @return Collection<string>
     */
    public static function getResources(): Collection
    {
        return collect();
    }

    /*
     * Hook chiamato all'inizializzazione del componente.
<<<<<<< HEAD
     *
     * public function mount(int|string $record): void
     * {
     * parent::mount($record);
     * $this->form->fill($this->data ?? []);
     * }
     */
=======
     
    public function mount(int|string $record): void
    {
        parent::mount($record);
        $this->form->fill($this->data ?? []);
    }
    */
>>>>>>> c4ec0fb6 (.)
    /**
     * Get the view data for the page.
     *
     * @return array<string, mixed>
     */
    protected function getViewData(): array
    {
        return [
            'data' => $this->data,
        ];
    }
}
