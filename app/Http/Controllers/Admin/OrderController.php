<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;
class OrderController extends Controller
{
    public function index(){
        $orders = order::where('status',1)->paginate(8);
       
       return view('auth.orders.index',compact('orders'));
    }
}
