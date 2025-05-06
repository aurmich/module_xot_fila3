<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Module;

use Webmozart\Assert\Assert;
<<<<<<< HEAD
use Illuminate\Support\Facades\File;
use Modules\Tenant\Services\TenantService;
=======
>>>>>>> 9746d62 (.)

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

>>>>>>> 9746d62 (.)
        return $res;
    }
}
