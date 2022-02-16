<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\Cronlog;

class SentIntro extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $name;
    protected $email;

    public function __construct($name, $email)
    {
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
        $name = $this->name;
        $newId = Cronlog::max('ID');

        $user_id = Cronlog::query()->insert([
                        'ID' => ($newId + 1),
                        'EMAIL' => $this->email,
                        'SUBJECT' => 'Adpia là gì?', 
                        'READED' => 'N',
                        'TYPE' => 'E'
                    ]);
        return $this->subject('Adpia là gì?')->from('support@adpia.vn', 'Adpia Affiliate Team')
            ->to($this->email, $name)
            ->view('template.document_mail.intro_adpia', compact('name','user_id'));
    }
}
