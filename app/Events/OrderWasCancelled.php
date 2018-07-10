<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class OrderWasCancelled
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    protected $inputData;
    protected $order;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($inputData, $order)
    {
        $this->inputData = $inputData;
        $this->order = $order;
    }

    public function getInputData()
    {
        return $this->inputData;
    }

    public function getOrder()
    {
        return $this->order;
    }
}
