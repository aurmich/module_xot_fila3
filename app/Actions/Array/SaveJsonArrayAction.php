<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Array;

<<<<<<< HEAD
=======
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
>>>>>>> e697a77b (.)
use Spatie\QueueableAction\QueueableAction;

class SaveJsonArrayAction
{
    use QueueableAction;

    public function execute(array $data, string $filename): bool
    {
        $content = \Safe\json_encode($data, JSON_PRETTY_PRINT);
<<<<<<< HEAD

        // if ($content === false) {
        //    return false;
        // }
=======
        //if ($content === false) {
        //    return false;
        //}
>>>>>>> e697a77b (.)
        return (bool) \Safe\file_put_contents($filename, $content);
    }
}
