<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\BcMaster;
use App\Models\BcLogin;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ReferralFriendsController extends Controller
{
      public function viewRegister(Request $request) 
      {
        
		$referral_code = isset($request->referral) ? $request->referral : '0';

		return view('Referralfriends',['referral'=>$referral_code]);
    
      }
    public function referral()
    {   
        return view('Referral.Referralfriends');
    }
    public function fetch_data(Request $request)
    {
        $userid= Session::get('hrc_userid');
        $from_date = Carbon::parse($request->n_fromdate)->toDateTimeString();
        $to_date = Carbon::parse($request->n_todate)->toDateTimeString();
      
       
            
        $data= DB::table('bc_master')
        ->join('income_plan_history', 'income_plan_history.user_id', '=', 'bc_master.pn_id')
        ->whereDate('bc_master.d_join','=',$to_date)
        ->orWhereBetween('bc_master.d_join', [$from_date, $to_date])
         ->where('n_ref_id','=',$userid)
        ->select('bc_master.c_username','c_fname','bc_master.d_join','c_mobile','c_lname',DB::raw('SUM(income_plan_history.dedited_amount) as dedited_amount'))
        ->get();
    
        return response()->json($data);
    }
    
    public function referal_income(Request $request)
    {
        $userid= Session::get('hrc_userid');
                    date_default_timezone_set('GMT');
        			$temp= strtotime("+1 hours"); 
        			$currentdateandtime = date("Y-m-d H:i:s",$temp);
        			$currentdate = date("Y-m-d",$temp);
    				$current = date("d-m-Y",$temp);
        
        $data= DB::table('income_plan_history')
            ->join('bc_master','bc_master.pn_id', '=', 'income_plan_history.user_id')
            ->where('n_ref_id','=',$userid)
            ->where(DB::raw("(DATE_FORMAT(created_at,'%d-%m-%Y') ) "),'=', $current)
            ->select(DB::raw('SUM(income_plan_history.dedited_amount) as dedited_amount'))->first();
            
          $datas =  $data->dedited_amount;
            if($datas==null)
        {
            $datas = 0;
        }
          
                   $count = BcMaster::where('n_ref_id',$userid)->where('c_aflag','Y')->count();
                  

                 $result= array (
                          'datas'          =>  $datas, 
                          'count'          =>  $count, 
                            );
                            

        return response()->json($result);    

    
                          
    }
}
