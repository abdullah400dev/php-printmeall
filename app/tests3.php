<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Test;
class tests3 extends Model
{
    //
     public function image()
    {
        return $this->morphMany(Test::class, 'imageable');
    }
}
