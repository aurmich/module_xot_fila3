<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Resources\XotBaseResource\Pages;

<<<<<<< Updated upstream
<<<<<<< HEAD
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Form;
use Filament\Resources\Pages\ManageRelatedRecords as FilamentManageRelatedRecords;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\CreateAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Modules\Xot\Filament\Traits\HasXotTable;
use Modules\Xot\Filament\Traits\NavigationLabelTrait;
use Webmozart\Assert\Assert;
=======
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Model;
use Filament\Forms\Components\Component;
use Filament\Tables\Actions\CreateAction;
use Modules\Xot\Filament\Traits\HasXotTable;
=======
>>>>>>> Stashed changes
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Form;
use Filament\Resources\Pages\ManageRelatedRecords as FilamentManageRelatedRecords;
<<<<<<< Updated upstream
>>>>>>> 4241492 (.)
=======
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\CreateAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Modules\Xot\Filament\Traits\HasXotTable;
use Modules\Xot\Filament\Traits\NavigationLabelTrait;
use Webmozart\Assert\Assert;
>>>>>>> Stashed changes

/**
 * Classe base per la gestione delle relazioni nelle risorse Filament.
 * Estende la classe ManageRelatedRecords di Filament e fornisce funzionalità aggiuntive
 * specifiche per il framework Laraxot.
<<<<<<< Updated upstream
<<<<<<< HEAD
 *
 * @template TModel of Model
 */
abstract class XotBaseManageRelatedRecords extends FilamentManageRelatedRecords
{
=======
 */
abstract class XotBaseManageRelatedRecords extends FilamentManageRelatedRecords
{

>>>>>>> 4241492 (.)
=======
 *
 * @template TModel of Model
 * @extends FilamentManageRelatedRecords<TModel>
 */
abstract class XotBaseManageRelatedRecords extends FilamentManageRelatedRecords
{
>>>>>>> Stashed changes
    use HasXotTable;
    use InteractsWithForms;
    use NavigationLabelTrait;

    // protected static string $resource;

<<<<<<< Updated upstream
<<<<<<< HEAD
    /**
     * Restituisce il gruppo di navigazione (override opzionale).
     */
=======
>>>>>>> 4241492 (.)
=======
    /**
     * Restituisce il gruppo di navigazione (override opzionale).
     */
>>>>>>> Stashed changes
    public static function getNavigationGroup(): string
    {
        return '';
    }

    /*
     * @return array<\Filament\Forms\Components\Component>
     */
    // abstract public static function getFormSchema(): array;

    /**
     * Definisce le colonne della tabella per la visualizzazione dei record correlati.
     * Questo metodo può essere sovrascritto nelle classi figlie.
     *
     * @return array<string, TextColumn>
     */
<<<<<<< Updated upstream
<<<<<<< HEAD
    public function getTableColumns(): array
=======
    public function getListTableColumns(): array
>>>>>>> 4241492 (.)
=======
    public function getTableColumns(): array
>>>>>>> Stashed changes
    {
        return [
            'id' => TextColumn::make('id')
                ->label('ID')
                ->sortable(),

            'name' => TextColumn::make('name')
                ->label('Nome')
                ->searchable()
                ->sortable(),

            'created_at' => TextColumn::make('created_at')
                ->label('Data Creazione')
                ->dateTime('d/m/Y H:i')
                ->sortable(),
        ];
    }

    /**
     * Definisce le azioni dell'intestazione della tabella.
     * Questo metodo può essere sovrascritto nelle classi figlie.
     *
     * @return array<string, Action>
     */
    public function getTableHeaderActions(): array
    {
        return [
            'create' => CreateAction::make()
                ->label('Crea Nuovo')
                ->disableCreateAnother(),
        ];
    }

