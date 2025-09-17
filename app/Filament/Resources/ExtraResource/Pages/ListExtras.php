<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Resources\ExtraResource\Pages;

use Filament\Tables;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Modules\Xot\Filament\Resources\ExtraResource;
use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;


/**
 * @see ExtraResource
 */
class ListExtras extends XotBaseListRecords
{
    protected static string $resource = ExtraResource::class;

<<<<<<< HEAD
=======
    #[\Override]
>>>>>>> 887d760 (.)
    public function getTableColumns(): array
    {
        return [
            'id' => TextColumn::make('id')
                ->sortable()
                ->label('ID'),

            'model_type' => TextColumn::make('model_type')
                ->searchable()
                ->label('Model Type'),

            'model_id' => TextColumn::make('model_id')
                ->sortable()
                ->label('Model ID'),

            'extra_attributes' => TextColumn::make('extra_attributes')
                ->searchable()
                ->label('Extra Attributes'),
        ];
    }

    /**
     * @return array<Tables\Filters\BaseFilter>
     */
<<<<<<< HEAD
=======
    #[\Override]
>>>>>>> 887d760 (.)
    public function getTableFilters(): array
    {
        return [];
    }

    /**
     * @return array<string, Tables\Actions\Action|Tables\Actions\ActionGroup>
     */
<<<<<<< HEAD
=======
    #[\Override]
>>>>>>> 887d760 (.)
    public function getTableActions(): array
    {
        return [
            'edit' => EditAction::make(),
        ];
    }

    /**
     * @return array<string, Tables\Actions\BulkAction>
     */
<<<<<<< HEAD
=======
    #[\Override]
>>>>>>> 887d760 (.)
    public function getTableBulkActions(): array
    {
        return [
            'delete' => DeleteBulkAction::make(),
        ];
    }
}
