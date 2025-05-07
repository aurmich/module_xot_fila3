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

/**
 * Azione per ottenere il percorso di un modulo in base al generatore.
 */
class GetModulePathByGeneratorAction
{
    /**
     * Ottiene il percorso completo di un modulo in base al generatore.
     *
     * @param string $moduleName Nome del modulo
     * @param string $generatorPath Percorso del generatore
     * @return string Percorso completo del modulo
     * @throws \InvalidArgumentException Se il percorso non è una directory valida
     */
    public function execute(string $moduleName, string $generatorPath): string
    {
        $relativePath = config('modules.paths.generator.'.$generatorPath.'.path');

        $res = module_path($moduleName, $relativePath);
        Assert::string($res);
<<<<<<< HEAD

<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
=======
>>>>>>> 355a587 (.)
        Assert::directory($res, 'The path '.$res.' is not a directory ['.$moduleName.']['.$generatorPath.']');

>>>>>>> origin/dev
>>>>>>> 3268b83 (.)
        return $res;
    }
}
