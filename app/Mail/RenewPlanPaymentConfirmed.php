<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use LaravelLocalization;

class RenewPlanPaymentConfirmed extends Mailable
{
    use Queueable, SerializesModels;

    private $user;

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

    public function build(): self
    {
        // return $this->markdown('frontend.signup.email.registration');
        return $this
        ->subject(__('payment.renewPlanPaymentConfirmedSubject'))
        ->view(
            'admin.payment.email.renew_plan_payment_confirmed',
            [
                'user' => $this->user,
                'locale' => $this->user['default_locale'],
            ]
        );
    }
}
