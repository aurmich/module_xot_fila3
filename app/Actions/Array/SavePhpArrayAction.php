<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Array;

<<<<<<< HEAD
=======
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
>>>>>>> e697a77b (.)
use Spatie\QueueableAction\QueueableAction;

class SavePhpArrayAction
{
    use QueueableAction;

    public function execute(array $data, string $filename): bool
    {
<<<<<<< HEAD
        $content = "<?php\n\nreturn ".var_export($data, true).";\n";

=======
        $content = "<?php\n\nreturn " . var_export($data, true) . ";\n";
>>>>>>> e697a77b (.)
        return (bool) \Safe\file_put_contents($filename, $content);
    }
}
