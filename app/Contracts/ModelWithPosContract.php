<?php

declare(strict_types=1);

namespace Modules\Xot\Contracts;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;
use Spatie\ModelStatus\Status;

/**
 * Modules\Xot\Contracts\ModelWithPosContract.
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
=======
<<<<<<< HEAD
 * @property string                   $tennant_name
 * @property UserContract|null        $user
 * @property string                   $status
 * @property Collection|array<Status> $statuses
 * @property int|null                 $statuses_count
 * @property int|null                 $pos
 * @property int|null                 $parent_id
=======
>>>>>>> 3268b83 (.)
 * @property string $tennant_name
 * @property UserContract|null        $user
 * @property string $status
 * @property Collection|array<Status> $statuses
 * @property int|null                 $statuses_count
 * @property int|null                 $pos
<<<<<<< HEAD
=======
>>>>>>> origin/dev
>>>>>>> 3268b83 (.)
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
interface ModelWithPosContract {}
=======
<<<<<<< HEAD
interface ModelWithPosContract extends ModelContract
{
    /**
     * Ottiene la posizione corrente dell'elemento.
     */
    public function getPosAttribute(): int;

    /**
     * Imposta la posizione dell'elemento.
     */
    public function setPosAttribute(int $value): void;

    /**
     * Ottiene il gruppo di ordinamento dell'elemento.
     */
    public function getGroupPosAttribute(): ?string;

    /**
     * Imposta il gruppo di ordinamento dell'elemento.
     */
    public function setGroupPosAttribute(?string $value): void;

    /**
     * Sposta l'elemento una posizione in su.
     */
    public function moveUp(): bool;

    /**
     * Sposta l'elemento una posizione in giù.
     */
    public function moveDown(): bool;

    /**
     * Sposta l'elemento nella posizione specificata.
     */
    public function moveToPosition(int $position): bool;

    /**
     * Resetta la posizione dell'elemento all'ultima posizione disponibile.
     */
    public function resetPosition(): void;

    /**
     * Ottiene la prossima posizione disponibile nel gruppo corrente.
     */
    public function getNextPosition(): int;

    /**
     * Ottiene la posizione massima nel gruppo corrente.
     */
    public function getMaxPosition(): int;
=======
interface ModelWithPosContract
{
>>>>>>> origin/dev
}
>>>>>>> 3268b83 (.)
