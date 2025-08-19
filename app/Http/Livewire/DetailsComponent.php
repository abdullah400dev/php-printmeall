<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\RProduct;
use Cart;
use App\Variations;
use Illuminate\Http\Request;
use App\helpers;
use Symfony\Component\HttpFoundation\Session\Session;
use App\Helpers\Helper;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
class DetailsComponent extends Component
{
    use WithFileUploads;
    public $attr=[];
    public $slug;
    public $uimage;
    public $usrimage;
    public $price;
    public $oprice;
    public $vals=12;
    public $test='343';
    public $currency="AED";
    public $yesNo = 'Yes';
    public $pids;
    public $pprice;
    public $opprice;
    public $ftime = 1;
    function mount($slug){
        $this->slug = $slug;
        $this->currency=getcurrency();
      //  $this->currency = Helper::test($this->currency);
        
    }

    public function addtocart($product_id, $products_name, $product_price){
        //Session
         $session = new Session();
         $rprouct = RProduct::find($product_id);
         if($session->get('product_type')){
                if($rprouct->type == 2 && $session->get('product_type') == 'gig'){
                    if($session->get('user') != $rprouct->user_id){
                         session()->flash('success_message', 'You can not order differenct services from two users at the same time');
                         return redirect()->route('product.cart');
                    }
                }elseif($rprouct->type != 2 && $session->get('product_type') != 'gig'){
                    
                }else{
                  session()->flash('success_message', 'You can not order service & product at the same time');
                 return redirect()->route('product.cart');
                }
            }else{
              if($rprouct->type == 2){
                     $session->set('product_type', 'gig');
                     $session->set('user', $rprouct->user_id);
                     }else{
                      $session->set('product_type', 'not-gig');
             }
            }
        // End Session
      
        if($this->usrimage){
            $ffile = $this->usrimage;
          //  $extension = $ffile->getClientOriginalExtension();
            $extension = $ffile->getClientOriginalName();
            $filename = time() . '_' . $extension;
            $ffile->storeAs('images', $filename);
            $url = $filename;
            $this->attr['image'] = $url;
        }
        Cart::add($product_id, $products_name, 1, $product_price, $this->attr)->associate('App\RProduct');
        session()->flash('success_message', 'Item Added In the Cart');
        return redirect()->route('product.cart');
       // dd($product_id);
    }
        public function addtowhislist($product_id, $products_name, $product_price){
        Cart::instance('wishlist')->add($product_id, $products_name, 1, $product_price, $this->attr)->associate('App\RProduct');
    }
    
      public function removetowhislist($product_id){
          foreach(Cart::instance('wishlist')->content() as $witms){
        if($witms->id == $product_id){
        Cart::instance('wishlist')->remove($witms->rowId);
        }
     }
    }
    
