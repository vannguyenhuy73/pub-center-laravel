<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\Cronlog;

class RegisterConfirm extends Mailable
{
    use Queueable, SerializesModels;
    protected $name;
    protected $email;
    protected $link;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $email, $link)
    {
        $this->name = $name;
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
        $name = $this->name;
        $link = route('register.confirm') . '?token=' . $this->link;

        $newId = Cronlog::max('ID');

        $user_id = Cronlog::query()->insert([
                        'ID' => ($newId + 1),
                        'EMAIL' => $this->email,
                        'SUBJECT' => 'Xác Thực Thông Tin', 
                        'READED' => 'N',
                        'TYPE' => 'A'
                    ]);

        return $this->subject('Xác Thực Thông Tin')->from('info@adpia.vn', 'Adpia Affiliate Team')
            ->to($this->email, $this->name)
            ->view('template.register', compact('name', 'link','user_id'));
    }
}
