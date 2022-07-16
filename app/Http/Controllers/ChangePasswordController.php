<?php

namespace App\Http\Controllers;
use App\Models\BcLogin;
use App\Models\BcMaster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
  public function changepasswordview() 
    {
        return view('changepassword') ;
    }
    
    public function changePassword(Request $req) 
    {
         $req->validate(
        [
            'oldpassword'        => 'required | min:3',
            'newpassword'        => 'required | min:3 | different:oldpassword',
            'newcpassword'       => 'required | same:newpassword'
        ],
        [
            'newpassword.different' =>'Old password and new :attribute must be different'
        ]);
        //  -------------Getting userdetails from Database------------------- //
        
            $username = session('hrc_username');
          
            $loginuser = BcLogin::where('pc_username','=',$username)->first();
        
        //  -------------Checking Old password with Database------------------- //
            if (Hash::check($req->oldpassword, $loginuser->c_password)) 
        {           
            $loginuser->c_password = Hash::make($req->newcpassword);
            $new = $loginuser->c_password;
           
            $data= DB::table('bc_login')
            ->where('pc_username',$username)
            ->update(['c_password' =>$new ]);
            
            
            $data = array();
            $data['status'] = 'success';
            $data['message'] = 'change password success';
            return response()->json($data);
        }
        else
        {
            $data=array();
            $data['status']='error';
            $data['message']='Old password does not match';
            return response()->json($data);          
        }
    }
    
     //  ------------- Old Password checking using AJAX------------------- //
    public function oldpassword_check(Request $req)
    {        
        $username = session('hrc_username');
      
        $loginuser = BcLogin::where('pc_username','=',$username)->first();
     
         if (Hash::check($req->oldpassword, $loginuser->c_password))
        {               
            $return =  true;
        } 
        else
        {
            $return= false;
        }
        echo json_encode($return);
        exit;
    
    }   
}
