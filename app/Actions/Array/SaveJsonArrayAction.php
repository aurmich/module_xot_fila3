<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Array;

<<<<<<< HEAD
<<<<<<< HEAD
=======
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
>>>>>>> e697a77b (.)
=======
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
>>>>>>> 89d0c8f4 (.)
use Spatie\QueueableAction\QueueableAction;

class SaveJsonArrayAction
{
    use QueueableAction;

    public function execute(array $data, string $filename): bool
    {
        $content = \Safe\json_encode($data, JSON_PRETTY_PRINT);
<<<<<<< HEAD
<<<<<<< HEAD

        // if ($content === false) {
        //    return false;
        // }
=======
        //if ($content === false) {
        //    return false;
        //}
>>>>>>> e697a77b (.)
=======
        //if ($content === false) {
        //    return false;
        //}
>>>>>>> 89d0c8f4 (.)
        return (bool) \Safe\file_put_contents($filename, $content);
    }
}
