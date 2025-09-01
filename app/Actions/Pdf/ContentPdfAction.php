<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Pdf;

<<<<<<< HEAD
<<<<<<< HEAD
use Spatie\QueueableAction\QueueableAction;
=======
>>>>>>> 89d0c8f4 (.)
use Spipu\Html2Pdf\Html2Pdf;
use Webmozart\Assert\Assert;
use Modules\Xot\Datas\PdfData;
use Illuminate\Support\Facades\Storage;
use Spatie\QueueableAction\QueueableAction;

/**
 * Action to generate PDF content as binary data for email attachments.
<<<<<<< HEAD
 *
=======
use Spipu\Html2Pdf\Html2Pdf;
use Webmozart\Assert\Assert;
use Modules\Xot\Datas\PdfData;
use Illuminate\Support\Facades\Storage;
use Spatie\QueueableAction\QueueableAction;

/**
 * Action to generate PDF content as binary data for email attachments.
 * 
>>>>>>> e697a77b (.)
=======
 * 
>>>>>>> 89d0c8f4 (.)
 * This action is similar to StreamDownloadPdfAction but returns raw PDF content
 * instead of a download response, making it suitable for email attachments.
 */
class ContentPdfAction
{
    use QueueableAction;

    public PdfEngineEnum $engine;

    /**
     * Genera contenuto PDF dall'HTML fornito.
     *
<<<<<<< HEAD
<<<<<<< HEAD
     * @param  string|null  $html  Contenuto HTML da convertire
     * @param  string|null  $view  Nome della vista Blade da renderizzare
     * @param  array|null  $data  Dati da passare alla vista
     * @param  string  $filename  Nome del file PDF (per riferimento)
     * @return string Contenuto binario del PDF
     *
=======
     * @param string|null $html Contenuto HTML da convertire
     * @param string|null $view Nome della vista Blade da renderizzare
     * @param array|null $data Dati da passare alla vista
     * @param string $filename Nome del file PDF (per riferimento)
     * @return string Contenuto binario del PDF
>>>>>>> e697a77b (.)
=======
     * @param string|null $html Contenuto HTML da convertire
     * @param string|null $view Nome della vista Blade da renderizzare
     * @param array|null $data Dati da passare alla vista
     * @param string $filename Nome del file PDF (per riferimento)
     * @return string Contenuto binario del PDF
>>>>>>> 89d0c8f4 (.)
     * @throws \Exception Se la vista non esiste
     */
    public function execute(
        ?string $html = null,
        ?string $view = null,
        ?array $data = null,
        string $filename = 'my_doc.pdf'
    ): string {
        // Generate HTML content if view is provided
        if ($html === null && $view !== null) {
<<<<<<< HEAD
<<<<<<< HEAD
            if (! view()->exists($view)) {
                throw new \Exception('View '.$view.' not found');
            }
            if (! is_array($data)) {
=======
            if (!view()->exists($view)) {
                throw new \Exception('View ' . $view . ' not found');
            }
            if (!is_array($data)) {
>>>>>>> e697a77b (.)
=======
            if (!view()->exists($view)) {
                throw new \Exception('View ' . $view . ' not found');
            }
            if (!is_array($data)) {
>>>>>>> 89d0c8f4 (.)
                $data = [];
            }
            $html = view($view, $data)->render();
        }
<<<<<<< HEAD
<<<<<<< HEAD

        // Validate that we have HTML content
        Assert::string($html, 'HTML content must be provided either directly or via view rendering');

=======
        
        // Validate that we have HTML content
        Assert::string($html, 'HTML content must be provided either directly or via view rendering');
        
>>>>>>> e697a77b (.)
=======
        
        // Validate that we have HTML content
        Assert::string($html, 'HTML content must be provided either directly or via view rendering');
        
>>>>>>> 89d0c8f4 (.)
        // Create HTML2PDF instance with same configuration as StreamDownloadPdfAction
        $html2pdf = new Html2Pdf(
            orientation: 'P',     // Portrait
            format: 'A4',         // A4 format
            lang: 'it',           // Italian language
            unicode: true,        // Unicode support
            encoding: 'UTF-8',    // UTF-8 encoding
            margins: [10, 10, 10, 10] // 10mm margins on all sides
        );
<<<<<<< HEAD
<<<<<<< HEAD

=======
        
>>>>>>> 89d0c8f4 (.)
        // Write HTML content to PDF
        $html2pdf->writeHTML($html);
        
        // Generate and return PDF content as binary string
        return $html2pdf->output('', 'S'); // 'S' returns string content
    }
    
    /**
     * Genera contenuto PDF da una vista con dati specifici.
     * 
     * Metodo di convenienza per generare PDF da viste Blade.
     *
<<<<<<< HEAD
     * @param  string  $view  Nome della vista Blade
     * @param  array  $data  Dati da passare alla vista
     * @param  string  $filename  Nome del file PDF (per riferimento)
=======
        
        // Write HTML content to PDF
        $html2pdf->writeHTML($html);
        
        // Generate and return PDF content as binary string
        return $html2pdf->output('', 'S'); // 'S' returns string content
    }
    
    /**
     * Genera contenuto PDF da una vista con dati specifici.
     * 
     * Metodo di convenienza per generare PDF da viste Blade.
     *
     * @param string $view Nome della vista Blade
     * @param array $data Dati da passare alla vista
     * @param string $filename Nome del file PDF (per riferimento)
>>>>>>> e697a77b (.)
=======
     * @param string $view Nome della vista Blade
     * @param array $data Dati da passare alla vista
     * @param string $filename Nome del file PDF (per riferimento)
>>>>>>> 89d0c8f4 (.)
     * @return string Contenuto binario del PDF
     */
    public function fromView(
        string $view,
        array $data = [],
        string $filename = 'document.pdf'
    ): string {
        return $this->execute(
            html: null,
            view: $view,
            data: $data,
            filename: $filename
        );
    }
<<<<<<< HEAD
<<<<<<< HEAD

=======
    
>>>>>>> 89d0c8f4 (.)
    /**
     * Genera contenuto PDF da HTML diretto.
     * 
     * Metodo di convenienza per generare PDF da contenuto HTML.
     *
<<<<<<< HEAD
     * @param  string  $html  Contenuto HTML
     * @param  string  $filename  Nome del file PDF (per riferimento)
=======
    
    /**
     * Genera contenuto PDF da HTML diretto.
     * 
     * Metodo di convenienza per generare PDF da contenuto HTML.
     *
     * @param string $html Contenuto HTML
     * @param string $filename Nome del file PDF (per riferimento)
>>>>>>> e697a77b (.)
=======
     * @param string $html Contenuto HTML
     * @param string $filename Nome del file PDF (per riferimento)
>>>>>>> 89d0c8f4 (.)
     * @return string Contenuto binario del PDF
     */
    public function fromHtml(
        string $html,
        string $filename = 'document.pdf'
    ): string {
        return $this->execute(
            html: $html,
            view: null,
            data: null,
            filename: $filename
        );
    }
<<<<<<< HEAD
<<<<<<< HEAD
}
=======
}
>>>>>>> e697a77b (.)
=======
}
>>>>>>> 89d0c8f4 (.)
