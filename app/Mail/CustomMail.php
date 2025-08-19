<?php

namespace App\Mail;
use App\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CustomMail extends Mailable
{
    use Queueable, SerializesModels;
    
  //   public Order $orders;
     
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($orders, $subject, $body)
    {
        //
        $this->orders = $orders;
        $this->body = $body;
        $this->subject = $subject;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject($this->subject)->view('mail.custom-mail', ['orders'=>$this->orders, 'body' => $this->body]);
    }
}