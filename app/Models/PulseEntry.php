<?php

declare(strict_types=1);

namespace Modules\Xot\Models;

/**
 * @property \Modules\Xot\Contracts\ProfileContract|null $creator
 * @property \Modules\Xot\Contracts\ProfileContract|null $updater
 *
 * @method static \Modules\Xot\Database\Factories\PulseEntryFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|PulseEntry newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PulseEntry newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PulseEntry query()
 *
 * @property int $id
 * @property int $timestamp
 * @property string $type
 * @property string $key
 * @property string|null $key_hash
 * @property int|null $value
 *
 * @method static \Illuminate\Database\Eloquent\Builder|PulseEntry whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PulseEntry whereKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PulseEntry whereKeyHash($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PulseEntry whereTimestamp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PulseEntry whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PulseEntry whereValue($value)
 * @method static PulseEntry|null first()
 * @method static \Illuminate\Database\Eloquent\Collection<int, PulseEntry> get()
 * @method static PulseEntry create(array $attributes = [])
 * @method static PulseEntry firstOrCreate(array $attributes = [], array $values = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PulseEntry where(string|\Closure $column, mixed $operator = null, mixed $value = null, string $boolean = 'and')
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PulseEntry whereNotNull(string|\Illuminate\Contracts\Database\Query\Expression $columns)
 * @method static int count(string $columns = '*')
 *
 * @mixin IdeHelperPulseEntry
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
