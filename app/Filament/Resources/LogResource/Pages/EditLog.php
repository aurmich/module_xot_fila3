<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Resources\LogResource\Pages;

use Filament\Actions;
<<<<<<< HEAD
use Modules\Xot\Filament\Resources\LogResource;
=======
<<<<<<< HEAD
use Filament\Resources\Pages\EditRecord;
use Modules\Xot\Filament\Resources\Pages\XotBaseEditRecord;
>>>>>>> bdc979b (.)




use Modules\Xot\Filament\Resources\XotBaseResource\RelationManagers\XotBaseRelationManager;





class EditLog extends \Modules\Xot\Filament\Resources\Pages\XotBaseEditRecord
{
    protected static string $resource = LogResource::class;

<<<<<<< HEAD
=======
    use Modules\Xot\Filament\Resources\XotBaseResource\RelationManagers\XotBaseRelationManager;
=======
use Modules\Xot\Filament\Resources\LogResource;




use Modules\Xot\Filament\Resources\XotBaseResource\RelationManager\XotBaseRelationManager;





class EditLog extends \Modules\Xot\Filament\Resources\Pages\XotBaseEditRecord
{
    protected static string $resource = LogResource::class;

>>>>>>> 823c958 (.)
>>>>>>> bdc979b (.)

}
