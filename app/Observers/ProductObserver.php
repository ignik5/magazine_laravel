<?php

namespace App\Observers;

use App\Models\Product;
use App\Models\Subscription;
class ProductObserver
{
    

    /**
     * Handle the product "updated" event.
     *
     * @param  \App\Models\Product  $product
     * @return void
     */
    public function updating(Product $product)
    { 
        $oldcount=$product->getOriginal('count');
        if($oldcount == 0 && $product->count >0){
            Subscription::sendEmailBySubscription($product);
        }
        
    }
}