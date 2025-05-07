<?php

declare(strict_types=1);

namespace Modules\Xot\Contracts;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< HEAD
 * Modules\Xot\Contracts\ModelWithUserContract.
 *
 * @property int                $id
 * @property int|null          $user_id
 * @property string|null       $post_type
 * @property Carbon|null       $created_at
 * @property Carbon|null       $updated_at
 * @property string|null       $created_by
 * @property string|null       $updated_by
 * @property string|null       $title
 * @property PivotContract|null $pivot
 * @property string           $tennant_name
 * @property UserContract|null $user
=======
>>>>>>> 3268b83 (.)
 * Modules\Xot\Contracts\ModelContract.
=======
 * Modules\Xot\Contracts\ModelWithUserContract.
>>>>>>> 355a587 (.)
 *
 * @property int                $id
 * @property int|null          $user_id
 * @property string|null       $post_type
 * @property Carbon|null       $created_at
 * @property Carbon|null       $updated_at
 * @property string|null       $created_by
 * @property string|null       $updated_by
 * @property string|null       $title
 * @property PivotContract|null $pivot
<<<<<<< HEAD
 * @property string $tennant_name
 * @property UserContract|null  $user
<<<<<<< HEAD
=======
>>>>>>> origin/dev
>>>>>>> 3268b83 (.)
=======
 * @property string           $tennant_name
 * @property UserContract|null $user
>>>>>>> 355a587 (.)
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
<<<<<<< HEAD
interface ModelWithUserContract {}
=======
<<<<<<< HEAD
interface ModelWithUserContract extends ModelContract
{
    /**
     * Ottiene l'ID dell'utente proprietario.
     */
    public function getUserId(): ?int;

    /**
     * Imposta l'ID dell'utente proprietario.
     */
    public function setUserId(?int $userId): self;

    /**
     * Ottiene la relazione con l'utente proprietario.
     */
    public function user(): BelongsTo;

    /**
     * Verifica se il modello ha un utente proprietario.
     */
    public function hasUser(): bool;

    /**
     * Verifica se il modello appartiene a un determinato utente.
     */
    public function belongsToUser(int $userId): bool;
=======
interface ModelWithUserContract
{
>>>>>>> origin/dev
=======
interface ModelWithUserContract extends ModelContract
{
    /**
     * Ottiene l'ID dell'utente proprietario.
     */
    public function getUserId(): ?int;

    /**
     * Imposta l'ID dell'utente proprietario.
     */
    public function setUserId(?int $userId): self;

    /**
     * Ottiene la relazione con l'utente proprietario.
     */
    public function user(): BelongsTo;

    /**
     * Verifica se il modello ha un utente proprietario.
     */
    public function hasUser(): bool;

    /**
     * Verifica se il modello appartiene a un determinato utente.
     */
    public function belongsToUser(int $userId): bool;
>>>>>>> 355a587 (.)
}
>>>>>>> 3268b83 (.)
