<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Export;

use Illuminate\Support\LazyCollection;
use Illuminate\Support\Str;
<<<<<<< HEAD
<<<<<<< HEAD
use Spatie\QueueableAction\QueueableAction;
use Symfony\Component\HttpFoundation\StreamedResponse;
use Webmozart\Assert\Assert;
=======
>>>>>>> e697a77b (.)
=======
>>>>>>> 89d0c8f4 (.)

use function Safe\fclose;
use function Safe\fopen;
use function Safe\fputcsv;

<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
>>>>>>> 89d0c8f4 (.)
use Spatie\QueueableAction\QueueableAction;
use Symfony\Component\HttpFoundation\StreamedResponse;
use Webmozart\Assert\Assert;

<<<<<<< HEAD
>>>>>>> e697a77b (.)
=======
>>>>>>> 89d0c8f4 (.)
class ExportXlsStreamByLazyCollection
{
    use QueueableAction;

    /**
     * Esporta una LazyCollection in un file CSV streamed.
     *
<<<<<<< HEAD
<<<<<<< HEAD
     * @param  LazyCollection  $data  I dati da esportare
     * @param  string  $filename  Nome del file CSV
     * @param  string|null  $transKey  Chiave di traduzione per le intestazioni
     * @param  array<string>|null  $fields  Campi da includere nell'export
=======
=======
>>>>>>> 89d0c8f4 (.)
     * @param LazyCollection $data I dati da esportare
     * @param string $filename Nome del file CSV
     * @param string|null $transKey Chiave di traduzione per le intestazioni
     * @param array<string>|null $fields Campi da includere nell'export
     * 
     * @return StreamedResponse
<<<<<<< HEAD
>>>>>>> e697a77b (.)
=======
>>>>>>> 89d0c8f4 (.)
     */
    public function execute(
        LazyCollection $data,
        string $filename = 'test.csv',
        ?string $transKey = null,
        ?array $fields = null,
    ): StreamedResponse {
        $headers = [
<<<<<<< HEAD
<<<<<<< HEAD
            'Content-Disposition' => 'attachment; filename='.$filename,
=======
            'Content-Disposition' => 'attachment; filename=' . $filename,
>>>>>>> e697a77b (.)
=======
            'Content-Disposition' => 'attachment; filename=' . $filename,
>>>>>>> 89d0c8f4 (.)
        ];
        $head = $this->headings($data, $transKey);

        return response()->stream(
            static function () use ($data, $head): void {
                $file = fopen('php://output', 'w+');

                // Assicuriamo che le intestazioni siano stringhe
                $headStrings = array_map(function ($item) {
<<<<<<< HEAD
<<<<<<< HEAD
                    // return is_string($item) ? $item : (string) $item;
=======
                    //return is_string($item) ? $item : (string) $item;
>>>>>>> e697a77b (.)
=======
                    //return is_string($item) ? $item : (string) $item;
>>>>>>> 89d0c8f4 (.)
                    return strval($item);
                }, $head);

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
                    $safeRowData = array_map(function ($item) {
                        if ($item === null) {
                            return null;
                        }
<<<<<<< HEAD
<<<<<<< HEAD

=======
>>>>>>> e697a77b (.)
=======
>>>>>>> 89d0c8f4 (.)
                        return is_string($item) ? $item : (string) $item;
                    }, $rowData);

                    fputcsv($file, $safeRowData);
                }

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
<<<<<<< HEAD
<<<<<<< HEAD
     * @param  LazyCollection  $data  I dati da cui estrarre le intestazioni
     * @param  string|null  $transKey  Chiave di traduzione per le intestazioni
=======
     * @param LazyCollection $data I dati da cui estrarre le intestazioni
     * @param string|null $transKey Chiave di traduzione per le intestazioni
     * 
>>>>>>> e697a77b (.)
=======
     * @param LazyCollection $data I dati da cui estrarre le intestazioni
     * @param string|null $transKey Chiave di traduzione per le intestazioni
     * 
>>>>>>> 89d0c8f4 (.)
     * @return array<string>
     */
    public function headings(LazyCollection $data, ?string $transKey = null): array
    {
        $first = $data->first();
<<<<<<< HEAD
<<<<<<< HEAD
        if (! is_array($first) && (! is_object($first) || ! method_exists($first, 'toArray'))) {
=======
        if (!is_array($first) && (!is_object($first) || !method_exists($first, 'toArray'))) {
>>>>>>> e697a77b (.)
=======
        if (!is_array($first) && (!is_object($first) || !method_exists($first, 'toArray'))) {
>>>>>>> 89d0c8f4 (.)
            return []; // Ritorna intestazioni vuote se non c'è un primo elemento valido
        }

        $headArray = is_array($first) ? $first : $first->toArray();

<<<<<<< HEAD
<<<<<<< HEAD
        /**
         * @var array<string, mixed> $headArray
         * @var \Illuminate\Support\Collection<int, string> $headings
=======
        /** 
         * @var array<string, mixed> $headArray 
         * @var \Illuminate\Support\Collection<int, string> $headings 
>>>>>>> 89d0c8f4 (.)
         */
        $headings = collect($headArray)->keys();

        if (null !== $transKey) {
            $headings = $headings->map(
                static function (string $item) use ($transKey) {
<<<<<<< HEAD
                    $key = $transKey.'.fields.'.$item;
=======
        /** 
         * @var array<string, mixed> $headArray 
         * @var \Illuminate\Support\Collection<int, string> $headings 
         */
        $headings = collect($headArray)->keys();

        if (null !== $transKey) {
            $headings = $headings->map(
                static function (string $item) use ($transKey) {
                    $key = $transKey . '.fields.' . $item;
>>>>>>> e697a77b (.)
=======
                    $key = $transKey . '.fields.' . $item;
>>>>>>> 89d0c8f4 (.)
                    $trans = trans($key);
                    if ($trans !== $key) {
                        return $trans;
                    }

<<<<<<< HEAD
<<<<<<< HEAD
                    Assert::string($item1 = Str::replace('.', '_', $item), '['.__LINE__.']['.__CLASS__.']');
                    $key = $transKey.'.fields.'.$item1;
=======
                    Assert::string($item1 = Str::replace('.', '_', $item), '[' . __LINE__ . '][' . __CLASS__ . ']');
                    $key = $transKey . '.fields.' . $item1;
>>>>>>> e697a77b (.)
=======
                    Assert::string($item1 = Str::replace('.', '_', $item), '[' . __LINE__ . '][' . __CLASS__ . ']');
                    $key = $transKey . '.fields.' . $item1;
>>>>>>> 89d0c8f4 (.)
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
<<<<<<< HEAD
        return $headings->map(fn ($item) => strval($item))->toArray();
=======
        return $headings->map(fn($item) => strval($item))->toArray();
>>>>>>> e697a77b (.)
=======
        return $headings->map(fn($item) => strval($item))->toArray();
>>>>>>> 89d0c8f4 (.)
    }
}
