<?php
/**
 * @see https://coderflex.com/blog/create-advanced-filters-with-filament
 */

declare(strict_types=1);

namespace Modules\Xot\Filament\Actions\Header;

use Filament\Actions\Action;
// Header actions must be an instance of Filament\Actions\Action, or Filament\Actions\ActionGroup.
// use Filament\Tables\Actions\Action;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Support\Str;
use Modules\Xot\Actions\Export\ExportXlsByCollection;

class ExportXlsAction extends Action
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->translateLabel()
            // ->label('xot::actions.export_xls')
            ->label('')
            ->tooltip(__('xot::actions.export_xls'))

            // ->icon('heroicon-o-cloud-arrow-down')
            // ->icon('fas-file-excel')
            ->icon('heroicon-o-arrow-down-tray')
            ->action(
                static function (ListRecords $livewire) {
                    $filename = class_basename($livewire).'-'.collect($livewire->tableFilters)->flatten()->implode('-').'.xlsx';
                    $module = Str::of($livewire::class)->between('Modules\\', '\Filament\\')->lower()->toString();
                    $transKey = $module.'::'.Str::of(class_basename($livewire))
                        ->kebab()
                        ->replace('list-', '')
                        ->singular()
                        ->append('.fields')
                        ->toString();

                    $query = $livewire->getFilteredTableQuery()->getQuery(); // Staudenmeir\LaravelCte\Query\Builder
                    $rows = $query->get();

                    $resource = $livewire->getResource();
                    $fields = null;
                    if (method_exists($resource, 'getXlsFields')) {
                        $fields = $resource::getXlsFields($livewire->tableFilters);
                    }

                    return app(ExportXlsByCollection::class)->execute($rows, $filename, $transKey, $fields);
                }
            );

        // ->hidden(fn ($record) => Gate::denies('changePriority', $record))
        /*
        ->form([
            Select::make('priority_id')
                ->translateLabel()
                ->label('camping::operation.fields.priority')
                ->relationship(
                    name: 'priority',
                    titleAttribute: 'name',
                    modifyQueryUsing: fn (Builder $query) => $query->orderByDesc('level'),
                )
                ->preload()
                ->searchable(),
        ])
        ->action(function (Operation $record, $data) {
            $record->priority_id = $data['priority_id'];
            $record->save();
        })
        ->modalSubmitActionLabel(trans('camping::operation.actions.save'));
        */
    }

    public static function getDefaultName(): ?string
    {
        return 'export_xls';
    }
}