<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;  
use App\Models\Traits\Translatable;

class Category extends Model
{
     use Translatable;
    protected $fillable=['code','name','name_en', 'description_en','image','description'];

    public function products(){
        return $this->hasMany(product::class);
    }
}
