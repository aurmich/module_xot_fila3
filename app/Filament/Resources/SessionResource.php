<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Resources;

use Filament\Forms\Components\KeyValue;
use Filament\Forms\Components\TextInput;
<<<<<<< HEAD
<<<<<<< HEAD
use Modules\Xot\Models\Session;
=======
use Modules\Xot\Filament\Resources\SessionResource\Pages;
use Modules\Xot\Models\Session;
use Modules\Xot\Filament\Resources\RelationManagers\XotBaseRelationManager;
>>>>>>> e697a77b (.)
=======
use Modules\Xot\Filament\Resources\SessionResource\Pages;
use Modules\Xot\Models\Session;
use Modules\Xot\Filament\Resources\RelationManagers\XotBaseRelationManager;
>>>>>>> 89d0c8f4 (.)

class SessionResource extends XotBaseResource
{
    protected static ?string $model = Session::class;

    public static function getFormSchema(): array
    {
        return [
            'id' => TextInput::make('id')
                ->required()
                ->maxLength(255),

            'user_id' => TextInput::make('user_id')
                ->numeric(),

            'ip_address' => TextInput::make('ip_address')
                ->maxLength(45),

            'user_agent' => TextInput::make('user_agent')
                ->maxLength(255),

            'payload' => KeyValue::make('payload')
                ->columnSpanFull(),

            'last_activity' => TextInput::make('last_activity')
                ->required()
                ->numeric(),
        ];
    }
<<<<<<< HEAD
<<<<<<< HEAD
=======


>>>>>>> e697a77b (.)
=======


>>>>>>> 89d0c8f4 (.)
}
