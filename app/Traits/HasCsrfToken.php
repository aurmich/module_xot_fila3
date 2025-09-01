<?php

declare(strict_types=1);

namespace Modules\Xot\Traits;

<<<<<<< HEAD
<<<<<<< HEAD
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
=======
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\App;
>>>>>>> e697a77b (.)
=======
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\App;
>>>>>>> 89d0c8f4 (.)

trait HasCsrfToken
{
    /**
     * CSRF token for the current request.
<<<<<<< HEAD
<<<<<<< HEAD
=======
     *
     * @var string
>>>>>>> e697a77b (.)
=======
     *
     * @var string
>>>>>>> 89d0c8f4 (.)
     */
    public string $_token;

    /**
     * Mount the component and set the CSRF token.
<<<<<<< HEAD
<<<<<<< HEAD
=======
     *
     * @return void
>>>>>>> e697a77b (.)
=======
     *
     * @return void
>>>>>>> 89d0c8f4 (.)
     */
    public function mount(): void
    {
        $this->_token = App::make('session')->token();
    }

    /**
     * Get the CSRF token.
<<<<<<< HEAD
<<<<<<< HEAD
=======
     *
     * @return string
>>>>>>> e697a77b (.)
=======
     *
     * @return string
>>>>>>> 89d0c8f4 (.)
     */
    public function getCsrfToken(): string
    {
        return $this->_token;
    }

    /**
     * Verify if the CSRF token is valid.
<<<<<<< HEAD
<<<<<<< HEAD
=======
     *
     * @return bool
>>>>>>> e697a77b (.)
=======
     *
     * @return bool
>>>>>>> 89d0c8f4 (.)
     */
    public function verifyCsrfToken(): bool
    {
        return Session::token() === $this->_token;
    }
<<<<<<< HEAD
<<<<<<< HEAD
}
=======
} 
>>>>>>> e697a77b (.)
=======
} 
>>>>>>> 89d0c8f4 (.)
