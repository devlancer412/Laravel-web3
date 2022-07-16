<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\BcMaster;
use App\Models\BcLogin;
use Carbon\Carbon;
use DB;
class LoginController extends Controller
{
    public function index() 
    {
		return view('index1');
	}
    public function __construct()
    {
        $this->login=new BcLogin;
    }
    
    // -------------------------------view login blade page--------------------------------
    public function Login()
    { 
        return view ('Login');
    }
    // ------------------------Function for checking username and password------------------
    public function check(Request $req)
    {
//  -----------------------------------------Laravel validation-----------------------------       
        $req->validate(
            [
                'c_username'    =>  'required |max:10 |min:3' ,
                'c_password'    =>  'required |min:3 |max:15',
            ],
            [
                'c_username.required'    => 'User Name is required',
                'c_username.min'         => 'User Name Must have atleast 3 characters ',  
                'c_username.max'         => 'username must have atmost 10 characters',
                

                'c_password.required'    => 'Password is required',
                'c_password.min'         => 'Password Must have atleast 3 characters ',  
                'c_password.max'    => 'Password must have atmost 15 characters',

            ]);
//  ----------------------------------------Username Checking from Database------------------------------- //
        $user_name= strip_tags($req->input('c_username')); 
        $get_userid = BcLogin::where('pc_username',$user_name)->first();
        $user_pswd = strip_tags($req->input('c_password')); 
        if($get_userid)
        {   
 // -------------------------------------------Password Checking from Database--------------------------- //
            if(Hash::check($user_pswd, $get_userid->c_password))
            {  
                $data1=BcMaster::where('c_username','=',$user_name)->first();  
                $isactive=$data1->c_tflag; 
                $isenabled=$data1->c_enabled_ind;
                if($isactive == "Y"  &&  $isenabled == 1)
                { 
                    $user_id=$get_userid->pc_username;
                    $data=BcMaster::where('c_username','=',$user_id)->first();
                   
                    $hrc_userid= $data->pn_id;
                    $hrc_username = $data->c_username;
                    $hrc_userdetail=$data->c_fname." ".$data->c_lname;
                    $hrc_userreferralcode=$data->n_referral_code;
                    Session::put('hrc_username',$hrc_username);
                    Session::put('hrc_userid',$hrc_userid);
                   
                    Session::put('hrc_userdetails',$hrc_userdetail);
                    
                    // Session::put('hrc_userreferralcode',$hrc_userreferralcode);

                   
      //  -------------Insert Login Time ---------------------------------------- //
                        $array['d_last_login']=Carbon::now();
                        $this->login->updateQuery("bc_login",$array,$user_name);
                        
                        $data=array();
                        $data['status']='success';
                        $data['message']='Login success';
                        return response()->json($data) ;                        
                    
                }
                 else
                {
                    $data=array();
                    $data['status']='error';
                    $data['message']='Invalid Login';
                    return response()->json($data) ;          
                } 
            }                     
            
            else
            {
                $data=array();
                $data['status']='error';
                $data['message']='Incorrect Password ';
                return response()->json($data) ;          
            }  
        }
        else
        {
            $data=array();
            $data['status']='error';
            $data['message']='Username is not Registered with us';
            return response()->json($data) ;          
        }
    }
    // -----------------------------username checking----------------------------
    public function username_check(Request $req)
    {
        $login_user=strip_tags($req->c_username); 
        $get_username = BcLogin::where('pc_username',$login_user)->first();
        if($get_username)
        {
            $return =true;        
        }
        else
        {
            $return = false;
        }
        echo json_encode($return);
        exit;
    }
    // --------------------------------------------------Logout------------------------------------------------
    function logout(Request $request)
    {
        if($request->session()->has(['hrc_username','hrc_userid','hrc_userdetails']))
        {
            $userid= Session::get('hrc_username');
            date_default_timezone_set('GMT');
			$temp= strtotime("+1 hours"); 
			$currentdateandtime = date("Y-m-d H:i:s",$temp);
			$currentdate = date("Y-m-d",$temp);
            $data= DB::table('bc_login')
            ->where('pc_username','=',$userid)
            ->update(['d_last_logout' => $currentdateandtime]);

            
            $request->session()->forget(['hrc_username','hrc_userid','hrc_userdetails']);
            return redirect('login')->with('fail','Logout Successfully');
        }
    }
}
