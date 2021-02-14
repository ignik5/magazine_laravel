<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
class Product extends Model
{
    
    protected $fillable=['code','image','name','category_id','price','description', 'hit', 'new','recommend'];
    public function getCategory(){
return Category::find($this->category_id);

    }
    public function category(){
       
     return $this->beLongsTo(Category::class);
    }


    public function scopeHit($query){
        return $query->where('hit',1);
    }
    public function scopeNew($query){
        return $query->where('new',1);
    }
    public function scopeRecommend($query){
        return $query->where('recommend',1);
    }


    
    public function getprice(){
        if (!is_null($this->pivot)){
            return $this->pivot->count*$this->price;
        }
    return $this->price;
    }
    public function setNewAttribute($value){

      $this->attributes['new'] = $value ==='on' ? 1 : 0 ;
    
    }
    public function setHitAttribute($value){

        $this->attributes['hit'] = $value ==='on' ? 1 : 0 ;
       
      }
      public function setRecommendAttribute($value){

        $this->attributes['recommend'] = $value ==='on' ? 1 : 0 ;
    
      }
public function ishit(){
return $this->hit==1;
}
public function isnew(){
    return $this->new==1;
}
public function isrecommend(){
    return $this->recommend==1;
}
}