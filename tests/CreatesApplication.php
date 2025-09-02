<?php

declare(strict_types=1);

namespace Modules\Xot\Tests;

use Illuminate\Contracts\Console\Kernel;
use Illuminate\Foundation\Application;

trait CreatesApplication
{
    /**
     * Creates the application.
     */
    public function createApplication(): Application
    {
        $app = require __DIR__.'/../../../bootstrap/app.php';

<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> f2e87c3 (.)
        // Laravel 11+ compatibility - ensure proper bootstrapping
        $app->make(Kernel::class)->bootstrap();
        
        // Ensure database connections are properly set up for testing
        if ($app->environment('testing')) {
            $app->useEnvironmentPath($app->basePath());
            $app->loadEnvironmentFrom('.env.testing');
        }
<<<<<<< HEAD
=======
        $app->make(Kernel::class)->bootstrap();
>>>>>>> 575cf7a3 (.)
=======
>>>>>>> f2e87c3 (.)

        return $app;
    }
}
