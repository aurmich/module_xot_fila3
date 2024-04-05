<?php

declare(strict_types=1);

namespace Modules\Blog\Http\Livewire\Article;

use Filament\Actions\Action;
use Filament\Actions\Concerns\InteractsWithActions;
use Filament\Actions\Contracts\HasActions;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Support\Enums\MaxWidth;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Modules\Blog\Actions\Article\MakeBetAction;
use Modules\Blog\Models\Article;
use Modules\Blog\Models\Profile;
use Modules\Rating\Models\RatingMorph;
use Modules\Xot\Actions\GetViewAction;
use Webmozart\Assert\Assert;

class RatingsWithImage extends Component implements HasForms, HasActions
{
    use InteractsWithActions;
    use InteractsWithForms;

    public ?Article $article = null;

    // public string $tpl = 'v1';
    // public string $user_id;
    public array $datas;
    // public Profile $profile;
    public int $rating_id = 0;
    public string $rating_title = '';
    public string $type = 'show';
    public int $credit = 0;
    public array $article_ratings = [];
    public int $import = 0;
    public ?string $article_uuid = null;

    public array $rating_opts = [];
    public array $ratings_percentage = [];

    // protected static ?string $navigationIcon = 'heroicon-o-document-text';

    public function mount(Article $article, string $type, string $article_uuid, array $ratings = []): void
    {
        // $this->tpl = $tpl;
        $this->type = $type;
        $this->article = $article;
        if ('show' == $type) {
            $this->datas = $this->article->getArrayRatingsWithImage();
        // $this->article_ratings = $article->getOptionRatingsIdTitle();
        } else {
            Assert::notNull($ratings);
            $this->datas = $ratings;
            $this->article_uuid = $article_uuid;
            $this->article = Article::where('uuid', $article_uuid)->first();
        }
        $this->rating_opts = collect($this->datas)->pluck('title', 'id')->toArray();

        $this->ratings_percentage = $this->article->getRatingsPercentage();
    }

    public function render(): View
    {
        /**
         * @phpstan-var view-string
         */
        $view = app(GetViewAction::class)->execute();

        $view_params = [
            'view' => $view,
        ];

        return view($view, $view_params);
    }

    public function bet(int $rating_id, string $rating_title): void
    {
        $this->rating_id = $rating_id;
        $this->rating_title = $rating_title;
        if ('index' == $this->type) {
            $this->mountAction('bet', ['rating_id' => $rating_id]);
        }

        $this->dispatch('bet-created',
            rating_id: $rating_id,
            rating_title: $rating_title
        );

        foreach ($this->datas as $key => $data) {
            if ($this->datas[$key]['id'] == $rating_id) {
                $this->datas[$key]['effect'] = true;
            } else {
                $this->datas[$key]['effect'] = false;
            }
        }
        // } else {
        //     dddx('wip');
        // }
    }

    // modal di filament
    public function betAction(): Action
    {
        return Action::make('bet')
            ->action(function (array $arguments, array $data) {
                Assert::notNull($rating_morph = RatingMorph::where('rating_id', $data['rating_id'])->first());
                $article_id = $rating_morph->model_id;
                app(MakeBetAction::class)->execute((string) $article_id, (int) $data['credits'], (int) $data['rating_id']);
            })
            // ->action(fn (array $arguments) => app(MakeBetAction::class)->execute($this->article->id, $this->import, $this->rating_id))
            ->fillForm(fn ($record, $arguments): array => [
                'rating_id' => $arguments['rating_id'],
            ])
            ->form([
                Select::make('rating_id')
                    // ->label('Author')
                    ->prefix('Your bet ')
                    ->hiddenLabel()
                    ->options($this->rating_opts)
                    ->required(),
                TextInput::make('credits')
                    ->hiddenLabel()
                    ->numeric()
                    ->suffixIcon('heroicon-o-banknotes'),
            ])
            ->modalHeading('Place bet')
            ->closeModalByClickingAway(false)
            ->modalCloseButton(false)
            ->modalWidth(MaxWidth::Small)
            ->modalSubmitActionLabel('Please select an outcome')
            ->modalCancelActionLabel('Cancel')
            ->color('primary')
            // ->modalIcon('heroicon-o-banknotes')
            ->stickyModalHeader()
            ->stickyModalFooter()
        ;
    }

    // modal con custom blade
    // public function betAction(): Action
    // {
    //     return Action::make('bet')
    //         // ->action(fn (array $arguments, array $data) => dddx([$arguments, $data]))
    //         ->action(function (array $arguments, array $data) {
    //             dddx([$arguments, $data]);
    //             $article_id = RatingMorph::where('rating_id', $arguments['rating_id'])->first()->model_id;
    //             // dddx($article_id);
    //             app(MakeBetAction::class)->execute((string) $article_id, 3, $arguments['rating_id']);
    //             // dddx([$arguments, $data]);
    //         })
    //         // ->action(fn (array $arguments) => app(MakeBetAction::class)->execute($this->article->id, $this->import, $this->rating_id))
    //         // ->fillForm(fn ($record, $arguments): array => [
    //         //     'rating_id' => $arguments['rating_id'],
    //         // ])
    //         // ->form([
    //         //     Select::make('rating_id')
    //         //         // ->label('Author')
    //         //         ->options($this->rating_opts)
    //         //         ->required(),
    //         //     TextInput::make('credits'),
    //         // ])

    //         ->closeModalByClickingAway(false)
    //         ->modalCloseButton(false)
    //         // ->modalSubmitActionLabel('confermo')
    //         // ->modalIcon('heroicon-o-banknotes')
    //         // ->stickyModalHeader()
    //         // ->stickyModalFooter()

    //         ->modalContent(function (array $arguments): View {
    //             $view = 'blog::livewire.article.ratings.for-image.v1.check';
    //             $view_params = [
    //                 'rating_title' => $arguments['rating_id'],
    //                 'type' => 'index',
    //             ];

    //             return view($view, $view_params);
    //         })
    //         ->form([
    //                 TextInput::make('credits'),
    //             ])

    //     ;
    // }
}
