<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendReportToClientMail extends Mailable
{
    use Queueable, SerializesModels;

    public $advertisement;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($advertisement)
    {
        $this->advertisement = $advertisement;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.send_report_to_client');
    }
}
