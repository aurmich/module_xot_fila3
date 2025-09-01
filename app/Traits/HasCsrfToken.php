<?php

declare(strict_types=1);

namespace Modules\Xot\Traits;

<<<<<<< HEAD
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
=======
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\App;
>>>>>>> e697a77b (.)

trait HasCsrfToken
{
    /**
     * CSRF token for the current request.
<<<<<<< HEAD
=======
     *
     * @var string
>>>>>>> e697a77b (.)
     */
    public string $_token;

    /**
     * Mount the component and set the CSRF token.
<<<<<<< HEAD
=======
     *
     * @return void
>>>>>>> e697a77b (.)
     */
    public function mount(): void
    {
        $this->_token = App::make('session')->token();
    }

    /**
     * Get the CSRF token.
<<<<<<< HEAD
=======
     *
     * @return string
>>>>>>> e697a77b (.)
     */
    public function getCsrfToken(): string
    {
        return $this->_token;
    }

    /**
     * Verify if the CSRF token is valid.
<<<<<<< HEAD
=======
     *
     * @return bool
>>>>>>> e697a77b (.)
     */
    public function verifyCsrfToken(): bool
    {
        return Session::token() === $this->_token;
    }
<<<<<<< HEAD
}
=======
} 
>>>>>>> e697a77b (.)
