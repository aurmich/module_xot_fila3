<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Widgets;

<<<<<<< HEAD
use Filament\Widgets\Widget as FilamentWidget;
use Illuminate\Support\Facades\Cache;
use Filament\Widgets\WidgetConfiguration;
=======
use Illuminate\Support\Facades\Cache;
use Filament\Widgets\WidgetConfiguration;
use Filament\Widgets\Widget as FilamentWidget;
>>>>>>> e2a4c5d (.)
use Filament\Widgets\Concerns\InteractsWithPageFilters;
use Modules\Xot\Actions\View\GetViewByClassAction;

/**
 * @property bool $shouldRender
<<<<<<< HEAD
 *
=======
>>>>>>> e2a4c5d (.)
 */
abstract class XotBaseWidget extends FilamentWidget
{
    use InteractsWithPageFilters;
    public string $title = '';
    public string $icon = '';
<<<<<<< HEAD
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
=======
    protected static string $view = 'ui::empty';
>>>>>>> e2a4c5d (.)


    public function __construct()
    {
        //parent::__construct();//Cannot call constructor
<<<<<<< HEAD
        $view = app(GetViewByClassAction::class)->execute(static::class);
        static::$view = $view;

=======
        $view=app(GetViewByClassAction::class)->execute(static::class);
        static::$view=$view;
>>>>>>> e2a4c5d (.)
    }
}
