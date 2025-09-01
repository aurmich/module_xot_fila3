<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Module;

<<<<<<< HEAD
<<<<<<< HEAD
=======
use Illuminate\Support\Str;
>>>>>>> e697a77b (.)
=======
use Illuminate\Support\Str;
>>>>>>> 89d0c8f4 (.)
use Illuminate\Support\Facades\File;
use Spatie\QueueableAction\QueueableAction;

class GetModuleConfigAction
{
    use QueueableAction;

<<<<<<< HEAD
<<<<<<< HEAD
    public function execute(string $moduleName, string $config): array
=======
    public function execute(string $moduleName,string $config): array
>>>>>>> 89d0c8f4 (.)
    {
        $configPath = app(GetModulePathByGeneratorAction::class)->execute($moduleName, 'config');
        $configFile=$configPath.'/'.$config.'.php';
        if(!file_exists($configFile)){
            throw new \Exception('Config file not found: '.$configFile);
        }
        dddx(File::getRequire($configFile));
<<<<<<< HEAD

=======
    public function execute(string $moduleName,string $config): array
    {
        $configPath = app(GetModulePathByGeneratorAction::class)->execute($moduleName, 'config');
        $configFile=$configPath.'/'.$config.'.php';
        if(!file_exists($configFile)){
            throw new \Exception('Config file not found: '.$configFile);
        }
        dddx(File::getRequire($configFile));
>>>>>>> e697a77b (.)
=======
>>>>>>> 89d0c8f4 (.)
        return [];
    }
}
