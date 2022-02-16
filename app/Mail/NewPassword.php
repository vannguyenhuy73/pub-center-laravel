<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewPassword extends Mailable
{
    use Queueable, SerializesModels;

    protected $password;
    protected $name;
    protected $email;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $email, $password)
    {
        $this->password = $password;
        $this->name = $name;
        $this->email = $email;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $newPass = $this->password;
        return $this->subject('Mật Khẩu Mới')->from('affiliate@adpia.vn', 'Adpia Affiliate Team')
            ->to($this->email, $this->name)
            ->view('template.newpassword', compact('newPass'));
    }
}
