<?php

namespace App\Listeners;

use App\Events\OrderWasCreated;
use App\Mail\OrderCreatedCustomerMail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class OrderMailCustomerNotify
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
        // $data = $event->getInputData();
        // $order_id = $event->getOrderId();
        // $order = $event->getOrder();
        // Mail::to($data['customer_email'])
        //     ->send(new OrderCreatedCustomerMail($data, $order_id, $order));
    }
}
