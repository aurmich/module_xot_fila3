<?php

declare(strict_types=1);

namespace Modules\Xot\States;

use Filament\Forms\Components;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
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
 * @property string $name  Il nome dello stato
=======
 * @property string $name Il nome dello stato
>>>>>>> c4ec0fb6 (.)
=======
 * @property string $name  Il nome dello stato
>>>>>>> edc8a701 (.)
 * @property string $value Il valore dello stato nel database
 */
abstract class XotBaseState extends State implements StateContract
{
    use TransTrait;

    public static string $name;

    public static function getName(): string
    {
        /* @phpstan-ignore-next-line */
        return static::$name ?? Str::of(class_basename(static::class))->snake()->toString();
    }

    public function label(): string
    {
        return static::transClass(static::class, 'states.'.static::getName().'.label');
        // return 'Annullato';
    }

    public function color(): string
    {
        return static::transClass(static::class, 'states.'.static::getName().'.color');
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
     * @return array<string, Components\Component>
     */
    public function modalFormSchema(): array
    {
        return [
            'message' => Components\Textarea::make('message')
                ->required()
                ->maxLength(255),
        ];
    }

    /**
     * Fill form data for modal.
     *
<<<<<<< HEAD
<<<<<<< HEAD
     * @param array<string, mixed> $arguments
     * @param array<string, mixed> $data
     *
=======
     * @param  array<string, mixed>  $arguments
     * @param  array<string, mixed>  $data
>>>>>>> c4ec0fb6 (.)
=======
     * @param array<string, mixed> $arguments
     * @param array<string, mixed> $data
     *
>>>>>>> edc8a701 (.)
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
     * @param array<string, mixed> $arguments
     * @param array<string, mixed> $data
=======
     * @param  array<string, mixed>  $arguments
     * @param  array<string, mixed>  $data
>>>>>>> c4ec0fb6 (.)
=======
     * @param array<string, mixed> $arguments
     * @param array<string, mixed> $data
>>>>>>> edc8a701 (.)
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
     * @param array<string, mixed> $arguments
     * @param array<string, mixed> $data
=======
     * @param  array<string, mixed>  $arguments
     * @param  array<string, mixed>  $data
>>>>>>> c4ec0fb6 (.)
=======
     * @param array<string, mixed> $arguments
     * @param array<string, mixed> $data
>>>>>>> edc8a701 (.)
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
        /* @phpstan-ignore-next-line */
        $record->state->transitionTo($stateClass, $message);
    }

    /**
     * Execute modal action by record.
     *
<<<<<<< HEAD
<<<<<<< HEAD
     * @param array<string, mixed> $data
=======
     * @param  array<string, mixed>  $data
>>>>>>> c4ec0fb6 (.)
=======
     * @param array<string, mixed> $data
>>>>>>> edc8a701 (.)
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
     * @param array<string, mixed> $data
=======
     * @param  array<string, mixed>  $data
>>>>>>> c4ec0fb6 (.)
=======
     * @param array<string, mixed> $data
>>>>>>> edc8a701 (.)
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
    }

    public function isMessageRequired(): bool
    {
        return false;
    }

    public static function getOptions(): array
    {
        $states = static::getStateMapping()->toArray();

        $states = Arr::map($states, function ($stateClass, $state) {
<<<<<<< HEAD
<<<<<<< HEAD
            return static::transClass(static::class, 'states.'.$state.'.label');
=======
            $stateStr = is_string($state) ? $state : (string) $state;

            return static::transClass(static::class, 'states.'.$stateStr.'.label');
>>>>>>> c4ec0fb6 (.)
=======
            return static::transClass(static::class, 'states.'.$state.'.label');
>>>>>>> edc8a701 (.)
        });

        return $states;
    }
}
