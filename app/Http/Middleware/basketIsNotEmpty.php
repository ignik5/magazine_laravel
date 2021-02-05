<?php

namespace App\Http\Middleware;

use Closure;
use App\Order;

class basketIsNotEmpty
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
      
        $orderid = session('orderid');

        if (!is_null($orderid)) {
            $order = Order::findOrFail($orderid);
        if ($order->products->count() == 0) {
                session()->flash('warning', 'Ваша корзина пуста!');
                return redirect()->route('index');
            }
        }elseif (is_null($orderid)) 
        {Order::create();
            
            session()->flash('warning', 'Ваша корзина пуста!');
            return redirect()->route('index');
        }

        return $next($request);
    }
}
