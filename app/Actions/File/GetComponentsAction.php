<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\File;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Modules\Xot\Datas\ComponentFileData;
<<<<<<< HEAD

use function Safe\json_decode;

=======
<<<<<<< HEAD

use function Safe\json_decode;

=======
>>>>>>> origin/dev
>>>>>>> 3268b83 (.)
use Spatie\LaravelData\DataCollection;
use Spatie\QueueableAction\QueueableAction;
use Webmozart\Assert\Assert;

/**
 * Azione per recuperare i componenti da un percorso specificato.
 */
class GetComponentsAction
{
    use QueueableAction;

    /**
     * Recupera i componenti da un percorso specificato.
     *
     * @param string $path Percorso da cui recuperare i componenti
     * @param string $namespace Namespace dei componenti
     * @param string $prefix Prefisso da applicare ai nomi dei componenti
     * @param bool $force_recreate Se forzare la ricreazione del file _components.json
     * @return DataCollection<ComponentFileData>
     */
    public function execute(string $path, string $namespace, string $prefix, bool $force_recreate = false): DataCollection
    {
        Assert::string($namespace = Str::replace('/', '\\', $namespace), '['.__LINE__.']['.class_basename(static::class).']');
        $components_json = $path.'/_components.json';
        $components_json = app(FixPathAction::class)->execute($components_json);

        $path = app(FixPathAction::class)->execute($path);

        if (! File::exists($path)) {
            if (Str::startsWith($path, base_path('Modules'))) {
                File::makeDirectory($path, 0755, true, true);
            }
        }

        $exists = File::exists($components_json);
        if ($exists && ! $force_recreate) {
            Assert::string($content = File::get($components_json), '['.__LINE__.']['.class_basename(static::class).']');
<<<<<<< HEAD
            $comps = json_decode($content, false);
=======
<<<<<<< HEAD
            $comps = json_decode($content, false);
=======
            try {
                $comps = json_decode($content, true, 512, JSON_THROW_ON_ERROR);
<<<<<<< HEAD
            } catch (\JsonException $e) {
                $comps = [];
            }

>>>>>>> origin/dev
>>>>>>> 3268b83 (.)
            if (! is_array($comps)) {
=======
                if (! is_array($comps)) {
                    $comps = [];
                }
            } catch (\JsonException) {
>>>>>>> 355a587 (.)
                $comps = [];
            }
            return ComponentFileData::collection($comps);
        }

        $files = File::allFiles($path);
        $comps = [];
<<<<<<< HEAD
        
=======
<<<<<<< HEAD
        
=======

>>>>>>> origin/dev
>>>>>>> 3268b83 (.)
        foreach ($files as $file) {
            if ('php' !== $file->getExtension()) {
                continue;
            }

            $class_name = $file->getFilenameWithoutExtension();
            $relative_path = $file->getRelativePath();
            Assert::string($relative_path = Str::replace('/', '\\', $relative_path), '['.__LINE__.']['.class_basename(static::class).']');

            $comp_name = Str::slug(Str::snake(Str::replace('\\', ' ', $class_name)));
            $comp_name = $prefix . $comp_name;
            $comp_ns = $namespace . '\\' . $class_name;

            if ('' !== $relative_path) {
                $comp_name = '';
                $piece = collect(explode('\\', $relative_path))
                    ->map(fn ($item) => Str::slug(Str::snake($item)))
                    ->implode('.');
<<<<<<< HEAD
                
=======
<<<<<<< HEAD
                
=======

>>>>>>> origin/dev
>>>>>>> 3268b83 (.)
                $comp_name = $prefix . $piece . '.' . Str::slug(Str::snake(Str::replace('\\', ' ', $class_name)));
                $comp_ns = $namespace . '\\' . $relative_path . '\\' . $class_name;
                $class_name = $relative_path . '\\' . $class_name;
            }

            try {
                if (!class_exists($comp_ns)) {
                    throw new \Exception("La classe {$comp_ns} non esiste");
                }
<<<<<<< HEAD
                
=======
<<<<<<< HEAD
                
=======

>>>>>>> origin/dev
>>>>>>> 3268b83 (.)
                /** @var class-string<object> $comp_ns */
                $reflection = new \ReflectionClass($comp_ns);
                if ($reflection->isAbstract()) {
                    continue;
                }

                $comps[] = ComponentFileData::from([
                    'name' => $comp_name,
                    'class' => $class_name,
                    'ns' => $comp_ns,
                ])->toArray();

            } catch (\Exception $e) {
                dddx([
                    'comp_name' => $comp_name,
                    'class_name' => $class_name,
                    'comp_ns' => $comp_ns,
                    'path' => $path,
                    'namespace' => $namespace,
                    'prefix' => $prefix,
                    'message' => $e->getMessage(),
                ]);
            }
        }

<<<<<<< HEAD
        $content = \Safe\json_encode($comps, JSON_THROW_ON_ERROR);
=======
<<<<<<< HEAD
        $content = \Safe\json_encode($comps, JSON_THROW_ON_ERROR);
=======
        try {
            $content = json_encode($comps, JSON_THROW_ON_ERROR | JSON_PRETTY_PRINT);
            $old_content = File::exists($components_json) ? File::get($components_json) : '';

<<<<<<< HEAD
>>>>>>> origin/dev
>>>>>>> 3268b83 (.)
        $old_content = File::exists($components_json) ? File::get($components_json) : '';

        if ($old_content !== $content) {
            File::put($components_json, $content);
=======
            if ($old_content !== $content) {
                File::put($components_json, $content);
            }
        } catch (\JsonException) {
            // Se la codifica JSON fallisce, restituisci comunque la collezione
>>>>>>> 355a587 (.)
        }

        return ComponentFileData::collection($comps);
    }
}
