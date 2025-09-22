<?php

<<<<<<< HEAD
declare(strict_types=1);


namespace Modules\Xot\Filament\Pages;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Forms\Get;
=======
namespace Modules\Xot\Filament\Pages;

use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\DatePicker;
>>>>>>> c4ec0fb6 (.)
use Filament\Pages\Dashboard as FilamentDashboard;

abstract class XotBaseDashboard extends FilamentDashboard
{
    use FilamentDashboard\Concerns\HasFiltersForm;
<<<<<<< HEAD

    protected static null|int $navigationSort = 1;
=======
    protected static ?int $navigationSort = 1;
>>>>>>> c4ec0fb6 (.)
    protected bool $persistsFiltersInSession = true;

    final public function filtersForm(Form $form): Form
    {
<<<<<<< HEAD
        return $form->schema([
            Section::make()->schema($this->getFiltersFormSchema())->columns(3),
        ]);
    }

    public function getFiltersFormSchema(): array
    {
        return [];
    }
}
=======
        return $form
            ->schema([
                Section::make()
                    ->schema($this->getFiltersFormSchema())
                    ->columns(3),
            ]);
    }


    public function getFiltersFormSchema():array{
        return [
           
        ];
    }
}



>>>>>>> c4ec0fb6 (.)
