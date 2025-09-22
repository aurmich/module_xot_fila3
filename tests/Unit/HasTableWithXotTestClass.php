<?php

declare(strict_types=1);

namespace Modules\Xot\Tests\Unit;

use Filament\Tables\Table;
use Illuminate\Support\Collection;
use Modules\Xot\Filament\Traits\HasXotTable;

/**
 * Dummy class that uses HasTable and HasXotTable traits for testing.
 */
class HasTableWithXotTestClass
{
    use HasXotTable;

    public function getLayoutView(): mixed
    {
        $mock = \Mockery::mock();
        $mock->shouldReceive('getTableColumns')->andReturn([]);
        $mock->shouldReceive('getTableContentGrid')->andReturn([]);

        return $mock;
    }

<<<<<<< HEAD
    #[\Override]
=======
>>>>>>> 4b5055e9 (.)
    public function getTableColumns(): array
    {
        return [];
    }

    public function getTable(): Table
    {
        return \Mockery::mock(Table::class);
    }

<<<<<<< HEAD
    public function getTablePage(): null|int
=======
    public function getTablePage(): ?int
>>>>>>> 4b5055e9 (.)
    {
        return 1;
    }

    public function getTableRecordsPerPage(): int
    {
        return 10;
    }

<<<<<<< HEAD
    public function getTableSortColumn(): null|string
=======
    public function getTableSortColumn(): ?string
>>>>>>> 4b5055e9 (.)
    {
        return null;
    }

<<<<<<< HEAD
    public function getTableSortDirection(): null|string
=======
    public function getTableSortDirection(): ?string
>>>>>>> 4b5055e9 (.)
    {
        return null;
    }

    public function getTableFilters(): array
    {
        return [];
    }

    public function getTableFiltersForm(): mixed
    {
        return null;
    }

<<<<<<< HEAD
    public function getTableFilterState(string $_name): null|array
=======
    public function getTableFilterState(string $name): ?array
>>>>>>> 4b5055e9 (.)
    {
        return [];
    }

<<<<<<< HEAD
    public function getTableGrouping(): null|string
=======
    public function getTableGrouping(): ?string
>>>>>>> 4b5055e9 (.)
    {
        return null;
    }

<<<<<<< HEAD
    public function getTableSearchIndicator(): null|string
=======
    public function getTableSearchIndicator(): ?string
>>>>>>> 4b5055e9 (.)
    {
        return null;
    }

    public function getTableColumnSearchIndicators(): array
    {
        return [];
    }

    public function getTableColumnToggleForm(): mixed
    {
        return null;
    }

    public function getTableRecords(): array
    {
        return [];
    }

    public function getTableRecord(): mixed
    {
        return null;
    }

    public function getTableRecordKey(): mixed
    {
        return null;
    }

<<<<<<< HEAD
    public function getSelectedTableRecords(bool $_shouldFetchSelectedRecords = true): Collection
=======
    public function getSelectedTableRecords(bool $shouldFetchSelectedRecords = true): Collection
>>>>>>> 4b5055e9 (.)
    {
        return new Collection();
    }

    public function getAllTableRecordsCount(): int
    {
        return 0;
    }

    public function getAllSelectableTableRecordsCount(): int
    {
        return 0;
    }

    public function getAllSelectableTableRecordKeys(): array
    {
        return [];
    }

    public function getTableQueryForExport(): mixed
    {
        return null;
    }

    public function getFilteredTableQuery(): mixed
    {
        return null;
    }

    public function getFilteredSortedTableQuery(): mixed
    {
        return null;
    }

    public function getAllTableSummaryQuery(): mixed
    {
        return null;
    }

    public function getPageTableSummaryQuery(): mixed
    {
        return null;
    }

<<<<<<< HEAD
    public function getMountedTableAction(): null|string
=======
    public function getMountedTableAction(): ?string
>>>>>>> 4b5055e9 (.)
    {
        return null;
    }

    public function getMountedTableActionForm(): mixed
    {
        return null;
    }

    public function getMountedTableActionRecord(): mixed
    {
        return null;
    }

    public function getMountedTableActionRecordKey(): mixed
    {
        return null;
    }

<<<<<<< HEAD
    public function getMountedTableBulkAction(): null|string
=======
    public function getMountedTableBulkAction(): ?string
>>>>>>> 4b5055e9 (.)
    {
        return null;
    }

    public function getMountedTableBulkActionForm(): mixed
    {
        return null;
    }

<<<<<<< HEAD
    public function getActiveTableLocale(): null|string
=======
    public function getActiveTableLocale(): ?string
>>>>>>> 4b5055e9 (.)
    {
        return null;
    }

    public function isTableLoaded(): bool
    {
        return true;
    }

    public function isTableReordering(): bool
    {
        return false;
    }

    public function hasTableSearch(): bool
    {
        return false;
    }

    public function isTableColumnToggledHidden(): bool
    {
        return false;
    }

    public function callMountedTableAction(): mixed
    {
        return null;
    }

<<<<<<< HEAD
    public function callTableColumnAction(string $_name, string $_recordKey): mixed
=======
    public function callTableColumnAction(string $name, string $recordKey): mixed
>>>>>>> 4b5055e9 (.)
    {
        return null;
    }

    public function deselectAllTableRecords(): void
    {
    }

    public function mountTableAction(): void
    {
    }

    public function mountTableBulkAction(): void
    {
    }

    public function mountedTableActionRecord(): mixed
    {
        return null;
    }

    public function replaceMountedTableAction(): void
    {
    }

    public function replaceMountedTableBulkAction(): void
    {
    }

    public function resetTableSearch(): void
    {
    }

    public function resetTableColumnSearch(): void
    {
    }

    public function toggleTableReordering(): void
    {
    }

    public function parseTableFilterName(): string
    {
        return '';
    }

    public function makeFilamentTranslatableContentDriver(): mixed
    {
        return null;
    }
}
