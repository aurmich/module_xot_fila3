<?php

/**
<<<<<<< HEAD
 * @see https://github.com/protonemedia/laravel-ffmpeg
=======
<<<<<<< HEAD
 * @see https://github.com/protonemedia/laravel-ffmpeg
=======
 * Azione per ottenere tutti i modelli di un determinato modulo.
>>>>>>> origin/dev
>>>>>>> 3268b83 (.)
 */

declare(strict_types=1);

namespace Modules\Xot\Actions\Model;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Nwidart\Modules\Facades\Module;
use ReflectionClass;
use Spatie\QueueableAction\QueueableAction;
<<<<<<< HEAD
=======
<<<<<<< HEAD
use Webmozart\Assert\Assert;
=======
>>>>>>> origin/dev
>>>>>>> 3268b83 (.)

class GetAllModelsByModuleNameAction
{
    use QueueableAction;

    /**
<<<<<<< HEAD
     * Execute the action.
     */
    public function execute(string $moduleName): array
    {
=======
<<<<<<< HEAD
     * Recupera tutti i modelli presenti in un modulo specifico.
     *
     * @param string $moduleName Nome del modulo da cui recuperare i modelli
     * @return array<string, class-string> Array associativo di nomi modello => classi
     */
    public function execute(string $moduleName): array
    {
        Assert::stringNotEmpty($moduleName, 'Il nome del modulo non può essere vuoto');
        
=======
     * Ottiene tutti i modelli di un modulo specifico.
     *
     * @param string $moduleName Nome del modulo
     *
     * @return array<string, class-string> Array di modelli del modulo
     */
    public function execute(string $moduleName): array
    {
>>>>>>> origin/dev
>>>>>>> 3268b83 (.)
        $mod = Module::find($moduleName);
        if (! $mod instanceof \Nwidart\Modules\Module) {
            return [];
        }

<<<<<<< HEAD
=======
<<<<<<< HEAD
        $modPath = $mod->getPath() . '/Models';
        $modPath = str_replace(['\\', '/'], [\DIRECTORY_SEPARATOR, \DIRECTORY_SEPARATOR], $modPath);

        if (!File::exists($modPath)) {
            return [];
        }

        $files = File::files($modPath);
        $data = [];
        $ns = 'Modules\\' . $mod->getName() . '\\Models';

        foreach ($files as $file) {
            $filename = $file->getRelativePathname();
            if (!Str::endsWith($filename, '.php')) {
                continue;
            }

            $name = $file->getFilenameWithoutExtension();
            $class = $ns . '\\' . $name;

            try {
                $reflectionClass = new ReflectionClass($class);
                if (!$reflectionClass->isAbstract()) {
                    $data[Str::snake($name)] = $class;
                }
            } catch (\ReflectionException) {
                // Ignora le classi che non possono essere riflesse
                continue;
=======
>>>>>>> 3268b83 (.)
        $mod_path = $mod->getPath() . '/Models';
        $mod_path = str_replace(['\\', '/'], [\DIRECTORY_SEPARATOR, \DIRECTORY_SEPARATOR], $mod_path);

        $files = File::files($mod_path);
        $data = [];
        $ns = 'Modules\\' . $mod->getName() . '\\Models';
<<<<<<< HEAD
=======

>>>>>>> 3268b83 (.)
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

>>>>>>> 3268b83 (.)
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
>>>>>>> 3268b83 (.)
                try {
                    $reflection_class = new \ReflectionClass($tmp->class);
                    if (! $reflection_class->isAbstract()) {
                        $data[$tmp->name] = $tmp->class;
                    }
                } catch (\Exception) {
<<<<<<< HEAD
                }
=======
                    // Ignoriamo le classi che non possono essere riflesse
                }
>>>>>>> origin/dev
>>>>>>> 3268b83 (.)
            }
        }

        return $data;
    }
}
