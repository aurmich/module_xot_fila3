<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Pdf;

<<<<<<< HEAD
<<<<<<< HEAD
use Spatie\QueueableAction\QueueableAction;
use Webmozart\Assert\Assert;
=======
use Spipu\Html2Pdf\Html2Pdf;
use Webmozart\Assert\Assert;
use Modules\Xot\Datas\PdfData;
use Illuminate\Support\Facades\Storage;
use Spatie\QueueableAction\QueueableAction;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
>>>>>>> ad700fc8 (.)
=======
use Spatie\QueueableAction\QueueableAction;
use Webmozart\Assert\Assert;
>>>>>>> 00793d2a (.)

class StreamDownloadPdfAction
{
    use QueueableAction;

    public PdfEngineEnum $engine;

    /**
     * Genera un PDF dall'HTML fornito.
     *
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 00793d2a (.)
     * @param  string|null  $html  Contenuto HTML da convertire
     * @param  string|null  $view  Nome della vista Blade
     * @param  array<mixed, mixed>|null  $data  Dati da passare alla vista
     * @param  string  $filename  Nome del file PDF
<<<<<<< HEAD
     * @return \Symfony\Component\HttpFoundation\StreamedResponse
     */
    public function execute(
        ?string $html = null,
        ?string $view = null,
        ?array $data = null,
        string $filename = 'my_doc.pdf'
    ) {
        if ($html == null && $view != null) {
            if (! view()->exists($view)) {
                throw new \Exception('View '.$view.' not found');
            }
            if (! is_array($data)) {
                $data = [];
            }

            // Assicura che $data sia type-safe per view()
            /** @var array<string, mixed> $viewData */
            $viewData = [];
            foreach ($data as $key => $value) {
                $viewData[(string) $key] = $value;
            }

            $html = view($view, $viewData)->render();
=======
     * @param string $html Contenuto HTML da convertire
     * @param string $filename Nome del file PDF
=======
>>>>>>> 00793d2a (.)
     * @return \Symfony\Component\HttpFoundation\StreamedResponse
     */
    public function execute(
        ?string $html = null,
        ?string $view = null,
        ?array $data = null,
        string $filename = 'my_doc.pdf'
    ) {
        if ($html == null && $view != null) {
            if (! view()->exists($view)) {
                throw new \Exception('View '.$view.' not found');
            }
            if (! is_array($data)) {
                $data = [];
            }
<<<<<<< HEAD
            $html = view($view, $data)->render();
>>>>>>> ad700fc8 (.)
=======

            // Assicura che $data sia type-safe per view()
            /** @var array<string, mixed> $viewData */
            $viewData = [];
            foreach ($data as $key => $value) {
                $viewData[(string) $key] = $value;
            }

            $html = view($view, $viewData)->render();
>>>>>>> 00793d2a (.)
        }
        Assert::string($html);
        $html2pdf = new \Spipu\Html2Pdf\Html2Pdf('P', 'A4', 'it', true, 'UTF-8', [10, 10, 10, 10]);
        $html2pdf->writeHTML($html);
<<<<<<< HEAD
<<<<<<< HEAD

=======
        
>>>>>>> ad700fc8 (.)
=======

>>>>>>> 00793d2a (.)
        // Genera e scarica il PDF
        return response()->streamDownload(
            function () use ($html2pdf) {
                $html2pdf->output();
            },
<<<<<<< HEAD
<<<<<<< HEAD
            'report-'.$filename
=======
            'report-' . $filename
>>>>>>> ad700fc8 (.)
=======
            'report-'.$filename
>>>>>>> 00793d2a (.)
        );
    }
}
