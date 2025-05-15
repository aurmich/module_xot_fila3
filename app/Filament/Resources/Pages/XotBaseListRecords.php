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

<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< Updated upstream
<<<<<<< HEAD
=======

>>>>>>> 4241492 (.)
=======
>>>>>>> Stashed changes
=======

>>>>>>> 823c958 (.)
>>>>>>> bdc979b (.)
    /**
     * Get the table columns.
     *
     * @return array<string, Tables\Columns\Column>
     */
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< Updated upstream
<<<<<<< HEAD
=======
>>>>>>> Stashed changes
>>>>>>> bdc979b (.)
    public function getTableColumns(): array
    {
        return [];
    }

    
<<<<<<< HEAD
=======
=======
    abstract public function getListTableColumns(): array;

>>>>>>> 4241492 (.)
=======

    
>>>>>>> Stashed changes
=======
    abstract public function getListTableColumns(): array;

>>>>>>> 823c958 (.)
>>>>>>> bdc979b (.)
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
     * @return array<int, \Filament\Actions\Action>
     */
    protected function getHeaderActions(): array
    {
        return [
            // \Filament\Actions\CreateAction::make(),
            ExportXlsAction::make('export_xls'),
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

    /**
     * Paginate the table query.
     */
    protected function paginateTableQuery(Builder $query): Paginator
    {
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< Updated upstream
<<<<<<< HEAD
=======
>>>>>>> Stashed changes
>>>>>>> bdc979b (.)
        return $query->fastPaginate(
            ('all' === $this->getTableRecordsPerPage()) 
            ? $query->count() 
            : $this->getTableRecordsPerPage()
        );
    }
}

<<<<<<< HEAD
=======
=======
=======
>>>>>>> 823c958 (.)
        $perPage = $this->getTableRecordsPerPage();

        if ('all' === $perPage) {
            $count = $query->count();

            /* @var \Illuminate\Contracts\Pagination\Paginator */
            Assert::isInstanceOf($res = $query->fastPaginate($count), Paginator::class);
            return $res;
        }

        if (is_numeric($perPage)) {
            $perPageInt = (int) $perPage;
            Assert::greaterThan($perPageInt, 0);

            /* @var \Illuminate\Contracts\Pagination\Paginator */
            Assert::isInstanceOf($res = $query->fastPaginate($perPageInt), Paginator::class);
            return $res;
        }

        /* @var \Illuminate\Contracts\Pagination\Paginator */
        Assert::isInstanceOf($res = $query->fastPaginate(10), Paginator::class);
        return $res;
    }
}
<<<<<<< HEAD
>>>>>>> 4241492 (.)
=======
    }
}

>>>>>>> Stashed changes
=======
>>>>>>> 823c958 (.)
>>>>>>> bdc979b (.)
