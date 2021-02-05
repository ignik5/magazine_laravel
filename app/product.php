<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;
class product extends Model
{
    
    protected $fillable=['code','image','name','category_id','price','description'];
    public function getCategory(){
return Category::find($this->category_id);

    }
    public function category(){
       
     return $this->beLongsTo(Category::class);
    }
    public function getprice(){
        if (!is_null($this->pivot)){
            return $this->pivot->count*$this->price;
        }
    return $this->price;
    }
}
