<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Geo;

<<<<<<< HEAD
<<<<<<< HEAD
=======
use Illuminate\Contracts\Database\Query\Expression;
>>>>>>> e697a77b (.)
=======
use Illuminate\Contracts\Database\Query\Expression;
>>>>>>> 89d0c8f4 (.)
use Illuminate\Support\Facades\DB;
use Spatie\QueueableAction\QueueableAction;

/**
 * Action per generare l'espressione SQL per il calcolo della distanza.
<<<<<<< HEAD
<<<<<<< HEAD
 *
=======
 * 
>>>>>>> e697a77b (.)
=======
 * 
>>>>>>> 89d0c8f4 (.)
 * Questa action centralizza la logica di generazione dell'espressione SQL
 * per il calcolo della distanza tra due punti geografici.
 */
class GetDistanceExpressionAction
{
    use QueueableAction;

    /**
     * Genera l'espressione SQL per calcolare la distanza tra due punti.
     *
<<<<<<< HEAD
<<<<<<< HEAD
     * @param  float  $latitude  Latitudine del punto di riferimento
     * @param  float  $longitude  Longitudine del punto di riferimento
     * @param  string|null  $alias  Alias per l'espressione (opzionale)
=======
     * @param float $latitude Latitudine del punto di riferimento
     * @param float $longitude Longitudine del punto di riferimento
     * @param string|null $alias Alias per l'espressione (opzionale)
>>>>>>> e697a77b (.)
=======
     * @param float $latitude Latitudine del punto di riferimento
     * @param float $longitude Longitudine del punto di riferimento
     * @param string|null $alias Alias per l'espressione (opzionale)
>>>>>>> 89d0c8f4 (.)
     * @return \Illuminate\Contracts\Database\Query\Expression Espressione SQL per il calcolo della distanza
     */
    public function execute(float $latitude, float $longitude, ?string $alias = null): \Illuminate\Contracts\Database\Query\Expression
    {
        $sql = "
            (6371 * acos(
                cos(radians($latitude)) *
                cos(radians(latitude)) *
                cos(radians(longitude) - radians($longitude)) +
                sin(radians($latitude)) *
                sin(radians(latitude))
            ))
        ";
<<<<<<< HEAD
<<<<<<< HEAD

        if ($alias !== null) {
=======
        
        if (null !== $alias) {
>>>>>>> e697a77b (.)
=======
        
        if (null !== $alias) {
>>>>>>> 89d0c8f4 (.)
            $sql .= " AS $alias";
        }

        return DB::raw($sql);
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
