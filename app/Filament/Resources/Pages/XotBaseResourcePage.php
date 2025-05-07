<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Resources\Pages;

<<<<<<< HEAD
use Modules\Xot\Filament\Traits\NavigationLabelTrait;
use Filament\Resources\Pages\Concerns\HasRelationManagers;

use Filament\Resources\Pages\Concerns\InteractsWithRecord;
use Filament\Resources\Pages\Page as FilamentResourcePage;
<<<<<<< HEAD
=======
use Filament\Resources\Pages\Page as FilamentResourcePage;
<<<<<<< HEAD
use Filament\Resources\Pages\Concerns\HasRelationManagers;
use Filament\Resources\Pages\Concerns\InteractsWithRecord;
use Modules\Xot\Filament\Traits\NavigationLabelTrait;
>>>>>>> 3268b83 (.)
=======
use Filament\Resources\Pages\Concerns\HasRelationManagers;
use Filament\Resources\Pages\Concerns\InteractsWithRecord;
use Modules\Xot\Filament\Traits\NavigationLabelTrait;
>>>>>>> 355a587 (.)

abstract class XotBaseResourcePage extends FilamentResourcePage
{
    use HasRelationManagers;
    use InteractsWithRecord;
    use NavigationLabelTrait;
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======

abstract class XotBaseResourcePage extends FilamentResourcePage
{
>>>>>>> origin/dev
>>>>>>> 3268b83 (.)
=======

abstract class XotBaseResourcePage extends FilamentResourcePage
{
 origin/dev
>>>>>>> 355a587 (.)
}
