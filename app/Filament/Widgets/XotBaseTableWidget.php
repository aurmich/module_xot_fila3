<?php

namespace Modules\Xot\Filament\Widgets;
<<<<<<< HEAD
<<<<<<< HEAD
use Filament\Tables\Table;
use Modules\Xot\Filament\Traits\TransTrait;
use Modules\Xot\Filament\Traits\HasXotTable;
=======
use Modules\Xot\Filament\Traits\TransTrait;
>>>>>>> 995f7cae (.)
=======
use Filament\Tables\Table;
use Modules\Xot\Filament\Traits\TransTrait;
use Modules\Xot\Filament\Traits\HasXotTable;
>>>>>>> 75fe9751 (.)
use Filament\Widgets\TableWidget as FilamentTableWidget;

abstract class XotBaseTableWidget extends FilamentTableWidget
{
    use TransTrait;
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 75fe9751 (.)
    use HasXotTable;

    public function table(Table $table): Table
    {
        return parent::table($table)
        ->query($this->getTableQuery());
    }
<<<<<<< HEAD
=======
>>>>>>> 995f7cae (.)
=======
>>>>>>> 75fe9751 (.)
}
