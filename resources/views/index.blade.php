@extends('layouts.master')
@section('title','Все товары')
@section('content')
    <div class="starter-template">
                            <h1>Все товары</h1>
   
    <div class="row">


@foreach ($products as $product)
@include('layouts.card',compact('product'))
@endforeach



    </div></div>
@endsection