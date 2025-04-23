<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Resources;

<<<<<<< HEAD
<<<<<<< HEAD
use Modules\Xot\Models\Cache;
use Filament\Forms\Components\KeyValue;
use Filament\Forms\Components\TextInput;
use Modules\Xot\Filament\Resources\XotBaseResource;
use Modules\Xot\Filament\Resources\CacheResource\Pages;
<<<<<<< HEAD
use Modules\Xot\Filament\Resources\XotBaseResource\RelationManagers\XotBaseRelationManager;
=======
=======
use Modules\Xot\Models\Cache;
>>>>>>> 7b67053 (fix: auto resolve conflict)
use Filament\Forms\Components\KeyValue;
use Filament\Forms\Components\TextInput;
use Modules\Xot\Filament\Resources\XotBaseResource;
use Modules\Xot\Filament\Resources\CacheResource\Pages;
<<<<<<< HEAD
=======
>>>>>>> c2dac53 (.)
use Modules\Xot\Models\Cache;
use Modules\Xot\Filament\Resources\XotBaseResource\RelationManager\XotBaseRelationManager;
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> e5c56c3 (.)
=======
=======
<<<<<<< HEAD
use Modules\Xot\Filament\Resources\XotBaseResource\RelationManager\XotBaseRelationManager;
=======
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
<<<<<<< HEAD
>>>>>>> d9307de (fix: auto resolve conflict)
=======
=======
use Modules\Xot\Filament\Resources\XotBaseResource\RelationManagers\XotBaseRelationManager;
>>>>>>> 4ab3760 (.)
>>>>>>> 7b67053 (fix: auto resolve conflict)
=======
use Modules\Xot\Filament\Resources\XotBaseResource\RelationManager\XotBaseRelationManager;
use Modules\Xot\Filament\Resources\XotBaseResource\RelationManagers\XotBaseRelationManager;
>>>>>>> c2dac53 (.)

class CacheResource extends XotBaseResource
{
    protected static ?string $model = Cache::class;

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
            TextInput::make('key')
                ->required()
                ->maxLength(255),

            TextInput::make('expiration')
                ->required()
                ->numeric(),

            KeyValue::make('value')
                ->columnSpanFull(),
        ];
    }

    public static function getRelations(): array
    {
        return [
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCaches::route('/'),
            'create' => Pages\CreateCache::route('/create'),
            'edit' => Pages\EditCache::route('/{record}/edit'),
        ];
    }
}
