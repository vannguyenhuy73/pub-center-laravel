<?php

namespace App\Http\Controllers;

use App\Http\Helpers\Helper;
use App\Models\PostBack;
use Illuminate\Http\Request;

class PostBackController extends Controller
{
    public function index()
    {
        // get postback data of user
        $postBackData = PostBack::query()->where('affiliate_id', Helper::getCurrentAff())->first();

        if ($postBackData) {
            $postBackData = $postBackData->toArray();
        } else {
            $postBackData = [];
        }

        return view('postback.index', compact('postBackData'));
    }

    /**
     * Store A PostBack
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        if($request->get('id')){
            $postBack = PostBack::where('AFFILIATE_ID',$request->get('id'))
                ->update([
                    'MERCHANT_ID' => 'merchant_id',
                    'RETURN_URL' => $request->get('RETURN_URL') ?: null,
                    'YYYYMMDD' => 'day',
                    'HHMISS'=> $request->get('HHMISS') ?: null,
                    "ORDER_CODE" => 'order_code',
                    "PRODUCT_CODE" => 'product_code',
                    "PRODUCT_NAME" => $request->get('PRODUCT_NAME') ?: null,
                    'CATEGORY_CODE' => $request->get('CATEGORY_CODE') ?: null,
                    'ITEM_COUNT' => $request->get('ITEM_COUNT') ?: null,
                    'SALES' => $request->get('SALES') ?: null,
                    'COMMISSION' => "commision",
                   'AFFILIATE_USER_ID' => $request->get('AFFILIATE_USER_ID') ?: null,
                    'SEQUENCE_ID' => null,
                    'MBR_ID' => $request->get('MBR_ID') ?: null,
                    'TRLOG_ID' => $request->get('TRLOG_ID') ?: null
                ]);

            if ($postBack) {
                return redirect()->route('postback')->with('success', 'Cập nhật PostBack thành công');
            }
            
            return redirect()->route('postback')->with('error', 'Có lỗi khi cập nhật PostBack');
        }
        
        $this->validate($request, [
            'RETURN_URL' => 'required|url|max:500',
        ]);
        $postBack = new PostBack();

        if ($postBack->getStatus(Helper::getCurrentAff())) {
            return redirect()->route('postback')->with('error', 'Bạn đã có PostBack, nếu muốn thay đổi hãy liên hệ AM');
        }

        $postBack->AFFILIATE_ID = Helper::getCurrentAff();
        $postBack->MERCHANT_ID = 'merchant_id';
        $postBack->RETURN_URL = $request->get('RETURN_URL') ?: null;
        $postBack->YYYYMMDD = 'day';
        $postBack->HHMISS = $request->get('HHMISS') ?: null;
        $postBack->ORDER_CODE = 'order_code';
        $postBack->PRODUCT_CODE = 'product_code';
        $postBack->PRODUCT_NAME = $request->get('PRODUCT_NAME') ?: null;
        $postBack->CATEGORY_CODE = $request->get('CATEGORY_CODE') ?: null;
        $postBack->ITEM_COUNT = $request->get('ITEM_COUNT') ?: null;
        $postBack->SALES = $request->get('SALES') ?: null;
        $postBack->COMMISSION = "commision";
        $postBack->AFFILIATE_USER_ID = $request->get('AFFILIATE_USER_ID') ?: null;
        $postBack->SEQUENCE_ID = null;
        $postBack->MBR_ID = $request->get('MBR_ID') ?: null;
        $postBack->TRLOG_ID = $request->get('TRLOG_ID') ?: null;

        if ($postBack->save()) {
            return redirect()->route('postback')->with('success', 'Tạo PostBack thành công');
        }

        return redirect()->route('postback')->with('error', 'Tạo PostBack không thành công');
    }

}
