<?php

namespace App\Http\Controllers;

use App\Http\Helpers\Helper;
use App\Models\Comission;
use App\Models\PayRequest;
use App\Models\BonusMerchant;
use App\User;
use Illuminate\Http\Request;

class NewpubBillingController extends Controller
{
    /**
     * Request billing for current account
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function request()
    {
        $affiliates = Helper::getAllAffiliateID();
        $todayComission = number_format((new Comission())->getComission($affiliates, date('Ymd')));
        $monthComission = number_format((new Comission())->getComission($affiliates));
        $payable = number_format((new Comission())->getPayAble(auth()->id()));

        //check requested
        $requested = PayRequest::query()
            ->where('account_id', auth()->id())
            ->where('yyyymmdd', '>=', date('Ym00'))
            ->where('yyyymmdd', '<=', date('Ym31'))
            ->where('done_flag', 'N')
            ->first(['create_time_stamp', 'amount']);

        $acceptRequest = false;

        if (in_array(date('d'), [10, 11, 12, 25, 26, 27])) {
            $acceptRequest = true;
        }

        if(date('Ymd') >= 20210223 && date('Ymd') <= 20210225) {
            $acceptRequest = true;
        }

        if(date('Ymd') >= 20210226 && date('Ymd') <= 20210228) {
            $acceptRequest = false;
        }

        $user = User::query()->findOrFail(auth()->id());
        if(in_array($user->account_id, ['2311408962421006','Nhatlongduong','datlvq']) && date('Ymd') >= '20190522' && date('Ymd') <= '20190531'){
            $acceptRequest = true;
        }
        $paids = PayRequest::query()->where(['account_id' => auth()->id(), 'account_type' => 'A'])
            ->orderBy('YYYYMMDD', 'DESC')
            ->get();
			
		$report_net = (new Comission())->getReportNet($affiliates);

        return view('newpub_billing.request', compact('todayComission', 'monthComission', 'payable', 'acceptRequest', 'requested', 'paids', 'report_net'));
    }

    /**
     * Handle request for Withdrawal
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function handleRequest(Request $request)
    {
        $amount = (int)$request->get('amount', 0);
        $date_flag = true;

        if ($amount < 200000 || $amount % 10000 !== 0) {
            return redirect()->back()->withErrors('Số tiền rút phải lớn hơn hoặc bằng 200,000 VNĐ và phải là bội số của 10,000 VNĐ');
        }

        $user = User::query()->findOrFail(auth()->id());
        if(in_array($user->account_id, ['2311408962421006','Nhatlongduong','datlvq']) && date('Ymd') >= '20190522' && date('Ymd') <= '20190531'){
            $date_flag = true;
        }

        if(date('Ymd') >= 20210223 && date('Ymd') <= 20210225) {
            $date_flag = true;
        } else {
            if(!$date_flag)
            {
                if (!in_array(date('d'), [10, 11, 12, 25, 26, 27])) {
                    return redirect()->route('newpub.billing.request')->withErrors('Chúng tôi chỉ mở cửa đăng ký vào ngày 10-12 và 25-27 hàng tháng!');
                }
            }
        }

        if ($user->suspended_flag == 'Y') {
            return redirect()->route('newpub.billing.request')->withErrors('Tài khoản của bạn đã bị chặn thanh toán, mời liên hệ với AM để biết chi tiết');
        }

        if ($user->bill_ready_flag != 'Y') {
            return redirect()->route('newpub.billing.request')->withErrors('Tài khoản của bạn chưa hoàn thiện hồ sơ, vui lòng liên hệ AM để biết thêm chi tiết');
        }

        if(date('Ymd') >= 20210226 && date('Ymd') <= 20210228) {
            return redirect()->route('newpub.billing.request')->withErrors('Chúng tôi tạm thời không mở thanh toán vào khoảng thời gian này!');
        }

        $payable = intval((new Comission())->getPayAble(auth()->id()));
        $bonus = BonusMerchant::getPubBonusAmountTotal();
        $totalBonus = 0;

        foreach($bonus as $b) {
            $totalBonus += intval($b->amount);
        }

        $max = $totalBonus + $payable;

        if ($amount > $max) {
            return redirect()->route('newpub.billing.request')->withErrors('Bạn chỉ có thể rút tối đa ' . number_format($max) . ' VNĐ');
        }

        $payRequest = new PayRequest();
        $payRequest->yyyymmdd = date('Ymd');
        $payRequest->account_id = auth()->id();
        $payRequest->account_type = 'A';
        $payRequest->amount = $amount;
        $payRequest->done_flag = 'N';
        $payRequest->request_comment = '';
        $payRequest->create_time_stamp = date('Y-m-d h:i:s');
        $payRequest->contribution = 0;

        if ($payRequest->save()) {
            return redirect()->back()->withSuccess('Đăng ký rút tiền thành công!');
        }

        return redirect()->back()->withErrors('Có lỗi xảy ra, xin vui lòng thử lại sau');
    }

    /**
     * show list billding
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $paids = PayRequest::query()->where(['account_id' => auth()->id(), 'account_type' => 'A'])
            ->orderBy('YYYYMMDD', 'DESC')
            ->get();

        return view('billing.index', compact('paids'));
    }
	
	function getReportNetByPage(Request $request) {
		$page = $request->get('page');
		$strMerchant = $request->get('strMerchant');
		$limit = 10;
		$offset = ($page - 1)*$limit;
		$report_net = (new Comission())->getReportNet(Helper::getAllAffiliateID(), $limit, $offset, $strMerchant);
		return $report_net;
	}
}