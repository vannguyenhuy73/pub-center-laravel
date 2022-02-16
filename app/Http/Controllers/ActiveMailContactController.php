<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Models\CodeActiveMail;
use App\User;
use App\Mail\SentCodeActive;
use Auth;

class ActiveMailContactController extends Controller
{
    public function genderCode(Request $request)
    {
        $code = $this->randomCode(6);

    	$this->validate($request, [
        	'contact_mail' => 'required|string|email|max:255|unique:taccount,contact_mail',
        ]);

    	$flat = CodeActiveMail::where('email', $request->contact_mail)->first();

        if(empty($flat->code) == true){
            $check = new CodeActiveMail([
    			'email' => $request->contact_mail,
    			'code' => $code,
    		]);
            $check->save();
        }else {
            $flat->delete();
            $check = new CodeActiveMail([
                'email' => $request->contact_mail,
                'code' => $code,
            ]);
            $check->save();
        }

        \Mail::send(new SentCodeActive( $code, $request->contact_mail));
    	session(['status_sent_code' => true]);
        session(['email_active_code' => $request->contact_mail]);

        return redirect()->back();
    }

    public function reSentCode(Request $request)
    {
        $code = $this->randomCode(6);
        $email = $request->session()->get('email_active_code');

        CodeActiveMail::where('email', $email)
            ->update(['code' => $code]);

        \Mail::send(new SentCodeActive($code, $email));
       
        return redirect()->back();
    }

    public function changeContactMail(Request $request)
    {
        session()->forget(['email_active_code', 'status_sent_code']);

         return redirect()->back();
    }

    public function randomCode($key)
    {
        $code = str_random($key);
        $checkCode = CodeActiveMail::where('code', $code)->first();

        if (!empty($checkCode->email) == true) {
            $this->randomCode();
        }

        return  $code;
    }

    public function checkCode(Request $request) {
        $checkCode = CodeActiveMail::where('code', $request->code)->first();
        $email = $request->session()->get('email_active_code');

        if(!empty($checkCode->email) ==  true && $email == $checkCode->email ) {
            $account_id = Auth::user()->account_id;

            User::where('account_id', $account_id)
            ->update(['contact_mail' => $email]);

            $checkCode->delete();
            session()->forget(['email_active_code', 'status_sent_code']);
            return redirect()->back()->with('success', 'Cập nhật thành công!');
        } else {
            return redirect()->back()->with('status_code', 'Mã không hợp lệ!');
        }
    }
}
