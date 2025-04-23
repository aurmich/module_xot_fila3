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
<<<<<<< HEAD
<<<<<<< HEAD
     *
=======
     * 
>>>>>>> e5c56c3 (.)
=======
     *
>>>>>>> 7b67053 (fix: auto resolve conflict)
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
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename=' . $filename,
            'Pragma' => 'no-cache',
            'Cache-Control' => 'must-revalidate, post-check=0, pre-check=0',
            'Expires' => '0'
=======
=======
>>>>>>> d9307de (fix: auto resolve conflict)
=======
>>>>>>> 7b67053 (fix: auto resolve conflict)
<<<<<<< HEAD
=======
>>>>>>> c2dac53 (.)
            'Content-Disposition' => 'attachment; filename=' . $filename,
            'Content-Disposition' => 'attachment; filename=' . $filename,
            'Content-Disposition' => 'attachment; filename='.$filename,
<<<<<<< HEAD
>>>>>>> origin/dev
>>>>>>> origin/dev
<<<<<<< HEAD
>>>>>>> e5c56c3 (.)
=======
=======
=======
>>>>>>> 4ab3760 (.)
=======
>>>>>>> c2dac53 (.)
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename=' . $filename,
            'Pragma' => 'no-cache',
            'Cache-Control' => 'must-revalidate, post-check=0, pre-check=0',
            'Expires' => '0'
            'Content-Disposition' => 'attachment; filename='.$filename,
