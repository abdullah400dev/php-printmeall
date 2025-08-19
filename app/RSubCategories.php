<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RSubCategories extends Model
{
    //
    public function pcategory()
    {
      return $this->belongsTo(PCategory::class, 'MainId', 'id');
    }
     public function rproducts()
    {
      return $this->hasMany(RProduct::class, 'subcategory_id', 'id');
    }
}
