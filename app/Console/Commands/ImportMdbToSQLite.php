<?php

declare(strict_types=1);

namespace Modules\Xot\Console\Commands;

use Illuminate\Console\Command;
<<<<<<< HEAD
use RuntimeException;
use function Safe\shell_exec;
use function Safe\sprintf;
=======
use Illuminate\Support\Facades\DB;
use Safe\Exceptions\DatetimeException;
use Safe\Exceptions\JsonException;
use Safe\Exceptions\PcreException;
>>>>>>> 3268b83 (.)

class ImportMdbToSQLite extends Command
{
    /**
<<<<<<< HEAD
     * Il nome e la firma del comando.
     *
     * @var string
     */
    protected $signature = 'xot:import-mdb-to-sqlite';

    /**
     * La descrizione del comando.
     *
     * @var string
     */
    protected $description = 'Importa un file .mdb in SQLite con un processo passo-passo';

    /**
     * Esegui il comando.
     */
    public function handle(): int
    {
        /** @var string */
        $mdbFile = $this->ask('Per favore, inserisci il percorso del file .mdb');

        /** @var string */
        $sqliteDb = $this->ask('Per favore, inserisci il nome del database SQLite (includi l\'estensione .sqlite)');

        $this->info(sprintf("File .mdb: %s", $mdbFile));
        $this->info(sprintf("Database SQLite: %s", $sqliteDb));

        try {
            $this->info('Esportando tabelle dal file .mdb in CSV...');
            $tables = $this->exportTablesToCSV($mdbFile);

            $this->info('Creando tabelle nel database SQLite...');
            $this->createTables($mdbFile, $sqliteDb);

            $this->info('Importando i dati CSV nelle tabelle SQLite...');
            $this->importDataToSQLite($tables, $sqliteDb);

            $this->info('Processo completato!');
            return Command::SUCCESS;
        } catch (\Exception $e) {
            $this->error($e->getMessage());
            return Command::FAILURE;
=======
     * Il nome e la firma del comando console.
     *
     * @var string
     */
    protected $signature = 'xot:import-mdb-to-sqlite 
                            {source : Percorso del file MDB sorgente} 
                            {destination : Percorso del file SQLite di destinazione} 
                            {--tables=* : Tabelle specifiche da importare} 
                            {--skip-data : Salta l\'importazione dei dati}';

    /**
     * La descrizione del comando console.
     *
     * @var string
     */
    protected $description = 'Importa un database MDB in SQLite';

    /**
     * Esegui il comando console.
     */
    public function handle(): int
    {
        $source = $this->argument('source');
        $destination = $this->argument('destination');
        $tables = $this->option('tables');
        $skipData = $this->option('skip-data');

        if (! file_exists($source)) {
            $this->error("Il file sorgente {$source} non esiste!");
            return 1;
        }

        try {
            $this->importSchema($source, $destination, $tables);
            
            if (! $skipData) {
                $this->importData($source, $destination, $tables);
            }

            $this->info('Importazione completata con successo!');
            return 0;
        } catch (\Exception $e) {
            $this->error('Errore durante l\'importazione: ' . $e->getMessage());
            return 1;
>>>>>>> 3268b83 (.)
        }
    }

    /**
<<<<<<< HEAD
     * Esporta tutte le tabelle dal file .mdb in formato CSV.
     *
     * @param string $mdbFile
     * @return array<int, string>
     */
    private function exportTablesToCSV(string $mdbFile): array
    {
        $tables = [];
        try {
            $result = shell_exec(sprintf("mdb-tables %s", $mdbFile));

            foreach (explode("\n", trim($result)) as $table) {
                if (empty($table)) {
                    continue;
                }
                $tables[] = $table;
                $csvFile = storage_path(sprintf("app/%s.csv", $table));
                shell_exec(sprintf("mdb-export %s %s > %s", $mdbFile, $table, $csvFile));
            }

            return $tables;
        } catch (\Exception $e) {
            throw new RuntimeException(sprintf('Errore durante l\'esportazione delle tabelle: %s', $e->getMessage()));
        }
    }

    /**
     * Crea le tabelle nel database SQLite basandosi sullo schema del file .mdb.
     *
     * @param string $mdbFile
     * @param string $sqliteDb
     * @return void
     */
    private function createTables(string $mdbFile, string $sqliteDb): void
    {
        try {
            $schema = shell_exec(sprintf("mdb-schema %s sqlite", $mdbFile));
            $tables = explode(";\n", $schema);

            foreach ($tables as $tableSchema) {
                if (empty($tableSchema)) {
                    continue;
                }

                $tableSchema = str_replace('`', '"', $tableSchema);
                shell_exec(sprintf('sqlite3 %s "%s;"', $sqliteDb, $tableSchema));
            }
        } catch (\Exception $e) {
            throw new RuntimeException(sprintf('Errore durante la creazione delle tabelle: %s', $e->getMessage()));
        }
    }

    /**
     * Importa i dati CSV nelle tabelle SQLite.
     *
     * @param array<int, string> $tables
     * @param string $sqliteDb
     * @return void
     */
    private function importDataToSQLite(array $tables, string $sqliteDb): void
    {
        try {
            foreach ($tables as $table) {
                $csvFile = storage_path(sprintf("app/%s.csv", $table));
                shell_exec(sprintf('sqlite3 %s ".mode csv" ".import %s %s"', $sqliteDb, $csvFile, $table));
            }
        } catch (\Exception $e) {
            throw new RuntimeException(sprintf('Errore durante l\'importazione dei dati: %s', $e->getMessage()));
        }
=======
     * Importa lo schema del database.
     */
    protected function importSchema(string $source, string $destination, ?array $tables = null): void
    {
        // Implementazione dell'importazione dello schema
        $this->info('Importazione schema in corso...');
    }

    /**
     * Importa i dati del database.
     */
    protected function importData(string $source, string $destination, ?array $tables = null): void
    {
        // Implementazione dell'importazione dei dati
        $this->info('Importazione dati in corso...');
>>>>>>> 3268b83 (.)
    }
}
