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
 * Contratto per i modelli che rappresentano contatti nel sistema.
 *
 * @property int                $id
 * @property int|null          $user_id
 * @property string|null       $post_type
 * @property Carbon|null       $created_at
 * @property Carbon|null       $updated_at
 * @property string|null       $created_by
 * @property string|null       $updated_by
 * @property string|null       $title
 * @property bool             $is_reclamed
 * @property bool             $table_enable
 * @property PivotContract|null $pivot
 * @property string           $tennant_name
 * @property string           $mail_subject
 * @property string           $mail_body
 * @property string           $sms_from
 * @property string           $mobile_phone
 * @property string           $sms_body
 * @property string           $sms_count
=======
>>>>>>> 3268b83 (.)
 * Modules\Xot\Contracts\ModelContract.
=======
 * Contratto per i modelli che rappresentano contatti nel sistema.
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
 * @property bool             $is_reclamed
 * @property bool             $table_enable
 * @property PivotContract|null $pivot
<<<<<<< HEAD
 * @property string $tennant_name
 * @property string $mail_subject
 * @property string $mail_body
 * @property string $sms_from
 * @property string $mobile_phone
 * @property string $sms_body
 * @property string $sms_count
<<<<<<< HEAD
=======
>>>>>>> origin/dev
>>>>>>> 3268b83 (.)
=======
 * @property string           $tennant_name
 * @property string           $mail_subject
 * @property string           $mail_body
 * @property string           $sms_from
 * @property string           $mobile_phone
 * @property string           $sms_body
 * @property string           $sms_count
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
=======
<<<<<<< HEAD
interface ModelContactContract extends ModelContract
{
    /**
     * Ottiene i canali di notifica preferiti del contatto.
     *
     * @return array<string>
     */
    public function getNotifyVia(): array;

    /**
     * Gestisce il callback dopo l'invio di una email.
     */
    public function sendEmailCallback(): void;

    /**
     * Incrementa un contatore specifico per il contatto.
     *
     * @param array<string, mixed> $data
     */
    public function increase(string $what, array $data): void;

    /**
     * Ottiene l'indirizzo email del contatto.
     */
    public function getEmail(): ?string;

    /**
     * Ottiene il numero di telefono del contatto.
     */
    public function getPhone(): ?string;

    /**
     * Ottiene l'indirizzo del contatto.
     */
    public function getAddress(): ?string;

    /**
     * Ottiene la città del contatto.
     */
    public function getCity(): ?string;

    /**
     * Ottiene il paese del contatto.
     */
    public function getCountry(): ?string;

    /**
     * Ottiene il codice postale del contatto.
     */
    public function getZipCode(): ?string;

    /**
     * Ottiene il nome completo del contatto.
     */
    public function getFullName(): string;

    /**
     * Ottiene il nome del contatto.
     */
    public function getFirstName(): ?string;

    /**
     * Ottiene il cognome del contatto.
     */
    public function getLastName(): ?string;
=======
>>>>>>> 3268b83 (.)
interface ModelContactContract
=======
interface ModelContactContract extends ModelContract
>>>>>>> 355a587 (.)
{
    /**
     * Ottiene i canali di notifica preferiti del contatto.
     *
     * @return array<string>
     */
    public function getNotifyVia(): array;

    /**
     * Gestisce il callback dopo l'invio di una email.
     */
    public function sendEmailCallback(): void;

    /**
     * Incrementa un contatore specifico per il contatto.
     *
     * @param array<string, mixed> $data
     */
    public function increase(string $what, array $data): void;
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> origin/dev
>>>>>>> 3268b83 (.)
=======

    /**
     * Ottiene l'indirizzo email del contatto.
     */
    public function getEmail(): ?string;

    /**
     * Ottiene il numero di telefono del contatto.
     */
    public function getPhone(): ?string;

    /**
     * Ottiene l'indirizzo del contatto.
     */
    public function getAddress(): ?string;

    /**
     * Ottiene la città del contatto.
     */
    public function getCity(): ?string;

    /**
     * Ottiene il paese del contatto.
     */
    public function getCountry(): ?string;

    /**
     * Ottiene il codice postale del contatto.
     */
    public function getZipCode(): ?string;

    /**
     * Ottiene il nome completo del contatto.
     */
    public function getFullName(): string;

    /**
     * Ottiene il nome del contatto.
     */
    public function getFirstName(): ?string;

    /**
     * Ottiene il cognome del contatto.
     */
    public function getLastName(): ?string;
>>>>>>> 355a587 (.)
}
