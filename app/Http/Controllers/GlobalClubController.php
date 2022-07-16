<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\BcMaster;
use App\Models\BcLogin;
use App\Models\globalPlanEligiblemember;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use App\Models\Dailyreferralpv;
use App\Models\IncomePlanHistory;
use App\Models\globalPlanIncomePayouthdr;

class GlobalClubController extends Controller
{
    public function globalclub()
    {   
        return view('Reports.globalclubpoints');
    }
    public function fetch_data(Request $request)
    {
        $userid= Session::get('hrc_userid');
        $from_date = Carbon::parse($request->n_fromdate)->toDateTimeString();
        $to_date = Carbon::parse($request->n_todate)->toDateTimeString();
        $data= DB::table('globalplan_income_payouthdr')
        ->join('bc_master', 'bc_master.pn_id', '=', 'globalplan_income_payouthdr.n_id')
        ->where('n_id','=',$userid)
        ->whereDate('d_to','=',$to_date)
        ->orWhereBetween('d_to', [$from_date, $to_date])
        ->select("bc_master.c_username","d_to","n_total_poolhrc","n_eligible_members","n_eligible_income")
        ->get();
       
        return response()->json($data);
    }
     public function globalmembers()
    {   
        return view('Reports.globalclubmembers');
    }
     public function globalclubmembers(Request $request)
    {
                $globalclubmem = globalPlanEligiblemember::where('c_status','Y')->count();
                 return response()->json($globalclubmem);
                

    }
     public function globalclubincome(Request $request)
    {
         $userid= Session::get('hrc_userid');
                    date_default_timezone_set('GMT');
        			$temp= strtotime("+1 hours"); 
        			$currentdateandtime = date("Y-m-d H:i:s",$temp);
        			$currentdate = date("Y-m-d",$temp);
    				$current = date("d-m-Y",$temp);
    			
   	// 			
   	            $todayincomes = globalPlanIncomePayouthdr :: where('n_id','=',$userid)->where('d_to','=',$currentdate)->select('n_eligible_income')->first();
   	            if($todayincomes==null)
                {
                    $todayincomes = 0;
                }
   	            $todayincome =$todayincomes/2;
   	            
	            $subscription = IncomePlanHistory::where(DB::raw("(DATE_FORMAT(created_at,'%d-%m-%Y') )"), '=', $current)->select(DB::raw('SUM(income_plan_history.dedited_amount) as dedited_amount'))->first();
                $totsub= $subscription->dedited_amount;
                $amount=$totsub*5/100;
               
                      
         $result = array (
            'totalbusiness' => $amount,
            'todayincome'=> $todayincome,
            'todayincomess' =>$todayincomes,
         
           
        );
         return response()->json($result);  
                

    }
    
}
