<p>Уважаемый {{$name}}</p>
<p>@lang('mail/ordercreated.your_order') {{ $fullsum }} создан</p>
<table>
    <tbody>
        @foreach($order->products as $product){
            
            
           
                               <tr>
                        <td>
                            <a href="{{route('product',[$product->category->code,$product->code])}}">
                                 @if($product->image!=null)
                                <img height="56px" src="{{ Storage::url($product->image) }}" height="240px">
                                @else
                                <img height="56px" src="http://internet-shop.tmweb.ru/storage/products/iphone_x.jpg">
                                @endif
                              <h1> {{$product->name}}</h1>
                              <p> {{$product->description}}</p>
                            </a>
                        </td>
                        <td><span class="badge">{{$product->pivot->count}}</span>

                          
                        </td>
                        <td>{{$product->price}}</td>
                        <td>{{$product->getprice()}}</td>
                    </tr> @endforeach
                            <tr>
               
                </tr>




        }
        
    </tbody>

</table>