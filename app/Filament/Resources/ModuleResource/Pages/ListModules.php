<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Resources\ModuleResource\Pages;

use Filament\Tables;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\Layout\Stack;
use Filament\Tables\Columns\TextColumn;
use Modules\UI\Enums\TableLayoutEnum;
use Modules\Xot\Filament\Resources\ModuleResource;
use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;
use Nwidart\Modules\Facades\Module;

<<<<<<< HEAD
use Modules\Xot\Filament\Resources\XotBaseResource\RelationManager\XotBaseRelationManager;

=======
>>>>>>> e2a4c5d (.)
class ListModules extends XotBaseListRecords
{
    public TableLayoutEnum $layoutView = TableLayoutEnum::LIST;

    protected static string $resource = ModuleResource::class;

    public function getGridTableColumns(): array
    {
        return [
            Stack::make($this->getListTableColumns()),
        ];
    }

    /**
     * @return array<string, Tables\Columns\Column>
     */
    public function getListTableColumns(): array
    {
        return [
            'name' => TextColumn::make('name')
                ->searchable()
                ->sortable(),
            'path' => TextColumn::make('path')
                ->searchable()
                ->sortable(),
            'enabled' => TextColumn::make('enabled')
                ->sortable(),
        ];
    }

    /**
     * Undocumented function.
     *
     * @return array<Tables\Filters\BaseFilter>
     */
    public function getTableFilters(): array
    {
        return [
            // Tables\Filters\SelectFilter::make('name')->options(
            //    Module::pluck('name', 'name')->toArray()
            // ),
            // Tables\Filters\SelectFilter::make('status')->options([
            //    'enabled' => 'Enabled',
            //    'disabled' => 'Disabled',
            // ])->default('enabled'),
        ];
    }

    /**
     * Undocumented function.
     *
     * @return array<Tables\Actions\Action|Tables\Actions\ActionGroup>
     */
    public function getTableActions(): array
    {
        return [
            ViewAction::make()
<<<<<<< HEAD
                ,
            EditAction::make()
                ,
            DeleteAction::make()
                
=======
                ->label(''),
            EditAction::make()
                ->label(''),
            DeleteAction::make()
                ->label('')
>>>>>>> e2a4c5d (.)
                ->requiresConfirmation(),
        ];
    }

    /**
     * @return array<string, Tables\Actions\BulkAction>
     */
<<<<<<< HEAD
    public function getTableBulkActions(): array
=======
    protected function getTableBulkActions(): array
>>>>>>> e2a4c5d (.)
    {
        return [
            'delete' => DeleteBulkAction::make(),
        ];
    }
}
