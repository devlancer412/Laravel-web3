<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/////////////////////////////////////////////////////////////////////
////////////////// Admin area////////////////////////
//////////////////////////////////////////////////////////////
$route['default_controller'] = 'login';
$route['admin'] = 'adminarea/login';
$route['admin_login'] = 'adminarea/login';
$route['admin_logout'] = 'adminarea/logout';
$route['admin_login_check'] = 'adminarea/login';

$route['adminarea'] = 'adminarea/adminarea';
$route['admin_dashboard'] = 'adminarea/adminarea/dashboard';
$route['admin_logout'] = 'adminarea/logout';

$route['daily_levelincome_calculation_do'] = 'adminarea/Calculation/get_levelincome_calculation_do';
$route['daily_infinity_levelincome_calculation_do'] = 'adminarea/Calculation/get_infinity_levelincome_calculation_do';
$route['daily_infinity_levelincome_calculation_till18thdo'] = 'adminarea/Calculation/get_levelincome_calculation_till18thdo';
$route['global_clubincome_calculation_do'] = 'adminarea/Calculation/get_globalclubincome_calculation_do';
$route['royalreferal_income_calculation_do'] = 'adminarea/Calculation/get_royalreferalincome_calculation_do';
$route['leadership_income_calculation_do'] = 'adminarea/Calculation/get_leadershipbonus_calculation_do';
$route['olddata_migration'] = 'adminarea/Calculation/olddata_migration';

//16 JUNE 2022 CK
$route['datewise_joining_list']         = 'adminarea/adminarea_reports/datewise_joining_list';
$route['subscription_list']             = 'adminarea/adminarea_reports/subscription_list';
$route['infinity_level_income']       	= 'adminarea/adminarea_reports/infinity_level_income';
$route['global_club_points']       	    = 'adminarea/adminarea_reports/global_club_points';
$route['global_plan_eligible_members']  = 'adminarea/adminarea_reports/global_plan_eligible_members';
$route['global_plan_pool_hrc']  		= 'adminarea/adminarea_reports/global_plan_pool_hrc';
$route['royal_referral_points']  		= 'adminarea/adminarea_reports/royal_referral_points';
$route['daily_royal_eligibility_list']  = 'adminarea/adminarea_reports/daily_royal_eligibility_list';
$route['royal_plan_qualified_members']  = 'adminarea/adminarea_reports/royal_plan_qualified_members';
$route['royal_plan_pool_hrc_details']  	= 'adminarea/adminarea_reports/royal_plan_pool_hrc_details';

//17 JUNE 2022 CK
$route['search_user'] 					= 'adminarea/search_user';
$route['admin_editprofile'] 			= 'adminarea/profile_update';
$route['reset_admin_password'] 			= 'adminarea/adminarea/reset_admin_password';
$route['save_admin_password'] 			= 'adminarea/adminarea/save_admin_password';
$route['reset_common_password']         = 'adminarea/adminarea/reset_common_password';
$route['save_common_password']          = 'adminarea/adminarea/save_common_password';
$route['password_update']               = 'adminarea/adminarea/password_update';
$route['check_user']           		    = 'adminarea/adminarea/check_user';
$route['get_sp_username']               = 'adminarea/adminarea/get_sp_username';
$route['reform_password']               = 'adminarea/adminarea/reform_password';
$route['transaction_password_update']   = 'adminarea/adminarea/transaction_password_update';
$route['reform_transaction_password']   = 'adminarea/adminarea/reform_transaction_password';


//24 JUNE 2022 CK
$route['news_entry_form'] 			    = 'adminarea/adminarea/news_entry_form';
$route['news_entry_save'] 			    = 'adminarea/adminarea/news_entry_save';
$route['delete_news/(:any)']            = 'adminarea/adminarea/delete_news/$1';
$route['message_entry_form'] 			= 'adminarea/adminarea/message_entry_form';
$route['messages_entry_save'] 			= 'adminarea/adminarea/messages_entry_save';
$route['delete_message/(:any)']         = 'adminarea/adminarea/delete_message/$1';
$route['queries_inbox']       		    = 'adminarea/Queries/queries_inbox';
$route['queries_reply']       		    = 'adminarea/Queries/queries_reply';
$route['sent_queries_reply']       		= 'adminarea/Queries/sent_queries_reply';
$route['queries_outbox']       		    = 'adminarea/Queries/queries_outbox';














/* End of file routes.php */
/* Location: ./application/config/routes.php */