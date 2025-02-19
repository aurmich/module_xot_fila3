<?php

declare(strict_types=1);

namespace Modules\Gdpr\Filament\Clusters\Profile\Resources\ProfileResource\Pages;

use Filament\Resources\Pages\EditRecord;
use Modules\Gdpr\Filament\Clusters\Profile\Resources\ProfileResource;

class EditProfile extends \Modules\Xot\Filament\Resources\Pages\XotBaseEditRecord
{
    protected static string $resource = ProfileResource::class;
}
