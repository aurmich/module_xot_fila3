<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Mail;

<<<<<<< HEAD
use Illuminate\Database\Eloquent\Model;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Mail;
use Modules\Notify\Datas\EmailData;
use Modules\Notify\Datas\SmtpData;
use Modules\Xot\Actions\Export\PdfByModelAction;
use Spatie\QueueableAction\QueueableAction;
use Webmozart\Assert\Assert;
=======
use Webmozart\Assert\Assert;
use Illuminate\Mail\Mailable;
use Modules\Notify\Datas\SmtpData;
use Modules\Notify\Datas\EmailData;
use Illuminate\Support\Facades\Mail;
use Illuminate\Database\Eloquent\Model;
use Spatie\QueueableAction\QueueableAction;
use Modules\Xot\Actions\Export\PdfByModelAction;
>>>>>>> ad700fc8 (.)

class SendMailByRecordAction
{
    use QueueableAction;

    /**
     * Invia una mail utilizzando un record come dati.
     *
<<<<<<< HEAD
     * @param  Model  $record  Il record da utilizzare come dati per la mail
     * @param  string  $mailClass  La classe Mailable da utilizzare
     */
    public function execute(Model $record, string $mailClass): void
    {

=======
     * @param Model  $record    Il record da utilizzare come dati per la mail
     * @param string $mailClass La classe Mailable da utilizzare
     */
    public function execute(Model $record, string $mailClass): void
    {
        
>>>>>>> ad700fc8 (.)
        Assert::classExists($mailClass);
        // Expected an implementation of "Illuminate\Mail\Mailable". Got: "Modules\Performance\Mail\SchedaMail"
        // Assert::implementsInterface($mailClass, Mailable::class);

        // Utilizziamo il container per istanziare la classe Mailable
        // in modo che possa ricevere le dipendenze necessarie
<<<<<<< HEAD
        // @var Mailable $mail
        // $mail = app($mailClass, ['record' => $record]);
        // Mail::send($mail);
        // dddx(Mail::to($record)->send(new $mailClass($record)));
        // $res=Mail::to('marco.sottana@gmail.com')->send($mail);

=======
        // @var Mailable $mail 
        // $mail = app($mailClass, ['record' => $record]);
        //Mail::send($mail);
        //dddx(Mail::to($record)->send(new $mailClass($record)));
        //$res=Mail::to('marco.sottana@gmail.com')->send($mail);
        
>>>>>>> ad700fc8 (.)
        // Verifica che il model abbia le proprietà/metodi necessari
        if (($record->email ?? null) === null || empty($record->email)) {
            throw new \InvalidArgumentException('Model must have email property');
        }
<<<<<<< HEAD

        if (! method_exists($record, 'option')) {
            throw new \InvalidArgumentException('Model must implement option method');
        }

        if (! method_exists($record, 'myLogs')) {
            throw new \InvalidArgumentException('Model must implement myLogs method');
        }

        $data = [
=======
        
        if (!method_exists($record, 'option')) {
            throw new \InvalidArgumentException('Model must implement option method');
        }
        
        if (!method_exists($record, 'myLogs')) {
            throw new \InvalidArgumentException('Model must implement myLogs method');
        }
        
         $data = [
>>>>>>> ad700fc8 (.)
            'to' => $record->email,
            'subject' => $record->option('mail_oggetto'),
            'body_html' => $record->option('mail_testo'),
            'attachments' => [
<<<<<<< HEAD
                app(PdfByModelAction::class)->execute(model: $record, out: 'path'),
=======
                app(PdfByModelAction::class)->execute(model: $record, out: 'path')
>>>>>>> ad700fc8 (.)
            ],
        ];
        $emailData = EmailData::from($data);
        SmtpData::make()->send($emailData);
<<<<<<< HEAD

        // Type assertion: myLogs() deve restituire una relazione che supporta create()
        $logsRelation = $record->myLogs();
        Assert::object($logsRelation, 'myLogs() must return an object');

        if (! method_exists($logsRelation, 'create')) {
            throw new \InvalidArgumentException('myLogs() must return a relation that supports create() method');
        }

        /** @var \Illuminate\Database\Eloquent\Relations\Relation $logsRelation */
        $logsRelation->create([
=======
        
        $record->myLogs()->create([
>>>>>>> ad700fc8 (.)
            'act' => 'sendMail',
            'handle' => authId(),
        ]);
    }
}
