<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\Cronlog;

class SentWaring extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $email;
    protected $name;

    public function __construct($email, $name)
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
                        'SUBJECT' => 'Bạn đang gặp khó khăn gì?', 
                        'READED' => 'N',
                        'TYPE' => 'F'
                    ]);
        return $this->subject('Bạn đang gặp khó khăn gì?')->from('support@adpia.vn', 'Adpia Affiliate Team')
            ->to($this->email, $name)
            ->view('template.document_mail.not_click', compact('name', 'user_id'));
    }
}
