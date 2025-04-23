<?php

declare(strict_types=1);

namespace Modules\Xot\Contracts;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * Modules\Xot\Contracts\ModelWithAuthorContract.
 *
 * @property int                $id
 * @property int|null           $user_id
 * @property string|null        $post_type
 * @property Carbon|null        $created_at
 * @property Carbon|null        $updated_at
 * @property string|null        $created_by
 * @property string|null        $updated_by
 * @property string|null        $title
 * @property PivotContract|null $pivot
 * @property string $tennant_name
 * @property string $tennant_name
 * @property string             $tennant_name
 * @property int|null           $author_id
 * @property UserContract|null  $user
 * @property UserContract|null  $author
 *
 * @method mixed     getKey()
 * @method string    getRouteKey()
 * @method string    getRouteKeyName()
 * @method string    getTable()
 * @method mixed     with($array)
 * @method array     getFillable()
 * @method mixed     fill($array)
 * @method mixed     getConnection()
 * @method mixed     update($params)
 * @method mixed     delete()
 * @method mixed     detach($params)
 * @method mixed     attach($params)
 * @method mixed     save($params)
 * @method array     treeLabel()
 * @method array     treeSons()
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
 * @method int       treeSonsCount()
=======
=======
>>>>>>> d9307de (fix: auto resolve conflict)
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
 * @method int       treeSonsCount()
>>>>>>> origin/dev
>>>>>>> origin/dev
<<<<<<< HEAD
>>>>>>> e5c56c3 (.)
=======
=======
 * @method int       treeSonsCount()
>>>>>>> 50bb41c (fix: auto resolve conflict)
>>>>>>> d9307de (fix: auto resolve conflict)
=======
 * @method int       treeSonsCount()
 * @method int       treeSonsCount()
>>>>>>> c2dac53 (.)
 * @method array     toArray()
 * @method BelongsTo user()
 *
 * @phpstan-require-extends Model
 *
 * @mixin \Eloquent
 */
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
interface ModelWithAuthorContract
{
}
=======
=======
>>>>>>> d9307de (fix: auto resolve conflict)
<<<<<<< HEAD
=======
>>>>>>> c2dac53 (.)
interface ModelWithAuthorContract {}
interface ModelWithAuthorContract {}
interface ModelWithAuthorContract
{
}
<<<<<<< HEAD
>>>>>>> origin/dev
>>>>>>> origin/dev
<<<<<<< HEAD
>>>>>>> e5c56c3 (.)
=======
=======
interface ModelWithAuthorContract
{
}
>>>>>>> 50bb41c (fix: auto resolve conflict)
>>>>>>> d9307de (fix: auto resolve conflict)
=======
interface ModelWithAuthorContract
{
}
>>>>>>> c2dac53 (.)
