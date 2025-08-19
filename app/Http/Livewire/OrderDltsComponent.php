<?php

namespace App\Http\Livewire;
use App\Order;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
class OrderDltsComponent extends Component
{
    
     function mount($id){
        $this->id = $id;
    }
    public function render()
    {
        $orders = Order::where('user_id', Auth::user()->id)->where('id', $this->id)->first();
        return view('livewire.order-dlts-component', ['orders' => $orders]);
    }
}
