
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@lang('main.online_shop'): @yield('title')</title>
 
    <link href="/public/css/bootstrap.min.css" rel="stylesheet">
    <link href="/public/css/starter-template.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link href="/public/css/style.css" rel="stylesheet">
    <script src="/public/js/jquery.min.js"></script>
    <script src="/public/js/bootstrap.min.js"></script>
    <script src="/public/js/bootstrap.js"></script>
    <script src="/public/js/app.js"></script>

</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{route('index')}}">@lang('main.online_shop')</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li ><a href="{{route('index')}}">@lang('main.all_products')</a></li>
                <li ><a href="{{route('categories')}}">@lang('main.Categories')</a>
                </li>
                <li ><a href="{{route('basket')}}">@lang('main.Basket')</a></li>
              {{--  <li class="active"><a href="{{route('index')}}">Сбросить проект в начальное состояние</a></li>
              --}}  <li><a href="{{route('locale',__('main.set_lang'))}}">@lang('main.set_lang')</a></li>

                <li class="dropdown">
               
                   <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{$currencySimbol}}<span class="caret"></span></a>
               <ul class="dropdown-menu">
                       
                        @foreach ($currencies as $currency)
                        <li><a href="{{route('currency', $currency->code)}}">{{$currency->Symbol}}</a></li>
                                                    
                        @endforeach
                                            </ul>      
                </li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                                @guest
                                    <li class="nav-item dropdown"><a id="navbarDropdown" class="dropdown-item" href="{{route('login')}}">Войти</a></li>
                                    @endguest
                                    @auth
                                    
                                @if(Auth::user()->isAdmin()==1) 
                                   <li  class="nav-item dropdown"><a id="navbarDropdown" class="dropdown-item" href="{{route('order')}}">Панель администратора</a></li>
                @else
                <li  class="nav-item dropdown"><a id="navbarDropdown" class="dropdown-item" href="{{route('person.orders.index')}}">Мои заказы</a></li>
                @endif
                
                <li  class="nav-item dropdown"><a id="navbarDropdown" class="dropdown-item" href="{{route('get-logout')}}">Выход</a></li>
                @endauth
                            </ul>
        </div>
    </div>
</nav>

<div class="container">
    <div class="starter-template">
        @if(session()->has('success'))
         <p class="alert alert-success">{{session()->get('success')}} </p>
         @elseif(session()->has('warning'))

        <p class="alert alert-warning">{{session()->get('warning')}} </p>
        @endif
      @yield('content')
         
        </div>
</div>
<footer>
    
    <div class="container">
        <div class="row">
            <div class="col-lg-6"><p>Карегории товаров</p>
                <ul>
                    @foreach ($categories as $category)
                    <li><a href = "{{route('category',$category->code)}}">{{$category->__('name')}}</a></li>
                    @endforeach
                 
                </ul>
            </div>
            <div class="col-lg-6"><p>Cамые популярные товары</p>
                <ul>
                    @foreach ($bestProductIds as $bestProduct)
                    <li><a href = "{{route('product',[$bestProduct->category->code, $bestProduct->code])}}">{{$bestProduct->name}}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
 
    </div>
</footer>
</body>
</html>
