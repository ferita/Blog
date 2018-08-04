<?php

namespace App\Listeners;

use App\Events\OrderWasCancelled;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Mail\OrderCancelledMail;
use Illuminate\Support\Facades\Mail;

class OrderCancelledMailNotify
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
     * @param  OrderWasCancelled  $event
     * @return void
     */
    public function handle(OrderWasCancelled $event)
     {
        $data = $event->getInputData();
        $order = $event->getOrder();

       Mail::to('doremifasolas@yandex.ru')
            ->send(new OrderCancelledMail($data, $order));
    }
}