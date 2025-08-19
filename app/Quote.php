<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    //
    public function product()
   {
   return $this->belongsTo(RProduct::class, 'product_id'); 
   }
   
   public function scopeType($query, $type=null){
      return $query->where('userId', '!=', $type);
   }
    
}
