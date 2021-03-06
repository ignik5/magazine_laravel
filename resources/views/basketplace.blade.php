@extends('layouts.master')
@section('title','Корзина')
@section('content')

    <h1>Подтвердите заказ:</h1>
<div class="container">
<div class="row justify-content-center">
<p>Общая стоимость: <b>{{$order->fullprice()}}</b></p>
<form action="{{route('basketconfirs')}}" method="POST">
<div>
<p>Укажите свои имя и номер телефона, чтобы наш менеджер мог с вами связаться:</p>

<div class="container">
<div class="form-group">
    <label for="name" class="control-label col-lg-offset-3 col-lg-2">Имя: </label>
    <div class="col-lg-4">
        @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <input type="text" name="name" id="name" value="{{old('name')}} "class="form-control">
    </div>
</div>
<br>
<br>
<div class="form-group">
   
    <label for="phone" class="control-label col-lg-offset-3 col-lg-2">Номер телефона: </label>
    <div class="col-lg-4">
        @error('phone')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <input type="text" name="phone" id="phone"  value="{{old('phone')}}" class="form-control">
    </div>
</div>
<br>
<br>
@guest
<label for="email" class="control-label col-lg-offset-3 col-lg-2">Email </label>
<div class="col-lg-4">
    @error('email')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <input type="text" name="email" id="email"  value="{{old('email')}}" class="form-control">
</div>
</div>
@endguest
<br>
<br>
                           
@csrf
        <input type="submit" class="btn btn-success" value="Подтвердите заказ">
        
</div>
</form>
</div>
</div>


@endsection