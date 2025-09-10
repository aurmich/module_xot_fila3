<?php

declare(strict_types=1);

use Modules\Xot\Tests\TestCase;

/*
|--------------------------------------------------------------------------
| Test Case
|--------------------------------------------------------------------------
|
| Il TestCase di default per tutti i test del modulo Xot.
| Estende il TestCase specifico del modulo che fornisce il setup necessario.
|
*/

<<<<<<< HEAD
uses(TestCase::class)->in('Feature', 'Unit');
=======
pest()->extend(TestCase::class)
    ->in('Feature', 'Unit');
>>>>>>> d1a0a6c3 (.)

/*
|--------------------------------------------------------------------------
| Expectations
|--------------------------------------------------------------------------
|
| Qui puoi definire aspettative globali per il modulo Xot.
<<<<<<< HEAD
| Quando definisci here expectation globali, saranno disponibili 
=======
| Quando definisci here expectation globali, saranno disponibili
>>>>>>> d1a0a6c3 (.)
| in tutti i test del modulo.
|
*/

// expect()->extend('toBeOne', function () {
//     return $this->toBe(1);
// });

/*
|--------------------------------------------------------------------------
| Functions
|--------------------------------------------------------------------------
|
| Qui puoi definire funzioni helper globali per i test del modulo.
| Queste funzioni saranno disponibili in tutti i test.
|
*/

// function something() {
//     // ...
<<<<<<< HEAD
// } 
=======
// }
>>>>>>> d1a0a6c3 (.)
