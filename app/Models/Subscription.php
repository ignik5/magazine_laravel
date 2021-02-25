<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Mail\SendSubscribtionMessage;


use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\mail;

class Subscription extends Model
{
    protected $fillable =['email', 'product_id' ,'status'];


    public function scopeActiveProductId($query, $product_id){
return $query->where('status',0)->where('product_id', $product_id);

    }
    public function product(){
        return $this->belondsTo(Product::class);
    }
    public static function sendEmailBySubscription(Product $product){
     $subscriptions = self::ActiveProductId($product->id)->get();
     foreach($subscriptions as $subscription){
Mail::to($subscription->email)->send(New SendSubscribtionMessage($product));
$subscription->status=1;
$subscription->save();
     }

    }
    
}
