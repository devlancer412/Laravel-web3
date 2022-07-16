<?php

use App\Http\Controllers\CertificateController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DepositController;
use App\Http\Controllers\GeneologyController;
use App\Http\Controllers\GlobalClubController;
use App\Http\Controllers\HRCTopupWalletController;
use App\Http\Controllers\HrcWalletTransactionController;
use App\Http\Controllers\InfinityLevelPointsController;
use App\Http\Controllers\LeadershipBonusController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QueryRiseController;
use App\Http\Controllers\ReferralFriendsController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\RoyalReferalPointsController;
use App\Http\Controllers\SponsorTreeController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\SubscriptionInsertionController;
use App\Http\Controllers\WithdrawController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::get('trxBalCheck/{blk}', [HrcWalletTransactionController::class, 'tronBalanceCheck']);
Route::get('hrcBalanceUpdate', [HrcWalletTransactionController::class, 'hrcTokenDeposit']);

Route::get('/', function () {
	return view('index1');
});
Route::get('/message', function () {
	return view('message');
});

Route::get('/hrcrypto', function () {
	return view('index1');
});
Route::get('/myteam', function () {
	return view('myteam');
});
Route::get('/sucessone', function () {
	return view('sucessone');
});
Route::get('/teaml', function () {
	return view('teaml');
});

Route::get('/index', function () {
	return view('index');
});
Route::get('/verotp', function () {
	return view('verotp');
});

Route::get('/forget', function () {
	return view('forget');
});

Route::get('/newid', function () {
	return view('newid');
});

Route::post('register', [RegisterController::class, 'register'])->name('register');

Route::get('login', [LoginController::class, 'Login'])->name('login');

Route::get('/', [LoginController::class, 'index'])->name('index');

Route::get('newregister', [RegisterController::class, 'viewRegister'])->name('newregister');
Route::get('/terms', [RegisterController::class, 'terms'])->name('terms');
Route::post('usercheck', [LoginController::class, 'check'])->name('check');
Route::get('usernamecheck', [LoginController::class, 'username_check'])->name('usernamecheck');

Route::get('certificate', [CertificateController::class, 'sucess'])->name('certificate');
Route::get('certificatedata', [CertificateController::class, 'display'])->name('certificatedata');

