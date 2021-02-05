<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\product;
class Category extends Model
{
    protected $fillable=['code','name','image','description'];

    public function products(){
        return $this->hasMany(product::class);
    }
}
