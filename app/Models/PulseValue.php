<?php

declare(strict_types=1);

namespace Modules\Xot\Models;

/**
 * @property \Modules\Xot\Contracts\ProfileContract|null $creator
 * @property \Modules\Xot\Contracts\ProfileContract|null $updater
 *
 * @method static \Modules\Xot\Database\Factories\PulseValueFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|PulseValue newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PulseValue newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PulseValue query()
 *
 * @property int $id
 * @property int $timestamp
 * @property string $type
 * @property string $key
 * @property string|null $key_hash
 * @property string $value
 *
 * @method static \Illuminate\Database\Eloquent\Builder|PulseValue whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PulseValue whereKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PulseValue whereKeyHash($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PulseValue whereTimestamp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PulseValue whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PulseValue whereValue($value)
 * @method static PulseValue|null first()
 * @method static \Illuminate\Database\Eloquent\Collection<int, PulseValue> get()
 * @method static PulseValue create(array $attributes = [])
 * @method static PulseValue firstOrCreate(array $attributes = [], array $values = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PulseValue where(string|\Closure $column, mixed $operator = null, mixed $value = null, string $boolean = 'and')
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PulseValue whereNotNull(string|\Illuminate\Contracts\Database\Query\Expression $columns)
 * @method static int count(string $columns = '*')
 *
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
