<?php 

	define('BASE_URL',	base_url()); 

	define('ASSET_PATH',	base_url().'assets/frontarea/'); 

	define('ASSET_PATH1',	base_url().'assets/membersarea/'); 

	 

	$login_time=$this->session->userdata('login_time');

	$fname=$this->session->userdata('fname');

	$id=$this->session->userdata('id');

	$c_username=$this->session->userdata('c_username');

	$c_relation=$c_relation=$c_address="";	

					

					

	//FOR MENU SELECTION START				

		$refer=explode("/",$_SERVER['REQUEST_URI']);

		$cont=count($refer);

		$fnam=explode("?",$refer[1]);

		$loadedpage = $fnam[0];

		$crumb1=$crumb2=$crumb3="";

		$dashboardmenu=$dashboardmenuopenul=$dashboardmenulink1="";

		$registrationmenu=$registrationopenul=$registrationmenulink1="";

		$passwordmenu=$passwordopenul=$passwordmenulink1="";

		$view_profilemenu=$view_profileopenul=$view_profilelink1="";

		$directreferralsmenu=$directreferralsopenul=$directreferralsmenulink1="";

		$myteammenu=$myteamopenul=$myteammenulink1="";

		$myteammenulink2="";$view_profilemenulink1=$mailinboxmenulink1="";

		$genealogymenu=$genealogyopenul=$genealogylink1="";

		$epinmenu=$epinmenuopenul=$epinmenulink1=$epinmenulink2=$epinmenulink3=$epinmenulink4="";

		$dailyaccountmenu=$dailyaccountmenuopenul=$dailyaccountmenulink1=$dailyaccountmenulink2=$dailyaccountmenulink3="";

		$accountactivationmenu=$accountactivationmenuopenul=$accountactivationmenulink1=$accountactivationmenulink2="";

		$accountactivationmenulink3=$dailyaccountmenulink4=$dailyaccountmenulink5="";

		$walletmenu=$walletmenulink1=$walletmenulink2="";

		$purchase_productlink1="";

		if(!empty($loadedpage)){

		switch($loadedpage){

				case 'dashboard': 

				$dashboardmenu='open';$dashboardmenuopenul="style='display:block;'"; $dashboardmenulink1="class='active'";

			 	$crumb1="Dashboard"; $crumb2="Dashboard"; 

				break;

				case 'members_area': 

				$dashboardmenu='open';$dashboardmenuopenul="style='display:block;'"; $dashboardmenulink1="class='active'";

			 	$crumb1="Dashboard"; $crumb2="Dashboard"; 

				break;

				case 'registration': 

				$registrationmenu='open';$registrationopenul="style='display:block;'"; $registrationmenulink1="class='active'";

			 	$crumb1="E-Application Form"; $crumb2="E-Application Form"; 

				break;

				case 'registration_confirm': 

				$registrationmenu='open';$registrationopenul="style='display:block;'"; $registrationmenulink1="class='active'";

			 	$crumb1="Registration Confirmation"; $crumb2="Registration Confirmation"; 

				break;

				case 'registration_insert': 

				$registrationmenu='open';$registrationopenul="style='display:block;'"; $registrationmenulink1="class='active'";

			 	$crumb1="Registration Certificate"; $crumb2="Registration Certificate"; 

				break;				

				case 'directreferrals': 

				$directreferralsmenu='open';$directreferralsopenul="style='display:block;'"; $directreferralsmenulink1="class='active'";

			 	$crumb1="Direct members"; $crumb2="Direct members"; 

				break;

				case 'myteamalternate': 

				$myteammenu='active';$myteamopenul="style='display:block;'"; $myteammenulink1="class='active'";

			 	$crumb1="Alternate channel members"; $crumb2="Alternate channel members"; $crumb3='<li>Alternate channel members"</li>'; 

				break; 

				case 'myteamcorporate': 

				$myteammenu='active';$myteamopenul="style='display:block;'"; $myteammenulink2="class='active'";

			 	$crumb1="Corporate channel members"; $crumb2="Corporate channel members"; $crumb3='<li>Corporate channel members</li>';

				break;

				case 'myteamleft_sales': 

				$myteammenu='active';$myteamopenul="style='display:block;'"; $myteammenulink1="class='active'";

			 	$crumb1="Downline list left sales"; $crumb2="Downline Left Sales"; $crumb3='<li>Left side</li>'; 

				break;

				case 'myteamright_sales': 

				$myteammenu='active';$myteamopenul="style='display:block;'"; $myteammenulink2="class='active'";

			 	$crumb1="Downline list right Sales"; $crumb2="Downline Right Sales"; $crumb3='<li>Right side</li>';

				break;				

				case 'editpassword': 

				$passwordmenu='open';$passwordopenul="style='display:block;'"; $passwordmenulink1="class='active'";

			 	$crumb1="Change password"; $crumb2="Change password"; 

				break;

				case 'password_save': 

				$passwordmenu='open';$passwordopenul="style='display:block;'"; $passwordmenulink1="class='active'";

			 	$crumb1="Change password"; $crumb2="Change password"; 

				break;

				case 'view_profile': 

				$view_profilemenu='open';$view_profileopenul="style='display:block;'"; $view_profilemenulink1="class='active'";

			 	$crumb1="Profile"; $crumb2="Profile"; 

				break;

				/*case 'registeration_certificate': 

				$view_profilemenu='open';$registrationcertificatemenuopenul="style='display:block;'"; $registrationcertificatemenulink1="class='active'";

			 	$crumb1="Registration certificate"; $crumb2="Registration certificate"; 

				break;

				case 'from_gene_register': 

				$registrationmenu='open';$registrationopenul="style='display:block;'"; $registrationmenulink1="class='active'";

			 	$crumb1="Registration Confirmation"; $crumb2="Registration Confirmation"; 

				break;*/

				case 'binary_view': 

				$genealogymenu='open';$genealogyopenul="style='display:block;'"; $genealogylink1="class='active'";

			 	$crumb1="Genealogy"; $crumb2="Genealogy"; 

				break;

				case 'messages': 

				$mailinboxmenu='open';$mailinboxopenul="style='display:block;'"; $mailinboxmenulink1="class='active'";

			 	$crumb1="Messages"; $crumb2="Messages"; 

				break;

				case 'package_epinstock': 

				$epinmenu='active';$epinmenuopenul="style='display:block;'"; $epinmenulink1="class='active'";

			 	$crumb1="My E-pin"; $crumb2="E-pin Management";$crumb3='<li>My E-pin </li>';  

				break;

				case 'transfer_package_pin': 

				$epinmenu='active';$epinmenuopenul="style='display:block;'"; $epinmenulink1="class='active'";

			 	$crumb1="My E-pin"; $crumb2="E-pin Management";$crumb3='<li>My E-pin </li>';  

				break;

				case 'epin_transfer_details': 

				$epinmenu='active';$epinmenuopenul="style='display:block;'"; $epinmenulink3="class='active'";

			 	$crumb1="Transfered E-Pin"; $crumb2="E-pin Management";$crumb3='<li>Transfered E-Pin</li>';  

				break;

				case 'daily_sales_opening_income':

				$dailyaccountmenu='active';$dailyaccountmenuopenul="style='display:block;'"; $dailyaccountmenulink1="class='active'";

			 	$crumb1="Direct Members Sales Incentive"; $crumb2="Daily Account Details";$crumb3='<li>Direct Members Sales Incentive</li>';  

				break;	

				case 'daily_leadership_bonus_details':

				$dailyaccountmenu='active';$dailyaccountmenuopenul="style='display:block;'"; $dailyaccountmenulink4="class='active'";

			 	$crumb1="Daily Leadership Bonus BV Matching Details"; $crumb2="Daily Account Details";$crumb3='<li>Daily Leadership Bonus BV Matching Details</li>';  

				break;	

				case 'daily_leadership_bonus_income':

				$dailyaccountmenu='active';$dailyaccountmenuopenul="style='display:block;'"; $dailyaccountmenulink5="class='active'";

			 	$crumb1="Daily Leadership Bonus BV Matching Income"; $crumb2="Daily Account Details";$crumb3='<li>Daily Leadership Bonus BV Matching Income</li>';  

				break;												

				case 'daily_pairdetails':

				$dailyaccountmenu='active';$dailyaccountmenuopenul="style='display:block;'"; $dailyaccountmenulink2="class='active'";

			 	$crumb1="Daily Matching BV Details"; $crumb2="Daily Account Details";$crumb3='<li>Daily Matching BV Details</li>';  

				break;	

				case 'daily_binary_income_details': 

				$dailyaccountmenu='active';$dailyaccountmenuopenul="style='display:block;'"; $dailyaccountmenulink3="class='active'";

			 	$crumb1="Daily BV Matching Incentive"; $crumb2="Daily Account Details";$crumb3='<li>Daily BV Matching Incentive </li>';  

				break;

				case 'weekly_incentive_summery': 

				$dailyaccountmenu='active';$dailyaccountmenuopenul="style='display:block;'"; $dailyaccountmenulink3="class='active'";

			 	$crumb1="Weekly Incentive Summary "; $crumb2="Daily Account Details";$crumb3='<li>Weekly Incentive Summary </li>';  

				break;	

				case 'account_activation_step1': 

				$accountactivationmenu='active';$accountactivationmenuopenul="style='display:block;'"; $accountactivationmenulink1="class='active'";

			 	$crumb1="Business Topup Form"; $crumb2="Business Topup Area";$crumb3='<li>Business Topup Form</li>';  

				break;			

				case 'account_activation_confirm': 

				$accountactivationmenu='active';$accountactivationmenuopenul="style='display:block;'"; $accountactivationmenulink1="class='active'";

			 	$crumb1="Business Topup Confirmation"; $crumb2="Repurchase Area";$crumb3='<li>Business Topup Confirmation</li>';  

				break;

				case 'account_activation_step_3': 

				$accountactivationmenu='active';$accountactivationmenuopenul="style='display:block;'"; $accountactivationmenulink1="class='active'";

			 	$crumb1="Business Confirmation Letter"; $crumb2="Business Topup Area";$crumb3='<li>Business Confirmation Letter</li>';  

				break;		

				case 'activation_details': 

				$accountactivationmenu='active';$accountactivationmenuopenul="style='display:block;'"; $accountactivationmenulink2="class='active'";

			 	$crumb1="Personal PV Details"; $crumb2="Business Topup Area";$crumb3='<li>Personal PV Details</li>';  

				break;	

				case 'repurchase_activation_details': 

				$accountactivationmenu='active';$accountactivationmenuopenul="style='display:block;'"; $accountactivationmenulink2="class='active'";

			 	$crumb1="Repurchase PV Details"; $crumb2="Business Topup Area";$crumb3='<li>Repurchase PV Details</li>';  

				break;																					

				case 'wallet_transaction': 

				$walletmenu='active'; $walletmenulink1="class='active'";

			 	$crumb1="Wallet transaction Details"; $crumb2="Wallet management";$crumb3='<li>Wallet transaction Details</li>';  

				break;

				case 'user_bank_withdrawal': 

				$walletmenu='active'; $walletmenulink2="class='active'";

			 	$crumb1="Bank withdrawal Details"; $crumb2="Wallet management";$crumb3='<li>Bank withdrawal Details</li>';  

				break;		

				

				case 'user_bank_withdrawal': 

				$walletmenu='active'; $purchase_productlink1="class='active'";

			 	$crumb1="Bank withdrawal Details"; $crumb2="Wallet management";$crumb3='<li>Bank withdrawal Details</li>';  

				break;										

		}

	}

	//FOR MENU SELECTION END			

