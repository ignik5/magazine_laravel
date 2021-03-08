@extends('layouts.master')
@section('title','Корзина')
@section('content')
  
      
      
                                    <h1>Корзина</h1>
            <p>Оформление заказа</p>
            <div class="panel">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Название</th>
                        <th>Кол-во</th>
                        <th>Цена</th>
                        <th>Стоимость</th>
                    </tr>
                    </thead>
                    <tbody>
                              @foreach ($order->products as $product)
                                  
                                   <tr>
                            <td>
                                <a href="{{route('product',[$product->category->code,$product->code])}}">
                                     @if($product->image!=null)
                                    <img height="56px" src="{{ Storage::url($product->image) }}" height="240px">
                                    @else
                                    <img height="56px" src="http://internet-shop.tmweb.ru/storage/products/iphone_x.jpg">
                                    @endif
                                   {{$product->__('name')}}
                                </a>
                            </td>
                            <td><span class="badge">{{$product->pivot->count}}</span>

                                <div class="btn-group form-inline">
                                    <form action="{{route('basketremov',$product)}}" method="POST">
                                    <button type="submit" class="btn btn-danger" ><span
                                                class="glyphicon glyphicon-minus" aria-hidden="true"></span>
                                            </button> @csrf </form>
                                                <form action="{{route('basketadd',$product)}}" method="POST">
                                   <button type="submit"class="btn btn-success" ><span
                                                             class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                                                            </button>  @csrf </form>   </div>
                            </td>
                            <td>{{$product->price}}</td>
                            <td>{{$product->getprice()}}</td>
                        </tr> @endforeach
                                <tr>
                        <td colspan="3">Общая стоимость:</td>
                        <td>{{$order->fullprice()}} {{$currencySimbol}}</td>
                    </tr>
                    </tbody>
                </table>
                <br>
                <div class="btn-group pull-right" role="group">
                    <a type="button" class="btn btn-success" href="{{route('basketplace')}}">Оформить заказ</a>
                </div>
            </div>
            </div>
         </div>

@endsection
