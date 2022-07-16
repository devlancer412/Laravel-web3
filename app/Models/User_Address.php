<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_Address extends Model
{
    use HasFactory;
    protected $table='user_address';
    
      public function User_Addresses($currency) 
        {
        	if($_SERVER['HTTP_HOST'] == 'localhost') 
        	{
        		return ['status' => 1, 'address' => 'ABCDEFGHIJKLMNOPQRSTUVWXYZ', 'tag' => 'ABCDABCDABCDABCDABCD', 'secret' => 'secretkey', 'public' => 'publickey', 'key' =>' key'];
        	} 
        	else 
        	{
        		if ($currency == "BNB") 
        		{
        			$output = shell_exec('cd '.public_path().'/bep; node address.js');
        			$getAddr = json_decode($output, true);
        			if (isset($getAddr['address']) && $getAddr['address'] != "") 
        			{
        				$addr = $getAddr['address'];
        				$key = $getAddr['privateKey'];
        				return ['status' => 1, 'address' => $addr, 'key' => $key];
        			}
        			return ['status' => 0];
        		} 
        		else if ($currency == "TRX") 
        		{
        			$output = shell_exec('cd '.public_path().'/tron; node address.js');
        			$res = json_decode($output, true);
        			// Log::debug($res);
        			if (isset($res['address'])) 
        			{
        				$private = encryptKey($res['privateKey']);
        				$public = $res['publicKey'];
        				$addr = $res['address']['base58'];
        				$tag = $res['address']['hex'];
        				return ['status' => 1, 'address' => $addr, 'tag' => $tag, 'secret' => $private, 'public' => $public];
        			}
        			return ['status' => 0];
        		}
        		return ['status' => 0];
        	}
        }
}
