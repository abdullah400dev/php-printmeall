<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Test;
class tests2 extends Model
{
    //
    public function image()
    {
        return $this->morphOne(Test::class, 'imageable');
    }
}
