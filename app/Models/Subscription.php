<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\SubscriptionTranslate;
use App\Models\Permission;
use App\Models\Customers;

class Subscription extends Model
{

    use SoftDeletes;

    /**
     * @var string
     */
    protected $table = 'subscriptions';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'plan_name', 'description', 'duration', 'no_of_users', 'price_dollar', 'price_dzd', 'price_euro', 'status'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];


    public function localeAll()
    {
        return $this->hasMany(SubscriptionTranslate::class,'subscription_id','id');
    }


    //Define relations between subscriptions and permissions
    public function permissions()
    {
        return $this->belongsToMany(Permission::class,'subscriptions_permissions');
    }

    /**
     * Get the comments for the blog post.
     */
    public function customers()
    {
        return $this->hasMany(Customer::class);
    }

}
