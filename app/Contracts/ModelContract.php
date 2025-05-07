<?php

/**
 * @see https://github.com/buyersclub/laravel-eloquent-model-interface/blob/master/src/EloquentModelInterface.php
 */

declare(strict_types=1);

namespace Modules\Xot\Contracts;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
<<<<<<< HEAD
<<<<<<< HEAD
 * Modules\Xot\Contracts\ModelContract.
=======
<<<<<<< HEAD
 * Contratto base per i modelli nel sistema Laraxot.
=======
 * Modules\Xot\Contracts\ModelContract.
>>>>>>> origin/dev
>>>>>>> 3268b83 (.)
=======
 * Contratto base per i modelli nel sistema Laraxot.
>>>>>>> 355a587 (.)
 *
 * @property int                $id
 * @property int|null           $user_id
 * @property string|null        $post_type
 * @property Carbon|null        $created_at
 * @property Carbon|null        $updated_at
 * @property string|null        $created_by
 * @property string|null        $updated_by
 * @property string|null        $title
<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< HEAD
 * @property bool              $is_reclamed
 * @property bool              $table_enable
 * @property PivotContract|null $pivot
 * @property string            $tennant_name
=======
>>>>>>> 3268b83 (.)
 * @property bool               $is_reclamed
 * @property bool               $table_enable
 * @property PivotContract|null $pivot
 * @property string $tennant_name
<<<<<<< HEAD
=======
>>>>>>> origin/dev
>>>>>>> 3268b83 (.)
=======
 * @property bool              $is_reclamed
 * @property bool              $table_enable
 * @property PivotContract|null $pivot
 * @property string            $tennant_name
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
 * @method array     treeLabel()
 * @method array     treeSons()
<<<<<<< HEAD
=======
 * @method int       treeSonsCount()
>>>>>>> 3268b83 (.)
 * @method array     toArray()
 * @method BelongsTo user()
 * @method mixed     getAttributeValue(string $key)
 *
 * @phpstan-require-extends Model
 *
 * @mixin \Eloquent
 */
interface ModelContract
{
    /**
<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< HEAD
     * Duplica l'istanza e rimuove tutte le relazioni caricate.
     */
    public function withoutRelations(): static;

    /**
     * Riempie il modello con un array di attributi, forzando l'assegnazione di massa.
     *
     * @param array<string, mixed> $attributes
     */
    public function forceFill(array $attributes): static;

    /**
     * Salva il modello nel database.
     *
     * @param array<string, mixed> $options
     */
    public function save(array $options = []): bool;

    /**
     * Converte l'istanza del modello in un array.
     *
     * @return array<string, mixed>
     */
    public function toArray(): array;

    /**
     * Ottiene il valore della chiave primaria del modello.
     *
     * @return mixed
     */
    public function getKey(): mixed;

    /**
     * Ottiene il nome della chiave primaria del modello.
     */
    public function getKeyName(): string;

    /**
     * Ottiene il tipo della chiave primaria del modello.
     */
    public function getKeyType(): string;

    /**
     * Ottiene il nome della tabella associata al modello.
     */
    public function getTable(): string;

    /**
     * Ottiene il nome della connessione del database utilizzata dal modello.
     */
    public function getConnection(): string;

    /**
     * Ottiene gli attributi che possono essere assegnati in massa.
     *
     * @return array<int, string>
     */
    public function getFillable(): array;

    /**
     * Ottiene gli attributi che devono essere convertiti.
     *
     * @return array<string, string>
     */
    public function getCasts(): array;

    /**
     * Ottiene gli attributi che devono essere trattati come date.
     *
     * @return array<int, string>
     */
    public function getDates(): array;

    /**
     * Determina se il modello utilizza i timestamp.
     */
    public function usesTimestamps(): bool;
=======
>>>>>>> 3268b83 (.)
     * Duplicate the instance and unset all the loaded relations.
     *
     * @return $this
=======
     * Duplica l'istanza e rimuove tutte le relazioni caricate.
>>>>>>> 355a587 (.)
     */
    public function withoutRelations(): static;

    /**
     * Riempie il modello con un array di attributi, forzando l'assegnazione di massa.
     *
     * @param array<string, mixed> $attributes
     */
    public function forceFill(array $attributes): static;

    /**
     * Salva il modello nel database.
     *
     * @param array<string, mixed> $options
     */
    public function save(array $options = []): bool;

    /**
     * Converte l'istanza del modello in un array.
     *
     * @return array<string, mixed>
     */
    public function toArray(): array;

    /**
     * Ottiene il valore della chiave primaria del modello.
     *
     * @return mixed
     */
    public function getKey(): mixed;

    /**
     * Ottiene il nome della chiave primaria del modello.
     */
    public function getKeyName(): string;

    /**
     * Ottiene il tipo della chiave primaria del modello.
     */
    public function getKeyType(): string;

    /**
     * Ottiene il nome della tabella associata al modello.
     */
    public function getTable(): string;

    /**
     * Ottiene il nome della connessione del database utilizzata dal modello.
     */
    public function getConnection(): string;

    /**
     * Ottiene gli attributi che possono essere assegnati in massa.
     *
     * @return array<int, string>
     */
    public function getFillable(): array;

    /**
     * Ottiene gli attributi che devono essere convertiti.
     *
     * @return array<string, string>
     */
    public function getCasts(): array;

<<<<<<< HEAD
    public function firstOrFail($columns = ['*']);
    */
<<<<<<< HEAD
=======
>>>>>>> origin/dev
>>>>>>> 3268b83 (.)
=======
    /**
     * Ottiene gli attributi che devono essere trattati come date.
     *
     * @return array<int, string>
     */
    public function getDates(): array;

    /**
     * Determina se il modello utilizza i timestamp.
     */
    public function usesTimestamps(): bool;
>>>>>>> 355a587 (.)
}
