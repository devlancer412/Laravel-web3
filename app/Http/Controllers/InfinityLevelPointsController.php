<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\BcMaster;
use App\Models\BcLogin;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use App\Models\Dailyreferralpv;
class InfinityLevelPointsController extends Controller
{
    //  ------------------------------------------------------------------------------- 
    public function infinitylevel()
    {   
        return view('Reports.infinitylevelpoints');
    }
    public function fetch_data(Request $request)
    {
        $userid= Session::get('hrc_userid');
        $from_date = Carbon::parse($request->n_fromdate)->toDateTimeString();
        $to_date = Carbon::parse($request->n_todate)->toDateTimeString();

        $data= DB::table('daily_referal_pv_count')
        ->join('bc_master', 'bc_master.pn_id', '=', 'daily_referal_pv_count.n_id')
        ->select("bc_master.c_username","d_to_date","n_activated_userid","n_level","n_subscribed_hrc","n_percentage","n_total_income","n_hrc_wallet","n_topup_wallet")
        ->where('n_id',$userid)
        ->whereDate('daily_referal_pv_count.d_to_date','=',$to_date)
        ->orWhereBetween('daily_referal_pv_count.d_to_date', [$from_date, $to_date])
        ->get();
        return response()->json($data);
    }

}
