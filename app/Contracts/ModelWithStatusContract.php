<?php

declare(strict_types=1);

namespace Modules\Xot\Contracts;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Support\Carbon;
use Spatie\ModelStatus\Status;

/**
<<<<<<< HEAD
 * Modules\Xot\Contracts\ModelWithStatusContract.
=======
<<<<<<< HEAD
 * Contratto per i modelli che supportano la gestione degli stati.
=======
 * Modules\Xot\Contracts\ModelWithStatusContract.
>>>>>>> origin/dev
>>>>>>> 3268b83 (.)
 *
 * @property int                      $id
 * @property int|null                 $user_id
 * @property string|null              $post_type
 * @property Carbon|null              $created_at
 * @property Carbon|null              $updated_at
 * @property string|null              $created_by
 * @property string|null              $updated_by
 * @property string|null              $title
 * @property PivotContract|null       $pivot
<<<<<<< HEAD
 * @property string $tennant_name
 * @property UserContract|null        $user
 * @property string $status
=======
<<<<<<< HEAD
 * @property string                   $tennant_name
 * @property UserContract|null        $user
 * @property string                   $status
=======
 * @property string $tennant_name
 * @property UserContract|null        $user
 * @property string $status
>>>>>>> origin/dev
>>>>>>> 3268b83 (.)
 * @property Collection|array<Status> $statuses
 * @property int|null                 $statuses_count
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
=======
 * @method int       treeSonsCount()
>>>>>>> 3268b83 (.)
 * @method array     toArray()
 * @method BelongsTo user()
 *
 * @phpstan-require-extends Model
 *
 * @mixin \Eloquent
 */
<<<<<<< HEAD
=======
<<<<<<< HEAD
interface ModelWithStatusContract extends ModelContract
{
    /**
     * Restituisce la relazione morfica con gli stati del modello.
     */
    public function statuses(): MorphMany;

    /**
     * Restituisce lo stato corrente del modello.
     */
    public function getStatus(): ?string;

    /**
     * Imposta un nuovo stato per il modello.
     */
    public function setStatus(string $status, ?string $reason = null): self;

    /**
     * Verifica se il modello ha un determinato stato.
     */
    public function hasStatus(string $status): bool;

    /**
     * Restituisce l'ultimo stato del modello.
     */
    public function latestStatus(?string $status = null): ?Status;
=======
>>>>>>> 3268b83 (.)
interface ModelWithStatusContract
{
    public function statuses(): MorphMany;

    public function status(): ?Status;

    public function setStatus(string $name, ?string $reason = null): self;
<<<<<<< HEAD
=======
>>>>>>> origin/dev
>>>>>>> 3268b83 (.)
}
