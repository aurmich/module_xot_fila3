<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Blocks;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\Select;
use Modules\Xot\Actions\Filament\Block\GetViewBlocksOptionsByTypeAction;

abstract class XotBaseBlock
{
<<<<<<< HEAD

    public static string $name;
    public static string $context;

    public static function make(
        string $name,
        string $context = 'form',
    ): Block {

        static::$name = $name;
        static::$context = $context;
=======
    public static function make(
        string $name = 'article_list',
        string $context = 'form',
    ): Block {
>>>>>>> aurmich/dev
        /**
         * @var array<\Filament\Forms\Components\Component>
         */
        $schema = array_merge(static::getBlockSchema(), static::getBlockVarSchema());

        return Block::make($name)
            ->schema($schema)

            ->columns('form' === $context ? 3 : 1);
    }

    /**
     * Undocumented function.
     *
     * @return array<\Filament\Forms\Components\Component>
     */
<<<<<<< HEAD
    abstract public static function getBlockSchema(): array;
=======
    public static function getBlockSchema(): array
    {
        return [];
    }
>>>>>>> aurmich/dev

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
