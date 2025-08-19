<?php
namespace App\Http\Controllers;
use Illuminate\Support\Str;
use App\Category;
use App\User;
use Cart;
use Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Quote;
use App\Order;
use App\Credits;
use Carbon\Carbon;
use App\OrderCredits;
use App\Wallet;
use App\VendorData;
use App\DesignerData;
use App\GigCharges;
use App\ordeData;
use App\UserCredits;
use App\Coupon;
use App\Product;
use Notification;
use App\RProduct;
use App\PCategory;
use App\Mail\QuoteMail;
use App\WeightCountry;
use App\Mail\CustomMail;
use App\SubCategory;
use App\RSubCategories;
use App\ProductAttribute;
use Illuminate\Support\Facades\Auth;
use App\Events\UserLogInEvent;
use App\Notifications\QuoteNotification;
use App\Notifications\QuoteResponseNotification;



class MainController extends Controller
{
       public function test(){

          dd($users);
         // event(new UserLogInEvent('Hi, How Are You?'));
        }
    //

    public function top_picks(){
        $designers = User::where(['utype'=>'DES'])->limit(8)->get();
        return view('components.top-picks', ['designers'=>$designers]);
    }


     public function index(){
        $products = RProduct::whereNotIn('id', [21, 23, 22, 24])->take(8)->get();
        $pcategories = PCategory::get();
        $fcategory = RSubCategories::get();
        return view('index', ['products'=>$products, 'pcategories'=>$pcategories,'fcategory'=>$fcategory]);

    }

    public function api(){
        return User::all();
    }

    public function all(){
         $products = RProduct::paginate(9);
        $category = PCategory::all();
        $pcategories = PCategory::all();
        return view('shop.all', ['products'=>$products, 'pcategories'=>$pcategories, 'category'=>$category]);
    }

    public function indexs(){
        if(Auth::check()){
          //  Cart::instance('cart')->restore(Auth::user()->email);
           Cart::instance('wishlist')->restore(Auth::user()->email);
        }

      $products = DB::table('products')->take(6)->get();
      $category = DB::table('categories')->get();
        return view('index', ['category'=>$category,'products'=>$products]);
    }
    public function cat(){
      $categories = Category::with('subcates')->get();
      $products = DB::table('products')->get();
      return view('category', ['products'=>$products, 'categories'=>$categories]);
    }
    public function showproducts(RProduct $product){
     return view('layouts.base', ['products'=>$product, 'slug'=>$product->slug]);
    }

    public function venderordercredits($id){
      $quote = OrderCredits::where(['id'=>$id])->first();
       return view('shop.venderordercredits', ['quote'=>$quote]);
    }


    public function cart(){
        return view('layouts.cart');
    }


    public function orderdtls($id){
        return view('layouts.orderdtls', ['id'=>$id]);
    }

    public function vendordata(){
         if(Auth::check() && Auth::user()->utype == 'VEN'){
              $user = User::find(Auth::user()->id);
              return view('shop.vendordata', ['user'=>$user]);
         }
    }

    public function updatevendordata(Request $req){
         if(Auth::check() && Auth::user()->utype == 'VEN'){
            $venderdata = VendorData::where(['user_id'=>Auth::user()->id])->first();
            if($venderdata){

            }else{
               $venderdata = new  VendorData();
               $venderdata->user_id = Auth::user()->id;
            }

            $venderdata->pressname = $req->pressname;
            $venderdata->location = $req->location;
            $venderdata->phonenum = $req->phonenum;
            $venderdata->bank_name = $req->bank_name;
            $venderdata->account_holdername = $req->rec_name;
            $venderdata->account_num = $req->account_number;
            $venderdata->product_types = json_encode($req->product_types);
            $venderdata->machines_types = json_encode($req->machine_types);
            if($venderdata->save()){
             $user = User::find(Auth::user()->id);
             $user->name = $req->managername;
             if($user->save()){
                 return redirect()->back()->with('success_message','Your Proile Has Been Updated Successfully');
             }
            }
         }
    }

    public function orders(){
        if(Auth::check()){
        $order = Order::where('user_id',Auth::user()->id)->orderBy('created_at', 'Desc')->get();
        return view('shop.orders', ['order'=>$order]);
        }else{
            return redirect('/');
        }
    }

    public function products($id){
        $categories = Category::with('subcates')->get();
        $catdes = DB::table('categories')->where(['id'=>$id])->get();
        $products = DB::table('products')->where(['Cat_Id'=>$id])->get();
        return view('products', ['catdes'=>$catdes, 'products'=>$products, 'categories'=>$categories]);
      }
       public function orderdetails(Order $id){
       // $order = Order::find($id);
        $users = User::where(['utype'=>'VEN'])->get();
         //$catdes = DB::table('categories')->where(['id'=>$id])->get();
      //  $products = DB::table('products')->where(['Cat_Id'=>$id])->get();
               $product_attributes = ProductAttribute::all();
        return view('admin.orderdetails', ['order'=>$id, 'product_attributes'=>$product_attributes, 'users'=>$users]);
      }

      public function qutedtls($id){
          $quote = Quote::find($id);
        return view('shop.quotedetails', ['quote'=>$quote]);
      }

