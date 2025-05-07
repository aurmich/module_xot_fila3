<?php

declare(strict_types=1);

namespace Modules\Xot\Exceptions\Handlers;

use Illuminate\Contracts\Debug\ExceptionHandler;
use Symfony\Component\HttpFoundation\Response as SymfonyResponse;

<<<<<<< HEAD
=======
<<<<<<< HEAD
/**
 * Decorator per il gestore delle eccezioni di Laravel.
 * Aggiunge funzionalità di reporting e rendering personalizzate.
 */
=======
>>>>>>> origin/dev
>>>>>>> 3268b83 (.)
class HandlerDecorator implements ExceptionHandler
{
    protected HandlersRepository $repository;

    public function __construct(
        protected ExceptionHandler $defaultHandler,
        HandlersRepository $repository,
    ) {
        $this->repository = $repository;
    }

<<<<<<< HEAD
=======
<<<<<<< HEAD
    /**
     * Gestisce le chiamate a metodi non definiti delegandole al gestore predefinito.
     *
     * @param array<mixed> $parameters
     */
>>>>>>> 3268b83 (.)
    public function __call(string $name, array $parameters): mixed
    {
        /** @var callable */
        $callable = [$this->defaultHandler, $name];

        return \call_user_func_array($callable, $parameters);
    }

<<<<<<< HEAD
=======
    /**
     * Riporta un'eccezione utilizzando i reporter registrati.
     */
=======
    public function __call(string $name, array $parameters): mixed
    {
        return call_user_func_array([$this->defaultHandler, $name], $parameters);
    }

>>>>>>> origin/dev
>>>>>>> 3268b83 (.)
    public function report(\Throwable $e): void
    {
        foreach ($this->repository->getReportersByException($e) as $reporter) {
            if (is_callable($reporter)) {
                $reporter($e);
            }
        }

        $this->defaultHandler->report($e);
    }

<<<<<<< HEAD
=======
<<<<<<< HEAD
    /**
     * Renderizza una risposta per un'eccezione.
     */
=======
>>>>>>> origin/dev
>>>>>>> 3268b83 (.)
    public function render($request, \Throwable $e): SymfonyResponse
    {
        foreach ($this->repository->getRenderersByException($e) as $renderer) {
            if (is_callable($renderer)) {
                $response = $renderer($e, $request);
                if ($response instanceof SymfonyResponse) {
                    return $response;
                }
            }
        }

        return $this->defaultHandler->render($request, $e);
    }

<<<<<<< HEAD
=======
<<<<<<< HEAD
    /**
     * Renderizza un'eccezione per l'output della console.
     */
=======
>>>>>>> origin/dev
>>>>>>> 3268b83 (.)
    public function renderForConsole($output, \Throwable $e): void
    {
        foreach ($this->repository->getConsoleRenderersByException($e) as $renderer) {
            if (is_callable($renderer)) {
                $renderer($e, $output);
            }
        }

        $this->defaultHandler->renderForConsole($output, $e);
    }

<<<<<<< HEAD
=======
<<<<<<< HEAD
    /**
     * Registra un nuovo reporter per le eccezioni.
     */
=======
>>>>>>> origin/dev
>>>>>>> 3268b83 (.)
    public function reporter(callable $reporter): int
    {
        return $this->repository->addReporter($reporter);
    }

<<<<<<< HEAD
=======
<<<<<<< HEAD
    /**
     * Registra un nuovo renderer per le eccezioni.
     */
=======
>>>>>>> origin/dev
>>>>>>> 3268b83 (.)
    public function renderer(callable $renderer): int
    {
        return $this->repository->addRenderer($renderer);
    }

<<<<<<< HEAD
=======
<<<<<<< HEAD
    /**
     * Registra un nuovo renderer per la console.
     */
=======
>>>>>>> origin/dev
>>>>>>> 3268b83 (.)
    public function consoleRenderer(callable $renderer): int
    {
        return $this->repository->addConsoleRenderer($renderer);
    }

<<<<<<< HEAD
=======
<<<<<<< HEAD
    /**
     * Determina se un'eccezione deve essere riportata.
     */
=======
>>>>>>> origin/dev
>>>>>>> 3268b83 (.)
    public function shouldReport(\Throwable $e): bool
    {
        return $this->defaultHandler->shouldReport($e);
    }
}
