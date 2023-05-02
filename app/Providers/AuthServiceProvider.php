<?php

namespace App\Providers;

use Auth;
use App\Models\Permission;
//use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Session;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
        Permission::class => PermissionPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        Gate::define('has-permission', function( $user, $permissionToCheck) {
            $permissionNameArray = [];
            $subscription_id = Session::has('subscription_id') ? Session::get('subscription_id') : 0;
            $permissions = Permission::whereHas(
                'subscriptions',
                function ($query) use($subscription_id) {
                    return $query->where('subscription_id', $subscription_id);
                }
            )->select('name')->get();
            foreach($permissions as $permission){
                $permissionNameArray[] = $permission->name;
            }

            return in_array($permissionToCheck, $permissionNameArray);
        });
    }
}
