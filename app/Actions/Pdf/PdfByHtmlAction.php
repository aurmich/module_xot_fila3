<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Pdf;

<<<<<<< HEAD
<<<<<<< HEAD
use Illuminate\Support\Facades\Storage;
use Modules\Xot\Datas\PdfData;
=======
use Spipu\Html2Pdf\Html2Pdf;
use Modules\Xot\Datas\PdfData;
use Illuminate\Support\Facades\Storage;
>>>>>>> e697a77b (.)
=======
use Spipu\Html2Pdf\Html2Pdf;
use Modules\Xot\Datas\PdfData;
use Illuminate\Support\Facades\Storage;
>>>>>>> 89d0c8f4 (.)
use Spatie\QueueableAction\QueueableAction;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class PdfByHtmlAction
{
    use QueueableAction;

    public PdfEngineEnum $engine;

    /**
     * Genera un PDF dall'HTML fornito.
     *
<<<<<<< HEAD
<<<<<<< HEAD
     * @param  string  $html  Contenuto HTML da convertire
     * @param  string  $filename  Nome del file PDF
     * @param  string  $disk  Disco di storage
     * @param  string  $out  Tipo di output (download, path, etc.)
     * @param  string  $orientation  Orientamento (P=Portrait, L=Landscape)
     * @param  PdfEngineEnum  $engine  Engine da utilizzare
=======
=======
>>>>>>> 89d0c8f4 (.)
     * @param string $html Contenuto HTML da convertire
     * @param string $filename Nome del file PDF
     * @param string $disk Disco di storage
     * @param string $out Tipo di output (download, path, etc.)
     * @param string $orientation Orientamento (P=Portrait, L=Landscape)
     * @param PdfEngineEnum $engine Engine da utilizzare
     * @return string|BinaryFileResponse
<<<<<<< HEAD
>>>>>>> e697a77b (.)
=======
>>>>>>> 89d0c8f4 (.)
     */
    public function execute(
        string $html,
        string $filename = 'my_doc.pdf',
        string $disk = 'cache',
        string $out = 'download',
        string $orientation = 'P',
        PdfEngineEnum $engine = PdfEngineEnum::SPIPU,
    ): string|BinaryFileResponse {
        $data = PdfData::from([
            'html' => $html,
            'filename' => $filename,
            'disk' => $disk,
            'out' => $out,
            'orientation' => $orientation,
            'engine' => $engine,
        ]);
<<<<<<< HEAD
<<<<<<< HEAD

        // Genera il PDF utilizzando PdfData
        $data->fromHtml($html);

=======
        
        // Genera il PDF utilizzando PdfData
        $data->fromHtml($html);
        
>>>>>>> e697a77b (.)
=======
        
        // Genera il PDF utilizzando PdfData
        $data->fromHtml($html);
        
>>>>>>> 89d0c8f4 (.)
        // Restituisce il risultato in base al tipo di output richiesto
        return match ($out) {
            'download' => $data->download(),
            'path' => $data->getPath(),
            default => $data->getPath(),
        };
    }
}
