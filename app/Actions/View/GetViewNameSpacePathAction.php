<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\View;

<<<<<<< HEAD
use Nwidart\Modules\Facades\Module;
use Spatie\QueueableAction\QueueableAction;
=======
use Illuminate\Support\Arr;
use Illuminate\View\FileViewFinder;
use Modules\Xot\Datas\XotData;
use Spatie\QueueableAction\QueueableAction;
use Webmozart\Assert\Assert;
use Nwidart\Modules\Facades\Module;
>>>>>>> e697a77b (.)

class GetViewNameSpacePathAction
{
    use QueueableAction;

    /**
     * @throws \Exception
     */
    public function execute(?string $module_name = null): string
    {
<<<<<<< HEAD
        if ($module_name !== null && $module_name !== '') {
=======
        if (null !== $module_name && '' !== $module_name) {
>>>>>>> e697a77b (.)
            $module_path = Module::getModulePath($module_name);
            /** @var non-falsy-string $namespace_path */
            $namespace_path = $module_path.'resources/views';
        } else {
            /** @var non-falsy-string $namespace_path */
            $namespace_path = resource_path('views');
        }

        return $namespace_path;
    }
}
