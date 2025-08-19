<?php
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\GeoLocationController;
use App\tests3;
use App\tests2;
use App\Test;
use Carbon\Carbon;

use App\Mail\TestMail;
use Illuminate\Support\Facades\Mail;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes(['verify' => true]);

Route::get('scrape', 'TestController@scrape')->name('scrape');

Route::get('/code-redirection', function(){
    return view('test.code-redirection');
});

Route::get('/top-picks', 'MainController@top_picks')->name('top_picks');

Route::get('unsubscribe/{user}', function(Request $request){
    dd($request->all());
})->name('unsubscribe')->middleware('signed');

Route::get('/phpword',  'TestController@phpword')->name('phpword');



Route::post('/addcoderedirection', 'TestController@addcoderedirection');

Route::get('url/{ur}', 'TestController@url');

Route::get('get-address-from-ip', [GeoLocationController::class, 'index']);
//Route::get('/', 'MainController@indexs');


Route::get('/cate', 'MainController@cat');

Route::get('/cat/{id}', 'MainController@products');

Route::get('/subcat/{id}', 'MainController@subproducts');

Route::get('/product/{id}', 'MainController@product');

Route::get('/contact-us', 'MainController@contact');

Route::get('/vendor-data', 'MainController@vendordata');

Route::post('/designerdata', 'MainController@pdesignerdata');

Route::get('/designers', 'MainController@designers');

Route::post('/updatevendordata', 'MainController@updatevendordata');

Route::post('/addrgigquery', 'MainController@addrgigquery');

Route::post('/updatergigquery', 'MainController@updatergigquery');

Route::get('/about-us', function(){
    return view('aboutus');
});

Route::get('/testing/{lang?}', function($lang='en'){
   // Cache::put('usrOnline'.'12', true, Carbon::now()->addMinutes(12));
    echo Cache::has('usrOnline'.'12');
    //echo $lang;
  //return new TestMail();
//  $data = [
 //     'Subject'=>'Mail From Print Me All',
   //   'Body'=>'This is mail body'
   //   ];
//  Mail::to('mu4012618@gmail.com')->send(new TestMail($data));
  // Demo::sayhello();
   // $tests = Test::find(1);
    //dd($tests);
   // App::setlocale($lang);
   // return view('admin.test');
});
Route::get('/test', 'MainController@test');
Route::get('/careers', function(){
    return view('careers');
});
Route::post('getaquote', 'MainController@getaquote');
Route::post('getaquote1', 'MainController@getaquote1');
Route::get('/qutedtls/{id}', 'MainController@qutedtls')->name('qutedtls');
Route::post('/addtocart/', 'MainController@addtocart')->name('addtocart');
Route::get('/vendor-dashbard/', 'MainController@vendordashbard')->name('vendordashbard');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

  Route::post('/updateordercreditstatus', 'MainController@updateordercreditstatus')->name('updateordercreditstatus');


