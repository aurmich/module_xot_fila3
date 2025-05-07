<?php

declare(strict_types=1);

namespace Modules\Xot\Exceptions\Formatters;

use Illuminate\Support\Facades\Auth;
<<<<<<< HEAD
=======
<<<<<<< HEAD
use Modules\Xot\Contracts\ErrorFormatterContract;

/**
 * Formattatore per errori da inviare tramite webhook.
 * Implementa le best practices di Laraxot per la gestione degli errori.
 */
class WebhookErrorFormatter implements ErrorFormatterContract
{
    public function __construct(
        private readonly \Throwable $exception
    ) {}

    /**
     * Formatta l'eccezione per l'invio tramite webhook.
     *
=======
>>>>>>> 3268b83 (.)

class WebhookErrorFormatter
{
    public function __construct(
<<<<<<< HEAD
        private \Throwable $exception
    ) {}

    /**
=======
        private readonly \Throwable $exception
    ) {
    }

    /**
>>>>>>> origin/dev
>>>>>>> 3268b83 (.)
     * @return array<string, mixed>
     */
    public function format(): array
    {
        $user = Auth::user();
<<<<<<< HEAD
=======
<<<<<<< HEAD
        $email = $user?->email ?? 'CLI User';

        return [
            'error' => [
                'message' => $this->exception->getMessage(),
                'code' => $this->exception->getCode(),
                'type' => get_class($this->exception),
                'file' => $this->exception->getFile(),
                'line' => $this->exception->getLine(),
                'trace' => $this->exception->getTraceAsString(),
                'context' => [
                    'user' => [
                        'id' => Auth::id() ?? 0,
                        'email' => $email,
                    ],
                    'request' => [
                        'method' => request()->getMethod(),
                        'url' => request()->fullUrl(),
                        'previous_url' => url()->previous(),
                        'ip' => request()->ip(),
                    ],
                ],
                'metadata' => [
                    'thrown_in' => sprintf(
                        '%s:%d',
                        $this->exception->getFile(),
                        $this->exception->getLine()
                    ),
                    'previous_exception' => $this->exception->getPrevious() 
                        ? get_class($this->exception->getPrevious()) 
                        : null,
                ],
            ],
=======
>>>>>>> 3268b83 (.)
        $email = $user->email ?? 'CLI User';

        return [
            'message' => $this->exception->getMessage(),
            'file' => $this->exception->getFile(),
            'line' => $this->exception->getLine(),
            'trace' => $this->exception->getTraceAsString(),
            'exception' => sprintf(
                '`%s` (Code `%s`)',
                get_class($this->exception),
                $this->exception->getCode()
            ),
            'thrown_in' => sprintf(
                '`%s`:%d',
                $this->exception->getFile(),
                $this->exception->getLine()
            ),
            'user' => sprintf('%d <%s>', Auth::id() ?? 0, $email),
            'ip' => request()->ip(),
            'thrown_while_calling' => sprintf(
                '[%s] %s',
                request()->getMethod(),
                request()->fullUrl()
            ),
            'url_previous' => url()->previous(),
            /*
            'exception_details' => sprintf(
                "Trace:\n```json \n %s \n ```\n\n Previous: \n `%s`",
                json_encode($this->exception->getTrace(), JSON_PRETTY_PRINT),
                $this->exception->getPrevious() ? ('`' . get_class($this->exception->getPrevious()) . '`') : 'None'
            ),
            */
<<<<<<< HEAD
=======
>>>>>>> origin/dev
>>>>>>> 3268b83 (.)
        ];
    }
}
