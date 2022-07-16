<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\BcMaster;
use App\Models\BcLogin;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
class RegisterController extends Controller
{

    public function __construct() {
		
		$this->getReferralUser = new BcMaster(); 

	}
    public function terms() 
    {
		return view('Terms');
	}

    public function viewRegister(Request $request) {
        
		$referral_code = isset($request->referral) ? $request->referral : '0';

		return view('Registration',['referral'=>$referral_code]);
    
    }

    
    public function register(Request $req)
    { 
        // dd($req);
        // exit;
        $req->validate(
            [
                'username'          =>  'required |unique:bc_master,c_username|max:10|min:3',
                'password'          =>  'required |min:8|max:15',
                'email'             =>  'required|email',
                'confirm_password'  =>  'required|min:8|same:password|max:15',
            ],

            [
                'username.required'            => 'Username is Required',
                'username.max'                 => 'Username Must have atmost 10 characters ',
                'username.min'                 => 'Username Must have atleast 3 characters ',
                'password.required'            => 'Password is Required',
                'email.required'               => 'Email ID is Required',
                'password.min'                 => 'Password Must have atleast 8 characters ',
                'password.max'                 => 'Password Must have atmost 15 characters ',
                'confirm_password.required'    => 'Conform Password is Required',
                'confirm_password.min'         => 'Password Must have atleast 8 characters ',
                'confirm_password.max'         => 'Password Must have atmost 15 characters ',
            ]);
  
          $username = strtolower(strip_tags($req['username']));
       
          $email = strtolower(strip_tags($req['email']));
          $password = strip_tags($req['password']);
          $confirm = strip_tags($req['confirm_password']);
     
           Session::put('email',$email); 
           Session::put('usernamee',$username); 

           
        
            if ($password != $confirm) 
            {
                Session::flash('error', "Please Enter the Same Password");
                // return back();
            }
            $encpassword = Hash::make($confirm);
        
             $referred_by = $this->getReferralUser->ReferralUser($req['referral']);
            //  dd($referred_by);
            //  exit;
            
            $last= BcMaster:: where('pn_id',$referred_by)->first();
            
            $last_placed=$last->c_last_placed;
        
           
            if($last_placed == "" || $last_placed == "R")
            {
                $c_position= 'L';
               
            }
            else{
                $c_position= 'R';
            }
           
           $randomString = $this->getReferralUser->ReferralCode();
           
           $day=Carbon::now()->toDateString();

            DB::beginTransaction();
            try 
            {
              $userData = DB::table('bc_master')
                ->insert(['c_email' => $email, 
                'c_aflag'=>'N',
                'c_username' =>$username, 
                'n_referral_code'=>$randomString,
                'd_join'=>$day,
                'n_ref_id'=>$referred_by,
                'c_wallet_password'=>$encpassword,
                'c_position'=> $c_position
                    ]);
                    
                $id = DB::getPdo()->lastInsertId();
                     
                $userloginData = DB::table('bc_login')
                ->insert(['pc_username' => $username, 
                'c_password' => $encpassword,
                'd_last_login'=>$day]); 
                
                $sponsorData =BcMaster::where('pn_id',$referred_by)
                ->update(["c_last_placed" => $c_position]);
            
                $sungenedata=DB::table('sun_gene')
                    ->insert(['n_id'=>$id,
                        'n_ref_id'=>$referred_by,
                        'c_position'=> $c_position,
                        'c_last_placed'=> $c_position,
                        'n_today_reff_subscription'=>0,
                        'c_strategy'=>$c_position,
                        'n_agroup_subscription'=>0,
                        'n_bgroup_subscription'=>0
                    ]);
                $userwallet=DB::table('user_wallet')
                    ->insert(['user_id'=>$id,
                    ]);
                $useraddress=DB::table('user_address')
                    ->insert(['user_id'=>$id,
                    ]);        
                    
                  $sungenedataupdate = DB::table('sun_gene')
                    ->where('n_id', $referred_by)
                    ->update(array('c_last_placed'=> $c_position));        
                
                      DB::commit();
    
                $data= array();
                $data['status']= 'success';
                $data['message']= '';
              
                 return response()->json($data) ; 
            }
              catch(\Exception $ex)
            {
                DB::rollback();
                // return redirect ('newregister'); 
                throw $ex;
                return $ex;
            }
            
           
    }

}
