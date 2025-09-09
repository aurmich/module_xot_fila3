<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Model\Update;

use Illuminate\Database\Eloquent\Model;
use Modules\Xot\Actions\Model\UpdateAction;
use Modules\Xot\Datas\RelationData as RelationDTO;
use Spatie\QueueableAction\QueueableAction;
use Webmozart\Assert\Assert;

class MorphManyAction
{
    use QueueableAction;

    /**
     * Undocumented function.
     */
    public function execute(Model $model, RelationDTO $relationDTO): void
    {
<<<<<<< HEAD
<<<<<<< HEAD
        if ($relationDTO->data === []) {
            // dddx(['model'=>$model,'relationDTO'=>$relationDTO]);
            // save Model - type assertion per dynamic relationship
            $relationName = $relationDTO->name;
            $morphRelation = $model->{$relationName}();
            Assert::object($morphRelation, sprintf('Relation "%s" must return an object', $relationName));

            if (! method_exists($morphRelation, 'saveMany')) {
                throw new \InvalidArgumentException(sprintf('Relation "%s" must support saveMany() method', $relationName));
            }

            // Cast to HasMany or MorphMany that supports saveMany()
            if ($morphRelation instanceof \Illuminate\Database\Eloquent\Relations\HasMany ||
                $morphRelation instanceof \Illuminate\Database\Eloquent\Relations\MorphMany) {
                $morphRelation->saveMany($relationDTO->data);
            } else {
                throw new \InvalidArgumentException(sprintf('Relation "%s" must be HasMany or MorphMany to support saveMany()', $relationName));
            }
=======
        if ([] === $relationDTO->data) {
            // dddx(['model'=>$model,'relationDTO'=>$relationDTO]);
            // save Model
            $model->{$relationDTO->name}()->saveMany($relationDTO->data);
>>>>>>> ad700fc8 (.)
=======
        if ($relationDTO->data === []) {
            // dddx(['model'=>$model,'relationDTO'=>$relationDTO]);
            // save Model - type assertion per dynamic relationship
            $relationName = $relationDTO->name;
            $morphRelation = $model->{$relationName}();
            Assert::object($morphRelation, sprintf('Relation "%s" must return an object', $relationName));

            if (! method_exists($morphRelation, 'saveMany')) {
                throw new \InvalidArgumentException(sprintf('Relation "%s" must support saveMany() method', $relationName));
            }

            // Cast to HasMany or MorphMany that supports saveMany()
            if ($morphRelation instanceof \Illuminate\Database\Eloquent\Relations\HasMany ||
                $morphRelation instanceof \Illuminate\Database\Eloquent\Relations\MorphMany) {
                $morphRelation->saveMany($relationDTO->data);
            } else {
                throw new \InvalidArgumentException(sprintf('Relation "%s" must be HasMany or MorphMany to support saveMany()', $relationName));
            }
>>>>>>> 00793d2a (.)

            return;
        }

        $related = $relationDTO->related;
        $keyName = $related->getKeyName();
        $models = [];
        $ids = [];
        foreach ($relationDTO->data as $data) {
            Assert::isArray($data);
            if (\in_array($keyName, array_keys($data), false)) {
                /*
                $related_id = $data[$keyName];
                $row = $related->firstOrCreate([$keyName => $related_id]);
                $res = app(\Modules\Xot\Actions\Model\UpdateAction::class)->execute($row, $data, []);
                */
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 00793d2a (.)

                // Assicura che $data sia type-safe per UpdateAction
                /** @var array<string, mixed> $typedData */
                $typedData = [];
                foreach ($data as $key => $value) {
                    $typedData[(string) $key] = $value;
                }

                $res = app(UpdateAction::class)->execute($related, $typedData, []);
<<<<<<< HEAD
=======
                $res = app(UpdateAction::class)->execute($related, $data, []);
>>>>>>> ad700fc8 (.)
=======
>>>>>>> 00793d2a (.)
                $ids[] = $res->getKey();
                $models[] = $res;
            } else {
                dddx(['model' => $model, 'relationDTO' => $relationDTO]);
            }
        }

<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 00793d2a (.)
        // Type assertion per dynamic relationship method
        $relationName = $relationDTO->name;
        $morphRelation = $model->{$relationName}();
        Assert::object($morphRelation, sprintf('Relation "%s" must return an object', $relationName));

        if (! method_exists($morphRelation, 'saveMany')) {
            throw new \InvalidArgumentException(sprintf('Relation "%s" must support saveMany() method', $relationName));
        }

        // Cast to HasMany or MorphMany that supports saveMany()
        if ($morphRelation instanceof \Illuminate\Database\Eloquent\Relations\HasMany ||
            $morphRelation instanceof \Illuminate\Database\Eloquent\Relations\MorphMany) {
            $morphRelation->saveMany($models);
        } else {
            throw new \InvalidArgumentException(sprintf('Relation "%s" must be HasMany or MorphMany to support saveMany()', $relationName));
        }
<<<<<<< HEAD
=======
        $model->{$relationDTO->name}()->saveMany($models);
>>>>>>> ad700fc8 (.)
=======
>>>>>>> 00793d2a (.)

        // dddx(['model' => $model, 'relationDTO' => $relationDTO]);
    }
}
