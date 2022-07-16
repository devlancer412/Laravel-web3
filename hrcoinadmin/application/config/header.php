<?php 
		define('BASE_URL',	base_url()); 
		define('ASSET_PATH',	base_url().'assets/adminarea/'); 
		$adminname=$this->session->userdata('adminname');
		$username=$this->session->userdata('c_username');
		$admintype=$this->session->userdata('type');
		$id=$this->session->userdata('id');
		$refer=explode("/",$_SERVER['REQUEST_URI']);
		$fnam=explode("?",$refer[2]);
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
<meta name="description" content="KMPL">
<meta name="keywords" content="KMPL">
<link rel="shortcut icon" href="<?php echo ASSET_PATH ?>img/fav.png">
<title>KMPL - Back Office</title>
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
.error {color: #F00}
.mandatory {color: #F00}
</style>    
<link href="<?php echo ASSET_PATH ?>css/gallery.css" rel="stylesheet" media="screen">
<!--<script src="<?php echo ASSET_PATH ?>js/jquery.js"></script>
--> <script src="<?php echo base_url();?>assets/membersarea/plugins/jQuery/jQuery-2.1.4.min.js"></script>

</head>
<body>
<header><a href="index.html" class="logo"><img src="<?php echo ASSET_PATH ?>img/logo.png" alt="Arise Admin Dashboard Logo"></a>
  <ul id="header-actions" class="clearfix">
    <li class="list-box hidden-xs dropdown"><a id="drop2" href="#" role="button" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-warning2"></i> </a><span class="info-label blue-bg">0</span>
      <ul class="dropdown-menu imp-notify">
        <li class="dropdown-header">You have 0 notifications</li>
        <li class="dropdown-footer">See all the notifications</li>
      </ul>
    </li>
    <li class="list-box hidden-xs dropdown"><a id="drop3" href="#" role="button" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-archive2"></i> </a><span class="info-label red-bg">0</span>
      <ul class="dropdown-menu progress-info">
        <li class="dropdown-header">You have 0 pending tasks</li>
         <li class="dropdown-footer">See all the tasks</li>
      </ul>
    </li>
    <li class="list-box user-admin dropdown">
      <div class="admin-details">
        <div class="name"><?php echo $adminname ?></div>
        <div class="designation"><?php //echo $username ?></div>
      </div>
      <a id="drop4" href="#" role="button" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-account_circle"></i></a>
      <ul class="dropdown-menu sm">
        <li class="dropdown-content">
        <a href="<?php echo BASE_URL ?>editprofile">Edit Profile</a> 
        <a href="<?php echo BASE_URL ?>editpassword">Change Password</a>
          <a href="<?php echo BASE_URL ?>admin_logout">Logout</a></li>
      </ul>
    </li>
  </ul>
  <div class="custom-search hidden-sm hidden-xs">
    <input type="text" class="search-query" placeholder="Search here ...">
    <i class="icon-search3"></i></div>
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
        <li class="dropdown <?php echo $menu1;?>"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="icon-whatshot"></i>Joining Reports <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="<?php echo BASE_URL ?>joining_reports_select_date">Date wise joining list</a></li>
           <!-- <li><a href="<?php echo BASE_URL ?>distributoractivated_reports_select_date">Distributor activated list</a></li>
            <li><a href="<?php echo BASE_URL ?>exdistributoractivated_reports_select_date">Executive Distributor activated list</a></li>
            <li><a href="<?php echo BASE_URL ?>upgraded_reports_select_date">Upgraded Executive Distributors list</a></li>
            
            <li><a href="<?php echo BASE_URL ?>notactivated_reports_select_date">Not activated members list</a></li>-->
            <li><a href="<?php echo BASE_URL ?>search_user">Search Members</a></li>
          </ul>
        </li>
       <!-- <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="icon-business_center"></i> Activation Area <span class="caret"></span></a>
          <ul class="dropdown-menu">
          <li><a href="<?php echo BASE_URL ?>search_user_pre_starter_activation">Prestarter Activation</a></li>
          <li><a href="<?php echo BASE_URL ?>search_user_starter_activation">Starter Activation</a></li>
            <li><a href="<?php echo BASE_URL ?>search_user_distributor_activation">Distributor Activation</a></li>
            <li><a href="<?php echo BASE_URL ?>search_user_exdistributor_activation">Executive Distributor Activation</a></li>
            <li><a href="<?php echo BASE_URL ?>upgrade_search_user_exdistributor_activation">Upgradation - Distributor Activation</a></li>
          </ul>
        </li>-->
		<li class="dropdown <?php echo $menu2;?>"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="icon-business_center"></i> Coupon Area <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="<?php echo BASE_URL ?>prepaidcoupons_transfer">Transfer Reg Coupon</a></li>   
            <li><a href="<?php echo BASE_URL ?>transfered_coupons">Coupon details</a></li>  
            <li>--------------------</li>      
			 <li><a href="<?php echo BASE_URL ?>shopping_point_transfer">Transfer Shopping Points</a></li> 
             <li><a href="<?php echo BASE_URL ?>activation_point_transfer">Transfer Activation Points</a></li> 			 			<li><a href="<?php echo BASE_URL ?>transfered_shoppingpoints">Transfer Shopping Point details</a></li>   
          </ul>
        </li>        
      <!--  <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="icon-envelope"></i>Mail <span class="caret"></span></a>
          <ul class="dropdown-menu">
          <li><a href="<?php echo BASE_URL ?>mailinbox">Mail Inbox</a></li>
            <li><a href="<?php echo BASE_URL ?>mailcompose">Mail Compose</a></li>
            <li><a href="<?php echo BASE_URL ?>sentmails">Sent Mails</a></li>
          </ul>
        </li>
-->
        <li class="dropdown <?php echo $menu3;?>"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="icon-business_center"></i> Calculation <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="<?php echo BASE_URL ?>calculation_select">Daily Calculation</a></li>
          </ul>
        </li>  
        <li class="dropdown <?php echo $menu4;?>"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="icon-business_center"></i> Accounts <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="<?php echo BASE_URL ?>daily_legcount">Daily binary BV details</a></li>
            <li><a href="<?php echo BASE_URL ?>daily_payout">Daily binary Payout details</a></li>
            <li><a href="<?php echo BASE_URL ?>weekly_payout">Weekly binary Payout details</a></li>
              <!--<li><a href="<?php echo BASE_URL ?>pending_weeklypayout_details">Weekly Pending Payout details</a></li>-->
              <li><a href="<?php echo BASE_URL ?>tds_reports_select_date">Datewise TDS List</a></li>
<!--            <li><a href="<?php echo BASE_URL ?>cashflow">Cash Flow</a></li>
-->          </ul>
        </li>        
		<!--<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="icon-envelope"></i>Communication<span class="caret"></span></a>
          <ul class="dropdown-menu">
          <li><a href="<?php echo BASE_URL ?>daily_thoughts_form">Enter Daily Thoughts</a></li>
            <li><a href="<?php echo BASE_URL ?>daily_thoughts">Daily Thoughts</a></li>
            <li><a href="<?php echo BASE_URL ?>news_entry_form">Enter News</a></li>
             <li><a href="<?php echo BASE_URL ?>news">View News</a></li>
            <li><a href="<?php echo BASE_URL ?>gallery_create_step1/WGN">Gallery Image Upload</a></li>
          </ul>
        </li>-->
		<!--<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="icon-envelope"></i>Cart orders <span class="caret"></span></a>
          <ul class="dropdown-menu">
          <li><a href="<?php echo BASE_URL ?>package_order_foradmin">Package pending orders</a></li>
          <li><a href="<?php echo BASE_URL ?>package_order_confirmed">Package confirmed orders</a></li>
          <li><a href="<?php echo BASE_URL ?>daily_productbill">Bill & Address print</a></li>
          </ul>
        </li>-->
         <li class="dropdown <?php echo $menu5;?>"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="icon-envelope"></i>Document approval <span class="caret"></span></a>
          <ul class="dropdown-menu">
          <li><a href="<?php echo BASE_URL ?>document_user">Processing user list for approval</a></li>
          <li><a href="<?php echo BASE_URL ?>document_user_approved">Approved user list</a></li>
          </ul>
        </li>
         <li class="dropdown <?php echo $menu6;?>"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="icon-envelope"></i>Wallet transaction <span class="caret"></span></a>
          <ul class="dropdown-menu">
          
          <li><a href="<?php echo BASE_URL ?>wallet_user_list">Details Approved List - wallet transaction</a></li>
          <li><a href="<?php echo BASE_URL ?>wallet_master_transfer_date">Transfer this amount to bank</a></li>
          
          <li><a href="<?php echo BASE_URL ?>wallet_master_processing_date">Processing list for wallet transaction</a></li>
          <li><a href="<?php echo BASE_URL ?>wallet_master_paid_date">Paid list for wallet transaction</a></li>
<li><a href="<?php echo BASE_URL ?>wallet_master_pending_date">Pending list for wallet transaction</a></li>          
		   <li><a href="<?php echo BASE_URL ?>wallet_full_list">Details Not Approved List</a></li>
          </ul>
        </li>
	  <?php }

       if($admintype == 'admin' || $admintype == 'order_staff'){
	  ?>
         <li class="dropdown <?php echo $menu7;?>"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="icon-business_center"></i> Purchase & Stock <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="<?php echo BASE_URL ?>purchase_reports_select_date"> Date wise purchase details</a></li>
			<li><a href="<?php echo BASE_URL ?>cart_order_details"> Cart order details</a></li>
			<li><a href="<?php echo BASE_URL ?>stock_details"> Stock Details</a></li>
            <li><a href="<?php echo BASE_URL ?>activation_reports_select_date">Datewise sales</a></li>
          </ul>
        </li>
<?php
	   }
	   if($admintype == 'admin' || $admintype == 'upload_staff'){
?>		
         <li class="dropdown <?php echo $menu8;?>"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
		 <i class="icon-business_center"></i> Image Uploads <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="<?php echo BASE_URL ?>upload_leaders"> Leaders</a></li>
			<li><a class="" href="<?php echo BASE_URL ?>upload_perk"> Perk</a></li>
			
          </ul>
        </li> 
		<li class=""><a href="<?php echo BASE_URL ?>news_entry_form"><i class="icon-blur_on"></i>News</a></li>
<?php
	   }
?>	   
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