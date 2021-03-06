<?php

namespace App\Http\Controllers;

use App\Http\Helpers\Helper;
use App\Http\Helpers\MailHelper;
use App\Models\Affiliate;
use App\Models\Content;
use App\Models\Mail;
use App\Models\Merchant;
use App\Models\NewContent;
use App\Models\Notice;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class MailController extends Controller
{
    private $inboxCount = 0;
    private $sentCount = 0;
    private $spamCount = 0;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($page = 1)
    {

        $active = 'inbox';
        $link = "";
        $count = 0;
        return view('mail.notice', compact('inboxCount', 'mails', 'active', 'link','count'));
    }

    /**
     * Show list email user sent
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function sent()
    {
        $mail = new Mail();
        $inboxCount = $mail->getInboxMailCount(Auth::id());
        $mails = $mail->getSentMail(auth()->id(), Helper::getAllAffiliateID());
        $active = 'sent';

        foreach ($mails as $key => $mail) {
            $name = $this->getNameSender($mail->sender_type, $mail->sender_id);
            $mails[$key]->sender_name = $name;
        }

        return view('mail.index', compact('inboxCount', 'mails', 'active'));
    }

    /**
     * Show list email user saved
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function save()
    {
        $mail = new Mail();
        $inboxCount = $mail->getInboxMailCount(Auth::id());
        $mails = $mail->getSaveMail(auth()->id(), Helper::getAllAffiliateID());
        $active = 'save';

        foreach ($mails as $key => $mail) {
            $name = $this->getNameSender($mail->sender_type, $mail->sender_id);
            $mails[$key]->sender_name = $name;
        }

        return view('mail.index', compact('inboxCount', 'mails', 'active'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return redirect()->back()->with('error', 'Ch???c n??ng ??ang b???o ch??, vui l??ng quay l???i sau');

        $mail = new Mail();
        $inboxCount = $mail->getInboxMailCount(Auth::id());
        $mails = $mail->getSaveMail(auth()->id(), Helper::getAllAffiliateID());
        $listMerchant = (new Merchant())->getListMerchantValid();
        $active = 'inbox';

        return view('mail.create', compact('mails', 'inboxCount', 'active', 'listMerchant'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return redirect()->back()->with('error', 'Ch???c n??ng ??ang b???o ch??, vui l??ng quay l???i sau');

        $this->validate($request, [
            'subject' => 'required|max:255',
            'receit_id' => 'required',
            'content' => 'required|max:4000',
        ]);

        $subject = $request->get('subject');
        $content = $request->get('content');
        $receitID = $request->get('receit_id');
        $rtype = "MER";

        if ($receitID == "APA")
            $rtype = "APA";

        $contentObj = new Content();
        $contentObj->content_id = MailHelper::getContentID();
        $contentObj->next = 0;
        $contentObj->content = stripcslashes($content);
        $contentObj->html_flag = 'N';
        $contentObj->deletable_flag = 'Y';
        $contentObj->create_time_stamp = date('Y-m-d h:i:s');

        if (!$contentObj->save()) {
            return back()->with('error', 'C?? l???i x???y ra xin vui l??ng th??? l???i sau!');
        }

        $contentID = $contentObj->content_id;

        /*if ($res = MailHelper::insert(Helper::getCurrentAff(), $receitID, 'AFF', $rtype, $subject, $contentID)) {
        } */
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mailInfo = Mail::query()->select()->find($id);
        $listAccount = Helper::getAllAffiliateID();
        array_push($listAccount, auth()->id());

        if ($mailInfo && in_array($mailInfo->receit_id, $listAccount) || in_array($mailInfo->sender_id, $listAccount)) {

            $mail = new Mail();
            $inboxCount = $mail->getInboxMailCount(Auth::id());

            $mailInfo->read_date = date('Y-m-d H:i:s');
            $content = $this->readContent($mailInfo->content_id);

            $mailInfo->update();

            $mailInfo->senderName = $this->getNameSender($mailInfo->sender_type, $mailInfo->sender_id);


            return view('mail.detail', compact('inboxCount', 'mailInfo', 'content'));
        }

        return redirect()->route('mail.index')
            ->with('error', 'Email kh??ng t???n t???i ho???c b???n kh??ng c?? quy???n xem n??');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $type = null)
    {

        $listAccount = Helper::getAllAffiliateID();
        array_push($listAccount, auth()->id());

        $mail = Mail::query()->select(['mail_id'])
            ->where('mail_id', $id)
            ->whereIn('receit_id', $listAccount)
            ->first();

        if (!$mail) {
            return redirect()->route('mail.index')->with('error', 'Mail invalid');
        }

        if ($type == 'i') {
            $mail->receit_delete_flag = 'Y';
        } else {
            $mail->sender_delete_flag = 'Y';
        }

        $mail->update();

        return redirect()->route('mail.index')->with('success', 'X??a th??nh c??ng email');
    }

    /**
     * Destroy list email
     * Type = I -> delete inbox, else -> delete sent
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroyList(Request $request)
    {

        $posts = $request->only('id', 'type');

        $listAccount = Helper::getAllAffiliateID();

        array_push($listAccount, auth()->id());

        $message = 0;

        foreach ($posts['id'] as $id) {
            $flag = Mail::query()->select(['mail_id'])
                ->where('mail_id', $id)
                ->whereIn('receit_id', $listAccount)
                ->first();

            if ($flag) {

                if (isset($posts['type']) && $posts['type'] == 'I') {
                    $flag->receit_delete_flag = 'Y';
                } else {
                    $flag->sender_delete_flag = 'Y';
                }

                $flag->update();
                $message += 1;
            }
        }

        return response()->json(['status' => 200, 'message' => $message], 200);
    }

    public function saveList(Request $request)
    {
        $listID = $request->only('id');

        $listAccount = Helper::getAllAffiliateID();

        array_push($listAccount, auth()->id());

        $message = 0;

        foreach ($listID['id'] as $id) {
            $flag = Mail::query()->select('mail_id')
                ->where('mail_id', $id)
                ->whereIn('receit_id', $listAccount)
                ->first();

            if ($flag) {
                $flag->hold_yn = 'Y';

                if ($flag->update()) {
                    $message += 1;
                }
            }
        }

        return response()->json(['status' => 200, 'message' => $message], '200');
    }

    /**
     * Get name of user sender Email
     *
     * @param $type
     * @param $id
     * @return string
     */
    private function getNameSender($type, $id)
    {
        if ($type == "APA")
            return "Ng?????i qu???n l?? Adpia Affiliate";
        else if ($type == "APB")
            return "Qu???n l?? Adpia BA";
        else if ($type == "APM")
            return "Qu???n l?? Adpia Merchant";
        else if ($type == "APW")
            return "Adpia Webmaster";
        else if ($type == "APS")
            return "Gi??m s??t Adpia";
        else if ($type == "MER") {

            $key = "merchant".$id;
            $merchant = Cache::get($key);
            if(!$merchant)
            {
                $merchant = Merchant::query()->select('site_name')->find($id);
                if($merchant)
                    Cache::put($key, $merchant, 24*60);
            }

            if ($merchant) {
                return "Qu???n l?? " . $merchant->site_name;
            } else {
                return "Merchant kh??ng x??c ?????nh";
            }
        } else if ($type == "ACC" || $type == "ACO" || $type == "SPO") {

            $key = "User".$id;
            $user = Cache::get($key);
            if(!$user)
            {
                $user = User::query()->select('contact_name')->find($id);
                if($user)
                    Cache::put($key, $user, 24*60);
            }
            if ($user) {
                return $user->contact_name . "(" . $id . ")";
            } else {
                return "Affiliate kh??ng x??c ?????nh";
            }
        } else if ($type == "AFF") {

            $key = "Affiliate".$id;
            $affiliate = Cache::get($key);
            if(!$affiliate)
            {
                $affiliate = Affiliate::query()->select('site_name')->find($id);
                if($affiliate)
                    Cache::put($key, $affiliate, 24*60);
            }
            if ($affiliate) {

                return "Qu???n l?? " . $affiliate->site_name;
            } else {
                return "Affiliate kh??ng x??c ?????nh";
            }
        } else if ($type == "CST") {
            return $id;
        } else {
            return "Kh??ng x??c ?????nh";
        }
    }

    /**
     * recursive content of email
     *
     * @param $contentID
     * @return mixed|string
     */
    private function readContent($contentID)
    {
        $content = Content::query()->find($contentID);

        if (!$content) {
            $content = NewContent::query()->find($contentID);

            if (!$content) {
                return '';
            }

            return $content->text;
        }

        $contentData = $content->content;

        if ($content->next) {
            $contentData .= $this->readContent($content->next);
        }

        return $contentData;
    }
    
    public function getMailAjax(Request $request) {
        $page = $request->get('page');
        $afKey = "acc_affs_list".auth()->id().$page;
        $affList = Cache::get($afKey);
        if(!$affList)
        {
            $affList = Helper::getAllAffiliateID();
            Cache::put($afKey, $affList, 24*60);
        }

        $mailCountKey = "mail_count_".auth()->id().$page;
        $mailCount = Cache::get($mailCountKey);
        $mail = new Mail();

        if(!$mailCount)
        {
            $mailCount = $mail->getInboxMailCount(Auth::id());
            Cache::put($mailCountKey, $mailCount, 24*60);
        }

        $mailListKey = "mail_list_".auth()->id().$page;
        $mailList = Cache::get($mailListKey);

        if(!$mailList)
        {
            $mailList = $mail->getInboxMail(auth()->id(), $affList);
            Cache::put($mailListKey, $mailList, 24*60);
        }
        $data['count'] = $mailCount;
        $data['mail'] = $mailList;
    
        foreach ( $data['mail'] as $key => $mail) {
            $name = $this->getNameSender($mail->sender_type, $mail->sender_id);
            $data['mail'][$key]->sender_name = $name;
        }
        
        return $data;
    }
}
