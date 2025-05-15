<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Resources\CacheLockResource\Pages;

use Filament\Tables\Columns\TextColumn;
use Modules\Xot\Filament\Resources\CacheLockResource;
use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;




use Modules\Xot\Filament\Resources\XotBaseResource\RelationManagers\XotBaseRelationManager;





class ListCacheLocks extends XotBaseListRecords
{
    protected static string $resource = CacheLockResource::class;

<<<<<<< Updated upstream
<<<<<<< HEAD
    public function getTableColumns(): array
=======
    public function getListTableColumns(): array
>>>>>>> 4241492 (.)
=======
    public function getTableColumns(): array
>>>>>>> Stashed changes
    {
        return [
            'key' => TextColumn::make('key')
                ->searchable()
                ->sortable()
                ->wrap(),
            'owner' => TextColumn::make('owner')
                ->searchable()
                ->sortable()
                ->wrap(),
            'expiration' => TextColumn::make('expiration')
                ->numeric()
                ->sortable(),
        ];
    }
}
