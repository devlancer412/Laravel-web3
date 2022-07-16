<?php
namespace App\Http\Controllers;
use App\Models\Currency;
use App\Models\User_Address;
use App\Models\User_wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DepositController extends Controller {
	public function __construct() {

		$this->User_Address_Model = new User_Address();

	}

	public function receive() {
		$userId = Session::get('hrc_userid');
		$currs = Currency::orderBy('id', 'desc')->pluck('name', 'symbol')->toArray();
		$bals = User_wallet::where('user_id', $userId)->first();
		$currency = Currency::pluck('symbol')->toArray();
		$addrs = User_Address::where('user_id', $userId)->select($currency)->first();
		if ($addrs[$currency[0]] == "") {
			$selCurr = $addrCurr = $currency[0];

			if (in_array($selCurr, ['USDT', 'DC', 'HRC'])) {
				$addrCurr = "TRX";

			}
			if ($selCurr == "BUSD") {
				$addrCurr = "BNB";
				//   dd($addrCurr);
				//   exit;

			}
// 			$this->User_Address_Model->User_Addresses($addrCurr);

// 			if ($addr['status'] == 1)
			// 			{
			// 				if ($addrCurr == "BNB")
			// 				{
			// 					$upVal = ['BUSD' => $addr['address'], 'coin_key' => encryptKey($addr['key'])];
			// 				}
			// 				if ($addrCurr == "TRX")
			// 				{
			// 					$upVal = ['USDT' => $addr['address'], 'DC' => $addr['address'], 'HRC' => $addr['address'], 'coin_tag' => $addr['tag'], 'coin_image' => $addr['secret'], 'coin_name' => $addr['public']];
			// 				}
			// 				$upVal[$addrCurr] = $addr['address'];
			// 				User_Address::where('user_id', $userId)->update($upVal);
			// 				$addrs[$currency[0]] = $addr['address'];
			// 			}
			// 			else
			// 			{
			// 				Session::flash('error', "Please try again later");
			// 				return Redirect::back();
			// 			}
		}
// 		else
		// 		{
		// 			$addrs[$currency[0]] = $addrs[$currency[0]];
		// 		}
		// 		$addrs['HRCTRC'] = 'HRC Coin upgradation in progress';
		$data = compact('currs', 'bals', 'addrs');
		return view('Deposite', $data);
	}
	public function createAddress(Request $request) {
		$userId = Session::get('hrc_userid');
		$data = $request->all();
		if (isset($data['currency']) && $data['currency'] != "") {
			$currency = $addrCurr = $data['currency'];
			if (in_array($currency, ['USDT', 'DC', 'HRC'])) {$addrCurr = "TRX";}
			if ($currency == "BUSD") {$addrCurr = "BNB";}
			$inArr = ['TRX', 'BNB'];
			if (in_array($addrCurr, $inArr)) {
				$addrs = User_Address::where('user_id', $userId)->select($addrCurr)->first();
				if ($addrs[$addrCurr] == "") {
					$addr = self::generateAddress($addrCurr);
					if ($addr['status'] == 1) {
						if ($addrCurr == "BNB") {
							$upVal = ['BUSD' => $addr['address'], 'coin_key' => self::encryptKey($addr['key'])];
						}
						if ($addrCurr == "TRX") {
							$upVal = ['USDT' => $addr['address'], 'DC' => $addr['address'], 'HRC' => $addr['address'], 'coin_tag' => $addr['tag'], 'coin_image' => $addr['secret'], 'coin_name' => $addr['public']];
						}
						$upVal[$addrCurr] = $addr['address'];
						User_Address::where('user_id', $userId)->update($upVal);
						echo json_encode(['status' => 'success', 'address' => $addr['address'], 'tag' => ""]);
					} else {
						echo json_encode(['status' => 'fail', 'msg' => 'Failed to create address']);
					}
				} else {
					echo json_encode(['status' => 'success', 'address' => $addrs[$addrCurr], 'tag' => ""]);
				}
			} else {
				echo json_encode(['status' => 'fail', 'msg' => 'Invalid request']);
			}
		} else {
			echo json_encode(['status' => 'fail', 'msg' => 'Invalid request']);
		}
	}

	public static function generateAddress($currency) {
		if ($currency == "TRX") {
			$output = shell_exec('cd ' . public_path() . '/tron; node address.js');
			$res = json_decode($output, true);
			if (isset($res['address'])) {
				$private = self::encryptKey($res['privateKey']);
				$public = $res['publicKey'];
				$addr = $res['address']['base58'];
				$tag = $res['address']['hex'];
				return ['status' => 1, 'address' => $addr, 'tag' => $tag, 'secret' => $private, 'public' => $public];
			}
			return ['status' => 0];
		}
		return ['status' => 0];
	}

	public static function encryptKey($string) {
		$method = "AES-256-CBC";
		$secKey = 'CryPtOHrCoINPvT@SeCKey';
		$secIv = 'CryPtOHrCoINPvT@SeCIv';
		$key = hash('sha256', $secKey);
		$iv = substr(hash('sha256', $secIv), 0, 16);
		$output = openssl_encrypt($string, $method, $key, 0, $iv);
		$output = base64_encode($output);
		return $output;
	}

	public static function decryptKey($string) {
		$method = "AES-256-CBC";
		$secKey = 'CryPtOHrCoINPvT@SeCKey';
		$secIv = 'CryPtOHrCoINPvT@SeCIv';
		$key = hash('sha256', $secKey);
		$iv = substr(hash('sha256', $secIv), 0, 16);
		$output = openssl_decrypt(base64_decode($string), $method, $key, 0, $iv);
		return $output;
	}
}
