<?php

namespace App\Http\Controllers;
use Auth;
use App\Wallet;
use App\PaymentRequests;
use App\BankDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;


class WalletController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     
     
    public function index()
    {
        //
        if(!Gate::allows('wallet')){
            abort(403);
        }
        return view('wallet.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
         if(!Gate::allows('wallet')){
            abort(403);
        }
        if($request['currency']){
            if($request['currency'] == 'pkr' || $request['currency'] == 'usd' || $request['currency'] == 'aed'){
                 return view('wallet.withdraw');
            }
        }
        dd('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->currency){
            if($request->currency == 'pkr' || $request->currency == 'usd' || $request->currency == 'aed' ){
            $currecy = array('pkr'=>'pkr_wallet', 'usd'=>'usa_wallet', 'aed'=>'uae_wallet');
             $wallet = Wallet::where('user_id', Auth::user()->id)->first();
             $val = $currecy[$request->currency];
             if($wallet->$val >= $request->amount){
                $paymentrequest = new PaymentRequests();
                $paymentrequest->user_id = Auth::user()->id;
                $paymentrequest->currency = $request->currency;
                $paymentrequest->amount = $request->amount;
                $paymentrequest->status = 0;
                $paymentrequest->save();
                return redirect()->back()->with('success_message', 'New Payment Request Submitted Successfully');
             }else{
                 return redirect()->back()->with('error', 'You have insufficient balance');
             }
                      
            }
        }
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
         if(!Gate::allows('wallet')){
            abort(403);
        }
         return view('wallet.bank');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $request->validate([
            'bank_name'=>'required|max:255',
            'bank_num'=>'required|max:255',
            'bank__holdername'=>'required|max:255'
            ]);
        $bankdeatils = BankDetails::firstOrNew(['user_id' => Auth::user()->id]);
        $bankdeatils->bank_name = $request->bank_name;
        $bankdeatils->account_number = $request->bank_num;
        $bankdeatils->account_name = $request->bank__holdername;
        $bankdeatils->save();
        return redirect()->back()->with('success_message', 'Bank Deatils Updated Successfully');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     
    public function paymentrequests(){
        $request = PaymentRequests::all();
        return view('admin.paymentrequest', ['request'=>$request]);
    }
    
    
   public function singlepaymentrequest(PaymentRequests $id){
            return view('admin.singlepaymentrequest', ['request'=>$id]);
     }
     
  public function updaterpaymentrequest(Request $request){
            $paymentrequest = PaymentRequests::find($request->id);
            $paymentrequest->status = $request->status;
            $paymentrequest->reason = $request->reason;
            if($paymentrequest->save()){
               $wallet = Wallet::where(['user_id'=>$paymentrequest->user_id])->first();
               if($paymentrequest->currency == 'PKR' || $paymentrequest->currency == 'pkr'){
               $wallet->pkr_wallet = $wallet->pkr_wallet - $paymentrequest->amount;
               }elseif($paymentrequest->currency == 'USA'){
                    $wallet->usa_wallet = $wallet->usa_wallet - $paymentrequest->amount;
               }elseif($paymentrequest->currency == 'AED'){
                    $wallet->uae_wallet = $wallet->uae_wallet - $paymentrequest->amount;
               }
                if($wallet->save()){
                    return redirect()->back()->with('success', 'Payment Status Has Been updated');
                }
            }
            
  }
     
    public function destroy($id)
    {
        //
    }
}
