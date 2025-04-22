<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Tables\Actions;

use Filament\Tables\Actions\Action;
use Illuminate\Database\Eloquent\Model;

/**
 * @property ?Model $record
<<<<<<< HEAD
 * @method ?Model getRecord()
 */
abstract class XotBaseTableAction extends Action
{
    /**
     * @return \Illuminate\Database\Eloquent\Model|null
     */
=======
 */
abstract class XotBaseTableAction extends Action
{
>>>>>>> e2a4c5d (.)
    public function getRecord(): ?Model
    {
        return $this->record;
    }
}
