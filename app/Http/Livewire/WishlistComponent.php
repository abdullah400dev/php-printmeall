<?php

namespace App\Http\Livewire;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Cart;
class WishlistComponent extends Component
{
    
     public function deleteAll(){
          foreach(Cart::instance('wishlist')->content() as $witms){
        Cart::instance('wishlist')->remove($witms->rowId);
     }
    }
      public function removetowhislist($product_id){
          foreach(Cart::instance('wishlist')->content() as $witms){
        if($witms->id == $product_id){
        Cart::instance('wishlist')->remove($witms->rowId);
        }
     }
    }
    public function render()
    {
        if(Auth::check()){
            Cart::instance('wishlist')->store(Auth::user()->email);
        }
        return view('livewire.wishlist-component');
    }
}