      public function creditprocesss($id){
          $quote = OrderCredits::where(['id'=>$id])->where('user_id', Auth::user()->id)->first();
        return view('shop.creditdtls', ['quote'=>$quote]);
      }

      public function updatepaymentproof(Request $req){
          $ordercredit = OrderCredits::find($req->id);
          $ordercredit->status = 6;
          if($req->file){
              $file = $req->file('file');
              $ffname = $file->getClientOriginalName();
              $extension = $file->getClientOriginalExtension();
              $filename = time().'_'.$ffname;
              $file->move(public_path().'/documents/', $filename);
              $ordercredit->proof = $filename;
          }
          if($ordercredit->save()){
              return redirect()->back()->with('success_message','Your Payment Proof Has Been Sended. As soon as it will be verified, you will be notified');
          }
      }

      public function signledesigner(User $id){
          return view('admin.singledesigner', ['user'=>$id]);
      }

      public function updaterdesigners(Request $req){
          $status = array(0=>'0', 1=>'1');
            $validated = $req->validate([
              'productname' => 'required|max:250',
              'maincatId' => 'required|in:'.implode(",",array_keys(userlevel())),
              'status' => 'required|in:'.implode(",",$status),
            ]);
            $designerdata = DesignerData::where('user_id', $req->id)->first();
            if(!$designerdata){
                $designerdata = new DesignerData();
            }
            $designerdata->status = $req->status;
            $designerdata->user_id = $req->id;
            $designerdata->level = $req->maincatId;
            if($designerdata->save()){
                return redirect()->back()->with('success', 'User level updated Succesfully');
            }
      }

      public function addgigcharges(Request $request){
          $gigcharges = new GigCharges();
          $gigcharges->catgeory = $request->category;
          $gigcharges->junior = $request->junior_rate_pkr;
          $gigcharges->junior_uae = $request->junior_rate_uae;
          $gigcharges->junior_usd = $request->junior_rate_usd;
          $gigcharges->medium = $request->medium_rate_pkr;
          $gigcharges->medium_uae = $request->medium_rate_uae;
          $gigcharges->medium_usd = $request->medium_rate_usd;
          $gigcharges->expert = $request->exp_rate_pkr;
          $gigcharges->expert_uae = $request->exp_rate_uae;
          $gigcharges->expert_usd = $request->exp_rate_usd;
          if($gigcharges->save()){
                return redirect()->back()->with('success', 'New Gig Charges Added Successfully');
          }

      }

      public function updategigcharges(Request $request){
          $gigcharges = GigCharges::find($request->gig_id);
          $gigcharges->catgeory = $request->category;
          $gigcharges->junior = $request->junior_rate_pkr;
          $gigcharges->junior_uae = $request->junior_rate_uae;
          $gigcharges->junior_usd = $request->junior_rate_usd;
          $gigcharges->medium = $request->medium_rate_pkr;
          $gigcharges->medium_uae = $request->medium_rate_uae;
          $gigcharges->medium_usd = $request->medium_rate_usd;
          $gigcharges->expert = $request->exp_rate_pkr;
          $gigcharges->expert_uae = $request->exp_rate_uae;
          $gigcharges->expert_usd = $request->exp_rate_usd;
           if($gigcharges->save()){
                return redirect()->back()->with('success', 'Gig Charges Updated Successfully');
          }
      }

      public function gigchargesid(GigCharges $id){
        $gigcharges = PCategory::all();
          return view('admin.updategigcharges', ['gig'=>$id, 'categories'=>$gigcharges]);
      }

      public function updatepaymentproofstatus(Request $req){
              $ordercredit = OrderCredits::find($req->id);
          if($req->status == 3){
             $ordercredit->status = 3;
             $credits  = UserCredits::where('user_id',$ordercredit->user_id)->first();
             $credits->amount = $credits->amount + $ordercredit->amount;
             $credits->save();
          }else{
              $ordercredit->status = 2;
          }
          $ordercredit->save();
            return redirect()->back()->with('success','Credit Status has been updated');
          }

      public function subproducts($id){
        $categories = Category::with('subcates')->get();
         $catdes = DB::table('sub_categories')->where(['id'=>$id])->get();
        $products = DB::table('products')->where(['Sub_Cat_Id'=>$id])->get();
        return view('products', ['catdes'=>$catdes, 'products'=>$products, 'categories'=>$categories]);
      }

      public function product($id){
          $product = RProduct::where('slug', $id)->first();
          if(!$product){
              abort(404);
          }
        $quotescats = Category::with('subcates')->get();
        return view('product', ['product'=>$product, 'quotescats'=>$quotescats]);
      }

      public function addtocart(Request $req){

        $quote = Quote::find($req->id);

            if($quote->currency == getcurrency()){

            }else{
                return redirect()->back()->with('fail', 'Looks like your location (country) has been changed. Please disable VPN if you are using or a new order quote again with your new location (country).');
            }

        $cfields = json_decode($quote->customfeilds, true);
        if($req->image){
              $file = $req->file('image');
              $ffname = $file->getClientOriginalName();
              $extension = $file->getClientOriginalExtension();
              $filename = time().'_'.$ffname;
              $file->storeAs('images', $filename);
              $cfields['image'] = $filename;
          }
          if($quote->squantity == null){
              $quote->squantity = 1;
          }
        //       Cart::destroy();
        Cart::add($quote->product_id, $quote->product->name, $quote->squantity, $quote->price, $cfields)->associate('App\RProduct');
        return redirect('cart');
      }

