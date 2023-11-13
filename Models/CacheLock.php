<?php

declare(strict_types=1);

namespace Modules\Xot\Models;

/**
 * Modules\Xot\Models\CacheLock.
 *
 * @property string $key
 * @property string $owner
 * @property int    $expiration
 *
 * @method static \Modules\Xot\Database\Factories\CacheLockFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|CacheLock  newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CacheLock  newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CacheLock  query()
 * @method static \Illuminate\Database\Eloquent\Builder|CacheLock  whereExpiration($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CacheLock  whereKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CacheLock  whereOwner($value)
 *
 * @mixin \Eloquent
 */
class CacheLock extends BaseModel
{
    /**
     * @var array<int, string>
     */
    protected $fillable = [
        'key',
        'owner',
        'expiration',
    ];
}
