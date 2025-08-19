<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductAttribute extends Model
{
    protected $fillable = ['name'];
    //
    public function attributesValues(){
        return $this->hasMany(AttributeValues::class);
    }
}
