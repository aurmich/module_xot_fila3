<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Export;

use Illuminate\Http\Response;
use Illuminate\Support\LazyCollection;
use Maatwebsite\Excel\Facades\Excel;
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
     * @param array<int, string> $fields Campi da includere nell'export
<<<<<<< HEAD
<<<<<<< HEAD
     *
=======
     * 
>>>>>>> e5c56c3 (.)
=======
     *
>>>>>>> 7b67053 (fix: auto resolve conflict)
     * @return BinaryFileResponse
     */
    public function execute(
        LazyCollection $collection,
        string $filename = 'test.xlsx',
        array $fields = [],
    ): BinaryFileResponse {
        // Assicuriamo che $fields sia un array di stringhe
        $stringFields = array_map(function ($field) {
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD

            return strval($field);
=======
=======
>>>>>>> d9307de (fix: auto resolve conflict)
<<<<<<< HEAD
=======
>>>>>>> c2dac53 (.)
            return strval($field);
            return strval($field);
            return is_string($field) ? $field : (string) $field;
<<<<<<< HEAD
>>>>>>> origin/dev
>>>>>>> origin/dev
<<<<<<< HEAD
>>>>>>> e5c56c3 (.)
=======
=======

            return strval($field);
>>>>>>> 50bb41c (fix: auto resolve conflict)
>>>>>>> d9307de (fix: auto resolve conflict)
=======

            return strval($field);
>>>>>>> c2dac53 (.)
        }, array_values($fields));

        $export = new LazyCollectionExport(
            $collection,
            $filename,
            $stringFields
        );

        return Excel::download($export, $filename);
    public function execute(
        LazyCollection $collection,
        string $filename = 'test.xlsx',
        ?string $transKey = null,
        array $fields = [],
    ): Response|BinaryFileResponse {
        $export = new LazyCollectionExport($collection, $transKey, $fields);

        return $export->download($filename);
    }
}
