<?php

namespace App\Http\Controllers;
use App\Models\Deposit;
use App\Models\SiteWallet;
use App\Models\User_Address;
use App\Models\User_wallet;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class HrcWalletTransactionController extends Controller {
	public function hrcwallet() {
		return view('Reports.hrcwallettransaction');
	}

	public function fetch_data(Request $request) {
		$userid = Session::get('hrc_userid');
		$from_date = Carbon::parse($request->n_fromdate)->toDateTimeString();
		$to_date = Carbon::parse($request->n_todate)->toDateTimeString();

		// \DB::connection()->enableQueryLog();
		$data = DB::table('hrcincome_wallet_transaction_master')
			->select("d_transcation", "c_trans_type", "n_trans_amount")
			->where('n_to_id', $userid)
			->whereDate('d_transcation', '=', $to_date)
			->orWhereBetween('d_transcation', [$from_date, $to_date])
			->where('n_from_id', $userid)
			->get();
		// $queries = \DB::getQueryLog();
		// dd($queries);
		return response()->json($data);
	}

	//get user id by address
	public static function getUserByAddr($curr, $addr) {
		$address = User_Address::where($curr, $addr)->select('user_id')->first();
		return ($address) ? $address->user_id : "";
	}

	//check if txid already exists
	public static function checktxnid($txid, $userId) {
		$txnExists = Deposit::where('reference_no', $txid)->where('user_id', $userId)->count();
		return ($txnExists == 0) ? 'true' : 'false';
	}

	//get user balance
	public static function getUserBalance($id, $curr) {
		$getBal = User_wallet::where('user_id', $id)->select($curr)->first();
		return ($getBal) ? $getBal[$curr] : "false";
	}

	//get user balance
	public static function updateUserBalance($id, $curr, $bal) {
		User_wallet::where('user_id', $id)->update([$curr => $bal]);
		return true;
	}

	//To get transactions for mentioned blocks
	public static function getBlockTrans($start, $end) {
		$blocks = ['startNum' => $start, 'endNum' => $end];
		$range = json_encode($blocks);
		$curl = curl_init();
		curl_setopt_array($curl, [
			CURLOPT_URL => "https://api.trongrid.io/wallet/getblockbylimitnext",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "POST",
			CURLOPT_POSTFIELDS => $range,
			CURLOPT_HTTPHEADER => ["Accept: application/json", "Content-Type: application/json"],
		]);
		$response = curl_exec($curl);
		$err = curl_error($curl);
		curl_close($curl);
		if ($err) {return [];}
		$res = json_decode($response, true);
		return $res;
	}

	//To update TRX deposit
	public function updateTronBalance() {
		$currency = "TRX";
		$coin = SiteWallet::where('currency', $currency)->select("block_number")->first();
		$start = (int) $coin->block_number;
		$end = $start + 30;
		$result = self::getBlockTrans($start, $end);
		if (empty($result['block']) || !isset($result['block'])) {echo "Something went wrong";exit;}
		$blocks = $result['block'];
		$blkNum = 0;
		$toAddr = $depos = [];
		foreach ($blocks as $block) {
			if (isset($block['block_header']) && isset($block['transactions'])) {
				$blkNum = $block['block_header']['raw_data']['number'];
				$trans = $block['transactions'];
				foreach ($trans as $tran) {
					if (isset($tran['ret']) && isset($tran['raw_data']) && isset($tran['txID'])) {
						$status = $tran['ret'][0]['contractRet'];
						if ($status == "SUCCESS") {
							$txid = $tran['txID'];
							$transVal = $tran['raw_data']['contract'][0]['parameter']['value'];
							if (isset($transVal['amount'])) {
								$amt = $transVal['amount'] / 1000000;
								$amount = number_format($amt, 8, '.', '');
								if ($amount > 0.001) {
									$to = strtoupper($transVal['to_address']);
									$transArr = ['txid' => $txid, 'amount' => $amount, 'block' => $blkNum];
									$depos[$to][] = $transArr;
									$toAddr[] = $to;
								}
							}
						}
					}
				}
			}
		}
		if ($blkNum > 0) {
			SiteWallet::where('currency', $currency)->update(["block_number" => $blkNum]);
		}
		if (!empty($toAddr)) {
			$getAddr = User_Address::whereIn('coin_tag', $toAddr)->select('user_id', 'TRX', 'coin_tag')->get()->toArray();
			if (!empty($getAddr)) {
				foreach ($getAddr as $users) {
					$userId = $users['user_id'];
					$account = $users['TRX'];
					$tag = $users['coin_tag'];
					$transactions = isset($depos[$tag]) ? $depos[$tag] : [];
					foreach ($transactions as $transaction) {
						$trxBal = (float) $transaction['amount'];
						if ($trxBal > 0) {
							$block = $transaction['block'];
							$txid = $transaction['txid'];
							$txnExists = self::checktxnid($txid, $userId);
							if ($txnExists == 'true') {
								$balance = self::getUserBalance($userId, $currency);
								$updateBal = $balance + $trxBal;

								$depositData = array('amount' => $trxBal, 'currency' => $currency, 'reference_no' => $txid, 'status' => 'completed', 'user_id' => $userId, 'move_status' => 0, 'block' => $block, 'address_info' => $account);
								Deposit::create($depositData);

								self::updateUserBalance($userId, $currency, $updateBal);
							}
						}
					}
				}
			}
		}
	}

	//To update TRX deposit with manual block
	public function tronBalanceCheck($block) {
		$currency = "TRX";
		$start = (int) $block;
		$end = $block + 30;
		$result = self::getBlockTrans($start, $end);
		if (empty($result['block']) || !isset($result['block'])) {echo "Something went wrong";exit;}
		$blocks = $result['block'];
		$toAddr = $depos = [];
		foreach ($blocks as $block) {
			if (isset($block['block_header']) && isset($block['transactions'])) {
				$blkNum = $block['block_header']['raw_data']['number'];
				$trans = $block['transactions'];
				foreach ($trans as $tran) {
					if (isset($tran['ret']) && isset($tran['raw_data']) && isset($tran['txID'])) {
						$status = $tran['ret'][0]['contractRet'];
						if ($status == "SUCCESS") {
							$txid = $tran['txID'];
							$transVal = $tran['raw_data']['contract'][0]['parameter']['value'];
							if (isset($transVal['amount'])) {
								$amt = $transVal['amount'] / 1000000;
								$amount = number_format($amt, 8, '.', '');
								if ($amount > 0.001) {
									$to = strtoupper($transVal['to_address']);
									$transArr = ['txid' => $txid, 'amount' => $amount, 'block' => $blkNum];
									$depos[$to][] = $transArr;
									$toAddr[] = $to;
								}
							}
						}
					}
				}
			}
		}
		if (!empty($toAddr)) {
			$getAddr = User_Address::whereIn('coin_tag', $toAddr)->select('user_id', 'TRX', 'coin_tag')->get()->toArray();
			if (!empty($getAddr)) {
				foreach ($getAddr as $users) {
					$userId = $users['user_id'];
					$account = $users['TRX'];
					$tag = $users['coin_tag'];
					$transactions = isset($depos[$tag]) ? $depos[$tag] : [];
					foreach ($transactions as $transaction) {
						$trxBal = (float) $transaction['amount'];
						if ($trxBal > 0) {
							$block = $transaction['block'];
							$txid = $transaction['txid'];
							$txnExists = self::checktxnid($txid, $userId);
							if ($txnExists == 'true') {
								$balance = self::getUserBalance($userId, $currency);
								$updateBal = $balance + $trxBal;

								$depositData = array('amount' => $trxBal, 'currency' => $currency, 'reference_no' => $txid, 'status' => 'completed', 'user_id' => $userId, 'move_status' => 0, 'block' => $block, 'address_info' => $account);
								Deposit::create($depositData);

								self::updateUserBalance($userId, $currency, $updateBal);
							}
						}
					}
				}
			}
		}
	}

	//get url contents using curl
	public static function getUrlContents($url) {
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_HEADER, false);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 0);
		curl_setopt($ch, CURLOPT_TIMEOUT, 400);
		$data = curl_exec($ch);
		curl_close($ch);
		return $data;
	}

	//To update HRC token deposit
	public function hrcTokenDeposit() {
		$currency = "HRC";
		$contract = "TXFdK1hbnuyF8sSjv5WGXWaT6bzn8xkSJs";
		$minTs = SiteWallet::where('currency', $currency)->select("block_number")->first()->block_number;
		$url = "https://api.trongrid.io/v1/contracts/" . $contract . "/transactions?only_confirmed=true&order_by=block_timestamp%2Casc&limit=50&min_block_timestamp=" . $minTs;
		$result = self::getUrlContents($url);
		$res = json_decode($result, true);

		$blkTs = 0;
		$toAddr = $depos = [];

		$trans = $res['data'];
		foreach ($trans as $tran) {
			if (isset($tran['ret']) && isset($tran['raw_data']) && isset($tran['txID'])) {
				$status = $tran['ret'][0]['contractRet'];
				if ($status == "SUCCESS") {
					$txid = $tran['txID'];
					$blkTs = $tran['block_timestamp'];
					$blkNum = $tran['blockNumber'];
					$transVal = $tran['raw_data']['contract'][0]['parameter']['value'];
					if (isset($transVal['data']) && isset($transVal['contract_address'])) {
						if ($transVal['contract_address'] == "41e97596e56b86ce1f88480add559d7c936ef1c24f") {
							$data = $transVal['data'];
							$txdata = substr($data, 8);
							$to = strtoupper(substr(substr($txdata, 0, 64), 22));
							$to = "41" . substr($to, 2);
							$balData = hexdec(substr($txdata, 64));
							$amt = $balData / 100000000;
							$amount = (float) number_format($amt, 8, '.', '');
							$transArr = ['txid' => $txid, 'amount' => $amount, 'block' => $blkNum, 'block_time' => $blkTs];
							$depos[$to][] = $transArr;
							$toAddr[] = $to;
						}
					}
				}
			}
		}
		if ($blkTs > 0) {
			SiteWallet::where('currency', $currency)->update(["block_number" => $blkTs]);
		}
		if (!empty($toAddr)) {
			$getAddr = User_Address::whereIn('coin_tag', $toAddr)->select('user_id', 'HRC', 'coin_tag')->get()->toArray();
			if (!empty($getAddr)) {
				foreach ($getAddr as $users) {
					$userId = $users['user_id'];
					$account = $users['HRC'];
					$tag = $users['coin_tag'];
					$transactions = isset($depos[$tag]) ? $depos[$tag] : [];
					foreach ($transactions as $transaction) {
						$trxBal = (float) $transaction['amount'];
						if ($trxBal > 0) {
							$block = $transaction['block'];
							$txid = $transaction['txid'];
							$txnExists = self::checktxnid($txid, $userId);
							if ($txnExists == 'true') {
								$balance = self::getUserBalance($userId, $currency);
								$updateBal = $balance + $trxBal;

								$depositData = array('amount' => $trxBal, 'currency' => $currency, 'reference_no' => $txid, 'status' => 'completed', 'user_id' => $userId, 'move_status' => 0, 'block' => $block, 'address_info' => $account);
								Deposit::create($depositData);

								self::updateUserBalance($userId, $currency, $updateBal);
							}
						}
					}
				}
			}
		}
	}

	public function withdraw() {
		if ($currency == "TRX") {
			$adminPvtKey = "<ADMIN PRIVATE KEY>";
			$trxAmt = $amount * 1000000;
			$output = shell_exec('cd ' . base_path() . '; node public/tron/sendTrans.js ' . $adminPvtKey . ' ' . $receiveAddress . ' ' . $trxAmt);
			$res = json_decode($output, true);
			if ($res['result'] == 1) {
				$txid = $res['txid'];
				return ['status' => 1, 'result' => $txid];
			}
			return ['status' => 0];
		} elseif ($currency == "HRC") {
			$contract = "TXFdK1hbnuyF8sSjv5WGXWaT6bzn8xkSJs";
			$adminPvtKey = "<ADMIN PRIVATE KEY>";

			$tokenAmt = $amount * 100000000;
			$output = shell_exec('cd ' . base_path() . '; node public/tron/sendToken.js ' . $adminPvtKey . ' ' . $receiveAddress . ' ' . $contract . ' ' . $tokenAmt);
			$txid = json_decode($output, true);
			if ($txid != "") {
				return ['status' => 1, 'result' => $txid];
			}
			return ['status' => 0];
		}
		return ['status' => 0, 'msg' => "Invalid currency"];
	}
}
