<?php

declare(strict_types=1);

namespace Modules\Xot\Models;

/**
 * @property \Modules\Xot\Contracts\ProfileContract|null $creator
 * @property \Modules\Xot\Contracts\ProfileContract|null $updater
<<<<<<< HEAD
<<<<<<< HEAD
 *
 * @method static \Modules\Xot\Database\Factories\PulseValueFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|PulseValue newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PulseValue newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PulseValue query()
 *
 * @property int $id
 * @property int $timestamp
=======
 * @method static \Modules\Xot\Database\Factories\PulseValueFactory factory($count = null, $state = [])
=======
 * @method static \Modules\Xot\Database\Factories\PulseValueFactory factory($count = null, $state = [])
>>>>>>> 89d0c8f4 (.)
 * @method static \Illuminate\Database\Eloquent\Builder|PulseValue  newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PulseValue  newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PulseValue  query()
 * @property int         $id
 * @property int         $timestamp
<<<<<<< HEAD
>>>>>>> e697a77b (.)
=======
>>>>>>> 89d0c8f4 (.)
 * @property string $type
 * @property string $key
 * @property string|null $key_hash
 * @property string $value
<<<<<<< HEAD
<<<<<<< HEAD
 *
=======
>>>>>>> e697a77b (.)
=======
>>>>>>> 89d0c8f4 (.)
 * @method static \Illuminate\Database\Eloquent\Builder|PulseValue whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PulseValue whereKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PulseValue whereKeyHash($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PulseValue whereTimestamp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PulseValue whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PulseValue whereValue($value)
<<<<<<< HEAD
<<<<<<< HEAD
 *
=======
>>>>>>> e697a77b (.)
=======
>>>>>>> 89d0c8f4 (.)
 * @mixin IdeHelperPulseValue
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
