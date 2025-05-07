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
<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
>>>>>>> 355a587 (.)
 * @property int|null          $user_id
 * @property string|null       $post_type
 * @property Carbon|null       $created_at
 * @property Carbon|null       $updated_at
 * @property string|null       $created_by
 * @property string|null       $updated_by
 * @property string|null       $title
<<<<<<< HEAD
 * @property PivotContract|null $pivot
 * @property string           $tennant_name
 * @property int|null         $author_id
 * @property UserContract|null $user
 * @property UserContract|null $author
=======
>>>>>>> 3268b83 (.)
 * @property int|null           $user_id
 * @property string|null        $post_type
 * @property Carbon|null        $created_at
 * @property Carbon|null        $updated_at
 * @property string|null        $created_by
 * @property string|null        $updated_by
 * @property string|null        $title
 * @property PivotContract|null $pivot
 * @property string $tennant_name
 * @property int|null           $author_id
 * @property UserContract|null  $user
 * @property UserContract|null  $author
<<<<<<< HEAD
=======
>>>>>>> origin/dev
>>>>>>> 3268b83 (.)
=======
 * @property PivotContract|null $pivot
 * @property string           $tennant_name
 * @property int|null         $author_id
 * @property UserContract|null $user
 * @property UserContract|null $author
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
interface ModelWithAuthorContract {}
=======
<<<<<<< HEAD
interface ModelWithAuthorContract extends ModelContract
{
    /**
     * Ottiene la relazione con l'autore del record.
     */
    public function author(): BelongsTo;

    /**
     * Ottiene la relazione con l'ultimo utente che ha modificato il record.
     */
    public function updater(): BelongsTo;

    /**
     * Ottiene la relazione con l'utente che ha eliminato il record (per soft deletes).
     */
    public function deleter(): BelongsTo;

    /**
     * Ottiene l'ID dell'autore.
     */
    public function getAuthorIdAttribute(): ?int;

    /**
     * Imposta l'ID dell'autore.
     */
    public function setAuthorIdAttribute(?int $value): void;

    /**
     * Ottiene l'ID dell'ultimo utente che ha modificato il record.
     */
    public function getUpdaterIdAttribute(): ?int;

    /**
     * Imposta l'ID dell'ultimo utente che ha modificato il record.
     */
    public function setUpdaterIdAttribute(?int $value): void;

    /**
     * Ottiene l'ID dell'utente che ha eliminato il record.
     */
    public function getDeleterIdAttribute(): ?int;

    /**
     * Imposta l'ID dell'utente che ha eliminato il record.
     */
    public function setDeleterIdAttribute(?int $value): void;
}




















=======
interface ModelWithAuthorContract
=======
interface ModelWithAuthorContract extends ModelContract
>>>>>>> 355a587 (.)
{
    /**
     * Ottiene la relazione con l'autore del record.
     */
    public function author(): BelongsTo;

    /**
     * Ottiene la relazione con l'ultimo utente che ha modificato il record.
     */
    public function updater(): BelongsTo;

    /**
     * Ottiene la relazione con l'utente che ha eliminato il record (per soft deletes).
     */
    public function deleter(): BelongsTo;

    /**
     * Ottiene l'ID dell'autore.
     */
    public function getAuthorIdAttribute(): ?int;

    /**
     * Imposta l'ID dell'autore.
     */
    public function setAuthorIdAttribute(?int $value): void;

    /**
     * Ottiene l'ID dell'ultimo utente che ha modificato il record.
     */
    public function getUpdaterIdAttribute(): ?int;

    /**
     * Imposta l'ID dell'ultimo utente che ha modificato il record.
     */
    public function setUpdaterIdAttribute(?int $value): void;

    /**
     * Ottiene l'ID dell'utente che ha eliminato il record.
     */
    public function getDeleterIdAttribute(): ?int;

    /**
     * Imposta l'ID dell'utente che ha eliminato il record.
     */
    public function setDeleterIdAttribute(?int $value): void;
}
>>>>>>> origin/dev
>>>>>>> 3268b83 (.)
