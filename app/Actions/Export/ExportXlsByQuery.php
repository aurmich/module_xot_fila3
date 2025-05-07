<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Export;

use Illuminate\Database\Eloquent\Builder;
use Maatwebsite\Excel\Facades\Excel;
use Modules\Xot\Exports\QueryExport;
use Spatie\QueueableAction\QueueableAction;
// use Staudenmeir\LaravelCte\Query\Builder as CteBuilder;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
<<<<<<< HEAD
=======
<<<<<<< HEAD
use Webmozart\Assert\Assert;
=======
>>>>>>> origin/dev
>>>>>>> 3268b83 (.)

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
     * 
     * @return BinaryFileResponse
<<<<<<< HEAD
=======
<<<<<<< HEAD
     * 
     * @throws \InvalidArgumentException Se i campi non sono validi
=======
>>>>>>> origin/dev
>>>>>>> 3268b83 (.)
     */
    public function execute(
        Builder $query,
        string $filename = 'test.xlsx',
        array $fields = [],
        ?int $limit = null,
    ): BinaryFileResponse {
<<<<<<< HEAD
        // Assicuriamo che $fields sia un array di stringhe
        $stringFields = array_map(function ($field) {
            return strval($field);
=======
<<<<<<< HEAD
        Assert::allString($fields, 'I campi devono essere stringhe');

        // Assicuriamo che $fields sia un array di stringhe non vuote
        $stringFields = array_map(function ($field) {
            Assert::stringNotEmpty($field, 'I campi non possono essere vuoti');
            return $field;
=======
        // Assicuriamo che $fields sia un array di stringhe
        $stringFields = array_map(function ($field) {

            return strval($field);
>>>>>>> origin/dev
>>>>>>> 3268b83 (.)
        }, array_values($fields));

        $export = new QueryExport(
            query: $query,
            transKey: null,
            fields: $stringFields
        );
<<<<<<< HEAD
        // Note: QueryExport doesn't accept a limit parameter directly
        // If limit is needed, apply it to the query before passing to the exporter
        if ($limit !== null) {
=======
<<<<<<< HEAD

        // Applica il limite alla query se specificato
        if ($limit !== null) {
            Assert::positiveInteger($limit, 'Il limite deve essere un numero positivo');
=======
        // Note: QueryExport doesn't accept a limit parameter directly
        // If limit is needed, apply it to the query before passing to the exporter
        if ($limit !== null) {
>>>>>>> origin/dev
>>>>>>> 3268b83 (.)
            $query->limit($limit);
        }

        return Excel::download($export, $filename);
    }
}
