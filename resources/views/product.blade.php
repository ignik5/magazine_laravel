@extends('master')
@section('title','Товары')
@section('content')
    <div class="starter-template">
                            <h1>{{$product}}</h1>
    <h2>{{$product->category->name}}</h2>
    <p>Цена: <b>{{$product->price}}</b></p>
    <img src="http://internet-shop.tmweb.ru/storage/products/iphone_x.jpg">
    <p>{{$product->description}}</p>

            <form action="http://internet-shop.tmweb.ru/basket/add/1" method="POST">
            <button type="submit" class="btn btn-success" role="button">Добавить в корзину</button>

            <input type="hidden" name="_token" value="6afv06B52wKMGwrEHeg2Y3VkbFoU8uX2nu2IUgSh">        </form>
        </div>
</div>
@endsection
