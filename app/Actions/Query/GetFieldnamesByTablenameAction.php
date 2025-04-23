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
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
     * @param string $table Table name to get columns from
=======
     * @param string $table          Table name to get columns from
>>>>>>> e5c56c3 (.)
=======
=======
>>>>>>> 7b67053 (fix: auto resolve conflict)
=======
>>>>>>> c2dac53 (.)
     * @param string $table          Table name to get columns from
     * @param string $table Table name to get columns from
     * @param string      $table          Table name to get columns from
<<<<<<< HEAD
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
<<<<<<< HEAD
>>>>>>> d9307de (fix: auto resolve conflict)
=======
=======
     * @param string $table Table name to get columns from
>>>>>>> 4ab3760 (.)
>>>>>>> 7b67053 (fix: auto resolve conflict)
=======
     * @param string $table Table name to get columns from
>>>>>>> c2dac53 (.)
     * @param string|null $connectionName Database connection name (optional)
     *
     * @throws \InvalidArgumentException
     *
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
     * @return list<string> Lista dei nomi delle colonne della tabella
=======
     * @return list
>>>>>>> e5c56c3 (.)
=======
=======
>>>>>>> 7b67053 (fix: auto resolve conflict)
=======
>>>>>>> c2dac53 (.)
     * @return list
     * @return list<string> Lista dei nomi delle colonne della tabella
     * @return list
<<<<<<< HEAD
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
<<<<<<< HEAD
>>>>>>> d9307de (fix: auto resolve conflict)
=======
=======
     * @return list<string> Lista dei nomi delle colonne della tabella
>>>>>>> 4ab3760 (.)
>>>>>>> 7b67053 (fix: auto resolve conflict)
=======
     * @return list<string> Lista dei nomi delle colonne della tabella
>>>>>>> c2dac53 (.)
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
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        if (! $this->isValidConnection($connectionName)) {
            throw new \InvalidArgumentException(sprintf('Invalid database connection: %s', $connectionName));
=======
=======
>>>>>>> d9307de (fix: auto resolve conflict)
=======
>>>>>>> 7b67053 (fix: auto resolve conflict)
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> origin/dev
        if (! $this->isValidConnection($connectionName)) {
            throw new \InvalidArgumentException(sprintf('Invalid database connection: %s',  $connectionName));
<<<<<<< HEAD
>>>>>>> e5c56c3 (.)
=======
=======
=======
>>>>>>> 4ab3760 (.)
        if (! $this->isValidConnection($connectionName)) {
            throw new \InvalidArgumentException(sprintf('Invalid database connection: %s', $connectionName));
>>>>>>> 50bb41c (fix: auto resolve conflict)
>>>>>>> d9307de (fix: auto resolve conflict)
=======
        if (! $this->isValidConnection($connectionName)) {
            throw new \InvalidArgumentException(sprintf('Invalid database connection: %s',  $connectionName));
        if (! $this->isValidConnection($connectionName)) {
            throw new \InvalidArgumentException(sprintf('Invalid database connection: %s', $connectionName));
>>>>>>> c2dac53 (.)
        }

        // Check if table exists in the database
        if (! Schema::connection($connectionName)->hasTable($table)) {
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
            throw new \InvalidArgumentException(sprintf('Table "%s" does not exist in connection "%s".', $table, $connectionName));
=======
=======
>>>>>>> d9307de (fix: auto resolve conflict)
=======
>>>>>>> c2dac53 (.)
            throw new \InvalidArgumentException(sprintf('Table "%s" does not exist in connection "%s".', $table,  $connectionName));
        if (! $this->isValidConnection(is_string($connectionName) ? $connectionName : (string) $connectionName)) {
            throw new \InvalidArgumentException(sprintf('Invalid database connection: %s', is_string($connectionName) ? $connectionName : (string) $connectionName));
        }

        // Check if table exists in the database
        if (! Schema::connection(is_string($connectionName) ? $connectionName : (string) $connectionName)->hasTable($table)) {
            throw new \InvalidArgumentException(sprintf('Table "%s" does not exist in connection "%s".', $table, is_string($connectionName) ? $connectionName : (string) $connectionName));
<<<<<<< HEAD
>>>>>>> origin/dev
>>>>>>> origin/dev
<<<<<<< HEAD
>>>>>>> e5c56c3 (.)
=======
=======
=======
>>>>>>> c2dac53 (.)
            throw new \InvalidArgumentException(sprintf('Table "%s" does not exist in connection "%s".', $table, $connectionName));
        if (! $this->isValidConnection((string) $connectionName)) {
            throw new \InvalidArgumentException(sprintf('Invalid database connection: %s', (string) $connectionName));
        }

        // Check if table exists in the database
        if (! Schema::connection((string) $connectionName)->hasTable($table)) {
            throw new \InvalidArgumentException(sprintf('Table "%s" does not exist in connection "%s".', $table, (string) $connectionName));
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
        }

        // Get and return column listing
        try {
            $columns = Schema::connection($connectionName)->getColumnListing($table);
            $columns = array_values($columns);
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD

            // Assicuriamoci che tutti i valori siano stringhe
            return array_map(static fn ($value): string => is_string($value) ? $value : (string) $value, $columns);
=======
=======
>>>>>>> d9307de (fix: auto resolve conflict)
=======
>>>>>>> 7b67053 (fix: auto resolve conflict)
=======
>>>>>>> c2dac53 (.)
            // $columns = array_map('strval', $columns);

            return $columns;
            // return array_values(array_map(static fn ($value): string => is_string($value) ? $value : (string) $value, $columns));
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> e5c56c3 (.)
=======
=======
<<<<<<< HEAD
=======
>>>>>>> c2dac53 (.)
            
            // Assicuriamoci che tutti i valori siano stringhe
            return array_map(static fn ($value): string => is_string($value) ? $value : (string) $value, $columns);
            // $columns = array_map('strval', $columns);

            return $columns;
            // return array_values(array_map(static fn ($value): string => (string) $value, $columns));
<<<<<<< HEAD
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
<<<<<<< HEAD
>>>>>>> d9307de (fix: auto resolve conflict)
=======
=======

            // Assicuriamoci che tutti i valori siano stringhe
            return array_map(static fn ($value): string => is_string($value) ? $value : (string) $value, $columns);
>>>>>>> 4ab3760 (.)
>>>>>>> 7b67053 (fix: auto resolve conflict)
=======

            // Assicuriamoci che tutti i valori siano stringhe
            return array_map(static fn ($value): string => is_string($value) ? $value : (string) $value, $columns);
>>>>>>> c2dac53 (.)
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
