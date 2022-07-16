<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\BcMaster;
use App\Models\BcLogin;
use App\Models\Currency;
use App\Models\User_wallet;
use App\Models\globalPlanEligiblemember;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use App\Models\IncomePlanHistory;

class SubscriptionController extends Controller
{
      public function fetch_data(Request $request)
    {
        $userid= Session::get('hrc_userid');
        
         $data= DB::table('income_plan_history')
        ->where('user_id',$userid)
        ->select("created_at","user_id","sub_end_date","plan_type","plan_amount","dedited_amount")
        ->get();
       
        $Returnhrc =0;
        if($data)
        {
             foreach($data as $row2)
            {
                $dedited = $row2->dedited_amount;
                $created_at = $row2->created_at;
                $sub_end_date = $row2->sub_end_date;
                $plan_type = $row2->plan_type;
                $plan_amount = $row2->plan_amount;
                $Returnhrc= $dedited +  $dedited*(15/100);
                
                     $result[] = array (
                'dedited_amount' => $dedited,
                'created_at'=> $created_at,
                'sub_end_date'=> $sub_end_date,
                'plan_type' => $plan_type,
                'plan_amount'=> $plan_amount,
                'Returnhrc'=> $Returnhrc);
                
            }
        }
      
       
          
       
         return response()->json($result);
        
          
       
    }
    
     public function subscription(Request $request)
    {
         $userid= Session::get('hrc_userid');
         $basic=10;
         $totalsub= Currency :: where('symbol','HRC')->select('market_price')->first();
         $totalsubhrc = $totalsub->market_price;
         $basicplan= $basic * $totalsubhrc;
         $premium = 125;
         $premiumplan= $premium * $totalsubhrc;
          $result = array (
            'basicp' => $basic,
            'basicplan'=> $basicplan,
            'premium'=>$premium,
            'premiumplan' =>$premiumplan,
            
        );
         return response()->json($result);  
        
    }
    
        public function subconfirmationview(Request $request)
    {
            $userid= Session::get('hrc_userid');
              
            $wallet = User_wallet :: where('user_id',$userid)->select('HRC')->first();
            
            if($wallet)
            {
                  $hrc= $wallet->HRC;
                  
                   if($hrc >= 10)
                   {
                       $random = rand(10000000,1000000000);
                        Session::put('sesran',$random);
        
                       return view('subscriptionconfirmation')->with('getran',$random);
                   }
                    else
                   {
                      return redirect()->back()->with('message', 'Insufficient Balance!');
                        
                   }
            }
           
          
          
    }
    
       public function subconfirmation(Request $request)
    {
         $userid= Session::get('hrc_userid');
        
        $basicplan= BcMaster :: where('pn_id',$userid)->select('c_username','c_fname','c_lname')->first();
        $username= $basicplan->c_username;
        $name = $basicplan->c_fname ." ". $basicplan->c_lname;
      
        $totalsub= Currency :: where('symbol','HRC')->select('market_price')->first();
         $totalsubhrc = $totalsub->market_price;
         $basic=10;
         $basichrc= $basic * $totalsubhrc;
         $result = array (
            'basic' => $basic,
            'basichrc'=> $basichrc,
            'username'=> $username,
            'name' => $name,
        );
         return response()->json($result);
    }
    
     public function premiumsubconfirmationview(Request $request)
    {
            $userid= Session::get('hrc_userid');
            $wallet = User_wallet :: where('user_id',$userid)->select('HRC')->first();
           
            if($wallet)
            {
                $hrc= $wallet->HRC;
                   if($hrc >= 125)
                   {
                       $random = rand(10000000,1000000000);
                        Session::put('sesran',$random);
        
                       return view('premiumsubscriptionconfirmation')->with('getran',$random);
                   }
                   else
                     {
                            return redirect()->back()->with('message', 'Insufficient Balance!');
             
                
                     }
            }
            
           
    }
     public function premiumsubconfirmation(Request $request)
    {
         $userid= Session::get('hrc_userid');
        
        $basicplan= BcMaster :: where('pn_id',$userid)->select('c_username','c_fname','c_lname')->first();
        $username= $basicplan->c_username;
        $name = $basicplan->c_fname ." ". $basicplan->c_lname;
      
        $totalsub= Currency :: where('symbol','HRC')->select('market_price')->first();
         $totalsubhrc = $totalsub->market_price;
         $premium=125;
        
         $premiumhrc= $premium * $totalsubhrc;
         $result = array (
            'premium' => $premium,
            'premiumhrc'=> $premiumhrc,
            'username'=> $username,
            'name' => $name,
        );
       
         return response()->json($result);
    }
    // ------------------------------------Premium plus subscription--------------------------------------
    public function premiumplussubconfirmationview(Request $request)
    {
            $userid= Session::get('hrc_userid');
            $wallet = User_wallet :: where('user_id',$userid)->select('HRC')->first();
            
            if($wallet)
            {
                $hrc= $wallet->HRC;
                if($hrc >= 125)
           {
               $random = rand(10000000,1000000000);
                Session::put('sesran',$random);

               return view('premiumplussubscriptionconfirmation')->with('getran',$random);
           }
            
           
           else
           {
              return redirect()->back()->with('message', 'Insufficient Balance!');
                
           }
            }
    }
       public function premiumplussubconfirmation(Request $request)
    {
         $userid= Session::get('hrc_userid');
        
        $basicplan= BcMaster :: where('pn_id',$userid)->select('c_username','c_fname','c_lname')->first();
        $username= $basicplan->c_username;
        $name = $basicplan->c_fname ." ". $basicplan->c_lname;
      
       
         $result = array (
            
            'username'=> $username,
            'name' => $name,
        );
         return response()->json($result);
    }
    
     // ---------------------------------------function for getting username-------------------------------------------------------------------------------------
    public function getuser_name(Request $req)
    {   
        $topuphrc= strip_tags($req->input('basichrc'));
         $totalsub= Currency :: where('symbol','HRC')->select('market_price')->first();
         $totalsubhrc = $totalsub->market_price;
         $totalamount = $topuphrc / $totalsubhrc;
       
            
            return json_encode($totalamount);
    }
    
     public function index(Request $req)
    {
        $userid= Session::get('hrc_userid');
        
        return view('subscriptionsuccess')->with('data',$userid);
    }
    
     public function subcertificate(Request $req)
    {
         $userid= Session::get('hrc_userid');
          $name= Session::get('hrc_userdetails'); 
        $package= Session::get('subpackagess'); 
        // $subhrccc= Session::get('subhrcc'); 
            $transaction= IncomePlanHistory :: where('user_id',$userid) ->max('id');
           
              $plan= Session::get('planamts'); 
               $subhrccc =$plan/2;
               date_default_timezone_set('GMT');
        			$temp= strtotime("+1 hours"); 
        			$currentdateandtime = date("Y-m-d H:i:s",$temp);
        			$currentdate = date("Y-m-d",$temp);
    			$subenddate = date('Y-m-d ', strtotime( $currentdate . " +365 days"));
   $result = array (
            
            'userid'=> $userid,
            'name' => $name,
            'package'=>$package,
            'subhrccc' =>$subhrccc,
            'plan'=>$plan,
            'currentdate'=>$currentdate,
            'subenddate'=>$subenddate,
            'transaction' =>$transaction
            
        );
         return response()->json($result);
          
    }
    
}
