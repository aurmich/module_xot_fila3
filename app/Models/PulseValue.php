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
 * @method static \Modules\Xot\Database\Factories\PulseValueFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|PulseValue  newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PulseValue  newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PulseValue  query()
 * @property int         $id
 * @property int         $timestamp
 * @property string $type
 * @property string $key
 * @property string|null $key_hash
 * @property string $value
 *
 * @property int         $id
 * @property int         $timestamp
 * @property string      $type
 * @property string      $key
 * @property string|null $key_hash
 * @property string      $value
 *
 * @method static \Illuminate\Database\Eloquent\Builder|PulseValue whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PulseValue whereKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PulseValue whereKeyHash($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PulseValue whereTimestamp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PulseValue whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PulseValue whereValue($value)
 *
 * @mixin \Eloquent
 */
class PulseValue extends BaseModel
{
    /** @var list<string> */
    protected $fillable = [
        'type',
        'key',
        'value',
    ];
}
