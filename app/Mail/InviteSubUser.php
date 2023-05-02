<?php

namespace App\Mail;

use Auth;
use LaravelLocalization;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class InviteSubUser extends Mailable
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
        $currentLocale                  = LaravelLocalization::getCurrentLocale();
        // return $this->markdown('frontend.signup.email.invite_sub_user');
        return $this
            ->subject(Auth::guard('customer')->user()->name.__('my_account.invite_user'))
            // ->text('passwordemail')
            ->view('frontend.signup.email.invite_sub_user', [
                'user' => $this->user,
                'locale' => $currentLocale,
            ]);
    }
}
