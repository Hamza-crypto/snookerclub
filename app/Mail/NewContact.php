<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewContact extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    public function __construct($request)
    {
        $this->data = $request;
    }

    public function build()
    {
        return $this->markdown('emails.new-contact');
    }
}
