<?php 
namespace App\Demo;
use Illuminate\Support\Facades\Facade;
class DemoFacade extends Facade{
    protected static function getFacadeAccessor(){
        return 'Hi Accessor';
    }
}