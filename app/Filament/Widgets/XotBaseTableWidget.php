<?php

namespace Modules\Xot\Filament\Widgets;
<<<<<<< HEAD
use Modules\Xot\Filament\Traits\TransTrait;
=======
use Filament\Tables\Table;
use Modules\Xot\Filament\Traits\TransTrait;
use Modules\Xot\Filament\Traits\HasXotTable;
>>>>>>> 7ce328e (.)
use Filament\Widgets\TableWidget as FilamentTableWidget;

abstract class XotBaseTableWidget extends FilamentTableWidget
{
    use TransTrait;
<<<<<<< HEAD
=======
    use HasXotTable;

    public function table(Table $table): Table
    {
        return parent::table($table)
        ->query($this->getTableQuery());
    }
>>>>>>> 7ce328e (.)
}
