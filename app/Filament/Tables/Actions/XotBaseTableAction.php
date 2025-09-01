<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Tables\Actions;

use Filament\Tables\Actions\Action;
use Illuminate\Database\Eloquent\Model;

/**
 * @property ?Model $record
<<<<<<< HEAD
<<<<<<< HEAD
 *
=======
>>>>>>> e697a77b (.)
=======
>>>>>>> 89d0c8f4 (.)
 * @method ?Model getRecord()
 */
abstract class XotBaseTableAction extends Action
{
<<<<<<< HEAD
<<<<<<< HEAD
=======
    /**
     * @return \Illuminate\Database\Eloquent\Model|null
     */
>>>>>>> e697a77b (.)
=======
    /**
     * @return \Illuminate\Database\Eloquent\Model|null
     */
>>>>>>> 89d0c8f4 (.)
    public function getRecord(): ?Model
    {
        return $this->record;
    }
}
