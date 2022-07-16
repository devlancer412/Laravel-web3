<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\BcMaster;
use App\Models\News;
use App\Models\BcLogin;
use App\Models\User_wallet;
use App\Models\Currency;
use App\Models\RoyalPlanIncomePayouthdr;
use App\Models\globalPlanIncomePayouthdr;
use App\Models\LevelIncomePayouthdr;
use App\Models\IncomePlanHistory;
use Carbon\Carbon;
use DB;

class DashboardController extends Controller
{
     // -------------------------------view login blade page
    public function dashboardview()
    { 
          $data = News::where("c_status","=","A")
                  ->get(["c_title","c_news"]);
                //   dd($data);exit;
        return view ('Dashboard')->with('data',$data);
    }
    //  public function getnews(Request $req)
    // {
    //     $data = News::where("c_status","=","A")
    //               ->get(["c_title","c_news"]);
    //             //   dd($data);exit;
    //     return view (Dashboard)->with('data',$data);
    // }
    
      public function getName(Request $req)
    { 
        $userId = session('hrc_userid');
       
         $data= DB::table('bc_login')
        ->join('bc_master', 'bc_master.c_username', '=', 'bc_login.pc_username')
        ->where('pn_id','=',$userId)
        ->select('c_fname','c_lname','c_username','d_last_logout','d_last_login')
        ->get();
       
        // $data = BcMaster::where("pn_id",$userId)
        //           ->first(["c_fname","c_lname","c_username"]);  
   
        return response()->json($data);
        
    }
    public function getusername(Request $req)
    {
        $userId = session('hrc_userid');
        $data = BcMaster::where("pn_id",$userId)
                  ->first(["c_fname","c_lname","c_username"]);
                          return response()->json($data);

    }
     // ------------------------Function for Referral Link------------------
    public function dashboard(Request $req)
    {

        $userId = session('hrc_userid');
        $refer_code = BcMaster::where('pn_id',$userId)->select('n_referral_code')->first();
		$url = url("/newregister?referral=" . $refer_code->n_referral_code); 
        return response()->json($url);    
        
    }
    //   public function share(Request $req)
    // {

    //     $userId = session('hrc_userid');
    //     $refer_code = BcMaster::where('pn_id',$userId)->select('n_referral_code')->first();
    //     // return response()->json($refer_code);   
    //             return view('_header')->with($refer_code);

