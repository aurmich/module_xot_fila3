<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Pdf;

use Spipu\Html2Pdf\Html2Pdf;
use Modules\Xot\Datas\PdfData;
use Illuminate\Support\Facades\Storage;
use Spatie\QueueableAction\QueueableAction;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
/**
 * Classe per la generazione di PDF da HTML.
 */
>>>>>>> origin/dev
>>>>>>> 3268b83 (.)
class PdfByHtmlAction
{
    use QueueableAction;

    public PdfEngineEnum $engine;

<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
    /**
     * Genera un PDF da HTML.
     *
     * @param string $html Il contenuto HTML da convertire
     * @param string $filename Il nome del file PDF
     * @param string $disk Il disco di storage da utilizzare
     * @param string $out Il tipo di output (download/save)
     * @param string $orientation L'orientamento del PDF (P/L)
     * @param PdfEngineEnum $engine Il motore di rendering da utilizzare
     *
     * @return string|BinaryFileResponse Il percorso del file o la risposta di download
     */
>>>>>>> origin/dev
>>>>>>> 3268b83 (.)
    public function execute(
        string $html,
        string $filename = 'my_doc.pdf',
        string $disk = 'cache',
        string $out = 'download',
        string $orientation = 'P',
        PdfEngineEnum $engine = PdfEngineEnum::SPIPU,
    ): string|BinaryFileResponse {
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 3268b83 (.)
        return $data = PdfData::from([
            'html'->$html,
            'filename' -> $filename,
            'disk' -> $disk,
            'out' -> $out,
            'orientation' -> $orientation,
            'engine' -> $engine,
            ]);
<<<<<<< HEAD
=======
=======
        $data = PdfData::from([
            'html' => $html,
            'filename' => $filename,
            'disk' => $disk,
            'out' => $out,
            'orientation' => $orientation,
            'engine' => $engine,
        ]);

        // Generiamo il PDF
        $data->fromHtml($html);

        return match ($out) {
            'download' => $data->download(),
            default => $data->getPath(),
        };
>>>>>>> origin/dev
>>>>>>> 3268b83 (.)
    }
}
