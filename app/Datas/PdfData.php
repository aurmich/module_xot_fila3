<?php

/*
 * @see https://github.com/masterix21/laravel-html2pdf/blob/master/src/PDF.php
 */

declare(strict_types=1);

namespace Modules\Xot\Datas;

<<<<<<< HEAD
use Illuminate\Support\Str;
use Spatie\LaravelData\Data;
use Spipu\Html2Pdf\Html2Pdf;
use Webmozart\Assert\Assert;
use Spatie\LaravelPdf\Enums\Unit;
use Spatie\LaravelPdf\Facades\Pdf;
use Spatie\LaravelPdf\Enums\Format;
use Modules\Xot\Enums\PdfEngineEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Spatie\LaravelPdf\Enums\Orientation;
use Symfony\Component\HttpFoundation\BinaryFileResponse;


/**
 * Undocumented class.
=======
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Spatie\LaravelData\Data;
use Spipu\Html2Pdf\Html2Pdf;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Webmozart\Assert\Assert;

/**
<<<<<<< HEAD
 * Class PdfData
 * 
 * Gestisce la configurazione e la generazione di documenti PDF.
=======
 * Undocumented class.
>>>>>>> origin/dev
>>>>>>> 3268b83 (.)
 */
class PdfData extends Data
{
    /**
     * @var non-falsy-string
     */
    public string $filename = 'my_doc.pdf';

    public string $disk = 'cache';

    public string $out = 'download';

<<<<<<< HEAD
    // -- per costruttore
=======
<<<<<<< HEAD
=======
    // -- per costruttore
>>>>>>> origin/dev
>>>>>>> 3268b83 (.)
    public string $orientation = 'P';

    public string $format = 'A4';

    public string $lang = 'it';

    public bool $unicode = true;

    public string $encoding = 'UTF-8';

    public array $margins = [5, 5, 5, 8];

    public bool $pdfa = false;

<<<<<<< HEAD
=======
<<<<<<< HEAD
    /**
     * Destinazione del PDF:
     * I: inline nel browser (default)
     * D: download forzato
     * F: salva su file locale
     * S: ritorna come stringa
     * FI: F + I
     * FD: F + D
     * E: allegato email base64
     */
    public string $dest = 'F';

    public string $html = '';

=======
>>>>>>> 3268b83 (.)
    public string $dest = 'F';
    /*
        Dest can be :
        I : send the file inline to the browser (default). The plug-in is used if available. The name given by name is used when one selects the "Save as" option on the link generating the PDF.
        D : send to the browser and force a file download with the name given by name.
        F : save to a local server file with the name given by name.
        S : return the document as a string (name is ignored).
        FI: equivalent to F + I option
        FD: equivalent to F + D option
        E : return the document as base64 mime multi-part email attachment
        */

    // public static function make(Model $model = null, string $html = null): self
<<<<<<< HEAD


    public PdfEngineEnum $engine = PdfEngineEnum::SPIPU;

    public string $html = '';

=======
>>>>>>> origin/dev
>>>>>>> 3268b83 (.)
    public static function make(): self
    {
        return self::from([]);
    }

    public function getPath(): string
    {
        return Storage::disk($this->disk)->path($this->filename);
    }

    public function download(): BinaryFileResponse
    {
        $headers = [
            'Content-Type' => 'application/pdf',
        ];

        return response()->download($this->getPath(), $this->filename, $headers);
    }

    public function fromHtml(string $html): self
    {
<<<<<<< HEAD
        switch ($this->engine) {
            case PdfEngineEnum::SPIPU:
                $html2pdf = new Html2Pdf($this->orientation, $this->format, $this->lang);
                $html2pdf->writeHTML($html);
                $html2pdf->output($this->getPath(), $this->dest);
                break;
            case PdfEngineEnum::SPATIE:
                Pdf::html($this->html)
                ->orientation(Orientation::Portrait)
                ->format(Format::A4)
                ->margins(10, 10, 20, 0, Unit::Pixel)
                // ->name(str_slug($project->nome).'-REPORT.pdf')
                ->save($this->getPath());
                ;
                break;
        }


        $this->html = $html;
        // $this->engine->build($this);
=======
<<<<<<< HEAD
        $this->html = $html;

=======
>>>>>>> origin/dev
        $html2pdf = new Html2Pdf($this->orientation, $this->format, $this->lang);
        $html2pdf->writeHTML($html);
        $html2pdf->output($this->getPath(), $this->dest);
>>>>>>> 3268b83 (.)

        return $this;
    }

    public function fromModel(Model $model): self
    {
<<<<<<< HEAD
=======
<<<<<<< HEAD
        $modelClass = $model::class;
        $modelName = class_basename($modelClass);
        $module = Str::between($modelClass, '\Modules\\', '\Models');
        
        /**
         * @var non-falsy-string&view-string
         */
        $viewName = mb_strtolower($module).'::'.Str::kebab($modelName).'.show.pdf';
        $viewParams = [
            'view' => $viewName,
            'row' => $model,
        ];
        
        return $this->view($viewName, $viewParams);
=======
>>>>>>> 3268b83 (.)
        $model_class = $model::class;
        $model_name = class_basename($model_class);
        $module = Str::between($model_class, '\Modules\\', '\Models');
        /**
         * @var non-falsy-string&view-string
         */
        $view_name = mb_strtolower($module).'::'.Str::kebab($model_name).'.show.pdf';
        $view_params = [
            'view' => $view_name,
            'row' => $model,
        ];
        $view = view($view_name, $view_params);
        $html = $view->render();

        return $this->fromHtml($html);
<<<<<<< HEAD
=======
>>>>>>> origin/dev
>>>>>>> 3268b83 (.)
    }

    public function getContent(): string
    {
<<<<<<< HEAD
        Assert::notNull($res = Storage::disk($this->disk)->get($this->filename), '['.__LINE__.']['.class_basename($this).']');

        return $res;
    }

    public function view(string $view, array $params=[]): self
    {
        $out = view($view, $params);
        $this->html = $out->render();
        return $this->fromHtml($this->html);
    }

    public function setEngine(PdfEngineEnum $engine): self
    {
        $this->engine = $engine;
        return $this;
=======
<<<<<<< HEAD
        Assert::notNull(
            $content = Storage::disk($this->disk)->get($this->filename),
            sprintf('File PDF non trovato: %s', $this->filename)
        );

        return $content;
    }

    public function view(string $view, array $params = []): self
    {
        $output = view($view, $params);
        $this->html = $output->render();
        
        return $this->fromHtml($this->html);
=======
        Assert::notNull($res = Storage::disk($this->disk)->get($this->filename), '['.__LINE__.']['.class_basename($this).']');

        return $res;
>>>>>>> origin/dev
>>>>>>> 3268b83 (.)
    }
}
