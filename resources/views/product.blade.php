@extends('layouts.master')

@section('title','Товары')
@section('content')
    
                           <h1>{{$product->name}}</h1>
    <h2>{{$product->category->name}}</h2>
    <p>Цена: <b>{{$product->price}}</b></p>
    @if($product->image!=null)
    <img src="{{ Storage::url($product->image) }}" height="240px">
    @else
    <img src="http://internet-shop.tmweb.ru/storage/products/iphone_x.jpg">
    @endif
    <p>{{$product->description}}</p>
    <form action="{{route('basketadd',$product)}}" method="post">
        @if($product->isAvailable()) 
        <button type="submit"  class="btn btn-primary" role="button">В корзину</button> 
        @else
             не доступен
         @endif
     @csrf
         </form>
        </div>

@endsection
