<?php

namespace App\Http\Controllers;
use App\Mail\OrderCreate;
use App\Models\Order;
use App\Models\Product;
use App\Classes\basket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\mail;

use App\Http\Requests\basketrequest;

class BasketController extends Controller
{
    public function basket()
    { 
        $order = (new Basket())->getOrder();
        
        return view('basket', compact('order'));
    }

    public function basketconfirs(basketrequest $request)
    {
        $order = (new Basket())->getOrder();
       
        
        $basket = new Basket();
        $order = $basket->getOrder();
        if (!$basket->countAvailable()){
            session()->flash('warning', 'Товар  не доступен для заказа  в полном объеме ');
     return redirect()->route('basket');
        }
      
        $order->name = $request->name;
        $order->phone = $request->phone;
        
        $email = Auth::check() ? Auth::check()->email : $request->email;
        
        $order->status=1;
        $basket->countAvailable(true);
        Mail::to($email)->send(new OrderCreate($order->name, $order));
        $success = $order->save(); 
   
        if ($success) {
          
            session()->flash('success', __('basket.your_order_confirmed'));
        } else {
            session()->flash('warning', 'Случилась ошибка');
        }
        session()->forget('orderid');
        return redirect()->route('index');
    }

    public function basketplace()
    {
        $basket = new Basket();
        $order = $basket->getOrder();
        if (!$basket->countAvailable()){
            session()->flash('warning', 'Товар  не доступен для заказа  в полном объеме ');
     return redirect()->route('basket');
        }
         
 
        return view('basketplace', compact('order'));
    }
    
    public function basketadd(product $product){
     
      
        $result= (new Basket())->addproduct($product) ;
      if ($result == true )
      {
          session()->flash('success', 'Добавлен товар  '.$product->name);
     }
     else {
        session()->flash('warning', 'Товар '.$product->name.' в большем количестве не доступен для заказа ');
     }
        return redirect()->route('basket');
    }

        

      

    public function basketremov(product $product)
    {
        (new Basket())->removeproduct($product) ;
       
       

       

        session()->flash('warning', 'Удален товар  ' . $product->name);

        return redirect()->route('basket');
    }
}