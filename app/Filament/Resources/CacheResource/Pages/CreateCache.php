<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Resources\CacheResource\Pages;

<<<<<<< HEAD
use Modules\Xot\Filament\Resources\CacheResource;




use Modules\Xot\Filament\Resources\XotBaseResource\RelationManager\XotBaseRelationManager;





class CreateCache extends \Modules\Xot\Filament\Resources\Pages\XotBaseCreateRecord
=======
use Filament\Resources\Pages\CreateRecord;
use Modules\Xot\Filament\Resources\CacheResource;

class CreateCache extends CreateRecord
>>>>>>> e2a4c5d (.)
{
    protected static string $resource = CacheResource::class;
}
