<?php

namespace App\Models;

use App\Models\Subscription;
use App\Models\PermissionTranslate;
use App\Models\SubscriptionTranslate;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Permission extends Model
{
    use SoftDeletes;

    /**
     * @var string
     */
    protected $table = 'permissions';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    public function localeAll()
    {
        return $this->hasMany(PermissionTranslate::class,'permission_id','id');
    }

    // Define relation between subscriptions and permissions
    public function subscriptions()
    {
        return $this->belongsToMany(Subscription::class,'subscriptions_permissions');
    }

    //  public function subscriptions()
    // {
    //     return $this->belongsToMany(SubscriptionTranslate::class,'subscriptions_permissions');
    // }
}
