<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\ModelClass;

use Filament\Notifications\Notification;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Spatie\QueueableAction\QueueableAction;
use Webmozart\Assert\Assert;

class FakeSeederAction
{
    use QueueableAction;

    private const MAX_RECORDS = 200;

    private const CHUNK_SIZE = 50;

    /**
     * Execute the fake data seeding process.
     *
<<<<<<< HEAD
<<<<<<< HEAD
     * @param  class-string<Model>  $modelClass  The fully qualified model class name
     * @param  int<1, max>  $qty  Number of records to generate
=======
     * @param class-string<Model> $modelClass The fully qualified model class name
     * @param int<1, max>         $qty        Number of records to generate
>>>>>>> e697a77b (.)
=======
     * @param class-string<Model> $modelClass The fully qualified model class name
     * @param int<1, max>         $qty        Number of records to generate
>>>>>>> 89d0c8f4 (.)
     *
     * @throws \InvalidArgumentException When model class is invalid
     */
    public function execute(string $modelClass, int $qty): void
    {
        if (! class_exists($modelClass) || ! is_subclass_of($modelClass, Model::class) || ! in_array(HasFactory::class, class_uses_recursive($modelClass))) {
            throw new \InvalidArgumentException("Invalid model class or missing HasFactory trait: {$modelClass}");
        }

        $qtyToDo = min($qty, self::MAX_RECORDS);

        $factory = $this->getModelFactory($modelClass);
        /** @var Collection<int, Model> $rows */
        $rows = $factory->count($qtyToDo)->make();

        /** @var Collection<int, Collection> $chunks */
        $chunks = $rows->chunk(self::CHUNK_SIZE);

        $chunks->each(function (Collection $chunk) use ($modelClass): void {
            /** @var array<int, array<string, mixed>> $data */
            $data = $chunk->map(function ($item) {
                assert($item instanceof Model);

                return $item->getAttributes();
            })->all();
            $modelClass::insert($data);
        });

        $this->sendNotification($modelClass, $qtyToDo);

        if ($qty > self::MAX_RECORDS) {
            $this->queueRemainingRecords($modelClass, $qty);
        }
    }

    /**
     * Get the model factory.
     *
<<<<<<< HEAD
<<<<<<< HEAD
     * @param  class-string<Model>  $modelClass
=======
     * @param class-string<Model> $modelClass
>>>>>>> e697a77b (.)
=======
     * @param class-string<Model> $modelClass
>>>>>>> 89d0c8f4 (.)
     *
     * @throws \RuntimeException
     */
    private function getModelFactory(string $modelClass): Factory
    {
        if (method_exists($modelClass, 'factory')) {
            return $modelClass::factory();
        }

        throw new \RuntimeException("Unable to create factory for model: {$modelClass}");
    }

    /**
     * Send a notification about the seeding completion.
     *
<<<<<<< HEAD
<<<<<<< HEAD
     * @param  class-string<Model>  $modelClass
     * @param  int<1, max>  $count
=======
     * @param class-string<Model> $modelClass
     * @param int<1, max>         $count
>>>>>>> e697a77b (.)
=======
     * @param class-string<Model> $modelClass
     * @param int<1, max>         $count
>>>>>>> 89d0c8f4 (.)
     */
    private function sendNotification(string $modelClass, int $count): void
    {
        $title = sprintf('Created %d %s !', $count, $modelClass);
        Notification::make()->title($title)->success()->send();
    }

    /**
     * Queue remaining records for processing.
     *
<<<<<<< HEAD
<<<<<<< HEAD
     * @param  class-string<Model>  $modelClass
     * @param  int<1, max>  $qty
=======
     * @param class-string<Model> $modelClass
     * @param int<1, max>         $qty
>>>>>>> e697a77b (.)
=======
     * @param class-string<Model> $modelClass
     * @param int<1, max>         $qty
>>>>>>> 89d0c8f4 (.)
     */
    private function queueRemainingRecords(string $modelClass, int $qty): void
    {
        if ($qty <= self::MAX_RECORDS) {
            return;
        }
        app(self::class)
            ->onQueue()
            ->execute($modelClass, $qty - self::MAX_RECORDS);
    }

    private function getTableName(string $modelClass): string
    {
        Assert::classExists($modelClass, 'La classe del modello deve esistere');
<<<<<<< HEAD
<<<<<<< HEAD

        /** @var \Illuminate\Database\Eloquent\Model */
        $model = app($modelClass);

=======
        
        /** @var \Illuminate\Database\Eloquent\Model */
        $model = app($modelClass);
        
>>>>>>> e697a77b (.)
=======
        
        /** @var \Illuminate\Database\Eloquent\Model */
        $model = app($modelClass);
        
>>>>>>> 89d0c8f4 (.)
        return $model->getTable();
    }
}
