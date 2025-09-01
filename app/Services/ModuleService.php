<?php

declare(strict_types=1);

namespace Modules\Xot\Services;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Nwidart\Modules\Facades\Module;
<<<<<<< HEAD
<<<<<<< HEAD
=======
use ReflectionClass;
>>>>>>> e697a77b (.)
=======
use ReflectionClass;
>>>>>>> 89d0c8f4 (.)

// ----------- Requests ----------

/**
 * Class ModuleService.
 */
class ModuleService
{
    public string $name;

    private static ?self $_instance = null;

    /**
     * getInstance.
     *
     * this method will return instance of the class
     */
    public static function getInstance(): self
    {
        if (! self::$_instance instanceof self) {
<<<<<<< HEAD
<<<<<<< HEAD
            self::$_instance = new self;
=======
            self::$_instance = new self();
>>>>>>> e697a77b (.)
=======
            self::$_instance = new self();
>>>>>>> 89d0c8f4 (.)
        }

        return self::$_instance;
    }

    /**
     * Undocumented function.
     */
    public static function make(): self
    {
        return static::getInstance();
    }

    /**
     * Undocumented function.
     */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get models for the module.
     *
     * @return array<string, class-string>
     */
    public function getModels(): array
    {
        /*
        if (null == $module) {
            return [];
        }
        */
        $mod = Module::find($this->name);
        if (! $mod instanceof \Nwidart\Modules\Module) {
            return [];
        }

        $mod_path = $mod->getPath().'/Models';
        $mod_path = str_replace(['\\', '/'], [\DIRECTORY_SEPARATOR, \DIRECTORY_SEPARATOR], $mod_path);

        $files = File::files($mod_path);
        $data = [];
        $ns = 'Modules\\'.$mod->getName().'\\Models';  // con la barra davanti non va il search ?
        foreach ($files as $file) {
            $filename = $file->getRelativePathname();
            $ext = '.php';
            // dddx(['ext' => $file->getExtension(), get_class_methods($file)]);
            if (Str::endsWith($filename, $ext)) {
<<<<<<< HEAD
<<<<<<< HEAD
                $tmp = new \stdClass;

                $name = mb_substr($filename, 0, -mb_strlen($ext));

=======
                $tmp = new \stdClass();

                $name = mb_substr($filename, 0, -mb_strlen($ext));

                
>>>>>>> e697a77b (.)
=======
                $tmp = new \stdClass();

                $name = mb_substr($filename, 0, -mb_strlen($ext));

                
>>>>>>> 89d0c8f4 (.)
                /**
                 * @var class-string
                 */
                $class = $ns.'\\'.$name;
<<<<<<< HEAD
<<<<<<< HEAD
                // Strict comparison using === between stdClass and null will always evaluate to false.
=======
                //Strict comparison using === between stdClass and null will always evaluate to false.
>>>>>>> 89d0c8f4 (.)

                //if ($tmp === null) {
                //    continue;
<<<<<<< HEAD
                // }
=======
                //Strict comparison using === between stdClass and null will always evaluate to false.

                //if ($tmp === null) {
                //    continue;
                //}
>>>>>>> e697a77b (.)
=======
                //}
>>>>>>> 89d0c8f4 (.)
                $tmp->class = $class;
                $name = Str::snake($name);
                $tmp->name = $name;

                try {
                    $reflection_class = new \ReflectionClass($tmp->class);
                    if (! $reflection_class->isAbstract()) {
                        $data[$tmp->name] = $tmp->class;
                    }
                } catch (\Exception) {
                    // Ignore reflection errors
                }
            }
        }

        return $data;
    }
}
