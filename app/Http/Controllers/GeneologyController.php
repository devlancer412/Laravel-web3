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

class GeneologyController extends Controller
{
     public function geneology(Request $req)
     {
       
         $trackid = session('hrc_userid');
 
          $data= DB::table('bc_master')
           // ->join('income_plan_history', 'income_plan_history.user_id', '=', 'bc_master.pn_id')
          ->where('pn_id',$trackid)
          ->select('c_fname','c_lname','c_username','d_join','pn_id','c_position')
          ->get();
          $result = $data->toArray();
          $dummy1 = array();

          if($result)
          {
              foreach($result as $key => $value)
              {
                  $pn_id=$value->pn_id;
                 
                    $dummy1[$key]['pn_id'] = $pn_id;
                  $dummy1[$key]['c_fname'] = $value->c_fname;
                  $dummy1[$key]['c_lname'] = $value->c_lname;
                  $dummy1[$key]['c_username'] = $value->c_username;
                  $dummy1[$key]['d_join'] = $value->d_join;
                    $dummy1[$key]['plan_type']  = "no plan";
                    $dummy1[$key]['n_agroup_subscription'] = 0;
                    $dummy1[$key]['n_bgroup_subscription'] =0;
                     $dummy1[$key]['deditedamount']= 0;

                  $income= DB::table('income_plan_history')
                  ->where('user_id',$pn_id)
                  ->select('plan_type',DB::raw('SUM(income_plan_history.dedited_amount) as dedited_amount'))
                  ->get();

                  if($income)
                  {
                    foreach($income as $inkey => $invalue){
                        $dummy1[$key]['plan_type'] = $invalue->plan_type;
                         $dummy1[$key]['deditedamount'] = $invalue->dedited_amount;
                    }
                  }
                 
                   $gene= DB::table('sun_gene')
                  ->where('n_id',$pn_id)
                  ->select('n_agroup_subscription','n_bgroup_subscription')
                  ->get();
                  
                  
                  if($gene)
                  {
                    foreach($gene as $inkeys => $invalues){
                        $dummy1[$key]['n_agroup_subscription'] = $invalues->n_agroup_subscription;
                        $dummy1[$key]['n_bgroup_subscription'] = $invalues->n_bgroup_subscription;

                    }
                  }
              
                  
              }
          }
          
         
 
        
      $level= "1";
          $data= DB::table('bc_master')
           // ->join('income_plan_history', 'income_plan_history.user_id', '=', 'bc_master.pn_id')
          ->where('n_ref_id',$trackid)
          ->select('c_fname','c_lname','c_username','d_join','pn_id','c_infinity_income_qualified','c_position')
          ->get();
          $result = $data->toArray();
          $dummy = array();
 
          if($result)
          {
              foreach($result as $key => $value)
              {
                  $pn_id=$value->pn_id;
                  $dummy[$key]['pn_id'] = $pn_id;
                  $dummy[$key]['c_fname'] = $value->c_fname;
                  $dummy[$key]['c_lname'] = $value->c_lname;
                  $dummy[$key]['c_username'] = $value->c_username;
                  $dummy[$key]['d_join'] = $value->d_join;
                   $dummy[$key]['c_position'] = $value->c_position;
                  $dummy[$key]['c_infinity_income_qualified'] = $value->c_infinity_income_qualified;

                $dummy[$key]['plan_type']  = "no plan";

                    

                  $income= DB::table('income_plan_history')
                  ->where('user_id',$pn_id)
                  ->select('plan_type')
                  ->get();

                  if($income)
                  {
                    foreach($income as $inkey => $invalue){
                        $dummy[$key]['plan_type'] = $invalue->plan_type;
                        
                    }
                  }
                //   else
                //   {
                //       dd('dfghjkl');
                //       exit;
                //   }
                  
              }
          }
         
         
          
          
         return view ('geneology',array('dummy'=>$dummy,'data'=>$data,'dummy1'=>$dummy1,'level'=>$level,'income'=>$income));

         
         
           
     }
     
