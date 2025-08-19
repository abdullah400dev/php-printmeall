<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    //
    protected $table = "transactions";
       public function order(){
       return $this->belongsTo(Order::class);
   }
}
