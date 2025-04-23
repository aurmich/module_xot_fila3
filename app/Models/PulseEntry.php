<?php

declare(strict_types=1);

namespace Modules\Xot\Models;

/**
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
 *
=======
=======
=======
>>>>>>> 7b67053 (fix: auto resolve conflict)
=======
<<<<<<< HEAD
>>>>>>> 50bb41c (fix: auto resolve conflict)
>>>>>>> d9307de (fix: auto resolve conflict)
=======
>>>>>>> c2dac53 (.)
 * 
>>>>>>> e5c56c3 (.)
 *
 * @property \Modules\Xot\Contracts\ProfileContract|null $creator
 * @property \Modules\Xot\Contracts\ProfileContract|null $updater
 * @property \Modules\Xot\Contracts\ProfileContract|null $creator
 * @property \Modules\Xot\Contracts\ProfileContract|null $updater
 *
 *
 *
 * @property \Modules\Xot\Contracts\ProfileContract|null $creator
 * @property \Modules\Xot\Contracts\ProfileContract|null $updater
 * @method static \Modules\Xot\Database\Factories\PulseEntryFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|PulseEntry  newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PulseEntry  newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PulseEntry  query()
 * @property int         $id
 * @property int         $timestamp
 * @property string $type
 * @property string $key
 * @property string|null $key_hash
 * @property int|null    $value
 *
 * @property int         $id
 * @property int         $timestamp
 * @property string      $type
 * @property string      $key
 * @property string|null $key_hash
 * @property int|null    $value
 *
 * @method static \Illuminate\Database\Eloquent\Builder|PulseEntry whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PulseEntry whereKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PulseEntry whereKeyHash($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PulseEntry whereTimestamp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PulseEntry whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PulseEntry whereValue($value)
 *
 * @mixin \Eloquent
 */
class PulseEntry extends BaseModel
{
    /** @var list<string> */
    protected $fillable = [
        'type',
        'key',
        'value',
    ];
}