    public function render(Request $request)
    {
        $products = RProduct::where('slug', $this->slug)->first();
        $this->pids = $products->id;
              if(getcountry() == 'PK'){
        $this->pprice = $products->regular_price; // original price
        $this->opprice = $products->pkr_sale; //sale price
               }elseif(getcountry() == 'UAE'){
            $this->pprice = $products->UaeCurrency; // original price
        $this->opprice = $products->uae_sale; //sale price
               }elseif(getcountry() == 'US'){
                  $this->pprice = $products->sale_price; // original price
        $this->opprice = $products->usd_sale; //sale price
               }
            
        $ip = $request->ip();
        if($this->ftime == 1){
            $this->ftime = 2;
        $variations = Variations::where(['productId'=>$this->pids])->orderBy('id', 'DESC')->first();
        if($variations){
        $fvariation = json_decode($variations->vairations, true);
        foreach($fvariation as $key=>$value){
            $this->attr[$key] = $value;
            $this->change();
            }
          }
        }

        /* $data = \Location::get($ip);
          $countryCode = $data->countryCode;
          if(getcountry()=='US'){
               $this->currency = 'USD';
          }elseif($countryCode=='UAE'){
             $this->currency = 'UAE';  
          }else{
                 $this->currency = 'PKR'; 
          } */
       /* if($this->test=='343'){
        if($products->pkr_sale == '' || $products->pkr_sale == 0){
            if($countryCode == 'US'){
          $this->price = $products->sale_price;  
            }elseif($countryCode == 'UAE'){
                $this->price = $products->UaeCurrency;  
            }else{
                $this->price = $products->regular_price;   
            }
        }else{
            if($countryCode== 'US'){
          $this->price = $products->usd_sale;
                  $this->oprice = $products->sale_price; 
            }elseif($countryCode == 'UAE'){
                $this->price = $products->uae_sale;
                  $this->oprice = $products->UaeCurrency;
            }else{
                  $this->price = $products->pkr_sale;
                  $this->oprice = $products->regular_price;   
            }
        }
        } */
        if($this->test=='343'){
         if($products->uae_sale == '' || $products->uae_sale == 0){
                $this->price = $products->UaeCurrency;   
            }else{
                $this->price = $products->uae_sale;
                  $this->oprice = $products->UaeCurrency;
            }
        }
        if(Auth::check()){
        //    Cart::instance('cart')->store(Auth::user()->email);
            Cart::instance('wishlist')->store(Auth::user()->email);
        }
           if($products->type == 2){
         if(getcountry() == 'PK'){
               $expertsss = array('1'=>'junior', '2'=>'medium', '3'=>'expert');
         $sim = $expertsss[$products->designer->designer->level];
         if(!isset($products->pcategory->gigchagers->$sim)){
             abort(404);
         }
        $this->price = $products->pcategory->gigchagers->$sim; // original price
        $this->oprice = null; //sale price
               }elseif(getcountry() == 'UAE'){
                     $expertsss = array('1'=>'junior_uae', '2'=>'medium_uae', '3'=>'expert_uae');
                   $sim = $expertsss[$products->designer->designer->level];
            $this->price = $products->pcategory->gigchagers->$sim; // original price
        $this->oprice = null; //sale price
               }elseif(getcountry() == 'US'){
                     $expertsss = array('1'=>'junior_usd', '2'=>'medium_usd', '3'=>'expert_usd');
                   $sim = $expertsss[$products->designer->designer->level];
                  $this->price = $products->pcategory->gigchagers->$sim; // original price
        $this->oprice =  null; //sale price
               }
            }
        
      //  $popular_products = RProduct::inRandomOrder()->limit(6)->get();
      //  $related_products = RProduct::where('category_id', $products->id)->inRandomOrder()->limit(6)->get();
     // dd($products->uae_price);
        return view('livewire.details-component',  ['products'=>$products])->layout('layouts.base');
    }
      public function change(){
          $variations = Variations::where('productId', $this->pids)->get();
         $this->attr = array_filter($this->attr, 'strlen');
           $this->yesNo='No';
           foreach($variations as $variations){
           if(json_decode($variations->vairations, true) == $this->attr){
               $this->test= '343673';
               if(getcountry() == 'PK'){
                    if($variations->pkr_price == '' || $variations->sale_pkr_price == 0){
                  $this->price = $variations->pkr_price;
                  $this->oprice = $variations->sale_pkr_price;
                 }else{
                      $this->price = $variations->pkr_price; 
                 }
               $this->yesNo ='Eyees';
               break;
               }elseif(getcountry() == 'UAE'){
                    if($variations->uae_price == '' || $variations->uae_price == 0){
                  $this->price = $variations->uae_sale_price;
                  $this->oprice = $variations->uae_price;
                 }else{
                      $this->price = $variations->uae_price; 
                 }
               $this->yesNo ='Eyees';
               break;
               }elseif(getcountry() == 'US'){
                    if($variations->usd_price == '' || $variations->usd_sale_price == 0){
                  $this->price = $variations->usd_sale_price;
                  $this->oprice = $variations->usd_price;
                 }else{
                      $this->price = $variations->usd_price; 
                 }
               $this->yesNo ='Eyees';
               break;
               }
           }else{
               $this->yesNo='Eno';
              if($this->opprice == '' || $this->opprice == 0){ 
               $this->price = $this->pprice;
               $this->oprice = null;
              }else{
                $this->price = $this->opprice;
                 $this->oprice = $this->pprice;
              }
           }
           }
      } 

}
