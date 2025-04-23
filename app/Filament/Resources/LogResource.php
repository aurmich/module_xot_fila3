<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Resources;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Infolists;
use Filament\Infolists\Components\RepeatableEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Modules\Xot\Filament\Infolists\Components\FileContentEntry;
use Modules\Xot\Filament\Resources\LogResource\Pages;
use Modules\Xot\Filament\Traits\NavigationLabelTrait;
use Modules\Xot\Models\Log;
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
use Modules\Xot\Filament\Resources\XotBaseResource\RelationManagers\XotBaseRelationManager;
=======
use Modules\Xot\Filament\Resources\XotBaseResource\RelationManager\XotBaseRelationManager;
>>>>>>> e5c56c3 (.)
=======
=======
>>>>>>> 7b67053 (fix: auto resolve conflict)
=======
>>>>>>> c2dac53 (.)
use Modules\Xot\Filament\Resources\XotBaseResource\RelationManager\XotBaseRelationManager;
use Modules\Xot\Filament\Resources\XotBaseResource\RelationManager\XotBaseRelationManager;
<<<<<<< HEAD
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
use Modules\Xot\Filament\Resources\XotBaseResource\RelationManagers\XotBaseRelationManager;
>>>>>>> c2dac53 (.)

class LogResource extends XotBaseResource
{
    use NavigationLabelTrait;

    protected static ?string $model = Log::class;

    public static function getFormSchema(): array
    {
        return [
            'name' => TextInput::make('name')
                ->required()
                ->maxLength(255),

            'path' => TextInput::make('path')
                ->required()
                ->maxLength(255),

            'content' => Textarea::make('content')
            TextInput::make('name')
                ->required()
                ->maxLength(255),

            TextInput::make('path')
                ->required()
                ->maxLength(255),

            Textarea::make('content')
                ->columnSpanFull(),
        ];
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist->schema([
            TextEntry::make('name')
                ->columnSpanFull(),
            /*
            Infolists\Components\TextEntry::make('email')
                ->columnSpanFull(),

            Infolists\Components\TextEntry::make('message')
                ->formatStateUsing(static fn ($state) => new HtmlString(nl2br($state)))
                ->columnSpanFull(),
            */
            FileContentEntry::make('file-content'),
            /*
            RepeatableEntry::make('lines')
                ->schema([
                    TextEntry::make('txt'),
                ])
            */
        ]);
    }

    public static function getRelations(): array
    {
        return [
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListLogs::route('/'),
            'create' => Pages\CreateLog::route('/create'),
            // 'edit' => Pages\EditLog::route('/{record}/edit'),
            'view' => Pages\ViewLog::route('/{record}'),
        ];
    }
}
