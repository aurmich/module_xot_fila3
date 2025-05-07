<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Export;

use Illuminate\Support\LazyCollection;
use Illuminate\Support\Str;

use function Safe\fclose;
use function Safe\fopen;
use function Safe\fputcsv;

use Spatie\QueueableAction\QueueableAction;
use Symfony\Component\HttpFoundation\StreamedResponse;
use Webmozart\Assert\Assert;

class ExportXlsStreamByLazyCollection
{
    use QueueableAction;

    /**
     * Esporta una LazyCollection in un file CSV streamed.
     *
     * @param LazyCollection $data I dati da esportare
     * @param string $filename Nome del file CSV
     * @param string|null $transKey Chiave di traduzione per le intestazioni
     * @param array<string>|null $fields Campi da includere nell'export
     * 
     * @return StreamedResponse
     */
    public function execute(
        LazyCollection $data,
        string $filename = 'test.csv',
        ?string $transKey = null,
        ?array $fields = null,
    ): StreamedResponse {
        $headers = [
<<<<<<< HEAD
            'Content-Disposition' => 'attachment; filename=' . $filename,
=======
<<<<<<< HEAD
            'Content-Disposition' => 'attachment; filename=' . $filename,
=======
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename=' . $filename,
            'Pragma' => 'no-cache',
            'Cache-Control' => 'must-revalidate, post-check=0, pre-check=0',
            'Expires' => '0'
>>>>>>> origin/dev
>>>>>>> 3268b83 (.)
        ];
        $head = $this->headings($data, $transKey);

        return response()->stream(
            static function () use ($data, $head): void {
                $file = fopen('php://output', 'w+');

<<<<<<< HEAD
                // Assicuriamo che le intestazioni siano stringhe
                $headStrings = array_map(function ($item) {
                    //return is_string($item) ? $item : (string) $item;
                    return strval($item);
                }, $head);

=======
<<<<<<< HEAD
                // Assicuriamo che le intestazioni siano stringhe
                $headStrings = array_map(function ($item) {
                    return is_string($item) ? $item : (string) $item;
                }, $head);

=======


                // Assicuriamo che le intestazioni siano stringhe
                $headStrings = array_map(function ($item): string {
                    return strval($item);
                }, $head);
>>>>>>> origin/dev
>>>>>>> 3268b83 (.)
                fputcsv($file, $headStrings);

                foreach ($data as $key => $value) {
                    // Gestiamo sia oggetti che possono essere convertiti ad array che array diretti
                    if (is_object($value) && method_exists($value, 'toArray')) {
                        /** @var array<string|int|float|bool|null> $rowData */
                        $rowData = $value->toArray();
                    } elseif (is_array($value)) {
                        /** @var array<string|int|float|bool|null> $rowData */
                        $rowData = $value;
                    } else {
                        // Se non è né un oggetto con toArray né un array, saltiamo
                        continue;
                    }
<<<<<<< HEAD
                    // Convertiamo tutti i valori in stringhe o null
                    $safeRowData = array_map(function ($item) {
=======
<<<<<<< HEAD

                    // Convertiamo tutti i valori in stringhe o null
                    $safeRowData = array_map(function ($item) {
=======
                    // Convertiamo tutti i valori in stringhe o null
                    $safeRowData = array_map(function ($item): ?string {
>>>>>>> origin/dev
>>>>>>> 3268b83 (.)
                        if ($item === null) {
                            return null;
                        }
                        return is_string($item) ? $item : (string) $item;
                    }, $rowData);

                    fputcsv($file, $safeRowData);
                }
<<<<<<< HEAD

=======
<<<<<<< HEAD
=======
>>>>>>> 3268b83 (.)
                // Aggiungiamo righe vuote alla fine
                $blanks = ["\t", "\t", "\t", "\t"];
                fputcsv($file, $blanks);
                fputcsv($file, $blanks);
                fputcsv($file, $blanks);
<<<<<<< HEAD
=======
>>>>>>> origin/dev
>>>>>>> 3268b83 (.)

                fclose($file);
            },
            200,
            $headers
        );
    }

    /**
<<<<<<< HEAD
=======
<<<<<<< HEAD
     * Genera le intestazioni per il CSV.
     *
     * @param LazyCollection $data
     * @param string|null $transKey
     * @return array<string>
     */
    private function headings(LazyCollection $data, ?string $transKey = null): array
    {
        $firstItem = $data->first();
        if ($firstItem === null) {
            return [];
        }

        if (is_object($firstItem) && method_exists($firstItem, 'toArray')) {
            $fields = array_keys($firstItem->toArray());
        } elseif (is_array($firstItem)) {
            $fields = array_keys($firstItem);
        } else {
            return [];
        }

        if ($transKey === null) {
            return $fields;
        }

        return array_map(function ($field) use ($transKey) {
            return trans($transKey . '.' . $field) ?: $field;
        }, $fields);
=======
>>>>>>> 3268b83 (.)
     * Ottiene le intestazioni per l'export.
     *
     * @param LazyCollection $data I dati da cui estrarre le intestazioni
     * @param string|null $transKey Chiave di traduzione per le intestazioni
     * 
     * @return array<string>
     */
    public function headings(LazyCollection $data, ?string $transKey = null): array
    {
        $first = $data->first();
        if (!is_array($first) && (!is_object($first) || !method_exists($first, 'toArray'))) {
            return []; // Ritorna intestazioni vuote se non c'è un primo elemento valido
        }

<<<<<<< HEAD
        $headArray = is_array($first) ? $first : $first->toArray();

=======

        $headArray = is_array($first) ? $first : $first->toArray();
>>>>>>> 3268b83 (.)
        /** 
         * @var array<string, mixed> $headArray 
         * @var \Illuminate\Support\Collection<int, string> $headings 
         */
        $headings = collect($headArray)->keys();

<<<<<<< HEAD
=======


>>>>>>> 3268b83 (.)
        if (null !== $transKey) {
            $headings = $headings->map(
                static function (string $item) use ($transKey) {
                    $key = $transKey . '.fields.' . $item;
                    $trans = trans($key);
                    if ($trans !== $key) {
                        return $trans;
                    }

<<<<<<< HEAD
=======

>>>>>>> 3268b83 (.)
                    Assert::string($item1 = Str::replace('.', '_', $item), '[' . __LINE__ . '][' . __CLASS__ . ']');
                    $key = $transKey . '.fields.' . $item1;
                    $trans = trans($key);
                    if ($trans !== $key) {
                        return $trans;
                    }

                    return $item;
                }
            );
        }

        /** @var array<string> */
<<<<<<< HEAD
        return $headings->map(fn($item) => strval($item))->toArray();
=======
        return $headings->map(fn($item): string => strval($item))->toArray();
>>>>>>> origin/dev
>>>>>>> 3268b83 (.)
    }
}
