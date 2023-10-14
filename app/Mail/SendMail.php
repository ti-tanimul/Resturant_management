<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;
    public $name    = '';
    public $mobile  = '';
    public $address = '';
    // public $message = '';
    public function __construct($name, $mobile, $address)
    {
        $this->name     = $name;
        $this->mobile   = $mobile;
        $this->address  = $address;
        // $this->message  = $message;
    }

    /**
     * Get the message envelope.
     */

    public function build(){
        return $this->subject('test Subject')->view('send');
    }




    
   
}
