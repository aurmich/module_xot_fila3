<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Tables\Actions;

use Filament\Tables\Actions\Action;
use Illuminate\Database\Eloquent\Model;

/**
 * @property ?Model $record
 * @method ?Model getRecord()
 */
abstract class XotBaseTableAction extends Action
{
    /**
     * @return \Illuminate\Database\Eloquent\Model|null
     */
<<<<<<< HEAD
    public function getRecord(): null|Model
    {
        if ($this->record instanceof \Closure) {
            return null;
        }

=======
    public function getRecord(): ?Model
    {
>>>>>>> c4ec0fb6 (.)
        return $this->record;
    }
}
