<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\product;
use App\Http\Requests\productsFilter;
class maincontroller extends Controller
{
    public function index(productsFilter $request){
      //  dd($request->all());
      $productsquery=product::query();
      if($request->filled('price_from')){
        $productsquery->where('price', '>=', $request->price_from );
      }
      if($request->filled('price_to')){
        $productsquery->where('price', '<=', $request->price_to );
      }
      foreach(['hit','new','recommend'] as $field ){
      if($request->has($field)){
        $productsquery->where($field, 1 );
      }
    }
        $products=$productsquery->paginate(6)->withPath("?". $request->getQueryString());
        return view('index',compact('products'));
    }

    
    public function categories(){
  
        $categories = Category::get();
        return view('categories', compact('categories'));
    }
    public function category($code){
        $category= Category::where('code',$code)->first();
       
      
        return view('category',compact('category'));
    }

    public function product($category, $product = null) {
        $category = Category::where('code',$category)->first();
        $product = product::where('code',$product)->first();
        return view('product', ['category'=>$category,'product' => $product]);
   }
   

}
