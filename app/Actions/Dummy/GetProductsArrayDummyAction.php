<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Dummy;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;
use Spatie\QueueableAction\QueueableAction;
use Webmozart\Assert\Assert;

class GetProductsArrayDummyAction
{
    use QueueableAction;

    /**
     * Execute the function with the given model class.
     *
     * @throws \Exception Generating Factory [factory_class] press [F5] to refresh page [__LINE__][__FILE__]
     */
    public function execute(): array
    {
        // API
        Assert::isArray($products = Http::get('https://dummyjson.com/products')->json());
        Assert::isArray($products['products']);
        // filtering some attributes
        $products = Arr::map($products['products'], function ($item) {
            // Verifichiamo che $item sia un array prima di usare Arr::only
            if (!is_array($item)) {
                return []; // Restituiamo un array vuoto se $item non è un array
            }
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD

=======
=======
>>>>>>> 7b67053 (fix: auto resolve conflict)
            
<<<<<<< HEAD
>>>>>>> e5c56c3 (.)
=======
<<<<<<< HEAD
=======
=======
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
<<<<<<< HEAD
>>>>>>> d9307de (fix: auto resolve conflict)
=======
=======

>>>>>>> 4ab3760 (.)
>>>>>>> 7b67053 (fix: auto resolve conflict)
=======
            

>>>>>>> c2dac53 (.)
            return Arr::only(
                $item,
                [
                    'id',
                    'title',
                    'description',
                    'price',
                    'rating',
                    'brand',
                    'category',
                    'thumbnail',
                ]
            );
        });

        return $products;
    }
}
