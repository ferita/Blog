<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class FeedBackCustomerMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $input;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($input)
    {
       $this->input = $input;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.feedback_to_customer')
            ->from(['address' => 'thecake.manager@yandex.ru'])
            ->with(['data' => $this->input])
            ->subject('TheCake: сообщение обратной связи');
    }
}
