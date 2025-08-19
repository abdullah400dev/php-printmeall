<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\SubCategory;
use App\Quote;
use App\Order;
use Mail;
use App\User;
use App\Credits;
use App\UserCredits;
use App\OrderCredits;
use App\Coupon;
use App\Product;
use App\Mail\CredctMail;
use App\WeightCountry;
use App\RProduct;
use App\GigCharges;
use App\PCategory;
use App\RProducts;
use App\RSubCategories;
use App\ProductAttribute;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products =  RProduct::whereNull('formfields')->count();
        $categories = Category::count();
        $subcategories= SubCategory::count();
        $cproducts =  RProduct::where('formfields', '!=', 'null')->count();
        $quotes = Quote::all();
        $quotescount = $quotes->count();
        return view('home', ['categories'=>$categories,'subcategories'=>$subcategories, 'products'=>$products, 'cproducts'=>$cproducts, 'quotescount'=>$quotescount]);
    }
    
        public function addproduct()
    {
        $cat =  Category::all();
        $subcat = SubCategory::all();
        return view('admin/add-product', ['cat'=>$cat, 'subcat'=>$subcat]);
    }
        public function addrproduct()
    {
        return view('admin/add-rproduct');
    }
        public function addcat()
    {
        return view('admin/add-cat');
    }
       public function addcoupon()
    {
        return view('admin/addcoupon');
    }
        public function addattribute()
    {
        return view('admin/addattribute');
    }
        public function addrcat()
    {
        return view('admin/add-category');
    }
       public function addsubcat()
    {
        $cat =  Category::all();
        return view('admin/addsubcat',  ['cats'=>$cat]);
    }
       public function addrsubcat()
    {
        $cat =  PCategory::all();
        return view('admin/addrsubcat',  ['cats'=>$cat]);
    }
        public function getquotes(Request $req)
    {
         if(isset($req['quote']) &&  $req['quote'] == 'requests'){
        $quote =  Quote::type(1)->orderby('id', 'desc')->get();
         }else{
        $quote =  Quote::where('userId', null)->orderby('id', 'desc')->get();
         }
        return view('admin/getquotes', ['quote'=>$quote]);
    }
    
    public function creditrequests(){
        $quote =  Credits::orderby('id', 'desc')->get();
        return view('admin/creditrequests', ['quote'=>$quote]);
   
    }
    
    public function ordercredits($id){
        $quote =  OrderCredits::where(['id'=>$id])->first();
        return view('shop/ordercredits', ['quote'=>$quote]);
    }
    
      public function ordercre(){
        $quote =  OrderCredits::orderBy('id', 'DESC')->get();
        return view('shop/ordercredt', ['quote'=>$quote]);
   
    }
    
    public function availablevendors(){
       $users = User::where(['utype'=>'VEN'])->get();
        return view('admin.availablevendors', ['users'=>$users]);
    }
    
    public function viewvendor($id){
          $users = User::where(['utype'=>'VEN'])->where(['id'=>$id])->first();
          if($users){
        return view('admin.viewvendor', ['users'=>$users]);
          }else{
              dd('No Vendor Found');
          }
   
    }
    
     public function designers(Request $req){
         $users = User::where('utype', 'DES')->get();
         return view('admin.designers', ['quote'=>$users]);
     }
    
    public function gigcharges(){
         $gigcharges = GigCharges::all();
         return view('admin.gigcharges', ['quote'=>$gigcharges]);
    }
    
    public function addgigcharges(){
         $gigcharges = PCategory::all();
         return view('admin.addgigcharges', ['categories'=>$gigcharges]);
    }
    
    public function updatecreditviewstatus(Request $req){
         $quote =  Credits::find($req->id);
         $quote->status = $req->status;
         $quote->reason = $req->reason;
              if($req->status==3){  
                  $ordercredits = OrderCredits::where(['user_id'=>$quote->user_id])->where('status' , '!=', '3')->get();
                 if(count($ordercredits) == 0){
                 }else{
                      return back()->with('success','You can not approved credits as user did not clear his/her previous amount');
                 }
              }
         if($quote->save()){
             if($req->status==3){
                 $ucredits = UserCredits::firstOrNew();
                 $ucredits->user_id = $quote->user_id;
                 $ucredits->amount = $quote->amount;
                 $ucredits->time = $quote->time;
                 $ucredits->currency = $quote->currency;
                 if($ucredits->save()){
                   Mail::to($quote->email)->send(new CredctMail($quote));
                      return back()->with('success','status updated successfully');
                 }
             }else{
                  Mail::to($quote->email)->send(new CredctMail($quote));
                 return back()->with('success','status updated successfully');
             }
         }
    }
    
    public function creditsview($id){
        $quote =  Credits::find($id);
        if($quote){
        return view('admin/creditsview', ['quote'=>$quote]);
        }
   
    }
    
    public function changestatus(){
         $quote =  Quote::where(['status'=>NULL])->update(['status' => 'Read']);
         return redirect('getquotes');
    }
    
      public function allorders()
    {
        return view('admin/allorders');
    }
    
    public function assgnvndr(Request $req){
        $order = Order::find($req->orderid);
        if($order){
            if($order->vendor == null){
             $order->vendor = $req->vendor;  
              $order->vendor_amount = $req->amount;
              if($order->save()){
                return redirect()->back()->with('success', 'Changes Updated Successfully.');
              }
            }
        }
    }
    
      public function allcats()
    {
        $quote =  Category::all();
        return view('admin/allcats', ['products'=>$quote]);
    }
    
     public function allcoupons()
    {
        $quote =  Coupon::all();
        return view('admin/allcoupons', ['products'=>$quote]);
    }
      public function allattributes()
    {
        $quote =  ProductAttribute::all();
        return view('admin/allattributes', ['products'=>$quote]);
    }
          public function allrcats()
    {
        $quote =  PCategory::all();
        return view('admin/allrcats', ['products'=>$quote]);
    }
     public function allsubcats()
    {
        $quote =  SubCategory::all();
        return view('admin/allsubcats', ['products'=>$quote]);
    }
    
      public function allrsubcats()
    {
        $quote =  RSubCategories::all();
        return view('admin/allrsubcats', ['products'=>$quote]);
    }
     public function allproducts()
    {
        $quote =  RProduct::where(['type'=>'1'])->get();
        return view('admin/allproducts', ['products'=>$quote]);
    }
      public function allrproducts()
    {
        $quote =  RProduct::where(['type'=>null])->get();
        return view('admin/allrproducts', ['products'=>$quote]);
    }
    
    public function msgs(Quote $id){
          $quote1 =  Quote::where(['id'=>$id->id])->update(['status' => 'Read']);
          return view('admin/msgsview', ['quote'=>$id]);
    }

  
    public function allcharges(){
        $wcountry =  WeightCountry::all();
        return view('admin/allcharges', ['wcountry'=>$wcountry]);
    }

    public function addcharges(){
        return view('admin/addcharges');
    }
    
    public function addcustomproduct(){
          return view('admin/add-custom-product');
    }

}
