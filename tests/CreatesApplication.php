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
        // Laravel 11+ compatibility - ensure proper bootstrapping
        $app->make(Kernel::class)->bootstrap();
        
        // Ensure database connections are properly set up for testing
        if ($app->environment('testing')) {
            $app->useEnvironmentPath($app->basePath());
            $app->loadEnvironmentFrom('.env.testing');
        }
=======
        $app->make(Kernel::class)->bootstrap();
>>>>>>> e697a77b (.)
=======
        $app->make(Kernel::class)->bootstrap();
>>>>>>> 89d0c8f4 (.)

        return $app;
    }
}
