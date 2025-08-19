<?php

namespace App\Http\Livewire;
use App\Order;
use DB;
use Mail;
use Livewire\Component;
use App\Mail\CustomMail;

class AdminOrdersComponent extends Component
{
    public function updateStatus($order_id, $status){
        $order = Order::find($order_id);
        $order->status = $status;
        if($status == 'delivered'){
            $order->delivered_date = DB::raw('CURRENT_DATE');
            $this->sendEmail($order, 'Hi, your order has been delievered successfully..');
        }else if($status == 'cancelled'){
         $order->cancelled_date = DB::raw('CURRENT_DATE');
          $this->sendEmail($order, 'Hi, your order has been cancelled due to some reason..');
        }
        $order->save();
        session()->flash('success', 'Order Status Has Been Updated.');
    }
    
     public function sendEmail($order, $message){
        Mail::to($order->email)->send(new CustomMail($order, "Order Has Been $order->status", $message));
    }
    
    public function show(){
       dd('done');
    }
    public function render()
    {
        $products =  Order::orderBy('created_at', 'DESC')->get();
        return view('livewire.admin-orders-component', ['products'=>$products]);
    }
}
