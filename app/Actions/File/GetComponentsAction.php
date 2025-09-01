<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\File;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Modules\Xot\Datas\ComponentFileData;
<<<<<<< HEAD
<<<<<<< HEAD
=======

use function Safe\json_decode;

>>>>>>> e697a77b (.)
=======

use function Safe\json_decode;

>>>>>>> 89d0c8f4 (.)
use Spatie\LaravelData\DataCollection;
use Spatie\QueueableAction\QueueableAction;
use Webmozart\Assert\Assert;

<<<<<<< HEAD
<<<<<<< HEAD
use function Safe\json_decode;

=======
>>>>>>> e697a77b (.)
=======
>>>>>>> 89d0c8f4 (.)
class GetComponentsAction
{
    use QueueableAction;

    /**
     * Undocumented function.
     *
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
<<<<<<< HEAD
<<<<<<< HEAD

=======
        
>>>>>>> e697a77b (.)
=======
        
>>>>>>> 89d0c8f4 (.)
        if ($exists && ! $force_recreate) {
            Assert::string($content = File::get($components_json), '['.__LINE__.']['.class_basename(static::class).']');
            $comps = json_decode($content, false);
            if (! is_array($comps)) {
                $comps = [];
            }
<<<<<<< HEAD
<<<<<<< HEAD

=======
>>>>>>> 89d0c8f4 (.)
            return ComponentFileData::collection($comps);
        }
        

        $files = File::allFiles($path);
        $comps = [];
        
        foreach ($files as $file) {
<<<<<<< HEAD
            if ($file->getExtension() !== 'php') {
=======
            return ComponentFileData::collection($comps);
        }
        

        $files = File::allFiles($path);
        $comps = [];
        
        foreach ($files as $file) {
            if ('php' !== $file->getExtension()) {
>>>>>>> e697a77b (.)
=======
            if ('php' !== $file->getExtension()) {
>>>>>>> 89d0c8f4 (.)
                continue;
            }

            $class_name = $file->getFilenameWithoutExtension();
            $relative_path = $file->getRelativePath();
            Assert::string($relative_path = Str::replace('/', '\\', $relative_path), '['.__LINE__.']['.class_basename(static::class).']');

            $comp_name = Str::slug(Str::snake(Str::replace('\\', ' ', $class_name)));
<<<<<<< HEAD
<<<<<<< HEAD
            $comp_name = $prefix.$comp_name;
            $comp_ns = $namespace.'\\'.$class_name;

            if ($relative_path !== '') {
=======
            $comp_name = $prefix . $comp_name;
            $comp_ns = $namespace . '\\' . $class_name;

            if ('' !== $relative_path) {
>>>>>>> e697a77b (.)
=======
            $comp_name = $prefix . $comp_name;
            $comp_ns = $namespace . '\\' . $class_name;

            if ('' !== $relative_path) {
>>>>>>> 89d0c8f4 (.)
                $comp_name = '';
                $piece = collect(explode('\\', $relative_path))
                    ->map(fn ($item) => Str::slug(Str::snake($item)))
                    ->implode('.');
<<<<<<< HEAD
<<<<<<< HEAD

                $comp_name = $prefix.$piece.'.'.Str::slug(Str::snake(Str::replace('\\', ' ', $class_name)));
                $comp_ns = $namespace.'\\'.$relative_path.'\\'.$class_name;
                $class_name = $relative_path.'\\'.$class_name;
=======
                
                $comp_name = $prefix . $piece . '.' . Str::slug(Str::snake(Str::replace('\\', ' ', $class_name)));
                $comp_ns = $namespace . '\\' . $relative_path . '\\' . $class_name;
                $class_name = $relative_path . '\\' . $class_name;
>>>>>>> 89d0c8f4 (.)
            }

            try {
                if (!class_exists($comp_ns)) {
                    throw new \Exception("La classe {$comp_ns} non esiste");
                }
<<<<<<< HEAD

=======
                
                $comp_name = $prefix . $piece . '.' . Str::slug(Str::snake(Str::replace('\\', ' ', $class_name)));
                $comp_ns = $namespace . '\\' . $relative_path . '\\' . $class_name;
                $class_name = $relative_path . '\\' . $class_name;
            }

            try {
                if (!class_exists($comp_ns)) {
                    throw new \Exception("La classe {$comp_ns} non esiste");
                }
                
>>>>>>> e697a77b (.)
=======
                
>>>>>>> 89d0c8f4 (.)
                /** @var class-string<object> $comp_ns */
                $reflection = new \ReflectionClass($comp_ns);
                if ($reflection->isAbstract()) {
                    continue;
                }
<<<<<<< HEAD
<<<<<<< HEAD

=======
                
>>>>>>> e697a77b (.)
=======
                
>>>>>>> 89d0c8f4 (.)
                $comps[] = ComponentFileData::from([
                    'name' => $comp_name,
                    'class' => $class_name,
                    'ns' => $comp_ns,
                ])->toArray();
<<<<<<< HEAD
<<<<<<< HEAD

=======
                
>>>>>>> e697a77b (.)
=======
                
>>>>>>> 89d0c8f4 (.)
            } catch (\Exception $e) {
                /*
                dddx([
                    'comp_name' => $comp_name,
                    'class_name' => $class_name,
                    'comp_ns' => $comp_ns,
                    'path' => $path,
                    'namespace' => $namespace,
                    'prefix' => $prefix,
                    'message' => $e->getMessage(),
                ]);
                */
                throw $e;
            }
        }

        $content = \Safe\json_encode($comps, JSON_THROW_ON_ERROR);
        $old_content = File::exists($components_json) ? File::get($components_json) : '';

        if ($old_content !== $content) {
            File::put($components_json, $content);
        }

        return ComponentFileData::collection($comps);
    }
}
