<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Widgets;

<<<<<<< HEAD
=======
use Filament\Forms;
>>>>>>> 9746d62 (.)
use Filament\Forms\Form;
use Illuminate\Support\Facades\Cache;
use Filament\Forms\Contracts\HasForms;
use Filament\Widgets\WidgetConfiguration;
use Filament\Widgets\Widget as FilamentWidget;
<<<<<<< HEAD
use Filament\Widgets\Concerns\InteractsWithPageFilters;
use Modules\Xot\Actions\View\GetViewByClassAction;
=======
use Modules\Xot\Actions\View\GetViewByClassAction;
use Filament\Widgets\Concerns\InteractsWithPageTable;
use Filament\Widgets\Concerns\InteractsWithPageFilters;
use Filament\Actions\Action;
>>>>>>> 9746d62 (.)

/**
 * @property bool $shouldRender
 *
 */
abstract class XotBaseWidget extends FilamentWidget implements HasForms
{
<<<<<<< HEAD
    use \Filament\Widgets\Concerns\InteractsWithPageFilters;
    use \Filament\Forms\Concerns\InteractsWithForms;

    public string $title = '';
    public string $icon = '';
    public ?array $data = [];
=======
    use InteractsWithPageFilters;
    //use InteractsWithPageTable;
    use Forms\Concerns\InteractsWithForms;
    
    public string $title = '';
    public string $icon = '';
    protected int|string|array $columnSpan = 'full';
>>>>>>> 9746d62 (.)
    /**
     * The view that should be rendered for the widget.
     *
     * This property allows either a string that can be rendered as a view
     * (prefixed with a namespace like 'module-name::view-name') or a path to a
     * Blade view file.
     *
     * @var view-string
     */
<<<<<<< HEAD
    protected static string $view='';


    public function __construct()
    {
        //parent::__construct();//Cannot call constructor
        if(static::$view ==''){
            $view = app(GetViewByClassAction::class)->execute(static::class);
            static::$view = $view;
        }

    }


    public function form(Form $form): Form
    {
        return $form
            ->schema($this->getFormSchema())
            ->statePath('data');
    }

    public function getFormSchema(): array
    {
        return [];
=======
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
        


    abstract public function getFormSchema(): array;

    final public function form(Form $form): Form
    {
        return $form
            ->schema($this->getFormSchema())
            ->columns(2)
            ->statePath('data');
    }

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

>>>>>>> 9746d62 (.)
    }
}
