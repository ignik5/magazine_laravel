@extends('layouts.master')

@section('title','Товары')
@section('content')
    
                           <h1>{{$product->__('name')}}</h1>
    <h2>{{$product->category->__('name')}}</h2>
    <p>Цена: <b>{{$product->price}}</b></p>
    @if($product->image!=null)
    <img src="{{ Storage::url($product->image) }}" height="240px">
    @else
    <img src="http://internet-shop.tmweb.ru/storage/products/iphone_x.jpg">
    @endif
    <p>{{$product->__('description')}}</p>
        @if($product->isAvailable()) 
        
    <form action="{{route('basketadd',$product)}}" method="post">
        <button type="submit"  class="btn btn-primary" role="button">В корзину</button> 
        @csrf
    </form>
        @else
             не доступен
             <br>
             <span>Cообщить мне, когда товар появится в наличии:</span>
           <div class="warning">
            @if($errors->get('email'))
            {!!$errors->get('email')[0]!!}
            @endif
           </div>
             <form method ="POST" action="{{route('subscrib', $product)}}">
                 @csrf
                 <input type="text" name="email">
                
                <button type="submit">Отправить</button>

             </form>
         @endif
    
        </div>

@endsection
