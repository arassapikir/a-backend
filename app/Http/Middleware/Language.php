<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Language
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (session()->has('appLocale'))
        if (session()->has('appLocale') AND in_array(session()->get('appLocale'), config('app.locales'))) {
            app()->setLocale(session()->get('appLocale'));
        }
        else {
            app()->setLocale(config('app.fallback_locale'));
        }
        return $next($request);
    }
}
