<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\Setting;

class OrderCreatedCustomerMail extends Mailable
{
    use Queueable, SerializesModels;
    protected $input;
    protected $order_id;
    protected $order;
    protected $company_info;

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
        $this->company_info = Setting::firstOrFail();
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
         return $this->view('mails.order_created_to_customer')
            ->from(['address' => 'thecake.manager@yandex.ru'])
            ->with(['data' => $this->input, 'order_id' => $this->order_id, 'order' => $this->order, 'company_info' => $this->company_info])
            ->subject('TheCake - спасибо за заказ');
           // ->attach(base_path('invoice')); 
    }
}
