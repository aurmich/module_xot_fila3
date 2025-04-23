<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Resources\CacheResource\Pages;

use Modules\Xot\Filament\Resources\CacheResource;




<<<<<<< HEAD
<<<<<<< HEAD
use Modules\Xot\Filament\Resources\XotBaseResource\RelationManagers\XotBaseRelationManager;
=======
use Modules\Xot\Filament\Resources\XotBaseResource\RelationManager\XotBaseRelationManager;
>>>>>>> e5c56c3 (.)
=======
use Modules\Xot\Filament\Resources\XotBaseResource\RelationManagers\XotBaseRelationManager;
>>>>>>> 7b67053 (fix: auto resolve conflict)





class CreateCache extends \Modules\Xot\Filament\Resources\Pages\XotBaseCreateRecord
use Filament\Resources\Pages\CreateRecord;
use Modules\Xot\Filament\Resources\CacheResource;

class CreateCache extends CreateRecord
{
    protected static string $resource = CacheResource::class;
}
