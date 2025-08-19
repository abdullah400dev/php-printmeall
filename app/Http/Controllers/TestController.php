<?php
namespace App\Http\Controllers;
use App\Urls;
use Illuminate\Support\Facades\URL;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;
use PhpOffice\PhpWord\PhpWord;
use Goutte\Client;
use App\User;
use App\RProduct;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
//use Illuminate\Support\Facades\App;




class testController extends Controller
{
    //
    public $results = array();
    
    
    public function products(){
        return RProduct::all();
    }
    
    public function addproduct(Request $request){
        $request->validate([
            'name'=> 'required',
            'message'=>'required'
            ]); 
            return $request->all();
    }
    
    public function phpword(){
       $phpWord = new PhpWord();
       $section = $phpWord->addSection();
       $fontstyles = array('name' => 'Tahoma', 'size' => 10, 'color'=>'red');
       $section->addText(
    '"Learn from yesterday, live for today, hope for tomorrow. '
        . 'The important thing is not to stop questioning." '
        . '(Albert Einstein)',
    $fontstyles
);

     $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
        $objWriter->save('helloWorld.docx');
        return response()->download('helloWorld.docx')->deleteFileAfterSend(true);
    }
    
    public function scrape(Request $req){
       // return URL::signedRoute('unsubscribe', ['user' => 1]);
    //   $clocal = 'games';//\App::currentLocale();
    $users = User::whereRaw('id %2 != 0 ')->get();
    dd($users);
    //   dd($clocal);
        return Storage::getVisibility('62582ffa8b169c0018f36be1.webp');
      // return view('test.scrape');
        $client = new Client();
         $tablenum = 0;
        $url = 'https://zodigames.com/adventure/among-us-sling/'; //'https://www.worldometers.info/coronavirus/country/us/';
        $page = $client->request('GET', $url);
        
       // $page->filter('#maincounter-wrap')->each(function ($item){
         //   $this->results[$item->filter('h1')->text()] = $item->filter('.maincounter-number')->text();
    //    });
      //  $data = $this->results;
      //  echo $page->filter('.maincounter-number')->text();
       // echo '<pre>';
    //    print_r($page);
        $Tbla = $page->filter('#playframe')->each(function ($node) {
            return $node->attr('src');
});
dd($Tbla);
    $myarray = [];
    $i=1;

 $pagedata = $page->filter('#wpsp-272 picture img')->each(function($node2) use (&$myarray, &$i){
                $myarray[$i]['image'] =  $node2->attr('src');
                 $myarray[$i]['link'] =  $node2->attr('src');
                     $i++;
             });
     dd($myarray);

//return view('test.scrape', ['game'=>$Tbla, 'pagedata'=>$pagedata]);
//print($Tbla);
      //  $response = Http::get('https://poki.com/en/g/stickman-hook');
        
      //  dd($page->filter('#app-root'));
        
     //   return $this->results;
        // echo '<pre>';
        // print_r($page);
       // return view('test.scrape', compact('data'));
    }
    
    
    
    
    
    public function addcoderedirection(Request $req){
        $randomnunm = Str::random(5);
        $url = Urls::where(['key'=>$randomnunm])->get();
        if(count($url) > 0){
            $i = true;
        while($i == true){
           $randomnunm = Str::random(5);
        $url = Urls::where(['key'=>$randomnunm])->get();
         if(count($url) == 0){
             break;
         }
         }
        }
        $url = Urls::where(['url'=>$req->url])->get();
        if(count($url) > 0){
             return redirect()->back()->with('error', 'This url already exits');
        }else{
            $url = new Urls();
            $url->url =  $req->url;
            $url->key =  $randomnunm;
            $url->save();
            $fullurl = '<a href="https://printmeall.com/url/'.$randomnunm.'"/> click here</a>';
            return redirect()->back()->with('success', 'Your Url Has Been Saved '.$fullurl);
        }
    }
    
    public function url($url){
        $dburl = Urls::where(['key'=>$url])->first();
        if($dburl){
            $dburl->updated_at = Carbon::now();
            if($dburl->save()){
       return Redirect::to($dburl->url);
            }
        }else{
            dd('Nothing Found');
        }
    }
}
