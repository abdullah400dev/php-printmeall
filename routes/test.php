<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controller\TestController;


/* 
Test Routes */

Route::get('/', function(){
    return 'Route fOR tEST aPI';
});

Route::get('/products', 'TestController@products');
Route::post('/addproduct', 'TestController@addproduct');