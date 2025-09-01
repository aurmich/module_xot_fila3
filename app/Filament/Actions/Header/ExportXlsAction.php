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
            ->icon('heroicon-o-arrow-down-tray')
            ->action(static function (ListRecords $livewire) {
                $filename = class_basename($livewire).'-'.collect($livewire->tableFilters)->flatten()->implode('-').'.xlsx';
                $transKey = app(GetTransKeyAction::class)->execute($livewire::class);
                $transKey .= '.fields';
                $query = $livewire->getFilteredTableQuery();
                $rows = $query->get();
<<<<<<< HEAD
<<<<<<< HEAD

                $resource = $livewire->getResource();

=======
                
                $resource = $livewire->getResource();
                
>>>>>>> e697a77b (.)
=======
                
                $resource = $livewire->getResource();
                
>>>>>>> 89d0c8f4 (.)
                /** @var array<int, string> $fields */
                $fields = [];
                if (method_exists($resource, 'getXlsFields')) {
                    $rawFields = $resource::getXlsFields($livewire->tableFilters);
<<<<<<< HEAD
<<<<<<< HEAD

=======
                  
>>>>>>> e697a77b (.)
=======
                  
>>>>>>> 89d0c8f4 (.)
                    if (is_array($rawFields)) {
                        $fields = array_map(static function ($field): string {
                            if (is_object($field) && method_exists($field, '__toString')) {
                                return $field->__toString();
                            }
                            if (is_scalar($field)) {
                                return (string) $field;
                            }
<<<<<<< HEAD
<<<<<<< HEAD

=======
>>>>>>> e697a77b (.)
=======
>>>>>>> 89d0c8f4 (.)
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
>>>>>>> e697a77b (.)
=======
                    $rows, 
                    $filename, 
                    $transKey, 
>>>>>>> 89d0c8f4 (.)
                    array_values($fields)
                );
            });
    }

    public static function getDefaultName(): ?string
    {
        return 'export_xls';
    }
}
