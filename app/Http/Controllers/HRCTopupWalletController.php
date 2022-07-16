<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\BcMaster;
use App\Models\BcLogin;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use App\Models\HrcTopupWallet;

class HRCTopupWalletController extends Controller
{
     public function topupwallet()
    {   
        return view('Reports.topupwallettransaction');
    }
     public function fetch_data(Request $request)
    {
        $userid= Session::get('hrc_userid');
        
        $from_date = Carbon::parse($request->n_fromdate)->toDateTimeString();
        $to_date = Carbon::parse($request->n_todate)->toDateTimeString();
        // \DB::connection()->enableQueryLog();
        $data = DB::table('hrctopup_wallet_transaction_master')->select("d_transcation","c_trans_type","n_trans_amount",'n_from_id','n_to_id')->orWhere('n_to_id', $userid)->orWhere('n_from_id', $userid)->whereDate('d_transcation','=',$to_date)->orWhereBetween('d_transcation', [$from_date, $to_date])->get();
        // $queries = \DB::getQueryLog();
        // dd($queries);
        return response()->json($data);
    }
}
