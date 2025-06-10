<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Widgets;

use Filament\Widgets\Widget as FilamentWidget;
use Illuminate\Support\Facades\Cache;
use Filament\Widgets\WidgetConfiguration;
use Filament\Widgets\Concerns\InteractsWithPageFilters;
use Modules\Xot\Actions\View\GetViewByClassAction;

/**
 * @property bool $shouldRender
 *
 */
abstract class XotBaseWidget extends FilamentWidget
{
    use InteractsWithPageFilters;
    public string $title = '';
    public string $icon = '';
    /**
     * The view that should be rendered for the widget.
     *
     * This property allows either a string that can be rendered as a view
     * (prefixed with a namespace like 'module-name::view-name') or a path to a
     * Blade view file.
     *
     * @var view-string
     */
<<<<<<< HEAD
    protected static string $view;

=======
<<<<<<< HEAD
    protected static string $view = '';
=======
    protected static string $view;

>>>>>>> 5529cf84 (♻️ (XotBaseWidget.php): clean up code by removing unnecessary whitespace and comments for better readability)

    /**
     * Lista degli eventi ascoltati dal widget.
     *
     * @var array<string, string>
     */
    public array $listener = [
        'filters-updated' => 'filtersUpdated',
<<<<<<< HEAD
=======

>>>>>>> 5529cf84 (♻️ (XotBaseWidget.php): clean up code by removing unnecessary whitespace and comments for better readability)
    ];
>>>>>>> c58c29f3 (♻️ (XotBaseWidget.php): clean up code by removing unnecessary whitespace and comments for better readability)

    public function __construct()
    {
        //parent::__construct();//Cannot call constructor
        $view = app(GetViewByClassAction::class)->execute(static::class);
        static::$view = $view;

<<<<<<< HEAD
=======
    /**
     * Ottiene lo schema del form.
     * Deve essere implementato nelle classi figlie.
     *
     * @return array<int|string, \Filament\Forms\Components\Component>
     */
    abstract public function getFormSchema(): array;

    /**
     * Configura il form del widget.
     *
     * @param FilamentForm $form Il form da configurare
     * @return FilamentForm Il form configurato
     */
<<<<<<< HEAD
    public function form(FilamentForm $form): FilamentForm
=======
    public function form(Form $form): Form
>>>>>>> 5529cf84 (♻️ (XotBaseWidget.php): clean up code by removing unnecessary whitespace and comments for better readability)
    {
        $form = $form->schema($this->getFormSchema());

        if (method_exists($form, 'statePath')) {
            $form->statePath('data');
        }

        return $form;
    }

<<<<<<< HEAD
    /**
     * Ottiene le azioni del form.
     *
     * @return array<int|string, Action>
     */
=======
>>>>>>> 5529cf84 (♻️ (XotBaseWidget.php): clean up code by removing unnecessary whitespace and comments for better readability)
    protected function getFormActions(): array
    {
        return [
            Action::make('save')
                ->label(__('filament-panels::resources/pages/edit-record.form.actions.save.label'))
                ->submit('save'),
        ];
    }

    /**
     * Salva i dati del form.
     * Override nelle classi figlie se necessario.
     *
     * @return void
     */
    public function save(): void
    {
        // Implementare nelle classi figlie
    }

    /**
     * Eseguito quando i filtri vengono aggiornati.
     *
     * @return void
     */
    public function filtersUpdated(): void
    {
        $this->reset('data');
    }

    /**
     * {@inheritDoc}
     */
    public static function getNavigationLabel(): string
    {
        return (string) (static::$navigationLabel ?? (string) str(static::getLabel())
            ->headline());
>>>>>>> c58c29f3 (♻️ (XotBaseWidget.php): clean up code by removing unnecessary whitespace and comments for better readability)
    }
}
