<?php

namespace App\Http\Middleware;

use App\Policies\UserPolicy;
use App\User;
use Closure;
use Illuminate\Support\Facades\Gate;

class LoadAuthenticationPolicies
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        Gate::policy(User::class, UserPolicy::class);

        return $next($request);
    }
}
