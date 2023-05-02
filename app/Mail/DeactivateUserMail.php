<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class DeactivateUserMail extends Mailable
{
    use Queueable, SerializesModels;
    public $default_locale;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($locale)
    {   
        $this->default_locale = $locale;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(): self
    {
        if($this->default_locale == 'fr'){
            $subject = 'Statut du compte';
        } else {
            $subject = 'Account status';
        }
        // return $this->markdown('admin.subscription.mail.deactivateuser');
        return $this
        ->subject($subject)
        // ->text('passwordemail')
        ->view('admin.subscription.mail.deactivateuser', [
            'locale' => $this->default_locale,
        ]);
    }
}
