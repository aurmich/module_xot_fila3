<?php

namespace Modules\Xot\Services;

use Illuminate\Support\Facades\Config;
use ReflectionClass;
use ReflectionMethod;

class MCPModelServer extends MCPServer
{
    protected string $name = 'model';
    protected array $contexts = [];

    public function __construct(array $config)
    {
        parent::__construct($config);
        $this->loadContexts();
    }

    protected function loadContexts(): void
    {
        $this->contexts = Config::get('mcp.contexts', []);
    }

    public function validate(): bool
    {
        foreach ($this->contexts as $model => $context) {
            if (!$this->validateModel($model)) {
                return false;
            }
        }
        return true;
    }

    protected function validateModel(string $model): bool
    {
        if (!isset($this->contexts[$model])) {
            return false;
        }

        $context = $this->contexts[$model];
        $class = $this->getModelClass($model);

        if (!$class) {
            return false;
        }

        // Validazione trait
        if (isset($context['traits'])) {
            $traits = $class->getTraitNames();
            $missing = array_diff($context['traits'], $traits);
            if (!empty($missing)) {
                return false;
            }
        }

        // Validazione relazioni
        if (isset($context['relationships'])) {
            $methods = $class->getMethods(ReflectionMethod::IS_PUBLIC);
            $relationships = array_map(fn($method) => $method->getName(), $methods);
            $missing = array_diff($context['relationships'], $relationships);
            if (!empty($missing)) {
                return false;
            }
        }

        // Validazione estensioni
        if (isset($context['extends'])) {
            $parent = $class->getParentClass();
<<<<<<< HEAD
            if (!$parent || $parent->getName() !== "Modules\\Patient\\Models\\{$context['extends']}") {
=======
            if (!$parent || $parent->getName() !== "Modules\\<nome progetto>\\Models\\{$context['extends']}") {
>>>>>>> 02d219aa (♻️ (PathHelper.php, AnalyzePerformanceCommand.php, DayOfWeek.php, XotBasePage.php, XotBaseWidget.php, MCPModelServer.php, MCPService.php, XotComposer.php, README.md, structure.md): refactor code and update documentation to replace project-specific names with placeholders for better reusability and clarity across modules. This change enhances maintainability and allows for easier adaptation to different project contexts.)
                return false;
            }
        }

        return true;
    }

    protected function getModelClass(string $model): ?ReflectionClass
    {
<<<<<<< HEAD
        $namespace = "Modules\\Patient\\Models\\{$model}";
=======
        $namespace = "Modules\\<nome progetto>\\Models\\{$model}";
>>>>>>> 02d219aa (♻️ (PathHelper.php, AnalyzePerformanceCommand.php, DayOfWeek.php, XotBasePage.php, XotBaseWidget.php, MCPModelServer.php, MCPService.php, XotComposer.php, README.md, structure.md): refactor code and update documentation to replace project-specific names with placeholders for better reusability and clarity across modules. This change enhances maintainability and allows for easier adaptation to different project contexts.)
        return class_exists($namespace) ? new ReflectionClass($namespace) : null;
    }

    public function getContext(): array
    {
        return [
            'name' => $this->name,
            'contexts' => $this->contexts,
            'validation_rules' => Config::get('mcp.validation', [])
        ];
    }

    public function addContext(string $model, array $context): void
    {
        $this->contexts[$model] = $context;
    }

    public function removeContext(string $model): void
    {
        if (isset($this->contexts[$model])) {
            unset($this->contexts[$model]);
        }
    }
}
