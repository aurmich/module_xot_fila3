<?php

declare(strict_types=1);

namespace Modules\Xot\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Modules\Xot\Actions\File\AddStrictTypesDeclarationAction;

class AddStrictTypesDeclarationCommand extends Command
{
    protected $signature = 'xot:add-strict-types 
                            {--module= : Nome del modulo specifico da processare}
                            {--dry-run : Mostra solo i file che verrebbero modificati senza apportare modifiche}';

    protected $description = 'Aggiunge la dichiarazione strict_types=1 ai file PHP che ne sono sprovvisti';

    private array $excludedPaths = [
        'views',
        'config',
        'routes',
        'lang',
        'docs',
        '.php-cs-fixer',
    ];

    public function handle(AddStrictTypesDeclarationAction $action): int
    {
        $modulePath = base_path('Modules');
        $moduleOption = $this->option('module');
        $dryRun = $this->option('dry-run');

<<<<<<< HEAD
        if ($moduleOption) {
            $modulePath .= '/' . $moduleOption;
            if (!File::isDirectory($modulePath)) {
                $this->error("Il modulo {$moduleOption} non esiste");
                return 1;
=======
        // Type-safe handling of module option
        if ($moduleOption !== null) {
            if (is_string($moduleOption)) {
                $moduleOptionStr = $moduleOption;
            } elseif (is_bool($moduleOption)) {
                // Skip boolean options
                $moduleOptionStr = '';
            } elseif (is_array($moduleOption)) {
                // Take first array element if available
                $moduleOptionStr = ! empty($moduleOption) ? (string) reset($moduleOption) : '';
            } else {
                $moduleOptionStr = (string) $moduleOption;
            }

            if ($moduleOptionStr !== '') {
                $modulePath .= '/'.$moduleOptionStr;
                if (! File::isDirectory($modulePath)) {
                    $this->error("Il modulo {$moduleOptionStr} non esiste");

                    return 1;
                }
>>>>>>> 841fcfb (.)
            }
        }

        $files = $this->findPhpFiles($modulePath);
        $count = 0;

        foreach ($files as $file) {
<<<<<<< HEAD
            if ($this->shouldProcessFile($file)) {
                if ($dryRun) {
                    $this->info("Verrebbe processato: {$file}");
                    $count++;
=======
            // Type assertion for file object
            if (! $file instanceof \SplFileInfo) {
                continue;
            }

            if ($this->shouldProcessFile($file)) {
                if ($dryRun) {
                    $filePath = $file->getRealPath();
                    if ($filePath !== false) {
                        $this->info("Verrebbe processato: {$filePath}");
                        $count++;
                    }

>>>>>>> 841fcfb (.)
                    continue;
                }

                try {
                    $path = $file->getRealPath();
                    if ($path === false) {
                        continue;
                    }
<<<<<<< HEAD
                    
=======

>>>>>>> 841fcfb (.)
                    $action->execute($path);
                    $this->info("Aggiunta dichiarazione strict_types a: {$path}");
                    $count++;
                } catch (\Exception $e) {
<<<<<<< HEAD
                    $this->error("Errore nel processare {$path}: " . $e->getMessage());
=======
                    $errorPath = $file->getRealPath() ?: 'unknown path';
                    $this->error("Errore nel processare {$errorPath}: ".$e->getMessage());
>>>>>>> 841fcfb (.)
                }
            }
        }

        $action = $dryRun ? 'Trovati' : 'Processati';
        $this->info("{$action} {$count} file");

        return 0;
    }

<<<<<<< HEAD
=======
    /**
     * @return array<\Symfony\Component\Finder\SplFileInfo>
     */
>>>>>>> 841fcfb (.)
    private function findPhpFiles(string $path): array
    {
        return File::allFiles($path);
    }

    private function shouldProcessFile(\SplFileInfo $file): bool
    {
        // Verifica l'estensione
<<<<<<< HEAD
        if (!str_ends_with($file->getFilename(), '.php')) {
=======
        if (! str_ends_with($file->getFilename(), '.php')) {
>>>>>>> 841fcfb (.)
            return false;
        }

        $path = $file->getRealPath();
        if ($path === false) {
            return false;
        }

        // Verifica se il file è in un percorso escluso
        foreach ($this->excludedPaths as $excludedPath) {
<<<<<<< HEAD
=======
            \Webmozart\Assert\Assert::string($excludedPath, 'Excluded path must be string');
>>>>>>> 841fcfb (.)
            if (str_contains($path, "/{$excludedPath}/")) {
                return false;
            }
        }

        // Verifica se il file ha già la dichiarazione strict_types
        $content = File::get($path);
<<<<<<< HEAD
        return !str_contains($content, 'declare(strict_types=1)');
=======

        return ! str_contains($content, 'declare(strict_types=1)');
>>>>>>> 841fcfb (.)
    }
}
