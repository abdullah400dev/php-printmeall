<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PCategory extends Model
{
    //
    protected $table = 'p_categories';
    
      public function rsubcates()
    {
      return $this->hasMany(RSubCategories::class, 'MainId', 'id');
    }
     public function rproducts()
    {
      return $this->hasMany(RProduct::class, 'category_id', 'id');
    }
     public function gigchagers()
    {
      return $this->hasOne(GigCharges::class, 'catgeory');
    }
}
