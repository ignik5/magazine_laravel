<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Traits\Translatable;
use App\Services\currencyconversion;
use Illuminate\Database\Eloquent\SoftDeletes;
class Product extends Model
{
    use Translatable;
    use SoftDeletes;
    protected $fillable=['code','image','name_en', 'description_en','name','category_id','price','description', 'hit', 'new','recommend','count'];
    public function getCategory(){
return Category::find($this->category_id);

    }
    public function category(){
       
    return $this->beLongsTo(Category::class);
    }
    public function skus()
    {
    return $this->hasMany(Sku::class);
    }
    public function isAvailable(){

    return !$this->trashed() && $this->count>0;
    }
    public function scopeByCode($query, $code){
     return $query->where('code',$code);
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
    public function properties()
    {
        return $this->belongsToMany(Property::class);
    }

    public function getPriceAttribute($value){
     return round(currencyconversion::convert($value),2);
     
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
