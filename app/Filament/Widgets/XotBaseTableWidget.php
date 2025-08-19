<?php

namespace Modules\Xot\Filament\Widgets;
use Filament\Tables\Table;
use Modules\Xot\Filament\Traits\TransTrait;
use Modules\Xot\Filament\Traits\HasXotTable;
use Filament\Widgets\TableWidget as FilamentTableWidget;

abstract class XotBaseTableWidget extends FilamentTableWidget
{
    use TransTrait;
    use HasXotTable;

    public function table(Table $table): Table
    {
        return parent::table($table)
        ->query($this->getTableQuery());
    }
}
