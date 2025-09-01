<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Tables\Actions;

use Filament\Tables\Actions\Action;
use Illuminate\Database\Eloquent\Model;

/**
 * @property ?Model $record
<<<<<<< HEAD
 *
=======
>>>>>>> e697a77b (.)
 * @method ?Model getRecord()
 */
abstract class XotBaseTableAction extends Action
{
<<<<<<< HEAD
=======
    /**
     * @return \Illuminate\Database\Eloquent\Model|null
     */
>>>>>>> e697a77b (.)
    public function getRecord(): ?Model
    {
        return $this->record;
    }
}
