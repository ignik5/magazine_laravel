<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
class Category extends Model
{
    protected $fillable=['code','name','image','description'];

    public function products(){
        return $this->hasMany(product::class);
    }
}
