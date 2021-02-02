<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\product;
class maincontroller extends Controller
{
    public function index(){
        $products=product::get();
        return view('index',compact('products'));
    }
    public function basket(){
        return view('basket');
    }
    public function basketplace(){
        return view('order');
    }
    public function categories(){
  
        $categories = Category::get();
        return view('categories', compact('categories'));
    }
    public function category($code){
       $category = Category::where('code',$code)->first();
        return view('category',compact('category'));
    }

    public function product($category, $product = null){
        return view('product', ['category'=>$category,'product'=>$product]);
    }
   

}
