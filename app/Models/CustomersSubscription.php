<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomersSubscription extends Model
{

    /**
     * @var string
     */
    protected $table = 'customers_subscriptions';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'customer_id',
        'subscription_id',
        'payment_transaction_id',
        'status',
        'start_date',
        'end_date'
    ];

}
