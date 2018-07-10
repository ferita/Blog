<?php

namespace App\Listeners;

use App\Events\FeedbackWasCreated;
use App\Mail\FeedbackCustomerMail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class FeedbackMailCustomerNotify
{
    /**
     * Handle the event.
     *
     * @param  FeedbackWasCreated  $event
     * @return void
     */
    public function handle(FeedbackWasCreated $event)
    {
        $data = $event->getInputData();
        Mail::to($data['email'])
            ->send(new FeedbackCustomerMail($data));
    }
}