?>

<!DOCTYPE html>

<html lang="en">



<head>

    <meta charset="utf-8">



    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="description" content="">

    <meta name="author" content="ThemeBucket">

    <link rel="shortcut icon" href="images/favicon.html">



    <title>UNIBUY</title>



    <!--Core CSS -->

    <link href="<?php echo ASSET_PATH1 ?>bs3/css/bootstrap.min.css" rel="stylesheet">

    <link href="<?php echo ASSET_PATH1 ?>css/bootstrap-reset.css" rel="stylesheet">

    <link href="<?php echo ASSET_PATH1 ?>font-awesome/css/font-awesome.css" rel="stylesheet" />

    <link href="<?php echo ASSET_PATH1 ?>css/custom.css" rel="stylesheet" type="text/css" />   

    <!-- Custom styles for this template -->

    <link href="<?php echo ASSET_PATH1 ?>css/style.css" rel="stylesheet">

    <link href="<?php echo ASSET_PATH1 ?>css/style-responsive.css" rel="stylesheet" />

	<script src="<?php echo ASSET_PATH1 ?>js/jquery.js"></script>

    <!-- Just for debugging purposes. Don't actually copy this line! -->

    <!--[if lt IE 9]>

    <script src="js/ie8-responsive-file-warning.js"></script><![endif]-->



    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->

    <!--[if lt IE 9]>

    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>

    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>

    <![endif]-->

