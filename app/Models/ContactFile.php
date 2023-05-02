<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Sector;
//use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Zone;
use App\Models\Customer,
    App\Models\PaymentTransaction;

class ContactFile extends Model
{
    //use SoftDeletes;

    protected $table = 'contact_file_generation_requests';

    protected $guarded = ['id'];

    public function customer()
    {
        return $this->hasOne(Customer::class,'id','customer_id');
    }

    public function transaction()
    {
        return $this->belongsTo(PaymentTransaction::class,'transaction_id','transaction_id');
    }

}
