<?php

namespace App\Http\Livewire;
use Cart;
use Mail;
use Session;
use App\Coupon;
use App\Order;
use App\UserCredits;
use App\Credits;
use App\OrderCredits;
use App\RProduct;
use Carbon\Carbon;
use App\OrderItem;
use App\Shipping;
use App\WeightCountry;
use App\Transaction;
use Illuminate\Http\Request;
use Livewire\Component;
use App\Mail\OrderMail;
use Illuminate\Support\Facades\Auth;
class CheckoutComponent extends Component
{
    public function show(){
        dd(Cart::subtotal());
    }
    public $couponcode;
    public $shipping_different;
    public $fname;
    public $lname;
    public $email;
    public $phone;
    public $line1;
    public $line2;
    public $country;
    public $city;
    public $state;
    public $zipcode;
    
    public $s_fname;
    public $s_lname;
    public $s_email;
    public $s_phone;
    public $s_line1;
    public $s_line2;
    public $s_country;
    public $s_state;
    public $s_city;
    public $s_zipcode;
    public $paymentmode;
    public $thankyou;
    public $discount;
    public $subtotalAfterDiscount;
    public $taxAfterDsicount;
    public $totalAfterDiscount;
    public $currency="AED";
    public $weight = 0;
    public $weightTotal = 0;
    public $tcharges;

