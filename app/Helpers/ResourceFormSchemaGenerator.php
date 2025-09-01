<?php

declare(strict_types=1);

namespace Modules\Xot\Helpers;

use Illuminate\Support\Str;
use Webmozart\Assert\Assert;

<<<<<<< HEAD
<<<<<<< HEAD
use function Safe\error_log;
use function Safe\file_get_contents;
use function Safe\file_put_contents;
=======
>>>>>>> 89d0c8f4 (.)
use function Safe\glob;
use function Safe\error_log;
use function Safe\preg_match;
use function Safe\preg_replace;
<<<<<<< HEAD
=======
use function Safe\glob;
use function Safe\error_log;
use function Safe\preg_match;
use function Safe\preg_replace;
use function Safe\file_get_contents;
use function Safe\file_put_contents;
>>>>>>> e697a77b (.)
=======
use function Safe\file_get_contents;
use function Safe\file_put_contents;
>>>>>>> 89d0c8f4 (.)

class ResourceFormSchemaGenerator
{
    /**
<<<<<<< HEAD
<<<<<<< HEAD
     * @param  class-string  $resourceClass
=======
     * @param class-string $resourceClass
>>>>>>> e697a77b (.)
=======
     * @param class-string $resourceClass
>>>>>>> 89d0c8f4 (.)
     */
    public static function generateFormSchema(string $resourceClass): bool
    {
        try {
<<<<<<< HEAD
<<<<<<< HEAD
            if (! class_exists($resourceClass)) {
=======
            if (!class_exists($resourceClass)) {
>>>>>>> e697a77b (.)
=======
            if (!class_exists($resourceClass)) {
>>>>>>> 89d0c8f4 (.)
                throw new \RuntimeException("Class {$resourceClass} does not exist");
            }

            $reflection = new \ReflectionClass($resourceClass);
            $filename = $reflection->getFileName();

            if ($filename === false) {
                throw new \RuntimeException("Failed to get filename for class: {$resourceClass}");
            }

            // Read the file contents
            $fileContents = file_get_contents($filename);

            // Check if getFormSchema method already exists
            if (strpos($fileContents, 'public function getFormSchema') !== false) {
                return false;
            }

            // Generate form schema
            $modelName = str_replace('Resource', '', $reflection->getShortName());
            $modelVariable = Str::camel($modelName);

            $formSchemaMethod = "\n    public function getFormSchema(): array\n    {\n        return [\n";
            $formSchemaMethod .= "            Forms\\Components\\TextInput::make('{$modelVariable}_name')\n";
            $formSchemaMethod .= "                ->required(),\n";
            $formSchemaMethod .= "        ];\n    }\n";

            // Insert the method before the last closing brace
            $modifiedContents = preg_replace(
                '/}(\s*)$/',
                $formSchemaMethod.'}$1',
                $fileContents
            );

            // Write back to the file
            file_put_contents($filename, $modifiedContents);

            return true;
        } catch (\Exception $e) {
            error_log("Error generating form schema for {$resourceClass}: ".$e->getMessage());
<<<<<<< HEAD
<<<<<<< HEAD

=======
>>>>>>> e697a77b (.)
=======
>>>>>>> 89d0c8f4 (.)
            return false;
        }
    }

    /**
     * @return array{updated: array<string>, skipped: array<string>}
     */
    public static function generateForAllResources(): array
    {
        $resourceFiles = glob('/var/www/html/base_orisbroker_fila3/laravel/Modules/*/app/Filament/Resources/*Resource.php');

        $results = ['updated' => [], 'skipped' => []];

        foreach ($resourceFiles as $file) {
            try {
                Assert::string($file);
                $content = file_get_contents($file);
                $namespaceMatch = [];
                $classMatch = [];

                if (preg_match('/namespace\s+([\w\\\\\\\\]+);/', $content, $namespaceMatch) &&
                    preg_match('/class\s+(\w+)\s+extends\s+XotBaseResource/', $content, $classMatch) &&
<<<<<<< HEAD
<<<<<<< HEAD
                    ! empty($namespaceMatch[1]) && ! empty($classMatch[1])) {
=======
                    !empty($namespaceMatch[1]) && !empty($classMatch[1])) {
>>>>>>> e697a77b (.)
=======
                    !empty($namespaceMatch[1]) && !empty($classMatch[1])) {
>>>>>>> 89d0c8f4 (.)
                    $fullClassName = $namespaceMatch[1].'\\'.$classMatch[1];

                    if (class_exists($fullClassName)) {
                        /** @var class-string $fullClassName */
                        if (self::generateFormSchema($fullClassName)) {
                            $results['updated'][] = $fullClassName;
                        }
                    }
                }
            } catch (\Exception $e) {
                $results['skipped'][] = is_string($file) ? $file : (string) $file.': '.$e->getMessage();
            }
        }

        return $results;
    }
}
