<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\ModelClass;

<<<<<<< HEAD
<<<<<<< HEAD
=======
use Webmozart\Assert\Assert;
use Illuminate\Support\Facades\DB;
>>>>>>> 89d0c8f4 (.)
use Illuminate\Database\Eloquent\Model;
use Spatie\QueueableAction\QueueableAction;
<<<<<<< HEAD
=======
use Webmozart\Assert\Assert;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Spatie\QueueableAction\QueueableAction;
use Modules\Xot\Models\InformationSchemaTable;
>>>>>>> e697a77b (.)
=======
use Modules\Xot\Models\InformationSchemaTable;
>>>>>>> 89d0c8f4 (.)

/**
 * Counts records for a given model class using optimized table information.
 */
class CountAction
{
    use QueueableAction;

    /**
     * Execute the count action for the given model class.
     *
<<<<<<< HEAD
<<<<<<< HEAD
     * @param  class-string<Model>  $modelClass  The fully qualified model class name
     * @return int The total count of records
     *
     * @throws \InvalidArgumentException If model class is invalid or not found
=======
     * @param class-string<Model> $modelClass The fully qualified model class name
     *
     * @throws \InvalidArgumentException If model class is invalid or not found
     *
     * @return int The total count of records
>>>>>>> e697a77b (.)
=======
     * @param class-string<Model> $modelClass The fully qualified model class name
     *
     * @throws \InvalidArgumentException If model class is invalid or not found
     *
     * @return int The total count of records
>>>>>>> 89d0c8f4 (.)
     */
    public function execute(string $modelClass): int
    {
        return InformationSchemaTable::getModelCount($modelClass);
    }
}
