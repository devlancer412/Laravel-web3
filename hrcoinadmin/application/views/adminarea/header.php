<?php 



		define('BASE_URL',	base_url()); 



		define('ASSET_PATH',	base_url().'assets/adminarea/'); 

		if(!$this->session->userdata('oxypey_admin_logged_in'))	 
	      redirect(base_url().'admin');
			$username = $this->session->userdata('name'); 

		$adminname=$this->session->userdata('adminname');
		$username=$this->session->userdata('c_username');
		$admintype=$this->session->userdata('type');
		$id=$this->session->userdata('id');
		$refer=explode("/",$_SERVER['REQUEST_URI']);
		$fnam=explode("?",$refer[1]);

		 $loadedpage = $fnam[0];


		$menu0=$menu1=$menu2=$menu3=$menu4=$menu5=$menu6=$menu7="";



		if(!empty($loadedpage)){



		switch($loadedpage){



				case 'adminarea': 



				$menu0='active'; 



				break;



				case 'joining_reports_select_date': 



				$menu1='active'; 



				break;



				case 'search_user': 



				$menu1='active'; 



				break;



				case 'prepaidcoupons_transfer': 



				$menu2='active'; 



				break;



				case 'prepaidcoupons': 



				$menu2='active'; 



				break;



				case 'calculation_select': 



				$menu3='active'; 



				break;



				case 'daily_legcount': 



				$menu4='active'; 



				break;



				case 'daily_payout': 



				$menu4='active'; 



				break;



				case 'weekly_payout': 



				$menu4='active'; 



				break;



				case 'tds_reports_select_date': 



				$menu4='active'; 



				break;



				case 'document_user': 



				$menu5='active'; 



				break;



				case 'document_user_approved': 



				$menu5='active'; 



				break;



				case 'wallet_user_list': 



				$menu6='active'; 



				break;



				case 'wallet_master_pending_date': 



				$menu6='active'; 



				break;



				case 'wallet_master_processing_date': 



				$menu6='active'; 



				break;



				case 'wallet_master_paid_date': 



				$menu6='active'; 



				break;



				case 'wallet_full_list': 



				$menu6='active'; 



				break;



				case 'purchase_reports_select_date': 



				$menu7='active'; 



				break;



					}



		}	



?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<meta name="description" content="Hrcrypto">
<meta name="keywords" content="Hrcrypto">
<link rel="shortcut icon" href="<?php echo ASSET_PATH ?>img/fav.png">
<title>CRYPTO NEWS</title>
<link href="<?php echo ASSET_PATH ?>css/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="<?php echo ASSET_PATH ?>css/main.css" rel="stylesheet" media="screen">
<link href="<?php echo ASSET_PATH ?>fonts/icomoon/icomoon.css" rel="stylesheet">
<link href="<?php echo ASSET_PATH ?>css/users.css" rel="stylesheet" media="screen">
<link rel="stylesheet" href="<?php echo ASSET_PATH ?>css/datatables/dataTables.bs.min.css">
<link rel="stylesheet" href="<?php echo ASSET_PATH ?>css/datatables/autoFill.bs.min.css">
<link rel="stylesheet" href="<?php echo ASSET_PATH ?>css/datatables/fixedHeader.bs.css">
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link href="<?php echo ASSET_PATH ?>fonts/icomoon/icomoon.css" rel="stylesheet">
<link href="<?php echo ASSET_PATH ?>css/icheck/custom.css" rel="stylesheet">
<link href="<?php echo ASSET_PATH ?>css/icheck/skins/all.css" rel="stylesheet">

<!--[if lt IE 9]>



			<script src="<?php echo ASSET_PATH ?>js/html5shiv.js"></script>



			<script src="<?php echo ASSET_PATH ?>js/respond.min.js"></script>



		<![endif]-->

<style type="text/css">
.error {
	color: #F00
}
.mandatory {
	color: #F00
}
</style>
<link href="<?php echo ASSET_PATH ?>css/gallery.css" rel="stylesheet" media="screen">

<!--<script src="<?php echo ASSET_PATH ?>js/jquery.js"></script>



<script src="<?php echo ASSET_PATH ?>js/jquery-3.2.1.min.js"></script>-->


<script src="<?php echo base_url();?>assets/adminarea/js/jquerynew.js"></script>
</head>

