<?php

declare(strict_types=1);

namespace Modules\Xot\Console\Commands;

<<<<<<< HEAD
<<<<<<< HEAD
use Doctrine\DBAL\Schema\Column;
use Doctrine\DBAL\Schema\ForeignKeyConstraint;
use Doctrine\DBAL\Schema\Index;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Schema as SchemaFacade;
use Illuminate\Support\Str;
use Safe\Exceptions\FilesystemException;
use Safe\Exceptions\JsonException;
use function Safe\file_put_contents;
use function Safe\json_encode;
use function Safe\mkdir;

/**
 * Class DatabaseSchemaExportCommand
 * 
 * Esporta lo schema del database in file JSON.
 */
class DatabaseSchemaExportCommand extends Command
{
    /**
     * @var string
     */
    protected $signature = 'db:schema:export {table?} {--module=}';

    /**
     * @var string
     */
    protected $description = 'Esporta lo schema del database in file JSON';

    /**
     * Esegue il comando.
     *
     * @throws FilesystemException
     * @throws JsonException
     */
    public function handle(): void
    {
        $module = $this->option('module');
        $table = $this->argument('table');

        if (null !== $table) {
            $this->exportTable($table, $module);
            return;
        }

        $tables = SchemaFacade::getAllTables();
        foreach ($tables as $table) {
            $this->exportTable($table->name, $module);
=======
=======
>>>>>>> 355a587 (.)
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Safe\Exceptions\DatetimeException;
use Safe\Exceptions\JsonException;
use Safe\Exceptions\PcreException;

class DatabaseSchemaExportCommand extends Command
{
    /**
     * Il nome e la firma del comando console.
     *
     * @var string
     */
    protected $signature = 'xot:export-database-schema 
                            {connection? : Nome della connessione al database} 
                            {--output= : Percorso del file di output} 
                            {--tables=* : Tabelle specifiche da esportare} 
                            {--format=json : Formato di output (json, yaml)}';

    /**
     * La descrizione del comando console.
     *
     * @var string
     */
    protected $description = 'Esporta lo schema del database in formato JSON';

    /**
     * Esegui il comando console.
     */
    public function handle(): int
    {
        $connection = $this->argument('connection') ?? config('database.default');
        $output = $this->option('output') ?? 'database_schema.json';
        $tables = $this->option('tables');
        $format = $this->option('format');

        try {
            $schema = $this->exportSchema($connection, $tables);
            
            if ($format === 'json') {
                $this->exportToJson($schema, $output);
            } else {
                $this->error('Formato non supportato: ' . $format);
                return 1;
            }

            $this->info("Schema esportato con successo in: {$output}");
            return 0;
        } catch (\Exception $e) {
            $this->error('Errore durante l\'esportazione: ' . $e->getMessage());
            return 1;
<<<<<<< HEAD
>>>>>>> 3268b83 (.)
=======
>>>>>>> 355a587 (.)
        }
    }

    /**
<<<<<<< HEAD
<<<<<<< HEAD
     * Esporta lo schema di una tabella in JSON.
     *
     * @param string $table Nome della tabella
     * @param string|null $module Nome del modulo
     * @throws FilesystemException
     * @throws JsonException
     */
    protected function exportTable(string $table, ?string $module = null): void
    {
        $schema = SchemaFacade::getConnection()->getDoctrineSchemaManager();
        
        if (!$schema->tablesExist([$table])) {
            $this->error("La tabella [{$table}] non esiste");
            return;
        }

        $columns = $schema->listTableColumns($table);
        $indexes = $schema->listTableIndexes($table);
        $foreignKeys = $schema->listTableForeignKeys($table);

        $data = [
            'name' => $table,
            'columns' => $this->formatColumns($columns),
            'indexes' => $this->formatIndexes($indexes),
            'foreignKeys' => $this->formatForeignKeys($foreignKeys),
        ];

        $path = $this->getExportPath($table, $module);
        $json = json_encode($data, JSON_PRETTY_PRINT);
        file_put_contents($path, $json);

        $this->info("Schema esportato per la tabella [{$table}]");
    }

    /**
     * Formatta le colonne per l'esportazione JSON.
     *
     * @param Column[] $columns
     * @return array<string, array<string, mixed>>
     */
    protected function formatColumns(array $columns): array
    {
        $formatted = [];
        foreach ($columns as $column) {
            $formatted[$column->getName()] = [
                'type' => $column->getType()->getTypeName(),
                'length' => $column->getLength(),
                'nullable' => !$column->getNotnull(),
                'default' => $column->getDefault(),
                'unsigned' => $column->getUnsigned(),
                'autoincrement' => $column->getAutoincrement(),
                'comment' => $column->getComment(),
            ];
        }

        return $formatted;
    }

    /**
     * Formatta gli indici per l'esportazione JSON.
     *
     * @param Index[] $indexes
     * @return array<string, array<string, mixed>>
     */
    protected function formatIndexes(array $indexes): array
    {
        $formatted = [];
        foreach ($indexes as $index) {
            $formatted[$index->getName()] = [
                'columns' => $index->getColumns(),
                'unique' => $index->isUnique(),
                'primary' => $index->isPrimary(),
                'flags' => $index->getFlags(),
                'options' => $index->getOptions(),
            ];
        }

        return $formatted;
    }

    /**
     * Formatta le chiavi esterne per l'esportazione JSON.
     *
     * @param ForeignKeyConstraint[] $foreignKeys
     * @return array<string, array<string, mixed>>
     */
    protected function formatForeignKeys(array $foreignKeys): array
    {
        $formatted = [];
        foreach ($foreignKeys as $foreignKey) {
            $formatted[$foreignKey->getName()] = [
                'localColumns' => $foreignKey->getLocalColumns(),
                'foreignTable' => $foreignKey->getForeignTableName(),
                'foreignColumns' => $foreignKey->getForeignColumns(),
                'onDelete' => $foreignKey->onDelete(),
                'onUpdate' => $foreignKey->onUpdate(),
                'options' => $foreignKey->getOptions(),
            ];
        }

        return $formatted;
    }

    /**
     * Ottiene il percorso di esportazione per lo schema di una tabella.
     *
     * @param string $table Nome della tabella
     * @param string|null $module Nome del modulo
     * @return string Percorso completo del file
     * @throws FilesystemException
     */
    protected function getExportPath(string $table, ?string $module = null): string
    {
        $filename = Str::snake($table) . '.json';
        $basePath = base_path('database/schema');

        if (null !== $module) {
            $basePath = base_path("Modules/{$module}/database/schema");
        }

        if (!is_dir($basePath)) {
            mkdir($basePath, 0755, true);
        }

        return $basePath . '/' . $filename;
=======
=======
>>>>>>> 355a587 (.)
     * Esporta lo schema del database.
     */
    protected function exportSchema(string $connection, ?array $tables = null): array
    {
        $schema = [
            'database' => config("database.connections.{$connection}.database"),
            'tables' => [],
        ];

        $dbTables = $tables ?? DB::connection($connection)->getDoctrineSchemaManager()->listTableNames();

        foreach ($dbTables as $table) {
            $schema['tables'][$table] = $this->getTableSchema($connection, $table);
        }

        return $schema;
    }

    /**
     * Ottiene lo schema di una tabella specifica.
     */
    protected function getTableSchema(string $connection, string $table): array
    {
        $schemaManager = DB::connection($connection)->getDoctrineSchemaManager();
        $tableDetails = $schemaManager->listTableDetails($table);

        return [
            'columns' => $this->getColumns($tableDetails),
            'indexes' => $this->getIndexes($tableDetails),
            'foreign_keys' => $this->getForeignKeys($tableDetails),
        ];
    }

    /**
     * Esporta lo schema in formato JSON.
     */
    protected function exportToJson(array $schema, string $output): void
    {
        $json = json_encode($schema, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        file_put_contents($output, $json);
    }

    /**
     * Ottiene i dettagli delle colonne.
     */
    protected function getColumns($tableDetails): array
    {
        $columns = [];
        foreach ($tableDetails->getColumns() as $column) {
            $columns[$column->getName()] = [
                'type' => $column->getType()->getName(),
                'length' => $column->getLength(),
                'precision' => $column->getPrecision(),
                'scale' => $column->getScale(),
                'nullable' => ! $column->getNotnull(),
                'default' => $column->getDefault(),
                'autoincrement' => $column->getAutoincrement(),
            ];
        }
        return $columns;
    }

    /**
     * Ottiene i dettagli degli indici.
     */
    protected function getIndexes($tableDetails): array
    {
        $indexes = [];
        foreach ($tableDetails->getIndexes() as $index) {
            $indexes[$index->getName()] = [
                'columns' => $index->getColumns(),
                'unique' => $index->isUnique(),
                'primary' => $index->isPrimary(),
            ];
        }
        return $indexes;
    }

    /**
     * Ottiene i dettagli delle chiavi esterne.
     */
    protected function getForeignKeys($tableDetails): array
    {
        $foreignKeys = [];
        foreach ($tableDetails->getForeignKeys() as $name => $foreignKey) {
            $foreignKeys[$name] = [
                'local_columns' => $foreignKey->getLocalColumns(),
                'foreign_table' => $foreignKey->getForeignTableName(),
                'foreign_columns' => $foreignKey->getForeignColumns(),
                'on_delete' => $foreignKey->getOption('onDelete'),
                'on_update' => $foreignKey->getOption('onUpdate'),
            ];
        }
        return $foreignKeys;
<<<<<<< HEAD
>>>>>>> 3268b83 (.)
=======
>>>>>>> 355a587 (.)
    }
}
