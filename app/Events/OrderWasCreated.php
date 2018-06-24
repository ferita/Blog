<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class OrderWasCreated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    protected $inputData;
    protected $order_id;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($inputData, $order_id)
    {
        $this->inputData = $inputData;
        $this->order_id = $order_id;
    }

    public function getInputData()
    {
        return $this->inputData;
    }

    public function getOrderId()
    {
        return $this->order_id;
    }
}
