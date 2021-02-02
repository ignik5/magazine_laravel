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
            $order = Order::create()->id;
            session(['orderid'=>$order->id]);
        }else{
            $order= Order::find($orderid);

        }
     $order->products()->attach($productid);
     return view('basket',compact('order'));
    }
}