<body>
<header><a href="<?php echo BASE_URL ?>" class="logo"><img src="https://www.oxypey.com/original/assets/members_area/images/logo-black.png"></a>
  <ul id="header-actions" class="clearfix">
    <li class="list-box user-admin dropdown">
      <div class="admin-details">
        <div class="name"><?php echo $adminname ?></div>
        <div class="designation">
          <?php //echo $username ?>
        </div>
      </div>
      <a id="drop4" href="#" role="button" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-account_circle"></i></a>
      <ul class="dropdown-menu sm">
        <li class="dropdown-content"> <a href="<?php echo BASE_URL ?>admin_logout">Logout</a></li>
      </ul>
    </li>
  </ul>
</header>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false"><span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span></button>
    </div>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <?php if ($admintype == 'admin'){ ?>
        <li class="<?php echo $menu0;?>"><a href="<?php echo BASE_URL ?>adminarea"><i class="icon-blur_on"></i>Dashboard</a></li>
        <li class="dropdown <?php echo $menu1;?>"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="icon-whatshot"></i>Business Reports <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="<?php echo BASE_URL ?>datewise_joining_list">Date wise joining list</a></li>
            <li><a href="<?php echo BASE_URL ?>search_user">Search / Edit Members</a></li>
            <!--<li><a href="<?php echo BASE_URL ?>name_search">Search User Details with Name</a></li>-->
            <li><a href="<?php echo BASE_URL ?>password_update">Password Update</a></li>
            <li><a href="<?php echo BASE_URL ?>transaction_password_update">Transaction Password Update</a></li>
            
            <!-- <li><a href="<?php echo BASE_URL ?>admin_sponser_tree">Sponser Tree</a></li>--> 
            
            <!--<li><a href="<?php echo BASE_URL ?>invester_income">Investor Income List</a></li>
<li><a href="<?php echo BASE_URL ?>company_income">Company Income List</a></li>
<li><a href="<?php echo BASE_URL ?>not_target_archived_list">Not Target Achived List </a></li>-->
            <li><a href="<?php echo BASE_URL ?>subscription_list">Subscription List </a></li>
            
           
          </ul>
        </li>
        <li class="dropdown <?php echo $menu1;?>"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="icon-whatshot"></i>Infinity Level<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="<?php echo BASE_URL ?>infinity_level_income">Infinity Level Income Lists</a></li>
          </ul>
        </li>
        
        <li class="dropdown <?php echo $menu1;?>"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="icon-whatshot"></i>Global Club<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="<?php echo BASE_URL ?>global_club_points">Global Club Points </a></li>
            <li><a href="<?php echo BASE_URL ?>global_plan_eligible_members">Global Plan Eligible Members </a></li>
            <li><a href="<?php echo BASE_URL ?>global_plan_pool_hrc">Global Plan Pool HRC Details </a></li>
            
          </ul>
        </li>
        
        <li class="dropdown <?php echo $menu1;?>"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="icon-whatshot"></i>Royal Referral<span class="caret"></span></a>
          <ul class="dropdown-menu">
             <li><a href="<?php echo BASE_URL ?>royal_referral_points">Royal Referral Points Lists </a></li>
            <li><a href="<?php echo BASE_URL ?>daily_royal_eligibility_list">Daily Royal Eligibility List </a></li>
            <li><a href="<?php echo BASE_URL ?>royal_plan_qualified_members">Royal Plan Qualified Members</a></li>
            <li><a href="<?php echo BASE_URL ?>royal_plan_pool_hrc_details">Royal Plan Pool HRC Details</a></li>
          </ul>
        </li>
        
        <li class="dropdown <?php echo $menu1;?>"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="icon-whatshot"></i>Leadership Bonus<span class="caret"></span></a>
          <ul class="dropdown-menu">
           
          </ul>
        </li>
        
        <li class="dropdown <?php echo $menu1;?>"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="icon-whatshot"></i>Wallet<span class="caret"></span></a>
          <ul class="dropdown-menu">
           
          </ul>
        </li>
        <!--<li class="dropdown <?php echo $menu1;?>"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="icon-whatshot"></i>Board Income<span class="caret"></span></a>



          <ul class="dropdown-menu">

<li><a href="<?php echo BASE_URL ?>referral_income">$10 Sponser Income</a></li>
<li><a href="<?php echo BASE_URL ?>20_referral_income">$20 Sponser Income</a></li>
<li><a href="<?php echo BASE_URL ?>40_referral_income">$40 Sponser Income</a></li>
<li><a href="<?php echo BASE_URL ?>80_referral_income">$80 Sponser Income</a></li>
<li><a href="<?php echo BASE_URL ?>160_referral_income">$160 Sponser Income</a></li>
<li><a href="<?php echo BASE_URL ?>320_referral_income">$320 Sponser Income</a></li>
<li><a href="<?php echo BASE_URL ?>640_referral_income">$640 Sponser Income</a></li>
<li><a href="<?php echo BASE_URL ?>1280_referral_income">$1280 Sponser Income</a></li>
<li><a href="<?php echo BASE_URL ?>2560_referral_income">$2560 Sponser Income</a></li>
<li><a href="<?php echo BASE_URL ?>5120_referral_income">$5120 Sponser Income</a></li>
<li><a href="<?php echo BASE_URL ?>10240_referral_income">$10240 Sponser Income</a></li>
<li><a href="<?php echo BASE_URL ?>autopool_target_count_list">Autopool Target Count List</a></li>


          </ul>



        </li>--> 
        
        <!--<li class="dropdown <?php echo $menu1;?>"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="icon-whatshot"></i>Sales Details<span class="caret"></span></a>



          <ul class="dropdown-menu">

            <li><a href="<?php echo BASE_URL ?>cart_order_pending_details">Pending Order Details</a></li>



	    	<li><a href="<?php echo BASE_URL ?>cart_order_confirm_details">Confirmed Order Details</a></li>



          </ul>



        </li>--> 
        
        <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="icon-envelope"></i>News <span class="caret"></span></a>



          <ul class="dropdown-menu">

            <li><a href="<?php echo BASE_URL ?>news_entry_form">Enter News</a></li>

          </ul>



        </li> 
         <li class="dropdown <?php echo $menu5;?>"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="icon-envelope"></i>Messages<span class="caret"></span></a>



          <ul class="dropdown-menu">

			<li><a href="<?php echo BASE_URL ?>message_entry_form">Messages</a></li>          

          </ul>



        </li>
        <li class="dropdown <?php echo $menu1;?>"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="icon-whatshot"></i>Queries<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="<?php echo BASE_URL ?>queries_inbox">Queries Inbox </a></li>
            <li><a href="<?php echo BASE_URL ?>queries_outbox">Queries Outbox </a></li>

          </ul>
        </li>
        <!--<li class="dropdown <?php echo $menu5;?>"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="icon-envelope"></i>Wallet Approval <span class="caret"></span></a>



          <ul class="dropdown-menu">

			<li><a href="<?php echo BASE_URL ?>document_user_list">Wallet Approval User List</a></li>          




          <li><a href="<?php echo BASE_URL ?>document_user_approved">Approved Wallet User list</a></li>



          </ul>



        </li>-->
        
        <?php }







       if($admintype == 'admin' || $admintype == 'order_staff'){



	  ?>
        <?php



	   }







