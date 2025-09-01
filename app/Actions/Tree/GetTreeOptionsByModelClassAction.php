<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Tree;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Modules\Xot\Contracts\HasRecursiveRelationshipsContract;
use Spatie\QueueableAction\QueueableAction;
use Staudenmeir\LaravelAdjacencyList\Eloquent\Collection;

class GetTreeOptionsByModelClassAction
{
    use QueueableAction;

    /** @var array<int|string, string> */
    public array $options = [];

    /**
<<<<<<< HEAD
<<<<<<< HEAD
     * @param  class-string<HasRecursiveRelationshipsContract>  $class
=======
     * @param class-string<HasRecursiveRelationshipsContract> $class
     *
>>>>>>> e697a77b (.)
=======
     * @param class-string<HasRecursiveRelationshipsContract> $class
     *
>>>>>>> 89d0c8f4 (.)
     * @return array<int|string, string>
     */
    public function execute(string $class, Model|callable|null $where = null): array
    {
        /** @var HasRecursiveRelationshipsContract $model */
<<<<<<< HEAD
<<<<<<< HEAD
        $model = new $class;
=======
        $model = new $class();
>>>>>>> e697a77b (.)
=======
        $model = new $class();
>>>>>>> 89d0c8f4 (.)

        /** @var Collection<int, HasRecursiveRelationshipsContract> $collection */
        // @phpstan-ignore generics.notSubtype
        $collection = $model->newQuery()->get();
        $rows = $collection->toTree();

        foreach ($rows as $row) {
            /* @var HasRecursiveRelationshipsContract $row */
            $this->options[$row->getKey()] = is_string($row) ? $row : (string) $row->getLabel();
            $this->parse($row);
        }

        return $this->options;
    }

    public function parse(HasRecursiveRelationshipsContract $model): void
    {
        foreach ($model->children as $child) {
            $this->options[$child->getKey()] = Str::repeat('---', $child->depth).'   '.$child->getLabel();
        }
    }
}
