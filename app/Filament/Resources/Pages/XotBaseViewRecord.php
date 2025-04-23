<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Resources\Pages;

use Filament\Infolists\Components\Component;
use Filament\Infolists\Infolist;
use Filament\Resources\Pages\ViewRecord as FilamentViewRecord;

abstract class XotBaseViewRecord extends FilamentViewRecord
{
    // Aggiungi qui eventuali metodi o proprietà comuni a tutte le pagine di visualizzazione
    final public function infolist(Infolist $infolist): Infolist
    final public function infolist(Infolist $infolist): Infolist
    public function infolist(Infolist $infolist): Infolist
    {
        return $infolist->schema($this->getInfolistSchema());
    }

    /**
     * Restituisce lo schema dell'infolist per la visualizzazione dei dettagli del record.
     * Questo metodo deve sempre restituire un array con chiavi di tipo stringa.
     *
     * @return array<int|string, \Filament\Infolists\Components\Component>
     */
    abstract protected function getInfolistSchema(): array;
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD

=======
=======
>>>>>>> 7b67053 (fix: auto resolve conflict)
    
<<<<<<< HEAD
>>>>>>> e5c56c3 (.)
=======
<<<<<<< HEAD
=======
=======
=======
    
>>>>>>> c2dac53 (.)
     * @return array<Component>
     */
    protected function getInfolistSchema(): array
    {
        return [];
    }
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
}
