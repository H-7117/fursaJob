<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class Hellail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public $mailDate;
    public function __construct($mailDate)
    {
        //
        $this->mailDate = $mailDate;
    }

   public function build()
   {
    return $this->subject('رسائل التواصل من المنصه')
    ->view('email.notfaction')
    ->with('mailDate',$this->mailDate);
   }
}
