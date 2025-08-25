<?php

declare(strict_types=1);

namespace Modules\Xot\States\Transitions;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Str;
<<<<<<< HEAD
use Modules\Notify\Notifications\RecordNotification;
use Modules\Xot\Contracts\UserContract;
use Spatie\ModelStates\Transition;

abstract class XotBaseTransition extends Transition
{
    public function __construct(public Model $record, public ?string $message = '') {}
=======
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
>>>>>>> 5852845d (.)

    public function handle(): Model
    {
        $this->sendNotifications();
        $class = static::class;

        $stateNamespace = Str::of($class)->beforeLast('\Transitions\\')->toString();
        $stateClassName = Str::of($class)->afterLast('To')->toString();
        $newStateClass = $stateNamespace.'\\'.$stateClassName;

<<<<<<< HEAD
        /** @phpstan-ignore-next-line */
=======
        /* @phpstan-ignore-next-line */
>>>>>>> 5852845d (.)
        $this->record->state = new $newStateClass($this->record);
        $this->record->save();

        return $this->record;
    }

    public function sendNotifications(): void
    {
<<<<<<< HEAD

        $recipients = $this->getNotificationRecipients();
        foreach ($recipients as $recipient) {
            if ($recipient instanceof UserContract) {
                $this->sendRecipientNotification($recipient);
            } elseif ($recipient === null) {
                $this->sendRecipientNotification(null);
            }
=======
        $recipients = $this->getNotificationRecipients();
        foreach ($recipients as $recipient) {
            
            $this->sendRecipientNotification($recipient);
            
>>>>>>> 5852845d (.)
        }
    }

    /**
<<<<<<< HEAD
     * @return array<string, Model|null>
=======
     * @return  array<string, RecordNotificationData>
>>>>>>> 5852845d (.)
     */
    public function getNotificationRecipients(): array
    {
        return [
<<<<<<< HEAD
            'me' => $this->record,
            // 'patient' => $this->record->patient,
            // 'doctor' => $this->record->doctor,
=======
            // 'me' => $this->record,
            'me_mail' => RecordNotificationData::from(['record' => $this->record, 'channel' => 'mail']),
            // 'patient' => $this->record->patient,
            // 'doctor' => $this->record->doctor,
            // 'patient_mail' => RecordNotificationData::from(['record' => $record->patient, 'channel' => 'mail']),
            // 'doctor_mail' => RecordNotificationData::from(['record' => $record->doctor, 'channel' => 'mail']),
>>>>>>> 5852845d (.)
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

=======
>>>>>>> 5852845d (.)
        $type = $recipient->type->value;
        $slug = class_basename($this->record).'-'.$type.'-'.Str::of(class_basename(static::class))->kebab()->toString();
        $slug = Str::slug($slug);

        return $slug;
    }

<<<<<<< HEAD
    public function sendRecipientNotification(?UserContract $recipient): void
    {
        if ($recipient == null) {
            return;
        }

        $slug = $this->getNotificationSlug($recipient);
=======
    public function sendRecipientNotification(RecordNotificationData $recipient): void
    {
       

        $slug = $this->getNotificationSlug($recipient->record);
>>>>>>> 5852845d (.)

        $notify = new RecordNotification(
            $this->record,
            $slug
        );

        $data = $this->getNotificationData();
        $notify = $notify->mergeData($data);
        $notify = $notify->addAttachments($this->getNotificationAttachments());
<<<<<<< HEAD
        // appointment-patient-pending-to-confirmed
        try {
            Notification::route('mail', $recipient->email)
                ->notify($notify);
        } catch (\TypeError $e) {
            dddx($e);
=======
        
        try {
            Notification::route($recipient->getChannel(), $recipient->getRoute())
                ->notify($notify);
        } catch (\TypeError|\Webmozart\Assert\InvalidArgumentException $e) {
            $message = 'channel :['.$recipient->getChannel() .'] error: ['.$e->getMessage().']';
            FilamentNotification::make()
                ->title('Error')
                ->danger()
                ->body($message)
                ->send();
            
>>>>>>> 5852845d (.)
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
