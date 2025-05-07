<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Widgets;

<<<<<<< HEAD
use Filament\Forms;
use Filament\Forms\Form;
use Illuminate\Support\Facades\Cache;
use Filament\Forms\Contracts\HasForms;
use Filament\Widgets\WidgetConfiguration;
use Filament\Widgets\Widget as FilamentWidget;
use Modules\Xot\Actions\View\GetViewByClassAction;
use Filament\Widgets\Concerns\InteractsWithPageTable;
use Filament\Widgets\Concerns\InteractsWithPageFilters;
use Filament\Actions\Action;
=======
<<<<<<< HEAD
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Actions\Action;
use Filament\Widgets\Widget as FilamentWidget;
use Filament\Forms\Contracts\HasForms;
use Filament\Widgets\WidgetConfiguration;
use Filament\Widgets\Concerns\InteractsWithPageTable;
use Filament\Widgets\Concerns\InteractsWithPageFilters;
use Illuminate\Support\Facades\Cache;
use Modules\Xot\Actions\View\GetViewByClassAction;
use Illuminate\Contracts\View\View;

/**
 * @property bool $shouldRender
 */
abstract class XotBaseWidget extends FilamentWidget implements HasForms
{
    use InteractsWithPageFilters;
    use Forms\Concerns\InteractsWithForms;

    public string $title = '';
    public string $icon = '';
    protected int|string|array $columnSpan = 'full';

=======
use Filament\Widgets\Widget as FilamentWidget;
use Illuminate\Support\Facades\Cache;
use Filament\Widgets\WidgetConfiguration;
use Filament\Widgets\Concerns\InteractsWithPageFilters;
use Modules\Xot\Actions\View\GetViewByClassAction;
>>>>>>> 3268b83 (.)

/**
 * @property bool $shouldRender
 *
 */
<<<<<<< HEAD
abstract class XotBaseWidget extends FilamentWidget implements HasForms
{
    use InteractsWithPageFilters;
    //use InteractsWithPageTable;
    use Forms\Concerns\InteractsWithForms;
    
    public string $title = '';
    public string $icon = '';
    protected int|string|array $columnSpan = 'full';
=======
abstract class XotBaseWidget extends FilamentWidget
{
    use InteractsWithPageFilters;
    public string $title = '';
    public string $icon = '';
>>>>>>> origin/dev
>>>>>>> 3268b83 (.)
    /**
     * The view that should be rendered for the widget.
     *
     * This property allows either a string that can be rendered as a view
     * (prefixed with a namespace like 'module-name::view-name') or a path to a
     * Blade view file.
<<<<<<< HEAD
     *
     * @var view-string
     */
    protected static string $view;
    

    public array $listener = [
        'filters-updated' => 'filtersUpdated',
      
    ];

    /*
    public function __construct()
    {
        //parent::__construct();//Cannot call constructor
        $view = app(GetViewByClassAction::class)->execute(static::class);
        if(view()->exists($view)){
            $this->view = $view;
        }
    }
    */
        

=======
<<<<<<< HEAD
     */
    protected static string $view = '';

    public array $listener = [
        'filters-updated' => 'filtersUpdated',
    ];

    public function __construct()
    {
        /** @var string $view */
        $view = app(GetViewByClassAction::class)->execute(static::class);
        if (view()->exists($view)) {
            static::$view = $view;
        }
    }
>>>>>>> 3268b83 (.)

    abstract public function getFormSchema(): array;

    final public function form(Form $form): Form
    {
        return $form
            ->schema($this->getFormSchema())
            ->columns(2)
            ->statePath('data');
    }

<<<<<<< HEAD
     protected function getFormActions(): array
=======
    protected function getFormActions(): array
>>>>>>> 3268b83 (.)
    {
        return [
            Action::make('save')
                ->label(__('filament-panels::resources/pages/edit-record.form.actions.save.label'))
                ->submit('save'),
        ];
    }

    public function save(): void
    {
<<<<<<< HEAD

=======
        // Implementazione del salvataggio
=======
     *
     * @var view-string
     */
    protected static string $view;


    public function __construct()
    {
        //parent::__construct();//Cannot call constructor
        $view = app(GetViewByClassAction::class)->execute(static::class);
        static::$view = $view;

>>>>>>> origin/dev
>>>>>>> 3268b83 (.)
    }
}
