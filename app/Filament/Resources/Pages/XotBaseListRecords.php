<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Resources\Pages;

use Filament\Resources\Pages\ListRecords as FilamentListRecords;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;
use Modules\UI\Enums\TableLayoutEnum;
use Modules\Xot\Filament\Actions\Header\ExportXlsAction;
use Modules\Xot\Filament\Traits\HasXotTable;
use Webmozart\Assert\Assert;

/**
 * Base class for list records pages.
 *
 * @property ?string $model
 * @property ?string $resource
 * @property ?string $slug
 * @property TableLayoutEnum $layoutView
 */
abstract class XotBaseListRecords extends FilamentListRecords
{
    use HasXotTable;

    /*
     * Get the table columns.
     *
     * @return array<string, Tables\Columns\Column>
<<<<<<< HEAD
<<<<<<< HEAD

    abstract public function getTableColumns(): array;
    */

=======
     
    abstract public function getTableColumns(): array;
    */

    
>>>>>>> e697a77b (.)
=======
     
    abstract public function getTableColumns(): array;
    */

    
>>>>>>> 89d0c8f4 (.)
    /**
     * Get the default sort column and direction.
     *
     * @return array{id: 'desc'|'asc'}
     */
    protected function getDefaultSort(): array
    {
        return ['id' => 'desc'];
    }

    /**
     * Get the header actions.
     *
     * @return array<string, \Filament\Actions\Action>
     */
    protected function getHeaderActions(): array
    {
        return [
            // \Filament\Actions\CreateAction::make(),
<<<<<<< HEAD
<<<<<<< HEAD
            // ExportXlsAction::make('export_xls'),
=======
           // ExportXlsAction::make('export_xls'),
>>>>>>> e697a77b (.)
=======
           // ExportXlsAction::make('export_xls'),
>>>>>>> 89d0c8f4 (.)
        ];
    }

    /**
     * Get the resource class name.
     *
     * @return class-string
     */
    public static function getResource(): string
    {
        $resource = Str::of(static::class)->before('\\Pages\\')->toString();
        Assert::classExists($resource);

        return $resource;
    }

<<<<<<< HEAD
<<<<<<< HEAD
    /**
=======
    /** 
>>>>>>> 89d0c8f4 (.)
     * Paginate the table query.
    */
    protected function paginateTableQueryTMP(Builder $query): Paginator
    {
        return $query->fastPaginate(
<<<<<<< HEAD
            ($this->getTableRecordsPerPage() === 'all')
            ? $query->count()
=======
    /** 
     * Paginate the table query.
    */
    protected function paginateTableQueryTMP(Builder $query): Paginator
    {
        return $query->fastPaginate(
            ('all' === $this->getTableRecordsPerPage()) 
            ? $query->count() 
>>>>>>> e697a77b (.)
=======
            ('all' === $this->getTableRecordsPerPage()) 
            ? $query->count() 
>>>>>>> 89d0c8f4 (.)
            : $this->getTableRecordsPerPage()
        );
    }
}
<<<<<<< HEAD
<<<<<<< HEAD
=======

>>>>>>> e697a77b (.)
=======

>>>>>>> 89d0c8f4 (.)
