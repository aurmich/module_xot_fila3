<?php

/**
 * @see https://coderflex.com/blog/create-advanced-filters-with-filament
 */

declare(strict_types=1);

namespace Modules\Xot\Filament\Actions\Header;

// Header actions must be an instance of Filament\Actions\Action, or Filament\Actions\ActionGroup.
// use Filament\Tables\Actions\Action;
use Filament\Actions\Action;
use Filament\Resources\Pages\ListRecords;
use Modules\Xot\Actions\Export\ExportXlsByCollection;
use Modules\Xot\Actions\GetTransKeyAction;
use Webmozart\Assert\Assert;

class ExportXlsAction extends Action
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->translateLabel()
            ->tooltip(__('xot::actions.export_xls'))
            ->tooltip(__('xot::actions.export_xls'))

            ->label('')
            ->tooltip(__('xot::actions.export_xls'))

            // ->icon('heroicon-o-cloud-arrow-down')
            // ->icon('fas-file-excel')
            ->icon('heroicon-o-arrow-down-tray')
            ->action(static function (ListRecords $livewire) {
                $filename = class_basename($livewire).'-'.collect($livewire->tableFilters)->flatten()->implode('-').'.xlsx';
                $transKey = app(GetTransKeyAction::class)->execute($livewire::class);
                $transKey .= '.fields';
                $query = $livewire->getFilteredTableQuery();
                $rows = $query->get();
                $resource = $livewire->getResource();
<<<<<<< HEAD
<<<<<<< HEAD

=======
                
>>>>>>> e5c56c3 (.)
=======

>>>>>>> 7b67053 (fix: auto resolve conflict)
                /** @var array<int, string> $fields */
                $fields = [];
                if (method_exists($resource, 'getXlsFields')) {
                    $rawFields = $resource::getXlsFields($livewire->tableFilters);
                    if (is_array($rawFields)) {
                        $fields = array_map(static function ($field): string {
                            if (is_object($field) && method_exists($field, '__toString')) {
                                return $field->__toString();
                            }
                            if (is_scalar($field)) {
                                return (string) $field;
                            }
                            return '';
                        }, $rawFields);
                    }
                    Assert::isArray($fields);
                }

                return app(ExportXlsByCollection::class)->execute(
<<<<<<< HEAD
<<<<<<< HEAD
                    $rows,
                    $filename,
                    $transKey,
=======
                    $rows, 
                    $filename, 
                    $transKey, 
>>>>>>> e5c56c3 (.)
=======
                    $rows,
                    $filename,
                    $transKey,
>>>>>>> 7b67053 (fix: auto resolve conflict)
                    array_values($fields)
                );
                // ->getQuery(); // Staudenmeir\LaravelCte\Query\Builder
                $rows = $query->get();
                $resource = $livewire->getResource();
                $fields = [];
                if (method_exists($resource, 'getXlsFields')) {
                    Assert::isArray($fields = $resource::getXlsFields($livewire->tableFilters));
                }

                return app(ExportXlsByCollection::class)->execute($rows, $filename, $transKey, $fields);
            });
    }

    public static function getDefaultName(): ?string
    {
        return 'export_xls';
    }
}
