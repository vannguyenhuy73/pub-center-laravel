<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ResetPassword extends Mailable
{
    use Queueable, SerializesModels;
    protected $accountID;
    protected $email;
    protected $link;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($accountID, $email, $link)
    {
        $this->accountID = $accountID;
        $this->email = $email;
        $this->link = $link;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $name = $this->accountID;
        $link = route('reset.confirm') . '?token=' . $this->link .'&account_id=' . $name;

        return $this->subject('Khôi Phục Mật Khẩu')->from('affiliate@adpia.vn', 'Adpia Affiliate Team')
            ->to($this->email, $name)
            ->view('template.reset', compact('name', 'link'));
    }
}
