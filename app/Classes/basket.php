<?


namespace App\Classes;

use App\Models\Order;

use App\Models\Product;

use Illuminate\Support\Facades\Auth;
class Basket
{
    protected $order;


    /**
     * basket constructor.
     * @param bool  $createOrder
     */
public function  __construct($createOrder = false)
{

    $orderid = session('orderid');

    if(is_null($orderid)){
        if($createOrder){
        $data = [];
        if (Auth::check()) {
            $data['user_id'] = Auth::id();;
            
          }
          $this->order = Order::create($createOrder);
        }
        else{
        $this->order = Order::create();}
        session(['orderid'=>$this->order->id]);
    }
    else{
        $this->order =  Order::findOrFail($orderid);
    }
     if (Auth::check()) {
    $this->order->user_id = Auth::id();
    $this->order->save();
  }
   
}
/** 
 * @return mixed
*/
public function getOrder()
{
    return $this->order;
}
public function piv($product){
    return $this->order->products()->where('product_id',$product->id)->first()->pivot;
}

public function removeproduct(product $product)
{
    
  
    if ($this->order->products->contains($product->id)) {
        $pivotrow=$this->piv($product);
        if ($pivotrow->count < 2) {
            $this->order->products()->detach($product->id);
        } else {
            $pivotrow->count--;
            $pivotrow->update();
        }
    }

}


public function addproduct(product $product)
{
  
     
    if($this->order->products->contains($product->id)){
        $pivotrow=$this->piv($product);
        
        $pivotrow->count++;
        if( $pivotrow->count > $product->count){
            return false;
        }
        $pivotrow->update();
  }else{
    
      $this->order->products()->attach($product->id);
  }
return true;
 
}
public function countAvailable()
{
   foreach($this->order->products as $orderProduct){
   if( $orderProduct->count < $this->piv($orderProduct)->count)
   return false;
   }
    return true;
}


}