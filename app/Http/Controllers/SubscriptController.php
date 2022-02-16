<?php

namespace App\Http\Controllers;

use App\Http\Helpers\Helper;
use App\Models\Merchant;
use App\Models\Subscribe;
use Illuminate\Http\Request;

class SubscriptController extends Controller
{
    /**
     * subcribe merchant
     *
     * @param $merchantID
     * @return \Illuminate\Http\RedirectResponse
     */
    public function subscribe($merchantID)
    {
        $aff = Helper::getCurrentAff();
        $checkMerchant = Merchant::query()->findOrFail($merchantID);
        $checkSubscribe = Subscribe::query()->where(['affiliate_id' => $aff, 'merchant_id' => $merchantID])->first();

        if ($checkSubscribe) {
            return redirect()->back()->with('error', 'Bạn đã gửi request rồi, hoặc request của bạn đã được chấp thuận rồi!');
        }

        $subscribeStatus = 'REQ';
        $updateTime = null;
        $successMessage = 'Yêu cầu của bạn đã được gửi đi!';

        if ($checkMerchant->approval_type == 'AUT') {
            $subscribeStatus = 'APR';
            $updateTime = date('Y-m-d h:i:s');
            $successMessage = 'Liên kết thành công, bạn có thể chạy chiến dịch này được rồi!';
        }

        $subscribe = new Subscribe();
        $subscribe->affiliate_id = $aff;
        $subscribe->merchant_id = $merchantID;
        $subscribe->subs_status = $subscribeStatus;
        $subscribe->status_apply_time_stamp = date('Y-m-d h:i:s');
        $subscribe->status_update_time_stamp = $updateTime;
        $subscribe->create_time_stamp = date('Y-m-d h:i:s');
        
        if ($subscribe->save()) {
            return redirect()->back()->with('success', $successMessage);
        }

        return redirect()->back()->with('error', 'Có lỗi xảy ra, xin vui lòng thử lại sau!');
    }
}
