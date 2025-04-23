<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Pages;

use Filament\Pages\Dashboard;
use Illuminate\Support\Str;
use Webmozart\Assert\Assert;
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\User;
=======
>>>>>>> e5c56c3 (.)
=======
=======
>>>>>>> 7b67053 (fix: auto resolve conflict)
=======
<<<<<<< HEAD
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\User;
=======
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
<<<<<<< HEAD
>>>>>>> d9307de (fix: auto resolve conflict)
=======
=======
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\User;
>>>>>>> 4ab3760 (.)
>>>>>>> 7b67053 (fix: auto resolve conflict)

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
<<<<<<< HEAD
        $user = Auth::user();
        Assert::notNull($user, '['.__LINE__.']['.class_basename($this).']');

=======
        Assert::notNull($user = auth()->user(), '['.__LINE__.']['.class_basename($this).']');
>>>>>>> e5c56c3 (.)
=======
=======
>>>>>>> 7b67053 (fix: auto resolve conflict)
        Assert::notNull($user = auth()->user(), '['.__LINE__.']['.class_basename($this).']');
=======
<<<<<<< HEAD
        $user = Auth::user();
        Assert::notNull($user, '['.__LINE__.']['.class_basename($this).']');

=======
        Assert::notNull($user = auth()->user(), '['.__LINE__.']['.class_basename($this).']');
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
<<<<<<< HEAD
>>>>>>> d9307de (fix: auto resolve conflict)
=======
=======
        $user = Auth::user();
        Assert::notNull($user, '['.__LINE__.']['.class_basename($this).']');

>>>>>>> 4ab3760 (.)
>>>>>>> 7b67053 (fix: auto resolve conflict)
        $modules = $user->roles->filter(
            static function ($item) {
                return Str::endsWith($item->name, '::admin');
            }
        );

        if (1 === $modules->count()) {
            Assert::notNull($module_first = $modules->first(), '['.__LINE__.']['.class_basename($this).']');
            $panel_name = $module_first->name;
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
            Assert::notNull($module_first = $modules->first(), '['.__LINE__.']['.class_basename($this).']');
            $panel_name = $module_first->name;
=======
<<<<<<< HEAD
            Assert::notNull($module_first = $modules->first(), '['.__LINE__.']['.class_basename($this).']');
            $panel_name = $module_first->name;
=======
            Assert::notNull($modules->first(), '['.__LINE__.']['.class_basename($this).']');
            $panel_name = $modules->first()?->name;
>>>>>>> origin/dev
>>>>>>> origin/dev
<<<<<<< HEAD
>>>>>>> e5c56c3 (.)
=======
=======
            Assert::notNull($modules->first(), '['.__LINE__.']['.class_basename($this).']');
            $panel_name = $modules->first()->name;
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
<<<<<<< HEAD
>>>>>>> d9307de (fix: auto resolve conflict)
=======
=======
>>>>>>> 4ab3760 (.)
>>>>>>> 7b67053 (fix: auto resolve conflict)
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
