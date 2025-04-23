<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Export;

use Illuminate\Database\Eloquent\Builder;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Database\Eloquent\Builder;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Database\Query\Builder as QueryBuilder;
use Illuminate\Http\Response;
use Modules\Xot\Exports\QueryExport;
use Spatie\QueueableAction\QueueableAction;
// use Staudenmeir\LaravelCte\Query\Builder as CteBuilder;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class ExportXlsByQuery
{
    use QueueableAction;

    /**
     * Esporta i risultati di una query in Excel.
     *
     * @param Builder $query Query da esportare
     * @param string $filename Nome del file Excel
     * @param array<int, string> $fields Campi da includere nell'export
     * @param int|null $limit Limite di righe da esportare
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
        Builder $query,
        string $filename = 'test.xlsx',
        array $fields = [],
        ?int $limit = null,
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

        $export = new QueryExport(
            query: $query,
            transKey: null,
            fields: $stringFields
        );
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
>>>>>>> c2dac53 (.)

        
<<<<<<< HEAD
>>>>>>> origin/dev
>>>>>>> origin/dev
<<<<<<< HEAD
>>>>>>> e5c56c3 (.)
=======
=======
>>>>>>> 50bb41c (fix: auto resolve conflict)
>>>>>>> d9307de (fix: auto resolve conflict)
=======
>>>>>>> c2dac53 (.)
        // Note: QueryExport doesn't accept a limit parameter directly
        // If limit is needed, apply it to the query before passing to the exporter
        if ($limit !== null) {
            $query->limit($limit);
        }

        return Excel::download($export, $filename);
    public function execute(
        QueryBuilder|EloquentBuilder $query,
        string $filename = 'test.xlsx',
        ?string $transKey = null,
        array $fields = [],
    ): Response|BinaryFileResponse {
        $queryExport = new QueryExport($query, $transKey, $fields);
        // $queryExport->queue($filename); // Serialization of 'PDO' is not allowed

        return $queryExport->download($filename);
    }
}
