<?php

namespace App\Listeners;

use App\Events\FeedbackWasCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\Message;

class FeedbackDBSave
{
    public function handle(FeedbackWasCreated $event)
    {
       $data = $event->getInputData();
       Message::create($data);
    }
}
