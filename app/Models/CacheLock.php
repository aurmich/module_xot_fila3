<?php

declare(strict_types=1);

namespace Modules\Xot\Models;

/**
 * Modules\Xot\Models\CacheLock.
 *
 * @property string $key
 * @property string $owner
 * @property int    $expiration
<<<<<<< HEAD
=======
 *
>>>>>>> e2a4c5d (.)
 * @method static \Modules\Xot\Database\Factories\CacheLockFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|CacheLock  newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CacheLock  newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CacheLock  query()
 * @method static \Illuminate\Database\Eloquent\Builder|CacheLock  whereExpiration($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CacheLock  whereKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CacheLock  whereOwner($value)
<<<<<<< HEAD
 * @property int $expiration
=======
 *
 * @property int $expiration
 *
>>>>>>> e2a4c5d (.)
 * @method static \Modules\Xot\Database\Factories\CacheLockFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|CacheLock  newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CacheLock  newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CacheLock  query()
 * @method static \Illuminate\Database\Eloquent\Builder|CacheLock  whereExpiration($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CacheLock  whereKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CacheLock  whereOwner($value)
<<<<<<< HEAD
 * @property \Modules\Xot\Contracts\ProfileContract|null $creator
 * @property \Modules\Xot\Contracts\ProfileContract|null $updater
=======
 *
 * @property \Modules\Xot\Contracts\ProfileContract|null $creator
 * @property \Modules\Xot\Contracts\ProfileContract|null $updater
 *
>>>>>>> e2a4c5d (.)
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
