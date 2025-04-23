<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Filament\Filter;

use Filament\Tables\Filters\SelectFilter;
use Spatie\QueueableAction\QueueableAction;

class GetYearFilter
{
    use QueueableAction;

    /**
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
     * Crea un filtro per selezionare un anno all'interno di un intervallo.
     *
     * @param string $fieldName Il nome del campo su cui filtrare
     * @param int $from L'anno di inizio dell'intervallo
     * @param int $to L'anno di fine dell'intervallo
     *
     * @return SelectFilter Il filtro Filament configurato
=======
     * Undocumented function.
>>>>>>> e5c56c3 (.)
=======
=======
>>>>>>> 7b67053 (fix: auto resolve conflict)
=======
>>>>>>> c2dac53 (.)
     * Undocumented function.
     * Crea un filtro per selezionare un anno all'interno di un intervallo.
     *
     * @param string $fieldName Il nome del campo su cui filtrare
     * @param int $from L'anno di inizio dell'intervallo
     * @param int $to L'anno di fine dell'intervallo
     *
     * @return SelectFilter Il filtro Filament configurato
     * Undocumented function.
<<<<<<< HEAD
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
<<<<<<< HEAD
>>>>>>> d9307de (fix: auto resolve conflict)
=======
=======
>>>>>>> 4ab3760 (.)
>>>>>>> 7b67053 (fix: auto resolve conflict)
=======
>>>>>>> c2dac53 (.)
     */
    public function execute(string $fieldName, int $from, int $to): SelectFilter
    {
        $opts = [];
        for ($curr = $from; $curr <= $to; ++$curr) {
            $currStr = (string) $curr;
            $opts[$currStr] = $currStr;
            $currStr = (string) $curr;
            $opts[$currStr] = $currStr;
<<<<<<< HEAD
=======
<<<<<<< HEAD
            $currStr = (string) $curr;
            $opts[$currStr] = $currStr;
=======
            $opts[is_string($curr) ? $curr : (string) $curr] = is_string($curr) ? $curr : (string) $curr;
>>>>>>> origin/dev
>>>>>>> origin/dev
<<<<<<< HEAD
>>>>>>> e5c56c3 (.)
=======
=======
            $opts[(string) $curr] = (string) $curr;
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
<<<<<<< HEAD
>>>>>>> d9307de (fix: auto resolve conflict)
=======
=======
>>>>>>> 4ab3760 (.)
>>>>>>> 7b67053 (fix: auto resolve conflict)
=======
            $opts[is_string($curr) ? $curr : (string) $curr] = is_string($curr) ? $curr : (string) $curr;
            $opts[(string) $curr] = (string) $curr;
>>>>>>> c2dac53 (.)
        }

        return SelectFilter::make($fieldName)
            ->options($opts);
    }
}
