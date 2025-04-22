<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Resources\ModuleResource\Pages;

<<<<<<< HEAD
use Modules\Xot\Filament\Resources\ModuleResource;




use Modules\Xot\Filament\Resources\XotBaseResource\RelationManager\XotBaseRelationManager;





class CreateModule extends \Modules\Xot\Filament\Resources\Pages\XotBaseCreateRecord
=======
use Filament\Resources\Pages\CreateRecord;
use Modules\Xot\Filament\Resources\ModuleResource;

class CreateModule extends CreateRecord
>>>>>>> e2a4c5d (.)
{
    protected static string $resource = ModuleResource::class;
}
