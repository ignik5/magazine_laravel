@extends('layouts.master')

@section('title','Товары')
@section('content')
    
                           <h1>{{$product->name}}</h1>
    <h2>{{$category->name}}</h2>
    <p>Цена: <b>{{$product->price}}</b></p>
    @if($product->image!=null)
    <img src="{{ Storage::url($product->image) }}" height="240px">
    @else
    <img src="http://internet-shop.tmweb.ru/storage/products/iphone_x.jpg">
    @endif
    <p>{{$product->description}}</p>

            <form action="http://internet-shop.tmweb.ru/basket/add/1" method="POST">
            <button type="submit" class="btn btn-success" role="button">Добавить в корзину</button>

            <input type="hidden" name="_token" value="6afv06B52wKMGwrEHeg2Y3VkbFoU8uX2nu2IUgSh">        </form>
        </div>

@endsection
