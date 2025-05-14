<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use Illuminate\Http\Request;
use Session;
use Symfony\Component\HttpFoundation\Response;

class UserStatus
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
        if (!$this->isUserPanelActive()) {
            $this->logoutUser();
            abort(Response::HTTP_NOT_FOUND);
        }

        $user = Auth::user();

        if (!$this->isUserActive($user)) {
            $this->logoutUser();
            Session::flash('error', 'Please contact us regarding your account activation!');
            return redirect(route('frontend.index'));
        }

        if (!$this->isEmailVerified($user)) {
            $this->logoutUser();
            Session::flash('error', 'Your email is not verified yet! Please check your email for verification link. Thank you!');
            return redirect(route('frontend.index'));
        }

        return $next($request);
    }

    private function isUserPanelActive(): bool
    {
        return getSettingsValue('is_user_panel') == 1;
    }

    private function isUserActive($user): bool
    {
        return $user->status == 1;
    }

    private function isEmailVerified($user): bool
    {
        return strtolower($user->email_verified) == 'yes';
    }

    private function logoutUser(): void
    {
        Auth::guard('web')->logout();
    }
}
