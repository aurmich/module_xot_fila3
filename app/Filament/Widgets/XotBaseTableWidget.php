<?php

namespace Modules\Xot\Filament\Widgets;
<<<<<<< HEAD
use Filament\Tables\Table;
use Modules\Xot\Filament\Traits\TransTrait;
use Modules\Xot\Filament\Traits\HasXotTable;
=======
use Modules\Xot\Filament\Traits\TransTrait;
>>>>>>> 995f7cae (.)
use Filament\Widgets\TableWidget as FilamentTableWidget;

abstract class XotBaseTableWidget extends FilamentTableWidget
{
    use TransTrait;
<<<<<<< HEAD
    use HasXotTable;

    public function table(Table $table): Table
    {
        return parent::table($table)
        ->query($this->getTableQuery());
    }
=======
>>>>>>> 995f7cae (.)
}
