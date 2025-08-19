<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CredctMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
     public function __construct($quote)
    {
        //
         $this->quote = $quote;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        if($this->quote->status == 1){
            $subject = 'Your Credits Is Under Reviewed.';
        }elseif($this->quote->status == 3){
             $subject = 'Your credits has been approved';
        }else{
          $subject = 'Your credits has been rejected';   
        }
        return $this->subject($subject)->view('mail.credit-mail', ['quote'=>$this->quote]);
    }
}