      public function geneologylevel($trackid,$level)
     {
         
          $trackid=base64_decode(rawurldecode($trackid));
         //$level=0;
       
             $level=$level + 1;
       
       
          $data= DB::table('bc_master')
           // ->join('income_plan_history', 'income_plan_history.user_id', '=', 'bc_master.pn_id')
          ->where('pn_id',$trackid)
          ->select('c_fname','c_lname','c_username','d_join','pn_id')
          ->get();
          $result = $data->toArray();
          $dummy1 = array();

          if($result)
          {
              foreach($result as $key => $value)
              {
                  $pn_id=$value->pn_id;
                  $dummy1[$key]['pn_id'] = $pn_id;
                  $dummy1[$key]['c_fname'] = $value->c_fname;
                  $dummy1[$key]['c_lname'] = $value->c_lname;
                  $dummy1[$key]['c_username'] = $value->c_username;
                  $dummy1[$key]['d_join'] = $value->d_join;
                   $dummy1[$key]['plan_type']  = "no plan";
                    $dummy1[$key]['n_agroup_subscription'] = 0;
                  $dummy1[$key]['n_bgroup_subscription'] =0;
                    $dummy1[$key]['deditedamount']=0;
                  $income= DB::table('income_plan_history')
                  ->where('user_id',$pn_id)
                  ->select('plan_type',DB::raw('SUM(income_plan_history.dedited_amount) as dedited_amount'))
                  ->get();

                  if($income)
                  {
                    foreach($income as $inkey => $invalue)
                    {
                        $dummy1[$key]['plan_type'] = $invalue->plan_type;
                        

                         $dummy1[$key]['deditedamount'] = $invalue->dedited_amount;
                    }
                  }
                  if($dummy1[$key]['plan_type'] == null)
                  {
                      $dummy1[$key]['plan_type'] = "no plan";
                  }
                  if($dummy1[$key]['deditedamount'] == null)
                  {
                      $dummy1[$key]['deditedamount'] = 0;
                  }
                  $gene= DB::table('sun_gene')
                  ->where('n_id',$pn_id)
                  ->select('n_agroup_subscription','n_bgroup_subscription')
                  ->get();

                  if($gene)
                  {
                    foreach($gene as $inkeys => $invalues){
                        $dummy1[$key]['n_agroup_subscription'] = $invalues->n_agroup_subscription;
                        $dummy1[$key]['n_bgroup_subscription'] = $invalues->n_bgroup_subscription;

                    }
                  }
             
                  
              }
          }
          
       
        $data= DB::table('bc_master')
           // ->join('income_plan_history', 'income_plan_history.user_id', '=', 'bc_master.pn_id')
          ->where('n_ref_id',$trackid)
          ->select('c_fname','c_lname','c_username','d_join','pn_id','c_position','c_infinity_income_qualified')
          ->get();
          $result = $data->toArray();
          $dummy = array();

          if($result)
          {
              foreach($result as $key => $value)
              {
                  $pn_id=$value->pn_id;
                  $dummy[$key]['pn_id'] = $pn_id;
                  $dummy[$key]['c_fname'] = $value->c_fname;
                  $dummy[$key]['c_lname'] = $value->c_lname;
                  $dummy[$key]['c_username'] = $value->c_username;
                  $dummy[$key]['d_join'] = $value->d_join;
                    $dummy[$key]['c_position'] = $value->c_position;
                  $dummy[$key]['c_infinity_income_qualified'] = $value->c_infinity_income_qualified;
                   $dummy[$key]['plan_type']  = "no plan";

                  $income= DB::table('income_plan_history')
                  ->where('user_id',$pn_id)
                  ->select('plan_type')
                  ->get();

                  if($income)
                  {
                    foreach($income as $inkey => $invalue){
                        $dummy[$key]['plan_type'] = $invalue->plan_type;
                    }
                  }
                //   else
                //   {
                //       dd('dfghjkl');
                //       exit;
                //   }
                  
              }
          }
          
         return view ('geneology',array('dummy'=>$dummy,'dummy1'=>$dummy1,'level'=>$level));
     }
     public function geneologyteam(Request $req)
     {
         
     }
     
     
     
}
