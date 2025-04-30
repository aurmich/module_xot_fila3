<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Widgets;

<<<<<<< HEAD
use Filament\Forms\Form;
use Illuminate\Support\Facades\Cache;
use Filament\Forms\Contracts\HasForms;
use Filament\Widgets\WidgetConfiguration;
use Filament\Widgets\Widget as FilamentWidget;
=======
use Filament\Widgets\Widget as FilamentWidget;
use Illuminate\Support\Facades\Cache;
use Filament\Widgets\WidgetConfiguration;
>>>>>>> aurmich/dev
use Filament\Widgets\Concerns\InteractsWithPageFilters;
use Modules\Xot\Actions\View\GetViewByClassAction;

/**
 * @property bool $shouldRender
 *
 */
<<<<<<< HEAD
abstract class XotBaseWidget extends FilamentWidget implements HasForms
{
    use \Filament\Widgets\Concerns\InteractsWithPageFilters;
    use \Filament\Forms\Concerns\InteractsWithForms;

    public string $title = '';
    public string $icon = '';
    public ?array $data = [];
=======
abstract class XotBaseWidget extends FilamentWidget
{
    use InteractsWithPageFilters;
    public string $title = '';
    public string $icon = '';
>>>>>>> aurmich/dev
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
=======
    protected static string $view;
>>>>>>> aurmich/dev


    public function __construct()
    {
        //parent::__construct();//Cannot call constructor
<<<<<<< HEAD
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
    }
=======
        $view = app(GetViewByClassAction::class)->execute(static::class);
        static::$view = $view;

    }
>>>>>>> aurmich/dev
}
