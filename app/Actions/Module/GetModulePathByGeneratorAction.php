<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Module;

use Webmozart\Assert\Assert;
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
use Illuminate\Support\Facades\File;
>>>>>>> origin/dev
>>>>>>> 3268b83 (.)

class GetModulePathByGeneratorAction
{
    public function execute(string $moduleName, string $generatorPath): string
    {
        $relativePath = config('modules.paths.generator.'.$generatorPath.'.path');

        $res = module_path($moduleName, $relativePath);
        Assert::string($res);

<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
        Assert::directory($res, 'The path '.$res.' is not a directory ['.$moduleName.']['.$generatorPath.']');

>>>>>>> origin/dev
>>>>>>> 3268b83 (.)
        return $res;
    }
}
