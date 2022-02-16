<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\Cronlog;

class SentDocumentMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $name;
    protected $email;

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
                        'SUBJECT' => 'Chia sẻ kiến thức Affiliate Makerting!', 
                        'READED' => 'N',
                        'TYPE' => 'B'
                    ]);
        return $this->subject('Chia sẻ kiến thức Affiliate Makerting!')->from('support@adpia.vn', 'Adpia Affiliate Team')
            ->to($this->email, $name)
            ->view('template.document_mail.document_list', compact('name', 'user_id'));
    }
}
