<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\BcMaster;
use DB;

class SponsorTreeController extends Controller
{
    public function viewPage() 
    {
        
        $userId = session('hrc_userid');
      
           $value= DB::table('bc_master')
                  ->where('pn_id',$userId)
                  ->select('pn_id','c_username','c_fname','c_lname')
                  ->get();
                //   dd($value);exit;
		return view('teaml2')->with('datas',$value);
	}    
// 	public function Sponsordetails(Request $req)
//     { 
//           $userId = session('hrc_userid');
//           $value= DB::table('bc_master')
//                   ->where('pn_id',$userId)
//                   ->select('pn_id','c_username','c_fname','c_lname')
//                   ->get();
//                 //   dd($value);exit;
//                 return view('teaml')->with('value'->$value);
//     }   


    public function getTreeusers(Request $req)
    {
        $pn_id=$req->id;
        $details=DB::table('bc_master')
           ->where('n_ref_id',$pn_id)
          ->select('pn_id','c_username','c_fname','c_lname')
          ->get();
                //   dd($details);exit;

        return view('GetTree1')->with('details',$details);

    }
}
