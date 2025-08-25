<?php

declare(strict_types=1);

namespace Modules\Xot\States;

use Filament\Forms\Components;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
<<<<<<< HEAD
<<<<<<< HEAD
use Webmozart\Assert\Assert;
use Spatie\ModelStates\State;
use Filament\Forms\Components;
use Spatie\ModelStates\StateConfig;
use Illuminate\Database\Eloquent\Model;
=======
>>>>>>> 5852845d (.)
=======
>>>>>>> abfbbdf (.)
use Modules\Xot\Contracts\StateContract;
use Modules\Xot\Filament\Traits\TransTrait;
use Spatie\ModelStates\State;

/**
 * Abstract base class for appointment state management.
 *
 * Defines the state machine configuration and required methods
 * that must be implemented by each concrete state class.
 *
<<<<<<< HEAD
<<<<<<< HEAD
 * @property string $name Il nome dello stato
=======
 * @property string $name  Il nome dello stato
>>>>>>> 5852845d (.)
=======
 * @property string $name  Il nome dello stato
>>>>>>> abfbbdf (.)
 * @property string $value Il valore dello stato nel database
 */
abstract class XotBaseState extends State implements StateContract
{
    use TransTrait;

    public static string $name;

<<<<<<< HEAD
<<<<<<< HEAD
    /*
    public static function config(): StateConfig
        {
            return parent::config()
                ->default(Pending::class)

                // Pending transitions (In entrata)
                ->allowTransition(Pending::class, Confirmed::class, Transitions\PendingToConfirmed::class)
                ->allowTransition(Pending::class, Rejected::class, Transitions\PendingToRejected::class)

                // Confirmed transitions (Accettati)
                ->allowTransition(Confirmed::class, ReportPending::class, Transitions\ConfirmedToReportPending::class)
                ->allowTransition(Confirmed::class, Cancelled::class, Transitions\ConfirmedToCancelled::class)
                ->allowTransition(Confirmed::class, NoShow::class, Transitions\ConfirmedToNoShow::class)

                // NoShow transitions (gestione interna del conteggio)
                ->allowTransition(NoShow::class, Banned::class, Transitions\NoShowToBanned::class)

                // Completed transitions (Conclusi)
                //->allowTransition(Completed::class, RefundPending::class, Transitions\CompletedToRefundPending::class)
                //->allowTransition(Completed::class, ProBono::class, Transitions\CompletedToProBono::class)
                ->allowTransition(ReportCompleted::class, RefundPending::class, Transitions\ReportCompletedToRefundPending::class)
                ->allowTransition(ReportCompleted::class, ProBono::class, Transitions\ReportCompletedToProBono::class)

                // Report transitions
                ->allowTransition(ReportPending::class, ReportPending::class)

                ->allowTransition(ReportPending::class, ReportCompleted::class, Transitions\ReportPendingToReportCompleted::class)

                // ReportCompleted transitions
                //->allowTransition(ReportCompleted::class, Completed::class, Transitions\ReportCompletedToCompleted::class)
                //->allowTransition(ReportCompleted::class, RefundPending::class, Transitions\ReportCompletedToRefundPending::class)
                //->allowTransition(ReportCompleted::class, ProBono::class, Transitions\ReportCompletedToProBono::class)

                // Refund transitions
                ->allowTransition(RefundPending::class, RefundAccepted::class, Transitions\RefundPendingToRefundAccepted::class)
                ->allowTransition(RefundPending::class, RefundToIntegrate::class, Transitions\RefundPendingToRefundToIntegrate::class)
                ->allowTransition(RefundPending::class, RefundCompleted::class, Transitions\RefundPendingToRefundCompleted::class)

                ->allowTransition(RefundAccepted::class, RefundCompleted::class, Transitions\RefundAcceptedToRefundCompleted::class)
                ->allowTransition(RefundToIntegrate::class, RefundCompleted::class, Transitions\RefundToIntegrateToRefundCompleted::class);

    }
    */
=======
>>>>>>> 5852845d (.)
=======
>>>>>>> abfbbdf (.)
    public static function getName(): string
    {
        /* @phpstan-ignore-next-line */
        return static::$name ?? Str::of(class_basename(static::class))->snake()->toString();
    }

    public function label(): string
    {
<<<<<<< HEAD
<<<<<<< HEAD

=======
>>>>>>> 5852845d (.)
=======
>>>>>>> abfbbdf (.)
        return static::transClass(static::class, 'states.'.static::getName().'.label');
        // return 'Annullato';
    }

    public function color(): string
    {
<<<<<<< HEAD
<<<<<<< HEAD

        return static::transClass(static::class, 'states.'.static::getName().'.color');

=======
        return static::transClass(static::class, 'states.'.static::getName().'.color');
>>>>>>> 5852845d (.)
=======
        return static::transClass(static::class, 'states.'.static::getName().'.color');
>>>>>>> abfbbdf (.)
    }

    public function bgColor(): string
    {
        return static::transClass(static::class, 'states.'.static::getName().'.bg_color');
        // return 'info';
    }

    public function icon(): string
    {
        return static::transClass(static::class, 'states.'.static::getName().'.icon');
        // return 'heroicon-o-x-circle';
    }

    public function modalHeading(): string
    {
        return static::transClass(static::class, 'states.'.static::getName().'.modal_heading');
        // return 'Annulla Appuntamento';
    }

