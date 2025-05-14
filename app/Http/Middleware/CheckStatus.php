<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CheckStatus
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next): mixed
    {
        if (Auth::guard('admin')->check()
            && !empty(Auth::guard('admin')->user()->role_id)
            && Auth::guard('admin')->user()->status == 0) {
            Auth::guard('admin')->logout();
            Session::flash('warning', 'Your account has been banned by administrator!');
            return redirect()->route('admin.login');
        }
        return $next($request);
    }
}
