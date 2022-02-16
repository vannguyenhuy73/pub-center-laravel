<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\Cronlog;

class SentGuideFirstOrder extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $email;
    protected $name;

    public function __construct( $email, $name)
    {
        $this->email = $email;
        $this->name = $name;
    }


    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $name = $this->name;
        $newId = Cronlog::max('ID');

        $user_id = Cronlog::query()->insert([
                        'ID' => ($newId + 1),
                        'EMAIL' => $this->email,
                        'SUBJECT' => 'Hướng dẫn cách có đơn hàng đầu tiên!', 
                        'READED' => 'N',
                        'TYPE' => 'D'
                    ]);
        return $this->subject('Hướng dẫn cách có đơn hàng đầu tiên!')->from('support@adpia.vn', 'Adpia Affiliate Team')
            ->to($this->email, $name)
            ->view('template.document_mail.guide_first_order', compact('name','user_id'));
    }
}