    public function modalDescription(): string
    {
        $appointment = $this->getModel();

        return static::transClass(static::class, 'states.'.static::getName().'.modal_description');
        // return 'Sei sicuro di voler annullare questo appuntamento?';
    }

    /**
<<<<<<< HEAD
<<<<<<< HEAD
     * @return array<string, \Filament\Forms\Components\Component>
=======
     * @return array<string, Components\Component>
>>>>>>> 5852845d (.)
=======
     * @return array<string, Components\Component>
>>>>>>> abfbbdf (.)
     */
    public function modalFormSchema(): array
    {
        return [
            'message' => Components\Textarea::make('message')
                ->required()
                ->maxLength(255),
<<<<<<< HEAD
<<<<<<< HEAD

=======
>>>>>>> 5852845d (.)
=======
>>>>>>> abfbbdf (.)
        ];
    }

    /**
     * Fill form data for modal.
     *
<<<<<<< HEAD
<<<<<<< HEAD
     * @param  array<string, mixed>  $arguments
     * @param  array<string, mixed>  $data
=======
     * @param array<string, mixed> $arguments
     * @param array<string, mixed> $data
     *
>>>>>>> 5852845d (.)
=======
     * @param array<string, mixed> $arguments
     * @param array<string, mixed> $data
     *
>>>>>>> abfbbdf (.)
     * @return array<string, mixed>
     */
    public function modalFillForm(array $arguments, array $data): array
    {
        return $data;
    }

    /**
     * Fill form data for modal by record.
     *
     * @return array<string, mixed>
     */
    public function modalFillFormByRecord(Model $record): array
    {
        return [];
    }

    /**
     * Execute modal action.
     *
<<<<<<< HEAD
<<<<<<< HEAD
     * @param  array<string, mixed>  $arguments
     * @param  array<string, mixed>  $data
=======
     * @param array<string, mixed> $arguments
     * @param array<string, mixed> $data
>>>>>>> 5852845d (.)
=======
     * @param array<string, mixed> $arguments
     * @param array<string, mixed> $data
>>>>>>> abfbbdf (.)
     */
    public function modalAction(array $arguments, array $data): void
    {
        $this->processStateAction($arguments, $data);
    }

    /**
     * Process state action.
     *
<<<<<<< HEAD
<<<<<<< HEAD
     * @param  array<string, mixed>  $arguments
     * @param  array<string, mixed>  $data
=======
     * @param array<string, mixed> $arguments
     * @param array<string, mixed> $data
>>>>>>> 5852845d (.)
=======
     * @param array<string, mixed> $arguments
     * @param array<string, mixed> $data
>>>>>>> abfbbdf (.)
     */
    public function processStateAction(array $arguments, array $data): void
    {
        $message = Arr::get($data, 'message');
        $stateClass = static::class;
        /*

        $appointmentId = $arguments['appointment'];
        $appointment = Appointment::firstWhere('id',$appointmentId);

        $appointment?->state->transitionTo($stateClass,$message);
        */
        $record = $this->getModel();
<<<<<<< HEAD
<<<<<<< HEAD
        /** @phpstan-ignore-next-line */
=======
        /* @phpstan-ignore-next-line */
>>>>>>> 5852845d (.)
=======
        /* @phpstan-ignore-next-line */
>>>>>>> abfbbdf (.)
        $record->state->transitionTo($stateClass, $message);
    }

    /**
     * Execute modal action by record.
     *
<<<<<<< HEAD
<<<<<<< HEAD
     * @param  array<string, mixed>  $data
=======
     * @param array<string, mixed> $data
>>>>>>> 5852845d (.)
=======
     * @param array<string, mixed> $data
>>>>>>> abfbbdf (.)
     */
    public function modalActionByRecord(Model $record, array $data): void
    {
        $this->processStateActionByRecord($record, $data);
    }

    /**
     * Process state action by record.
     *
<<<<<<< HEAD
<<<<<<< HEAD
     * @param  array<string, mixed>  $data
=======
     * @param array<string, mixed> $data
>>>>>>> 5852845d (.)
=======
     * @param array<string, mixed> $data
>>>>>>> abfbbdf (.)
     */
    public function processStateActionByRecord(Model $record, array $data): void
    {
        $message = Arr::get($data, 'message');
        $stateClass = static::class;
        /*

        $appointmentId = $arguments['appointment'];
        $appointment = Appointment::firstWhere('id',$appointmentId);

        $appointment?->state->transitionTo($stateClass,$message);
        */
        /* @phpstan-ignore-next-line */
        $record->state->transitionTo($stateClass, $message);
<<<<<<< HEAD
    }

    public function isMessageRequired(): bool
    {
        return false;
    }

    public static function getOptions(): array
    {
        $states = static::getStateMapping()->toArray();

        $states = Arr::map($states, function ($stateClass, $state) {
            return static::transClass(static::class, 'states.'.$state.'.label');
        });

        return $states;
=======
>>>>>>> abfbbdf (.)
    }

    public function isMessageRequired(): bool
    {
        return false;
    }

    public static function getOptions(): array
    {
        $states = static::getStateMapping()->toArray();

        $states = Arr::map($states, function ($stateClass, $state) {
            return static::transClass(static::class, 'states.'.$state.'.label');
        });

        return $states;
    }
}
