<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\BcMaster;
use App\Models\BcLogin;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use App\Models\Dailyreferralpv;

class RoyalReferalPointsController extends Controller
{
    public function royalreferal()
    {   
        return view('Reports.royalreferalpoints');
    }
    public function fetch_data(Request $request)
    {
        $userid= Session::get('hrc_userid');
        $from_date = Carbon::parse($request->n_fromdate)->toDateTimeString();
        $to_date = Carbon::parse($request->n_todate)->toDateTimeString();
        $data= DB::table('royalplan_income_payouthdr')
        ->join('bc_master', 'bc_master.pn_id', '=', 'royalplan_income_payouthdr.n_id')
        ->where('n_id','=',$userid)
        ->whereDate('d_to','=',$to_date)
        ->orWhereBetween('d_to', [$from_date, $to_date])
        ->select("bc_master.c_username","d_to","n_total_poolhrc","n_eligible_members","n_eligible_income",'n_rank','n_precentage')
        ->get();
       
        return response()->json($data);
    }
    
    public function royalreferalachieve()
    {   
         $data = DB::table('royalplan_eligible_members')
        ->where('c_status','=','Y')
        ->select('d_to')
        ->distinct()
        ->get();
        return view('Reports.royalrefferal', ['data' => $data]);
    }
    
    
     public function royalreferralach(Request $request)
    {
        $userid= Session::get('hrc_userid');
       
       $today = Carbon::now()->format('Y-m-d');
        // $data= DB::table('royalplan_eligible_members')
        //  ->join('bc_master', 'bc_master.pn_id', '=', 'royalplan_eligible_members.n_id')
        // ->where('d_to',$today)
        // ->where('n_rank','<=',10)
        // ->select('d_to','c_username','n_total_subscription','n_rank','c_fname')
        // ->groupBy('n_rank')
        // ->get();
        
         $datas= DB::table('sun_gene')
         ->join('bc_master', 'bc_master.pn_id', '=', 'sun_gene.n_id')
         ->where('n_today_reff_subscription','>',0)
        ->select('c_username','n_today_reff_subscription','c_fname')
        ->orderBy('sun_gene.n_today_reff_subscription', 'desc')
        ->limit(10)
        ->get();
      
       return response()->json($datas);
       
    }
     public function dateroyal(Request $request)
    {
        $date = $request->id; 
        $data = DB::table('royalplan_eligible_members')
                ->join('bc_master', 'bc_master.pn_id', '=', 'royalplan_eligible_members.n_id')
                ->where('d_to', $date)
                ->where('n_rank','<=', 10)
                ->select('c_username','n_total_subscription')
                ->orderBy('n_rank')
                ->get();
                return response()->json($data);
       
    }
    
    
    
    

}
