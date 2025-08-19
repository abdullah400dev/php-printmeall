<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GigCharges extends Model
{
    //
    public function gigcategory(){
      return $this->belongsTo(PCategory::class, 'catgeory');  
    }
}
