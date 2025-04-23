<?php

declare(strict_types=1);

namespace Modules\Xot\Exceptions\Formatters;

use Illuminate\Support\Facades\Auth;

class WebhookErrorFormatter
{
<<<<<<< HEAD
<<<<<<< HEAD
    public function __construct(
        private readonly \Throwable $exception
    ) {
    }
=======
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> origin/dev
    public function __construct(
        private \Throwable $exception
    ) {}
<<<<<<< HEAD
>>>>>>> e5c56c3 (.)
=======
=======
<<<<<<< HEAD
=======
    public function __construct(
        private \Throwable $exception
    ) {}
>>>>>>> c2dac53 (.)
class WebhookErrorFormatter
{
    public function __construct(
        private readonly \Throwable $exception
    ) {
    }
<<<<<<< HEAD
>>>>>>> 50bb41c (fix: auto resolve conflict)
>>>>>>> d9307de (fix: auto resolve conflict)
=======
>>>>>>> c2dac53 (.)

    /**
     * @return array<string, mixed>
     */
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
=======
=======
>>>>>>> c2dac53 (.)
    public function __construct(private readonly \Throwable $exception)
    {
    }

<<<<<<< HEAD
>>>>>>> origin/dev
>>>>>>> origin/dev
<<<<<<< HEAD
>>>>>>> e5c56c3 (.)
=======
=======
>>>>>>> 50bb41c (fix: auto resolve conflict)
>>>>>>> d9307de (fix: auto resolve conflict)
=======
>>>>>>> c2dac53 (.)
    public function format(): array
    {
        $user = Auth::user();
        $email = $user->email ?? 'CLI User';

        return [
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> origin/dev
<<<<<<< HEAD
>>>>>>> e5c56c3 (.)
=======
=======
>>>>>>> 50bb41c (fix: auto resolve conflict)
>>>>>>> d9307de (fix: auto resolve conflict)
=======
>>>>>>> c2dac53 (.)
            'message' => $this->exception->getMessage(),
            'file' => $this->exception->getFile(),
            'line' => $this->exception->getLine(),
            'trace' => $this->exception->getTraceAsString(),
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
=======
>>>>>>> origin/dev
>>>>>>> origin/dev
<<<<<<< HEAD
>>>>>>> e5c56c3 (.)
=======
=======
>>>>>>> 50bb41c (fix: auto resolve conflict)
>>>>>>> d9307de (fix: auto resolve conflict)
=======
>>>>>>> c2dac53 (.)
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
// use Symfony\Component\HttpFoundation\Request;

class WebhookErrorFormatter
{
    // private Request $request;

    public function __construct(private readonly \Throwable $exception)
    {
        // $this->request = $request;
    }

    public function format(): array
    {
        $user = Auth::user();
        $email = 'CLI User';
        if (null !== $user) {
            $email = $user->email;
        }

        return [
            'exception' => '`'.$this->exception::class.sprintf('` (Code `%s`)', $this->exception->getCode()),
            'thrown_in' => sprintf('`%s`:%d', $this->exception->getFile(), $this->exception->getLine()),
            'user' => sprintf(
                '%d <%s>',
                Auth::id(),
                $email
            ),
            'ip' => request()->ip(),
            // Request::ip();
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
                $this->exception->getPrevious() ? ('`' . get_class($this->exception->getPrevious()) . '`') : 'None'
                $this->exception->getPrevious() ? ('`'.get_class($this->exception->getPrevious()).'`') : 'None'
            ),
            */
        ];
    }
}
