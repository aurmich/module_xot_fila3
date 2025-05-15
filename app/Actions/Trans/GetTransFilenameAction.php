<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Trans;

use Illuminate\Support\Str;
<<<<<<< Updated upstream
<<<<<<< HEAD
use Modules\Xot\Actions\Module\GetModulePathByGeneratorAction;
=======
<<<<<<< HEAD
<<<<<<< Updated upstream
<<<<<<< HEAD
use Modules\Xot\Actions\Module\GetModulePathByGeneratorAction;
=======
use Nwidart\Modules\Facades\Module;
>>>>>>> 4241492 (.)
=======
use Modules\Xot\Actions\Module\GetModulePathByGeneratorAction;
>>>>>>> Stashed changes
=======
use Nwidart\Modules\Facades\Module;
>>>>>>> 823c958 (.)
>>>>>>> bdc979b (.)
=======
use Modules\Xot\Actions\Module\GetModulePathByGeneratorAction;
>>>>>>> Stashed changes
use Webmozart\Assert\Assert;

class GetTransFilenameAction
{
    public function execute(string $filename): string
    {
        $lang = app()->getLocale();
        $ns = Str::before($filename, '::');
        $file = Str::between($filename, '::', '.');

<<<<<<< Updated upstream
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< Updated upstream
<<<<<<< HEAD
=======
>>>>>>> Stashed changes
>>>>>>> bdc979b (.)
=======
>>>>>>> Stashed changes
        try {
            $langPath = app(GetModulePathByGeneratorAction::class)->execute($ns, 'lang');
            Assert::string($langPath, 'Percorso lang non valido');
        } catch (\Throwable $e) {
            $langPath = base_path('Modules/'.$ns.'/lang');
        }

        $lang_path_full = $langPath.'/'.$lang.'/'.$file.'.php';
<<<<<<< Updated upstream
        $lang_path_full = str_replace(['\\', '/'], [DIRECTORY_SEPARATOR, DIRECTORY_SEPARATOR], $lang_path_full);

        return $lang_path_full;
<<<<<<< HEAD
=======
=======
=======
>>>>>>> 823c958 (.)
        $module_path = Module::getModulePath($ns);
        Assert::string($lang_path = config('modules.paths.generator.lang.path'));
        $lang_path_full = $module_path.''.$lang_path.'/'.$lang.'/'.$file.'.php';
        $lang_path_full = str_replace(['\\', '/'], [DIRECTORY_SEPARATOR, DIRECTORY_SEPARATOR], $lang_path_full);

        $filename = $lang_path_full;

        return $filename;
<<<<<<< HEAD
>>>>>>> 4241492 (.)
=======
        $lang_path_full = str_replace(['\\', '/'], [DIRECTORY_SEPARATOR, DIRECTORY_SEPARATOR], $lang_path_full);

        return $lang_path_full;
>>>>>>> Stashed changes
=======
>>>>>>> 823c958 (.)
>>>>>>> bdc979b (.)
=======
        $lang_path_full = str_replace(['\\', '/'], [DIRECTORY_SEPARATOR, DIRECTORY_SEPARATOR], $lang_path_full);

        return $lang_path_full;
>>>>>>> Stashed changes
    }
}
