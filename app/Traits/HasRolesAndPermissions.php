<?php

namespace App\Traits;

use App\Models\Subscription;
use App\Models\Permission;
use App\Models\SubscriptionTranslate;

trait HasRolesAndPermissions
{
	/**
	 * @param mixed ...$roles
	 * @return bool
	 */
	public function hasRole($roles) {
		$subscriptions = $this->getSubscriptionName();
	    foreach ($subscriptions as $subscription) {
		     if($subscription->name === $roles) {
	            return true;
	        }
	    }
	    return false;
	}

    public function subscription(){
	 	  return $this->belongsTo(Subscription::class);
	  }

	public function getSubscriptionName(){
	    	$subscription = $this->subscription->localeAll;
	    	return $subscription;
	}

	 public function permissions(){
	 	$permissions = $this->subscription->permissions;
	 	return $permissions;
	 }

	 public function hasPermission($permissions){
        $permission = $this->permissions()->where('name',$permissions)->count();
        if($permission){
        	return true;
        }
	 	return false;
	 }


}