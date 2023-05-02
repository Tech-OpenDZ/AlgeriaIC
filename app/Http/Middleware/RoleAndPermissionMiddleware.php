<?php

namespace App\Http\Middleware;

use Closure;

class RoleAndPermissionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role, $permission)
    {
        
        $permissions_array = explode('|', $permission);
        if(!auth()->user()->hasRole($role)) {
            abort(404);
        }
         foreach($permissions_array as $permissions){
            if (!auth()->user()->hasPermission($permissions)){
                abort(404);                       
            }
         }
        
       return $next($request);
    }
}
