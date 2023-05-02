<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SubscriptionPaymentConfirmed extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    // public function build()
    // {
    //     return $this->markdown('admin.payment.email.subscription_payment_confirmed');
    // }

    public function build(): self
    {
        // return $this->markdown('frontend.signup.email.registration');
        return $this
            ->subject(__('payment.paymentSuccessSubject'))
            // ->text('passwordemail')
            ->view('admin.payment.email.subscription_payment_confirmed', [
                'user' => $this->user,
                'locale' => $this->user['default_locale'],
            ]);
    }
}