    public function update($fields){
       $this->validateOnly($fields, [
        'fname' => 'required',
     'lname' => 'required',
     'email' => 'required|email',
     'phone' => 'required|numeric',
     'line1' => 'required',
     'city' => 'required',
     'state' => 'required',
     'zipcode' => 'required',
     'country'=> 'required'
        ]);
        
     if($this->shipping_different){
            $this->validateOnly($fields, [
     's_fname' => 'required',
     's_lname' => 'required',
     's_email' => 'required|email',
     's_phone' => 'required|numeric',
     's_line1' => 'required',
     's_city' => 'required',
     's_state' => 'required',
     's_zipcode' => 'required',
     's_country'=> 'required',
    'paymentmode' => 'required'
                ]);
        }
    }
    public function placeOrder(){
       // dd('hehe');
        foreach(Cart::content() as $item){
        }
              $this->validate([
     'fname' => 'required',
     'lname' => 'required',
     'email' => 'required|email',
     'phone' => 'required|numeric',
     'line1' => 'required',
     'city' => 'required',
     'state' => 'required',
     'zipcode' => 'required',
     'country'=> 'required',
     'paymentmode' => 'required'
            ]);
             if($this->paymentmode == 'cod' || $this->paymentmode == 'credit'){
                 
             }
             else{
                 dd('Something went wrong in payment mode');
             }
        $order = new Order();
        $order->user_id = Auth::user()->id;
        if(session()->has('coupon')){
        $order->subtotal = $this->subtotalAfterDiscount;
        $order->discount = $this->discount; //session()->get('checkout')['discount'];
        $order->tax = $this->taxAfterDsicount; //session()->get('checkout')['tax'];
        $order->total = $this->totalAfterDiscount; 
        }else{
        $order->subtotal = Cart::subtotal();
        $order->discount = '00.0'; //session()->get('checkout')['discount'];
        $order->tax = '00.0';//$this->weight; //session()->get('checkout')['tax'];
        $order->total = Cart::total();    //$this->weightTotal;//
        }
        $order->currency = getcurrency();
        $order->firstname =  $this->fname;
        $order->lastname =	$this->lname;
        $order->mobile =$this->phone;
        $order->email =$this->email;
        $order->line1 =$this->line1;
        $order->line2 =$this->line2;
        $order->city =$this->city;
        $order->province = $this->state;
        $order->country = $this->country;
        $order->zipcode = $this->zipcode;
        $order->status = 'ordered';
        $order->is_shipping_different = $this->shipping_different ? 1:0;
        $order->save();
        
        foreach(Cart::content() as $item){ 
            //instant('cart');
            $orderItem = new OrderItem();
            $orderItem->product_id = $item->id;
            $orderItem->order_id = $order->id;
            $orderItem->price = $item->price;
            $orderItem->quantity = $item->qty;
            if($item->options){
                $orderItem->options = serialize($item->options);
                
            }
            $orderItem->save();
           $rproducts = RProduct::where('id', $item->id)->where('type', 2)->first();
           if($rproducts){
                $order->vendor = $rproducts->user_id;   
                $order->vendor_amount = Cart::subtotal(); 
                $order->save();
              //  dd($rproducts->user_id);
           }
                    if($this->paymentmode == 'credit'){
         $carttotalvalue = str_replace( ',', '', Cart::total());
        $carttotalvalue = (int)$carttotalvalue ;
                if(Auth::user()->utype == 'ORG' && Auth::user()->credits->amount >= $carttotalvalue){
                    $usercredits = UserCredits::where(['user_id'=>Auth::user()->id])->first();
                       $usercredits->amount = $usercredits->amount - $carttotalvalue;
                    $usercredits->save();
                    $ordercredit = new OrderCredits();
                    $ordercredit->user_id =  Auth::user()->id;
                    $ordercredit->order_id =  $order->id;
                    $ordercredit->amount =  $carttotalvalue;
                    $ordercredit->time =  $usercredits->time;
                    $ordercredit->status =  0;
                    $ordercredit->currency =  $this->currency;
                    $ordercredit->save();
                }else{
                    dd('Something Went Wrong');
                }
            }
        }
        if($this->shipping_different){
            $this->validate ([
     's_fname' => 'required',
     's_lname' => 'required',
     's_email' => 'required|email',
     's_phone' => 'required|numeric',
     's_line1' => 'required',
     's_line2' => 'required',
     's_city' => 'required',
     's_state' => 'required',
     's_zipcode' => 'required',
     's_country'=> 'required'
                ]);
        $shipping = new Shipping();
        $shipping->order_id =  $order->id;
        $shipping->firstname =  $this->s_fname;
        $shipping->lastname =	$this->s_lname;
        $shipping->mobile =$this->s_phone;
        $shipping->email =$this->s_email;
        $shipping->line1 =$this->s_line1;
        $shipping->line2 =$this->s_line2;
        $shipping->city =$this->s_city;
        $shipping->province = $this->s_state;
        $shipping->country = $this->s_country;
        $shipping->zipcode = $this->s_zipcode;
        $shipping->save();
        }
        if($this->paymentmode == 'cod' || $this->paymentmode == 'credit'){
            $transaction = new Transaction();
            $transaction->user_id = Auth::user()->id;
            $transaction->order_id = $order->id;
            $transaction->mode  = $this->paymentmode;
            $transaction->status = 'pending';
            $transaction->save();
        }
        $this->thankyou = 1;
        Cart::destroy();
        $this->sendEmail($order);
        return redirect()->route('thankyou');
        //Cart::instance('cart')->destroy();
       // session()->forget('checkout');
    }
 public function sendEmail($order){
        Mail::to($order->email)->send(new OrderMail($order, 'Order Confirmation'));
        Mail::to('printmeall321@gmail.com')->send(new OrderMail($order, 'New Order Requested', 'admin'));
    }
    public function verifyForCheckout(){
       /* if(!Auth::check()){
            return redirect()->route('login');
        }else if($this->thankyou = 1){
            return redirect()->route('thankyou');
        }else if(!session()->get('checkout')){
             return redirect()->route('product.cart');
        } */
    }
    public function applyCouponCode(){
         $cartsubtotalvalue = str_replace( ',', '', Cart::subtotal());
        $cartsubtotalvalue = (int)$cartsubtotalvalue ;
        $coupon = Coupon::where('code', $this->couponcode)->where('expire', '>=', Carbon::today())->where('card_value' ,'<', $cartsubtotalvalue)->first();
        if(!$coupon){
           session()->flash('failed_message', 'Coupon Is Not Valid');
            return;
        }
        
        session()->put('coupon', [
        'code' =>$coupon->code,
        'type' =>$coupon->type,
        'value' => $coupon->value,
        'card_value'=>$coupon->card_value
        ]);
    }
    public function removecoupon(){
        session()->forget('coupon');
    }
    public function calculateDiscounts(){
         $cartsubtotalvalue = str_replace( ',', '', Cart::subtotal());
        $cartsubtotalvalue = (int)$cartsubtotalvalue ;
        if(session()->has('coupon')){
            if(session()->get('coupon')['type']=='fixed'){
                $this->discount = session()->get('coupon')['value'];
            }else{
                $this->discount = ($cartsubtotalvalue * session()->get('coupon')['value'])/100;
            }
            
            $this->subtotalAfterDiscount = $cartsubtotalvalue - $this->discount;
            $this->taxAfterDsicount  = ($this->subtotalAfterDiscount * Cart::tax())/100;
            $this->totalAfterDiscount = $this->subtotalAfterDiscount + $this->taxAfterDsicount;
        }
        
    }
    
