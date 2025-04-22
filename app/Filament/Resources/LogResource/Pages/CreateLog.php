<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Resources\LogResource\Pages;

<<<<<<< HEAD
use Modules\Xot\Filament\Resources\LogResource;




use Modules\Xot\Filament\Resources\XotBaseResource\RelationManager\XotBaseRelationManager;





class CreateLog extends \Modules\Xot\Filament\Resources\Pages\XotBaseCreateRecord
=======
use Filament\Resources\Pages\CreateRecord;
use Modules\Xot\Filament\Resources\LogResource;

class CreateLog extends CreateRecord
>>>>>>> e2a4c5d (.)
{
    protected static string $resource = LogResource::class;
}
