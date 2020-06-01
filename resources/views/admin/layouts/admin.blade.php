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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
            <a id="layout-brand" class="navbar-brand" href="{{ url('/admin') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul id="layout-nav-menu" class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
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


    <main class="py-4 container-fluid row">
        <div class="col-lg-2">
            <nav class="navbar navbar-expand-lg navbar-light bg-light d-flex flex-column align-content-center">
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto d-flex flex-column">
                        <li class="nav-item active">
                            <a class="nav-link" href=" {{ route('admin.users.index') }} "><i class="fas fa-user-tag"></i> CLIENTES</a>
                        </li>

                        <li class="nav-item active">
                            <a class="nav-link" href="" data-toggle="collapse" data-target=".multi-collapse" aria-expanded="false" aria-controls="collapse1 collapse2" ><i class="fas fa-cart-plus"></i> PRODUCTOS  <i class="fas fa-caret-down"></i></a>
                        </li>

                        <li class="nav-item collapse multi-collapse ml-4" id="collapse1">
                            <a class="nav-link" href=" {{ route('admin.products.index') }} ">VER TODOS</a>
                        </li>

                        <li class="nav-item collapse multi-collapse ml-4" id="collapse1">
                            <a class="nav-link" href="{{ route('admin.categories.index') }}">CATEGORÍAS</a>
                        </li>

                        <li class="nav-item collapse multi-collapse ml-4" id="collapse3">
                            <a class="nav-link" href=" {{ route('admin.brands.index') }} ">MARCAS</a>
                        </li>

                        <li class="nav-item active">
                            <a class="nav-link" href=" {{ route('admin.offers.index') }} "><i class="fas fa-tags"></i> OFERTAS</a>
                        </li>

                        <li class="nav-item active">
                            <a class="nav-link" href=" {{ route('admin.news.index') }} "><i class="fas fa-newspaper"></i> NOTÍCIAS</a>
                        </li>

                        <li class="nav-item active">
                            <a class="nav-link" href=" {{ route('admin.faqs.index') }} "><i class="fas fa-question"></i> FAQS</a>
                        </li>

                    </ul>
                </div>
            </nav>
        </div>

        @yield('content')

    </main>
</div>
</body>
</html>
