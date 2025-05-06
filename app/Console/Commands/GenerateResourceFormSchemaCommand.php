<?php

declare(strict_types=1);

namespace Modules\Xot\Console\Commands;

use Illuminate\Console\Command;
<<<<<<< HEAD
use Illuminate\Support\Str;
use Modules\Xot\Services\FileService;
use Webmozart\Assert\Assert;

/**
 * Comando per generare automaticamente lo schema del form per le risorse Filament.
 */
class GenerateResourceFormSchemaCommand extends Command
{
    /**
     * Il nome e la firma del comando.
     *
     * @var string
     */
    protected $signature = 'xot:generate-resource-form-schema {resource} {--model=} {--module=}';

    /**
     * La descrizione del comando.
     *
     * @var string
     */
    protected $description = 'Genera automaticamente lo schema del form per una risorsa Filament basato sul modello associato';

    /**
     * Esegue il comando.
     */
    public function handle(): int
    {
        $resourceName = $this->argument('resource');
        $module = $this->option('module');
        $modelName = $this->option('model') ?: Str::singular($resourceName);

        Assert::string($resourceName, 'Il nome della risorsa deve essere una stringa');
        Assert::string($modelName, 'Il nome del modello deve essere una stringa');

        $this->info("Generazione schema form per la risorsa [{$resourceName}] basato sul modello [{$modelName}]");
=======
use Illuminate\Support\Facades\File;
use Safe\Exceptions\FilesystemException;
use Safe\Exceptions\PcreException;
use function Safe\file_get_contents;
use function Safe\file_put_contents;
use function Safe\glob;
use function Safe\preg_match;
use function Safe\preg_replace;

/**
 * Class GenerateResourceFormSchemaCommand.
 */
class GenerateResourceFormSchemaCommand extends Command
{
    protected $signature = 'resource:generate-form-schema {--module=} {--resource=}';

    protected $description = 'Generate form schema for Filament resources';

    /**
     * Execute the console command.
     *
     * @throws FilesystemException
     * @throws PcreException
     */
    public function handle(): void
    {
        $module = $this->option('module');
        $resource = $this->option('resource');
>>>>>>> 9746d62 (.)

        $pattern = $module
            ? base_path("Modules/{$module}/app/Filament/Resources/*Resource.php")
            : base_path('app/Filament/Resources/*Resource.php');

        $resourceFiles = glob($pattern);
<<<<<<< HEAD
        Assert::isArray($resourceFiles);

        foreach ($resourceFiles as $file) {
            if ($resourceName && ! str_contains($file, $resourceName)) {
=======

        foreach ($resourceFiles as $file) {
            if ($resource && ! str_contains($file, $resource)) {
>>>>>>> 9746d62 (.)
                continue;
            }

            $content = file_get_contents($file);
<<<<<<< HEAD
            Assert::string($content);

            if (! $this->needsFormSchema($content)) {
                $this->info("Schema form già esistente per il file: {$file}");
                continue;
            }

            $this->generateFormSchema($file, $content, $modelName);
            $this->info("Schema form generato per: {$file}");
        }

        return Command::SUCCESS;
    }

    /**
     * Verifica se la risorsa necessita di uno schema form.
     */
    private function needsFormSchema(string $content): bool
    {
        return ! str_contains($content, 'public static function form(Form $form)');
    }

    /**
     * Genera lo schema del form per una risorsa.
     */
    private function generateFormSchema(string $file, string $content, string $modelName): void
    {
=======
            preg_match('/namespace\s+([\w\\\\]+);/', $content, $namespaceMatch);
            preg_match('/class\s+(\w+)\s+extends\s+XotBaseResource/', $content, $classMatch);

            if (! isset($namespaceMatch[1]) || ! isset($classMatch[1])) {
                $this->warn("Skipping {$file}: Invalid file format");
                continue;
            }

            $className = $classMatch[1];
            $namespace = $namespaceMatch[1];
            $fullClassName = $namespace.'\\'.$className;

            if (! $this->needsFormSchema($content)) {
                $this->info("Skipping {$className}: Form schema already exists");
                continue;
            }

            $this->generateFormSchema($file, $content, $className);
            $this->info("Generated form schema for {$className}");
        }
    }

    /**
     * Check if the resource needs a form schema.
     */
    protected function needsFormSchema(string $content): bool
    {
        return ! str_contains($content, 'public static function getFormSchema()');
    }

    /**
     * Generate form schema for a resource.
     *
     * @throws FilesystemException
     * @throws PcreException
     */
    protected function generateFormSchema(string $file, string $content, string $className): void
    {
        $modelName = str_replace('Resource', '', $className);
>>>>>>> 9746d62 (.)
        $schemaMethod = $this->getFormSchemaTemplate($modelName);

        $modifiedContent = preg_replace(
            '/}(\s*)$/',
<<<<<<< HEAD
            $schemaMethod . '}$1',
            $content
        );

        Assert::string($modifiedContent);
=======
            $schemaMethod.'}$1',
            $content
        );

>>>>>>> 9746d62 (.)
        file_put_contents($file, $modifiedContent);
    }

    /**
<<<<<<< HEAD
     * Ottiene il template dello schema form.
     */
    private function getFormSchemaTemplate(string $modelName): string
    {
        $variableName = Str::camel($modelName);
=======
     * Get the form schema template.
     */
    protected function getFormSchemaTemplate(string $modelName): string
    {
        $variableName = lcfirst($modelName);
>>>>>>> 9746d62 (.)

        return <<<PHP

    /**
<<<<<<< HEAD
     * Definisce il form della risorsa.
     */
    public static function form(Form \$form): Form
    {
        return \$form
            ->schema([
                Forms\Components\TextInput::make('{$variableName}_name')
                    ->label(trans('{$variableName}.fields.name'))
                    ->required()
                    ->maxLength(255),

                Forms\Components\Textarea::make('{$variableName}_description')
                    ->label(trans('{$variableName}.fields.description'))
                    ->maxLength(65535),

                Forms\Components\Toggle::make('is_active')
                    ->label(trans('common.fields.is_active'))
                    ->default(true),

                Forms\Components\DateTimePicker::make('published_at')
                    ->label(trans('common.fields.published_at')),
            ]);
    }
=======
     * Get the form schema for the resource.
     *
     * @return array<string, Forms\Components\Component>
     */
    public static function getFormSchema(): array
    {
        return [
            '{$variableName}_name' => Forms\Components\TextInput::make('{$variableName}_name')
                ->required()
                ->maxLength(255),
            '{$variableName}_description' => Forms\Components\Textarea::make('{$variableName}_description')
                ->maxLength(65535),
            '{$variableName}_status' => Forms\Components\Toggle::make('{$variableName}_status')
                ->default(true),
        ];
    }

>>>>>>> 9746d62 (.)
PHP;
    }
}
