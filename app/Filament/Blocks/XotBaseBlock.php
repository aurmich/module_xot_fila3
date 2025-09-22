<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Blocks;

<<<<<<< HEAD
use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\Select;
use Modules\Xot\Actions\Filament\Block\GetViewBlocksOptionsByTypeAction;
use Modules\Xot\Filament\Traits\TransTrait;
=======
use Filament\Forms\Components\Select;
use Modules\Xot\Filament\Traits\TransTrait;
use Filament\Forms\Components\Builder\Block;
use Modules\Xot\Actions\Filament\Block\GetViewBlocksOptionsByTypeAction;
>>>>>>> c4ec0fb6 (.)

abstract class XotBaseBlock
{
    use TransTrait;
<<<<<<< HEAD

    public static function make(string $name = 'article_list', string $context = 'form'): Block
    {
=======
    
    public static function make(
        string $name = 'article_list',
        string $context = 'form',
    ): Block {
>>>>>>> c4ec0fb6 (.)
        /**
         * @var array<\Filament\Forms\Components\Component>
         */
        $schema = array_merge(static::getBlockSchema(), static::getBlockVarSchema());

<<<<<<< HEAD
        return Block::make($name)->schema($schema)->columns('form' === $context ? 3 : 1);
=======
        return Block::make($name)
            ->schema($schema)

            ->columns('form' === $context ? 3 : 1);
>>>>>>> c4ec0fb6 (.)
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
<<<<<<< HEAD
        $options = app(GetViewBlocksOptionsByTypeAction::class)->execute('article_list', false);

        return [
            Select::make('view')->options($options),
=======
        $options = app(GetViewBlocksOptionsByTypeAction::class)
            ->execute('article_list', false);

        return [
            Select::make('view')
                ->options($options),
>>>>>>> c4ec0fb6 (.)
        ];
    }
}
