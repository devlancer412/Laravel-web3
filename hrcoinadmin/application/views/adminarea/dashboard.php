<?php 
	//define('BASE_URL',	base_url()); 
//	define('ASSET_PATH',	base_url().'assets/membersarea/');

		
		date_default_timezone_set('GMT');
		$temp= strtotime("+5 hours 30 minutes"); 
		$currentdateandtime = date("Y-m-d H:i:s",$temp);
		$currentdate = date("Y-m-d",$temp);


					$hrc_current_rate = 0;
					$sql2="SELECT `market_price` FROM `currency` WHERE `symbol`='HRC' ";
					$result2 = $this->admin_db->get_results($sql2);			
					if($result2)
					{
					  $sess_array = array();
					  foreach($result2 as $row2)
					  {
							$hrc_current_rate = $row2->market_price;																
					  }
					}
					if($hrc_current_rate=="")
						$hrc_current_rate=0;


					
					$total_members =0;
					$sql2="SELECT COUNT(1) COUNT FROM bc_master  ";
					$result2 = $this->admin_db->get_results($sql2);			
					if($result2)
					{
					  $sess_array = array();
					  foreach($result2 as $row2)
					  {
							$total_members = $row2->COUNT;																
					  }
					}
					$active_members =0;
					$sql2="SELECT COUNT(1) COUNT FROM bc_master WHERE c_aflag='Y' ";
					$result2 = $this->admin_db->get_results($sql2);			
					if($result2)
					{
					  $sess_array = array();
					  foreach($result2 as $row2)
					  {
							$active_members = $row2->COUNT;																
					  }
					}
					$active_globalplan_members =0;
					$sql2="SELECT COUNT(1) COUNT FROM globalplan_eligible_members WHERE c_status='Y' ";
					$result2 = $this->admin_db->get_results($sql2);			
					if($result2)
					{
					  $sess_array = array();
					  foreach($result2 as $row2)
					  {
							$active_globalplan_members = $row2->COUNT;																
					  }
					}
					$todays_subscription = 0;
					$sql2="SELECT sum(dedited_amount) total_subscription FROM income_plan_history where substr(created_at,1,10)='$currentdate'  ";
					$result2 = $this->admin_db->get_results($sql2);			
					if($result2)
					{
					  $sess_array = array();
					  foreach($result2 as $row2)
					  {
							$todays_subscription = $row2->total_subscription;																
					  }
					}
					if($todays_subscription=="")
						$todays_subscription=0;
					$todays_subscription_dollar=$todays_subscription*$hrc_current_rate;

					$total_subscription = 0;
					$sql2="SELECT sum(dedited_amount) total_subscription FROM income_plan_history  ";
					$result2 = $this->admin_db->get_results($sql2);			
					if($result2)
					{
					  $sess_array = array();
					  foreach($result2 as $row2)
					  {
							$total_subscription = $row2->total_subscription;																
					  }
					}
					$total_subscription_dollar=$total_subscription*$hrc_current_rate;
					$total_return=((15/100)*$total_subscription)+$total_subscription;
					$total_return_dollar=$total_return*$hrc_current_rate;

					$top_up_wallet = 0;
					$sql2="SELECT sum(top_up_wallet) top_up_wallet FROM `user_wallet` ";
					$result2 = $this->admin_db->get_results($sql2);			
					if($result2)
					{
					  $sess_array = array();
					  foreach($result2 as $row2)
					  {
							$top_up_wallet = $row2->top_up_wallet;																
					  }
					}
					$top_up_wallet_dollar=$top_up_wallet*$hrc_current_rate;
					$total_infinity_income = 0;
					$sql2="SELECT sum(`n_gross_hrc`) n_gross_hrc FROM `level_income_payout_hdr` WHERE 1";
					$result2 = $this->admin_db->get_results($sql2);			
					if($result2)
					{
					  $sess_array = array();
					  foreach($result2 as $row2)
					  {
							$total_infinity_income = $row2->n_gross_hrc;																
					  }
					}
					$total_infinity_income_dollar=$total_infinity_income*$hrc_current_rate;
					$total_globalclub_income = 0;
					$sql2="SELECT sum(`n_eligible_income`) n_eligible_income FROM `globalplan_income_payouthdr` WHERE 1";
					$result2 = $this->admin_db->get_results($sql2);			
					if($result2)
					{
					  $sess_array = array();
					  foreach($result2 as $row2)
					  {
							$total_globalclub_income = $row2->n_eligible_income;																
					  }
					}
					$total_globalclub_income_dollar=$total_globalclub_income*$hrc_current_rate;

					$total_royalreferal_income = 0;
					$sql2="SELECT sum(`n_eligible_income`) n_eligible_income FROM `royalplan_income_payouthdr` WHERE 1";
					$result2 = $this->admin_db->get_results($sql2);			
					if($result2)
					{
					  $sess_array = array();
					  foreach($result2 as $row2)
					  {
							$total_royalreferal_income = $row2->n_eligible_income;																
					  }
					}
					$total_royalreferal_income_dollar=$total_royalreferal_income*$hrc_current_rate;
					$total_leadership_income = 0;
					$sql2="SELECT sum(`n_income_hrc`) n_income_hrc FROM `rank_details` WHERE 1";
					$result2 = $this->admin_db->get_results($sql2);			
					if($result2)
					{
					  $sess_array = array();
					  foreach($result2 as $row2)
					  {
							$total_leadership_income = $row2->n_income_hrc;																
					  }
					}
					$total_leadership_income_dollar=$total_leadership_income*$hrc_current_rate;
?>








