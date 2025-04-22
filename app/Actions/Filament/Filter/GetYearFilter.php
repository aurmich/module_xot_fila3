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
     * Crea un filtro per selezionare un anno all'interno di un intervallo.
     *
     * @param string $fieldName Il nome del campo su cui filtrare
     * @param int $from L'anno di inizio dell'intervallo
     * @param int $to L'anno di fine dell'intervallo
     *
     * @return SelectFilter Il filtro Filament configurato
=======
     * Undocumented function.
>>>>>>> e2a4c5d (.)
     */
    public function execute(string $fieldName, int $from, int $to): SelectFilter
    {
        $opts = [];
        for ($curr = $from; $curr <= $to; ++$curr) {
<<<<<<< HEAD
            $currStr = (string) $curr;
            $opts[$currStr] = $currStr;
=======
            $opts[(string) $curr] = (string) $curr;
>>>>>>> e2a4c5d (.)
        }

        return SelectFilter::make($fieldName)
            ->options($opts);
    }
}
