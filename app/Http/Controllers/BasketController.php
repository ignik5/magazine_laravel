<?php

namespace App\Http\Controllers;

use App\Order;
use App\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BasketController extends Controller
{
    public function basket()
    { 
        $orderid = session('orderid');
        if (!is_null($orderid)) {
            $order = Order::findOrFail($orderid);
        }
        return view('basket', compact('order'));
    }

    public function basketconfirs(Request $request)
    {
        $orderid = session('orderid');
        if (is_null($orderid)){
            return redirect()->route('index');
        }
        $order = Order::find($orderid);
      
        $order->name = $request->name;
        $order->phone = $request->phone;
        $order->status=1;
       
        $success = $order->save(); 
   
        if ($success) {
          
            session()->flash('success', 'Ваш заказ принят в обработку!');
        } else {
            session()->flash('warning', 'Случилась ошибка');
        }
        session()->forget('orderid');
        return redirect()->route('index');
    }

    public function basketplace()
    {
        $orderid = session('orderid');
        if (is_null($orderid)) {
            return redirect()->route('index');
        }
        $order = Order::find($orderid);
        return view('basketplace', compact('order'));
    }
    
    public function basketadd($productid){
        $orderid = session('orderid');
        if(is_null($orderid)){
            $order = Order::create();
            session(['orderid'=>$order->id]);
        }
        else{
            $order= Order::find($orderid);

        }
     
        if($order->products->contains($productid)){
    $pivotrow=$order->products()->where('product_id',$productid)->first()->pivot;
    $pivotrow->count++;
    $pivotrow->update();
        }else{
            $order->products()->attach($productid);
        }
        $product=product::find($productid);
        if (Auth::check()) {
            $order->user_id = Auth::id();
            $order->save();
        }
        session()->flash('success', 'Добавлен товар  '.$product->name);
   
        return redirect()->route('basket');
    }

        

      

    public function basketremov($productid)
    {
        $orderid = session('orderid');
        if (is_null($orderid)) {
            return redirect()->route('basket');
        }
        $order = Order::find($orderid);

        if ($order->products->contains($productid)) {
            $pivotrow = $order->products()->where('product_id', $productid)->first()->pivot;
            if ($pivotrow->count < 2) {
                $order->products()->detach($productid);
            } else {
                $pivotrow->count--;
                $pivotrow->update();
            }
        }

        $product = Product::find($productid);

        session()->flash('warning', 'Удален товар  ' . $product->name);

        return redirect()->route('basket');
    }
}