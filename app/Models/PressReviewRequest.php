<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Customer,
    App\Models\PaymentTransaction;

class PressReviewRequest extends Model
{    
    /**
     * @var string
     */
    protected $table = 'press_review_requests'; 

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['customer_id','keyword','sector_id','zone_id','source','start_date','end_date','verified_at','transaction_id','status']; 


    public function customer()
    {
        return $this->hasOne(Customer::class,'id','customer_id');
    }

    public function transaction()
    {
        return $this->belongsTo(PaymentTransaction::class,'transaction_id','transaction_id');
    }

    
}
