<?php

/**
<<<<<<< HEAD
 * Azione per ottenere tutti i modelli di un determinato modulo.
=======
 * @see https://github.com/protonemedia/laravel-ffmpeg
>>>>>>> 9746d62 (.)
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
     * Ottiene tutti i modelli di un modulo specifico.
     *
     * @param string $moduleName Nome del modulo
     *
     * @return array<string, class-string> Array di modelli del modulo
=======
     * Execute the action.
>>>>>>> 9746d62 (.)
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
>>>>>>> 9746d62 (.)
        // con la barra davanti non va il search ?
        foreach ($files as $file) {
            $filename = $file->getRelativePathname();
            $ext = '.php';
<<<<<<< HEAD

            if (Str::endsWith($filename, $ext)) {
                $tmp = new \stdClass();
                $name = mb_substr($filename, 0, -mb_strlen($ext));

=======
            // dddx(['ext' => $file->getExtension(), get_class_methods($file)]);
            if (Str::endsWith($filename, $ext)) {
                $tmp = new \stdClass();
                $name = mb_substr($filename, 0, -mb_strlen($ext));
                // dddx(['name' => $name, 'name1' => $file->getFilenameWithoutExtension()]);
>>>>>>> 9746d62 (.)
                /**
                 * @var class-string
                 */
                $class = $ns . '\\' . $name;
<<<<<<< HEAD

                $tmp->class = $class;
                $name = Str::snake($name);
                $tmp->name = $name;

                // 434 Parameter #1 $argument of class ReflectionClass constructor expects class-string<T of object>|T of object, string given.
=======
                //if ($tmp !== null) {
                $tmp->class = $class;
                $name = Str::snake($name);
                $tmp->name = $name;
                //}
                // 434    Parameter #1 $argument of class ReflectionClass constructor expects class-string<T of object>|T of object, string given.
>>>>>>> 9746d62 (.)
                try {
                    $reflection_class = new \ReflectionClass($tmp->class);
                    if (! $reflection_class->isAbstract()) {
                        $data[$tmp->name] = $tmp->class;
                    }
                } catch (\Exception) {
<<<<<<< HEAD
                    // Ignoriamo le classi che non possono essere riflesse
=======
>>>>>>> 9746d62 (.)
                }
            }
        }

        return $data;
    }
}
