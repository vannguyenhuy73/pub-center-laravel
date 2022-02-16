<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\MerchantRepository;
use DB;
use Illuminate\Http\Response;
use App\Cache\BaseCache;

class MerchantController extends Controller
{
	function index(Request $request)
	{
        $header = $request->header('Authorization');
        $header = str_replace(MerchantRepository::TOKEN_KEY . ' ', '', $header);
        $header = base64_decode($header);
        $infoToken = explode('-', $header);
        $tokenSecret = $infoToken[0] ?? '';
        $affiliateId = $infoToken[1] ?? '';

        $account = BaseCache::getData('account_key_' . $affiliateId . '-' . $tokenSecret,
            call_user_func_array(
                function ($affiliateId, $tokenSecret) {
                    return DB::select(DB::raw(
                        "select * from taffiliate inner join
                        taccount on taffiliate.account_id = taccount.account_id where affiliate_id='$affiliateId'
                        and taccount.account_status='" . config('const.account.active') . "'
                        and taccount.token_secret='$tokenSecret'"
                    ));
                },
                [$affiliateId, $tokenSecret]
            )
        );

        if (empty($account)) {
            return response()->json([
                'message' => 'token valid',
                'data' => [],
            ], Response::HTTP_UNAUTHORIZED);
        }
        $param = $request->all();
        $param['affiliate_id'] = $affiliateId;
        $param['token'] = $tokenSecret;
        $merchants = MerchantRepository::getListMerchant($param);

        return response()->json([
            'message' => 'success',
            'data' => $merchants,
        ], Response::HTTP_OK);
	}
}
