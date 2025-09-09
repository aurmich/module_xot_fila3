<?php

declare(strict_types=1);

<<<<<<< HEAD
<<<<<<< HEAD
use Modules\Xot\Tests\TestCase;
=======
namespace Modules\Xot\Tests\Pest;


>>>>>>> c4ec0fb6 (.)
=======
use Modules\Xot\Tests\TestCase;
>>>>>>> edc8a701 (.)

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
<<<<<<< HEAD
pest()->extend(TestCase::class)
=======

>>>>>>> c4ec0fb6 (.)
=======
pest()->extend(TestCase::class)
>>>>>>> edc8a701 (.)
    ->in('Feature', 'Unit');

/*
|--------------------------------------------------------------------------
| Expectations
|--------------------------------------------------------------------------
|
| Qui puoi definire aspettative globali per il modulo Xot.
<<<<<<< HEAD
<<<<<<< HEAD
| Quando definisci here expectation globali, saranno disponibili 
=======

>>>>>>> c4ec0fb6 (.)
=======
| Quando definisci here expectation globali, saranno disponibili
>>>>>>> edc8a701 (.)
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
<<<<<<< HEAD
// } 
=======

>>>>>>> c4ec0fb6 (.)
=======
// }
>>>>>>> edc8a701 (.)
