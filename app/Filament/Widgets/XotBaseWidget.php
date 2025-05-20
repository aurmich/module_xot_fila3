<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Widgets;

<<<<<<< HEAD
use Filament\Widgets\Widget as FilamentWidget;
use Illuminate\Support\Facades\Cache;
<<<<<<< Updated upstream
=======
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Concerns\InteractsWithForms;
>>>>>>> Stashed changes
use Filament\Widgets\WidgetConfiguration;
use Filament\Widgets\Concerns\InteractsWithPageFilters;
use Modules\Xot\Actions\View\GetViewByClassAction;
=======
use Filament\Forms;
use Filament\Forms\Form;
use Illuminate\Support\Facades\Cache;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Widgets\WidgetConfiguration;
use Filament\Widgets\Widget as FilamentWidget;
use Modules\Xot\Actions\View\GetViewByClassAction;
use Filament\Widgets\Concerns\InteractsWithPageTable;
use Filament\Widgets\Concerns\InteractsWithPageFilters;
use Filament\Actions\Action;
>>>>>>> 1459d55 (.)

/**
 * @property bool $shouldRender
 *
 */
<<<<<<< HEAD
abstract class XotBaseWidget extends FilamentWidget
{
    use InteractsWithPageFilters;
<<<<<<< Updated upstream
=======
    //use InteractsWithPageTable;
    use InteractsWithForms;
    
>>>>>>> Stashed changes
    public string $title = '';
    public string $icon = '';
=======
abstract class XotBaseWidget extends FilamentWidget implements HasForms
{
    use InteractsWithPageFilters;
    //use InteractsWithPageTable;
    use InteractsWithForms;

    public string $title = '';
    public string $icon = '';
    protected int|string|array $columnSpan = 'full';
>>>>>>> 1459d55 (.)
    /**
     * The view that should be rendered for the widget.
     *
     * This property allows either a string that can be rendered as a view
     * (prefixed with a namespace like 'module-name::view-name') or a path to a
     * Blade view file.
     *
     * @var view-string
     */
    protected static string $view;

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< Updated upstream

=======
    public ?array $data = [];

    /*
>>>>>>> Stashed changes
=======
=======
>>>>>>> ca9cba8 (.)

    public array $listener = [
        'filters-updated' => 'filtersUpdated',

    ];

    public ?array $data = [];

    /*
>>>>>>> 1459d55 (.)
    public function __construct()
    {
        //parent::__construct();//Cannot call constructor
        $view = app(GetViewByClassAction::class)->execute(static::class);
<<<<<<< HEAD
<<<<<<< Updated upstream
        static::$view = $view;
=======
=======
>>>>>>> 1459d55 (.)
        if(view()->exists($view)){
            $this->view = $view;
        }
    }
    */
    /*
    public function mount(): void
    {
        $this->form->fill();
<<<<<<< HEAD
<<<<<<< HEAD
    }    
=======
    }
>>>>>>> 1459d55 (.)
=======
    }
>>>>>>> ca9cba8 (.)
    */


    abstract public function getFormSchema(): array;

<<<<<<< HEAD
<<<<<<< HEAD
    /*
    final public function form(Form $form): Form
=======

    public function form(Form $form): Form
>>>>>>> 1459d55 (.)
=======

    public function form(Form $form): Form
>>>>>>> ca9cba8 (.)
    {
        return $form
            ->schema($this->getFormSchema())
            //->columns(2)
            ->statePath('data');
    }
<<<<<<< HEAD
<<<<<<< HEAD
    */
    
=======



>>>>>>> 1459d55 (.)
=======



>>>>>>> ca9cba8 (.)
     protected function getFormActions(): array
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
>>>>>>> Stashed changes
=======
>>>>>>> 1459d55 (.)

    }
}
