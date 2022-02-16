<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Mail;
use App\Mail\SentOrderFisrtMail;
use App\User;
use Aws\Laravel\AwsFacade;
use Aws\Laravel\AwsServiceProvider;
use Carbon\Carbon;
class OrderFirstMail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'order:mail';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sent email of the first order';

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
        $sql = " select T.ACCOUNT_ID,T.CONTACT_MAIL, T.CONTACT_NAME, T2.YYYYMMDD from TAFFILIATE T1
                    join TACCOUNT T on T1.ACCOUNT_ID = T.ACCOUNT_ID
                    join TTRANSLOG T2 on T2.AFFILIATE_ID = T1.AFFILIATE_ID
                where  T.CONTACT_MAIL_CONFIRM = 'Y'
                and T1.AFFILIATE_ID not in(
                    select TAFFILIATE.AFFILIATE_ID
                    from TAFFILIATE
                    join TTRANSLOG T3 on TAFFILIATE.AFFILIATE_ID = T3.AFFILIATE_ID
                    where T3.YYYYMMDD < to_char(sysdate,'YYYYMMDD')
                    )
                and  T2.YYYYMMDD =  to_char(sysdate,'YYYYMMDD')
                and  T.FIRST_ORDER = 'N'
                group by T.ACCOUNT_ID, T.CONTACT_MAIL, CONTACT_NAME, T2.YYYYMMDD";
        $data = \DB::select($sql);
        
        for($i = 0; $i < count($data); $i++) {
            // var_dump($data[$i]->account_id);die;
            Mail::send(new SentOrderFisrtMail($data[$i]->contact_mail, $data[$i]->contact_name));
            $user_log = User::where('account_id', $data[$i]->account_id)->first();
            $user_log->first_order = 'Y';
            $user_log->save();
        } 
        
        $this->info('status:update Command Run successfully!');
    }
}
