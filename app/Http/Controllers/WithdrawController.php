<?php

namespace App\Http\Controllers;

use App\Models\BcMaster;
use App\Models\Currency;
use App\Models\Userinfo;
use App\Models\User_wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class WithdrawController extends Controller
{
    
     public function withdrawview()
    {   
         $userId = session('hrc_userid');
        $trans_psw= BcMaster::where('pn_id', $userId)->select('c_transaction_password')->first();
        $with_psw=$trans_psw->c_transaction_password;
         if(!$with_psw) 
        {
            // $user = Userinfo::where('id', $userId)->select('tfa_status')->first();
            // //  dd($user);exit;
            // if ($user->tfa_status != 1) 
            // {
            //     Session::flash('error', "Please enable TFA");return Redirect::to('dashboardview');
            // }
        }
            $currs = Currency::select('symbol', 'withdraw_status', 'withdraw_fees', 'min_withdraw', 'max_withdraw')->get()->toArray();
            $bals = User_wallet::where('user_id', $userId)->first();
              
            $withs = [];
            foreach ($currs as $curr)
            {
                $withs[$curr['symbol']] = ['status' => $curr['withdraw_status'], 'fees' => $curr['withdraw_fees'], 'min' => $curr['min_withdraw'], 'max' => $curr['max_withdraw'], 'balance' => $bals[$curr['symbol']]];
            }
            $data = compact('withs');
            // dd($data);exit;
            return view('withdraw', $data);
    }
    
    
}
