<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PaymentTransaction extends Model
{
    use SoftDeletes;

    /**
     * @var string
     */
    protected $table = 'payment_transactions';

    const module_type = [
        'signup' => 'Signup',
        'contact-file' => 'Contact File',
        'upgrade_plan' => 'Upgrade Subscription Plan',
        'renew_plan' => 'Renew Subscription Plan',
        'press-review' => 'Press Review',
        'upgrade_plan' => 'Upgrade Subscription Plan',
        'press-review' => 'Press Review'
    ];
    const payment_type = [
        'cheque' => 'Cheque',
        'bankTransfer' => 'Bank Transfer',
        'cash' => 'Cash',
        'creditCard' => 'Credit Card',
        'debitCard' => 'Debit Card',
    ];
    const payment_mode = [
        'offline' => 'Offline',
        'online' => 'Online',
    ];
    const currency = [
        'usd' => 'USD',
        'dzd' => 'DZD',
        'euro' => 'EURO',
    ];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['transaction_id','module_type','price','currency','payment_mode','payment_type','status','note'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    const status = [
        'completed' => 'Completed',
        'pending'   => 'Pending', 
        'cancel'    => 'Cancel',
    ];

    /**
     * Get the comments for the payment.
     */
    public function customer()
    {
        return $this->hasOne(Customer::class, 'id','customer_id');
    }
}
