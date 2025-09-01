<?php

declare(strict_types=1);

namespace Modules\Xot\Datas;

use Spatie\LaravelData\Attributes\Validation\ArrayType;
use Spatie\LaravelData\Data;

class HasManyUpdateData extends Data
{
    /**
<<<<<<< HEAD
<<<<<<< HEAD
     * @param  array<int|string>  $ids
=======
     * @param array<int|string> $ids
>>>>>>> e697a77b (.)
=======
     * @param array<int|string> $ids
>>>>>>> 89d0c8f4 (.)
     */
    public function __construct(
        public string $foreignKey,
        public mixed $parentKey,
        #[ArrayType]
        public array $ids = [],
<<<<<<< HEAD
<<<<<<< HEAD
    ) {}
=======
    ) {
    }
>>>>>>> e697a77b (.)
=======
    ) {
    }
>>>>>>> 89d0c8f4 (.)
}
