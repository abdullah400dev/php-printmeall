<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Details extends Model
{
    //
    public function detailsS(){
        return $this->belongsTo(Product::class, 'product_details','did', 'id');
    }
}
