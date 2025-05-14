<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Factory as AuthFactory;
use Illuminate\Http\Request;

class CheckPermission
{
    /**
     * Create a new middleware instance.
     *
     * @param AuthFactory $auth
     * @return void
     */
    public function __construct(private readonly AuthFactory $auth)
    {
    }

    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @param string $permission
     * @return mixed
     */
    public function handle(Request $request, Closure $next, string $permission): mixed
    {
        $admin = $this->auth->guard('admin')->user();

        if ($admin && $this->hasPermission($admin, $permission)) {
            return $next($request);
        }

        abort(403, 'Unauthorized action');
    }

    /**
     * Check if the admin has the given permission.
     *
     * @param $admin
     * @param string $permission
     * @return bool
     */
    protected function hasPermission($admin, string $permission): bool
    {
        if (empty($admin->role)) {
            return true;
        }

        $permissions = json_decode($admin->role->permissions, true);
        return in_array($permission, $permissions, true);
    }
}
