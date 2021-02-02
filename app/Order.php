<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\product;
class Order extends Model
{
   public function products(){
       return $this->belongsToMany(product::class);
   }
}
