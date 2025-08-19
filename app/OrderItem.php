<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    //
       protected $table = "order_items";
       public function order(){
       return $this->belongsTo(Order::class);
   }
   public function rproduct(){
       return $this->belongsTo(RProduct::class, 'product_id', 'id')->withTrashed();
   }
}
