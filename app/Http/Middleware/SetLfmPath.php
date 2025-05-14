<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SetLfmPath
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
        if (config('filesystems.disks.public.url') != url('/') . '/assets/lfm') {
            config(['filesystems.disks.public.url' => url('/') . '/assets/lfm']);
        }
        return $next($request);
    }
}
