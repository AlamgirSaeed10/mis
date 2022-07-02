<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class sendSendMail extends Mailable
{
    use Queueable, SerializesModels;
  
    public $details;
  
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->details = $details;
    }
  
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email-template')
        ->attach(url('/assets/images/users/avatar-1.jpg'));
    }
}