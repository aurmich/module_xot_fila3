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
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Builder;
use Modules\Xot\Actions\Export\ExportXlsByLazyCollection;
use Modules\Xot\Actions\Export\ExportXlsByQuery;
use Modules\Xot\Actions\Export\ExportXlsStreamByLazyCollection;
use Modules\Xot\Actions\GetTransKeyAction;
use Webmozart\Assert\Assert;

class ExportXlsLazyAction extends Action
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->translateLabel()
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD

=======
            
>>>>>>> e5c56c3 (.)
=======
=======
>>>>>>> 7b67053 (fix: auto resolve conflict)
=======
>>>>>>> c2dac53 (.)
            
            
            ->label('')
<<<<<<< HEAD
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
<<<<<<< HEAD
>>>>>>> d9307de (fix: auto resolve conflict)
=======
=======

>>>>>>> 4ab3760 (.)
>>>>>>> 7b67053 (fix: auto resolve conflict)
=======

>>>>>>> c2dac53 (.)
            ->tooltip(__('xot::actions.export_xls'))
            ->icon('heroicon-o-arrow-down-tray')
            ->action(static function (ListRecords $livewire) {
                $filename = class_basename($livewire).'-'.collect($livewire->tableFilters)->flatten()->implode('-').'.xlsx';
                $transKey = app(GetTransKeyAction::class)->execute($livewire::class);
                $transKey .= '.fields';

                $resource = $livewire->getResource();
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

                $lazy = $livewire->getFilteredTableQuery();
<<<<<<< HEAD
<<<<<<< HEAD

                if ($lazy->count() < 7) {
                    Assert::isInstanceOf($lazy, Builder::class);

                    /** @var array<int, string> $stringFields */
                    $stringFields = array_values($fields);

                    return app(ExportXlsByQuery::class)->execute(
                        $lazy,
                        $filename,
                        $stringFields,
=======
                
=======

>>>>>>> 7b67053 (fix: auto resolve conflict)
                if ($lazy->count() < 7) {
                    Assert::isInstanceOf($lazy, Builder::class);

                    /** @var array<int, string> $stringFields */
                    $stringFields = array_values($fields);

                    return app(ExportXlsByQuery::class)->execute(
<<<<<<< HEAD
                        $lazy, 
                        $filename, 
                        $stringFields, 
>>>>>>> e5c56c3 (.)
=======
                        $lazy,
                        $filename,
                        $stringFields,
>>>>>>> 7b67053 (fix: auto resolve conflict)
                        null
                    );
                }

                $lazyCursor = $lazy->cursor();

                if ($lazyCursor->count() > 3000) {
                    return app(ExportXlsStreamByLazyCollection::class)->execute(
<<<<<<< HEAD
<<<<<<< HEAD
                        $lazyCursor,
                        $filename,
                        $transKey,
=======
                        $lazyCursor, 
                        $filename, 
                        $transKey, 
>>>>>>> e5c56c3 (.)
=======
                        $lazyCursor,
                        $filename,
                        $transKey,
>>>>>>> 7b67053 (fix: auto resolve conflict)
                        array_values($fields)
                    );
                }

                return app(ExportXlsByLazyCollection::class)->execute(
<<<<<<< HEAD
<<<<<<< HEAD
                    $lazyCursor,
                    $filename,
=======
                    $lazyCursor, 
                    $filename, 
>>>>>>> e5c56c3 (.)
=======
                    $lazyCursor,
                    $filename,
>>>>>>> 7b67053 (fix: auto resolve conflict)
                    array_values($fields)
                );
                $fields = [];
                if (method_exists($resource, 'getXlsFields')) {
                    Assert::isArray($fields = $resource::getXlsFields($livewire->tableFilters));
                }

                $lazy = $livewire->getFilteredTableQuery();
                if (empty($fields)) {
                    $fields = [];
                }

                if ($lazy->count() < 7) {
                    $query = $lazy->getQuery();

                    return app(ExportXlsByQuery::class)->execute($query, $filename, $transKey, $fields);
                }

                $lazy = $lazy->cursor();

                if ($lazy->count() > 3000) {
                    return app(ExportXlsStreamByLazyCollection::class)->execute($lazy, $filename, $transKey, $fields);
                }

                return app(ExportXlsByLazyCollection::class)->execute($lazy, $filename, $transKey, $fields);
            });
    }

    public static function getDefaultName(): ?string
    {
        return 'export_xls';
    }
}
