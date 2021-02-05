<div class="col-sm-6 col-md-4">
    <div class="thumbnail">
        <div class="labels">
            
            
                    </div>
                    @if($product->image!=null)
                    <img src="{{ Storage::url($product->image) }}" height="240px">
                    @else
                    <img src="http://internet-shop.tmweb.ru/storage/products/iphone_x.jpg">
                    @endif
        <div class="caption">
            <h3>{{$product->name}}</h3>
            <p>{{$product->price}}₽</p>
            
           <form action="{{route('basketadd',$product)}}" method="post">
               <button type="submit"  class="btn btn-primary" role="button">В корзину</button> 
               
            
                  <a href="{{route('product',[$product->category->code, $product->code])}}"class="btn btn-default"role="button">Подробнее</a>
                  @csrf
                </form>
        </div>
    </div>
</div>