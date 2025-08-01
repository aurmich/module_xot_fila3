<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Module;

use Webmozart\Assert\Assert;
use Illuminate\Support\Facades\Config;

class GetModulePathByGeneratorAction
{
    public function execute(string $moduleName, string $generatorPath): string
    {
<<<<<<< HEAD
        $relativePath = Config::string('modules.paths.generator.'.$generatorPath.'.path');

        $res = module_path($moduleName, $relativePath);
=======
        $relativePath = config('modules.paths.generator.'.$generatorPath.'.path');
        try{
            $res = module_path($moduleName, $relativePath);
        }catch(\Error $e){
            throw new \Exception($e->getMessage()."\n module name: [".$moduleName."]\n generator path: [". $generatorPath."]\n relative path: [". $relativePath."]");
        }
>>>>>>> cb26a2b (.)
        Assert::string($res);

        return $res;
    }
}
