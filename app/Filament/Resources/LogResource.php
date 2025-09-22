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
<<<<<<< HEAD
use Modules\Xot\Filament\Resources\RelationManagers\XotBaseRelationManager;
use Modules\Xot\Filament\Traits\NavigationLabelTrait;
use Modules\Xot\Models\Log;
=======
use Modules\Xot\Filament\Traits\NavigationLabelTrait;
use Modules\Xot\Models\Log;
use Modules\Xot\Filament\Resources\RelationManagers\XotBaseRelationManager;
>>>>>>> c4ec0fb6 (.)

class LogResource extends XotBaseResource
{
    use NavigationLabelTrait;

<<<<<<< HEAD
    protected static null|string $model = Log::class;

    #[\Override]
    public static function getFormSchema(): array
    {
        return [
            'name' => TextInput::make('name')->required()->maxLength(255),
            'path' => TextInput::make('path')->required()->maxLength(255),
            'content' => Textarea::make('content')->columnSpanFull(),
=======
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
                ->columnSpanFull(),
>>>>>>> c4ec0fb6 (.)
        ];
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist->schema([
<<<<<<< HEAD
            TextEntry::make('name')->columnSpanFull(),
            /*
             * Infolists\Components\TextEntry::make('email')
             * ->columnSpanFull(),
             *
             * Infolists\Components\TextEntry::make('message')
             * ->formatStateUsing(static fn ($state) => new HtmlString(nl2br($state)))
             * ->columnSpanFull(),
             */
            FileContentEntry::make('file-content'),
            /*
             * RepeatableEntry::make('lines')
             * ->schema([
             * TextEntry::make('txt'),
             * ])
             */
        ]);
    }

    #[\Override]
    public static function getRelations(): array
    {
        return [];
    }

    #[\Override]
=======
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

>>>>>>> c4ec0fb6 (.)
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