      public function editcountry($id){
        $wcountry = WeightCountry::find($id);
        return view('admin.editcountry', ['wcountry'=>$wcountry]);
      }

      public function vendordashbard(){

          return view('shop.vendordashbard');
      }


      public function venderorders(){
          $orders = Order::where('vendor',Auth::user()->id)->orderBy('created_at', 'Desc')->get();
          if($orders){
          return view('shop.venderorders', ['orders'=>$orders]);
          }
          else{
              return redirect('/');
          }
      }


      public function vendorsingleorder($id){
           $order = Order::where('vendor',Auth::user()->id)->where('id', $id)->orderBy('created_at', 'Desc')->first();
           if($order){
          return view('shop.vendorsingleorder', ['order'=>$order]);
          }
          else{
              return redirect('/');
          }
      }


      public function vendorsingleorderpost (Request $req, $id){
         $order = Order::where('vendor',Auth::user()->id)->where('id', $id)->orderBy('created_at', 'Desc')->first();
         $wallet = Wallet::where(['user_id'=>$order->vendor])->firstOrNew();
         $wallet->user_id = $order->vendor;
         if($order->currency = 'AED' || $order->currency = 'PKR'){
           $wallet->pkr_wallet = $wallet->pkr_wallet + $order->vendor_amount;
         }elseif($order->currency = 'AED'){
            $wallet->uae_wallet = $wallet->uae_wallet + $order->vendor_amount;
         }elseif($order->currency = 'USD'){
             $wallet->usa_wallet = $wallet->usa_wallet + $order->vendor_amount;
         }
         $wallet->save();
         if($order){
            $order->status = 'delivered';
            if(Auth::user()->utype == 'DES'){
                if($req->hasfile('file'))
                 {
           $images;
            $i=1;
            foreach($req->file('file') as $file){
            $extension = $file->getClientOriginalExtension();
            $filename = time() .$i.'.' . $extension;
            $file->move(public_path().'/uploads/', $filename);
            $images[] = $filename;
            $i++;
               }
            $orderdata = new ordeData();
            $orderdata->order_id = $order->id;
            $orderdata->designes = json_encode($images);
            $orderdata->save();
              }
            }
            $order->save();
            $message = "Hi, your order has been $order->status";
            Mail::to($order->email)->send(new CustomMail($order, "Order Has Been $order->status", $message));
            return back()->with('success_message', 'Order Status Has Been Update');
          }
          else{
              return redirect('/');
          }
      }

      public function updatecharges(Request $req){
        $country = WeightCountry::find($req->id);
        $country->name =  $req->name;
        $country->countryCode = $req->CountryCode;
        $country->price = $req->charges;
        $country->save();
        return redirect('allcharges')->with('success', 'Country Plus Weight Charges has been Update');
      }


      public function updategetaquote(Request $req){

        $quotes = Quote::find($req->id);
        if($req->image){
          $quotes->image = 1;
        }
        $quotes->fstatus =  2;
        $quotes->price =  $req->input('price');
        $quotes->adminmsg =  $req->input('msg');
        $quotes->save();
         Mail::to('mu4012618@gmail.com')->send(new QuoteMail($quotes));
        return redirect()->back()->with('success', 'Details Has Been Sent To The User');
      }

      public function quotestatus(){
          if(Auth::check()){
        $quotes = Quote::where('userId',Auth::user()->id)->orderBy('created_at', 'Desc')->get();
        return view('shop.quotestatus', ['order'=>$quotes]);
        }else{
            return redirect('/');
        }
      }

      public function creditprocess(){
          if(Auth::check() && Auth::user()->utype =='ORG'){
        $quotes = Credits::where('user_id',Auth::user()->id)->orderBy('created_at', 'Desc')->get();
        $credits  = UserCredits::where('user_id',Auth::user()->id)->first();
        $ordercredits  = OrderCredits::where('user_id',Auth::user()->id)->get();
        return view('shop.creditprocess', ['order'=>$quotes, 'credits'=>$credits, 'ordercredits'=>$ordercredits]);
        }else{
            return redirect('/');
        }
      }

      public function requestforcredit(){
           if(Auth::check() && Auth::user()->utype =='ORG'){
        return view('shop.requestforcredit');
        }else{
            return redirect('/');
        }
      }

      public function requestcredits(Request $req){
         $ordercredits = OrderCredits::where(['user_id'=>Auth::user()->id])->where('status' , '!=', '3')->get();
        if(count($ordercredits) == 0){
        $credit = new Credits();
        $credit->user_id = Auth::user()->id;
        $credit->amount = $req->amount;
        $credit->time = $req->time;
        $credit->currency = getcurrency();
        $credit->status = 0;
        if($req->hasfile('documents'))
        {
           $images;
            $i=1;
            foreach($req->file('documents') as $file){
            $extension = $file->getClientOriginalExtension();
            $filename = time() .$i.'.' . $extension;
            $file->move(public_path().'/documents/', $filename);
            $images[] = $filename;
            $i++;
        }
         $credit->documents = json_encode($images);
        }
        $saved = $credit->save();
        if($saved){
            return redirect()->back()->with('success_message','We have received your request for credits');
           }
        }else{
          return redirect()->back()->with('success_message','Please first clear your pending used credits..');
        }
      }

