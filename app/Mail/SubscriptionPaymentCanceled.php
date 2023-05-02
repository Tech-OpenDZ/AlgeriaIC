<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SubscriptionPaymentCanceled extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
        ->subject(__('payment.paymentSuccessSubject'))
        // ->text('passwordemail')
        ->view('admin.payment.email.subscription_payment_canceled', [
            'user' => $this->user,
            'locale' => $this->user['default_locale'],
        ]);
    }
}
