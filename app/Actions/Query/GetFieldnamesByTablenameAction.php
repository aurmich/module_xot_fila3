<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Query;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Spatie\QueueableAction\QueueableAction;
use Webmozart\Assert\Assert;

final class GetFieldnamesByTablenameAction
{
    use QueueableAction;

    /**
     * Get column names from a table with specific database connection.
     *
<<<<<<< HEAD
     * @param string $table Table name to get columns from
=======
     * @param string $table          Table name to get columns from
>>>>>>> 9746d62 (.)
     * @param string|null $connectionName Database connection name (optional)
     *
     * @throws \InvalidArgumentException
     *
<<<<<<< HEAD
     * @return list<string> Lista dei nomi delle colonne della tabella
=======
     * @return list
>>>>>>> 9746d62 (.)
     */
    public function execute(string $table, ?string $connectionName = null): array
    {
        // Validate table name
        if (empty(trim($table))) {
            throw new \InvalidArgumentException('Table name cannot be empty.');
        }

        // Use default connection if none is provided
        Assert::string($connectionName = $connectionName ?? config('database.default'));

        // Validate database connection
        if (! $this->isValidConnection($connectionName)) {
<<<<<<< HEAD
            throw new \InvalidArgumentException(sprintf('Invalid database connection: %s', $connectionName));
=======
            throw new \InvalidArgumentException(sprintf('Invalid database connection: %s',  $connectionName));
>>>>>>> 9746d62 (.)
        }

        // Check if table exists in the database
        if (! Schema::connection($connectionName)->hasTable($table)) {
<<<<<<< HEAD
            throw new \InvalidArgumentException(sprintf('Table "%s" does not exist in connection "%s".', $table, $connectionName));
=======
            throw new \InvalidArgumentException(sprintf('Table "%s" does not exist in connection "%s".', $table,  $connectionName));
>>>>>>> 9746d62 (.)
        }

        // Get and return column listing
        try {
            $columns = Schema::connection($connectionName)->getColumnListing($table);
            $columns = array_values($columns);
<<<<<<< HEAD
            
            // Assicuriamoci che tutti i valori siano stringhe
            return array_map(static fn ($value): string => is_string($value) ? $value : (string) $value, $columns);
=======
            // $columns = array_map('strval', $columns);

            return $columns;
            // return array_values(array_map(static fn ($value): string => is_string($value) ? $value : (string) $value, $columns));
>>>>>>> 9746d62 (.)
        } catch (\Throwable $e) {
            throw new \InvalidArgumentException(sprintf('Error fetching columns from table "%s": %s', $table, $e->getMessage()));
        }
    }

    /**
     * Check if a given database connection is valid.
     */
    private function isValidConnection(string $connectionName): bool
    {
        try {
            DB::connection($connectionName)->getPdo();

            return true;
        } catch (\Throwable $e) {
            return false;
        }
    }
}
