<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductDetails extends Model
{
    //
    public function products(){
        return $this->BelongsTo(Product::class, 'pid', 'id');
    }
    public function detailsss(){
         return $this->belongsTo(Details::class, 'did', 'id');
    }
}