      public function updateordercreditstatus(Request $req){

         $ordercredit = OrderCredits::find($req->id);
         $ordercredit->status = 5;
         $ordercredit->deadline = Carbon::now()->addDays($ordercredit->time);
         if($req->hasfile('file'))
            {
            $ffile = $req->file('file');
            $extension = $ffile->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $ffile->move(public_path().'/documents/', $filename);
                $ordercredit->document = $filename;
            }
            if($ordercredit->save()){
            return redirect()->back()->with('success','Credit status has been updated');
        }
        }

      public function getaquote(Request $req){
            $displaymsgs = '';
        $displaymsgs .= 'We have recieved your message and product details. We will contact with you shortly. You can check you quote status <a href="https://printmeall.com/quotestatus">here.</a>';
         if(!Auth::check()){
             $userscount = User::where(['email'=>$req->email])->first();
             if(!$userscount){
             $displaymsgs .= ' Your Account has been created with the given email address and password. Please login and check status of your inquiry';
             $usrId = User::create([
                 'name'=>$req->fname,
                 'email'=>$req->email,
                 'password'=>bcrypt($req->password),
                 'utype'=>'USR',
                 ]);
                $uId = $usrId->id;
             }else{
               $uId =  $userscount->id;
             $displaymsgs .= ' Your Account with the give email already exits. So please login using your old credentials and check status of your inquiry';
             }
         }else{
             $uId = Auth::user()->id;
         }
         $quotes = new Quote;
        $customfeilds = $req->except(['_token','fname','lname','phone','email','password','msg', 'productId', 'squantity']);
        $ids =  $req->input('productId');
        $quotes->product_id =  $req->input('productId');
        $quotes->name =  $req->input('fname');
        $quotes->phone =  $req->input('phone');
        $quotes->email =  $req->input('email');
        $quotes->msg =  $req->input('msg');
        $quotes->fstatus = 1;
        $quotes->currency = getcurrency();
        $quotes->userId = $uId;
        $quotes->squantity = $req->input('squantity');
        $quotes->customfeilds = json_encode($customfeilds);
        $quotes->save();
        $urls = '/'.$quotes->id;
          $Data = [
            'name' => 'New Quote Requested',
            'body' => 'You have received a new product inquiry.',
            'thanks' => 'Thank you',
            'url' => url('/msgs').$urls,
        ];
        Notification::route('mail', 'umair.habib02@gmail.com')
              ->notify(new QuoteNotification($Data));
          Notification::route('mail', 'printmeall321@gmail.com')
              ->notify(new QuoteNotification($Data));
        return redirect('/product/'.$ids)->with('success', $displaymsgs);
      }
      public function contact(){
       return view('contactus');
         }
      public function getaquote1(Request $req){
        $quotes = new Quote;
        $quotes->product_id =  0;
        $quotes->name =  $req->input('fname');
        $quotes->phone =  $req->input('phone');
        $quotes->email =  $req->input('email');
        $quotes->msg =  $req->input('msg');
        $quotes->save();
        return redirect('contact-us')->with('success', 'We have recieved Your Messages. We will contact with you shortly.');
      }

    public function addcountrycharges(Request $req){
      $country = new WeightCountry();
      $country->name =  $req->name;
      $country->countryCode = $req->CountryCode;
      $country->price = $req->charges;
      $country->save();
      return redirect('allcharges')->with('success', 'New Country Plus Weight Charges has been added');
    }

