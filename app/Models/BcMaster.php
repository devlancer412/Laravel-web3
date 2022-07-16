<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BcMaster extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table='bc_master';
	protected $fillable = ['c_email'];

    public function ReferralUser($referCode) 
    {
		if($referCode != 0) 
		{
			$ref_user = BcMaster::where('n_referral_code',$referCode)->first();
			if($ref_user) 
			{
				return $ref_user->pn_id;
			} 
			else 
			{
				return '0';
			}
		} 
		else 
		{
			return '0';
		}
	}

	public function ReferralCode() {
		$random = rand(10000000,1000000000);
		$isExist = BcMaster::where('n_referral_code',$random)->exists();
		
		if($isExist) {
			return $this->getReferralCode();
		} else {
			return $random;
		}
	}

}