    public function shipcountry($value = 'US'){
        if($this->shipping_different){
            $this->s_shipcountry($value);
            return false;
        }
         $tcharges = 0;
       $councode = WeightCountry::where(['countryCode'=>$value])->first();
         if($councode){
         $tcharges = $councode->price;
         }else{
         $councode = WeightCountry::where(['countryCode'=>'US'])->first();
         $tcharges = $councode->price; 
         }
            $singleweight = 0;
           $this->weight = 0;
         /* foreach(Cart::content() as $item){
              if(array_key_exists('3',$item->options->toArray())){
            $singleweight = $item->options->toArray()[3] * $item->model->weight * $item->qty;
              }else{
            $singleweight = $item->qty * $item->model->weight;
              }
              $this->weight = $this->weight + $singleweight;
          }*/
          $this->weight = $this->weight * 0.001; // Into Kilogram
          $this->weight = $this->weight * $tcharges; // Into Charges
          $this->weight = round($this->weight, 2);
          $weightTotals = str_replace( ',', '', Cart::subtotal());
          $this->weightTotal = (float)$weightTotals;
          $this->weightTotal = $this->weightTotal + $this->weight;
    }
        public function s_shipcountry($value = 'US'){
         $tcharges = 0;
       $councode = WeightCountry::where(['countryCode'=>$value])->first();
         if($councode){
         $tcharges = $councode->price;
         }else{
         $councode = WeightCountry::where(['countryCode'=>'US'])->first();
         $tcharges = $councode->price; 
         }
            $singleweight = 0;
           $this->weight = 0;
          foreach(Cart::content() as $item){
              if(array_key_exists('3',$item->options->toArray())){
            $singleweight = $item->options->toArray()[3] * $item->model->weight * $item->qty;
              }else{
            $singleweight = $item->qty * $item->model->weight;
              }
              $this->weight = $this->weight + $singleweight;
          }
          $this->weight = $this->weight * 0.001; // Into Kilogram
          $this->weight = $this->weight * $tcharges; // Into Charges
          $this->weight = round($this->weight, 2);
          $weightTotals = str_replace( ',', '', Cart::subtotal());
          $this->weightTotal = (float)$weightTotals;
          $this->weightTotal = $this->weightTotal + $this->weight;
    }

    public function render(Request $request)
    {
        $this->currency=getcurrency();
        if(!$this->weight){
        // $this->shipcountry();   
        }
       /*   $ip = $request->ip();
         $data = \Location::get($ip);
         $countryCode = $data->countryCode;
         $councode = WeightCountry::where(['countryCode'=>$countryCode])->first();
         if($councode){
         $tcharges = $councode->price;
         }else{
         $councode = WeightCountry::where(['countryCode'=>'US'])->first();
         $tcharges = $councode->price;
         }
         if($countryCode=='US'){
               $this->currency = 'USD';
          }elseif($countryCode=='UAE'){
             $this->currency = 'UAE';  
          }else{
                 $this->currency = 'PKR'; 
          } */
          if(session()->has('coupon')){
                    if(Cart::subtotal() < session()->get('coupon')['card_value']){
                        session()->forget('coupon');
                    }else{
                        $this->calculateDiscounts();
                    }
                }
         $this->verifyForCheckout();
        return view('livewire.checkout-component');
    }
}
