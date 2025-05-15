<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Widgets;

use Filament\Forms;
use Filament\Forms\Form;
use Illuminate\Support\Facades\Cache;
use Filament\Forms\Contracts\HasForms;
<<<<<<< HEAD
use Filament\Forms\Concerns\InteractsWithForms;
=======
>>>>>>> 4241492 (.)
use Filament\Widgets\WidgetConfiguration;
use Filament\Widgets\Widget as FilamentWidget;
use Modules\Xot\Actions\View\GetViewByClassAction;
use Filament\Widgets\Concerns\InteractsWithPageTable;
use Filament\Widgets\Concerns\InteractsWithPageFilters;
use Filament\Actions\Action;

/**
 * @property bool $shouldRender
 *
 */
abstract class XotBaseWidget extends FilamentWidget implements HasForms
{
    use InteractsWithPageFilters;
    //use InteractsWithPageTable;
<<<<<<< HEAD
    use InteractsWithForms;
=======
    use Forms\Concerns\InteractsWithForms;
>>>>>>> 4241492 (.)
    
    public string $title = '';
    public string $icon = '';
    protected int|string|array $columnSpan = 'full';
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
    

    public array $listener = [
        'filters-updated' => 'filtersUpdated',
      
    ];

<<<<<<< HEAD
    public ?array $data = [];

=======
>>>>>>> 4241492 (.)
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
<<<<<<< HEAD
    /*
    public function mount(): void
    {
        $this->form->fill();
    }    
    */
=======
        
>>>>>>> 4241492 (.)


    abstract public function getFormSchema(): array;

<<<<<<< HEAD
    /*
=======
>>>>>>> 4241492 (.)
    final public function form(Form $form): Form
    {
        return $form
            ->schema($this->getFormSchema())
<<<<<<< HEAD
            //->columns(2)
            ->statePath('data');
    }
    */
    
=======
            ->columns(2)
            ->statePath('data');
    }

>>>>>>> 4241492 (.)
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

    }
}
