<?php

namespace App\Mail;
use App\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderMail extends Mailable
{
    use Queueable, SerializesModels;
    
  //   public Order $orders;
     
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($orders, $subject,  $user= null)
    {
        //
        $this->orders = $orders;
        $this->user = $user;
        $this->subject = $subject;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject($this->subject)->view('mail.order-mail', ['orders'=>$this->orders, 'user' => $this->user]);
    }
}
