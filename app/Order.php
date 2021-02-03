<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\product;
class Order extends Model
{
   public function products(){
       return $this->belongsToMany(product::class)->withPivot('count')->withTimestamps();
   }
   public function fullprice(){
       $sum=0;
       foreach($this->products as $product){
$sum+=$product->getprice();
       }
       return($sum);
      
   }
}
