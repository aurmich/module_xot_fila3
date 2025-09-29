<?php

/**
 * @see https://coderflex.com/blog/create-advanced-filters-with-filament
 */

declare(strict_types=1);

namespace Modules\Xot\Filament\Actions\Form;

// Header actions must be an instance of Filament\Actions\Action, or Filament\Actions\ActionGroup.
// use Filament\Tables\Actions\Action;
<<<<<<< HEAD
use Filament\Forms\Components\Actions\Action;
use Filament\Forms\Set;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Support\Str;
use Modules\Xot\Actions\Export\ExportXlsByCollection;
use Modules\Xot\Actions\GetTransKeyAction;
use Webmozart\Assert\Assert;
=======
use Filament\Forms\Set;
use Illuminate\Support\Str;
use Webmozart\Assert\Assert;
use Filament\Resources\Pages\ListRecords;
use Modules\Xot\Actions\GetTransKeyAction;
use Filament\Forms\Components\Actions\Action;
use Modules\Xot\Actions\Export\ExportXlsByCollection;
use Filament\Notifications\Notification;
>>>>>>> 17bd364a (.)

class FieldRefreshAction extends Action
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->translateLabel();
        $this->icon('heroicon-o-arrow-path')
            ->tooltip('Ricalcola valore')
<<<<<<< HEAD
            ->action(function ($state, Set $set, $record) {
                $name = $this->getName();
=======
            ->action(function ($state,Set $set,$record) {
                $name=$this->getName();
>>>>>>> 17bd364a (.)
                if ($name === null) {
                    return;
                }

<<<<<<< HEAD
                $method = 'get' . Str::studly($name) . '';
                $value = $record->$method();
                $set($name, $value);
                Notification::make()
                    ->title('Ricalcolato ' . $name)
                    ->body('vecchio valore: ' . $state . ' nuovo valore: ' . $value)
                    ->success()
                    ->send();
            });
    }

    public static function getDefaultName(): null|string
=======
                $method='get'.Str::studly($name).'';
                $value=$record->$method();
                $set($name, $value);
                Notification::make()
                    ->title('Ricalcolato '.$name)
                    ->body('vecchio valore: '.$state.' nuovo valore: '.$value)
                    ->success()
                    ->send();
            });
            
    }

    public static function getDefaultName(): ?string
>>>>>>> 17bd364a (.)
    {
        return 'field_refresh';
    }
}
