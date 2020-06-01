<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav id="layout-nav" class="navbar navbar-expand-md navbar-light shadow-sm">
            <div class="container d-flex justify-content-around">
                <a id="layout-brand" class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <form></form>
                <div id="layout-search" class="input-group md-form form-sm form-2 pl-0">
                    <input class="form-control my-0 py-1 lime-border" type="text" placeholder="Search" aria-label="Search">
                    <div class="input-group-append">
                        <span class="input-group-text lime lighten-2" id="basic-text1">
                            <svg class="bi bi-search" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                              <path fill-rule="evenodd" d="M10.442 10.442a1 1 0 0 1 1.415 0l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1 0-1.415z"/>
                              <path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z"/>
                            </svg>
                        </span>
                    </div>
                </div>

                <div class="navbar" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul id="layout-nav-menu" class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}"> <i class="fas fa-user"></i> {{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}"> <i class="fas fa-id-card"></i> {{ __('Register') }}</a>
                                </li>
                            @endif
                        @else

                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('cart') }}"><i class="fas fa-shopping-cart"></i> Cart <span class="badge bg-dark">{{ Session::has('cart') ? Session::get('cart')->total_quantity : '' }}</span></a>
                            </li>

                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="fas fa-power-off"></i> {{ __('Logout') }}
                                    </a>

                                    <a class="dropdown-item" href=" {{ route('products.index') }} ">
                                        <i class="fas fa-box"></i> Mis Productos
                                    </a>

                                    <a class="dropdown-item" href=" {{ route('product.favourite') }} ">
                                        <i class="fas fa-star"></i> Mis Favoritos
                                    </a>

                                    <a class="dropdown-item" href=" {{ route('orders.myOrders') }} ">
                                        <i class="fas fa-truck"></i> Mis Pedidos
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <nav id="layout-nav2" class="navbar navbar-expand-md navbar-light shadow-sm">
            <ul class="d-flex justify-content-around align-items-center">

                <li><div class="dropdown">
                            <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-tag"></i> Categorías
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                @php $categories = \App\Models\Category::all() @endphp
                                @foreach($categories as $category)
                                    <a class="dropdown-item" href="{{ route('categories.show' , $category->id) }}">{{ $category->name }}</a>
                                @endforeach
                            </div>
                        </div></li>
                <li><a href="{{ route('news') }}"><i class="fas fa-newspaper"></i> Notícias</a></li>
                <li><a href="{{ route('offers') }}"><i class="fas fa-tag"></i> Ofertas</a></li>
                <li><a href="{{ route('faqs.index') }}"><i class="fas fa-question"></i> FAQS</a></li>
                <li><a href="{{ route('contact.index') }}"><i class="fas fa-phone"></i> Contacto</a></li>
                @if(Auth::check())
                    <li><a href=" {{ route('products.create') }} "><button class="btn btn-dark bg-transparent">PUBLICAR PRODUCTO</button></a></li>
                @endif
            </ul>
        </nav>

        <main class="">
            @yield('content')
        </main>

        <footer class="footer">

        </footer>
    </div>
</body>
</html>
