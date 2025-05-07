<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Export;

use Illuminate\Http\Response;
use Illuminate\Support\LazyCollection;
use Maatwebsite\Excel\Facades\Excel;
use Modules\Xot\Exports\LazyCollectionExport;
use Spatie\QueueableAction\QueueableAction;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class ExportXlsByLazyCollection
{
    use QueueableAction;

    /**
     * Esporta una lazy collection in Excel.
     *
     * @param LazyCollection $collection La lazy collection da esportare
     * @param string $filename Nome del file Excel
<<<<<<< HEAD
     * @param array<int, string> $fields Campi da includere nell'export
=======
<<<<<<< HEAD
     * @param array<int, string|int|float> $fields Campi da includere nell'export
=======
     * @param array<int, string> $fields Campi da includere nell'export
>>>>>>> origin/dev
>>>>>>> 3268b83 (.)
     * 
     * @return BinaryFileResponse
     */
    public function execute(
        LazyCollection $collection,
        string $filename = 'test.xlsx',
        array $fields = [],
    ): BinaryFileResponse {
<<<<<<< HEAD
        // Assicuriamo che $fields sia un array di stringhe
        $stringFields = array_map(function ($field) {
            return strval($field);
        }, array_values($fields));
=======
<<<<<<< HEAD
        // Convertiamo tutti i valori in stringhe e filtriamo i valori vuoti
        $stringFields = array_values(array_filter(
            array_map(
                static fn ($field): string => (string) $field,
                $fields
            ),
            static fn (string $field): bool => '' !== $field
        ));
=======
        // Assicuriamo che $fields sia un array di stringhe
        $stringFields = array_map(function ($field) {

            return strval($field);
        }, array_values($fields));
>>>>>>> origin/dev
>>>>>>> 3268b83 (.)

        $export = new LazyCollectionExport(
            $collection,
            $filename,
            $stringFields
        );

        return Excel::download($export, $filename);
    }
}
