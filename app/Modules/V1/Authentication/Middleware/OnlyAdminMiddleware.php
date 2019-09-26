<?php

namespace App\Modules\V1\Authentication\Middleware;

use App\Models\V1\Role;
use App\Modules\V1\Authentication\Services\AuthenticationService;
use Illuminate\Auth\Access\AuthorizationException;
use Closure;

class OnlyAdminMiddleware
{
    /**
     * Handle an incoming request. Only allow admin
     *
     * @param \Illuminate\Http\Request $request Request
     * @param Closure                  $next    Next request
     *
     * @return mixed
     *
     * @throws AuthorizationException
     */
    public function handle($request, Closure $next, $guard = null)
    {
        $user = AuthenticationService::currentUser();
        if ($user) {
            $roles = $user->roles->pluck('name')->toArray();
            if (!in_array(Role::ADMIN_ROLE, $roles)) {
                throw new AuthorizationException();
            }
        }

        return $next($request);
    }
}
