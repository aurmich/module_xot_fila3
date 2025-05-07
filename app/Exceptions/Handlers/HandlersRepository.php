<?php

declare(strict_types=1);

namespace Modules\Xot\Exceptions\Handlers;

/**
<<<<<<< HEAD
<<<<<<< HEAD
 * The handlers repository.
=======
<<<<<<< HEAD
 * Repository per la gestione dei handler delle eccezioni.
=======
 * The handlers repository.
>>>>>>> origin/dev
>>>>>>> 3268b83 (.)
=======
 * Repository per la gestione dei handler delle eccezioni.
>>>>>>> 355a587 (.)
 */
class HandlersRepository
{
    /**
<<<<<<< HEAD
<<<<<<< HEAD
     * The custom handlers reporting exceptions.
=======
<<<<<<< HEAD
     * Handler personalizzati per il reporting delle eccezioni.
     *
     * @var array<int, callable>
=======
     * The custom handlers reporting exceptions.
>>>>>>> origin/dev
>>>>>>> 3268b83 (.)
=======
     * Handler personalizzati per il reporting delle eccezioni.
     *
     * @var array<int, callable>
>>>>>>> 355a587 (.)
     */
    protected array $reporters = [];

    /**
<<<<<<< HEAD
<<<<<<< HEAD
     * The custom handlers rendering exceptions.
=======
<<<<<<< HEAD
     * Handler personalizzati per il rendering delle eccezioni HTTP.
     *
     * @var array<int, callable>
=======
     * The custom handlers rendering exceptions.
>>>>>>> origin/dev
>>>>>>> 3268b83 (.)
=======
     * Handler personalizzati per il rendering delle eccezioni HTTP.
     *
     * @var array<int, callable>
>>>>>>> 355a587 (.)
     */
    protected array $renderers = [];

    /**
<<<<<<< HEAD
<<<<<<< HEAD
     * The custom handlers rendering exceptions in console.
=======
<<<<<<< HEAD
     * Handler personalizzati per il rendering delle eccezioni in console.
     *
     * @var array<int, callable>
=======
     * The custom handlers rendering exceptions in console.
>>>>>>> origin/dev
>>>>>>> 3268b83 (.)
=======
     * Handler personalizzati per il rendering delle eccezioni in console.
     *
     * @var array<int, callable>
>>>>>>> 355a587 (.)
     */
    protected array $consoleRenderers = [];

    /**
<<<<<<< HEAD
<<<<<<< HEAD
     * Register a custom handler to report exceptions.
=======
     * Registra un handler personalizzato per il reporting delle eccezioni.
>>>>>>> 355a587 (.)
     */
    public function addReporter(callable $reporter): int
    {
        return array_unshift($this->reporters, $reporter);
    }

    /**
     * Register a custom handler to render exceptions.
     */
    public function addRenderer(callable $renderer): int
    {
        return array_unshift($this->renderers, $renderer);
    }

    /**
     * Register a custom handler to render exceptions in console.
     */
    public function addConsoleRenderer(callable $renderer): int
    {
        return array_unshift($this->consoleRenderers, $renderer);
    }

    /**
=======
<<<<<<< HEAD
     * Registra un handler personalizzato per il reporting delle eccezioni.
=======
     * Register a custom handler to report exceptions.
>>>>>>> origin/dev
     */
    public function addReporter(callable $reporter): int
    {
        array_unshift($this->reporters, $reporter);
        return count($this->reporters);
    }

    /**
<<<<<<< HEAD
<<<<<<< HEAD
     * Registra un handler personalizzato per il rendering delle eccezioni HTTP.
=======
     * Register a custom handler to render exceptions.
>>>>>>> origin/dev
=======
     * Registra un handler personalizzato per il rendering delle eccezioni HTTP.
>>>>>>> 355a587 (.)
     */
    public function addRenderer(callable $renderer): int
    {
        array_unshift($this->renderers, $renderer);
        return count($this->renderers);
    }

    /**
<<<<<<< HEAD
<<<<<<< HEAD
     * Registra un handler personalizzato per il rendering delle eccezioni in console.
=======
     * Register a custom handler to render exceptions in console.
>>>>>>> origin/dev
=======
     * Registra un handler personalizzato per il rendering delle eccezioni in console.
>>>>>>> 355a587 (.)
     */
    public function addConsoleRenderer(callable $renderer): int
    {
        array_unshift($this->consoleRenderers, $renderer);
        return count($this->consoleRenderers);
    }

