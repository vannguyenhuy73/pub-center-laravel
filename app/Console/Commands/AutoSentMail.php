<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Mail;
use App\Mail\SentInviteConfirm;
use App\Mail\SentDocumentMail;
use App\Mail\SentGuideFirstOrder;
use App\Mail\SentWaring;
use App\User;
use Carbon\Carbon;
use App\Models\RegisterLog;
use Aws\Laravel\AwsFacade;
use Aws\Laravel\AwsServiceProvider;

class AutoSentMail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mail:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Auto email customer care';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $lastDay = Carbon::today()->subDays( 7 )->format('Y-m-d H:i:s');
        $secondDay = Carbon::today()->subDays( 2 )->format('Y-m-d H:i:s');
        $yesterday = Carbon::today()->subDays( 1 )->format('Y-m-d H:i:s');

        $listMailNotConfirm = RegisterLog::whereDate('CREATED_AT', $yesterday)->get()->toArray();

        $listMailConfirm = User::select('contact_mail', 'contact_name', 'account_id')
                                ->whereDate('REGISTERED_DATE', $yesterday)
                                ->where('CONTACT_MAIL_CONFIRM', 'Y')
                                ->get()->toArray();

        $listMailSecondDay = User::select('account_id', 'contact_mail', 'contact_name')
                    ->whereDate('REGISTERED_DATE', $secondDay)
                    ->where('CONTACT_MAIL_CONFIRM', 'Y')
                    ->get()->toArray();

        $sql = "select ACCOUNT_ID, AFFILIATE_ID, CONTACT_NAME, CONTACT_MAIL from (
                    select * from (
                        select TAFFILIATE.AFFILIATE_ID, TACCOUNT.ACCOUNT_ID, TACCOUNT.CONTACT_NAME,TACCOUNT.CONTACT_MAIL,SUM(TOTAL_CLT) as total_sales
                        from TAFFILIATE
                        inner join TACCOUNT on TACCOUNT.ACCOUNT_ID = TAFFILIATE.ACCOUNT_ID
                        inner join TDREPORT_TRAFFIC_NEW on TAFFILIATE.AFFILIATE_ID = TDREPORT_TRAFFIC_NEW.AFFILIATE_ID
                        where trunc(REGISTERED_DATE) = to_date('$lastDay','yyyy-mm-dd hh24:mi:ss')
                        group by TAFFILIATE.AFFILIATE_ID, TACCOUNT.ACCOUNT_ID,TACCOUNT.CONTACT_MAIL,TACCOUNT.CONTACT_NAME
                        union all
                        select TAFFILIATE.AFFILIATE_ID, TACCOUNT.ACCOUNT_ID, TACCOUNT.CONTACT_NAME, TACCOUNT.CONTACT_MAIL,0 as total_sales
                        from TAFFILIATE
                        inner join TACCOUNT on TACCOUNT.ACCOUNT_ID = TAFFILIATE.ACCOUNT_ID
                        where trunc(REGISTERED_DATE) = to_date('$lastDay','yyyy-mm-dd hh24:mi:ss')
                        and TACCOUNT.CONTACT_MAIL_CONFIRM = 'Y'
                    )
                    where  total_sales < 10 OR  total_sales is null
                )
                group by ACCOUNT_ID, AFFILIATE_ID, CONTACT_MAIL, CONTACT_NAME";
        $listMailNotClickLastDay = \DB::select($sql);

        if (!empty($listMailNotConfirm)) {
            for($i = 0; $i < count($listMailNotConfirm); $i++) {
                Mail::send(new SentInviteConfirm($listMailNotConfirm[$i]['email'], $listMailNotConfirm[$i]['account_id']));
            }
        }

        if (!empty($listMailConfirm)) {
            for($i = 0; $i < count($listMailConfirm); $i++) {
                Mail::send(new SentDocumentMail($listMailConfirm[$i]['contact_mail'], $listMailConfirm[$i]['contact_name']));
            }
        }

        if (!empty($listMailSecondDay)) {
            for($i = 0; $i < count($listMailSecondDay); $i++) {
                Mail::send(new SentGuideFirstOrder($listMailSecondDay[$i]['contact_mail'], $listMailSecondDay[$i]['contact_name']));
            }
        }

        if (!empty($listMailNotClickLastDay)) {
            for($i = 0; $i < count($listMailNotClickLastDay); $i++) {
                Mail::send(new SentWaring($listMailNotClickLastDay[$i]->contact_mail, $listMailNotClickLastDay[$i]->contact_name));
            }   
        } 
        
        $this->info('status:update Command Run successfully!');
    }
}
