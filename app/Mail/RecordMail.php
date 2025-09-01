<?php

declare(strict_types=1);

namespace Modules\Xot\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

/**
 * Class RecordMail
<<<<<<< HEAD
 *
=======
 * 
>>>>>>> e697a77b (.)
 * Mailable per l'invio di dati di record via email.
 */
class RecordMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var array<string, mixed>
     */
    public array $recordData;

    /**
     * Crea una nuova istanza del mailable.
     *
<<<<<<< HEAD
     * @param  array<string, mixed>  $data  I dati del record
=======
     * @param array<string, mixed> $data I dati del record
>>>>>>> e697a77b (.)
     */
    public function __construct(array $data)
    {
        $this->recordData = $data;
    }

    /**
     * Costruisce il messaggio.
     *
     * @return $this
     */
    public function build(): self
    {
        return $this->view('xot::emails.record')
<<<<<<< HEAD
            ->with(['data' => $this->recordData]);
    }
}
=======
                    ->with(['data' => $this->recordData]);
    }
} 
>>>>>>> e697a77b (.)
