<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\File;

use Nwidart\Modules\Facades\Module;
use Spatie\QueueableAction\QueueableAction;

/**
 * Azione per gestire i percorsi degli asset nei moduli.
 */
class AssetPathAction
{
    use QueueableAction;

    /**
     * Ottiene il percorso completo di un asset del modulo.
     *
     * @param string $asset Il percorso dell'asset nel formato "modulo::percorso"
     * @return string Il percorso completo dell'asset
     */
    public function execute(string $asset): string
    {
<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
>>>>>>> 355a587 (.)
        [$ns, $file] = explode('::', $asset);
        // Uniforma il path delle risorse secondo le regole Laraxot (Resources con R maiuscola)
        $module_path = Module::getModulePath($ns) . 'Resources';
        return $module_path . '/' . $file;
<<<<<<< HEAD
=======
>>>>>>> 3268b83 (.)
        [$ns,$file] = explode('::', $asset);
        $module_path = Module::getModulePath($ns).'Resources';

        return $module_path.'/'.$file;
<<<<<<< HEAD
=======
>>>>>>> origin/dev
>>>>>>> 3268b83 (.)
=======
>>>>>>> 355a587 (.)
    }
}
