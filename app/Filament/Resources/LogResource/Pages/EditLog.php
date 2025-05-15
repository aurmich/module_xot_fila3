<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Resources\LogResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Modules\Xot\Filament\Resources\Pages\XotBaseEditRecord;

/**
 * @see \Modules\Xot\Filament\Resources\LogResource
 */
class EditLog extends XotBaseEditRecord
{
    protected static string $resource = \Modules\Xot\Filament\Resources\LogResource::class;

    use Modules\Xot\Filament\Resources\XotBaseResource\RelationManagers\XotBaseRelationManager;

}
