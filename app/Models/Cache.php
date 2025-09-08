<?php

declare(strict_types=1);

namespace Modules\Xot\Models;

/**
 * Modules\Xot\Models\Cache.
 *
 * @property string $key
 * @property string $value
 * @property int $expiration
 *
 * @method static \Modules\Xot\Database\Factories\CacheFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Cache newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Cache newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Cache query()
 * @method static \Illuminate\Database\Eloquent\Builder|Cache whereExpiration($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cache whereKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cache whereValue($value)
 *
 * @property int $expiration
 *
 * @method static \Modules\Xot\Database\Factories\CacheFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Cache newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Cache newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Cache query()
 * @method static \Illuminate\Database\Eloquent\Builder|Cache whereExpiration($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cache whereKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cache whereValue($value)
 *
 * @property \Modules\Xot\Contracts\ProfileContract|null $creator
 * @property \Modules\Xot\Contracts\ProfileContract|null $updater
 *
 * @method static Cache|null first()
 * @method static \Illuminate\Database\Eloquent\Collection<int, Cache> get()
 * @method static Cache create(array $attributes = [])
 * @method static Cache firstOrCreate(array $attributes = [], array $values = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cache where(string|\Closure $column, mixed $operator = null, mixed $value = null, string $boolean = 'and')
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cache whereNotNull(string|\Illuminate\Contracts\Database\Query\Expression $columns)
 * @method static int count(string $columns = '*')
 *
 * @mixin IdeHelperCache
 * @mixin \Eloquent
 */
class Cache extends BaseModel
{
    protected $table = 'cache';

    protected $primaryKey = 'key';

    protected $keyType = 'string';

    /** @var list<string> */
    protected $fillable = [
        'key',
        'value',
        'expiration',
    ];
}
