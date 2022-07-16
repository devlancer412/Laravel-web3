<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use DB;


class QueryRiseController extends Controller
{
   public function queryrise_submit(Request $req){
       
       try{
            $validate = $req->validate(
            [
                'c_category'    =>  'required' ,
                'c_sub_category'    =>  'required',
                'c_message'    =>  'required',
                'c_file'    =>  'required',
            ],
            [
                'c_category.required'    => 'Please select a category!',
                'c_sub_category.required'    => 'Please select a sub category!',
                'c_message.required'    => 'Please enter a message!',
                'c_file.required'         => 'Please select a file! ', 
            ]);
            
            
            $c_category = strip_tags($req->input('c_category')); 
            $c_sub_category = strip_tags($req->input('c_sub_category')); 
            $c_message = strip_tags($req->input('c_message')); 
            $c_file = strip_tags($req->input('c_file')); 
            if($req->hasfile('c_file'))
            {
                $query_name = "query".time().'.'.$req->c_file->extension();   
                $req->file('c_file')->move('master/queries/',$query_name);
            }
            // `n_user_id`, `c_queries_type`, `c_queries_sub_type`, `c_queries_description`, `c_image`, `d_queries_date`, `c_status`
            $userid = Session::get('hrc_userid');
            date_default_timezone_set('GMT');
        	$temp = strtotime("+1 hours"); 
        	$currentdateandtime = date("Y-m-d H:i:s",$temp);
        	$currentdate = date("Y-m-d",$temp);
    		$current = date("d-m-Y",$temp);
            
            $data = DB::table('queries')->insert(
                ['n_user_id' => $userid, 'c_queries_type' => $c_category,'c_queries_sub_type' => $c_sub_category,'c_queries_description' => $c_message,'c_image' => $query_name,'d_queries_date' => $currentdateandtime]
            );
            if($data == true){
                $message = 'Query submitted and will be responded shortly!';
                return response()->json(['result' => 'success','message' => $message]);
            }else{
                $message = 'Database error!';
                return response()->json(['result' => 'error','message' => $message]);
            }
            // dd($data);
            // exit;
       }
       catch (\Exception $e) {
            // If there is any error it return a error response
            return response()->json(["result" => 'error',
                "message" => $e->getMessage(),
            ]);
        }
        
   }
}