    public function addproductquery(Request $req){
        $add = new Product;
        $add->name = $req->input('productname');
        $add->metades = $req->input('metadesc');
        $add->to_price = $req->input('toprice');
        $add->from_price = $req->input('fromprice');
        $add->Cat_Id =  $req->input('category');
        $add->Sub_Cat_Id =  $req->input('subcategory');
        $fimages='';
        if($req->hasfile('fphotos'))
        {

            $ffile = $req->file('fphotos');
            $extension = $ffile->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $ffile->move(public_path().'/images/', $filename);
            $url = 'https://printmeall.com/laravel/public/images/'.$filename;
                $add->fImg = $url;

        }
                $images;
        if($req->hasfile('photos'))
        {
            $i=1;
            foreach( $req->file('photos') as $file){
            $extension = $file->getClientOriginalExtension();
            $filename = time() .$i.'.' . $extension;
            $file->move(public_path().'/images/', $filename);
            $url = 'http://printmeall.com/laravel/public/images/'.$filename;
            $images[] = $url;
            $i++;
        }
                $add->Img = json_encode($images);

        }

        $add->des = $req->input('desc');
         $add->spec = 'No Value';
        $add->save();
        return redirect('addproduct')->with('success', 'You have Successfully Added Product');
    }
    public function checkout(){
         if(!Auth::check()){
            return redirect()->route('login');
        }else{
        return view('layouts.checkout');
        }
    }
        public function addrproductquery(Request $req){
        $add = new RProduct;
        $add->name = $req->input('productname');
        $add->metades = $req->input('metadesc');
        $add->regular_price = $req->input('toprice');
        $add->sale_price = $req->input('fromprice');
        $add->category_id =  $req->input('category');
        $add->subcategory_id =  $req->input('subcategory');
        $fimages='';
        if($req->hasfile('fphotos'))
        {

            $ffile = $req->file('fphotos');
            $extension = $ffile->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $ffile->move(public_path().'/images/', $filename);
            $url = 'https://printmeall.com/laravel/public/images/'.$filename;
                $add->image = $url;

        }
                $images;
        if($req->hasfile('photos'))
        {
            $i=1;
            foreach( $req->file('photos') as $file){
            $extension = $file->getClientOriginalExtension();
            $filename = time() .$i.'.' . $extension;
            $file->move(public_path().'/images/', $filename);
            $url = 'http://printmeall.com/laravel/public/images/'.$filename;
            $images[] = $url;
            $i++;
        }
                $add->images = json_encode($images);

        }

        $add->short_description = $req->input('desc');
        $add->description = $req->input('desc');
        $add->featured = 1;
        $add->stock_status = $req->input('stock');;
        $add->SKU = $req->input('SKU');
        $add->quantity = $req->input('quantity');
        $pname =$req->input('productname');
        $slug = Str::slug($pname, '-');
        $add->slug = $slug;
        $add->save();
        return redirect('addrproduct')->with('success', 'You have Successfully Added Product');
    }
       public function updateproductquery(Request $req){
         $pid = $req->input('pid');
        $add = Product::find($pid);
        $add->name = $req->input('productname');
        $add->metades = $req->input('metadesc');
        $add->to_price = $req->input('toprice');
        $add->from_price = $req->input('fromprice');
        $add->Cat_Id =  $req->input('category');
        $add->Sub_Cat_Id = $req->input('subcategory');
        $images;
        foreach($req->input('OldImages') as $oldImg){
            $images[] =  $oldImg;
        }
                if($req->hasfile('photos'))
        {
            $i=1;
            foreach( $req->file('photos') as $file){
            $extension = $file->getClientOriginalExtension();
            $filename = time() .$i.'.' . $extension;
            $file->move(public_path().'/images/', $filename);
            $url = 'http://printmeall.com/laravel/public/images/'.$filename;
            $images[] = $url;
            $i++;
        }
        }
        $add->Img = json_encode($images);
          $fimages='';
        if($req->hasfile('fphotos'))
        {

            $ffile = $req->file('fphotos');
            $extension = $ffile->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $ffile->move(public_path().'/images/', $filename);
            $url = 'https://printmeall.com/laravel/public/images/'.$filename;
                $add->fImg = $url;
        }
        $add->des = $req->input('desc');
        $add->save();
        return redirect('editproduct/'.$pid)->with('success', 'You have Successfully Updated Product');
    }
            public function updaterproductquery(Request $req){
         $pid = $req->input('pid');
        $add = RProduct::find($pid);
        $add->name = $req->input('productname');
        $add->metades = $req->input('metadesc');
        $add->regular_price = $req->input('toprice');
        $add->sale_price = $req->input('fromprice');
        $add->category_id =  $req->input('category');
        $add->subcategory_id =  $req->input('subcategory');
        $fimages='';
                $images;
        foreach($req->input('OldImages') as $oldImg){
            $images[] =  $oldImg;
        }
                if($req->hasfile('photos'))
        {
            $i=1;
            foreach( $req->file('photos') as $file){
            $extension = $file->getClientOriginalExtension();
            $filename = time() .$i.'.' . $extension;
            $file->move(public_path().'/images/', $filename);
            $url = 'http://printmeall.com/laravel/public/images/'.$filename;
            $images[] = $url;
            $i++;
        }
        }
        $add->images = json_encode($images);
          $fimages='';
        if($req->hasfile('fphotos'))
        {

            $ffile = $req->file('fphotos');
            $extension = $ffile->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $ffile->move(public_path().'/images/', $filename);
            $url = 'https://printmeall.com/laravel/public/images/'.$filename;
                $add->image = $url;
        }

        $add->short_description = $req->input('desc');
        $add->description = $req->input('desc');
        $add->featured = 1;
        $add->stock_status = $req->input('stock');;
        $add->SKU = $req->input('SKU');
        $add->quantity = $req->input('quantity');
        $pname =$req->input('slug');
        $slug = Str::slug($pname, '-');
        $add->slug = $slug;
        $add->save();
        return redirect('addrproduct')->with('success', 'You have Successfully Updated Product');
    }
        public function addcatquery(Request $req){
        $add = new Category;
        $add->name = $req->input('productname');
        $add->metades = $req->input('metadesc');
        $fimages='';
        if($req->hasfile('fphotos'))
        {

            $ffile = $req->file('fphotos');
            $extension = $ffile->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $ffile->move(public_path().'/images/', $filename);
            $url = 'https://printmeall.com/laravel/public/images/'.$filename;
                $add->fImg = $url;
        }
         $add->save();
        return redirect('addcat')->with('success', 'You have Successfully Added Category');
    }
     public function addcouponquery(Request $req){
        $add = new Coupon;
        $add->code = $req->input('coupon-code');
        $add->type = $req->input('coupon-type');
        $add->value = $req->input('coupon-value');
        $add->card_value = $req->input('cart-value');
        $add->expire = $req->input('expire');
         $add->save();
        return redirect('allcoupons')->with('success', 'You have Successfully Added New Coupon');
    }
     public function addattributequery(Request $req){
        $add = new ProductAttribute;
        $add->name = $req->input('name');
         $add->save();
        return redirect('addattribute')->with('success', 'You have Successfully Added New Attribute');
    }
            public function addrcatquery(Request $req){
        $add = new PCategory;
        $add->name = $req->input('productname');
        $add->metades = $req->input('metadesc');
        $name = $req->input('productname');
        $fimages='';
        if($req->hasfile('fphoto'))
        {
            $ffile = $req->file('fphoto');
            $extension = $ffile->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $ffile->move(public_path().'/images/', $filename);
            $url = $filename;
                $add->image = $url;
        }
        $slug = Str::slug($name, '-');
        $add->slug = $slug;
         $add->save();
        return redirect('addrcat')->with('success', 'You have Successfully Added Category');
    }
    public function addsubcatquery(Request $req){
        $add = new SubCategory;
        $add->name = $req->input('productname');
        $add->metades = $req->input('metadesc');
        $add->MainId = $req->input('maincatId');
         if($req->hasfile('fphotos'))
        {

            $ffile = $req->file('fphotos');
            $extension = $ffile->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $ffile->move(public_path().'/images/', $filename);
            $url = 'https://printmeall.com/laravel/public/images/'.$filename;
                $add->fImg = $url;
        }
         $add->save();
        return redirect('addsubcat')->with('success', 'You have Successfully Added SubCategory');
    }
        public function addrsubcatquery(Request $req){
        $add = new RSubCategories;
        $add->name = $req->input('productname');
        $add->metades = $req->input('metadesc');
        $add->MainId = $req->input('maincatId');
        $name = $req->input('productname');
        if($req->hasfile('fphoto'))
        {

            $ffile = $req->file('fphoto');
            $extension = $ffile->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $ffile->move(public_path().'/images/', $filename);
            $url = $filename;
                $add->fImg = $url;
        }
        $slug = Str::slug($name, '-');
        $add->slug = $slug;
        $add->save();
        return redirect('addrsubcat')->with('success', 'You have Successfully Added Shop SubCategory');
    }
    public function editcat($id){
        $cats = DB::table('categories')->where(['id'=>$id])->get();
         return view('admin/editcat', ['cats'=>$cats]);
    }

