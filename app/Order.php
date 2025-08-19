<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
   protected $table = "orders";
   public function user(){
       return $this->belongsTo(User::class);
   }
   public function orderItems(){
       return $this->hasMany(OrderItem::class);
   }
   public function shipping(){
        return $this->hasOne(Shipping::class);
   }
    public function transaction(){
        return $this->hasOne(Transaction::class, 'order_id', 'id');
   }
   
    public function ordercredits(){
        return $this->hasOne(OrderCredits::class, 'order_id');
   }
   
   public function vendororder(){
          return $this->belongsTo(User::class, 'vendor');
   }
   
   public function orderdata(){
        return $this->hasOne(ordeData::class, 'order_id');
   }
}
