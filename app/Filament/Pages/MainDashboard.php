<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Pages;

use Filament\Pages\Dashboard;
use Illuminate\Support\Str;
<<<<<<< HEAD
<<<<<<< HEAD
use Webmozart\Assert\Assert;
=======
<<<<<<< HEAD
use Illuminate\Support\Facades\Auth;
use Webmozart\Assert\Assert;
use Modules\User\Models\User;
=======
use Webmozart\Assert\Assert;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\User;
>>>>>>> origin/dev
>>>>>>> 3268b83 (.)
=======
use Illuminate\Support\Facades\Auth;
use Webmozart\Assert\Assert;
use Modules\User\Models\User;
use Webmozart\Assert\Assert;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\User;
 origin/dev
>>>>>>> 355a587 (.)

/**
 * Class Modules\Xot\Filament\Pages\MainDashboard.
 */
class MainDashboard extends Dashboard
{
    protected static ?string $navigationIcon = 'heroicon-o-home';

    protected static string $view = 'xot::filament.pages.dashboard';

    // protected static string $routePath = 'main';

    protected static ?string $title = 'Main Dashboard';

    protected static ?int $navigationSort = 1;

    public function mount(): void
    {
<<<<<<< HEAD
<<<<<<< HEAD
        Assert::notNull($user = auth()->user(), '['.__LINE__.']['.class_basename($this).']');
=======
<<<<<<< HEAD
        /** @var User $user */
        Assert::notNull($user = Auth::user(), '['.__LINE__.']['.class_basename($this).']');
=======
        $user = Auth::user();
        Assert::notNull($user, '['.__LINE__.']['.class_basename($this).']');

>>>>>>> origin/dev
>>>>>>> 3268b83 (.)
=======
        /** @var User $user */
        Assert::notNull($user = Auth::user(), '['.__LINE__.']['.class_basename($this).']');
        $user = Auth::user();
        Assert::notNull($user, '['.__LINE__.']['.class_basename($this).']');

 origin/dev
>>>>>>> 355a587 (.)
        $modules = $user->roles->filter(
            static function ($item) {
                return Str::endsWith($item->name, '::admin');
            }
        );

        if (1 === $modules->count()) {
            Assert::notNull($module_first = $modules->first(), '['.__LINE__.']['.class_basename($this).']');
            $panel_name = $module_first->name;
            $module_name = Str::before($panel_name, '::admin');
            $url = '/'.$module_name.'/admin';
            redirect($url);
        }

        if (0 === $modules->count()) {
            $url = '/'.app()->getLocale();
            redirect($url);
        }
    }
}
