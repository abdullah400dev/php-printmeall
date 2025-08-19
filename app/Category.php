<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\SubCategory;

class Category extends Model
{
    //
    public function subcates()
    {
      return $this->hasMany(SubCategory::class, 'MainId', 'id');
    }
     public function products()
    {
      return $this->hasMany(Product::class, 'Cat_Id', 'id');
    }
}