</head>



<body>



<section id="container" >

<!--header start-->

<header class="header fixed-top clearfix">

<!--logo start-->

<div class="brand">



    <a href="<?php echo BASE_URL ?>members_area" class="logo">

        <img style="width:200px;" src="<?php echo ASSET_PATH1 ?>img/logo.png" alt="">

    </a>

    <div class="sidebar-toggle-box">

        <div class="fa fa-bars"></div>

    </div>

</div>

<!--logo end-->

<div class="nav notify-row" id="top_menu">

    <!--  notification start -->

    <ul class="nav top-menu">

        <!-- settings start -->

        <li class="dropdown">

            <a data-toggle="dropdown" class="dropdown-toggle" href="#">

                <i class="fa fa-shopping-cart"></i>

                 <?php 	if ($cart = $this->cart->contents()): ?><span class="badge bg-success"><?php echo count($cart);?></span><?php endif;?>

            </a>

            <ul class="dropdown-menu extended inbox">

                <li>

                    <p class="red">You have <?php 	if($cart = $this->cart->contents()){ echo count($cart). " item(s) in your cart"; } else {echo "no items in your cart";}?> </p>

                </li>

                <?php

				

						if ($cart = $this->cart->contents()){

						$subtotal=0;$totamount=0;

					 foreach ($cart as $itemheader){

						 $productid=$itemheader['id'];

						 $cartqty=$itemheader['qty'];

						 $totamount=$itemheader['subtotal'];

						 $rowidheader=$itemheader['rowid'];

							$sql="SELECT * from productmaster where mid='$productid'";

						$result = $this->login_db->get_results($sql);

						$n_category=$mid=$productname=$n_bv=$pimage=$productdesc="";

						if($result)

						$total_amount=0;$total_bv=0;$price=0;$total_pv=0;

						{

						  foreach($result as $row)

						  {

							$mid = $row->mid;

							$n_category = $row->n_category;

							$productname = $row->productname;

							$price = $row->price;

							$n_bv = $row->n_bv;

							$n_pv = $row->n_pv;

							$pimage = $row->pimage;

						  }

						}

			?>

                

                <li>

                    <a href="#">

                        <span class="photo"><img alt="avatar" src="<?php echo base_url();?>multimedia/products/600x600/<?php echo $pimage;?>"></span>

                                <span class="subject">

                                <span class="from"><?php echo $productname;?></span>

                                </span>

                                <span class="message">

                                   <span id="cq_<?php echo $rowidheader;?>"> <?php echo $cartqty;?></span> x <?php echo $price;?> = <span class="price amount_<?php echo $rowidheader;?>">Rs. <?php echo number_format($itemheader['subtotal'],2); ?></span>

                                </span>

                    </a>

                </li>

               <?php 

			   $subtotal+=$totamount;

			   } ?>

                <li>

                    <a >Total amount : Rs. <span id="subtotalheader"><?php echo number_format($subtotal,2);?></span></a>

                </li>

                <li>

                    <a href="<?php echo base_url();?>view_cart"><button class="btn btn-primary btn-sm" type="button"> <i class="fa fa-shopping-cart"></i> Go to cart </button></a>

                </li>

                <?php }?>

            </ul>

        </li>

       

        

    </ul>

    <!--  notification end -->

