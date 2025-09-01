<?php

/**
 * @see https://medium.com/@laravelprotips/filament-streamline-multiple-widgets-with-one-dynamic-livewire-filter-ed05c978a97f
 */

declare(strict_types=1);

namespace Modules\Xot\Filament\Pages;

<<<<<<< HEAD
<<<<<<< HEAD
=======
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Pages\Dashboard as BaseBashboard;
use Filament\Pages\Dashboard\Concerns\HasFiltersForm;
>>>>>>> 89d0c8f4 (.)
use Filament\Widgets\Widget;
use Filament\Widgets\WidgetConfiguration;


class Dashboard extends XotBaseDashboard
{
<<<<<<< HEAD
=======
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Pages\Dashboard as BaseBashboard;
use Filament\Pages\Dashboard\Concerns\HasFiltersForm;
use Filament\Widgets\Widget;
use Filament\Widgets\WidgetConfiguration;


class Dashboard extends XotBaseDashboard
{
    
>>>>>>> e697a77b (.)
=======
    
>>>>>>> 89d0c8f4 (.)
    /**
     * @return array<class-string<Widget>|WidgetConfiguration>
     */
    public function getWidgets(): array
    {
        return [];
    }
<<<<<<< HEAD
<<<<<<< HEAD
=======

    
>>>>>>> e697a77b (.)
=======

    
>>>>>>> 89d0c8f4 (.)
}
