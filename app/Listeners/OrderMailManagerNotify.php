<?php

namespace App\Listeners;

use App\Events\OrderWasCreated;
use App\Mail\OrderCreatedMail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class OrderMailManagerNotify
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  OrderWasCreated  $event
     * @return void
     */
    public function handle(OrderWasCreated $event)
    {
        $data = $event->getInputData();
        $order_id = $event->getOrderId();

       Mail::to(env('MAIL_TO'))
            ->send(new OrderCreatedMail($data, $order_id));
    }
}
