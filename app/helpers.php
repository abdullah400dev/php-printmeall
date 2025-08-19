<?php
use Illuminate\Http\Request;

 function getcurrency(){
     $countries = array('PK'=>'PKR', 'US'=>'$', 'UAE'=>'AED');
          $ip = \Request::ip();
            $data = \Location::get($ip);
            if(array_key_exists($data->countryCode, $countries)){
          return $countries[$data->countryCode];
            }else{
                $data->countryCode = 'US';
                return $countries[$data->countryCode];
            }
 }
 function getcountry(){
     $countries = array('PK'=>'PKR', 'US'=>'$', 'UAE'=>'AED');
          $ip = \Request::ip();
            $data = \Location::get($ip);
            if(array_key_exists($data->countryCode, $countries)){
          return $data->countryCode;
            }else{
               return $data->countryCode = 'US';
            }
 }
 
 function getsingleprice($product){
     $country = getcountry();
     if($country == 'PK'){
         return $product->regular_price;
     }elseif($country == 'US'){
          return $product->sale_price;
     }elseif($country == 'UAE'){
          return $product->UaeCurrency;
     }
 }
 
function status($id='none'){
     $status = array('0'=>'Pending', '1'=>'Under Review', '2'=>'Rejected', '3'=>'Approved', '5'=>'Waiting For Credit Clearance', '6'=>'Payment Under Review');
           if($id  != 'none'){
            if(array_key_exists($id, $status)){
                   return $status[$id];
            }
           }else{
               return $status;
           }
 }
 
 function userlevel($id = 'none'){
     $levels = array('1'=>'Junior', '2' => 'Medium', '3'=> 'Expert');
     if($id == 'none'){
         return $levels;
     }else{
         return $levels[$id];
     }
 }
?>