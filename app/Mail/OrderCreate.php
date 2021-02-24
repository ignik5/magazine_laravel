<?php

namespace App\Mail;

use App\Classes\Basket;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Http\Controllers\BasketController;
use App\Models\Order;

class OrderCreate extends Mailable
{
    use Queueable, SerializesModels;
protected $name;
protected $order;
    /**
     * Create a new message instance.
     * @param $name;
     * @param $order;
     */
    public function __construct($name, Order $order)
    {
        $this->name =  $name;
        $this->order = $order;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $fullsum = $this->order->fullprice();
        
        return $this->view('mail.order_created', [
            'name'=>$this->name, 
            'fullsum'=> $fullsum,
            'order'=>$this->order,
            ]);
    }
}
