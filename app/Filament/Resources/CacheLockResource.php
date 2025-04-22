<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Resources;

use Filament\Forms\Components\TextInput;
use Modules\Xot\Filament\Resources\CacheLockResource\Pages;
use Modules\Xot\Models\CacheLock;

<<<<<<< HEAD



use Modules\Xot\Filament\Resources\XotBaseResource\RelationManager\XotBaseRelationManager;





=======
>>>>>>> e2a4c5d (.)
class CacheLockResource extends XotBaseResource
{
    protected static ?string $model = CacheLock::class;

<<<<<<< HEAD
    /**
     * Get the form schema for the resource.
     *
     * @return array<string, \Filament\Forms\Components\Component>
     */
    public static function getFormSchema(): array
    {
        return [
            'key' => TextInput::make('key')
                ->required()
                ->maxLength(255),

            'owner' => TextInput::make('owner')
                ->required()
                ->maxLength(255),

            'expiration' => TextInput::make('expiration')
=======
    public static function getFormSchema(): array
    {
        return [
            TextInput::make('key')
                ->required()
                ->maxLength(255),

            TextInput::make('owner')
                ->required()
                ->maxLength(255),

            TextInput::make('expiration')
>>>>>>> e2a4c5d (.)
                ->required()
                ->numeric(),
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
            'index' => Pages\ListCacheLocks::route('/'),
            'create' => Pages\CreateCacheLock::route('/create'),
            'edit' => Pages\EditCacheLock::route('/{record}/edit'),
        ];
    }
}
