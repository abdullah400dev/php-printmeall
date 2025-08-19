<?php

namespace App\Http\Livewire;
use Cart;
use App\ProductAttribute;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
class CartComponent extends Component
{ 
    public $currency='AED';
    public function cartIncrement($itemId){
         $cart = Cart::content()->where('rowId',$itemId);
       if($cart->isNotEmpty()){
       $products = Cart::get($itemId);
       $qty =  $products->qty+1; 
       Cart::update($itemId, $qty);
       }
    }
    public function cartDecrement($itemId){
         $cart = Cart::content()->where('rowId',$itemId);
       if($cart->isNotEmpty()){
       $products = Cart::get($itemId);
       $qty =  $products->qty-1; 
       Cart::update($itemId, $qty);
       }
    }
    public function deleteItem($itemId){
         $cart = Cart::content()->where('rowId',$itemId);
       if($cart->isNotEmpty()){
          Cart::remove($itemId);
         session()->flash('success_message', 'Item Deleted Successfully');
       }
        if(Cart::count() < 1){
                      $session = new Session();
                      $session->clear();
         }
       }
     public function deleteAll(){
       Cart::destroy();
        $session = new Session();
        $session->clear();
    }
      public function checkout(){
        if(Auth::check()){
            
        }else{
            // return redirect()->route('login');
        }
        return redirect()->route('checkout');
    }
    public function render(Request $request)
    {
      //  session()->put('key12', 'value');
         $this->currency=getcurrency();
         $product_attributes = ProductAttribute::all();
         $ip = $request->ip();
         $data = \Location::get($ip);
          $countryCode = $data->countryCode;
         /* if($countryCode=='US'){
               $this->currency = 'USD';
          }elseif($countryCode=='UAE'){
             $this->currency = 'UAE';  
          }else{
                 $this->currency = 'PKR'; 
          } */
        if(Auth::check()){
            // Cart::instance('wishlist')->restore(Auth::user()->email);
           // Cart::instance('cart')->store(Auth::user()->email);
           // Cart::instance('wishlist')->restore(Auth::user()->email);
        }
        return view('livewire.cart-component', ['product_attributes'=>$product_attributes]);
    }
}
