@extends('layouts.master')
@section('title','Все категории')
@section('content')
 
        @foreach ($categories as $category)
                                    <div class="panel">
                                       
                                            
                                        
            <a href="/public/{{$category->code}}">
                @if($category->image!=null)
                <img src="{{ Storage::url($category->image) }}" height="240px">
                @else
                <img src="http://internet-shop.tmweb.ru/storage/products/iphone_x.jpg">
                @endif
                <h2>{{$category->name}}</h2>
            </a>
            <p>
                {{$category->description}} </p>
        </div>
        @endforeach
         
     
</div>
@endsection
