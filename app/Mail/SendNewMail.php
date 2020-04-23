<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendNewMail extends Mailable
{
    use Queueable, SerializesModels;
    public $message_email;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($message_email)
    {
        $this->message_email = $message_email;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        
        return $this->view('mails.message', compact('this->message_email'));
    }
}
