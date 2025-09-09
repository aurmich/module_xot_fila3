<?php

declare(strict_types=1);

<<<<<<< HEAD
namespace Modules\Xot\Tests\Pest;


=======
use Modules\Xot\Tests\TestCase;
>>>>>>> ad700fc8 (.)

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

=======
pest()->extend(TestCase::class)
>>>>>>> ad700fc8 (.)
    ->in('Feature', 'Unit');

/*
|--------------------------------------------------------------------------
| Expectations
|--------------------------------------------------------------------------
|
| Qui puoi definire aspettative globali per il modulo Xot.
<<<<<<< HEAD

=======
| Quando definisci here expectation globali, saranno disponibili
>>>>>>> ad700fc8 (.)
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

=======
// }
>>>>>>> ad700fc8 (.)
