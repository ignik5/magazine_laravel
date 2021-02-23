<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\User;
class Order extends Model
{
    protected $fillable = ['user_id'];
    
    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot('count')->withTimestamps();
    }
   public function fullprice(){
       $sum=0;
       foreach($this->products()->withTrashed()->get() as $product){
$sum+=$product->getprice();
       }
       return($sum);
      
   }
  
   public function scopeActive($query){
       return $query->where('status', 1);
   }
   public function user(){
       return $this->belongsTo(User::class);
   }
 public function saveorder($name, $phone){
     if ($this->status==0){
        $this->name = $name;
    $this->phone = $phone;
    $this->status=1;
    $this->save(); 

    return true;
     }else{
         return false;
     }

 }
 
}
