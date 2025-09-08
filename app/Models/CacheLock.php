<?php

declare(strict_types=1);

namespace Modules\Xot\Models;

/**
 * Modules\Xot\Models\CacheLock.
 *
 * @property string $key
 * @property string $owner
 * @property int $expiration
 *
 * @method static \Modules\Xot\Database\Factories\CacheLockFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|CacheLock newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CacheLock newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CacheLock query()
 * @method static \Illuminate\Database\Eloquent\Builder|CacheLock whereExpiration($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CacheLock whereKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CacheLock whereOwner($value)
 *
 * @property int $expiration
 *
 * @method static \Modules\Xot\Database\Factories\CacheLockFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|CacheLock newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CacheLock newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CacheLock query()
 * @method static \Illuminate\Database\Eloquent\Builder|CacheLock whereExpiration($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CacheLock whereKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CacheLock whereOwner($value)
 *
 * @property \Modules\Xot\Contracts\ProfileContract|null $creator
 * @property \Modules\Xot\Contracts\ProfileContract|null $updater
 *
 * @method static CacheLock|null first()
 * @method static \Illuminate\Database\Eloquent\Collection<int, CacheLock> get()
 * @method static CacheLock create(array $attributes = [])
 * @method static CacheLock firstOrCreate(array $attributes = [], array $values = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CacheLock where(string|\Closure $column, mixed $operator = null, mixed $value = null, string $boolean = 'and')
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CacheLock whereNotNull(string|\Illuminate\Contracts\Database\Query\Expression $columns)
 * @method static int count(string $columns = '*')
 *
 * @mixin IdeHelperCacheLock
 * @mixin \Eloquent
 */
class CacheLock extends BaseModel
{
    /** @var list<string> */
    protected $fillable = [
        'key',
        'owner',
        'expiration',
    ];
}
