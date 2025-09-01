<?php

namespace Modules\Xot\Filament\Pages;

<<<<<<< HEAD
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
=======
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\DatePicker;
>>>>>>> e697a77b (.)
use Filament\Pages\Dashboard as FilamentDashboard;

abstract class XotBaseDashboard extends FilamentDashboard
{
    use FilamentDashboard\Concerns\HasFiltersForm;
<<<<<<< HEAD

    protected static ?int $navigationSort = 1;

=======
    protected static ?int $navigationSort = 1;
>>>>>>> e697a77b (.)
    protected bool $persistsFiltersInSession = true;

    final public function filtersForm(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()
                    ->schema($this->getFiltersFormSchema())
                    ->columns(3),
            ]);
    }

<<<<<<< HEAD
    public function getFiltersFormSchema(): array
    {
        return [

        ];
    }
}
=======

    public function getFiltersFormSchema():array{
        return [
           
        ];
    }
}



>>>>>>> e697a77b (.)
