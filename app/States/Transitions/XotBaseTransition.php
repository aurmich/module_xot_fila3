<?php

declare(strict_types=1);

namespace Modules\Xot\States\Transitions;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Str;
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
use Modules\Notify\Datas\RecordNotificationData;
>>>>>>> abfbbdf (.)
=======
use Modules\Notify\Datas\RecordNotificationData;
>>>>>>> 1fd4ceb6 (.)
use Modules\Notify\Notifications\RecordNotification;
use Modules\Xot\Contracts\UserContract;
use Spatie\ModelStates\Transition;
use Filament\Notifications\Notification as FilamentNotification;

abstract class XotBaseTransition extends Transition
{
<<<<<<< HEAD
<<<<<<< HEAD
    public function __construct(public Model $record, public ?string $message = '') {}
=======
=======
>>>>>>> 1c7b79f (.)
use Modules\Notify\Datas\RecordNotificationData;
use Modules\Notify\Notifications\RecordNotification;
use Modules\Xot\Contracts\UserContract;
use Spatie\ModelStates\Transition;
use Filament\Notifications\Notification as FilamentNotification;

abstract class XotBaseTransition extends Transition
{
    public function __construct(public Model $record, public ?string $message = '')
    {
    }
<<<<<<< HEAD
>>>>>>> 5852845d (.)
=======
    public function __construct(public Model $record, public ?string $message = '')
    {
    }
>>>>>>> abfbbdf (.)
=======
    public function __construct(public Model $record, public ?string $message = '')
    {
    }
>>>>>>> 1fd4ceb6 (.)
=======
>>>>>>> 1c7b79f (.)

    public function handle(): Model
    {
        $this->sendNotifications();
        $class = static::class;

        $stateNamespace = Str::of($class)->beforeLast('\Transitions\\')->toString();
        $stateClassName = Str::of($class)->afterLast('To')->toString();
        $newStateClass = $stateNamespace.'\\'.$stateClassName;

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        /** @phpstan-ignore-next-line */
=======
        /* @phpstan-ignore-next-line */
>>>>>>> 5852845d (.)
=======
        /* @phpstan-ignore-next-line */
>>>>>>> abfbbdf (.)
=======
        /* @phpstan-ignore-next-line */
>>>>>>> 1fd4ceb6 (.)
=======
        /* @phpstan-ignore-next-line */
>>>>>>> 1c7b79f (.)
        $this->record->state = new $newStateClass($this->record);
        $this->record->save();

        return $this->record;
    }