</div>



<div class="top-nav clearfix">

    <!--search & user info start-->

    <ul class="nav pull-right top-menu">

       

        <!-- user login dropdown start-->

        <li class="dropdown">

            <a data-toggle="dropdown" class="dropdown-toggle icon-user" href="#">

                <img   class="picprofile" alt="" src="<?php echo base_url();?>upload_pic/<?php echo $this->login_db->get_user_profilepic(); ?>">

               

                <span class="username"><?php echo $c_username;?></span>

                <b class="caret"></b>

            </a>

            <ul class="dropdown-menu extended logout">

                <li><a href="<?php echo BASE_URL ?>view_profile"><i class=" fa fa-user"></i>Profile</a></li>

                <li><a href="<?php echo BASE_URL ?>logout"><i class="fa fa-key"></i> Log Out</a></li>

            </ul>

        </li>

        <!-- user login dropdown end -->

       <!-- <li>

            <div class="toggle-right-box">

                <div class="fa fa-bars"></div>

            </div>

        </li>-->

    </ul>

    <!--search & user info end-->

</div>

</header>

<!--header end-->

<aside>

    <div id="sidebar" class="nav-collapse">

        <!-- sidebar menu start--> 

         <div class="leftside-navigation">

            <ul class="sidebar-menu" id="nav-accordion">

            <li>

                <a href="<?php echo BASE_URL ?>members_area">

                    <i class="fa fa-dashboard"></i>

                    <span>Dashboard</span>

                </a>

            </li>

           

           <li >

              <a <?php echo $view_profilemenulink1; ?> href="<?php echo BASE_URL ?>view_profile">

                <i class="fa  fa-user"></i> <span>View Profile</span> </i>

              </a>

            </li>
            
            
            

             <li class="sub-menu">

                <a href="javascript:;">

                    <i class=" fa fa-shopping-cart"></i>

                    <span>Purchase Product</span>

                </a>

                <ul class="sub">
                    <li><a href="<?php echo BASE_URL ?>life_products">Purchase Product life</a></li>
                     <li><a href="<?php echo BASE_URL ?>repurchase_kit">Purchase Product health</a></li>
                     <li><a href="<?php echo BASE_URL ?>ordered_products">My Purchase Order</a></li>
                </ul>

            </li>             
            
            

             <li class="sub-menu">

                <a href="javascript:;">

                    <i class=" fa fa-bar-chart-o"></i>

                    <span>Tree View</span>

                </a>

                <ul class="sub">

                    <li><a href="<?php echo BASE_URL ?>binary_view/<?php echo $c_username ?>">Binary Genealogy</a></li>
                    <li><a href="<?php echo BASE_URL ?>sponser_tree_view/<?php echo $id*201568 ?>">Sponsor Tree</a></li>
					<li><a href="<?php echo BASE_URL ?>binary_tree_search/UNB1">Sponsor Tree</a></li>
                </ul>

            </li> 

			

            <li class="sub-menu">

                <a href="javascript:;">

                    <i class=" fa fa-bar-chart-o"></i>

                    <span>My Team Members</span>

                </a>

                <ul class="sub">
               		 <li><a href="<?php echo BASE_URL ?>directreferrals">Direct Introduced Members</a></li>

                    <li><a href="<?php echo BASE_URL ?>myteamleft">Left side Members</a></li>

                    <li><a href="<?php echo BASE_URL ?>myteamright">Right side Members</a></li>

                </ul>

            </li> 


            <li >

              <a <?php echo $view_profilemenulink1; ?> href="<?php echo BASE_URL ?>strategy">

                <i class="fa  fa-users"></i> <span>My Strategy</span> </i>

              </a>

            </li>


             <li class="sub-menu">

                <a href="javascript:;">

                    <i class=" fa fa-bar-chart-o"></i>

                    <span>My Team sales</span>

                </a>

                <ul class="sub">

                    <li><a href="<?php echo BASE_URL ?>daily_pairdetails">Daily Binary BV Details</a></li>

                      <li><a href="#">Left side sales BV Details</a></li>
                       <li><a href="#">Right side sales BV Details</a></li>
                       
                    <li><a href="#">Group Repurchase PV Details</a></li>
                     <li><a href="#">Monthily Repurchase PV Details</a></li>
                       

                </ul>

            </li> 
            


             <li class="sub-menu">

                <a href="javascript:;">

                    <i class=" fa fa-bar-chart-o"></i>

                    <span>Income Details</span>

                </a>

                <ul class="sub">
                    <li><a href="<?php echo BASE_URL ?>daily_binary_income_details">Binary BV Matching Income</a></li>
                     <li><a href="#">Monthily Repurchase Income</a></li>
                </ul>

            </li>             


