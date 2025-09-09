<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Pdf;

<<<<<<< HEAD
use Spipu\Html2Pdf\Html2Pdf;
use Webmozart\Assert\Assert;
use Modules\Xot\Datas\PdfData;
use Illuminate\Support\Facades\Storage;
use Spatie\QueueableAction\QueueableAction;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
=======
use Spatie\QueueableAction\QueueableAction;
use Webmozart\Assert\Assert;
>>>>>>> c4ec0fb6 (.)

class StreamDownloadPdfAction
{
    use QueueableAction;

    public PdfEngineEnum $engine;

    /**
     * Genera un PDF dall'HTML fornito.
     *
<<<<<<< HEAD
     * @param string $html Contenuto HTML da convertire
     * @param string $filename Nome del file PDF
     * @return \Symfony\Component\HttpFoundation\StreamedResponse
     */
    public function execute(
        ?string $html=null,
        ?string $view=null,
        ?array $data=null,
        string $filename = 'my_doc.pdf',
        
    ){

        if($html==null && $view!=null){
            if(!view()->exists($view)){
                throw new \Exception('View '.$view.' not found');
            }
            if(!is_array($data)){
                $data = [];
            }
            $html = view($view, $data)->render();
=======
     * @param  string|null  $html  Contenuto HTML da convertire
     * @param  string|null  $view  Nome della vista Blade
     * @param  array<mixed, mixed>|null  $data  Dati da passare alla vista
     * @param  string  $filename  Nome del file PDF
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
>>>>>>> c4ec0fb6 (.)
        }
        Assert::string($html);
        $html2pdf = new \Spipu\Html2Pdf\Html2Pdf('P', 'A4', 'it', true, 'UTF-8', [10, 10, 10, 10]);
        $html2pdf->writeHTML($html);
<<<<<<< HEAD
        
=======

>>>>>>> c4ec0fb6 (.)
        // Genera e scarica il PDF
        return response()->streamDownload(
            function () use ($html2pdf) {
                $html2pdf->output();
            },
<<<<<<< HEAD
            'report-' . $filename
=======
            'report-'.$filename
>>>>>>> c4ec0fb6 (.)
        );
    }
}
