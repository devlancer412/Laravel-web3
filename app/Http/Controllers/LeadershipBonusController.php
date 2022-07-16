<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\BcMaster;
use App\Models\BcLogin;
use App\Models\RankDetails;
use App\Models\globalPlanEligiblemember;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use App\Models\Dailyreferralpv;
class LeadershipBonusController extends Controller
{
   public function leadership()
    {   
        
        $userid= Session::get('hrc_userid');
        
  
        $data= DB::table('bc_master')
        ->where('pn_id','=',$userid)
        ->select('c_rank')
        ->get();
  
        
        return view('Reports.leadershipbonus')->with('rank',$data);
    }
     public function fetch_data(Request $request)
    {
        $userid= Session::get('hrc_userid');
       
        $from_date = Carbon::parse($request->n_fromdate)->toDateTimeString();
        $to_date = Carbon::parse($request->n_todate)->toDateTimeString();
        
        
         $leadership = RankDetails::where('n_id',$userid)->select('d_to_date','n_left_hrc','n_right_hrc','c_rank','n_income_hrc')->first();
  
        $data= DB::table('rank_details')
        ->where('n_id','=',$userid)
        ->select('d_to_date','n_left_hrc','n_right_hrc','c_rank','n_income_hrc')
        ->get();
        
        return response()->json($data);
    }
    