Route::group(['middleware'=>['adminauth']], function(){
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/editcoupon/{id}', 'MainController@editcoupon')->name('editcoupon');
    Route::get('/addproduct', 'HomeController@addproduct')->name('addproduct');
    Route::get('/addrproduct', 'HomeController@addrproduct')->name('addrproduct');
    Route::get('/admin/ordercredits', 'HomeController@ordercre')->name('ordercre');
    Route::get('/ordercredits/{id}', 'HomeController@ordercredits')->name('ordercredits');
    Route::get('/addcustomproduct', 'HomeController@addcustomproduct')->name('addcustomproduct');
    Route::get('/addcat', 'HomeController@addcat')->name('addcat');
    Route::get('/addcoupon', 'HomeController@addcoupon')->name('addcoupon');
    Route::get('/addrcat', 'HomeController@addrcat')->name('addrcat');
    Route::get('/changestatus', 'HomeController@changestatus')->name('changestatus');
    Route::post('/updatecreditviewstatus', 'HomeController@updatecreditviewstatus')->name('updatecreditviewstatus');
    Route::post('/updaterdesigners', 'MainController@updaterdesigners')->name('updaterdesigners');
    Route::get('/getquotes', 'HomeController@getquotes')->name('getquotes');
    Route::get('/addgigcharges', 'HomeController@addgigcharges')->name('addgigcharges');
    Route::post('/addgigcharges', 'MainController@addgigcharges')->name('addgigcharges');
    Route::post('/updategigcharges', 'MainController@updategigcharges')->name('updategigcharges');
    Route::get('/admin/designers', 'HomeController@designers')->name('designers');
    Route::get('/admin/gigcharges', 'HomeController@gigcharges')->name('gigcharges');
    Route::get('/gigcharges/{id}', 'MainController@gigchargesid')->name('gigcharges');
    Route::get('/signledesigner/{id}', 'MainController@signledesigner')->name('signledesigner');
    Route::get('/admin/creditrequests', 'HomeController@creditrequests')->name('creditrequests');
    Route::get('/admin/creditsview/{id}', 'HomeController@creditsview')->name('creditsview');
    Route::get('/editcat/{id}', 'MainController@editcat')->name('editcat');
    Route::get('/editrcat/{id}', 'MainController@editrcat')->name('editrcat');
    Route::get('/editattributes/{id}', 'MainController@editattributes')->name('editattributes');
    Route::get('/editsubcat/{id}', 'MainController@editsubcat')->name('editsubcat');
    Route::get('/editrsubcat/{id}', 'MainController@editrsubcat')->name('editrsubcat');
    Route::get('/deleteproduct/{id}', 'MainController@deleteproduct')->name('deleteproduct');
    Route::get('/deleterproduct/{id}', 'MainController@deleterproduct')->name('deleterproduct');
    Route::get('/deletecat/{id}', 'MainController@deletecat')->name('deletecat');
    Route::get('/deletecoupon/{id}', 'MainController@deletecoupon')->name('deletecoupon');
    Route::get('/deletercat/{id}', 'MainController@deletercat')->name('deletercat');
    Route::get('/msgs/{id}', 'HomeController@msgs')->name('msgs');
    Route::get('/deletesubcat/{id}', 'MainController@deletesubcat')->name('deletesubcat');
    Route::get('/deletersubcat/{id}', 'MainController@deletersubcat')->name('deletersubcat');
    Route::get('/editproduct/{id}', 'MainController@editproduct')->name('editproduct');
    Route::get('/editrproduct/{id}', 'MainController@editrproduct')->name('editrproduct');
    Route::get('/editcproduct/{id}', 'MainController@editcproduct')->name('editcproduct');
    Route::get('/addsubcat', 'HomeController@addsubcat')->name('addsubcat');
    Route::get('/addrsubcat', 'HomeController@addrsubcat')->name('addrsubcat');
    Route::get('/admin/available-vendors', 'HomeController@availablevendors')->name('availablevendors');
    Route::get('/admin/viewvendor/{id}', 'HomeController@viewvendor')->name('viewvendor');
    Route::post('/assgnvndr/', 'HomeController@assgnvndr')->name('assgnvndr');
    Route::get('/homie', [HomeComponent::class, 'render']);    
    Route::get('/orderdetails/{id}', 'MainController@orderdetails')->name('orderdetails');
    Route::get('/allcats', 'HomeController@allcats')->name('allcats');
    Route::get('/allcoupons', 'HomeController@allcoupons')->name('allcoupons');
    Route::get('/allrcats', 'HomeController@allrcats')->name('allrcats');
    Route::get('/allattributes', 'HomeController@allattributes')->name('allattributes');
    Route::get('/allsubcats', 'HomeController@allsubcats')->name('allsubcats');
    Route::get('/allrsubcats', 'HomeController@allrsubcats')->name('allrsubcats');
    Route::get('/allproducts', 'HomeController@allproducts')->name('allproducts');
    Route::get('/allcharges', 'HomeController@allcharges')->name('allcharges');
    Route::get('/allorders', 'HomeController@allorders')->name('allorders');
    Route::get('/addcharges', 'HomeController@addcharges')->name('addcharges');
    Route::post('updategetaquote', 'MainController@updategetaquote');
   Route::get('/allrproducts', 'HomeController@allrproducts')->name('allrproducts');
   Route::post('/addproductquery', 'MainController@addproductquery')->name('addproductquery');
   Route::post('/addrproductquery', 'MainController@addrproductquery')->name('addrproductquery');
   Route::post('/addcountrycharges', 'MainController@addcountrycharges')->name('addcountrycharges');
   Route::get('/editcountry/{id}', 'MainController@editcountry')->name('editcountry');
   Route::post('/updatecharges/', 'MainController@updatecharges')->name('updatecharges');
   Route::post('/addcatquery', 'MainController@addcatquery')->name('addcatquery');
   Route::post('/addcouponquery', 'MainController@addcouponquery')->name('addcouponquery');
   Route::post('/addattributequery', 'MainController@addattributequery')->name('addattributequery');
   Route::post('/addrcatquery', 'MainController@addrcatquery')->name('addrcatquery');
   Route::get('addattribute', 'HomeController@addattribute')->name('addattribute');
   Route::post('/updatesubcatquery', 'MainController@updatesubcatquery')->name('updatesubcatquery');
   Route::post('/updatersubcatquery', 'MainController@updatersubcatquery')->name('updatersubcatquery');
   Route::post('addsubcatquery', 'MainController@addsubcatquery')->name('addsubcat');
   Route::post('addrsubcatquery', 'MainController@addrsubcatquery')->name('addrsubcat');
   Route::post('/updateproductquery', 'MainController@updateproductquery')->name('updateproductquery');
   Route::post('/updaterproductquery', 'MainController@updaterproductquery')->name('updaterproductquery');
   Route::post('/updatecouponquery', 'MainController@updatecouponquery')->name('updatecouponquery');
   Route::post('/updatecatquery', 'MainController@updatecatquery')->name('updatecatquery');
   Route::post('/updateattquery', 'MainController@updateattquery')->name('updateattquery');
   Route::post('/updatercatquery', 'MainController@updatercatquery')->name('updatercatquery');
});



