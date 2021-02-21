<?php

namespace App\Http\Controllers\Person;

use App\Http\Controllers\Controller;
use App\Models\order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Auth::user()->orders()->active()->paginate(10);
        return view('auth.orders.index', compact('orders'));
    }
   

    public function show(order $order)
    {
        if (!Auth::user()->orders->contains($order)) {
            return back();
        }

         $products = $order->products()->withTrashed()->get();
      
        return view('auth.orders.show', compact('order','products'));
    
    }
}