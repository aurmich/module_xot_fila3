<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Export;

// use Modules\Xot\Services\ArrayService;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Facades\Excel;
use Modules\Xot\Exports\ViewExport;
use Spatie\QueueableAction\QueueableAction;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class ExportXlsByView
{
    use QueueableAction;

    /**
     * Esporta una vista in Excel.
     *
     * @param View $view Vista da esportare
     * @param string $filename Nome del file Excel
<<<<<<< HEAD
<<<<<<< HEAD
     * @param array<string>|null $fields Campi da includere nell'export
     * 
=======
<<<<<<< HEAD
     * @param list<string>|null $fields Campi da includere nell'export (tipizzato per PHPStan 9)
     * 
=======
     * @param array<string>|null $fields Campi da includere nell'export
     *
>>>>>>> origin/dev
>>>>>>> 3268b83 (.)
=======
     * @param list<string>|null $fields Campi da includere nell'export (tipizzato per PHPStan 9)
     * 
>>>>>>> 355a587 (.)
     * @return BinaryFileResponse
     */
    public function execute(
        View $view,
        string $filename = 'test.xlsx',
        ?array $fields = null,
    ): BinaryFileResponse {
        // Se $fields non è null, assicuriamo che sia un array di stringhe
        $stringFields = null;
        if (is_array($fields)) {
<<<<<<< HEAD
<<<<<<< HEAD
            $stringFields = array_map(function ($field) {
                return strval($field);
=======
<<<<<<< HEAD
=======
>>>>>>> 355a587 (.)
            // Corretto secondo le regole Laraxot/PTVX e PHPStan 9: controllo esplicito del tipo
            // In questo modo, si assicura che i campi siano stringhe o scalari convertibili in stringhe
            $stringFields = array_map(function ($field) {
                return is_string($field) ? $field : (is_scalar($field) ? (string) $field : '');
<<<<<<< HEAD
=======
            $stringFields = array_map(static function ($field) {
                return strval($field);
>>>>>>> origin/dev
>>>>>>> 3268b83 (.)
=======
>>>>>>> 355a587 (.)
            }, array_values($fields));
        }

        $export = new ViewExport(
            view: $view,
            transKey: null,
            fields: $stringFields
        );

        return Excel::download($export, $filename);
    }
}
