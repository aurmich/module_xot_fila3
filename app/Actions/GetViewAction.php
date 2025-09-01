<?php

declare(strict_types=1);

namespace Modules\Xot\Actions;

use Illuminate\Support\Str;
use Spatie\QueueableAction\QueueableAction;
use Webmozart\Assert\Assert;

class GetViewAction
{
    use QueueableAction;

    /**
     * Summary of execute.
     *
<<<<<<< HEAD
<<<<<<< HEAD
=======
     * @throws \Exception
>>>>>>> 89d0c8f4 (.)
     *
     * @return view-string
     */
    public function execute(string $tpl = '', string $file0 = ''): string
    {
<<<<<<< HEAD
        if ($file0 === '') {
=======
     * @throws \Exception
     *
     * @return view-string
     */
    public function execute(string $tpl = '', string $file0 = ''): string
    {
        if ('' === $file0) {
>>>>>>> e697a77b (.)
=======
        if ('' === $file0) {
>>>>>>> 89d0c8f4 (.)
            $backtrace = debug_backtrace();
            $file0 = app(File\FixPathAction::class)->execute($backtrace[0]['file'] ?? '');
        }

        $file0 = Str::after($file0, base_path());
        $arr = explode(DIRECTORY_SEPARATOR, $file0);
<<<<<<< HEAD
<<<<<<< HEAD
        if ($arr[0] === '') {
=======
        if ('' === $arr[0]) {
>>>>>>> e697a77b (.)
=======
        if ('' === $arr[0]) {
>>>>>>> 89d0c8f4 (.)
            $arr = array_slice($arr, 1);
            $arr = array_values($arr);
        }

        $mod = $arr[1];
        // $tmp = array_slice($arr, 3);//senza "app"
        $tmp = array_slice($arr, 4); // con "app"

        $tmp = collect($tmp)->map(
            static function ($item) {
                $item = str_replace('.php', '', $item);

                return Str::slug(Str::snake($item));
            }
        )->implode('.');

        $pub_view = 'pub_theme::'.$tmp;
        Assert::string($pub_view, '['.__LINE__.']['.class_basename($this).']');

<<<<<<< HEAD
<<<<<<< HEAD
        if ($tpl !== '') {
=======
        if ('' !== $tpl) {
>>>>>>> e697a77b (.)
=======
        if ('' !== $tpl) {
>>>>>>> 89d0c8f4 (.)
            $pub_view .= '.'.$tpl;
        }
        if (view()->exists($pub_view)) {
            return $pub_view;
        }

        $view = Str::lower($mod).'::'.$tmp;

<<<<<<< HEAD
<<<<<<< HEAD
        if ($tpl !== '') {
=======
        if ('' !== $tpl) {
>>>>>>> e697a77b (.)
=======
        if ('' !== $tpl) {
>>>>>>> 89d0c8f4 (.)
            $view .= '.'.$tpl;
        }

        // if (inAdmin()) {
        if (Str::contains($view, '::panels.actions.')) {
            $to = '::'.(inAdmin() ? 'admin.' : '').'home.acts.';
            $view = Str::replace('::panels.actions.', $to, $view);
            $view = Str::replace('-action', '', $view);
        }

        // }
        Assert::string($view, '['.__LINE__.']['.class_basename($this).']');
        if (! view()->exists($view)) {
            throw new \Exception('View ['.$view.'] not found');
        }

        return $view;
    }
}