     public function editcoupon($id){
        $cats = DB::table('coupons')->where(['id'=>$id])->get();
         return view('admin/editcoupon', ['cats'=>$cats]);
    }
    public function editattributes($id){
        $cats = DB::table('product_attributes')->where(['id'=>$id])->get();
         return view('admin/editattributes', ['cats'=>$cats]);
    }
       public function editrcat($id){
        $cats = DB::table('p_categories')->where(['id'=>$id])->get();
       // echo $cats;
       // exit;
         return view('admin/editrcat', ['cats'=>$cats]);
    }

     public function editsubcat($id){
        $cats = SubCategory::with('category')->where(['id'=>$id])->get();
       // echo $cats;
       // exit;
       $mcats = Category::all();
         return view('admin/editsubcat', ['cats'=>$cats, 'mcats'=>$mcats]);
    }
    public function editrsubcat($id){
        $cats = RSubCategories::with('pcategory')->where(['id'=>$id])->get();
       // echo $cats;
       // exit;
       $mcats = PCategory::all();
         return view('admin/editrsubcat', ['cats'=>$cats, 'mcats'=>$mcats]);
    }
    public function editproduct($id){
        $products = Product::with('category', 'subcategory')->where(['id'=>$id])->get();
        $cat =  Category::all();
        $subcat = SubCategory::all();
       // echo $cats;
       // exit;
         return view('admin/editproducts', ['cat'=>$cat , 'products'=>$products, 'subcat'=>$subcat]);
    }
     public function editrproduct($id){
        $products = RProduct::where(['id'=>$id])->first();
        $cat =  PCategory::all();
        $subcat = SubCategory::all();
       // echo $cats;
       // exit;
         return view('admin/editrproduct', ['cat'=>$cat , 'products'=>$products, 'subcat'=>$subcat]);
    }

    public function editcproduct($id){
        $products = RProduct::where(['id'=>$id])->first();
        $cat =  PCategory::all();
        $subcat = SubCategory::all();
       // echo $cats;
       // exit;
         return view('admin/editcproduct', ['cat'=>$cat , 'products'=>$products, 'subcat'=>$subcat]);
    }

       public function updatecatquery(Request $req){
          $id = $req->input('id');
         $add = Category::find($id);
        $add->name = $req->input('productname');
        $add->metades = $req->input('metadesc');
        $fimages='';
        if($req->hasfile('fphotos'))
        {

            $ffile = $req->file('fphotos');
            $extension = $ffile->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $ffile->move(public_path().'/images/', $filename);
            $url = 'https://printmeall.com/laravel/public/images/'.$filename;
                $add->fImg = $url;
        }
         $add->save();
        return redirect('editcat/'.$id)->with('success', 'You have Successfully Updated Category');
    }
    public function updateattquery(Request $req){
          $id = $req->input('id');
         $add = ProductAttribute::find($id);
        $add->name = $req->input('name');
         $add->save();
        return redirect('editattributes/'.$id)->with('success', 'You have Successfully Updated Attribute');
    }

