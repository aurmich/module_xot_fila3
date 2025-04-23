<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Module;

use Illuminate\Support\Str;
use Spatie\QueueableAction\QueueableAction;

class GetModuleNameByModelClassAction
{
    use QueueableAction;

    public function execute(string $model_class): string
    {
        $module = Str::between($model_class, 'Modules\\', '\Models\\');

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        return (string) $module;
=======
        return is_string($module) ? $module : (string) $module;
>>>>>>> e5c56c3 (.)
=======
=======
>>>>>>> 7b67053 (fix: auto resolve conflict)
=======
>>>>>>> c2dac53 (.)
        return is_string($module) ? $module : (string) $module;
        return is_string($module) ? $module : (string) $module;
        return (string) $module;
<<<<<<< HEAD
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
<<<<<<< HEAD
>>>>>>> d9307de (fix: auto resolve conflict)
=======
=======
        return (string) $module;
>>>>>>> 4ab3760 (.)
>>>>>>> 7b67053 (fix: auto resolve conflict)
=======
        return (string) $module;
>>>>>>> c2dac53 (.)
    }
}