<<<<<<< HEAD
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
<<<<<<< HEAD
>>>>>>> d9307de (fix: auto resolve conflict)
=======
=======
>>>>>>> 4ab3760 (.)
>>>>>>> 7b67053 (fix: auto resolve conflict)
=======
>>>>>>> c2dac53 (.)
        ];
        $head = $this->headings($data, $transKey);

        return response()->stream(
            static function () use ($data, $head): void {
                $file = fopen('php://output', 'w+');
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD



                // Assicuriamo che le intestazioni siano stringhe
                $headStrings = array_map(function ($item): string {
                    return strval($item);
                }, $head);
=======
=======
>>>>>>> d9307de (fix: auto resolve conflict)
=======
>>>>>>> 7b67053 (fix: auto resolve conflict)
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> origin/dev
=======
>>>>>>> c2dac53 (.)

                // Assicuriamo che le intestazioni siano stringhe
                $headStrings = array_map(function ($item) {
                    //return is_string($item) ? $item : (string) $item;
                    return strval($item);
                }, $head);

                
                // Assicuriamo che le intestazioni siano stringhe
                $headStrings = array_map(function ($item) {
                    return is_string($item) ? $item : (string) $item;
                }, $head);
                
<<<<<<< HEAD
>>>>>>> origin/dev
>>>>>>> origin/dev
<<<<<<< HEAD
>>>>>>> e5c56c3 (.)
=======
=======
=======
>>>>>>> 4ab3760 (.)
=======
>>>>>>> c2dac53 (.)



                // Assicuriamo che le intestazioni siano stringhe
                $headStrings = array_map(function ($item): string {
                    return strval($item);
                }, $head);
<<<<<<< HEAD
>>>>>>> 50bb41c (fix: auto resolve conflict)
>>>>>>> d9307de (fix: auto resolve conflict)
=======
>>>>>>> c2dac53 (.)
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
<<<<<<< HEAD
<<<<<<< HEAD
                    // Convertiamo tutti i valori in stringhe o null
                    $safeRowData = array_map(function ($item): ?string {
=======
=======
>>>>>>> d9307de (fix: auto resolve conflict)
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
>>>>>>> c2dac53 (.)

                    
                    // Convertiamo tutti i valori in stringhe o null
                    $safeRowData = array_map(function ($item) {
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> e5c56c3 (.)
=======
=======
                    // Convertiamo tutti i valori in stringhe o null
                    $safeRowData = array_map(function ($item): ?string {
>>>>>>> 50bb41c (fix: auto resolve conflict)
>>>>>>> d9307de (fix: auto resolve conflict)
=======
                    // Convertiamo tutti i valori in stringhe o null
                    $safeRowData = array_map(function ($item): ?string {
>>>>>>> c2dac53 (.)
                        if ($item === null) {
                            return null;
                        }
                        return is_string($item) ? $item : (string) $item;
                    }, $rowData);
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD

                    fputcsv($file, $safeRowData);
                }
=======
=======
>>>>>>> d9307de (fix: auto resolve conflict)
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> origin/dev
=======
>>>>>>> c2dac53 (.)

                    fputcsv($file, $safeRowData);
                }

                    
                    fputcsv($file, $safeRowData);
                }
                
<<<<<<< HEAD
>>>>>>> origin/dev
>>>>>>> origin/dev
<<<<<<< HEAD
>>>>>>> e5c56c3 (.)
=======
=======

                    fputcsv($file, $safeRowData);
                }
>>>>>>> 50bb41c (fix: auto resolve conflict)
>>>>>>> d9307de (fix: auto resolve conflict)
=======

                    fputcsv($file, $safeRowData);
                }
>>>>>>> c2dac53 (.)
                // Aggiungiamo righe vuote alla fine
                $blanks = ["\t", "\t", "\t", "\t"];
                fputcsv($file, $blanks);
                fputcsv($file, $blanks);
                fputcsv($file, $head);

                foreach ($data as $key => $value) {
                    // if(!method_exists($value,'toArray')){
                    //    throw new \Exception('WIP['.__LINE__.']['.class_basename($this).']');
                    // }
                    /** @phpstan-ignore method.nonObject */
                    $data = $value->toArray();

                    fputcsv($file, $data);
                }
                $blanks = ["\t", "\t", "\t", "\t"];
                fputcsv($file, $blanks);
                $blanks = ["\t", "\t", "\t", "\t"];
                fputcsv($file, $blanks);
                $blanks = ["\t", "\t", "\t", "\t"];
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
<<<<<<< HEAD
<<<<<<< HEAD
     *
=======
     * 
>>>>>>> e5c56c3 (.)
=======
     *
>>>>>>> 7b67053 (fix: auto resolve conflict)
     * @return array<string>
     */
    public function headings(LazyCollection $data, ?string $transKey = null): array
    {
        $first = $data->first();
        if (!is_array($first) && (!is_object($first) || !method_exists($first, 'toArray'))) {
            return []; // Ritorna intestazioni vuote se non c'è un primo elemento valido
        }


        $headArray = is_array($first) ? $first : $first->toArray();
        /**
         * @var array<string, mixed> $headArray
         * @var \Illuminate\Support\Collection<int, string> $headings
         */
        $headings = collect($headArray)->keys();


=======
<<<<<<< HEAD

        $headArray = is_array($first) ? $first : $first->toArray();


        $headArray = is_array($first) ? $first : $first->toArray();

        
        $headArray = is_array($first) ? $first : $first->toArray();
        


        $headArray = is_array($first) ? $first : $first->toArray();
        /** 
         * @var array<string, mixed> $headArray 
         * @var \Illuminate\Support\Collection<int, string> $headings 
        /**
         * @var array<string, mixed> $headArray
         * @var \Illuminate\Support\Collection<int, string> $headings
         */
        $headings = collect($headArray)->keys();
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> origin/dev
<<<<<<< HEAD
>>>>>>> e5c56c3 (.)
=======
=======


>>>>>>> 50bb41c (fix: auto resolve conflict)
>>>>>>> d9307de (fix: auto resolve conflict)
=======


>>>>>>> c2dac53 (.)

        if (null !== $transKey) {
            $headings = $headings->map(
                static function (string $item) use ($transKey) {
                    $key = $transKey . '.fields.' . $item;
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
=======
=======
>>>>>>> c2dac53 (.)
        
    public function headings(LazyCollection $data, ?string $transKey = null): array
    {
        /**
         * @var array
         */
        $head = $data->first();
        $headings = collect($head)->keys();
        if (null !== $transKey) {
            $headings = $headings->map(
                static function (string $item) use ($transKey) {
                    $key = $transKey.'.fields.'.$item;
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> origin/dev
>>>>>>> origin/dev
<<<<<<< HEAD
>>>>>>> e5c56c3 (.)
=======
=======
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
<<<<<<< HEAD
>>>>>>> d9307de (fix: auto resolve conflict)
=======
=======
>>>>>>> 4ab3760 (.)
>>>>>>> 7b67053 (fix: auto resolve conflict)
=======
>>>>>>> c2dac53 (.)
                    $trans = trans($key);
                    if ($trans !== $key) {
                        return $trans;
                    }

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD

                    Assert::string($item1 = Str::replace('.', '_', $item), '[' . __LINE__ . '][' . __CLASS__ . ']');
                    $key = $transKey . '.fields.' . $item1;
=======
=======
>>>>>>> d9307de (fix: auto resolve conflict)
=======
>>>>>>> 7b67053 (fix: auto resolve conflict)
<<<<<<< HEAD
=======
>>>>>>> c2dac53 (.)
                    Assert::string($item1 = Str::replace('.', '_', $item), '[' . __LINE__ . '][' . __CLASS__ . ']');
                    $key = $transKey . '.fields.' . $item1;

                    Assert::string($item1 = Str::replace('.', '_', $item), '[' . __LINE__ . '][' . __CLASS__ . ']');
                    $key = $transKey . '.fields.' . $item1;
                    Assert::string($item1 = Str::replace('.', '_', $item), '['.__LINE__.']['.__CLASS__.']');
                    $key = $transKey.'.fields.'.$item1;
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> origin/dev
>>>>>>> origin/dev
<<<<<<< HEAD
>>>>>>> e5c56c3 (.)
=======
=======
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
<<<<<<< HEAD
>>>>>>> d9307de (fix: auto resolve conflict)
=======
=======
>>>>>>> 4ab3760 (.)
>>>>>>> 7b67053 (fix: auto resolve conflict)
=======
>>>>>>> c2dac53 (.)
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
        return $headings->map(fn($item): string => strval($item))->toArray();
=======
<<<<<<< HEAD
=======
>>>>>>> c2dac53 (.)
        return $headings->map(fn($item) => strval($item))->toArray();
        return $headings->map(fn($item) => strval($item))->toArray();
        return $headings->map(fn ($item) => is_string($item) ? $item : (string) $item)->toArray();
<<<<<<< HEAD
>>>>>>> origin/dev
>>>>>>> origin/dev
<<<<<<< HEAD
>>>>>>> e5c56c3 (.)
=======
=======
<<<<<<< HEAD
=======
>>>>>>> c2dac53 (.)
        /** @var array<string> */
        return $headings->map(fn($item): string => strval($item))->toArray();
        return $headings->toArray();
<<<<<<< HEAD
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
<<<<<<< HEAD
>>>>>>> d9307de (fix: auto resolve conflict)
=======
=======
>>>>>>> 4ab3760 (.)
>>>>>>> 7b67053 (fix: auto resolve conflict)
=======
>>>>>>> c2dac53 (.)
    }
}
