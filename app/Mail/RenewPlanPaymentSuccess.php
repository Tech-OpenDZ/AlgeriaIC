<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use LaravelLocalization;

class RenewPlanPaymentSuccess extends Mailable
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
    // public function build()
    // {
    //     return $this->markdown('frontend.payment.email.payment_success');
    // }

    public function build(): self
    {
        $locale = LaravelLocalization::getCurrentLocale();
        // return $this->markdown('frontend.signup.email.registration');
        return $this
        ->subject(__('payment.renewPlanPaymentSuccessSubject'))
        ->view(
            'frontend.payment.email.renew_plan_payment_success',
            [
                'user' => $this->user,
                'locale' => $locale,
            ]
        );
    }
}
