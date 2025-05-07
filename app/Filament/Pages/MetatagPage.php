<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Pages;

use Filament\Actions\Action;
use Filament\Forms\ComponentContainer;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
use Filament\Support\Colors\Color;
>>>>>>> origin/dev
>>>>>>> 3268b83 (.)
use Modules\Tenant\Services\TenantService;
use Modules\Xot\Datas\MetatagData;
use Modules\Xot\Filament\Traits\NavigationLabelTrait;
use Webmozart\Assert\Assert;
<<<<<<< HEAD
use Filament\Support\Colors\Color;
=======
<<<<<<< HEAD
use Filament\Support\Colors\Color;
=======
>>>>>>> origin/dev
>>>>>>> 3268b83 (.)

/**
 * @property ComponentContainer $form
 */
class MetatagPage extends Page implements HasForms
{
    use InteractsWithForms;
    use NavigationLabelTrait;

    public ?array $data = [];

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'xot::filament.pages.metatag';

    public function mount(): void
    {
        Assert::isArray($data = config('metatag'));

        // @phpstan-ignore argument.type
        $this->form->fill($data);
    }

    public function form(Form $form): Form
    {
        $metatag = MetatagData::make();

        return $form
            ->schema(
                [
                    TextInput::make('title')
                        ->required(),
                    TextInput::make('sitename'),
                    TextInput::make('subtitle'),
                    TextInput::make('generator'),
                    TextInput::make('charset'),
                    TextInput::make('author'),
                    TextInput::make('description'),
                    TextInput::make('keywords'),
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
>>>>>>> 3268b83 (.)
                    /*
<<<<<<< HEAD
                FileUpload::make('logo_header')
                    ->preserveFilenames()
                    ->image()
                    ->imageEditor()
                    ->moveFiles()
                    ->disk('public')
                    ->visibility('public')
                    ->directory('logo')
                    ->formatStateUsing(fn ($state): array =>[basename($state)])
                    //->formatStateUsing(fn ($state): array =>['/uploads/photos/pexels-giona-mason-19138633.jpg'])
                    ->dehydrateStateUsing(fn ($state) => collect($state)->map(function($item){
                        return Storage::disk('public')->url($item);
                    })->first() )
                                      ,
                */
<<<<<<< HEAD
=======
>>>>>>> origin/dev
>>>>>>> 3268b83 (.)
=======
                    FileUpload::make('logo_header')
                        ->preserveFilenames()
                        ->image()
                        ->imageEditor()
                        ->moveFiles()
                        ->disk('public')
                        ->visibility('public')
                        ->directory('logo')
                        ->formatStateUsing(fn ($state): array =>[basename($state)])
                        //->formatStateUsing(fn ($state): array =>['/uploads/photos/pexels-giona-mason-19138633.jpg'])
                        ->dehydrateStateUsing(fn ($state) => collect($state)->map(function($item){
                            return Storage::disk('public')->url($item);
                        })->first() )
                    */
>>>>>>> 355a587 (.)
                    TextInput::make('logo_header'),
                    TextInput::make('logo_header_dark')
                        ->helperText('logo for dark css'),
                    TextInput::make('logo_height'),
                    Repeater::make('colors')
                        ->schema([
                            Select::make('key')
                                ->label('Chiave')
                                ->required()
                                ->options($metatag->getFilamentColors()),
                            Select::make('color')
                                ->label('Colore')
<<<<<<< HEAD
=======
<<<<<<< HEAD
                                ->required()
                                ->reactive()
                                ->options(array_merge(['custom' => '--- custom ---'], $metatag->getAllColors())),
                            ColorPicker::make('hex')
                                ->label('Colore personalizzato')
                                ->visible(fn (Get $get): bool => 'custom' === $get('color'))
=======
>>>>>>> 3268b83 (.)
                                ->options(array_combine(
                                    array_keys(Color::all()),
                                    array_keys(Color::all())
                                ))
                                ->reactive(),
                            ColorPicker::make('hex')
                                ->label('Colore personalizzato')
                                ->visible(fn (Get $get) => $get('color') === 'custom')
<<<<<<< HEAD
=======
>>>>>>> origin/dev
>>>>>>> 3268b83 (.)
                                ->required(),
                        ])
                        ->columns(3),
                ]
            )->columns(2)
            ->statePath('data');
    }

<<<<<<< HEAD
=======
<<<<<<< HEAD
    public function getFormActions(): array
    {
        return [
            Action::make('save')
                ->label(__('Save'))
                ->submit('save'),
        ];
    }

    public function save(): void
    {
        $data = $this->form->getState();

        Assert::isArray($data);

        $service = app(TenantService::class);
        $service->saveConfig('metatag', $data);

        Notification::make()
            ->title(__('Saved successfully'))
            ->success()
            ->send();
    }
=======
>>>>>>> 3268b83 (.)
    public function save(): void
    {
        $data = $this->form->getState();
        TenantService::saveConfig('metatag', $data);

        Notification::make()
            ->success()
            ->title(__('filament-panels::resources/pages/edit-record.notifications.saved.title'))
            ->send();
    }

    protected function getFormActions(): array
    {
        return [
            Action::make('save')
                ->submit('save'),
        ];
    }
<<<<<<< HEAD
=======
>>>>>>> origin/dev
>>>>>>> 3268b83 (.)
}
