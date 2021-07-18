<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
$total=CartController::cartItem();
$pendingTotal=OrderController::pendingOrderItem();
$completedTotal=OrderController::completedOrderItem();
$cancelledTotal=OrderController::cancelledOrderItem();
$expiredTotal=OrderController::expiredOrderItem();
?>
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

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="shortcut icon" href="{{ asset('imgs/favicon-logo.png') }}">
    <link rel="stylesheet" href="{{ asset('css/layout-css.css') }}">

    @stack('scripts')

</head>
<body>
    <header id="app">
        <nav id="navbar" class="navbar fixed-top navbar-expand-lg shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img id="navbar-logo" src="/imgs/re-logo2.png" alt="logo">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav-menu">
                        <li class="nav-item active">
                            <a class="nav-link " href="/">HOME</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="/shop">SHOP</a>
                            <!--<ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="/shop/mens">Mens</a></li>
                                <li><a class="dropdown-item" href="/shop/womens">Womens</a></li>
                            </ul>-->
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">ABOUT</a>
                        </li>
                        <li class="nav-item">    
                            <a class="nav-link" href="#">CONTACT</a>
                        </li>

                    <!-- Right Side Of Navbar -->
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            

                            <div class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->first_name}}
                            </a>

                            <ul class="dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu">
                            <li><a class="dropdown-item" href="/c/cartlist">Your Cart({{$total}})</a></li>
                            <li><a class="dropdown-item" href="/c/pendingOrders">Pending Items({{$pendingTotal}})</a></li>
                            <li class="divider"></li>
                            
                            <li><a class="dropdown-item" href="{{ route('home') }}">
                                        {{ __('Dashboard') }}
                                    </a></li>
                            <li><a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                    </a></li>

                            <li class="dropdown-submenu" >
                                <a style="margin-left: 29px">My Other Orders</a>
                                <ul class="dropdown-menu" >
                                <li><a class="dropdown-item" href="/c/completedOrders" >Completed Items({{$completedTotal}})</a></li>
                                <li><a class="dropdown-item" href="/c/cancelledOrders" >Cancelled Items({{$cancelledTotal}})</a></li>
                                <li><a class="dropdown-item" href="/c/expiredOrders" >Expired Items({{$expiredTotal}})</a></li>
                                </ul>
                            </li>
                                    
                            </ul>
                        </div>
  
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </header>

    @stack('custom-scripts')
    
</body>
</html>
