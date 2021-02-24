<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;
class OrderController extends Controller
{
    public function index(){
        $orders = Order::active()->paginate(8);
       
       return view('auth.orders.index',compact('orders'));
    }
    public function show(order $order)
    {
       $products = $order->products()->withTrashed()->get();
      
        return view('auth.orders.show', compact('order','products'));
    }
}
