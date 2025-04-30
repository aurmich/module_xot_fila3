<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Module;

use Webmozart\Assert\Assert;
use Illuminate\Support\Facades\File;
use Modules\Tenant\Services\TenantService;

class GetModulePathByGeneratorAction
{
    public function execute(string $moduleName, string $generatorPath): string
    {
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

        return $res;
    }
}
