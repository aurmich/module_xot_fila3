<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Module;

use Webmozart\Assert\Assert;
use Illuminate\Support\Facades\File;
<<<<<<< HEAD
use Modules\Tenant\Services\TenantService;
=======
>>>>>>> aurmich/dev

class GetModulePathByGeneratorAction
{
    public function execute(string $moduleName, string $generatorPath): string
    {
<<<<<<< HEAD
        $configKey='modules.paths.generator.'.$generatorPath.'.path';
        $relativePath = config($configKey);
        /*
        if(!is_string($relativePath)){
            $relativePath=config('tenant::'.$configKey);
        }
        */
        if(!is_string($relativePath)){
            throw new \Exception('Invalid generato path: '.$generatorPath);
        }
        $res = module_path($moduleName, $relativePath);
        Assert::string($res);

        Assert::directory($res, 'The path '.$res.' is not a directory ['.$moduleName.']['.$generatorPath.']');

=======
        $relativePath = config('modules.paths.generator.'.$generatorPath.'.path');

        $res = module_path($moduleName, $relativePath);
        Assert::string($res);

<<<<<<< HEAD
        Assert::directory($res, 'The path '.$res.' is not a directory ['.$moduleName.']['.$generatorPath.']');

=======
            Assert::directory($res,'The path '.$res.' is not a directory ['.$moduleName.']['.$generatorPath.']');

            //File::makeDirectory($res, 0755, true, true);

        /*
        if (! file_exists($res)) {
            return;
        }
        */
>>>>>>> c93e31b (.)
>>>>>>> aurmich/dev
        return $res;
    }
}