?>
        <li class="dropdown <?php echo $menu3;?>"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="icon-business_center"></i> Login details <span class="caret"></span></a>
          <ul class="dropdown-menu">
            
            <!-- <li><a href="<?php echo BASE_URL ?>log_details">Login details</a></li>-->
            <li><a href="<?php echo BASE_URL ?>reset_admin_password">Reset admin password</a></li>
            <li><a href="<?php echo BASE_URL ?>reset_common_password">Reset common password</a></li>
          </ul>
        </li>
        
        <!--<li class="dropdown <?php echo $menu3;?>"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="icon-business_center"></i> Withdrwal Area <span class="caret"></span></a>



          <ul class="dropdown-menu">



           <li><a href="<?php echo BASE_URL ?>income_wallet_list">Income Withdrawal</a></li>
           <li><a href="<?php echo BASE_URL ?>pending_wallet_list">Income Withdrawal Pending List</a></li>
           <li><a href="<?php echo BASE_URL ?>delivered_wallet_list">Income Withdrawal Delivered List</a></li>
			<li><a href="<?php echo BASE_URL ?>company_wallet_list">Company Income Withdrawal</a></li>
			<li><a href="<?php echo BASE_URL ?>reset_common_password">Shopping wallet withdrawal</a></li>

          </ul>



        </li>-->
        
      </ul>
    </div>
  </div>
</nav>
<style>



.blink_me {



  animation: blinker 1s linear infinite;



  color:red



}







@keyframes blinker {  



  50% { opacity: 0; }



</style>
