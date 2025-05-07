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
 * Contratto per i modelli che rappresentano input di form.
 *
 * @property int                $id
 * @property int|null          $user_id
 * @property string|null       $name
 * @property string|null       $type
 * @property mixed            $value
 * @property Carbon|null       $created_at
 * @property Carbon|null       $updated_at
 * @property string|null       $created_by
 * @property string|null       $updated_by
 * @property string|null       $title
 * @property bool             $is_reclamed
 * @property bool             $table_enable
 * @property PivotContract|null $pivot
 * @property string           $tennant_name
 * @property array|null       $options
 * @property array|null       $attributes
 * @property bool             $required
 * @property bool             $readonly
 * @property bool             $disabled
 * @property string|null       $placeholder
 * @property string|null       $help_text
 * @property mixed            $default_value
=======
>>>>>>> 3268b83 (.)
 * Modules\Xot\Contracts\ModelContract.
=======
 * Contratto per i modelli che rappresentano input di form.
>>>>>>> 355a587 (.)
 *
 * @property int                $id
 * @property int|null          $user_id
 * @property string|null       $name
 * @property string|null       $type
 * @property mixed            $value
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
 * @property array|null       $options
 * @property array|null       $attributes
 * @property bool             $required
 * @property bool             $readonly
 * @property bool             $disabled
 * @property string|null       $placeholder
 * @property string|null       $help_text
 * @property mixed            $default_value
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
interface ModelInputContract {}
=======
<<<<<<< HEAD
interface ModelInputContract extends ModelContract
{
    /**
     * Ottiene il tipo di input.
     */
    public function getInputType(): string;

    /**
     * Ottiene le regole di validazione.
     *
     * @return array<string, mixed>
     */
    public function getValidationRules(): array;

    /**
     * Ottiene il valore predefinito.
     *
     * @return mixed
     */
    public function getDefaultValue(): mixed;

    /**
     * Ottiene il placeholder.
     */
    public function getPlaceholder(): ?string;

    /**
     * Ottiene il testo di aiuto.
     */
    public function getHelpText(): ?string;

    /**
     * Verifica se l'input è obbligatorio.
     */
    public function isRequired(): bool;

    /**
     * Verifica se l'input è in sola lettura.
     */
    public function isReadonly(): bool;

    /**
     * Verifica se l'input è disabilitato.
     */
    public function isDisabled(): bool;

    /**
     * Ottiene le opzioni per select, radio, ecc.
     *
     * @return array<string|int, string>
     */
    public function getOptions(): array;

    /**
     * Ottiene gli attributi HTML aggiuntivi.
     *
     * @return array<string, mixed>
     */
    public function getAttributes(): array;
=======
interface ModelInputContract
{
>>>>>>> origin/dev
=======
interface ModelInputContract extends ModelContract
{
    /**
     * Ottiene il tipo di input.
     */
    public function getInputType(): string;

    /**
     * Ottiene le regole di validazione.
     *
     * @return array<string, mixed>
     */
    public function getValidationRules(): array;

    /**
     * Ottiene il valore predefinito.
     *
     * @return mixed
     */
    public function getDefaultValue(): mixed;

    /**
     * Ottiene il placeholder.
     */
    public function getPlaceholder(): ?string;

    /**
     * Ottiene il testo di aiuto.
     */
    public function getHelpText(): ?string;

    /**
     * Verifica se l'input è obbligatorio.
     */
    public function isRequired(): bool;

    /**
     * Verifica se l'input è in sola lettura.
     */
    public function isReadonly(): bool;

    /**
     * Verifica se l'input è disabilitato.
     */
    public function isDisabled(): bool;

    /**
     * Ottiene le opzioni per select, radio, ecc.
     *
     * @return array<string|int, string>
     */
    public function getOptions(): array;

    /**
     * Ottiene gli attributi HTML aggiuntivi.
     *
     * @return array<string, mixed>
     */
    public function getAttributes(): array;
>>>>>>> 355a587 (.)
}
>>>>>>> 3268b83 (.)
