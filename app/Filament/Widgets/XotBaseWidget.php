<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Widgets;

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

/**
 * @property bool $shouldRender
 *
 */
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

<<<<<<< Updated upstream

=======
    public ?array $data = [];

    /*
>>>>>>> Stashed changes
    public function __construct()
    {
        //parent::__construct();//Cannot call constructor
        $view = app(GetViewByClassAction::class)->execute(static::class);
<<<<<<< Updated upstream
        static::$view = $view;
=======
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
    {
        return $form
            ->schema($this->getFormSchema())
            //->columns(2)
            ->statePath('data');
    }
    */
    
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
>>>>>>> Stashed changes

    }
}
