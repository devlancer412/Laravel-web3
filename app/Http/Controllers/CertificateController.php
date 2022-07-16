<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BcMaster;
use Illuminate\Support\Facades\Session;


class CertificateController extends Controller
{
    public function sucess() 
    {
        return view('certificate');
    }
    public function display() 
    {  
        $Sucess = Session::get('usernamee');
     
        $username = BcMaster::where('c_username',$Sucess)->first();  
        $email=$username->c_email;

            return response()->json([$Sucess,$email]);     
    }
}
