<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SetLangMiddleware
{
    /**
     * Handle an incoming request.
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next): mixed
    {
        if (session()->has('lang')) {
            app()->setLocale(session('lang'));
        } else {
            if (!empty(getLang())) {
                app()->setLocale(getLang()->code);
            }
        }

        return $next($request);
    }
}
