<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    //
     protected $table = "shippings";
       public function order(){
       return $this->belongsTo(Order::class);
   }
}
