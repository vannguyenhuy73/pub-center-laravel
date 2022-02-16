<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests as FormRequest;
use App\Models\AcountManager;
use App\Models\Admin;
use App\Models\Manager;
use App\Models\Affiliate;
use App\Models\UserConfirm;
use App\Models\UserLog;
use App\Models\MailInfoAdpia;
use App\Models\AccountDetail;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Models\RegisterSource;
use App\Models\RegisterLog;
use Session;
use App\Mail\SentIntro;
use App\Mail\SentGuideFirst;
use App\Mail\RegisterConfirm;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function register(FormRequest\RegisterRequest $request)
    {
    	if($request->step == 'step1') {
            $checkLog = RegisterLog::query()->where('email', $request->email)->first();
            if (empty($checkLog)) {
                RegisterLog::query()->create([
                        'ACCOUNT_ID' => $request->user_name,
                        'EMAIL' => $request->email,
                        'PHONE' => $request->phone,
                        'ZALO_PHONE' => $request->zalo_phone,
                        'LINK_PROFILE' => $request->link_facebook,
                        'FULL_NAME' => $request->full_name,
                        'STEP' => 1,
                        'CONTACT_ADDRESS2' => $request->city
                    ]);
            }else {
                $checkLog->delete();
                RegisterLog::query()->create([
                        'ACCOUNT_ID' => $request->user_name,
                        'EMAIL' => $request->email,
                        'PHONE' => $request->phone,
                        'ZALO_PHONE' => $request->zalo_phone,
                        'LINK_PROFILE' => $request->link_facebook,
                        'FULL_NAME' => $request->full_name,
                        'STEP' => 1,
                        'CONTACT_ADDRESS2' => $request->city
                    ]);
            }

	        session(['user_register'.$request->user_name => [
	            'full_name' => $request->full_name,
	            'email' => $request->email,
	            'user_name' => $request->user_name,
	            'phone' => $request->phone,
	            'password' => $request->password,
	            'zalo_phone' => $request->zalo_phone,
	            'link_facebook' => $request->link_facebook,
	            'check' => $request->check,
                'contact_address2' => $request->contact_address2
	        ]]);

	        if(Session::has('user_register'.$request->user_name)) {
		        return view('auth.step2', array('accId' => $request->user_name));
	        }else {
	        	return redirect()->back()->with('error','Có lỗi sảy ra!');
	        }

	    }

    	if($request->step == 'step2') {
            $accId = $request->get('accId');
    		$inforUser = Session::get('user_register'.$accId);
		    $site_url = $request->get('url_source');
		    $keyword = (\DB::select('select REFER_KEYWORDS from TMERCHANT_REFER_RULE where MERCHANT_ID=\'adpia\''))[0]->refer_keywords;
		    $keywords = explode(',', $keyword);

		    $key = "";

		    for ($i = 0; $i < count($keywords); $i++) {

			    if (stripos(strtolower($site_url), trim($keywords[$i])) !== FALSE) {
				    $key = $keywords[$i];
				    break;
			    }
		    }

		    if ($key != "") {
			    return redirect()->route('register')
				    ->with('error', 'Link website của bạn có chứa từ khóa không phù hợp "' . $key . '". Vui lòng liên hệ AM để biết thêm chi tiết');
		    }

			try {
                if ($this->create($request, $inforUser) && $this->createAffiliate($request, $inforUser) && $this->insertAccountDetail($request, $inforUser)) {

    			    UserLog::query()->create([
    				    'ACCOUNT_TYPE' => 'A',
    				    'ACCOUNT_ID' => $inforUser['user_name'],
    				    'LOG_CODE' => '101',
    				    'log_param' => '',
    				    'log_desc' => '',
    				    'source_url' => url()->current(),
    				    'remote_addr' => $request->ip(),
    				    'create_time_stamp' => date('Y-m-d h:i:s'),
    				    'yyyymmdd' => date('Ymd'),
    			    ]);

    			    AcountManager::query()->insert([
    				    'account_id' =>$inforUser['user_name'],
    				    'manager' => (new Manager())->getManager($inforUser['contact_address2']),
    				    'readed' => 0
    			    ]);
					
					$am_zone = (\DB::table('TAFF_MANAGER_STAFF')
					->select('TAFF_MANAGER_STAFF.ZONE_ID')
					->join('TAFF_MANAGE', 'TAFF_MANAGE.MANAGER', '=', 'TAFF_MANAGER_STAFF.MANAGER')
					->where('TAFF_MANAGE.ACCOUNT_ID', '=', $inforUser['user_name'])
					->first());
					
					if($am_zone) {
						$zone_id = $am_zone->zone_id;
						
						$aff_Id = (\DB::table('TAFFILIATE')->select('AFFILIATE_ID')->where('ACCOUNT_ID', '=', $inforUser['user_name'])->first());
						
						if($aff_Id) {
							$add_zone = (\DB::table('TAFFILIATE')->where('AFFILIATE_ID', '=', $aff_Id->affiliate_id)->update(['ZONE_ID' => $zone_id]));
						}
					}

    			    //hash token
    			    $hash = md5($inforUser['user_name'] . time());

    			    // add token
    			   UserConfirm::query()->create(['account_id' => $inforUser['user_name'], 'key' => $hash]);

    			    //send mail
    			    Mail::send(new RegisterConfirm($inforUser['user_name'], $inforUser['email'], $hash));
    			    //add source
    			    if (!empty($request->utm_medium) && !empty($request->utm_source)) {
    				    $this->addSourceRegister($request, $inforUser);
    			    }

                    $inforMail = User::where('account_id', $inforUser['user_name'])->first();
                    $getLog = RegisterLog::query()->where('email', $inforMail->contact_mail)->first();
                    $getLog->delete();
                    Session::forget('user_register'.$accId);

    			    return view('auth.step3', compact('inforMail'));
    		    }
			} catch (\Exception $e) {
                return redirect()->route('register')
                    ->withErrors('Có lỗi xảy ra, xin vui lòng thử lại sau hoặc liên hệ với chúng tôi để được khắc phục!');
			}
	    }

        return redirect()->route('register')
            ->withErrors('Có lỗi xảy ra, xin vui lòng thử lại sau hoặc liên hệ với chúng tôi để được khắc phục!');

    }


    public function registerAjax(Request $request)
    {
        $this->validate($request, [
            'fullname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:taccount,contact_mail',
            'name' => 'required|min:6|regex:/^[a-zA-Z0-9]+$/u|string|max:255|alpha_dash|unique:taccount,account_id',
            'phone' => 'required|string|max:15|unique:taccount,contact_phone',
            'password' => 'required|string|min:6|alpha_dash',
            'link' => 'required|url|max:300',
            'zalo_phone' => 'required|string|max:15|unique:taccount_detail,zalo_phone',
        ]);

        $checkLog = RegisterLog::query()->where('email', $request->email)->first();

        if (empty($checkLog)) {
            RegisterLog::query()->create([
                'ACCOUNT_ID' => $request->name,
                'EMAIL' => $request->email,
                'PHONE' => $request->phone,
                'ZALO_PHONE' => $request->zalo_phone,
                'LINK_PROFILE' => $request->link,
                'FULL_NAME' => $request->fullname,
                'STEP' => 1,
            ]);
        }else {
            $checkLog->delete();
            RegisterLog::query()->create([
                'ACCOUNT_ID' => $request->name,
                'EMAIL' => $request->email,
                'PHONE' => $request->phone,
                'ZALO_PHONE' => $request->zalo_phone,
                'LINK_PROFILE' => $request->link,
                'FULL_NAME' => $request->fullname,
                'STEP' => 1,
            ]);
        }

        session(['user_register_ajax' => [
            'full_name' => $request->fullname,
            'email' => $request->email,
            'user_name' => $request->name,
            'phone' => $request->phone,
            'password' => $request->password,
            'zalo_phone' => $request->zalo_phone,
            'link_facebook' => $request->link,
        ]]);

        return 'success';
    }

    public function createAjax(Request $request)
    {
        $inforUser = $request->session()->get('user_register_ajax', '');

        if ($request->traffic != 'no') {
            $this->validate($request, [
                'name_source' => 'required|string|max:255',
                'detail' => 'required|string|max:255',
                'url_source' => 'required|url|max:300',
            ]);
        }
        $site_url = $request->get('url_source');
        $keyword = (\DB::select('select REFER_KEYWORDS from TMERCHANT_REFER_RULE where MERCHANT_ID=\'adpia\''))[0]->refer_keywords;
        $keywords = explode(',', $keyword);

        $key = "";

        for ($i = 0; $i < count($keywords); $i++) {

            if (stripos(strtolower($site_url), trim($keywords[$i])) !== FALSE) {
                $key = $keywords[$i];
                break;
            }
        }

        if ($key != "") {
            return 'error';
        }

        if ($this->create($request, $inforUser) && $this->createAffiliate($request, $inforUser) && $this->insertAccountDetail($request, $inforUser)) {

            UserLog::query()->create([
                'ACCOUNT_TYPE' => 'A',
                'ACCOUNT_ID' => $inforUser['user_name'],
                'LOG_CODE' => '101',
                'log_param' => '',
                'log_desc' => '',
                'source_url' => url()->current(),
                'remote_addr' => $request->ip(),
                'create_time_stamp' => date('Y-m-d h:i:s'),
                'yyyymmdd' => date('Ymd'),
            ]);

            AcountManager::query()->insert([
                'account_id' => $inforUser['user_name'],
                'manager' => (new Manager())->getManager(),
                'readed' => 0,
                'create_time_stamp' => date('Y-m-d h:i:s'),
            ]);

            //hash token
            $hash = md5($inforUser['user_name'] . time());

            // add token
            UserConfirm::query()->create(['account_id' => $inforUser['user_name'], 'key' => $hash]);

            //send mail
            Mail::send(new RegisterConfirm($inforUser['user_name'], $inforUser['email'], $hash));
            //add source
            if ($request->utm_medium != 'no'&& $request->utm_source != 'no') {
                $this->addSourceRegister($request, $inforUser);
            }

            $inforMail = User::where('account_id', $inforUser['user_name'])->first();
            $getLog = RegisterLog::query()->where('email', $inforMail->contact_mail)->first();
            $getLog->delete();
            Session::forget('user_register_ajax');

            return $inforMail;
        }

        return 'error';
    }
    /**
     * Confirm email
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function confirm(Request $request)
    {
        $token = $request->get('token', False);

        if (!$token) {
            return redirect()->route('register')->with('error', 'Link không hợp lệ');
        }

        $userConfirm = UserConfirm::query()->where('key', $token)->first();

        if (!$userConfirm) {
            return redirect()->route('register')->with('error', 'Token không hợp lệ');
        }

        $user = User::query()->where('account_id', $userConfirm->account_id)->first();

        if ($user) {
            $user->contact_mail_confirm = 'Y';
            $user->update();
        }

        $mailExist =  MailInfoAdpia::where('email', $user->contact_mail)->first();

        if (empty($mailExist)) {
            MailInfoAdpia::create([
                'name' => $user->contact_name,
                'email' => $user->contact_mail,
                'account_id' => $user->account_id
            ]);
        }

        \Auth::login($user, true);
        $userConfirm->delete();

        return view('auth.step4');
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return \App\User
     */
    protected function create(Request $request, $inforUser)
    {
        $affID = $acID = "";

        if ($acID = $request->get('referral')) {
            $affInfo = Affiliate::query()->where('account_id', $acID)->first(['affiliate_id']);

            if ($affInfo) {
                $affID = $affInfo->affiliate_id;
            }
        }

        if ($request->utm_medium != ' '&& $request->utm_source != ' ') {
            $affID = 'A100023368';
            $acID = 'marketingteam';
        }

        return User::create([
            'account_id' => $inforUser['user_name'],
            'contact_name' =>$inforUser['full_name'],
            'contact_mail' => $inforUser['email'],
            'contact_phone' => $inforUser['phone'],
            'password' => $this->encodePassword($inforUser['password']),
            'site_class' => 1,
            'account_status' => 'ACT',
            'NATIONALITY' => 'VNM',
            'EMAIL_RECEPTION_STATUS' => 'AUT',
            'BILL_READY_FLAG' => 'N',
            'SUSPENDED_FLAG' => 'N',
            'TAX_FREE_FLAG' => 'N',
            'SECEDE_YN' => 'N',
            'SMS_YN' => 'N',
            'REFER_AFFILIATE_ID' => $affID,
            'JOIN_FROM' => $acID,
	        'CONTACT_MAIL_CONFIRM' => 'N',
            'FIRST_ORDER' => 'N',
            'REGISTERED_DATE' => date('Y-m-d h:i:s'),
            'contact_address2' => $inforUser['contact_address2']
        ]);
    }

    /**
     * Create new affiliate in the system
     *
     * @param Request $request
     * @return mixed
     */
    protected function createAffiliate(Request $request, $inforUser)
    {
        $accountID = $request->get('referral');
        $affilitate = (\DB::select('select GET_AFFILIATE_ID affiliate_id from DUAL'))[0]->affiliate_id;

        return Affiliate::query()->create([
            'AFFILIATE_ID' => $affilitate,
            'ACCOUNT_ID' => $inforUser['user_name'],
            'SITE_NAME' => !empty($request->get('name_source'))?$request->get('name_source'):'facebook_profile',
            'SITE_URL' => !empty($request->get('url_source'))?$request->get('url_source'):$inforUser['link_facebook'],
            'CATEGORY1' => '',
            'CATEGORY2' => '',
            'SITE_DESC' => '',
            'DELETE_FLAG' => 'N',
            'AP_LEVEL' => '000',
            'MINISHOP_ONLY_YN' => 'N',
            'BA_YN' => 'N',
            'FORWARDING_YN' => 'Y',
            'PRICE_YN' => 'N',
            'SIDE_MER_FORWARD_YN' => 'N',
            'CASHBACK_YN' => 'N',
            'PARTNER_ACCOUNT_ID' => $accountID
        ]);
    }

    /**
     * encode password
     *
     * @param $origin
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

	protected function addSourceRegister($req, $infor) {
		$utm_medium = $req->utm_medium;
		$utm_source = $req->utm_source;
		$utm_campaign = $req->utm_campaign;
		$utm_term = $req->utm_term;
		$user_name = $infor['user_name'];
		$utm_content = !empty($req->utm_content)?$req->utm_content:'no';
		$sql = "insert into TRESGISTER_SOURCE (ACCOUNT_ID, UTM_MEDIUM, UTM_SOURCE, UTM_CAMPAIGN, UTM_TERM, UTM_CONTENT)values ('$user_name','$utm_medium','$utm_source','$utm_campaign','$utm_term','$utm_content')";

		return \DB::statement($sql);
	}

    private function insertAccountDetail($req, $infor) {
	    return AccountDetail::query()->create([
		    'ACCOUNT_ID' => $infor['user_name'],
		    'ZALO_PHONE' => $infor['zalo_phone'],
		    'FACEBOOK_PROFILE' => $infor['link_facebook'],
		   'METHOD_AFF' => $req->get('radio'),
		   'SOURCE_TRAFFIC' => $req->get('traffic'),
		   'NAME_SOURCE' => !empty($req->get('name_source'))?$req->get('name_source'):'no',
		   'URL_SOURCE' => !empty($req->get('url_source'))?$req->get('url_source'):'no',
		   'DETAIL' => !empty($req->get('detail'))?$req->get('detail'):'no',
	    ]);
    }

    function resendConfirmMail() {
        return view('auth.resend_confirm');
    }

    function handleResendConfirmMail(Request $request) {
        $email = $request->get('email', null);

        $user = User::query()->where(['contact_mail' => $email])->first(['account_id', 'contact_mail_confirm']);

        if (!$user) {
            return redirect()->route('login')->with('error', 'Email này không tồn tại trên hệ thống, hoặc chưa được kích hoạt');
        }

        if ($user['contact_mail_confirm'] == 'Y') {
            return redirect()->route('login')->with('error', 'Email này đã được xác thực trên hệ thống rồi!');
        }

        // hash token
        $hash = md5($user->account_id . time());

        $token = UserConfirm::query()->where('account_id', $user->account_id)->first();

        if($token) {
            $token->delete();
        }

        UserConfirm::query()->create(['account_id' => $user->account_id, 'key' => $hash]);

        Mail::send(new RegisterConfirm($user->account_id, $email, $hash));

        return redirect()->route('login')->with('success', 'Chúng tôi đã gửi thành công email xác thực về email của bạn, xin vui lòng kiểm tra');
    }

}