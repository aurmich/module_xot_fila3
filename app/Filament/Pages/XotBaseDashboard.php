<?php

namespace Modules\Xot\Filament\Pages;

<<<<<<< HEAD
<<<<<<< HEAD
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
=======
use Filament\Forms\Form;
=======
use Filament\Forms\Form;
>>>>>>> 89d0c8f4 (.)
use Filament\Forms\Get;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\DatePicker;
<<<<<<< HEAD
>>>>>>> e697a77b (.)
=======
>>>>>>> 89d0c8f4 (.)
use Filament\Pages\Dashboard as FilamentDashboard;

abstract class XotBaseDashboard extends FilamentDashboard
{
    use FilamentDashboard\Concerns\HasFiltersForm;
<<<<<<< HEAD
<<<<<<< HEAD

    protected static ?int $navigationSort = 1;

=======
    protected static ?int $navigationSort = 1;
>>>>>>> e697a77b (.)
=======
    protected static ?int $navigationSort = 1;
>>>>>>> 89d0c8f4 (.)
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
<<<<<<< HEAD
    public function getFiltersFormSchema(): array
    {
        return [
=======
>>>>>>> 89d0c8f4 (.)

    public function getFiltersFormSchema():array{
        return [
           
        ];
    }
}
<<<<<<< HEAD
=======

    public function getFiltersFormSchema():array{
        return [
           
        ];
    }
}



>>>>>>> e697a77b (.)
=======



>>>>>>> 89d0c8f4 (.)