    //             // return View::make("_header", compact($refer_code));

        
    // }
    public function dashboardreport()
    { 
         $userId = session('hrc_userid');
        
          $totsub = 0;
         $subscription = IncomePlanHistory::where('user_id',$userId)->select(DB::raw('SUM(income_plan_history.dedited_amount) as dedited_amount'))->first();
         $totsub= $subscription->dedited_amount;
        
        if($totsub == null ||$totsub == "")
         {
             $totsub = 0;
         }
         
         $currency_sql= Currency :: where('symbol','HRC')->select('market_price')->first();
         $current_market_price = $currency_sql->market_price;
         
         $totsubhrc_amount=0;
         $totsubhrc_amount=$totsub * $current_market_price;
        
        $hrcwallet=0;$topupwallet=0; 
        $userwallet_sql= User_wallet :: where('user_id',$userId)->select('HRC','top_up_wallet')->first();
        if($userwallet_sql == null)
        {
            $hrcwallet=0;
            $topupwallet=0;
        }else{
            $hrcwallet = $userwallet_sql->HRC;
            $topupwallet= $userwallet_sql->top_up_wallet;
        }
         
          
        $hrcwallet_amount =  $hrcwallet * $current_market_price;
        
        //  if($hrcwallet_amount == null)
        //  {
        //      $hrcwallet_amount = 0;
        //  }
        $topupwallet_amount= $topupwallet * $current_market_price;
        
        $basicsubscription = 0; $basicsubscriptiondollar =0;
        $basic = IncomePlanHistory::where('user_id',$userId)
        ->where('plan_type','Basic')
        ->select(DB::raw('SUM(income_plan_history.dedited_amount) as dedited_amount'))->first();
        $basicsubscription = $basic->dedited_amount;
        
         if($basicsubscription==null)
        {
            $basicsubscription = 0;
        }
        $basicsubscriptiondollar = $basicsubscription * $current_market_price;
        
         $premiumsubscription = 0;
        $premium = IncomePlanHistory::where('user_id',$userId)
        ->where('plan_type','Premium')
        ->select(DB::raw('SUM(income_plan_history.dedited_amount) as dedited_amount'))->first();
        $premiumsubscription = $premium->dedited_amount;
         if($premiumsubscription==null)
        {
            $premiumsubscription = 0;
        }
        $premiumsubscriptiondollar = $premiumsubscription * $current_market_price; 
        
        
         $premiumtopupsubscription = 0;$premiumtopupsubscriptiondollar = 0;
        $premiumtop = IncomePlanHistory::where('user_id',$userId)
        ->where('plan_type','Premium - Topup')
        ->select(DB::raw('SUM(income_plan_history.dedited_amount) as dedited_amount'))->first();
        $premiumtopupsubscription = $premiumtop->dedited_amount;
        
        if($premiumtopupsubscription==null)
        {
            $premiumtopupsubscription = 0;
        }
        $premiumtopupsubscriptiondollar = $premiumtopupsubscription * $current_market_price;
        
        if($premiumtopupsubscriptiondollar==null)
        {
            $premiumtopupsubscriptiondollar = 0;
        }
        
        $activereferral = BcMaster::where('n_ref_id',$userId)->where('c_aflag','Y')->count();
         
        // -------------------------------------Total earnings----------------------------------
        
        $levelincome = LevelIncomePayouthdr::where('n_id',$userId)->select(DB::raw('SUM(level_income_payout_hdr.n_gross_hrc) as n_gross_hrc'))->first();
        $levelincomes = $levelincome->n_gross_hrc;
          if($levelincomes==null)
        {
            $levelincomes = 0;
        }
        
        $globalincome = globalPlanIncomePayouthdr::where('n_id',$userId)->select(DB::raw('SUM(globalplan_income_payouthdr.n_eligible_income) as n_eligible_income'))->first();
        $globalincomes = $globalincome->n_eligible_income;
          if($globalincomes==null)
        {
            $globalincomes = 0;
        }
        
        $royalincome = RoyalPlanIncomePayouthdr::where('n_id',$userId)->select(DB::raw('SUM(royalplan_income_payouthdr.n_eligible_income) as n_eligible_income'))->first();
        $royalincomes = $royalincome->n_eligible_income;
         if($royalincomes==null)
        {
            $royalincomes = 0;
        }
        
        $totalearnings= $levelincomes + $globalincomes + $royalincomes;
        if($totalearnings==null)
        {
            $totalearnings = 0;
        }
        
         $result = array (
            'totalsubhrc' => $totsub,
            'totalsubdollar'=> $totsubhrc_amount,
            'hrcwallet' => $hrcwallet,
            'hrcwalletdollar' => $hrcwallet_amount,
            'topuphrc' => $topupwallet,
            'topupdollar' => $topupwallet_amount,
            'basicsubscription'=>$basicsubscription,
            'basicsubscriptiondollar'=>$basicsubscriptiondollar,
            'premiumsubscription' =>$premiumsubscription,
            'premiumsubscriptiondollar'=>$premiumsubscriptiondollar,
            'premiumtopupsubscription' =>$premiumtopupsubscription,
            'premiumtopupsubscriptiondollar' =>$premiumtopupsubscriptiondollar,
            'activereferral' => $activereferral,
            'totalearnings' => $totalearnings,
           
        );
         return response()->json($result);  
    }
    
     public function dashboardpiechart()
    {
                 $userId = session('hrc_userid');

        $levelincome = LevelIncomePayouthdr::where('n_id',$userId)->select(DB::raw('SUM(level_income_payout_hdr.n_gross_hrc) as n_gross_hrc'))->first();
        $levelincomes = $levelincome->n_gross_hrc;
        $globalincome = globalPlanIncomePayouthdr::where('n_id',$userId)->select(DB::raw('SUM(globalplan_income_payouthdr.n_eligible_income) as n_eligible_income'))->first();
        $globalincomes = $globalincome->n_eligible_income;
        
        $royalincome = RoyalPlanIncomePayouthdr::where('n_id',$userId)->select(DB::raw('SUM(royalplan_income_payouthdr.n_eligible_income) as n_eligible_income'))->first();
        $royalincomes = $royalincome->n_eligible_income;
        
        $results = array (
            'levelincomes'=>$levelincomes,
            'globalincomes'=>$globalincomes,
            'royalincomes'=>$royalincomes,
            );
                //  dd($results);exit;

            return view('Dashboard')->with('results',$results);
            
        // 	return view('Dashboard')->with('levelincomes',$levelincomes,'globalincomes',$globalincomes,'royalincomes',$royalincomes);
    }
}