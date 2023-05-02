<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use LaravelLocalization;

class SendSuccessfulRegistrationNotification extends Mailable
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
        $locale = LaravelLocalization::getCurrentLocale();
        // return $this->markdown('frontend.signup.email.registration');
        return $this
            ->subject(__('signup.activation_welcome_subject'))
            // ->text('passwordemail')
            ->view('frontend.signup.email.registration', [
                'user' => $this->user,
                'locale' => $locale,
            ]);
    }
}
