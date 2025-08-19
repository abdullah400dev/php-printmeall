<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;


class RProduct extends Model
{
    //
   // use HasFactory;
    use SoftDeletes;
    protected $table = 'r_products';
    public function attributeValues(){
        return $this->hasMany(AttributeValues::class, 'rproduct_id');
    }
    public function pcategory(){
        return $this->belongsTo(PCategory::class, 'category_id', 'id');
    }
     public function rsubcategory(){
        return $this->belongsTo(RSubCategories::class, 'subcategory_id', 'id');
    }
    
    public function designer(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