    public function updatecouponquery(Request $req){
          $id = $req->input('id');
         $add = Coupon::find($id);
        $add->code = $req->input('coupon-code');
        $add->type = $req->input('coupon-type');
        $add->value = $req->input('coupon-value');
        $add->card_value = $req->input('cart-value');
        $add->expire = $req->input('expire');
         $add->save();
        return redirect('editcoupon/'.$id)->with('success', 'You have Successfully Updated Coupon');
    }

     public function updatercatquery(Request $req){
          $id = $req->input('id');
         $add = PCategory::find($id);
        $add->name = $req->input('productname');
        $add->metades = $req->input('metadesc');
        $fimages='';
       if($req->hasfile('fphoto'))
        {

            $ffile = $req->file('fphoto');
            $extension = $ffile->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $ffile->move(public_path().'/images/', $filename);
            $url = $filename;
                $add->image = $url;
        }
        $slug = $req->input('slug');
        $slug =  Str::slug($slug, '-');
         $add->slug = $slug;
         $add->save();
        return redirect('editrcat/'.$id)->with('success', 'You have Successfully Updated Category');
    }

    public function updatesubcatquery(Request $req){
          $id = $req->input('id');
         $add = SubCategory::find($id);
        $add->name = $req->input('productname');
        $add->metades = $req->input('metadesc');
        $add->MainId = $req->input('maincatId');
         if($req->hasfile('fphotos'))
        {

            $ffile = $req->file('fphotos');
            $extension = $ffile->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $ffile->move(public_path().'/images/', $filename);
            $url = 'https://printmeall.com/laravel/public/images/'.$filename;
                $add->fImg = $url;
        }
         $add->save();
        return redirect('editsubcat/'.$id)->with('success', 'You have Successfully Updated Sub Category');
    }

        public function updatersubcatquery(Request $req){
          $id = $req->input('id');
         $add = RSubCategories::find($id);
        $add->name = $req->input('productname');
        $add->metades = $req->input('metadesc');
        $add->MainId = $req->input('maincatId');
        if($req->hasfile('fphoto'))
        {

            $ffile = $req->file('fphoto');
            $extension = $ffile->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $ffile->move(public_path().'/images/', $filename);
            $url = $filename;
                $add->fImg = $url;
        }
         $slug = $req->input('slug');
         $slug = Str::slug($slug, '-');
         $add->slug = $slug;
         $add->save();
        return redirect('editrsubcat/'.$id)->with('success', 'You have Successfully Updated Sub Category');
    }

    public function wishlist(){
        return view('shop.whishlist');
    }
       public function deleteproduct($id){
        $products = Product::find($id);
        $products->delete();
             //   $cat =  Category::all();
       // echo $cats;
       // exit;
         return redirect('/home')->with('success', 'Product has Been Successfully Deleted');
    }

    public function designers(Request $request){
        if($request['level']){
         $rproduct = RProduct::whereHas('designer', function($q) use ($request){
             $q->whereHas('designer', function($q) use ($request){
                 $q->where('level','=', $request['level'])->where(['status'=>1]);
             });
         })->where('type', 2)->paginate(12);
        }elseif($request['designer']){
            $rproduct = RProduct::whereHas('designer', function($q) use ($request){
             $q->whereHas('designer', function($q) use ($request){
                 $q->where(['status'=>1]);
             });
         })->where('user_id', $request['designer'])->where('type', 2)->paginate(12);
        }
        else{
             $rproduct = RProduct::whereHas('designer', function($q){
                 $q->whereHas('designer', function($q){
                     $q->where(['status'=>1]);
                 });
             })->where('type', 2)->paginate(12);
        }
        if($request['designer']){
           $designer = User::findOrFail($request['designer']);
        }else{
            $designer = false;
        }
         return view('designers', ['product'=>$rproduct, 'designer'=>$designer]);
    }

    public function updategig($gig){
         $cat =  PCategory::all();
         $subcat = RSubCategories::all();
        $products = RProduct::where('id', $gig)->get();
        return view('gig.updategigs', ['products'=>$products, 'cat'=>$cat, 'subcat'=>$subcat]);
    }

    public function addrgigquery(Request $req){
          $validated = $req->validate([
     'productname' => 'required|max:250',
     'metadesc' => 'required|max:250',
     'category' => 'required',
     'subcategory' => 'required',
     'fphotos' => 'required',
     'photos' => 'required',
     'stock'=> 'required',
      'desc' => 'required'
            ]);
        $add = new RProduct;
        $pname =$req->productname;
        $slug = Str::slug($pname, '-');
        $oldproducts = RProduct::where('slug', $slug)->count();
        if($oldproducts > 1){
         $numericalPrefix = 1;
        while($numericalPrefix){
         $pname = $pname.'-'.$numericalPrefix;
        $slug = Str::slug($pname, '-');
           $oldproducts = RProduct::where('slug', $slug)->count();
           if($oldproducts > 1){
               $numericalPrefix++;
           }else{
        $add->slug = $slug;
           break;

           }
         }
        }else{
            $add->slug = $slug;
        }
        $add->name = $req->productname;
        $add->metades = $req->metadesc;
        $add->category_id =  $req->category;
        $add->subcategory_id =  $req->subcategory;
        $fimages='';
        if($req->fphotos)
        {
            $ffile = $req->fphotos;
            $extension = $ffile->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $ffile->storeAs('images', $filename);
            $url = $filename;
                $add->image = $url;

        }
                $images;
        if($req->photos)
        {
            $i=1;
            foreach( $req->photos as $file){
            $extension = $file->getClientOriginalExtension();
            $filename = time() .$i.'.' . $extension;
            $file->storeAs('images', $filename);
            $url = $filename;
            $images[] = $url;
            $i++;
        }
                $add->images = json_encode($images);

        }

        $add->short_description = $req->desc;
        $add->description = $req->desc;
        $add->featured = 0;
        $add->stock_status = $req->stock;
        $add->SKU = 'GIG';
        $add->quantity = 10;
        $add->type = 2;
        $add->user_id = Auth::user()->id;
        $add->save();
        return redirect()->back()->with('success', 'New Gig Added');
    }

