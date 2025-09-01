<?php

declare(strict_types=1);

/**
 * @see https://laravel.com/docs/11.x/urls#default-values
 */

namespace Modules\Xot\Http\Middleware;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Symfony\Component\HttpFoundation\Response;

class SetDefaultLocaleForUrls
{
    /**
     * Handle an incoming request.
     *
<<<<<<< HEAD
<<<<<<< HEAD
     * @param  \Closure(Request): (Response)  $next
=======
     * @param \Closure(Request): (Response) $next
>>>>>>> e697a77b (.)
=======
     * @param \Closure(Request): (Response) $next
>>>>>>> 89d0c8f4 (.)
     */
    public function handle(Request $request, \Closure $next): Response
    {
        $user = $request->user();
        $lang = app()->getLocale();
<<<<<<< HEAD
<<<<<<< HEAD
        if ($user !== null) {
=======
        if (null !== $user) {
>>>>>>> e697a77b (.)
=======
        if (null !== $user) {
>>>>>>> 89d0c8f4 (.)
            $lang = $user->lang ?? app()->getLocale();
        }

        URL::defaults(['lang' => $lang]);

        return $next($request);
    }
}
