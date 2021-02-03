<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;

class BasketController extends Controller
{
       public function basket (){
        $orderid = session('orderid');
        $order=Order::findOrFail($orderid);
        return view('basket' ,compact('order'));
    }
    public function basketplace(){
        return view('order');
    }
    public function basketadd($productid){
        $orderid = session('orderid');
        if (is_null($orderid)){
            $order = Order::create();
            session(['orderid'=>$order->id]);
        }else{
            $order= Order::find($orderid);

        }
        if($order->products->contains($productid)){
    $pivotrow=$order->products()->where('product_id',$productid)->first()->pivot;
    $pivotrow->count++;
    $pivotrow->update();
        }else{
            $order->products()->attach($productid);
        }
      
   
        return redirect()->route('basket');
    }
    public function basketremov($productid){
        $orderid = session('orderid');
        if (is_null($orderid)){
            return false;
            return redirect()->route('basket');
        }
        $order= Order::find($orderid);
       
        
        if($order->products->contains($productid)){
            $pivotrow=$order->products()->where('product_id',$productid)->first()->pivot;
            if($pivotrow->count < 2){
                $order->products()->detach($productid);
            }
            else{
                $pivotrow->count--;
                $pivotrow->update();
            }
         
                }

        
                return redirect()->route('basket');

    }
}
