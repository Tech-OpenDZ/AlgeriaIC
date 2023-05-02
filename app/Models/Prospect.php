<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
//use App\Models\Subscription_prospect;
use App\Models\PaymentTransaction;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;

class Prospect extends Authenticatable
{
    use Notifiable,SoftDeletes;

    /**
     * @var string
     */

    protected $table = 'prospect';

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

        //'contact-inquiry',
        'name',
        'subscription_id',
        'parent_id',
        'company',
        'company_name',
        'company_address',
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
        

        'is_deactivated',
        'payment_mode',
        'terms_accepted',
        'payment_status' ,
        'company_type',
        'status',
        'receive_promotions',
        'default_locale'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */


    public static function getProspects(){
        $records = DB::table('prospect')->select('id','name','company', 'company_name','company_address', 'job_title', 'mobile_number', 'email', 'username', 'password', 'note', 'pays', 'wilaya', 'provenance', 'other_provenance', 'subscription_id', 'payment_mode','terms_accepted', 'payment_status','company_type', 'status','receive_promotions', 'default_locale');
        return $records;
    }



    protected $dates = ['deleted_at'];

     /**
     * Get the post that owns the comment.
     */

   

    

   

} 