    public function updatergigquery(Request $req){
                  $validated = $req->validate([
     'productname' => 'required|max:250',
     'metadesc' => 'required|max:250',
     'category' => 'required',
     'subcategory' => 'required',
      'desc' => 'required'
            ]);
        $add = RProduct::where('id', $req->pid)->first();
        $add->name = $req->productname;
        $add->metades = $req->metadesc;
        $add->category_id =  $req->category;
        $add->subcategory_id =  $req->subcategory;
        $fimages='';
        if($req->fphotos)
        {
            $ffile = $req->fphotos;
            $extension = $ffile->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $ffile->storeAs('images', $filename);
            $url = $filename;
                $add->image = $url;

        }
                $images;
        if($req->photos)
        {
            $i=1;
            foreach( $req->photos as $file){
            $extension = $file->getClientOriginalExtension();
            $filename = time() .$i.'.' . $extension;
            $file->storeAs('images', $filename);
            $url = $filename;
            $images[] = $url;
            $i++;
        }
                $add->images = json_encode($images);

        }

        $add->short_description = $req->desc;
        $add->description = $req->desc;
        $add->featured = 0;
        $add->stock_status = $req->stock;
        $add->type = 2;
        $add->user_id = Auth::user()->id;
        $add->save();
        return redirect()->back()->with('success', 'Gig Updated Successfully');
    }

    public function addgig(){
         $cat =  PCategory::all();
         $subcat = RSubCategories::all();
      return view('gig.addgig', ['cat'=>$cat, 'subcat'=>$subcat]);
    }

    public function gigs(){
        $rproduct = RProduct::where('user_id', Auth::user()->id)->get();
         return view('gig.gigs', ['gigs'=>$rproduct]);
    }

    public function designerdata(){
        return view('shop.designerdata');
    }

    public function pdesignerdata(Request $request){
       $designerdata = DesignerData::where('user_id', auth()->user()->id)->first();
       if(!$designerdata){
           new DesignerData();
       }
       if($request->image){
         $file =  $request->image;
        $extension = $file->getClientOriginalExtension();
        $filename = time().'.' . $extension;
        $file->storeAs('images', $filename);
        $designerdata->image = $filename;
       }

       $designerdata->user_id = auth()->user()->id;
       $designerdata->description = $request->descripition;
       $designerdata->save();
        return redirect()->back()->with('success', 'Data Updated Successfully');
    }

      public function deletecoupon($id){
        $products = Coupon::find($id);
        $products->delete();
             //   $cat =  Category::all();
       // echo $cats;
       // exit;
         return redirect('/allcoupons')->with('success', 'Coupon has Been Successfully Deleted');
    }

        public function deleterproduct($id){
        $products = RProduct::find($id);
        $products->delete();
             //   $cat =  Category::all();
       // echo $cats;
       // exit;
         return redirect('/home')->with('success', 'Shop Product has Been Successfully Deleted');
    }
       public function deletecat($id){
         if($id=='15' || $id=='16'|| $id=='17')
          {
                    return redirect('/home')->with('success', 'You Have No Permission To Delete This Category');
          }else{
        $products = Category::find($id);
        $products->delete();
             //   $cat =  Category::all();
       // echo $cats;
       // exit;
         return redirect('/home')->with('success', 'Category has Been Successfully Deleted');
          }
    }
         public function deletercat($id){
         if($id=='15' || $id=='16'|| $id=='17')
          {
                    return redirect('/home')->with('success', 'You Have No Permission To Delete This Category');
          }else{
        $products = PCategory::find($id);
        $products->delete();
             //   $cat =  Category::all();
       // echo $cats;
       // exit;
         return redirect('/home')->with('success', 'Shop Category has Been Successfully Deleted');
          }
    }

     public function deletesubcat($id){
        $products = SubCategory::find($id);
        $products->delete();
             //   $cat =  Category::all();
       // echo $cats;
       // exit;
         return redirect('/home')->with('success', 'Sub Category has Been Successfully Deleted');
    }
      public function deletersubcat($id){
        $products = RSubCategories::find($id);
        $products->delete();
             //   $cat =  Category::all();
       // echo $cats;
       // exit;
         return redirect('/home')->with('success', 'Shop Sub Category has Been Successfully Deleted');
    }

}
