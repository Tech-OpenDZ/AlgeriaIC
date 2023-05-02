<?php

namespace App\Http\Middleware;

use Closure;

class PermissionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $permission = null)
    {
        if($permission !== null && !auth('customer')->user()->can('has-permission', [$permission, auth('customer')->user()])) {
            return redirect('upgrade-plan');
        }
        return $next($request);
    }
}
