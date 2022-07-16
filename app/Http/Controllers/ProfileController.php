<?php

namespace App\Http\Controllers;

use App\Models\BcMaster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function profile() 
    {
		$userId = session('hrc_userid');
		$user = BcMaster::where('pn_id', $userId)->select('c_username', 'c_email', 'c_fname', 'c_lname', 'c_mobile')->first();
        return response()->json($user) ;    
	
	}
	
	
    public function profileditview() 
    {
        return view('editprofile') ;
    }
    

    public function updateProfile(Request $req) 
    {
		$userId = session('hrc_userid');
      
        $req->validate(
            [
              
                'first_name'       =>  'required',
                'last_name'        =>  'required',
                'phone'            =>  'required |max:10 |min:10',
                'address'          =>'required',
                
            ],

            [
             
                
                'first_name.required'    => 'First name is Required',
                'last_name.required'     => 'Last name is Required',
                'phone.required'         => 'Phone is Required',
                'phone.max'              => 'Phone Must have atmost 10 characters ',
                'phone.min'              => 'Phone Must have atleast 10 characters ',
                'address.required'       =>'Address is Required',
                
            ]);
            $firstname = strip_tags($req['first_name']);
            $email = strtolower(strip_tags($req['email']));
            $lastname = strip_tags($req['last_name']);
            $Phonenumber = strip_tags($req['phone']);
          
            $updateData= DB::table('bc_master')
            ->where('pn_id',$userId)
            ->update(['c_email'=> $email,
                        'c_fname' =>$firstname,
                        'c_lname' =>$lastname,
                        'c_mobile' =>$Phonenumber]);

                   

                        $data= array();
                        $data['status']= 'success';
                        $data['message']= 'profile updation successfull';
                        return response()->json($data) ; 
                        
                        // $data= array();
                        // $data['status']= 'error';
                        // $data['message']= 'profile updation Unsuccessfull';
                        //  return response()->json($data) ; 
                         
                         
                       
	}
}
