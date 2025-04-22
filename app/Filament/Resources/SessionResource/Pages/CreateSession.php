<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Resources\SessionResource\Pages;

<<<<<<< HEAD
use Modules\Xot\Filament\Resources\SessionResource;




use Modules\Xot\Filament\Resources\XotBaseResource\RelationManager\XotBaseRelationManager;





class CreateSession extends \Modules\Xot\Filament\Resources\Pages\XotBaseCreateRecord
=======
use Filament\Resources\Pages\CreateRecord;
use Modules\Xot\Filament\Resources\SessionResource;

class CreateSession extends CreateRecord
>>>>>>> e2a4c5d (.)
{
    protected static string $resource = SessionResource::class;
}
