<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderCancelledMail extends Mailable
{
    use Queueable, SerializesModels;
    protected $input;
    protected $order;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($input, $order)
    {
        $this->input = $input;
        $this->order = $order;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.order_cancelled')
            ->from(['address' => 'thecake.manager@yandex.ru'])
            ->with(['data' => $this->input, 'order_id' => $this->order->id, 'order' => $this->order])
            ->subject('TheCake - покупатель отменил заказ');
          
    }
}
