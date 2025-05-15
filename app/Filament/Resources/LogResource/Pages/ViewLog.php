<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Resources\LogResource\Pages;

use Filament\Actions;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\Grid;
<<<<<<< Updated upstream
<<<<<<< HEAD
use Modules\Xot\Filament\Resources\LogResource;
=======
<<<<<<< HEAD
use Modules\Xot\Filament\Resources\Pages\XotBaseViewRecord;
>>>>>>> bdc979b (.)

use function Safe\json_encode;

class ViewLog extends \Modules\Xot\Filament\Resources\Pages\XotBaseViewRecord
{
<<<<<<< HEAD
    protected static string $resource = LogResource::class;
=======
    protected static string $resource = \Modules\Xot\Filament\Resources\LogResource::class;
=======
=======
>>>>>>> Stashed changes
use Modules\Xot\Filament\Resources\LogResource;

use function Safe\json_encode;

class ViewLog extends \Modules\Xot\Filament\Resources\Pages\XotBaseViewRecord
{
    protected static string $resource = LogResource::class;
<<<<<<< Updated upstream
>>>>>>> 823c958 (.)
>>>>>>> bdc979b (.)
=======
>>>>>>> Stashed changes

    protected function getInfolistSchema(): array
    {
        $log = $this->getRecord()->getModel();
        return [
            'log_info' => Section::make('Informazioni Log')
                ->schema([
                    'log_grid' => Grid::make(['default' => 3])
                        ->schema([
                            'id' => TextEntry::make('id'),
                            'message' => TextEntry::make('message'),
                            'level' => TextEntry::make('level'),
                            'level_name' => TextEntry::make('level_name'),
                            'channel' => TextEntry::make('channel'),
                            'datetime' => TextEntry::make('datetime')
                                ->dateTime(),
                            'context' => TextEntry::make('context')
                                ->formatStateUsing(fn ($state) => json_encode($state, JSON_PRETTY_PRINT)),
                            'extra' => TextEntry::make('extra')
                                ->formatStateUsing(fn ($state) => json_encode($state, JSON_PRETTY_PRINT)),
                        ]),
                ]),
        ];
    }
}
