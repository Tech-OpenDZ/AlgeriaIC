<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Subscription;
use App\Models\PaymentTransaction;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable; 

class Customer extends Authenticatable
{
    use Notifiable,SoftDeletes;

    /**
     * @var string
     */

    protected $guard = 'customer';

    protected $primaryKey = 'id';

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [

        'contact-inquiry',
        'name',
        'company',
        'company_name',
        'job_title',
        'mobile_number',
        'email',
        'username',
        'password',
        'note',
        'pays',
        'wilaya',
        'provenance',
        'other_provenance',
        'subscription_id',
        'payment_mode',
        'terms_accepted',
        'company_type',
        'status',
        'receive_newsletters',
        'default_locale'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

     /**
     * Get the post that owns the comment.
     */

    public function subscription()
    {
        return $this->belongsTo(Subscription::class);
    }

    public function payments()
    {
        return $this->hasMany(PaymentTransaction::class);
    } 

    public function parent() 
    {
        return $this->hasMany(Customer::class,'parent_id');
    }

} 