    /**
<<<<<<< HEAD
<<<<<<< HEAD
     * Recupera tutti i reporter che possono gestire l'eccezione data.
     *
     * @return array<int, callable>
     */
    public function getReportersByException(\Throwable $e): array
    {
        return array_filter($this->reporters, fn (callable $handler) => $this->handlesException($handler, $e));
    }

    /**
     * Recupera tutti i renderer HTTP che possono gestire l'eccezione data.
     *
     * @return array<int, callable>
     */
    public function getRenderersByException(\Throwable $e): array
    {
        return array_filter($this->renderers, fn (callable $handler) => $this->handlesException($handler, $e));
    }

    /**
     * Recupera tutti i renderer console che possono gestire l'eccezione data.
     *
     * @return array<int, callable>
     */
    public function getConsoleRenderersByException(\Throwable $e): array
    {
        return array_filter($this->consoleRenderers, fn (callable $handler) => $this->handlesException($handler, $e));
    }

    /**
     * Determina se il handler dato può gestire l'eccezione fornita.
     */
    protected function handlesException(callable $handler, \Throwable $e): bool
    {
        try {
            $reflection = $handler instanceof \Closure
                ? new \ReflectionFunction($handler)
                : new \ReflectionFunction(\Closure::fromCallable($handler));

            $params = $reflection->getParameters();
            if (empty($params)) {
                return false;
            }

            $firstParam = $params[0];
            if (!$firstParam->hasType()) {
                return true;
            }

            $type = $firstParam->getType();
            if (!$type instanceof \ReflectionNamedType || $type->isBuiltin()) {
                return true;
            }

            return is_a($e, $type->getName(), true);
        } catch (\ReflectionException $e) {
            return false;
        }
=======
>>>>>>> 3268b83 (.)
     * Retrieve all reporters handling the given exception.
=======
     * Recupera tutti i reporter che possono gestire l'eccezione data.
     *
     * @return array<int, callable>
>>>>>>> 355a587 (.)
     */
    public function getReportersByException(\Throwable $e): array
    {
        return array_filter($this->reporters, fn (callable $handler) => $this->handlesException($handler, $e));
    }

    /**
     * Recupera tutti i renderer HTTP che possono gestire l'eccezione data.
     *
     * @return array<int, callable>
     */
    public function getRenderersByException(\Throwable $e): array
    {
        return array_filter($this->renderers, fn (callable $handler) => $this->handlesException($handler, $e));
    }

    /**
     * Recupera tutti i renderer console che possono gestire l'eccezione data.
     *
     * @return array<int, callable>
     */
    public function getConsoleRenderersByException(\Throwable $e): array
    {
        return array_filter($this->consoleRenderers, fn (callable $handler) => $this->handlesException($handler, $e));
    }

    /**
     * Determina se il handler dato può gestire l'eccezione fornita.
     */
    protected function handlesException(callable $handler, \Throwable $e): bool
    {
        try {
            $reflection = $handler instanceof \Closure
                ? new \ReflectionFunction($handler)
                : new \ReflectionFunction(\Closure::fromCallable($handler));

<<<<<<< HEAD
<<<<<<< HEAD
        if (! $params = $reflection->getParameters()) {
            return false;
        }

        return $params[0]->getClass() instanceof \ReflectionClass ? $params[0]->getClass()->isInstance($e) : true;
=======
        $params = $reflection->getParameters();
        if (empty($params)) {
            return false;
        }

        if (!isset($params[0]) || !$params[0]->hasType()) {
            return true;
        }

        $type = $params[0]->getType();
        if (!$type instanceof \ReflectionNamedType || $type->isBuiltin()) {
            return true;
        }

        return is_a($e, $type->getName(), true);
>>>>>>> origin/dev
>>>>>>> 3268b83 (.)
=======
            $params = $reflection->getParameters();
            if (empty($params)) {
                return false;
            }

            $firstParam = $params[0];
            if (!$firstParam->hasType()) {
                return true;
            }

            $type = $firstParam->getType();
            if (!$type instanceof \ReflectionNamedType || $type->isBuiltin()) {
                return true;
            }

            return is_a($e, $type->getName(), true);
        } catch (\ReflectionException $e) {
            return false;
        }
>>>>>>> 355a587 (.)
    }
}
