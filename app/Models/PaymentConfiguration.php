<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentConfiguration extends Model
{
    /**
     * @var string
     */
    protected $table = 'payment_configurations'; 

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['key','module_type','value']; 

}