    public function sendNotifications(): void
    {
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD

        $recipients = $this->getNotificationRecipients();
        foreach ($recipients as $recipient) {
            if ($recipient instanceof UserContract) {
                $this->sendRecipientNotification($recipient);
            } elseif ($recipient === null) {
                $this->sendRecipientNotification(null);
            }
=======
=======
>>>>>>> 1fd4ceb6 (.)
        $recipients = $this->getNotificationRecipients();
        foreach ($recipients as $recipient) {
            
            $this->sendRecipientNotification($recipient);
            
<<<<<<< HEAD
>>>>>>> 5852845d (.)
=======
        $recipients = $this->getNotificationRecipients();
        foreach ($recipients as $recipient) {
            
            $this->sendRecipientNotification($recipient);
            
>>>>>>> abfbbdf (.)
=======
>>>>>>> 1fd4ceb6 (.)
=======
        $recipients = $this->getNotificationRecipients();
        foreach ($recipients as $recipient) {
            $this->sendRecipientNotification($recipient);
>>>>>>> 1c7b79f (.)
        }
    }

    /**
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
     * @return array<string, Model|null>
=======
     * @return  array<string, RecordNotificationData>
>>>>>>> 5852845d (.)
=======
     * @return  array<string, RecordNotificationData>
>>>>>>> abfbbdf (.)
=======
     * @return  array<string, RecordNotificationData>
>>>>>>> 1fd4ceb6 (.)
=======
     * @return array<string, RecordNotificationData>
>>>>>>> 1c7b79f (.)
     */
    public function getNotificationRecipients(): array
    {
        return [
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
            'me' => $this->record,
            // 'patient' => $this->record->patient,
            // 'doctor' => $this->record->doctor,
=======
=======
>>>>>>> 1fd4ceb6 (.)
            // 'me' => $this->record,
            'me_mail' => RecordNotificationData::from(['record' => $this->record, 'channel' => 'mail']),
            // 'patient' => $this->record->patient,
            // 'doctor' => $this->record->doctor,
            // 'patient_mail' => RecordNotificationData::from(['record' => $record->patient, 'channel' => 'mail']),
            // 'doctor_mail' => RecordNotificationData::from(['record' => $record->doctor, 'channel' => 'mail']),
<<<<<<< HEAD
>>>>>>> 5852845d (.)
=======
            // 'me' => $this->record,
            'me_mail' => RecordNotificationData::from(['record' => $this->record, 'channel' => 'mail']),
            // 'patient' => $this->record->patient,
            // 'doctor' => $this->record->doctor,
            // 'patient_mail' => RecordNotificationData::from(['record' => $record->patient, 'channel' => 'mail']),
            // 'doctor_mail' => RecordNotificationData::from(['record' => $record->doctor, 'channel' => 'mail']),
>>>>>>> abfbbdf (.)
=======
>>>>>>> 1fd4ceb6 (.)
=======
            'me_mail' => RecordNotificationData::from(['record' => $this->record, 'channel' => 'mail']),
>>>>>>> 1c7b79f (.)
        ];
    }

    /**
     * @return array<int, mixed>
     */
    public function getNotificationAttachments(): array
    {
        return [];
    }

    public function getNotificationSlug(UserContract $recipient): string
    {
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD

=======
>>>>>>> 5852845d (.)
=======
>>>>>>> abfbbdf (.)
=======
>>>>>>> 1fd4ceb6 (.)
=======
>>>>>>> 1c7b79f (.)
        $type = $recipient->type->value;
        $slug = class_basename($this->record).'-'.$type.'-'.Str::of(class_basename(static::class))->kebab()->toString();
        $slug = Str::slug($slug);

        return $slug;
    }

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    public function sendRecipientNotification(?UserContract $recipient): void
=======
    public function sendRecipientNotification(RecordNotificationData $recipient): void
>>>>>>> abfbbdf (.)
    {
       

<<<<<<< HEAD
        $slug = $this->getNotificationSlug($recipient);
=======
    public function sendRecipientNotification(RecordNotificationData $recipient): void
    {
       

        $slug = $this->getNotificationSlug($recipient->record);
>>>>>>> 5852845d (.)
=======
        $slug = $this->getNotificationSlug($recipient->record);
>>>>>>> abfbbdf (.)
=======
    public function sendRecipientNotification(RecordNotificationData $recipient): void
    {
       

        $slug = $this->getNotificationSlug($recipient->record);
>>>>>>> 1fd4ceb6 (.)
=======
    public function sendRecipientNotification(RecordNotificationData $recipient): void
    {
        $slug = $this->getNotificationSlug($recipient->record);
>>>>>>> 1c7b79f (.)

        $notify = new RecordNotification(
            $this->record,
            $slug
        );

        $data = $this->getNotificationData();
        $notify = $notify->mergeData($data);
        $notify = $notify->addAttachments($this->getNotificationAttachments());
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        // appointment-patient-pending-to-confirmed
=======
        
>>>>>>> abfbbdf (.)
        try {
            Notification::route($recipient->getChannel(), $recipient->getRoute())
                ->notify($notify);
<<<<<<< HEAD
        } catch (\TypeError $e) {
            dddx($e);
=======
=======
>>>>>>> 1fd4ceb6 (.)
        
        try {
            Notification::route($recipient->getChannel(), $recipient->getRoute())
                ->notify($notify);
<<<<<<< HEAD
=======
>>>>>>> abfbbdf (.)
=======
>>>>>>> 1fd4ceb6 (.)
        } catch (\TypeError|\Webmozart\Assert\InvalidArgumentException $e) {
            $message = 'channel :['.$recipient->getChannel() .'] error: ['.$e->getMessage().']';
=======

        try {
            Notification::route($recipient->getChannel(), $recipient->getRoute())
                ->notify($notify);
        } catch (\TypeError|\Webmozart\Assert\InvalidArgumentException $e) {
            $message = 'channel :['.$recipient->getChannel().'] error: ['.$e->getMessage().']';
>>>>>>> 1c7b79f (.)
            FilamentNotification::make()
                ->title('Error')
                ->danger()
                ->body($message)
                ->send();
<<<<<<< HEAD
            
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 5852845d (.)
=======
>>>>>>> abfbbdf (.)
=======
>>>>>>> 1fd4ceb6 (.)
=======
>>>>>>> 1c7b79f (.)
        }
    }

    /**
     * @return array<string, mixed>
     */
    public function getNotificationData(): array
    {
        return [
            'message' => $this->message,
            // 'appointment_date' => $this->appointment->starts_at?->format('d/m/Y H:i') ?? 'N/A',
            // 'patient_name' => $this->appointment->patient->name ?? 'N/A',
            // 'doctor_name' => $this->appointment->doctor->name ?? 'N/A',
        ];
    }
}
