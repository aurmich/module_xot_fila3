<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Widgets;

<<<<<<< HEAD
use Filament\Widgets\Widget as FilamentWidget;
=======
use Filament\Forms;
use Filament\Forms\Form;
use Illuminate\Support\Facades\Cache;
>>>>>>> a7dd3a3 (.)
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Widgets\Concerns\InteractsWithPageFilters;
use Modules\Xot\Actions\View\GetViewByClassAction;
use Filament\Forms\Form;
use Filament\Actions\Action;

/**
 * @property bool $shouldRender
 */
abstract class XotBaseWidget extends FilamentWidget implements HasForms
{
    use InteractsWithPageFilters;
    use InteractsWithForms;
    
    public string $title = '';
    public string $icon = '';
    protected int|string|array $columnSpan = 'full';
<<<<<<< HEAD

    abstract public function getFormSchema(): array;

    public function form(Form $form): Form
=======
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

    public ?array $data = [];

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
    /*
    public function mount(): void
    {
        $this->form->fill();
    }    
    */


    abstract public function getFormSchema(): array;

    /*
    final public function form(Form $form): Form
>>>>>>> a7dd3a3 (.)
    {
        return $form
            ->schema($this->getFormSchema())
            ->statePath('data');
    }
<<<<<<< HEAD

    protected function getFormActions(): array
=======
    */
    
     protected function getFormActions(): array
>>>>>>> a7dd3a3 (.)
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
        // Implementazione salvataggio
=======

>>>>>>> a7dd3a3 (.)
    }
}
