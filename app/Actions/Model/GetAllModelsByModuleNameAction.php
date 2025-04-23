<?php

/**
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
 * Azione per ottenere tutti i modelli di un determinato modulo.
=======
 * @see https://github.com/protonemedia/laravel-ffmpeg
>>>>>>> e5c56c3 (.)
=======
=======
>>>>>>> 7b67053 (fix: auto resolve conflict)
=======
>>>>>>> c2dac53 (.)
 * @see https://github.com/protonemedia/laravel-ffmpeg
 * Azione per ottenere tutti i modelli di un determinato modulo.
 * @see https://github.com/protonemedia/laravel-ffmpeg
<<<<<<< HEAD
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
<<<<<<< HEAD
>>>>>>> d9307de (fix: auto resolve conflict)
=======
=======
 * Azione per ottenere tutti i modelli di un determinato modulo.
>>>>>>> 4ab3760 (.)
>>>>>>> 7b67053 (fix: auto resolve conflict)
=======
 * Azione per ottenere tutti i modelli di un determinato modulo.
>>>>>>> c2dac53 (.)
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
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
     * Ottiene tutti i modelli di un modulo specifico.
     *
     * @param string $moduleName Nome del modulo
     *
     * @return array<string, class-string> Array di modelli del modulo
=======
     * Execute the action.
>>>>>>> e5c56c3 (.)
=======
=======
>>>>>>> 7b67053 (fix: auto resolve conflict)
=======
>>>>>>> c2dac53 (.)
     * Execute the action.
     * Ottiene tutti i modelli di un modulo specifico.
     *
     * @param string $moduleName Nome del modulo
     *
     * @return array<string, class-string> Array di modelli del modulo
     * Execute the action.
<<<<<<< HEAD
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
<<<<<<< HEAD
>>>>>>> d9307de (fix: auto resolve conflict)
=======
=======
>>>>>>> 4ab3760 (.)
>>>>>>> 7b67053 (fix: auto resolve conflict)
=======
>>>>>>> c2dac53 (.)
     */
    public function execute(string $moduleName): array
    {
        $mod = Module::find($moduleName);
        if (! $mod instanceof \Nwidart\Modules\Module) {
            return [];
        }

        $mod_path = $mod->getPath() . '/Models';
        $mod_path = $mod->getPath() . '/Models';
<<<<<<< HEAD
=======
<<<<<<< HEAD
        $mod_path = $mod->getPath() . '/Models';
=======
        $mod_path = $mod->getPath().'/Models';
>>>>>>> origin/dev
>>>>>>> origin/dev
<<<<<<< HEAD
>>>>>>> e5c56c3 (.)
=======
=======
        $mod_path = $mod->getPath().'/Models';
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
<<<<<<< HEAD
>>>>>>> d9307de (fix: auto resolve conflict)
=======
=======
>>>>>>> 4ab3760 (.)
>>>>>>> 7b67053 (fix: auto resolve conflict)
=======
        $mod_path = $mod->getPath().'/Models';
        $mod_path = $mod->getPath().'/Models';
>>>>>>> c2dac53 (.)
        $mod_path = str_replace(['\\', '/'], [\DIRECTORY_SEPARATOR, \DIRECTORY_SEPARATOR], $mod_path);

        $files = File::files($mod_path);
        $data = [];
        $ns = 'Modules\\' . $mod->getName() . '\\Models';
<<<<<<< HEAD
<<<<<<< HEAD

=======
<<<<<<< HEAD
        $ns = 'Modules\\' . $mod->getName() . '\\Models';
=======
<<<<<<< HEAD
>>>>>>> d9307de (fix: auto resolve conflict)
=======
<<<<<<< HEAD
=======
>>>>>>> c2dac53 (.)
        $ns = 'Modules\\' . $mod->getName() . '\\Models';
        $ns = 'Modules\\'.$mod->getName().'\\Models';
<<<<<<< HEAD
>>>>>>> origin/dev
>>>>>>> origin/dev
<<<<<<< HEAD
>>>>>>> e5c56c3 (.)
=======
=======
=======
>>>>>>> c2dac53 (.)

        $ns = 'Modules\\'.$mod->getName().'\\Models';
<<<<<<< HEAD
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
<<<<<<< HEAD
>>>>>>> d9307de (fix: auto resolve conflict)
=======
=======
>>>>>>> 4ab3760 (.)
>>>>>>> 7b67053 (fix: auto resolve conflict)
=======
>>>>>>> c2dac53 (.)
        // con la barra davanti non va il search ?
        foreach ($files as $file) {
            $filename = $file->getRelativePathname();
            $ext = '.php';
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
<<<<<<< HEAD
>>>>>>> d9307de (fix: auto resolve conflict)
=======
=======
<<<<<<< HEAD
=======
>>>>>>> 4ab3760 (.)
>>>>>>> 7b67053 (fix: auto resolve conflict)
=======
>>>>>>> c2dac53 (.)

            if (Str::endsWith($filename, $ext)) {
                $tmp = new \stdClass();
                $name = mb_substr($filename, 0, -mb_strlen($ext));

                /**
                 * @var class-string
                 */
                $class = $ns . '\\' . $name;

                $tmp->class = $class;
                $name = Str::snake($name);
                $tmp->name = $name;

                // 434 Parameter #1 $argument of class ReflectionClass constructor expects class-string<T of object>|T of object, string given.
<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
>>>>>>> 50bb41c (fix: auto resolve conflict)
>>>>>>> d9307de (fix: auto resolve conflict)
=======
>>>>>>> c2dac53 (.)
            // dddx(['ext' => $file->getExtension(), get_class_methods($file)]);
            if (Str::endsWith($filename, $ext)) {
                $tmp = new \stdClass();
                $name = mb_substr($filename, 0, -mb_strlen($ext));
                // dddx(['name' => $name, 'name1' => $file->getFilenameWithoutExtension()]);
                /**
                 * @var class-string
                 */
                $class = $ns . '\\' . $name;
                //if ($tmp !== null) {
                $tmp->class = $class;
                $name = Str::snake($name);
                $tmp->name = $name;
                //}
                $class = $ns.'\\'.$name;
                if ($tmp !== null) {
                    $tmp->class = $class;
                    $name = Str::snake($name);
                    $tmp->name = $name;
                }
                // 434    Parameter #1 $argument of class ReflectionClass constructor expects class-string<T of object>|T of object, string given.
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> e5c56c3 (.)
=======
=======
=======
>>>>>>> c2dac53 (.)
                $class = $ns.'\\'.$name;
                $tmp->class = $class;
                $name = Str::snake($name);
                $tmp->name = $name;
                // 434    Parameter #1 $argument of class ReflectionClass constructor expects class-string<T of object>|T of object, string given.
<<<<<<< HEAD
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
<<<<<<< HEAD
>>>>>>> d9307de (fix: auto resolve conflict)
=======
=======
>>>>>>> 4ab3760 (.)
>>>>>>> 7b67053 (fix: auto resolve conflict)
=======
>>>>>>> c2dac53 (.)
                try {
                    $reflection_class = new \ReflectionClass($tmp->class);
                    if (! $reflection_class->isAbstract()) {
                        $data[$tmp->name] = $tmp->class;
                    }
                } catch (\Exception) {
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
                    // Ignoriamo le classi che non possono essere riflesse
=======
>>>>>>> e5c56c3 (.)
=======
=======
>>>>>>> 7b67053 (fix: auto resolve conflict)
=======
<<<<<<< HEAD
                    // Ignoriamo le classi che non possono essere riflesse
=======
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
<<<<<<< HEAD
>>>>>>> d9307de (fix: auto resolve conflict)
=======
=======
                    // Ignoriamo le classi che non possono essere riflesse
>>>>>>> 4ab3760 (.)
>>>>>>> 7b67053 (fix: auto resolve conflict)
=======
                    // Ignoriamo le classi che non possono essere riflesse
                    // Ignoriamo le classi che non possono essere riflesse
>>>>>>> c2dac53 (.)
                }
            }
        }

        return $data;
    }
}
