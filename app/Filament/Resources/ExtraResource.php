<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Resources;

use Filament\Forms\Components\KeyValue;
use Filament\Forms\Components\TextInput;
use Modules\Xot\Filament\Resources\ExtraResource\Pages;
<<<<<<< HEAD
use Modules\Xot\Filament\Resources\RelationManagers\XotBaseRelationManager;
use Modules\Xot\Models\Extra;

class ExtraResource extends XotBaseResource
{
    protected static null|string $model = Extra::class;
=======
use Modules\Xot\Models\Extra;




use Modules\Xot\Filament\Resources\RelationManagers\XotBaseRelationManager;





class ExtraResource extends XotBaseResource
{
    protected static ?string $model = Extra::class;
>>>>>>> c4ec0fb6 (.)

    /**
     * Get the form schema for the resource.
     *
     * @return array<string, \Filament\Forms\Components\Component>
     */
<<<<<<< HEAD
    #[\Override]
    public static function getFormSchema(): array
    {
        return [
            'id' => TextInput::make('id')->required()->maxLength(36),
            'post_type' => TextInput::make('post_type')->required()->maxLength(255),
            'post_id' => TextInput::make('post_id')->required()->numeric(),
=======
    public static function getFormSchema(): array
    {
        return [
            'id' => TextInput::make('id')
                ->required()
                ->maxLength(36),

            'post_type' => TextInput::make('post_type')
                ->required()
                ->maxLength(255),

            'post_id' => TextInput::make('post_id')
                ->required()
                ->numeric(),

>>>>>>> c4ec0fb6 (.)
            'value' => KeyValue::make('value')
                ->keyLabel('Chiave')
                ->valueLabel('Valore')
                ->reorderable()
                ->columnSpanFull(),
        ];
    }

<<<<<<< HEAD
    #[\Override]
    public static function getRelations(): array
    {
        return [];
    }

    #[\Override]
=======
    public static function getRelations(): array
    {
        return [
        ];
    }

>>>>>>> c4ec0fb6 (.)
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListExtras::route('/'),
            'create' => Pages\CreateExtra::route('/create'),
            'edit' => Pages\EditExtra::route('/{record}/edit'),
        ];
    }
}
