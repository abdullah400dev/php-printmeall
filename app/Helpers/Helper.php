<?php
namespace App\Helpers;

use Illuminate\Http\Request;
class Helper{
    public static function test(Request $request){
         $ip = $request->ip();
            $data = \Location::get($ip);
          return  dd($data->countryCode);
    }
}
?>