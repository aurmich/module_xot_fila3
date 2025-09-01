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
=======
use Spipu\Html2Pdf\Html2Pdf;
use Webmozart\Assert\Assert;
>>>>>>> 89d0c8f4 (.)
use Modules\Xot\Datas\PdfData;
use Illuminate\Support\Facades\Storage;
use Spatie\QueueableAction\QueueableAction;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
<<<<<<< HEAD
>>>>>>> e697a77b (.)
=======
>>>>>>> 89d0c8f4 (.)

class StreamDownloadPdfAction
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
=======
     * @param string $html Contenuto HTML da convertire
     * @param string $filename Nome del file PDF
>>>>>>> 89d0c8f4 (.)
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
<<<<<<< HEAD
            if (! is_array($data)) {
=======
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
>>>>>>> e697a77b (.)
=======
            if(!is_array($data)){
>>>>>>> 89d0c8f4 (.)
                $data = [];
            }
            $html = view($view, $data)->render();
        }
        Assert::string($html);
        $html2pdf = new \Spipu\Html2Pdf\Html2Pdf('P', 'A4', 'it', true, 'UTF-8', [10, 10, 10, 10]);
        $html2pdf->writeHTML($html);
<<<<<<< HEAD
<<<<<<< HEAD

=======
        
>>>>>>> e697a77b (.)
=======
        
>>>>>>> 89d0c8f4 (.)
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
>>>>>>> e697a77b (.)
=======
            'report-' . $filename
>>>>>>> 89d0c8f4 (.)
        );
    }
}
