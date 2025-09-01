<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Pages;

<<<<<<< HEAD
<<<<<<< HEAD
=======
use Filament\Facades\Filament;
use Filament\Pages\Dashboard;
>>>>>>> e697a77b (.)
=======
use Filament\Facades\Filament;
use Filament\Pages\Dashboard;
>>>>>>> 89d0c8f4 (.)
use Illuminate\Support\Str;
use Webmozart\Assert\Assert;

/**
 * Class Modules\Xot\Filament\Pages\MainDashboard.
 */
class MainDashboard extends XotBaseDashboard
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

=======
        
>>>>>>> e697a77b (.)
=======
        
>>>>>>> 89d0c8f4 (.)
        Assert::notNull($user = auth()->user(), '['.__LINE__.']['.class_basename($this).']');
        $modules = $user->roles->filter(
            static function ($item) {
                return Str::endsWith($item->name, '::admin');
            }
        );
<<<<<<< HEAD
<<<<<<< HEAD

        if ($modules->count() === 1) {
=======
        
        if (1 === $modules->count()) {
>>>>>>> e697a77b (.)
=======
        
        if (1 === $modules->count()) {
>>>>>>> 89d0c8f4 (.)
            Assert::notNull($module_first = $modules->first(), '['.__LINE__.']['.class_basename($this).']');
            $panel_name = $module_first->name;
            $module_name = Str::before($panel_name, '::admin');
            $url = '/'.$module_name.'/admin';
            redirect($url);
        }

<<<<<<< HEAD
<<<<<<< HEAD
        if ($modules->count() === 0) {
=======
        if (0 === $modules->count()) {
>>>>>>> e697a77b (.)
=======
        if (0 === $modules->count()) {
>>>>>>> 89d0c8f4 (.)
            $url = '/'.app()->getLocale();
            redirect($url);
        }
    }
}
