<?php

/**
<<<<<<< HEAD
 * @see https://github.com/protonemedia/laravel-ffmpeg
=======
 * Azione per ottenere tutti i modelli di un determinato modulo.
>>>>>>> 823c958 (.)
 */

declare(strict_types=1);

namespace Modules\Xot\Actions\Model;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Nwidart\Modules\Facades\Module;
use ReflectionClass;
use Spatie\QueueableAction\QueueableAction;

class GetAllModelsByModuleNameAction
{
    use QueueableAction;

    /**
<<<<<<< HEAD
     * Execute the action.
=======
     * Ottiene tutti i modelli di un modulo specifico.
     *
     * @param string $moduleName Nome del modulo
     *
     * @return array<string, class-string> Array di modelli del modulo
>>>>>>> 823c958 (.)
     */
    public function execute(string $moduleName): array
    {
        $mod = Module::find($moduleName);
        if (! $mod instanceof \Nwidart\Modules\Module) {
            return [];
        }

        $mod_path = $mod->getPath() . '/Models';
        $mod_path = str_replace(['\\', '/'], [\DIRECTORY_SEPARATOR, \DIRECTORY_SEPARATOR], $mod_path);

        $files = File::files($mod_path);
        $data = [];
        $ns = 'Modules\\' . $mod->getName() . '\\Models';
<<<<<<< HEAD
=======

>>>>>>> 823c958 (.)
        // con la barra davanti non va il search ?
        foreach ($files as $file) {
            $filename = $file->getRelativePathname();
            $ext = '.php';
<<<<<<< HEAD
            // dddx(['ext' => $file->getExtension(), get_class_methods($file)]);
            if (Str::endsWith($filename, $ext)) {
                $tmp = new \stdClass();
                $name = mb_substr($filename, 0, -mb_strlen($ext));
                // dddx(['name' => $name, 'name1' => $file->getFilenameWithoutExtension()]);
=======

            if (Str::endsWith($filename, $ext)) {
                $tmp = new \stdClass();
                $name = mb_substr($filename, 0, -mb_strlen($ext));

>>>>>>> 823c958 (.)
                /**
                 * @var class-string
                 */
                $class = $ns . '\\' . $name;
<<<<<<< HEAD
                //if ($tmp !== null) {
                $tmp->class = $class;
                $name = Str::snake($name);
                $tmp->name = $name;
                //}
                // 434    Parameter #1 $argument of class ReflectionClass constructor expects class-string<T of object>|T of object, string given.
=======

                $tmp->class = $class;
                $name = Str::snake($name);
                $tmp->name = $name;

                // 434 Parameter #1 $argument of class ReflectionClass constructor expects class-string<T of object>|T of object, string given.
>>>>>>> 823c958 (.)
                try {
                    $reflection_class = new \ReflectionClass($tmp->class);
                    if (! $reflection_class->isAbstract()) {
                        $data[$tmp->name] = $tmp->class;
                    }
                } catch (\Exception) {
<<<<<<< HEAD
=======
                    // Ignoriamo le classi che non possono essere riflesse
>>>>>>> 823c958 (.)
                }
            }
        }

        return $data;
    }
}