     public function leaderships(Request $request)
    {
        $userid= Session::get('hrc_userid');
         $data= DB::table('sun_gene')
                ->where('n_id','=',$userid)
                ->select('n_agroup_subscription','n_bgroup_subscription')
                ->get();
               
      
       return response()->json($data); 
    }
    public function leadershiprank(Request $request)
    {
        $userid= Session::get('hrc_userid');
     $rank = BcMaster::where('pn_id',$userid)->select('c_rank')->first();
        $lrank = $rank->c_rank;
      
        $righthrc=0;  $points=0; $upcomimgstar=""; $upcominglefthrc=0;
         $upcomingrighthrc=0; $upcomingpoints=0;  $lefthrc=0;
         
      if($lrank == "Star")
        {
            $lefthrc= 1500;
            $righthrc =1500;
            $points =3.75*2;
            $upcomimgstar = "Double star";
            $upcominglefthrc= 3000;
            $upcomingrighthrc =3000;
            $upcomingpoints =7.5*2;
           
        }
        elseif($lrank == "Double Star")
        {
            $lefthrc= 3000;
            $righthrc =3000;
            $points =7.5*2;
            $upcomimgstar = "Triple Star";
            $upcominglefthrc= 6000;
            $upcomingrighthrc =6000;
            $upcomingpoints =15*2;
        }
        elseif($lrank == "Triple Star")
        {
            $lefthrc= 6000;
            $righthrc = 6000;
            $points =15*2;
            $upcomimgstar = "Four Starr";
            $upcominglefthrc= 12000;
            $upcomingrighthrc =12000;
            $upcomingpoints =30*2;
            
        }
        elseif($lrank == "Four Star")
        {
            $lefthrc= 12000;
            $righthrc = 12000;
            $points =30*2;
            $upcomimgstar = "Five Star";
            $upcominglefthrc= 24000;
            $upcomingrighthrc =24000;
            $upcomingpoints =60*2;
            
        }
          elseif($lrank == "Five Star")
        {
            $lefthrc= 24000;
            $righthrc = 24000;
            $points =60*2;
            $upcomimgstar = "Six Star";
            $upcominglefthrc= 48000;
            $upcomingrighthrc =48000;
            $upcomingpoints =120*2;
            
        }
        elseif($lrank == "Six Star")
        {
            $lefthrc= 48000;
            $righthrc = 48000;
            $points =120*2;
            $upcomimgstar = "Seven Star";
            $upcominglefthrc= 96000;
            $upcomingrighthrc =96000;
            $upcomingpoints =240*2;
            
        }
        elseif($lrank == "Seven Star")
        {
            $lefthrc= 96000;
            $righthrc = 96000;
            $points =240*2;
            $upcomimgstar = "Junior Star";
            $upcominglefthrc= 192000;
            $upcomingrighthrc =192000;
            $upcomingpoints =480*2;
            
        }
        elseif($lrank == "Junior Star")
        {
            $lefthrc= 192000;
            $righthrc = 192000;
            $points =480*2;
            $upcomimgstar = "Team Star";
            $upcominglefthrc= 384000;
            $upcomingrighthrc =384000;
            $upcomingpoints =60*2;
            
        }
        elseif($lrank == "Team Star")
        {
            $lefthrc= 384000;
            $righthrc = 384000;
            $points =480*2;
            $upcomimgstar = "Area Star";
            $upcominglefthrc= 768000;
            $upcomingrighthrc =768000;
            $upcomingpoints =1920*2;
            
        }
        elseif($lrank == "Area Star")
        {
            $lefthrc= 768000;
            $righthrc = 768000;
            $points =1920*2;
            $upcomimgstar = "National Star";
            $upcominglefthrc= 1536000;
            $upcomingrighthrc =1536000;
            $upcomingpoints =3840*2;
            
        }
        elseif($lrank == "National Star")
        {
            $lefthrc= 1536000;
            $righthrc = 1536000;
            $points =3840*2;
            $upcomimgstar = "Shine Star";
            $upcominglefthrc= 3072000;
            $upcomingrighthrc =3072000;
            $upcomingpoints =7680*2;
            
        }
        elseif($lrank == "Shine Star")
        {
            $lefthrc= 3072000;
            $righthrc = 3072000;
            $points =7680*2;
            $upcomimgstar = "Novice Star";
            $upcominglefthrc= 6144000;
            $upcomingrighthrc =6144000;
            $upcomingpoints =15360*2;
            
        }
        elseif($lrank == "Novice Star")
        {
            $lefthrc= 6144000;
            $righthrc = 6144000;
            $points =15360*2;
            $upcomimgstar = "Life Star";
            $upcominglefthrc= 12288000;
            $upcomingrighthrc =12288000;
            $upcomingpoints =30720*2;
        }
        elseif($lrank == "Life Star")
        {
            $lefthrc= 12288000;
            $righthrc = 12288000;
            $points =30720*2;
            $upcomimgstar = "World Star";
            $upcominglefthrc= 24576000;
            $upcomingrighthrc =24576000;
            $upcomingpoints =61440*2;
        }
        elseif($lrank == "World Star")
        {
            $lefthrc= 24576000;
            $righthrc = 24576000;
            $points =61440*2;
            $upcomimgstar = "Global Star";
            $upcominglefthrc= 49152000;
            $upcomingrighthrc =49152000;
            $upcomingpoints =122880*2;
        }
        elseif($lrank == "Global Star")
        {
            $lefthrc= 49152000;
            $righthrc = 49152000;
            $points =122880*2;
            $upcomimgstar = "Ambassador Star";
            $upcominglefthrc= 98304000;
            $upcomingrighthrc =98304000;
            $upcomingpoints =245760*2;
        }
         elseif($lrank == "Ambassador Star")
        {
            $lefthrc= 98304000;
            $righthrc = 98304000;
            $points =245760*2;
            $upcomimgstar = "Crown Star";
            $upcominglefthrc= 196608000;
            $upcomingrighthrc =196608000;
            $upcomingpoints =491520*2;
        }
         elseif($lrank == "Crown Star")
        {
            $lefthrc= 196608000;
            $righthrc = 196608000;
            $points =491520;
            $upcomimgstar = "Royal Star";
            $upcominglefthrc= 393216000;
            $upcomingrighthrc =393216000;
            $upcomingpoints =983040;
        }  
        elseif($lrank == "Royal Star")
        {
            $lefthrc= 393216000;
            $righthrc = 393216000;
            $points =983040*2;
            $upcomimgstar = "International Star";
            $upcominglefthrc= 786432000;
            $upcomingrighthrc =786432000;
            $upcomingpoints =1966080 * 2;
        }
         elseif($lrank == "International Star")
        {
            $lefthrc= 786432000;
            $righthrc = 786432000;
            $points =1966080*2;
            // $upcomimgstar = "International Star";
            // $upcominglefthrc= 786432000;
            // $upcomingrighthrc =786432000;
            // $upcomingpoints =1966080;
        }
        if($lrank == "")
         {
            $lefthrc= "0";
            $righthrc = "0";
            $points ="0";
            $upcomimgstar = "Star";
            $upcominglefthrc= 1500;
            $upcomingrighthrc =1500;
            $upcomingpoints =3.75*2;
            $lrank = "NILL";
         }
         
      
       $result = array (
            'lefthrc' => $lefthrc,
            'righthrc'=> $righthrc,
            'points' => $points,
            'upcomimgstar' => $upcomimgstar,
            'upcominglefthrc' => $upcominglefthrc,
            'upcomingrighthrc' => $upcomingrighthrc,
            'upcomingpoints'=>$upcomingpoints,
            'lrank' => $lrank,
           
        );
     
       return response()->json($result); 
    }
}
