<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $table = 'c_products';
    public function attributeValues(){
        return $this->hasMany(AttributeValues::class, 'rproduct_id');
    }
    public function pcategory(){
        return $this->belongsTo(PCategory::class, 'category_id', 'id');
    }
     public function rsubcategory(){
        return $this->belongsTo(RSubCategories::class, 'subcategory_id', 'id');
    }
}
