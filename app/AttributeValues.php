<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AttributeValues extends Model
{
    //
    public function productValues(){
        return $this->belongsTo(ProductAttribute::class, 'product_attribute_id');
    }
}