<li class="sub-menu">

                <a href="javascript:;">

                    <i class=" fa fa-bar-chart-o"></i>

                    <span>Calculation</span>

                </a>

                <ul class="sub">
                    <li><a href="<?php echo BASE_URL ?>daily_roicalculation_do">Daily ROI Calculation</a></li>
                    <li><a href="<?php echo BASE_URL ?>daily_sponsorincomecalculation_do">Daily Sponsor Income Calculation</a></li>
                    <li><a href="<?php echo BASE_URL ?>daily_sponsor_roicalculation_do">Daily Sponsor ROI Calculation</a></li>
                     <li><a href="<?php echo BASE_URL ?>weekly_levelincome_withdrawal">Weekly Sponsor Income Withdrawal</a></li>
                      <li><a href="<?php echo BASE_URL ?>monthly_roi_withdrawal">Monthly ROI Income Withdrawal</a></li>
                </ul>

            </li>

			 <!--<li >

              <a <?php echo $view_profilemenulink1; ?> href="<?php echo BASE_URL ?>messages">

                <i class="fa  fa-envelope"></i> <span>Messages</span> </i>

              </a>

            </li>  

			-->

           

           <li >

              <a  <?php echo $view_profilemenulink1; ?> href="<?php echo BASE_URL ?>editpassword">

                <i class="fa  fa-lock"></i> <span>Change Password</span> </i>

              </a>

            </li> 

        </ul></div>        

<!-- sidebar menu end-->

    </div>

</aside>