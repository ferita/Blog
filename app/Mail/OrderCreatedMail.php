<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderCreatedMail extends Mailable
{
    use Queueable, SerializesModels;
    protected $input;
    protected $order_id;
    protected $order;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($input, $order_id, $order)
    {
        $this->input = $input;
        $this->order_id = $order_id;
        $this->order = $order;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
         return $this->view('mails.order_created')
            ->from(['address' => 'thecake.manager@yandex.ru'])
            ->with(['data' => $this->input, 'order_id' => $this->order_id, 'order' => $this->order])
            ->subject('TheCake - поступил новый заказ');
           // ->attach(base_path('invoice'));
    }
}
