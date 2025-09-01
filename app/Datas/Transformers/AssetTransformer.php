<?php

namespace Modules\Xot\Datas\Transformers;

use Modules\Xot\Actions\File\AssetAction;
use Spatie\LaravelData\Support\DataProperty;
<<<<<<< HEAD
<<<<<<< HEAD
use Spatie\LaravelData\Support\Transformation\TransformationContext;
use Spatie\LaravelData\Transformers\Transformer;
=======
use Spatie\LaravelData\Transformers\Transformer;
use Spatie\LaravelData\Support\Transformation\TransformationContext;
>>>>>>> e697a77b (.)
=======
use Spatie\LaravelData\Transformers\Transformer;
use Spatie\LaravelData\Support\Transformation\TransformationContext;
>>>>>>> 89d0c8f4 (.)

/**
 * AssetTransformer - Trasforma riferimenti di file in percorsi completi per le risorse
 *
 * Formato input: "module::path/file.ext" o "file.ext"
 * Output: "/modules/module/resources/path/file.ext" o "/resources/path/file.ext"
 */
class AssetTransformer implements Transformer
{
    /**
     * Trasforma un riferimento di file in un percorso completo
     *
<<<<<<< HEAD
<<<<<<< HEAD
     * @param  \Spatie\LaravelData\Support\DataProperty  $property  La proprietà di dati
     * @param  mixed  $value  Il valore da trasformare (es. "user::image.png")
     * @param  \Spatie\LaravelData\Support\Transformation\TransformationContext  $context  Il contesto di trasformazione
=======
     * @param \Spatie\LaravelData\Support\DataProperty $property La proprietà di dati
     * @param mixed $value Il valore da trasformare (es. "user::image.png")
     * @param \Spatie\LaravelData\Support\Transformation\TransformationContext $context Il contesto di trasformazione
>>>>>>> e697a77b (.)
=======
     * @param \Spatie\LaravelData\Support\DataProperty $property La proprietà di dati
     * @param mixed $value Il valore da trasformare (es. "user::image.png")
     * @param \Spatie\LaravelData\Support\Transformation\TransformationContext $context Il contesto di trasformazione
>>>>>>> 89d0c8f4 (.)
     * @return string Il percorso completo (es. "/modules/user/resources/image.png")
     */
    public function transform(
        DataProperty $property,
        $value,
        TransformationContext $context
<<<<<<< HEAD
<<<<<<< HEAD
    ): string {
        if (! is_string($value) || empty($value)) {
=======
    ):string {
        if (!is_string($value) || empty($value)) {
>>>>>>> 89d0c8f4 (.)
            return '';
        }
        return app(AssetAction::class)->execute($value);
    }
<<<<<<< HEAD
=======
    ):string {
        if (!is_string($value) || empty($value)) {
            return '';
        }
        return app(AssetAction::class)->execute($value);
    }


>>>>>>> e697a77b (.)
=======


>>>>>>> 89d0c8f4 (.)
}
