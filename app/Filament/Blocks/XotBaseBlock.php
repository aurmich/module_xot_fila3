<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Blocks;

<<<<<<< HEAD
<<<<<<< HEAD
use Filament\Forms\Components\Builder\Block;
=======
>>>>>>> 89d0c8f4 (.)
use Filament\Forms\Components\Select;
use Modules\Xot\Filament\Traits\TransTrait;
<<<<<<< HEAD
=======
use Filament\Forms\Components\Select;
use Modules\Xot\Filament\Traits\TransTrait;
use Filament\Forms\Components\Builder\Block;
use Modules\Xot\Actions\Filament\Block\GetViewBlocksOptionsByTypeAction;
>>>>>>> e697a77b (.)
=======
use Filament\Forms\Components\Builder\Block;
use Modules\Xot\Actions\Filament\Block\GetViewBlocksOptionsByTypeAction;
>>>>>>> 89d0c8f4 (.)

abstract class XotBaseBlock
{
    use TransTrait;
<<<<<<< HEAD
<<<<<<< HEAD

=======
    
>>>>>>> e697a77b (.)
=======
    
>>>>>>> 89d0c8f4 (.)
    public static function make(
        string $name = 'article_list',
        string $context = 'form',
    ): Block {
        /**
         * @var array<\Filament\Forms\Components\Component>
         */
        $schema = array_merge(static::getBlockSchema(), static::getBlockVarSchema());

        return Block::make($name)
            ->schema($schema)

<<<<<<< HEAD
<<<<<<< HEAD
            ->columns($context === 'form' ? 3 : 1);
=======
            ->columns('form' === $context ? 3 : 1);
>>>>>>> e697a77b (.)
=======
            ->columns('form' === $context ? 3 : 1);
>>>>>>> 89d0c8f4 (.)
    }

    /**
     * Undocumented function.
     *
     * @return array<\Filament\Forms\Components\Component>
     */
    public static function getBlockSchema(): array
    {
        return [];
    }

    /**
     * Undocumented function.
     *
     * @return array<\Filament\Forms\Components\Component>
     */
    public static function getBlockVarSchema(): array
    {
        $options = app(GetViewBlocksOptionsByTypeAction::class)
            ->execute('article_list', false);

        return [
            Select::make('view')
                ->options($options),
        ];
    }
}
