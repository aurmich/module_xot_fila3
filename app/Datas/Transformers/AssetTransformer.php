<?php

<<<<<<< HEAD
declare(strict_types=1);


=======
>>>>>>> c4ec0fb6 (.)
namespace Modules\Xot\Datas\Transformers;

use Modules\Xot\Actions\File\AssetAction;
use Spatie\LaravelData\Support\DataProperty;
<<<<<<< HEAD
use Spatie\LaravelData\Support\Transformation\TransformationContext;
use Spatie\LaravelData\Transformers\Transformer;
=======
use Spatie\LaravelData\Transformers\Transformer;
use Spatie\LaravelData\Support\Transformation\TransformationContext;
>>>>>>> c4ec0fb6 (.)

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
     * @param \Spatie\LaravelData\Support\DataProperty $_property La proprietà di dati (non utilizzata)
     * @param mixed $value Il valore da trasformare (es. "user::image.png")
     * @param \Spatie\LaravelData\Support\Transformation\TransformationContext $_context Il contesto di trasformazione (non utilizzato)
     * @return string Il percorso completo (es. "/modules/user/resources/image.png")
     */
    public function transform(DataProperty $_property, $value, TransformationContext $_context): string
    {
=======
     * @param \Spatie\LaravelData\Support\DataProperty $property La proprietà di dati
     * @param mixed $value Il valore da trasformare (es. "user::image.png")
     * @param \Spatie\LaravelData\Support\Transformation\TransformationContext $context Il contesto di trasformazione
     * @return string Il percorso completo (es. "/modules/user/resources/image.png")
     */
    public function transform(
        DataProperty $property,
        $value,
        TransformationContext $context
    ):string {
>>>>>>> c4ec0fb6 (.)
        if (!is_string($value) || empty($value)) {
            return '';
        }
        return app(AssetAction::class)->execute($value);
    }
<<<<<<< HEAD
=======


>>>>>>> c4ec0fb6 (.)
}
