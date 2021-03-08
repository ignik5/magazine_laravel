<?php
namespace App\ViewComposers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\View\View;
Class BestProductsComposer
{
    public function compose(View $view)
    { 
        
         $bestProductIds = Order::get()->map->products->flatten()->map->pivot->mapToGroups(function($pivot){
            return [$pivot->product_id => $pivot->count];
         })->map->sum()->sortByDesc(null)->take(3)->keys()->toArray();
         $bestProduct = Product::WhereIn('id',$bestProductIds)->get();
  
         $view->with('bestProductIds', $bestProduct);
    }
}