<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Resources\CacheResource\Pages;

use Modules\Xot\Filament\Resources\CacheResource;




use Modules\Xot\Filament\Resources\XotBaseResource\RelationManagers\XotBaseRelationManager;





class CreateCache extends \Modules\Xot\Filament\Resources\Pages\XotBaseCreateRecord
use Filament\Resources\Pages\CreateRecord;
use Modules\Xot\Filament\Resources\CacheResource;

class CreateCache extends CreateRecord
{
    protected static string $resource = CacheResource::class;
}
