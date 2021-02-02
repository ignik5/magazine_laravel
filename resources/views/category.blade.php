@extends('master')
@section('title', 'Катагория')
@section('content')
    <div class="starter-template">
        <h1>
     {{$category->name}} {{$category->product->count() }}
   
    </h1>
    <p>
        {{$category->description}} </p>
    <div class="row">
        @foreach ($category->product as $product)
        @include('card',compact('$product'))
        @endforeach
    </div>
</div>
@endsection

