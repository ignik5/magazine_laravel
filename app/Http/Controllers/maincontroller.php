<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

use App\Http\Requests\productsFilter;
class maincontroller extends Controller
{
    public function index(productsFilter $request){
      //  dd($request->all());
    // \ Debugbar::info($request);
      $productsquery=product::with('category');
      if($request->filled('price_from')){
        $productsquery->where('price', '>=', $request->price_from );
      }
      if($request->filled('price_to')){
        $productsquery->where('price', '<=', $request->price_to );
      }
      foreach(['hit','new','recommend'] as $field ){
      if($request->has($field)){
        $productsquery->$field();
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

    public function product($category, $productcode) {
      $product=product::withTrashed()->byCode($productcode)->first();
    
 
  
        return view('product', compact('product'));
   }
   

}
