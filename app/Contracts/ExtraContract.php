<?php

/**
 * @see https://github.com/buyersclub/laravel-eloquent-model-interface/blob/master/src/EloquentModelInterface.php
 */

declare(strict_types=1);

namespace Modules\Xot\Contracts;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * Modules\Xot\Contracts\ExtraContract.
 *
 * @property \Spatie\SchemalessAttributes\SchemalessAttributes $extra_attributes
 *
 * @method static \Illuminate\Database\Eloquent\Builder|ExtraContract newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ExtraContract newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ExtraContract query()
 * @method static \Illuminate\Database\Eloquent\Builder|ExtraContract withExtraAttributes()
 *
<<<<<<< HEAD
<<<<<<< HEAD
 * @property int $id
=======
 * @property int         $id
>>>>>>> e697a77b (.)
=======
 * @property int         $id
>>>>>>> 89d0c8f4 (.)
 * @property string $model_type
 * @property string $model_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 * @property Carbon|null $deleted_at
 * @property string|null $deleted_by
 *
 * @method static \Illuminate\Database\Eloquent\Builder|ExtraContract whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExtraContract whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExtraContract whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExtraContract whereDeletedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExtraContract whereExtraAttributes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExtraContract whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExtraContract whereModelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExtraContract whereModelType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExtraContract whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExtraContract whereUpdatedBy($value)
 *
 * @phpstan-require-extends Model
 *
 * @mixin \Eloquent
 */
<<<<<<< HEAD
<<<<<<< HEAD
interface ExtraContract {}
=======
interface ExtraContract
{
}
>>>>>>> e697a77b (.)
=======
interface ExtraContract
{
}
>>>>>>> 89d0c8f4 (.)
