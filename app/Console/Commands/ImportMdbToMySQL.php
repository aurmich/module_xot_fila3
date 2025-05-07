<?php

declare(strict_types=1);

namespace Modules\Xot\Console\Commands;

use Illuminate\Console\Command;
<<<<<<< HEAD
use RuntimeException;
use function Safe\shell_exec;
=======
use Illuminate\Support\Facades\DB;
use Safe\Exceptions\DatetimeException;
use Safe\Exceptions\JsonException;
use Safe\Exceptions\PcreException;
<<<<<<< HEAD
>>>>>>> 3268b83 (.)
=======
>>>>>>> 355a587 (.)

class ImportMdbToMySQL extends Command
{
    /**
<<<<<<< HEAD
     * Il nome e la firma del comando.
     *
     * @var string
     */
    protected $signature = 'xot:import-mdb-to-mysql';

    /**
     * La descrizione del comando.
     *
     * @var string
     */
    protected $description = 'Importa un file .mdb in MySQL';

    /**
     * Esegui il comando.
     */
    public function handle(): int
    {
        $mdbFile = $this->ask('Inserisci il percorso del file .mdb');
        if (!is_string($mdbFile)) {
            throw new RuntimeException('Il percorso del file deve essere una stringa');
        }

        $mysqlDb = $this->ask('Inserisci il nome del database MySQL');
        if (!is_string($mysqlDb)) {
            throw new RuntimeException('Il nome del database deve essere una stringa');
        }

        $this->info("File .mdb: $mdbFile");
        $this->info("Database MySQL: $mysqlDb");

        $this->info('Esportando tabelle dal file .mdb...');
        $tables = $this->exportTablesToSQL($mdbFile);
        if (empty($tables)) {
            $this->error('Nessuna tabella trovata nel file .mdb');
            return Command::FAILURE;
        }

        $this->info('Importando le tabelle in MySQL...');
        $this->importTablesIntoMySQL($tables, $mysqlDb);

        $this->info('Importazione completata con successo!');
        return Command::SUCCESS;
    }

    /**
     * Esporta tutte le tabelle dal file .mdb in formato SQL.
     *
     * @return array<int, string>
     */
    private function exportTablesToSQL(string $mdbFile): array
    {
        $tables = [];
        $tableList = shell_exec("mdb-tables $mdbFile");
        if (!$tableList) {
            return [];
        }

        // Esporta ogni tabella in un file SQL
        foreach (explode("\n", trim($tableList)) as $table) {
            if (empty($table)) {
                continue;
            }

            $tables[] = $table;
            $sqlFile = storage_path("app/{$table}.sql");
            shell_exec("mdb-schema $mdbFile mysql > $sqlFile");
            shell_exec("mdb-export -I mysql $mdbFile $table >> $sqlFile");
        }

        return $tables;
    }

    /**
     * Importa le tabelle in MySQL.
     *
     * @param array<int, string> $tables
     */
    private function importTablesIntoMySQL(array $tables, string $mysqlDb): void
    {
        foreach ($tables as $table) {
            $sqlFile = storage_path("app/{$table}.sql");
            $command = "mysql -u root $mysqlDb < $sqlFile";
            shell_exec($command);
        }
=======
     * Il nome e la firma del comando console.
     *
     * @var string
     */
    protected $signature = 'xot:import-mdb-to-mysql 
                            {source : Percorso del file MDB sorgente} 
                            {connection : Nome della connessione MySQL} 
                            {--tables=* : Tabelle specifiche da importare} 
                            {--skip-data : Salta l\'importazione dei dati}';

    /**
     * La descrizione del comando console.
     *
     * @var string
     */
    protected $description = 'Importa un database MDB in MySQL';

    /**
     * Esegui il comando console.
     */
    public function handle(): int
    {
        $source = $this->argument('source');
        $connection = $this->argument('connection');
        $tables = $this->option('tables');
        $skipData = $this->option('skip-data');

        if (! file_exists($source)) {
            $this->error("Il file sorgente {$source} non esiste!");
            return 1;
        }

        try {
            $this->importSchema($source, $connection, $tables);
            
            if (! $skipData) {
                $this->importData($source, $connection, $tables);
            }

            $this->info('Importazione completata con successo!');
            return 0;
        } catch (\Exception $e) {
            $this->error('Errore durante l\'importazione: ' . $e->getMessage());
            return 1;
        }
    }

    /**
     * Importa lo schema del database.
     */
    protected function importSchema(string $source, string $connection, ?array $tables = null): void
    {
        // Implementazione dell'importazione dello schema
        $this->info('Importazione schema in corso...');
    }

    /**
     * Importa i dati del database.
     */
    protected function importData(string $source, string $connection, ?array $tables = null): void
    {
        // Implementazione dell'importazione dei dati
        $this->info('Importazione dati in corso...');
<<<<<<< HEAD
>>>>>>> 3268b83 (.)
=======
>>>>>>> 355a587 (.)
    }
}
