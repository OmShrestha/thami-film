<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Symfony\Component\HttpFoundation\Response;

class NormalizeStorageUrl
{
    /**
     * Handle an incoming request.
     *
     * @param Closure(Request): (Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        URL::macro('storage', function ($path) {
            $url = Storage::url($path);
            return str_replace('\\', '/', $url);
        });

        return $next($request);
    }
}
