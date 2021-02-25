<?php

namespace App\Mail;


use App\Models\Product;
use App\Models\Subscription;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendSubscribtionMessage extends Mailable
{
    use Queueable, SerializesModels;
 
    protected $product;
    /**
     * Create a new message instance.
     *
     * @param Product $product
     */
    public function __construct(Product $product)
    {
        $this->product=$product;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.subscribtion', ['product'=>$this->product]);
    }
}