Route::group(['middleware' => ['AuthCheck']], function () {
	Route::get('dashboardview', [DashboardController::class, 'dashboardview'])->name('dashboardview');
	Route::get('/dashboards', [DashboardController::class, 'dashboard'])->name('dashboards');
	Route::get('/dashboardreport', [DashboardController::class, 'dashboardreport'])->name('dashboardreport');

	Route::get('/profileview', [ProfileController::class, 'profile'])->name('profileview');

	Route::get('/editprofile', [ProfileController::class, 'profileditview'])->name('editprofile');

	Route::post('/profileupdate', [ProfileController::class, 'updateProfile'])->name('profileupdate');

	Route::get('/infinitylevel', [InfinityLevelPointsController::class, 'infinitylevel'])->name('infinitylevel');
	Route::post('infinity_level_dataload', [InfinityLevelPointsController::class, 'fetch_data'])->name('infinity_level_dataload');

	Route::get('/royalreferal', [RoyalReferalPointsController::class, 'royalreferal'])->name('royalreferal');
	Route::post('royal_referal_dataload', [RoyalReferalPointsController::class, 'fetch_data'])->name('royal_referal_dataload');

	Route::get('/globalclub', [GlobalClubController::class, 'globalclub'])->name('globalclub');
	Route::post('global_club_dataload', [GlobalClubController::class, 'fetch_data'])->name('global_club_dataload');

	Route::get('/referalfriendsview', [ReferralFriendsController::class, 'referral'])->name('referalfriendsview');
	Route::post('referalfriends', [ReferralFriendsController::class, 'fetch_data'])->name('referalfriends');
	Route::get('referalincome', [ReferralFriendsController::class, 'referal_income'])->name('referalincome');

	Route::get('/globalmember', [GlobalClubController::class, 'globalmembers'])->name('globalmember');
	Route::get('globalclubmembers', [GlobalClubController::class, 'globalclubmembers'])->name('globalclubmembers');
	Route::get('globalbusiness', [GlobalClubController::class, 'globalclubincome'])->name('globalbusiness');

	Route::get('/leadership', [LeadershipBonusController::class, 'leadership'])->name('leadership');
	Route::get('leadershipbonus', [LeadershipBonusController::class, 'fetch_data'])->name('leadershipbonus');
	Route::get('leaderships', [LeadershipBonusController::class, 'leaderships'])->name('leaderships');
	Route::get('leadershiprank', [LeadershipBonusController::class, 'leadershiprank'])->name('leadershiprank');

	Route::get('/royalmember', [RoyalReferalPointsController::class, 'royalreferalachieve'])->name('royalmember');
	Route::get('royalreferralach', [RoyalReferalPointsController::class, 'royalreferralach'])->name('royalreferralach');
	Route::post('/dateroyal', [RoyalReferalPointsController::class, 'dateroyal'])->name('dateroyal');

// Route::get('/royalmember', function () {
	//     return view('Reports.todaytoproyalmember');
	// });

// Route::get('/myteamm', function () {
	//     return view('teaml');
	// });

	Route::get('/hrcincomewallet', [HrcWalletTransactionController::class, 'hrcwallet'])->name('hrcincomewallet');
	Route::post('hrcincomewalletmaster', [HrcWalletTransactionController::class, 'fetch_data'])->name('hrcincomewalletmaster');

	Route::get('/topupwallet', [HRCTopupWalletController::class, 'topupwallet'])->name('topupwallet');
	Route::post('topupwallettansaction', [HRCTopupWalletController::class, 'fetch_data'])->name('topupwallettansaction');
// ----------------------------------------------------logout route------------------------------------------------------------
	Route::get('/dashboard', function () {
		return view('Dashboard');
	});

	Route::get('/profile', function () {
		return view('Profile');
	});
	Route::get('/subscription', function () {
		return view('Reports.subscription');
	});

	Route::get('/myteam22', function () {
		return view('teaml2');
	});

	Route::get('geneology', [GeneologyController::class, 'geneology'])->name('geneology');
	Route::get('geneologyteam', [GeneologyController::class, 'geneologyteam'])->name('geneologyteam');

	Route::get('geneology/{id}/{level}', [GeneologyController::class, 'geneologylevel']);

	Route::get('myteamm', [SponsorTreeController::class, 'viewPage'])->name('myteamm');
	Route::post('get_tree_users', [SponsorTreeController::class, 'getTreeusers'])->name('get_tree_users');

// Route::get('sponsortree', [SponsorTreeController::class,'Sponsordetails'])->name('sponsortree');
	// Route::get('get_sponser_tree_id', [SponsorTreeController::class,'Sponsordowndetails'])->name('get_sponser_tree_id');

	Route::get('subscriptiondtl', [SubscriptionController::class, 'fetch_data'])->name('subscriptiondtl');

	Route::get('/changepassword', [ChangePasswordController::class, 'changepasswordview'])->name('changepassword');
	Route::post('/changepasswords', [ChangePasswordController::class, 'changePassword'])->name('changepasswords');
	Route::get('oldpasswordchecks', [ChangePasswordController::class, 'oldpassword_check'])->name('oldpasswordchecks');

	Route::get('/subscriptionplan', [SubscriptionController::class, 'subscription'])->name('subscriptionplan');
	Route::get('get_user_datas', [DashboardController::class, 'getName']);
// -----------------------------confirmation--------------
	Route::get('/subscriptionconfirmation', [SubscriptionController::class, 'subconfirmationview'])->name('subscriptionconfirmation');
	Route::get('/premiumsubscriptionconfirmation', [SubscriptionController::class, 'premiumsubconfirmationview'])->name('premiumsubscriptionconfirmation');
	Route::get('/premiumplussubscriptionconfirmation', [SubscriptionController::class, 'premiumplussubconfirmationview'])->name('premiumplussubscriptionconfirmation');

	Route::get('/subconfirmation', [SubscriptionController::class, 'subconfirmation'])->name('subconfirmation');
	Route::get('/premiumsubconfirmation', [SubscriptionController::class, 'premiumsubconfirmation'])->name('premiumsubconfirmation');
	Route::get('/premiumplussubconfirmation', [SubscriptionController::class, 'premiumplussubconfirmation'])->name('premiumplussubconfirmation');
	Route::get('/user_name', [SubscriptionController::class, 'getuser_name'])->name('user_name');
	Route::post('/confirmbasicplan', [SubscriptionInsertionController::class, 'confirmsubscription'])->name('confirmbasicplan');

// Route::get('/confirmbasicplan',[SubscriptionInsertionController::class,'confirmsubscription'])->name('confirmbasicplan');

	Route::get('/subcertificate', [SubscriptionController::class, 'subcertificate'])->name('subcertificate');
	Route::get('risequery', function () {
		return view('Queryrise');
	});
	Route::get('/wallettransfer', function () {
		return view('wallettransfer');
	});
	Route::get('/deposit', function () {
		return view('Deposite');
	});

	Route::get('echarts', [DashboardController::class, 'dashboardpiechart']);

	Route::get('result', [SubscriptionController::class, 'index'])->name('result');

// Route::get('receive', [DepositController::class, 'receive'])->name('receive');

	Route::get('deposit', [DepositController::class, 'receive'])->name('deposit');

	Route::post('create_address', [DepositController::class, 'createAddress'])->name('create_address');

	Route::get('get_news_datas', [NewsController::class, 'getnews']);

	Route::get('logout', [LoginController::class, 'logout'])->name('logout');

	Route::post('queryrise_submit', [QueryRiseController::class, 'queryrise_submit'])->name('queryrise_submit');
	Route::get('withdrawview', [WithdrawController::class, 'withdrawview'])->name('withdrawview');

});
