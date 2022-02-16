<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SentCodeActive extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $code;
    protected $email;

    public function __construct($code, $email)
    {
        $this->code = $code;
        $this->email = $email;    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $code = $this->code;

        return $this->subject('Mã xác nhận')->from('info@adpia.vn', 'Adpia Affiliate Team')
            ->to($this->email)
            ->view('template.active_code', compact('code'));
    }
}
