<?php

declare(strict_types=1);

namespace Modules\Xot\Console\Commands;

use Illuminate\Console\Command;
use RuntimeException;
<<<<<<< HEAD
<<<<<<< HEAD

=======
>>>>>>> e697a77b (.)
=======
>>>>>>> 89d0c8f4 (.)
use function Safe\shell_exec;

class ImportMdbToMySQL extends Command
{
    /**
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
<<<<<<< HEAD
<<<<<<< HEAD
        if (! is_string($mdbFile)) {
=======
        if (!is_string($mdbFile)) {
>>>>>>> e697a77b (.)
=======
        if (!is_string($mdbFile)) {
>>>>>>> 89d0c8f4 (.)
            throw new RuntimeException('Il percorso del file deve essere una stringa');
        }

        $mysqlDb = $this->ask('Inserisci il nome del database MySQL');
<<<<<<< HEAD
<<<<<<< HEAD
        if (! is_string($mysqlDb)) {
=======
        if (!is_string($mysqlDb)) {
>>>>>>> e697a77b (.)
=======
        if (!is_string($mysqlDb)) {
>>>>>>> 89d0c8f4 (.)
            throw new RuntimeException('Il nome del database deve essere una stringa');
        }

        $this->info("File .mdb: $mdbFile");
        $this->info("Database MySQL: $mysqlDb");

        $this->info('Esportando tabelle dal file .mdb...');
        $tables = $this->exportTablesToSQL($mdbFile);
        if (empty($tables)) {
            $this->error('Nessuna tabella trovata nel file .mdb');
<<<<<<< HEAD
<<<<<<< HEAD

=======
>>>>>>> e697a77b (.)
=======
>>>>>>> 89d0c8f4 (.)
            return Command::FAILURE;
        }

        $this->info('Importando le tabelle in MySQL...');
        $this->importTablesIntoMySQL($tables, $mysqlDb);

        $this->info('Importazione completata con successo!');
<<<<<<< HEAD
<<<<<<< HEAD

=======
>>>>>>> e697a77b (.)
=======
>>>>>>> 89d0c8f4 (.)
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
<<<<<<< HEAD
<<<<<<< HEAD
        if (! $tableList) {
=======
        if (!$tableList) {
>>>>>>> e697a77b (.)
=======
        if (!$tableList) {
>>>>>>> 89d0c8f4 (.)
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
<<<<<<< HEAD
<<<<<<< HEAD
     * @param  array<int, string>  $tables
=======
     * @param array<int, string> $tables
>>>>>>> e697a77b (.)
=======
     * @param array<int, string> $tables
>>>>>>> 89d0c8f4 (.)
     */
    private function importTablesIntoMySQL(array $tables, string $mysqlDb): void
    {
        foreach ($tables as $table) {
            $sqlFile = storage_path("app/{$table}.sql");
            $command = "mysql -u root $mysqlDb < $sqlFile";
            shell_exec($command);
        }
    }
}
