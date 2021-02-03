@extends('layouts.master')
@section('title','Все категории')
@section('content')
 
        @foreach ($categories as $category)
                                    <div class="panel">
                                       
                                            
                                        
            <a href="/public/{{$category->code}}">
                <img src="http://internet-shop.tmweb.ru/storage/categories/mobile.jpg">
                <h2>{{$category->name}}</h2>
            </a>
            <p>
                {{$category->description}} </p>
        </div>
        @endforeach
         
     
</div>
@endsection
