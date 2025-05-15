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
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename=' . $filename,
            'Pragma' => 'no-cache',
            'Cache-Control' => 'must-revalidate, post-check=0, pre-check=0',
            'Expires' => '0'
>>>>>>> 823c958 (.)
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


                // Assicuriamo che le intestazioni siano stringhe
                $headStrings = array_map(function ($item): string {
                    return strval($item);
                }, $head);
>>>>>>> 823c958 (.)
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
                    // Convertiamo tutti i valori in stringhe o null
<<<<<<< HEAD
                    $safeRowData = array_map(function ($item) {
=======
                    $safeRowData = array_map(function ($item): ?string {
>>>>>>> 823c958 (.)
                        if ($item === null) {
                            return null;
                        }
                        return is_string($item) ? $item : (string) $item;
                    }, $rowData);

                    fputcsv($file, $safeRowData);
                }
<<<<<<< HEAD

=======
>>>>>>> 823c958 (.)
                // Aggiungiamo righe vuote alla fine
                $blanks = ["\t", "\t", "\t", "\t"];
                fputcsv($file, $blanks);
                fputcsv($file, $blanks);
                fputcsv($file, $blanks);

                fclose($file);
            },
            200,
            $headers
        );
    }

    /**
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
>>>>>>> 823c958 (.)
        /** 
         * @var array<string, mixed> $headArray 
         * @var \Illuminate\Support\Collection<int, string> $headings 
         */
        $headings = collect($headArray)->keys();

<<<<<<< HEAD
=======


>>>>>>> 823c958 (.)
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

>>>>>>> 823c958 (.)
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
>>>>>>> 823c958 (.)
    }
}
