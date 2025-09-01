<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;
use Webmozart\Assert\Assert;

class FilterRelationsAction
{
    /**
<<<<<<< HEAD
<<<<<<< HEAD
     * @param  array<string, mixed>  $relations
=======
     * @param array<string, mixed> $relations
     *
>>>>>>> e697a77b (.)
=======
     * @param array<string, mixed> $relations
     *
>>>>>>> 89d0c8f4 (.)
     * @return array<string, Relation>
     */
    public function execute(Model $model, array $relations): array
    {
        $filtered = [];

        foreach ($relations as $name => $relation) {
            Assert::isInstanceOf($relation, Relation::class);
            $related = $relation->getRelated();
            Assert::isInstanceOf($related, Model::class);

            $className = class_basename($related);
            $filtered[$className] = $relation;
        }

        return $filtered;
    }
}