<div class="dashboard-wrapper">



  <div class="container-fluid">
    <div class="top-bar clearfix">
      <div class="row gutter">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
          <div class="page-title">
            <h3>Business Summary </h3>
          </div>
        </div>
        
      </div>
    </div>
    
    <div class="row gutter">
      <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
       <div class="panel no-border height1 yellow-bg">
              <div class="panel-body text-center">
                <div class="user-stats">
                <h5>Todays Subscription hrc</h5>
                  <a href=""><h2><?Php echo $todays_subscription ?></h2></a></hr>
					<a href=""><h3>$<?Php echo $todays_subscription_dollar ?></h3></a>
				  
                </div>
              </div>
            </div>
      </div>
	   <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
       <div class="panel no-border height1 yellow-bg">
              <div class="panel-body text-center">
                <div class="user-stats">
                <h5>Total Subscription hrc</h5>
                  <a href=""><h2><?Php echo $total_subscription ?></h2></a></hr>
					<a href=""><h3>$<?Php echo $total_subscription_dollar ?></h3></a>
                  
                </div>
              </div>
            </div>
      </div>     
<div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
       <div class="panel no-border height1 yellow-bg">
              <div class="panel-body text-center">
                <div class="user-stats">
                <h5>Total Return hrc</h5>
                  <h2><a href=""><?Php echo $total_return ?></a></h2></hr>
					<a href=""><h3>$<?Php echo $total_return_dollar ?></h3></a>
                  
                </div>
              </div>
            </div>
      </div>   
	   <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
       <div class="panel no-border height1 yellow-bg">
              <div class="panel-body text-center">
                <div class="user-stats">
                <h5>Topup Wallet hrc</h5>
                  <h2><a href=""><?Php echo $top_up_wallet ?></a></h2></hr>
					<a href=""><h3>$<?Php echo $top_up_wallet_dollar ?></h3></a>
                  
                </div>
              </div>
            </div>
      </div>       
               
      <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
       <div class="panel no-border height1 blue-bg">
              <div class="panel-body text-center">
                <div class="user-stats">
                <h5>Today HRC Coin Rate</h5>
                  <h2><a href="">$<?Php echo $hrc_current_rate ?></a></h2>
                
                  
                </div>
              </div>
            </div>
      </div>
  
      
	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
       <div class="panel no-border height1 green-bg">
              <div class="panel-body text-center">
                <div class="user-stats">
                <h5>Total Members</h5>
                  <h2><a href="#"><?Php echo $total_members ?></a></h2>
                  
                </div>
              </div>
            </div>
      </div>  
      
	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
       <div class="panel no-border height1 green-bg">
              <div class="panel-body text-center">
                <div class="user-stats">
                <h5>Total Active Members</h5>
                  <h2><a href="#"><?Php echo $active_members ?></a></h2>
                  
                </div>
              </div>
            </div>
      </div>            
      
           <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
            <div class="panel no-border height1 red-bg">
              <div class="panel-body text-center">
                <div class="user-stats">
                <h5>Total Global Club Members </h5>
                 <h2><a href="#"> <?Php echo $active_globalplan_members ?></a></h2>
                  
                </div>
              </div>
            </div>
          </div>     
      
	   <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
       <div class="panel no-border height1 green-bg">
              <div class="panel-body text-center">
                <div class="user-stats">
                <h5>Total Infinity Income hrc</h5>
                  <h2><a href=""><?Php echo $total_infinity_income ?></a></h2></hr>
					<a href=""><h3>$<?Php echo $total_infinity_income_dollar ?></h3></a>
                  
                </div>
              </div>
            </div>
      </div>       
               
      <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
       <div class="panel no-border height1 green-bg">
              <div class="panel-body text-center">
                <div class="user-stats">
                <h5>Total Global Club Income hrc</h5>
                  <h2><a href=""><?Php echo $total_globalclub_income ?></a></h2></hr>
					<a href=""><h3>$<?Php echo $total_globalclub_income_dollar ?></h3></a>
                  
                </div>
              </div>
            </div>
      </div>
  
      
	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
       <div class="panel no-border height1 green-bg">
              <div class="panel-body text-center">
                <div class="user-stats">
				<h5>Total Royal Club Income hrc</h5>
                  <h2><a href="<?php echo BASE_URL ?>sponsor_level_income"><?Php echo $total_royalreferal_income ?></a></h2></hr>
					<a href=""><h3>$<?Php echo $total_royalreferal_income_dollar ?></h3></a>
                  
                  
                </div>
              </div>
            </div>
      </div>       
      
           <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
            <div class="panel no-border height1 red-bg">
              <div class="panel-body text-center">
                <div class="user-stats">
                <h5>Total Leadership Bonus  hrc</h5>
           <h2><a href="<?php echo BASE_URL ?> roi_withdrawals">     <h2><?Php echo $total_leadership_income ?></h2></a></h2></hr>
					<a href=""><h3>$<?Php echo $total_leadership_income_dollar ?></h3></a>
                  
                  
                </div>
              </div>
            </div>
          </div>       
      
      
           
      <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
        <div class="row gutter">

          

        
    <!--      
          <div class="col-lg-6 col-md-6 col-sm-3 col-xs-6">
            <div class="panel no-border height1 green-bg">
              <div class="panel-body no-padding">
                <div class="user-stats" >
                  <h5>Total Registrations: <?Php echo $total_leadership_income ?></h5>
                  <h5>Active Investors: <?Php echo $total_leadership_income ?></h5>

                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-3 col-xs-6">
            <div class="panel no-border height1 blue-bg">
              <div class="panel-body no-padding">
                <div class="user-stats" >
                  <h5>XXXX: </h5>
                  <h5>XXXXX: </h5>
                  <h5>XXXXX Distributor: </h5>
                </div>
              </div>
            </div>
          </div>-->
        </div>
      </div>
    </div>
  </div>



</div>



