<?php

namespace App\Http\Controllers;
use App\Models\Subscription;
use Illuminate\Http\Request;
use App\Http\Requests\SubscriptionRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\Currency;
use App;
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
      public function subscrib(SubscriptionRequest $request,Product $product)
    {
      Subscription::create([
        'email'=>$request->email,
        'product_id'=>$product->id,
       ] );
    return redirect()->back()->with('success', 'Спасибо, мы сообщим вам о появлении товара');
     }
    
    public function categories()
    {
        return view('categories');
    }
    public function category($code){
        $category= Category::where('code',$code)->first();
       
      
        return view('category',compact('category'));
    }

    public function product($category, $productcode) {
      $product=product::withTrashed()->byCode($productcode)->firstOrFail();
    
 
  
        return view('product', compact('product'));
   }
   public function changelocale($locale){
     $avalialbeLocales = ['ru','en'];
     if (!in_array($locale, $avalialbeLocales)){
       $locale = config('app,locale');
     }
     session(['locale'=>$locale]);
          App::setLocale($locale);
          $currentlocale = App::getLocale();
         return redirect()->back();
   }
   public function changecurrency($currencyCode){
    $currency = Currency::byCode($currencyCode)->firstOrFail();
    session (['currency' => $currency->code]);
    return redirect()->back();
   }

}
