<?php

namespace App\Listeners;

use App\Events\OrderWasCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\Order;

class OrderDBSave
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
       // Order::create($data);
    }
}
