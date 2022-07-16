<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\BcMaster;
use App\Models\BcLogin;
use App\Models\Currency;
use App\Models\User_wallet;
use App\Models\globalPlanEligiblemember;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use App\Models\IncomePlanHistory;
class SubscriptionInsertionController extends Controller
{
    public function confirmsubscription(Request $request)
    {
        $sesran= Session::get('sesran');
        $getran = strip_tags($request->input('getran')); 
        $sesrangetran = false;
        if($sesran ==  $getran)
        {
            $random = rand(10000000,1000000000);
            Session::put('sesran',$random);
            $sesrangetran = true;
        }
        if($sesrangetran == false)
        {
            return redirect('subscriptionconfirmation');
        }
        else
        {
            $userid= Session::get('hrc_userid');
            $name = strip_tags($request->input('name')); 
            $planamt = strip_tags($request->input('planamt')); 
            $subpackage= strip_tags($request->input('subpackage')); 
            $subhrc=0;
            if($subpackage=="Basic")
                $subhrc=10;
            if($subpackage=="Premium")
                $subhrc=125;
            if($subpackage=="Premium Plus")
            {
              
            }
           
             $wallet = User_wallet :: where('user_id',$userid)->select('HRC')->first();
            $current_hrc_balance= $wallet->HRC;
             
            if($current_hrc_balance>= $subhrc)
            {
               	    date_default_timezone_set('GMT');
        			$temp= strtotime("+1 hours"); 
        			$currentdateandtime = date("Y-m-d H:i:s",$temp);
        			$currentdate = date("Y-m-d",$temp);
    				$current = date("d-m-Y",$temp);
        	
                $totalsub= Currency :: where('symbol','HRC')->select('market_price')->first();
                $marketvalue = $totalsub->market_price;
                $sponsor = BcMaster :: where('pn_id',$userid)->select('n_ref_id')->first();
                $sponsorid = $sponsor->n_ref_id;
               
                $subenddate = date('Y-m-d H:i:s', strtotime( $currentdateandtime . " +365 days"));
 
                $transactionid = DB::table('hrcincome_wallet_transaction_master')
                    ->max('n_transcation_no');
                    
                if($transactionid >	0)
                {
    				$transactionid=$transactionid+1;
                }
    			else
    			{
    				$transactionid=1;
    			}
                    
                   ;
                $wallet_transferslno = DB::table('hrcincome_wallet_transaction_master')
                ->max('n_slno');
 
			    if($wallet_transferslno >	0)
			    {
					$wallet_transferslno=$wallet_transferslno+1;
			    }
				else
				{
					$wallet_transferslno=1;				   
				}	
				
			    $amount_beforetranscation =	$current_hrc_balance;
			    $amount_transactionnamount = $subhrc;
			    $amount_aftertranscation = $amount_beforetranscation - $amount_transactionnamount;
			    
			  
			    $hrcincomewallet = DB::table('hrcincome_wallet_transaction_master')
                    ->insert(['n_slno' => $wallet_transferslno, 
                    'n_transcation_no' => $transactionid, 
                    'c_trans_type'=>'Level Income',
                    'n_from_id'=>$userid,
                    'n_to_id'=> -1,
                    'c_status' => 'Y',
                    'n_accbalance_before'=> $amount_beforetranscation ,
                    'n_trans_amount' => $amount_transactionnamount, 
                    'n_accbalance_after'=>$amount_aftertranscation,
                    'd_transcation'=> $currentdateandtime]);
             
                $userwallet = DB::table('user_wallet')
                    ->where('user_id',$userid)
                    ->update(['HRC' =>$amount_aftertranscation
                        ]);
                    
                
                
                $incomeplan = DB::table('income_plan_history')
                    ->insert(['user_id' => $userid, 
                    'plan_type' => $subpackage, 
                    'plan_amount'=>$planamt,
                    'market_price'=>$marketvalue,
                    'dedited_amount'=> $subhrc,
                    'referred_by' => $sponsorid,
                    'status'=> 'Subscribed' ,
                    'return_status' => 'placed', 
                    'sub_end_date'=>$subenddate,
                    'created_at'=>$currentdateandtime,
                    'c_income_status'=> 'Y']);
                    
                $bcmaster = DB::table('bc_master')
                    ->where('pn_id',$userid)
                    ->where('c_aflag','N')
                    ->update(['c_aflag'=> 'Y',
                    'd_activated'=>$currentdateandtime]);
                
        		$sponsor_premium=0;$sponsor_premiumplus=0;$sponsor_total_premium=0;
                   $plan = DB::table('income_plan_history')
                   ->where('user_id',$sponsorid)
                   ->where('created_at','<=',$currentdate)
                   ->select('plan_type')
                   ->get();
               
               	    if($plan)
					{
						foreach($plan as $row2)
						{					

							$plan_type= $row2->plan_type;
								if($plan_type == "Premium")
							{
								$sponsor_premium=$sponsor_premium + 1;
							}
							if($plan_type == "Premium - Topup")
							{
								$sponsor_premiumplus=$sponsor_premiumplus + 1;
							}		
						}
						
					}
					 $sponsor_total_premium=$sponsor_premium+$sponsor_premiumplus;
				 
               	    if($sponsor_total_premium>=2)
               	    {				   
				        $basic_count=0; $premium=0; $premiumplus=0;	$total_premium=0;
					    $data =  DB::table('bc_master')
        					 ->where('n_ref_id',$sponsorid)
        					 ->select('pn_id')
        					 ->get();
    					if($data)
    					{
    					    foreach ($data as $row1)
    					    {
    					        $cid = $row1->pn_id;
    					        $sqlbcmaster = DB::table('income_plan_history')
                					 ->where('user_id',$cid)
                					 ->where('created_at','<=',$currentdate)
                					 ->select('plan_type')
                					 ->get();
                				 	 
                					 if($sqlbcmaster)
                					 {
            					     	foreach($sqlbcmaster as $row2)
								        {					
							
        									$plan_type= $row2->plan_type;
        
        									if($plan_type == "Basic")
        									{
        										$basic_count=$basic_count + 1;
        									}
        									if($plan_type == "Premium")
        									{
        										$premium=$premium + 1;
        									}
        									if($plan_type == "Premium - Topup")
        									{
        										$premiumplus=$premiumplus + 1;
        									}							  
        							    }
        							   
            					    }
        					        $total_premium=$premium+$premiumplus;
        					       
        					        if($total_premium>=2)
        					        {
        					            $sqluserinfo= DB::table('bc_master')
        					                ->where('pn_id',$sponsorid)
        					                ->update(['c_infinity_income_qualified' => 'Y',
        					                'd_infinity_income_qualified' =>$currentdateandtime
        					                    ]);
        					        }
    					       
    					    }
    					}
  			
               	    }
               	    
               	    
               	  
               	    $user= DB::table('income_plan_history')
               	    ->join('bc_master','bc_master.pn_id', '=', 'income_plan_history.user_id')
               	     ->where(DB::raw("(DATE_FORMAT(created_at,'%d-%m-%Y') ) "),'=', $current)
               	    ->orWhere('plan_type','=','Premium - Topup')
               	    ->where('plan_type','=','Premium')
               	    ->where('dedited_amount','>', 0)
               	    ->where('c_infinity_income_qualified','=', 'N')
               	     ->select('user_id')
               	    ->get();
               	     if($user)
               	     {
               	       	foreach($user as $row2)
				        {	
				             $sponsor_id = $row2->user_id;
				             $basic_count=0; $premium=0; $premiumplus=0;	$total_premium=0;	
				             $nref_id = DB::table('bc_master')
				                    ->where('n_ref_id', $sponsor_id)
				                    ->select('pn_id')
				                    ->get();
				            if($nref_id) 
				            {
				                foreach($nref_id as $row2)
				                {
				                    $cid = $row2->pn_id;
				                    $sqlbcmaster2 = DB::table('income_plan_history')
				                    ->where(DB::raw("(DATE_FORMAT(created_at,'%d-%m-%Y') ) "),'<=', $current)
				                    ->where('user_id','=',$cid)
				                    ->select('plan_type')
				                    ->get();
			                        if($sqlbcmaster2)
    						        {
        								foreach($sqlbcmaster2 as $row2)
        								{					
        							
        									$plan_type= $row2->plan_type;
        
        									if($plan_type == "Basic")
        									{
        										$basic_count=$basic_count + 1;
        									}
        									if($plan_type == "Premium")
        									{
        										$premium=$premium + 1;
        									}
        									if($plan_type == "Premium - Topup")
        									{
        										$premiumplus=$premiumplus + 1;
        									}							  
        							    }
        							}
        							
				                   
				                }
				            
				            }
				             $total_premium=$premium+$premiumplus;
				             if($total_premium>=2)
					      {
						  $sqluserinfo = DB::table('bc_master')
							->where('pn_id','=', $sponsor_id)
							->update(['c_infinity_income_qualified' => 'Y',
							'd_infinity_income_qualified' => $currentdateandtime]);								   
						
						}
				            	
				        }
               	         
               	     }
               	    
               	      $nctrno = DB::table('level_income_payout_hdr')
					 ->max('n_ctr_no');
		
					 $transactionid = DB::table('hrcincome_wallet_transaction_master')
					 ->max('n_transcation_no');
					 
					  $wallet_transferslno = DB::table('hrcincome_wallet_transaction_master')
					 ->max('n_slno');
					 
					 $topupwallet_transferslno = DB::table('hrctopup_wallet_transaction_master')
					 ->max('n_slno');
					 
					  $topup_transactionid = DB::table('hrctopup_wallet_transaction_master')
					 ->max('n_transcation_no');
					 
					 /////payout calculation end ///////////////////	
					 
					 $hrcincome = DB::table('income_plan_history')
									->where(DB::raw("(DATE_FORMAT(created_at,'%d-%m-%Y') ) "),'=', $current)
				                    ->where('dedited_amount','>', 0)
 									->where('c_income_status', 'N')
									->select('id','user_id','dedited_amount','created_at')
									->get();
					foreach ($hrcincome as $row)
					{
						$serialno_id = $row->id;
						$cid = $row->user_id;
						$noofhrc = $row->dedited_amount;
						
						$c_active ="N";$infinity_income_qualified="N";
					    $bcmaster = DB::table('bc_master')
    						 ->where('pn_id', $cid)
    						 ->select('pn_id','n_ref_id','c_infinity_income_qualified')
						     ->get();
				        if($bcmaster)
					    {			
					        foreach ($bcmaster as $row)
					        {
    						   $n_ref_id = $row->n_ref_id;
    						   $infinity_income_qualified = $row->c_infinity_income_qualified;
					        }
					    }	
					    //---------------this part for leg  Count updation-------------
	
    					$parentid = $cid;
    					$childid = $n_ref_id;
    					$level=1;$levelbv=0;$actual_level=1;
    					
    					if($noofhrc>0)
						{
							while ($childid >0 && $level<=10 )//        --- InnerLoop to connect uplines
							{
								$basic_count=0; $premium=0; $premiumplus=0;
								$sqlbcmaster2=DB::table('income_plan_history')
									->where(DB::raw("(DATE_FORMAT(created_at,'%d-%m-%Y') ) "),'=', $current)
									->where('user_id', $childid)
									->select('plan_type')
									->get();
								if($sqlbcmaster2)
								{
									foreach($sqlbcmaster2 as $row2)
									{					
							
                                		$plan_type= $row2->plan_type;
										if($plan_type == "Basic")
										{
											$basic_count=$basic_count + 1;
										}
										if($plan_type == "Premium")
										{
											$premium=$premium + 1;
										}
										if($plan_type == "Premium - Topup")
										{
											$premiumplus=$premiumplus + 1;
										}							  
						  			}
								}
								if($basic_count>0 || $premium>0 || $premiumplus>0)
								{
						
                        			if($level==1)
                        			{
										if($premium>0 || $premiumplus>0)
											$precentage=30;
										else
											$precentage=50;
												
											$levelincome_hrc=($precentage/100)*$noofhrc;   
											$level=$level+1;	
                        			}		
									if($infinity_income_qualified=="Y" && $level>1)//2 premium or premium plus
									{
										if($level==2)
										{
											$precentage=3;

											$levelincome_hrc=($precentage/100)*$noofhrc;	
										}
										elseif($level==3){
											$precentage=3;
											$levelincome_hrc=($precentage/100)*$noofhrc;
										}
										elseif($level==4){
											$precentage=3;
											$levelincome_hrc=($precentage/100)*$noofhrc;
										}
										elseif($level==5){
											$precentage=3;
											$levelincome_hrc=($precentage/100)*$noofhrc;
										}		
										elseif($level==6){
											$precentage=3;
											$levelincome_hrc=($precentage/100)*$noofhrc;	
										}				
										elseif($level==7){
											$precentage=3;
											$levelincome_hrc=($precentage/100)*$noofhrc;	
										}	
										elseif($level==8){
											$precentage=3;
											$levelincome_hrc=($precentage/100)*$noofhrc;
										}
										elseif($level==9){
											$precentage=3;
											$levelincome_hrc=($precentage/100)*$noofhrc;
										}
										elseif($level==10){
											$precentage=3;
											$levelincome_hrc=($precentage/100)*$noofhrc;
										}
										
										$level=$level+1;	
									}                                              
                        //---------------------------------------
									$hrc_coin_wallet=0;
									$hrc_topup_wallet=0;

									if($levelincome_hrc>0)
									{
										if($basic_count>0 && $premium==0 && $premiumplus==0 && $noofhrc>10)//basic pakge holder sponsor higher pakages then 100% goes to topup wallet
										{						
											$hrc_coin_wallet=(0/100)*$levelincome_hrc;
											$hrc_topup_wallet=(100/100)*$levelincome_hrc;
										}else if($basic_count>0 || $premium>0 || $premiumplus>0)
										{
											$hrc_coin_wallet=(50/100)*$levelincome_hrc;
											$hrc_topup_wallet=(50/100)*$levelincome_hrc;						
										}
										$query_dailylegcount = DB::table('daily_referal_pv_count')
										->insert(['n_id'=> $childid ,
												'd_from_date' => $currentdateandtime,
												'd_to_date' => $currentdateandtime,
												'n_activated_userid' => $cid,
												'n_user_id' =>  $cid,
												'n_level' => $level ,
												'n_actual_level' => $actual_level ,
												'n_subscribed_hrc' => $noofhrc ,
												'n_percentage' => $precentage,
												'n_total_income' => $levelincome_hrc ,
												'n_hrc_wallet' => $hrc_coin_wallet,
												'n_topup_wallet' => $hrc_topup_wallet,
												'c_status' => 'Y',
												'c_income_type' => 'Level Income']);
												
												
											
										if($nctrno >0)
											$nctrno=$nctrno+1;
										else
											$nctrno=1;
											
											
											$sqlGenepvinsert = DB::table('level_income_payout_hdr')
											->insert(['n_ctr_no'=> $nctrno ,
											'n_id' => $childid,
											'd_from' => $currentdate,
											'd_to' => $currentdate,
											'n_gross_hrc' =>  $levelincome_hrc,
											'n_deduction_hrc' => 0 ,
											'n_net_hrc' => $levelincome_hrc]);
											
											
									if($transactionid >	0)
											$transactionid=$transactionid+1;
										else
											$transactionid=1;
										
										if($topup_transactionid >0)
											$topup_transactionid=$topup_transactionid+1;
										else
											$topup_transactionid=1;						
											
										if($wallet_transferslno >	0)
											$wallet_transferslno=$wallet_transferslno+1;
										else
											$wallet_transferslno=1;
									
										if($topupwallet_transferslno >	0)
											$topupwallet_transferslno=$topupwallet_transferslno+1;
										else
											$topupwallet_transferslno=1;							
									
									
											
										$HRCwalletamount = 0; $HRCtopupwalletamount =0;
										 $userwallet =  DB::table('user_wallet')
										 	->where('user_id',$childid)
											->select('HRC','top_up_wallet')
											->get();
												
										if($userwallet)
										{
										
										  foreach($userwallet as $row2)
										  {
					
												$HRCwalletamount = $row2->HRC;
												  $HRCtopupwalletamount = $row2->top_up_wallet;
										  }
										}	
										
										
								$amount_beforetranscation=$HRCwalletamount;	
								$amount_transactionnamount=$hrc_coin_wallet;	
								$amount_aftertranscation=$HRCwalletamount+$amount_transactionnamount;	
								$query_transcation_master1 =  DB::table('hrctopup_wallet_transaction_master')
															->insert(['n_slno' => $topupwallet_transferslno,
																	'n_transcation_no' =>$topup_transactionid ,
																	'c_trans_type' => 'Level Income' ,
																	'n_from_id' => -1,
																	'n_to_id' => $childid,
																	'c_status' => 'Y',
																	'n_accbalance_before' => $amount_beforetranscation,
																	'n_trans_amount' => $amount_transactionnamount,
																	'n_accbalance_after' => $amount_aftertranscation,
																	'd_transcation'=> $currentdateandtime	]);															

										$query_wallet_master = DB::table('user_wallet')
															->where('user_id',$childid)
															->update(['top_up_wallet' => $amount_aftertranscation ]);

									}
								}


                                $actual_level=$actual_level+1;
							
								$parentid = $childid;
								$infinity_income_qualified = "N";

								$sqlbcmaster = DB::table('bc_master')
												->where('pn_id', $parentid)
												->select('n_ref_id','c_infinity_income_qualified')
												->get();
						
								if($sqlbcmaster)
								{
								  foreach($sqlbcmaster as $row)
								  {					
									$childid = $row->n_ref_id;
									$infinity_income_qualified = $row->c_infinity_income_qualified;
								  }
								}	

					    }
					
					}
					$query_income_plan	= DB::table('income_plan_history')
									->where('user_id', $cid)
									->where('id', $serialno_id)
									->update(['c_income_status' => 'Y']);
			 
				}  
				$data=array();  
                $data['status']='success';
                $data['message']=' Package Successfully Subscribed';
                return response()->json($data) ; 
            }
            else
            {
              return redirect()->back()->with('message', 'Insufficient Balance!');
            }
         
        }
    }
    
}
