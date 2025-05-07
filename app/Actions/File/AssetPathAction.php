<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\File;

use Nwidart\Modules\Facades\Module;
use Spatie\QueueableAction\QueueableAction;

class AssetPathAction
{
    use QueueableAction;

    public function execute(string $asset): string
    {
<<<<<<< HEAD
=======
<<<<<<< HEAD
        [$ns, $file] = explode('::', $asset);
        // Uniforma il path delle risorse secondo le regole Laraxot (Resources con R maiuscola)
        $module_path = Module::getModulePath($ns) . 'Resources';
        return $module_path . '/' . $file;
=======
>>>>>>> 3268b83 (.)
        [$ns,$file] = explode('::', $asset);
        $module_path = Module::getModulePath($ns).'Resources';

        return $module_path.'/'.$file;
<<<<<<< HEAD
=======
>>>>>>> origin/dev
>>>>>>> 3268b83 (.)
    }
}
