<?php

declare(strict_types=1);

namespace Modules\Xot\Models;

/**
 * Modules\Xot\Models\Feed.
 *
 * @method static \Modules\Xot\Database\Factories\FeedFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Feed newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Feed newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Feed query()
 * @method static \Illuminate\Database\Eloquent\Builder|Feed newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Feed newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Feed query()
 *
 * @property \Modules\Xot\Contracts\ProfileContract|null $creator
 * @property \Modules\Xot\Contracts\ProfileContract|null $updater
 *
 * @method static Feed|null first()
 * @method static \Illuminate\Database\Eloquent\Collection<int, Feed> get()
 * @method static Feed create(array $attributes = [])
 * @method static Feed firstOrCreate(array $attributes = [], array $values = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Feed where(string|\Closure $column, mixed $operator = null, mixed $value = null, string $boolean = 'and')
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Feed whereNotNull(string|\Illuminate\Contracts\Database\Query\Expression $columns)
 * @method static int count(string $columns = '*')
 *
 * @mixin IdeHelperFeed
 * @mixin \Eloquent
 */
class Feed extends BaseModel
{
    /** @var list<string> */
    protected $fillable = [
        'id',
        'created_at',
        'updated_at',
    ];
}
