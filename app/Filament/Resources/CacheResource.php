<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Resources;

use Filament\Forms\Components\KeyValue;
use Filament\Forms\Components\TextInput;
use Modules\Xot\Filament\Resources\CacheResource\Pages;
use Modules\Xot\Models\Cache;
use Modules\Xot\Filament\Resources\RelationManagers\XotBaseRelationManager;

class CacheResource extends XotBaseResource
{
    protected static ?string $model = Cache::class;

<<<<<<< HEAD
=======
    #[\Override]
>>>>>>> 887d760 (.)
    public static function getFormSchema(): array
    {
        return [
            'key' => TextInput::make('key')
                ->required()
                ->maxLength(255),

            'expiration' => TextInput::make('expiration')
                ->required()
                ->numeric(),

            'value' => KeyValue::make('value')
                ->columnSpanFull(),
        ];
    }

<<<<<<< HEAD
=======
    #[\Override]
>>>>>>> 887d760 (.)
    public static function getRelations(): array
    {
        return [
        ];
    }

<<<<<<< HEAD
=======
    #[\Override]
>>>>>>> 887d760 (.)
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCaches::route('/'),
            'create' => Pages\CreateCache::route('/create'),
            'edit' => Pages\EditCache::route('/{record}/edit'),
        ];
    }
}
