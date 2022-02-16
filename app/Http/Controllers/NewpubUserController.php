<?php

namespace App\Http\Controllers;

use App\Helper\Upload;
use App\Http\Helpers\UserHelper;
use App\Models\Affiliate;
use App\Models\Code;
use App\Models\SiteCategory;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NewpubUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banks = Code::query()->where('meta_code', 'BANK_CODE')->get(['code', 'code_name_vnm']);

        $user = User::query()->find(auth()->id());

        $categories = SiteCategory::all(['category_code', 'code_name']);
        $categoryChilds = SiteCategory::getCategoryChild();

        $affiliates = Affiliate::query()->where(['account_id' => auth()->id(), 'delete_flag' => 'N'])->get();

        return view('newpub_user.index', compact('user', 'banks', 'affiliates', 'categories', 'categoryChilds'));
    }

    /**
     * Update user infomation
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'birthday' => 'required|max:10|min:10',
            'contact_phone' => 'required',
            'email_reception_status' => 'required|max:3',
            'contact_address1' => 'required|max:200',
            'contact_address2' => 'required|max:200',
            'owner_name' => 'max:50',
            'bank_account_no' => 'regex:/^[0-9]{4,20}$/i',
            'bank_code' => 'integer|max:50',
            'bank_branch' => 'max:100',
            'site_class' =>'required|in:1,2,3'
        ]);

        $user = User::query()->find(auth()->id());

        //handle birthday
        $birthday = explode('-', $request->get('birthday'));

        $birthday = @$birthday[0] . '-' . @$birthday[1] . '-' . @$birthday[2] . ' 00:00:00';

        $user->birthday = $birthday;
        $user->contact_phone = $request->get('contact_phone');
        $user->email_reception_status = $request->get('email_reception_status');
        $user->contact_address1 = $request->get('contact_address1');
        $user->contact_address2 = $request->get('contact_address2');
        $user->site_class = (int) $request->get('site_class');

        if ($user->bank_confirm != 'Y') {

            $user->owner_name = $request->get('owner_name');
            $user->bank_account_no = $request->get('bank_account_no');
            $user->bank_code = $request->get('bank_code');
            $user->bank_branch = $request->get('bank_branch');
            if (!empty($request->get('owner_name'))
            && !empty($request->get('bank_account_no'))
            && !empty($request->get('contact_address2'))
            && !empty($request->get('bank_branch'))) {
                $user->bank_confirm = 'Y';
            }
        }

        if ($user->update()) {
            auth()->login($user);

            return redirect()->route('newpub.user.index')->with('success', 'Cập nhật thành công!');
        }

        return redirect()->route('newpub.user.index')->with('error', 'Cập nhật thất bại, xin vui lòng thử lại sau!');
    }

    /**
     * get list affiliate Account of user
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getSite(Request $request)
    {
        $categorys = Affiliate::query()
            ->where('affiliate_id', $request->get('affiliate_id'))
            ->where('account_id', auth()->id())
            ->first(['affiliate_id', 'site_name', 'site_url', 'category1', 'category2', 'site_desc']);

        return response()->json(['status' => '200', 'data' => $categorys->toArray()]);
    }

    /**
     * Update site
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateSite(Request $request)
    {
        $site = Affiliate::query()->findOrFail($request->get('affiliate_id'));

        if ($site->account_id != auth()->id()) {
            abort(403, 'Fuck you');
        }

        $site->site_name = (string)$request->get('site_name');
        $site->site_url = (string)$request->get('site_url');
        $site->site_desc = (string)$request->get('site_desc');
        $site->category1 = (string)$request->get('category_site');
        $site->category2 = (string)$request->get('category_child_site');
        $site->update_time_stamp = date('Y-m-d h:i:s');

        if (
            strlen($site->site_name) > 200 || strlen($site->site_url) > 300 ||
            !filter_var($site->site_url, FILTER_VALIDATE_URL) || strlen($site->site_desc) > 400
        ) {
            return response()->json(['status' => 500, 'data' => ''], 500);
        }

        if ($site->update()) {
            return response()->json(['status' => 200, 'data' => '']);
        }

        return response()->json(['status' => 500, 'data' => ''], 500);
    }

    /**
     * add site
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function addSite(Request $request)
    {
        $site = new Affiliate();

        $affilitate = (\DB::select('select GET_AFFILIATE_ID affiliate_id from DUAL'))[0]->affiliate_id;
        $site->affiliate_id = $affilitate;
        $site->account_id = auth()->id();
        $site->site_name = (string)$request->get('site_name');
        $site->site_url = (string)$request->get('site_url');
        $site->site_desc = (string)$request->get('site_desc');
        $site->category1 = (string)$request->get('category_site');
        $site->category2 = (string)$request->get('category_child_site');
        $site->site_type = 'W';
        $site->delete_flag = 'N';
        $site->link_error_url = ' ';
        $site->link_error_forward_yn = 'N';
        $site->mer_forwarding_yn = 'N';
        $site->create_time_stamp = date('Y-m-d h:i:s');

        if (
            strlen($site->site_name) > 200 || strlen($site->site_url) > 300 ||
            !filter_var($site->site_url, FILTER_VALIDATE_URL) || strlen($site->site_desc) > 400
        ) {
            return response()->json(['status' => 500, 'data' => ''], 500);
        }

        if ($site->save()) {
			$am_zone = (\DB::table('TAFF_MANAGER_STAFF')
			->select('TAFF_MANAGER_STAFF.ZONE_ID')
			->join('TAFF_MANAGE', 'TAFF_MANAGE.MANAGER', '=', 'TAFF_MANAGER_STAFF.MANAGER')
			->where('TAFF_MANAGE.ACCOUNT_ID', '=', auth()->id())
			->first());
			
			if($am_zone) {
				$zone_id = $am_zone->zone_id;
				
				$add_zone = (\DB::table('TAFFILIATE')->where('AFFILIATE_ID', '=', $affilitate)->update(['ZONE_ID' => $zone_id]));
				
				if($add_zone) {
					return response()->json(['status' => 200, 'data' => '']);
				}
				
				return response()->json(['status' => 500, 'data' => ''], 500);
			}
			
            return response()->json(['status' => 500, 'data' => ''], 500);
        }

        return response()->json(['status' => 500, 'data' => ''], 500);
    }

    /**
     * Delete site of current account
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteSite(Request $request)
    {
        $affID = $request->get('affiliate_id');

        $site = Affiliate::query()->findOrFail($affID);

        if (!$site || $site->account_id != auth()->id() || $site->affiliate_id == auth()->user()->last_contact_affiliate_id) {
            return response()->json(['status' => 500, 'data' => ''], 500);
        }

        $site->delete_flag = 'Y';
        $site->update_time_stamp = date('Y-m-d h:i:s');
        $site->delete_time_stamp = date('Y-m-d H:i:s');

        if ($site->update()) {
            return response()->json(['status' => 200, 'data' => '']);
        }

        return response()->json(['status' => 500, 'data' => ''], 500);
    }

    /**
     * change password of user
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function changePassword(Request $request)
    {
        $oldPass = $request->get('old_pass');
        $newPass = $request->get('new_pass');
        if ($oldPass == $newPass) {
            return response()->json(['status' => 200, 'data' => '']);
        }

        $currentPass = User::query()->where('account_id', auth()->id())->first();

        if ($this->validatePassword($oldPass, $currentPass->password)) {
            $currentPass->before_password = $currentPass->password;
            $currentPass->password = $this->encodePassword($newPass);
            $currentPass->pass_change_time = (int)date('Ymd');

            try {
                $currentPass->save();
                return response()->json(['status' => 200, 'data' => '']);
            } catch (\Exception $exception) {
                return response()->json(['status' => 500, 'data' => ''], 500);
            }
        }

        return response()->json(['status' => 500, 'data' => ''], 500);
    }

    /**
     * Validate password
     *
     * @param $origin
     * @param $encoded
     *
     * @return null
     */
    private function validatePassword($origin, $encoded)
    {

        $ch = curl_init(env('VALIDATE_URL'));
        $data = [
            "origin" => $origin,
            'encode' => $encoded,
        ];

        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        $result = curl_exec($ch);
        curl_close($ch);

        $data = json_decode($result, true);

        if (!isset($data['status']) || $data['status'] != 200) {
            return null;
        }

        return $data['data'];
    }

    /**
     * Endcode Password via API
     *
     * @param $origin
     *
     * @return null
     */
    private function encodePassword($origin)
    {

        $ch = curl_init(env('ENCODE_URL') . $origin);

        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        $result = curl_exec($ch);
        curl_close($ch);

        $data = json_decode($result, true);

        if (!isset($data['status']) || $data['status'] != 200) {
            return null;
        }

        return $data['data'];
    }

    public function updateIdentity(Request $request)
    {
        $path = '/uploads/cmnd/';
        $user = User::query()
            ->where('account_id', auth()->id())
            ->first();

        if ($user->bill_ready_request == 'Y') {
            return redirect()->route('newpub.billing.request')->with('Thông tin của bạn đã được gửi lên hệ thống rồi!');
        }

        if ($user->site_class != 2) {
            $this->validate($request, [
                'front-card' => 'required|mimes:jpeg,jpg,png|max:5120',
                'post-card' => 'required|mimes:jpeg,jpg,png|max:5120',
            ]);

            $front = $request->file('front-card');
            $post = $request->file('post-card');
            $filename = 'newpub/idcard/' . time().'.'.$front->getClientOriginalName();
            $frontPath = Upload::uploadToS3($front->getPathname(), $filename);

            $user->bill_ready_img1 =  $frontPath;

            $filename = 'newpub/post/' .time().'.'.$post->getClientOriginalName();
            $postPath = Upload::uploadToS3($post->getPathname(), $filename);
            $user->bill_ready_img2 =  $postPath;

        } else {
            $this->validate($request, [
                'business_license' => 'required|mimes:jpeg,jpg,png|max:5120',
            ]);

            $businessLicence = $request->file('post-card');
            $filename = 'newpub/path/' .time().'.'.$businessLicence->getClientOriginalName();
            $path = Upload::uploadToS3($businessLicence->getPathname(), $filename );

            $user->bill_ready_img3 = $path;
        }

        $user->bill_ready_request = 'Y';
        $user->bill_ready_request_date = date('Y-m-d H:i:s');

        if ($user->update()) {
            return redirect()->route('newpub.billing.request')->with('success', 'Update thành công thông tin, mất lâu nhất 24h để duyệt, muốn nhanh hơn hãy liên lạc với AM của bạn');
        }

        return redirect()->route('newpub.billing.request')->with('success', 'Có lỗi xảy ra, xin vui lòng thử lại sau');
    }
	
	public function updateAvatar(Request $request)
    {
        if($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $fileName = 'avt' . time() . $file->getClientOriginalName();
            $filePath = $file->getPathname();
            Upload::uploadToS3($filePath, 'affiliate_document/multi/' . $fileName);

            $avatar = config('const.minishop.aws_store_img').$fileName;

            $query = User::where("ACCOUNT_ID", '=', auth()->id())->update(["AVATAR" => $avatar]);
            if($query) {
                return response()->json(['status' => 200, 'data' => "Success"], 200);
            }

            return response()->json(['status' => 501, 'data' => 'Error'], 501);
        }

        return response()->json(['status' => 404, 'data' => 'Bad request'], 404);
    }
}