Route::get('/shop', [\App\Http\Livewire\ShopComponent::class, 'render'])->name('shop');
//Route::get('/', [\App\Http\Livewire\ShopComponent::class, 'render'])->name('shop');
Route::get('/','MainController@index');
Route::get('/thankyou', [\App\Http\Livewire\ThankyouComponent::class, 'render'])->name('thankyou');
Route::get('checkout','MainController@checkout')->name('checkout');
Route::get('/cart/', 'MainController@cart')->name('product.cart');
Route::get('/products/{product:slug}', 'MainController@showproducts')->name('showproduct');
Route::get('/orderdtls/{id}', 'MainController@orderdtls')->name('orderdtls');
Route::get('/category/{slug}', [\App\Http\Livewire\CategoryComponent::class, 'render']);
Route::get('all','MainController@all')->name('all');
Route::get('/subcategory/{slug}', [\App\Http\Livewire\RSubCategoryComponent::class, 'render']);
Route::get('/testcomp', [\App\Http\Livewire\TestComponent::class, 'render']);
Route::get('/basic/{slug}/', function(){
    return view('layouts.basic');
});



Route::get('/wishlist', 'MainController@wishlist')->name('wishlist');
Route::middleware(['verified'])->group(function(){
    Route::get('/venderorders', 'MainController@venderorders');
Route::get('/gigs', 'MainController@gigs');
Route::get('/designer-data', 'MainController@designerdata');
Route::get('/addgig', 'MainController@addgig');
Route::get('updategig/{id}', 'MainController@updategig');
Route::get('/quotestatus', 'MainController@quotestatus')->name('quotestatus');
Route::get('/creditprocess', 'MainController@creditprocess')->name('creditprocess');
Route::get('/creditprocess/{id}','MainController@creditprocesss')->name('creditprocesss');
Route::get('/vendorsingleorder/{id}','MainController@vendorsingleorder')->name('vendorsingleorder');
Route::post('/vendorsingleorder/{id}','MainController@vendorsingleorderpost')->name('vendorsingleorderpost');
Route::get('/venderordercredits/{id}','MainController@venderordercredits')->name('venderordercredits');
Route::get('/request-for-credit', 'MainController@requestforcredit')->name('requestforcredit');
Route::post('requestcredits', 'MainController@requestcredits')->name('requestcredits');
Route::post('updatepaymentproof', 'MainController@updatepaymentproof')->name('updatepaymentproof');
Route::post('updatepaymentproofstatus', 'MainController@updatepaymentproofstatus')->name('updatepaymentproofstatus');
Route::get('/orders', 'MainController@orders')->name('orders');
Route::get('admin/paymentrequests', 'WalletController@paymentrequests');
Route::get('admin/paymentrequests/{id}', 'WalletController@singlepaymentrequest');
Route::post('updaterpaymentrequest', 'WalletController@updaterpaymentrequest');
Route::resource('wallet', WalletController::class)->only([
    'index', 'create', 'store', 'show'
]);;

Route::post('/wallet/bank', 'WalletController@update')->name('wallet.bank');
});
Route::get('/user-dashboards', function(){
    if(Auth::check()){
    return view('shop.dashboard');
    }else{
        return redirect('/login');
    }
    })->name('user-dashboards')->middleware('verified');
// For User Or Customer
Route::middleware(['auth:sanctum', 'verified'])->group(
    function(){
        
    });

// For Admin
Route::middleware(['auth:sanctum', 'verified'])->group(
    function(){
        
    });
    
    // For Auth
    //Google
    
    Route::get('login/google', 'Auth\LoginController@redirectToGoogle')->name('login.google');
Route::get('/login/google/callback', 'Auth\LoginController@handleGoogleCallback');

  //Facebook
    
    Route::get('login/facebook', 'Auth\LoginController@redirectToFacebook')->name('login.facebook');
Route::get('login/facebook/callback', 'Auth\LoginController@handleFacebookCallback');


  //Githud
    
    Route::get('login/github', 'Auth\LoginController@redirectToGithub')->name('login.github');
Route::get('login/github/callback', 'Auth\LoginController@handleGithubCallback');


    
    