    /**
     * Definisce le azioni per ogni riga della tabella.
     * Questo metodo può essere sovrascritto nelle classi figlie.
     *
     * @return array<string, Action>
     */
    public function getTableActions(): array
    {
        return [
            'edit' => Action::make('edit')
                ->label('Modifica')
                ->icon('heroicon-o-pencil')
<<<<<<< Updated upstream
<<<<<<< HEAD
                ->url(fn (Model $record): string => static::getResource()::getUrl('edit', ['record' => $record])),
=======
                ->url(fn (Model $record): string => $this->getResource()::getUrl('edit', ['record' => $record])),
>>>>>>> 4241492 (.)
=======
                ->url(fn (Model $record): string => static::getResource()::getUrl('edit', ['record' => $record])),
>>>>>>> Stashed changes

            'view' => Action::make('view')
                ->label('Visualizza')
                ->icon('heroicon-o-eye')
<<<<<<< Updated upstream
<<<<<<< HEAD
                ->url(fn (Model $record): string => static::getResource()::getUrl('view', ['record' => $record])),
        ];
    }

    /*
     * Configura la tabella per la visualizzazione dei record correlati.
     * public function table(Table $table): Table
     * {
     * return $table
     * ->columns($this->getTableColumns())
     * ->headerActions($this->getTableHeaderActions())
     * ->actions($this->getTableActions())
     * ->bulkActions([])
     * ->emptyStateActions([
     * 'create' => CreateAction::make()
     * ->label('Crea Nuovo')
     * ->disableCreateAnother(),
     * ]);
     * }.

    public function table(Table $table): Table
    {
        return $table
            ->columns($this->getTableColumns())
=======
                ->url(fn (Model $record): string => $this->getResource()::getUrl('view', ['record' => $record])),
=======
                ->url(fn (Model $record): string => static::getResource()::getUrl('view', ['record' => $record])),
>>>>>>> Stashed changes
        ];
    }

    /*
     * Configura la tabella per la visualizzazione dei record correlati.
     * public function table(Table $table): Table
     * {
     * return $table
     * ->columns($this->getTableColumns())
     * ->headerActions($this->getTableHeaderActions())
     * ->actions($this->getTableActions())
     * ->bulkActions([])
     * ->emptyStateActions([
     * 'create' => CreateAction::make()
     * ->label('Crea Nuovo')
     * ->disableCreateAnother(),
     * ]);
     * }.

    public function table(Table $table): Table
    {
        return $table
<<<<<<< Updated upstream
            ->columns($this->getListTableColumns())
>>>>>>> 4241492 (.)
=======
            ->columns($this->getTableColumns())
>>>>>>> Stashed changes
            ->headerActions($this->getTableHeaderActions())
            ->actions($this->getTableActions())
            ->bulkActions([])
            ->emptyStateActions([
                'create' => CreateAction::make()
                    ->label('Crea Nuovo')
                    ->disableCreateAnother(),
            ]);
    }
<<<<<<< Updated upstream
<<<<<<< HEAD
    */
=======

>>>>>>> 4241492 (.)
=======
    */
>>>>>>> Stashed changes
    /**
     * Configura il form per la creazione/modifica dei record correlati.
     */
    public function form(Form $form): Form
    {
        /** @var array<\Filament\Forms\Components\Component> $schema */
        $schema = $this->getFormSchema();
        return $form->schema($schema);
<<<<<<< Updated upstream
=======
        return $form
            ->schema($this->getFormSchema());
>>>>>>> 4241492 (.)
=======
>>>>>>> Stashed changes
    }

    /**
     * Restituisce il titolo della pagina.
     */
    public function getTitle(): string
    {
        $resource = static::getResource();
        $recordTitle = $this->getRecordTitle();
        $relationship = static::getRelationshipName();

        $titleString = '';
        if ($recordTitle instanceof \Illuminate\Contracts\Support\Htmlable) {
            $titleString = $recordTitle->toHtml();
        } else {
            $titleString = (string) $recordTitle;
        }

        return Str::of($relationship)
            ->title()
            ->prepend($titleString.' - ')
            ->toString();
    }
}
