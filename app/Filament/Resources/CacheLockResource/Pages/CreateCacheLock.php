<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Resources\CacheLockResource\Pages;

<<<<<<< HEAD
use Modules\Xot\Filament\Resources\CacheLockResource;




use Modules\Xot\Filament\Resources\XotBaseResource\RelationManager\XotBaseRelationManager;





class CreateCacheLock extends \Modules\Xot\Filament\Resources\Pages\XotBaseCreateRecord
=======
use Filament\Resources\Pages\CreateRecord;
use Modules\Xot\Filament\Resources\CacheLockResource;

class CreateCacheLock extends CreateRecord
>>>>>>> e2a4c5d (.)
{
    protected static string $resource = CacheLockResource::class;
}
